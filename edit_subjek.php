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
<center><h2 class="pop">KEMASKINI SUBJEK</h2></center>
<main>
<table width="70%" border="0" align="center" style=' font-size:18px'>
<tr>
<td>
<form method="POST">
<tr>
<td align="right" style="color: darkorange; font-size:20;">NAMA SUBJEK:</td>
<td><input class="b3tn info" type="text" name="subjek" size="40%" value="<?php echo $dataSubjek['subjek']; ?>"/></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idsubjek" value="<?php echo $dataSubjek['idsubjek']; ?>" />
<input class="b3tn info2" style="font-size: 20 ;" type="submit" name="update" value="KEMASKINI" />
<input class="b3tn kill" style="font-size: 20 ;"type="button" value="BATAL" onclick="history.back()"/>
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


