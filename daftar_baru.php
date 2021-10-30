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

.info13131 {
  font-size: 25;
  border-color: orange;
  border: 3px solid orange;
  background-color: lightyellow;
  color: orange;
}

.info13131:hover {
  border-color: orange;
  background: white;
  color: orange;
}
.info13131:focus{
  border-color: orange;
  background: white;
  color: darkorange;
}
</style>

<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';

//POST VALUE
if (isset($_POST['idpengguna'])) {

// receive all the posted values from the form
  $idpengguna = $_POST['idpengguna'];
  $password   = $_POST['password'];
  $nama       = $_POST['nama'];
  $jantina    = $_POST['jantina'];
  $aras       = $_POST['aras'];

  //INSERT INTO DATABASE
  $daftar= "
  INSERT INTO pengguna
  (idpengguna, password, nama, jantina, aras)
  VALUES
  ('$idpengguna', '$password', '$nama', '$jantina', '$aras')";

  // EXCECUTE THE QUERY
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
      <table width="70%" align="center" style="background-color: lightcyan; border: 5px solid dodgerblue; border-radius: 5px">
        <tr>
          <td>
            <!-- FORM FOR THE REGISTRATION -->
            <form method="POST">
              <label style="font-size: 20;">Nombor Kad Pengenalan</label><br>
              <!-- INPUT FOR THE USER'S IC NUMBER -->
               <input type="text" minlength="12" 
                  name="idpengguna" placeholder="Tanpa tanda -"
                  maxlength='12'size="30" class="btn3 info13131" 
                  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus 
                  style="font-size: 20;"/>
      <br>
            <label style="font-size: 20;">Katalaluan</label><br>
                <!-- INPUT FOR THE PASSWORD -->
                <input type="password" name="password" id="password" minlength="6" 
                  placeholder="minimum 6 perkataan" size="30" class="btn3 info13131" 
                  maxlength='20' onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
                  required style="font-size: 20;">
            <br>
            <label style="font-size: 20;">Nama</label><br>
                <!-- INPUT FOR THE USER'S NAME -->
                <input class="btn3 info13131" 
                type="text" name="nama" 
                placeholder="Nama Penuh Anda" size="30" 
                required style="font-size: 20;">
            <br>
            <label style="font-size: 20;">Jantina</label><br>
              <select name="jantina" class="btn3 info13131"  style="font-size: 20;">
                <option style="font-size: 20;" value="">---Pilih---</option>
                <option style="font-size: 20;" value="LELAKI">LELAKI</option>
                <option style="font-size: 20;" value="PEREMPUAN" >PEREMPUAN</option>
              </select>
            <br>
              <label style="font-size: 20;">Aras Pengguna</label><br>
                <select name="aras" class="btn3 info13131"  style="font-size: 20;">
                  <option style="font-size: 20;" value="">---Pilih---</option>
                  <option style="font-size: 20;" value="PELAJAR">PELAJAR</option>
                  <option style="font-size: 20;" value="GURU">GURU</option>
                </select>
              <br><br>
            <input type="reset" value="Reset" class="btn3 info" style="font-size: 20;">
            <button type="submit" class="btn3 info" style="font-size: 20;">Daftar</button>
            <br><br>
            *Pastikan maklumat anda betul sebelum membuat pendaftaran.
          </form>
        </td>
        <td>
          <img src="lencana.png" style="display: inline-table; width: 300px; height: 300px; mix-blend-mode: multiply;">
        </td>
      </tr>
    </table>
    </main>
    <?php include 'footer.php'; ?>
  </body>
</html>