<?php
/**
 * Standard theme page display.
 */

get_header();

?>
<div class="container">
<div class="row">

  <div class="content span8">
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

            <?php edit_post_link( 'Edit', '<span class="edit">', '</span>' ); ?>
          </h6>

          <?php the_content('<p>Read more...</p>'); ?>

          <p class="postmetadata">
            <p><?php comments_popup_link('No Comments »', '1 Comment »',
              '% Comments »'); ?></p>
          </p>

          <?php comments_template(); ?>
        </div>

      <?php endwhile; ?>
    <?php else: ?>

    <?php endif; ?>
    
    <?php bio_paging( 'paging-bottom' ); ?>
  </div>



  <div class="span4">
    <?php if( is_active_sidebar( 'right' ) ): ?>
      
        <?php dynamic_sidebar( 'right' ); ?>
      
    <?php endif; ?>
  </div>
</div>
</div>
<?php

get_footer();

?>