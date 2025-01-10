<?php 


function tp_add_custom_meta_boxes() {   

    add_meta_box(
        'tp_box_id', // unique Id
        'Custom Metabox Title', // box title
        'tp_custom_metabox_html', // callback
        'post' // post type
    );
    
}
add_action( 'add_meta_boxes', 'tp_add_custom_meta_boxes');

function tp_custom_metabox_html() {
    ?>
    <label for="tp_field">Description of the field.</label>
    <select id="tp_field" name="tp_field" >
        <option value="">Select something...</option>
        <option value="something">Select someting else</option>
        <option value="else">Else</option>
    </select>

<?php
}

function tp_save_meta_data($post_id){
    if( array_key_exists( 'tp_field', $_POST ) ){
            update_post_meta(
                $post_id,
                'tp_meta_key',
                $_POST['tp_field']
            );
    }
}
add_action('save_post', 'tp_save_meta_data');