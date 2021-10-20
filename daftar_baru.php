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
<center><h2>PENDAFTARAN PENGGUNA BARU</h2></center>
<main>
<table width="70%" border="0" align="center">
<tr>
<td>
<!-- Papar Borang Pendaftaran -->

<form method="POST">
<label>Nombor Kad Pengenalan</label><br>
 <input onblur="checklength(this)" type="text"
name="idpengguna" placeholder="Tanpa tanda -"
maxlength='9'size="25"
onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus />
<script>
function checkLength(el) {
	if (el.value. length 1 - 9) {
		alert("Nombor KP mesti 9 digit")
	}
}
</script>
<br>
<label>Katalaluan</label><br>
<input type="password" name="password" id="password"
placeholder="4 digit sahaja" size="10"
maxlength='4' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
<br>
<label>Nama Pelajar</label><br>
<input type="text" name="nama" placeholder="Nama Penuh Anda" size="70" required >
<br>
<label>Jantina</label><br>
<select name="jantina">
<option value="">---Pilih---</option>
<option value="LELAKI">LELAKI</option>
<option value="PEREMPUAN" >PEREMPUAN</option>
</select>
<br>
<label>Aras Pengguna</label><br>
<select name="aras">
<option value="">---Pilih---</option>
<option value="PELAJAR">PELAJAR</option>
<option value="GURU">GURU</option>
</select>
<br>
<br><input type="reset" value="Reset">
<button type="submit">Daftar</button><br><br>
 *Pastikan maklumat anda betul sebelum membuat pendaftaran.
</form>
</td>
</tr>
</table>
</main>
<?php include 'footer.php'; ?>
</body>
</html>