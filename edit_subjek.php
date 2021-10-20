<?php
//PERLU DAN WAJIB FAIL INI 
require 'sambung.php'; 
require 'keselamatan.php'; 
include 'header.php';
?>

<?php
if (isset($_POST['update'])){
    $idsubjek = $_POST['idsubjek']; 
	$subjek=$_POST['subjek'];
     //KEMASKINI DENGAN REKOD BARU 
	 $result = mysqli_query($hubung, "UPDATE subjek SET subjek='$subjek' WHERE idsubjek='$idsubjek'");

	//PAPAR MESEJ
	echo "<script>alert('Kemaskini subjek telah berjaya'); window.location='subjek_senarai.php'</script>";
}
?>

<?php
//DAPATKAN ID SAOALN 
$subjekEdit = $_GET['idsubjek'];
//PILIH DATA BERDASARKAN PADA ID REKOD
$pilihSubjek = mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek=$subjekEdit"); 
$dataSubjek = mysqli_fetch_array($pilihSubjek);
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center><h2>KEMASKINI SUBJEK</h2></center>
<main>
<table width="70%" border="0" align="center" style=' font-size:18px'>
<tr>
<td>
<form method="POST">
<tr>
<td align="right">NAMA SUBJEK:</td>
<td><input type="text" name="subjek" size="4%" value="<?php echo $dataSubjek['subjek']; ?>"/></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idsubjek" value="<?php echo $dataSubjek['idsubjek']; ?>" />
<input type="submit" name="update" value="KEMASKINI" />
<input type="button" value="BATAL" onclick="history.back()"/>
</td>
</tr>
</form>
</td>
</tr>
</table>
</main>
<?php include 'footer.php';?>
</body>
</html>


