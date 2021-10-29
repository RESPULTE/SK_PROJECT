<style>
.btn90 {
  border: 3px solid orange;
  font-size: 20px;
  border-radius: 5px;
  transition: all 0.3s;
  margin: 1px;
  cursor: pointer;
}
.popeader{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 50%;
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
#tile{
  margin-bottom: 0px;
}
/* Blue */
.info {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info:hover {
  background: #2196F3;
  color: white;
}

.info1211 {
  border: 3px solid orange;
  background-color: lightyellow;
  color: orange;
}

.info1211:hover {
  background: white;
  color: orange;
}
.info1211:focus{
  background: white;
  color: orange;
}
.warn {
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}

.warn:hover {
  background: orange;
  color: white;
}
</style>

<?php
require 'sambung.php';
include 'header.php';
?>

<html>
<head><?php include 'menu1.php' ?></head>
<body>
	<center><h2 class="popeader">LOG MASUK PENGGUNA</h2></center>
		<main>
<table width="70%" border="0" align="center">
	<tr>
		<td align="center">
 <form action="proseslogin.php" method="post">
 <h2 id="tile" style="margin-top: 10px; margin-bottom: 10px;">Nombor Kad Pengenalan</h2>
 <input 
 type="text" name="idpengguna" 
 placeholder="Tanpa tanda -" minlength="12" maxlength='12'size="25" class="btn90 info1211" 
 onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus />

<h2 id="tile" style="margin-top: 10px; margin-bottom: 10px;">Katalaluan</h2>
<input type="password" name="password" class="btn90 info1211"
 maxlength='10'size="10" required>
<br><br>
<button type="submit" class="btn90 info2">Daftar Masuk</button>
<button type="reset" class="btn90 warn">Reset</button>
<br>
<h3>*Jika belum mendaftar, <a href="daftar_baru.php">
Daftar di sini</a></h3></br>
</form>
</td>
</tr>
</table>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
