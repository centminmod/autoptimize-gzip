<?php
/*
Plugin name: Autoptimize Gzip
Description: Hook into Frank Goossens (futtta) Autoptimize API to pre-compress CSS/JS files
Author: George Liu
Author URI: https://github.com/centminmod/autoptimize-gzip
Version: 0.1
Released under the GNU General Public License (GPL)
http://www.gnu.org/licenses/gpl.txt
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active('autoptimize/autoptimize.php') ) {
  add_filter('autoptimize_filter_cache_create_static_gzip','__return_true');
}