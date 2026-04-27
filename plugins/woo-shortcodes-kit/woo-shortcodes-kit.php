<?php

/**
* Plugin Name: Woo Shortcodes Kit
* Plugin URI: https://disespubli.com/
* Description: Enhance your WooCommerce shop with +60 shortcodes and functions very easy to use! Build your custom account page, customize the shop page or build a new one from scratch, add shortcodes in your menu and get a dynamic menu, add counters with the customer or shop data, modify the "add to cart" button, adapt your shop to the GDPR law, add security in your shop, restrict content and much more!. This plugin not work alone, you need install WooCommerce before.
* Author: Alberto G.
* Version: 1.9.9
* Tested up to: 5.7
* WC requires at least: 4.0
* WC tested up to: 5.3
* Author URI: https://disespubli.com/
* Text Domain: woo-shortcodes-kit
* Domain Path: /languages
* License: GPLv3
* URI: http://www.gnu.org/licenses/gpl-3.0.html

    Woo Shortcodes Kit is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.
 
    Woo Shortcodes Kit is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with Woocommerce Shortcodes Kit. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
  */

    //Let's go!
    
     if ( ! defined( 'ABSPATH' ) ) {
	    exit;
    }
    
    
    //Make sure WooCommerce is active - updated 1.9.6
    
    function woocommerce_wshk_missing_wc_notice() {
    	
    	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Woo Shortcodes Kit requires WooCommerce to be installed and active. You can download %s here.', 'woo-shortcodes-kit' ), '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
    }
    
    
    add_action( 'plugins_loaded', 'woocommerce_wshk_init' );
    function woocommerce_wshk_init() {
        
        if ( ! class_exists( 'WooCommerce' ) ) {
            add_action( 'admin_notices', 'woocommerce_wshk_missing_wc_notice' );
        	return;
        }
    }
    
    
    // Register admin menu
    
    add_action('admin_menu', 'register_woo_shortcodes_kit');
    if(!function_exists('register_woo_shortcodes_kit')):

	function register_woo_shortcodes_kit() {
    	add_submenu_page( 'woocommerce', 'Woo Shortcodes Kit', 'WSHK', 'manage_options', 'woo-shortcodes-kit', 'init_woo_shortcodes_kit_admin_page_html' ); 
	}
	endif;
	
	
	// Load translations
        
    add_action('plugins_loaded', 'wshk_load_textdomain');
    function wshk_load_textdomain() {
        load_plugin_textdomain( 'woo-shortcodes-kit', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
    }

    
	// Add settings link to plugin list page
	
    if(!function_exists('wshk_add_settings_link')):
        
        function wshk_add_settings_link( $links ) {
            $mysettingslink = __('Settings','woo-shortcodes-kit');
            $myratelink = __('Please rate the plugin','woo-shortcodes-kit');
            $myvideolink = __('Learn how work all the functions','woo-shortcodes-kit');
            $settings_link = array('<a href="admin.php?page=woo-shortcodes-kit"'.' title="'.$mysettingslink.'">' . __( 'Settings', 'woo-shortcodes-kit' ) . '</a>'.' | '.'<a href="https://wordpress.org/support/plugin/woo-shortcodes-kit/reviews/#new-post" target="_blank" title="'.$myratelink.'">' . __( 'Please rate the plugin', 'woo-shortcodes-kit' ) . '</a>'.' | '.'<a href="https://disespubli.com/docs/" target="_blank" title="'.$myvideolink.'">' . __( 'Learn how work all the functions', 'woo-shortcodes-kit' ) . '</a>');
            return array_merge( $links, $settings_link );;
        } 
	endif;
	
	
	
	$plugin = plugin_basename( __FILE__ );
	add_filter( "plugin_action_links_$plugin", 'wshk_add_settings_link' );
	

    // Register settings
    
    require plugin_dir_path( __FILE__ ).'settings/wshk-options.php';


    // Define plugin settings page html

	//if(!function_exists('init_woo_shortcodes_kit_admin_page_html')):
    if(!function_exists('init_woo_shortcodes_kit_admin_page_html')){
	function init_woo_shortcodes_kit_admin_page_html() {
   
    // Settings page style
    require plugin_dir_path( __FILE__ ).'settings/wshk-settings-page.php';
    
    ?>

    <!-- HTML START -->

    <!-- page -->
    <div style="width: 90%;max-width:1920px; padding: 10px; margin: 10px;height:auto;">
 
    <!-- Header -->
     <div class="wshkheadertitle" style="width: 100%;background-color: #a46497; border: 1px solid #a46497; border-radius: 13px; padding: 20px;"><h1 class="wshkplutitle"><span style="color: white;">Woo Shortcodes Kit v 1.9.<small>9</small></span><span class="wshkquerys" style="font-size: 12px; color: #c6adc2; float: right;margin-top: 35px;"><?php  echo get_num_queries(); ?> <?php esc_html_e( 'Queries in', 'woo-shortcodes-kit' ); ?> <?php timer_stop(1); ?>  <?php esc_html_e( 'seconds', 'woo-shortcodes-kit' ); ?>
     </span></h1>
     </div>
 
    <!-- Start Options Form -->
 
    <form action="options.php" method="post" id="wshk-sidebar-admin-form">    
     &nbsp;
     <br />
 
    <!-- Navigation tabs -->
 
    <div id="wshk-tab-menu" style="width:90%;">
     
     <a id="wshk-general" style="border: 1px solid white; border-radius: 13px; height: 95px;padding-top: 20px;padding-bottom: 10px; text-align: center;width: 85px;text-transform: uppercase;letter-spacing: 1px;" class="wshk-tab-links active" ><img src="<?php echo  plugins_url( 'images/newsett.png
' , __FILE__ );?> " style="width: 48px; height: 48px; padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Settings', 'woo-shortcodes-kit' ); ?></span></a>
     
     
     <a  id="wshk-news" style="border: 1px solid white; border-radius: 13px; height: 95px;padding-top: 20px;padding-bottom: 10px; text-align: center;width: 85px;text-transform: uppercase;letter-spacing: 1px;"  class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/notification.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;" ;><br /><span style="margin-left: -5px;"><?php esc_html_e( 'News', 'woo-shortcodes-kit' ); ?></span></a>
     

     <a  id="wshk-languages" style="border: 1px solid white; border-radius: 13px; height: 95px;padding-top: 20px;padding-bottom: 10px; text-align: center;width: auto;text-transform: uppercase;letter-spacing: 1px;" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/languageswshk.png
' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Languages', 'woo-shortcodes-kit' ); ?></span></a>
     
     
     <a  id="wshk-recom" style="border: 1px solid white; border-radius: 13px; height: 95px;padding-top: 20px;padding-bottom: 10px; text-align: center;width: 85px;text-transform: uppercase;letter-spacing: 1px;"  class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/recomend.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;" ;><br /><span style="margin-left: -22px;"><?php esc_html_e( 'Recommended', 'woo-shortcodes-kit' ); ?></span></a>
     
     <a  id="wshk-contact" style="border: 1px solid white; border-radius: 13px; height: 95px;padding-top: 20px;padding-bottom: 10px; text-align: center;width: 85px;text-transform: uppercase;letter-spacing: 1px;" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/newcont.png
' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Contact', 'woo-shortcodes-kit' ); ?></span></a>

    </div>
 
 
    <!-- General Setting -->
    
    <div class="wshk-setting" id="flux">
      
    <br />
     
     <!-- Settings tab -->
     
    <div class="first wshk-tab" id="div-wshk-general">
        
        
    <!-- White box start -->
    
    <div style="background-color: white; /*width: 100%;*/ padding: 20px 20px 20px 20px;border: 1px solid white; border-radius: 13px;">
        
    <!-- Settings info box -->
        
    <div style="padding-left: 10px;padding: 20px; color: #a46497;border: 1px solid #a46497; border-radius: 13px;">
             
    <!-- Info box content -->
    
    <table width="100%">
        <tr>
            <td style="width:90%">
                <h2 class="wshkinfoboxtitle"><span style="color:#a46497; font-size: 26px;"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Functions and Shortcodes', 'woo-shortcodes-kit' ); ?></span>
                </h2>
            </td>
            <td>
                <!--<a href="#" target="_blank" style="background-color:#a46497;padding:15px;border-radius:13px;" ><span style="font-size:26px;color:#ffffff;" class="dashicons dashicons-book"> </span> </a>-->
            </td>
        </tr>
    </table>         
    
    <h4 class="wshkinfoboxdesc"><small><span style="color: #808080; font-size: 15px;padding-left: 30px;"><?php esc_html_e( 'Just need make a click in each section to view the functions and shortcodes.', 'woo-shortcodes-kit' ); ?></span></small><br /><small><span style="color: #808080; font-size: 15px;padding-left: 30px;"><?php esc_html_e( 'Enable & configure the functions.', 'woo-shortcodes-kit' ); ?></span></small><small><span style="color: #ccc; font-size: 13px;font-style: italic;"> <?php esc_html_e( '(Some functions use a shortcode to be displayed in the Frontend)', 'woo-shortcodes-kit' ); ?></span></small>
    </h4>
    
    <!-- END Settings info box-->
    
    </div>


    <!-- Sections accordions -->
    
    <div class="pcontainer">
    <ul class="acc">
      
    <!-- NOTE: Each li how a section -->
    
    
    
    
    <!-- Section one - DYNAMIC NAVIGATION MENU -->
    <li>
      
      <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-menu"></span> <?php esc_html_e( 'DYNAMIC NAVIGATION MENU', 'woo-shortcodes-kit' ); ?></h3></div>
      
      <!-- Section one - Content -->
      
      <div class="acc_panel">
          <br /><br />
          

        <!-- Conditional menu -->
        <?php require plugin_dir_path( __FILE__ ).'settings/dynamic-navigation-menu/conditional-menu-setting.php'; ?>
        
        <!-- Shortcodes in menu titles -->
        <?php require plugin_dir_path( __FILE__ ).'settings/dynamic-navigation-menu/shortcodes-in-menu-titles-setting.php'; ?>
        
        <!-- Username in menu title -->
        <?php require plugin_dir_path( __FILE__ ).'settings/dynamic-navigation-menu/username-in-menu-title-setting.php'; ?>
  
      </div>
    </li>
    <!-- END Section one - DYNAMIC NAVIGATION MENU -->  
    
    
  
  
  
    <!-- Section two - CUSTOMIZE THE SHOP PAGE OR BUILD A NEW -->
    <li>
      
      <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-store"></span> <?php esc_html_e( 'CUSTOMIZE THE SHOP PAGE OR BUILD A NEW', 'woo-shortcodes-kit' ); ?></h3></div>
      
      <!-- Section two - Content -->
      
      <div class="acc_panel">
          <br /><br />
          
          
        <!-- Display only products of specifics categories -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/show-only-products-from-specific-cat-setting.php'; ?>
          
        <!-- Exclude products of specifics categories -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/exclude-products-from-specific-cat-setting.php'; ?>
        
        <!-- products per page manager -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/products-per-page-manager-setting.php'; ?>
        
        <!-- Conditional add to cart button for purchased products -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/conditional-add-to-cart-button.php'; ?>
        
        <!-- customize add to cart button by product type -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/change-add-to-cart-button-text-setting.php'; ?>
        
        <!-- Build a new shop page from scratch -->
        <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/build-a-new-shop-page-setting.php'; ?>
        
        </div>
    </li>
    <!--END section two - CUSTOMIZE THE SHOP PAGE OR BUILD A NEW -->
    
    
    
    
     <!-- Section three - BUILD YOUR CUSTOM ACCOUNT PAGE -->
    <li>
      
      <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-buddicons-buddypress-logo"></span> <?php esc_html_e( 'BUILD YOUR CUSTOM ACCOUNT PAGE', 'woo-shortcodes-kit' ); ?></h3></div>
      
      <!-- Section three - Content -->
      
      <div class="acc_panel">
          <br /><br />
          
          <!--<div style="background-color:#f4f1ff;font-size:16px;padding:40px 20px 40px 20px;border:0px solid #a46497;border-radius:3px;color: #a46497;">
              <table width="100%" style="line-height:24px;">
                 <tr>
                     <td>
                         <span class="dashicons dashicons-info"></span> <span><strong><?php esc_html_e( 'Now 15% OFF for WSHK users', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'on Woo Shortcodes Kit PRO or Easy My Account Builder!', 'woo-shortcodes-kit' ); ?><br> <?php esc_html_e( 'Use the Coupon code:', 'woo-shortcodes-kit' ); ?> <span style="font-weight:bolder;font-size:18px;">1MWSHKUS3R15</span><br><small><?php esc_html_e( 'Expire with the next WSHK v.1.9.1 and will be only available for the 25 first users!', 'woo-shortcodes-kit' ); ?></small></span> 
                     </td>
                     <td style="padding:20px 0px 0px 20px;">
                          <a href="https://disespubli.com/meet-the-addons/" target="_blank" style="text-align: center; width: 110px; border: 1px solid #a46497; border-radius: 13px; background-color: #a46497; font-size: 17px; font-weight: bolder; color: white; padding: 15px;display:block;float:right;margin-top:-16px;"><span  style="color:white;"><?php esc_html_e( 'GET ADDONS', 'woo-shortcodes-kit' ); ?></span></a>
                     </td>
                 </tr> 
              </table>
              </div>
          <br><br>-->
          
          
          
           <!-- Orders list shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/orders-list-sht-setting.php'; ?>
           
           <!-- Downloads list shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/downloads-list-sht-setting.php'; ?>
           
           <!-- Billing and shipping addresses shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/billing-and-shipping-addresses-sht-setting.php'; ?>
           
           <!-- Payment methods shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/payment-methods-sht-setting.php'; ?>
           
           <!-- Edit account shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/edit-account-sht-setting.php'; ?>
           
           <!-- dashboard shortcode -->
           <?php //require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/dashboard-sht-setting.php'; ?>
           
           <!-- user gravatar image -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/user-gravatar-image-sht-setting.php'; ?>
           
           <!-- Username shortcode -->  
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/username-sht-setting.php'; ?>
           
           <!-- Logout button with a shortcode-->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/logout-button-sht-setting.php'; ?>
           
           <!-- Login form shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/login-form-sht-setting.php'; ?>
           
           <!-- Customer reviews shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/customer-reviews-sht-setting.php'; ?>
           
           <!-- IP shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/user-ip-sht-setting.php'; ?>
           
           <!-- Name and surname shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/username-and-surname-sht-setting.php'; ?>
           
           <!-- User email shortcode -->
           <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/user-email-sht-setting.php'; ?>
           
      </div>
    </li>
    <!-- END Section three - BUILD YOUR CUSTOM ACCOUNT PAGE -->
    
    
    <!-- Section four - COUNTERS WITH DATA FROM THE SHOP AND USER -->
    <li>
      
      <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-backup"></span> <?php esc_html_e( 'COUNTERS WITH DATA FROM THE SHOP AND USER', 'woo-shortcodes-kit' ); ?></h3></div>
      
      <!-- Section four - Content -->
      
      <div class="acc_panel">
          
          <br /><br />
          
          
          
           <!-- Total shop sales counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/total-shop-sales-counter-setting.php'; ?>
           
           <!-- Total shop sales amount counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/total-shop-sales-amount-counter-setting.php'; ?>
           
           <!-- Total products in the shop counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/total-shop-products-counter-setting.php'; ?>
           
           <!-- Customer purchased products counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/customer-purchased-products-counter-setting.php'; ?>
           
           <!-- Customer total orders counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/customer-total-orders-counter-setting.php'; ?>
           
           <!-- Customer total reviews counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/customer-total-reviews-counter-setting.php'; ?>
           
           <!-- Product Downloads/sales counter -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/product-downloads-sales-counter-setting.php'; ?>
           
           <!-- Product purchases by current logged in user -->
           <?php require plugin_dir_path( __FILE__ ).'settings/counters/product-purchases-by-current-user-setting.php'; ?>
    
      </div>
    </li>
    <!-- END Section four - COUNTERS WITH DATA FROM THE SHOP AND USER -->
    
    
    
    <!-- Section five - ADDITIONALS SHORTCODES -->
    <li>
      
      <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;margin-top: 25px;"><span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'ADDITIONALS SHORTCODES', 'woo-shortcodes-kit' ); ?></h3></div>
      
      <!-- Section five - Content -->
      <div class="acc_panel">
          
          <br /><br />
          
          
           <!-- Customer purchased products loop -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/customer-purchased-products-loop-setting.php'; ?>
           
           <!-- Conditional message to the customer -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/conditional-message-setting.php'; ?>
           
           <!-- Display all products reviews where you want -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-all-the-products-reviews-setting.php'; ?>
           
           <!--Display the user total spent according to the order status -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-user-total-spent-setting.php'; ?>
           
           <!--Display the user orders according to the status of the order -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-user-orders-by-status-setting.php'; ?>
           
           <!-- Display the user billing data separately -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-user-billing-data-setting.php'; ?>
           
           <!-- Display the user shipping data separately -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-user-shipping-data-setting.php'; ?>
           
           <!-- Display WooCommerce notices -->
           <?php require plugin_dir_path( __FILE__ ).'settings/additionals-shortcodes/display-wc-notices-setting.php'; ?>
    
      </div>
    </li>
  <!-- END Section five -ADDITIONALS SHORTCODES -->
  
  

  <!-- Section six - RESTRICT CONTENT TO LOGGED AND NON LOGGED IN USERS -->
    <li>
     
       <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-hidden"></span> <?php esc_html_e( 'RESTRICT CONTENT TO LOGGED AND NON LOGGED IN USERS', 'woo-shortcodes-kit' ); ?></h3></div>
       
       <!-- Section six - content -->
       
      <div class="acc_panel">
          
          <br /><br />
         
    
            <!-- Restrict content to users if they are not logged in -->
            <?php require plugin_dir_path( __FILE__ ).'settings/restrict-content/restrict-content-to-nonlogged-in-users-setting.php'; ?>
            
            <!-- Restrict content to users if they are logged in -->
            <?php require plugin_dir_path( __FILE__ ).'settings/restrict-content/restrict-content-to-logged-in-users-setting.php'; ?>
    
        </div>
    </li>
    <!-- END section six -  RESTRICT CONTENT --> 
    
    
    <!-- Section seven - WOOCOMMERCE ADDITIONAL SETTINGS -->
    <li>
     
       <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-admin-generic"></span> <?php esc_html_e( 'WOOCOMMERCE ADDITIONAL SETTINGS', 'woo-shortcodes-kit' ); ?></h3></div>
       
       <!-- Section seven - content -->
       
      <div class="acc_panel">
          
          <br /><br />
          
            <!-- autocomplete orders -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/autocomplete-virtual-orders-setting.php'; ?>
            
            <!-- custom thank you page -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/custom-thank-you-pages-setting.php'; ?>
            
            <!-- Disable the new WooCommerce dashboard -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/disable-new-wc-dashboard-setting.php'; ?>
            
            <!-- Add name and surname fields in WC register form -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/add-name-and-surname-fields-wc-register-form-setting.php'; ?>
            
            <!-- Skip cart and go straight to checkout page -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/skip-cart-and-goto-checkout-setting.php'; ?>
            
            <!-- Display product thumbnail in email order -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/product-thumbnail-in-email-order-setting.php'; ?>
            
            <!-- Product image in the order details -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/product-image-in-order-details-setting.php'; ?>
            
            <!-- Limit the number of products in the cart -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/limit-the-number-of-products-inthe-cart-setting.php'; ?>
            
            <!-- Change the return to shop button text -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/change-the-return-toshop-button-setting.php'; ?>
            
            <!-- Display saving price and percentages on sale products -->
        <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/saving-price-and-percentages-onsale-products.php'; ?>
        
            <!-- Display max or min price on variable products -->
        <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/display-max-or-min-price-on-variableproducts-setting.php'; ?>
    
      </div>
    </li>
    <!-- END Section seven - WOOCOMMERCE ADDITIONAL SETTINGS -->
  
    
    <!-- Section eight - ADAPT YOUR SHOP TO THE GDPR LAW-->
    <li>
     
       <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-thumbs-up"></span> <?php esc_html_e( 'ADAPT YOUR SHOP TO THE GDPR LAW', 'woo-shortcodes-kit' ); ?></h3></div>
       
       <!-- Section eight - Content -->
       
      <div class="acc_panel">
          
          <br /><br />
          
             <!-- GPRD law global settings --> 
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/global-settings-setting.php'; ?>
    
             <!-- GPRD law on blog comments -->
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/blog-comments-setting.php'; ?>
    
             <!-- GPRD law on checkout page -->
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/checkout-page-setting.php'; ?>
    
             <!-- GPRD law on WooCommerce reviews -->
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-reviews-setting.php'; ?>
    
             <!-- GPRD law in register form-->
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-register-form-setting.php'; ?>
    
             <!-- add custom terms and conditions -->   
             <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-terms-conditions-setting.php'; ?>
    
      </div>
    </li>
    <!--END Section eight - ADAPT YOUR SHOP TO THE GDPR LAW -->
    
    
    
      <!-- Section nine - ADD SECURITY TO YOUR SHOP -->
    <li>
     
       <div class="acc_ctrl" style="background-color: #fbfbfb; padding: 10px;"><h3 style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-shield"></span> <?php esc_html_e( 'ADD SECURITY TO YOUR SHOP', 'woo-shortcodes-kit' ); ?></h3></div>
       
       <!-- Section nine - Content -->
       
      <div class="acc_panel">
          
          <br /><br />
          
          <!-- BLOCK WP-ADMIN and WP-LOGIN ACCESS -->
          <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/block-wpadmin-login-setting.php'; ?>
    
          <!-- BLOCK ADMIN TOP BAR -->
          <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/block-admintopbar-setting.php'; ?>
          
          <!-- HIDE LOGIN ERROR MESSAGE -->
          <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/hide-login-errors-setting.php'; ?>
   
          <!--NO SEND USERS -->
          <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/wp-no-send-users-setting.php'; ?>

          <!--SECURITY HEADERS -->
          <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/security-headers-setting.php'; ?>
      
        </div>
    </li>
   <!-- END Section nine - ADD SECURITY TO YOUR SHOP --> 
    

    <!-- PRO Sections - EMAB & WSHK PRO-->
    <!--<li>-->
    
    <?php
    // Since 1.6.6
    //CHECK IF EASY MY ACCOUNT BUILDER EXISTS
    
    if ( in_array( 'easy-myaccount-builder/easy-myaccount-builder-for-wshk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       include( ABSPATH . '/wp-content/plugins/easy-myaccount-builder/emab-settings.php' );
        }
        
    //Since 1.6.7
    //CHECK IF CUSTOM REDIRECTIONS EXISTS
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/cusre-settings.php' );
        }
    
    ?>
        <!--</div>
    </li>-->
    
    
    <!-- END Section accordions -->
      </ul>
    </div>
    
        
    <!--END White box-->
    </div>
    <br /><br /><br /><br />
    
    
        
        <center><button class="probando" type="submit" id="toggle" onclick="click()"><img id="btnimg" class="wshksetimg" src="<?php echo  plugins_url( 'images/wshk-save-settings.png' , __FILE__ );?>" ;> <span id="btntx" class="wshksettext"><?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?></span></button></center>
        <button title="<?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?>" class="probandote" type="submit" id="toggle" onclick="click()"><img id="btnimgo" class="wshksetimgo" src="<?php echo  plugins_url( 'images/wshk-save-settings.png' , __FILE__ );?>" ;> <span id="btntx" class="wshksettexto"><?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?></span></button>
    <?php settings_fields('wshk_options');?>
    
    </form>
    <!-- End Options Form -->
    
    <!-- Floating save settings button -->
    <script>
        
    var $window = $(window),
    $document = $(document),
    button = $('.probando');
    buttn = $('.probandote');

    button.css({
        opacity: 1
    });
    
    buttn.css({
        opacity: 1
    });

    $window.on('scroll', function () {
        if (($window.scrollTop() + $window.height()) == $document.height()) {
            
            button.stop(true).animate({
                opacity: 1
            }, 250);
            
            buttn.stop(true).animate({
                opacity: 0
            }, 250);
            
        } else {
            
            button.stop(true).animate({
                opacity: 0
            }, 250);
            
            buttn.stop(true).animate({
                opacity: 1
            }, 250);
            
        }
    });
        
    </script>
    <!-- END Floating save settings button -->
   
   </div>
   <!-- END Settings tab -->
   
   
   <!-- News - from v.1.8.0 -->
   <?php require plugin_dir_path( __FILE__ ).'sections/news-section.php'; ?>
   
   <!-- Languages -->
    <?php require plugin_dir_path( __FILE__ ).'sections/languages-section.php'; ?>
    
    <!-- recomends - from v.1.8.7 -->
   <?php require plugin_dir_path( __FILE__ ).'sections/recommends-section.php'; ?>
    
    <!-- Contact -->
    <?php require plugin_dir_path( __FILE__ ).'sections/contact-section.php'; ?>
    <?php
    
    	}
    //endif;
    //END - Define plugin settings page html
    }

    /*Hide admin notices on WSHK page*/
    if (isset($_GET['page']) && $_GET['page'] == 'woo-shortcodes-kit') {
    function hide_notices_dashboard() {
        global $wp_filter;
     
        if (is_network_admin() and isset($wp_filter["network_admin_notices"])) {
            unset($wp_filter['network_admin_notices']);
        } elseif(is_user_admin() and isset($wp_filter["user_admin_notices"])) {
            unset($wp_filter['user_admin_notices']);
        } else {
            if(isset($wp_filter["admin_notices"])) {
                unset($wp_filter['admin_notices']);
            }
        }
     
        if (isset($wp_filter["all_admin_notices"])) {
            unset($wp_filter['all_admin_notices']);
        }
    }
    add_action( 'admin_init', 'hide_notices_dashboard' );
    }

    /** add js into admin footer */
    if (isset($_GET['page']) && $_GET['page'] == 'woo-shortcodes-kit') {
       add_action('admin_footer','init_wshk_admin_scripts');
    }
    
    // Tabs style and script
    if(!function_exists('init_wshk_admin_scripts')):
    function init_wshk_admin_scripts()
    {
    wp_register_style( 'wshk_admin_style', plugins_url( 'css/wshk-admin-min.css',__FILE__ ) );
    wp_enqueue_style( 'wshk_admin_style' );
    
    echo $script='<script type="text/javascript">
        /* Protect WP-Admin js for admin */
        jQuery(document).ready(function(){
            jQuery(".wshk-tab").hide();
            jQuery("#div-wshk-general").show();
            jQuery(".wshk-tab-links").click(function(){
            var divid=jQuery(this).attr("id");
            jQuery(".wshk-tab-links").removeClass("active");
            jQuery(".wshk-tab").hide();
            jQuery("#"+divid).addClass("active");
            jQuery("#div-"+divid).fadeIn();
            });
            })
        </script>';
    }
    endif;

    /** Include class file **/
    
    //Updated v.1.7.8
    require plugin_dir_path( __FILE__ ).'wshk-class.php';
?>