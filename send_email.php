<?php

	if (isset($_POST['name'])) {
	
		$name = strip_tags($_POST['name']);
		$email= strip_tags($_POST['email']);		
		$subject = strip_tags($_POST['subject']);
		$comments = strip_tags($_POST['comments']);
		
		$message="お問い合わせが届きました。\n\n";
		$message.= "Name: ".$name."\n";
		$message.="Email: ".$email."\n";
		$message.="Comments: ".$comments;
		
		if (validate_email($email) && !empty($name) && !empty($subject) && !empty($comments) ) {
		
			if (mail('test@test.test', $subject, $message, "From: $email")) {
				echo "<h2>Your message has been sent. Thanks!!</h2>
							<h3>メッセージが送信されました。ありがとうございました。</h3>
							<h3>できるだけ早く返信致しますのでしばしお待ちください。</h3>";
			} else {
				echo "<h2>Problem occured while sending email</h2>
							<h3>送信中に何らかのトラブルが発生しました。大変申し訳ございませんがもう一度お試しください。</h3>";
			}
		
		} else {
		
			echo "<h2>Please fill out all fields and ensure that your email address is valid.</h2>
						<h3>フォーム内の全ての項目を記入ください。また、メールアドレスが正しくない可能性もあります。</h3>";

		}
	
	} else {
		echo "<h2>Please fill out all fields and ensure that your email address is valid.</h2>
					<h3>フォーム内の全ての項目を記入ください。また、メールアドレスが正しくない可能性もあります。</h3>";
	}
	
	function validate_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
?>
