<?php

/**
 * Proper way to enqueue scripts and styles.
 */
function wpdocs_theme_name_scripts() {
    
    //wp_enqueue_style( 'style-css', home_url().'/wp-content/plugins/dokan-support/include/Assets/css/style.css', array(), '1.0.0', true );

    wp_enqueue_style('cl-chanimal-styles', plugins_url() . '/Dokan-Product-Import/include/Assets/css/style.css' );

/*wp_enqueue_script('cl-chanimal-js', home_url() . '/wp-content/plugins/dokan-support/include/Assets/js/custom.js' );*/

    wp_enqueue_script( 'custom-js', plugins_url() . '/Dokan-Product-Import/include/Assets/js/custom.js', array(), '1.0.0', true );

    wp_localize_script( 'support', 'dsupport', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

/*================admin css==================*/

add_action('admin_head', 'doakn_admin_css');

function doakn_admin_css() {
    
    wp_enqueue_style('cl-chanimal-styles', plugins_url() . '/Dokan-Product-Import/include/Assets/css/admin.css' );
}


/**
 * Adds a new column to the "My Orders" table in the account.
 *
 * @param string[] $columns the columns in the orders table
 * @return string[] updated columns
 */


 // ADDING COLUMN IN ADMIN FOR ORDER TICKETS

add_action('dokan_before_listing_product', 'dokan_import');

function dokan_import() {

$userid = get_current_user_id();

    ?>
    <style type="text/css">
        


.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #34495E;
  color: #39D2B4;
}

.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}
.js .file-return:not(:empty):before {
  content: "Selected file: ";
  font-style: normal;
  font-weight: normal;
}

    </style>
    <?php
    echo '<div class="input-file-container" style="position: relative !important; width: initial; border: 1px solid #d1d1d1; padding: 15px; margin-bottom: 10px;"><form action="'.plugins_url('/Dokan-Product-Import/include/main/upload.php').'" method="post" enctype="multipart/form-data">
    
         <label class="input-file-trigger" style="display: inline-block; padding: 4px 20px; border-radius: 4px; background: #372927; color: #fff; font-size: 1em; transition: all .4s; cursor: pointer;" for="example-csv file">Select File To Upload:</label>
    
        <input type="file" style="position: absolute !important; top: 0; left: 0; width: 225px; opacity: 0; padding: 14px 0; cursor: pointer;" value="Import" name="fileToUpload" class="input-file" id="fileToUpload" required ="required">
    
        <input type="hidden" value="'.$userid.'" name="userid" >

        <input type="submit" value="Submit" name="submit" class="dokan-btn dokan-btn-theme">
    
</form></div>';




// echo home_url('/wp-content/plugins/dokan-support/include/main/upload.php');




}
 

?>