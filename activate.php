<?php 
if(isset($_GET['email'],$_GET['emailcode'])===true)
{
	$email=trim($_GET['email']);
	$emailcode=trim($_GET['emailcode']);
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'prjct');//checking whether user exist or not in the database
	$query=mysqli_num_rows(mysqli_query($con,"select count(Uid) from registred where Email='$email' and Emailcode='$emailcode' and actv=0"));
 
	if($query==1)
	{
		mysqli_query($con,"update registred set actv=1 where Email='$email' ");
		echo "Your Account has been activated    <a href='index.php'>Log in to your account</a>";
	}
	else
	{
		echo "This account has already been activated";
	}
	mysqli_close($con);
}
else
{
	echo "<h1>Error!</h1> Page Not Found";
}
 ?>