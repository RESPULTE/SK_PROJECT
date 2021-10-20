<?php
require 'sambung.php';
require 'keselamatan.php';

//Dapatkan ID dari URL 
$soalan_terpilih = $_GET['idsoalan'];

//TABLE SOALAN 
$dataSoalan=mysqli_query($hubung,"SELECT * FROM soalan WHERE idsoalan=$soalan_terpilih" ); 
$getSoalan=mysqli_fetch_array($dataSoalan);

//TABLE perekodan
$dataPerekodan=mysqli_query($hubung, "SELECT * FROM perekodan WHERE idtopik=$getSoalan[idtopik]"); 
$getPerekodan=mysqli_fetch_array($dataPerekodan);

//Hapus rekod soalan + pilihan
$hapuskanl = mysqli_query($hubung,"DELETE FROM soalan WHERE idsoalan='$soalan_terpilih'");
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$soalan_terpilih'");
$hapuskan3 = mysqli_query($hubung,"DELETE FROM pekodan WHERE idtopik=$getPerekodan[idtopik]");

//Papar mesej jika berjaya hapus
 echo "<script>alert(Hapus soalan berjaya'); window.location='pilih_subjek.php'</script>";

?>
