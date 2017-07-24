<?php get_header(); ?>

<!-- Content -->
<div class="container">
  <div <?php post_class( 'content' ); ?>" id="content" role="main">
    <div class="mar-b-3">

			<h1><?php the_title(); ?></h1>
			<?php while (have_posts()) : the_post(); ?>
	        <?php the_content(); ?>

					<?php if ( have_rows( 'dmc_categories' ) ) : ?>
						<div class="row">
							<?php while ( have_rows( 'dmc_categories' ) ) : the_row(); ?>
								<div class="col-sm-4">
									<h3 class="h4 mar-t-0"><?php the_sub_field( 'category_title' ); ?></h3>
									<?php the_sub_field( 'category_cotent' ); ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // no rows found ?>
						<?php endif; ?>

				  </div>
				</div>

					<?php if ( have_rows( 'dmc_staff' ) ) : ?>
						<h2>Staff</h2>
						<?php while ( have_rows( 'dmc_staff' ) ) : the_row(); ?>

							<div class="row mar-b-3">
							  <div class="col-sm-2 hidden-xs">
							  	<?php $staff_member_image = get_sub_field( 'staff_member_image' ); ?>
							  	<?php if ( $staff_member_image ) { ?>
							  		<img src="<?php echo $staff_member_image['url']; ?>" alt="<?php echo $staff_member_image['alt']; ?>" />
							  	<?php } ?>
							  </div>
							  <div class="col-sm-10">
							    <h3 class="h4 mar-t-0"><?php the_sub_field( 'staff_member_name' ); ?></h3>
									<?php the_sub_field( 'staff_member_intro' ); ?>
									 <p><a href="mailto:<?php the_sub_field( 'staff_member_email' ); ?>"><?php the_sub_field( 'staff_member_email' ); ?></a></p>
							  </div>
							</div>
							
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>

	    <?php endwhile; ?>

    </div>
	</div>
</div>
		
<?php get_footer(); ?>