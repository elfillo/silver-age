<?php
function getPostByTag(){
	$slug = $_POST['slug'];
	$load_count = $_POST['load_count'];
	$portfolio = get_posts([
		'post_type' => 'post_portfolio',
		'numberposts' => $load_count,
		'tag' => $slug
	]);

	$result = [];

	foreach ($portfolio as $key => $p){
		$result[$key]['id'] = $p->ID;
		$result[$key]['title'] = $p->post_title;
		$result[$key]['excerpt'] = $p->post_excerpt;
		$result[$key]['guid'] = $p->guid;
		$result[$key]['img'] = get_the_post_thumbnail_url($p);
	}

	echo json_encode($result);
	wp_die();
}

add_action('wp_ajax_nopriv_post_by_tag', 'getPostByTag' );
add_action('wp_ajax_post_by_tag', 'getPostByTag' );

function getMorePost(){
	$ids = $_POST['ids'];
	$load_count = $_POST['load_count'];
	$post_type = $_POST['post_type'];
	$slug = $_POST['slug'];

	$posts = get_posts([
		'post_type' => $post_type,
		'numberposts' => $load_count,
		'exclude' => $ids,
		'tag' => $slug
	]);

	$result = [];

	foreach ($posts as $key => $post){
		$result[$key]['id']      = $post->ID;
		$result[$key]['title']   = $post->post_title;
		$result[$key]['content'] = $post->post_content;
		$result[$key]['excerpt'] = $post->post_excerpt;
		$result[$key]['guid']    = $post->guid;
		$result[$key]['img']     = get_the_post_thumbnail_url($post);
	}

	echo json_encode($result);
	wp_die();

}
add_action('wp_ajax_nopriv_show_more_post', 'getMorePost' );
add_action('wp_ajax_show_more_post', 'getMorePost' );

function getSubTotalSum(){
	global $woocommerce;
	echo $woocommerce->cart->subtotal;

	wp_die();
}

add_action('wp_ajax_nopriv_get_sub_total', 'getSubTotalSum' );
add_action('wp_ajax_get_sub_total', 'getSubTotalSum' );
?>