

<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-masuk';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("admin&kadis");
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
			$nama_foto = $db->get("surat","foto_lampiran",["id_surat" => $id_surat]);
			$hapus  = $db->get("surat","hapus",["id_surat" => $id_surat]);
		}
		if(ISSET($_POST['proses'])){
		    $hapus;
			$data = [
				"hapus"=>1
			];
			$Masuk = $db->update("surat",$data,["id_surat" => $id_surat]);
			if ($nama_foto != "") {
				// move file to delete-files folder
				$old_filename = 'file/surat-masuk/'.$nama_foto;
				$new_filename = 'file/deleted-files/'.$nama_foto;
				if (file_exists($old_filename)) {
					rename($old_filename, $new_filename);
				}
			}
		    if($Masuk) {
		        unset ($_POST);
		        echo "<script> alert('Data berhasil dihapus!'); window.location = 'datasurat.php';</script>";
		    }
		    else {
		        unset ($_POST);
		        echo "<script>alert('Data gagal diedit:(!'); window.location = window.location.href;</script>";
		    }
		}

	 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/datasurat-table-delete.css">

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
		.delete-notif {
			background-color: pink;
			color: #F44336;
			border-radius: 3px;
		    font-size: 1.47rem;
		    padding: 10px;
		    margin-bottom: 15px;
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
						Hapus Surat
					</div>
				</div>
				<div class="tabel-container" style="background-color: aliceblue; padding: 10px;">
					<div class="delete-notif">
						<i class="material-icons md-36">error_outline</i>
						Apakah Anda Yakin Akan Menghapus Data Ini ?
					</div>
					
					<div>
						<!-- Detailed -->
						<div style="display: block;">
							<div class="form-tabel-inputdata form-tabel-inputdata-kiri" style="">
								<table class="tabel-edit" style="margin-bottom: 25px;">
									<tr>
										<td>Tanggal Diterima</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $tgl_diterima; ?>
										</td>
									</tr>
									<tr>
										<td>Jam Diterima</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $jam_diterima; ?>
										</td>
									</tr>
								</table>
								<hr>
								<table class="tabel-edit" style="margin-bottom: 25px;">
									<tr>
										<td>No Agenda</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $no_agenda; ?>
										</td>
									</tr>
									<tr>
										<td>Nomor Surat</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $no_surat; ?>
										</td>
									</tr>
									<tr>
										<td>Perihal Surat</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $perihal; ?>
										</td>
									</tr>
									<tr>
										<td>Tanggal Surat</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $tgl_surat; ?>
										</td>
									</tr>
									<tr>
										<td>Pengirim Surat</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $pengirim; ?>
										</td>
									</tr>
									<tr>
										<td>Rincian Surat</td>
										<td>:</td>
										<td class="isitd" style="text-align: justify;">
											<?php echo $rincian_surat;?>
										</td>
									</tr>
									<tr>
										<td>Tgl Pelaksanaan <br><b style="color: red;">(Jika Ada)</b></br></td>
										<td>:</td>
										<td class="isitd">
											<?php echo $tgl_pelaksanaan; ?>
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
											<?php echo $disposisi1; ?>
										</td>
									</tr>
									<tr>
										<td>Instruksi Kadis</td>
										<td>:</td>
										<td class="isitd" style="text-align: justify;">
											<?php echo $instruksi; ?>
										</td>
									</tr>
								</table>
								<hr>
								<table class="tabel-edit" style="margin-bottom: 25px;">
									<tr>
										<td>Disposisi 2</td>
										<td>:</td>
										<td class="isitd">
											<?php echo $disposisi2; ?>
										</td>
									</tr>
									<tr>
										<td>Instruksi 2</td>
										<td>:</td>
										<td class="isitd" style="text-align: justify;">
											<?php echo $instruksi2; ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="status-selesai">
							<table class="tabel-edit" style="margin-bottom: 20px; margin-top: 50px;">
								<tr>
									<td>Status Surat</td>
									<td>:</td>
									<td class="isitd">
										<!-- <?php echo $status; ?> -->
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
					</div>
					<form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')" >
						<button type="submit" name="proses" class="btn btn-primary">
							<i class="material-icons md-24 ikon">delete</i>
							Hapus
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>

