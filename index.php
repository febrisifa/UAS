<?php
//KONFIGURASI
$hostDB			= "localhost";
$usernameDB		= "root";
$passwordDB		= "";
$namaDB			= "uas";

//KONEKSI KE DATABASE
$con = mysqli_connect($hostDB,$usernameDB,$passwordDB,$namaDB);

//CEK KONEKSI
if(mysqli_connect_error())
{
	echo "KONEKSI GAGAL";
	die;
}

//AMBIL DATABASE
include("models/database.php");

//MEMANGGIL DATABASE
$database = new database;

//AMBIL CONTROLLERS
include("controllers/controllers.php");
?>

