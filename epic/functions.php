<?php
/*

Originally from Reverie Theme, now heavily modified
Author: Zhen Huang
URL: http://themefortress.com/

*/

// do all the cleaning and enqueue here
require_once get_template_directory() . '/lib/clean.php'; 

// enqueue vendor scripts and styles
require_once get_template_directory() . '/lib/enqueue.php';

// load Foundation specific functions like top-bar
require_once get_template_directory() . '/lib/foundation.php'; 

/* Custom post types */
require_once get_template_directory() . '/post-types/partner.php';
require_once get_template_directory() . '/post-types/resource.php';

// Widgets setup
require_once get_template_directory() . '/lib/widgets.php';

// post meta functions (entry meta, post authors etc)
require_once get_template_directory() . '/lib/post-meta.php';

// Advanced Custom Fields customisation functions
require_once get_template_directory() . '/lib/acf-functions.php';


/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */
Class DMC_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

    function widget($args, $instance) {
    
        extract( $args );
        
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
                
        if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 10;
                    
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if( $r->have_posts() ) :
            
            echo $before_widget;
            if( $title ) echo $before_title . $title . $after_title; ?>
          
            <?php while( $r->have_posts() ) : $r->the_post(); ?>                
           
                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                <?php the_excerpt(); ?>
           
            <?php endwhile; ?>
             
            <?php
            echo $after_widget;
        
        wp_reset_postdata();
        
        endif;
    }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('DMC_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');


/**
* Hide email from Spam Bots using a shortcode.
*
* @param array  $atts    Shortcode attributes. Not used.
* @param string $content The shortcode content. Should be an email address.
*
* @return string The obfuscated email address. 
*/
 function wpcodex_hide_email_shortcode( $atts , $content = null ) {
     if ( ! is_email( $content ) ) {
         return;
     }

     return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
 }
 add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );

 // Allow shortcodes in widget_text
 add_filter( 'widget_text', 'shortcode_unautop' );
 add_filter( 'widget_text', 'do_shortcode' );


// display large thumbnail size image with caption
if ( ! function_exists( 'dmc_display_image_with_caption' ) ) {
    function dmc_display_image_with_caption() { ?>
        <div class="wp-caption">
        <?php
            the_post_thumbnail( 'large' , array( 'class' => 'img-featured' ) ); 
            $get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
                if ( !empty( $get_description ) ) {
                    echo '<p class="wp-caption-text">' . $get_description . '</p>';
                }
        ?>
        </div>
    <?php
    }
}