<style type="text/css">
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
.pop11{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  padding: 5px 5px;
  font-size: 20;
  width: 90%;

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
</style>
<?php
require 'sambung.php';
require 'keselamatan.php';
?>
<html>
<title><?php echo $nama_sistem;?></title> 
<body>
<center>
<img src="<?php echo $lencana;?>" width="200" height="200" hspace="7" /></td>
</center>
 <tr>
    <td>
<center>
  <p class="pop11" style="width: 65%;" align="center"><strong>LAPORAN: BILANGAN SOALAN MENGIKUT TOPIK BAGI SEMUA SUBJEK</strong></p>
</center>


<table width="800" border="0" align="center"></td> 
  </tr>
  <tr>
    <td id="loll" width="30"><b>Bil.</b></td>
     <td id="loll" width="150"><b>Subjek</b></td> 
	 <td id="loll" width="400"><b>Topik</b></td> 
	 <td id="loll" width="200"><b>Guru</b></td> 
	 <td id="loll" width="50"><b>Soalan</b></td>
  </tr>
<?php
$no=1; 
$rekod=mysqli_query($hubung,"SELECT * FROM topik");
while ($infoRekod=mysqli_fetch_array($rekod)){

  //Sambung ke table soalan	
  $soalan=mysqli_query($hubung,"
    SELECT idtopik,jenis,COUNT(idtopik) 
    as 'bil' FROM soalan 
    where idtopik='$infoRekod[idtopik]'");
  $infoSoalan=mysqli_fetch_array($soalan);

  //Sambung ke table pengguna 	
  $guru=mysqli_query($hubung,"SELECT nama FROM pengguna where idpengguna='$infoRekod[idpengguna]'");
  $infoGuru=mysqli_fetch_array($guru);

  //Sambung ke table subjek 
  $subjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$infoRekod[idsubjek]'"); 
  $infoSubjek=mysqli_fetch_array($subjek);
?>
  <tr style='font-size:16px'>
    <td id="tt" ><?php echo $no; ?></td>
    <td id="tt" ><?php echo $infoSubjek['subjek'] ?? null; ?></td>
	 <td id="tt" ><?php echo $infoRekod['topik']; ?></td>
     <td  id="tt" align="center"><?php echo $infoGuru['nama']; ?></td>

<td  id="tt" align="center"><?php echo $infoSoalan['bil'];; ?></td>  
  </tr>
<?php $no++;}?>
</table>
</center>
<center><h5>* Laporan Tamat *<br/>
3umlah Rekod:<?php echo $no-1; ?></h5><br> 
<a href="index2.php"><button class="b3tn info">Home</button></a> 
<a href="javascript:window.print()"><button class="b3tn info2">Cetak Laporan</button></a>
<a href="logout.php"><button class="b3tn info">Logout</button></a></center> 
</body>
</html>

