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
 * Both are third-party icons under the MIT licence, which GPL-3.0 code may
 * include:
 *
 * - Size: `font-size` from Iconoir, https://github.com/iconoir-icons/iconoir
 * - Font: `fonts` from Bootstrap Icons, https://github.com/twbs/icons
 *
 * They are unmodified apart from replacing the `1em` width and height with 24,
 * matching the size TinyMCE's own icons declare. Note the two come from
 * different grids, 24 for Iconoir and 16 for Bootstrap Icons, so the second
 * scales up and reads a little heavier.
 *
 * @module      tiny_font_toolkit/icons
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

const size = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">'
    + '<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" '
    + 'stroke-width="1.5" d="M18 21V11m0 10l-2-2.5m2 2.5l2-2.5M18 11l-2 2m2-2l2 2M9 5v12m0 0H7m2 '
    + '0h2m4-10V5H3v2"/></svg>';

const family = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">'
    + '<path fill="currentColor" d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845'
    + 'l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602'
    + 'l.431.013c1.934.062 2.434.301 2.693 1.846h.479z"/></svg>';

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
