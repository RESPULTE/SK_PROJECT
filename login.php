<style>
.btn {
  border: 3px solid black;
  border-radius: 5px;
  transition: all 0.3s;
  font-size: 5px;
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
</
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
 placeholder="Tanpa tanda -" maxlength='12'size="25" class="btn info1211" 
 onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus />

<script>
function checkLength(el) {
if (el.value.length != 12) {
alert("Nombor KP mesti 12 digit")
	}
	}
</script>

<h2 id="tile" style="margin-top: 10px; margin-bottom: 10px;">Katalaluan</h2>
<input type="password" name="password" class="btn info1211"
 maxlength='10'size="10" required>
<br><br>
<button type="submit" class="btn info" onblur="checkLength(this)" >Daftar Masuk</button>
<button type="reset" class="btn info" onblur="checkLength(this)" >Reset</button>
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
