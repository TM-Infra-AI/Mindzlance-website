<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <title>Online marketplace | best online marketplace | mindzlance</title>
    <!-- Global site tag (gtag.js) - Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122335113-1"></script> 
<script> 
window.dataLayer = window.dataLayer || []; 
function gtag(){dataLayer.push(arguments);} 
gtag('js', new Date());

gtag('config', 'UA-122335113-1'); 
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site-container sb-site-container" id="page">

        <?php get_template_part( 'block', 'header' ); ?>

        <?php do_action( 'tokopress_before_wrapper' ); ?>

        <div class="container-wrap">
        <div id="content-wrap" <?php tokopress_content_class(); ?>>