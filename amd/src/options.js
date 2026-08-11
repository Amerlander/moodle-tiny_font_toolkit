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
 * Editor options for tiny_font_toolkit.
 *
 * The size and font family lists are needed when the editor is set up rather
 * than while its configuration is being assembled, so they are registered as
 * editor options. Moodle namespaces this plugin's PHP config into the TinyMCE
 * init values under exactly these names, see getInitialPluginConfiguration() in
 * editor_tiny/options, so registering the option is enough to read the value.
 *
 * @module      tiny_font_toolkit/options
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {getPluginOptionName} from 'editor_tiny/options';
import {pluginName} from './common';

const namedSizesName = getPluginOptionName(pluginName, 'namedsizes');
const fontFamiliesName = getPluginOptionName(pluginName, 'fontfamilies');

/**
 * Register this plugin's editor options.
 *
 * @param {TinyMCE} editor
 */
export const register = (editor) => {
    editor.options.register(namedSizesName, {
        processor: 'array',
        "default": [],
    });

    editor.options.register(fontFamiliesName, {
        processor: 'array',
        "default": [],
    });
};

/**
 * Get the configured named sizes as [label, value] pairs.
 *
 * @param {TinyMCE} editor
 * @returns {Array[]}
 */
export const getNamedSizes = (editor) => editor.options.get(namedSizesName);

/**
 * Get the configured font families as [label, stack] pairs.
 *
 * @param {TinyMCE} editor
 * @returns {Array[]}
 */
export const getFontFamilies = (editor) => editor.options.get(fontFamiliesName);
