<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdacredentialsidebarbox Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdacredentialsidebarbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdacredentialsidebarbox';
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
        return esc_html__( 'Dark Credentials Sidebar Box Section', 'gridx-core' );
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
                'label' => esc_html__( 'Dark Credentials Sidebar Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
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

        // TEXT 
        $this->add_control(
            'heading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'subheading', [
                'label'         => esc_html__( 'Sub Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'button', [
                'label'         => esc_html__( 'Button Name', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'buttonlink',
            [
                'label'         => esc_html__( 'Button Url', 'gridx-core' ),
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

        //TAB2

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Dark Credentials Icon Box Section', 'gridx-core' ),
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
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'iconlink',
            [
                'label'         => esc_html__( 'ICON URL', 'gridx-core' ),
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

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Icons List', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ class1 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // TAB STYLE 

        //START

        $this->start_controls_section(
            'credentialsidebarbox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credentialsidebarbox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialsidebarbox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-sidebar h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialsidebarbox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-sidebar h2',
            ]
        );

        //END

        //START

         $this->add_control(
            'credentialsidebarbox_sheading_option',
            [
                'label'         => esc_html__( 'Sub Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialsidebarbox_sheading_color',
            [
                'label'         => esc_html__( 'Sub Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-sidebar p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialsidebarbox_sheading_typography',
                'label'         => esc_html__( 'Sub Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-sidebar p',
            ]
        );

        //END

        //START

         $this->add_control(
            'credentialsidebarbox_buttn_option',
            [
                'label'         => esc_html__( 'Button Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialsidebarbox_buttn_color',
            [
                'label'         => esc_html__( 'Button Name Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-sidebar .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialsidebarbox_buttn_typography',
                'label'         => esc_html__( 'Button Name Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-sidebar .theme-btn',
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

        $gridxdacredentialsidebarbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Credentials Sidebar Box
    ============================================= -->
      
            
<div class="credential-sidebar-wrap" data-aos="zoom-in">
            <div class="credential-sidebar text-center">
                <div class="shadow-box">
                    <img src="<?php echo esc_url($gridx_options['bgimg']['url']); ?>" alt="BG" class="bg-img">
                    <div class="img-box">
                        <img src="<?php echo esc_url($gridxdacredentialsidebarbox_output['heroimg']['url']); ?>" alt="About Me">
                    </div>
                    <h2><?php echo esc_html($gridxdacredentialsidebarbox_output['heading']); ?></h2>
                    <p><?php echo esc_html($gridxdacredentialsidebarbox_output['subheading']); ?></p>

                    <ul class="social-links d-flex justify-content-center">

                        <?php if(!empty($gridxdacredentialsidebarbox_output['list1'])):
                        foreach ($gridxdacredentialsidebarbox_output['list1'] as $gridxdacredentialsidebarbox_loop):?>
                        <li><a href="<?php echo esc_url($gridxdacredentialsidebarbox_loop['iconlink']['url']); ?>"><i class="<?php echo esc_attr($gridxdacredentialsidebarbox_loop['class1']);?>"></i></a></li>
                        <?php endforeach; endif;?>
                    </ul>

                    <a href="<?php echo esc_url($gridxdacredentialsidebarbox_output['buttonlink']['url']); ?>" class="theme-btn"><?php echo esc_html($gridxdacredentialsidebarbox_output['button']); ?></a>
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

