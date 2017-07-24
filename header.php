<!doctype html>
  <html class="no-js" <?php language_attributes(); ?> >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Title -->
        <title><?php wp_title(''); ?></title>

        <!-- Base metadata -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" lang="en" content="EPIC: Equal Partners Interstate Congress">

        <!-- Apple touch icon links -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-precomposed.png">

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!-- IE tile icon links -->
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-144x144.png">
        <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-310x310.png">
        <meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-310x150.png">
        <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-150x150.png">
        <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-70x70.png">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

        <!-- Header -->
        <div class="container-fluid">
          <div class="container">
            <div class="row tools">
              <div class="col-sm-7">
                <a class="tools__link tools__skip" href="#content">Skip<span class="hidden-xs"> to main content</span></a>
                <ul class="tools__social-media">
                  <li><a href="https://www.facebook.com/EPICnationalpartners/"><span class="tools__facebook"><span class="hidden">Facebook</span></span></a></li>
                  <li><a href="https://twitter.com/EPICadvocates"><span class="tools__twitter"><span class="hidden">Twitter</span></span></a></li>
                  <li><a href="http://instagram.com/epicnationalpartners"><span class="tools__instagram"><span class="hidden">Instagram</span></span></a></li>
                  <li><a href="#"><span class="tools__youtube"><span class="hidden">YouTube</span></span></a></li>
                </ul>
              </div>
              <div class="col-sm-4 col-sm-offset-1">
                <div class="row">
                  <?php require_once('searchform.php'); ?>
                </div>
              </div>
            </div>
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/epic-logo.gif" alt="<?php bloginfo( 'name' ); ?>">
                </a>
              </div>
            <nav id="nav" role="navigation">
                <?php wp_nav_menu(
                	array(
	                    'theme_location' => 'primary', 
	                    'container' => false,   
	                    'depth' => 0,    
	                    'items_wrap' => '<ul>%3$s</ul>',
	                    'menu' => __( 'The Main Menu', 'reverie' ),
	                )
                );?>
            </nav>
          </div>
        </div>

<?php if ( !is_front_page() ) : ?>


<?php endif; ?>