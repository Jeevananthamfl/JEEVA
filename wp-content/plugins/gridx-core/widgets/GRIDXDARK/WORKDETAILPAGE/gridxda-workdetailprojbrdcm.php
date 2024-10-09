<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkdetailprojbreadcrumb Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkdetailprojbreadcrumb_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'gridxdaworkdetailprojbreadcrumb';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Dark Work Detail Project Breadcrumb Box', 'gridx-core' );
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'gridx' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Work Detail Project Breadcrumb Box', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'heading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
       
        $this->add_control(
            'projimg',
            [
                'label'     => esc_html__( 'Project Image', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'workdetailprojbreadcrumb_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'workdetailprojbreadcrumb_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojbreadcrumb_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .breadcrumb-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojbreadcrumb_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .breadcrumb-content p',
            ]
        );

        //END

        //START

        $this->add_control(
            'workdetailprojbreadcrumb_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojbreadcrumb_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .section-heading'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojbreadcrumb_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-heading',
            ]
        );

        //END

        $this->end_controls_section();

}

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $gridxdaworkdetailprojbreadcrumb_output = $this->get_settings_for_display(); ?>

         <!-- Start Workdetail Breadcrumb
    ============================================= -->
<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p><?php echo esc_html($gridxdaworkdetailprojbreadcrumb_output['heading']); ?></p>
            <h1 class="section-heading"><?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>				
<img src="<?php echo esc_url($gridx_options['star_dark']['url']); ?>" alt="Star">
						
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>	
<img src="<?php echo esc_url($gridx_options['star_light']['url']); ?>" alt="Star">
						
<?php endif; } ?> <?php echo($gridxdaworkdetailprojbreadcrumb_output['title']); ?><?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>				
<img src="<?php echo esc_url($gridx_options['star_dark']['url']); ?>" alt="Star">
						
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>	
<img src="<?php echo esc_url($gridx_options['star_light']['url']); ?>" alt="Star">
						
<?php endif; } ?></h1>
        </div>
    </div>
</section>

<div class="project-details-img" data-aos="zoom-in">
    <img src="<?php echo esc_url(wp_get_attachment_image_url($gridxdaworkdetailprojbreadcrumb_output['projimg']['id'], 'full' ));?>" alt="<?php echo get_post_meta($gridxdaworkdetailprojbreadcrumb_output['projimg']['id'], '_wp_attachment_image_alt', true); ?>">
</div>

  <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>

    <?php }
}


