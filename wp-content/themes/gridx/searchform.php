<div class="blog-sidebar-widget search-widget">
    <div class="blog-sidebar-widget-inner" data-aos="zoom-in">
        <form class="shadow-box" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" placeholder="<?php esc_attr_e( 'Search Here...', 'gridx' )?>" value="<?php the_search_query(); ?>" >
            <button class="theme-btn"><?php esc_html_e ('Search','gridx' ); ?></button>
        </form>
    </div>
</div>

