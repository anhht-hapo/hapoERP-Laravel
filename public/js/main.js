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

    // $(document).on('click', '.pagination a', function (e) {
    //     e.preventDefault();
    //     getPosts($(this).attr('href').split('page=')[1]);
    // });
    // function getPosts(page) {
    //   $.ajax({
    //     url: '/users/?page=' + page,
    //     dataType: 'json',
    //     success: function (data) {
    //       $('#list_users').html(data);
    //       location.hash = page;
    //     },
    //     error: function () {
    //       alert('Posts could not be loaded.');
    //     }
    //   });
    // }
});