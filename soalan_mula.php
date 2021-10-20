<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID SUBJEK
$topik_pilihan = $_GET['idtopik']; 
$jenis = $_GET['jenis'];

$_SESSION['idtopik'] = $topik_pilihan; 
$_SESSION['jenis_soalan'] = $jenis;
//TABLE TOPIK 
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE 
idtopik=$topik_pilihan");
$getTopik=mysqli_fetch_array($dataTopik);
//TABLE SOALAN 
$dataSoalan=mysqli_query($hubung,"SELECT * FROM soalan 
WHERE idtopik=$getTopik[idtopik] AND jenis=$jenis");
$getSoalan=mysqli_fetch_array($dataSoalan); 
$total=mysqli_num_rows($dataSoalan);
//TABLE subjek 
$dataSubjek=mysqli_query($hubung,"SELECT * FROM subjek
WHERE idsubjek=$getTopik[idsubjek]"); 
$getSubjek=mysqli_fetch_array($dataSubjek);
 ?>
 
<html> 
  <body>
      <center>
     <h2>SUBJEK: <?php echo $getSubjek['subjek'];?></h2>
     <h3>TOPIK: <?php echo $getTopik['topik'];?></h3>
      </center>
 <main>
<table width="70%" border="0" align="center">
     <tr>
     <td><h3>Arahan kepada pelajar:</h3></td>
     </tr>
     <tr>
<td>Jawapan semua soalan. Pilih jawapan yang terbaik.</td>
     </tr>
<tr> 
<td> 
<ul> 
<li>Jumlah soalan: <strong><?php echo $total; ?>
</strong></li>
<li>Jenis Soalan: <strong><?php
	 if($getSoalan['jenis']==1){ 
     echo "Berbilang Jawapan dan Benar/Palsu";
     }else{
     echo "Isikan Tempat Kosong";
	      }
?></strong></li> 
<li>Peruntukan Masa: <strong><?php echo $total*1; ?> 
minit</strong></li>
     </ul><br>
<a href="soalan_papar.php?n=1&idtopik=<?php echo $topik_pilihan;?>&total=<?php echo $total;?>"><button> 
MULAKAN</button></a>
<a href="kuiz_topik.php?idsubjek=<?php echo $getSubjek['idsubjek'];?>"><button>BATALKAN</button></a> 
</td></tr></table>
</main>
<?php include 'footer.php';?>
  </body>
</html>
