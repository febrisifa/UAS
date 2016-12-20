<?php
class database{

	function daftarbaru($con,$nama,$tempat_lahir,$tanggal_lahir,$agama,$kelamin,$alamat,$asal_sekolah,$tahun_lulus,$nisn,$nama_orangtua,$pekerjaan_orangtua,$handphone,$skhun,$rapot)

	{
		//query
		$q = mysqli_query($con, "INSERT INTO tbl_pendaftaran VALUES (null, '$nama','$tempat_lahir','$tanggal_lahir','$agama','$kelamin','$alamat','$asal_sekolah','$tahun_lulus','$nisn','$nama_orangtua','$pekerjaan_orangtua','$handphone','$skhun','$rapot');");
		if($q)
		{
			echo '
			<script>alert("DATA BERHASIL DISIMPAN");window.location.href="";</script>
			';
		}
		
	}

	function login($con,$user,$pass)
	{
		$q = mysqli_query($con, "SELECT * FROM tbl_admin WHERE
			username = '$user' and password = '$pass';");
		$cek = mysqli_fetch_array($q);
		if(!empty($cek[0]))
		{
			session_start();
			$_SESSION["username"] = $user;
			header("location: index.php?page=admin");
		}
		else
		{
			echo '
			<script>
				alert("Username atau Password Salah !!");
				window.location.href="";
			</script>
			';
		}
	}

	function tampil($con)
	{
		$list = array();
		$q = mysqli_query($con, "SELECT * FROM tbl_pendaftaran ORDER BY id_pendaftar DESC");
		while ($data = mysqli_fetch_array($q))
		{
			$list[]=$data;
		}
		return $list;
	}

	function hapus($con,$id)
	{
		$q = mysqli_query($con,"delete from tbl_pendaftaran where id_pendaftar = '$id'");
		if($q)
		{
			echo'
			<script>
				alert("Data berhasil dihapus !!");
				window.location.href="index.php?page=admin";
			</script>
			';	
		}
		else
		{
			echo'
			<script>
				alert("Data tidak berhasil dihapus !!");
				window.location.href="index.php?page=admin";
			</script>
			';
		}
	}
	
	function info_admin($con)
	{
		$username = $_SESSION['username'];
		$query = mysqli_query($con, "SELECT tbl_nama_admin.nama_admin FROM tbl_admin JOIN tbl_nama_admin ON tbl_admin.id_admin=tbl_nama_admin.id_admin WHERE tbl_admin.username='$username'");
		return $query->fetch_array(MYSQLI_ASSOC);
	}

	function ganti_pass($con, $pass)
	{
		session_start();
		$user = $_SESSION['username'];
		$query = mysqli_query($con, "UPDATE tbl_admin SET password='$pass' WHERE username='$user'");
		echo '
			<script>
				alert("Ganti Password Berhasil!");
				window.location.href="";
			</script>
		';
	}

	function detailData($con,$kode)
	{
		$q = mysqli_query($con, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftar='$kode' ORDER BY id_pendaftar DESC;");
		$data = mysqli_fetch_array($q);
		return $data;	
	}


	function editData($con,$nama,$tempat_lahir,$tanggal_lahir,$agama,$kelamin,$alamat,$asal_sekolah,$tahun_lulus,$nisn,$nama_orangtua,$pekerjaan_orangtua,$handphone,$skhun,$rapot,$id)
	{
		//query
		$q = mysqli_query($con,"UPDATE tbl_pendaftaran SET 
			nama			 	= '$nama',
			tempat_lahir		= '$tempat_lahir',
			tanggal_lahir		= '$tanggal_lahir',
			agama				= '$agama',
			kelamin			 	= '$kelamin',
			alamat 			 	= '$alamat',
			asal_sekolah 	 	= '$asal_sekolah',
			tahun_lulus 	 	= '$tahun_lulus',
			nisn				= '$nisn',
			nama_orangtua 	 	= '$nama_orangtua',
			pekerjaan_orangtua 	= '$pekerjaan_orangtua',
			handphone			= '$handphone',
			skhun 				= '$skhun',
			rapot 				= '$rapot'
			WHERE id_pendaftar  = '$id';");
		
		if($q)
		{
			echo '
			<script>alert("DATA BERHASIL DIEDIT");window.location.href="index.php?page=admin";</script>
			';
		}
	}
}
?>