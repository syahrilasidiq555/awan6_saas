<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'setting/head.php'; 
		include "setting/cekredirect.php";
		cekRole("mix");
		$user_role = $_SESSION['role'];
		$username_pengguna = $_SESSION['username'];
		$nama_user = $db->get("user","nama_user",["username" => $_SESSION['username']]);

		$count_suratmasuk = $count_suratmasuk = $db->count("surat",["username_pengguna" => $username_pengguna,"hapus"=>0]);
		$count_suratbelumselesai = $count_suratbelumselesai = $db->count("surat",["username_pengguna" => $username_pengguna,"status"=>"Belum Selesai","hapus"=>0]);
	?>
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/homes.css">
	
</head>
<body>
	<!-- HEADER -->
	<?php 
		include "setting/header.php";
	 ?>

	<!-- KONTEN -->
	<div class="konten">
		<div class="kontenatas">
			<div class="kontenatas-header">
				<!-- Selamat Datang (nama_user) -->
				<?php echo "Selamat Datang ".$nama_user; ?>
			</div>
			<div class="kontenatas-isi">
				<!-- Anda login sebagai (jenis_user). -->
				<?php echo "Anda Login Sebagai ".$user_role."."; ?>
			</div>
		</div>
		<div class="kontenbawah">
			<div class="menubawah">
				<a href="datasurat.php">
					<div class="menubawah-konten konten1">
						<div class="menubawah-konten-header">
							<i class="material-icons md-36 ikon">mail</i>
							<p class="konten-header">Surat Masuk</p>
						</div>
						<p>
						<?php echo $count_suratmasuk." Surat Masuk"; ?>
						</p>
					</div>
				</a>
			</div>
			<div class="menubawah">
				<a href="datasurat.php">
					<div class="menubawah-konten konten2">
						<div class="menubawah-konten-header">
							<i class="material-icons md-36 ikon">drafts</i>
							<p class="konten-header">Surat Belum Selesai</p>
						</div>
						<p>
							<?php echo $count_suratbelumselesai." Surat Belum Selesai"; ?>
						</p>
					</div>
				</a>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php 
		include "setting/footer.php";
	 ?>
</body>
</html>