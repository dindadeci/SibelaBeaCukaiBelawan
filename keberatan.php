<?php 
	include"inc/config.php";
	include"layout/headerperben.php";
	
?>
<script src="<?php echo $url ?>js/excel.js"></script>
<div class="container">
	<h4>Keberatan</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="cetak/cetak_keberatan.php" class="btn btn-primary">Cetak</a>
				<a href="home.html" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
				<br>
				<button onclick="exportTableToExcel('tblData', 'keberatan')">Export Table Data To Excel File</button>

				<?php
		}
	?>

	<div class="col-md-12">
		<hr/>
	</div>
	
	<form action="keberatan.php" method="get">
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

		<table class="table table-striped" border="1" id="tblData" style="width: 1000px;">
			<tr style="background-color: darkcyan; color: white;">
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
			<tbody>
				<?php
					$no = 0;
					if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$q = mysql_query("Select keberatan.* from keberatan where no_agendaberat like '%".$cari."%' OR nama_pt like '%".$cari."%'order by id_berat desc");					
					}else{
					$q = mysql_query("Select keberatan.* from keberatan order by tgl_agendaberat ASC") or die (mysql_error());
				}
					while ($data = mysql_fetch_object($q)) {
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
