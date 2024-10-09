<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdafeaturedbox Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdafeaturedbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdafeaturedbox';
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
        return esc_html__( 'Dark Featured Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'Featured Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'title',
            [
                'label'         => esc_html__( 'Title','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'starimg',
            [
                'label'     => esc_html__( 'Icon Image ', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Features List', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}', // Reapeter Title 
            ]
        );

        $this->add_control( //this line only for repeater 
            'animation_speed',
            [
                'label'         => esc_html__( 'Text Animation Delay','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( '8s', 'gridx-core' ),
                'label_block'   => true,
            ]
        );


        $this->end_controls_section();

         // TAB STYLE 

        //START

        $this->start_controls_section(
            'featuredbox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'featuredbox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'featuredbox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-credentials-wrap .banner .marquee b'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'featuredbox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-credentials-wrap .banner .marquee b',
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

        $gridxdafeaturedbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Featured Box
    ============================================= -->


<div class="about-credentials-wrap">
    <div data-aos="zoom-in">
        <div class="banner shadow-box">
            <div class="marquee">
                <div style="animation: marquee <?php echo esc_html($gridxdafeaturedbox_output['animation_speed']); ?> linear infinite;">
                    <?php if(!empty($gridxdafeaturedbox_output['list1'])):
                    foreach ($gridxdafeaturedbox_output['list1'] as $gridxdafeaturedbox_loop):?>
                  <span><?php echo ($gridxdafeaturedbox_loop['title']); ?><img src="<?php echo esc_url(wp_get_attachment_image_url($gridxdafeaturedbox_loop['starimg']['id'], 'full' ));?>" alt="<?php echo get_post_meta($gridxdafeaturedbox_loop['starimg']['id'], '_wp_attachment_image_alt', true); ?>"></span>
                    <?php endforeach; endif;?>
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

