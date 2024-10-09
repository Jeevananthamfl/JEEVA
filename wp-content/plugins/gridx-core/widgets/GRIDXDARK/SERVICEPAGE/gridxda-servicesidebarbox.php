<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaservicesidebar Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaservicesidebar_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaservicesidebar';
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
        return esc_html__( 'Dark Service Sidebar Section', 'gridx-core' );
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
                'label' => esc_html__( 'Service Sidebar Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'class1',
            [
                'label'         => esc_html__( 'Icon Class Name','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

      // TEXT 
        $repeater->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Sidebar List', 'gridx-core' ),
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

        $this->end_controls_section();

        // TAB STYLE

        //START

        $this->start_controls_section(
            'servicesidebar_design_option',
            [
                'label'         => esc_html__( 'Service Sidebar Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'servicesidebar_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'servicesidebar_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .service-sidebar .service-sidebar-inner ul li'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'servicesidebar_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service-sidebar .service-sidebar-inner ul li',
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

        $gridxdaservicesidebar_output = $this->get_settings_for_display(); ?>

         <!-- Start ServiceSidebar
    ============================================= -->

         
 

    <!-- Sidebar -->
   
<div class="service-sidebar" data-aos="fade-right">
    <div class="service-sidebar-inner shadow-box">
        <ul>
            <?php if(!empty($gridxdaservicesidebar_output['list1'])):
                foreach ($gridxdaservicesidebar_output['list1'] as $gridxdaservicesidebar_loop):?>
            <li>
                <i class="<?php echo esc_attr($gridxdaservicesidebar_loop['class1']);?>"></i>
                    <?php echo esc_html($gridxdaservicesidebar_loop['title']); ?>
            </li>
            <?php endforeach; endif;?>
        </ul>
    </div>
</div>
  

  <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>

    <?php }
}

