<?php

require_once 'connection.php';
$ids = $_GET['item'];
$display_order = 1;

foreach($ids as $id){
	$stmt = $conn->prepare("UPDATE `formcreator`.`serialize` SET `orderfield` = :display_order WHERE `serialize`.`id` = :id");
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':display_order', $display_order);
	$stmt->execute();
	$display_order++;
	//echo "hii";
}

?>