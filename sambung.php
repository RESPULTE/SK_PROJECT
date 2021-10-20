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
$nama_sistem="EXPERT-SISTEM PENILAIAN KENDIRI";
$motto1="EXPERT E-LEARNING SYSTEM";
$motto2="PELBAGAI JENIS SUBJEK/TOPIK UNTUK RAMAI GURU-FORMAT PELBAGAI";
$footer="Self Monitoring Learning System ";
$logo="logo.png";
$lencana="lencana.png";
?>