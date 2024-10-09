<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaaboutme Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaaboutme_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaaboutme';
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
        return esc_html__( 'Dark About Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'About Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Image Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'heroimg',
            [
                'label'     => esc_html__( 'Hero Image ', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // LINK
        $this->add_control(
            'imglink',
            [
                'label'         => esc_html__( 'IMAGE LINK', 'gridx-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Content Section', 'synck-core' ),
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
            'subtitle', [
                'label'         => esc_html__( 'Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        // TEXTAREA
        $this->add_control(
            'description', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'aboutme_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control('aboutmebox_width',
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
                    '{{WRAPPER}} .about-me-box-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'aboutme_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'aboutme_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-me-box .infos h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutme_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-me-box .infos h5',
            ]
        );

        //END

        //START

        $this->add_control(
            'aboutme_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'aboutme_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-me-box .infos h1'=> 'color: {{VALUE}}',
                ],


            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutme_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-me-box .infos h1',
            ]
        );

        //END

        //START

        $this->add_control(
            'aboutme_description_option',
            [
                'label'         => esc_html__( 'Description Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'aboutme_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-me-box .infos p'=> 'color: {{VALUE}}',
                ],


            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutme_description_typography',
                'label'         => esc_html__( 'Description Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-me-box .infos p',
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

        $gridxdaaboutme_output = $this->get_settings_for_display(); ?>

         <!-- Star AboutMe
    ============================================= -->
      
            
    <div  data-aos="zoom-in" class="about-me-box-wrap">
        <div class="about-me-box shadow-box">
            <a <?php if($gridxdaaboutme_output['imglink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            class="overlay-link" href="<?php echo esc_url($gridxdaaboutme_output['imglink']['url']); ?>"></a>
             <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>

            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url($gridxdaaboutme_output['heroimg']['id'], 'full' ));?>" alt="<?php echo get_post_meta($gridxdaaboutme_output['heroimg']['id'], '_wp_attachment_image_alt', true); ?>">
            </div>
            <div class="infos">
                <h5><?php echo esc_html($gridxdaaboutme_output['heading']); ?></h5>
                <h1><?php echo esc_html($gridxdaaboutme_output['subtitle']); ?></h1>
                <?php echo ($gridxdaaboutme_output['description']); ?>
                <a href="#" class="about-btn">                    
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

    <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>      

    <?php }
}

