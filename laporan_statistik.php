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
<table width="800" border="0">
  <tr><td width="800">
     <table width="800" border="0">
  <tr>
<td width="80" valign="top">
<img src="<?php echo $lencana;?>" width="100" height="102" hspace="7" align="left" /></td>

<td><h5><?php echo $nama_sekolah;?></h5>
  </tr> 
  <tr> 
  <td colspan="3" valign="top"><hr/></td>
  </tr> 
  </table></td> 
 </tr>
 <tr>
    <td>
	
<p class="pop11"><strong>LAPORAN: BILANGAN SOALAN MENGIKUT TOPIK BAGI SEMUA SUBJEK</strong></p>

<table width="800" border="0" align="center"></td> 
  </tr>
  <tr>
    <td id="loll" width="30"><b>Bil.</b></td>
     <td id="loll" width="250"><b>Subjek</b></td> 
	 <td id="loll" width="400"><b>Topik</b></td> 
	 <td id="loll" width="70"><b>Format</b></td> 
	 <td id="loll" width="50"><b>Soalan</b></td>
  </tr>
<?php
$no=1; 
$rekod=mysqli_query($hubung,"SELECT * FROM topik");
while ($infoRekod=mysqli_fetch_array($rekod)){
//Sambung ke table soalan	
  $soalan=mysqli_query($hubung,"SELECT idtopik,jenis,COUNT(idtopik) as 'bil' FROM soalan where idtopik='$infoRekod[idtopik]'");
  $infoSoalan=mysqli_fetch_array($soalan);
	 
//Sambung ke table subjek 
$subjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$infoRekod[idsubjek]'"); 
$infoSubjek=mysqli_fetch_array($subjek);
?>
  <tr style='font-size:16px'>
    <td id="tt" ><?php echo $no; ?></td>
    <td id="tt" ><?php echo $infoSubjek['subjek'] ?? null; ?></td>
	 <td id="tt" ><?php echo $infoRekod['topik']; ?></td>
     <td  id="tt" align="center"><?php
     if ($infoSoalan['jenis']==1){ 
          echo "MCQ / TF";
     }else{
          echo "FIB";
     }?>
</td>

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

