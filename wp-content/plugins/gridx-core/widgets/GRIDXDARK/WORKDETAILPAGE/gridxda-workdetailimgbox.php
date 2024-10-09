<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor gridx gridxdaworkdetailimg Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_gridx_gridxdaworkdetailimg_Widget extends \Elementor\Widget_Base {

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
        return 'gridxdaworkdetailimg';
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
        return esc_html__( 'Dark Work Detail Img Box', 'gridx-core' );
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
                'label' => esc_html__( 'Work Detail Image Box', 'gridx-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'projimg1',
            [
                'label'     => esc_html__( 'Project Image ', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Project Image Items', 'gridx-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                     'list_title' => esc_html__( 'Add Features List', 'gridx-core' ),
                    ],
                ],
                'title_field' => '{{{ projimg1 }}}', // Reapeter Title 
            ]
        );


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

        $gridxdaworkdetailimg_output = $this->get_settings_for_display(); ?>

         <!-- Start WorkDetail
    ============================================= -->



 <div class="row mb-24">
    <?php if(!empty($gridxdaworkdetailimg_output['list1'])):
        foreach ($gridxdaworkdetailimg_output['list1'] as $gridxdaworkdetailimg_loop):?>
    <div class="col-md-6" data-aos="zoom-in">
        <div class="project-details-3-img">
            <img src="<?php echo esc_url(wp_get_attachment_image_url($gridxdaworkdetailimg_loop['projimg1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($gridxdaworkdetailimg_loop['projimg1']['id'], '_wp_attachment_image_alt', true); ?>">
        </div>
    </div>
    <?php endforeach; endif;?>
</div>



         
  <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>

    <?php }
}

