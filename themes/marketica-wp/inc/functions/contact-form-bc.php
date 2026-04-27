<?php
/**
 * Functions to handle contact form
 */

/**
 * Get contact form.
 */
function tokopress_get_contact_form( $args = array() ){
	global $wp_query;

	$defaults = array(
		'email' => "sales@mindzlance.com".", "."romil@marketingmindz.com",
		'title' => __( 'Leave a message', 'tokopress' ),
		'subject' => __( 'Message via the contact form', 'tokopress' ),
		'sendcopy' => 'yes',
		'question' => '',
		'answer' => '',
		'button_text' => __( 'Submit', 'tokopress' )
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args );


// "sales@mindzlance.com,romil@marketingmindz.com"

	if( trim($email) == '' )
		//$email = get_bloginfo('admin_email');
	$email = "sales@mindzlance.com".", "."romil@marketingmindz.com";

	// Get the site domain and get rid of www.
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}

	$email_server = 'noreply@'.$sitename;

	$html = '';
	$error_messages = array();
	$notification = false;
	$email_sent = false;
	if ( ( count( $_POST ) > 3 ) && isset( $_POST['submitted'] ) ) {
		if ( isset ( $_POST['checking'] ) && $_POST['checking'] != '' )
			$error_messages['checking'] = 1;
		if ( isset ( $_POST['contact-name'] ) && $_POST['contact-name'] != '' )
			$message_name = $_POST['contact-name'];
		else
			$error_messages['contact-name'] = __( 'Please enter your name', 'tokopress' );
		if ( isset ( $_POST['contact-email'] ) && $_POST['contact-email'] != '' && is_email( $_POST['contact-email'] ) )
			$message_email = $_POST['contact-email'];
		else
			$error_messages['contact-email'] = __( 'Please enter your email address (and please make sure it\'s valid)', 'tokopress' );
		if ( isset ( $_POST['contact-message'] ) && $_POST['contact-message'] != '' )
			$message_body = "Your Message: ".$_POST['contact-message'] . "\n\r\n\r";
		else
			$error_messages['contact-message'] = __( 'Please enter your message', 'tokopress' );
		if ( $question && $answer ) {
			if ( isset ( $_POST['contact-quiz'] ) && $_POST['contact-quiz'] != '' ) {
				$message_quiz = $_POST['contact-quiz'];
				if ( esc_attr( $message_quiz ) != esc_attr( $answer ) )
					$error_messages['contact-quiz'] = __( 'Your answer was wrong!', 'tokopress' );
			}
			else {
				$error_messages['contact-quiz'] = __( 'Please enter your answer', 'tokopress' );
			}
		}
		if ( count( $error_messages ) ) {
			$notification = '<p class="alert alert-danger">' . __( 'There were one or more errors while submitting the form.', 'tokopress' ) . '</p>';
		}
		else {
			$ipaddress = '';
			if ( isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] )
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] )
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if( isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'] )
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if( isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'] )
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if( isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'] )
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] )
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$message_body = __( 'Your Email:', 'tokopress' ) . ' '. $message_email . "\r\n\r\n" . $message_body;
			$message_body = __( 'Hi', 'tokopress' ) . ' '. $message_name . ",\r\n" . $message_body;
            

			// $message_body = $message_body."\r\n\r\n".__( 'IP Address:', 'tokopress' ).$ipaddress . "\r\n" . __( 'User Agent:', 'tokopress' ).$useragent;

			$headers = array();
			$headers[] = 'From: '.$message_name.' <' . $email_server . '>';
			$headers[] = 'Reply-To: '.$message_email;
			$email_sent = wp_mail($email, $subject, $message_body, $headers);

			if ( $sendcopy == 'yes' ) {
				$get_msg = $_POST['contact-message'];
				// Send a copy of the e-mail to the sender, if specified.
				if ( isset( $_POST['send-copy'] ) && $_POST['send-copy'] == 'true' ) {
					$subject = __( '[COPY]', 'tokopress' ) . ' ' . $subject;
					$headers = array();
					$headers[] = 'From: '.get_bloginfo('name').' <' . $email_server . '>';
					$headers[] = 'Reply-To: '.$email;
					$headers[] = "MIME-Version: 1.0" . "\r\n";
					$headers[] = "Content-type:text/html;charset=UTF-8" . "\r\n";
					$email_body = '
						<!doctype html>
						<html>
						  <head>
						   						    <title></title>
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
						            <span class="preheader">Request for reset password</span>
						            <table class="main">
						              <!-- START MAIN CONTENT AREA -->
						              <tr>
						                <td class="wrapper">
						                  <table border="0" cellpadding="0" cellspacing="0">
						                    <tr style="text-align: center">
						                      <td><img width="200" style="text-align: center" src = https://mindzlance.com/wp-content/uploads/2018/06/logo-new_thumb.jpg></td>
						                    </tr>
						                    <tr>                      
						                      <td>                        
						                        <p>Hello '.$message_name.',<br>
						                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
						                          <tbody>
						                            <tr>
						                             
						                            </tr>
						                          </tbody>
						                        </table>
						                        
						                        <p>Your message : '.$get_msg.'	</p>
						                        <p>Your email : '.$message_email.'</p><br />
						                        <b>Thank you for your enquiry we will get back to you as soon as possible !</b>
						                      </td>
						                    </tr>
						                  </table>
						                </td>
						              </tr>
						            <!-- END MAIN CONTENT AREA -->
						            </table>
						            <!-- START FOOTER -->
						            <div class="footer">
						              <table border="0" cellpadding="0" cellspacing="0">
						                <tr>
						                  <td class="content-block">
						                    <span class="apple-link">&copy; 2018 | Mindzlance | All right reserved</span>
						                  </td>
						                </tr>
						              </table>
						            </div>
						            <!-- END FOOTER -->
						          <!-- END CENTERED WHITE CONTAINER -->
						          </div>
						        </td>
						        <td>&nbsp;</td>
						      </tr>
						    </table>
						  </body>
						</html>';
                    $email_sent = wp_mail($message_email, $subject, $email_body, $headers);
				}
			}

			if( $email_sent == true ) {
				$notification = do_shortcode( '<p class="alert alert-success">' . __( 'Your message was successfully sent.', 'tokopress' ) . '</p>' );
			}
			else {
				$notification = '<p class="alert alert-danger">' . __( 'There were technical error while submitting the form. Sorry for the inconvenience.', 'tokopress' ) . '<p>';
			}

		}
	}

	if( $email_sent == true ) {
		return '<div class="contact-form">'.$notification.'</div>';
	}

	$html .= '<div class="contact-form">' . "\n";
	$html .= '<h2>' . $title . '</h2>' . "\n";
	$html .= $notification;
	if ( $email == '' ) {
		$html .= do_shortcode( '<p class="alert alert-danger">' . __( 'E-mail has not been setup properly. Please add your contact e-mail!', 'tokopress' ) . '</p>' );
	}
	else {
		$html .= '<form action="" id="contact-form" method="post">' . "\n";
		$html .= '<fieldset class="forms">' . "\n";
		$contact_name = '';
		if( isset( $_POST['contact-name'] ) ) { $contact_name = $_POST['contact-name']; }
		$contact_email = '';
		if( isset( $_POST['contact-email'] ) ) { $contact_email = $_POST['contact-email']; }
		$contact_message = '';
		if( isset( $_POST['contact-message'] ) ) { $contact_message = stripslashes( $_POST['contact-message'] ); }

		$html .= '<div class="left-column">' . "\n";
		$html .= '<p class="field-contact-name">' . "\n";
		$html .= '<input placeholder="' . __( 'Your Name', 'tokopress' ) . '" type="text" name="contact-name" id="contact-name" value="' . esc_attr( $contact_name ) . '" class="txt requiredField" />' . "\n";
		if( array_key_exists( 'contact-name', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-name'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";

		$html .= '<p class="field-contact-email">' . "\n";
		$html .= '<input placeholder="' . __( 'Your Email', 'tokopress' ) . '" type="text" name="contact-email" id="contact-email" value="' . esc_attr( $contact_email ) . '" class="txt requiredField email" />' . "\n";
		if( array_key_exists( 'contact-email', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-email'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";
		$html .= '</div>' . "\n";

		$html .= '<div class="right-column">' . "\n";
		$html .= '<p class="field-contact-message">' . "\n";
		$html .= '<textarea placeholder="' . __( 'Your Message', 'tokopress' ) . '" name="contact-message" id="contact-message" rows="10" cols="30" class="textarea requiredField">' . esc_textarea( $contact_message ) . '</textarea>' . "\n";
		if( array_key_exists( 'contact-message', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-message'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";
		$html .= '</div>' . "\n";

		if ( $question && $answer ) {
			$html .= '<p class="field-contact-quiz">' . "\n";
			$html .= $question.'<br/>' . "\n";
			$html .= '<input placeholder="' . __( 'Your Answer', 'tokopress' ) . '" type="text" name="contact-quiz" id="contact-quiz" value="" class="txt requiredField quiz" />' . "\n";
			if( array_key_exists( 'contact-quiz', $error_messages ) ) {
				$html .= '<span class="contact-error">' . $error_messages['contact-quiz'] . '</span>' . "\n";
			}
			$html .= '</p>' . "\n";
		}

		if ( $sendcopy == 'yes' ) {
			$send_copy = '';
			if(isset($_POST['send-copy']) && $_POST['send-copy'] == true) {
				$send_copy = ' checked="checked"';
			}
			$html .= '<div class="block-column">' . "\n";
			$html .= '<p class="inline"><input type="checkbox" name="send-copy" id="send-copy" value="true"' . $send_copy . ' />&nbsp;&nbsp;<label for="send-copy">' . __( 'Send a copy of this email to you', 'tokopress' ) . '</label></p>' . "\n";
			$html .= '</div>' . "\n";
		}

		$checking = '';
		if(isset($_POST['checking'])) {
			$checking = $_POST['checking'];
		}

		$html .= '<div class="block-column">' . "\n";
		$html .= '<p class="screen-reader-text"><label for="checking" class="screen-reader-text">' . __( 'If you want to submit this form, do not enter anything in this field', 'tokopress' ) . '</label><input type="text" name="checking" id="checking" class="screen-reader-text" value="' . esc_attr( $checking ) . '" /></p>' . "\n";

		$html .= '<p class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><input id="contactSubmit" class="btn button" type="submit" value="' . $button_text . '" /></p>';
		$html .= '<div>' . "\n";

		$html .= '</fieldset>' . "\n";
		$html .= '</form>' . "\n";

		$html .= '</div><!--/.post .contact-form-->' . "\n";

	}

	return $html;

}

/**
 * Return formatted post meta.
 */
function tokopress_get_post_meta( $meta, $postid = '', $format = '' ) {
	if ( !$postid ) {
		global $post;
		if ( null === $post )
			return false;
		else
			$postid = $post->ID;
	}
	$meta_value = get_post_meta($postid, $meta, true);
	if ( !$meta_value )
		return false;
	$meta_value = wp_kses_stripslashes( wp_kses_decode_entities( $meta_value ) );
	if ( is_ssl() )
		$meta_value = str_replace("http://", "https://", $meta_value);
	if ( !$format )
		return $meta_value;
	else return str_replace("%meta%", $meta_value, $format);
}
