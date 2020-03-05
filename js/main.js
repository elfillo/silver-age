$(function() {

    var $mobileMunu = $('.js-mobile-menu');
    var $burgerMenu = $('.js-burger-menu');
    $burgerMenu.on('click', function(e) {
        e.preventDefault();
        $mobileMunu.toggleClass('is-active');
        $mobileMunu.hasClass('is-active')
            ? scrollLock.disablePageScroll()
            : scrollLock.enablePageScroll()
    });

    var $openModal = $('.js-open-modal');
    $openModal.on('click', function(e) {
        e.preventDefault();
        var $modalName = $(this).data('modal');
        $('.js-modal-' + $modalName).fadeIn('fast');
        scrollLock.disablePageScroll();
    });

    var $closeModal = $('.js-close');
    $closeModal.on('click', function(e) {
        e.preventDefault();
        var $parent = $(this).parents('.js-modal');
        $parent.fadeOut('fast');
        scrollLock.enablePageScroll();

        if ($parent.hasClass('js-modal-consult')) {
            var $successMessage = $('.js-success-message');
            var $consultModalInner = $('.js-consult-modal-inner');
            $successMessage.css('display', 'none');
            $consultModalInner.css('display', 'block');
        }
    });

    var $openTeamModal = $('.js-open-team-modal');
    $openTeamModal.on('click', function(e) {
        e.preventDefault();
        var $parent = $(this).parents('.js-doctor-tile');
        var $name = $parent.find('.js-name').text();
        var $position = $parent.find('.js-position').text();
        var $text = $parent.find('.js-text').text();
        var $avatar = $parent.find('.doctor-tile__thumb').html();
        var $modalName = $('.js-modal-' + $(this).data('modal'));

        $modalName.find('.js-name').html($name);
        $modalName.find('.js-position').html($position);
        $modalName.find('.js-text').html($text);
        $modalName.find('.team-modal__thumb').html($avatar);
        $modalName.fadeIn('fast');
        scrollLock.disablePageScroll();
    });
    
    var $tabContent = $('.js-tab-content');
    var $tab = $('.js-tab');
    $tab.on('click', function(e) {
        e.preventDefault();
        $tab.removeClass('is-active');
        $(this).addClass('is-active');
        var tabClass = $(this).data('tab');
        $tabContent.css('display', 'none');
        setTimeout(function() {
            $('.' + tabClass).css('display', 'block');
        })
    });

    $tab.each(function(index, item) {
        var $counter = $(item).find('.js-counter');
        var tabClass = '.' + $(item).data('tab');
        var $tiles = $(tabClass).find('.js-direction-tile');
        $counter.html($tiles.length)
    });


    var $rewiewBodyInnerHeight = $('.js-rewiew-body-inner').height();
    var $rewiewAction = $('.js-rewiew-action');
    $rewiewAction.on('click', function(e) {
        e.preventDefault();
        var $parent = $(this).parents('.js-rewiew');
        var $rewiewBodyInner = $parent.find('.js-rewiew-body-inner');
        var animateTime = 300;
  
        if ($rewiewBodyInner.height() === $rewiewBodyInnerHeight) {
            autoHeightAnimate($rewiewBodyInner, animateTime)
        } else {
            $rewiewBodyInner.stop().animate({ height: $rewiewBodyInnerHeight }, animateTime);
        }
    });

    var $accardeonAction = $(".js-accardeon-action");
    $accardeonAction.on("click", function () {
        $(this).toggleClass('is-active');
        var parent = $(this).parents(".js-accardeon-parent");
        var body = $(parent).find('.js-accardeon-body');
        var animateTime = 300;
      
        if ($(body).height() === 0) {
          autoHeightAnimate($(body), animateTime)
        } else {
          $(body).stop().animate({ height: '0' }, animateTime);
        }
      
    });

    function autoHeightAnimate(element, time) {
        var curHeight = element.height();
        var autoHeight = element.css('height', 'auto').outerHeight();
      
        element.height(curHeight);
        element.stop().animate({ height: autoHeight }, parseInt(time));
    }

    var $tabFormFontent = $('.js-tab-form-fontent');
    var $tabForm = $('.js-tab-form');
    $tabForm.on("click", function () {
        $tabForm.removeClass('is-active');
        $(this).addClass('is-active');
        $tabFormFontent.css('display', 'none');

        var tabForm = $(this).data('tab-form');
        $('.' + tabForm).css('display', 'block');
    });

    var $form = $('.js-form');
    $form.on('submit', function(e) {
        e.preventDefault();

        var $form = $(this);
        var errors = validateForm(this);
        if (errors > 0) {
            return;
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'booking',
                data: $form.serialize(),
            },
            type: $form.attr('method') || 'POST',
            context: this,
            success: function(response) {
                // Сообщение об успешной отправке
                console.log('Успешная отправка');
                var $successMessage = $('.js-success-message');
                var $consultModalInner = $('.js-consult-modal-inner');
                $('.js-modal-consult').fadeIn('fast');
                $successMessage.css('display', 'flex');
                $consultModalInner.css('display', 'none');
                resetForm($form);
            },
            error: function() {
                // Ошибка отправки
                console.log('Ошибка отправки формы');
            }
          });
    });

    function resetForm(form) {
        form.find('[data-required]').each(function(index, item) {
            $(item).removeClass('_error').val('');
        })
    }

    function validateForm(form) {
        var $form = $(form);
        var requiredFields = $form.find('[data-required]');
        var errorsCounter = 0;
        
        requiredFields.each(function(index, field) {
            if (!$(field).val()) {
                $(field).addClass('_error');
                errorsCounter += 1;
            } else {
                $(field).removeClass('_error');
            }
        });

        return errorsCounter;
    }

    var productDescriptionSliderControl = new Swiper('.doctors-slider', {
        spaceBetween: 40,
        slidesPerView: 1,
        navigation: {
            nextEl: '.doctors-slider__control_next',
            prevEl: '.doctors-slider__control_prev',
        },
        breakpoints: {
            700: {
              slidesPerView: 2
            }
          }
    });

    var mapScript = $.getScript('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
    $.when(mapScript)
        .done(function () {
        
            ymaps.ready(init)
            function init() {

                var newMarkerCollection = new ymaps.GeoObjectCollection();
                var markerCollectio = [];
                var center = [54.623363, 39.754539];

                var myMap = new ymaps.Map("map", {
                    center: center,
                    zoom: 7,
                    controls: []
                });

                myMap.behaviors.disable('scrollZoom');

                var placemark = setPlacemark(center);

                markerCollectio.push(placemark);
                newMarkerCollection.add(placemark);
                myMap.geoObjects.add(newMarkerCollection);

                setMapCenter(myMap, newMarkerCollection)
            }

            function setPlacemark(coords) {
                var placemark = new ymaps.Placemark(coords, {}, {
                    iconLayout: 'default#image',
                    iconImageHref: '/wp-content/themes/silver-age/img/svg/marker.svg',
                    iconImageSize: [41, 50],
                    // iconImageOffset: [-25, -70]
                });
            
                return placemark;
            }

            function setMapCenter(map, collection) {
                var centerAndZoom = ymaps.util.bounds.getCenterAndZoom(
                    collection.getBounds(),
                    map.container.getSize(),
                    map.options.get('projection')
                );
                    
                map.setCenter(centerAndZoom.center, 13);
            }
        })
});
