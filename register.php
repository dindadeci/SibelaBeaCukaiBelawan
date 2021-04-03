<?php
	include"inc/config.php";

	if(!empty($_SESSION['iam_admin'])){
		redir("index.php");
	}

	include"layout/headerlogin.php";
?>

		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">

			<?php
				if(!empty($_POST)){
			extract($_POST);

			$password = md5($password);
			$q = mysql_query("insert into user Values(NULL,'$nama','$email','$telephone','$alamat','$password','user')");
				if($q){
			?>

			<div class="alert alert-success" style="text-align: center;">Register Berhasil.<br>
			<a href="<?php echo $url."index.php"; ?>">Silahkan Login</a>
			</div>
				<?php }else{ ?>
				<div class="alert alert-danger">Terjadi kesalahan dalam pengisian form. Silahkan Coba Lagi</div>
				<?php } } ?>
			<h3 style="text-align: center; margin-top: 50px;" >Register User</h3>
				<hr>
				<div style="margin-left: 160px; width: 1409px;">
				<div class="col-md-7 content-menu" style="margin-top:-20px; margin-left: 85px; ">

				 <form style= "width: px;"action="" method="post" enctype="multipart/form-data">
						<label>Nama</label><br>
						<input type="text" class="form-control" name="nama" required placeholder="Masukkan Nama"><br>
						<label>Email</label><br>
						<input type="email" class="form-control" name="email" required placeholder="Masukkan Email"><br>
						<label>Telephone</label><br>
						<input type="text" class="form-control" name="telephone" required placeholder="Masukkan Nomor Telp"><br>
						<label>Alamat</label><br>
						<input type="text" class="form-control" name="alamat" required placeholder="Masukkan Alamat"><br>
						<label>Password</label><br>
						<input type="password" class="form-control" name="password" required placeholder="Masukkan Password"><br>

						<input type="submit" name="form-input" value="Register" class="btn btn-success">
						<div class="col-md-12 content-menu">
				 Sudah Punya Akun ? <a href="login.php">Login Sekarang !</a>
				</div>
					</form>
				</div>
				</div>
			</div>
			</div>
		</div>
<?php include"layout/footer.php"; ?>
