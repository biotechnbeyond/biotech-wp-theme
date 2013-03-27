<?php
/**
 * Theme functions.
 */
require_once ( TEMPLATEPATH . '/includes/options.inc.php' );
require_once ( TEMPLATEPATH . '/includes/upgrade.inc.php' );

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

function bio_excerpt_more( $more ) {
	return '<p><a class="read-more" href="'. get_permalink( get_the_ID() ) . 
		'"> &raquo; Read More...</a></p>';
}

add_filter( 'excerpt_more', 'bio_excerpt_more' );

function bio_excerpt_length( $length ) {
	$options = get_option( 'bio-options' );
	
	if( ! array_key_exists( 'excerpt-length', $options ) ) {
		$options[ 'excerpt-length' ] = 55;
		
		update_option( 'bio-options', $options );
	}		
	
	return $options[ 'excerpt-length' ];
}

add_filter( 'excerpt_length', 'bio_excerpt_length' );

function bio_paging( $nav_id = "page-nav" ) {
	global $wp_query;

  $options = get_option( 'bio-options', bio_options_get_defaults() );
  
  if ( $wp_query->max_num_pages > 1 ) : ?>  
  
  <nav id="<?php echo $nav_id; ?>">  
		<div class="nav-previous">
			<?php next_posts_link( __( '<span class="meta-nav">←</span> ' .
        $options[ 'older-posts-text' ], 'bio' ) ); ?>
		</div>  
    
		<div class="nav-next">
			<?php previous_posts_link( __( $options[ 'newer-posts-text' ] .
        ' <span class="meta-nav">→</span>', 'bio' ) ); ?>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
  </nav><!-- #nav-above -->  
  
  <?php endif;  
}

function bio_admin_init() {
	if( is_admin() ) {
		if( array_key_exists( 'bio-options-reset', $_GET ) &&
			$_GET[ 'bio-options-reset' ] = 1 ) {
			
			bio_options_reset();
			wp_redirect( admin_url( 'themes.php?page=bio-options-snippets' ) );
		}
	}
}

add_action( 'admin_init', 'bio_admin_init' );

?>