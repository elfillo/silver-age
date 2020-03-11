<?php
/*
Template Name: О компании
*/
?>
<?php ?>
<?php get_header()?>
    <section class="page">
        <div class="container">
            <ul class="breadcrumb page__breadcrumb">
                <li class="breadcrumb__item">
                    <a href="/">
                        Гавная
                    </a>
                    <span></span>
                </li>
                <li class="breadcrumb__item">
                    О компании
                </li>
            </ul>

            <div class="about-content">
                <?php echo apply_filters('the_content', $post->post_content)?>
            </div>
            <br/>
            <br/>
            <br/>


                <div class="docs-content">
                    <h2 class="display display_size_middle about-content__title">
	                    <?php echo carbon_get_post_meta($post->ID, 'about_docs_title'); ?>
                    </h2>
                    <?php $docs = carbon_get_post_meta($post->ID, 'about_docs'); ?>
                    <ul class="docs">
                        <?php foreach ($docs as $doc):?>
                        <li class="docs__item">
                            <a href="<?php echo $doc['about_docs-item--doc']?>" type="download" class="doc-tile">
	                            <?php echo $doc['about_docs-item--name']?>
                                <svg class="doc-tile__icon" width="42" height="42" viewBox="0 0 42 42">
                                    <circle cx="21" cy="21" r="20.5" fill="white" stroke="#EAEAED"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0052 18.105L21.7002 20.4101V13H20.3002V20.4101L17.9952 18.105L17.0052 19.095L21.0002 23.0899L24.9952 19.095L24.0052 18.105ZM28 25.6V22.8H26.6V25.6H15.4V22.8H14V25.6C14 26.3732 14.6268 27 15.4 27H26.6C27.3732 27 28 26.3732 28 25.6Z" fill="#181818"/>
                                </svg>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
    </section>
    <?php include('modules/_consult-modal.php'); ?>
<?php get_footer()?>