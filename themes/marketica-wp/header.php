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
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link href="http://fonts.cdnfonts.com/css/slick" rel="stylesheet">


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122335113-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-122335113-1');
</script>
<?php if(get_the_ID() == 2547){
        ?>
<title>Online marketplace | best online marketplace | mindzlance</title>
<?php    
        }  
        ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site-container sb-site-container" id="page">
    <?php get_template_part( 'block', 'header' ); ?>
    <?php do_action( 'tokopress_before_wrapper' ); ?>
    
    <!--Slider START-->    
    <?php if ( is_front_page() ) { ?>
    <div class="banner_slider">
      <?php echo do_shortcode('[rev_slider alias="homePage1"]'); ?>
    </div>
    <?php } ?>
    <!--Slider END-->
    
    <div class="container-wrap">
    <div id="content-wrap" <?php tokopress_content_class(); ?>>
