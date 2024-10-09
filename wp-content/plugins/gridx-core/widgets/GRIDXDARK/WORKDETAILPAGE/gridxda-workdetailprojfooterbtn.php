<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkdetailprojfooterbtn Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkdetailprojfooterbtn_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaworkdetailprojfooterbtn';
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
        return esc_html__( 'Dark Work Detail Project Footer Button Box', 'gridx-core' );
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
                'label' => esc_html__( 'Work Detail Project Footer Image Box', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );        

         // TEXT 
        $this->add_control(
            'buttonname', [
                'label'         => esc_html__( 'Button Name', 'gridx-core' ),
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

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'workdetailprojfooter_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'workdetailprojfooter_button_option',
            [
                'label'         => esc_html__( 'Button Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'workdetailprojfooter_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .big-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'workdetailprojfooter_button_typography',
                'label'         => esc_html__( 'Button Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .big-btn',
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

        $gridxdaworkdetailprojfooterbtn_output = $this->get_settings_for_display(); ?>

         <!-- Start Nextproject
    ============================================= -->
    
<?php if(!empty($gridxdaworkdetailprojfooterbtn_output['buttonname'] )): ?>
<div class="container d-flex align-items-center justify-content-center" data-aos="zoom-in">
    <a <?php if($gridxdaworkdetailprojfooterbtn_output['buttonlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($gridxdaworkdetailprojfooterbtn_output['buttonlink']['url']); ?>" class="big-btn shadow-box">
		<?php if(!empty($gridxdaworkdetailprojfooterbtn_output['buttonname'] )): ?>
        <?php echo($gridxdaworkdetailprojfooterbtn_output['buttonname']); ?>
		 <?php endif; ?>
    </a>
</div>
<?php endif; ?>


  <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>

    <?php }
}