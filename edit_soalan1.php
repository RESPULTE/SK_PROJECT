<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<?php
$soalan_terpilih = $_GET['idsoalan'];  
//PILIII DATA BERDASARKAN PADA ID REKOD
$pilihSoalan = mysqli_query($hubung, "SELECT * FROM soaian WHERE idsoalan=$soalan_terpilih"); 
while($dataSoalan = mysqli_fetch_array($pilihSoalan)){
//Paparkan nilai asal
     $nom_soalan = $dataSoalan['nom_soalan'];
     $soalan= $dataSoalan['soalan'];
    $gambarajah = $dataSoalan['gambarajah'];
}
?>
<html>
  <head><?php include 'menu.php'; ?></head>
  <body><center><h2>KEMASKINI SOALAN</h2></center> 
  <main>
  <table width="70%" border="0" align="center"> 
     <tr>
          <td>
<form action="edit soalanl_save.php" method="POST"
enctype="multipart/form-data"> 
<p>
<label>Soalan ke-<?	echo $nom_soalan; ?></label>
<input type="text" name="idsoalan" value="<?php echo $soalan terpilih; ?>" readonly hidden>
</p>
<p>
<label>Soalan</label>
<textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" autofocus >
<?php echo $soalan; ?> 
</textarea>	
</P>
<p> 
<label>Gambar<br>
<?php
     if ($gambarajah==NULL){ 
	 echo "-TIADA-";
     }else{
     echo "<img src='gambar/".$gambarajah."' width='30%' height='30%'/>";
     }
     ?>
<input type="text" name="gambarAsal" value="<?php echo $gambarajah; ?>" readonly hidden>
<br>
<br><small style="color:red">*Jika perlu</small><label>
<input type="file" name="gambar"/> 
</p>
<p>
<input type="submit" name="submit" value="KEMASKINI"/>
<input type="button" value="BATAL" onclick="history.back()"/>
</p>
</form></td></tr>
          </table>
      </main>
<?php include 'footer.php';?> 
  </body>
</html>	


