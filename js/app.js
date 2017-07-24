
'use strict';
jQuery(document).ready(function($) {

    window.sbi_custom_js = function(){
    $("#sbi_images img").each(function(){
        var alt=jQuery(this).attr("alt");
        $(this).after('<span class="sr-only">' + alt + '</span>');
    });
    }
 
});