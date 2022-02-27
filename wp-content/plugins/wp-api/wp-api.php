<?php 
/*
Plugin Name: Custom Api
Description: Wp Api for Burger House
Version: 1.0
*/

function wl_posts()
{

	$args = [
		'post_type'=>'recipy',
		'numberposts' => 99999,
	];

	$posts = get_posts($args);

	$data = [];
	$i = 0;

	foreach ($posts as $post) {
		$data[$i]['id'] = $post->ID;
		$data[$i]['title'] = $post->post_title;
		$data[$i]['content'] = $post->post_content;
		$data[$i]['slug'] = $post->post_name;
		$data[$i]['featured_image']['thumbnail'] = get_the_post_thumbnail_url($post->ID,'thumbnail');
		$data[$i]['featured_image']['medium'] = get_the_post_thumbnail_url($post->ID,'medium');
		$data[$i]['featured_image']['large'] = get_the_post_thumbnail_url($post->ID,'large');
		$i++;
	}

	return $data;
}



add_action('rest_api_init', function(){
	register_rest_route('wl/v1','posts',[
		'methods' => 'GET',
		'callback' => 'wl_posts',
	]);
});







?>