<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'setting/head.php'; 
		// include "setting/cekredirect.php";
		// cekRole("admin");
		// $user_role = $_SESSION['role'];
		
		// Delete user
		if (isset($_POST['delete_user'])) {
			if ($_POST["username"] == "admin") {
				unset($_POST);
				echo "<script> alert('username ADMIN tidak dapat dihapus!!!'); window.location = window.location.href;</script>";
			}else {
				$delete_user_forever = $db->delete("user_pengguna",["username" => $_POST["username"]]);
				if ($delete_user_forever) {
					unset($_POST['delete']);
					echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";
				} else {
					unset($_POST['delete']);
					echo "<script> alert('Data gagal dihapus'); window.location = window.location.href;</script>";
				}
			}
		}
	?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/user.css">

	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<!-- HEADER -->
	<?php 
		include "setting/header.php";
	 ?>

	<!-- KONTEN -->
	<div class="konten-user">
		<div class="datasurat-header">
			<div class="judul-header-menu surat-masuk-color">
				<i class="material-icons md-24">account_box</i>
				Daftar User
			</div>
			<a href="user-tambah.php" class="judul-header-menu">
				<i class="material-icons md-32">add_circle</i>
					Tambah Pengguna
			</a>
		</div>
		<div class="tabel-container">
			<!-- Tabel from Datatables -->
			<script type="text/javascript">
			 	$(document).ready(function() {
					$('#example').DataTable();
				} );
			</script>
			 <!-- Table from database -->
			<table id="example" class="table" style="">
				<thead>
					<tr>
						<th>Aksi</th>
						<th>Username</th>
						<th>Nama Pengguna</th>
						<th>Password</th>
						<th>Peran</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$db_showall = $db->select("user_pengguna","*");

						foreach ($db_showall as $table) {
							?>
						<tr>		
							<td>
								<form action="" method="post" onsubmit="return confirm('Apakah anda yakin??')">
									<input type="hidden" name="username" value="<?php echo $table['username'];?>">
									<a href="user-edit.php?username=<?php echo $table['username']; ?>">Edit</a>&nbsp;
									<!-- Delete Forever -->
									<button type="submit" name="delete_user" class="suratterhapus-tablemenu">
									Hapus
									</button>
								</form>
							</td>
							<td><?php echo $table['username']; ?></td>
							<td><?php echo $table['nama_user']; ?></td>
							<td><?php echo $table['password']; ?></td>
							<td><?php echo $table['role']; ?></td>
						</tr>   
							<?php
							}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- FOOTER -->
	<?php 
		include "setting/footer.php";
	 ?>
</body>
</html>