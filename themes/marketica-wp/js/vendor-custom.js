// alert('hello');
// jQuery('<div id="liveurl" style="display:none;"><div>Live Preview Url</div><div><input type="text"></div></div>').appendTo('#sellerdiv');

jQuery('#product_cat').change(function(){
    var product_cat = jQuery(this).val();
    if (product_cat == '151' || 
    	 product_cat == '107' || 
    	product_cat == '106' || 
    	product_cat ==  '88'  ||
    	product_cat == '105' ||
    	product_cat == '104' ||
    	product_cat == '108' ||
    	product_cat == '103' ||
    	product_cat == '82' ||
    	product_cat == '83' ||
    	product_cat == '279' ||
    	product_cat == '81'){ 
       
       jQuery('#live_wala').css("display","block");
    }else{
        jQuery('#live_wala').css("display","none"); 
    }
    
    
});

jQuery(document).on('change','#product_cat',function(){
    var product_cat = jQuery('#product_cat').val();
    if (product_cat == '151' || 
    	product_cat == '107' || 
    	product_cat == '106' || 
    	product_cat == '88'  ||
    	product_cat == '105' ||
    	product_cat == '104' ||
    	product_cat == '108' ||
    	product_cat == '103' ||
    	product_cat == '82' ||
    	product_cat == '83' ||
    	product_cat == '279' ||
    	product_cat == '81'){ 

        jQuery('#live_wala').css("display","block");
    }else{
        jQuery('#live_wala').css("display","none"); 
    }
    
    
});



jQuery(document).ready(function(){
    var product_cat = jQuery('#product_cat').val();
    if (product_cat == '151' || 
        product_cat == '107' || 
        product_cat == '106' || 
        product_cat == '88'  ||
        product_cat == '105' ||
        product_cat == '104' ||
        product_cat == '108' ||
        product_cat == '103' ||
        product_cat == '82' ||
        product_cat == '83' ||
        product_cat == '279' ||
        product_cat == '81'){ 

        jQuery('#live_wala').css("display","block");
    }else{
        jQuery('#live_wala').css("display","none"); 
    }
    
    
});

// jQuery('#product_cat').on('change', function(){
//     var product_cat = jQuery('#product_cat').val();
//     if (product_cat == '151' || 
//          product_cat == '107' || 
//         product_cat == '106' || 
//         product_cat ==  '88'  ||
//         product_cat == '105' ||
//         product_cat == '104' ||
//         product_cat == '108' ||
//         product_cat == '103' ||
//         product_cat == '82' ||
//         product_cat == '83' ||
//         product_cat == '81'){ 
       
//        jQuery('#live_wala').css("display","block");
//     }else{
//         jQuery('#live_wala').css("display","none"); 
//     }
    
    
// });


