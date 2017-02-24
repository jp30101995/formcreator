<?php
require_once 'Auth/connection.php';
$arrTitle = $_GET["arrTitle"];
$count = $_GET["count"];
$arrCount = $_GET["arrCount"];
$arrInst = $_GET["arrInstruction"];
$arrPlaceholder = $_GET["arrPlaceholder"];
$arrRequired = $_GET["arrRequired"];
$arrPrepend = $_GET["arrPrepend"];
$arrAppend = $_GET["arrAppend"];
$arrChoice = $_GET["arrChoice"];
$form_id = $_GET["form_id"];


$arrTitle = explode(",", $arrTitle);
$arrCount = explode(",", $arrCount);
$arrInst = explode(",", $arrInst);
$arrPlaceholder = explode(",", $arrPlaceholder);
$arrRequired = explode(",", $arrRequired);
$arrPrepend = explode(",", $arrPrepend);
$arrAppend = explode(",", $arrAppend);


$arrChoice = explode(",", $arrChoice);

//print_r($arrRequired);
//print_r($arrCount);
//print_r($arrTitle);
//print_r($arrInst);
//print_r($arrPlaceholder);
//print_r($arrPrepend);
/*function test_null($var){
	if($var=="null"){

	}
}*/

for ($i=1;$i<=$count;$i++){
	$sql = "INSERT INTO formstructure (Formid,Elementtype,Required,Title,Instruction,Placeholder,Prepend,Append)
	VALUES ('".$form_id."','".$arrCount[$i]."','".$arrRequired[$i]."','".$arrTitle[$i]."','".$arrInst[$i]."','".$arrPlaceholder[$i]."','".$arrPrepend[$i]."','".$arrAppend[$i]."')";


	$conn->query($sql);
}



$arrChoice = array_filter($arrChoice);
$fileredArray = array();
for($i=0;$i<400;$i++){
	if(isset($arrChoice[$i])){
		array_push($fileredArray,$arrChoice[$i]);
	}
}
print_r($fileredArray);

for($i=0;$i<sizeof($fileredArray);$i++){
	$split = explode("_", $fileredArray[$i]);
	$sqlCRL = "select Elementid from formstructure where Formid = 0";
	$resultCRL = mysqli_query($conn,$sqlCRL);
	$count = 1;
	while($row = $resultCRL->fetch_assoc()){
		if($count == $split[1]){
			$insertSQL = "insert into check_radio_list VALUES ('".$row["Elementid"]."','".$split[0]."')";
			mysqli_query($conn,$insertSQL);
		}
		$count++;
	}
}


//entry for checkbox left
echo "formid assumed...";



//$sqlChoice = "SELECT * FROM `formstructure` WHERE Formid = 0";
//$result = mysqli_query($conn,$sqlChoice);
/*
$countIndex = 1 ;
$eleId = array();
$fetchCbox = "SELECT Elementid FROM `formstructure` WHERE Elementtype in (3,4,9) and Formid = 0";
$resultCbox = mysqli_query($conn,$fetchCbox);
while($row = $resultCbox->fetch_assoc()){
	array_push($eleId,$row["Elementid"]);
}
print_r($eleId);
$flag = true;
$num = 212312312;


for($q=0;$q<=sizeof($eleId);$q++){
	for($p=1;$p<=sizeof($arrChoice);$p++){
		if($arrChoice[$p]==null){
			echo "isset-------".$arrChoice[$p];

			$splited = explode("_", $arrChoice[$p]);
			print_r($splited);
			if($flag){
				$flag = false;
				$num = $splited[1];
				echo "number".$num;
			}	
			if($num == $splited[1]){
				echo $splited[0]."this sis aadfv".$eleId[$q];
			}
		}
		$arrChoice[$p] = "";
	}
	$flag = true;
		//$countIndex++;
}
		//print_r($splited);
*/		
		/*if(isset($splited[1])){
			if($splited[1] == $i){
				//make form entry...
				$makeEntry = "insert into check_radio_list VALUES ('".$eleId[$q]."','".$splited[0]."')";
				mysqli_query($conn,$makeEntry);	
			}
		}*/


//echo $arrcount;

?>