#!/usr/bin/env node
/**
 * Norton Simple — Build Script
 *
 * Packages the theme for WordPress deployment.
 *
 * Output: dist/norton-simple.zip
 *         └── norton-simple/        ← WordPress expects the folder name here
 *             ├── assets/
 *             ├── inc/
 *             ├── template-parts/
 *             ├── functions.php
 *             ├── style.css
 *             └── ...
 *
 * Usage:
 *   npm install
 *   npm run build
 */

'use strict';

const archiver = require('archiver');
const fs       = require('fs');
const path     = require('path');

const THEME_SLUG  = 'norton-simple';
const SRC_DIR     = __dirname;
const DIST_DIR    = path.join(SRC_DIR, 'dist');
const OUTPUT_FILE = path.join(DIST_DIR, `${THEME_SLUG}.zip`);

// Paths (relative to SRC_DIR) to exclude from the zip.
// These are dev/repo artifacts that don't belong in a WP theme install.
const EXCLUDE_NAMES = new Set([
  'node_modules',
  'dist',
  '.git',
  '.gitignore',
  'package.json',
  'package-lock.json',
  'build.js',
  'README.md',
  '.DS_Store',
  'Thumbs.db',
]);

// ── helpers ──────────────────────────────────────────────────────────────────

function shouldExclude(name) {
  return EXCLUDE_NAMES.has(name) || name.startsWith('.');
}

/**
 * Recursively add files from sourceDir into the archive under archiveBase.
 *
 * @param {import('archiver').Archiver} archive
 * @param {string} sourceDir  Absolute path on disk.
 * @param {string} archiveBase  Path prefix inside the zip.
 */
function addDir(archive, sourceDir, archiveBase) {
  const entries = fs.readdirSync(sourceDir, { withFileTypes: true });
  for (const entry of entries) {
    if (shouldExclude(entry.name)) continue;

    const srcPath  = path.join(sourceDir, entry.name);
    const destPath = path.posix.join(archiveBase, entry.name); // posix paths in zip

    if (entry.isDirectory()) {
      addDir(archive, srcPath, destPath);
    } else {
      archive.file(srcPath, { name: destPath });
    }
  }
}

// ── main ─────────────────────────────────────────────────────────────────────

if (!fs.existsSync(DIST_DIR)) {
  fs.mkdirSync(DIST_DIR, { recursive: true });
}

const output  = fs.createWriteStream(OUTPUT_FILE);
const archive = archiver('zip', { zlib: { level: 9 } });

output.on('close', () => {
  const kb = (archive.pointer() / 1024).toFixed(1);
  console.log(`\n✓  Built: ${path.relative(SRC_DIR, OUTPUT_FILE)}  (${kb} KB)`);
  console.log(`   Install via WP Admin → Appearance → Themes → Add New → Upload Theme\n`);
});

archive.on('error',   (err) => { throw err; });
archive.on('warning', (err) => {
  if (err.code !== 'ENOENT') throw err;
  console.warn('Warning:', err.message);
});

archive.pipe(output);

// Add all theme files under the norton-simple/ prefix so WordPress extracts
// them into wp-content/themes/norton-simple/.
addDir(archive, SRC_DIR, THEME_SLUG);

archive.finalize();
