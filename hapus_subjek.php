<?php 
require 'sambung.php';
require 'keselamatan.php';
$del_subjek = $_GET['idsubjek'];

$delete1=mysqli_query($hubung,"
	SELECT * FROM subjek

	     LEFT JOIN topik ON 
	      	subjek.idsubjek = topik.idsubjek
		 LEFT JOIN soalan ON 
		 	topik.idtopik   = soalan.idtopik

	 WHERE subjek.idsubjek='$del_subjek'");


$infoDel=mysqli_fetch_all($delete1);


$delSub = $hubung->prepare("DELETE FROM subjek WHERE idsubjek = ?");
$delSub->bind_param('i', $del_subjek);
$delSub->execute();

$delTop = $hubung->prepare("DELETE FROM topik WHERE idsubjek = ?");
$delTop->bind_param('i', $del_subjek);
$delTop->execute();

if (isset($infoDel['idsoalan'])){
	$delPil = $hubung->prepare("DELETE FROM pilihan WHERE idsoalan = ?");
	$delPil->bind_param('i', $infoDel['idsoalan']);
	$delPil->execute();
}


if (isset($infoDel['idtopik'])){
	$delRek = $hubung->prepare("DELETE FROM perekodan WHERE idtopik = ?");
	$delRek->bind_param('i', $infoDel['idtopik']);
	$delRek->execute();

	$delSoal = $hubung->prepare("DELETE FROM soalan WHERE idtopik = ?");
	$delSoal->bind_param('i', $infoDel['idtopik']);
	$delSoal->execute();
}

 //Papar mesej jika berjaya hapus
echo "<script>alert('Hapus Subjek Berjaya!'); window.location='subjek_senarai.php'</script>";
?>
