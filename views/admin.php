<?php
session_start();
if(empty($_SESSION["username"]))
{
	header("location: index.php?page=login");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Halaman Admin</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body background="img/buku.jpg">

<ul>
  <li><a href="index.php?page=admin">Home</a></li> 
    <li><a href="index.php?page=ganti_pass">Ganti Password</a></li>
    <li style="float:right"><a href="index.php?page=logout">Logout</a></li>
</ul>

<?php
if (!empty($_GET["edit"]))
{
  $kode = $_GET["edit"];
  $data = $database -> detailData($con,$kode);
  echo '
  <body background="img/a.png">
  <form action="#" method="POST">
		<h2><u><b>I. Data Calon Peserta Didik</b></u></h2></br>
    <div class="form">
		<h4>Nama :</h4>
		<input type="text" class="form-control" name="nama" value="'.$data["nama"].'" placeholder="Enter Nama">
    </div>
    <div class="form">
		<h4>Tempat Lahir :</h4>
		<input class="form-control" type="text" name="tempat_lahir" value="'.$data["tempat_lahir"].'" placeholder="Enter Tempat Lahir">
    </div>
    <div class="date">
		<h4>Tanggal Lahir :</h4>
		<input class="form-control" type="date" name="tanggal_lahir" value="'.$data["tanggal_lahir"].'" placeholder="Enter Tanggal Lahir">
    </div>
	<div class="form-group">
		<h4>Agama			:</h4>
		<input class="form-control" type="text" name="agama" value="'.$data["agama"].'" placeholder="Masukkan Agama">
	</div>
    <div class="custom-select">
		<h4>Jenis Kelamin :</h4>
		<select class="form-control" name="kelamin" value="'.$data["kelamin"].'">
          <option value="Laki-Laki">Laki - Laki</option>
          <option value="Perempuan">Perempuan</option>
		</select></div>
    <div class="form-group">
		<h4>Alamat Lengkap :</h4>
		<input class="form-control" type="text" name="alamat" value="'.$data["alamat"].'" placeholder="Enter Alamat, RT/RW, Kecamatan, Kabupaten">
    </div>
    <div class="form-group">
		<h4>Asal Sekolah :</h4>
		<input class="form-control" type="text" name="asal_sekolah" value="'.$data["asal_sekolah"].'" placeholder="Enter Asal Sekolah">
    </div>
     <div class="form-group">
		<h4>Tahun Lulus :</h4>
		<input class="form-control" type="text" name="tahun_lulus" value="'.$data["tahun_lulus"].'" placeholder="Enter Tahun Lulus"></br>
	</div>
	<div class="form-group">
		<h4>NISN :</h4>
		<input class="form-control" type="text" name="nisn" value="'.$data["nisn"].'" placeholder="Masukkan NISN"></br>
			<h2><u><b>II. Data Orangtua Calon Peserta Didik</b></u></h2></br>
    </div>
    <div class="form-group">
		<h4>Nama Orangtua :</h4>
		<input class="form-control" type="text" name="nama_orangtua" value="'.$data["nama_orangtua"].'" placeholder="Masukkan Nama Bapak/Ibu">
    </div>
    <div class="form-group">
		<h4>Pekerjaan Orangtua :</h4>
		<input class="form-control" type="text" name="pekerjaan_orangtua" value="'.$data["pekerjaan_orangtua"].'" placeholder="Masukkan Pekerjaan Bapak/Ibu">
    </div>
    <div class="form-group">
		<h4>Nomor Handphone :</h4>
		<input class="form-control" type="text" name="handphone" value="'.$data["handphone"].'" placeholder="Enter Tahun Lulus">
			<h2><u><b>III. Data Nilai</b></u></h2></br>
    </div>
	<div class="form-group">
		<h4>Nilai SKHUN		:</h4>
		<input type="text" name="skhun" value="'.$data["skhun"].'" placeholder="Isikan Nilai skhun">
	</div>
	<div class="form-group">
		<h4>Nilai Rapot		:</h4>
		<input type="text" name="rapot" value="'.$data["rapot"].'" placeholder="Isikan Nilai rapot">
	</div>
    <button type="submit" name="edit" class="btn btn-primary" VALUE="edit data">Edit</button>
  </form>
  </body>
</div>
  ';
}
else
{

?>
<h2><center>"ADMIN"</center></h2>
<h2><center>Data SMK 17 CLURING</center></h2>
  
  <div class="table-responsive"> 
  <table class="table" cellpadding="4" cellspacing="0" border="2" width="100%">
    <tr class="info">
      <th>No</th>
      <th><center>Nama Pendaftar</center></th>
      <th><center>Tempat Lahir</center></th>
      <th><center>Tanggal Lahir</center></th>
	  <th><center>Agama</center></th>
      <th><center>Kelamin</center></th>
      <th><center>Alamat</center></th>
      <th><center>Asal Sekolah</center></th>
      <th><center>Tahun Lulus</center></th>
	  <th><center>NISN</center></th>
      <th><center>Nama Orangtua</center></th>
      <th><center>Pekerjaan Orangtua</center></th>
      <th><center>No. Handphone</center></th>
	  <th><center>skhun</center></th>
	  <th><center>rapot</center></th>
      <th><center>Action</center></th>
    </tr>
<?php
  //READ
  $no=1;
  $data = $database -> tampil($con);
  foreach ($data as $value) 
  {
    echo'
    <tr>
      <td><center>'.$no.'</center></td>
      <td><center>'.$value["nama"].'</center></td>
      <td><center>'.$value["tempat_lahir"].'</center></td>
      <td><center>'.$value["tanggal_lahir"].'</center></td>
	  <td><center>'.$value["agama"].'</center></td>
      <td><center>'.$value["kelamin"].'</center></td>
      <td><center>'.$value["alamat"].'</center></td>
      <td><center>'.$value["asal_sekolah"].'</center></td>
      <td><center>'.$value["tahun_lulus"].'</center></td>
	  <td><center>'.$value["nisn"].'</center></td>
      <td><center>'.$value["nama_orangtua"].'</center></td>
      <td><center>'.$value["pekerjaan_orangtua"].'</center></td>
      <td><center>'.$value["handphone"].'</center></td>
	  <td><center>'.$value["skhun"].'</center></td>
	  <td><center>'.$value["rapot"].'</center></td>
      <td>
          <center><a href="index.php?page=admin&edit='.$value["id_pendaftar"].'">edit</a> | 
          <a href="index.php?page=admin&delete='.$value["id_pendaftar"].'">delete</a></center>
      </td>
    </tr>
    ';
    $no++;
  }
?>
  </table>
</div>
<?php 
}
?>
<br>
<a target="window" href="index.php" style="float:left;"><button type="button" class="btn btn-primary">Tambah Pendaftaran</button></a>
</body>
</html>
