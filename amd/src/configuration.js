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
 * This is the whole plugin. Font size, font family and colour controls are all
 * built into the open-source TinyMCE that Moodle already ships — Moodle just
 * strips them out of the Format menu in editor_tiny/editor.js ("Remove
 * fontfamily for now.", "Remove fontsize for now.", and the same for
 * styles/forecolor/backcolor) for accessibility reasons. That stripping happens
 * *before* plugins' configure() hooks run, so we can put them back here.
 *
 * Because these are native controls, there is no formatting logic to own: the
 * editor applies sizes through its own formatter, which handles partial
 * selections, nesting, undo and the active-state display correctly.
 *
 * @module      tiny_font_toolkit/configuration
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {addMenubarItem, addToolbarButtons} from 'editor_tiny/utils';
import {pluginName} from './common';

/**
 * Get this plugin's admin settings, as returned by plugininfo.php.
 *
 * @param {object} options The editor setup options
 * @returns {object}
 */
const getPluginConfig = (options) => options?.plugins?.[pluginName]?.config ?? {};

/**
 * Build the TinyMCE configuration overrides for the configured controls.
 *
 * @param {object} instanceConfig The TinyMCE configuration so far
 * @param {object} options The editor setup options
 * @returns {object} Configuration to merge over instanceConfig
 */
export const configure = (instanceConfig, options) => {
    const config = getPluginConfig(options);

    const sizes = config.fontsizes ?? [];
    const namedSizes = config.namedsizes ?? [];
    const families = config.fontfamilies ?? [];
    const colors = config.colors ?? [];

    // Only offer a control once it has something to show. An admin who clears
    // a setting gets the control removed rather than an empty dropdown.
    const items = [];
    const override = {};

    if (sizes.length) {
        items.push('fontsize');
        // eslint-disable-next-line camelcase
        override.font_size_formats = sizes.join(' ');
    }

    if (namedSizes.length) {
        items.push('styles');
        // Replaces TinyMCE's stock style list, which is why re-enabling
        // `styles` here doesn't reintroduce what Moodle objected to.
        // eslint-disable-next-line camelcase
        override.style_formats = namedSizes.map(([title, value]) => ({
            title,
            inline: 'span',
            styles: {'font-size': value},
        }));
    }

    if (families.length) {
        items.push('fontfamily');
        // TinyMCE wants `title=stack` entries separated by semicolons.
        // eslint-disable-next-line camelcase
        override.font_family_formats = families
            .map(([title, stack]) => `${title}=${stack}`)
            .join('; ');
    }

    if (colors.length) {
        items.push('forecolor', 'backcolor');
        // TinyMCE wants a flat list alternating colour value and colour name.
        // eslint-disable-next-line camelcase
        override.color_map = colors.flatMap(([label, value]) => [value, label]);
        // eslint-disable-next-line camelcase
        override.color_cols = Math.min(colors.length, 5);
        // eslint-disable-next-line camelcase
        override.custom_colors = !!config.customcolors;
    }

    if (!items.length) {
        return {};
    }

    override.toolbar = addToolbarButtons(instanceConfig.toolbar, 'formatting', items);
    override.menu = addMenubarItem(instanceConfig.menu, 'format', items.join(' '));

    return override;
};
