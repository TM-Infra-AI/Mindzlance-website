<?php

include('../../../../../wp-load.php');
// print_r($_POST['userid']);
// echo "<br>";


$user_id=(int)$_POST['userid'];
// echo $user_id;

// print_r($_POST);
// echo "<br>";
	
       		echo "<div class='Successfully'>Processing - Please wait</div>";

if (($_FILES["fileToUpload"]["type"] == "text/csv") || ($_FILES["fileToUpload"]["type"] == "application/vnd.ms-excel"))
{
    $handle = fopen($_FILES['fileToUpload']['tmp_name'], "r");

		$i= 0;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       	if ($i >= 2 && $data[3]!="Name" && $data[3]!='') {
		
			// echo "<pre>";
 		// 	print_r ($data[28]);
 		// 	echo "<br>";

	     	$num = count($data);


			$post = array(
			    'post_author' => $user_id,
			    'post_content' => 'Lorem ipsum dolor site amet...',
			    'post_status' => "pending",
			    'post_title' => $data[3],
			    'post_parent' => '',
			    'post_type' => "product",
			    'post_date' => date('Y-m-d H:i:s'),
			);

			//Create post
			$post_id = wp_insert_post( $post);






$getImageFile = pathinfo("$data[28]",PATHINFO_BASENAME);
// Add Featured Image to Post
$image_url        = $data[28]; // Define the image URL here
$image_name       = $getImageFile ;
$upload_dir       = wp_upload_dir(); // Set upload folder
$image_data       = file_get_contents($image_url); // Get image data
$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
$filename         = basename( $unique_file_name ); // Create image file name

// echo "File name"."$filename"."<br>";

// Check folder permission and define file location
if( wp_mkdir_p( $upload_dir['path'] ) ) {
    $file = $upload_dir['path'] . '/' . $filename;
} else {
    $file = $upload_dir['basedir'] . '/' . $filename;
}

// Create the image  file on the server
file_put_contents( $file, $image_data );

// Check image file type
$wp_filetype = wp_check_filetype( $filename, null );

// Set attachment data
$attachment = array(
    'post_mime_type' => $wp_filetype['type'],
    'post_title'     => sanitize_file_name( $filename ),
    'post_content'   => '',
    'post_status'    => 'inherit'
);

// Create the attachment
$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

// Include image.php
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Define attachment metadata
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

// Assign metadata to attachment
wp_update_attachment_metadata( $attach_id, $attach_data );

// And finally assign featured image to post
set_post_thumbnail( $post_id, $attach_id );








			// if($post_id){
			//     $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
			//     add_post_meta($post_id, '_thumbnail_id', $attach_id);
			// }

 		// 	$getImageFile = pathinfo("$data[28]",PATHINFO_BASENAME);
 		// 	echo "<br>";
 		// 	echo $getImageFile;
 		// 	echo "<br>";

   //          $attach_id = wp_insert_attachment( $postData, $getImageFile, $post_id );
   //          require_once( ABSPATH . 'wp-admin/includes/image.php' );

   //          $attach_data = wp_generate_attachment_metadata( $attach_id, $getImageFile );

   //          wp_update_attachment_metadata( $attach_id, $attach_data );

   //          set_post_thumbnail( $post_id, $attach_id );








// if ( isset($_POST['submit']) ) {
//     $upload = wp_upload_bits($_FILES["fileToUpload"]["name"], null, file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
     
//     // $post_id = YOUR_POST_ID; //set post id to which you need to set post thumbnail
//     $filename = $upload['file'];
//     $wp_filetype = wp_check_filetype($filename, null );
//     $attachment = array(
//         'post_mime_type' => $wp_filetype['type'],
//         'post_title' => sanitize_file_name($filename),
//         'post_content' => '',
//         'post_status' => 'inherit'
//     );
//     $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
//     require_once(ABSPATH . 'wp-admin/includes/image.php');
//     $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
//     wp_update_attachment_metadata( $attach_id, $attach_data );
//     set_post_thumbnail( $post_id, $attach_id );
// }


			wp_set_object_terms( $post_id, '3D', 'product_cat' );
			wp_set_object_terms($post_id, 'simple', 'product_type');

			update_post_meta( $post_id, '_visibility', 'visible' );
			update_post_meta( $post_id, '_stock_status', 'instock');
			update_post_meta( $post_id, 'total_sales', '0');
			update_post_meta( $post_id, '_downloadable', 'yes');
			update_post_meta( $post_id, '_virtual', 'yes');
			update_post_meta( $post_id, '_regular_price', $data[24] );
			update_post_meta( $post_id, '_sale_price', $data[23] );
			update_post_meta( $post_id, '_purchase_note', "" );
			update_post_meta( $post_id, '_featured', $data[28] );
			update_post_meta( $post_id, '_weight', "" );
			update_post_meta( $post_id, '_length', "" );
			update_post_meta( $post_id, '_width', "" );
			update_post_meta( $post_id, '_height', "" );
			update_post_meta( $post_id, '_sku', "");
			update_post_meta( $post_id, '_product_attributes', array());
			update_post_meta( $post_id, '_sale_price_dates_from', "" );
			update_post_meta( $post_id, '_sale_price_dates_to', "" );
			update_post_meta( $post_id, '_price', "1" );
			update_post_meta( $post_id, '_sold_individually', "" );
			update_post_meta( $post_id, '_manage_stock', "no" );
			update_post_meta( $post_id, '_backorders', "no" );
			update_post_meta( $post_id, '_stock', "" );

			// file paths will be stored in an array keyed off md5(file path)
			$downdloadArray =array('name'=>"$data[38]", 'file' => $uploadDIR['baseurl']."$data[39]");

			$file_path =md5($uploadDIR['baseurl']."$data[39]");


			$_file_paths[  $file_path  ] = $downdloadArray;
			// grant permission to any newly added files on any existing orders for this product
			// do_action( 'woocommerce_process_product_file_download_paths', $post_id, 0, $downdloadArray );
			update_post_meta( $post_id, '_downloadable_files', $_file_paths);
			update_post_meta( $post_id, '_download_limit', '');
			update_post_meta( $post_id, '_download_expiry', '');
			update_post_meta( $post_id, '_download_type', '');
			update_post_meta( $post_id, '_product_image_gallery', $data[28]);









		}
		$i++;
	}
	// echo $num;
	// echo "<br>";
	// echo $i;


fclose($handle);

// echo dokan_get_navigation_url('products');
echo "<br>";

$dash= home_url('/dashboard/products/');



$message = "CSV File Successfully Import.\\n Please Check List.";
 //  echo "<script type='text/javascript'>alert('$message');</script>";


 // header("Location: ".$dash);

echo "<script>";
echo " alert('CSV File Successfully Import.\\n Please Check List.');      
        window.location.href='".site_url('/dashboard/products/')."';
      </script>";

}else{
	echo "<script>";
	echo " alert('Please Check File Type.\\n Only CSV files are allowed.');      
        window.location.href='".site_url('/dashboard/products/')."';
      </script>";
}




?>