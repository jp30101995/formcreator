<?php
require_once 'Auth/connection.php';

$formId = $_GET["form_id"];

$sql = "select * from formstructure where Formid = '".$formId."'";
$result = mysqli_query($conn, $sql);
$countElement = $result->num_rows;
$sql_fetch_submitbtntext = "select * from mainformschema where Formid = '".$formId."'";
$result_fetch_forminfo = mysqli_query($conn, $sql_fetch_submitbtntext);

$formName = "";
$conTable = "";
$desc = "";
$fontName = "Calibri";
$fontSize = "20";
$submitBtnText = "Submit";
while($forminfo = $result_fetch_forminfo->fetch_assoc()){
	$formName = $forminfo["Formname"];
	$conTable = $forminfo["Connectedtable"];
	$conTable = preg_replace('/\s+/', '_', $conTable);
	if($forminfo["Description"]!=null)
		$desc = $forminfo["Description"];
	if($forminfo["Font"]!=null)
		$fontName = $forminfo["Font"];
	if($forminfo["Fontsize"]!=0)
		$fontSize = $forminfo["Fontsize"];
	if($forminfo["SubmitButtonText"]!=null)
		$submitBtnText = $forminfo["SubmitButtonText"];
}

$elementEntryCount = "select * from check_radio_list where Elementid in(select Elementid from formstructure where Elementtype=3 and Formid=".$formId.")";
$elementResult = mysqli_query($conn,$elementEntryCount);
$elementEntryCountVar = $elementResult->num_rows;

$totalCbox = "select * from formstructure where Formid = '".$formId."' and Elementtype=3";
$resultCbox = mysqli_query($conn,$totalCbox);
$totalBox = $resultCbox->num_rows;

$countLoop = $countElement+$elementEntryCountVar-$totalBox;
echo "Countr elem".$countElement." Elementr entry counter ".$elementEntryCountVar." total box ".$totalBox;
$formCode = "
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Form Builder</title>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  </head>
  <body>
  <style>
  label {
    font: normal ".$fontSize."px ".$fontName." !important;
	}
  </style>
  <div class='container'>
<h2>".$formName."</h2>
<h5>".$desc."</h5>
<br>
<form method='POST' action='insertData.php?form=".$formId."&table=".$conTable."&count=".$countLoop."'>";
$counter = 0;
$QueryStr = "CREATE TABLE ".$conTable."(row_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
while($row = $result->fetch_assoc()) {

	if($row["Elementtype"] == 3){
		$query_cbox = "select name from check_radio_list where Elementid in (select Elementid from formstructure where Title = '".$row["Title"]."')";
		$result_cbox = mysqli_query($conn, $query_cbox);
		while($cbox = $result_cbox -> fetch_assoc()){
			$cbox["name"] = preg_replace('/\s+/', '_', $cbox["name"]);
			$QueryStr .= $cbox["name"]." VARCHAR(30),";		
		}	
	}
	else{
		$query_type = "select Dbtype from formelement where id in (select Elementtype from formstructure where Title = '".$row["Title"]."')";
		$element_type_result = mysqli_query($conn, $query_type);
		while($type = $element_type_result -> fetch_assoc()){
			$element_type = $type["Dbtype"];

			if($element_type == "TEXT")
				$element_type .= "(5000)";
			if($element_type == "VARCHAR")
				$element_type .= "(255)";
			if($element_type == "INT")
				$element_type .= "(15)";
		}
		$dbEntry = preg_replace('/\s+/', '_', $row["Title"]);
		$QueryStr .= $dbEntry." ".$element_type.",";
	}
	
	
	switch ($row['Elementtype']) {
	        	case '1':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='text' name='data_".$counter."' placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '2':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}
	        		$formCode .= "<div class='form-group'>
								  	<label for='textarea_'".$counter.">".$row['Title']."</label>
								    <input type='textarea'  name='data_".$counter."'  placeholder='".$row['Placeholder']."' alt='".$row['Instruction']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '3':
	        		$sql2 = "select * from check_radio_list where Elementid = '".$row['Elementid']."'";
					$result2 = mysqli_query($conn, $sql2);
	        		$formCode .= "<div class='form-group'><label> ".$row['Title']."</label><br>";
					while($row2 = $result2->fetch_assoc()){
						$formCode .= "<input type='checkbox' name='data_".$counter++."' value='".$row2['Name']."'>".$row2['Name']."<br>";
						//$counter++;	
					}			
					$counter--;
					$formCode.=" <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '4':
	        		$sql2 = "select * from check_radio_list where Elementid = '".$row['Elementid']."'";
					$result2 = mysqli_query($conn, $sql2);
	        		$formCode .= "<div class='form-group'><label>".$row['Title']."</label><br>";
					while($row2 = $result2->fetch_assoc()){
						$formCode .= "<input type='radio' name='data_".$counter."'  name='radio_".$counter."' value='".$row2['Name']."'>".$row2['Name']."<br>";
						//$counter++;	
					}			
					$formCode.=" <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '5':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}
	        		$formCode .= "<div class='form-group'>
								  	<label for='date_".$counter."'>".$row['Title']."</label><br>
								    <input type='date' name='data_".$counter."'  placeholder='".$row['Placeholder']."' id='date_".$counter."' ".$reu."><br>
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '6':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='number' name='data_".$counter."'  placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '7':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_".$counter."'>".$row['Title']."</label>\n
								    <input type='url' name='data_".$counter."'  placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '8':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_".$counter."'>".$row['Title']."</label>\n
								    <input type='file' name='data_".$counter."'  id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '9':
	        		//list
	        		$sql2 = "select * from check_radio_list where Elementid = '".$row['Elementid']."'";
					$result2 = mysqli_query($conn, $sql2);
	        		$formCode .= "<div class='form-group'><label> ".$row['Title']."</label><br>";
					$formCode .= "<select name='data_".$counter."'  class='form-control' name='".$row['Title']."'>";
					while($row2 = $result2->fetch_assoc()){
						$formCode .= "<option>".$row2['Name']."</option><br>";
						//$counter++;	
					}			
					$formCode.=" <span>".$row['Instruction']."</span>
								  </select></div>";
	        		# code...
	        		break;
	        	
	        	case '10':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='pass_".$counter."'>".$row['Title']."</label>\n
								    <input type='password' name='data_".$counter."'  placeholder='".$row['Placeholder']."' class='form-control' id='pass_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '11':
	        		if($row['Required'] != "false"){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='email_".$counter."'>".$row['Title']."</label>\n
								    <input type='email' name='data_".$counter."'  placeholder='".$row['Placeholder']."' class='form-control' id='email_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        		
	        	default:
	        		# code...
	        		break;
	        }        
$counter++;
}
$QueryStr = rtrim($QueryStr, ",");
$countElement = $counter;
$QueryStr .= ");";
$fromTemp ="<html lang='en'>". $formCode . "</form> </div>   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
</body></html";
$formCode .= "<button type='submit' class='btn btn-success'>".$submitBtnText."</button></form> </div>   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
</body></html>";
echo $formCode;
echo $QueryStr;
//<textarea rows='50' cols='100' value=".$fromTemp."></textarea>
?>