<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dsupport {
    
    // function to create the DB / Options / Defaults                   
    public static function dsupportTable() {
        global $wpdb;
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $nym_order_table = $wpdb->prefix . 'cust_order_ticket';
            $cus_chat_table = $wpdb->prefix . 'cust_ticket_chat';
            // create the stock_table metabox database table
       
            $sql = "CREATE TABLE $nym_order_table (
                `ticket_id` int(50) NOT NULL AUTO_INCREMENT,
                `ticket_order_id` int(50) NOT NULL,
                `ticket_title` varchar(255) NOT NULL,
                `ticket_description` varchar(255) NOT NULL,
                `ticket_status` varchar(255) NOT NULL,
                `ticket_date`  TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,            
                PRIMARY KEY  (ticket_id)
            );";
            
            
            dbDelta($sql);

             $sql2 = "CREATE TABLE $cus_chat_table (
                `id` int(50) NOT NULL AUTO_INCREMENT,
                `ticket_order_id` int(50) NOT NULL,
                `customer_id` int(50) NOT NULL,
                `messages` varchar(255) NOT NULL,
                `date`  TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,                            
                PRIMARY KEY  (id)
            );";
            
            dbDelta($sql2);
       

    }



    public static function remove_dsupportTable() {
        global $wpdb;
        
        $nym_order_table = $wpdb->prefix . 'cust_order_ticket';
        $sql = "DROP TABLE IF EXISTS $nym_order_table;";
        $wpdb->query($sql);

        $nym_order_table2 = $wpdb->prefix . 'cust_ticket_chat';
        $sql2 = "DROP TABLE IF EXISTS $nym_order_table2;";
        $wpdb->query($sql2);

    } 
}/*class ends here*/

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

?>
