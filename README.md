# Norton Simple

A WordPress theme with a retro Norton Utilities / DirectoryMaster aesthetic. Dark blue background, cyan headers, monospace font throughout, and the beveled-border UI elements of classic DOS-era software.

Requires WordPress 6.6 or later and PHP 7.4 or later. Tested against
WordPress 7.1.

## Features

- Norton Utilities-inspired visual design (circa 1991)
- Responsive two-column layout (stacks to single column on mobile)
- Primary navigation with OS-style raised/pressed button borders, including
  drop-down submenus that open on hover or keyboard focus
- Norton Box, Norton Box Invert and Norton Alert blocks, plus matching
  shortcodes for classic-editor content
- `theme.json` palette and type scale, so the block editor offers the theme's
  colours and nothing else
- Matching block editor styles — what you write is what readers get
- Customizable footer status text via the WordPress Customizer
- CRT edge-fade effects via CSS pseudo-elements
- Translation ready, with a POT file in `languages/`

## Installation

**From source (recommended):**

```bash
git clone https://github.com/markearnest/norton-simple.git
cd norton-simple
npm install
npm run build
```

Then upload `dist/norton-simple.zip` via **WP Admin → Appearance → Themes → Add New → Upload Theme**.

**Manual:**

Copy the theme folder directly to `wp-content/themes/norton-simple/` on your WordPress install and activate.

## Build

```bash
npm install       # install the single dev dependency (archiver)
npm run build     # → dist/norton-simple.zip
npm run clean     # remove dist/
```

The zip is self-contained — just the theme files, no dev artifacts.

## Blocks

Three blocks appear under the **Design** category in the inserter:

| Block | Effect |
|---|---|
| Norton Box | Raised bevel — content sits proud of the page |
| Norton Box Invert | Inset bevel — content sits recessed |
| Norton Alert | Status panel with an `[!]`, `[✓]` or `[✗]` glyph |

All three accept inner blocks, so anything can go inside them. They are
registered from `blocks/<name>/block.json` and rendered server-side by the
matching `render.php`, which means markup changes take effect on existing
posts without re-saving them.

## Shortcodes

For content written in the classic editor:

```
[norton_box]
Content displayed in a raised blue box.
[/norton_box]

[norton_alert]Generic alert with yellow [!] prefix[/norton_alert]
[norton_alert type="success"]Operation complete[/norton_alert]
[norton_alert type="error"]Operation failed[/norton_alert]
```

## Customizer Options

**Appearance → Customize → Footer**

| Setting | Default |
|---|---|
| Footer Status Text | `[SYS] OPERATIONAL` |

## File Structure

```
norton-simple/
├── theme.json                  Palette, type scale, spacing, layout
├── assets/
│   ├── css/
│   │   ├── norton-components.css  Tokens + box/alert/table chrome (shared with editor)
│   │   ├── norton.css             Front-end layout, header, nav, sidebar, footer
│   │   └── editor-style.css       Block editor canvas adjustments
│   └── js/
│       └── blocks.js           Editor-side block implementations
├── blocks/
│   ├── box/                    block.json + render.php
│   ├── box-invert/
│   └── alert/
├── inc/
│   ├── setup.php               Theme support, enqueue, sidebar, nav fallback
│   ├── customizer.php          Customizer controls
│   ├── shortcodes.php          [norton_box], [norton_box_invert], [norton_alert]
│   └── blocks.php              Block registration from block.json
├── languages/
│   └── norton-simple.pot       Translation template
├── template-parts/
│   ├── content.php             Generic post/archive content partial
│   ├── content-single.php      Single post full content
│   ├── content-page.php        Page full content
│   └── content-none.php        No results / 404 content
├── 404.php
├── archive.php
├── comments.php
├── search.php
├── footer.php
├── functions.php               Thin bootstrap — requires inc/ files
├── header.php
├── index.php
├── page.php
├── sidebar.php
├── single.php
├── style.css                   Theme header only (WordPress metadata)
├── build.js                    Build script
└── package.json
```

## License

This theme is licensed under the **GNU General Public License v3.0 or later** (GPL-3.0-or-later).

See [LICENSE](./LICENSE) file for full details. You are free to:
- Use this theme on any website
- Modify the code
- Distribute modified or unmodified versions

Under the condition that you:
- Include the original license and copyright notice
- Disclose the source code of any modifications
- Use the same license (GPL-3.0 or later) for any derivative works

For more information, visit https://www.gnu.org/licenses/gpl-3.0.html

## Styling

Colours, typography, spacing and the link/heading/button element styles are
declared in `theme.json`, and reach the browser as `--wp--preset--*` custom
properties. `assets/css/` styles only what `theme.json` has no field for:
layout, and the beveled chrome.

Neither stylesheet contains an `!important`. If a rule looks like it needs
one, the value almost certainly belongs in `theme.json` instead — that is
what makes the theme win the cascade without fighting it.
