// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Common values for tiny_font_toolkit.
 *
 * @module      tiny_font_toolkit/common
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export const component = 'tiny_font_toolkit';

// Moodle registers tiny subplugins under "<component>/plugin", see
// editor_tiny\manager::get_plugin_configuration(). This is also the key our
// PHP config arrives under in `options.plugins`.
export const pluginName = `${component}/plugin`;

// The size and font family pickers are registered by this plugin rather than
// reused from TinyMCE, so they need names of their own. Everything else uses a
// native item name.
export const sizeButtonName = `${component}_size`;
export const familyButtonName = `${component}_family`;

// Icon names, registered in icons.js. TinyMCE's pack has no font size or font
// family icon.
export const sizeIconName = `${component}_size_icon`;
export const familyIconName = `${component}_family_icon`;
