<style>
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.btn {
  border: 3px solid black;
  border-radius: 5px;
  color: black;
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
  transition: all 0.3s;
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
  font-size: 20;
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue
}
.info:focus{
  background: dodgerblue;
  color: white;
}
.info2:focus{
  background: white;
  color: darkgreen;
}
.kill{
  color: white; 
  border: border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.5s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>
<?php
require 'sambung.php';
require 'keselamatan.php'; 
include 'header.php';
?>

<?php

//DAPATKAN ID TOPIK
$topik_pilihan=$_GET['idtopik']; 
$_SESSION['idtopik'] = $topik_pilihan;

//TABLE TOPIK
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik=$topik_pilihan"); 
$getTopik=mysqli_fetch_array($dataTopik);

//TOTAL SOALAN
$query = "SELECT * FROM soalan WHERE idtopik=$topik_pilihan"; 
$results = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($results);

//TETAPKAN NOM SOALAN
$number = 1;

// DAPATAN SOALAN
$query = "SELECT * FROM soalan WHERE nom_soalan = $number AND idtopik=$topik_pilihan";

//PAPAR RESULT
$result = mysqli_query($hubung,$query); 
$question = mysqli_fetch_assoc($result);

// PILIHAN JAWAPAN
if (isset($question['idsoalan'])){
  $query = "SELECT * from pilihan where nom_soalan = $number AND idsoalan='$question[idsoalan]'";
//PAPARKAN
$choices = mysqli_query($hubung,$query);
}

?>

<html>
  <body>
<center><h2 class="pop">TOPIK: <?php echo $getTopik['topik'];?></h2> 
</center>
<main>
<table width="70%" border="0" align="center">
<tr> 
<td> 
<hr> 
<?php
//RESPON TAS JAWAPAN BETUL ATAU TIDAK
if($number == 1){
echo"Sila baca soalan dengan teliti";
}else{
$jawapan=$_GET['semakan'];
  if($jawapan=="TEPAT"){
  echo "Tahniah, jawapan bagi soalan ";
  echo $number-1;
  echo " adalah <font color='blue' size='+3'>TEPAT</font>";
  }else{
  echo "Maaf, jawapan bagi soalan ";
  echo $number-1;
  echo " adalah <font color='red' size='+3'>SALAH</font>";
  }
}
?>
          </td>
     </tr>
      <tr>
          <td>
<hr>
Soalan <?php echo $number; ?> dari <?php echo $total; ?> 
<br><br>
<p class="bt3n info">
  <?php echo $question['soalan'] ?? null; ?>
</p>

<br> 
<?php
if ($question['gambarajah'] != null){
  echo "<img src='gambar/".$question['gambarajah']."'width='10%' height='30%'/>";
}
else {
  echo '[tiada img]';
}
?>
</P>
<form method="post" action="soalan_semak.php">
<?php
if (isset($question['jenis']) and $question['jenis']==1){
  ?>
  <ul>
  <?php 
  while($row=mysqli_fetch_assoc($choices)):
  ?>
  <li>
  <?php if($row['pilihan_jawapan'] != null){
  ?>
    <label class="container">
      <input name="choice" type="radio" value="<?php echo $row['idpilihan']; ?>" required checked="checked"/>

      <p class="pop"><?php echo $row['pilihan_jawapan'] ?? null;?></p>
      <span class="checkmark">
      </span>
    </label>
    <?php }?>
    </li> 
    <?php 
    endwhile;
    ?>
  </ul> 
<?php 
}else if (isset($question['jenis']) and $question['jenis']==2){
?>
  <input class="b3tn info" type="text" name="idJAWAPAN" placeholder="Taip Jawapan Di sini" size='70%' required>
  <br>
<?php
}
?>
<?php
if (isset($question['soalan'])){
?>
<br>
<button type="submit" name="submit" class="bt3n info2" style="font-size: 20;">
  HANTAR
</button>
<?php
} else{
  echo 'tiada soalan';
}
?>
<input type="hidden" name="number" value="<?php echo $number; ?>" />
<input type="hidden" name="jenis_soalan" value="<?php echo $question['jenis']; ?>" />
<input type="hidden" name="idsoalan" value="<?php echo $question['idsoalan']; ?>" />

</form></td></tr></table>
<?php include 'footer.php';?>
  </body> 
</html>
