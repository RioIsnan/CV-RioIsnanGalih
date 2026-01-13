<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/phpmailer/Exception.php';
require '../assets/vendor/phpmailer/PHPMailer.php';
require '../assets/vendor/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // CONFIG SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rio.rigr9@gmail.com';   // EMAIL KAMU
    $mail->Password   = 'APP_PASSWORD_GMAIL';    // NANTI DIISI
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // SENDER
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('rio.rigr9@gmail.com'); // Email tujuan (kamu)

    // ISI EMAIL
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "
        <h3>Pesan Baru dari Website CV</h3>
        <p><b>Nama:</b> {$_POST['name']}</p>
        <p><b>Email:</b> {$_POST['email']}</p>
        <p><b>Pesan:</b><br>{$_POST['message']}</p>
    ";

    $mail->send();
    echo 'OK';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
