<?php
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

<!-- Footer -->
        <footer class="footer-area">
            <div class="container">
                <div class="footer-content text-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="<?php echo esc_attr__( 'Logo', 'gridx' )?>">
                    </a>
                    <p class="copyright">
                        <?php esc_html_e('&copy; All rights reserved by ' , 'gridx'); ?><span><?php esc_html_e('WordPressRiver' , 'gridx'); ?></span>
                    </p>
                </div>
            </div>
        </footer>

</main>

<?php  wp_footer(); ?>
</body>
</html>