<?php 
if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
// Output Customize CSS
function gridx_customize_css() { 
    global $gridx_options; if ($gridx_options['main_color_gridx'] == 1) {
?>
	<style>
		:root {
  --default-color: <?php echo esc_html($gridx_options['colorcode']); ?>;
}

:root {
    --primary_color: var(--default-color) !important;
}

.about-area .about-me-box .img-box {
    background: linear-gradient(90deg, var(--default-color) -15%, #C2EBFF 58%, var(--default-color) 97%) !important;
}


 	</style>

<?php }
}

  
add_action('wp_head', 'gridx_customize_css');
}
?>