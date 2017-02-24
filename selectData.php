<?php
require_once 'Auth/connection.php';

$formId = $_GET["form_id"];
$tableName = "";
$sql = "select * from mainformschema where Formid = ".$formId;
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()){
  $tableName = $row["Connectedtable"];
}

$strTbl = "<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Bootstrap Example</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>
<body>

<div class='container'>
<table class='table table-striped'>
    <thead>
      <tr>
";
$sqlForTitles = "select * from formstructure where Elementtype not in (3) and Formid = ".$formId;
$resultForTitles = mysqli_query($conn,$sqlForTitles);
$title = array();
$count = 0;
while($row = $resultForTitles->fetch_assoc()){
  $title[$count++] = $row["Title"];
  $strTbl .= "<th>".$title[$count-1]."</th>";
}
//for checkbox...
$sqlForCbox = "select * from check_radio_list where Elementid in(select Elementid from formstructure where Elementtype=3 and Formid=".$formId.")";
$resultForCbox = mysqli_query($conn,$sqlForCbox);
while($row = $resultForCbox->fetch_assoc()){
  $title[$count++] = $row["Name"];
  $strTbl .= "<th>".$title[$count-1]."</th>";
}
$strTbl .= "<th></th>";




$strTbl .= "  </tr></thead><tbody>";
$size = sizeof($title);
$rowCount =0;
$sqlForData = "select * from ".$tableName;
$resultForData = mysqli_query($conn,$sqlForData);
while($row = $resultForData->fetch_assoc()){
  $strTbl .= "<tr>";
  for($i=0;$i<$size;$i++){
    $str = $row[$title[$i]];
    $strTbl .= "<td>".$str."</td>";
  }
  $strTbl .= "<td><button name='data_".$rowCount."' type='button' class='btn btn-danger'>Delete</button></td></tr>";
  $rowCount++;
}
$strTbl .= "</tbody></table></div>
</body>
</html>
";
echo $strTbl;

/*
<table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
*/

?>