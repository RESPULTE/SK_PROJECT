<style>
.pop{
  font-size: 35;
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.pop2{
  font-size: 35;
  border-style: solid;
  border-color: forestgreen;
  background-color: lightgreen;
  color: forestgreen;
  width: 50%;
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
  background-color: white;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}
.kill{
  color: red; 
  border: border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.5s;
  background-color: white; 
  font-size: 20px;
}
.kill:hover{
  background: red;
  color:  white;
}
</style>
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
     <h2 class="pop">SUBJEK: <?php echo $getSubjek['subjek'];?></h2>
     <h3 class="pop2">TOPIK: <?php echo $getTopik['topik'];?></h3>
      </center>
 <main>
<center>
  <table width="70%" border="1" style="border-radius: 8px; padding: 10px 10px; background-color: lightcyan; border: 3px solid dodgerblue;" align="center">

     <tr>
     <td><h3 style="font-size:20; color: darkblue; margin-bottom: 2px;">Arahan kepada pelajar:</h3></td>
     </tr>
     <tr>
<td style="font-size:20; color: darkblue; margin-bottom: 2px;">Jawapan semua soalan. Pilih jawapan yang terbaik.</td>
     </tr>
<tr> 
<td style="font-size:20; color: darkblue; margin-bottom: 2px;"> 
<ul > 
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
     </ul>
<a href="soalan_papar.php?n=1&idtopik=<?php echo $topik_pilihan;?>&total=<?php echo $total;?>"><button class="b3tn info">MULAKAN</button></a>
<a href="kuiz_topik.php?idsubjek=<?php echo $getSubjek['idsubjek'];?>"><button class="b3tn kill">BATALKAN</button></a> 
</td></tr></table>
</center>

</main>
<?php include 'footer.php';?>
  </body>
</html>
