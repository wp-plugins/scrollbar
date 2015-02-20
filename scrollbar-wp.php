<?php

/*
Plugin Name: Scrollbar
Plugin URI: http://themepoints.com
Description: Scrollbars wp is really simple, With CSS3 it’s kind of magic! You can design your own scrollbar and use it for your website. You can use these scrollbars for every type of Website.
Version: 1.0
Author: themepoints
Author URI: http://themepoints.com
License URI: http://themepoints.com/copyright/
*/



if ( ! defined( 'ABSPATH' ) ) exit;

define('SCROLLBAR_WP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );



/*===============================================
    register latest jQuery & stylesheet
=================================================*/
function themepoints_scrollbar_script()
	{
	wp_enqueue_script('jquery');
	wp_enqueue_script('tpnicescroll-js', plugins_url( 'js/jquery.nicescroll.min.js', __FILE__ ), array('jquery'), '1.0', false);
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('tp-tabs-wp-color-picker', plugins_url(), array( 'wp-color-picker' ), false, true );
	}
add_action('init', 'themepoints_scrollbar_script');


/*===============================================
    activate scrollbar wp
=================================================*/
function tp_scrollbar_wp_activate() {
		$themepoints_scrollbar_colors = get_option( 'themepoints_scrollbar_colors' );
		if(empty($themepoints_scrollbar_colors))
		{
			$themepoints_scrollbar_colors = "#1e73be";
		}		
		$themepoints_scrollbar_width = get_option( 'themepoints_scrollbar_width' );
		if(empty($themepoints_scrollbar_width))
		{
			$themepoints_scrollbar_width = "5px";
		}		
		$themepoints_scrollbar_radius = get_option( 'themepoints_scrollbar_radius' );
		if(empty($themepoints_scrollbar_radius))
		{
			$themepoints_scrollbar_radius = "0px";
		}			
		$themepoints_scrollbar_border = get_option( 'themepoints_scrollbar_border' );
		$themepoints_scrollbar_speed = get_option( 'themepoints_scrollbar_speed' );
		if(empty($themepoints_scrollbar_speed))
		{
			$themepoints_scrollbar_speed = "60";
		}
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("html").niceScroll({
				cursorcolor: '<?php echo esc_attr($themepoints_scrollbar_colors); ?>',
				cursorwidth: '<?php echo esc_attr($themepoints_scrollbar_width); ?>',
				cursorborderradius: '<?php echo esc_attr($themepoints_scrollbar_radius); ?>',
				cursorborder: '<?php echo esc_attr($themepoints_scrollbar_radius); ?>',
				scrollspeed: '<?php echo esc_attr($themepoints_scrollbar_speed); ?>',
				autohidemode: false,
				touchbehavior: false,
				bouncescroll: true,
				horizrailenabled: false
			});           
		});	
	</script>
<?php
}
add_action('wp_head', 'tp_scrollbar_wp_activate');

/*===============================================
    scrollbar wp options init
=================================================*/
function scrollbar_wp_option_init(){
	
	register_setting( 'scrollbar_wp_plugin_options', 'themepoints_scrollbar_colors');
	register_setting( 'scrollbar_wp_plugin_options', 'themepoints_scrollbar_width');
	register_setting( 'scrollbar_wp_plugin_options', 'themepoints_scrollbar_radius');
	register_setting( 'scrollbar_wp_plugin_options', 'themepoints_scrollbar_border');
	register_setting( 'scrollbar_wp_plugin_options', 'themepoints_scrollbar_speed');
	
    }
add_action('admin_init', 'scrollbar_wp_option_init' );


/*===============================================
    scrollbar admin page init
=================================================*/
function scrollbar_wp_admin_page(){
	
	include('scrollbar-admin.php');	

}

function scrollbar_wp_menu_init() {
if ( current_user_can( 'manage_options' ) ) {
	add_menu_page(__('Scrollbar Wp','tpscrollbarwp'), __('Scrollbar Wp','tpscrollbarwp'), 'manage_options', 'scrollbar_wp_admin_page', 'scrollbar_wp_admin_page');
	}
}
add_action('admin_menu', 'scrollbar_wp_menu_init');

?>