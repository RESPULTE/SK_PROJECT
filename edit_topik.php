<style>
.b3tn {
  border: 3px solid;
  border-radius: 5px;
  margin: 3px;
  font-size: 20;
  transition: all 0.3s;
  cursor: pointer;
}

.info2 {
  padding: 0px 4px;
  text-align: center;
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
}
.info2:hover {
  background: forestgreen;
  color: white;
}
/* Blue */
.info {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info:hover {
  background: #2196F3;
  color: white;
}
.warn {
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}

.warn:hover {
  background: orange;
  color: white;
}
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.kill{
  color: white; 
  border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.3s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
</style>
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
$pilihTopik = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik='$topikEdit'");
while ($dataTopik = mysqli_fetch_array($pilihTopik)){
$pilihSubjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$dataTopik[idsubjek]'");
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
<center><h2 class="pop">KEMASKINI TOPIK</h2></center>
<main>
<table width="70%" border="0" align="center" style='font-size:18px'>
  <tr>
     <td>
<form method="post">
<table border="0">
<tr>
<td name="center" style="color: darkorange; font-size: 20;">Subjek :</td>
<td><select name="idsubjek" class="b3tn info" style="font-size: 20;" required>
<option selected value="<?php echo $dataSubjek['idsubjek']; ?>">
<?php echo $dataSubjek['subjek'] ?? null; ?>
</option>
<?php $data2=mysqli_query($hubung,"SELECT * FROM subjek "); 
while ($info2=mysqli_fetch_array($data2)){
  echo "<option value='$info2[idsubjek]'> $info2[subjek] </option>";
     } 
?>
</select></td>
</tr>
<tr>
<td align="center" style="color: darkorange; font-size: 20;">Topik :</td>
<td><input type="text" name="paparan_topik" size="60%" class="b3tn info" style="font-size: 20; width: 300px" value="<?php echo $editTOPIK; ?>" /></td>
</tr>
<tr>
<td align="center" style="color: darkorange; font-size: 20;">Markah :</td>
<td><input type="text" class="b3tn info" style="font-size: 20; width: 100px" name="markah" size="5"value="<?php echo $editMARKAH; ?>" /></td>
</tr>
<td></td>
<td><input type="hidden" name="idtopik" value="<?php echo $idTOPIK; ?>" />
<input class="bt3n info2" style="font-size: 20;" type="submit" name="update" value="KEMASKINI" />
<input type="button" class="b3tn kill" style="font-size: 20;" value="BATAL" onclick="history.back()"/> 
</td></table>
</form>
     <td></tr></table>
 </main>
 <?php include 'footer.php';?> 
  </body>
</html>
