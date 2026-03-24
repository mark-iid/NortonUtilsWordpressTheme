# Norton Simple

A WordPress theme with a retro Norton Utilities / DirectoryMaster aesthetic. Dark blue background, cyan headers, monospace font throughout, and the beveled-border UI elements of classic DOS-era software.

## Features

- Norton Utilities-inspired visual design (circa 1991)
- Responsive two-column layout (stacks to single column on mobile)
- Primary navigation with OS-style raised/pressed button borders
- `[norton_box]` and `[norton_alert]` shortcodes
- Customizable footer status text via the WordPress Customizer
- CRT edge-fade effects via CSS pseudo-elements
- Nuclear CSS injection layer to survive block editor style conflicts

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

## Shortcodes

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
├── assets/
│   └── css/
│       └── norton.css          Main stylesheet
├── inc/
│   ├── setup.php               Theme support, enqueue, sidebar, nav walker, nuclear CSS
│   ├── customizer.php          Customizer controls
│   └── shortcodes.php          [norton_box] and [norton_alert]
├── template-parts/
│   ├── content.php             Generic post/archive content partial
│   ├── content-single.php      Single post full content
│   ├── content-page.php        Page full content
│   └── content-none.php        No results / 404 content
├── 404.php
├── archive.php
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
