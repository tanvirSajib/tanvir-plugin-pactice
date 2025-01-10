<?php 

function tp_custom_post_type() {
    
    register_post_type('tp_product',
    // ('tp_product') is the unique slug (identifier) for the post type. This is how you will refer to this custom post type in your code.
		array(
			'labels'      => array(
				'name'          => __('Tanvir Products', 'textdomain'), 
                'singular_name' => __('Product Singular', 'textdomain'), 
                // __(): A WordPress translation function that ensures the text can be translated into other languages.
			),
				'public'      => true,               
				'has_archive' => true,
                'publicly_queryable' => true,       
                'rewrite'     => array( 'slug' => 'tanvir-products' )   
		)
	);
}



add_action('init', 'tp_custom_post_type');

function tp_add_custom_post_types($query) {
    if(is_home() && $query->is_main_query())
    {
        $query->set( 'post_type', array( 'post', 'tp_product'));
    }
}
add_action('pre_get_posts', 'tp_add_custom_post_types');