<?php
/**
 * Template Name: Jumbo-Tron
 */

$options = get_option( 'bio-options' );

get_header();

?>

    <header class="jumbotron subhead homepage-lead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span6 homepage-about">
            <?php if( have_posts() ): ?>
              <?php the_post(); ?>

              <h1><?php the_title(); ?></h1>

              <div class="lead">
                <?php the_content(); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php if( is_active_sidebar( 'jumbo-tron' ) ): ?>
        <?php dynamic_sidebar( 'jumbo-tron' ); ?>
      <?php endif; ?>
    </header>

    <div class="container">
      <div class="row-fluid">
        <?php if( is_active_sidebar( 'bottom-1' ) ): ?>
          <?php dynamic_sidebar( 'bottom-1' ); ?>
        <?php endif; ?>
      </div>

      <hr class="soften">

      <h2><?php esc_html_e( $options[ 'bottom-sidebar-title' ] ); ?></h2>

      <?php if( is_active_sidebar( 'bottom-2' ) ): ?>
        <div class="row-fluid press">
          <ul class="thumbnails example-sites">
            <?php dynamic_sidebar( 'bottom-2' ); ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>

    <footer class="footer">
      <div class="container">
      <hr class="soften">

      <?php echo $options[ 'jumbo-tron-footer' ]; ?>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>