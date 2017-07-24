<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<div class="page-bg">

	<div class="medium-12 columns" id="content" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
			</article>
		<?php endwhile; ?>

	</div>

</div>
<?php get_footer(); ?>