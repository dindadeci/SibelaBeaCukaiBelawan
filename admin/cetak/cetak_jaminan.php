<html>
<head>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN JAMINAN PERBENDAHARAAN</h2>
 
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
			<th>Seksi</th>
			<th>Surety</th>
			<th>Konfirmasi Jawaban</th>
			<th>STTJ/BPJ</th>
		</tr>
		<?php 
		$no = 0;
		$q = mysql_query("Select jaminan.* from jaminan");
		while($data = mysql_fetch_object($q)){
			$no++;
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->no_agenda; ?></td>
			<td><?php echo $data->tanggal_agenda; ?></td>
			<td><?php echo $data->nama; ?></td>
			<td><?php echo $data->npwp; ?></td>
			<td><?php echo $data->kepala_kantor; ?></td>
			<td><?php echo $data->seksi; ?></td>
			<td><?php echo $data->surety; ?></td>
			<td><?php echo $data->konfirjam; ?></td>
			<td><?php echo $data->sttj; ?></td>
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