<?php
	/*
    Template Name: Команда
    */
?>
<?php
$teachers = get_posts([
    'post_type' => 'teachers',
    'numberposts' => -1,
]);
?>
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
                    Преподаватели
                </li>
            </ul>

            <h1 class="display display_size_big page__title">
                Преподаватели
            </h1>

            <div class="row team__row">
                <?php foreach ($teachers as $teacher):?>
                <div class="doctor-tile js-doctor-tile">
                    <div class="doctor-tile__thumb">
                        <?php echo get_the_post_thumbnail($teacher->ID, [300, 300])?>
                    </div>
                    <div class="doctor-tile__desc">
                        <h3 class="doctor-tile__name js-name">
                            <?php echo $teacher->post_title?>
                        </h3>
                        <div class="doctor-tile__position js-position">
                            <p>
	                            <?php the_field('teacher-status', $teacher->ID)?>
                            </p>
                        </div>
                        <div class="doctor-tile__text js-text">
	                        <?php echo apply_filters('the_content', $teacher->post_content);?>
                        </div>
                    </div>
                    <a href="#" class="js-open-team-modal" data-modal="team"></a>
                </div>
                <?php endforeach;?>


            </div>
        </div>
    </section>
 
    <?php include('modules/_consult-modal.php'); ?>
    <?php include('modules/_team-modal.php'); ?>

<?php get_footer()?>