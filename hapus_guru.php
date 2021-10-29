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
mysqli_query($hubung,"DELETE FROM topik WHERE idpengguna='$delguru'");

//HAPUS PENGGUNA
mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$delguru'");

//HAPUS PEREKODAN
mysqli_query($hubung,"DELETE FROM perekodan WHERE idpengguna='$delguru'");

//HAPUS JAWAPAN
if (isset($infoDel['idtopik'])){
    mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$infoDel[idtopik]'"); 
}
 //HAPUS SOALAN
if (isset($infoDel['idsoalan'])){
    mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$infoDel[idsoalan]'");
}

 //Papar mesej jika berjaya hapus
 echo "<script>alert('hapus guru berjaya!'); window.location='guru_senarai.php'</script>";
?>

