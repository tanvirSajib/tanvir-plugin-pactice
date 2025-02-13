<?php 

// Enqueue the JavaScript file
add_action( 'wp_enqueue_scripts', 'tanvir_enqueue_ajax_script' );

function tanvir_enqueue_ajax_script() {
    // Enqueue the script
    wp_enqueue_script(
        'tanvir-rest-api-script',
        plugin_dir_url(__FILE__) . '../js/tanvir-rest-api-script.js', // Path to your script
        array( 'jquery' ), // Dependencies
        null,              // Version (null to avoid cache issues during development)
        true               // Load in footer
    );

    // Localize script to pass the REST API URL
    wp_localize_script('tanvir-rest-api-script', 'tanvirApi', array(
        'restUrl' => esc_url_raw(rest_url('tanvir-rest/v1/tanvir-endpoint/')),
        'nonce'   => wp_create_nonce('wp_rest') // Security nonce for REST API
    ));
}

// Register the REST API endpoint
add_action('rest_api_init', 'tanvir_register_rest_route');

function tanvir_register_rest_route() {
    register_rest_route('tanvir-rest/v1', '/tanvir-endpoint/', array(
        'methods'  => 'POST',
        'callback' => 'tanvir_rest_callback',
        'permission_callback' => '__return_true', // Allow anyone to access for now; customize as needed
    ));
}

// REST API callback function
function tanvir_rest_callback($request) {
    // Get the 'name' parameter from the request and sanitize it
    $name = sanitize_text_field($request->get_param('name'));

    // Return a response
    if (!empty($name)) {
        return new WP_REST_Response(array(
            'message' => "Hello, $name!"
        ), 200);
    } else {
        return new WP_REST_Response(array(
            'error' => 'Name parameter is missing.'
        ), 400);
    }
}
