![WP CLI FaustJS](./banner.png)

=== WPGraphQL ===
Contributors: Maurice
Tags: WP CLI, FaustJS
Requires PHP: 7.1
Stable tag: 1.0.1
License: GPL-3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

=== Description ===

Adds two WP CLI commands

```bash

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

```

=== Dependencies ===

https://wordpress.org/plugins/faustjs/

```

```
