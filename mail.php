<?php
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
// error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
// require("vendor/PHP/src/PHPMailer.php");
// require("vendor/PHP/src/SMTP.php");

// $mail = new PHPMailer\PHPMailer\PHPMailer();

//PHPMailer Object
$mail = new PHPMailer;
// $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
    
$mail->Host = "smtp.sendgrid.net";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "apikey";                 
$mail->Password = "private";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to 
$mail->Port = 465;     

$mail->addReplyTo($_POST["from"], $_POST["name"]);

$mail->From = "admin@nith.ml";
$mail->FromName = "Nithin S";

$to = "nithin.s491@gmail.com";
$mail->addAddress($to);
$mail->isHTML(true);
$subject = $_POST["subject"];
$body = $_POST["body"];

$mail->Subject = $subject;
$mail->Body = "<h2>".$_POST["name"]."</h2><h3>".$_POST["from"]."</h3>".$body;
$mail->AltBody = $body;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
?>