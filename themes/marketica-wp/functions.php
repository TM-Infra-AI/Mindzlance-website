<?php

/**

 * Theme Function

 */



if ( ! isset( $content_width ) ) $content_width = 1012;



define( 'THEME_NAME' , 'marketica-wp' );

define( 'THEME_VERSION', '4.4.1' );

define( 'THEME_ADDONS_VERSION', '4.4.0' );



define( 'THEME_DIR', get_template_directory() );

define( 'THEME_URI', get_template_directory_uri() );



/**

 * Flush rewrite rules.

 */

add_action( 'after_switch_theme', 'tokopress_flush_rewrite_rules' );

function tokopress_flush_rewrite_rules() {

	flush_rewrite_rules();

}



/**

 * Tokopress Setup Theme

 */

function tokopress_setup() {



	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 */

	load_theme_textdomain( 'tokopress', get_template_directory() . '/languages' );



	// title-tag

	add_theme_support( "title-tag" );



	// feed links

	add_theme_support( 'automatic-feed-links' );



	// post format

	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );



	// post thumbnails & image sizes

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'blog-thumbnail', 600, 420, true );

	add_image_size( 'custom-woo-thumbnail', 600, 500, true );



	// style editor

	add_editor_style( 'style-editor.css' );



	// custom backgrounds

	$bg_args = array(

		'default-color'          => '#f2f0f0',

		'default-image'          => '',

		'wp-head-callback'       => 'tokopress_custom_background_cb',

	);

	add_theme_support( 'custom-background', $bg_args );



	// custom headers

	$head_args = array(

		'flex-width'    => true,

		'width'         => 1200,

		'flex-height'    => true,

		'default-image' => '',

	);

	add_theme_support( 'custom-header', $head_args );



	// register nav menu

	register_nav_menus( array(

		'primary_menu'		=> __( 'Primary Menu - Header', 'tokopress' ),

		'secondary_menu'	=> __( 'Secondary Menu - Below Header', 'tokopress' )

	) );



	// Main Sidebar

	register_sidebar( array(

		'name' 			=> __( 'Main Widget', 'tokopress' ),

		'id' 			=> 'main_widget',

		'description'	=> __( 'Widgets in this area will be shown in Main sidebar(right content).', 'tokopress' ),

		'class'         => 'primary-widget',

		'before_widget' => '<div id="%1$s" class="widget main-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	// Footer Sidebar

	register_sidebar( array(

		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#1' ),

		'id' 			=> 'footer_widget_1',

		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),

		'class'         => 'footer-widget',

		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	register_sidebar( array(

		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#2' ),

		'id' 			=> 'footer_widget_2',

		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),

		'class'         => 'footer-widget',

		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	register_sidebar( array(

		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#3' ),

		'id' 			=> 'footer_widget_3',

		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),

		'class'         => 'footer-widget',

		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	register_sidebar( array(

		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#4' ),

		'id' 			=> 'footer_widget_4',

		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),

		'class'         => 'footer-widget',

		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	// Shop Sidebar

	register_sidebar( array(

		'name' 			=> __( 'Shop Widget', 'tokopress' ),

		'id' 			=> 'shop_widget',

		'description'	=> __( 'Widgets in this area will be shown in Shop sidebar (right content). Main Widget will be used when Shop Widget is empty.', 'tokopress' ),

		'class'         => 'shop-widget',

		'before_widget' => '<div id="%1$s" class="widget shop-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );



	// Shop Sidebar

	register_sidebar( array(

		'name' 			=> __( 'Single Product Widget', 'tokopress' ),

		'id' 			=> 'product_widget',

		'description'	=> __( 'Widgets in this area will be shown in Single Product sidebar (right content).', 'tokopress' ),

		'class'         => 'shop-widget',

		'before_widget' => '<div id="%1$s" class="widget product-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>'

	) );


// add_action( 'woocommerce_after_checkout_validation', 'misha_validate_fname_lname', 10, 2);
 
// function misha_validate_fname_lname( $fields, $errors ){
 
//     if ( preg_match( '/\\d/', $fields[ 'billing_first_name' ] ) || preg_match( '/\\d/', $fields[ 'billing_last_name' ] )  ){
//         $errors->add( 'validation', 'Your first or last name contains a number. Really?' );
//     }
// }

	add_action( 'woocommerce_save_account_details_errors','billing_mobile_phone_field_validation', 20, 1 );
function billing_mobile_phone_field_validation( $args ){
    if ( isset($_POST['account_first_name']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['account_first_name'])){
        $args->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'');
    }else if(isset($_POST['account_last_name']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['account_last_name'])){
    	$args->add( 'error', __( 'Please add a valid last name', 'woocommerce' ),'');
    }
}

function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

    if ( isset($_POST['fname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
        $validation_errors->add( 'first_name_error', __( 'Please add a valid first name', 'woocommerce' ) );
    }

    if ( isset($_POST['lname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['lname'])){
        $validation_errors->add( 'last_name_error', __( 'Please add a valid last name', 'woocommerce' ) );
    }

    
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );


add_action( 'woocommerce_after_checkout_validation', 'misha_validate_fname_lname', 10, 2);
 
function misha_validate_fname_lname( $fields, $errors ){

	// print_r($fields);die();
 
    if ( !preg_match( "/^([a-zA-Z' ]+)$/", $fields[ 'billing_first_name' ] )    ){
        $errors->add( 'validation', 'Your first or last name contains a number. Really?' );
    }
     else if(!preg_match( "/^([a-zA-Z' ]+)$/", $fields[ 'billing_last_name' ])){
$errors->add( 'validation', 'Your first or last name contains a number. Really?' );
    }
    elseif (!preg_match( "/^[6-9][0-9]{9}$/", $fields[ 'billing_phone' ])) {
    	$errors->add( 'validation', 'Your phone number is not valid' );
    }
}

// add_action( 'save_account_details','billing_mobile_phone_field_validation1', 20, 1 );
// function billing_mobile_phone_field_validation1( $args ){
//     if ( isset($_POST['fname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
//         $args->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'');
//     }
// }

// add_action( 'user_register', 'myplugin_user_register' );
//     function myplugin_user_register( $user_id ) {
//         if ( isset($_POST['fname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
//         $args->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'');
//     }
//     }

// add_action( 'woocommerce_register_form', 'ff', 10 );
//   function ff( $args ) {
//   	print_r('expression');die();
//         if ( isset($_POST['fname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
//         $args->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'');
//     }
//     }

	// add_theme_support( 'wc-product-gallery-zoom' );

	// add_theme_support( 'wc-product-gallery-slider' );

// add_filter( 'woocommerce_registration_errors', 'iconic_validate_user_frontend_fields', 10 );
// function iconic_validate_user_frontend_fields( $errors ) {
// $fields = iconic_get_account_fields();

// print_r($_POST['fname']);die();
// $message = sprintf( __( '%s is a required field.', 'iconic' ), '<strong>' .$_POST['fname']. '</strong>' );
// $errors->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'' );
// }
//   function ff( $args ) {
//   	// print_r('expression');die();
// //   	ini_set('display_errors', 1);
// // ini_set('display_startup_errors', 1);
// // error_reporting(E_ALL);
//         if ( isset($_POST['fname']) && !preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
//         $args->add( 'error', __( 'Please add a valid first name', 'woocommerce' ),'');
//     }
//     }


// function my_wpcf7_validate_text( $result, $tag ) {

//     $type = $tag['type'];
//     $name = $tag['name'];
//     $value = $_POST[$name] ;

//     if ( strpos( $name , 'name' ) !== false ){
//         $regex = '/^[a-zA-Z]+$/';
//         $Valid = preg_match($regex,  $value, $matches );
//         if ( $Valid > 0 ) {
//         } else {
//             $result->invalidate( $tag, wpcf7_get_message( 'invalid_name' ) );
//         }
//     }
//     return $result;
// }
// add_filter( 'wpcf7_validate_text*', 'my_wpcf7_validate_text' , 10, 2 );



add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2 );

function custom_text_validation_filter( $result, $tag ) {
    if ( 'your-name' == $tag->name ) {
        // matches any utf words with the first not starting with a number
        $re = "/^([a-zA-Z' ]+)$/";

        if (!preg_match($re, $_POST['your-name'], $matches)) {
            $result->invalidate($tag, "This is not a valid name!" );
        }
    }

    return $result;
}



// add_filter( 'post_date_column_time' , 'woo_custom_post_date_column_time' );
// function woo_custom_post_date_column_time( $post ) {       
//         $h_time = get_post_time( __( 'd/m/Y', 'woocommerce' ), $post );
//         return $h_time;
// }


// add_filter( 'woocommerce_get_image_size_single', 'custom_product_image_size' );
// function custom_product_image_size( $size ) {
// 	// print_r('expression');die();
// return array(
// 'width' => 600,
// 'height' => 900,
// 'crop' => 1,
// );
// }
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() {
   // if (is_cart()) {
   	// $order = wc_get_order( $order_id );
   	// print_r($order->get_date_created());die();


      ?>
      <script type="text/javascript">
      	// jQuery(document.body).trigger('wc_fragment_refresh');
      	var a = jQuery('.misha-cart').text();
      	a = parseInt(a);
      	// alert(a);
      	if(a>100){
jQuery('.misha-cart').text('100+');
jQuery('.cart_value_mini .misha-cart').css('width', '26px');
jQuery('.cart_value_mini .misha-cart').css('height', '17px');
    
      	}
jQuery("#_stock_status").change(function(){
  // alert("The paragraph was clicked.");
  var stock_status = jQuery('#_stock_status').find(":selected").val();
  if(stock_status == 'outofstock'){
 var manage_stock = jQuery('#_manage_stock').is(":checked");
 if(manage_stock == true){
jQuery("#_manage_stock").click(); 
 }
  // alert(manage_stock);
  }
 
});
      	// jQuery('#_stock_status').click()
      	// alert(jQuery('.misha-cart').text());
         // jQuery('div.woocommerce').on('click', 'input.qty', function(){
            // jQuery("[name='update_cart']").trigger("click");
            // jQuery("cart_value_mini").click(); 
         // });
        // jQuery(".cart_item").find(".qty").on("change", function(){jQuery("[name='update_cart']").trigger("click");});
      </script>
      <?php
   // }
}






// add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty1' ); 
 
// function bbloomer_cart_refresh_update_qty1() {
//    if (is_product()) {
//    	// $order = wc_get_order( $order_id );
//    	// print_r($order->get_date_created());die();


//       ?-->
//       <script type="text/javascript">
//      $(window).on("load", function() {
//     // weave your magic here.
// });
//       </script>
//       <?php
//    }
// }









	if ( of_get_option('tokopress_wc_show_product_lightbox') ) {

		add_theme_support( 'wc-product-gallery-lightbox' );

	}



}

add_action( 'after_setup_theme', 'tokopress_setup' );



/**

 * Enqueue Scripts

 */

function add_theme_scripts() {

  wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), '', 'all');

}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts', 100 );  



function tokopress_scripts() {



	wp_enqueue_style( 'style-vendors', get_template_directory_uri() . '/style-vendors.css', array(), THEME_VERSION );



	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.7.1', '' );



	wp_enqueue_script( 'marketica', get_template_directory_uri() . '/js/marketica.js', array( 'jquery' ), THEME_VERSION, true );



	/* Load comment reply Javascript */

	if ( is_singular() && comments_open() )

      	wp_enqueue_script( 'comment-reply' );



    if( is_page_template( 'content-contact-form.php' ) || is_page_template( 'page-contact-form.php' ) ) {

		if( $apikey = of_get_option( 'tokopress_contact_apikey' ) ) {

	  		wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key='.$apikey, array( 'jquery' ), '3', true );

		}

		else {

	  		wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array( 'jquery' ), '3', true );

		}

  		wp_enqueue_script( 'jquery-gmaps', get_template_directory_uri() . '/js/gmaps.js', array( 'jquery' ), '0.4.12', true );

  	}



	// CMB2 styles

	// $styles = apply_filters( 'cmb2_style_dependencies', array() );

	// wp_register_style( 'cmb2-styles', THEME_URI . '/inc/cmb2/cmb2.min.css', $styles );



}

add_action( 'wp_enqueue_scripts', 'tokopress_scripts' );



/**

 * Add main stylesheet file to <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section.

 */

add_action( 'wp_enqueue_scripts', 'tokopress_styles_theme', 99 );

function tokopress_styles_theme() {



	$stylesheet_name = is_rtl() ? 'style-rtl.css' : 'style.css';

    /* If using a child theme, auto-load the parent theme style. */

    if ( is_child_theme() && !of_get_option('tokopress_disable_child_theme_style') ) {

        wp_enqueue_style( 'style-parent', trailingslashit( get_template_directory_uri() ) . $stylesheet_name, array(), THEME_VERSION );

		wp_enqueue_style( 'style-theme', get_stylesheet_uri(), array(), THEME_VERSION );

    }

    else {

        wp_enqueue_style( 'style-theme', trailingslashit( get_template_directory_uri() ) . $stylesheet_name, array(), THEME_VERSION );

    }



	ob_start();

	do_action('tokopress_custom_styles');

	$custom_styles = ob_get_clean();



	if ( $custom_styles )

		wp_add_inline_style( 'style-theme', $custom_styles );

}



/**

 * Function additional field user

 */

add_filter( 'user_contactmethods', 'tokopress_add_to_author_profile', 10, 1);

function tokopress_add_to_author_profile( $contactmethods ) {



	$contactmethods['phone_number'] 	= __( 'Phone Number', 'tokopress' );

	$contactmethods['facebook_url'] 	= __( 'Facebook Profile URL', 'tokopress' );

	$contactmethods['gplus_url']		= __( 'Google Plus Profil URL', 'tokopress' );

	$contactmethods['twitter_url'] 		= __( 'Twitter Profile URL', 'tokopress' );

	$contactmethods['instagram_url'] 	= __( 'Instagram Profile URL', 'tokopress' );

	$contactmethods['linkedin_url'] 	= __( 'Linkedin Profile URL', 'tokopress' );

	$contactmethods['youtube_url'] 		= __( 'Youtube Profile URL', 'tokopress' );

	$contactmethods['pinterest_url'] 	= __( 'Pinterest Profile URL', 'tokopress' );

	$contactmethods['flickr_url'] 		= __( 'Flickr Profile URL', 'tokopress' );



	return $contactmethods;

}



function tokopress_get_mod( $name, $default = false ) {

	$options = get_option( THEME_NAME );

	if ( isset( $options[$name] ) ) {

		return $options[$name];

	}

	return $default;

}



function of_get_option( $name, $default = false ) {

	return tokopress_get_mod( $name, $default );

}



include_once( get_template_directory() . '/inc/functions/text-limiter.php' );

include_once( get_template_directory() . '/inc/functions/hybrid-media-grabber.php' );

include_once( get_template_directory() . '/inc/functions/contact-form.php' );

include_once( get_template_directory() . '/inc/functions/breadcrumb.php' );



add_action( 'customize_register', 'tokopress_customize_controls_register', 5 );

function tokopress_customize_controls_register( $wp_customize ){

	include_once( get_template_directory() . '/inc/theme/customize-controls.php' );

}

include_once( get_template_directory() . '/inc/theme/customize.php' );

require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );

include_once( get_template_directory() . '/inc/theme/options2.php' );

include_once( get_template_directory() . '/inc/theme/frontend.php' );

include_once( get_template_directory() . '/inc/theme/designs2.php' );

include_once( get_template_directory() . '/inc/theme/plugins.php' );

include_once( get_template_directory() . '/inc/theme/update.php' );



include_once( get_template_directory() . '/inc/widget/widget_subscribe.php' );

include_once( get_template_directory() . '/inc/widget/widget_statistic.php' );

include_once( get_template_directory() . '/inc/widget/widget_social.php' );



if( class_exists( 'woocommerce' ) ) {

	include_once( get_template_directory() . '/inc/woocommerce/frontend.php' );

	include_once( get_template_directory() . '/inc/woocommerce/options2.php' );

	include_once( get_template_directory() . '/inc/woocommerce/metabox.php' );

	include_once( get_template_directory() . '/inc/woocommerce/functions.php' );

	include_once( get_template_directory() . '/inc/woocommerce/designs2.php' );

	if ( class_exists('WC_Vendors') ) {

		include_once( get_template_directory() . '/inc/woocommerce/plugin-wcvendors.php' );

	}

	if ( class_exists('WeDevs_Dokan') ) {

		include_once( get_template_directory() . '/inc/woocommerce/plugin-dokan.php' );

	}

	if ( class_exists('WC_Product_Vendors') ) {

		include_once( get_template_directory() . '/inc/woocommerce/plugin-woovendors.php' );

	}

	if ( class_exists('FPMultiVendor') ) {

		include_once( get_template_directory() . '/inc/woocommerce/plugin-sociovendors.php' );

	}

}





function dk_shortcode_script($shortcodes){



    define('DOKAN_SHORTCODES', $shortcodes);

    

    ?>
<script>

        var dokan_assets_url = <?php echo json_encode( DOKAN_PRO_PLUGIN_ASSEST ) ?>;

        var dokan_shortcodes = <?php echo json_encode( DOKAN_SHORTCODES ) ?>;

    </script>
<?php



    return $shortcodes;

}

add_filter('dokan_button_shortcodes', 'dk_shortcode_script', 10, 1);

add_action('admin_head', 'dk_shortcode_script');



// $_GET['id'];



// print_r( get_user_meta($_GET['id'], $key = '_dokan_email_verification_key', $single = true));

//  $val=get_user_meta($_GET['id'], $key = '_dokan_email_verification_key', $single = true);

// echo $val;

// echo "<br>";



// $user_last = get_user_meta( $_GET['id'], "_dokan_email_verification_key", $single ); 

// print_r($_GET['dokan_email_verification']);

// echo "<br>";

// print_r($_GET['id']);

// if($_GET['dokan_email_verification'] == $val){

//     $updated = update_user_meta( $_GET['id'], '_dokan_email_pending_verification', 0 );

// }



// if($xx == '1'){

//     $updated = update_user_meta( $_GET['id'], '_dokan_email_pending_verification', 0 );

//     echo "aa gya";

// }else{

//     echo "nahi aaya bhai";

// }

// $updated = update_user_meta( $_GET['id'], '_dokan_email_pending_verification', 0 );











/*** Function provide permission for blog post user and change wp-admin dashboard */

$user_id = get_current_user_id();

$roles = wp_get_current_user()->roles;



//if($user_id == '352'){


	if( current_user_can('author') || current_user_can('seller')){
		// if(isset($roles[0]) == 'author' || isset($roles[0]) == 'seller' ){   
		
			add_action( 'admin_init', 'my_remove_admin_menus' );
		
			function my_remove_admin_menus() {
		
				remove_menu_page( 'edit-comments.php' );
		
			}
		
		
		
			add_action( 'admin_menu', 'remove_admin_menus' );
		
			function remove_admin_menus(){
		
				global $menu;
		
				$menu = array();
		
			} 
		
		
		
		
		
			function posttype_admin_css() {
		
				global $post_type;
		
				$post_types = array('post','page');
		
				if(in_array($post_type, $post_types)){
		
					echo '<style type="text/css">
		
					button.components-button.editor-post-publish-panel__toggle.is-button.is-primary, #major-publishing-actions,  #wp-admin-bar-comments{
		
						display:none;
		
					}
		
					</style>';
		
		
		
				}
		
			}
		
			add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
		
			add_action( 'admin_head-post.php', 'posttype_admin_css' );
		
		
		
			add_action('admin_head', 'my_custom_fonts');
		
			function my_custom_fonts() {
		
				echo '<style>
		
				li#wp-admin-bar-comments .ab-item, #wp-admin-bar-user-info, #wp-admin-bar-edit-profile, #wp-admin-bar-comments{
		
					display: none;
		
				} 
		
				</style>';
		
		
		
				echo '<script type="text/javascript">
		
				$(document).ready(function() {
		
					$("#wp-admin-bar-my-account").hover(function(){            
		
						$("#wp-admin-bar-my-account .ab-item").attr("href", "https://mindzlance.com/my-account/customer-logout/?_wpnonce=1ec4ad2a74");
		
						});
		
						});
		
						</script>';
		
					}
		
		
		
					function wpb_remove_screen_options() { 
						if(!current_user_can('manage_options')) {
							return false;
						}
						return true; 
					}
					add_filter('screen_options_show_screen', 'wpb_remove_screen_options');
		
					add_filter( 'wp_mail_from', 'my_mail_from' );
					function my_mail_from( $email ) {
						return "enter yout 'from' id";
					}
		
					add_filter('wp_mail_from_name', 'new_mail_from_name');
					function new_mail_from_name($old) {
						return 'enter your "from name"';
					}
		
			//wp_mail( $admin_mail, $subject, $message );
		
				}










// if($roles[0] == 'author'){   

//     add_action( 'admin_init', 'my_remove_admin_menus' );

//     function my_remove_admin_menus() {

//         remove_menu_page( 'edit-comments.php' );

//     }

    

//     add_action( 'admin_menu', 'remove_admin_menus' );

//     function remove_admin_menus(){

//         global $menu;

//         $menu = array();

//     } 

     

  

//     function posttype_admin_css() {

//         global $post_type;

//         $post_types = array('post','page');

//         if(in_array($post_type, $post_types)){

//         echo '<style type="text/css">

//                 button.components-button.editor-post-publish-panel__toggle.is-button.is-primary, #major-publishing-actions,  #wp-admin-bar-comments{

//                     display:none;

//                 }

//             </style>';

            

//         }

//     }

//     add_action( 'admin_head-post-new.php', 'posttype_admin_css' );

//    add_action( 'admin_head-post.php', 'posttype_admin_css' );

    

//     add_action('admin_head', 'my_custom_fonts');

//     function my_custom_fonts() {

//             echo '<style>

//                 li#wp-admin-bar-comments .ab-item, #wp-admin-bar-user-info, #wp-admin-bar-edit-profile, #wp-admin-bar-comments{

//                     display: none;

//                 } 

//             </style>';

      

//             echo '<script type="text/javascript">

//                 $(document).ready(function() {

//                     $("#wp-admin-bar-my-account").hover(function(){            

//                         $("#wp-admin-bar-my-account .ab-item").attr("href", "https://mindzlance.com/my-account/customer-logout/?_wpnonce=1ec4ad2a74");

//                     });

//                 });

//             </script>';

//     }

    

//     function wpb_remove_screen_options() { 

//         if(!current_user_can('manage_options')) {

//             return false;

//         }

//         return true; 

//     }

//     add_filter('screen_options_show_screen', 'wpb_remove_screen_options');

    

    

    

//         add_filter( 'wp_mail_from', 'my_mail_from' );

//                 function my_mail_from( $email ) {

//                     return "enter yout 'from' id";

//                 }



//                 add_filter('wp_mail_from_name', 'new_mail_from_name');

//                 function new_mail_from_name($old) {

//                     return 'enter your "from name"';

//                 }

//       wp_mail( $admin_mail, $subject, $message );

    



// }







//adding multiple emails to admin for notification

add_filter( 'wp_mail', 'my_custom_to_admin_emails' );



/**

 * Filter WP_Mail Function to Add Multiple Admin Emails

 *

 *

 *

 * @param array $args A compacted array of wp_mail() arguments, including the "to" email,

 *                    subject, message, headers, and attachments values.

 *

 * @return array

 */

function my_custom_to_admin_emails( $args ) {

    // If to isn't set (who knows why it wouldn't) return args

    if( ! isset($args['to']) || empty($args['to']) ) return $args;



    // If TO is an array of emails, means it's probably not an admin email

    if( is_array( $args['to'] ) ) return $args;



    $admin_email = get_option( 'admin_email' );



    // Check if admin email found in string, as TO could be formatted like 'Administrator <admin@domain.com>',

    // and if we specifically check if it's just the email, we may miss some admin emails.

    if( strpos( $args['to'], $admin_email ) !== FALSE ){

        // Set the TO array key equal to the existing admin email, plus any additional emails

        //

        // All email addresses supplied to wp_mail() as the $to parameter must comply with RFC 2822. Some valid examples:

        // user@example.com

        // User <user@example.com>

        $args['to'] = array( $args['to'], 'sales@mindzlance.com', 'Admin4 <sales@mindzlance.com>' );

    }



    return $args;

}



//Getting all vendors

function get_vendor(){

    ob_start();

	global $wpdb;

	$vendor_query = new WP_User_Query( array( 'role' => 'seller' ) );

    $users_count = (int) $vendor_query->get_total();

    return $users_count;

    

}



add_shortcode( 'vender_count', 'get_vendor' ,20);



//Getting all products

function get_all_product(){

    ob_start();

	global $wpdb;

    $args = array( 'post_type' => 'product', 'post_status' => 'publish', 

    'posts_per_page' => -1 );

    $products = new WP_Query( $args );
    return $products->found_posts;    
    }

add_shortcode( 'product_count', 'get_all_product' ,20);



// Custom code for product slider first image updated as fix width 1600 and height 800
//add_filter('wp_handle_upload_prefilter','handle_upload_filefiter',11, 1);

function handle_upload_filefiter($file)
{    
    get_post_meta( get_post()->ID, '_thumbnail_id', true );
    $img=getimagesize($file['tmp_name']);
   
    $minimum = array('width' => '1600', 'height' => '800');
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
    // elseif($width <= $minimum['width'])
    //     return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");
    // elseif($height <=  $minimum['height'])
    //     return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");
    else
        return $file; 
}

// add_action('woocommerce_short_description', 'short_description_of_product', 20);
// function short_description_of_product() {
//     if ( isset($_POST['post_excerpt']) && empty($_POST['post_excerpt']) )
//         wc_add_notice( __( 'Please enter the short description of product.' ), 'error' );
// }
// /**

//  * Google recaptcha add before the submit button

//  */

// function add_google_recaptcha($submit_field) {

//     $submit_field['submit_field'] = '<div class="g-recaptcha" data-sitekey="6LepTpoUAAAAALHupLyTM3Cn5kFEY20sOdQlB36M"></div><br>' . $submit_field['submit_field'];

//     return $submit_field;

// }

// if (!is_user_logged_in()) {

//     add_filter('comment_form_defaults','add_google_recaptcha');

// }

 

// /**

//  * Google recaptcha check, validate and catch the spammer

//  */

// function is_valid_captcha($captcha) {

// $captcha_postdata = http_build_query(array(

//                             'secret' => '6LepTpoUAAAAABPmWclEHjAqPeGHccauJfbBefa9',

//                             'response' => $captcha,

//                             'remoteip' => $_SERVER['REMOTE_ADDR']));

// $captcha_opts = array('http' => array(

//                       'method'  => 'POST',

//                       'header'  => 'Content-type: application/x-www-form-urlencoded',

//                       'content' => $captcha_postdata));

// $captcha_context  = stream_context_create($captcha_opts);

// $captcha_response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify" , false , $captcha_context), true);

// if ($captcha_response['success'])

//     return true;

// else

//     return false;

// }

 

// function verify_google_recaptcha() {

// $recaptcha = $_POST['g-recaptcha-response'];

// if (empty($recaptcha))

//     wp_die( __("<b>ERROR:</b> please select <b>I'm not a robot!</b><p><a href='javascript:history.back()'>« Back</a></p>"));

// else if (!is_valid_captcha($recaptcha))

//     wp_die( __("<b>Go away SPAMMER!</b>"));

// }

// if (!is_user_logged_in()) {

//     add_action('pre_comment_on_post', 'verify_google_recaptcha');

// }




add_filter('use_block_editor_for_post', '__return_false', 10);


add_shortcode('custom_product_listing','get_product_posts_hp');

function get_product_posts_hp($atts){
	global $woocommerce, $product; 

	extract(shortcode_atts(array(
		'producttype' => 'random',
	), $atts));
	if($producttype == "allsellproduct"){
		$query = new WP_Query( array(
			'posts_per_page' => 8,
			'post_type' => 'product',
			'post_status' => 'publish',
			'order' => 'DESC',
		) );
	}
	else if($producttype == "bestselling"){
		$query = new WP_Query( array(
			'posts_per_page' => 8,
			'post_type' => 'product',
			'post_status' => 'publish',
			'meta_key' => 'total_sales',
			'orderby' => 'meta_value_num',
		) );
	}else if($producttype == "bestsellingpage"){
		$query = new WP_Query( array(
			'posts_per_page' => 12,
			'post_type' => 'product',
			'post_status' => 'publish',
			'meta_key' => 'total_sales',
			'orderby' => 'meta_value_num',
		) );
	}else if($producttype == "newproductpage"){
		$query = new WP_Query( array(
			'posts_per_page' => 12,			
			'post_type' => 'product',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'date',
		) );
	}else{
		$query = new WP_Query( array(			
			'posts_per_page' => 8,
			'post_type' => 'product',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'date',
		) );
	}
	?><div class="product_container regular" id="<?php echo $producttype; ?>"><?php
	if($query->have_posts()){
		while($query->have_posts()) { 
			$query->the_post();
			?>
			<div class="column_3" >
				<div class="block_design">
					<div class="product-inner">
						<div class="thumbnail-loop-wrap">
							<a class="" href="<?= get_the_permalink(); ?>">
								<img src="<?= get_the_post_thumbnail_url(); ?>"  width="300" height="200">						

								<div class="add-to-cart-loop-wrap">
									<?php woocommerce_template_loop_add_to_cart( $query->post, $product ); ?>
								</div>
							</a>
						</div>
					</div>
					<div class="title-rating-loop-wrap shorten-title">
						<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?= get_the_permalink(); ?>">
							<h2 class="woocommerce-loop-product__title"> <?= ucfirst(strtolower(get_the_title())); ?> </h2>

							<span class="price">
								<span class="woocommerce-Price-amount amount">
									<bdi>
										<span class="woocommerce-Price-currencySymbol">
											<span <?php if(get_post_meta( get_the_ID(), '_sale_price', true ) != ""){ echo  'class="strikethrough"'; }else{ echo ''; } ?>> <?= get_woocommerce_currency_symbol();?> <?= get_post_meta( get_the_ID(), '_regular_price', true ); ?> </span>

											<span><?php if(get_post_meta( get_the_ID(), '_sale_price', true ) != ""){ echo  '&nbsp;'.get_woocommerce_currency_symbol().''.get_post_meta( get_the_ID(), '_sale_price', true ); }else{ echo '';} ?></span>
										</span>
									</bdi>
								</span>
							</span>
						</a>
						<span class="home_product_sell"> <?= get_post_meta( get_the_id(), 'total_sales', true); ?> Sales</span>
						<p class="product-seller-name">sold by
							<?php $vendor_id = get_post_field( 'post_author', get_the_id() );
							$vendor = new WP_User($vendor_id);
							$store_url   = dokan_get_store_url( $vendor_id );?>
							<a href="<?php echo $store_url; ?>"><?= get_the_author(); 
						?></a>
						</p>
						<div class = 'products-rating'>
							<?php
							echo get_star_rating();

							?>
						</div>
						<div class="buttons_home_product">
						<?php 
							do_action(view_detail_but($product));
						do_action(cmk_additional_button());
						 ?>
						</div>
					</div>

</div>
				</div>
			<?php
		}

		wp_reset_postdata();
	}
	?></div><?php
}


add_filter( 'woocommerce_add_to_cart_fragments', 'kd_cart_count_fragments', 10, 1 );
function kd_cart_count_fragments( $fragments ) {
	// $fragments['misha-cart'] = ob_get_clean();
    $fragments['span.misha-cart'] = '<span class="misha-cart">' . WC()->cart->get_cart_contents_count() . '</span>';
    
    return $fragments;
    
}



// function dokan_add_product_errors($errors) {
// 	//echo '<pre>'; print_r($_POST); echo '</pre>';
// 	//echo '<pre>'; print_r($errors); echo '</pre>';
	
// 	if(isset($_POST['item_condition'])){	
// 	    $condition = $_POST['item_condition'];
// 	    if(empty($condition)){
// 	        $errors[] = 'Condition is required';
// 	    }
// 	}
// 	return $errors;
// }
// add_filter( 'dokan_can_add_product', 'dokan_add_product_errors', 121 );



function dokan_can_add_product_validation_customized( $errors ) {
  $postdata       = wp_unslash( $_POST );
  // print_r($postdata);die();
  $featured_image = absint( sanitize_text_field( $postdata['feat_image_id'] ) );
  $_regular_price = absint( sanitize_text_field( $postdata['_sale_price'] ) );
 
  // if ( isset( $postdata['_regular_price'] ) && empty( $_regular_price ) && ! in_array( 'Please insert product price' , $errors ) ) {
  //     $errors[] = 'Please insert product price';
  // }
  if ( isset( $postdata['_sale_price'] ) && isset( $postdata['_regular_price'] ) &&  $postdata['_sale_price']>$postdata['_regular_price']) {
  	$errors[] = 'Discount price is greater than price';
  }
  return $errors;
}
add_filter( 'dokan_can_add_product', 'dokan_can_add_product_validation_customized', 35, 1 );
add_filter( 'dokan_can_edit_product', 'dokan_can_add_product_validation_customized', 35, 1 );
function dokan_new_product_popup_validation_customized( $errors, $data ) {
  if ( isset( $data['_sale_price'] ) && isset( $data['_regular_price'] ) &&  $data['_sale_price']>$data['_regular_price']) {
    return new WP_Error( 'no-price', __( 'Discount price is greater than price', 'dokan-lite' ) );
  }
 
}
add_filter( 'dokan_new_product_popup_args', 'dokan_new_product_popup_validation_customized', 35, 2 );


add_action( 'woocommerce_applied_coupon', 'restrict_coupon_usage_with_my_email_list' );
function restrict_coupon_usage_with_my_email_list( $coupon_code )
{
	$coupon = new WC_Coupon($coupon_code);
// print_r($coupon->get_email_restrictions());
	
	$emails = $coupon->get_email_restrictions();

if($coupon && is_user_logged_in())
    {
       //if it is the coupon code you want to restrict with those emails and if user logged in
       $current_user = wp_get_current_user();
       if(!empty($emails)){
       	if(in_array($current_user->user_email, $emails)){
       	
       	return true;
       }else{
       	WC()->cart->remove_coupon( $coupon_code );
       } 
       }
       
    }else{
    		WC()->cart->remove_coupon( $coupon_code );
    }





	// print_r($emails);
	// die();
    //create an array with your email list
    // $emailArr = array("a@a.com", "b@b.com");
    // $isSpecialCoupon = false;

    //check the $coupon_code 
//     if($coupon && is_user_logged_in())
//     {
//        //if it is the coupon code you want to restrict with those emails and if user logged in
//        $isSpecialCoupon = true;
//     }
//     if($isSpecialCoupon)
//     {
//        //check if the logged in user's email is in this array
//        $current_user = wp_get_current_user();
//        if(in_array($current_user->user_email, $emails)){
//        	return true;
//        } 
//        else {
//        	WC()->cart->remove_coupon( $coupon_code );

// //        	$WC_Coupon = new WC_Coupon();
// // $WC_Coupon->get_coupon_message( 1 );
       	
       		

//        }
//     }
//     else WC()->cart->remove_coupon( $coupon_code );
}


add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );
function filter_woocommerce_coupon_message( $msg, $msg_code, $coupon ) {
    // $applied_coupons = WC()->cart->get_applied_coupons(); // Get applied coupons
$coupon = new WC_Coupon($coupon);
// print_r($coupon->get_email_restrictions());
	
	$emails = $coupon->get_email_restrictions();

if($coupon && is_user_logged_in())
    {
       //if it is the coupon code you want to restrict with those emails and if user logged in
       $current_user = wp_get_current_user();
       if(!empty($emails)){
       	if(in_array($current_user->user_email, $emails)){
       		$msg = __( 'Coupon code applied successfully.', 'woocommerce' );
       	// return true;
       }else{
       	$msg = sprintf( 
            __( "Sorry, it seems the coupon %s is invalid - it has now been removed from your order.", "woocommerce" ), 
            '<strong>' . $coupon->get_code() . '</strong>' 
        );
       } 
       }
       
    }else{
    		$msg = __( 'Coupon code applied successfully.', 'woocommerce' );
    }


	// if($coupon && is_user_logged_in())
 //    {
 //       //if it is the coupon code you want to restrict with those emails and if user logged in
 //       $current_user = wp_get_current_user();
 //       if(in_array($current_user->user_email, $emails)){
 //       	$msg = __( 'Coupon code applied successfully.', 'woocommerce' );
 //       	// return true;
 //       }else{
 //       	 $msg = sprintf( 
 //            __( "Sorry, it seems the coupon %s is invalid - it has now been removed from your order.", "woocommerce" ), 
 //            '<strong>' . $coupon->get_code() . '</strong>' 
 //        );
 //       	// $msg = __( 'Sorry, it seems the coupon "%s" is invalid - it has now been removed from your order.', 'woocommerce' );
 //       } 
 //    }else{
 //    	$msg = __( 'Coupon code applied successfully.', 'woocommerce' );
 //    }


    // if( $msg === __( 'Coupon code applied successfully.', 'woocommerce' ) ) {
    //     $msg = sprintf( 
    //         __( "The %s promotion code has been applied and redeemed successfully.", "woocommerce" ), 
    //         '<strong>' . $coupon->get_code() . '</strong>' 
    //     );
    // }

    return $msg;
}
// add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
// function custom_woocommerce_get_catalog_ordering_args( $args ) {
//   $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
// 	if ( 'random_list' == $orderby_value ) {
// 		$args['orderby'] = 'rand';
// 		$args['order'] = '';
// 		$args['meta_key'] = '';
// 	}
// 	return $args;
// }
// add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
// add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
// function custom_woocommerce_catalog_orderby( $sortby ) {
// 	$sortby['random_list'] = 'Random';
// 	return $sortby;
// }

/*
add_action( 'user_register', 'custom_email_send_vendor_registration_user_register', 10, 1 );
function custom_email_send_vendor_registration_user_register( $user_id )
{
    $user = get_user_by( 'id', $user_id );

    $blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

    $message  = sprintf( __( 'New user registration on your site %s:' ), $blogname ) . "\r\n\r\n";
    $message .= sprintf( __( 'Username: %s'), $user->user_login ) . "\r\n\r\n";
    $message .= sprintf( __( 'E-mail: %s'), $user->user_email ) . "\r\n";


    $vender_reg_admin_id = "surajdeep@marketingmingmindz.in"; 

    @wp_mail( $vender_reg_admin_id , sprintf( __( '[%s] New User Registration' ), $blogname ), $message);
}
*/

// add_filter( 'woocommerce_catalog_orderby', 'misha_add_custom_sorting_options' );
 
// function misha_add_custom_sorting_options( $options ){
 
// 	$options['title'] = 'Sort alphabetically';
// 	$options['in-stock'] = 'Show products in stock first';
 
// 	return $options;
 
// }

// add_filter( 'woocommerce_get_catalog_ordering_args', 'misha_custom_product_sorting' );
 
// function misha_custom_product_sorting( $args ) {

// 	// print_r('expression');die();
 
// 	// Sort alphabetically
// 	if ( isset( $_GET['orderby'] ) && 'title' === $_GET['orderby'] ) {
// 		$args['orderby'] = 'title';
// 		$args['order'] = 'asc';
// 	}
 
// 	// Show products in stock first
// 	if( isset( $_GET['orderby'] ) && 'in-stock' === $_GET['orderby'] ) {
// 		$args['meta_key'] = '_stock_status';
// 		$args['orderby'] = array( 'meta_value' => 'ASC' );
// 	}
 
// 	return $args;
 
// }

// function filter_woocommerce_catalog_orderby( $array ) { 
//     // make filter magic happen here... 
//     return $array; 
//     // print_r($array);die();
// }; 
         
// // add the filter 
// add_filter( 'woocommerce_catalog_orderby', 'filter_woocommerce_catalog_orderby', 10, 1 ); 

// add_filter('woocommerce_get_catalog_ordering_args',    'am_woocommerce_catalog_orderby');
//     function am_woocommerce_catalog_orderby( $args ) {
//     	print_r('expression');die();
//        $args['orderby'] = 'price-desc';
//        $args['order'] = 'desc'; 
//        return $args;
//     }


// add_action( 'woocommerce_product_query', 'default_catalog_ordering_desc', 10, 2 );
// function default_catalog_ordering_desc( $q, $query ){
// 	print_r('expression');die();
//     if( $q->get( 'orderby' ) == 'menu_order title' )
//         $q->set( 'order', 'DESC' );
// }




add_action('woocommerce_after_shop_loop_item', 'get_star_rating' );
function get_star_rating()
{
	global $woocommerce, $product;
	$average = $product->get_average_rating();

	echo "<div class = 'products-rating'>";
	for($i = $average; $i > 0; $i--){
		echo '<span class="fa fa-star checked"></span>';
	}

	if($average < 5 ){
		for ($l= 1; $l  <= (5- $average) ; $l++) { 
			echo '<span class="fa fa-star not-rating"></span>';
		}
	}

	echo "</div>";

    //echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong></span></div>';
}


add_action('woocommerce_after_shop_loop_item','view_detail_but');

function view_detail_but($post){
	global $post;

	echo '<a href="' . get_permalink() . '" rel="nofollow" class="button detail_button_loop">' . 'Details' . '</a>';
}



add_action( 'woocommerce_before_single_product_summary', 'cmk_additional_button');


add_action('woocommerce_after_shop_loop_item','cmk_additional_button');
function cmk_additional_button() {
	global $product;
	$site_url = get_site_url();
	$product_cats = wp_get_post_terms($product->id, 'product_cat');
	$count = count($product_cats);
	$cats = all_cat_classes($product);

	$catreq = trim($cats);
	$check =  strcmp($cats,$catreq);
	// print_r($catreq);
	// if($catreq == "template"){
		if (strpos($catreq, 'template') !== false || $catreq == "template"|| $catreq == "theme" ){
		$checkurl = get_live_url($product->id);
		if ($checkurl != "") {


			echo '<a href = "'.$site_url.'/live-preview?template='.$product->id.'" class="button alt">Live Demo</a>';
		}
	}

}


# Will return all categories of a product, including parent categories
function all_cat_classes($post) {
	$cats = ""; 
	$terms = get_the_terms($post->ID, "product_cat");
	$key = 0;

    // foreach product_cat get main top product_cat
	foreach ($terms as $cat) {
		$cat = get_parent_terms($cat);
		$cats .= (strpos($cats, $cat->slug) === false ? $cat->slug." " : "");
		$key++;
	}

	return $cats;
}


function get_parent_terms($term) {
	if ($term->parent > 0) {
		$term = get_term_by("id", $term->parent, "product_cat");
		if ($term->parent > 0) {
			get_parent_terms($term);
		} else return $term;
	}
	else return $term;
}


function custom_admin_js() {
	$url = get_bloginfo('template_directory') . '/js/wp-admin.js';
	echo '<script type="text/javascript" src="'. $url . '"></script>';
}
add_action('admin_footer', 'custom_admin_js');

function custom_vendor_js(){
	// if(is_page('page-slug-here')){
	$url = get_bloginfo('template_directory') . '/js/vendor-custom.js';
	echo '<script type="text/javascript" src="'. $url . '"></script>';
        // }

}
add_action( 'wp_footer', 'custom_vendor_js' );

function woocommerce_product_custom_fields () {
	global $woocommerce, $post;
	$urel_exist = get_post_meta($post->ID, '_custom_product_preview_url', true);
	if(!empty($urel_exist)){
		echo '<div class="product_custom_field"  id="abd" >';

		woocommerce_wp_text_input(
			array(
				'id' => '_custom_product_preview_url',
				'placeholder' => '',
				'label' => __('Live Theme Preview', 'woocommerce'),
				'desc_tip' => 'true',
				'value' => $urel_exist
			)
		);
	}else{
		echo '<div class="product_custom_field"  id="abd" style="display:none;" >';
		// This function has the logic of creating custom field
		//  This function includes input text field, Text area and number field
		// print_r('hsdf');die();
		// echo '<p class="form-field _sale_price_field ">';
		// echo '<label for="preview_url">Live Preview</label>';
		// echo '<input type="text" class="" style="" name="preview_url" id="preview_url" value="" placeholder="">';
		// echo '<span class="description"></span></p>';
		// echo '</div>';

		woocommerce_wp_text_input(
			array(
				'id' => '_custom_product_preview_url',
				'placeholder' => '',
				'label' => __('Live Theme Preview', 'woocommerce'),
				'desc_tip' => 'true'
			)
		);
	}
	
}

add_action( 'woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

add_action( 'woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save' );

function woocommerce_product_custom_fields_save($post_id){
	$woocommerce_custom_product_text_field = $_POST['_custom_product_preview_url'];
	if (!empty($woocommerce_custom_product_text_field))
		update_post_meta($post_id, '_custom_product_preview_url', esc_attr($woocommerce_custom_product_text_field));
	// print_r('jjjj');
	// echo get_post_meta($post_id, '_custom_product_preview_url', true);
	// die();
}

function get_live_url($id)
{
	$urel_exist = get_post_meta($id, '_custom_product_preview_url', true);
	return $urel_exist;
}

add_action( 'dokan_new_product_after_product_tags','new_product_field',10 );

function new_product_field(){ ?>

	<div class="dokan-form-group" id="live_wala" style="display: none;">

		<input type="text" class="dokan-form-control" name="_custom_product_preview_url" placeholder="<?php esc_attr_e( 'Live Theme Preview', 'dokan-lite' ); ?>" id="_custom_product_preview_url">
	</div>

	<?php
}


add_action('dokan_product_edit_after_product_tags','show_on_edit_page',99,2);

function show_on_edit_page($post, $post_id){
	global $woocommerce, $post;
	$post_id = $post->ID;
	$urel_exist = get_post_meta($post->ID, '_custom_product_preview_url', true);
	?>
	<div class="dokan-form-group" id="live_wala">
		<input type="hidden" name="_custom_product_preview_url" id="_custom_product_preview_url" value="<?php echo esc_attr( $post->ID ); ?>"/>
		<label for="_custom_product_preview_url" class="form-label"><?php esc_html_e( 'Live Theme Preview', 'dokan-lite' ); ?></label>
		<?php dokan_post_input_box( $post_id, '_custom_product_preview_url', array( 'Live Theme Preview', 'dokan-lite' , 'value' => $urel_exist ) ); ?>
		<div class="dokan-product-title-alert dokan-hide">
			<?php esc_html_e( 'Please enter live preview link', 'dokan-lite' ); ?>
		</div>
		</div> <?php

	}
/*
* Saving product field data for edit and update
*/

add_action( 'dokan_new_product_added','woocommerce_product_custom_fields_save', 10, 2 );
add_action( 'dokan_product_updated', 'woocommerce_product_custom_fields_save', 10, 2 );

function save_add_product_meta($product_id, $postdata){

	if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
		return;
	}

	if ( ! empty( $postdata['_custom_product_preview_url'] ) ) {
		update_post_meta( $product_id, '_custom_product_preview_url', $postdata['_custom_product_preview_url'] );
	}
}

add_shortcode('lastest-post', 'latest_post');

function latest_post() {
	$recent_posts = wp_get_recent_posts(array(
	        'numberposts' => 2, // Number of recent posts thumbnails to display
	        'post_status' => 'publish' // Show only the published posts
	));
	    ?>
		<div id="text-1" class="widget footer-widget widget_text">
	        <h3 class="widget-title">RECENT POSTS</h3>
	        <div class="textwidget">
	            <ul>
	                <?php 
	                foreach( $recent_posts as $recent ){
			    printf( '<li class="customwidgts"><a href="%1$s">%2$s</a></li>',
			          esc_url( get_permalink( $recent['ID'] ) ),
			          apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
			   );
			}?>
	            </ul>
	        </div>
	        </div>
    <?php 
    
}


// add_action( 'woocommerce_after_shop_loop_item', 'shop_product_sold_count', 11 );
// function shop_product_sold_count() {
// global $product;
// $total_sold = get_post_meta( $product->id, 'total_sales', true );
// if ( $total_sold) echo '
// ' . sprintf( __( 'Total Sold: %s', 'woocommerce' ), $total_sold ) . '

// ';
// }


// add_action( 'woocommerce_single_product_summary', 'wp_product_sold_count', 11 );
// function wp_product_sold_count() {
// global $product;
// $total_sold = get_post_meta( $product->id, 'total_sales', true );
// if ( $total_sold ) echo '
// ' . sprintf( __( 'Total Sold: %s', 'woocommerce' ), $total_sold ) . '

// ';
// }








function cw_change_product_price_display( $price ) {
    // $price .= ' At Each Item Product';
    // return $price;
	global $product;

	$total_sold = get_post_meta( $product->id, 'total_sales', true );
if ( $total_sold ){
	$mm =  '
	' . sprintf( __( '%s Sales', 'woocommerce' ), $total_sold ) . '
	
	';
	return '<div>'.$price.'</div><div class="items-sold">'.$mm.'</div>';
}else{
	return '<div>'.$price.'</div>';
}

  }
  add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );

