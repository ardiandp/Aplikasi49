<?php
//INSERT INTO `user`(`id`, `nip`, `nama`, `username`, `password`, `hak_akses`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
include "config/koneksi.php";

if (isset($_POST['daftar'])) {


$nip 		 =$_POST['nip'];
$nis           =$_POST['nis'];
$nama 		 =$_POST['nama_lengkap'];
$username 	 =$_POST['username'];
$password    =$_POST['password'];
$hak_akses   =$_POST['hak_akses'];
$kdmapel          =$_POST['kdmapel'];


$query = mysqli_query($db, "SELECT * FROM `admin` WHERE nip='$nip'")
        or die('Ada kesalahan pada query tampil data id: '.mysqli_error($db));
if (mysqli_num_rows($query)==1){
	echo "<script>window.alert('Username Mungkin Sudah ada')
	window.location='daftar.php'</script>";

} else {
$insert = mysqli_query($db, " INSERT INTO `admin` ( `nip`,nis, `nama_lengkap`, `username`, `password`, `hak_akses`, kdmapel)
                            VALUES('$nip','$nis','$nama','$username','$password','$hak_akses','$kdmapel')")
                            or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
if ($insert);	{
header('location:index.php');
}
}
}
?>
