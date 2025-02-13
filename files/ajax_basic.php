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

    
}

?>


<button id="my-button">Click Me To Text Ajax</button>
<div id="result"></div>