<?php
   /*
   Plugin Name: Dokan Product Import
   Plugin URI: http://marketingmindz.com/
   description: This is not a simple plugin, it is very important for customers and help to any customer for provide support.
   Version: 1.0
   Author: Marketingmindz   
   */

/*===================================================*/

/*Plugin activate when activate parent plugin*/

add_action( 'admin_init', 'child_plugin_has_parent_plugin' );
function child_plugin_has_parent_plugin() {

    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'child_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

    if ( is_admin() && current_user_can( 'activate_plugins' )  &&  !is_plugin_active( 'dokan-lite/dokan.php' )) {
        add_action( 'admin_notices', 'new_child_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function child_plugin_notice(){
    ?><div class="error"><p>Sorry, but Dokan support requires the <a href="https://wordpress.org/plugins/woocommerce/" >Woo-commerce plugin</a> to be installed and active.</p></div><?php
}
function new_child_plugin_notice(){
    ?><div class="error"><p>Sorry, but Dokan support requires the  <a href="#">Dokan lite plugin</a> to be installed and active.</p></div><?php
}

/*===================================================*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


include('include/main/function.php');
include('include/main/dokan.php');	
  

/*  create plugin object. */
new Dsupport;

Class CJSM{

  public static function install() {
    Dsupport::dsupportTable();
    //Dsupport::assets();
  }

  public static function remove() {
    Dsupport::remove_dsupportTable();
  } 
}

/*Activation hook*/
register_activation_hook( __FILE__, array('CJSM', 'install') );

/* Deactivation hook*/
register_uninstall_hook( __FILE__, array('CJSM','remove') );

/*===================================================*/











?>