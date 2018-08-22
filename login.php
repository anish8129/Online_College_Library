<?php
 session_start();
 if(isset($_POST['email'],$_POST['password'])===true)
 {
	$email=$_POST['email'];$password=md5($_POST['password']);
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'prjct');
	$ch=mysqli_num_rows(mysqli_query($con,"select *from registred where Email='$email'"));
	if($ch==1)
	{
		 $q=mysqli_query($con,"select *from registred where Email='$email' and Password='$password'");
		 mysqli_close($con);
		 $res=mysqli_num_rows($q);
		 if($res==1)
		 {
			$data=mysqli_fetch_array($q);			 
			if($data['actv']==1)
			{
				$_SESSION['email']= $data['Email'];
				$_SESSION['username']=$data['Username'];
				echo $_SESSION['username'] ;
				if($data['flag']==1)
					header('location:http://localhost/project/chngpswrd.php');
				else
					header('location:http://localhost/project/home.php');
			}
			else
				echo "opps: you have not activated our account";
		}
		else
			echo"incorrect password";
	}
	else
		echo"This email doesnot exist";
 }
 else
	 header('location:http://localhost/project/');
 
 
?>