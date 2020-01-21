<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-masuk';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		$username_pengguna = $_SESSION['username'];
	 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/datasurat.css">

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
						<i class="material-icons md-24">mail</i>
						Surat Masuk
					</div>
					<?php if ($user_role == 'admin' OR $user_role == 'Kepala Dinas'): ?>
						<a href="datasurat-tambah.php" class="judul-header-menu">
							<i class="material-icons md-32">add_circle</i>
							Tambah Data
						</a>
					<?php endif ?>
					<?php if ($user_role == 'admin' OR $user_role == 'Kepala Dinas'): ?>
						<a href="datasurat-table_export.php?pagename=<?php echo $name; ?>&user_role=<?php echo $user_role; ?>&username_pengguna=<?php echo $username_pengguna; ?>" class="judul-header-menu judul-header-menu-kanan">
							<i class="material-icons md-32">description</i>
							Export to Ms.Excel
						</a>
						<a href="datasurat-generatefile.php?pagename=<?php echo $name; ?>&user_role=<?php echo $user_role; ?>&username_pengguna=<?php echo $username_pengguna; ?>" class="judul-header-menu judul-header-menu-kanan">
							<i class="material-icons md-32">assignment</i>
							Download File Pdf
						</a>
					<?php endif ?>
				</div>
				<div class="tabel-container">
					<!-- Tabel from Datatables -->
					<script type="text/javascript">
					 	$(document).ready(function() {
						    $('#example').DataTable();
						} );
					 </script>
					 <!-- Table from database -->
					 <?php 
					 	include "datasurat-table.php";
					 ?>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>