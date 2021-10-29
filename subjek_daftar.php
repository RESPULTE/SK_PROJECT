<style>
.b3tn {
  border: 3px solid;
  border-radius: 5px;
  margin: 3px;
  font-size: 20;
  transition: all 0.3s;
  cursor: pointer;
}

.info2 {
  padding: 0px 4px;
  text-align: center;
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
  color: dodgerblue;
}

.info:hover {
  background: #2196F3;
  color: white;
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
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.kill{
  color: white; 
  border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.3s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
</style>
<?php
require 'sambung.php';
require 'keselamatan.php'; 
include 'header.php';
?>

<?php
if (isset($_POST['submit'])){
  $subjek_baru = $_POST['subjek']; 
  $query="INSERT INTO subjek (subjek) values('$subjek_baru')"; 
  $insert_row=mysqli_query($hubung,$query);
  echo "<script>alert('Subjek baru telah ditambah'); 
  window.location='subjek_senarai.php'</script>";
}
//JUMLAH SUBJEK
$query = "SELECT * FROM subjek";
$subjek = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($subjek); 
$next=$total+1;
?>

<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2 class="pop">DAFTAR SUBJEK</h2></center>
      <main>
<table width="70%" border="0" align="center">
  <tr>
     <td>
        <form method="post">
<tr>
<td align="right" style="color:orange; font-size:20;">BIL:</td>
<td style="color:dodgerblue; font-size:25;"><?php echo $next; ?></td>
</tr>
<tr><td align="right" style="color:orange; font-size:20;">NAMA SUBJEK:</td>
<td>	
<input type="text" class="b3tn info" name="subjek" s1ze="40%" required />
</td></tr>	
<tr>
<td></td>
<td><input class="b3tn info" type="submit" name="submit" value="DAFTAR" /> 
</td>
</tr>
</form>
           </td>
      </tr>
</table>
</main><?php include 'footer.php';?> 
  </body>

</html>