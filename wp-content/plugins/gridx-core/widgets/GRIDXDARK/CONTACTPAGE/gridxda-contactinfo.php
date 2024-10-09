<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdacontactinfobox Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdacontactinfobox_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdacontactinfobox';
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
        return esc_html__( 'Dark Contact Info Box Section', 'gridx-core' );
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
        //TAB1

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Contact Info Box Section', 'gridx-core' ),
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

      
        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'class1',
            [
                'label'         => esc_html__( 'Icon Class','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,

                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title ','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control(
            'subtitle1',
            [
                'label'         => esc_html__( 'Sub Title 1','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control(
            'subtitle2',
            [
                'label'         => esc_html__( 'Sub Title 2 ','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

   

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Contact Items', 'gridx-core' ),
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

        //TAB2

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Social Info Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'socheading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

      
        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'class2',
            [
                'label'         => esc_html__( 'Social Icon Class','gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'iconlink',
            [
                'label'         => esc_html__( 'Social Icon Link', 'gridx-core' ),
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
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Social Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ class2 }}}', // Reapeter Title 
            ]
        ); 
      
        $this->end_controls_section();

        //TAB3

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Contact Form Box Section', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

          // TEXT 
        $this->add_control(
            'contheading', [
                'label'         => esc_html__( 'Heading', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contact_shortcode',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Put your shortcode Here', 'gridx-core' ),
            ]

        );


         // IMAGE
        $this->add_control(
            'contimg',
            [
                'label'     => esc_html__( 'Box Image ', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

         // TAB STYLE 

        //START

        $this->start_controls_section(
            'contactinfobox_design_option',
            [
                'label'         => esc_html__( 'Content Style','gridx-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contactinfobox_heading_option',
            [
                'label'         => esc_html__( 'Heading Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'contactinfobox_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-infos h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'contactinfobox_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}}  .contact-infos h4',
            ]
        );

        //END

         //START

        $this->add_control(
            'contactinfobox_title_option',
            [
                'label'         => esc_html__( 'Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'contactinfobox_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-infos .contact-details li .right span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'contactinfobox_title_typography',
                'label'         => esc_html__( 'Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-infos .contact-details li .right span',
            ]
        );

        //END

        //START

        $this->add_control(
            'contactinfobox_subtitle_option',
            [
                'label'         => esc_html__( 'Sub Title Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'contactinfobox_subtitle_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-infos .contact-details li .right h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'contactinfobox_subtitle_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-infos .contact-details li .right h5',
            ]
        );

        //END

        //START

        $this->add_control(
            'contactinfobox_cformh_option',
            [
                'label'         => esc_html__( 'Contact Form Options', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'contactinfobox_cformh_color',
            [
                'label'         => esc_html__( 'Contact Form Heading Text Color', 'gridx-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-form h2 span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'contactinfobox_cformh_typography',
                'label'         => esc_html__( 'Contact Form Typography', 'gridx-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-form h2 span',
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

    $gridxdacontactinfobox_output = $this->get_settings_for_display(); ?>

         <!-- Start Contact  Box
    ============================================= -->

<!-- Contact -->
<section class="contact-area">
    <div class="container">
        <div class="gx-row d-flex justify-content-between gap-24">
                    
<div class="contact-infos">
    <h4 data-aos="fade-up"><?php echo esc_html($gridxdacontactinfobox_output['heading']); ?></h4>
    <ul class="contact-details">

        <?php if(!empty($gridxdacontactinfobox_output['list1'])):
        foreach ($gridxdacontactinfobox_output['list1'] as $gridxdacontactinfobox_loop):?>
        <li class="d-flex align-items-center" data-aos="zoom-in">
            <div class="icon-box shadow-box">
                <i class="<?php echo esc_attr($gridxdacontactinfobox_loop['class1']);?>"></i>
            </div>
            <div class="right">
                <span><?php echo esc_html($gridxdacontactinfobox_loop['title']); ?></span>
                <h5><?php echo ($gridxdacontactinfobox_loop['subtitle1']); ?></h5>
                <h5><?php echo esc_html($gridxdacontactinfobox_loop['subtitle2']); ?></h5>
            </div>
        </li>
        <?php endforeach; endif;?>

    </ul>

    <h4 data-aos="fade-up"><?php echo esc_html($gridxdacontactinfobox_output['socheading']); ?></h4>
    <ul class="social-links d-flex align-center" data-aos="zoom-in">

        <?php if(!empty($gridxdacontactinfobox_output['list2'])):
        foreach ($gridxdacontactinfobox_output['list2'] as $gridxdacontactinfobox_loop):?>
        <li><a <?php if($gridxdacontactinfobox_loop['iconlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
        class="shadow-box" href="<?php echo esc_url($gridxdacontactinfobox_loop['iconlink']['url']); ?>"><i class="<?php echo esc_attr($gridxdacontactinfobox_loop['class2']);?>"></i></a></li>
        <?php endforeach; endif;?>
      
    </ul>
</div>

<div data-aos="zoom-in" class="contact-form">
    <div class="shadow-box">
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
        <h2><?php echo($gridxdacontactinfobox_output['contheading']); ?></h2>
        <?php echo do_shortcode($gridxdacontactinfobox_output['contact_shortcode']);?>
    </div>
</div>
                    
        </div>
    </div>
</section>

    <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>      

    <?php }
}

