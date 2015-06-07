<?php
/*
Plugin Name: JM Facebook Tools
*/
//[jm-facebook-photos]
function jm_facebook_photos_func( $atts ){
    return "Facebook Photos";
}
add_shortcode( 'jm-facebook-photos', 'jm_facebook_photos_func' );