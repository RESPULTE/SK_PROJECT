<?php
require 'sambung.php'; 
require 'keselamatan.php'; 
//Dapatkan ID dari URL
$delguru = $_GET['idpengguna'];
$deletel=mysqli_query($hubung,"
SELECT * FROM pengguna INNER JOIN topik 
ON pengguna.idpengguna = topik.idpengguna INNER JOIN soalan 
ON topik.idtopik = soalan.idtopik INNER JOIN perekodan 
ON topik.idtopik = perekodan.idtopik INNER JOIN pilihan 
ON soalan.idsoalan = pilihan.idsoalan WHERE pengguna.idpengguna=$delguru"); 
$infoDel=mysqli_fetch_array($deletel);
$deletel=$delguru;
$delete2=$infoDel['idpengguna'];
//HAPUS TOPIK
$hapuskanl = mysqli_query($hubung,"DELETE FROM topik WHERE idpengguna='$deletel'");
//HAPUS PENGGUNA
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$deletel'");
//HAPUS SOALAN
$hapuskan3 = mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik=$delete2'"); 
//HAPUS JAWAPAN
$hapuskan4 = mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$delete2'");
//HAPUS PEREKODAN
$hapuskan5 = mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$delete2'");
 //Papar mesej jika berjaya hapus
 echo "<script>alert('Hapus Guru berjaya'); window.location='guru_senarai.php'</script>";
?>

