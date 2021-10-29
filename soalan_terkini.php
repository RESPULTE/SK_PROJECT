<style>
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
</style>
<?php require 'sambung.php'; ?>

<hr>
<table width="100%" border="0" align="center">
	<tr style='font-size: 22px'>
	<td id="loll" width="5%"><b>Bil.</b></td>
	<td id="loll" width="20%"><b>Subjek</b></td>
	<td id="loll" width="50%"><b>Topik</b></td>
	<td id="loll" width="15%"><b>Format</b></td>
	<td id="loll" width="10%"><b>Bil</b></td>
</tr>
<?php
$no=1;
$topik=mysqli_query($hubung, "SELECT * FROM subjek AS s
INNER JOIN topik AS t ON (s.idsubjek = t.idsubjek)
INNER JOIN soalan AS soal ON (t.idtopik = soal.idtopik)
GROUP BY t.topik ORDER BY t.idtopik desc limit 0,10 ");

while ($infoTopik=mysqli_fetch_array($topik)){
$soalan=mysqli_query($hubung, "SELECT COUNT(idtopik) AS
'bil' FROM soalan WHERE idtopik='$infoTopik[idtopik]' AND
jenis='$infoTopik[jenis]'");
$infoSoalan=mysqli_fetch_array($soalan);
?>

<tr style='font-size:18px'>
<td id="tt"><?php echo $no; ?></td>
<td id="tt"><?php echo $infoTopik['subjek']; ?></td>
<td id="tt"><?php echo $infoTopik['topik']; ?></td>
<td id="tt"><?php
if ($infoTopik['jenis']==1) {
	echo "MCQ / TF";
}else{
	echo "FIB";
} ?>
</td>
<td id="tt"><?php echo $infoSoalan['bil']; ?></td>
</tr>
<?php $no++; } ?>
</table>
<br>
<center><font style='font-size:14px'>
* Rekod yang dipaparkan adalah 10 yang terkini sahaja
*<br/>Jumlah Rekod:<?php echo $no-1; ?>
</font>
</center>