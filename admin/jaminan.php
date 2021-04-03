<?php 
	include"../inc/config.php"; 
	validate_admin_not_login("login.php");

?>
<div class="container">
	<?php
		
	
	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){
			
			$q = mysql_query("delete from jaminan WHERE id='$_GET[id]'");
			if($q){ alert("Success"); redir("jaminan.php"); }
		}  
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST);
		
			$q = mysql_query("insert into jaminan Values (NULL,'$no_agenda','$tanggal_agenda','$nama','$npwp','$kepala_kantor','$seksi','$surety','$konfirjam','$sttj')");
				if($q){alert("Success"); redir("jaminan.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("update jaminan SET no_agenda='$no_agenda',tanggal_agenda='$tanggal_agenda',nama='$nama',npwp='$npwp',kepala_kantor='$kepala_kantor',seksi='$seksi',surety='$surety',konfirjam='$konfirjam',sttj='$sttj' where id=$_GET[id]") or die(mysql_error());
			if($q){ alert("Success"); redir("jaminan.php"); }
		}
	}
	
	
	include"inc/header.php";
	
?> 
	
	<div class="container">
		<?php
			$q = mysql_query("select*from jaminan");
			$j = mysql_num_rows($q);
		?>
		<h4>Daftar Data Konfirmasi Jaminan (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="jaminan.php?act=create">Add Data</a>
		<?php
		if (@$_GET['act'] != "cetak") { 
			?>
				<a href="../cetak/cetak_jaminan.php" class="btn btn-sm btn-primary">Cetak</a>
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
						<input type="text" class="form-control" name="no_agenda" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tanggal_agenda"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksi"><br>
						<label>Surety</label><br>
						<input type="text" class="form-control" name="surety"><br>
						<label>Konfirmasi Jaminan</label><br>
						<input type="date" class="form-control" name="konfirjam"><br>
						<label>STTJ/BPJ</label><br>
						<input type="date" class="form-control" name="sttj"><br>
						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
				if($_GET['act'] == 'edit'){
					$data = mysql_fetch_object(mysql_query("select*from jaminan where id='$_GET[id]'"));
				?>
					<div class="row col-md-6">
					<form action="jaminan.php?act=edit&&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
					
						<label>Nomor Agenda</label><br>
						<input type="text" class="form-control" name="no_agenda" value="<?php echo $data->no_agenda; ?>" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tanggal_agenda" value="<?php echo $data->tanggal_agenda; ?>"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="nama" value="<?php echo $data->nama; ?>" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp" value="<?php echo $data->npwp; ?>"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kepala_kantor" value="<?php echo $data->kepala_kantor; ?>"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksi" value="<?php echo $data->seksi; ?>"><br>
						<label>Surety</label><br>
						<input type="text" class="form-control" name="surety" value="<?php echo $data->surety; ?>"><br>
						<label>Konfirmasi Jaminan</label><br>
						<input type="date" class="form-control" name="konfirjam" value="<?php echo $data->konfirjam; ?>"><br>
						<label>STTJ/BPJ</label><br>
						<input type="date" class="form-control" name="sttj" value="<?php echo $data->sttj; ?>" ><br>
						<input type="submit" name="form-edit" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
			}
		?>
		
		<div class="row" align="center">
		<table class="table table-striped" border="1">
			<tr> 
			<thead> 
					<th>#</th>  
					<th>Nomor Agenda</th> 
					<th>Tanggal Agenda</th>
					<th>Nama Perusahaan</th>
					<th>NPWP</th>
					<th>Kepala Kantor</th>
					<th>Seksi</th> 
					<th>Surety</th>
					<th>Konfirmasi Jaminan</th>
					<th>STTJ/BPJ</th>  
					<th>*</th>
			</thead>  
		</tr>
			<tbody> 
				

			
			
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<td><?php echo $data->no_agenda ?></td> 
					<td><?php echo $data->tanggal_agenda ?></td> 
					<td><?php echo $data->nama ?></td> 
					<td><?php echo $data->npwp ?></td> 
					<td><?php echo $data->kepala_kantor ?></td> 
					<td><?php echo $data->seksi ?></td> 
					<td><?php echo $data->surety ?></td> 
					<td><?php echo $data->konfirjam ?></td> 
					<td><?php echo $data->sttj ?></td>   
					<td>
						<a class="btn btn-sm btn-success" href="jaminan.php?act=edit&&id=<?php echo $data->id ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="jaminan.php?act=delete&&id=<?php echo $data->id ?>">Delete</a>
					</td> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
    </div> <!-- /container -->
	
<?php include"inc/footer.php"; ?>