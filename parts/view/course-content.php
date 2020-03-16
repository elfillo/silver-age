<?php
	function drawContent($content, $postId, $title){
		foreach ($content as $item){
			if(array_key_exists('simple_title-item', $item)){
				drawTitle($item['simple_title-item']);
			}
			if(array_key_exists('simple_article-item', $item)){
				drawArticle($item['simple_article-item']);
			}
			if(array_key_exists('simple_img-item', $item)){
				drawImg($item['simple_img-item']);
			}
			if(array_key_exists('simple_list-item', $item)){
				drawList($item['simple_list-item']);
			}
			if(array_key_exists('simple_accord-item', $item)){
				drawAccord($item['simple_accord-item']);
			}
			if(array_key_exists('simple_teachers-item', $item)){
				drawTeachers($item['simple_teachers-item']);
			}
			if(array_key_exists('simple_form-item', $item) && $item['simple_form-item']){
				drawForm($title);
			}
			if(array_key_exists('simple-review-item', $item) && $item['simple-review-item']){
				drawReview($postId);
			}
			if(array_key_exists('simple_serts-item', $item)){
				drawSerts($item['simple_serts-item']);
			}
		}
	}

	function drawImg($url){
		echo '<img src="'.$url.'">'.'<br/>';
	}

	function drawArticle($data){
		$text = '<p>'.$data.'</p>';
		$text .= '<br/><br/>';
		echo $text;
	}

	function drawTitle($data){
		$title = '<h2 class="display display_size_middle single-product__title">'.$data.'</h2>';
		echo $title;
	}

	function drawList($data){
		$list = '';
		foreach ($data as $item){
			$list .= '<li>'.$item['simple_list-item--content'].'</li>';
		}
		$ol = '<ol>'.$list.'</ol>';
		$ol .= '<br/><br/>';
		echo $ol;
	}

	function drawAccord($data){
		$list = '';
		foreach ($data as $item){
			$list .= '<li class="accardeon__item js-accardeon-parent">';
				$list .= '<button class="accardeon__head js-accardeon-action">';
				$list .= $item['simple_accord-item--title'];
				$list .= '<svg class="accardeon__icon" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="15" r="14.5" fill="#fff" fill-opacity=".5" stroke="#EAEAED"/><path d="M10.515 13l4.242 4.243m0 0L19 13m-4.243 4.243l-.353.353" stroke="#4D545B"/></svg>';
				$list .= '</button>';
				$list .= '<div class="accardeon__body js-accardeon-body"><div class="accardeon__inner">';
				$list .= $item['simple_accord-item--content'];
				$list .= '</div></div>';
			$list .= '</li>';
		}

		$ul = '<ul class="accardeon single-product__accardeon">'.$list.'</ul>';
		$ul .= '<br/><br/>';

		echo $ul;
	}

	function drawTeachers($data){
		$teachers = get_posts([
			'post_type' => 'teachers',
			'numberposts' => -1,
			'include' => $data
		]);
		$list = '';
		foreach ($teachers as $item){
			$list .= '';
			$list .= '
					<li class="doctor-card">
						'.get_the_post_thumbnail($item->ID, [178, 178]).'
						<div class="doctor-card__desc">
                <h5 class="doctor-card__position">
                  '.get_post_meta($item->ID, 'teacher-status', true).'
                </h5>
                <h3 class="doctor-card__name">
                  '.$item->post_title.'
                </h3>
                <div class="doctor-card__text">
                    <p>'.apply_filters('the_content', $item->post_content).'</p>
                </div>
            	</div>
            </li>';
		}
		$ul = '<ul class="single-product__doctors">'.$list.'</ul>';
		echo $ul;
	}

	function drawForm($title){
		$form = '
		<div class="single-product-form single-product__form">
        <div class="single-product-form__inner">
            <h2 class="single-product-form__title">
                Есть вопросы по программе? <br>
                Оставьте ваши контактные данные.
            </h2>
            <div class="single-product-form__text">
                <p>Наш менеджер перезвонит и проконсултирует вас</p>
            </div>
            <form action="" method="POST" class="form js-form">
                <div class="form__row">
                		<input type="hidden" name="courseName" value="'.$title.'">
                    <div class="form__half">
                        <input type="text" name="userName" class="form__input single-product-form__input" placeholder="Ваше имя*" data-required="">
                    </div>
                    <div class="form__half">
                        <input type="text" name="userPhone" class="form__input single-product-form__input js-mask-phone" placeholder="Ваш телефон*" data-required="">
                    </div>
                </div>
                <button type="submit" class="btn btn_fill form__submit single-product-form__submit js-submit">
                    Получить консультацию
                </button>
            </form>
        </div>
    </div>
		';
		echo $form;
	}

	function drawReview($id){
    $reviews = get_posts([
      'post_type' => 'review',
      'numberposts' => -1,
	    'meta_key' => '_course_item',
	    'meta_value' => $id
    ]);
    $review_link = get_page_data('reviews')->guid;
    $list = '';
    foreach ($reviews as $review){
    	$list .= '
    	  <li class="rewiew">
	              <div class="rewiew__body">
	                  <div class="rewiew__body-inner js-rewiew-body-inner">
	                      <p>'.$review->post_content.'</p>
	                  </div>
	              </div>
	              <footer class="rewiew__footer">
	                  <div class="user-info rewiew__user-info">
	                      <div class="user-info__avatar">
	                      	'.get_the_post_thumbnail($review->ID, [40, 40]).'
	                      </div>
	                      <div class="user-info__desc">
	                          <h3 class="user-info__name">
	                          	'.$review->post_title.'
	                          </h3>
	                          <time class="user-info__date">
	                          		'.$review->post_excerpt.'
	                          </time>
	                      </div>
	                  </div>
	                  <button class="rewiew__action js-rewiew-action">
	                      Читать весь отзыв
	                  </button>
	              </footer>
	          </li>
    	';
    }
    $block = '
    <div class="rewiews__content">
	      <ul class="rewiews__list">
	          '.$list.'
	      </ul>
	      <a href="'.$review_link.'" class="rewiews__show-more">
	          Посмотреть все отзывы
	      </a>
	  </div>    
  	';

    echo $block;
	}

	function drawSerts($data){
		$list = '';
		foreach ($data as $item){
			$list .= '
				<li class="course-license">
            <img src="'.$item['simple_serts-item-img'].'" class="course-license__thumb" alt="">
            <div class="course-license__text">
                <p>'.$item['simple_serts-item-content'].'</p>
            </div>
        </li>
			';
		}
		$ul = '<ul class="single-product__licenses">'.$list.'</ul>';
		echo $ul;
	}
?>