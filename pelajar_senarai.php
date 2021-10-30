<style type="text/css">
  .pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
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

</style>
<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
  <head><?php include 'menu.php'; ?></head> 
  <body>
    <center><h2 class="pop">SENARAI PELAJAR BERDAFTAR</h2></center> 
  	 <main>
      <table width="70%" border="0" align="center" style='font-size:16px'>
        <tr>
          <td id="loll" width="5%"><b>Bil.</b></td>
          <td id="loll" width="10%"><b>ID Pelajar</b></td> 
      	  <td id="loll" width="5%"><b>Password</b></td>
          <td id="loll" width="50%"><b>Nama Pelajar</b></td> 
      	  <td id="loll" width="5%"><b>Jantina</b></td>
          <td id="loll" width="5%"><b>Tindakan</b></td> 
        </tr>

        <?php
        $no=1;
        $data1=mysqli_query($hubung,"SELECT * 
          FROM pengguna 
          WHERE aras='PELAJAR' 
          ORDER BY nama ASC");

        while ($infol=mysqli_fetch_array($data1)){
        ?>
        <tr>
          <td id="tt"><?php echo $no; ?></td>
          <td id="tt"><?php echo $infol['idpengguna']; ?></td> 
      	  <td id="tt"><?php echo $infol['password']; ?></td> 
      	  <td id="tt"><?php echo $infol['nama']; ?></td> 
      	  <td id="tt"><?php echo $infol['jantina']; ?></td> 
      	  <td id="tt">
            <a href="hapus_pelajar.php?idpengguna=<?php echo $infol['idpengguna'];?>"
               onclick="return confirm('AWAS!, Semua rekod yang berkaitan akan dihapuskan, Anda Pasti?')">
              <button class="kill">HAPUS</button> 
            </a>
          </td>
        </tr>

        <?php $no++; } ?>
      </table>
     </main>
    <center>
  <font style='font-size:20px;'>
      • Senarai Tamat *
        <br/>
      Jumlah Rekod:<?php echo $no-1; ?> 
  </font>
</center>
</body>
</html>

