<?php
//SETUP PANGKALAN DATA
//TAK PERLU UBAH
$host="localhost";
$user="root";
//BIARKAN KOSONG
$password="";
//BOLEH UBAH NAMA P.DATA
$database="lmao";
$hubung=mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
	echo "Proses sambung ke pangkalan data gagal";
	exit();
}
//SETUP HERE 4 UR SYSTEM
$nama_sekolah="SMJK Jit Sin";
$nama_sistem="SISTEM PENILAIAN KENDIRI";
$motto1="EXPERT E-LEARNING SYSTEM";
$motto2="SISTEM PENILAIAN KENDIRI SEKOLAH SMJK JIT SIN";
$footer="by Lim Yeu Chuan 5T1";
$logo="logo.png";
$lencana="lencana.png";
?>