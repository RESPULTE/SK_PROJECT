<?php
require 'sambung.php'; 
require 'keselamatan.php'; 
//Dapatkan ID dari URL
$delguru = $_GET['idpengguna'];


$delete_q=mysqli_query($hubung, "
    SELECT * FROM pengguna 
        LEFT JOIN topik 
            ON pengguna.idpengguna = topik.idpengguna
        LEFT JOIN soalan 
            ON topik.idtopik   = soalan.idtopik
    WHERE pengguna.idpengguna='$delguru'"); 


$infoDel=mysqli_fetch_array($delete_q);

//HAPUS TOPIK
$hapuskanl = mysqli_query($hubung,"DELETE FROM topik 
    WHERE idpengguna='$delguru'");
//HAPUS PENGGUNA
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pengguna 
    WHERE idpengguna='$delguru'");
//HAPUS SOALAN
$hapuskan3 = mysqli_query($hubung,"DELETE FROM soalan 
    WHERE idtopik='$infoDel[idtopik]'"); 
//HAPUS JAWAPAN
$hapuskan4 = mysqli_query($hubung,"DELETE FROM pilihan 
    WHERE idsoalan='$infoDel[idsoalan]'");
//HAPUS PEREKODAN
$hapuskan5 = mysqli_query($hubung,"DELETE FROM perekodan 
    WHERE idpengguna='$delguru'");

 //Papar mesej jika berjaya hapus
 echo "<script>alert(".empty($infoDel)."); window.location='guru_senarai.php'</script>";
?>

