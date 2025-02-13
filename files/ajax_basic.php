<?php  

add_action( 'wp_enqueue_scripts', 'tanvir_ajax_script' );

function tanvir_ajax_script(){

    wp_enqueue_script(
        'tanvir-ajax-script',
        plugin_dir_url(__FILE__) . '../js/tanvir-ajax-script.js',
        array( 'jquery' ),
        null,
        true
    );


     // Localize script to pass PHP variables to javascript
     wp_localize_script(
        'tanvir-ajax-script',
        'tanvir_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tanvir_ajax_nonce'),
        )
    );

    
}




// handle ajax request

add_action( 'wp_ajax_tanvir_ajax_action', 'tanvir_ajax_handler' );

function tanvir_ajax_handler(){
    check_ajax_referer('tanvir_ajax_nonce', 'nonce');

    var_dump($_POST);
}

?>


<button id="my-button">Click Me To Text Ajax</button>
<div id="result"></div>