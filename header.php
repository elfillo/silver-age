<!DOCTYPE html>
<html lang="ru">

<head>
    <?php wp_head()?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="" />
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="" />
    <title>Серебряный век</title>

    <link rel="preload" href="<?php get_uri('fonts/Gilroy-Regular.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/Gilroy-Regular.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/Gilroy-Medium.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/Gilroy-Medium.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/Gilroy-SemiBold.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/Gilroy-SemiBold.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-300.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-300.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-500.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-500.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-700.woff')?>" as="font" type="font/woff" crossorigin="anonymous" />
    <link rel="preload" href="<?php get_uri('fonts/MuseoCyrl-700.woff2')?>" as="font" type="font/woff2" crossorigin="anonymous" />
</head>
<body>
<header class="head-page">
    <?php
	    $id = get_page_data('contacts')->ID;
    ?>
    <div class="container">
        <div class="row head-page__row">

            <a href="/" class="logo-v-first">
                <img src="<?php get_uri('img/svg/logo.svg')?>" class="logo-v-first__icon" width="46" height="46" alt="Иконка">
                <h2 class="logo-v-first__label">
                    <span class="logo-v-first__top">
                        Серебряный век
                    </span>
                    <div class="logo-v-first__bottom">
                        образовательный центр
                    </div>
                </h2>
            </a>

	        <?php wp_nav_menu([
		        'theme_location' => 'header',
		        'container' => 'nav',
		        'container_class' => 'nav-menu head-page__nav-menu',
		        'menu_class' => 'nav-menu__list',
	        ])?>

            <a href="tel:<?php the_field('phone_link', $id)?>" class="head-page__phone">
                <?php the_field('phone', $id)?>
            </a>

            <a href="tel:<?php the_field('phone_link', $id)?>" class="head-page__phone-mobile">
                <img src="<?php get_uri('img/svg/phone.svg')?>" alt="Иконка телефона">
            </a>

            <button class="burger-menu head-page__burger-menu js-burger-menu">
                <span class="burger-menu__line"></span>
            </button>

            <button class="btn btn_border head-page__btn js-open-modal" data-modal="consult">
                Задать вопрос
            </button>

        </div>
    </div>

    <div class="mobile-munu head-page__mobile-munu js-mobile-menu">
	    <?php wp_nav_menu([
		    'theme_location' => 'mobile',
		    'menu_class' => 'mobile-munu__list',
	    ])?>
        <div class="mobile-munu__footer">
            <a href="tel:<?php the_field('phone_link', $id)?>" class="mobile-munu__phone">
	            <?php the_field('phone', $id)?>
            </a>
            <button class="btn btn_border mobile-munu__btn">
                Задать вопрос
            </button>
        </div>
    </div>
</header>