jQuery(document).ready(function ($) {
    var pickerImg1 = $('.wpc_colorpicker_img1');
    var modalBox1 = $('div#wpc_box1');
    var position1 = pickerImg1.position();
    /*modalBox1.css('margin-left', position1.left + 200);*/

    $('#wpc_colorpickerHolder1').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_comment_bg_color').val('#' + hex);
        }
    });
  
    $('#wpc_colorpickerHolder2').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_reply_bg_color').val('#' + hex);
        }
    });
 
    $('#wpc_colorpickerHolder3').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_comment_text_color').val('#' + hex);
        }
    });

    $('#wpc_colorpickerHolder4').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_form_bg_color').val('#' + hex);
        }
    });

    $('#wpc_colorpickerHolder5').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_member_role_color').val('#' + hex);
        }
    });

    $('#wpc_colorpickerHolder6').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_support_role_color').val('#' + hex);
        }
    });

    $('#wpc_colorpickerHolder7').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_customer_role_color').val('#' + hex);
        }
    });

    $('#wpc_colorpickerHolder8').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#wpc_guest_role_color').val('#' + hex);
        }
    });
});