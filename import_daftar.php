<style>
.btn {
  border: 3px solid black;
  border-radius: 5px;
  margin: 3px;
  color: black;
  transition: all 0.3s;
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
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}
.pop{
border-style: solid;
border-color: orange;
background-color: lightyellow;
color: darkorange;
width: 70%;


}
input[type="file"] {
    display: none;
}
</style>
<?php
require 'sambung.php';
require 'keselamatan.php'; 
include 'header.php';
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center><h2 class="pop">IMPORT NAMA PELAJAR DARI FAIL CSV</h2>
</center>
   <main>
<table width="70%" border= "0" align="center">
  <tr>
     <td>
<label>Kemudahan untuk daftar nama pelajar secara berke-lompok</label><br>
<label>Pilih lokasi fail CSV/Excel:</label>

<!-- PANGGIL FAIL IMPORT CSV-->
<form action="import_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
<br>
<label>
    <a class=" b3tn info2" >
        SELECT FILE
        <input type="file" name="file" id="file" class="input-large" required>
    </a>
</label>

<br>
<br>
<button type="submit" id="submit" name="import" class="b3tn info2">Upload</button>
 </center> 
 </form>
*Cipta fail dalam Ms Excell dan save as csv mengikut
aturan lajur seperti di bawah: 
 <br><br>
 <table width="70%" border="1" align="center" >
 <tr>
 <td>111213031234</td>
 <td>1234</td>
 <td>SITI NORHALIZA BINTI SAMAD</td>
 <td>PEREMPUAN</td> 
 </tr>
 </table>
          </td>
     </tr>
</table>
    </main>
<?php include 'footer.php';?> 
  </body>
</html>
