
<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-masuk';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		
		if (ISSET($_GET['id_surat'])) {
			$id_surat = $_GET['id_surat'];
			$no_agenda = $db->get("surat","no_agenda",["id_surat" => $id_surat]);
			$tgl_diterima = $db->get("surat","tgl_diterima",["id_surat" => $id_surat]);
			$jam_diterima  = $db->get("surat","jam_diterima",["id_surat" => $id_surat]);
			$pengirim   = $db->get("surat","pengirim",["id_surat" => $id_surat]);
			$perihal  = $db->get("surat","perihal",["id_surat" => $id_surat]);
			$rincian_surat  = $db->get("surat","rincian_surat",["id_surat" => $id_surat]);
			$tgl_pelaksanaan  = $db->get("surat","tgl_pelaksanaan",["id_surat" => $id_surat]);
			$no_surat  = $db->get("surat","no_surat",["id_surat" => $id_surat]);
			$tgl_surat  = $db->get("surat","tgl_surat",["id_surat" => $id_surat]);
			$disposisi1  = $db->get("surat","disposisi1",["id_surat" => $id_surat]);
			$instruksi  = $db->get("surat","instruksi",["id_surat" => $id_surat]);
			$disposisi2  = $db->get("surat","disposisi2",["id_surat" => $id_surat]);
			$instruksi2  = $db->get("surat","instruksi2",["id_surat" => $id_surat]);
			$status  = $db->get("surat","status",["id_surat" => $id_surat]);
			$nama_file = $db->get("surat","foto_lampiran",["id_surat" => $id_surat]);
		}
	 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/datasurat-table-detail.css">

	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>
	<style type="text/css">
		.tabel-edit td {
			padding: 5px 5px;
			vertical-align: top;
		}
		.form-tambah {
			border: 2px;
			padding: 1px 5px;
			height: 25px;
			font-size: 14px;
			border: 1px solid #ced4da;
		}
		.form-tabel-inputdata {
			display: inline-block;
			vertical-align: top;
		}
		.form-tabel-inputdata-kiri {
			margin-right: 25px;
		}
		.status-selesai {
			margin-top: 10px;
		}
		table .isitd {
			max-width: 350px;
			width: 350px;
			padding-left: 10px;
			color: darkblue;
		}
		.edit-surat {
			float: right;
		}

		.tombolShow {
			cursor: pointer;
			padding: 0px 5px 0px 5px;
			font-size: 14px;
		}
		.tampilan-foto {
			background-color: #eeeeee;
			border: 1px solid #CCC;
			margin-top: 5px;
			margin-bottom: 5px;
			margin-right: 5px; 
			margin-left: 0px;
			padding-top: 10px;
			padding-left: 10px;
			padding-bottom: 10px;
			padding-right: 0px;
			width: 750px;
		}
	</style>
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
					<a href="datasurat.php" class="judul-header-menu surat-masuk-color">
						<i class="material-icons md-24">mail</i>
						Surat Masuk
					</a>
					<div class="judul-header-menu">
						Detail Surat
					</div>
				</div>
				<div class="tabel-container" style="background-color: aliceblue; padding: 10px;">
					<div>
						<a href="datasurat-table-edit.php?id_surat=<?php echo $id_surat; ?>" class="edit-surat"><h6>Edit</h6></a>
						<br>
						<form action="" method="post">
							<!-- Duplicate just for test -->
							<div style="display: block;">
								<div class="form-tabel-inputdata form-tabel-inputdata-kiri" style="">
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>Tanggal Diterima</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($tgl_diterima); ?>
											</td>
										</tr>
										<tr>
											<td>Jam Diterima</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($jam_diterima); ?>
											</td>
										</tr>
									</table>
									<hr>
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>No Agenda</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($no_agenda); ?>
											</td>
										</tr>
										<tr>
											<td>Nomor Surat</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($no_surat); ?>
											</td>
										</tr>
										<tr>
											<td>Perihal Surat</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($perihal); ?>
											</td>
										</tr>
										<tr>
											<td>Tanggal Surat</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($tgl_surat); ?>
											</td>
										</tr>
										<tr>
											<td>Pengirim Surat</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($pengirim); ?>
											</td>
										</tr>
										<tr>
											<td>Rincian Surat</td>
											<td>:</td>
											<td class="isitd" style="text-align: justify;">
												<?php echo htmlspecialchars($rincian_surat);?>
											</td>
										</tr>
										<tr>
											<td>Tgl Pelaksanaan <br><b style="color: red;">(Jika Ada)</b></br></td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($tgl_pelaksanaan); ?>
											</td>
										</tr>
									</table>
								</div>
								<div class="form-tabel-inputdata" style="">
									<table class="tabel-edit" style="margin-bottom: 35px;">
										<tr>
											<td>Disposisi Kadis</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($disposisi1); ?>
											</td>
										</tr>
										<tr>
											<td>Instruksi Kadis</td>
											<td>:</td>
											<td class="isitd" style="text-align: justify;">
												<?php echo htmlspecialchars($instruksi); ?>
											</td>
										</tr>
									</table>
									<hr>
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>Disposisi 2</td>
											<td>:</td>
											<td class="isitd">
												<?php echo htmlspecialchars($disposisi2); ?>
											</td>
										</tr>
										<tr>
											<td>Instruksi 2</td>
											<td>:</td>
											<td class="isitd" style="text-align: justify;">
												<?php echo htmlspecialchars($instruksi2); ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="status-selesai">
								<table cellpadding="5px">
									<tr>
										<td>File Surat</td>
										<td>:</td>
										<td>
											<div class="btn btn-info tombolShow" id="tombolShow" onclick="myFunction1()">Show </div>
										</td>
									</tr>
								</table>
								
								<div class="tampilan-foto" id="tampilan-foto" style="display: none;">
									<!-- code here (tampil gambar dari databasenya)-->
									<?php include 'pdf_viewer.php' ?>
								</div>
								<table class="tabel-edit" style="margin-bottom: 20px; margin-top: 50px;">
									<tr>
										<td>Status Surat</td>
										<td>:</td>
										<td class="isitd">
											<?php 
												if ($status == 'Belum Selesai') {
													echo "<b style='color:red;'>".$status."</b>";
												}else {
													echo $status;
												}
											?>
										</td>
									</tr>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function myFunction1() {
		  var x = document.getElementById("tampilan-foto");
		  var y = document.getElementById("tombolShow")
		  if (x.style.display === "none") {
		    x.style.display = "block";
		    y.innerHTML = "Hide";
		  } else {
		    x.style.display = "none";
		    y.innerHTML = "Show";
		  }
		}
	</script>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>

