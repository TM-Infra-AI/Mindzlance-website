// alert('hello');
// jQuery('<div id="liveurl" style="display:none;"><div>Live Preview Url</div><div><input type="text"></div></div>').appendTo('#sellerdiv');
jQuery('input[type="checkbox"]').click(function(){
    
    if (jQuery('#in-product_cat-151').prop('checked')==true || 
    	jQuery('#in-product_cat-107').prop('checked')==true || 
    	jQuery('#in-product_cat-106').prop('checked')==true || 
    	jQuery('#in-product_cat-88').prop('checked')==true  ||
    	jQuery('#in-product_cat-105').prop('checked')==true ||
    	jQuery('#in-product_cat-104').prop('checked')==true ||
    	jQuery('#in-product_cat-108').prop('checked')==true ||
    	jQuery('#in-product_cat-103').prop('checked')==true ||
    	jQuery('#in-product_cat-82').prop('checked')==true ||
    	jQuery('#in-product_cat-83').prop('checked')==true ||
    	jQuery('#in-product_cat-279').prop('checked')==true ||
    	jQuery('#in-product_cat-81').prop('checked')==true){ 
        //do something
        // a = 1;
        // jQuery('<div>Live Preview Url</div><div><input type="text"></div>').appendTo('#normal-sortables');
        jQuery('.product_custom_field').css("display","block");
    }else{
        jQuery('.product_custom_field').css("display","none"); 
    }
    
    
});

jQuery(document).ready(function(){
    
    if (jQuery('#in-product_cat-151').prop('checked')==true || 
    	jQuery('#in-product_cat-107').prop('checked')==true || 
    	jQuery('#in-product_cat-106').prop('checked')==true || 
    	jQuery('#in-product_cat-88').prop('checked')==true  ||
    	jQuery('#in-product_cat-105').prop('checked')==true ||
    	jQuery('#in-product_cat-104').prop('checked')==true ||
    	jQuery('#in-product_cat-108').prop('checked')==true ||
    	jQuery('#in-product_cat-103').prop('checked')==true ||
    	jQuery('#in-product_cat-82').prop('checked')==true ||
    	jQuery('#in-product_cat-83').prop('checked')==true ||
    	jQuery('#in-product_cat-279').prop('checked')==true ||
    	jQuery('#in-product_cat-81').prop('checked')==true){ 
        //do something
        // a = 1;
        // jQuery('<div>Live Preview Url</div><div><input type="text"></div>').appendTo('#normal-sortables');
        jQuery('.product_custom_field').css("display","block");
    }else{
        jQuery('.product_custom_field').css("display","none"); 
    }
    
    
});


