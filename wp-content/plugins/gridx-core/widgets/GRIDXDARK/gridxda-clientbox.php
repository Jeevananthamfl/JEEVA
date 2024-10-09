<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaclientbox
 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaclientbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaclientbox';
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
        return esc_html__( 'Dark Client Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'Client Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
            $this->add_control(  
            'count1',
            [
                'label'         => esc_html__( 'Counter 1','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
   
        $this->add_control( 
            'heading1',
            [
                'label'         => esc_html__( 'Heading 1','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
            $this->add_control(  
            'count2',
            [
                'label'         => esc_html__( 'Counter 2','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
   
        $this->add_control( 
            'heading2',
            [
                'label'         => esc_html__( 'Heading 2','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
            $this->add_control(  
            'count3',
            [
                'label'         => esc_html__( 'Counter 3','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
   
        $this->add_control( 
            'heading3',
            [
                'label'         => esc_html__( 'Heading 3','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'clientbox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control('clientbox_width',
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
                    '{{WRAPPER}} .about-client-box-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'clientbox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'clientbox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box.about-client-box .clients .client-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'clientbox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .info-box.about-client-box .clients .client-item p',
            ]
        );

        //END

        //START

        $this->add_control(
            'clientbox_counter_option',
            [
                'label'         => esc_html__( 'counter Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'clientbox_counter_color',
            [
                'label'         => esc_html__( 'counter Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .info-box.about-client-box .clients .client-item h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'clientbox_counter_typography',
                'label'         => esc_html__( 'counter Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .info-box.about-client-box .clients .client-item h2',
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

        $gridxdaclientbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Client Box
    ============================================= -->
   
           
    <div data-aos="zoom-in" class="about-client-box-wrap">
          <div class="about-client-box info-box shadow-box">
			   <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>

            <div class="clients d-flex align-items-start gap-24 justify-content-center">
                <div class="client-item">
                    <h2><?php echo esc_html($gridxdaclientbox_output['count1']); ?></h2>
                    <p><?php echo($gridxdaclientbox_output['heading1']); ?></p>
                </div>
                <div class="client-item">
                    <h2><?php echo esc_html($gridxdaclientbox_output['count2']); ?></h2>
                    <p><?php echo($gridxdaclientbox_output['heading2']); ?></p>
                </div>
                <div class="client-item">
                    <h2><?php echo esc_html($gridxdaclientbox_output['count3']); ?></h2>
                    <p><?php echo($gridxdaclientbox_output['heading3']); ?></p>
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

