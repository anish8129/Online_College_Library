<?php  
session_start();
if(!isset($_SESSION['email'],$_SESSION['username']))
	header('location:http://localhost/project/');	
?>

<doctype! html>
<html>
<head></head>
<body>
<nav style="background-color:lightgreen;padding:15px 20px 5px 20px; height:50px;border:5px solid black;border-radius:10px;font-size:30px">

	<a style="padding:5px 60px 0px 0px;">Hello <?php echo $_SESSION['username']; ?></a>
	<a style="padding:5px 30px 0px 0px;" href="home.php">Home</a>
	<a style="padding:5px 30px 0px 100px; width="200px"><input type="search" placeholder="search your books"style="border-radius:10px;width:350px;height:40px" ></a>
	<a style="padding:5px 30px 0px 100px;"href="logout.php">Log out</a>
	<a style="padding:5px 0px 0px 10px;"href="chngpswrd.php">change Password</a>
		
	
</nav>
<aside style="background-color:lightgreen;height:800px;width:200px;border:5px solid black;border-radius:10px;margin:5px" >
	
<h1>Hello aside</h1>
<ul type="none">
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>
<li><h1>Hello aside</h1></li>

</ul>

</aside>
<footer Style="background-color:lightgreen;height:120px;border:5px solid black;border-radius:10px; padding:10px">
<div style="height:100px;width:200px;left:300px;position:relative;bottom:7px"><ul type="none"><li><h3>About Us</h3></li><li><h3>Our Career</h3></li><li><h3>Our Terms</h3></li></ul></div>
<article style="height:100px;width:300px;position:relative;bottom:137px;left:800px;border-style:dashed;border-width:0px 0px 0px 2px;padding:0px 0px 0px 20px;font-size:20px" >
<h4>Our Mission : To provide books in pdf. to motivate students those who have lost their selfconfidence. Encourage them to take a new start </h4>
</article>
<p style="background-color:lightgreen;position:relative;bottom:130px;left:350px;width:600px;border-width:0px 5px 5px 5px;border-radius:7px;border-style:solid;padding:5px">copyrigth by onlinecollegeliraries.com for any queries mail us at anish8129@gmail.com</p>

</footer
</body>
</html>