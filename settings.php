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
 * Admin settings for tiny_font_toolkit.
 *
 * Site administration » Plugins » Text editors » TinyMCE editor » Editor toolkit
 *
 * Emptying a setting switches its control off entirely — the plugin only adds
 * a toolbar item when it has something to put in it.
 *
 * @package     tiny_font_toolkit
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$settings = new admin_settingpage('tiny_font_toolkit_settings', new lang_string('pluginname', 'tiny_font_toolkit'));

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/fontsizes',
        new lang_string('fontsizes', 'tiny_font_toolkit'),
        new lang_string('fontsizes_desc', 'tiny_font_toolkit'),
        get_string('default_fontsizes', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        8
    ));

    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/namedsizes',
        new lang_string('namedsizes', 'tiny_font_toolkit'),
        new lang_string('namedsizes_desc', 'tiny_font_toolkit'),
        get_string('default_namedsizes', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        8
    ));

    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/fontfamilies',
        new lang_string('fontfamilies', 'tiny_font_toolkit'),
        new lang_string('fontfamilies_desc', 'tiny_font_toolkit'),
        get_string('default_fontfamilies', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        6
    ));

    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/colors',
        new lang_string('colors', 'tiny_font_toolkit'),
        new lang_string('colors_desc', 'tiny_font_toolkit'),
        get_string('default_colors', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        10
    ));

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/customcolors',
        new lang_string('customcolors', 'tiny_font_toolkit'),
        new lang_string('customcolors_desc', 'tiny_font_toolkit'),
        0
    ));
}
