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
 * Capabilities for tiny_font_toolkit.
 *
 * Every TinyMCE subplugin is expected to declare `tiny/<name>:use`. From Moodle
 * 5.0 on, `editor_tiny\plugin::is_enabled()` looks the capability up and, not
 * finding it, writes a developer-level debugging message and carries on. On a
 * site with debugging set to DEVELOPER and display on, that message is printed
 * above every form that opens the editor.
 *
 * The capability is defined the way core's own subplugins define theirs: read
 * rather than write, because the plugin adds editor controls and stores nothing;
 * and allowed for the `user` archetype, so everyone who can already reach the
 * editor keeps the controls, while a site that wants to take them away from a
 * role now has somewhere to do it.
 *
 * Moodle 4.1 and 4.5 never check this, so it changes nothing there.
 *
 * @package     tiny_font_toolkit
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'tiny/font_toolkit:use' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'user' => CAP_ALLOW,
        ],
    ],
];
