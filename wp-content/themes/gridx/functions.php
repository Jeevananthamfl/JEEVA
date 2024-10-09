<?php

/**
 * gridx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridx
 */

/**
 * Required Files
 */

require_once get_template_directory() . '/inc/gridx-class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/redux/config.php';
require_once get_template_directory() . '/inc/redux/color.php';

/*TGM PLUGIN*/
require_once get_template_directory() . '/tgm-plugin/recommend_plugins.php';

/**
 * Enqueue Google Fonts
 */

function gridx_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'gridx' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Inter:100,200,300,400,500,600,700,800,&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
    return $font_url;
}

/**
 * Register and Enqueue Styles.
 */

function gridx_register_styles() {

    wp_enqueue_style( 'icon', get_template_directory_uri() . '/assets/css/iconoir.css' );
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    
    wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css' );
	
	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 

    if ($gridx_options['gridx_color_switcher_options'] == 1) {
		
		wp_enqueue_style( 'gridx-style', get_template_directory_uri() . '/assets/css/style.css' );
    
    }
	elseif($gridx_options['gridx_color_switcher_options'] == 2) {
		wp_enqueue_style( 'gridx-style', get_template_directory_uri() . '/assets/css/style-light.css' );
	}

    }
    else{
	    wp_enqueue_style( 'gridx-style', get_template_directory_uri() . '/assets/css/style.css' );
	}

    wp_enqueue_style( 'gridx-unit-test', get_template_directory_uri() . '/assets/css/gridx-unit-test.css');

    wp_enqueue_style( 'gridx-fonts', gridx_fonts_url(), array(), '1.0.0' );


    if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 

    if ($gridx_options['main_color_gridx'] == 1) {
    
    }

    } 

}
add_action( 'wp_enqueue_scripts', 'gridx_register_styles' );


/**
 * Register and Enqueue Scripts.
 */

function gridx_register_scripts() {

    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array( 'jquery' ),
        '',
        true
    );  

    wp_enqueue_script(
        'aos',
        get_template_directory_uri() . '/assets/js/aos.js',
        array( 'jquery' ),
        '',
        true
    );  

    wp_enqueue_script(
        'gridx-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'ajax-form',
        get_template_directory_uri() . '/assets/js/ajax-form.js',
        array( 'jquery' ),
        '',
        true
    );     
}

add_action( 'wp_enqueue_scripts', 'gridx_register_scripts' );



/**
 * gridx Theme Configuration
 */

function gridx_theme_config(){

    // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

         //add_image_size( 'gridx-blog', 350, 262, false);
        // add_image_size( 'gridx-blog-standard', 671, 400, false);
        // add_image_size( 'gridx-blog-sidebar', 730, 400, false);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',

        ) );

    if ( ! isset( $content_width ) ) $content_width = 900;

    $gridx_lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('gridx', $gridx_lang);

    if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'gridx' ),
                'footer-menu' => esc_html__( 'Footer Menu', 'gridx' ),
                // 'footer-menu2' => esc_html__( 'Community Links', 'gridx' ),
                // 'footer-menu' => esc_html__( 'Footer Links', 'gridx' ),
                )
            ); 
        } else
        {
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'gridx' ),
                )
            ); 
        }

}

add_action( 'after_setup_theme', 'gridx_theme_config' , 0 );

// gridx Pagination Display

function gridx_pagination() {

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'prev_text' => wp_specialchars_decode('<i class="iconoir-arrow-left"></i>',ENT_QUOTES),
        'next_text' => wp_specialchars_decode('<i class="iconoir-arrow-right"></i>',ENT_QUOTES),
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<nav aria-label="navigation"><ul class="pagination">';
        foreach ( $pages as $page ) {
                echo "<li class='page-item'>$page</li>";
        }
       echo '</ul></nav>';
        }
}

add_filter( 'widget_tag_cloud_args', 'gridx_change_tag_cloud_font_sizes');
function gridx_change_tag_cloud_font_sizes( array $args ) {
    $args['default'] = '13';
    $args['smallest'] = '13';
    $args['largest'] = '13';
    $args['unit'] = 'px';

    return $args;
}

/**
 * gridx Register Widgets
 */

add_action( 'widgets_init', 'gridx_widgets_init' );
function gridx_widgets_init() {

        register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'gridx' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'gridx' ),
        'before_widget' => '<div id="%1$s" class="blog-sidebar-widget %2$s" data-aos="zoom-in"><div class="blog-sidebar-widget-inner shadow-box">',
    'after_widget'  => '</div></div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

// gridx Category


function gridx_category() {
 $categories = get_the_category();
      $separator = ' ';
      $output = '';
      if($categories){
          foreach($categories as $category) {
              $output .= '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
          }
          echo trim($output, $separator);
      }
}


// gridx Comments Display

function gridx_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment;
   $gravatar = get_avatar($comment,$size='100' ); ?>
    <div class="comment-list">
    <div class="comment-avatar">
        <?php echo get_avatar($comment,$size='80' ); ?>
    </div>
    <div class="comment-body">
        
            <span class="date"><?php the_time('F j, Y'); ?></span>
            <h3><?php printf( get_comment_author()) ?></h3>
            <p><?php comment_text() ?></p>
           <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply' , 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      
    </div>
    </div>
<?php
}
  
// Gridx Demo-Import

function gridx_import_files() {
    return array(

        array(
            'import_file_name'           => 'HOME',
            'import_file_url'            => trailingslashit(site_url('/')) . 'wp-content/themes/gridx/demo-import/data.xml',
            'import_widget_file_url'     => trailingslashit(site_url('/')) . 'wp-content/themes/gridx/demo-import/widget.wie',
            'import_customizer_file_url' => trailingslashit(site_url('/')) . 'wp-content/themes/gridx/demo-import/custom.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => trailingslashit(site_url('/')) . 'wp-content/themes/gridx/demo-import/redux.json',
                    'option_name' => 'gridx_options',
                ),
            ),
            'import_preview_image_url'   => 'https://wpriverthemes.com/gridx/wp-content/themes/gridx/assets/images/gridx.jpg',
            'import_notice'                => esc_html__( 'Import process may take 2-5 minutes. If you facing any issues please contact our support.', 'gridx' ),
            'preview_url'                => 'https://wpriverthemes.com/gridx/',
        ),

    );
}
add_filter( 'pt-ocdi/import_files', 'gridx_import_files' );

function gridx_ocdi_after_import( $selected_import ) {

    if ( 'HOME' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'HOME' );
        $posts_page_id = get_page_by_title( 'BLOG WITH RIGHTSIDEBAR' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $posts_page_id->ID );
                
    }

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
        )
    );
}
add_action( 'pt-ocdi/after_import', 'gridx_ocdi_after_import' );

