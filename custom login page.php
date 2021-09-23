<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Muhammad Asif
 * @copyright         2021 Muhammad Asif
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Login Page
 * Plugin URI:        https://www.fiverr.com/asifkhan855
 * Description:       Custom Admin Login Page Demo for Walk-in interview at IPLEX PVT LTD.
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.2
 * Author:            Muhammad Asif
 * Author URI:        https://www.fiverr.com/asifkhan855
 * Text Domain:       custom-login-page
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://www.fiverr.com/asifkhan855
 */

require(plugin_dir_path(__FILE__) . 'admin/admin.php');

// enqueueing the custom style sheet on WordPress login page
function clp_login_stylesheet() {
    // Load the style sheet from the plugin folder
    //wp_enqueue_style( 'styles', dirname(__FILE__) . '/styles.php' );
    require(dirname(__FILE__) . '/styles.php');
}
add_action( 'login_enqueue_scripts', 'clp_login_stylesheet');

//require(dirname(__FILE__) . '/styles.php');