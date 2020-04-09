<?php
require"Config.php";
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
header('Content-Type: application/json');



$obj=new Config();
if(isset($_POST["email_id"])){

  $result=$obj->myQuery("select email_id,password from login where `email_id`= '".$_POST["email_id"]."'  ")->fetch_assoc();


  /*$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                   .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                   .'0123456789!@#$%^&*()'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];*/


$otp=rand(100000,999999);
  if($result!=""){

  /*$filedname["password"]=md5($rand);
  $where["email_id"]=$_POST["email_id"];
  $resultUpdate=$obj->update("login",$filedname,$where,"or");*/
  $return["STATUS"]="1";
  $return["otp"]=$otp;

}else{
  $return["STATUS"]="0";
  $return["otp"]="0";

}



/*$from = "cgpbmd@gmail.com";
    $to = $_POST["email_id"];
    $subject = "New Password";
    $message = "regarding passwrod";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    // echo "The email message was sent.";*/


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
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  $mail->isHTML(true);  // Set email format to HTML

  $bodyContent = '<h1>YOUR ONE TIME PASSWORD IS:</h1>';
  $bodyContent .= '<p>otp</b></p>';
  $bodyContent.=$otp;

  $mail->Subject = 'OTP';
  $mail->Body    = $bodyContent;

  if(!$mail->send()) {
    $return["emial_status"]="not send";
      /*echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;*/
  } else {
    $return["emial_status"]="send";

      //echo 'Message has been sent';
  }
  /*$sendmail = "shaifalimpct13@gmail.com";
         $to       = $_POST["email_id"];

         $subject  = "Send Recover Password ";
         $htmlContent = '<html>
                   <head>
                     <title>Welcome to Charutar Vidhyamandal</title>
                   </head>
                   <body>
                     <h1> Sign In</h1>
                     <p>Your Password Detail Are:-</p>


                     <p>Password :&nbsp; <span>'.$rand.'</span></p>
                   </body>
                 </html>';

         // Set content-type header for sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

         // Additional headers
         $headers .= 'From:'.$sendmail. "\r\n";

         // Send email
         if(mail($to,$subject,$htmlContent,$headers)):
           //echo $successMsg = 'Email has sent successfully.';
           echo '<script>alert(" Your  Passowrd Has Sent To your Email Account. ");</script>';
           echo '<script>window.location.replace("'.$base_url.'");</script>';

         else:
           //echo $errorMsg = 'Email sending fail.';
           echo '<script>
               alert("Request sending fail.");
             </script>';
         endif;*/
}
echo json_encode($return);
