<?php get_header(); ?>

<!-- Content -->
<div class="container">
  <div class="content" id="content" role="main">

    <?php if ( have_posts() ) : ?>

        <h1 class="text-center">
            
            <?php if ( is_post_type_archive( 'post') ) : ?>
            	<span>Latest blog posts</span>
            <?php elseif ( is_category() ) : ?>
                <span>Blog posts categorised '<?php single_cat_title(); ?>'</span>
            <?php elseif ( is_author() ) : ?>
                <span>Blog posts by <?php  the_author(); ?></span>
            <?php elseif ( is_tag() ) : ?>
                <span>Blog posts for tag '<?php single_tag_title(); ?>'</span>
            <?php elseif ( is_post_type_archive( 'partner') ) : ?>
            	<span>Partners</span>
            <?php elseif ( is_post_type_archive( 'resource' ) ) : ?>
                <span>Resources</span>
            <?php elseif ( is_archive() ) : ?>
                <span>Blog posts for <?php single_month_title(' '); ?></span>
            <?php elseif ( is_search() ) : ?>
            	<span><?php _e('Search Results for', 'reverie'); ?> "<?php echo get_search_query(); ?>"</span>
            <?php endif; ?>
        </h1>

        <div class="row mar-b-3">
            <div class="col-sm-12">
    
                <?php while ( have_posts() ) : the_post(); ?>
                    <h2 class="h3 mar-t-0 text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                <?php endwhile; ?>
      
    <?php else : ?>

                <h2 class="h3 mar-t-0 text-left">No Results found</h2>
                <p>Sorry, but we could not find any results for that search term.</p>
             
            </div>
        </div>

	<?php endif;  ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

    </div>
</div>
		
<?php get_footer(); ?>