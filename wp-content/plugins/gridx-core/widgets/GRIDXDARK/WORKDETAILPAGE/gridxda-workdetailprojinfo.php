<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkdetailprojinfo Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkdetailprojinfo_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaworkdetailprojinfo';
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
        return esc_html__( 'Dark Work Detail Project info Box', 'gridx-core' );
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
                'label' => esc_html__( 'Work Detail Project info Box', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'heading1', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXTAREA
        $this->add_control(
            'description1', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $this->add_control(
            'heading2', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXTAREA
        $this->add_control(
            'description2', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );


       
        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'workdetailprojinfo_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'workdetailprojinfo_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojinfo_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-infos-wrap .project-details-info h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojinfo_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-infos-wrap .project-details-info h4',
            ]
        );

        //END

        //START

        $this->add_control(
            'workdetailprojinfo_title_option',
            [
                'label'         => esc_html__( 'Description Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojinfo_title_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .project-infos-wrap .project-details-info p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojinfo_description_typography',
                'label'         => esc_html__( 'Description Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-infos-wrap .project-details-info p',
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

        $gridxdaworkdetailprojinfo_output = $this->get_settings_for_display(); ?>

         <!-- Start WorkDetail
    ============================================= -->

<div data-aos="zoom-in">
    <div class="d-flex project-infos-wrap shadow-box mb-24">
        <?php 	if( class_exists( 'ReduxFrameworkPlugin' ) ) { 

    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>
				
<img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
				
<?php endif; } ?>
        <?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $gridx_options; 
			if($gridx_options['gridx_color_switcher_options'] == 1) : ?>	
		<?php if(!empty($gridx_options['box_dark_img'] )): ?>
<img src="<?php echo esc_url($gridx_options['box_dark_img']['url']); ?>" alt="Star" class="star-icon">
						<?php endif;?>
		
<?php elseif($gridx_options['gridx_color_switcher_options'] == 2) : ?>
		
<img src="<?php echo esc_url($gridx_options['box_light_img']['url']); ?>" alt="Star" class="star-icon">

		
<?php endif; } ?>
        <div class="project-details-info flex-1">
            <h4><?php echo esc_html($gridxdaworkdetailprojinfo_output['heading1']); ?></h4>
            <?php echo ($gridxdaworkdetailprojinfo_output['description1']); ?>
        </div>

        <div class="project-details-info flex-1">
            <h4><?php echo esc_html($gridxdaworkdetailprojinfo_output['heading2']); ?></h4>
            <?php echo($gridxdaworkdetailprojinfo_output['description2']); ?>
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

