<?php 
	include"../inc/config.php"; 
	validate_admin_not_login("login.php");

	?>

<div class="container">
	<?php
	
	
	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){
			
			$q = mysql_query("delete from keberatan WHERE id_berat='$_GET[id_berat]'");
			if($q){ alert("Success"); redir("keberatan.php"); }
		}  
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("insert into keberatan Values (NULL, '$no_agendaberat','$tgl_agendaberat','$nama_pt','$npwp_berat','$kepala_kantor1','$peneliti_berat','$seksi_berat','$kepala_kantor2','$kanwil','$keputusan_berat')");
			if($q){ alert("Success"); redir("keberatan.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("update keberatan SET no_agendaberat='$no_agendaberat',tgl_agendaberat='$tgl_agendaberat',nama_pt='$nama_pt',npwp_berat='$npwp_berat',kepala_kantor1='$kepala_kantor1',peneliti_berat='$peneliti_berat',seksi_berat='$seksi_berat',kepala_kantor2='$kepala_kantor2',kanwil='$kanwil',keputusan_berat='$keputusan_berat' where id_berat=$_GET[id]") or die(mysql_error());
			if($q){ alert("Success"); redir("keberatan.php"); }
		}
	}
	
	
	include"inc/header.php";
	
?> 
	
	<div class="container">
		<?php
			$q = mysql_query("select*from keberatan");
			$j = mysql_num_rows($q);
		?>
		<h4>Daftar Data keberatan (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="keberatan.php?act=create">Add Data</a>
		<?php
		if (@$_GET['act'] != "cetak") { 
			?>
				<a href="../cetak/cetak_keberatan.php" class="btn btn-sm btn-primary">Cetak</a>
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
						<input type="text" class="form-control" name="no_agendaberat" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendaberat"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama_pt" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp_berat" required><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor1"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_berat"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksi_berat"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor2"><br>
						<label>Kanwil</label><br>
						<input type="text" class="form-control" name="kanwil"><br>
						<label>Keputusan Berat</label><br>
						<input type="date" class="form-control" name="keputusan_berat"><br>
						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
				if($_GET['act'] == 'edit'){
					$data = mysql_fetch_object(mysql_query("select*from keberatan where id_berat='$_GET[id_berat]'"));
				?>
					<div class="row col-md-6">
					<form action="keberatan.php?act=edit&&id=<?php echo $_GET['id_berat'] ?>" method="post" enctype="multipart/form-data">
						<label>Nomor Agenda</label><br>
						<input type="text" class="form-control" name="no_agendaberat" value="<?php echo $data->no_agendaberat; ?>" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendaberat" value="<?php echo $data->tgl_agendaberat; ?>"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama_pt" value="<?php echo $data->nama_pt; ?>" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp_berat" value="<?php echo $data->npwp_berat; ?>" required><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor1" value="<?php echo $data->kepala_kantor1; ?>"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_berat" value="<?php echo $data->peneliti_berat; ?>"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksi_berat" value="<?php echo $data->seksi_berat; ?>"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor2" value="<?php echo $data->kepala_kantor2; ?>"><br>
						<label>Kanwil</label><br>
						<input type="text" class="form-control" name="kanwil" value="<?php echo $data->kanwil; ?>"><br>
						<label>Keputusan Berat</label><br>
						<input type="date" class="form-control" name="keputusan_berat" value="<?php echo $data->keputusan_berat; ?>"><br>
						
					
						<input type="submit" name="form-edit" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
			}
		?>
		
		<div class="row" align="center">
		<table class="table table-striped" border="1" style="width:1000px"; id="tblData">
			<tr style="background-color: #008899; color: white;">
			<thead> 
				<tr> 
					<th>#</th> 
					<th>Nomor Agenda</th> 
					<th>Tanggal Agenda</th>
					<th>Nama Perusahaan</th> 
					<th>NPWP</th> 
					<th>Kepala Kantor1</th>
					<th>Penelitian</th>
					<th>Seksi</th>
					<th>Kepala Kantor2</th>
					<th>Kanwil</th>
					<th>keputusan</th>
					<th>*</th>
				</tr> 
			</thead> 
			<tbody> 
				

			
			
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th>
					<td><?php echo $data->no_agendaberat ?></td> 
					<td><?php echo $data->tgl_agendaberat ?></td>  
					<td><?php echo $data->nama_pt ?></td> 
					<td><?php echo $data->npwp_berat ?></td> 
					<td><?php echo $data->kepala_kantor1 ?></td>
					<td><?php echo $data->peneliti_berat ?></td>
					<td><?php echo $data->seksi_berat ?></td> 
					<td><?php echo $data->kepala_kantor2 ?></td> > 
					<td><?php echo $data->kanwil ?></td> 
					<td><?php echo $data->keputusan_berat ?></td> 
					
					<td>
						<a class="btn btn-sm btn-success" href="keberatan.php?act=edit&&id_berat=<?php echo $data->id_berat ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="keberatan.php?act=delete&&id_berat=<?php echo $data->id_berat ?>">Delete</a>
					</td> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
    </div> <!-- /container -->
	
<?php include"inc/footer.php"; ?>