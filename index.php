<?php
/**
 * Standard theme page display.
 */

get_header();

?>

<div class="row">
  <div class="span2">&nbsp;</div>

  <div class="content span6">
    <?php if( have_posts() ): ?>
      <?php while( have_posts() ): ?>
        <?php the_post(); ?>

        <div <?php post_class(); ?>>
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>

          <?php the_content(); ?>
        </div>

      <?php endwhile; ?>
    <?php else: ?>

    <?php endif; ?>
  </div>

  <div class="span1">&nbsp;</div>

  <div class="span3">
    <?php if( is_active_sidebar( 'right' ) ): ?>
      
        <?php dynamic_sidebar( 'right' ); ?>
      
    <?php endif; ?>
  </div>
</div>

<?php

get_footer();

?>