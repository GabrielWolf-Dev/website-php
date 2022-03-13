<?php
require('../../config.php');

use Source\Mailer\Email;

$data = [];

if(isset($_POST['form-home'])) {
    $template = file_get_contents(INCLUDE_PATH.'email_mkt/template.html');
    $email = strip_tags($_POST['email']);
    $name = explode("@", $email);

    if($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mail = new Email();
        $mail->addAdress($email, $name[0]);
        $mail->formatEmailMarketing('Conheça a Danki!', $template);
        $mail->sendEmail($data);
    }
} else if(isset($_POST['form-contact'])) {
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);

    $subject = "{$name} te enviou uma mensagem!";
    $body = "";
    foreach($_POST as $key => $value) {
        if($key !== 'form-contact'){ // Para não adicionar este campo...
            $body.=ucfirst($key).": ".strip_tags($value);
            $body.="<hr />";
        }
    }

    $mail = new Email();
    $mail->addAdress(MAIL['from_email'], MAIL['from_name']);
    $mail->formatEmailForm($subject, $body);
    $mail->sendEmail($data);
}