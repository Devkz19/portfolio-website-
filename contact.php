<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']));

{
    $name = $_POST['myname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
}

// Load Composer's autoloader
require 'php mailer/Exception.php';
require 'php mailer/PHPMailer.php';
require 'php mailer/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
   
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'devk072003@gmail.com';                 // SMTP username
    $mail->Password   = 'mntd kxgb msyf fubj';                    // SMTP password: Use the generated App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
    $mail->Port       = 465;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('devk072003@gmail.com', 'Contact Form');
    $mail->addAddress('devk072003@gmail.com', 'Dev Zinzuvadiya');  // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Contact Form';
    $mail->Body    = "Sender name: $name  <br>  Sendern Email : $email  <br> Message : $message ";

    $mail->send();
    echo "<div class='confirmation-message'>";
    echo "<p>Your message has been sent! Our administrator will contact you soon.</p>";
    echo "<p><a href='index.html'>Go back to Home Page</a></p>";
    echo "</div>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>