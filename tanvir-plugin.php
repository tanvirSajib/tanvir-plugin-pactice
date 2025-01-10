<?php 
/*
 * Plugin Name:       A Tanvir Plugin
 * Plugin URI:        www://tanvir-pluign.com
 * Description:       Learning Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tanvir
 * Author URI:        https://tanvir.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       tanvir-plugin
 */

 //include "files/custom_post.php";

 //include "files/meta.php";

//  include "files/shortcode.php";

// include "files/users.php";

register_activation_hook( __FILE__, 'wp_learn_add_caps');
function wp_learn_add_caps() {
    $editor_role = get_role( 'editor' );

    $editor_role->add_cap( 'activate_plugins' );
    $editor_role->add_cap( 'update_plugins' );
}


register_deactivation_hook( __FILE__, 'wp_learn_remove_caps');
function wp_learn_remove_caps() {
    $editor_role = get_role( 'editor' );
    $editor_role->remove_cap( 'activate_plugins' );
    $editor_role->remove_cap( 'update_plugins' );
}


add_action( 'admin_menu', 'wp_learn_submenu', 11 );
function wp_learn_submenu(){
    add_submenu_page(
        'tools.php',
        'Wp learn capabilites',
        'Wp learn cpabilites',
        'manage_options',
        'wp_learn_admin',
        'wp_learn_render_admin_page'
    );
}


function wp_learn_render_admin_page() {
    $role = get_role( 'editor' );
    echo '<pre>';
    print_r( $role );
    echo '</pre>';
}












