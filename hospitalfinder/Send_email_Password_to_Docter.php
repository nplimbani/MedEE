<?php
require"Config.php";
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
header('Content-Type: application/json');



$obj=new Config();
if(isset($_POST["email_id"]) && isset($_POST["password"])){

  $result=$obj->myQuery("select email_id,password from login where `email_id`= '".$_POST["email_id"]."'  ")->fetch_assoc();
  if($result!=""){


  $mail->isSMTP();                                  // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                            // Enable SMTP authentication
  $mail->Username = 'cgpbmd@gmail.com';          // SMTP username
  $mail->Password = '852000denish'; // SMTP password
  $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                 // TCP port to connect to

  $mail->setFrom(' ', 'HospitalFinder');
  $mail->addReplyTo('', 'HospitalFinder');
  $mail->addAddress($_POST["email_id"]);   // Add a recipient


  $mail->isHTML(true);  // Set email format to HTML

  $bodyContent = '<h1>YOUR Email Id and Password  IS:</h2>';
  $bodyContent .= '<p>Email Id</b></p>';
  $bodyContent.=$_POST["email_id"];
  $bodyContent .= '<p>Password:</b></p>';
  $bodyContent.=$_POST["password"];


  $mail->Subject = 'Email id and Password';
  $mail->Body    = $bodyContent;

  if(!$mail->send()) {
    $return["STATUS"]="0";
    $return["emial_status"]="not send";

  } else {
    $return["STATUS"]="1";
    $return["emial_status"]="send";


  }

  }else{
    $return["STATUS"]="00";
    $return["emial_status"]="email was not Signup yet";


  }
}
  else{
    $return["STATUS"]="000";
    $return["emial_status"]="Field is not set";


  }
  echo json_encode($return);
