<?php
	
	function theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
		
		//wp_enqueue_style( 'timeline-style', get_stylesheet_directory_uri() . '/css/style.css' );
		
		/* qTip CSS */
		
		wp_enqueue_style('lightbox-css', get_stylesheet_directory_uri() . '/css/lightbox.css', null, false, false);
		
	}
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	/* ~~~~~^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^~~~~~
	~~~~PROPER WAY OF ADDING CHILD THEME CSS FILE ~~~~
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

	
	
	
	/**
	* Proper way to enqueue JS and IE fixes as of Mar 2015
	*/
	function pegasus_child_bootstrap_js() {
		
		wp_enqueue_script( 'timeline_js', get_stylesheet_directory_uri() . '/js/timeline.js', array(), '', true );
		
		wp_enqueue_script( 'modernizer_js', 'http://s.codepen.io/assets/libs/modernizr.js', array(), '', false );
		
		wp_enqueue_script( 'packery_js', get_stylesheet_directory_uri() . '/js/packery.js', array(), '', true );
		
		wp_enqueue_script( 'lightbox_js', get_stylesheet_directory_uri() . '/js/lightbox.pkgd.js', array(), '', true );
		
		
	} //end function
	add_action( 'wp_enqueue_scripts', 'pegasus_child_bootstrap_js' );
	

	//remove_filter('wp_nav_menu_items','add_header_three_link_to_menu', 10, 2);
	
	
	
	
	/*
	 add_filter('images_cpt','my_image_cpt');
    function my_image_cpt(){
        $cpts = array('page','post');
        return $cpts;
    }
	
	
	
	add_filter('list_images','my_list_images');
    function my_list_images(){
        //I only need two pictures
        $picts = array(
            'image1' => '_image1',
            'image2' => '_image2',
			 'image3' => '_image3',
            'image4' => '_image4',
            'image5' => '_image5',
            'image6' => '_image6',
            'image7' => '_image7',
            'image8' => '_image8',
			'image9' => '_image9',
            'image10' => '_image10',
            
        );
        return $picts;
    }
	
	*/
	
	
	
	
	/**
	 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
	 *
	 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
	 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
	 *
	 * @category YourThemeOrPlugin
	 * @package  Demo_CMB2
	 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
	 * @link     https://github.com/WebDevStudios/CMB2
	 */
	/**
	 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
	 */
	
		require_once dirname( __FILE__ ) . '/inc/cmb2/init.php';
	
	
		
		
		
		add_action( 'cmb2_admin_init', 'meow_register_metabox' );
		/**
		 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
		 */
		function meow_register_metabox() {
			// Start with an underscore to hide fields from custom fields list
			$prefix = 'meow';
			
			/*$cmb_demo->add_field( array(
				'name' => __( 'Test Text Area for Code', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textarea_code',
				'type' => 'textarea_code',
			) ); */
			
			
			/* $cmb_demo->add_field( array(
				'name'       => __( 'Test Text', 'cmb2' ),
				'desc'       => __( 'field description (optional)', 'cmb2' ),
				'id'         => $prefix . 'text',
				'type'       => 'text',
				//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			) ); */
			
			
			/* $cmb_demo->add_field( array(
				'name' => __( 'Test Title Weeeee', 'cmb2' ),
				'desc' => __( 'This is a title description', 'cmb2' ),
				'id'   => $prefix . 'title',
				'type' => 'title',
			) ); */
			
		
			/* $cmb_demo->add_field( array(
				'name' => __( 'Test Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'image',
				'type' => 'file',
			) ); */
			$cmb_demo2 = new_cmb2_box( array(
				'id'            => $prefix . 'metabox2',
				'title'         => __( 'Pets Options', 'cmb2' ),
				'object_types'  => array( 'posts' ), // Post type
				// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
				// 'context'    => 'normal',
				// 'priority'   => 'high',
				// 'show_names' => true, // Show field names on the left
				// 'cmb_styles' => false, // false to disable the CMB stylesheet
				// 'closed'     => true, // true to keep the metabox closed by default
			) );
			$cmb_demo2->add_field( array(
				'name' => __( 'Gender', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_gender',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'male'   => __( 'Male', 'cmb2' ),
					'female'     => __( 'Female', 'cmb2' ),
				),
			) ); 	
			$cmb_demo2->add_field( array(
				'name' => __( 'Size', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_size',
				'type' => 'select',
				'default'          => 'small',
				'options'          => array(
					'small' => __( 'Small', 'cmb2' ),
					'medium'   => __( 'Medium', 'cmb2' ),
					'large'     => __( 'Large', 'cmb2' ),
				),
			) );  
			$cmb_demo2->add_field( array(
				'name' => __( 'Full Grown', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_grown',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'yes'   => __( 'Yes', 'cmb2' ),
					'no'     => __( 'No', 'cmb2' ),
				),
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'Primary Breed', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_breed',
				'type' => 'text',
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'Rescued From', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_rescue',
				'type' => 'text',
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'Good With Other Dogs', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_friendly_to_dogs',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'yes'   => __( 'Yes', 'cmb2' ),
					'no'     => __( 'No', 'cmb2' ),
				),
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'Good With Other Cats', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_friendly_to_cats',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'yes'   => __( 'Yes', 'cmb2' ),
					'no'     => __( 'No', 'cmb2' ),
				),
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'Good With Other Children', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_friendly_to_child',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'yes'   => __( 'Yes', 'cmb2' ),
					'no'     => __( 'No', 'cmb2' ),
				),
			) ); 
			$cmb_demo2->add_field( array(
				'name' => __( 'House Trained', 'cmb2' ),
				//'desc' => __( 'Check this box to make the page fullwidth', 'cmb2' ),
				'id'   => $prefix . '_house_trained',
				'type' => 'select',
				'default'          => 'custom',
				'options'          => array(
					'custom' => __( 'Unknown', 'cmb2' ),
					'yes'   => __( 'Yes', 'cmb2' ),
					'no'     => __( 'No', 'cmb2' ),
				),
			) ); 
			
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		