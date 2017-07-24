<?php get_header(); ?>

<!-- Banner -->
<div class="container-fluid">
  <div class="banner"></div>
</div>

<!-- Content -->
<div class="container-medium">
  <div <?php post_class( 'content' ); ?>" id="content" role="main">
    <h1><?php the_title(); ?></h1>
    <div class="row mar-b-3">
      <div class="col-sm-3 col-sm-offset-2">
        <?php the_post_thumbnail( 'medium' ); ?>
      </div>
      <div class="col-sm-4">
        <p>
          <?php the_field( 'dmc_partner_phone' ); ?><br>
          <a href="<?php the_field( 'dmc_partner_web_address' ); ?>"><?php the_field( 'dmc_partner_web_address' ); ?></a><br>
          <a href="mailto:<?php the_field( 'dmc_partner_email_address' ); ?>"><?php the_field( 'dmc_partner_email_address' ); ?></a>
        </p>
        <p><?php the_field( 'dmc_partner_address' ); ?></p> 

      </div>

      <div class="col-sm-6 col-sm-offset-2">
        <ul class="list-inline socials">
            <?php dmc_show_partner_socials(); ?>
        </ul>
      </div>

    </div>
    <div class="mar-b-2">

        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>

    </div>

    <div class="row">

      <div class="col-sm-6">
        <?php if ( get_field( 'dmc_partner_instagram_userid' ) ) : ?>
        <h3 class="h4">Instagram</h3>
        <?php echo do_shortcode( '[instagram-feed id ="' . get_field( 'dmc_partner_instagram_userid' ) . '" showheader=false]' ); ?>
        <?php endif; ?>
      </div>

      <div class="col-sm-6">
        <?php if ( get_field( 'dmc_partner_twitter_username' ) ) : ?>
        <h3 class="h4">Twitter</h3>
        <?php echo do_shortcode( '[twitter-timeline username=' . get_field( 'dmc_partner_twitter_username' ) . ']' ); ?>
        <?php endif; ?>
      </div>
        
    </div>
  </div>
</div>

<?php get_footer(); ?>