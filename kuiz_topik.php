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
</style>
<?php
require 'sambung.php';
require 'keselamatan.php'; 
include 'header.php';
//DAPATKAN Iek_pilD SUBJEK

$subjek_pilihan = $_GET['idsubjek']; 
//SAMBUNG KE TABLE
$result = mysqli_query($hubung, "SELECT * FROM subjek 
WHERE idsubjek='$subjek_pilihan'");
while($res = mysqli_fetch_array($result))
{
//Paparkan nilai asal
$paparsubjek = $res['subjek'];
}
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center><h2 class="pop">SENARAI TOPIK UNTUK SUBJEK <?php echo 
$paparsubjek; ?></h2></center>
<main>
<table width="70%" border="0" align="center" style='font-size:20px'>
  <tr>
    <td width="2%"><b>Bil.</b></td>
    <td width="50%"><b>Topik</b></td>
    <td width="8%"><b>Format</b></td>
    <td width="10%"><b>Tindakan</b></td>
  </tr> 
 <?php 
  $no=1;
$data1=mysqli_query($hubung,"SELECT * FROM subjek AS s
INNER JOIN topik AS t ON s.idsubjek = t.idsubjek 
INNER JOIN soalan AS q ON t.idtopik = q.idtopik
WHERE s.idsubjek='$subjek_pilihan'
group by q.idtopik,q.jenis "); 
while($info1=mysqli_fetch_array($data1))
         {
         ?>
 <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $info1['topik']; ?></td>
    <td><?php
    if($info1['jenis']==1){
    echo "MCQ/TF";
    }else{
         echo"FIB";
	}
    ?></td>
    <td>
<a href="soalan_mula.php?idtopik=<?php echo $info1['idtopik'];?>
&jenis=<?php echo $info1['jenis'];?>"> 
<button class="b3tn info2">Buka</button></a></td></tr>
<?php $no++; } ?>
</table>
      </main>
<center><font style='font-size:14px'>* Senarai Tamat 
*<br />Jumlah Rekod:<?php echo $no-1; ?></font></center> 
  </body>
</html>
