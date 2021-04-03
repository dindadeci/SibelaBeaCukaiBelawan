<?php 
	include"inc/config.php"; ?>
	<?php
if(!empty($_SESSION['iam_user'])){
		redir("home.html");
	}
	 
	 
	
	if(!empty($_POST)){
		extract($_POST);
		$password = md5($password);
		$q = mysql_query("SELECT * FROM user WHERE email='$email' AND password='$password' AND status='user'")or die(mysql_error());
		if($q){
			$r = mysql_fetch_object($q);
			$_SESSION['iam_user'] = $r->id;
			redir("index.php");
		}else{
			alert("Maaf email dan password anda salah");
		}
	}
?> 
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    <link rel='stylesheet' href='<?php echo $url; ?>assets/bootstrap/css/bootstrap.min.css'>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/style_login.css">

  </head>

  <body>

      <div class="wrapper">
    <form class="form-signin" action="" method="POST">       
      <h2 class="form-signin-heading">Silahkan login</h2>
      <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <div class="col-md-12 content-menu">
      	Belum Punya Akun ? <a href="register.php">Buat Akun Sekarang !</a>
				 
				</div>     
    </form>
  </div>
    
    
    
    
    
  </body>
</html>
