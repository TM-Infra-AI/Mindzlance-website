<?php
/**
 * Marketica Child Theme functions and definitions.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'after_setup_theme', 'tokopress_load_childtheme_languages', 5 );
function tokopress_load_childtheme_languages() {
	/* this theme supports localization */
	load_child_theme_textdomain( 'tokopress', get_stylesheet_directory() . '/languages' );
	
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'child-style-theme', get_stylesheet_directory_uri().'/style.css' );
}

/* Please add your custom functions code below this line. */
 

function my_theme_enqueue_styles() {

    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '', 'all');

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles',100 );


add_action( 'woocommerce_single_product_summary', 'product_sold_count', 11 );
 
function product_sold_count() {
	global $product;
	$units_sold = get_post_meta( $product->get_id(), 'total_sales', true );
	if ( $units_sold ) echo '<p>' . sprintf( __( 'Units Sold: %s', 'woocommerce' ), $units_sold ) . '</p>';
}


/**
 * Add a new column header in dashboard table
 *
 * @param array $args dashboard query arguments
 * @return void
 */
function customfield( $current_user, $profile_info ) {
        $seller_info = isset( $profile_info['seller_info'] ) ? $profile_info['seller_info'] : '';
      
        ?>      
        <div class="gregcustom dokan-form-group">
            <label class="dokan-w3 dokan-control-label" for="setting_address"><?php _e( 'Short Description', 'dokan' ); ?></label>
            <div class="dokan-w5">
                <textarea rows="4" cols="50" class="dokan-form-control input-md valid" name="seller_info" id="custom_seller_info" value="<?php echo $seller_info; ?>"><?php echo $seller_info; ?></textarea>
                
            </div>
        </div>  

        <?php
}
add_filter( 'dokan_settings_after_banner', 'customfield', 10, 2);
/**
 * Save the extra fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function save_extra_custom_fields( $store_id, $dokan_settings ) {
        if ( isset( $_POST['seller_info'] ) ) {
                $dokan_settings['seller_info'] = $_POST['seller_info'];
        }

        update_user_meta( $store_id, 'dokan_profile_settings', $dokan_settings );
}

add_action( 'dokan_store_profile_saved', 'save_extra_custom_fields', 10, 2 );


add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue() {
     wp_enqueue_script('like_post', 'https://mindzlance.com/wp-content/themes/marketica-wp-child/js/post-like.js', '1.0', 1 );
     wp_localize_script('like_post', 'ajax_var', array(
     'url' => admin_url('admin-ajax.php'),
     'nonce' => wp_create_nonce('ajaxnonce')
     ));
}
 
add_action( 'wp_ajax_my_post_like', 'my_post_like' );
add_action( 'wp_ajax_nopriv_my_post_like', 'my_post_like' );

function my_post_like(){
    $for = $_POST['product_name'];  
    $email = $_POST['seller_email'];
    echo  $email;
}

function show_message_function( $comment_ID, $comment_approved ) {
    global $wpdb;
    
    $id = $wpdb->get_results("SELECT `comment_post_id` FROM `mr_comments` WHERE `comment_ID` = '". $comment_ID."'");
   
    $link = get_permalink($id[0]->comment_post_id);
    $qustion = get_comment_text( $comment_ID );
    $current_user = wp_get_current_user();
    $userlogin = $current_user->user_login;
    $to = 'sales@marketingmindz.com';
    $subject = 'Mindzlance Update';
    $body = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }
      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */
      .body {
        background-color: #f6f6f6;
        width: 100%; }
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }
      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }
      .wrapper {
        box-sizing: border-box;
        padding: 20px; }
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }
      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }
      a {
        color: #3498db;
        text-decoration: underline; }
      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }
      .btn-primary table td {
        background-color: #3498db; }
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }
      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }
      .first {
        margin-top: 0; }
      .align-center {
        text-align: center; }
      .align-right {
        text-align: right; }
      .align-left {
        text-align: left; }
      .clear {
        clear: both; }
      .mt0 {
        margin-top: 0; }
      .mb0 {
        margin-bottom: 0; }
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }
      .powered-by a {
        text-decoration: none; }
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }
      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}
      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }
    </style>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Hello Admin,</p>
                        <p>'.$userlogin.' add a new  "Ask a Question"</p>
                        <p>'.$qustion.'</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="'.$link.'" target="_blank">Go to Mindzlance</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <p>by mindzlance</p>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail( $to, $subject, $body, $headers );    
}
add_action( 'comment_post', 'show_message_function', 10, 2 );

