<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Include the PHPMailer library

function sendEmail($recipient_email)
{
    $subject = 'Test Mailer';

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ghostbmer@gmail.com'; //username here
        $mail->Password = 'jwlsxfmvuawzalix'; //app password here/email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipient
        $mail->setFrom('ghostbmer@gmail.com', 'Bitscap');
        $mail->addAddress($recipient_email);

        // Content
        $mail->isHTML(true); // Set to true to send HTML content
        $mail->Subject = 'Bitscap';

        // HTML email template
        $emailTemplate = '
        <html>
        <body style="font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;">
        <div style="max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        
        <p><br>Hello  User,</p>
      <br><p style="text-align: left;
      color: #333;
      "><br>Welcome to Bitscap pro, your one stop for a quick passive income, looking forward to trade? Or need any help chat with us on our chatbot.</p>
      <br>
      
<br>
</div>
</body>
</html>
';

        $mail->msgHTML($emailTemplate);

        $mail->send();
        header('Location:login.php');
    } catch (Exception $e) {
        return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        // header('Location:failed.php');
    }
}