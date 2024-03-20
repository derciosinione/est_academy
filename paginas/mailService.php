<?php


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/../../vendor/autoload.php';

class mailService
{
    public $systemEmail;
    private $mail;

    function __construct()
    {
        $this->systemEmail = "troy83@ethereal.email";
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.ethereal.email';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->systemEmail;
        $this->mail->Password = 'D6vr9xZf5uAUzRDJcH';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
    }

    function sendEmail($userName, $destination, $subject, $description, $redirectUrl, $redirectMessage)
    {
        try {
            $message = $this->htmlMessageTemplate($userName, $description, $redirectUrl, $redirectMessage);

            $this->mail->setFrom($this->systemEmail, "Est Empregos");
            $this->mail->addAddress($destination);
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->CharSet = 'UTF-8';
            $this->mail->ContentType = 'text/html';
            $this->mail->isHTML();

            return $this->mail->send();
        } catch (Exception $ex) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    private function htmlMessageTemplate($userName, $description, $redirectUrl, $redirectMessage): string
    {
        // HTML message
        return <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Email Content</title>
            </head>
            <body>
                <p><b>Boa tarde $userName</b>,</p>
                <p>$description</p>
                <p><a href="$redirectUrl" target="_blank">$redirectMessage</a></p>
            </body>
            </html>
        HTML;
    }
}