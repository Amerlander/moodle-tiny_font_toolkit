# tiny_font_toolkit

[![Moodle 4.5](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-4.5.yml/badge.svg)](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-4.5.yml)
[![Moodle 5.0](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-5.0.yml/badge.svg)](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-5.0.yml)
[![Moodle 5.1](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-5.1.yml/badge.svg)](https://github.com/Amerlander/moodle-tiny_font_toolkit/actions/workflows/moodle-5.1.yml)
[![Licence: GPL v3](https://img.shields.io/badge/licence-GPLv3-blue.svg)](LICENSE)

A Moodle TinyMCE subplugin that adds font size, font family and colour controls
to the editor toolbar and Format menu.

The controls are TinyMCE's own. Moodle removes them from its editor
configuration in `lib/editor/tiny/amd/src/editor.js`, and this plugin adds them
back with the sizes, fonts and colours an administrator configures. It registers
no editor commands of its own, so the editor applies formatting through its
normal formatter.

## Requirements

Moodle 4.1 (2022112800) or later. No other dependencies.

## Installation

Copy or clone this repository into your Moodle installation at:

```
lib/editor/tiny/plugins/font_toolkit
```

On Moodle 5.1 and later the web tree lives under `public/`, so the path is
`public/lib/editor/tiny/plugins/font_toolkit`. Then visit Site administration »
Notifications to finish the install.

## Controls

| Control | TinyMCE item |
| --- | --- |
| Font size dropdown | `fontsize`, via `font_size_formats` |
| Named sizes in the styles dropdown | `styles`, via `style_formats` |
| Font family dropdown | `fontfamily`, via `font_family_formats` |
| Text and background colour | `forecolor` and `backcolor`, via `color_map` |

Both colour pickers share one list of colours, shown as a swatch grid.

## Settings

Site administration » Plugins » Text editors » TinyMCE editor » Font toolkit

| Setting | Value |
| --- | --- |
| Font sizes | One size per line, each with a CSS unit |
| Named sizes | `Label\|value` per line, for example `Large\|1.25rem` |
| Font families | `Label\|font stack` per line; the stack cannot contain `;` |
| Colours | `Label\|#rrggbb` per line |
| Allow free colour choice | Adds the full colour picker beside the palette |

Clearing a setting removes its control. An empty colour list means no colour
buttons rather than two empty pickers.

The shipped sizes are in `rem`, which scales with the reader's browser font size
and does not compound when applied inside text that already carries a size.
Two constraints are worth knowing before changing them:

- `font_size_formats` carries values only, so the size dropdown shows the raw
  value such as `1.25rem`. The named sizes setting exists for readable labels.
- `font_size_input_default_unit` accepts `pt`, `px`, `em`, `cm` and `mm`, so
  `rem` is unavailable there. The plugin offers the `fontsize` select and not
  the `fontsizeinput` field.

Colour labels are read out by screen readers, so name the colour rather than its
purpose.

## Building the AMD modules

Moodle serves `amd/build/*.min.js`, so the build output is committed. Edit
`amd/src/`, then run the "Rebuild AMD bundles" workflow from the Actions tab. It
regenerates `amd/build/` with Moodle's Grunt and commits the result. The CI
workflows check on every push that the two are in sync, and they also run ESLint
over `amd/src/`.

Moodle's build makes an `export default` the AMD module's return value, and
`editor_tiny` depends on that: it loads a subplugin with a bare
`require([path], resolve)` and tests the result with `Array.isArray()`. A build
without that return produces an editor that loads normally and shows none of the
controls, so use Moodle's Grunt rather than a stock Babel AMD transform. For a
local build, run `grunt amd --root=lib/editor/tiny/plugins/font_toolkit` in a
full Moodle checkout.

Because the rebuild workflow commits with `GITHUB_TOKEN`, its commit does not
trigger the CI workflows. Dispatch them manually to refresh the badges.

## Licence

GNU GPL v3 or later.
