<?php 
	include "setting/conn.php";
	// require "vendor/autoload.php";
	// use Medoo\Medoo;
	// $db = new Medoo([
	// 	'database_type' => 'mysql',
	//     'database_name' => 'persuratan_disdukcapil',
	//     'server' => 'localhost',
	//     'username' => 'root',
	//     'password' => '',		

	//     ])
 ?>
<!-- Take data From Database -->

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
	<tbody>
		<?php 

			// Tampil semua data dr database
			$db_showall = $db->select("surat","*",["username_pengguna" => $username_pengguna, "hapus" => 0,"tgl_diterima[<>]"=>[$dari_tgl,$sampai_tgl]]);

			foreach ($db_showall as $table) {
				?>
			<tr>
				<td>
					<a href="datasurat-table-detail.php?id_surat=<?php echo $table['id_surat']; ?>">Detail</a>
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
