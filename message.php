<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Loading PHPMailer
    require('vendor/autoload.php');

    // Receiving user inputs
    $yourName = isset($_POST['your_name']) ? $_POST['your_name'] : 'Not informed';
    $yourEmail = isset($_POST['your_email']) ? $_POST['your_email'] : 'Not informed';
    $yourMessage = isset($_POST['your_message']) ? $_POST['your_message'] : 'Not informed';

    $emailBody = "Name: $yourName <br/> E-mail: $yourEmail <br/> Message: $yourMessage";

    $mailer = new PHPMailer();
    $mailer->isSMTP(true);
    $mailer->isHTML(true);
    $mailer->Host = 'mail40.redehost.com.br';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'no-reply@andrecampestrini.com';
    $mailer->Password = 'C89%3jE7t062U9X4g901Ge76630Dy85z';
    $mailer->Port = 587;

    $mailer->setFrom('no-reply@andrecampestrini.com', 'andrecampestrini.com');
    $mailer->addReplyTo($yourEmail, $yourName);
    $mailer->addAddress('andre.bnu3@gmail.com');
    $mailer->Subject = 'Message sent from andrecampestrini.com';
    $mailer->Body = $emailBody;

    if($mailer->send()) {
        header('Location: /success.html');
    } else {
        header('Location: /error.html');
    }

    exit();
}

header('Location: /');
exit();
