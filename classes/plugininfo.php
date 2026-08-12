<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin info for tiny_font_toolkit.
 *
 * @package     tiny_font_toolkit
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_font_toolkit;

use context;
use editor_tiny\editor;
use editor_tiny\plugin;
use editor_tiny\plugin_with_configuration;

/**
 * Plugininfo class.
 *
 * Note this implements `plugin_with_configuration` only, and not
 * `plugin_with_buttons` / `plugin_with_menuitems`. Those interfaces exist so
 * Moodle learns about buttons a plugin *provides*; the items switched back on
 * here (`fontsize`, `forecolor`, `backcolor` and `removeformat`)
 * are already in core's own list, see `get_tinymce_buttons()` in
 * editor_tiny\manager. Declaring them again would register them twice.
 */
class plugininfo extends plugin implements plugin_with_configuration {
    /**
     * Read a setting that ships with a default.
     *
     * The fallback covers one case only: `get_config()` returns false while a
     * setting has never been written, which is where a freshly built image sits
     * until upgrade.php applies the defaults. That keeps the pickers populated on
     * first boot.
     *
     * An empty string is left alone. Every list setting documents that clearing
     * it removes its control, and treating empty as unset would refill it from
     * the default instead, so an administrator could never turn one off.
     *
     * The site language, rather than the reading user's, so that the fallback
     * matches the value Moodle writes into config when it applies the defaults.
     * Otherwise two users could see differently labelled pickers in the window
     * before that happens. Note this goes through the string manager: the fourth
     * argument to get_string() is $lazyload, not a language.
     *
     * @param string $name
     * @return string
     */
    private static function setting(string $name): string {
        global $CFG;

        $value = get_config('tiny_font_toolkit', $name);
        if ($value === false) {
            $lang = isset($CFG->lang) ? $CFG->lang : null;

            return (string) get_string_manager()->get_string(
                'default_' . $name,
                'tiny_font_toolkit',
                null,
                $lang
            );
        }
        return (string) $value;
    }

    /**
     * Read a checkbox setting, with the default applied when it is unset.
     *
     * @param string $name
     * @param bool $default
     * @return bool
     */
    private static function flag(string $name, bool $default): bool {
        $value = get_config('tiny_font_toolkit', $name);
        return $value === false ? $default : (bool) $value;
    }

    /**
     * Split a textarea setting into trimmed, non-empty lines.
     *
     * @param string $raw
     * @return string[]
     */
    private static function lines(string $raw): array {
        $lines = preg_split('/\r\n|\r|\n/', $raw) ?: [];
        return array_values(array_filter(array_map('trim', $lines), static fn($line) => $line !== ''));
    }

    /**
     * Parse a `Label|value` list into an ordered list of [label, value] pairs.
     *
     * Lines without a separator are skipped rather than guessed at, so a typo
     * drops one entry instead of producing a broken TinyMCE config string.
     *
     * @param string $raw
     * @return array[]
     */
    private static function pairs(string $raw): array {
        $pairs = [];
        foreach (self::lines($raw) as $line) {
            if (strpos($line, '|') === false) {
                continue;
            }
            [$label, $value] = array_map('trim', explode('|', $line, 2));
            if ($label !== '' && $value !== '') {
                $pairs[] = [$label, $value];
            }
        }
        return $pairs;
    }

    /**
     * Work out which size control the configured list calls for.
     *
     * One setting drives both. A list that names its entries gets the labelled
     * picker this plugin registers; a list of bare values gets TinyMCE's native
     * dropdown, which shows the values as they are. Exactly one of the two
     * returned lists is ever populated.
     *
     * A bare line among named ones labels itself, so that a list can mix
     * `Large|1.25rem` with a plain `2rem` without losing the entry.
     *
     * @param string $raw
     * @return array{named: array[], values: string[]}
     */
    private static function sizes(string $raw): array {
        $lines = self::lines($raw);
        $isnamed = false;
        foreach ($lines as $line) {
            if (strpos($line, '|') !== false) {
                $isnamed = true;
                break;
            }
        }

        if (!$isnamed) {
            return ['named' => [], 'values' => $lines];
        }

        $named = [];
        foreach ($lines as $line) {
            if (strpos($line, '|') !== false) {
                [$label, $value] = array_map('trim', explode('|', $line, 2));
                if ($label !== '' && $value !== '') {
                    $named[] = [$label, $value];
                }
            } else {
                $named[] = [$line, $line];
            }
        }
        return ['named' => $named, 'values' => []];
    }

    /**
     * Get plugin configuration.
     *
     * Everything here is site-level admin config; nothing depends on the
     * context, the user or the editor instance. It reaches JS as
     * `options.plugins['tiny_font_toolkit/plugin'].config`, see
     * editor_tiny\manager::get_plugin_configuration().
     *
     * @param context $context
     * @param array $options
     * @param array $fpoptions
     * @param editor|null $editor
     * @return array
     */
    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?editor $editor = null
    ): array {
        $sizes = self::sizes(self::setting('sizes'));

        return [
            'namedsizes' => $sizes['named'],
            'fontsizes' => $sizes['values'],
            'fontfamilies' => self::pairs(self::setting('fontfamilies')),
            'textcolors' => self::pairs(self::setting('textcolors')),
            'backgroundcolors' => self::pairs(self::setting('backgroundcolors')),
            'customcolors' => self::flag('customcolors', true),
            'removeformat' => self::flag('removeformat', true),
            'toolbarsizes' => self::flag('toolbarsizes', true),
            'toolbarfontfamilies' => self::flag('toolbarfontfamilies', true),
            'toolbartextcolors' => self::flag('toolbartextcolors', true),
            'toolbarbackgroundcolors' => self::flag('toolbarbackgroundcolors', true),
        ];
    }
}
