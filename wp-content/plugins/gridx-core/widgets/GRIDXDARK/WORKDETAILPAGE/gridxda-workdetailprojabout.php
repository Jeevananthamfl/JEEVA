<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkdetailprojabout Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkdetailprojabout_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaworkdetailprojabout';
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
        return esc_html__( 'Dark Work Detail Project About Box', 'gridx-core' );
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
                'label' => esc_html__( 'Work Detail Project About Box', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        // TEXTAREA
        $this->add_control(
            'description', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );
       
         // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'heading',
            [
                'label'         => esc_html__( 'Heading','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control( //this line only for repeater 
            'subheading',
            [
                'label'         => esc_html__( 'Sub Heading','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

       
        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'About List', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ heading }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'workdetailprojabout_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'workdetailprojabout_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojabout_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-about-2 .right-details h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojabout_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-about-2 .right-details h4',
            ]
        );

        //END

        //START

        $this->add_control(
            'workdetailprojabout_description_option',
            [
                'label'         => esc_html__( 'Description Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojabout_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-about-2 .right-details p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojabout_description_typography',
                'label'         => esc_html__( 'Description Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-about-2 .right-details p',
            ]
        );

        //END

        //START

        $this->add_control(
            'workdetailprojabout_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojabout_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-about-2 .left-details ul li p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojabout_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-about-2 .left-details ul li p',
            ]
        );

        //END

        //START

        $this->add_control(
            'workdetailprojabout_sheading_option',
            [
                'label'         => esc_html__( 'Sub Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojabout_sheading_color',
            [
                'label'         => esc_html__( 'Sub Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-about-2 .left-details ul li h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojabout_sheading_typography',
                'label'         => esc_html__( 'Sub Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-about-2 .left-details ul li h5',
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

        $gridxdaworkdetailprojabout_output = $this->get_settings_for_display(); ?>

         <!-- Start WorkDetail
    ============================================= -->

  <div data-aos="zoom-in">
    <div class="project-about-2 d-flex shadow-box mb-24">
       <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>
        <div class="left-details">
           <?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>	
			
<img src="<?php echo esc_url($gridx_options['box_dark_img']['url']); ?>" alt="Star" class="star-icon">

			
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>
			
<img src="<?php echo esc_url($gridx_options['box_light_img']['url']); ?>" alt="Star" class="star-icon">

			
<?php endif; } ?>
            <ul>
                 <?php if(!empty($gridxdaworkdetailprojabout_output['list1'])):
                    foreach ($gridxdaworkdetailprojabout_output['list1'] as $gridxdaworkdetailprojabout_loop):?>
                <li>
                    <p><?php echo esc_html($gridxdaworkdetailprojabout_loop['heading']); ?></p>
                    <h5><?php echo esc_html($gridxdaworkdetailprojabout_loop['subheading']); ?></h5>
                </li>
               <?php endforeach; endif;?>
            </ul>
        </div>
        <div class="right-details">
            <h4><?php echo esc_html($gridxdaworkdetailprojabout_output['title']); ?></h4>
            <?php echo ($gridxdaworkdetailprojabout_output['description']); ?>
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

