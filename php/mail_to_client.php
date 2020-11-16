<?php 

session_start();
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
session_write_close();

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                              

$mail->isSMTP();                                     
$mail->Host = 'smtp.mail.ru';  																							
$mail->SMTPAuth = true;
$mail->Username = 'akortua@list.ru'; // Логин и пароль почты, с которой отправляется
$mail->Password = 'rmhyBYTuY11('; 
$mail->SMTPSecure = 'ssl';                          
$mail->Port = 465; 

$mail->setFrom('akortua@list.ru'); // Отправитель
$mail->addAddress($email);     // Адресат
$mail->isHTML(true);                                 

$mail->Subject = 'Подтверждение заказа';
$mail->Body    = 'Уважаемый ' . $name . '!   <br> Спасибо за заявку! <br> С вами свяжутся в ближайшее время. ';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('Location: /');
}

?>