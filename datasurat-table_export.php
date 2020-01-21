<style type="text/css">
	table, th, td {
	  border: 1px solid black;
	  text-align: left;
	  vertical-align: top;
	}
</style>
<?php
	$user_role = $_GET['user_role'];
	$username_pengguna = $_GET['username_pengguna'];
	if (ISSET($_GET['pagename'])) {
		$pagename = $_GET['pagename'];
		if ($pagename == 'surat-masuk') {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=datasurat_Exported.xls");
			include 'datasurat-table.php';
		} else if ($pagename == 'agenda-keluar') {
			$dari_tgl = $_GET['dari_tgl'];
			$sampai_tgl = $_GET['sampai_tgl'];
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=datasurat ". $dari_tgl." - ".$sampai_tgl.".xls");
			echo "Data Surat Tanggal ".$dari_tgl." Sampai ".$sampai_tgl."<br><br>";
			include 'agenda-surat-table.php';
		}
	} else {
		echo "wakwawww";
	}

?>