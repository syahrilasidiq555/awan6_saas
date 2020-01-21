<link rel="stylesheet" type="text/css" href="assets/css/native-css/css-setting/left-sidebar.css">
		<div class="sidebar-datasurat-background">
		<?php 
			if ($name == 'surat-masuk') {
				?>
				<!-- html... -->
				<div class="sidebar-menu">
					<div class="sidebar-menu-content">
						<div class="sidebar-menu-header">Surat</div>
						
							<div class="sidebar-menu-list-clicked">
								<i class="material-icons md-20 ikon">mail</i>
								&nbsp; Surat Masuk
							</div>

						<a href="agenda-surat.php">
							<div class="sidebar-menu-list">
								<i class="material-icons md-20 ikon">date_range</i>
								&nbsp; Agenda Surat
							</div>
						</a>
					</div>
					<!-- Menu recycle bin -->
					<?php if ($user_role == 'admin'): ?>
						<div class="sidebar-menu-content">
							<div class="sidebar-menu-header">Recycle Bin</div>
							<a href="surat-terhapus.php">
								<div class="sidebar-menu-list">
									<i class="material-icons md-20 ikon">delete</i>
									&nbsp; Surat Terhapus
								</div>
							</a>
						</div>
					<?php endif ?>
				</div>
				<?php
			}else if ($name == 'agenda-keluar') {
				?>
				<!-- html... -->
				<div class="sidebar-menu">
					<div class="sidebar-menu-content">
						<div class="sidebar-menu-header">Surat</div>
						<a href="datasurat.php">
							<div class="sidebar-menu-list">
								<i class="material-icons md-20 ikon">mail</i>
								&nbsp; Surat Masuk
							</div>
						</a>
						
							<div class="sidebar-menu-list-clicked">
								<i class="material-icons md-20 ikon">date_range</i>
								&nbsp; Agenda Surat
							</div>
						
					</div>
					<!-- Menu recycle bin -->
					<?php if ($user_role == 'admin'): ?>
						<div class="sidebar-menu-content">
							<div class="sidebar-menu-header">Recycle Bin</div>
							<a href="surat-terhapus.php">
								<div class="sidebar-menu-list">
									<i class="material-icons md-20 ikon">delete</i>
									&nbsp; Surat Terhapus
								</div>
							</a>
						</div>
					<?php endif ?>
				</div>
				<?php
			}else if ($name == 'surat-terhapus') {
				?>
				<!-- html... -->
				<div class="sidebar-menu">
					<div class="sidebar-menu-content">
						<div class="sidebar-menu-header">Surat</div>
						<a href="datasurat.php">
							<div class="sidebar-menu-list">
								<i class="material-icons md-20 ikon">mail</i>
								&nbsp; Surat Masuk
							</div>
						</a>
						<a href="agenda-surat.php">
							<div class="sidebar-menu-list">
								<i class="material-icons md-20 ikon">date_range</i>
								&nbsp; Agenda Surat
							</div>
						</a>
					</div>
					<!-- Menu recycle bin -->
					<?php if ($user_role == 'admin'): ?>
						<div class="sidebar-menu-content">
							<div class="sidebar-menu-header">Recycle Bin</div>
							
								<div class="sidebar-menu-list-clicked">
									<i class="material-icons md-20 ikon">delete</i>
									&nbsp; Surat Terhapus
								</div>
							
						</div>
					<?php endif ?>
				</div>
				<?php
			} else {
				echo "<script>window.location = '../index.php'</script>";
			}
		?>
		</div>