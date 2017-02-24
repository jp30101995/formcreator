<?php
require_once 'connection.php';
//echo $username;
//header("http://www.google.com");
//echo "aasfsdsdfasdfsd";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pass = $_POST["pass"];
	$username = $_POST["user"];
	
	$sql = "select * from users where Username = '".$username."'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)==0){
		echo "<script>alert('Username does not exist')</script>";
		echo "<script>window.history.back()</script>";	
	}
	else if(mysqli_num_rows($result)==1){
		while($row = $result->fetch_assoc()) {
        	if($row['Password'] == $pass){
        		//display form
        		echo "login su";
        		header("Location: ../dashboard.php");
        	}
        	else{
        		echo "<script>alert('Incorrect password')</script>";
        		echo "<script>window.history.back();</script>";
        	}
    	}
	}
	
}



?>