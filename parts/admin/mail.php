<?php
function getBookingForm(){
	parse_str($_POST['data'], $data);

	$sendTo = get_post_meta(get_page_data('contacts')->ID, 'email_tech', true);

	$newLine = "<br/>";

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: Заявка с сайта Серебряный Век <from@example.com>\r\n";
	$headers .= "Reply-To: '.$sendTo.'\r\n";

	$to      = $sendTo;

	$subject = 'Заявка с сайта Серебряный Век';
	$message = '';

	if(array_key_exists('consultName', $data)){
		$message .= 'Заявка о кунсультации.'.$newLine;
		if(array_key_exists('course_name', $data)){
			$message .= 'Курс: '.$data['course_name'].$newLine;
			$message .= 'Формат обучения: '.$data['course_type'].$newLine;
		}
		$message .= 'Имя: '.$data['consultName'].$newLine;
		$message .= 'Телефон: '.$data['consultPhone'].$newLine;
	}

	if(array_key_exists('rewiewName', $data)){
		$message .= 'Отзыв с сайта.'.$newLine;
		$message .= 'Имя: '.$data['rewiewName'].$newLine;
		$message .= 'Телефон: '.$data['rewiewPhone'].$newLine;
		$message .= 'Текст: '.$data['rewiewText'].$newLine;
	}

	if(array_key_exists('courseName', $data)){
		$message .= 'Вопросы по курсу: '.$data['courseName'].$newLine;
		$message .= 'Имя: '.$data['userName'].$newLine;
		$message .= 'Телефон: '.$data['userPhone'].$newLine;
	}

	if(array_key_exists('sertName', $data)){
		$message .= 'Вопросы по подарочному сертификату'.$newLine;
		$message .= 'Имя: '.$data['sertName'].$newLine;
		$message .= 'Телефон: '.$data['sertPhone'].$newLine;
	}

	mail($to, $subject, $message, $headers);
}

add_action('wp_ajax_nopriv_booking', 'getBookingForm' );
add_action('wp_ajax_booking', 'getBookingForm' );
?>
