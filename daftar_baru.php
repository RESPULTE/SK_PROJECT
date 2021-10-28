<style>
.btn3 {
  border: 3px solid;
  border-radius: 5px;
  margin: 3px;
  transition: all 0.3s;
  font-size: 10px;
  cursor: pointer;
}

.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
/* Blue */
.info {
  font-size: 25;
  border-color: #2196F3;
  border: 3px solid #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info:hover {
  background: #2196F3;
  color: white;
}

.info1 {
  font-size: 25;
  border-color: forestgreen;
  border: 3px solid forestgreen;
  background-color: lightgreen;
  color: forestgreen;
}

.info1:hover {
  border-color: forestgreen;
  background: white;
  color: forestgreen;
}
.info1:focus{
  border-color: forestgreen;
  background: white;
  color: darkgreen;
}
</style>

<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
//POST VALUE
if (isset($_POST['idpengguna'])) {
//pembolehubah untuk memegang data yang dihantar
$idpengguna = $_POST['idpengguna'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$jantina = $_POST['jantina'];
$aras = $_POST['aras'];

//INSERT REKOD
$daftar= "INSERT INTO pengguna
(idpengguna, password, nama, jantina, aras)
VALUES
('$idpengguna', '$password', '$nama', '$jantina', '$aras')";
// LAKSANA QUERY
$hasil = mysqli_query($hubung, $daftar);
// SEMAKAN
	if ($hasil) {
		echo "<script>alert( 'Pendaftaran berjaya');
		window.location='login.php'</script>";
	}else{
		echo "<script>alert('Pendaftaran gagal');
		window.location='daftar_baru.php'</script>";
	}
}
?>
<html>
<head><?php include 'menu1.php'; ?></head>
<body>
<center><h2 class="pop">PENDAFTARAN PENGGUNA BARU</h2></center>
<main>
<table width="70%" border="0" align="center">
<tr>
<td>
<!-- Papar Borang Pendaftaran -->

<form method="POST">
<label style="font-size: 20;">Nombor Kad Pengenalan</label><br>
 <input onblur="checklength(this)" type="text"
name="idpengguna" placeholder="Tanpa tanda -"
maxlength='9'size="25" class="btn3 info1" 
onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus style="font-size: 20;"/>
<script>
function checkLength(el) {
	if (el.value. length 1 - 10) {
		alert("Nombor KP mesti 10 digit")
	}
}
</script>
<br>
<label style="font-size: 20;">Katalaluan</label><br>
<input type="password" name="password" id="password"
placeholder="4 digit sahaja" size="10" class="btn3 info1" 
maxlength='10' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required style="font-size: 20;">
<br>
<label style="font-size: 20;">Nama</label><br>
<input class="btn3 info1" type="text" name="nama" placeholder="Nama Penuh Anda" size="50" required style="font-size: 20;">
<br>
<label style="font-size: 20;">Jantina</label><br>
<select name="jantina" class="btn3 info1"  style="font-size: 20;">
<option style="font-size: 20;" value="">---Pilih---</option>
<option style="font-size: 20;" value="LELAKI">LELAKI</option>
<option style="font-size: 20;" value="PEREMPUAN" >PEREMPUAN</option>
</select>
<br>
<label style="font-size: 20;">Aras Pengguna</label><br>
<select name="aras" class="btn3 info1"  style="font-size: 20;">
<option style="font-size: 20;" value="">---Pilih---</option>
<option style="font-size: 20;" value="PELAJAR">PELAJAR</option>
<option style="font-size: 20;" value="GURU">GURU</option>
</select>
<br>
<br><input type="reset" value="Reset" class="btn3 info" style="font-size: 20;">
<button type="submit" class="btn3 info" style="font-size: 20;">Daftar</button><br><br>
 *Pastikan maklumat anda betul sebelum membuat pendaftaran.
</form>
</td>
</tr>
</table>
</main>
<?php include 'footer.php'; ?>
</body>
</html>