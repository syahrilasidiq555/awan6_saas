<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'setting/head.php';
	
		// Tambah data user
		if (isset($_POST['proses-tambah'])) {
			$username = $_POST['username'];
			$nama_user = $_POST['nama_user'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$role = 'admin';
			$count_username = $count_username = $db->count("user_pengguna",['username'=> $username]);
			$count_email = $count_email = $db->count("user_pengguna",['email_pengguna'=> $email]);

			if ($count_username>0 || $count_email>0) {
				unset ($_POST);
				if ($count_username>0) {
		        	echo "<script> alert('Data GAGAL ditambah. Username Telah ada!!');</script>";
				}
				if ($count_email>0) {
					echo "<script> alert('Data GAGAL ditambah. Email Telah ada!!');</script>";
				}
			} else {
				$data = [
				"username"=>$username, 
				"nama_user"=>$nama_user, 
				"password"=>$password, 
				"role"=>$role
				];
				$masuk = $db->insert("user_pengguna",$data);
				if ($masuk) {
					unset ($_POST);
		        	echo "<script> alert('Data berhasil ditambah!!'); window.location = 'index.php';</script>";
				} else {
					unset ($_POST);
		        	echo "<script>alert('Data gagal ditambah:(!'); window.location = window.location.href;</script>";
				}
			}
		}
	?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/daftar.css">

</head>
<style type="text/css">
	.bgimage {
		background-color: #88b5ca;
	}
</style>
<body class="bgimage"> 
	<!-- KONTEN -->
	<div class="konten-user">
		<div class="datasurat-header">
			<a href="" class="judul-header-menu surat-masuk-color">
				<i class="material-icons md-24">account_box</i>
				Form Daftar
			</a>
			<div class="judul-header-menu judul-header-menu-desc">
				Form Daftar Untuk Pengguna
			</div>
		</div>
		<div class="tambah-container">
			<form action="" method="post" onsubmit="return confirm('Apakah anda yakin??');">
				<div class="">
					<style type="text/css">
						.tabel-tambah td {
							padding: 8px 10px;
						}
						.form-tambah {
							border: 2px;
							padding: 1px 5px;
							height: 25px;
							font-size: 14px;
							border: 1px solid #ced4da;
						}
					</style>
					<table class="tabel-tambah" border="0">
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="text" name="username" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>Nama Pengguna</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="text" name="nama_user" required style="width: 350px;"></td>
						</tr><tr>
							<td>Email</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="text" name="email" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="password" name="password" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>
								<button type="submit" name="proses-tambah" class="btn btn-primary">Daftar</button>
							</td>
						</tr>
					</table>
				</div>
				            
			</form>
		</div>
	</div>

	<!-- FOOTER -->
	<?php 
		include "setting/footer.php";
	 ?>
</body>
</html>