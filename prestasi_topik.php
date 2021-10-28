<style>
.pop{
  font-size: 35;
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
  border: border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.5s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
#loll{
  border: 3px solid blue; 
  text-align: center; 
  border-radius: 5px; 
  background-color: dodgerblue; 
  color: white;
}
tr{
  border-radius: 8px; 
  padding: 10px 10px; 
  background-color: lightcyan; 
  border: 3px solid dodgerblue;
  font-size: 20;
}
</style>
<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID GURU
$guru = $_SESSION['idpengguna'];
?>

<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2 class="pop">PRESTASI PELAJAR BERDASARKAN SUBJEK-TOPIK</h2> 
</center>
      <main>
<table width="70%" border="0" align="center" 
style='font-size:16px'>
  <tr>
    <td id='loll' width="2%"><b>Bil.</b></td>
    <td id='loll' width="15%"><b>Subjek</b></td>
    <td id='loll' width="35%"><b>Topik</b></td>
     <td id='loll' width="8%"><b>Bil.jawab</b></td>
     <td id='loll' width="10%"><b>Laporan Lengkap</b></td>
  </tr> 
<?php
$no=1;
$topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idpengguna='$guru'");
while ($infoTopik=mysqli_fetch_array($topik)){
  $subjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$infoTopik[idsubjek]'");
  $infoSubjek=mysqli_fetch_array($subjek);
  $rekod=mysqli_query($hubung,"SELECT idtopik,COUNT(idtopik) AS 'bil'FROM perekodan WHERE idtopik='$infoTopik[idtopik]'");
  $infoJawab=mysqli_fetch_array($rekod);
?>
  <tr>
    <td><?php echo $no; ?></td>
     <td><?php echo $infoSubjek['subjek'] ?? null; ?></td>
     <td><?php echo $infoTopik['topik']; ?></td> 
	 <td><?php echo $infoJawab['bil']; ?></td>
     <td align="center">
    <a href="laporan_guru.php?idtopik=<?php echo $infoTopik['idtopik'];?>">
      <button class="b3tn info2">Papar</button>
    </a></td>
  </tr>
  <?php $no++; } ?>
</table>
      </main> 
	<center>
<font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?> 
</font>
  </center> 
  </body>
</html>

