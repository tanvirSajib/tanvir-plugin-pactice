<?php 


register_activation_hook( __FILE__)

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