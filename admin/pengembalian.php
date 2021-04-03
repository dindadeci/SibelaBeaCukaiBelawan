<?php 
	include"../inc/config.php"; 
	validate_admin_not_login("login.php");

?>

<div class="container">
	<?php
	
	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){
			
			$q = mysql_query("delete from pengembalian WHERE idkembali='$_GET[idkembali]'");
			if($q){ alert("Success"); redir("pengembalian.php"); }
		}  
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("insert into pengembalian Values (NULL,'$no_agendakem','$tgl_agendakem','$namapt','$npwp_kembali','$kep_kantor','$seksikem','$kppn','$peneliti_kem','$ket_kem','$skep','$spm','$sp2d')");
			if($q){ alert("Success"); redir("pengembalian.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("update pengembalian SET no_agendakem='$no_agendakem',tgl_agendakem='$tgl_agendakem',namapt='$namapt',npwp_kembali='$npwp_kembali',kep_kantor='$kep_kantor',seksikem='$seksikem',kppn='$kppn',peneliti_kem='$peneliti_kem',ket_kem='$ket_kem',skep='$skep',spm='$spm',sp2d='$sp2d' where idkembali=$_GET[id]") or die(mysql_error());
			if($q){ alert("Success"); redir("pengembalian.php"); }
		}
	}
	
	
	include"inc/header.php";
	
?> 
	
	<div class="container">
		<?php
			$q = mysql_query("select*from pengembalian");
			$j = mysql_num_rows($q);
		?>
		<h4>Daftar Data Pengembalian (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="pengembalian.php?act=create">Add Data</a>
		<?php
		if (@$_GET['act'] != "cetak") { 
			?>
				<a href="../cetak/cetak_pengembalian.php" class="btn btn-sm btn-primary">Cetak</a>
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
						<input type="text" class="form-control" name="no_agendakem" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendakem"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="namapt" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp_kembali" ><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kep_kantor"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksikem"><br>
						<label>KPPN</label><br>
						<input type="date" class="form-control" name="kppn"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_kem"><br>
						<label>Keterangan</label><br>
						<input type="text" class="form-control" name="ket_kem"><br>
						<label>SKEP</label><br>
						<input type="date" class="form-control" name="skep"><br>
						<label>SPM</label><br>
						<input type="date" class="form-control" name="spm"><br>
						<label>SP2D</label><br>
						<input type="date" class="form-control" name="sp2d"><br>

						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
				if($_GET['act'] == 'edit'){
					$data = mysql_fetch_object(mysql_query("select*from pengembalian where idkembali='$_GET[idkembali]'"));
				?>
					<div class="row col-md-6">
					<form action="pengembalian.php?act=edit&&id=<?php echo $_GET['idkembali'] ?>" method="post" enctype="multipart/form-data">
						<label>Nomor Agenda</label><br>
						<input type="text" class="form-control" name="no_agendakem" value="<?php echo $data->no_agendakem; ?>" required><br>
						<label>Tanggal Agenda</label><br>
						<input type="date" class="form-control" name="tgl_agendakem" value="<?php echo $data->tgl_agendakem; ?>"><br>
						<label>Nama Perusahaan</label><br>
						<input type="text" class="form-control" name="namapt" value="<?php echo $data->namapt; ?>" required><br>
						<label>NPWP</label><br>
						<input type="text" class="form-control" name="npwp_kembali" value="<?php echo $data->npwp_kembali; ?>"><br>
						<label>Kepala Kantor</label><br>
						<input type="date" class="form-control" name="kep_kantor" value="<?php echo $data->kep_kantor; ?>"><br>
						<label>Seksi</label><br>
						<input type="date" class="form-control" name="seksikem" value="<?php echo $data->seksikem; ?>"><br>
						<label>KPPN</label><br>
						<input type="date" class="form-control" name="kppn" value="<?php echo $data->kppn; ?>"><br>
						<label>Penelitian</label><br>
						<input type="date" class="form-control" name="peneliti_kem" value="<?php echo $data->peneliti_kem; ?>"><br>
						<label>Keterangan</label><br>
						<input type="text" class="form-control" name="ket_kem" value="<?php echo $data->ket_kem; ?>"><br>
						<label>SKEP</label><br>
						<input type="date" class="form-control" name="skep" value="<?php echo $data->skep; ?>"><br>
						<label>SPM</label><br>
						<input type="date" class="form-control" name="spm" value="<?php echo $data->spm; ?>" ><br>
						<label>SP2D</label><br>
						<input type="date" class="form-control" name="sp2d" value="<?php echo $data->sp2d; ?>"><br>
					
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
					<th>Seksi</th>
					<th>KPPN</th>
					<th>Penelitian</th> 
					<th>Keterangan</th>
					<th>SKEP</th>
					<th>SPM</th>
					<th>SP2D</th> 
					<th>*</th> 
				</tr> 
			</thead> 
			<tbody> 
				

			
			
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<td><?php echo $data->no_agendakem ?></td> 
					<td><?php echo $data->tgl_agendakem ?></td> 
					<td><?php echo $data->namapt ?></td> 
					<td><?php echo $data->npwp_kembali ?></td> 
					<td><?php echo $data->kep_kantor ?></td> 
					<td><?php echo $data->seksikem ?></td> 
					<td><?php echo $data->kppn ?></td> 
					<td><?php echo $data->peneliti_kem ?></td> 
					<td><?php echo $data->ket_kem ?></td> 
					<td><?php echo $data->skep ?></td> 
					<td><?php echo $data->spm ?></td> 
					<td><?php echo $data->sp2d ?></td>  
					<td>
						<a class="btn btn-sm btn-success" href="pengembalian.php?act=edit&&idkembali=<?php echo $data->idkembali ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="pengembalian.php?act=delete&&idkembali=<?php echo $data->idkembali ?>">Delete</a>
					</td> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
    </div> <!-- /container -->
	
<?php include"inc/footer.php"; ?>