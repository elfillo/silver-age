<?php
//styles
function enqueue_styles(){
	wp_enqueue_style('main', get_template_directory_uri() .'/css/main.css', null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
//scripts
function enqueue_script(){
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.2.1.min.js', null, true);
	wp_enqueue_script('libs', get_template_directory_uri() .'/js/libs.min.js', array('jquery'), true);
	wp_enqueue_script('main', get_template_directory_uri() .'/js/main.js', array('jquery', 'libs'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_script');
//header_menu
register_nav_menu('header', 'Меню в хедере');
	register_nav_menu('footer', 'Меню в футере');
	register_nav_menu('mobile', 'Мобильное меню');
	register_nav_menu('service', 'Направления курсов');

//add thumbnails
add_theme_support( 'post-thumbnails' );
//add support excerpt
add_post_type_support( 'page', 'excerpt' );


require_once ('parts/admin/helpers.php');
require_once ('parts/admin/post_types.php');
require_once ('parts/admin/custom_fields.php');
require_once ('parts/view/course-content.php');
require_once ('parts/admin/mail.php')
?>