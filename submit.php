<body style="background:lightgreen" ></body>
<?php  
  if((!isset($_POST['username']))||(!isset($_POST['email']))||(!isset($_POST['password'])))
	{
		header('location:http://localhost/project/index.php');
	}
  else
  {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$emailcode=md5($password + microtime());
	
	if(strlen($username)<3)
	 {
		echo "<h3>Username Must be greater than three characters</h3>";
		exit();		
	 }
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo "<h3>you have entered an invalid email</h3>";
		exit();
	}
	else if(strlen($password)<5)
	{
		echo "<h3>Password length must be between 5 to 20 letters</h3>";
		exit();
	}
	else
	{ 
		if(sendmail($email,$username,$emailcode)==='Message has been sent')
			enter($username,$email,$password,$emailcode);
		else
			echo "Something went wrong Please Check your connection";
	}
  }
     function enter($username,$email,$password,$emailcode)
	{
		//echo "I am in Enter func";
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'prjct');
		$chk="select *from registred where email='$email'";
		$row=mysqli_num_rows(mysqli_query($con,$chk));
		if($row==0)
		{
			
			$password=md5($password);
			//echo  "Hello ".$username.", \n\nTo Activate your account click in the link given below: \n\nf38f5bi458bdwsnw43vujfnd939v<a href=activate.php?email=".$email."&emailcode=".$emailcode."\">click here</a>";
			//echo "\n$emailcode";
			$entry="insert into registred(`Username`,`Email`,`Password`,`Emailcode`) values('$username','$email','$password','$emailcode')";
			mysqli_query($con,$entry);
			mysqli_close($con);
		    echo "<h3>You have registered successfully check your mail for verification</h3>";

		}
		else
		{
			echo "<h3>The user id already exists</h3>";
		}
			
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
			
			$mail->Subject = 'Activate your account';
			$mail->Body    = "Hello ".$username.",<br> To Activate your account copy the link given below:<br><br>localhost/project/activate.php?email=".$email."&emailcode=".$emailcode;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				return 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
 			else {
					//echo 'Message has been sent';
					return 'Message has been sent';
			}
		}
?>  


 
