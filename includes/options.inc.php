<?php
/**
 * Theme options page.
 */
function bio_options_init() {
  register_setting( 'bio-options', 'bio-options', 'bio_options_sanitize' );
}

add_action( 'admin_init', 'bio_options_init' );

function bio_options_sanitize( $input ) {
  $input[ 'bottom-sidebar-title' ] = wp_filter_nohtml_kses(
    $input[ 'bottom-sidebar-title' ] );
  
  return $input;
}

function bio_options_add_pages() {
  add_theme_page( __( 'Snippets' ), __( 'Snippets' ), 'manage_options',
    'bio-options-snippets', 'bio_options_snippets' );
}

add_action( 'admin_menu', 'bio_options_add_pages' );

function bio_options_print_scripts() {
	if( array_key_exists( 'page', $_GET ) && 
		$_GET[ 'page' ] == 'bio-options-images' ) {
	
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'bio-upload', get_template_directory_uri() . 
			'/static/js/upload.js', array( 'jquery', 'media-upload', 'thickbox' ) );
	}
}

add_action( 'admin_print_scripts', 'bio_options_print_scripts' );

function bio_options_print_styles() {
	if( array_key_exists( 'page', $_GET ) && 
		$_GET[ 'page' ] == 'bio-options-images' ) {
	
		wp_enqueue_style( 'thickbox' );	
	}
}

add_action( 'admin_print_styles', 'bio_options_print_styles' );

function bio_options_get_defaults() {
  $template_dir = get_template_directory_uri();

  $jumbo_tron_footer = <<<HTML
<p class="marketing-byline">Bio, Tech & Beyond could not exist without the generous support of the City of Carlsbad.</p>

<div class="row-fluid">
  <ul class="thumbnails example-sites">
    <li class="span3">
      <a class="thumbnail" href="http://kippt.com/" target="_blank">
        <img src="$template_dir/static/img/news/image001.gif" alt="Kippt">
      </a>
    </li>     
  </ul>
</div>

<p>Copyright © 2013 Bio, Tech and Beyond</p>
HTML;

  $content_footer = <<<HTML
  599 Fairchild Dr.
  Mountain View, CA 94043
  <a href="mailto:info@hackerdojo.com" title="E-mail address.">
    info@hackdojo.com
  </a>
  twitter:
  <a href="https://twitter.com/hackerdojo" title="Hacker Dojo on Twitter.">
    @hackerdojo
  </a>
HTML;

  return array(
    'bottom-sidebar-title' 	=> 'In the News',
    'jumbo-tron-footer'    	=> $jumbo_tron_footer,
    'content-footer'        => $content_footer,
  );
}


function bio_options_hidden_fields() {
  $options = get_option( 'bio-options', bio_options_get_defaults() );

  foreach( $options as $name => $value ) {
    echo '<input name="bio-options[', $name, ']" type="hidden" value="',
      esc_attr_e( $value ), '" />';
  }
}

function bio_options_snippets() {
  $options = get_option( 'bio-options', bio_options_get_defaults() );

  ?>
	<div class="wrap">
		<h2><?php _e( 'Snippets' ); ?></h2>
    <h4><?php _e( 'Little bits of theme text outside of posts and widgets. ' );
      ?></h4>

		<form method="post" action="options.php">
			<?php settings_fields( 'bio-options' ); ?>
      <?php bio_options_hidden_fields(); ?>
	
			<table class="form-table">
				<tr valign="top">
          <th scope="row">
            <label for="bio-options-bottom-sidebar-title"><?php
              _e( 'Bottom Sidebar Title' ); ?></label>

            <p class="howto"><?php
              _e( 'Title for the bottom sidebar on Jumbo-Tron pages.' ); ?></p>
          </th>

					<td>
            <input id="bio-options-bottom-sidebar-title"
              name="bio-options[bottom-sidebar-title]" type="text"
              value="<?php esc_attr_e( $options[ 'bottom-sidebar-title' ] ); ?>"
              size="25" maxlength="255" title="<?php
                _e( 'Title for the bottom sidebar on Jumbo-Tron pages.' ); ?>"
              />
          </td>
				</tr>

        <tr valign="top">
          <th scope="row">
            <label for="bio-options-jumbo-tron-footer"><?php
              _e( 'Jumbo-Tron Footer' ); ?></label>

            <p class="howto"><?php
              _e( 'HTML for the footer on Jumbo-Tron pages.' ); ?></p>
          </th>
				
					<td>
            <textarea id="bio-options-jumbo-tron-footer"
              name="bio-options[jumbo-tron-footer]" rows="15" cols="80" 
							title="<?php _e( 'HTML for the footer on Jumbo-Tron pages.' ); ?>"
              ><?php esc_attr_e( $options[ 'jumbo-tron-footer' ] );
              ?></textarea>
          </td>
				</tr>

        <tr valign="top">
          <th scope="row">
            <label for="bio-options-content-footer"><?php
              _e( 'Content Footer' ); ?></label>

            <p class="howto"><?php
              _e( 'HTML for the footer on regular content pages.' ); ?></p>
          </th>

					<td>
            <textarea id="bio-options-content-footer"
              name="bio-options[content-footer]" rows="15" cols="80"
							title="<?php
                _e( 'HTML for the footer on regular content pages.' ); ?>"
              ><?php esc_attr_e( $options[ 'content-footer' ] );
              ?></textarea>
          </td>
				</tr>
			</table>

			<p class="submit">
        <input type="submit" class="button-primary" value="<?php
          _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php
}

?>