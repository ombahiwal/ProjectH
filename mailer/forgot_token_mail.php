        <?php
// 4 digit random token

error_reporting(0);
if(isset($_REQUEST['to']))
{
	$to=$_REQUEST['to'];
	$subject="Hetvi_Moda - Password Change Token";
$body="Hi,User<br> Your Token for changing account password is<br><h3>{$_REQUEST['token']}</h3><br>Regards, <br>Hetvi Team";
	
include 'classes/class.phpmailer.php';
   $mail= new PHPMailer();
   $mail->isSMTP();
   $mail->SMTPDebug=0;
   $mail->SMTPAuth=true;
   $mail->SMTPSecure='ssl';
   $mail->Host="smtp.gmail.com";
   $mail->Port=465;
   $mail->isHTML(true);
   $mail->Username="ombahiwal@gmail.com";   // Add your Gmail Address.
   $mail->Password="Omkar109";           
   $mail->setFrom("ombahiwal@gmail.com");  // Add your Gmail Address.
   $mail->Subject=$subject;
   $mail->Body=$body;
   $mail->addAddress($to);
   if(!$mail->send())
   {
   	 echo "Mailer Error.".$mail->ErrorInfo;
   }
   else
   {
   	  echo "Message has been send Successfully!";
       echo "<script>window.location = \"http://localhost:8888/ProjectH/forgot.php?token=1&mail={$to}\"</script>";
   }
}

?>


