<?php 
	include"inc/config.php";
	include"layout/headerperben.php";
	
?>
<script src="<?php echo $url ?>js/excel.js"></script>
<div class="container">
	<h4>Pengembalian</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="cetak/cetak_pengembalian.php" class="btn btn-primary">Cetak</a>
				<a href="home.html" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
				<br>
				<button onclick="exportTableToExcel('tblData', 'pengembalian')">Export Table Data To Excel File</button>

				<?php
		}
	?>

	<div class="col-md-12">
		<hr/>
	</div>
	<div>
	<form action="pengembalian.php" method="get">
			<label>Cari :</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>
		<?php 
			if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			echo "<b>Hasil pencarian : ".$cari."</b>";
			}
		?>
	</div>


	<div class="row" align="center">
		
		<div class="row" align="center">
		<table class="table table-striped" border="1" id="tblData" style="width: 1000px;">
			<tr style="background-color: darkcyan; color: white;">
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
			<tbody>
				<?php 
					$no = 0;
					if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$q = mysql_query("Select pengembalian.* from pengembalian where no_agendakem like '%".$cari."%' OR namapt like '%".$cari."%'order by idkembali desc");	
				
					}else{
					$q = mysql_query("Select pengembalian.* from pengembalian order by tgl_agendakem ASC") or die (mysql_error());	
					}
					
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
			</tbody>
		</table>
	</div>
</div>

<?php
if (@$_GET['act'] == "cetak") {
	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	include("assets/MPDF57/mpdf.php");
	$mpdf=new mPDF();
	//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
	$stylesheet = file_get_contents('assets/css/style.css');
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML(utf8_encode($html), 2);
	$mpdf->Output();
	exit;
}
?>
