<?php 


add_shortcode('twpc', function($atts, $content=null){

    $attributes = shortcode_atts([
        'type' => 'primary',
        'default_2' => 'default 2'
    ], $atts);

    return $content;
});