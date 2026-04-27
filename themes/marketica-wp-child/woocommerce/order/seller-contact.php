<?php  


$customer_email = $_REQUEST['customer_email'];
$customer_msg = $_REQUEST['customer_msg'];
$customer_subject = $_REQUEST['customer_subject'];
$customer_name = $_REQUEST['customer_name'];
$seller_email = $_REQUEST['seller_email'];
$product_name = $_REQUEST['product_name'];


$admin_email = "sales@marketingmindz.com";


$to = $seller_email;

$subject = $customer_subject;
$message = 'Product Name: '.$product_name;
$message .= 'Message: '.$customer_msg;
$headers = "From: " . strip_tags($customer_email) . "\r\n";
$headers .= "Reply-To: ". strip_tags($customer_email) . "\r\n";
$headers .= "CC: ".$admin_email."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


if(!empty($seller_email)){
    $success = mail($to,$subject,$message,$headers);
	
	if ($success == '1') {
		echo "success";
	}else{
		echo "error";
	}
}

?>
