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
 * Site administration » Plugins » Text editors » TinyMCE editor » Font toolkit
 *
 * Emptying a list setting switches its control off — the plugin only adds a
 * control when it has something to put in it.
 *
 * @package     tiny_font_toolkit
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$settings = new admin_settingpage('tiny_font_toolkit_settings', new lang_string('pluginname', 'tiny_font_toolkit'));

if ($ADMIN->fulltree) {
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
        'tiny_font_toolkit/fontsizes',
        new lang_string('fontsizes', 'tiny_font_toolkit'),
        new lang_string('fontsizes_desc', 'tiny_font_toolkit'),
        '',
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
        'tiny_font_toolkit/textcolors',
        new lang_string('textcolors', 'tiny_font_toolkit'),
        new lang_string('textcolors_desc', 'tiny_font_toolkit'),
        get_string('default_textcolors', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        11
    ));

    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/backgroundcolors',
        new lang_string('backgroundcolors', 'tiny_font_toolkit'),
        new lang_string('backgroundcolors_desc', 'tiny_font_toolkit'),
        get_string('default_backgroundcolors', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        11
    ));

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/customcolors',
        new lang_string('customcolors', 'tiny_font_toolkit'),
        new lang_string('customcolors_desc', 'tiny_font_toolkit'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/removeformat',
        new lang_string('removeformat', 'tiny_font_toolkit'),
        new lang_string('removeformat_desc', 'tiny_font_toolkit'),
        1
    ));
}
