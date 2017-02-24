<?php
require_once 'Auth/connection.php';

//do not give access to anyone on this page...

$count = $_GET["count"];
$table = $_GET["table"];
$form = $_GET["form"];
$insertQry = "INSERT INTO ".$table." VALUES ('',";

for($i=0;$i<$count;$i++){
	if(isset($_POST["data_".$i]))
		$ele = $_POST["data_".$i];
	else
		$ele = null;
	$insertQry .= "'".$ele."',";

//	echo $ele;
}
$insertQry = rtrim($insertQry,",");
$insertQry .= ");";
//echo $insertQry;

$result = mysqli_query($conn, $insertQry);
header("Location: Generateform.php?form_id=$form");
//echo $insertQry;
?>