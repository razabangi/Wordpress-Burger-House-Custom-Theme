<?php 


    define('THEMEROOT', get_stylesheet_directory_uri());
    define('STYLE', THEMEROOT. '/assets/css');
    define('IMAGE', THEMEROOT. '/assets/images');
    define('SCRIPT', THEMEROOT. '/assets/js');
	include get_stylesheet_directory()."/widgets/Wpb_widget.php";

	if (!function_exists('burgerhouse_style_scripts')) {
		function burgerhouse_style_scripts()
		{
			wp_enqueue_style('bootstrap.css', STYLE. '/bootstrap.css' ,null,null,null);
			wp_enqueue_style('font-awesome.min.css', STYLE. '/font-awesome.min.css',null,null,null);
			wp_enqueue_style('style.css', STYLE. '/style.css',null,null,null);
			wp_enqueue_style('responsive.css', STYLE. '/responsive.css',null,null,null);
			wp_enqueue_style('colors.css', STYLE. '/colors.css',null,null,null);
			wp_enqueue_style('garden.css', STYLE. '/version/garden.css',null,null,null);

			wp_enqueue_script('tether.min.js', SCRIPT. '/tether.min.js', ['jquery'] ,true);
			wp_enqueue_script('bootstrap.min.js', SCRIPT. '/bootstrap.min.js', ['jquery'] ,true);
			wp_enqueue_script('custom.js', SCRIPT. '/custom.js', ['jquery'] ,true);
			wp_enqueue_script('myscript.js', SCRIPT. '/myscript.js', ['jquery'] ,true);

		}

		add_action('wp_enqueue_scripts','burgerhouse_style_scripts');
	}

	// Load Built In Functions After Setup

	if (!function_exists('burgerhouse_theme_setup')) {
		function burgerhouse_theme_setup()
		{
			add_theme_support('custom-logo');
			add_theme_support('title-tags');
			add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'image', 'video']);
			add_theme_support('automatic-feed-links');
			add_theme_support('post-thumbnails');

			// register menus
			register_nav_menus(
			    [
			      'main-menu' => __( 'Main Menu' )
			    ]
			);

		}

		add_action('after_setup_theme','burgerhouse_theme_setup');
	}

	function burgerhouse_anchor_add_link_atts($atts) {
	  $atts['class'] = "nav-link color-green-hover";
	  return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'burgerhouse_anchor_add_link_atts');



	// Numeric Pagination
	if ( ! function_exists( 'burgerhouse_numbered_pagination' )) {
		function burgerhouse_numbered_pagination()
		{
			$args = [
				'prev_next' => false,
				'type' => 'array'
			];
			echo '<div class="col-md-12">';
			$paginates = paginate_links( $args );
			if ( is_array( $paginates )) {
				echo '<nav><ul class="pagination justify-content-start">';
				foreach ($paginates as $paginate) {					
						echo '<li class="page-item"><a href="#" class="page-link">' . $paginate . '</a></li>';					
				}
				echo '</ul></nav>';
			}
			echo '</div>';
		}
	}



	function bhouse_custom_post_type() {
		    $labels = array(
		        'name'                  => _x( 'Recipy', 'burgerhouse' ),
		        'singular_name'         => _x( 'Recipy', 'burgerhouse' ),
		        'menu_name'             => _x( 'Recipies', 'burgerhouse' ),
		        'name_admin_bar'        => _x( 'Recipy', 'burgerhouse' ),
		        'add_new'               => __( 'Add New', 'burgerhouse' ),
		        'add_new_item'          => __( 'Add New Recipy', 'burgerhouse' ),
		        'new_item'              => __( 'New Recipy', 'burgerhouse' ),
		        'edit_item'             => __( 'Edit Recipy', 'burgerhouse' ),
		        'view_item'             => __( 'View Recipy', 'burgerhouse' ),
		        'all_items'             => __( 'All Recipies', 'burgerhouse' ),
		        'search_items'          => __( 'Search Recipies', 'burgerhouse' ),
		        'parent_item_colon'     => __( 'Parent Recipies:', 'burgerhouse' ),
		        'not_found'             => __( 'No Recipies found.', 'burgerhouse' ),
		        'not_found_in_trash'    => __( 'No Recipies found in Trash.', 'burgerhouse' ),
		        'featured_image'        => _x( 'Recipy Cover Image', 'burgerhouse' ),
		        'set_featured_image'    => _x( 'Set cover image', 'burgerhouse' ),
		        'remove_featured_image' => _x( 'Remove cover image', 'burgerhouse' ),
		        'use_featured_image'    => _x( 'Use as cover image', 'burgerhouse' ),
		        'archives'              => _x( 'Recipy archives', 'burgerhouse' ),
		        'insert_into_item'      => _x( 'Insert into Recipy', 'burgerhouse' ),
		        'uploaded_to_this_item' => _x( 'Uploaded to this Recipy', 'burgerhouse' ),
		        'filter_items_list'     => _x( 'Filter Recipies list', 'burgerhouse' ),
		        'items_list_navigation' => _x( 'Recipies list navigation', 'burgerhouse' ),
		        'items_list'            => _x( 'Recipies list','burgerhouse' ),
		    );
	 
		    $args = array(
		        'labels'             => $labels,
		        'public'             => true,
		        'publicly_queryable' => true,
		        'show_ui'            => true,
		        'show_in_menu'       => true,
		        'query_var'          => true,
		        'rewrite'            => array( 'slug' => 'recipy' ),
		        'capability_type'    => 'post',
		        'has_archive'        => true,
		        'hierarchical'       => false,
		        'menu_position'      => null,
		        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		    );
	 
	    	register_post_type( 'recipy', $args );
		}
	 
		add_action( 'init', 'bhouse_custom_post_type' );

		function burgerhouse_create_category_taxonomies() {
		    // Add new taxonomy, make it hierarchical (like categories)
		    $labels = array(
		        'name'              => _x( 'Recipies', 'taxonomy general name', 'burgerhouse' ),
		        'singular_name'     => _x( 'Recipy', 'taxonomy singular name', 'burgerhouse' ),
		        'search_items'      => __( 'Search Recipies', 'textdomain' ),
		        'all_items'         => __( 'All Recipies', 'textdomain' ),
		        'parent_item'       => __( 'Parent Recipy', 'textdomain' ),
		        'parent_item_colon' => __( 'Parent Recipy:', 'textdomain' ),
		        'edit_item'         => __( 'Edit Recipy', 'textdomain' ),
		        'update_item'       => __( 'Update Recipy', 'textdomain' ),
		        'add_new_item'      => __( 'Add New Recipy', 'textdomain' ),
		        'new_item_name'     => __( 'New Recipy Name', 'textdomain' ),
		        'menu_name'         => __( 'Recipy Category', 'textdomain' ),
		    );
		 
		    $args = array(
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
		        'query_var'         => true,
		        'rewrite'           => array( 'slug' => 'recipies' ),
		    );
    	
    	register_taxonomy( 'recipies_categories', array( 'recipy' ), $args );
		
		}

		add_action( 'init', 'burgerhouse_create_category_taxonomies' );


		function hcf_register_meta_boxes() {
		    add_meta_box( 'short-desc', __( 'About Recipy', 'burgerhouse' ), 'hcf_display_callback', 'recipy' );
		}
		add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );

		function hcf_display_callback( $post ) {
		    include('form.php');
		}

		if ( ! function_exists( 'burgerhouse_widget_init' )) {
		function burgerhouse_widget_init()
		{
			$args = [
				'name'          => __( 'Sidebar One', 'burgerhouse' ),
				'id'            => 'sidebar-one',
				'description'   => __( 'Appears in sidebar one'),
			    'class'         => '',
				'before_widget' => '<div class="blog-list-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>' 
			];

			register_sidebar( $args );

			$args = [
				'name'          => __( 'Sidebar Two', 'burgerhouse' ),
				'id'            => 'sidebar-two',
				'description'   => __( 'Appears in sidebar two'),
			    'class'         => '',
				'before_widget' => '<div class="check">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h2>',
				'after_title'   => '</h2><hr></div>' 
			];
			
			register_sidebar( $args );

			register_widget( 'wpb_widget' );


		}
		add_action( 'widgets_init', 'burgerhouse_widget_init' );
	}

	// function wpb_load_widget() {
	//     register_widget( 'wpb_widget' );
	// }
	// add_action( 'widgets_init', 'wpb_load_widget' );

 











?>