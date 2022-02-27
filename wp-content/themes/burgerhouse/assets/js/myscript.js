jQuery(document).ready(function($) {

	  $.ajax({
	    type: 'GET',
	    url: 'http://burgerhouse.test/wp-json/wl/v1/posts',
	    dataType: "json", // add data type
	    // data: { action : 'get_ajax_posts' },
	    success: function( response ) {
	        $.each( response, function( key, value ) {
	            console.log( key, value ); // that's the posts data.
	            console.log(value.title);
	       		$('#myrecipyapi').append(`<div class="left-side">
				    <div class="masonry-box post-media">
				         <img src="/assets/upload/garden_cat_01.jpg" alt="" class="img-fluid">
				         <div class="shadoweffect">
				            <div class="shadow-desc">
				                <div class="blog-meta">
				                    <span class="bg-aqua">
				                		Category name
				                    </span>
				                    <h4><a href="https:://www.google.com" title="">${value.title}</a></h4>
				                    <small><a href="#" title="">12-12-12</a></small>
				                    <small><a href="#" title="">By admin</a></small>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>`);
	        });
	    }
	});

});



// $.ajax({
//     type: 'POST',
//     url: '<?php echo admin_url('admin-ajax.php');?>',
//     dataType: "json", // add data type
//     data: { action : 'get_ajax_posts' },
//     success: function( response ) {
//         $.each( response, function( key, value ) {
//             console.log( key, value ); // that's the posts data.
//         } );
//     }
// });