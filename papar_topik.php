<style>
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.btn {
  border: 3px solid black;
  border-radius: 5px;
  color: black;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
}
#loll{
  border: 3px solid blue; 
  text-align: center; 
  border-radius: 5px; 
  font-size: 20;
  background-color: dodgerblue; 
  color: white;
}
#tt11{
  border-radius: 8px; 
  font-size: 20;
  text-align: center;
  background-color: lightcyan; 
  font-size: 20;
}
.b3tn {
  border: 3px solid black;
  border-radius: 5px;
  font-size: 18;
  margin: 3px;
  color: black;
  transition: all 0.3s;
  cursor: pointer;
}
.info2 {
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
  font-size: 20;
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}
.kill{
  color: white; 
  border: 3px solid darkred; 
  border-radius: 5px; 
  transition: all 0.5s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
</style>
<?php
//WAJIB DAN PERLUKAN FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//DAPATKAN ID SUBJEK
$subjek_pilihan = $_GET['idsubjek'];
$_SESSION['idsubjek'] = $subjek_pilihan;
$guru = $_SESSION['idpengguna'];

//SAMBUNG KE TABLE

$result = mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
$subjek = null;
while($res = mysqli_fetch_array($result))
{
//Paparkan nilai asal
$subjek = $res['subjek'];

}
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>

<center>
<h2 class="pop">SENARAI TOPIK SUBJEK: <?php echo $subjek; ?></h2>
</center>

<main>
<table width="70%" border="0" align="center" style='font-size:18px'>
<tr>

</td>

</tr>
<tr>
<td id="loll" width="2%"><b>Bil.</b></td>
<td id="loll" width="40%"><b>Topik</b></td>
<td id="loll" width="14%"><b>Pengurusan Soalan</b></td>
<td id="loll" width="14%"><b>Pengurusan Topik</b></td>
</tr>

<?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM topik WHERE idsubjek='$subjek_pilihan' AND idpengguna='$guru'");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td id="tt11"><?php echo $no; ?></td>
<td id="tt11"><?php echo $info1['topik']; ?></td>
<td id="tt11">
  <a href="soalan_baru1.php?idtopik=<?php echo $info1['idtopik'];?>">
  <button class="b3tn info">+MCQ</button></a>
<a href="soalan_baru2.php?idtopik=<?php echo $info1['idtopik'];?>">
  <button class="b3tn info">+FIB</button></a>
<a href="papar_soalan.php?idtopik=<?php echo $info1['idtopik'];?>">
  <button class="b3tn info2">Papar</button></a>
</td>
<td id="tt11">
<a href="edit_topik.php?idtopik=
<?php echo $info1['idtopik'];?>"><button class="b3tn info">Edit
</button></a>
<a href="hapus_topik.php?idtopik=
<?php echo $info1['idtopik'];?>"><button class="b3tn kill">Hapus
</button></a>
</td>
</tr>
<?php $no++; } ?>
</table>
</main>
<br>
<center>
  <a href="tambah_topik.php?idsubjek=<?php echo $subjek_pilihan;?>"><button class="b3tn info">Cipta Topik</button></a>
</center>


<center>
  <font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>