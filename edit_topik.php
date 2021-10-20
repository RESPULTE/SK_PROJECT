<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<?php
if (isset($_POST['update'])){
	$idsubjek = $_POST['idsubjek'];
	$idtopik = $_POST['idtopik'];
	$topikBaru=$_POST['paparan_topik'];
	$markahBaru=$_POST['markah'];
//KEMASKINI DENGAN REKOD BARU
  $result = mysqli_query($hubung, "UPDATE topik SET topik='$topikBaru', markah='$markahBaru', idsubjek='$idsubjek' WHERE idtopik='$idtopik'"); 
//papar mesej
echo "<script>alert('Kemaskini rekod telah berjaya');   window.location='papar_topik.php?idsubjek=$idsubjek'</script>"; 
} 
?> 
<?php
//DAPATKAN ID SAOALN
$topikEdit = $_GET['idtopik'];
//PILIH DATA BERDASARKAN PADA ID REKOD
$pilihTopik = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik=$topikEdit");
while ($dataTopik = mysqli_fetch_array($pilihTopik)){
$pilihSubjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek=$dataTopik[idsubjek]");
$dataSubjek=mysqli_fetch_array($pilihSubjek);
//Paparkan nilai asal
$idTOPIK = $topikEdit;
$editTOPIK = $dataTopik['topik'];
$editMARKAH= $dataTopik['markah'];
}
?>

<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2>KEMASKINI TOPIK</h2></center>
<main>
<table width="70%" border="0" align="center" style='font-size:18px'>
  <tr>
     <td>
<form method="post">
<table border="0">
<tr>
<td name="center">Subjek </td>
<td><select name="idsubjek" required>
<option selected value="<?php echo $dataSubjek['idsubjek']; ?>">
<?php echo $dataSubjek['subjek']; ?>
</option>
<?php $data2=mysqli_query($hubung,"SELECT * 
  FROM subjek "); 
while ($info2=mysqli_fetch_array($data2)){
  echo "<option value='$info2[idsubjek]'> $info2[subjek] </option>";
     } 
?>
</select></td>
</tr>
<tr>
<td align="right">Topik :</td>
<td><input type="text" name="paparan_topik" size="60%" 
value="<?php echo $editTOPIK; ?>" /></td>
</tr>
<tr>
<td align="right">Markah :</td>
<td><input type="text" name="markah" size="5"value="<?php echo $editMARKAH; ?>" /></td>
<tr>
<td></td>
<td><input type="hidden" name="idtopik" value="<?php echo $idTOPIK; ?>" />
<input type="submit" name="update" value="KEMASKINI" />
<input type="button" value="BATAL" onclick="history.back()"/> 
</td></table>
</form>
     <td></tr></table>
 </main>
 <?php include 'footer.php';?> 
  </body>
</html>
