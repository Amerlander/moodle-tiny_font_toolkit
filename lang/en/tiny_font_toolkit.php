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
 * Strings for tiny_font_toolkit.
 *
 * Keys are in alphabetical order, as required by moodle.Files.LangFilesOrdering.
 * The `default_*` entries are not UI labels: they are the shipped default values
 * for the matching admin settings, so they are safe to translate and to change.
 *
 * @package     tiny_font_toolkit
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['colors'] = 'Colours';
$string['colors_desc'] = 'Entries for the text and background colour pickers, one per line as '
    . '<code>Label|#rrggbb</code>. Labels are read out by screen readers, so name the colour rather '
    . 'than its purpose. Keep the list short and contrast-checked. Leave empty to hide both pickers.';
$string['customcolors'] = 'Allow free colour choice';
$string['customcolors_desc'] = 'Adds a full colour picker next to the palette above. Off keeps '
    . 'everyone on the curated, contrast-checked list.';
$string['default_colors'] = 'Black|#000000
Dark grey|#5a5a5a
Red|#b3261e
Orange|#a15c00
Yellow|#8a6d00
Green|#1e6b3a
Teal|#00696e
Blue|#1155cc
Purple|#6b21a8
White|#ffffff';
$string['default_fontfamilies'] = 'Theme default|inherit
Serif|Georgia, \'Times New Roman\', serif
Sans serif|system-ui, -apple-system, \'Segoe UI\', Roboto, sans-serif
Monospace|ui-monospace, \'Cascadia Code\', \'Courier New\', monospace';
$string['default_fontsizes'] = '0.875rem
1rem
1.125rem
1.25rem
1.5rem
2rem';
$string['default_namedsizes'] = 'Small|0.875rem
Normal|1rem
Large|1.25rem
Extra large|1.5rem';
$string['fontfamilies'] = 'Font families';
$string['fontfamilies_desc'] = 'Entries for the font family dropdown, one per line as '
    . '<code>Label|font stack</code>. The stack must not contain a semicolon. <code>inherit</code> '
    . 'resets to the theme font. Leave empty to hide the dropdown.';
$string['fontsizes'] = 'Font sizes';
$string['fontsizes_desc'] = 'Sizes offered in the font size dropdown, one per line, each with a CSS '
    . 'unit. Use <code>rem</code>: it scales with the reader\'s browser font size and, unlike '
    . '<code>em</code>, does not multiply when applied inside already-sized text. This control '
    . 'cannot show custom labels, so the raw value is what editors see; use "Named sizes" below '
    . 'for friendly names. Leave empty to hide the dropdown.';
$string['namedsizes'] = 'Named sizes';
$string['namedsizes_desc'] = 'Entries for the styles dropdown, one per line as '
    . '<code>Label|value</code> - for example <code>Large|1.25rem</code>. These are the same font '
    . 'sizes, but with readable names. Leave empty to hide the styles dropdown.';
$string['pluginname'] = 'Font toolkit';
$string['privacy:metadata'] = 'The Font toolkit plugin only re-enables built-in TinyMCE controls '
    . 'from site settings. It stores no personal data.';
