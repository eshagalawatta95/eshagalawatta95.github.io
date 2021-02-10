<?php
// Check for empty fields
include("class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message

 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPDebug  = 1;   
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";

$mail->Username = "deanrox95@gmail.com";
$mail->Password = "eshan456456"; 
  
$mail->From = "deanrox95@gmail.com";
$mail->FromName = "My Website Contact";
 
$mail->AddAddress("esh.agalawatta@gmail.com","My Website Contact");
$mail->Subject = "HBSI Contact";
//$mail->IsHTML(true);

$mail->Body =  "Name : ". $name."\r\n E-mail : ". $email."\r\Phone : ". $phone ."\r\nMessage : ". $message."";
 
	$mail->Port = 80;
	if(!$mail->Send()) {
         echo "Message sending faild" ;
    } 
     else {
          echo "Message has been sent";
    }
return true;         
?>