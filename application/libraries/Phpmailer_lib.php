<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'third_party/PHPMailer/src/Exception.php';
require APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer/src/SMTP.php';

class Phpmailer_lib
{
    public function __construct()
    {
        log_message('debug', 'PHPMailer class is loaded.');
    }

    public function sendMail($to, $subject, $message)
    {     
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 0;

            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            // $mail->Username = 'prasenjittamuly@gmail.com';
            // $mail->Password = 'nipuimvjusoimyfp';

            //Restaura Qube
            $mail->Username = 'restauraqube@gmail.com';
            $mail->Password = 'hbsrzqzyllbumyex';
            
            // Sender and recipient settings
            $mail->setFrom('restauraqube@gmail.com', 'Restaura Qube');
            $mail->addAddress($to);
            $mail->AddCC("restauraqube@gmail.com");

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
           
        } catch (Exception $e) {
            log_message('error', 'Email could not be sent: ' . $mail->ErrorInfo);
          
            return false;
        }
    }
}