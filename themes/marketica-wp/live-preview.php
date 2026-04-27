<?php

/***
 * Template Name:Live Preview
 * 
 * 
 * 
 * */

 $url = get_live_url($_GET['template']);
 ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');
</style>
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


   
    
    <!--Slider START-->    
    <!--Slider END-->

  <iframe style="width: 100vw;height: 100vh;border: 0;"  src="<?php echo $url; ?>" style="border:0;" allowfullscreen="" loading="lazy" height="100vh"></iframe>



</body>
</html>