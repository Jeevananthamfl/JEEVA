<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkcontentbox Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkcontentbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaworkcontentbox';
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
        return esc_html__( 'Dark Work Project Image Box  ', 'gridx-core' );
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

        //TAB1

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Work Project Image Box ', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

           // IMAGE
        $this->add_control(
            'projimg1',
            [
                'label'     => esc_html__( 'Project Image ', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title1', [
                'label'         => esc_html__( ' Project Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'pjhead1', [
                'label'         => esc_html__( 'Project Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

       

        // LINK
        $this->add_control(
            'boxlink',
            [
                'label'         => esc_html__( 'Box Url', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'gridx-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

       

        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'workcontentbox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'workcontentbox_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workcontentbox_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-item .project-info p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workcontentbox_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-item .project-info p',
            ]
        );

        //END

        //START

        $this->add_control(
            'workcontentbox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workcontentbox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-item .project-info h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workcontentbox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-item .project-info h2',
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

        $gridxdaworkcontentbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Work
    ============================================= -->

<div class="d-flex align-items-start gap-24">
        
<div data-aos="zoom-in" class="flex-1">
<div class="project-item shadow-box">
    <a <?php if($gridxdaworkcontentbox_output['boxlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    class="overlay-link" href="<?php echo esc_url($gridxdaworkcontentbox_output['boxlink']['url']); ?>"></a>
   <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>
	
    <div class="project-img">
        <img src="<?php echo esc_url(wp_get_attachment_image_url($gridxdaworkcontentbox_output['projimg1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($gridxdaworkcontentbox_output['projimg1']['id'], '_wp_attachment_image_alt', true); ?>">
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <div class="project-info">
            <p><?php echo esc_html($gridxdaworkcontentbox_output['title1']); ?></p>
            <h2><?php echo esc_html($gridxdaworkcontentbox_output['pjhead1']); ?></h2>
        </div>
        <a href="<?php echo esc_url($gridxdaworkcontentbox_output['boxlink']['url']); ?>" class="project-btn">
            <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>				
<img src="<?php echo esc_url($gridx_options['button_dark']['url']); ?>" alt="Star">
						
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>	
<img src="<?php echo esc_url($gridx_options['button_light']['url']); ?>" alt="Star">
						
<?php endif; } ?>
        </a>
    </div>
</div>
</div>

</div>
    
 <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>


    <?php }
}

