<?php
require 'sambung.php';
require 'keselamatan.php';

$topik = $_GET['idtopik'];
$idsubjek = $_SESSION['idsubjek'];

$del = mysqli_query($hubung, "SELECT * 
	FROM topik INNER JOIN soalan 
        ON topik.idtopik = soalan.idtopik 
    INNER JOIN pilihan 
        ON soalan.idsoalan = pilihan.idsoalan 
    WHERE topik.idtopik=$topik");

$dataDel = mysqli_fetch_array($del);
//LAKSANA DELETE
$result1 = mysqli_query($hubung,"DELETE FROM topik WHERE idtopik='$topik'");
$result2 = mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$topik'");
$result3 = mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$dataDel[idsoalan]'");
$result4 = mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$topik'");
//MESEJ POP UP
echo "<script>alert('Hapus topik berjaya'); 
window.location='papar_topik.php?idsubjek=$idsubjek'</script>";

	 