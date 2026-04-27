/*****************Custom JS****************/

jQuery( document ).ready(function() {

	var Cus_order = jQuery('.hid_table').val();
	if(Cus_order == 'Hide'){
		jQuery('.woocommerce-orders-table').hide();
		jQuery('.ticket_chat_cus').show();

	}else{
		jQuery('.woocommerce-orders-table').show();
		jQuery('.ticket_chat_cus').hide();
	}

   jQuery( '.od_tik_but' ).click(function() {
	  	jQuery(this).siblings(".query_form_customer").toggle('slow');
		
	});

   jQuery('.query_form_customer').submit(function(e) {
    
	    e.preventDefault();
	    var data = jQuery(this).serialize();
	    var ajax_url = jQuery('.ajax_url').val();

	    jQuery.ajax({
			url : ajax_url,
			type : 'post',
			data : {
				action : 'post_support_data',
				formData : data
			},
			success : function( response ) {
				if(response == 'True0'){
					jQuery('.ticket-success').show(1000);
					setTimeout(function(){ jQuery('.ticket-success').hide(1000); }, 3000);
					setTimeout(function(){ location.reload();}, 4000);
				}else{
					jQuery('.ticket-fail').show(1000);
					setTimeout(function(){ jQuery('.ticket-fail').hide(1000); }, 3000);
					setTimeout(function(){ location.reload();}, 4000);  
				}
			}
		});
	
	});


});

/*================vender chat==================*/
// Get the modal
var modal_1 = document.getElementById('myModal1');

jQuery(document).ready(function(){
         
            jQuery('.help').click(function() {
               modal_1.style.display = 'block';
               });
            
         });

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
if (span) {
	span.onclick = function() {
	    modal_1.style.display = 'none';
	}
}

function myFunction(id){
	
	var ajax_url = jQuery('.ajax_url').val();
	    jQuery.ajax({
			url : ajax_url,
			type : 'post',
			data : {
				action : 'post_support_chat_get',
				order : id
			},
			success : function( response ) {
				
				//output the response to chatModal
				var response = response.replace('</div>0', '</div>')
                    jQuery("#chatModal").html(response);
			}
		});
}


function mychatsend(){
	//alert('hello');
	var Message = jQuery('.Message').val();
	var orderid = jQuery('.orderid').val();
	var ajax_url = jQuery('.ajax_url').val();
	    jQuery.ajax({
			url : ajax_url,
			type : 'post',
			data : {
				action : 'post_support_chat_send',
				Message : Message,
				orderid : orderid
			},
			success : function( response ) {
				
				//output the response to chatModal
				var response = response.replace('</div>0', '</div>')
                    jQuery("#chatModal").html(response);
			}
		});
}