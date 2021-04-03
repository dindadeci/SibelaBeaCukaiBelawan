<?php 
	include"inc/config.php";
	include"layout/headerperben.php";
	
?>
<script src="<?php echo $url ?>js/excel.js"></script>
<div class="container">
	<h4>Konfirmasi Jaminan</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="cetak/cetak_jaminan.php" class="btn btn-primary">Cetak</a>
				<a href="home.html" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
				<br>
				<button onclick="exportTableToExcel('tblData', 'jaminan')">Export Table Data To Excel File</button>

			<?php
		}
	?>
	
	<div class="col-md-12">
		<hr/>
	</div>

	<div class="row">
		<form action="jaminan.php" method="get">
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

			<div class="row" align="center">

		<!--<table class="table table-striped" border="1" style="width:1000px"; id="tblData">
			<tr style="background-color: #008899; color: white;"> -->
		<table class="table table-striped" border="1" id="tblData" style="width: 1000px;">
			<tr style="background-color: darkcyan; color: white;">
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
					if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$q = mysql_query("Select jaminan.* from jaminan where no_agenda like '%".$cari."%' OR nama like '%".$cari."%' order by id desc");					
					}else{
					$q = mysql_query("Select jaminan.* from jaminan order by tanggal_agenda ASC") or die (mysql_error());	
					}
					
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
			</tbody>
		</table>
	</div>
</div>
