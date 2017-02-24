<?php



require_once 'Auth/connection.php';
$formname = $desc = $conntab = $fontsize = $fontname = $subbtntxt = "";
$required = 0;
$formname = $_GET["formname"];
$desc = $_GET["desc"];
$conntab = $_GET["conntab"];
$fontname = $_GET["fontname"];
$fontsize = $_GET["fontsize"];
$subbtntxt = $_GET["subbtntxt"];


//check that element has already updated or not
//if already inserted then update column




//process to insert

  $sql = "INSERT INTO `formcreator`.`mainformschema` (`Formid`, `Userid`, `Formname`, `Connectedtable`, `Description`, `Font`, `Fontsize`, `SubmitButtonText`) VALUES (NULL, '1', '".$formname."', '".$conntab."', '".$desc."', '".$fontname."', '".$fontsize."', '".$subbtntxt."');";
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute();

  //$result = $conn->exec($sql);


//$sql = "SELECT MAX(Formid) as id FROM `mainformschema`";
echo $stmt->insert_id;

$cookie_name = "formID";
$cookie_value = $stmt->insert_id;
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day



//go back
//echo "<script>window.history.back();</script>";
?>