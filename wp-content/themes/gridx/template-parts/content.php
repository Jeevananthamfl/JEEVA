<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gridx
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="blog-item" data-aos="zoom-in">
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="img-box">
        <?php } else { ?>
        <div>
        <?php } ?>

        <?php the_post_thumbnail('gridx-Blog'); ?>
    </div>
    <div class="content">
        <span class="meta"><?php the_time(get_option('date_format')) ?> - <?php gridx_category();?></span>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="theme-btn"><?php esc_html_e ('Read More','gridx' ); ?></a>
    </div>
</div>
</div>
