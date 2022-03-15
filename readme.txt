===  WP CLI for FaustJS ===
Contributors: Maurice Tadros
Tags: FaustJS WP CLI
Requires at least: 5.9.2
Tested up to: 5.9
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

/**
  * Plugin URI: https://github.com/Bowriverstudio/faustjs-wp-cli
  * GitHub Plugin URI: https://github.com/Bowriverstudio/faustjs-wp-cli
  */

This Plugin 


# List all the FaustJS settings.
wp faustjs settings

+------------------+----------------------------------------+
| name             | value                                  |
+------------------+----------------------------------------+
| frontend_uri     | http://localhost:3000                  |
| secret_key       | xxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxx     |
| menu_locations   | Primary, Footer,                       |
| disable_theme    | 1                                      |
| enable_rewrites  | 1                                      |
| enable_redirects | 1                                      |
+------------------+----------------------------------------+

# Updates a specific setting.
wp faustjs update_setting --setting="frontend_uri" --value="http://localhost:3000"
