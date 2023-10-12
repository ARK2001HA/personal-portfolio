<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) 
{
  $name=$_POST['name'];
  $email=$_POST['email'];
    $phone=$_POST['phone'];
    $msg=$_POST['message'];

    $message='Name:<br>'.$name.'<br>'.'<hr>Email:<br>'.$email.'<br>'.'<hr>Phone:<br>'.$phone.'<br><hr>Message:<br>'.$msg;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anandrajkeshari2001@gmail.com'; //host email 
    $mail->Password = 'fkxlyyoqrxdkznry';// app password of your host email
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);//Sender's Email and Name
    $mail->addAddress('anandrajkeshari2001@gmail.com','Anand Raj Keshari'); //Receiver's Email and Name
    //$mail->addAddress('receiver's email 2', 'Name'); //Receiver's Email and Name
    //$mail->Subject = ("$subject");
    $mail->Body = $message;
    $mail->send();

    if ($mail) 
    {
    echo "<script>alert('Thanks for contacting us!')</script>";
    echo "<script>window.location.href='homepage.php'</script>";
	}
	else 
	{
    echo "Email sending failed: " . $mail->ErrorInfo;
	}
}

?>