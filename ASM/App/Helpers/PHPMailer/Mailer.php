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
            $mail->Subject = 'Chào mừng thành viên mới!';
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

    public function welcomeInsert($addressMail, $fullName, $password)
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
            $mail->Subject = 'Chào mừng thành viên mới!';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px;">
                                <div style="margin: 2.5rem 0;">
                                    <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem;">

                                        <div style="padding: 1.25rem;">
                                            <p>Xin chào, '.$fullName.'</p>
                                            <p>Chúng tôi rất vui mừng khi bạn gia nhập cộng đồng của chúng tôi. Chúc bạn có những trải nghiệm tuyệt vời!</p>
                                            <p>Mã bảo mật của bạn là: '.$password.'</p>
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

    public function BookRoom($addressMail, $fullName, $bookDay, $checkIn, $checkOut)
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
            $mail->Subject = 'THÔNG TIN ĐẶT PHÒNG';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px;">
                                <div style="margin: 2.5rem 0;">
                                    <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem;">
                                        <div style="padding: 1.25rem;">
                                            <p>Kính chào quý khách, '.$fullName.'</p>
                                            <p>Quý khách đã đặt phòng thành công. Hãy kiểm tra lại thông tin</p>
                                            <p>Thời gian đặt phòng: '.date('Y-m-d', strtotime($bookDay)).'</p>
                                            <p>Thời gian checkIn: '.date('Y-m-d', strtotime($checkIn)).'</p>
                                            <p>Thời gian checkOut: '.date('Y-m-d', strtotime($checkOut)).'</p>
                                            <br>
                                            <p>Nếu có sai sót xin hãy liên hiện đến với địa chỉ '.$mail->Username.' để được hỗ trợ</p>
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

    public function updateBookRoom($addressMail, $fullName, $bookDay, $checkIn, $checkOut, $quality)
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
            $mail->Subject = 'THÔNG TIN ĐẶT PHÒNG';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px; font-family: Arial, sans-serif; color: #333;">
    <div style="margin: 2.5rem 0;">
        <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <div style="padding: 1.25rem; line-height: 1.6;">
                <p style="font-size: 1.1em;"><strong>Kính chào quý khách, '.$fullName.'</strong></p>
                <p>Quý khách đã cập nhật thông tin thành công. Hãy kiểm tra lại thông tin</p>
                <p>Thời gian cập nhật: <strong>'.date('Y-m-d', strtotime($bookDay)).'</strong></p>
                <p>Thời gian checkIn: <strong>'.date('Y-m-d', strtotime($checkIn)).'</strong></p>
                <p>Thời gian checkOut: <strong>'.date('Y-m-d', strtotime($checkOut)).'</strong></p>
                <p>Số lượng khách hàng: <strong>'.$quality.'</strong></p>
                <p>Nếu có sai sót xin hãy liên hiện đến với địa chỉ <strong>'.$mail->Username.'</strong> để được hỗ trợ</p>
                <p style="margin-top: 2em;">Trân trọng,</p>
                <p><strong>Đội ngũ hỗ trợ</strong></p>
            </div>
        </div>
    </div>
</div>
';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function MailThank($addressMail, $fullName, $nameType, $totalPrice, $dayUse, $checkIn, $checkOut ,$price)
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
            $mail->Subject = 'THƯ CẢM ƠN SỬ DỤNG DỊCH VỤ';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px; font-family: Arial, sans-serif; color: #333;">
    <div style="margin: 2.5rem 0;">
        <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <div style="padding: 1.25rem; line-height: 1.6;">
                <p style="font-size: 1.1em;"><strong>Kính chào quý khách, '.$fullName.'</strong></p>
                <p>Sona hotel chân thành cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ tại đây.
                Chúng tôi rất cảm kích khi đã được phục vụ quý khách.</p>
                <br>
                <p><strong>Thông tin đặt phòng:</strong></p>
                <p>Loại phòng sử dụng: <strong>'.$nameType.'</strong></p>
                <p>Tiền mỗi đêm: <strong>'.number_format($price).'/đêm</strong></p>
                <p>Thời gian sử dụng: <strong>'.$dayUse.' ngày</strong>. Từ ngày <strong>'.date("d-m-y", strtotime($checkIn)).'</strong> đến <strong>'.date("d-m-y", strtotime($checkOut)).'</strong></p>
                <p>Tổng tiền: <strong>'.number_format($totalPrice).'</strong></p>
                <p>Sự hài lòng của quý khách là nguồn động lực to lớn để chúng tôi không ngừng nỗ lực và
                cải tiến dịch vụ. Chúng tôi luôn mong muốn mang đến cho quý khách những trải nghiệm tốt
                nhất khi lưu trú tại Sona hotel.</p>
                <br>
                <p>Chúng tôi rất mong được đón tiếp quý khách trong thời gian sắp tới. Xin chân thành cảm ơn
                và kính chúc quý khách có những ngày vui vẻ và thú vị.</p>
                <p style="margin-top: 2em;">Trân trọng,</p>
                <p><strong>Đội ngũ hỗ trợ</strong></p>
            </div>
        </div>
    </div>
</div>
';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function changeInfo($addressMail, $fullName)
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
            $mail->Subject = 'THÔNG BÁO CẬP NHẬT THÔNG TIN';
            $mail->Body = '
                            <div style="margin: 0 auto; max-width: 540px;">
                                <div style="margin: 2.5rem 0;">
                                    <div style="margin-top: 3rem; border: 1px solid #dee2e6; border-radius: .25rem;">

                                        <div style="padding: 1.25rem;">
                                            <p>Kính chào quý khách, '.$fullName.'</p>
                                            <p>Quý khách vừa cập nhật thông tin thành công !</p>

                                            <p>Có phải quý khách vừa cập nhật thông tin không ?</p>

                                            <p>Nếu đúng là như vậy thì xin bỏ qua email này.</p>
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

    function sendContact($addressMail, $title, $content, $fullName)
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
            $mail->setFrom($addressMail, $fullName);
            $mail->addAddress('lephuocminh12321@gmail.com');     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title.' , Từ khách hàng '.$fullName;
            $mail->Body = $content;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function marketing($addressMail)
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
            $mail->addAddress($addressMail);
            $mail->AddEmbeddedImage('../../../public/assets/admin/images/bg-header.png', 'img_header', 'bg-header.png');
            //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Tiêu đề';
            $mail->Body = '
                            <div style="margin: 0 auto;
        max-width: 540px;
        font-family: Arial, sans-serif;
        color: #333;">
                    <div style="margin: 2.5rem 0">
                        <div style="
                        margin-top: 3rem;
                        border: 1px solid #dee2e6;
                        border-radius: 0.25rem;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <div style="padding: 1.25rem; line-height: 1.6">
                                <img src="cid:img_header" style="width: 100%;" alt="PHPMailer"  />
                                <p style="text-align: center;"><strong>Sona Hotel - Nơi bạn lưu giữ những khoảnh khắc mùa hè đáng nhớ!</strong></p>

                                <p style="margin-top: 2em">Trân trọng,</p>
                                <p><strong>Đội ngũ hỗ trợ</strong></p>
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
