<?php
require 'sambung.php';
require 'keselamatan.php';
$del_subjek = $_GET['idsubjek'];
$deletel=$del_subjek;
$delete=mysqli_query($hubung,"SELECT * FROM subjek AS s
     INNER JOIN topik AS t ON s.idsubjek = t.idsubjek
	 INNER JOIN soalan AS q ON t.idtopik = q.idtopik
	 INNER JOIN perekodan AS r ON t.idtopik = r.idtopik
	 INNER JOIN pilihan AS c ON q.idsoalan = c.idsoalan
	 WHERE s.idsubjek=$del_subjek");
$infoDel=mysqli_fetch_array($delete); 
$delete2=$infoDel['idtopik']; 
//Hapus rekod subjek semasa
$hapuskanl = mysqli_query($hubung,"DELETE FROM subjek WHERE idsubjek='$deletel'");
//Hapus rekod topik semasa
$hapuskan2 = mysqli_query($hubung,"DELETE FROM topik WHERE idsubjek='$deletel'");
//Hapus rekod soalan semasa
$hapuskan3 = mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$delete2'");
//Hapus rekod pilihan semasa
$hapuskan4 = mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$delete2'");
//Hapus rekod perekodan semasa
$hapuskan5 = mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$delete2'");
 //Papar mesej jika berjaya hapus
echo "<script>alert('Hapus Subjek berjaya'); window.location='subjek_senarai.php'</script>";
?>
