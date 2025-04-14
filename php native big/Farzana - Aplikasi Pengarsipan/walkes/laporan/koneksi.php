<?php 
date_default_timezone_set("ASIA/JAKARTA");

$server = "localhost";
$username ="root";
$password= "";
$database= "arsipan";

$db=mysqli_connect($server, $username, $password, $database);

if (!$db) {
	die('Koneksi Databese Gagal : '.mysqli_connect_error());
}
?>