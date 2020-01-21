<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-terhapus';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("admin");
		$user_role = $_SESSION['role'];
		$username_pengguna = $_SESSION['username'];

		// delete all forever
		if (isset($_POST['delete_forever_all'])) {
			$delete_frv = $db->delete("surat",["username_pengguna" => $username_pengguna,"hapus" => 1]);
			// delete all temporary file before download
			// file to delete
			$folder = 'file/deleted-files';
			//Get a list of all of the file names in the folder.
			$files = glob($folder . '/*');
			//Loop through the file list.
			foreach($files as $file){
			    //Make sure that this is a file and not a directory.
			    if(is_file($file)){
			        unlink($file);
			    }
			}
			
			if ($delete_frv) {
				unset($_POST['delete']);
				echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";
			} else {
				unset($_POST['delete']);
				echo "<script> alert('Data gagal dihapus'); window.location = window.location.href;</script>";
			}
		}
	 ?>
	 <link rel="stylesheet" type="text/css" href="assets/css/native-css/surat-terhapus.css">

	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
	<!-- HEADER -->
	<?php include "setting/header.php" ?>
	<!-- KONTEN -->
	<div class="konten-datasurat">
		<!-- Sidebar -->
		<?php include "setting/left-sidebar.php"; ?>
		<!-- Konten -->
		<div class="mainkonten">
			<div class="mainkonten-datasurat">	
				<div class="datasurat-header">
					<div class="judul-header-menu surat-masuk-color">
						<i class="material-icons md-24 ikon">delete</i>
						Surat Terhapus
					</div>
				</div>
				<h3>Data Surat Yang Telah Dihapus</h3>
				<!-- <a href="" class="export-agenda">
					<i class="material-icons md-32">delete_forever</i>
					Hapus Semua
				</a> -->
				<form action="" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus semua data secara permanen??')">
					<button class="export-agenda" name="delete_forever_all">
						<i class="material-icons md-32">delete_forever</i>
						Hapus Semua
					</button>
				</form>
				<div class="tabel-container">	
					<!-- Tabel from Datatables -->
					<script type="text/javascript">
					 	$(document).ready(function() {
						    $('#example').DataTable();
						} );
					 </script>
					 <!-- Table from database -->
					 <?php 
					 	include "surat-terhapus-table.php";
					 ?>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>