<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('LOCATION:login.php'); die();
}
header('Content-type: text/html; charset=utf-8');
/**
 * This example shows how to use POP-before-SMTP for authentication.
 * POP-before-SMTP is a very old technology that is hardly used any more.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.server.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mail@domen.ru';                 // SMTP username
    $mail->Password = 'password';                           // SMTP password
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('от кого', 'WEB FORM');
    $mail->addAddress('кому', ' ');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/images.jpg', 'new.jpg');    // Optional name

    //Content
    $station = $_POST['stationNameSelection'];
    $dataIncident = $_POST['dataIncident'];
    $appealingMan = $_POST['appealingMan'];
    $methodOfCirculation = $_POST['methodOfCirculation'];
    $comment = $_POST['comment'];
    $executor = $_POST['executor'];
    $result = $_POST['result'];

    $letterHeader = $station . ' от ' . $appealingMan;
    $letter = 'Заявка от ' . $dataIncident . ' принята по ' . $methodOfCirculation . '.<br> <br>Пояснение:<br>' . $comment . '<br><br>' . 'Исполнитель: ' . $executor . '<br>Статус заявки: ' . $result;

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $letterHeader;
    $mail->Body    = $letter;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
    }

    $mail->send();
    header('Refresh: 5; URL=http://192.168.5.46/incident/index.php');
    echo 'Сообщение было успешно отправлено ! Вы будите перенаправлены на страницу формы обратно через 5 секунд';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}