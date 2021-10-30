<?php

$host="localhost";

$user="root";

# Leave blank for now
$password="";

# name for database
$database="lmao";

$hubung=mysqli_connect($host, $user, $password, $database);

# check if the connection is established
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