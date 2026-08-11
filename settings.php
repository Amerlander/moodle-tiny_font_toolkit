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
 * Emptying a list setting switches its control off. Each control's checkbox
 * decides whether it also appears in the toolbar; it stays in the Format menu
 * either way.
 *
 * @package     tiny_font_toolkit
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$settings = new admin_settingpage('tiny_font_toolkit_settings', new lang_string('pluginname', 'tiny_font_toolkit'));

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtextarea(
        'tiny_font_toolkit/sizes',
        new lang_string('sizes', 'tiny_font_toolkit'),
        new lang_string('sizes_desc', 'tiny_font_toolkit'),
        get_string('default_sizes', 'tiny_font_toolkit'),
        PARAM_TEXT,
        60,
        8
    ));

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/toolbarsizes',
        new lang_string('toolbarsizes', 'tiny_font_toolkit'),
        new lang_string('toolbarsizes_desc', 'tiny_font_toolkit'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/fontsizeinput',
        new lang_string('fontsizeinput', 'tiny_font_toolkit'),
        new lang_string('fontsizeinput_desc', 'tiny_font_toolkit'),
        0
    ));

    // TinyMCE accepts only these five for font_size_input_default_unit, so the
    // list is fixed rather than free text. Unit names are not translated.
    $settings->add(new admin_setting_configselect(
        'tiny_font_toolkit/fontsizeinputunit',
        new lang_string('fontsizeinputunit', 'tiny_font_toolkit'),
        new lang_string('fontsizeinputunit_desc', 'tiny_font_toolkit'),
        'em',
        ['em' => 'em', 'pt' => 'pt', 'px' => 'px', 'cm' => 'cm', 'mm' => 'mm']
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

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/toolbarfontfamilies',
        new lang_string('toolbarfontfamilies', 'tiny_font_toolkit'),
        new lang_string('toolbarfontfamilies_desc', 'tiny_font_toolkit'),
        1
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

    $settings->add(new admin_setting_configcheckbox(
        'tiny_font_toolkit/toolbartextcolors',
        new lang_string('toolbartextcolors', 'tiny_font_toolkit'),
        new lang_string('toolbartextcolors_desc', 'tiny_font_toolkit'),
        1
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
        'tiny_font_toolkit/toolbarbackgroundcolors',
        new lang_string('toolbarbackgroundcolors', 'tiny_font_toolkit'),
        new lang_string('toolbarbackgroundcolors_desc', 'tiny_font_toolkit'),
        1
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
