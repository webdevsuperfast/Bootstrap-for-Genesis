<?php
/**
 * Scripts
 *
 * @package      Bootstrap for Genesis
 * @since        1.0
 * @link         http://webdevsuperfast.github.io
 * @author       Rotsen Mark Acob <webdevsuperfast.github.io>
 * @copyright    Copyright (c) 2015, Rotsen Mark Acob
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
*/

// Detect plugin. For use on Front End only.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Theme Scripts & Stylesheet
add_action( 'wp_enqueue_scripts', 'bfg_theme_scripts' );
function bfg_theme_scripts() {
	$version = wp_get_theme()->Version;
	if ( !is_admin() ) {
		// Disable the superfish script
		wp_deregister_script( 'superfish' );
		wp_deregister_script( 'superfish-args' );

		// Deregister jQuery and use Bootstrap supplied version
		wp_deregister_script( 'jquery' );
		
		// Detect if WPForo plugin is activated to use full jquery version
		if ( is_plugin_active( 'wpforo/wpforo.php' ) ) :
			wp_register_script( 'jquery', BFG_THEME_JS . 'jquery.min.js', array(), $version );
		else :
			wp_register_script( 'jquery', BFG_THEME_JS . 'jquery.slim.min.js', array(), $version );
		endif;

		wp_enqueue_script( 'jquery' );

		// Register Popper JS and enqueue it
		wp_register_script( 'app-popper-js', BFG_THEME_JS . 'popper.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'app-popper-js' );

		// Register Bootstrap JS and enqueue it
		wp_register_script( 'app-bootstrap-js', BFG_THEME_JS . 'bootstrap.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'app-bootstrap-js' );

		// Register Smart Menu JS and enqueue it
		wp_register_script( 'app-smartmenu-js', BFG_THEME_JS . 'jquery.smartmenus.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'app-smartmenu-js' );

		// Register Smart Menu Boostrap Addon Js and enqueue it
		wp_register_script( 'app-smartmenu-bootstrap-js', BFG_THEME_JS . 'jquery.smartmenus.bootstrap-4.min.js', array( 'app-smartmenu-js' ), $version, true );
		wp_enqueue_script( 'app-smartmenu-bootstrap-js' );

		// Register Font Awesome JS and enqueue it
		wp_register_script( 'app-fontawesome-js', 'https://use.fontawesome.com/releases/v5.6.3/js/all.js', array(), $version, true );
		wp_enqueue_script( 'app-fontawesome-js' );

		// Register Font Awesome 4 Shim and enqueue it
		wp_register_script( 'app-fontawesome-shim-js', 'https://use.fontawesome.com/releases/v5.6.3/js/v4-shims.js', array( 'app-fontawesome-js', $version, true ) );
		wp_enqueue_script( 'app-fontawesome-shim-js' );

		// Register theme JS and enqueue it
		wp_register_script( 'app-js', BFG_THEME_JS . 'app.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'app-js' );
	}
}

// Editor Styles
add_action( 'init', 'bfg_custom_editor_css' );
function bfg_custom_editor_css() {
	add_editor_style( get_stylesheet_uri() );
}
