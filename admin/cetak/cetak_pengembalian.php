<html>
<head>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENGEMBALIAN PERBENDAHARAAN</h2>
 
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
			<th>KPPN</th>
			<th>Penelitian</th>
			<th>Keterangan</th>
			<th>SKEP</th>
			<th>SPM</th>
			<th>SP2D</th>
		</tr>
		<?php 
		$no = 0;
		$q = mysql_query("Select pengembalian.* from pengembalian");
		while($data = mysql_fetch_object($q)){
			$no++;
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->no_agendakem; ?></td>
			<td><?php echo $data->tgl_agendakem; ?></td>
			<td><?php echo $data->namapt; ?></td>
			<td><?php echo $data->npwp_kembali; ?></td>
			<td><?php echo $data->kep_kantor; ?></td>
			<td><?php echo $data->seksikem; ?></td>
			<td><?php echo $data->kppn; ?></td>
			<td><?php echo $data->peneliti_kem; ?></td>
			<td><?php echo $data->ket_kem; ?></td>
			<td><?php echo $data->skep; ?></td>
			<td><?php echo $data->spm; ?></td>
			<td><?php echo $data->sp2d; ?></td>
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