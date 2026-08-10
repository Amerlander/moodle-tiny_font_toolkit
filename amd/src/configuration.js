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
 * Configuration for tiny_font_toolkit.
 *
 * Font size, font family and colour controls are built into the open-source
 * TinyMCE that Moodle already ships. Moodle strips them out of the Format menu
 * in editor_tiny/editor.js ("Remove fontfamily for now.", "Remove fontsize for
 * now.", and the same for forecolor and backcolor). That stripping runs *before*
 * plugins' configure() hooks, so they can be put back here.
 *
 * @module      tiny_font_toolkit/configuration
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {addMenubarItem, addToolbarButtons} from 'editor_tiny/utils';
import {pluginName, sizeButtonName} from './common';

/**
 * Get this plugin's admin settings, as returned by plugininfo.php.
 *
 * @param {object} options The editor setup options
 * @returns {object}
 */
const getPluginConfig = (options) => options?.plugins?.[pluginName]?.config ?? {};

/**
 * Flatten [label, value] pairs into TinyMCE's alternating colour list.
 *
 * @param {Array[]} colors
 * @returns {string[]}
 */
const toColorMap = (colors) => colors.flatMap(([label, value]) => [value, label]);

/**
 * Build the TinyMCE configuration overrides for the configured controls.
 *
 * @param {object} instanceConfig The TinyMCE configuration so far
 * @param {object} options The editor setup options
 * @returns {object} Configuration to merge over instanceConfig
 */
export const configure = (instanceConfig, options) => {
    const config = getPluginConfig(options);

    const namedSizes = config.namedsizes ?? [];
    const sizes = config.fontsizes ?? [];
    const families = config.fontfamilies ?? [];
    const textColors = config.textcolors ?? [];
    const backgroundColors = config.backgroundcolors ?? [];

    // Only offer a control once it has something to show. An admin who clears a
    // setting gets the control removed rather than an empty dropdown.
    const items = [];
    const override = {};

    if (namedSizes.length) {
        items.push(sizeButtonName);
    }

    if (sizes.length) {
        items.push('fontsize');
        // eslint-disable-next-line camelcase
        override.font_size_formats = sizes.join(' ');
    }

    if (families.length) {
        items.push('fontfamily');
        // TinyMCE wants `title=stack` entries separated by semicolons.
        // eslint-disable-next-line camelcase
        override.font_family_formats = families
            .map(([title, stack]) => `${title}=${stack}`)
            .join('; ');
    }

    // The two pickers take separate palettes, so a background list can hold the
    // pale tints that highlighting needs without those turning up as text
    // colours.
    if (textColors.length) {
        items.push('forecolor');
        // eslint-disable-next-line camelcase
        override.color_map_foreground = toColorMap(textColors);
        // eslint-disable-next-line camelcase
        override.color_cols_foreground = Math.min(textColors.length, 5);
    }

    if (backgroundColors.length) {
        items.push('backcolor');
        // eslint-disable-next-line camelcase
        override.color_map_background = toColorMap(backgroundColors);
        // eslint-disable-next-line camelcase
        override.color_cols_background = Math.min(backgroundColors.length, 5);
    }

    if (textColors.length || backgroundColors.length) {
        // eslint-disable-next-line camelcase
        override.custom_colors = !!config.customcolors;
    }

    // Moodle already lists removeformat in the Format menu, so it goes to the
    // toolbar only.
    const toolbarItems = config.removeformat ? [...items, 'removeformat'] : items;

    if (!toolbarItems.length) {
        return {};
    }

    override.toolbar = addToolbarButtons(instanceConfig.toolbar, 'formatting', toolbarItems);

    if (items.length) {
        override.menu = addMenubarItem(instanceConfig.menu, 'format', items.join(' '));
    }

    return override;
};
