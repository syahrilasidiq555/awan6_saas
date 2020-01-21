<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'setting/head.php'; 
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		$username = $_SESSION['username'];
		$password = $db->get("user","password",["username"=>$username]);

		if (isset($_POST['proses-ubahpass'])) {
			$password_lama = $_POST['password-lama'];
			$password_baru1 = $_POST['newpass1'];
			$password_baru2 = $_POST['newpass2'];
			if ($db->has('user',["username" => $username, "password" => $password_lama])) {
				if ($password_baru1 === $password_baru2) {
					$data = [
						"password"=>$password_baru1
					];
					$masuk = $db->update("user",$data,["username"=>$username]);
					if ($masuk) {
						unset ($_POST);
			        	echo "<script> alert('Password berhasil diedit!!'); window.location = window.location.href;</script>";
					} else {
						unset ($_POST);
			        	echo "<script>alert('Password gagal diedit:(!'); window.location = window.location.href;</script>";
					}
				} else {
					unset ($_POST['proses-ubahpass']);
	        		echo "<script> alert('Konfirmasi password Baru anda tidak cocok!!'); window.location = window.location.href;</script>";
				}
			} else {
				unset ($_POST['proses-ubahpass']);
	        	echo "<script> alert('Password Lama Anda Salah!!'); window.location = window.location.href;</script>";
			}
		}
		
	?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/ubah-password.css">
</head>
<body>
	<!-- HEADER -->
	<?php 
		include "setting/header.php";
	 ?>

	<!-- KONTEN -->
	<div class="konten-ubahpass">
		<div class="datasurat-header">
			<a class="judul-header-menu surat-masuk-color">
				<i class="material-icons md-24">lock</i>
				Ubah Password
			</a>
			<div class="judul-header-menu judul-header-menu-desc">
				Form Ubah Password
			</div>
		</div>
		<div class="tambah-container">
			<form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menambahkan data ini kedalam data user??');">
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
							<td>Password Lama</td>
							<td>:</td>
							<td>
								<input class="form-control form-tambah" type="password" name="password-lama" required style="width: 350px;"> 
							</td>
						</tr>
						<tr>
							<td>Password Baru</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="password" name="newpass1" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>Konfirmasi Password Baru</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="password" name="newpass2" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>
								<button type="submit" name="proses-ubahpass" class="btn btn-primary">Ubah Password</button>
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