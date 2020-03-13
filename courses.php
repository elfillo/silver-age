<?php
	/*
		Template Name: Курсы
	*/
?>
<?php get_header() ?>
<?php
	$courses_types = get_posts([
		'post_type' => 'courses_types',
		'numberposts' => -1,
		'orderby' => 'title',
		'order'       => 'ASC',
	]);

	$combo = get_posts([
        'post_type' => 'courses_combo',
        'numberposts' => -1,
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
?>
<section class="directions page">
    <div class="container">
        <ul class="breadcrumb page__breadcrumb">
            <li class="breadcrumb__item">
                <a href="/">
                    Гавная
                </a>
                <span></span>
            </li>
            <li class="breadcrumb__item">
                Курсы
            </li>
        </ul>

        <h1 class="display display_size_big page__title">
            Каталог курсов
        </h1>

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
                    <li class="directions-sidebar__item">
                        <button class="directions-sidebar__tab js-tab is-active" data-tab="combo">
                            Комбо-курс
                            <svg width="15" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.074 8.905c.477-.666.424-1.368.093-2.63C6.512 3.779 6.773 2.41 9.03.79L10.132 0l.266 1.325c.284 1.407.749 2.278 1.943 3.953l.095.133c1.72 2.413 2.348 3.867 2.348 6.508 0 3.204-3.258 6.081-6.99 6.081s-6.99-2.876-6.99-6.08c0-.06 0-.059-.01-.324-.079-2.047.302-3.649 1.842-5.379a9.34 9.34 0 011.112-1.053l.92-.742.442 1.092c.326.807.71 1.441 1.142 1.907.366.394.638.89.822 1.484zm-3.13-1.536C2.76 8.7 2.478 9.887 2.54 11.529c.012.307.011.296.011.39 0 2.196 2.433 4.344 5.243 4.344 2.81 0 5.243-2.148 5.243-4.344 0-2.208-.497-3.357-2.027-5.503l-.095-.133c-.93-1.304-1.483-2.21-1.85-3.224-.598.713-.563 1.422-.207 2.777.655 2.497.394 3.865-1.863 5.484l-1.287.924-.097-1.575c-.061-1.006-.29-1.69-.643-2.07a6.854 6.854 0 01-.945-1.316 6.744 6.744 0 00-.078.086z" fill="#FF783E"></path></svg>
                        </button>
                    </li>
                </ul>
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
                <div class="directions__tab-content js-tab-content combo">
                    <ul class="directions-content__list js-tab-list">
                        <?php foreach ($combo as $com):?>
                        <li class="combo-tile">
                            <h2 class="display display_size_middle combo-tile__title">
                                <span></span>
                                Комбо “<?php echo $com->post_title?>”
                            </h2>
                            <?php
                              $com_courses = get_posts([
	                              'post_type' => 'courses',
	                              'numberposts' => -1,
	                              'include' => get_post_meta($com->ID, 'course_list')
                              ]);
                            ?>
                            <ul class="combo-tile__body">
	                            <?php foreach ($com_courses as $course):?>
                                  <li class="direction-tile js-direction-tile">
                                      <div class="direction-tile__thumb">
						                            <?php echo get_the_post_thumbnail($course->ID, [200, 150])?>
                                      </div>
                                      <div class="direction-tile__desc">
                                          <h2 class="display display_size_small direction-tile__title">
                                              <a href="<?php echo $course->guid?>">
                                                  Курс "<?php echo $course->post_title?>"
                                              </a>
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
                                                <div class="direction-tile__current-price combo-tile__price_current">
                                                        '.$sale_price.' Р.
                                                </div>
                                            ';
									                            }
								                            ?>
                                          </div>
                                      </div>
                                  </li>
	                            <?php endforeach; unset($course)?>
                            </ul>

                            <footer class="combo-tile__footer">
                                <div class="combo-tile__footer-label">
                                    Общая стоймость:
                                </div>

                                <div class="combo-tile__prices">
	                                <?php
		                                $price = carbon_get_post_meta($com->ID, 'combo-price');
		                                $sale_price = carbon_get_post_meta($com->ID, 'combo-price--sale');
	                                ?>
	                                <?php
		                                if(empty($sale_price)){
			                                echo '
                                                <div class="combo-tile__price">
                                                    '.$price.' Р.
                                                </div>
                                            ';
		                                }else{
			                                echo '
                                                <strike class="combo-tile__price">
                                                        '.$price.' Р.
                                                </strike>
                                                <div class="combo-tile__price">
                                                        '.$sale_price.' Р.
                                                </div>
                                            ';
		                                }
	                                ?>
                                </div>

                                <button class="btn btn_border combo-tile__btn js-open-modal" data-modal="consult">
                                    Узнать подробности
                                </button>
                            </footer>
                        </li>
                        <?php endforeach;?>

                    </ul>
                </div>
            </div>
        </div>
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
<?php include('modules/_consult-modal.php'); ?>
<?php get_footer()?>

