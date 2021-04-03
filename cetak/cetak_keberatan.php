<html>
<head>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENGAJUAN KEBERATAN PERBENDAHARAAN</h2>
 
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
			<th>Seksi</th>
			<th>Kepala Kantor</th>
			<th>Kanwil</th>
			<th>Keputusan</th>
		</tr>
		<?php 
		$no = 0;
		$q = mysql_query("Select keberatan.* from keberatan");
		while($data = mysql_fetch_object($q)){
			$no++;
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->no_agendaberat; ?></td>
			<td><?php echo $data->tgl_agendaberat; ?></td>
			<td><?php echo $data->nama_pt; ?></td>
			<td><?php echo $data->npwp_berat; ?></td>
			<td><?php echo $data->kepala_kantor1; ?></td>
			<td><?php echo $data->peneliti_berat; ?></td>
			<td><?php echo $data->seksi_berat; ?></td>
			<td><?php echo $data->kepala_kantor2; ?></td>
			<td><?php echo $data->kanwil; ?></td>
			<td><?php echo $data->keputusan_berat; ?></td>
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