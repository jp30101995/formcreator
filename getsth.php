<?php


require_once 'connection.php';
//$arrTitle =array();
$arrTitle = $_GET["arrTitle"];
$count = $_GET["count"];
$arrCount = $_GET["arrCount"];

$arrInst = $_GET["arrInstruction"];

$arrTitle = explode(",", $arrTitle);
$arrCount = explode(",", $arrCount);
$arrInst = explode(",", $arrInst);

// Check connection

for ($i=1;$i<=$count;$i++){
	$sql = "INSERT INTO formstructure (Elementtype,Title,Instruction)
	VALUES ('".$arrCount[$i]."','".$arrTitle[$i]."','".$arrInst[$i]."')";

//	$sql = "INSERT INTO formstructure (Elementtype,Title)
//	VALUES ('".$arrCount[$i]."','".$arrTitle[$i]."')";
	
	

	$conn->query($sql);
}

//echo $arrcount;

?>