<?php
/**
 * Not found page.
 */

get_header();

?>

<div class="row">
  <div class="span2">&nbsp;</div>

  <div class="content span6">
    <h2>Oops!</h2>
    
    <p>The page you requested was not found.</p>
    
    <p><a href="<?php echo bloginfo( 'siteurl' ); ?>">Back to home</a>.</p>
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