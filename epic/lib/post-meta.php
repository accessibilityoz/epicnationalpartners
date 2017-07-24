<?php

// return entry meta information for posts, used by multiple loops
if ( ! function_exists( 'reverie_entry_meta' ) ) {
    function reverie_entry_meta() {

        $output ='';
        $output .= '<p class="metadata">';
     
        // get WP author posts link
        $output .= 'By: ' . get_the_author_posts_link() . '<br>';
       
        $output .= 'Date: <time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'reverie'), get_the_date(), get_the_date()) .'</time> ';

        if ( is_single( 'post') || is_home() || is_post_type_archive( 'post' ) || is_search() ) : 
        
            $num_comments = get_comments_number(); // get_comments_number returns only a numeric value
            if ( comments_open() ) {
                if ( $num_comments == 0 ) {
                    $comments = __('<span class="comment-result no-comments">Make a comment</span>');
                } elseif ( $num_comments > 1 ) {
                    $comments = $num_comments . __(' comments');
                } else {
                    $comments = __('<span class="comment-result">1 comment</span>');
                }
                $write_comments = '<a href="' . get_comments_link() .'"><span class="icon small icon-forum"></span> '. $comments.'</a>';
            } else {
                $write_comments =  __('<span class="comment-result">Comments off</span>');
            }
            $output .= '<span class="comments comment-results right">'. $write_comments .'</span>';
        endif;

        $output .= '</p>';
        echo $output;
    }
}


//  Show partner social media links & icons
if ( ! function_exists( 'dmc_show_partner_socials' ) ) {
    function dmc_show_partner_socials() {
        
        $dmc_partner_twitter_check = get_field( 'dmc_partner_twitter_username' );
        $dmc_partner_instagram_check = get_field( 'dmc_partner_instagram_username' );
        $dmc_partner_facebook_check = get_field( 'dmc_partner_facebook_url' );
        $dmc_partner_linkedin_check = get_field( 'dmc_partner_linkedin_url' );

        if ( $dmc_partner_twitter_check ) { 
            $output = '<li><span class="social__item"><a class="social__link--twitter" href="https://twitter.com/' . $dmc_partner_twitter_check . '"><span class="social__link--text">View Twitter stream</span></a></span></li>';
            echo $output;
        }
        
        if ( $dmc_partner_instagram_check ) { 
            $output = '<li><span class="social__item"><a class="social__link--instagram" href="https://www.instagram.com/' . $dmc_partner_instagram_check . '"><span class="social__link--text">View Instagram feed</span></a></span></li>';
            echo $output;
        }

        if ( $dmc_partner_facebook_check ) { 
            $output = '<li><span class="social__item"><a class="social__link--facebook" href="' . $dmc_partner_facebook_check . '"><span class="social__link--text">View Facebook page</span></a></span></li>';
            echo $output;
        }

        if ( $dmc_partner_linkedin_check ) { 
            $output = '<li><span class="social__item"><a class="social__link--linkedin" href="' . $dmc_partner_linkedin_check . '"><span class="social__link--text">View LinkedIn profile</span></a></span></li>';
            echo $output;
        }
       
    }
}