<?php
	/*
    Template Post Type: courses
    Template Name: Услуга
    */
?>
<?php
    $courses_page = get_page_data('courses');
?>
<?php get_header()?>
    <section class="page single-product__page">
        <div class="container">
            <ul class="breadcrumb page__breadcrumb">
                <li class="breadcrumb__item">
                    <a href="/">
                        Гавная
                    </a>
                    <span></span>
                </li>
                <li class="breadcrumb__item">
                    <a href="<?php echo $courses_page->guid?>">
                        Курсы
                    </a>
                    <span></span>
                </li>
                <li class="breadcrumb__item">
                    <?php echo $post->post_title?>
                </li>
            </ul>

            <h1 class="display display_size_big page__title">
                <?php echo $post->post_title?>
            </h1>

            <div class="row single-product__row">
                <div class="single-product__content">
                    <?php
	                    $content = carbon_get_post_meta($post->ID, 'course-constructor');
                        drawContent($content, $post->ID, $post->post_title);
                    ?>
                </div>
                <div class="single-product__stycke-block">
                    <div class="tab-form _is-active_left">

                        <div class="tab-form__tabs">
                            <button class="tab-form__tab js-tab-form is-active" data-tab-form="left">
                                Груповые <br>занятия
                            </button>
                            <button class="tab-form__tab js-tab-form" data-tab-form="right">
                                Индивидуальные <br>занятия
                            </button>
                        </div>

                        <div class="tab-form__content">
                            <div class="tab-form__tab-content js-tab-form-fontent left">
                                <h2 class="display display_size_small tab-form__title">
                                    Забронируйте место <br>в группе со скидкой
                                </h2>
                                <div class="tab-form__text">
                                    <p>
                                        Пожелания по графику занятий учитываются при составлении расписания.
                                    </p>
                                    <br>
                                    <p>
                                        Наличие различных форм обучения — утро, день, вечер.   
                                    </p>
                                </div>
                                <div class="tab-form__rate">
                                    <div class="tab-form__time">
                                        <?php echo carbon_get_post_meta($post->ID, 'group_time_count');?> ак/часа
                                    </div>
                                    <div class="tab-form__price">
	                                    <?php echo carbon_get_post_meta($post->ID, 'group_price');?> Р
                                    </div>
                                </div>
                                <div class="set-group tab-form__set-group">
                                    <div class="set-group__label">
                                        Ближайший <br>набор в группу
                                    </div>
                                    <div class="set-group__tile">
                                        <div class="set-group__icon">
                                            <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.2 3.2h1.6v-.8h6.4v.8h1.6v-.8h1.6v2.4H1.6V2.4h1.6v.8zM1.6 6.4v8h12.8v-8H1.6zM4.8.8h6.4V0h1.6v.8h1.6A1.6 1.6 0 0116 2.4v12a1.6 1.6 0 01-1.6 1.6H1.6A1.6 1.6 0 010 14.4v-12A1.6 1.6 0 011.6.8h1.6V0h1.6v.8z" fill="#4D545B"/></svg>
                                        </div>
                                        <div class="set-group__date">
                                            <?php
                                                $time_start = carbon_get_post_meta($post->ID, 'group_date-start');
	                                            echo startDate($time_start);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn_fill tab-form__btn js-open-modal" data-modal="consult">
                                    Получить консультацию
                                </button>
                            </div>

                            <div class="tab-form__tab-content js-tab-form-fontent right" style="display:none;">
                                <h2 class="display display_size_small tab-form__title">
                                    Забронируйте <br>индивидуальное <br>занятие
                                </h2>
                                <div class="tab-form__text">
                                    <ul>
                                        <li>Персональный план обучения</li>
                                        <li>Специальный кабинет</li>
                                    </ul>
                                </div>
                                <img src="<?php get_uri('img/static/img.jpg')?>" class="tab-form__img" alt="Картинка">
                                <div class="tab-form__rate">
                                    <div class="tab-form__time">
	                                    <?php echo carbon_get_post_meta($post->ID, 'personal_time_count');?> ак/часа
                                    </div>
                                    <div class="tab-form__price">
	                                    <?php echo carbon_get_post_meta($post->ID, 'personal_price');?> Р
                                    </div>
                                </div>
                                <button class="btn btn_fill tab-form__btn js-open-modal" data-modal="consult">
                                    Получить консультацию
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="single-product__sertificate-wrapper">
            <?php include('modules/_sertificate-section.php'); ?>
        </div>
    </section>

    <?php include('modules/_consult-modal.php'); ?>

<?php get_footer()?>