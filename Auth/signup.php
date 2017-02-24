<?php
require_once 'connection.php';
//echo $username;
//header("http://www.google.com");
//echo "aasfsdsdfasdfsd";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pass = $_POST["Spass"];
	$rpass = $_POST["Srpass"];
	$username = $_POST["Suser"];
	$email = $_POST["Semail"];

	$sql = "select * from users where Username = '".$username."'";
	$result = mysqli_query($conn, $sql);

	if($pass==$rpass){
		if(mysqli_num_rows($result)==0){
			$sql2 = "INSERT INTO users(Username,Email,Password)
			      VALUES ('".$username."', '".$email."', '".$pass."')";
			$result2 = mysqli_query($conn, $sql2);
			//display form...	
			header("../dashboard.php");
		}
		else{
			echo "<script>alert('Username already exists')</script>";
			echo "<script>window.history.back()</script>";	
		}
	}
	else{
		//echo "asadfasdfasdfsadfasd";
		echo "<script>alert('passwords do not match');</script>";
		echo "<script>window.history.back()</script>";	
	}
}



?>