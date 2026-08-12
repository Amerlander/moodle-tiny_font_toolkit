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
 * Strings for tiny_font_toolkit (German).
 *
 * German is the only translation shipped with the plugin, and it is here to
 * cover the window before AMOS carries this component. Once the German language
 * pack does, this file stops having any effect: load_component_strings() reads a
 * plugin's own lang/<code>/ first and the installed language pack second, so the
 * pack silently wins. Every other language belongs in AMOS from the start.
 *
 * The window matters because the `default_*` values below are written into
 * config_plugins at install time and belong to the administrator from then on. A
 * German site installing before the pack knows this component would otherwise
 * freeze English size and colour labels into its editor for good.
 *
 * Keys are in alphabetical order, as required by moodle.Files.LangFilesOrdering.
 * The `default_*` entries are not UI labels: they are the shipped default values
 * for the matching admin settings, so they are safe to translate and to change.
 *
 * @package     tiny_font_toolkit
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['backgroundcolors'] = 'Hintergrundfarben';
$string['backgroundcolors_desc'] = 'Einträge für den Hintergrundfarb-Wähler, eine pro Zeile als '
    . '<code>Bezeichnung|#rrggbb</code>. Auf hellen Tönen bleibt Text lesbar, deshalb enthält die '
    . 'mitgelieferte Liste nur solche. Leer lassen blendet den Wähler aus.';
$string['customcolors'] = 'Freie Farbwahl erlauben';
$string['customcolors_desc'] = 'Ergänzt beide Farbwähler um einen vollständigen Farbwähler. '
    . 'Ausschalten hält alle auf den Listen oben.';
$string['default_backgroundcolors'] = 'Gelb|#fff3b0
Orange|#ffe0c2
Rot|#fbd5d5
Rosa|#fbdde8
Violett|#e9ddf7
Blau|#d8e8fc
Petrol|#d2eded
Grün|#d9f0d9
Grau|#eaeaea
Weiß|#ffffff';
$string['default_fontfamilies'] = 'Theme-Standard|inherit
Serif|Georgia, \'Times New Roman\', serif
Sans Serif|system-ui, -apple-system, \'Segoe UI\', Roboto, sans-serif
Monospace|ui-monospace, \'Cascadia Code\', \'Courier New\', monospace';
$string['default_sizes'] = 'Klein|0.875rem
Normal|1rem
Groß|1.25rem
Sehr groß|1.5rem';
$string['default_textcolors'] = 'Schwarz|#000000
Dunkelgrau|#5a5a5a
Rot|#b3261e
Orange|#a15c00
Gelb|#8a6d00
Grün|#1e6b3a
Petrol|#00696e
Blau|#1155cc
Violett|#6b21a8
Weiß|#ffffff';
$string['familybutton'] = 'Schriftart';
$string['fontfamilies'] = 'Schriftarten';
$string['fontfamilies_desc'] = 'Einträge für den Schriftart-Wähler, eine pro Zeile als '
    . '<code>Bezeichnung|Font-Stack</code>. Der Stack darf kein Semikolon enthalten. '
    . '<code>inherit</code> setzt auf die Theme-Schrift zurück. Leer lassen blendet den Wähler aus.';
$string['groupcolors'] = 'Farben';
$string['groupfonts'] = 'Schriftarten';
$string['groupother'] = 'Weiteres';
$string['groupsizes'] = 'Größen';
$string['pluginname'] = 'Schriftwerkzeuge';
$string['privacy:metadata'] = 'Die Schriftwerkzeuge ergänzen lediglich Editor-Bedienelemente, die auf '
    . 'Website-Ebene konfiguriert werden. Sie speichern keine personenbezogenen Daten.';
$string['removeformat'] = 'Schaltfläche „Formate löschen“';
$string['removeformat_desc'] = 'Ergänzt die Toolbar um TinyMCEs Schaltfläche zum Löschen der '
    . 'Formatierung. Im Format-Menü ist sie unabhängig von dieser Einstellung immer verfügbar.';
$string['showdefault'] = 'Mitgelieferte Vorgabe anzeigen';
$string['sizebutton'] = 'Größe';
$string['sizes'] = 'Größen';
$string['sizes_desc'] = 'Eine Größe pro Zeile. Mit Bezeichnung als <code>Bezeichnung|Wert</code> '
    . 'geschrieben, etwa <code>Groß|1.25rem</code>, entsteht ein Wähler mit lesbaren Einträgen. '
    . 'Stehen dort nackte Werte wie <code>1.25rem</code>, wird TinyMCEs eigenes Größen-Menü '
    . 'verwendet, das den Wert selbst anzeigt und für Text ohne gesetzte Größe auf den vom Browser '
    . 'berechneten Wert zurückfällt. <code>rem</code> verwenden: es skaliert mit der '
    . 'Browser-Schriftgröße der Lesenden und potenziert sich, anders als <code>em</code>, nicht '
    . 'innerhalb bereits vergrößerten Textes. Leer lassen blendet das Bedienelement aus.';
$string['textcolors'] = 'Textfarben';
$string['textcolors_desc'] = 'Einträge für den Textfarb-Wähler, eine pro Zeile als '
    . '<code>Bezeichnung|#rrggbb</code>. Die Bezeichnungen werden von Screenreadern vorgelesen, '
    . 'also die Farbe benennen, nicht ihren Zweck. Leer lassen blendet den Wähler aus.';
$string['toolbarbackgroundcolors'] = 'Hintergrundfarbe in der Toolbar';
$string['toolbarbackgroundcolors_desc'] = 'Aus lässt sie nur im Format-Menü.';
$string['toolbarfontfamilies'] = 'Schriftarten in der Toolbar';
$string['toolbarfontfamilies_desc'] = 'Aus lässt den Wähler nur im Format-Menü.';
$string['toolbarsizes'] = 'Größen in der Toolbar';
$string['toolbarsizes_desc'] = 'Aus lässt den Wähler nur im Format-Menü.';
$string['toolbartextcolors'] = 'Textfarbe in der Toolbar';
$string['toolbartextcolors_desc'] = 'Aus lässt sie nur im Format-Menü.';
