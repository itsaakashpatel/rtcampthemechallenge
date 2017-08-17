/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Wordpress media uploader */

jQuery(document).ready(function() {
       jQuery('#upload_logo_button').click(function() {
        tb_show('Upload a logo', 'media-upload.php?referer=theme-options&type=image&TB_iframe=true&post_id=0', false);
        return false;
    });
    window.send_to_editor = function(html) {
    var image_url = jQuery('img',html).attr('src');
    jQuery('#logo_url').val(image_url);
    tb_remove();
   }
});

