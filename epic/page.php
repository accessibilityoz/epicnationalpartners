<?php get_header(); ?>

<!-- Content -->
<div class="container">
  <div <?php post_class( 'content' ); ?>" id="content" role="main">
    <div class="mar-b-3">
    
			<h1><?php the_title(); ?></h1>
			<?php while (have_posts()) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>