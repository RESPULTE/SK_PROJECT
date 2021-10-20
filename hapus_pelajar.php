<?php
require 'sambung.php';
require 'keselamatan.php';
//Dapatkan ID dari URL
$Delpelajar = $_GET['idpengguna']; 
//Hapus rekod pengguna semasa
$hapuskanl = mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$Delpelajar'");
//Hapus rekod perekodan semasa
$hapuskan2 = mysqli_query($hubung,"DELETE FROM perekodan WHERE idpengguna='$Delpelajar'");
 //Papar mesej jika berjaya hapus
 echo "<script>alert('Hapus Pelajar berjaya'); window.location='pelajar_senarai.php'</script>";
?>
