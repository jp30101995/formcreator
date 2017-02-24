<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Day 001 Login Form</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style.css">
<script>
//not working...
function checkSubmit()
{
var password = document.getElementById("Spass").value;
var email = document.getElementById("Semail").value;
var repeatPassword = document.getElementById("Srpass").value;
var username = document.getElementById("Suser").value;
 //alert('Input is not alphanumeric......');


for(var i=0; i<username.length; i++)
{
var char1 = username.charAt(i);
var cc = char1.charCodeAt(0);

if((cc>47 && cc<58) || (cc>64 && cc<91) || (cc>96 && cc<123))
{
}
 else {
 alert('Username should be alphanumeric');
 
 }
}

//create http request

if(password==repeatPassword){
 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	//create call to php
	xmlhttp.onreadystatechange=function()
	  {
	  if (this.readyState==4 && this.status==200)
	    {
	    document.getElementById("txtHint").innerHTML=this.responseText;
	    /*if(this.responseText.toString() == "user"){
	    //		alert('user created successfully');
	    	//Response.redirect("http://www.google.com");
	    }
	    else{
	    //	alert('user already exist');
	    	//alert("Username already exist");
	    	//Response.redirect("http://www.yahoo.com");
	    }*/
	    }
	  }
	xmlhttp.open("GET","signup.php?pass="+password+"&email="+email+"&username="+username,true);

	xmlhttp.send();

	
}

else{
	//password and repeat password not match
	alert("password should match");
}
}
</script>
  
</head>

<body>
<div class="container">
<div class="col-md-6 col-md-offset-6">
<div id="txtHint"></div>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form id="loginForm" action="login.php" method="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" name="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
				</form>
			</div>
			<div class="sign-up-htm">
				<form method="post" action="signup.php" id="signupForm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="Suser" name="Suser" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="Spass" name="Spass" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="Srpass" name="Srpass" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="Semail" name="Semail" type="email" class="input" required>
				</div>
				<div class="group">
					<input type="submit" class="button" value="SignUp">
				</div>
				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
</body>
</html>
