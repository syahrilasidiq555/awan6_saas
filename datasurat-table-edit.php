
<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-masuk';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];

		//akses edit form
		$akses_edit = "readonly";
		$akses_edit_file = "disabled";		
		if ($user_role == 'admin' OR $user_role == 'Kepala Dinas') {
			$akses_edit = "";
			$akses_edit_file = "";
		}
		
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
			$nama_foto = $db->get("surat","foto_lampiran",["id_surat" => $id_surat]);
			$status  = $db->get("surat","status",["id_surat" => $id_surat]);
		}
		if(ISSET($_POST['proses'])){
		    $no_agenda = $_POST['no_agenda'];
			$tgl_diterima = $_POST['tgl_diterima'];
			$jam_diterima = $_POST['jam_diterima'];
			$pengirim = $_POST['pengirim'];
			$perihal = $_POST['perihal'];
			$rincian_surat = $_POST['rincian_surat'];
			$tgl_pelaksanaan = $_POST['tgl_pelaksanaan'];
			$no_surat = $_POST['no_surat'];
			$tgl_surat = $_POST['tgl_surat'];
			$disposisi1 = $_POST['disposisi1'];
			$instruksi  = $_POST['instruksi'];
			$disposisi2  = $_POST['disposisi2'];
			$instruksi2  = $_POST['instruksi2'];
			$status  = $_POST['status'];
			$data = [
				"no_agenda"=>$no_agenda, 
				"tgl_diterima"=>$tgl_diterima, 
				"jam_diterima"=>$jam_diterima, 
				"pengirim"=>$pengirim,
				"perihal"=>$perihal,
				"rincian_surat"=>$rincian_surat,
				"tgl_pelaksanaan"=>$tgl_pelaksanaan,
				"no_surat"=>$no_surat,
				"tgl_surat"=>$tgl_surat,
				"disposisi1"=>$disposisi1,
				"instruksi"=>$instruksi,
				"disposisi2"=>$disposisi2,
				"instruksi2"=>$instruksi2,
				"status"=>$status
			];
			if ($user_role == 'admin' OR $user_role == 'Kepala Dinas') {
				if ($_FILES['file_foto']['name']) {
					// foto
					$allowed_ext = array('pdf');
					$nama_foto = $_FILES['file_foto']['name'];
					$x = explode('.', $nama_foto);
					$extension = strtolower(end($x));
					$file_size = $_FILES['file_foto']['size'];
					$file_tmp = $_FILES['file_foto']['tmp_name'];
					$foto_lampiran = $no_agenda."__".$tgl_surat."__".$id_surat.".".$extension;
					$data1 = [
						"foto_lampiran"=>$foto_lampiran
					];
					if (in_array($extension, $allowed_ext)) {
						if ($file_size < 20971520) {
							move_uploaded_file($file_tmp, 'file/surat-masuk/'.$foto_lampiran);
							$Masuk = $db->update("surat",$data1,["id_surat" => $id_surat]);
						    if($Masuk) {
						        unset ($_POST);
						        echo "<script> alert('Data berhasil diedit!'); window.location = 'datasurat.php';</script>";
						    }
						    else {
						        unset ($_POST);
						        echo "<script>alert('Data gagal diedit:(!'); window.location = window.location.href;</script>";
						    }
						} else {
							echo "<script>alert('Ukuran File Terlalu Besar:(!'); window.location = window.location.href;</script>";
						}
					}else {
						echo "<script>alert('Extensi file tidak diizinkan:(!'); window.location = window.location.href;</script>";
					}
				}
			}

			$Masuk = $db->update("surat",$data,["id_surat" => $id_surat]);
		    if($Masuk) {
		        unset ($_POST);
		        echo "<script> alert('Data berhasil diedit!'); window.location = 'datasurat.php';</script>";
		    }
		    else {
		        unset ($_POST);
		        echo "<script>alert('Data gagal diedit:(!'); window.location = window.location.href;</script>";
		    }
		}

	 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/datasurat-table-edit.css">

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
						Form Edit Surat
					</div>
				</div>
				<div class="tabel-container" style="background-color: aliceblue; padding: 10px;">
					<div>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin ingin mengedit data ini??')">
							
							<!-- Duplicate just for test -->
							<div style="display: block;">
								<div class="form-tabel-inputdata form-tabel-inputdata-kiri" style="">
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>Tanggal Diterima</td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_diterima" placeholder="<?php echo $tgl_diterima; ?>" value="<?php echo $tgl_diterima; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Jam Diterima</td>
											<td>:</td>
											<td>
												<input type="time" style="width: 100px;" class="form-control form-tambah" name="jam_diterima" placeholder="<?php echo $jam_diterima; ?>" value="<?php echo $jam_diterima; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
									</table>
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>No Agenda</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 100px;" class="form-control form-tambah" name="no_agenda" placeholder="<?php echo  $no_agenda; ?>" value="<?php echo $no_agenda; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Nomor Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="no_surat" placeholder="<?php echo $no_surat; ?>" value="<?php echo $no_surat; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Perihal Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="perihal" placeholder="<?php echo $perihal; ?>" value="<?php echo $perihal; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Tanggal Surat</td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_surat" placeholder="<?php echo $tgl_surat; ?>" value="<?php echo $tgl_surat; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Pengirim Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="pengirim" placeholder="<?php echo $pengirim; ?>" value="<?php echo $pengirim; ?>" required <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>Rincian Surat</td>
											<td>:</td>
											<td>
												<textarea class="form-control form-tambah" name="rincian_surat" placeholder="Rincian Surat" style="width: 350px; height: 200px;" <?php echo $akses_edit; ?>><?php echo $rincian_surat;?></textarea>
											</td>
										</tr>
										<tr>
											<td>Tgl Pelaksanaan <br><b style="color: red;">(Jika Ada)</b></br></td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_pelaksanaan" placeholder="<?php echo $tgl_pelaksanaan; ?>" value="<?php echo $tgl_pelaksanaan; ?>" <?php echo $akses_edit; ?>>
											</td>
										</tr>
										<tr>
											<td>File Surat</td>
											<td>:</td>
											<td>
												<!-- code here -->
												<a target="_blank" href="file/surat-masuk/<?php echo $nama_foto; ?>"><?php echo $nama_foto; ?></a> Klik dibawah untuk ganti file
												<br>
												<input type="file" name="file_foto" <?php echo $akses_edit_file; ?>>
											</td>
										</tr>
									</table>
								</div>
								<div class="form-tabel-inputdata" style="">
									<table class="tabel-edit" style="margin-bottom: 35px;">
										<tr>
											<td>Disposisi 1</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 350px;" class="form-control form-tambah" name="disposisi1" placeholder="Disposisi">
											</td>
										</tr>
										<tr>
											<td>Instruksi 1</td>
											<td>:</td>
											<td>
												<textarea class="form-control form-tambah" placeholder="Instruksi" name="instruksi" style="width: 350px; height: 200px;;"><?php echo $instruksi; ?></textarea>
											</td>
										</tr>
									</table>
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>Disposisi 2</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 350px;" class="form-control form-tambah" name="disposisi2" placeholder="Disposisi 2">
											</td>
										</tr>
										<tr>
											<td>Instruksi 2</td>
											<td>:</td>
											<td>
												<textarea class="form-control form-tambah" placeholder="Instruksi2" name="instruksi2" style="width: 350px; height: 200px;"><?php echo $instruksi2; ?></textarea>
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
										<td>
											<select class="form-control form-tambah" name="status">
												<option value="<?php echo $status; ?>" selected hidden><?php echo $status; ?></option>
												<option value="Belum Selesai">Belum Selesai</option>
												<option value="Selesai">Selesai</option>
											</select>
										</td>
									</tr>
								</table>
							</div>
							<button type="submit" name="proses" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include "setting/footer.php" ?>
</body>
</html>

