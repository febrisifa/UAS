<?php 
session_start();
if(empty($_SESSION["username"]))
{
	//echo "Access Denied <br>";
	//echo "<a href='index.php?page=login'>Login</a>";
	header("location: index.php?page=login");
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ganti Password</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body background="img/buku.jpg">>
	<ul>
		<?php $info = $database->info_admin($con);?>
		<li><a href="index.php?page=admin">Home</a></li> 
		<li><a href="index.php?page=ganti_pass">Ganti Password</a></li>
		<li style="float:right"><a href="index.php?page=logout">Logout</a></li>
	</ul>
	
		<form action="#" method="POST">
		<center><h1>Ganti Password</h1></center>
			<div class="imgcontainer">
  			</div>

  			<div class="container">
			<label><b>Password Baru</b></label>
			<input type="password" name="new_pass"><br>
			<label><b>Konfirmasi Password</b></label>
			<input type="password" name="konf_pass"><br>
			<button type="submit" name="ganti_pass" value="GANTI PASSWORD">GANTI</button> 
			</div>
		</form>
		
	
	</body>
</html>