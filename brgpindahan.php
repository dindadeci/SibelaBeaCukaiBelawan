<?php 
	include"inc/config.php";
	include"layout/headerperben.php";
	
?>
<script src="<?php echo $url ?>js/excel.js"></script>
<div class="container">
	<h4>Barang Pindahan</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="cetak/cetak_bpindahan.php" class="btn btn-primary">Cetak</a>
				<a href="home.html" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
				<br>
				<button onclick="exportTableToExcel('tblData', 'barang_pindahan')">Export Table Data To Excel File</button>

			<?php
		}
	?>
	<div class="col-md-12">
		<hr/>
	</div>

	
	<form action="brgpindahan.php" method="get">
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
				<th>Keterangan</th>
				<th>Pengajuan Kembali</th>
				<th>Kasi</th>
				<th>Persetujuan</th>

			</tr>
			<tbody>
				<?php
					
					$no = 0;
					if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$q = mysql_query("Select barang_pindahan.* from barang_pindahan where no_agendapindah like '%".$cari."%' OR nama_perusahaan like '%".$cari."%' order by id_pindah desc");
				}else{
					//$q = mysql_query("Select barang_pindahan.* from barang_pindahan order by id_pindah desc") or die (mysql_error());
					$q = mysql_query("Select barang_pindahan.* from barang_pindahan order by tgl_agendapindah ASC") or die (mysql_error());
				}
					while ($data = mysql_fetch_object($q)) {
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
