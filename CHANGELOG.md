# Changelog

What changed for the people running the site. Build, CI and packaging work is
left out; the commit history has it.

## 1.8.1

No functional changes.

## 1.8.0

German is included with the plugin. On a German site the controls and the names
of the default sizes and colours come up in German.

## 1.7.0

The font size entry field is gone. It reported the browser's computed size, so it
stepped in `px` whatever unit was configured.

The shipped default lists follow the site language instead of always being
English. Moodle writes them when it applies plugin defaults, so this affects new
installations rather than existing settings.

## 1.6.1

The settings page groups its settings and keeps the shipped defaults behind a
disclosure.

Clearing a list now removes its control from the toolbar and the Format menu.
Before, an empty list gave an empty dropdown.

## 1.4.0

The size and font buttons show their icon without a label, matching the rest of
Moodle's toolbar.

## 1.3.1

Fixes a fatal error on PHP 7.4, which Moodle 4.1 still allows.

## 1.3.0

One setting for sizes instead of two. A list that names its entries
(`Large|1.25rem`) gives a labelled picker, a list of bare values gives TinyMCE's
own dropdown.

Each control has its own checkbox for whether it appears in the toolbar. Turning
one off leaves the control in the Format menu.

Releases carry an installable ZIP, so *Install plugins from a ZIP file* works.

## 1.2.0

The size and font pickers have icons.

## 1.1.0

Text and background colours take separate palettes, so the pale tints that
highlighting needs no longer turn up as text colours.

A clear formatting button, on by default.

## 1.0.0

First release. Re-enables TinyMCE's font size, font family, text colour and
background colour controls, with the values an administrator configures.
