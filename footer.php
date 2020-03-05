<?php
	$courses_page = get_page_data('courses');
	$contact_page = get_page_data('contacts');
	$address = get_post_meta($contact_page->ID, 'address', true);
	$phone = get_post_meta($contact_page->ID, 'phone', true);
	$phone_link = get_post_meta($contact_page->ID, 'phone_link', true);
	$courses_types = get_posts([
		'post_type' => 'courses_types',
		'numberposts' => -1,
		'orderby' => 'title',
		'order'       => 'ASC',
	]);
?>
<footer class="foot-page foot-page__bg_grey">
    <div class="foot-page__top">
        <div class="container">
            <div class="row foot-page__top-row">

                <div class="foot-page__contacts">
                    <a href="./" class="logo-v-second foot-page__logo">
                        <img src="<?php get_uri('img/svg/logo.svg')?>" class="logo-v-second__icon" width="46" height="46" alt="Иконка">
                        <h2 class="logo-v-second__label">
                            <span class="logo-v-second__top">
                                Серебряный век
                            </span>
                            <div class="logo-v-second__bottom">
                                образовательный центр
                            </div>
                        </h2>
                    </a>
                    <address class="foot-page__address">
                        <?php echo $address?>
                    </address>
                    <a href="tel:<?php echo $phone_link?>" class="foot-page__phone">
	                    <?php echo $phone?>
                    </a>
                </div>

                <nav class="nav-menu-column nav-menu-column_pl foot-page__nav-menu-column">
                    <h3 class="nav-menu-column__title">
                        Направления курсов
                    </h3>
                    <ul class="nav-menu-column__list nav-menu-column__list_columns">
                        <?php foreach ($courses_types as $item):?>
                            <li><a href="<?php echo $courses_page->guid?>"><?php echo $item->post_title?></a></li>
                        <?php endforeach; unset($item)?>
                    </ul>
                </nav>

                <nav class="nav-menu-column nav-menu-column_mr foot-page__nav-menu-column">
                    <h3 class="nav-menu-column__title">
                        Информация
                    </h3>
	                <?php wp_nav_menu([
		                'theme_location' => 'footer',
		                'menu_class' => 'nav-menu-column__list',
	                ])?>
                </nav>

            </div>
        </div>
    </div>

    <div class="foot-page__bottom">
        <div class="container">
            <div class="row foot-page__bottom-row">
                <p>© 2020 «Серебряный век»</p>
                <a href="#">Политика конфиденциальности</a>
                <span>Разработка:<a href="#">kopelev</a></span>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>