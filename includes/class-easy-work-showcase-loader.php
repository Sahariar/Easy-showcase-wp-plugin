<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://sahariarkabir.com/
 * @since      1.0.0
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/includes
 * @author     Sahariar Kabir <sahariark@gmail.com>
 */
class Easy_Work_Showcase_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress action that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         The priority at which the function should be fired.
	 * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		if ( ! function_exists('ews_post_type') ) {

			// Register Custom Post Type
			function ews_post_type() {
			
				$labels = array(
					'name'                  => _x( 'Works', 'Post Type General Name', 'easy-work-showcase' ),
					'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'easy-work-showcase' ),
					'menu_name'             => __( 'Work Showcase', 'easy-work-showcase' ),
					'name_admin_bar'        => __( 'Work Showcase', 'easy-work-showcase' ),
					'archives'              => __( 'Work Showcase Archives', 'easy-work-showcase' ),
					'attributes'            => __( 'Item Attributes', 'easy-work-showcase' ),
					'parent_item_colon'     => __( 'Parent Item:', 'easy-work-showcase' ),
					'all_items'             => __( 'All Items', 'easy-work-showcase' ),
					'add_new_item'          => __( 'Add New Item', 'easy-work-showcase' ),
					'add_new'               => __( 'Add New Work', 'easy-work-showcase' ),
					'new_item'              => __( 'New Work Showcase', 'easy-work-showcase' ),
					'edit_item'             => __( 'Work Showcase Item', 'easy-work-showcase' ),
					'update_item'           => __( 'Update Item', 'easy-work-showcase' ),
					'view_item'             => __( 'View Item', 'easy-work-showcase' ),
					'view_items'            => __( 'View Items', 'easy-work-showcase' ),
					'search_items'          => __( 'Search Item', 'easy-work-showcase' ),
					'not_found'             => __( 'Not found', 'easy-work-showcase' ),
					'not_found_in_trash'    => __( 'Not found in Trash', 'easy-work-showcase' ),
					'featured_image'        => __( 'Featured Image', 'easy-work-showcase' ),
					'set_featured_image'    => __( 'Set featured image', 'easy-work-showcase' ),
					'remove_featured_image' => __( 'Remove featured image', 'easy-work-showcase' ),
					'use_featured_image'    => __( 'Use as featured image', 'easy-work-showcase' ),
					'insert_into_item'      => __( 'Insert into item', 'easy-work-showcase' ),
					'uploaded_to_this_item' => __( 'Uploaded to this item', 'easy-work-showcase' ),
					'items_list'            => __( 'Items list', 'easy-work-showcase' ),
					'items_list_navigation' => __( 'Items list navigation', 'easy-work-showcase' ),
					'filter_items_list'     => __( 'Filter items list', 'easy-work-showcase' ),
				);
				$args = array(
					'label'                 => __( 'Work', 'easy-work-showcase' ),
					'description'           => __( 'Works showcase', 'easy-work-showcase' ),
					'labels'                => $labels,
					'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
					'taxonomies'            => array( 'category', 'post_tag' ),
					'hierarchical'          => false,
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_position'         => 20,
					'menu_icon'             => 'dashicons-desktop',
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'capability_type'       => 'post',
					'show_in_rest'          => true,
				);
				register_post_type( 'Work Showcase', $args );
			
			}
			add_action( 'init', 'ews_post_type', 0 );
			
			}
	}
}
