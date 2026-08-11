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
 * The size and font family pickers for tiny_font_toolkit.
 *
 * Both are registered here rather than reused from TinyMCE, for two reasons.
 * They can then carry a label and an icon: TinyMCE's `styles` dropdown is fixed
 * to "Formats" with no way to rename it, its `fontsize` dropdown carries values
 * without labels and falls back to the browser's computed size so unstyled text
 * reads as "16px", and its native nested menu items reference no icon at all.
 *
 * Applying a size or a font still goes through TinyMCE. `FontSize` and
 * `FontName` are built-in editor commands, so the editor's own formatter does
 * the work and partial selections, nesting, undo and redo behave normally.
 *
 * @module      tiny_font_toolkit/commands
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {getString} from 'core/str';
import {
    component,
    familyButtonName,
    familyIconName,
    sizeButtonName,
    sizeIconName,
} from './common';
import * as Icons from './icons';
import {getFontFamilies, getNamedSizes} from './options';

/**
 * Register one picker as both a toolbar button and a Format menu entry.
 *
 * @param {TinyMCE} editor
 * @param {object} picker
 * @param {string} picker.name Registry name
 * @param {string} picker.icon Icon name
 * @param {string} picker.label Button text and tooltip
 * @param {string} picker.command Built-in editor command to apply a value
 * @param {Array[]} picker.entries [label, value] pairs
 */
const addPicker = (editor, {name, icon, label, command, entries}) => {
    const getItems = () => entries.map(([text, value]) => ({
        type: 'menuitem',
        text,
        onAction: () => editor.execCommand(command, false, value),
    }));

    editor.ui.registry.addMenuButton(name, {
        icon,
        text: label,
        tooltip: label,
        fetch: (callback) => callback(getItems()),
    });

    editor.ui.registry.addNestedMenuItem(name, {
        icon,
        text: label,
        getSubmenuItems: getItems,
    });
};

/**
 * Build the editor setup function.
 *
 * @returns {Function}
 */
export const getSetup = async() => {
    const [sizeLabel, familyLabel] = await Promise.all([
        getString('sizebutton', component),
        getString('familybutton', component),
    ]);

    return (editor) => {
        Icons.register(editor, sizeIconName, familyIconName);

        const sizes = getNamedSizes(editor);
        if (sizes.length) {
            addPicker(editor, {
                name: sizeButtonName,
                icon: sizeIconName,
                label: sizeLabel,
                command: 'FontSize',
                entries: sizes,
            });
        }

        const families = getFontFamilies(editor);
        if (families.length) {
            addPicker(editor, {
                name: familyButtonName,
                icon: familyIconName,
                label: familyLabel,
                command: 'FontName',
                entries: families,
            });
        }
    };
};
