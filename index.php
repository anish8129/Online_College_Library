<?php session_start();
	$_SESSION['set']=1; ?>
<doctype! html>
<html lang="en">
<head>
<title>MY first page</title>
<link rel="stylesheet" type="text/css" href="new 1.css" />
<script type="text/javascript" src="new 1.js"></script>
</head>
<body>
<h1 style="text-align:right;width:865px;"> Online College Library</h1>
	<div id="reg"style="border:5px solid black;border-radius:10px;">
		<form method="post" name="myform" onsubmit="set()" >
		 <h1 align="center">Log in to your account</h1>
		<ul type="none">
		 <li><input type="email"placeholder="email(---@something.com)" class="l" name="email" required/></li>
		 <li><input type="password"placeholder="password"class="l" name="password" required/></li>
		 <li><input type="submit"class="l" value='Log In'/></li>
		</ul>													 
		<a id="forgot" href="forgot.php">Forgot Password</a>
		<input onclick="fun()" id="log" type="button" value="Not Registered" style="background-color:lightgreen; border-color:lightgreen;"/>
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