<?php
global $gridx_options;
/**
 * Header file for the gridx WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gridx
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<main class="main-workdetails-page">

    <!-- Header -->
    <header class="header-area">
        <div class="container">
            <div class="gx-row d-flex align-items-center justify-content-between">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                   <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>				
<img src="<?php echo esc_url($gridx_options['main-logo']['url']); ?>" alt="<?php echo esc_attr__( 'Logo', 'gridx' )?>">
				
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>	
<img src="<?php echo esc_url($gridx_options['main-logo-dark']['url']); ?>" alt="<?php echo esc_attr__( 'Logo', 'gridx' )?>">
						
<?php endif; } ?>
                </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
               <?php 
                    wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'nav',
                    'container_class' => 'navbar',
                    'menu_class'      => 'menu',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new gridx_Bootstrap_Navwalker(),
                    ) );
                ?>

                <!-- End Navigation -->

                <div class="show-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    
