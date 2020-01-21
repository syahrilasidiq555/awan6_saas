<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='agenda-keluar';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		$username_pengguna = $_SESSION['username'];
	 ?>
	 <link rel="stylesheet" type="text/css" href="assets/css/native-css/agenda-surat.css">

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
						<i class="material-icons md-20 ikon">date_range</i>
						Agenda Surat
					</div>
					<div class="judul-header-menu">
						Menampilkan Data Surat Berdasarkan Tanggal
					</div>
				</div>				
				<div class="datasurat-header header-menu-2">
					<form action="" method="post">
						<div class="sub-header-menu">
							Dari Tanggal &nbsp;
							<input type="date" name="dari_tgl" placeholder="Sampai Tanggal">
						</div>
						<div class="sub-header-menu">
							Sampai Tanggal &nbsp;
							<input type="date" name="sampai_tgl" placeholder="Sampai Tanggal">
						</div>
						<div class="sub-header-menu">
							<button type="submit" name="tampilkan-tabel">
								Tampilkan <i class="material-icons">visibility</i>	
							</button>
						</div>
					</form>
				</div>
				<?php if (ISSET($_POST["tampilkan-tabel"])): ?>
					<?php 
						$dari_tgl = $_POST["dari_tgl"]; 
						$sampai_tgl = $_POST["sampai_tgl"];
					?>
					<?php echo "<h4>Agenda Surat Dari Tanggal ".$dari_tgl." Sampai Tanggal ".$sampai_tgl."</h4>"; ?>
					<a href="datasurat-table_export.php?pagename=<?php echo $name;?>&dari_tgl=<?php echo $dari_tgl;?>&sampai_tgl=<?php echo $sampai_tgl;?>&user_role=<?php echo $user_role; ?>&username_pengguna=<?php echo $username_pengguna; ?>" class="export-agenda export-excel-col">
						<i class="material-icons md-32">description</i>
						Export to Ms.Excel
					</a>
					<a href="datasurat-generatefile.php?pagename=<?php echo $name;?>&dari_tgl=<?php echo $dari_tgl;?>&sampai_tgl=<?php echo $sampai_tgl;?>&user_role=<?php echo $user_role; ?>&username_pengguna=<?php echo $username_pengguna; ?>" class="export-agenda export-pdf-col">
						<i class="material-icons md-32">assignment</i>
						Download Pdf File
					</a>
					<div class="tabel-container">
						<!-- Tabel from Datatables -->
						<script type="text/javascript">
						 	$(document).ready(function() {
							    $('#example').DataTable();
							} );
						 </script>
						 <!-- Table from database -->
						 <?php 
						 	include "agenda-surat-table.php";
						  ?>
					</div>	
				<?php endif ?>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>