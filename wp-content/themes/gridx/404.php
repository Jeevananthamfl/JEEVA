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
            <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'HOME - ', 'gridx' )?></a><?php esc_html_e( '404 ERROR', 'gridx' )?></p>
            <h1 class="section-heading"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/star-2.png'); ?>" alt="<?php echo esc_attr__( 'Star', 'gridx' )?>"><?php esc_html_e(' Error Page ','gridx' ); ?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/star-2.png'); ?>" alt="<?php echo esc_attr__( 'Star', 'gridx' )?>"></h1>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- Blog Items -->
<div class="error-page-area relative text-center">
<div class="container">
    <div class="error-box default-padding">
        <div class="row">
            <div class="col-md-8 offset-md-2">
 <h1><?php esc_html_e( '404', 'gridx' )?></h1>
    <h2><?php esc_html_e( 'SORRY PAGE WAS NOT FOUND!', 'gridx' )?></h2>
<div class="blog-sidebar">
    <div class="blog-sidebar-inner">
<div class="blog-sidebar-widget search-widget">
    <div class="blog-sidebar-widget-inner" data-aos="zoom-in">
        <form class="shadow-box" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" placeholder="<?php esc_attr_e( 'Search Here...', 'gridx' )?>" value="<?php the_search_query(); ?>" >
            <button class="theme-btn"><?php esc_html_e ('Search','gridx' ); ?></button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>




<!-- End Blog Items -->



<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
} 