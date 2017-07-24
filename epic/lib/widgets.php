<?php 

add_action( 'widgets_init', 'dmc_register_sidebars' );
function dmc_register_sidebars() {

    register_sidebar(array(
        'name'=> 'Homepage widgets',
        'id' => 'sidebar-home',
        'description'   => 'Widgets placed here will appear on the homepage',
        'before_widget' => '<div id="%1$s" class="col-sm-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="h4">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name'=> 'Footer widgets',
        'id' => 'sidebar-footer',
        'description'   => 'Widgets placed here will appear in the footer',
        'before_widget' => '<article id="%1$s" class="col-sm-4 %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h3 class="footer__heading">',
        'after_title' => '</h3>'
    ));
}