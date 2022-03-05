<?php
namespace Source\Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $mailer;

    function __construct() {
        $this->mailer = new PHPMailer();

        try {
            $this->mailer->isSMTP();

            $this->mailer->SMTPAuth = true;
            $this->mailer->SMTPSecure = 'tls';
            $this->mailer->Host = MAIL['host'];
            $this->mailer->Username = MAIL['from_email'];
            $this->mailer->Password = MAIL['passwd'];
            $this->mailer->Port = MAIL['port'];
            

            $this->mailer->isHTML(true);
            $this->mailer->CharSet = 'utf-8';
        } catch(Exception $error) {
            echo "Erro ao enviar mensagem: {$error}";
        }
    }

    public function addAdress($email, $name) {
        $this->mailer->setFrom(MAIL['from_email'], MAIL['from_name']);
        $this->mailer->addAddress($email, $name);
    }

    public function formatEmailMarketing($subject, $html){
        $this->mailer->Subject = $subject;
        $this->mailer->msgHTML($html);
    }

    public function formatEmailForm($subject, $body){
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;
        $this->mailer->AltBody = $body;
    }

    public function sendEmail($data) {
        if($this->mailer->send()){
            $data['success'] = true;
            $data['error'] = false;
        } else {
            $data['success'] = false;
            $data['error'] = true;
        }

        die(json_encode($data));
    }
}