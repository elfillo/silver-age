<?php
function getBookingForm(){
	parse_str($_POST['data'], $data);

	$sendTo = get_post_meta(get_page_data('contacts')->ID, 'email_tech', true);

	$newLine = "<br/>";

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: От кого письмо <from@example.com>\r\n";
	$headers .= "Reply-To: '.$sendTo.'\r\n";

	$to      = $sendTo;

	$subject = 'Письмо с сайта';
	$message = '';

	if(array_key_exists('consultName', $data)){
		$message .= 'Заявка о кунсультации.'.$newLine;
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

	mail($to, $subject, $message, $headers);
}

add_action('wp_ajax_nopriv_booking', 'getBookingForm' );
add_action('wp_ajax_booking', 'getBookingForm' );
?>
