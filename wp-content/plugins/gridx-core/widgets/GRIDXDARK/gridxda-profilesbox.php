<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaprofilesbox
 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaprofilesbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaprofilesbox';
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
        return esc_html__( 'Dark Profiles Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'Profiles Box Section', 'gridx-core' ),
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
            'buttonlink',
            [
                'label'         => esc_html__( 'Button Link', 'gridx-core' ),
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
                'label'         => esc_html__( 'Icon Class Title 1','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'iconlink1',
            [
                'label'         => esc_html__( 'Icon Link', 'gridx-core' ),
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

        $this->add_control( //this line only for repeater 
            'class2',
            [
                'label'         => esc_html__( 'Icon Class Title 2','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'iconlink2',
            [
                'label'         => esc_html__( 'Icon Link', 'gridx-core' ),
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
            'profilesbox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control('proflilebox_width',
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
                    '{{WRAPPER}} .blog-service-profile-wrap .about-profile-box-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'profilesbox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'profilesbox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box .infos h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'profilesbox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .info-box .infos h5',
            ]
        );

        //END

        //START

        $this->add_control(
            'profilesbox_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'profilesbox_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box .infos h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'profilesbox_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .info-box .infos h2',
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

        $gridxdaprofilesbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Profiles Box
    ============================================= -->

<div class="col-md-12">
        <div class="blog-service-profile-wrap">

     <div data-aos="zoom-in" class="about-profile-box-wrap">
        <div class="about-profile-box info-box shadow-box h-full">
            <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>
			
            <div class="inner-profile-icons shadow-box">
                
                <a <?php if($gridxdaprofilesbox_output['iconlink1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($gridxdaprofilesbox_output['iconlink1']['url']); ?>">
                    <i class="<?php echo esc_attr($gridxdaprofilesbox_output['class1']);?>"></i>
                </a>

                <a <?php if($gridxdaprofilesbox_output['iconlink2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($gridxdaprofilesbox_output['iconlink2']['url']); ?>">
                    <i class="<?php echo esc_attr($gridxdaprofilesbox_output['class2']);?>"></i>
                </a>
                
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="infos">
                    <h5><?php echo esc_html($gridxdaprofilesbox_output['heading']); ?></h5>
                    <h2><?php echo esc_html($gridxdaprofilesbox_output['title']); ?></h2>
                </div>

                <a <?php if($gridxdaprofilesbox_output['buttonlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($gridxdaprofilesbox_output['buttonlink']['url']); ?>" class="about-btn">
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

