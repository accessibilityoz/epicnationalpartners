<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php reverie_entry_meta(); ?>
	</header>
	<div class="entry-content">
		  <figure>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' , array( 'class' => 'alignright' ) ); ?></a>
        </figure>
        <?php the_excerpt(); ?>
	</div>
</article>

<?php if ( is_single() ) { ?>

    <div class="prev-next">
        <div class="row collapse">
            <div class="medium-6 columns">
                <?php previous_post_link( '<span class="button ghost prev">%link</span>', 'Previous article' ); ?>
            </div>
            <div class="medium-6 columns text-right">
                <?php next_post_link( '<span class="button ghost next">%link</span>', 'Next article' ); ?>
            </div>
        </div>
    </div>

<?php } ?>