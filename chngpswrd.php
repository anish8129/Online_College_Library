<?php
session_start();
if(!isset($_SESSION['email']))
	header('location:http://localhost/project/'); ?>
<html>
 <head>
	<link rel="stylesheet" type="text/css" href="new 1.css" />
 </head>
 <body>
<nav style="background-color:lightgreen;padding:15px 20px 5px 20px; height:50px;border:5px solid black;border-radius:10px;font-size:30px">

	<a style="padding:5px 60px 0px 0px;">Hello <?php echo $_SESSION['username']; ?></a>
	<a style="padding:5px 30px 0px 0px;" href="home.php">Home</a>
	<a style="padding:5px 30px 0px 100px; width="200px"><input type="search" placeholder="search your books"style="border-radius:10px;width:350px;height:40px" ></a>
	<a style="padding:5px 30px 0px 100px;"href="logout.php">Log out</a>
	<a style="padding:5px 0px 0px 10px;"href="chngpswrd.php">change Password</a>
		
	
</nav>
<?php 
	
	$email=$_SESSION['email'];
	if(isset($_POST['oldpassword']))
	{
		$oldpswrd=md5($_POST['oldpassword']);
		$newpswrd=$_POST['newpassword'];
		$cpswrd=$_POST['cpassword'];
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'prjct');
		$R=mysqli_query($con,"select Uid from registred where Password='$oldpswrd' and Email='$email'");
		if(mysqli_num_rows($R)==1)
		{	
			if(strlen($newpswrd)<5)
			{
				echo "<h3>Password length must be between 5 to 20 letters</h3>";
				//exit();
			}
			else if(strcmp($newpswrd,$cpswrd)!=0)
			{
				echo "<h3>New Password and Confirm New Password  feilds must contain same value</h3>";
			}
			else
			{
				$res=mysqli_fetch_array($R);
				$Id=$res['Uid'];
			
				$cpswrd=md5($cpswrd);
				if(mysqli_query($con,"update registred set Password='$cpswrd', flag=0 where Uid=$Id"))
					echo "<h3>Congratulations! Your Password has been updated successfully</h3>";
				else
					echo "<h3>Something went wrong!</h3>";
			}
		}
		else
		{
			echo "<h3>You have entered wrong Password Try Again</h3>";
		}
		mysqli_close($con);
	}
	else{ }
?>
 
 <h1 style="text-align:right;width:865px;">Online College Library</h1>
 
	<div id="reg" style="height:450px;border:5px solid black;border-radius:10px;">
		<form  action="chngpswrd.php" method="post">
		 <h1 align="center">Change your password</h1>
		<ul type="none">
		 <li><input type="password"placeholder="old password" class="l" name="oldpassword" required/></li>
		 <li><input type="password"placeholder="New password"class="l" name="newpassword" required/></li>
		 <li><input type="password"placeholder=" Confirm New password"class="l" name="cpassword" required/></li>
		 <li><input type="submit"class="l" value='Submit'/></li>
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