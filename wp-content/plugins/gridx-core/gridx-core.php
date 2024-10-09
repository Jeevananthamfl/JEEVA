<?php
/**
 * Plugin Name: Gridx Core
 * Description: Gridx Core Plugin Contains Elementor Widgets Specifically created for gridx WordPress Theme.
 * Plugin URI:  wordpressriverthemes.com/gridx
 * Version:     4.0.0
 * Author:      WordPressRiver
 * Author URI:  https://themeforest.net/user/wordpressriver/portfolio
 * Text Domain: gridx-core
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */


if ( !defined('ABSPATH') )
    die('-1');

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'gridx_core' ) ) {
	/**
	 * Main gridx Core Class
	 *
	 * The main class that initiates and runs the gridx Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class gridx_core {
		/**
		 * gridx Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `gridx_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var gridx_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return gridx_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'gridx-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'gridx-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the gridx Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'gridx_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
		
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'gridx-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}



		/**
		 * Init gridx Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this,'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: gridx Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'gridx-core' ),
				'<strong>' . esc_html__( 'gridx core', 'gridx-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'gridx-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: gridx Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'gridx-core' ),
				'<strong>' . esc_html__( 'gridx Core', 'gridx-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'gridx-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: gridx Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'gridx-core' ),
				'<strong>' . esc_html__( 'gridx Core', 'gridx-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'gridx-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for gridx Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'gridx', [
				'title' => __( 'gridx Elements', 'gridx-core' ),
			], 1 );
		}


		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}




		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {

		}

		/**
		 * Register New Widgets
		 *
		 * Include gridx Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load gridx Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
					
			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-aboutme.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-featuredbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-credentialbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-projectbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-blogbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-servicesbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-profilesbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-clientbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/gridxda-contactbox.php');

			//ABOUT PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/ABOUTPAGE/gridxda-aboutimg.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/ABOUTPAGE/gridxda-aboutdetail.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/ABOUTPAGE/gridxda-experiencebox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/ABOUTPAGE/gridxda-educationbox.php');

			//CREDENTIALS PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/CREDENTIALPAGE/gridxda-credentialcontent.php');

			//WORK PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKPAGE/gridxda-worksidebarbox.php');
			
			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKPAGE/gridxda-worktitlebox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKPAGE/gridxda-workcontentbox.php');

			//WORKDETAIL PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojbrdcm.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojinfo.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojimg.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailimgbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojabout.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojfooterbtn.php');
            
            require_once( __DIR__ . '/widgets/GRIDXDARK/WORKDETAILPAGE/gridxda-workdetailprojfooterimg.php');

			//SERVICE PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/SERVICEPAGE/gridxda-servicesidebarbox.php');

			require_once( __DIR__ . '/widgets/GRIDXDARK/SERVICEPAGE/gridxda-servicecontentbox.php');

			//CONTACT PAGE

			require_once( __DIR__ . '/widgets/GRIDXDARK/CONTACTPAGE/gridxda-contactinfo.php');
      

        }

        
		/**
		 * Register Widgets
		 *
		 * Register gridx Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaaboutme_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdafeaturedbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdacredentialbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaprojectbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdablogbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaservicesbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaprofilesbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaclientbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdacontactbox_Widget() );

			//ABOUT PAGE

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaaboutimg_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaaboutdetail_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaexperiencebox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaeducationbox_Widget() );

			//CREDENTIALS PAGE

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdacredentialcontentbox_Widget() );

			//WORK PAGE

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworksidebarbox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworktitlebox_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkcontentbox_Widget() );

			//WORKDETAIL PAGE


			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojbreadcrumb_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojinfo_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojimg_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailimg_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojabout_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojfooterimg_Widget() );
            
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaworkdetailprojfooterbtn_Widget() );


			//SERVICE PAGE

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaservicesidebar_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdaservicecontentbox_Widget() );

			//CONTACT PAGE

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_gridx_gridxdacontactinfobox_Widget() );
			
		}
	}
}


// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'gridx_core_load' ) ) {
	/**
	 * Load gridx Core
	 *
	 * Main instance of gridx_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function gridx_core_load() {
		return gridx_core::instance();
	}

	// Run gridx Core
    gridx_core_load();
}