<?php
require_once 'connection.php';
$placeholder = $append = $title  = $instruction = $prepend = "";
$required = 0;
$id = $_GET["id"];

//check that element has already updated or not
//if already inserted then update column





//process to insert
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
  } else {
    $title = $_POST["title"];
  }

  if (empty($_POST["required"])) {
  } else {
    $required = $_POST["required"];
  }

  if (empty($_POST["instruction"])) {
  } else {
    $instruction = $_POST["instruction"];
  }

  if (empty($_POST["placeholder"])) {
  } else {
    $placeholder = $_POST["placeholder"];
  }

  if (empty($_POST["prepend"])) {
  } else {
    $prepend = $_POST["prepend"];
  }

  if (empty($_POST["append"])) {
  } else {
    $append = $_POST["append"];
  }

  $sql = "INSERT INTO formstructure (Elementtype, Title, Required, Instruction, Placeholder, Prepend, Append)
          VALUES ('".$id."','".$title."', '".$required."', '".$instruction."', '".$placeholder."', '".$prepend."', '".$append."')";
  $conn->exec($sql);
}

//go back
echo "<script>window.history.back();</script>";
?>