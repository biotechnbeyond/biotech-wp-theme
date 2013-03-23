<?php
/**
 * Standard page header.
 */
require_once ( TEMPLATEPATH . '/includes/options.inc.php' );

$options = get_option( 'bio-options', bio_options_get_defaults() );

wp_enqueue_style( 'bootstrap', get_template_directory_uri() .
  '/static/css/bootstrap.min.css' );
wp_enqueue_style( 'header', get_template_directory_uri() .
  '/static/css/header.css' );

if( is_page_template( 'jumbo-tron.php' ) ) {
  wp_enqueue_style( 'jumbo-tron', get_template_directory_uri() .
    '/static/css/jumbo-tron.css' );
} else {
  wp_enqueue_style( 'content', get_template_directory_uri() .
    '/static/css/content.css' );
}

wp_enqueue_script( 'bootstrap', get_template_directory_uri() .
  '/static/js/bootstrap.min.js', array( 'jquery' ) );
wp_enqueue_script( 'header', get_template_directory_uri() .
  '/static/js/header.js', array( 'jquery' ) );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <!--[if lt IE 9]>
      <link rel="stylesheet" src="<?php echo get_template_directory_uri();
        ?>/static/css/ie.css">
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="<?php echo get_template_directory_uri();
        ?>/static/js/curvycorners.js"></script>
    <![endif]-->

    <title><?php bloginfo( 'name' ); wp_title(); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="author" content="Nicholas Tieman">

    <?php wp_head(); ?>

  </head>

  <body>
    <div class="navbar navbar-static-top">
      <div class="navbar-inner">
        <a class="brand" href="<?php echo home_url(); ?>">
          <img src="<?php header_image(); ?>" height="<?php
            echo get_custom_header()->height; ?>" width="<?php
            echo get_custom_header()->width; ?>" alt="<?php
            echo wp_title(); ?>" />
        </a>

        <div class="container">
          <?php echo get_search_form(); ?>
          <?php wp_nav_menu(
            array(
              'theme_location'  => 'top',
              'container'       => 'ul',
              'container_class' => 'nav-collapse collapse',
              'menu_class'      => 'nav pull-right',
              'depth'           => 1,
              'fallback_cb'     => false,
            )
          ); ?>
        </div>
      </div>
    </div>