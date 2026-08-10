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

## Versioning

`main` carries development. Each release gets a tag such as `v1.0.0`, and the
`v1` branch points at the newest 1.x release. Pin the branch to follow 1.x, or a
tag for an exact version:

```
git clone --branch v1     https://github.com/Amerlander/moodle-tiny_font_toolkit.git
git clone --branch v1.0.0 https://github.com/Amerlander/moodle-tiny_font_toolkit.git
```

A new major version lands on `main` and gets its own branch, so a `v1` pin never
picks it up.

## Installation

Copy or clone this repository into your Moodle installation at:

```
lib/editor/tiny/plugins/font_toolkit
```

On Moodle 5.1 and later the web tree lives under `public/`, so the path is
`public/lib/editor/tiny/plugins/font_toolkit`. Then visit Site administration »
Notifications to finish the install.

## Controls

| Control | Backed by |
| --- | --- |
| Size picker with named entries | The `FontSize` editor command |
| Exact size dropdown, off by default | `fontsize`, via `font_size_formats` |
| Font family dropdown | `fontfamily`, via `font_family_formats` |
| Text colour | `forecolor`, via `color_map_foreground` |
| Background colour | `backcolor`, via `color_map_background` |
| Clear formatting | `removeformat` |

The size picker is the one control the plugin registers itself, because the
native ones cannot be labelled: TinyMCE's `styles` dropdown is fixed to
"Formats", and its `fontsize` dropdown carries values without labels and falls
back to the browser's computed size, so unstyled text reads as `16px`. Applying a
size still goes through the editor's own formatter via the built-in `FontSize`
command.

The two colour pickers take separate palettes, so the background list can hold
the pale tints that highlighting needs without those appearing as text colours.

## Settings

Site administration » Plugins » Text editors » TinyMCE editor » Font toolkit

| Setting | Value |
| --- | --- |
| Sizes | `Label\|value` per line, for example `Large\|1.25rem` |
| Exact sizes | One CSS size per line; ships empty |
| Font families | `Label\|font stack` per line; the stack cannot contain `;` |
| Text colours | `Label\|#rrggbb` per line |
| Background colours | `Label\|#rrggbb` per line; ships with pale tints only |
| Allow free colour choice | Adds the full colour picker to both swatches; on by default |
| Clear formatting button | Adds `removeformat` to the toolbar; on by default |

Clearing a list setting removes its control. An empty background colour list
means no highlight button rather than an empty picker.

The shipped sizes are in `rem`, which scales with the reader's browser font size
and does not compound when applied inside text that already carries a size. Do
not switch them to `em`, which is relative to the parent and multiplies when
nested.

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
