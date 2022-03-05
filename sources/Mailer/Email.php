<?php
namespace Mailer;

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

    public function formatEmailForm(){}

    public function sendEmail() {
        if($this->mailer->send()){
            echo "<script>alert('Mensagem enviada com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível enviar a mensagem :( {$this->mailer->ErrorInfo}');</script>";
        }
    }
}