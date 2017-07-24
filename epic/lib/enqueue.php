<?php

/**********************
Enqueue CSS and Scripts
**********************/

// enque WP and vendor scripts
if( ! function_exists( 'reverie_scripts_and_styles ' ) ) {
    function reverie_scripts_and_styles() {

        if (!is_admin()) {
            // modernizr (without media query polyfill)
            wp_enqueue_script( 'reverie-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.8.3', false );

            // only add WP comment-reply.min.js if threaded comments are on an it's a post of some type
            if( get_option( 'thread_comments' ) && is_singular() ) { 
                wp_enqueue_script( 'comment-reply' );
            }

            // add Foundation and vendor scripts files in the footer
            wp_enqueue_script( 'reverie-js', get_template_directory_uri() . '/js/bower.min.js', array( 'jquery' ), '', true );

        }

    }
}
add_action( 'wp_enqueue_scripts', 'reverie_scripts_and_styles' );

// https://wpshout.com/make-site-faster-async-deferred-javascript-introducing-script_loader_tag/
function dmc_defer_scripts( $tag, $handle, $src ) {

    // The handles of the enqueued scripts we want to defer
    $defer_scripts = array( 
        // 'admin-bar',
        // 'cookie',
        // 'devicepx',
        // 'jquery-migrate',
    );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    return $tag;
} 
add_filter( 'script_loader_tag', 'dmc_defer_scripts', 10, 3 );


// vendor styles
if( ! function_exists( 'grunterie_enqueue_style' ) ) {
    function grunterie_enqueue_style() {
        
        // Google fonts
        wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Oswald:400,700');  

        // main stylesheet
        wp_enqueue_style( 'grunterie-stylesheet', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );

        // vendor styles
        wp_enqueue_style( 'vendor',get_template_directory_uri() . '/css/vendor.css', false );

    }
}
add_action( 'wp_enqueue_scripts', 'grunterie_enqueue_style' );