<?php

class Disp{
	private $db;
	function __construct($db){
		$this->db = $db;
	}
	public function selected(){
		$result = '';
		$stmt = $this->db->query("select *  from serialize order by orderfield");
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result .= "<li id='item_".$row['id']."' class='btn btn-default btn-block'>".$row['name']."</li>";
		}
		return $result;
	}
	public function available(){
		$result = '';
		$stmt = $this->db->query("select * from formelement");
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result .= "<li  onclick='myFunction(".$row["id"].")' class='btn btn-default btn-block'>".$row["name"]."</li>";
		}
		return $result;

	}
	public function menu1(){
		$result = array();
		$stmt = $this->db->query("select Title, Required, Instruction, Placeholder, Prepend, Append from formstructure");
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result["Title"] = $row["Title"];
			$result["Required"] = $row["Required"];
			$result["Instruction"] = $row["Instruction"];
			$result["Placeholder"] = $row["Placeholder"];
			 
			//$result .= "<li onclick='myFunction(".$row["id"].")' class='btn btn-default btn-block'>".$row["name"]."</li>";
		}
		echo json_encode($result);
		

	}

}

?>