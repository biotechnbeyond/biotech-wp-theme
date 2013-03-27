<?php
/**
 * Archive display.
 */
global $more;
$more = 0;

get_header();

?>

<div class="row">
  <div class="span2">&nbsp;</div>

  <div class="content span6">
    <?php if( have_posts() ): ?>
      <?php while( have_posts() ): ?>
        <?php the_post(); ?>

        <div <?php post_class(); ?>>
        	<?php bio_paging( 'paging-top' ); ?>
        	
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>

          <h6>
            <i>
              <?php the_time( 'F jS, Y' ) ?> by
              <?php the_author_posts_link(); ?>
            </i>
          </h6>

          <?php the_excerpt(); ?>

          <span class="postmetadata">
            <span><?php comments_popup_link('No Comments »', '1 Comment »',
              '% Comments »'); ?></span>
          </span>
          
          <?php bio_paging( 'paging-bottom' ); ?>
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