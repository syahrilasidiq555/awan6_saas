<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'setting/head.php'; 
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		$username = $_SESSION['username'];
		$nama_user = $db->get("user_pengguna","nama_user",["username"=>$username]);
		$password = $db->get("user_pengguna","password",["username"=>$username]);
		$role = $db->get("user_pengguna","role",["username"=>$username]);

		if (isset($_POST['proses-editprofile'])) {
			$nama_user = $_POST['nama_user'];
			$data = [
			"nama_user"=>$nama_user
			];
			$masuk = $db->update("user",$data,["username"=>$username]);
			if ($masuk) {
				unset ($_POST);
	        	echo "<script> alert('Data berhasil diedit!!'); window.location = 'profil.php';</script>";
			} else {
				unset ($_POST);
	        	echo "<script>alert('Data gagal diedit:(!'); window.location = window.location.href;</script>";
			}
		}

	?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/profil.css">
</head>
<body>
	<!-- HEADER -->
	<?php 
		include "setting/header.php";
	 ?>

	<!-- KONTEN -->
	<div class="konten-profil">
		<div class="datasurat-header">
			<a class="judul-header-menu surat-masuk-color">
				<i class="material-icons md-24">account_circle</i>
				Profil User
			</a>
			<div class="judul-header-menu judul-header-menu-desc">
				Form Edit Data User
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
							<td>Username</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="text" name="username" value="<?php echo $username; ?>" required readonly style="width: 350px;"></td>
						</tr>
						<tr>
							<td>Nama Pengguna</td>
							<td>:</td>
							<td><input class="form-control form-tambah" type="text" name="nama_user" value="<?php echo $nama_user; ?>" required style="width: 350px;"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td>
								<input class="form-control form-tambah" type="text" name="password" value="<?php echo $password; ?>" required readonly style="width: 350px;">
							</td>
						</tr>
						<tr>
							<td>Peran</td>
							<td>:</td>
							<td>
								<input class="form-control form-tambah" type="text" name="role" value="<?php echo $role; ?>" required readonly style="width: 350px;">
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" name="proses-editprofile" class="btn btn-primary">Edit</button>
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
