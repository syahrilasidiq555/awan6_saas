<table id="example" class="table" style="">
	<thead>
		<tr>
			<th>Aksi</th>
			<th>No Agenda</th>
			<th>Tanggal Diterima</th>
			<th>Jam Diterima</th>
			<th>Pengirim</th>
			<th>Perihal</th>
			<th>Rincian Surat</th>
			<th>Tgl Pelaksanaan (jika ada)</th>
			<th>Nomor surat</th>
			<th>Tanggal surat</th>
			<th>Disposisi (1)</th>
			<th>Instruksi (1)</th>
			<th>Disposisi (2)</th>
			<th>Instruksi (2)</th>
			<th>Status</th>
		</tr>
	</thead>
	<style type="text/css">
		.suratterhapus-tablemenu {
			background-color: transparent;
			border: none;
			color: #007bff;
			padding: 0px;

		}
		.suratterhapus-tablemenu:hover {
			background-color: transparent;
			border: none;
			text-decoration: underline;
			color: #0056b3;
			padding: 0px;
		}
	</style>
	<?php 
		if (ISSET($_POST['delete'])) {
			$delete_frv = $db->delete("surat",["id_surat" =>  $_POST['id_surat']]);
			$nama_foto = $_POST['nama_foto'];
			if ($nama_foto != "") {
				// move file to delete-files folder
				$deleted_filename = 'file/deleted-files/'.$nama_foto;
				if (file_exists($deleted_filename)) {
					unlink($deleted_filename);
				}
			}
			if ($delete_frv) {
				unset($_POST['delete']);
				echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";
			} else {
				unset($_POST['delete']);
				echo "<script> alert('Data gagal dihapus'); window.location = window.location.href;</script>";
			}
		}
		if (ISSET($_POST['restore'])) {
			$restore = $db->update("surat",["hapus"=>0],["id_surat" =>  $_POST['id_surat']]);
			$nama_foto = $_POST['nama_foto'];
			if ($nama_foto != "") {
				// move file to delete-files folder
				$deleted_filename = 'file/deleted-files/'.$nama_foto;
				$restored_filename = 'file/surat-masuk/'.$nama_foto;
				if (file_exists($deleted_filename)) {
					rename($deleted_filename, $restored_filename);
				}
			}

			if ($restore) {	
				unset($_POST['restore']);
				echo "<script> alert('Data berhasil dikembalikan ke database surat'); window.location = window.location.href;</script>";
			} else {
				unset($_POST['restore']);
				echo "<script> alert('Data Gagal dikembalikan'); window.location = window.location.href;</script>";
			}
		}
		
	?>
	<tbody>
		<?php 
			$db_showall = $db->select("surat","*",["username_pengguna" => $username_pengguna,"hapus" => 1]);
			foreach ($db_showall as $table) {
				?>
		<tr>
			<td>
				<form action="" method="post" onsubmit="return confirm('Apakah anda yakin??')">
					<input type="hidden" name="id_surat" value="<?php echo $table['id_surat'];?>">
					<input type="hidden" name="nama_foto" value="<?php echo $table['foto_lampiran'];?>">
					<!-- Restore Data -->
					<button type="submit" name="restore" class="suratterhapus-tablemenu">
						Pulihkan
					</button>&nbsp;
					<!-- Delete Forever -->
					<button type="submit" name="delete" class="suratterhapus-tablemenu">
						Hapus
					</button>
				</form>
			</td>
			<td><?php echo htmlspecialchars($table['no_agenda']);?></td>
			<td><?php echo htmlspecialchars($table['tgl_diterima']);?></td>
			<td><?php echo htmlspecialchars($table['jam_diterima']);?></td>
			<td><?php echo htmlspecialchars($table['pengirim']);?></td>
			<td><?php echo htmlspecialchars($table['perihal']);?></td>
			<td><?php echo htmlspecialchars($table['rincian_surat']);?></td>
			<td><?php echo htmlspecialchars($table['tgl_pelaksanaan']);?></td>
			<td><?php echo htmlspecialchars($table['no_surat']);?></td>
			<td><?php echo htmlspecialchars($table['tgl_surat']);?></td>
			<td><?php echo htmlspecialchars($table['disposisi1']);?></td>
			<td><?php echo htmlspecialchars($table['instruksi']);?></td>
			<td><?php echo htmlspecialchars($table['disposisi2']);?></td>
			<td><?php echo htmlspecialchars($table['instruksi2']);?></td>
			<td><?php echo htmlspecialchars($table['status']);?></td>
		</tr>
			<?php 
			} 
		?>
	</tbody>
</table>