<?php
	/*
    Template Name: Контакты
    */
?>
<?php
	$contact_page = get_page_data('contacts');
	$address = get_post_meta($contact_page->ID, 'address', true);
	$email = get_post_meta($contact_page->ID, 'e-mail', true);
	$phone = get_post_meta($contact_page->ID, 'phone', true);
	$phone_link = get_post_meta($contact_page->ID, 'phone_link', true);
?>
<?php get_header()?>
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
                        <a href="tel:<?php echo $phone_link?>" class="contact__info">
                            <?php echo $phone?>
                        </a>
                    </li>
                    <li class="contact">
                        <div class="contact__label">
                            Адрес:
                        </div>
                        <address class="contact__info">
                            <?php echo $address?>
                        </address>
                    </li>
                    <li class="contact">
                        <div class="contact__label">
                            E-mail:
                        </div>
                        <a href="mailto:sv-kurs@yandex.ru" class="contact__info">
                            <?php echo $email?>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="map" class="contacts-section__map"></div>
        </div>
    </section>   

    <?php include('modules/_consult-modal.php'); ?>

<?php get_footer()?>