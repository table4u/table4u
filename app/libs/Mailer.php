<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class Mailer
{
    // Instantiation and passing `true` enables exceptions

    //protected $mail = new PHPMailer(true);

    public function mailto($subject, $to, $body)
    {

        $mail = new PHPMailer(true);
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '1e1ad67c9c649d';                       // SMTP username
        $mail->Password   = '41d1d26532c22b';                       // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('table4ug06@gmail.com', 'Table4U');
        $mail->addAddress($to);     // Add a recipient

        //$body="<strong>Hello</strong> delivery test";
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent successfuly';
    }
}

