<?php get_header(); ?>

<!-- Content -->
<div class="container-medium">
  <div <?php post_class( 'content' ); ?>" id="content" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<h1 class="text-center"><?php the_title(); ?></h1>

				<?php the_content(); ?>

				<h2>More about <?php the_title(); ?></h2>

				<?php the_field( 'dmc_more_content' ); ?>

				<?php $dmc_brochure = get_field( 'dmc_brochure' ); ?>
				<?php if ( $dmc_brochure ) { ?>
					<?php dmc_display_file_upload( 'dmc_brochure', '' ); ?>
				<?php } ?>
				 
		<?php endwhile; ?>
  </div>
</div>


<?php get_footer(); ?>