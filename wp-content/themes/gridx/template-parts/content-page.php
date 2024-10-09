<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gridx
 */
?>

<!-- Blog Details -->
         
<div class="blog-details-content">
<div class="img-box">
    <?php the_post_thumbnail('gridx-blog-details'); ?>
</div>
<span class="meta"><?php the_time(get_option('date_format')) ?> - <?php gridx_category();?></span>
<p><?php the_content(); ?></p>
<div class="tags">
    <?php the_tags('','',''); ?>
</div>
<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
else: 
endif; ?>
</div>
