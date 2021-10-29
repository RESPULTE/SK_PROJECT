<style>
.warsn {
  border: 3px solid forestgreen;
  border-color: forestgreen;
  font-size: 30;
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
  text-align: center;
}
  #loll{
  border: 3px solid blue; 
  text-align: center; 
  border-radius: 5px; 
  font-size: 20;
  background-color: dodgerblue; 
  color: white;
}
#tt{
  border-radius: 8px; 
  padding: 10px 10px; 
  font-size: 20;
  text-align: center;
  background-color: lightcyan; 
  font-size: 20;
}
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
//DAPATKAN ID PENGGUNA
$idpengguna=$_SESSION['idpengguna'];
?>

<html> 
  <body>
<head><?php include 'menu.php'; ?></head> 
<center><h2 class="pop">REKOD MARKAH YANG DICAPAI</h2></center> 
  <main>
<table width="70%" align="center">
  <tr>
    <td id="loll" width="2%"><b>Bil.</b></td>
    <td id="loll" width="15%"><b>Subjek</b></td>
    <td id="loll" width="25%"><b>Topik</b></td>
    <td id="loll" width="8%"><b>Jenis Soalan</b></td>
    <td id="loll" width="20%"><b>Tarikh/Masa</b></td>
    <td id="loll" width="4%"><b>Skor</b></td>
     <td id="loll" width="4%"><b>Markah</b></td>
  </tr> 
 <?php 
 $no=1;
 $data1=mysqli_query($hubung," SELECT * FROM perekodan WHERE 
  idpengguna='$idpengguna' ORDER BY catatan_masa DESC limit 0,10");
while ($info1=mysqli_fetch_array($data1)){


//TABLE TOPIK	
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE 
idtopik='$info1[idtopik]'"); 
$getTopik=mysqli_fetch_array($dataTopik);
$dataSubjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE 
idsubjek='$getTopik[idsubjek]'"); 
$getSubjek=mysqli_fetch_array($dataSubjek);
//TABLE SOALAN, Nak dapatkan bilangan soalan
$dataSoalan=mysqli_query($hubung,"SELECT jenis, COUNT(idtopik) as 'bil' FROM soalan WHERE idtopik='$info1[idtopik]' AND jenis='$info1[jenis]'");
$infoSoalan=mysqli_fetch_array($dataSoalan);
//VARIABLE VALUE 
$jenisSoalan=$info1['jenis'];
$bilSoalan=$infoSoalan['bil'];
$markah_Topik=$getTopik['markah']; 
$subjek_ = $getSubjek['subjek'];
?>
  <tr style='font-size:20px;'> 
   <td  id='tt'><?php echo $no; ?></td> 
   <td id='tt'><?php echo $getSubjek['subjek']; ?></td>
    <td id='tt'><?php echo $getTopik['topik']; ?></td>
    <td  id='tt'align="center"><?php 
	if($jenisSoalan==1){
         echo "MCQ/TF";
	}else{
         echo "FIB";
        }
    ?></td>
<td id='tt' align="center"><?php echo date('d-m-Y g:i A', strtotime($info1['catatan_masa'])); ?></td>
<td id='tt' align="center"><?php echo $info1['skor']; ?></td>
<td id='tt' align="center"><?php echo number_format(($info1['skor']/$bilSoalan)*$markah_Topik);?>%</td>
  </tr>
  <?php $no++; } ?> 
</table>
</main>
<center>
<br>
<font style='font-size:18px; color: darkorange;'>* Rekod yang
dipaparkan adalah 10 yang terkini *<br />Jumlah Rekod:<?php echo $no-1; ?></font></center> 
  </body>
</html>
