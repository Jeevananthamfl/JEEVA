<?php
global $gridx_options;
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gridx
 */
 
?>

</div>
</section> 
<!-- Footer -->
  <footer class="footer-area">
            <div class="container">
                <div class="footer-content text-center">

<?php if ( $gridx_options['gridxflogo_switcher_options'] == 1 ) { ?> 
                    <a href="<?php echo esc_html($gridx_options['flogo_link']); ?>" class="logo">
					<?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>				
<img src="<?php echo esc_url($gridx_options['footer_logo']['url']); ?>" alt="<?php echo esc_attr__( 'Logo', 'gridx' )?>">
				
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>	
<img src="<?php echo esc_url($gridx_options['footer_logo_dark']['url']); ?>" alt="<?php echo esc_attr__( 'Logo', 'gridx' )?>">
						
<?php endif; } ?>
                    </a>
<?php } ?>

                    <?php 
                    wp_nav_menu( array(
                    'theme_location'  => 'footer-menu',
                    'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'footer-menu',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new gridx_Bootstrap_Navwalker(),
                    ) );
                    ?>
                 
                    <p class="copyright">
                        <?php echo esc_html($gridx_options['copyright']); ?> <span>
                            <?php
                    if ($gridx_options['footbtn_new_tab'] == 1) {
                        ?>
                        <a target="_blank" href="<?php echo esc_html($gridx_options['comp_link']); ?>"><?php echo esc_html($gridx_options['compname']); ?></a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo esc_html($gridx_options['comp_link']); ?>"><?php echo esc_html($gridx_options['compname']); ?></a>
                        <?php
                    }
                    ?>
                            
                        </span>
                    </p>
                </div>
            </div>
        </footer>

</main>
    
<?php  wp_footer(); ?>
</body>
</html>
