<?php 
	include"../inc/config.php"; 
	validate_admin_not_login("login.php");

	?>
<div class="container">
	<?php

	
	
	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){
			
			$q = mysql_query("delete from barang_pindahan WHERE id_pindah='$_GET[id_pindah]'");
			if($q){ alert("Success"); redir("pindahan.php"); }
		}  
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("insert into barang_pindahan Values (NULL,'$no_agendapindah','$tgl_agendapindah','$nama_perusahaan','$npwp','$kepala_kan','$peneliti_pindah','$ket_pindah','$pengajuan','$kasi','$persetujuan_pindah')");
			if($q){ alert("Success"); redir("pindahan.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("update barang_pindahan SET no_agendapindah='$no_agendapindah',tgl_agendapindah='$tgl_agendapindah',nama_perusahaan='$nama_perusahaan',npwp='$npwp',kepala_kan='$kepala_kan',peneliti_pindah='$peneliti_pindah',ket_pindah='$ket_pindah',pengajuan='$pengajuan',kasi='$kasi',persetujuan_pindah='$persetujuan_pindah' where id_pindah=$_GET[id]") or die(mysql_error());
			if($q){ alert("Success"); redir("pindahan.php"); }
		}
	}
	
	
	include"inc/header.php";
	
?> 
	
	<div class="container">
		<?php
			$q = mysql_query("select*from barang_pindahan");
			$j = mysql_num_rows($q);
		?>
		<h4>Daftar Data pindahan (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="pindahan.php?act=create">Add Data</a>
		<?php
		if (@$_GET['act'] != "cetak") { 
			?>
				<a href="../cetak/cetak_bpindahan.php" class="btn btn-sm btn-primary">Cetak</a>
			<?php
		}

		?>
		<hr>

		<?php
			if(!empty($_GET)){
				if($_GET['act'] == 'create'){
				?>
					<div class="row col-md-6">
					<form action="" method="post" enctype="multipart/form-data">
						<label>Nomor Agenda</label><br>
						<input type="text" class="form-control" name="no_agendapindah" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendapindah"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama_perusahaan" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kan"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_pindah"><br>
						<label>Keterangan</label><br>
						<input type="text" class="form-control" name="ket_pindah"><br>
						<label>pengajuan</label><br>
						<input type="date" class="form-control" name="pengajuan"><br>
						<label>kasi</label><br>
						<input type="date" class="form-control" name="kasi"><br>
						<label>persetujuan_pindah</label><br>
						<input type="date" class="form-control" name="persetujuan_pindah"><br>

						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
				if($_GET['act'] == 'edit'){
					$data = mysql_fetch_object(mysql_query("select*from barang_pindahan where id_pindah='$_GET[id_pindah]'"));
				?>
					<div class="row col-md-6">
					<form action="pindahan.php?act=edit&&id=<?php echo $_GET['id_pindah'] ?>" method="post" enctype="multipart/form-data">
					
						<label>Nomor Agenda</label><br>
						<input type="text" class="form-control" name="no_agendapindah" value="<?php echo $data->no_agendapindah; ?>" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendapindah" value="<?php echo $data->tgl_agendapindah; ?>"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $data->nama_perusahaan; ?>" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp" value="<?php echo $data->npwp; ?>"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kan" value="<?php echo $data->kepala_kan; ?>"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_pindah" value="<?php echo $data->peneliti_pindah; ?>"><br>
						<label>Keterangan</label><br>
						<input type="text" class="form-control" name="ket_pindah" value="<?php echo $data->ket_pindah; ?>"><br>
						<label>pengajuan</label><br>
						<input type="date" class="form-control" name="pengajuan" value="<?php echo $data->pengajuan; ?>"><br>
						<label>kasi</label><br>
						<input type="date" class="form-control" name="kasi" value="<?php echo $data->kasi; ?>" ><br>
						<label>persetujuan_pindah</label><br>
						<input type="date" class="form-control" name="persetujuan_pindah" value="<?php echo $data->persetujuan_pindah; ?>"><br>
					
						<input type="submit" name="form-edit" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
			}
		?>
		
		<table class="table table-striped table-hove"> 
			<thead> 
				<tr> 
					<th>#</th>  
					<th>Nomor Agenda</th> 
					<th>Tanggal Agenda</th>
					<th>Nama Perusahaan</th>
					<th>NPWP</th>
					<th>Kepala Kantor</th>
					<th>Penelitian</th> 
					<th>Keterangan</th>
					<th>Pengajuan Kembali</th>
					<th>kasi</th>
					<th>Persetujuan Pindah</th> 
					<th>*</th> 
				</tr> 
			</thead> 
			<tbody> 
				

			
			
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<td><?php echo $data->no_agendapindah ?></td> 
					<td><?php echo $data->tgl_agendapindah ?></td> 
					<td><?php echo $data->nama_perusahaan ?></td> 
					<td><?php echo $data->npwp ?></td> 
					<td><?php echo $data->kepala_kan ?></td> 
					<td><?php echo $data->peneliti_pindah ?></td> 
					<td><?php echo $data->ket_pindah ?></td> 
					<td><?php echo $data->pengajuan ?></td> 
					<td><?php echo $data->kasi ?></td> 
					<td><?php echo $data->persetujuan_pindah ?></td>  
					<td>
						<a class="btn btn-sm btn-success" href="pindahan.php?act=edit&&id_pindah=<?php echo $data->id_pindah ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="pindahan.php?act=delete&&id_pindah=<?php echo $data->id_pindah ?>">Delete</a>
					</td> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
    </div> <!-- /container -->
	
<?php include"inc/footer.php"; ?>