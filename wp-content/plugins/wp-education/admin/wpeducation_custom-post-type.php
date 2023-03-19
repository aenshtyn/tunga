<?php
    
    if( !function_exists('wpeducation_custom_post_register') ){

        function wpeducation_custom_post_register(){

            // Register Course Post Type
            $labels = array(
                'name'                  => _x( 'Course', 'Post Type General Name', 'wpeducation' ),
                'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'wpeducation' ),
                'menu_name'             => __( 'Course', 'wpeducation' ),
                'name_admin_bar'        => __( 'Course', 'wpeducation' ),
                'archives'              => __( 'Course Archives', 'wpeducation' ),
                'parent_item_colon'     => __( 'Parent Course:', 'wpeducation' ),
                'add_new_item'          => __( 'Add New Course', 'wpeducation' ),
                'add_new'               => __( 'Add New', 'wpeducation' ),
                'new_item'              => __( 'New Course', 'wpeducation' ),
                'edit_item'             => __( 'Edit Course', 'wpeducation' ),
                'update_item'           => __( 'Update Course', 'wpeducation' ),
                'view_item'             => __( 'View Course', 'wpeducation' ),
                'search_items'          => __( 'Search Course', 'wpeducation' ),
                'not_found'             => __( 'Not found', 'wpeducation' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpeducation' ),
                'featured_image'        => __( 'Featured Image', 'wpeducation' ),
                'set_featured_image'    => __( 'Set featured image', 'wpeducation' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpeducation' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpeducation' ),
                'insert_into_item'      => __( 'Insert into item', 'wpeducation' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpeducation' ),
                'items_list'            => __( 'Course list', 'wpeducation' ),
                'items_list_navigation' => __( 'Course list navigation', 'wpeducation' ),
                'filter_items_list'     => __( 'Filter items list', 'wpeducation' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag','elementor' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpeducation_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wpeducation', $args );

           // Course Category
           $labels = array(
            'name'              => _x( 'Course Categories', 'wpeducation' ),
            'singular_name'     => _x( 'Course Category', 'wpeducation' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Course Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wpeducation_category' ),
           );

           register_taxonomy('wpeducation_category','wpeducation',$args);

            // Register Teachers Post Type
            $labels = array(
                'name'                  => _x( 'Teachers', 'Post Type General Name', 'wpeducation' ),
                'singular_name'         => _x( 'Teachers', 'Post Type Singular Name', 'wpeducation' ),
                'menu_name'             => __( 'Teachers', 'wpeducation' ),
                'name_admin_bar'        => __( 'Teachers', 'wpeducation' ),
                'archives'              => __( 'Teachers Archives', 'wpeducation' ),
                'parent_item_colon'     => __( 'Parent Teachers:', 'wpeducation' ),
                'add_new_item'          => __( 'Add New Teachers', 'wpeducation' ),
                'add_new'               => __( 'Add New', 'wpeducation' ),
                'new_item'              => __( 'New Teachers', 'wpeducation' ),
                'edit_item'             => __( 'Edit Teachers', 'wpeducation' ),
                'update_item'           => __( 'Update Teachers', 'wpeducation' ),
                'view_item'             => __( 'View Teachers', 'wpeducation' ),
                'search_items'          => __( 'Search Teachers', 'wpeducation' ),
                'not_found'             => __( 'Not found', 'wpeducation' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpeducation' ),
                'featured_image'        => __( 'Featured Image', 'wpeducation' ),
                'set_featured_image'    => __( 'Set featured image', 'wpeducation' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpeducation' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpeducation' ),
                'insert_into_item'      => __( 'Insert into item', 'wpeducation' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpeducation' ),
                'items_list'            => __( 'Teachers list', 'wpeducation' ),
                'items_list_navigation' => __( 'Teachers list navigation', 'wpeducation' ),
                'filter_items_list'     => __( 'Filter items list', 'wpeducation' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag','elementor' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpeducation_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'teachers', $args );

           // Teachers Category
           $labels = array(
            'name'              => _x( 'Teachers Categories', 'wpeducation' ),
            'singular_name'     => _x( 'Teachers Category', 'wpeducation' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Teachers Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'teachers_category' ),
           );

           register_taxonomy('teachers_category','teachers',$args);

             // Add new taxonomy, NOT hierarchical (like tags)
              $labels = array(
                'name' => _x( 'Tags', 'taxonomy general name', 'wpeducation' ),
                'singular_name' => _x( 'Tag', 'taxonomy singular name', 'wpeducation' ),
                'search_items' =>  __( 'Search Tags', 'wpeducation' ),
                'popular_items' => __( 'Popular Tags', 'wpeducation' ),
                'all_items' => __( 'All Tags', 'wpeducation' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Tag', 'wpeducation' ), 
                'update_item' => __( 'Update Tag', 'wpeducation' ),
                'add_new_item' => __( 'Add New Tag', 'wpeducation' ),
                'new_item_name' => __( 'New Tag Name', 'wpeducation' ),
                'separate_items_with_commas' => __( 'Separate tags with commas', 'wpeducation' ),
                'add_or_remove_items' => __( 'Add or remove tags', 'wpeducation' ),
                'choose_from_most_used' => __( 'Choose from the most used tags', 'wpeducation' ),
                'menu_name' => __( 'Tags' ),
              ); 

              register_taxonomy('teachers_tag','wpeducation',array( 
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'teachers_tag' ),
              ));

            // Register Gallery Post Type
            $labels = array(
                'name'                  => _x( 'Gallery', 'Post Type General Name', 'wpeducation' ),
                'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'wpeducation' ),
                'menu_name'             => __( 'Gallery', 'wpeducation' ),
                'name_admin_bar'        => __( 'Gallery', 'wpeducation' ),
                'archives'              => __( 'Gallery Archives', 'wpeducation' ),
                'parent_item_colon'     => __( 'Parent Gallery:', 'wpeducation' ),
                'add_new_item'          => __( 'Add New Gallery', 'wpeducation' ),
                'add_new'               => __( 'Add New', 'wpeducation' ),
                'new_item'              => __( 'New Gallery', 'wpeducation' ),
                'edit_item'             => __( 'Edit Gallery', 'wpeducation' ),
                'update_item'           => __( 'Update Gallery', 'wpeducation' ),
                'view_item'             => __( 'View Gallery', 'wpeducation' ),
                'search_items'          => __( 'Search Gallery', 'wpeducation' ),
                'not_found'             => __( 'Not found', 'wpeducation' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpeducation' ),
                'featured_image'        => __( 'Featured Image', 'wpeducation' ),
                'set_featured_image'    => __( 'Set featured image', 'wpeducation' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpeducation' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpeducation' ),
                'insert_into_item'      => __( 'Insert into item', 'wpeducation' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpeducation' ),
                'items_list'            => __( 'Gallery list', 'wpeducation' ),
                'items_list_navigation' => __( 'Gallery list navigation', 'wpeducation' ),
                'filter_items_list'     => __( 'Filter items list', 'wpeducation' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor','thumbnail','tag','elementor' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpeducation_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'gallery', $args );

           // Teachers Category
           $labels = array(
            'name'              => _x( 'Gallery Categories', 'wpeducation' ),
            'singular_name'     => _x( 'Gallery Category', 'wpeducation' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Gallery Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'gallery_cat' ),
           );

           register_taxonomy('gallery_cat','gallery',$args);

           // Register Events Post Type
            $labels = array(
                'name'                  => _x( 'Events', 'Post Type General Name', 'wpeducation' ),
                'singular_name'         => _x( 'Events', 'Post Type Singular Name', 'wpeducation' ),
                'menu_name'             => __( 'Events', 'wpeducation' ),
                'name_admin_bar'        => __( 'Events', 'wpeducation' ),
                'archives'              => __( 'Events Archives', 'wpeducation' ),
                'parent_item_colon'     => __( 'Parent Events:', 'wpeducation' ),
                'add_new_item'          => __( 'Add New Events', 'wpeducation' ),
                'add_new'               => __( 'Add New', 'wpeducation' ),
                'new_item'              => __( 'New Events', 'wpeducation' ),
                'edit_item'             => __( 'Edit Events', 'wpeducation' ),
                'update_item'           => __( 'Update Events', 'wpeducation' ),
                'view_item'             => __( 'View Events', 'wpeducation' ),
                'search_items'          => __( 'Search Events', 'wpeducation' ),
                'not_found'             => __( 'Not found', 'wpeducation' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpeducation' ),
                'featured_image'        => __( 'Featured Image', 'wpeducation' ),
                'set_featured_image'    => __( 'Set featured image', 'wpeducation' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpeducation' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpeducation' ),
                'insert_into_item'      => __( 'Insert into item', 'wpeducation' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpeducation' ),
                'items_list'            => __( 'Events list', 'wpeducation' ),
                'items_list_navigation' => __( 'Events list navigation', 'wpeducation' ),
                'filter_items_list'     => __( 'Filter items list', 'wpeducation' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag','elementor' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpeducation_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'events', $args );

           // Events Category
           $labels = array(
            'name'              => _x( 'Events Categories', 'wpeducation' ),
            'singular_name'     => _x( 'Events Category', 'wpeducation' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Events Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wpevents_category' ),
           );

           register_taxonomy('wpevents_category','events',$args);

           }
         add_action( 'init', 'wpeducation_custom_post_register', 0 );

    }
	
	
if( !function_exists('techeduem_custom_post_register') ){

	function techeduem_custom_post_register(){

		// Register Header
		$labels = array(
			'name'                  => _x( 'Headers', 'Post Type General Name', 'techeduem' ),
			'singular_name'         => _x( 'Header', 'Post Type Singular Name', 'techeduem' ),
			'menu_name'             => esc_html__( 'Header', 'techeduem' ),
			'name_admin_bar'        => esc_html__( 'Header', 'techeduem' ),
			'archives'              => esc_html__( 'Item Archives', 'techeduem' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'techeduem' ),
			'all_items'             => esc_html__( 'All Items', 'techeduem' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'techeduem' ),
			'add_new'               => esc_html__( 'Add New', 'techeduem' ),
			'new_item'              => esc_html__( 'New Item', 'techeduem' ),
			'edit_item'             => esc_html__( 'Edit Item', 'techeduem' ),
			'update_item'           => esc_html__( 'Update Item', 'techeduem' ),
			'view_item'             => esc_html__( 'View Item', 'techeduem' ),
			'search_items'          => esc_html__( 'Search Item', 'techeduem' ),
			'not_found'             => esc_html__( 'Not found', 'techeduem' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'techeduem' ),
			'featured_image'        => esc_html__( 'Featured Image', 'techeduem' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'techeduem' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'techeduem' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'techeduem' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'techeduem' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'techeduem' ),
			'items_list'            => esc_html__( 'Items list', 'techeduem' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'techeduem' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'techeduem' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Header', 'techeduem' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'elementor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-archive',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'techeduem_header', $args );

		// Register Footer
		$labels = array(
			'name'                  => _x( 'Footers', 'Post Type General Name', 'techeduem' ),
			'singular_name'         => _x( 'Footer', 'Post Type Singular Name', 'techeduem' ),
			'menu_name'             => esc_html__( 'Footer', 'techeduem' ),
			'name_admin_bar'        => esc_html__( 'Footer', 'techeduem' ),
			'archives'              => esc_html__( 'Item Archives', 'techeduem' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'techeduem' ),
			'all_items'             => esc_html__( 'All Items', 'techeduem' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'techeduem' ),
			'add_new'               => esc_html__( 'Add New', 'techeduem' ),
			'new_item'              => esc_html__( 'New Item', 'techeduem' ),
			'edit_item'             => esc_html__( 'Edit Item', 'techeduem' ),
			'update_item'           => esc_html__( 'Update Item', 'techeduem' ),
			'view_item'             => esc_html__( 'View Item', 'techeduem' ),
			'search_items'          => esc_html__( 'Search Item', 'techeduem' ),
			'not_found'             => esc_html__( 'Not found', 'techeduem' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'techeduem' ),
			'featured_image'        => esc_html__( 'Featured Image', 'techeduem' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'techeduem' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'techeduem' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'techeduem' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'techeduem' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'techeduem' ),
			'items_list'            => esc_html__( 'Items list', 'techeduem' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'techeduem' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'techeduem' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Footer', 'techeduem' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'elementor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-editor-kitchensink',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'techeduem_footer', $args );



	}
	add_action( 'init', 'techeduem_custom_post_register', 0 );

}	
	
	
?>