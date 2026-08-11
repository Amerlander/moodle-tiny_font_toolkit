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
 * Toolbar icons for tiny_font_toolkit.
 *
 * TinyMCE's icon pack covers the native controls this plugin re-enables:
 * `remove-formatting`, `text-color` and `highlight-bg-color` all ship with it.
 * It has no font size or font family icon, so those two are supplied here.
 *
 * Drawn as strokes on a 24x24 grid using currentColor, which is how TinyMCE
 * inlines and themes its own icons.
 *
 * @module      tiny_font_toolkit/icons
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

const open = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" '
    + 'stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">';

// A large A beside a small one, the usual shorthand for a size picker.
const size = `${open}<path d="M2 20 7.5 5 13 20"/><path d="M4.2 15.3h6.6"/>`
    + '<path d="M15 20l3.4-8.5L21.8 20"/><path d="M16.2 17.3h4.4"/></svg>';

// A slab-serif T: stem, cap and foot serifs, reading as a typeface.
const family = `${open}<path d="M3.5 5.5h17"/><path d="M12 5.5v13"/><path d="M7.5 18.5h9"/></svg>`;

/**
 * Register this plugin's icons with the editor.
 *
 * Icons have to exist before a control referencing them is registered.
 *
 * @param {TinyMCE} editor
 * @param {string} sizeIcon Icon name for the size picker
 * @param {string} familyIcon Icon name for the font family picker
 */
export const register = (editor, sizeIcon, familyIcon) => {
    editor.ui.registry.addIcon(sizeIcon, size);
    editor.ui.registry.addIcon(familyIcon, family);
};
