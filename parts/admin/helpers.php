<?php
function dd($var, $dumb = 0){
	echo '<pre>';
	if($dumb){
		var_dump($var);
	}else{
		print_r($var);
	}
	echo '</pre>';
}

function get_page_data($page){
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $page.'.php'
	));

	return $pages[0];
}

function get_uri($path){
	echo get_template_directory_uri() . '/' . $path;
}

function startDate($time){
	return strtotime($time) >= time() ? formatDate(strtotime($time)) : formatDate(strtotime("+1 week"));
}

function formatDate($date){
	return date("d.m.Y", $date);
}
?>