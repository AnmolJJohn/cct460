<?php
/* 
* Plugin Name: Playing with Shortcodes 
* Plugin URI: http://codediva.com 
* Description: Showing how shortcodes work. 
* Author: Anmol Joy John * Version: 1.0 
* Author URI: http://codediva.com 
*/
/*code to enqueue the style sheet (tried to enqueue the style sheet but it didn't work)
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );


function register_plugin_styles() {
	wp_enqueue_style('my-plugin',plugins_url('plugin.css',__FILE__ ) );
}
*/
/*this is my download button*/
function button_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'color' => 'blue',
      'size' => 'medium',
      ), $atts ) );
 /*this is the syle for my button which makes it look grey with black text in it*/
      return '
		<style type="text/css">
		.shortcode_button {
			padding: 2px 8px;
			border: 1px solid #ccc;
			border-radius: 10px;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			color: '.$color.';
		}
		
		.black {
			background: #ffd149;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#636363), to(#332F2F));
			background: -moz-linear-gradient(19% 75% 90deg,#332F2F, #636363);
			color: #f0f0f0;
			border-top-color: #1c1c1c;
			border-left-color: #1c1c1c;
			border-right-color: #525252;
			border-bottom-color: #525252;
		}
		.blue {
			background: #a0c5ef;
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#508BC7), to(#203F75));
			background: -moz-linear-gradient(19% 75% 90deg,#203F75, #508BC7);
			color: #f0f0f0;
			border-top-color: #023778;
			border-left-color: #023778;
			border-right-color: #26609e;
			border-bottom-color: #26609e;
		}
 
		.large	{
			width: 200px;
		}
		.medium	{
			width: 120px;
		}
		.small	{
			width: 80px;
		}
		</style>
 
      <div class="shortcode_button ' . $size . ' ' .  $color . '">' . $content . '</div>';
 
}
add_shortcode('button', 'button_shortcode');


/*this is the button in the box */
function box_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'color' => 'yellow',
      'size' => 'medium',
      ), $atts ) );
 
      return '
		<style type="text/css">
		.shortcode_box {
			padding: 2px 4px;
			border: 1px solid #ccc;
			color: '.$color.';
		}
		
		.yellow {
			background: #ffd149;
			color: #666;
		}
		.blue {
			background: #a0c5ef;
			color: #333;
		}
		.gray {
			background: #f0f0f0;
			color: #333;
		}
		</style>
 
      <div class="shortcode_box ' . $size . ' ' .  $color . '">' . do_shortcode($content) . '</div>';
 
}
add_shortcode('box', 'box_shortcode');

?>