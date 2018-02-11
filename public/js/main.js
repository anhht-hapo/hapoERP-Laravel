// $(window).on('hashchange', function() {
//     if (window.location.hash) {
//         let page = window.location.hash.replace('#', '');
//         if (page == Number.NaN || page <= 0) {
//             return false;
//         } else {
//             getPosts(page);
//         }
//     }
// });
jQuery(document).ready(function($){
	"use strict";
	$('.btn-filter').on('click',function() {
	    $('.filter').toggle();
	});
});