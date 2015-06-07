<?php
/*
Plugin Name: JM Facebook Tools
*/
//[jm-facebook-photos]
function jm_facebook_photos_func( $atts ) {
    $json = file_get_contents("https://graph.facebook.com/157288534403279/Albums?access_token=388250718028532|7jL-ta_2A1rHk99tQDZb5ptgX8M");
    return $json;
}
add_shortcode( 'jm-facebook-photos', 'jm_facebook_photos_func' );
//print jm_facebook_photos_func('');
