<?php
/*
Template Name: Главная
*/
?>
<?php get_header()?>
<?php
    $courses_page = get_page_data('courses');
    $team_page = get_page_data('team');
    $review_page = get_page_data('reviews');
    $teachers = get_posts([
            'post_type' => 'teachers',
            'numberposts' => -1,
    ]);
	$courses_types = get_posts([
			'post_type' => 'courses_types',
			'numberposts' => 3,
			'orderby' => 'title',
			'order'       => 'ASC',
	]);

	foreach ($courses_types as $key => &$courses_type){
	    $items = get_posts([
            'post_type' => 'courses',
            'numberposts' => -1,
            'meta_key' => '_courses_type',
            'meta_value' => $courses_type->ID
        ]);
		$courses_type->courses_list = $items;
    }

	$rewiews = get_posts([
        'post_type' => 'review',
        'numberposts' => 3,
    ]);
?>
<section class="promo-main">
    <div class="container">
        <h2 class="promo-main__before-title">
            Образовательный центр в Рязани
        </h2>
        <h1 class="display display_size_big promo-main__title">
            Будь кем хочешь,<br>
            а мы научим
        </h1>
        <div class="promo-main__text">
            <p>
                За 8 лет мы разработали собственную <br>методологию обучения, которая помогает, <br> нашим студентам впитывать знания
            </p>
        </div>
        <a href="<?php echo $courses_page->guid?>" class="btn btn_fill promo-main__btn">
            Выбрать курс
        </a>
    </div>
    <img src="<?php get_uri('img/static/promo-people.png')?>" class="promo-main__bg" width="914" height="571">
</section>

<section class="benefits">
    <div class="container">
        <ul class="row benefits__row">

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i1.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Очное обучение
                </h2>
                <div class="benefit__text">
                    <p>
                        Выпускники получают <br>
                        сертификаты об окончании <br>
                        курсов
                    </p>
                </div>
            </li>

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i2.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Гибкий график
                </h2>
                <div class="benefit__text">
                    <p>
                        Учитесь в удобное для Вас время, <br>
                        по будням и выходным, утром, <br>
                        днем и вечером.
                    </p>
                </div>
            </li>

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i3.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Удобное <br>месторасположение
                </h2>
                <div class="benefit__text">
                    <p>
                        Мы находимся в самом <br>центре города.
                    </p>
                </div>
            </li>

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i1.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Очное обучение
                </h2>
                <div class="benefit__text">
                    <p>
                        Выпускники получают <br>
                        сертификаты об окончании <br>
                        курсов
                    </p>
                </div>
            </li>

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i2.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Очное обучение
                </h2>
                <div class="benefit__text">
                    <p>
                        Выпускники получают <br>
                        сертификаты об окончании <br>
                        курсов
                    </p>
                </div>
            </li>

            <li class="benefit">
                <img src="<?php get_uri('img/svg/i3.svg')?>" class="benefit__icon" alt="Иконка">
                <h2 class="display display_size_small benefit__title">
                    Удобное расположение
                </h2>
                <div class="benefit__text">
                    <p>
                        Выпускники получают <br>
                        сертификаты об окончании <br>
                        курсов
                    </p>
                </div>
            </li>

    </div>
</section>

<section class="directions directions_padding">
    <div class="container">
        <h2 class="display display_size_big directions__title">
            Более 10 направлений - выбирайте любое
        </h2>

        <div class="row directions__row">

            <div class="directions-sidebar">
                <ul class="directions-sidebar__list">
                    <?php foreach ($courses_types as $item):?>
                    <li class="directions-sidebar__item">
                        <button class="directions-sidebar__tab is-active js-tab" data-tab="tab<?php echo $item->ID?>">
                            <?php echo $item->post_title?>
                            <span class="js-counter">-</span>
                        </button>
                    </li>
                    <?php endforeach; unset($item)?>
                </ul>
                <div class="directions-sidebar__action">
                    <a href="<?php echo $courses_page->guid?>" class="btn btn_fill directions-sidebar__btn">
                        Все направления
                    </a>
                </div>
            </div>

            <div class="directions-content">
	            <?php foreach ($courses_types as $item):?>
                    <div class="directions__tab-content js-tab-content tab<?php echo $item->ID?>">
                    <ul class="directions-content__list js-tab-list">
                        <?php foreach ($item->courses_list as $course):?>
                        <li class="direction-tile js-direction-tile">
                            <div class="direction-tile__thumb">
	                            <?php echo get_the_post_thumbnail($course->ID, [200, 150])?>
                            </div>
                            <div class="direction-tile__desc">
                                <h2 class="display display_size_small direction-tile__title">
                                    Курс "<?php echo $course->post_title?>"
                                </h2>
                                <ul class="direction-tile__tags">
                                    <li class="direction-tile__tag">
                                        <?php echo carbon_get_post_meta($course->ID, 'preview-sub-title');?>
                                    </li>
                                </ul>
                                <div class="direction-tile__prices">
                                    <?php
                                      $price = carbon_get_post_meta($course->ID, 'group_price');
                                      $sale_price = carbon_get_post_meta($course->ID, 'group_price-sale');
                                    ?>
                                    <?php
                                        if(empty($sale_price)){
                                            echo '
                                                <div class="direction-tile__current-price">
                                                    '.$price.' Р.
                                                </div>
                                            ';
                                        }else{
                                            echo '
                                                <strike class="direction-tile__old-price">
                                                        '.$price.' Р.
                                                </strike>
                                                <div class="direction-tile__current-price">
                                                        '.$sale_price.' Р.
                                                </div>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <a href="<?php echo $course->guid?>"></a>
                        </li>
                        <?php endforeach; unset($course)?>

                    </ul>
                </div>
		        <?php endforeach; unset($item)?>
            </div>

        </div>
    </div>
</section>

<section class="doctors">
    <div class="container">
        <div class="row doctors__row">
            <div class="doctors__desc">
                <h2 class="display display_size_big doctors__title">
                    Опытные <br>
                    преподователи <br>
                    с уникальными <br>
                    методологиями <br>
                    обучения
                </h2>
                <div class="doctors__text">
                    <p>
                        Высокий уровень подготовки <br>
                        преподавательского состава.
                    </p>
                    <br>
                    <p>
                        Все преподаватели имеют практический, <br>
                        профессиональный опыт работы.
                    </p>
                </div>
                <a href="<?php echo $team_page->guid?>" class="btn btn_border doctors__btn">
                    Посмотреть всех преподователей
                </a>
            </div>

            <div class="swiper-container doctors-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($teachers as $teacher):?>
                        <div class="swiper-slide">
                        <div class="doctor-tile js-doctor-tile">
                            <div class="doctor-tile__thumb">
                                <?php echo get_the_post_thumbnail($teacher->ID, [305, 305])?>
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
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

            <div class="doctors-slider__controls">
                <button class="doctors-slider__control doctors-slider__control_prev">
                    <svg width="62" height="12" viewBox="0 0 62 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="60" height="1.5" transform="matrix(-1 0 0 1 61.9746 5)" fill="#37B954"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.94913 6L6.97461 0.974524L6.00009 0L8.53539e-05 6L6.00009 12L6.97461 11.0255L1.94913 6Z" fill="#37B954"/>
                    </svg>
                </button>
                <button class="doctors-slider__control doctors-slider__control_next">
                    <svg width="62" height="12" viewBox="0 0 62 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="5" width="60" height="1.5" fill="#37B954"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M60.0255 6L55 0.974524L55.9745 0L61.9745 6L55.9745 12L55 11.0255L60.0255 6Z" fill="#37B954"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row about-section__row">
            <img src="<?php get_uri('img/static/globus.png')?>" class="about-section__globus" width="457" height="532" alt="Картинка как мы работаем">
            <div class="about-section__content">
                <h2 class="display display_size_big about-section__title">
                    Образовательный центр <br>Серебряный век
                </h2>

                <p>
                    В образовательном центре «Серебряный век» преподают высококвалифицированные преподаватели, имеющие большой стаж профессиональной и преподавательской работы, постоянно проходящие семинары по повышению квалификации.
                </p>
                <br>
                <p>
                    Программы курсов тщательно отработаны по соотношению теории и практики (как правило 70% и более общего времени на занятиях отводиться отработке практических навыков, необходимых при дальнейшей работе).
                </p>

                <div class="about-section__licenses">
                    <a href="<?php get_uri('img/static/l-b1.jpg')?>" data-fancybox="license" class="license-link about-section__license-link">
                        <div class="license-link__icon">
                            <img src="<?php get_uri('img/static/l1.png')?>" width="80" height="78" alt="Лицензия на образовательную деятельность">
                        </div>
                        <span class="license-link__desc">
                                Лицензия <br>на образовательную <br>деятельность
                            </span>
                    </a>
                    <a href="<?php get_uri('img/static/l-b2.jpg')?>" data-fancybox="license" class="license-link about-section__license-link">
                        <div class="license-link__icon">
                            <img src="<?php get_uri('img/static/l2.png')?>" width="80" height="78" alt="Лицензия на образовательную деятельность">
                        </div>
                        <span class="license-link__desc">
                                Свидетельство <br>о регистрации <br>учебного центра
                            </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rewiews">
    <div class="container">
        <div class="row rewiews__row">
            <div class="rewiews__sidebar">
                <h2 class="display display_size_big rewiews__title">
                    Более <strong>2000 учеников</strong> <br>
                    прошли курсы <br>
                    Серебряного века <br>
                    за <strong>8 лет</strong>
                </h2>
                <img src="<?php get_uri('img/static/users.png')?>" class="rewiews__img" width="185" height="45">
                <button class="btn btn_fill rewiews__btn js-open-modal" data-modal="rewiew">
                    Оставить отзыв
                </button>
            </div>
            <div class="rewiews__content">
                <ul class="rewiews__list">
                    <?php foreach ($rewiews as $rewiew):?>
                        <li class="rewiew js-rewiew">
                        <div class="rewiew__body">
                            <div class="rewiew__body-inner js-rewiew-body-inner">
                                <p><?php echo $rewiew->post_content?></p>
                            </div>
                        </div>
                        <footer class="rewiew__footer">

                            <div class="user-info rewiew__user-info">
                                <div class="user-info__avatar">
                                    <?php echo get_the_post_thumbnail($rewiew->ID, [40,40])?>
                                </div>
                                <div class="user-info__desc">
                                    <h3 class="user-info__name">
                                        <?php echo $rewiew->post_title?>
                                    </h3>
                                    <time class="user-info__date">
	                                    <?php echo $rewiew->post_excerpt?>
                                    </time>
                                </div>
                            </div>

                            <button class="rewiew__action js-rewiew-action">
                                Читать весь отзыв
                            </button>

                        </footer>
                    </li>
                    <?php endforeach;?>
                </ul>

                <a href="<?php echo $review_page->guid?>" class="rewiews__show-more">
                    Посмотреть все отзывы
                </a>
            </div>
        </div>
    </div>
</section>

<?php include('modules/_sertificate-section.php'); ?>

<section class="contacts-section">
    <div class="container">
        <div class="row contacts-section__row">
            <h2 class="display display_size_big contacts-section__title">
                Контакты
            </h2>
            <ul class="contacts">
                <li class="contact">
                    <div class="contact__label">
                        Телефон:
                    </div>
                    <a href="tel:+74912300317" class="contact__info">
                        +7 (4912) 300‒317
                    </a>
                </li>
                <li class="contact">
                    <div class="contact__label">
                        Адрес:
                    </div>
                    <address class="contact__info">
                        г. Рязань, ул. Ленина, д.10, оф.1 (5 этаж) ТЦ «Маяк
                    </address>
                </li>
                <li class="contact">
                    <div class="contact__label">
                        E-mail:
                    </div>
                    <a href="mailto:sv-kurs@yandex.ru" class="contact__info">
                        sv-kurs@yandex.ru
                    </a>
                </li>
            </ul>
        </div>
        <div id="map" class="contacts-section__map"></div>
    </div>
</section>
<style>
    .directions__tab-content{
        display: none;
    }
    .directions__tab-content:first-child{
        display: block;
    }
</style>

<?php include('modules/_team-modal.php'); ?>
<?php include('modules/_rewiew-modal.php'); ?>
<?php include('modules/_consult-modal.php'); ?>
<?php get_footer()?>


