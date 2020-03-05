<?php
	/*
		Template Name: Отзывы
	*/
?>
<?php
	$rewiews = get_posts([
		'post_type' => 'review',
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
                    Отзывы
                </li>
            </ul>

            <h1 class="display display_size_big page__title">
                Отзывы
            </h1>

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
                </div>
            </div>
        </div>
    </section>
      
    <?php include('modules/_rewiew-modal.php'); ?>
    <?php include('modules/_consult-modal.php'); ?>

<?php get_footer()?>