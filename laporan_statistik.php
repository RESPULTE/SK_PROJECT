<?php
require 'sambung.php';
require 'keselamatan.php';
?>
<html>
<title><?php echo $nama_sistem;?></title> 
<body>

<table width="800" border="0">
  <tr><td width="800">
     <table width="800" border="0">
  <tr>
<td width="80" valign="top">
<img src="<?php echo $lencana;?>" width="85" height="102" hspace="7" align="left" /></td>

<td><h5><?php echo $nama_sekolah;?></h5>
  </tr> 
  <tr> 
  <td colspan="3" valign="top"><hr/></td>
  </tr> 
  </table></td> 
 </tr>
 <tr>
    <td>
	
<p><strong>LAPORAN: BILANGAN SOALAN MENGIKUT TOPIK BAGI SEMUA SUBJEK</strong></p>

<table width="800" border="0" align="center"></td> 
  </tr>
  <tr>
    <td width="30"><b>Bil.</b></td>
     <td width="250"><b>Subjek</b></td> 
	 <td width="400"><b>Topik</b></td> 
	 <td width="70"><b>Format</b></td> 
	 <td width="50"><b>Soalan</b></td>
  </tr>
<?php
$no=1; 
$rekod=mysqli_query($hubung,"SELECT * FROM topik");
while ($infoRekod=mysqli_fetch_array($rekod)){
//Sambung ke table soalan	
  $soalan=mysqli_query($hubung,"SELECT idtopik,jenis,COUNT(idtopik) as 'bil' FROM soalan where
  idtopik='$infoRekod[idtopik]'");
  $infoSoalan=mysqli_fetch_array($soalan);
	 
//Sambung ke table subjek 
$subjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$infoRekod[idsubjek]'"); 
$infoSubjek=mysqli_fetch_array($subjek);
?>
  <tr style='font-size:16px'>
    <td><?php echo $no; ?></td>
    <td><?php echo $infoSubjek['subjek']; ?></td>
	 <td><?php echo $infoRekod['topik']; ?></td>
     <td align="center"><?php
     if ($infoSoalan['jenis']==1){ 
          echo "MCQ / TF";
     }else{
          echo "FIB";
     }?>
</td>

<td align="center"><?php echo $infoSoalan['bil'];; ?></td>  
  </tr>
<?php $no++;}?>
</table>
<center><h5>* Laporan Tamat *<br/>
3umlah Rekod:<?php echo $no-1; ?></h5><br> 
<a href="index2.php">Home</a> |
<a href="javascript:window.print()">Cetak Laporan</a>|
<a href="logout.php">Logout</a></center> 
</body>
</html>

