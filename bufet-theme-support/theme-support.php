<?php
/*
Plugin Name: Bufet Theme Support
Plugin URI: http://themes.dhrubok.website/bufet
Description: This plugin is compatible with Appai Landing Page theme
Author: Ohidul
Author URI: http://ohidul.com
Version: 2.1.3
Text Domain: bufet
*/


add_action( 'init', 'bufet_ts_textdomain' );

function bufet_ts_textdomain() {
  load_plugin_textdomain( 'bufet', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


// Theme Custom Post Types
require_once plugin_dir_path(__FILE__) . 'theme-custom-post-types.php';

// Theme Shortcodes
require_once plugin_dir_path(__FILE__) . '/theme-shortcodes.php';




// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');




//
// Add social media share
//

add_action('single_blog_right_down', 'add_social_share_media');
function add_social_share_media() {

	global $post;

	echo '<div class="social-links">';
		$share_media = array(
			array(
				'type'  => 'facebook',
				'icon'  => 'facebook',
			),
			array(
				'type'  => 'twitter',
				'icon'  => 'twitter-alt',
			),
			array(
				'type'  => 'linkedin',
				'icon'  => 'linkedin',
			),
			array(
				'type'  => 'pinterest',
				'icon'  => 'pinterest',
			),

		);

		// Get the post id
		$post_id = $post->ID;

		// Get the post Title
		$post_title = get_the_title($post_id);

		$post_description = get_the_excerpt($post_id);

		// Get the post media
		$attachment_id = get_post_thumbnail_id( $post_id );
		$post_media = wp_get_attachment_image_src( $attachment_id, 'full');

		// get the post url
		$post_url = get_the_permalink();


		 foreach( $share_media as $media  ) :

			printf(
				'<a href="#"
					data-type="%s"
					data-url="%s"
					data-title="%s"
					data-description="%s"
					data-media="%s"
					target="_blank"
					class="prettySocial"
				>
					<span class="ti-%s"></span>
				</a>',
				esc_attr( $media['type'] ),
				esc_url( $post_url ),
				esc_attr( $post_title ),
				esc_attr( $post_description ),
				esc_url( $post_media[0] ),
				esc_attr($media['icon'])
			);

		endforeach;

	echo '</div>';

	wp_enqueue_script('prettysocial');

}
