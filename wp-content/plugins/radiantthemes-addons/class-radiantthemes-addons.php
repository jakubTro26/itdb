<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * @wordpress-plugin
 * Plugin Name: RadiantThemes Addons
 * Description: Includes RadiantThemes Addons elements like Blog, Team and Testimonials and more.
 * Version:     1.3
 * Author:      RadiantThemes
 * Author URI:  http://www.radiantthemes.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: radiantthemes-addons
 */

/**
 * [vc_after_init_actions description]
 */
function vc_after_init_actions() {
	// Remove VC Elements.
	if ( function_exists( 'vc_remove_element' ) ) {
		// Remove VC Button Element.
        // vc_remove_element( 'vc_btn' );

		// Remove VC Separator Element.
		vc_remove_element( 'vc_separator' );

		// Remove VC Tab Element.
		vc_remove_element( 'vc_tta_tabs' );

		// Remove VC Accordion Element.
		vc_remove_element( 'vc_tta_accordion' );

		// Remove VC FAQ Element.
		vc_remove_element( 'vc_toggle' );

		// Remove VC Call to Action Element.
		vc_remove_element( 'vc_cta' );

		// Remove VC Custom Menu.
		vc_remove_element( 'vc_wp_custommenu' );
		
		// Remove VC Hoverbox.
		vc_remove_element( 'vc_hoverbox' );
	}
}
// After VC Init.
add_action( 'vc_after_init', 'vc_after_init_actions' );

// Set if vc editor is enable or not.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// check for plugin using plugin name.
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	if ( is_admin() || ( isset( $_GET['vc_action'] ) && 'vc_inline' == $_GET['vc_action'] ) || ( isset( $_GET['vc_editable'] ) && $_GET['vc_editable'] ) ) {
		// Activate - params.
		require_once 'params/radiantthemes-datetime-picker-param.php';
	}
}

/**
 * Check if Contact Form 7 is installed and activated.
 */
function rt_init_vendor_cf7() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
		require_once 'cf7/class-radiantthemes-style-cf7.php';
	} // if contact form7 plugin active.

}
add_action( 'plugins_loaded', 'rt_init_vendor_cf7' );


// Require files.

$my_theme = wp_get_theme( 'consultix' );
if ( $my_theme->exists() && ($my_theme->get( 'Version' ) >=2 ) )
{
require_once 'widget/facebook-page-box/class-consultix-facebook-widget.php';
require_once 'widget/twitter-widget/class-consultix-twitter-widget.php';
require_once 'widget/call-to-action/class-consultix-call-to-action-widget.php';
require_once 'widget/contact-box/class-consultix-contact-box-widget.php';
require_once 'widget/social-widget/class-consultix-social-widget.php';
require_once 'widget/recent-posts/class-consultix-recent-posts-widget.php';
}
require_once 'accordion/class-radiantthemes-style-accordion.php';
require_once 'alert-box/class-radiantthemes-style-alert.php';
require_once 'animated-link/class-radiantthemes-style-animated-link.php';
require_once 'beforeafter/class-radiantthemes-style-beforeafter.php';
require_once 'blockquote/class-radiantthemes-style-blockquote.php';
require_once 'blog/class-radiantthemes-style-blog.php';
require_once 'calltoaction/class-radiantthemes-style-calltoaction.php';
require_once 'case-studies/class-radiantthemes-style-case-study.php';
require_once 'clients/class-radiantthemes-style-clients.php';
require_once 'countdown/class-radiantthemes-style-countdown.php';
require_once 'counterup/class-radiantthemes-style-counterup.php';
require_once 'custom-button/class-radiantthemes-style-custom-button.php';
require_once 'custom-menu/class-radiantthemes-style-menu.php';
require_once 'dropcap/class-radiantthemes-style-dropcap.php';
require_once 'fancytextbox/class-radiantthemes-style-fancy-text-box.php';
require_once 'flip-box/class-radiantthemes-style-flip-box.php';
require_once 'highlight-box/class-radiantthemes-style-highlight-box.php';
require_once 'ihover/class-radiantthemes-style-ihover.php';
require_once 'image-gallery/class-radiantthemes-style-image-gallery.php';
require_once 'image-slider/class-radiantthemes-style-image-slider.php';
require_once 'list/class-radiantthemes-style-list.php';
require_once 'loan-calculator/class-radiantthemes-loan-calculator.php';
require_once 'masonry-gallery/class-radiantthemes-style-masonry-gallery.php';
require_once 'popup-video/class-radiantthemes-style-popup-video.php';
require_once 'portfolio/class-radiantthemes-style-portfolio.php';
require_once 'portfolio-slider/class-radiantthemes-style-portfolio-slider.php';
require_once 'pricingtable/class-radiantthemes-style-pricing-table.php';
require_once 'progressbar/class-radiantthemes-style-progressbar.php';
require_once 'quote-box/class-radiantthemes-style-quote-box.php';
require_once 'separator/class-radiantthemes-style-separator.php';
require_once 'tabs/class-radiantthemes-style-tabs.php';
require_once 'team/class-radiantthemes-style-team.php';
require_once 'testimonial/class-radiantthemes-style-testimonial.php';
require_once 'button/class-radiantthemes-style-button.php';
require_once 'timeline/class-radiantthemes-style-timeline.php';

if ( ! class_exists( 'Radiantthemes_Addons' ) ) {
	/**
	 * Class Definition.
	 */
	class Radiantthemes_Addons {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			if ( ! function_exists( 'rt_accordion_style_func' ) ) {
				new RadiantThemes_Style_Accordion();
			}
			if ( ! function_exists( 'radiantthemes_alert_style_func' ) ) {
				new Radiantthemes_Style_Alert();
			}
			if ( ! function_exists( 'rt_animated_link_style_func' ) ) {
				new RadiantThemes_Style_Animated_Link();
			}
			if ( ! function_exists( 'radiantthemes_beforeafter_style_func' ) ) {
				new Radiantthemes_Style_Beforeafter();
			}
			if ( ! function_exists( 'radiantthemes_blockquote_style_func' ) ) {
				new Radiantthemes_Style_Blockquote();
			}
			if ( ! function_exists( 'radiantthemes_blog_style_func' ) ) {
				new Radiantthemes_Style_Blog();
			}
			if ( ! function_exists( 'radiantthemes_calltoaction_style_func' ) ) {
				new Radiantthemes_Style_Calltoaction();
			}
			if ( ! function_exists( 'radiantthemes_case_study_style_func' ) ) {
				new Radiantthemes_Style_Case_Study();
			}
			if ( ! function_exists( 'radiantthemes_clients_style_func' ) ) {
				new Radiantthemes_Style_Clients();
			}
			if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
				if ( ! function_exists( 'rt_cf7_style_func' ) ) {
					new RadiantThemes_Style_Cf7();
				}
			}
			if ( ! function_exists( 'radiantthemes_countdown_style_func' ) ) {
				new Radiantthemes_Style_Countdown();
			}
			if ( ! function_exists( 'radiantthemes_counterup_style_func' ) ) {
				new Radiantthemes_Style_Counterup();
			}
			if ( ! function_exists( 'radiantthemes_custom_button_style_func' ) ) {
				new Radiantthemes_Style_Custom_Button();
			}
			if ( ! function_exists( 'radiantthemes_menu_style_func' ) ) {
				new Radiantthemes_Style_Menu();
			}
			if ( ! function_exists( 'radiantthemes_dropcap_style_func' ) ) {
				new Radiantthemes_Style_Dropcap();
			}
			if ( ! function_exists( 'radiantthemes_fancy_text_box_style_func' ) ) {
				new RadiantThemes_Style_Fancy_Text_Box();
			}
			if ( ! function_exists( 'radiantthemes_flip_box_style_func' ) ) {
				new RadiantThemes_Style_Flip_Box();
			}
			if ( ! function_exists( 'radiantthemes_highlight_box_style_func' ) ) {
				new RadiantThemes_Style_Highlight_Box();
			}
			if ( ! function_exists( 'radiantthemes_ihover_style_func' ) ) {
				new RadiantThemes_Style_ihover();
			}
			if ( ! function_exists( 'radiantthemes_image_gallery_style_func' ) ) {
				new RadiantThemes_Style_Image_Gallery();
			}
			if ( ! function_exists( 'radiantthemes_image_slider_style_func' ) ) {
				new RadiantThemes_Style_Image_Slider();
			}
			if ( ! function_exists( 'rt_list_style_func' ) ) {
				new RadiantThemes_Style_List();
			}
			if ( ! function_exists( 'rt_loan_calculator_func' ) ) {
				new RadiantThemes_Loan_Calculator();
			}
			if ( ! function_exists( 'radiantthemes_masonry_gallery_style_func' ) ) {
				new RadiantThemes_Style_Masonry_Gallery();
			}
			if ( ! function_exists( 'radiantthemes_popup_video_style_func' ) ) {
				new Radiantthemes_Style_Popup_Video();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_style_func' ) ) {
				new Radiantthemes_Style_Portfolio();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_slider_style_func' ) ) {
				new Radiantthemes_Style_Portfolio_Slider();
			}
			if ( ! function_exists( 'radiantthemes_pricing_table_style_func' ) ) {
				new Radiantthemes_Style_Pricing_Table();
			}
			if ( ! function_exists( 'radiantthemes_progressbar_style_func' ) ) {
				new Radiantthemes_Style_Progressbar();
			}
			if ( ! function_exists( 'radiantthemes_quote_box_style_func' ) ) {
				new RadiantThemes_Style_Quote_Box();
			}
			if ( ! function_exists( 'radiantthemes_separator_style_func' ) ) {
				new Radiantthemes_Style_Separator();
			}
			if ( ! function_exists( 'rt_tabs_style_func' ) ) {
				new RadiantThemes_Style_Tabs();
			}
			if ( ! function_exists( 'radiantthemes_team_style_func' ) ) {
				new Radiantthemes_Style_Team();
			}
			if ( ! function_exists( 'radiantthemes_testimonial_style_func' ) ) {
				new Radiantthemes_Style_Testimonial();
			}
			if ( ! function_exists( 'radiantthemes_button_style_func' ) ) {
				new Radiantthemes_Style_Button();
			}
			if ( ! function_exists( 'radiantthemes_timeline_style_func' ) ) {
				new RadiantThemes_Style_Timeline();
			}
		}
	}
}

/**
 * [radiantthemes_vc_addons_notice description]
 */
function radiantthemes_vc_addons_notice() {
	$plugin_data = get_plugin_data( __FILE__ );
	echo '
	<div class="updated">
		<p>' .
			sprintf( wp_kses_post( '<strong>%s</strong> requires <strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'radiantthemes-addons' ), esc_html( $plugin_data['Name'] ) ) .
		'</p>
	</div>';
}
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * [radiantthemes_vc_bundle_init description]
 */
function radiantthemes_vc_bundle_init() {

	// Localization.
	load_plugin_textdomain( 'radiantthemes-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	if ( ! defined( 'WPB_VC_VERSION' ) ) {
		add_action( 'admin_notices', 'radiantthemes_vc_addons_notice' );
		return;
	}

	if ( class_exists( 'Radiantthemes_Addons' ) ) {
		new Radiantthemes_Addons();
	}
}

add_action( 'init', 'radiantthemes_vc_bundle_init' );

function radiantthemes_load_frontend_scripts() {
	
	// CALL CUSTOM WIDGET CSS.
	if ( is_active_widget( false, false, 'consultix_twitter_widget', true ) ) {
		wp_enqueue_style( 'consultix-twitter-css', plugins_url( 'radiantthemes-addons/widget/twitter-widget/css/consultix-twitter-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'consultix_call_to_action_widget', true ) ) {
		wp_enqueue_style( 'consultix-call-to-action-widget', plugins_url( 'radiantthemes-addons/widget/call-to-action/css/consultix-call-to-action.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'consultix_contact_box_widget', true ) ) {
		wp_enqueue_style( 'consultix-contact-box-widget', plugins_url( 'radiantthemes-addons/widget/contact-box/css/consultix-contact-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'consultix_recent_posts_widget', true ) ) {
		wp_enqueue_style( 'consultix-recent-posts-widget', plugins_url( 'radiantthemes-addons/widget/recent-posts/css/consultix-recent-post-with-thumbnail-element-one.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'consultix_twitter_widget', true ) ) {
		wp_enqueue_script(
			'consultix-twitter-widget',
			plugins_url( 'radiantthemes-addons/widget/twitter-widget/js/consultix-twitter-box.js' ),
			array( 'jquery' ),
			false,
			true
		);
		wp_enqueue_script(
			'consultix-twitter-widget-min',
			plugins_url( 'radiantthemes-addons/widget/twitter-widget/js/consultix-twitterFetcher.min.js' ),
			array( 'jquery' ),
			false,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_load_frontend_scripts' );
