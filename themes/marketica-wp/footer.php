<?php
/**
 * Footer
 */
$allowed_html = array(
	'a' => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'p' => array(),
);
?>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  jQuery('.add_to_cart_button').on('click',function(){
    var currentcartcount = parseInt(jQuery('.cart_value_mini span.misha-cart').text());
    var newcount = currentcartcount + 1;
    var element = jQuery(this);
    jQuery('.cart_value_mini span.misha-cart').text(newcount);
    jQuery(this).parent().parent().parent().append('<span class="added_to_cart">Added to cart !</span>');
    setTimeout(function() { 
      jQuery('span.added_to_cart').remove();
    }, 1000);
  });


  function csaleprice(){
       jQuery(".dokan-product-sales-price").on('focusout',function(){
        var sp=parseInt(jQuery(this).val());
        var rp=parseInt(jQuery(".dokan-product-regular-price").val());
        console.log("sp_:"+sp);
        console.log("rp_:"+rp);
        if (sp > rp) {
            console.log("Discounted Price is greater then regular price: " + sp);
            alert("Please enter a value less than the regular price.");
            jQuery("#_sale_price").val("");
        }
      });
  }

   function cregularprice(){
       jQuery(".dokan-product-regular-price").on('focusout',function(){
    var sp=parseInt(jQuery(".dokan-product-sales-price").val());
    var rp=parseInt(jQuery(this).val());
    console.log("sp_:"+sp);
    console.log("rp_:"+rp);
    if (sp > rp) {
        console.log("Discounted Price is greater then discounted  price: " + sp);
        alert("Please enter a value more than the discounted  price.");
        jQuery("#_sale_price").val("");
    }
  }); 
  }

function saleprice(){
   jQuery(".dokan-product-sales-price").on('focusout',function(){
    var sp=parseInt(jQuery(this).val());
    var rp=parseInt(jQuery(".dokan-product-regular-price").val());
    console.log("sp_:"+sp);
    console.log("rp_:"+rp);
    if (sp > rp) {
        console.log("Discounted Price is greater then regular price: " + sp);
        alert("Please enter a value less than the regular price.");
        jQuery("#_sale_price").val("");
    }
  });

  jQuery(".dokan-product-regular-price").on('focusout',function(){
    var sp=parseInt(jQuery(".dokan-product-sales-price").val());
    var rp=parseInt(jQuery(this).val());
    console.log("sp_:"+sp);
    console.log("rp_:"+rp);
    if (sp > rp) {
        console.log("Discounted Price is greater then discounted  price: " + sp);
        alert("Please enter a value more than the discounted  price.");
        jQuery("#_sale_price").val("");
    }
  }); 
}
jQuery(document).ready(function(){
  saleprice();
  jQuery('#_stock_status').on('change', function() {
    var stockstatus =  this.value ;
    var checked = jQuery("input[id=_manage_stock]:checked").length;
    var stock=parseInt(jQuery("input[name=_stock]").val());

    console.log('checked:'+ checked);
    console.log('stockstatus:'+ stockstatus);
    if (checked == true && stockstatus == 'instock' && stock < 1) {
        console.log('enter');
        console.log('stock:'+stock);
        //message("Please enter in Stock quantity greater then zero.");
        document.onload = setTimeout(function () { alert('Please uncheck Enable product stock managementand or enter in Stock quantity greater then zero.'); }, 750);
    }
  });

  jQuery('input[name="_stock"]').on('focusout',function(){
    if(isNaN(jQuery(this).val()) || jQuery(this).val() == ""){
        jQuery(this).val(0);
    }
  });

  jQuery('input[name="dokan_update_product"]').on('click',function(e){
    
    var checked = jQuery("input[id=_manage_stock]:checked").length;
    var stock=parseInt(jQuery("input[name=_stock]").val());
   
    if (checked == true && stock < 1 || checked == true && stock == null || checked == true && stock == "" || checked == true && stock == "NaN") {
        alert('Please uncheck Enable product stock managementand or enter in Stock quantity greater then zero.');
        e.preventDefault();
    }
  });

  //jQuery("input[name=_stock]").on('change', function() { console.log('focusout'); });

  jQuery("input[name=_stock]").focusout(function(){
    var checked = jQuery("input[id=_manage_stock]:checked").length;
    var stock=parseInt(jQuery("input[name=_stock]").val());
    var stockstatus = jQuery( "#_stock_status option:selected" ).val();

    if (checked == true && stockstatus == 'instock' && stock < 1) {
        console.log('enter2');
        console.log('stock:'+stock);
        alert("Please uncheck Enable product stock managementand or enter in Stock quantity greater then zero.");
    }
  });

  jQuery('.cb-select-items').on('click',function(){
      if(jQuery('.cb-select-items:checked').length == jQuery('.cb-select-items').length){
          jQuery('#cb-select-all').prop('checked',true);
      }else{
          jQuery('#cb-select-all').prop('checked',false);
      }
  });
    
});


jQuery(function() {
  jQuery("#allsellproduct").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
        }
      },
      {
        breakpoint: 300,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});
    jQuery("#allsellproduct").on('afterChange', function(event, slick, currentSlide) {
  if (slick.currentSlide >= slick.slideCount - slick.options.slidesToShow) {
   jQuery('#all_product').show();

  }else{
  jQuery('#all_product').hide();    
  }
});


jQuery(function() {
  jQuery("#random").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
        }
      },
      {
        breakpoint: 300,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});
  jQuery("#random").on('afterChange', function(event, slick, currentSlide) {
  if (slick.currentSlide >= slick.slideCount - slick.options.slidesToShow) {
   jQuery('#new_product_listing').show();

  }else{
  jQuery('#new_product_listing').hide();    
  }
});



jQuery(function() {
  jQuery("#bestselling").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
        }
      },
      {
        breakpoint: 300,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});
jQuery("#bestselling").on('afterChange', function(event, slick, currentSlide) {
  if (slick.currentSlide >= slick.slideCount - slick.options.slidesToShow) {
   jQuery('#best_selling').show();

  }else{
  jQuery('#best_selling').hide();    
  }
});

jQuery('.click_in_button').on('click',function(){
  jQuery(this).toggleClass('main');
});



</script>
</div>
<?php do_action( 'tokopress_after_wrapper' ); ?>
<?php if( !of_get_option( 'tokopresss_disable_footer_widget' ) ) : ?>
<?php get_template_part( 'block', 'footer-widget' ); ?>
<?php endif; ?>
<?php if( !of_get_option( 'tokopresss_disable_footer_credit' ) ) : ?>
<?php $footer_text = of_get_option( 'tokopress_footer_text' ); ?>

<div class="footer-credits">
  <div class="container-wrap">
    <div class="copyright">
      <p><?php echo wp_kses( $footer_text, $allowed_html ); /* support qTranslateX */ ?></p>
      <div class="custom_link"><a href="<?php echo $site_url;?>/terms-conditions/">Terms &amp; Conditions</a> <a href="<?php echo $site_url;?>/privacy-policy/">Privacy Policy</a></div>
    </div>
  </div>
</div>
<?php endif; ?>
</div>
<div id="back-top" style="display:block;"><i class="fa fa-angle-up"></i></div>
<div class="sb-slidebar <?php echo ( is_rtl() ? 'sb-right' : 'sb-left' ); ?> sb-style-push"></div>
<?php wp_footer(); ?>
</body></html>