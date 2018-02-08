jQuery(document).ready(function($){
	"use strict";
	$('.btn-filter').on('click',function() {
	    $('.filter').toggle();
	});
	$('.delete').on('click',function () {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $(".remove-record-model").attr("action",url);
    });

});