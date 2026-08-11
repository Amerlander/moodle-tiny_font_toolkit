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

$string['backgroundcolors'] = 'Background colours';
$string['backgroundcolors_desc'] = 'Entries for the background colour picker, one per line as '
    . '<code>Label|#rrggbb</code>. Text stays readable on pale tints, so the shipped list holds '
    . 'only those. Leave empty to hide the picker.';
$string['customcolors'] = 'Allow free colour choice';
$string['customcolors_desc'] = 'Adds a full colour picker to both colour swatches. Turn off to keep '
    . 'everyone on the lists above.';
$string['default_backgroundcolors'] = 'Yellow|#fff3b0
Orange|#ffe0c2
Red|#fbd5d5
Pink|#fbdde8
Purple|#e9ddf7
Blue|#d8e8fc
Teal|#d2eded
Green|#d9f0d9
Grey|#eaeaea
White|#ffffff';
$string['default_fontfamilies'] = 'Theme default|inherit
Serif|Georgia, \'Times New Roman\', serif
Sans serif|system-ui, -apple-system, \'Segoe UI\', Roboto, sans-serif
Monospace|ui-monospace, \'Cascadia Code\', \'Courier New\', monospace';
$string['default_namedsizes'] = 'Small|0.875rem
Normal|1rem
Large|1.25rem
Extra large|1.5rem';
$string['default_textcolors'] = 'Black|#000000
Dark grey|#5a5a5a
Red|#b3261e
Orange|#a15c00
Yellow|#8a6d00
Green|#1e6b3a
Teal|#00696e
Blue|#1155cc
Purple|#6b21a8
White|#ffffff';
$string['familybutton'] = 'Font';
$string['fontfamilies'] = 'Font families';
$string['fontfamilies_desc'] = 'Entries for the font family dropdown, one per line as '
    . '<code>Label|font stack</code>. The stack must not contain a semicolon. <code>inherit</code> '
    . 'resets to the theme font. Leave empty to hide the dropdown.';
$string['fontsizes'] = 'Exact sizes';
$string['fontsizes_desc'] = 'Adds a second dropdown listing exact CSS sizes, one per line with a '
    . 'unit. It carries values rather than labels, and shows the browser\'s computed size such as '
    . '<code>16px</code> for text that has none set. Ships empty; the named sizes above are the '
    . 'usual choice.';
$string['namedsizes'] = 'Sizes';
$string['namedsizes_desc'] = 'Entries for the size picker, one per line as <code>Label|value</code>, '
    . 'for example <code>Large|1.25rem</code>. Use <code>rem</code>: it scales with the reader\'s '
    . 'browser font size and, unlike <code>em</code>, does not multiply when applied inside '
    . 'already-sized text. Leave empty to hide the picker.';
$string['pluginname'] = 'Font toolkit';
$string['privacy:metadata'] = 'The Font toolkit plugin only adds editor controls configured at site '
    . 'level. It stores no personal data.';
$string['removeformat'] = 'Clear formatting button';
$string['removeformat_desc'] = 'Adds TinyMCE\'s clear formatting button to the toolbar. It is always '
    . 'available in the Format menu regardless of this setting.';
$string['sizebutton'] = 'Size';
$string['textcolors'] = 'Text colours';
$string['textcolors_desc'] = 'Entries for the text colour picker, one per line as '
    . '<code>Label|#rrggbb</code>. Labels are read out by screen readers, so name the colour rather '
    . 'than its purpose. Leave empty to hide the picker.';
