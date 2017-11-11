<?php
header('Content-Type: text/html; charset=utf-8');


function mailer($emaiNhan,$tenNguoinhan,$subject,$content){

	require ('Mailer/src/PHPMailer.php');

	$mail = new PHPMailer(true);       // Passing `true` enables exceptions
	$mail->CharSet = 'UTF-8'; 
	try {
	    //Server settings
	    $mail->SMTPDebug = 2;

	    $mail->isSMTP();                                     
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'huonghuong08.php@gmail.com';   //mail gửi  // SMTP username
	    $mail->Password = '0123456789999';                           // SMTP password

	    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    // $mail->Port = 587;     // TCP port to connect to

	    $mail->SMTPSecure  = "ssl";
	    $mail->Port = 465;

	    //Recipients
	    $mail->setFrom('huonghuong08.php@gmail.com', 'Tên người gửi'); //thông tin người nhận
	        // Add a recipient
	    $mail->addAddress($emaiNhan,$tenNguoinhan);               // Name is optional
	    $mail->addReplyTo('huonghuong08.php@gmail.com', 'Reply....');
	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;

	    $mail->Body    = $content;
	   // $mail->AltBody = 'Đây là nội dung thư, chào bạn.......'; //ko có HTML

	    $mail->send();
	    return true;
	} 
	catch (Exception $e) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    return false;
	}
}
?>