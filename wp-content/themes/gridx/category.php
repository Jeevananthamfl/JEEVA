<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gridx
 */

if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_header('pages');
}
else {
    get_header();
}
?>

<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'HOME - ', 'gridx' )?></a><?php esc_html_e( 'CATEGORY ARCHIVES', 'gridx' ) ?></p>
            <h1 class="section-heading"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/star-2.png'); ?>" alt="<?php echo esc_attr__( 'Star', 'gridx' )?>"><?php esc_html_e(' Category Archives:', 'gridx' ); echo single_cat_title( '', false ); ?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/star-2.png'); ?>" alt="<?php echo esc_attr__( 'Star', 'gridx' )?>"></h1>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- Blog Items -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
            <div class="col-md-8">
            <?php } else : ?>
            <div class="col-md-12">
            <?php endif; ?>
                <div class="blog-items">
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', 'single' );

                        endwhile; 
                        endif; 
                    ?>
                </div>

                <!-- Pagination -->
                <div class="pagi-area">
                    <?php echo gridx_pagination(); ?>
                </div>
            </div>

            <!-- Start Sidebar -->
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
             <div class="col-md-4">
                <div class="blog-sidebar">
                    <div class="blog-sidebar-inner">
                         <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
            <?php } else : ?>
            <?php endif; ?>
            <!-- End Start Sidebar -->
        </div>
    </div>
</div>
</section>
<!-- End Blog Items -->



<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
} 