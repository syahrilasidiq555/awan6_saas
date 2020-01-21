<div class="header">
	<div class="logoapp">
		<!-- <p>LOGO</p> -->
		<div>
			<img src="img/pemkot.png"  height="55px" alt="Logo Pemkot Kota Cimahi">
		</div>
	</div>
	<a href="home.php" class="header-menu">
		<p>Beranda</p>
	</a>
	<a href="datasurat.php" class="header-menu">
		Data Surat
	</a>
	<div class="header-akunuser dropdown-rylx">
		<button class="dropbtn-rylx">
			<i class="material-icons">account_circle</i>
			<!-- Akun Anda -->
			
			<?php echo $_SESSION['username']; ?>

		</button>
		<div class="dropdown-content-rylx dropdown-content-rylx-kanan">
			<a href="profil.php">Profil</a>
			<a href="ubah-password.php">Ubah Password</a>
			<a href="logout.php" class="garisatas">
				<i class="material-icons">settings_power</i>
				Logout
			</a>
		</div>
	</div>
</div>