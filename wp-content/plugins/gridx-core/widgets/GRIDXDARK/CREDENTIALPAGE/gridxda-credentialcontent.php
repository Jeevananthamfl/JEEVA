<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdacredentialcontentbox Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdacredentialcontentbox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdacredentialcontentbox';
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
        return esc_html__( 'Dark Credentials About Box Section', 'gridx-core' );
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
        //TAB1-ABOUT

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Credentials About Box Section', 'gridx-core' ),
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

        $this->add_control(
            'description', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

    

        $this->end_controls_section();

        //TAB2 EXPERIENCE

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Credentials Experience Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'expheading', [
                'label'         => esc_html__( 'The Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'expyears',
            [
                'label'         => esc_html__( 'Years','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'exptitle', [
                'label'         => esc_html__( 'The Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'expsubtitle', [
                'label'         => esc_html__( 'Sub Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          // TEXT 
        $repeater->add_control(
            'expdescription', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Experience Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ expyears }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        //TAB3 EDUCATION

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Credentials Education Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'eduheading', [
                'label'         => esc_html__( 'The Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'eduyears',
            [
                'label'         => esc_html__( 'Years','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'edutitle', [
                'label'         => esc_html__( 'The Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'edusubtitle', [
                'label'         => esc_html__( 'Sub Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          // TEXT 
        $repeater->add_control(
            'edudescription', [
                'label'         => esc_html__( 'Description', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Education Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ eduyears }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();


        //TAB4

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Credentials Skills Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

         // TEXT 
        $this->add_control(
            'skheading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'skpercentage',
            [
                'label'         => esc_html__( 'Skills Percentage','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'sktitle', [
                'label'         => esc_html__( 'Skills Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'sksubtitle', [
                'label'         => esc_html__( 'Sub Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Skills Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ sktitle }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        //TAB5

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( 'Credentials Awards Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'awheading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'awdate',
            [
                'label'         => esc_html__( 'Award Date','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'awtitle', [
                'label'         => esc_html__( 'Award Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         // TEXT 
        $repeater->add_control(
            'awsubtitle', [
                'label'         => esc_html__( 'Award Sub Title', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list4', //repeater name
            [
                'label'     => esc_html__( 'Awards Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // TAB STYLE ----1

        //START

        $this->start_controls_section(
            'credentialcontentbox_design_option',
            [
                'label'         => esc_html__( 'About Box Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credentialcontentbox_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentbox_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-content .credential-about h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentbox_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-content .credential-about h3',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentbox_description_option',
            [
                'label'         => esc_html__( 'Description Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentbox_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-content .credential-about p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentbox_description_typography',
                'label'         => esc_html__( 'Description Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-content .credential-about p',
            ]
        );

        //END

        $this->end_controls_section();

        // TAB STYLE -----2

        //START

        $this->start_controls_section(
            'credentialcontentboxexp_design_option',
            [
                'label'         => esc_html__( 'Experience & Education Box Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-edc-exp h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxexp_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-edc-exp h3',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxexp_years_option',
            [
                'label'         => esc_html__( 'Years Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_years_color',
            [
                'label'         => esc_html__( 'Years Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxexp_years_typography',
                'label'         => esc_html__( 'Years Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h5',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxexp_thetitle_option',
            [
                'label'         => esc_html__( 'The Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_thetitle_color',
            [
                'label'         => esc_html__( 'The Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxexp_thetitle_typography',
                'label'         => esc_html__( 'The Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h4',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxexp_subtitle_option',
            [
                'label'         => esc_html__( 'Sub Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_subtitle_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h6'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxexp_subtitle_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item h6',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxexp_description_option',
            [
                'label'         => esc_html__( 'Description Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxexp_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxexp_description_typography',
                'label'         => esc_html__( 'Description Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-edc-exp .credential-edc-exp-item p',
            ]
        );

        //END


        $this->end_controls_section();

        // TAB STYLE -----3

        //START

        $this->start_controls_section(
            'credentialcontentboxskills_design_option',
            [
                'label'         => esc_html__( 'Skills And Awards Box Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credentialcontentboxskills_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxskills_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .skills-wrap h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxskills_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .skills-wrap h3',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxskills_per_option',
            [
                'label'         => esc_html__( 'Percentage Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxskills_per_color',
            [
                'label'         => esc_html__( 'Percentage Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .skills-wrap .skill-item .percent'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxskills_per_typography',
                'label'         => esc_html__( 'Percentage Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .skills-wrap .skill-item .percent',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxskills_thetitle_option',
            [
                'label'         => esc_html__( 'The Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxskills_thetitle_color',
            [
                'label'         => esc_html__( 'The Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .skills-wrap .skill-item .name'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxskills_thetitle_typography',
                'label'         => esc_html__( 'The Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .skills-wrap .skill-item .name',
            ]
        );

        //END

        //START

        $this->add_control(
            'credentialcontentboxskills_subtitle_option',
            [
                'label'         => esc_html__( 'Sub Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'credentialcontentboxskills_subtitle_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .skills-wrap .skill-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'credentialcontentboxskills_subtitle_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .credential-area .skills-wrap .skill-item p',
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

    $gridxdacredentialcontentbox_output = $this->get_settings_for_display(); ?>

         <!-- Start Credentials Content Box
    ============================================= -->

<div class="credential-content flex-1">
        <div class="credential-about" data-aos="zoom-in">
            <h3><?php echo esc_html($gridxdacredentialcontentbox_output['title']); ?></h3>
            <?php echo($gridxdacredentialcontentbox_output['description']); ?>
        </div>

        <div class="credential-edc-exp credential-experience">
            <h3 data-aos="fade-up"><?php echo esc_html($gridxdacredentialcontentbox_output['expheading']); ?></h3>
             <?php if(!empty($gridxdacredentialcontentbox_output['list1'])):
                foreach ($gridxdacredentialcontentbox_output['list1'] as $gridxdacredentialcontentbox_loop):?>
            <div class="credential-edc-exp-item" data-aos="zoom-in">
                <h5><?php echo esc_html($gridxdacredentialcontentbox_loop['expyears']); ?></h5>
                <h4><?php echo esc_html($gridxdacredentialcontentbox_loop['exptitle']); ?></h4>
                <h6><?php echo esc_html($gridxdacredentialcontentbox_loop['expsubtitle']); ?></h6>
                <?php echo ($gridxdacredentialcontentbox_loop['expdescription']); ?>
            </div>
             <?php endforeach; endif;?>
        </div>

        <div class="credential-edc-exp credential-education">
            <h3 data-aos="fade-up"><?php echo esc_html($gridxdacredentialcontentbox_output['eduheading']); ?></h3>
                <?php if(!empty($gridxdacredentialcontentbox_output['list2'])):
                foreach ($gridxdacredentialcontentbox_output['list2'] as $gridxdacredentialcontentbox_loop):?>
            <div class="credential-edc-exp-item" data-aos="zoom-in">
                <h5><?php echo esc_html($gridxdacredentialcontentbox_loop['eduyears']); ?></h5>
                <h4><?php echo esc_html($gridxdacredentialcontentbox_loop['edutitle']); ?></h4>
                <h6><?php echo esc_html($gridxdacredentialcontentbox_loop['edusubtitle']); ?></h6>
                <?php echo ($gridxdacredentialcontentbox_loop['edudescription']); ?>
            </div>
            <?php endforeach; endif;?>
        </div>

        <div class="skills-wrap">
            <h3 data-aos="fade-up"><?php echo esc_html($gridxdacredentialcontentbox_output['skheading']); ?></h3>
            <div class="d-grid skill-items gap-24 flex-wrap">
                <?php if(!empty($gridxdacredentialcontentbox_output['list3'])):
                foreach ($gridxdacredentialcontentbox_output['list3'] as $gridxdacredentialcontentbox_loop):?>
                <div class="skill-item" data-aos="zoom-in">
                    <span class="percent"><?php echo esc_html($gridxdacredentialcontentbox_loop['skpercentage']); ?></span>
                    <h4 class="name"><?php echo esc_html($gridxdacredentialcontentbox_loop['sktitle']); ?></h4>
                    <p><?php echo esc_html($gridxdacredentialcontentbox_loop['sksubtitle']); ?></p>
                </div>
             <?php endforeach; endif;?>
            </div>
        </div>

        <div class="skills-wrap awards-wrap">
            <h3 data-aos="fade-up"><?php echo esc_html($gridxdacredentialcontentbox_output['awheading']); ?></h3>
            <div class="d-grid skill-items gap-24 flex-wrap">
                <?php if(!empty($gridxdacredentialcontentbox_output['list4'])):
                foreach ($gridxdacredentialcontentbox_output['list4'] as $gridxdacredentialcontentbox_loop):?>
                <div class="skill-item" data-aos="zoom-in">
                    <span class="percent"><?php echo esc_html($gridxdacredentialcontentbox_loop['awdate']); ?></span>
                    <h4 class="name"><?php echo esc_html($gridxdacredentialcontentbox_loop['awtitle']); ?></h4>
                    <p><?php echo esc_html($gridxdacredentialcontentbox_loop['awsubtitle']); ?></p>
                </div>
               <?php endforeach; endif;?>
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

