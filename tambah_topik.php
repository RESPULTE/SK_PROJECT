<?php
require 'keselamatan.php';
require 'sambung.php';
//sambung ke fail header
include 'header.php';
$guru = $_SESSION['idpengguna'];
?>

<?php
if (isset($_POST['submit'])){
   //POS VALUE
  $nom_soalan = $_POST['nom_soalan'];
  $topik = $_POST['topik'];
  $jenis_soalan = $_POST['jenis'];
  $idsubjek = $_POST['subjek'];
  $markah = $_POST['markah'];
   //QUERY TOPIK
  $query="INSERT INTO topik(idtopik,topik,markah,idsubjek,idpengguna) values 
  (NULL,'$topik','$markah','$idsubjek', '$guru')";
  $insert_row=mysqli_query($hubung,$query);
  $last_id = mysqli_insert_id($hubung);
  $_SESSION['idtopik']=$last_id;
if($jenis_soalan=="mcq"){
  echo "<script>alert('Topik baru telah ditambah'); window.location=
  'soalan_baru1.php?idtopik=$last_id' </script>";
}
if($jenis_soalan=='fib'){
  echo "<script>alert('Topik baru telah ditambah');        window.location='soalan_baru2.php?idtopik=$last_id' </script>";	
}
}
$subjek_pilihan = $_GET['idsubjek'];
$result = mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
$res = mysqli_fetch_array($result);
$_SESSION['idsubjek']=$subjek_pilihan;
//TOTAL TOPIK
$query = "SELECT * FROM topik WHERE idsubjek='$subjek_pilihan'";
$topik = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($topik); 
$next=$total+1;
?>

<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2>TAMBAH TOPIK</h2></center>
      <main>
<table width="70%" border="0" align="center">
  <tr>
     <td>
<form method="POST" action="tambah_topik.php">
<tr>
<td align="right">SUBJEK:</td>
<td>
<?php
  $paparsubjek = $res['subjek'];
  echo $paparsubjek;
?>
<input type="text" value="<?php echo $subjek_pilihan; ?>" name="subjek" hidden /></td> 
</tr> 
<tr>
<td align="right">BIL.:</td>
<td><?php echo $next; ?>
<input type="text" value="<?php echo $next; ?>"name="nom_soalan" hidden /></td> 
</tr>
<tr>
<td align="right">TOPIK:</td>
<td><input type="text" name="topik" required/></td>
</tr> 
<tr>
<td align="right">FORMAT SOALAN:</td>
<td>
  <select name="jenis"  required>
    <option hidden selected value="">PILIH</option>
  	<option value='mcq'>Pelbagai Jawapan / Benar-Palsu</option>
    <option value='fib'>Isi Tempat Kosong</option> 
	</select>
</td>
</tr> 
<tr> 
<td align="right">MARKAH:</td>
<td><input type="number" name="markah" max="100" size="10" required />	
</td> 
</tr> 
<tr><td></td>
<td><input type="submit" name="submit" value="TAMBAH" />
</td> 
</tr>
</form>
</td></tr></table>
      </main>
<?php include 'footer.php';?>
  </body>
</html>