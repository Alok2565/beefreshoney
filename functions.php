<?php

	 function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
	  
	function load_stylesheet(){
		wp_register_style('css_theme',get_template_directory_uri().'/assets/css/theme.css',array(),1,'all');
		wp_enqueue_style('css_theme');

		wp_register_style('css_bootstrap',get_template_directory_uri().'/assets/css/bootstrap.css',array(),1,'all');
		wp_enqueue_style('css_bootstrap');

		wp_register_style('css_maicon',get_template_directory_uri().'/assets/css/maicons.css',array(),1,'all');
		wp_enqueue_style('css_maicon');
	}
	add_action('wp_enqueue_scripts','load_stylesheet');	

	function load_js(){
		wp_register_script('jquery_bootstrap',get_template_directory_uri().'/assets/js/bootstrap.min.js',array(),1,1,1);
		wp_enqueue_script('jquery_bootstrap');

		wp_register_script('google_maps',get_template_directory_uri().'/assets/js/google-maps.js',array(),1,1,1);
		wp_enqueue_script('google_maps');

		wp_register_script('jquery_min',get_template_directory_uri().'/assets/js/jquery.min.js',array(),1,1,1);
		wp_enqueue_script('jquery_min');

		wp_register_script('jquery_theme',get_template_directory_uri().'/assets/js/theme.js',array(),1,1,1);
		wp_enqueue_script('jquery_theme');
		
	}

	add_action('wp_enqueue_scripts','load_js');

	function logo_link( $html, $blog_id ) {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $html = sprintf(
    '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
    esc_url( 'http://localhost/wordpress58/' ),  // modify the link here
    wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
  );

  return $html;
}

add_filter( 'get_custom_logo', 'logo_link', 10, 2 );

?>

<?php 

add_action( 'after_setup_theme', 'woocommerce_support' );
 
function woocommerce_support() {
 
   add_theme_support( 'woocommerce' );
 
}
//add_theme_support('woocommerce');

?>

 