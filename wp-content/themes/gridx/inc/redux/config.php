<?php

if (!class_exists('Redux'))
    {
    return;
    }
function newIconFont() 
    { 
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.css' );
    }

add_action( 'redux/page/gridx_options/enqueue', 'newIconFont' );

$opt_name = "gridx_options";
$theme    = wp_get_theme();
$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name') ,
    'display_version' => $theme->get('Version') ,
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title'        => esc_html__( 'Gridx Options', 'gridx' ),
    'google_api_key' => '',
    'google_update_weekly' => false,
    'async_typography' => true,
    'admin_bar' => false,
    'admin_bar_icon' => '',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => false,
    'page_priority' => 3,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => 'themeoptions',
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '',
    'show_import_export' => true
);
Redux::setArgs( $opt_name, $args );

//Header

Redux::setSection($opt_name, array(
    'title' => esc_html__('Main Header', 'gridx') ,
    'id' => esc_html__('main-header', 'gridx') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(

         array(
                'id'       => 'gridxlogo_switcher_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'ON', 'gridx' ),
                    "2"         => esc_html__( 'OFF', 'gridx' ),
                ),
                'title'    => esc_html__( 'Logo Controls', 'gridx' ),
            ),

        array(
            'title'     => esc_html__( 'Logo Light Version', 'gridx' ),
            'id'        => 'main-logo',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/logo.svg'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Logo Dark Version', 'gridx' ),
            'id'        => 'main-logo-dark',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/logo-dark.svg'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Link', 'gridx' ),
            'id'        => 'logo_link',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Name', 'gridx' ),
            'id'        => 'button_name',
            'type'      => 'text',
            'default'   => esc_html__( 'Let s talk', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'gridx' ),
            'id'        => 'butn_link',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'headbtn_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

    )
));

//Footer

Redux::setSection($opt_name, array(
    'title' => esc_html__('Main Footer', 'gridx') ,
    'id' => esc_html__('main-footer', 'gridx') ,
    'icon' => 'fa-solid fa-copyright',
    'fields' => array(

        array(
                'id'       => 'gridxflogo_switcher_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'ON', 'gridx' ),
                    "2"         => esc_html__( 'OFF', 'gridx' ),
                ),
                'title'    => esc_html__( 'Logo Controls', 'gridx' ),
            ),

        array(
            'title'     => esc_html__( 'Logo Light Version', 'gridx' ),
            'id'        => 'footer_logo',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/logo.svg'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Logo Dark Version', 'gridx' ),
            'id'        => 'footer_logo_dark',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/logo-dark.svg'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Link', 'gridx' ),
            'id'        => 'flogo_link',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Copyright Text', 'gridx' ),
            'id'        => 'copyright',
            'type'      => 'text',
            'default'   => esc_html__( '&copy; All rights reserved by', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Company Name', 'gridx' ),
            'id'        => 'compname',
            'type'      => 'text',
            'default'   => esc_html__( 'WordPress River', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Company Name Link', 'gridx' ),
            'id'        => 'comp_link',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'footbtn_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

    )
));


//Sticky Header

Redux::setSection($opt_name, array(
    'title' => esc_html__('Sticky Header', 'gridx') ,
    'id' => esc_html__('sticky-header', 'gridx') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(
		
        array(
            'title'     => esc_html__( 'Hero Image', 'gridx' ),
            'id'        => 'heroimg',
            'type'      => 'media',
            'default'  => array(
            'url'=> get_template_directory_uri() . '/assets/images/me.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Heading', 'gridx' ),
            'id'        => 'heading',
            'type'      => 'text',
            'default'   => esc_html__( 'David Henderson', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Sub Heading', 'gridx' ),
            'id'        => 'subheading',
            'type'      => 'text',
            'default'   => esc_html__( '@davidhenderson', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Section-1', 'gridx' ),
            'id'        => 'sec1',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Icon Class 1', 'gridx' ),
            'id'        => 'class1',
            'type'      => 'text',
            'default'   => esc_html__( 'iconoir-dribbble', 'gridx' ),
            'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'gridx' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Link 1', 'gridx' ),
            'id'        => 'icon_link1',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'socicon1_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

        array(
            'title'     => esc_html__( 'Section-2', 'gridx' ),
            'id'        => 'sec2',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Icon Class 2', 'gridx' ),
            'id'        => 'class2',
            'type'      => 'text',
            'default'   => esc_html__( 'iconoir-twitter', 'gridx' ),
            'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'gridx' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Link 2', 'gridx' ),
            'id'        => 'icon_link2',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'socicon2_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

        array(
            'title'     => esc_html__( 'Section-3', 'gridx' ),
            'id'        => 'sec3',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Icon Class 3', 'gridx' ),
            'id'        => 'class3',
            'type'      => 'text',
            'default'   => esc_html__( 'iconoir-instagram', 'gridx' ),
            'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'gridx' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Link 3', 'gridx' ),
            'id'        => 'icon_link3',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'socicon3_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

        array(
            'title'     => esc_html__( 'Section-4', 'gridx' ),
            'id'        => 'sec4',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Icon Class 4', 'gridx' ),
            'id'        => 'class4',
            'type'      => 'text',
            'default'   => esc_html__( 'iconoir-facebook-tag', 'gridx' ),
            'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'gridx' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Link 4', 'gridx' ),
            'id'        => 'icon_link4',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'socicon4_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),

        array(
            'title'     => esc_html__( 'Button', 'gridx' ),
            'id'        => 'bttn',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Button Name', 'gridx' ),
            'id'        => 'buttonname',
            'type'      => 'text',
            'default'   => esc_html__( 'Contact Me', 'gridx' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'gridx' ),
            'id'        => 'buttonlink',
            'type'      => 'text',
            'default'   => esc_html__( 'https://wpriverthemes.com/gridx/contact-info/', 'gridx' ),
            'indent'    => true
        ),

        array(
            'id'       => 'credbtn_new_tab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Open in new window', 'gridx' ),
        ),
		
		array(
            'title'     => esc_html__( 'Background Image', 'gridx' ),
            'id'        => 'bgimg',
            'type'      => 'media',
            'default'  => array(
            'url'=> get_template_directory_uri() . '/assets/images/bg1.png'
                ), 
            'indent'    => true
        ),
		
		 array(
            'title'     => esc_html__( 'Button Light Version', 'gridx' ),
            'id'        => 'button_light',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/icon-2.svg'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Button Dark Version', 'gridx' ),
            'id'        => 'button_dark',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/icon.svg'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Star Image Light Version', 'gridx' ),
            'id'        => 'star_light',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/star-2-2.png'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Star Image Dark Version', 'gridx' ),
            'id'        => 'star_dark',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/star-2.png'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Box Image Dark Version', 'gridx' ),
            'id'        => 'box_dark_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/icon2.png'
                ), 
            'indent'    => true
        ),
		
		array(
            'title'     => esc_html__( 'Box Image Light Version', 'gridx' ),
            'id'        => 'box_light_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/icon2-2.png'
                ), 
            'indent'    => true
        ),
		
		
    )
));

//Color

Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'gridx') ,
    'id' => esc_html__('gridx_color', 'gridx') ,
    'icon' => 'fas fa-edit',
    'fields' => array(
	array(
                'id'       => 'gridx_color_switcher_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'DARK', 'gridx' ),
                    "2"         => esc_html__( 'LIGHT', 'gridx' ),
                ),
                'title'    => esc_html__( 'Color Theme Options', 'ambrox' ),
                'subtitle' => esc_html__( 'Select Color Theme Options.', 'gridx' ),
            ),
		
    array(
            'id'        => 'main_color_gridx',
            'title'     => esc_html__( 'Main Theme Color', 'gridx' ),
            'subtitle'  => esc_html__( 'The main color of the site.', 'gridx' ),
            'type'      => 'select',
            'options'   => array(
                '1'     => esc_html__( 'Custom Colors', 'gridx' ),
            ),
            'default'   => '1',
            'indent'    => true,
        ),

    array(
            'title'     => esc_html__( 'Custom Color Option', 'gridx' ),
            'id'        => 'customcolors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array( 'main_color_gridx', 'equals', '1' ),
        ),

    array(
            'title'     => esc_html__( 'Choose Main Theme Color', 'gridx' ),
            'id'        => 'colorcode',
            'type'      => 'color',
            'default'  => '#5b78f6',
            'validate' => 'color',
            'transparent' => false,
            'required'  => array( 'main_color_gridx', 'equals', '1' ),
        ),
)
));
			