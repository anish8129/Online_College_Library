<?php
if(isset($_POST['email']))
{
	$email=$_POST['email'];
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'prjct');
	$q=mysqli_query($con,"select *from registred where Email='$email'");
	if(mysqli_num_rows($q)===0)
		echo "<h3>Invalid Email id</h3>";
	else
	{	
		$data=mysqli_fetch_array($q);
		$username=$data['Username'];
		$genpassword=substr(md5(rand(9999,999999)),0,5);
		if(sendmail($email,$username,$genpassword)==='Message has been sent')
			changepassword($email,$genpassword);
		else
			echo "Something Went wrong Pls Check your conection";
	}
	mysqli_close($con);
}
else{}	


 ?>
<doctype! HTML>
<html lang="en">
<head>
      <title> For Getting Password</title>
	  <link rel="stylesheet" type="text/css" href="new 1.css" />
</head>
<body>
		<h1 style="text-align:right;width:865px;">Change your Password</h1>
		<div id='reg' style="height:200px;border:5px solid black;border-radius:10px;" >
			<form method="post" action="forgot.php">
				<ul type="none">
				 <li><input type="email"placeholder="Enter your email id" class="l" name="email" required/></li>
				 <li><input type="submit"class="l" value='Recover'/></li>
				
				</ul>
			</form>
		</div>
		<footer Style="background-color:lightgreen;height:115px;border:5px solid black;border-radius:10px; padding:10px">
<div style="height:100px;width:200px;left:300px;position:relative;bottom:10px"><ul type="none"><li><h3>About Us</h3></li><li><h3>Our Career</h3></li><li><h3>Our Terms</h3></li></ul></div>
<article style="height:100px;width:300px;position:relative;bottom:115px;left:800px;border-style:dashed;border-width:0px 0px 0px 2px;padding:0px 0px 0px 20px; font-size:20px" >
<b>Our Mission : To provide books in pdf. to motivate students those who have lost their selfconfidence. Encourage them to take a new start</b>
</article>
<p style="background-color:lightgreen;position:relative;bottom:109px;left:350px;width:600px;border-width:0px 5px 5px 5px;border-radius:7px;border-style:solid;padding:5px">copyrigth by onlinecollegeliraries.com for any queries mail us at anish8129@gmail.com</p>
</footer>
</body>

</html>
<?php
	function changepassword($email,$password)
	{
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'prjct');
		$password=md5($password);
		if(mysqli_query($con,"update registred set Password='$password',flag=1 where Email='$email'"))
		{
					echo "<h3>We have mailed you. Go check your email</h3>";
					
					
		}
		mysqli_close($con);
	}
	function sendmail($email,$username,$emailcode)
	{
		require 'mail/PHPM/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'anishs812@gmail.com';                 // SMTP username
		$mail->Password = 'mainhudon';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		$mail->setFrom('anishs812@gmail.com', 'Anish');
		$mail->addAddress($email,$username);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('hemanshusani@gmail.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
			
		$mail->Subject = 'Forgot Password/Password Recovery';
		$mail->Body    = "Hello ".$username.",<br> Your New Password is<br><br>email=".$email." and Password=".$emailcode;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) 
		{
			//echo 'Message could not be sent.';
			return 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
 		else
		{
			return 'Message has been sent';
		}
	}




 ?>