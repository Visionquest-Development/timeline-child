<?php
	
	function theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
		
		//wp_enqueue_style( 'timeline-style', get_stylesheet_directory_uri() . '/css/style.css' );
		
		/* qTip CSS */
		//wp_enqueue_style('twentytwenty-css', get_stylesheet_directory_uri() . '/css/twentytwenty.css', null, false, false);
		
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
		
		//wp_enqueue_script( 'matchHeight_js', get_stylesheet_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '', true );
		
		
	} //end function
	add_action( 'wp_enqueue_scripts', 'pegasus_child_bootstrap_js' );
	

	//remove_filter('wp_nav_menu_items','add_header_three_link_to_menu', 10, 2);
	
	
	
	
	
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*===============================================================
			FRONT END FORM SUBMISSION 
		================================================================*/	
			
		/**
		 * Register the form and fields for our front-end submission form
		 */
		function wds_frontend_form_register() {
			$cmb = new_cmb2_box( array(
				'id'           => 'front-end-post-form',
				'object_types' => array( 'testimonial' ),
				'hookup'       => false,
				'save_fields'  => false,
			) );
			$cmb->add_field( array(
				'name'    => __( 'Post Title', 'wds-post-submit' ),
				'desc' => __( 'Put the event you went to. Ex. Imagine Music Festival AUG2016', 'wds-post-submit' ),
				'id'      => 'submitted_post_title',
				'type'    => 'text',
				'default' => __( 'TomorrowWorld 2016', 'wds-post-submit' ),
			) );
			$cmb->add_field( array(
				'name' => __( 'Your Name', 'wds-post-submit' ),
				//'desc' => __( 'Please enter your email so we can contact you if we use your post.', 'wds-post-submit' ),
				'id'   => 'submitted_authors_name',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Your Email', 'wds-post-submit' ),
				'desc' => __( 'Please enter your email so we can contact you if we use your post.', 'wds-post-submit' ),
				'id'   => 'submitted_authors_email',
				'type' => 'text_email',
			) );
			$cmb->add_field( array(
				'name'    => __( 'Write your Review', 'wds-post-submit' ),
				'id'      => 'submitted_post_content',
				'type'    => 'wysiwyg',
				'options' => array(
					'textarea_rows' => 12,
					'media_buttons' => false,
				),
			) );
			
			/*$cmb->add_field( array(
				'name' => __( 'Your Company Name (optional)', 'wds-post-submit' ),
				//'desc' => __( 'Please enter your email so we can contact you if we use your post.', 'wds-post-submit' ),
				'id'   => 'submitted_testimonial_company',
				'type' => 'text',
			) );
			
			$cmb->add_field( array(
				'name' => __( 'Your Position (optional)', 'wds-post-submit' ),
				//'desc' => __( 'Please enter your name for author credit on the new post.', 'wds-post-submit' ),
				'id'   => 'submitted_testimonial_position',
				'type' => 'text',
			) );*/
			
			$cmb->add_field( array(
				'name'       => __( 'Add your photo, or company photo (optional)', 'wds-post-submit' ),
				'desc' => __( 'This will be the main image on the homepage.', 'wds-post-submit' ),
				'id'         => 'submitted_post_thumbnail',
				'type'       => 'text',
				'attributes' => array(
					'type' => 'file', // Let's use a standard file upload field
				),
			) );
			
			
			$cmb->add_field( array(
				'name' => 'Test File List',
				'desc' => 'This will show up in a masonry grid on the post itself when people click Read More. ',
				'id'   => 'wiki_test_file_list',
				'type' => 'file_list',
				// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			) );
			
			/*$cmb->add_field( array(
				'name' => 'Test File List',
				'desc' => '',
				'id'   => 'wiki_test_file_list',
				'type' => 'file_list',
				// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
				// Optional, override default text strings
				'text' => array(
					'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
					'remove_image_text' => 'Replacement', // default: "Remove Image"
					'file_text' => 'Replacement', // default: "File:"
					'file_download_text' => 'Replacement', // default: "Download"
					'remove_text' => 'Replacement', // default: "Remove"
				),
			) ); */
		
		}
		add_action( 'cmb2_init', 'wds_frontend_form_register' );
		/**
		 * Gets the front-end-post-form cmb instance
		 *
		 * @return CMB2 object
		 */
		function wds_frontend_cmb2_get() {
			// Use ID of metabox in wds_frontend_form_register
			$metabox_id = 'front-end-post-form';
			// Post/object ID is not applicable since we're using this form for submission
			$object_id  = 'fake-oject-id';
			// Get CMB2 metabox object
			return cmb2_get_metabox( $metabox_id, $object_id );
		}
		
		
		
		/**
		 * Handle the cmb-frontend-form shortcode
		 *
		 * @param  array  $atts Array of shortcode attributes
		 * @return string       Form html
		 */
		function wds_do_frontend_form_submission_shortcode( $atts = array() ) {
			// Get CMB2 metabox object
			$cmb = wds_frontend_cmb2_get();
			// Get $cmb object_types
			$post_types = $cmb->prop( 'post' );
			// Current user
			$user_id = get_current_user_id();
			// Parse attributes
			$atts = shortcode_atts( array(
				'post_author' => $user_id ? $user_id : 1, // Current user, or admin
				'post_status' => 'pending',
				'post_type'   => reset( $post_types ), // Only use first object_type in array
			), $atts, 'octane-frontend-form' );
			/*
			 * Let's add these attributes as hidden fields to our cmb form
			 * so that they will be passed through to our form submission
			 */
			foreach ( $atts as $key => $value ) {
				$cmb->add_hidden_field( array(
					'field_args'  => array(
						'id'    => "atts[$key]",
						'type'  => 'hidden',
						'default' => $value,
					),
				) );
			}
			// Initiate our output variable
			$output = '';
			// Get any submission errors
			if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
				// If there was an error with the submission, add it to our ouput.
				$output .= '<h3>' . sprintf( __( 'There was an error in the submission: %s', 'wds-post-submit' ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
			}
			// If the post was submitted successfully, notify the user.
			if ( isset( $_GET['post_submitted'] ) && ( $post = get_post( absint( $_GET['post_submitted'] ) ) ) ) {
				// Get submitter's name
				$name = get_post_meta( $post->ID, 'submitted_author_name', 1 );
				$name = $name ? ' '. $name : '';
				// Add notice of submission to our output
				$output .= '<h3>' . sprintf( __( 'Thank you%s, your new post has been submitted and is pending review by a site administrator.', 'wds-post-submit' ), esc_html( $name ) ) . '</h3>';
			}
			// Get our form
			$output .= cmb2_get_metabox_form( $cmb, 'fake-oject-id', array( 'save_button' => __( 'Submit Post', 'wds-post-submit' ) ) );
			return $output;
		}
		add_shortcode( 'cmb-frontend-form', 'wds_do_frontend_form_submission_shortcode' );
		
		
		
		/**
		 * Handles form submission on save. Redirects if save is successful, otherwise sets an error message as a cmb property
		 *
		 * @return void
		 */
		function wds_handle_frontend_new_post_form_submission() {
			// If no form submission, bail
			if ( empty( $_POST ) || ! isset( $_POST['submit-cmb'], $_POST['object_id'] ) ) {
				return false;
			}
			// Get CMB2 metabox object
			$cmb = wds_frontend_cmb2_get();
			$post_data = array();
			// Get our shortcode attributes and set them as our initial post_data args
			if ( isset( $_POST['atts'] ) ) {
				foreach ( (array) $_POST['atts'] as $key => $value ) {
					$post_data[ $key ] = sanitize_text_field( $value );
				}
				unset( $_POST['atts'] );
			}
			// Check security nonce
			if ( ! isset( $_POST[ $cmb->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() ) ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'security_fail', __( 'Security check failed.' ) ) );
			}
			// Check title submitted
			if ( empty( $_POST['submitted_post_title'] ) ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'New post requires a title.' ) ) );
			}
			// And that the title is not the default title
			if ( $cmb->get_field( 'submitted_post_title' )->default() == $_POST['submitted_post_title'] ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Please enter a new title.' ) ) );
			}
			/**
			 * Fetch sanitized values
			 */
			$sanitized_values = $cmb->get_sanitized_values( $_POST );
			// Set our post data arguments
			$post_data['post_title']   = $sanitized_values['submitted_post_title'];
			unset( $sanitized_values['submitted_post_title'] );
			$post_data['post_content'] = $sanitized_values['submitted_post_content'];
			unset( $sanitized_values['submitted_post_content'] );
			
			// Create the new post
			$new_submission_id = wp_insert_post( $post_data, true );
			
			// If we hit a snag, update the user
			if ( is_wp_error( $new_submission_id ) ) {
				return $cmb->prop( 'submission_error', $new_submission_id );
			}
			/**
			 * Other than post_type and post_status, we want
			 * our uploaded attachment post to have the same post-data
			 */
			unset( $post_data['post_type'] );
			unset( $post_data['post_status'] );
			// Try to upload the featured image
			$img_id = wds_frontend_form_photo_upload( $new_submission_id, $post_data );
			// If our photo upload was successful, set the featured image
			if ( $img_id && ! is_wp_error( $img_id ) ) {
				set_post_thumbnail( $new_submission_id, $img_id );
			}
			// Loop through remaining (sanitized) data, and save to post-meta
			foreach ( $sanitized_values as $key => $value ) {
				if ( is_array( $value ) ) {
					$value = array_filter( $value );
					if( ! empty( $value ) ) {
						update_post_meta( $new_submission_id, $key, $value );
					}
				} else {
					update_post_meta( $new_submission_id, $key, $value );
				}
			}
			/*
			 * Redirect back to the form page with a query variable with the new post ID.
			 * This will help double-submissions with browser refreshes
			 */
			wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
			exit;
		}
		add_action( 'cmb2_after_init', 'wds_handle_frontend_new_post_form_submission' );
		/**
		 * Handles uploading a file to a WordPress post
		 *
		 * @param  int   $post_id              Post ID to upload the photo to
		 * @param  array $attachment_post_data Attachement post-data array
		 */
		function wds_frontend_form_photo_upload( $post_id, $attachment_post_data = array() ) {
			// Make sure the right files were submitted
			if (
				empty( $_FILES )
				|| ! isset( $_FILES['submitted_post_thumbnail'] )
				|| isset( $_FILES['submitted_post_thumbnail']['error'] ) && 0 !== $_FILES['submitted_post_thumbnail']['error']
			) {
				return;
			}
			// Filter out empty array values
			$files = array_filter( $_FILES['submitted_post_thumbnail'] );
			// Make sure files were submitted at all
			if ( empty( $files ) ) {
				return;
			}
			// Make sure to include the WordPress media uploader API if it's not (front-end)
			if ( ! function_exists( 'media_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
			}
			// Upload the file and send back the attachment post ID
			return media_handle_upload( 'submitted_post_thumbnail', $post_id, $attachment_post_data );
		}
		 
		 
		 
		 /**
		 * Outputs a cmb2 file_list
		 *
		 * @param  string  $file_list_meta_key The field meta key. ($prefix . 'file_list')
		 * @param  string  $img_size           Size of image to show
		 */
		function jt_cmb2_file_list_images( $file_list_meta_key, $img_size = 'medium' ) {
			echo jt_cmb2_get_file_list_images( $file_list_meta_key, $img_size );
		}
		/**
		 * Returns a cmb2 file_list
		 *
		 * @param  string  $file_list_meta_key The field meta key. ($prefix . 'file_list')
		 * @param  string  $img_size           Size of image to show
		 * @return string                      The html markup for the images
		 */
		function jt_cmb2_get_file_list_images( $file_list_meta_key, $img_size = 'medium' ) {
			// Get the list of files
			$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
			$images = '';
			// Loop through them and output an image
			foreach ( (array) $files as $attachment_id => $attachment_url ) {
				$images .= '<div class="file-list-image">';
				$images .= wp_get_attachment_image( $attachment_id, $img_size );
				$images .= '</div>';
			}
			return $images ? '<div class="file-list-wrap">' . $images . '</div>' : '';
		}
		
		
		