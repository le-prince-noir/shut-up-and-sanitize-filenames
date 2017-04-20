=== Shut up and sanitize filenames ===
Contributors: leprincenoir
Tags: sanitize, upload, filenames, files, images, media 
Requires at least: 3.5
Tested up to: 4.7.3
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically clean the filenames.

== Description ==

The plugin uses the hook "wp_handle_upload_prefilter" and modifies the filename to remove all special characters.

FEATURES
- Remove accents
- Remove special characters
- Change the filename to lowercase

Example : 
- filename : rick & morty.png > rick-morty.png
- filename : finaL fantasy / (Copié) (Copié).jpg > final-fantasy-copie-copie.jpg



== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/shut-up-and-sanitize-filenames` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

(soon)

== Screenshots ==

(soon)

== Changelog ==

= 1.0.0 =
* 20 April 2017
* Initial release \o/