<?php
    // Menus
	register_nav_menus( array(
		'main_menu' => 'Main menu',
		'footer_menu' => 'Footer menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    // Menus ends

    // External CSS
    function anotherlovestory_theme_name_styles() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Cantarell:400,700', false );
        wp_enqueue_style( 'wpb-editor', get_template_directory_uri() . '/editor-style.css', false );
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/vendor/slick/slick.css', false);
        wp_enqueue_style( 'modal', get_template_directory_uri() . '/vendor/jquery-modal/jquery.modal.min.css', false);
        wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/vendor/slick/slick-theme.css', false);
    }

    add_action( 'wp_enqueue_scripts', 'anotherlovestory_theme_name_styles' );
    // External CSS

    // Vendor scripts

    function anotherlovestory_vendor_scripts() {
        wp_enqueue_script( 'anotherlovestory-cookie', get_template_directory_uri() . '/vendor/js-cookie/src/js.cookie.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'anotherlovestory-theme', get_template_directory_uri() . '/scripts/theme.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'anotherlovestory-modal', get_template_directory_uri() . '/vendor/jquery-modal/jquery.modal.min.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/vendor/slick/slick.min.js', array ( 'jquery' ), 1.1, true);
    }
    add_action( 'wp_enqueue_scripts', 'anotherlovestory_vendor_scripts' );
    // Vendor scripts ends

    // Custom post types
   function create_posttype() {
        register_post_type('Book',
            array(
                'labels' => array(
                    'name' => __( 'Books' ),
                    'singular_name' => __( 'Book' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'books'),
                'supports' => array('title', 'thumbnail', 'editor'),
                'show_in_nav_menus'   => true
            )
        );

        register_post_type('Inspirers',
            array(
                'labels' => array(
                    'name' => __( 'Inspirers' ),
                    'singular_name' => __( 'Inspirer' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'inspirers'),
                'supports' => array('title', 'thumbnail', 'editor'),
                'show_in_nav_menus'   => true
            )
        );

        register_post_type('Stories',
            array(
                'labels' => array(
                    'name' => __( 'Stories' ),
                    'singular_name' => __( 'Story' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'stories'),
                'supports' => array('title', 'thumbnail', 'editor'),
                'show_in_nav_menus'   => true
            )
        );
    }


    /**
     * Show all Portfolio CPT items on archive
     *
     */

    add_action( 'pre_get_posts', 'anotherlovestory_show_all_work' );

    function anotherlovestory_show_all_work( $query ) {

        if ($query->is_main_query() ) {
            $query->set('posts_per_page', -1 );
        }
    }

    add_theme_support( 'post-thumbnails' );
    flush_rewrite_rules();

    add_action( 'init', 'create_posttype' );

    // Custom post types ends

    // Checkout Form

    /**
     * Register the Smart Tag so it will be available to select in the form builder.
     *
     * @link   https://wpforms.com/developers/how-to-create-a-custom-smart-tag/
     *
     */
    function wpf_dev_register_smarttag( $tags ) {
    
        // Key is the tag, item is the tag name.
        $tags['order_reference'] = 'Order Reference';
    
        return $tags;
    }
    add_filter( 'wpforms_smart_tags', 'wpf_dev_register_smarttag' );
    
    /**
     * Process the Smart Tag.
     *
     * @link   https://wpforms.com/developers/how-to-create-a-custom-smart-tag/
     *
     */
    function wpf_dev_process_smarttag( $content, $tag ) {
    
        // Only run if it is our desired tag.
        if ( 'order_reference' === $tag ) {
            $length = 10;    
            $ref = substr(md5(microtime()), 0, 10);
            // Replace the tag with our link.
            $content = str_replace( '{order_reference}', $ref, $content );
        }
    
        return $content;
    }
    add_filter( 'wpforms_smart_tag_process', 'wpf_dev_process_smarttag', 10, 2 );

    /**
     * Show all fields in the confirmation message
     *
     * @link https://wpforms.com/developers/how-to-show-all-fields-in-your-confirmation-message/
     *
     */
    
    function wpf_dev_frontend_confirmation_message( $message, $form_data, $fields, $entry_id ) {
        // Only run on my form with ID = 63
        if ( absint( $form_data['id'] ) !== 63 ) {
            return $message;
        }
            
        $book_title = $fields['7']['value'];        
        $order_reference = $fields['6']['value'];        
        
        $message = "<p>Thank you for your order. Order reference: " . $order_reference . ".</p>";
        $message .= "<p>We hope it will help you on your life journey. We are all on the same path and know that we care for you.</p>";
        $message .= "<p>Your book will be shipped in the next few days!</p>";
        $message .= "<p>Another Love Story</p>";

        return $message;
    }
    add_filter( 'wpforms_frontend_confirmation_message', 'wpf_dev_frontend_confirmation_message', 10, 4 );
    

    // Checkout form ends

	// Theme customisers

	function anotherlovestory_theme_customizer( $wp_customize ) {
		// logo
        $wp_customize->add_section( 'anotherlovestory_logo_section' , array(
			'title'       => __( 'Logo', 'anotherlovestory' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		));

		$wp_customize->add_setting( 'anotherlovestory_logo' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'anotherlovestory_logo', array(
		    'label'    => __( 'Logo', 'anotherlovestory' ),
		    'section'  => 'anotherlovestory_logo_section',
		    'settings' => 'anotherlovestory_logo',
        )));

        $wp_customize->remove_control("header_image");


        function test_sanitize_text( $input ) {
            $allowed_html = array(
                'br' => array(),
            );

            return wp_kses( $input, $allowed_html );
        }
	}

    add_action( 'customize_register', 'anotherlovestory_theme_customizer' );

    // Theme customisers ends

    // Sidebars

    function anotherlovestory_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Footer column one', 'anotherlovestory' ),
            'id' => 'footer-one-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer column two', 'anotherlovestory' ),
            'id' => 'footer-two-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }

    // Sidebars ends

    /*
     * Resister widgets from our classes
    */
    add_action( 'widgets_init', 'anotherlovestory_widgets_init' );
    function wpb_load_widget() {

    }
    add_action( 'widgets_init', 'wpb_load_widget' );

    // Widgets ends

     add_post_type_support( 'page', 'excerpt' );
     add_action( 'admin_menu', 'my_remove_menu_pages' );

    function my_remove_menu_pages() {
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
    }

    // Only flush the file cache with each request to post list table, edit post screen, or theme editor.
    function wp_42573_fix_template_caching( WP_Screen $current_screen ) {

        if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
            return;
        }
        $theme = wp_get_theme();
        if ( ! $theme ) {
            return;
        }
        $cache_hash = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
        $label = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
        $transient_key = substr( $label, 0, 29 ) . md5( $label );
        delete_transient( $transient_key );
    }
    add_action( 'current_screen', 'wp_42573_fix_template_caching' );

    // Register custom post types with the flipping loop
    function anotherlovestory_add_custom_types( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array(
        'post', 'nav_menu_item', 'product'
            ));
        return $query;
        }
    }

    add_filter( 'pre_get_posts', 'anotherlovestory_add_custom_types' );

        function wpb_mce_buttons_2($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
    add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

    function my_mce4_options($init) {

        $custom_colours = '
            "000000", "Palette darkest",
            "9d9d9c", "Palette light",
            "e3e3e3", "Palette outline"
        ';

        // build colour grid default+custom colors
        $init['textcolor_map'] = '['.$custom_colours.']';

        $init['textcolor_rows'] = 1;

        return $init;
    }
    add_filter('tiny_mce_before_init', 'my_mce4_options');
    /*
    * Callback function to filter the MCE settings
    */

    function my_mce_before_init_insert_formats( $init_array ) {

    // Define the style_formats array

        $style_formats = array(
            /*
            * Each array child is a format with it's own settings
            * Notice that each array has title, block, classes, and wrapper arguments
            * Title is the label which will be visible in Formats menu
            * Block defines whether it is a span, div, selector, or inline style
            * Classes allows you to define CSS classes
            * Wrapper whether or not to add a new block-level element around any selected elements
            */
            array(
                'title' => 'Large black',
                'block' => 'span',
                'classes' => 'large-black',
                'wrapper' => true,

            ),
            array(
                'title' => 'Large grey',
                'block' => 'span',
                'classes' => 'large-grey',
                'wrapper' => true,
            ),
            array(
                'title' => 'Small black',
                'block' => 'span',
                'classes' => 'small-black',
                'wrapper' => true,
            ),
            array(
                'title' => 'Small grey',
                'block' => 'span',
                'classes' => 'small-grey',
                'wrapper' => true,
            ),
        );
        // Insert the array, JSON ENCODED, into 'style_formats'
        $init_array['style_formats'] = json_encode( $style_formats );

        return $init_array;

    }
    // Attach callback to 'tiny_mce_before_init'
    add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

    add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
    function wpdocs_theme_setup() {
        add_image_size( 'wordpress-thumbnail', 400, 400, TRUE );
        add_image_size( 'wordpress-landscape', 400, 260, TRUE );
    }
?>