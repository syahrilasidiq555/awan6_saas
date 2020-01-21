<?php 
	include "setting/conn.php";

	$perihal = $_GET['perihal'];
	// $perihal = "Umum";
	$data1 = $db->select("data_index","*",["perihal"=> $perihal]);
	foreach ($data1 as $key) {
		// $a = $key['index_surat'];
		$data = array(
					'index_surat' => $key['index_surat']
				);
	}
	
	echo json_encode($data);
 ?>