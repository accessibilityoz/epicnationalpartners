<?php get_header(); ?>

  <!-- Content -->
  <div class="container">
    <div <?php post_class( 'content' ); ?>" id="content" role="main">
	
			<?php while (have_posts()) : the_post(); ?>

				<h1 class="text-center"><?php the_title(); ?></h1>

				<!-- Blog content -->
				<div class="mar-b-3">

				  <figure class="float-left mar-r-1">
						<?php the_post_thumbnail( 'fd-med-rect' ); ?>
					</figure>
					<?php reverie_entry_meta(); ?>
					<?php the_content(); ?>
					 
				</div>
				
				<!-- About the author -->
		      	<div class="details">
		      		<p><?php the_author_meta('description'); ?></p>
		      	</div>
				
				<!-- Filed under -->
				<div class="mar-b-1 font14">
				  Filed under: <?php the_category( ', ' ); ?>
				</div>

				<!-- Actions -->
				<div class="mar-b-3 text-right">
				  <?php previous_post_link( '<span class="link-button-primary">%link</span>', 'Previous' ); ?>
				  <?php next_post_link( '<span class="link-button-primary">%link</span>', 'Next' ); ?>
				</div>

				<?php comments_template(); ?>

			<?php endwhile; ?>

<?php get_footer(); ?>