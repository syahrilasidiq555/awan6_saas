
<!DOCTYPE html>
<html>
<head>
	<?php 
		$name='surat-masuk';
		include "setting/head.php";
		include "setting/cekredirect.php";
		cekRole("admin&kadis");
		$user_role = $_SESSION['role'];
		$username_pengguna = $_SESSION['username'];

		// jumlah agenda otomatis
		// $jml_agenda = $db->count("surat",["hapus"=>0]);
		// $agenda = $jml_agenda + 1;

		$agenda = 1;
		while ($db->has("surat",['username_pengguna'=>$username_pengguna, 'no_agenda'=>$agenda, 'hapus'=>0])) {
			$agenda = $agenda + 1;
		}
		
		// generate unique id
		$id_generate = $db->count("surat");
		while ($db->has("surat",['id_surat'=>$id_generate])) {
			$id_generate = $id_generate + 1;
		}
		// tambah data manual
		if(ISSET($_POST['proses'])){
			$id_surat = $id_generate;
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
				"id_surat"=>$id_surat,
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
				"status"=>$status,
				"username_pengguna"=>$username_pengguna,
				"hapus"=>0
			];

			$Masuk = $db->insert("surat", $data);
		    if($Masuk) {
		        unset ($_POST);
		        echo "<script> alert('Data berhasil ditambah!!'); window.location = 'datasurat.php';</script>";
		    }
		    else {
		        unset ($_POST);
		        echo "<script>alert('Data gagal ditambah:(!'); window.location = window.location.href;</script>";
		    }

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
		// proses 3, Tambah data undangan
		if(ISSET($_POST['proses3'])){
			$id_surat = $id_generate;
			$no_agenda = $_POST['no_agenda'];
			$tgl_diterima = $_POST['tgl_diterima'];
			$jam_diterima = $_POST['jam_diterima'];
			$pengirim = $_POST['pengirim'];
			$perihal = $_POST['perihal'];

			$hari_undangan = $_POST['hari_u'];
			$jam_undangan = $_POST['jam_u'];
			$tempat_undangan = $_POST['tempat_u'];

			$rincian_surat = "Dilaksanakan Pada Hari : ".$hari_undangan.", Pada Jam : ".$jam_undangan.", Pada Tempat : ".$tempat_undangan.". ".$_POST['rincian_surat'];
			$tgl_pelaksanaan = $_POST['tanggal_u'];
			$no_surat = $_POST['no_surat'];
			$tgl_surat = $_POST['tgl_surat'];
			$disposisi1 = $_POST['disposisi1'];
			$instruksi  = $_POST['instruksi'];
			$disposisi2  = $_POST['disposisi2'];
			$instruksi2  = $_POST['instruksi2'];
			$status  = $_POST['status'];
			
			
			$data = [
				"id_surat"=>$id_surat,
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
				"status"=>$status,
				"hapus"=>0
			];

			$Masuk = $db->insert("surat", $data);
		    if($Masuk) {
		        unset ($_POST);
		        echo "<script> alert('Data berhasil ditambah!!'); window.location = 'datasurat.php';</script>";
		    }
		    else {
		        unset ($_POST);
		        echo "<script>alert('Data gagal ditambah:(!'); window.location = window.location.href;</script>";
		    }

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
	 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/datasurat-table-tambah.css">

	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>

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


		.datasurat-header a:hover {
			cursor: pointer;
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
					<a href="datasurat.php" class="judul-header-menu-main surat-masuk-color">
						<i class="material-icons md-24">mail</i>
						Surat Masuk
					</a>
				</div>
				<div class="tabel-container" style="background-color: aliceblue; padding: 10px;">
					<div>
						<h4>Form Tambah Data Manual</h4>
						<hr style="margin-top: 0px;">
						<form action="" method="post" enctype="multipart/form-data">
							<!-- Duplicate just for test -->
							<div style="display: block;">
								<div class="form-tabel-inputdata form-tabel-inputdata-kiri" style="">
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>Tanggal Diterima</td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_diterima" placeholder="Tanggal Diterima" required>
											</td>
										</tr>
										<tr>
											<td>Jam Diterima</td>
											<td>:</td>
											<td>
												<input type="time" id="time" style="width: 100px;" class="form-control form-tambah" name="jam_diterima" placeholder="Jam Diterima" required>
											</td>
										</tr>
									</table>
									<table class="tabel-edit" style="margin-bottom: 25px;">
										<tr>
											<td>No Agenda</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 100px;" class="form-control form-tambah" name="no_agenda" placeholder="Index Surat" value="<?php echo sprintf('%03d',$agenda); ?>" required>
											</td>
										</tr>

										<tr>
											<td>Nomor Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="no_surat" placeholder="Nomor Surat" required>
											</td>
										</tr>
										<tr>
											<td>Perihal Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="perihal" placeholder="Perihal Surat" required>
											</td>
										</tr>
										<tr>
											<td>Tanggal Surat</td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_surat" placeholder="Tanggal Surat" required>
											</td>
										</tr>
										<tr>
											<td>Pengirim Surat</td>
											<td>:</td>
											<td>
												<input type="text" style="width: 200px;" class="form-control form-tambah" name="pengirim" placeholder="Pengirim Surat" required>
											</td>
										</tr>
										<tr>
											<td>Rincian Surat</td>
											<td>:</td>
											<td>
												<textarea class="form-control form-tambah" placeholder="Rincian Surat" name="rincian_surat" style="width: 350px; height: 200px;"></textarea>
											</td>
										</tr>
										<tr>
											<td>Tgl Pelaksanaan <br><b style="color: red;">(Jika Ada)</b></br></td>
											<td>:</td>
											<td>
												<input type="date" style="width: 200px;" class="form-control form-tambah" name="tgl_pelaksanaan" placeholder="Tgl Pelaksanaan">
											</td>
										</tr>
										<tr>
											<td>File Surat</td>
											<td>:</td>
											<td>
												<!-- code here -->
												<input type="file" name="file_foto">
												<div style="color: red;">*Input File harus memiliki format PDF!</div>
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
												<textarea class="form-control form-tambah" placeholder="Instruksi" name="instruksi" style="width: 350px; height: 200px;"></textarea>
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
												<textarea class="form-control form-tambah" placeholder="Instruksi" name="instruksi2" style="width: 350px; height: 200px;"></textarea>
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
												<option value="Belum Selesai" selected hidden>Belum Selesai</option>
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

