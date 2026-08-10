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
 * The named-size picker for tiny_font_toolkit.
 *
 * This is a picker with a fixed label and readable entry names, which the native
 * controls cannot provide: TinyMCE's `styles` dropdown is labelled "Formats" and
 * offers no way to rename it, and its `fontsize` dropdown carries values without
 * labels and falls back to the browser's computed size, so unstyled text reads
 * as "16px".
 *
 * Applying a size still goes through TinyMCE. `FontSize` is a built-in editor
 * command that takes any valid CSS font size, so the editor's own formatter does
 * the work and partial selections, nesting, undo and redo behave normally.
 *
 * @module      tiny_font_toolkit/commands
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {getString} from 'core/str';
import {component, sizeButtonName} from './common';
import {getNamedSizes} from './options';

/**
 * Build the editor setup function.
 *
 * @returns {Function}
 */
export const getSetup = async() => {
    const buttonText = await getString('sizebutton', component);

    return (editor) => {
        const sizes = getNamedSizes(editor);
        if (!sizes.length) {
            return;
        }

        const getItems = () => sizes.map(([text, size]) => ({
            type: 'menuitem',
            text,
            onAction: () => editor.execCommand('FontSize', false, size),
        }));

        editor.ui.registry.addMenuButton(sizeButtonName, {
            text: buttonText,
            tooltip: buttonText,
            fetch: (callback) => callback(getItems()),
        });

        editor.ui.registry.addNestedMenuItem(sizeButtonName, {
            text: buttonText,
            getSubmenuItems: getItems,
        });
    };
};
