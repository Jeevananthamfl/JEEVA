<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaservicesbox
 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaservicesbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaservicesbox';
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
        return esc_html__( 'Dark Services Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'Services Box Section', 'gridx-core' ),
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

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        // LINK
        $this->add_control(
            'boxlink',
            [
                'label'         => esc_html__( 'Image Link', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'gridx-core' ),
				'target'	    => '_blank',
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );
        
        $this->end_controls_section();

        //TAB-2

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Icons Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

  

        // TEXT 
        $this->add_control( 
            'class1',
            [
                'label'         => esc_html__( 'Class Title 1','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,

                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

         // TEXT 
        $this->add_control( 
            'class2',
            [
                'label'         => esc_html__( 'Class Title 2','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

         // TEXT 
        $this->add_control( 
            'class3',
            [
                'label'         => esc_html__( 'Class Title 3','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

         // TEXT 
        $this->add_control( 
            'class4',
            [
                'label'         => esc_html__( 'Class Title 4','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );



        $this->end_controls_section();

         // TAB STYLE 

        //START

        
        $this->start_controls_section(
            'servicesbox_design_option',
            [
                'label'         => esc_html__('Content Style', 'gridx-core'),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control('servicesbox_width',
            [
                'label' => esc_html__( 'Box Width', 'gridx-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog-service-profile-wrap .about-services-box-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'servicesbox_heading_option',
            [
                'label'         => esc_html__('Heading Options', 'gridx-core'),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'servicesbox_heading_color',
            [
                'label'         => esc_html__('Heading Text Color', 'gridx-core'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box .infos h5' => 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'servicesbox_heading_typography',
                'label'         => esc_html__('Heading Typography', 'gridx-core'),
                'selector'      =>
                '{{WRAPPER}} .info-box .infos h5',
            ]
        );

        //END

        //START

        $this->add_control(
            'servicesbox_title_option',
            [
                'label'         => esc_html__('Title Options', 'gridx-core'),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'servicesbox_title_color',
            [
                'label'         => esc_html__('Title Text Color', 'gridx-core'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box .infos h2' => 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'servicesbox_title_typography',
                'label'         => esc_html__('Title Typography', 'gridx-core'),
                'selector'      =>
                '{{WRAPPER}} .info-box .infos h2',
            ]
        );

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

        $gridxdaservicesbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Services Box
    ============================================= -->
    <div class="col-md-12">
        <div class="blog-service-profile-wrap d-flex gap-24">

            <div data-aos="zoom-in" class="flex-1 about-services-box-wrap">
                <div class="about-services-box info-box shadow-box h-full">
                    <a <?php if($gridxdaservicesbox_output['boxlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                    href="<?php echo esc_url($gridxdaservicesbox_output['boxlink']['url']); ?>" class="overlay-link"></a>
                    <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>
                    <div class="icon-boxes">

                        <i class="<?php echo esc_attr($gridxdaservicesbox_output['class1']);?>"></i>

                        <i class="<?php echo esc_attr($gridxdaservicesbox_output['class2']);?>"></i>

                        <i class="<?php echo esc_attr($gridxdaservicesbox_output['class3']);?>"></i>

                        <i class="<?php echo esc_attr($gridxdaservicesbox_output['class4']);?>"></i>
                     
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="infos">
                            <h5><?php echo esc_html($gridxdaservicesbox_output['heading']); ?></h5>
                            <h2><?php echo esc_html($gridxdaservicesbox_output['title']); ?></h2>
                        </div>

                        <a href="<?php echo esc_url($gridxdaservicesbox_output['boxlink']['url']); ?>" class="about-btn">
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
    </div>

    <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>

    <?php }
}

