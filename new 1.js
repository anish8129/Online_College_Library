	function set()
	{
		if(document.myform.action=="")
			document.myform.action="login.php";
	}
	function fun()
	{
		//alert("HI");
		a=document.getElementsByClassName("l");
		b=document.getElementById("log");
		c=document.getElementsByTagName("h1");
		d=document.getElementById("reg");
		//the registration form
		 if(b.value=="Not Registered")
		{
			c[1].innerHTML="Register Here<li type='none'><input type='name' placeholder='Your Name' name='username' class='l'  style='width:300px; height:50px; margin:10px 0px 0px 0px; border:5px solid ash; font-size:20px; border-radius:10px;' required /></li>";
			a[1].value="";
			a[2].value="";
			a[3].value="Sign Up";
			b.value="Log In";
			d.style.height=500+'px';
			document.getElementById('forgot').innerHTML="";
			document.myform.action="submit.php";
		}
		//the log in form
		else if(b.value=="Log In")
		{
			document.getElementById('forgot').innerHTML="Forgot Password";
			document.myform.action="login.php";
			c[1].innerHTML="Log in to your account";
			b.value="Not Registered";
			d.style.height=400+'px';
			a[0].value="";
			a[1].value="";
			a[2].value="Log In";
		}	
	}
