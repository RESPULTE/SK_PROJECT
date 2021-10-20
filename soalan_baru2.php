<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//ID DARI URL
if(isset($_SESSION['idtopik'])){
  $idTopik=$_SESSION['idtopik'];
}
else{
  $idTopik=$_GET['idtopik'];
}
$_SESSION['idtopik'] = $idTopik;
//JUMLAH SOALAN
$query = "SELECT * FROM soalan WHERE idtopik='$idTopik' AND jenis='2'";
$soalan = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<html>
<script type="text/javascript" src="jquery.js"></script>  
<script type="text/javascript">
function add_row()
{
 $rowno=$("#jawapan tr").length;
 $rowno=$rowno+1;
 $("#jawapan tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='idJAWAPAN1 []' placeholder='Taip Cadangan Jawapan' size='70%'></td><td><input type='text' name='idTOPIK[]' value='<?php echo $idTopik; ?>' size='60%' hidden></td><td><input class='button' type='button' value='BUANG' on_click = delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
  <head>
<?php include 'menu.php'; ?>
</head>
<center><h2>TAMBAH SOALAN</h2></center>

   <main>
<table width="70%" border="0" align="center">
<tr> 
<td> 
<body>
<form method="post" enctype="multipart/form-data" action="soalan_proses.php">
<p>
<label>Bilangan Soalan</label>
<input size='2%' type="text" value="<?php echo $next; ?>" name="nom_soalan" readonly />
</p>
<p>
<label>Soalan:</label><BR>
<textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" required></textarea> 
</p>
<p>
<label>Gambar<small style="color:red"> *Jika perlu </sma11></label><br>
<input type="file" name="gambar"/>
</p>
<label>Cadangan Jawapan:</label><BR>
<small>*Boleh tambah jawapan yang mungkin</small>
</span><BR>
<table id="jawapan" align=left width ='30%' border=0>
<tr id="rowl">
<td><input type="text" name="idJAWAPAN1[]" placeholder="Taip Cadangan Jawapan" size="70%" >
</td> 
<td><input type="text" name="idTOPIK[]" value="<?php echo $idTopik; ?>" hidden></td>
</tr>
</table>
  <br>
  <table width='100%' border=0>
  <tr><td>
  <fieldset><legend>MENU</legend><center>
<input class="button" type="button" onclick="add_row();" value="TAMBAH JAWAPAN">
<input class="button" type="submit" name="submit" value="SIMPAN SOALAN">
<button onclick="window.location.href='pilih_subjek.php'">TAMAT</button>
  </center></fieldset>
  </td></tr>
  </table>
 </form>
           </td>
          </tr>
     </table>
</bodY> 
</html>

