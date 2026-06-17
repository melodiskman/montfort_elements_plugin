<?php
/**
 * Plugin Name: Montfort Elementor Widgets
 * Description: Custom Elementor widgets for Montfort Group website sections.
 * Version: 1.0.0
 * Author: Jules
 * Text Domain: montfort-elements
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Montfort Elements Class
 */
final class Montfort_Elements {

	/**
	 * Plugin Version
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 */
	private static $_instance = null;

	/**
	 * Instance Management
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Add actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'init_assets' ] );
	}

	/**
	 * Init Assets
	 */
	public function init_assets() {
		wp_enqueue_style( 'montfort-styles', plugins_url( '/assets/css/montfort-styles.css', __FILE__ ) );
	}

	/**
	 * Init Widgets
	 */
	public function init_widgets( $widgets_manager ) {
		// Include widget files
		require_once( __DIR__ . '/widgets/cursor.php' );
		require_once( __DIR__ . '/widgets/header.php' );
		require_once( __DIR__ . '/widgets/menu.php' );
		require_once( __DIR__ . '/widgets/canvas.php' );
		require_once( __DIR__ . '/widgets/sound-scroll.php' );
		require_once( __DIR__ . '/widgets/hero-transition.php' );
		require_once( __DIR__ . '/widgets/hero-section.php' );
		require_once( __DIR__ . '/widgets/who-we-are.php' );
		require_once( __DIR__ . '/widgets/what-we-do.php' );
		require_once( __DIR__ . '/widgets/global-connectivity.php' );
		require_once( __DIR__ . '/widgets/sustainability.php' );
		require_once( __DIR__ . '/widgets/solutions.php' );
		require_once( __DIR__ . '/widgets/equality.php' );
		require_once( __DIR__ . '/widgets/social.php' );
		require_once( __DIR__ . '/widgets/chapters-navigation.php' );
		require_once( __DIR__ . '/widgets/footer.php' );

		// Register widgets
		$widgets_manager->register( new \Montfort_Cursor_Widget() );
		$widgets_manager->register( new \Montfort_Header_Widget() );
		$widgets_manager->register( new \Montfort_Menu_Widget() );
		$widgets_manager->register( new \Montfort_Canvas_Widget() );
		$widgets_manager->register( new \Montfort_Sound_Scroll_Widget() );
		$widgets_manager->register( new \Montfort_Hero_Transition_Widget() );
		$widgets_manager->register( new \Montfort_Hero_Section_Widget() );
		$widgets_manager->register( new \Montfort_Who_We_Are_Widget() );
		$widgets_manager->register( new \Montfort_What_We_Do_Widget() );
		$widgets_manager->register( new \Montfort_Global_Connectivity_Widget() );
		$widgets_manager->register( new \Montfort_Sustainability_Widget() );
		$widgets_manager->register( new \Montfort_Solutions_Widget() );
		$widgets_manager->register( new \Montfort_Equality_Widget() );
		$widgets_manager->register( new \Montfort_Social_Widget() );
		$widgets_manager->register( new \Montfort_Chapters_Navigation_Widget() );
		$widgets_manager->register( new \Montfort_Footer_Widget() );
	}
}

Montfort_Elements::instance();
