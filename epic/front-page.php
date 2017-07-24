<?php get_header(); ?>

<!-- Banner -->
<div class="container-fluid">
    <div class="banner">
      <?php wooslider(); ?>
    </div>
</div>

<!-- Content -->
<div class="container">
  <div class="content" id="content" role="main">
    <div class="mar-b-3">
      <h1>Updates</h1>
      <div class="row">

        <!-- Homepage sidebar -->
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Homepage widgets' ) ) : ?>
        <?php endif; ?>

        </div>
      </div>

    <?php 
        $home_partners = new WP_Query( array(
        'post_type' => 'partner', 
        'orderby' => 'menu_order',
    )); 

    if ( $home_partners->have_posts() ) : ?>

      <h2>Partners</h2>

      <?php
      while ( $home_partners->have_posts() ) : $home_partners->the_post(); ?>

        <div class="row mar-b-3">
          <div class="col-sm-2 hidden-xs">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( 'medium' ); ?>
            </a>
          </div>
          <div class="col-sm-10">
            <h3 class="h4 mar-t-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <p><a href="mailto:<?php the_field( 'dmc_partner_email_address' ); ?>"><?php the_field( 'dmc_partner_email_address' ); ?></a></p>
            <p></p>
          </div>
        </div>

      <?php 
      endwhile; wp_reset_postdata(); ?>

      <div class="text-center">
        <a href="/partners/" class="link-button-primary">More Partners</a>
      </div>

      </div>
    </div>

    <?php endif; ?>

<?php get_footer(); ?>