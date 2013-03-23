<?php
/**
 * Standard page footer.
 */
$options = get_option( 'bio-options', bio_options_get_defaults() );

?>

    <hr class="center80">

    <footer class="center">
      <?php echo $options[ 'content-footer' ]; ?>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>