<html>
<head>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG PINDAHAN PERBENDAHARAAN</h2>
 
	</center>
 
	<?php 
	include '../inc/config.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th>No</th>
			<th>Nomor Agenda</th>
			<th>Tanggal Agenda</th>
			<th>Nama Perusahaan</th>
			<th>NPWP</th>
			<th>Kepala Kantor</th>
			<th>Penelitian</th>
			<th>Keterangan</th>
			<th>Pengajuan Kembali</th>
			<th>Kasi</th>
			<th>Persetujuan</th>
		</tr>
		<?php 
		$no = 0;
		$q = mysql_query("Select barang_pindahan.* from barang_pindahan");
		while($data = mysql_fetch_object($q)){
			$no++;
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->no_agendapindah; ?></td>
			<td><?php echo $data->tgl_agendapindah; ?></td>
			<td><?php echo $data->nama_perusahaan; ?></td>
			<td><?php echo $data->npwp; ?></td>
			<td><?php echo $data->kepala_kan; ?></td>
			<td><?php echo $data->peneliti_pindah; ?></td>
			<td><?php echo $data->ket_pindah; ?></td>
			<td><?php echo $data->pengajuan; ?></td>
			<td><?php echo $data->kasi; ?></td>
			<td><?php echo $data->persetujuan_pindah; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>