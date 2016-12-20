<?php

//ROUTING
if(!empty($_GET["page"]))
{
	$page = strtolower(mysql_real_escape_string($_GET["page"]));

	if($page == "login")
	{
		//PROSES LOGIN
		if (!empty($_POST["user"]) && !empty($_POST["pass"])) 
		{
			$user = mysql_real_escape_string($_POST["user"]);
			$pass = mysql_real_escape_string(md5($_POST["pass"]));
			$database -> login($con,$user,$pass);
		}
		include("views/login.php");
	}
	else if ($page == "admin") 
		{
			//DELETE
			if(!empty($_GET["delete"]))
			{
				$id = $_GET["delete"];
				$database -> hapus($con,$id);
			}

			//EDIT 
			if(!empty($_POST["edit"]))
			{
				$id = $_GET["edit"];
				$nama 				= mysql_real_escape_string ($_POST["nama"]);
				$tempat_lahir 		= mysql_real_escape_string ($_POST["tempat_lahir"]);
				$tanggal_lahir 		= mysql_real_escape_string ($_POST["tanggal_lahir"]);
				$agama				= mysql_real_escape_string ($_POST["agama"]);
				$kelamin	 		= mysql_real_escape_string ($_POST["kelamin"]);
				$alamat		 		= mysql_real_escape_string ($_POST["alamat"]);
				$asal_sekolah 		= mysql_real_escape_string ($_POST["asal_sekolah"]);
				$tahun_lulus 		= mysql_real_escape_string ($_POST["tahun_lulus"]);
				$nisn				= mysql_real_escape_string ($_POST["nisn"]);
				$nama_orangtua		= mysql_real_escape_string ($_POST["nama_orangtua"]);
				$pekerjaan_orangtua = mysql_real_escape_string ($_POST["pekerjaan_orangtua"]);
				$handphone 			= mysql_real_escape_string ($_POST["handphone"]);
				$skhun				= mysql_real_escape_string ($_POST["skhun"]);
				$rapot				= mysql_real_escape_string ($_POST["rapot"]);

				$input 			= $database -> editData($con,$nama,$tempat_lahir,$tanggal_lahir,$agama,$kelamin,$alamat,$asal_sekolah,
				$tahun_lulus,$nisn,$nama_orangtua,$pekerjaan_orangtua,$handphone,$skhun,$rapot,$id);
			}
			
			include("views/admin.php");
		}
	else if ($page == "logout") 
		{
			session_start();
			session_destroy();
			header("location: index.php?page=login");
		}
	else if($page == "ganti_pass")
		{
			if(!empty($_POST['ganti_pass']))
			{
				$new_pass = mysql_real_escape_string(md5($_POST['new_pass']));
				$konf_pass = mysql_real_escape_string(md5($_POST['konf_pass']));
				if($new_pass==$konf_pass)
			{
				$database->ganti_pass($con, $new_pass);
			}
	else
			{
				header("location: index.php?page=admin");
			}
			
		}
		include("views/ganti_password.php");
	}		
	else
	{
		include("views/index.php");
	}	
}
//DEFAULT
else
{
	//PROSES INPUT DATA PENDAFTAR
	if(!empty($_POST["daftar"]))
	{
		$nama 				= mysql_real_escape_string ($_POST["nama"]);
		$tempat_lahir 		= mysql_real_escape_string ($_POST["tempat_lahir"]);
		$tanggal_lahir 		= mysql_real_escape_string ($_POST["tanggal_lahir"]);
		$agama				= mysql_real_escape_string ($_POST["agama"]);
		$kelamin	 		= mysql_real_escape_string ($_POST["kelamin"]);
		$alamat		 		= mysql_real_escape_string ($_POST["alamat"]);
		$asal_sekolah 		= mysql_real_escape_string ($_POST["asal_sekolah"]);
		$tahun_lulus 		= mysql_real_escape_string ($_POST["tahun_lulus"]);
		$nisn				= mysql_real_escape_string ($_POST["nisn"]);
		$nama_orangtua		= mysql_real_escape_string ($_POST["nama_orangtua"]);
		$pekerjaan_orangtua = mysql_real_escape_string ($_POST["pekerjaan_orangtua"]);
		$handphone 			= mysql_real_escape_string ($_POST["handphone"]);
		$skhun				= mysql_real_escape_string ($_POST["skhun"]);
		$rapot				= mysql_real_escape_string ($_POST["rapot"]);

		$input 			= $database -> daftarbaru($con,$nama,$tempat_lahir,$tanggal_lahir,$agama,$kelamin,$alamat,$asal_sekolah,
		$tahun_lulus,$nisn,$nama_orangtua,$pekerjaan_orangtua,$handphone,$skhun,$rapot);
	}
	include("views/form.php");
}
?>