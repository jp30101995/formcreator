<?php
require_once 'Auth/connection.php';
$formId = 0;
$sql = "select * from formstructure where Formid = '".$formId."'";
$result = mysqli_query($conn, $sql);
$formCode = "<html lang='en'>
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
  <div class='container'>
<form>";
$counter = 0;
while($row = $result->fetch_assoc()) {

	switch ($row['Elementtype']) {
	        	case '1':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='text' placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '2':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}
	        		$formCode .= "<div class='form-group'>
								  	<label for='textarea_'".$counter.">".$row['Title']."</label>
								    <input type='textarea' placeholder='".$row['Placeholder']."' alt='".$row['Instruction']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '3':
	        		$sql2 = "select * from check_radio_list where Elementid = '".$row['Elementid']."'";
					$result2 = mysqli_query($conn, $sql2);
	        		$formCode .= "<div class='form-group'><label> ".$row['Title']."</label><br>";
					while($row2 = $result2->fetch_assoc()){
						$formCode .= "<input type='checkbox' name='check_".$counter."' value='".$row2['Name']."'>".$row2['Name']."<br>";
						//$counter++;	
					}			
					$formCode.=" <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '4':
	        		$sql2 = "select * from check_radio_list where Elementid = '".$row['Elementid']."'";
					$result2 = mysqli_query($conn, $sql2);
	        		$formCode .= "<div class='form-group'><label>".$row['Title']."</label><br>";
					while($row2 = $result2->fetch_assoc()){
						$formCode .= "<input type='radio' name='radio_".$counter."' value='".$row2['Name']."'>".$row2['Name']."<br>";
						//$counter++;	
					}			
					$formCode.=" <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '5':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}
	        		$formCode .= "<div class='form-group'>
								  	<label for='date_'".$counter.">".$row['Title']."</label><br>
								    <input type='date' placeholder='".$row['Placeholder']."' id='date_".$counter."' ".$reu."><br>
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '6':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='number' placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '7':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='url' placeholder='".$row['Placeholder']."' class='form-control' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '8':
	        		if($row['Required'] != 0){
	        		 	$reu = "Required";
	        		}
	        		else{
	        			$reu = "";
	        		}

	        		$formCode .= "\n"."<div class='form-group'>\n
								  	<label for='text_'".$counter.">".$row['Title']."</label>\n
								    <input type='file' id='text_".$counter."' ".$reu.">
								    <span>".$row['Instruction']."</span>
								  </div>";
	        		# code...
	        		break;
	        	case '9':
	        		$formCode .= "<div class='form-group'>
								  	<label for='textarea_'".$counter.">".$row['Title']."</label>
								    <input type='textarea' alt='".$row['Instruction']."' class='form-control' id='text_".$counter."'>
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
$fromTemp = $formCode;
$formCode .= "<textarea value=".$fromTemp."></textarea></form> </div>   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
</body></html>";
echo $formCode;

?>