<?php
/**
 * Upgrades the theme.
 */
require_once( TEMPLATEPATH . '/includes/options.inc.php' );

function bio_upgrade() {
  $options = get_option( 'bio-options' );

  if( !$options || !array_key_exists( 'version', $options ) ) {
    $version = 0;
  } else {
    $version = $options[ 'version' ];
  }

  if( $version < 1.01 ) {
    if( !$options ) {
      $options = array();
    }

    $options = wp_parse_args( $options, bio_options_get_defaults() );

    update_option( 'bio-options', $options );

    $version = 1.01;
  }
}

add_action( 'after_setup_theme', 'bio_upgrade' );

?>