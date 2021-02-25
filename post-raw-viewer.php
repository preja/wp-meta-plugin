<?php
/**
 * Plugin Name: Post Raw Viewer
 * Plugin URI: http://wordpress.org/extend/plugins/post-raw-viewer/
 * Description: As an  Admin you can see raw post data displayed in meta box
 * Author: Paweł Reja
 * Version: 1.0.0
 * @package post-raw-viewer
 */

define( 'POST_RAW_VIEWER_VERSION', '1.0.0' );



/**
 * Post Meta Inspector
 */
class Post_Raw_Viewer {


	/**
	 * Post_Raw_Viewer class
	 *
	 * @var object
	 */
	private static $instance;



	/**
	 * Kick off the instance.
	 *
	 * @return object
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new Post_Raw_Viewer();
			self::setup_actions();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		/** Do nothing */
	}


	/**
	 * Setup on init, add the metaboxes
	 *
	 * @return void
	 */
	private static function setup_actions() {
		add_action( 'init', array( self::$instance, 'action_init' ) );
		add_action( 'add_meta_boxes', array( self::$instance, 'action_add_meta_boxes' ) );
	}

	/**
	 * Init i18n files
	 */
	public function action_init() {
		load_plugin_textdomain( 'post-raw-viewer', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Add the post meta box to view post meta if the user has permissions to
	 */
	public function action_add_meta_boxes() {

		add_meta_box( 'post-raw-viewer', __( 'Post Raw Viewer', 'post-raw-viewer' ), array( self::$instance, 'Post_Raw_Viewer' ), get_post_type() );
	}

	/**
	 * Output the post meta in metabox.
	 *
	 * @return void
	 */
	public function Post_Raw_Viewer() {

      $this->displayPostMeta();
      $this->displayPostData();

	}

  protected function displayPostData() {
	  require_once "metaprovider/PRVP_PostData.php";
	  include_once 'PRVP_View.php';

	  $meta = new PRVP_PostData();
	  $view = PRVP_View::create();
	  $view->render('postdata', $meta->getMeta());

  }

  protected function displayPostMeta() {

	  require_once "metaprovider/PRVP_PostMeta.php";
	  include_once 'PRVP_View.php';

	  $meta = new PRVP_PostMeta();
	  $view = PRVP_View::create();
	  $view->render('postmeta', $meta->getMeta());
  }

}

/**
 * Kick off the post meta class.
 *
 * @return object
 */
function Post_Raw_Viewer() {
	return Post_Raw_Viewer::instance();
}
add_action( 'plugins_loaded', 'Post_Raw_Viewer' );
