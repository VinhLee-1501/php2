<?php

namespace App\Helpers\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';
require_once 'src/Exception.php';

class Mailer
{
    public function sendMail($title, $content, $addressMail)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'utf-8';                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lephuocminh12321@gmail.com';                     //SMTP username
            $mail->Password   = 'tcncvpfwqwicrtwv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('lephuocminh12321@gmail.com', 'Sona');
            $mail->addAddress($addressMail);     //Add a recipient
//            $mail->addAddress('ellen@example.com');               //Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
//
//            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function welcome($addressMail, $fullName)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'utf-8';                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lephuocminh12321@gmail.com';                     //SMTP username
            $mail->Password   = 'tcncvpfwqwicrtwv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('lephuocminh12321@gmail.com', 'Sona');
            $mail->addAddress($addressMail);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '<div style="padding: .75rem 1.25rem; color: #fff; background-color: #007bff; border-bottom: 1px solid #dee2e6;">
                                            <h2 style="margin-bottom: 0;">Chào mừng thành viên mới!</h2>
                                        </div>';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px;">
                                <div style="margin: 2.5rem 0;">
                                    <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem;">

                                        <div style="padding: 1.25rem;">
                                            <p>Xin chào, '.$fullName.'</p>
                                            <p>Chúng tôi rất vui mừng khi bạn gia nhập cộng đồng của chúng tôi. Chúc bạn có những trải nghiệm tuyệt vời!</p>
                                            <p>Trân trọng,</p>
                                            <p>Đội ngũ hỗ trợ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
