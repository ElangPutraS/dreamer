<?php

//inisiasi
$Server = "localhost";
$User = "root";
$pass = "";
$Db = "dreamer";

$koneksi = new mysqli($Server,$User,$pass,$Db);

if($koneksi->connect_error){
	die("Koneksi gagal : ".$koneksi->connect_error."<br>");
}
echo "Koneksi sukses.<br>";

?>