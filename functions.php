<?php
/**
 * Theme functions.
 */
add_theme_support(
  'custom-header',
  array(
    'width'         => 114,
    'flex-width'    => true,
    'height'        => 115,
    'flex-height'   => true,
    'default-image' => get_template_directory_uri() .
                       '/static/img/biotechandbeyond_logo.png',
    'uploads'       => true,
    'header-text'   => false,
  )
);

register_nav_menu( 'top', __( 'Top Menu' ) );

register_sidebar(
  array(
    'name'          => __( 'Jumbo-Tron' ),
    'id'            => 'jumbo-tron',
    'description'   => __( 'Main display area on Jumbo-Tron pages.' ),
    'class'         => 'jumbo-tron',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 style="display: none;">',
    'after_title'   => '</h2>',
  )
);

register_sidebar(
  array(
    'name'          => __( 'Bottom #1' ),
    'id'            => 'bottom-1',
    'description'   => __( 'First row of widgets on the bottom of Jumbo-Tron ' .
                       'pages.' ),
    'class'         => 'span4',
    'before_widget' => '<div id="%1$s" class="span4 %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  )
);

register_sidebar(
  array(
    'name'          => __( 'Bottom #2' ),
    'id'            => 'bottom-2',
    'description'   => __( 'Second row of widgets on the bottom of ' .
                    'Jumbo-Tron pages.' ),
    'class'         => 'span4',
    'before_widget' => '<li class="span4">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  )
);

register_sidebar(
  array(
    'name'          => __( 'Right' ),
    'id'            => 'right',
    'description'   => __( 'Right sidebar on content pages.' ),
    'before_widget' => '<div id="%1$s" class="sidebar-right %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  )
);

require_once ( TEMPLATEPATH . '/includes/options.inc.php' );

/**
 * Slideshow/Per Page Widgets conflict resolution.
 */
function bio_fix_slideshow() {
	if( array_key_exists( 'post', $_GET ) ) {
		$post = get_post( $_GET['post'] );
		
		if( $post->post_type == 'slideshow' ) {
			remove_action( 'add_meta_boxes', 'i123_widgets_custom_fields_add' );
		}
	}
}

bio_fix_slideshow();

?>