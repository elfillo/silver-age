<?php
	/*
	Template Name: Документы
	*/
?>
<?php get_header()?>
<section class="page">
	<div class="container">
		<?php echo apply_filters('the_content', $post->post_content);?>
	</div>
</section>
<?php get_footer()?>
