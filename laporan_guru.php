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
  padding: 10px 10px;
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
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<?php
require 'sambung.php'; 
require 'keselamatan.php';
$nokp=$_SESSION['idpengguna'];
$topik_pilihan = $_GET['idtopik'];
//SAMBUNG KE TABLE TOPIK 
$topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$topik_pilihan'");
$infoTopik=mysqli_fetch_array($topik);
?>

<html>
<title><?php echo $nama_sistem;?></title>
<body>
  <center>
    <table width="800" border="0">
  <tr>
    <td width="800">
     <table width="800" border="0">
  <tr>
    <td width="80" valign="top">
<img src="lencana.png" width="85" height="102" hspace="7" align="left" />
        </td>
          <td>
          <h5><?php echo $nama_sekolah;?></h5>
      </tr>
      <tr>
        <td colspan="3" valign="top"><hr/></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><center><p class="pop" style="font-size:22 ;"><strong>LAPORAN PRESTASI PELAJAR BAGI TOPIK: 
<?php echo $infoTopik['topik']; ?></strong></center></p>
<table width="800" border="0" align="center"> 
</td>
  </tr>
  <tr>
    <td width="10"><b>Bil.</b></td>
     <td width="500"><b>Nama Pelajar</b></td> 
   <td width="120"><b>Skor Tertinggi</b><td> 
  <td width="80"><b>Bil.Ujian</b></td>
  </tr>
  </center>

 <?php
 $no=1;
 //ARAHAN SQL, PELAJAR MARKAH 1 DAN KE ATAS SAHAJA
$rekod=mysqli_query($hubung,"SELECT idpengguna,idtopik, MAX(skor), COUNT(idpengguna) AS 'Bil' FROM perekodan WHERE idtopik='$topik_pilihan' GROUP BY idpengguna");
while ($infoRekod=mysqli_fetch_array($rekod)){
  $pelajar=mysqli_query($hubung,"SELECT * FROM pengguna WHERE idpengguna='$infoRekod[idpengguna]'"); 
  $infoPelajar=mysqli_fetch_array($pelajar);
?>
  <tr style='font-size:20px'>
    <td><?php echo $no; ?></td>
    <td><?php echo $infoPelajar['nama']; ?></td> 
	 <td><?php echo $infoRekod['MAX(skor)']; ?></td> 
	 <td><?php echo $infoRekod['Bil'];; ?></td>
  </tr>
<?php $no++; } ?>
</table>
<center><h5>* Laporan Tamat *<br/>
Jumlah Rekod:<?php echo $no-1; ?></h5><br> 

<input id='printPageButton' type='button' onclick="window.location.href='index2.php';" style="margin-left: 5px;" class="btn info" value="Home "/>
<input id='printPageButton' type='button' onclick="javascript:window.print();" style="margin-left: 5px;" class="btn info" value="Cetak Laporan"/>
<input id='printPageButton' type='button' onclick="window.location.href='logout.php';" style="margin-left: 5px;" class="btn info" value="Logout"/></center> 

</body>
</html>

