<style>
p{
  margin-bottom: -20px;
}
.btnp {
  border: 4px solid black;
  border-radius: 10px;
  margin: 3px;
  color: black;
  transition: all 0.3s;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
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

</style>

<?php
if ($_SESSION['level']=="ADMIN") {
?>
  <!-- ADMIN -->
  <center>
    <p>
      <a href="index2.php">
        <button class="btnp info">Home</button></a>
      <a href="subjek_senarai.php"><button class="btnp info">Senarai Subjek</button></a>
      <a href="guru_senarai.php"><button class="btnp info">Senarai Guru</button></a>
      <a href="pelajar_senarai.php"><button class="btnp info">Senarai Pelajar</button></a>
      <a href="Laporan_statistik.php"><button class="btnp info">Statistik</button></a>
      <a href="Logout.php"><button class="btnp info">Log Keluar</button></a>
    </p></br>
<?php $pengguna="DASHBOARD ADMIN"; ?>
<?php
} elseif ($_SESSION['level']=="GURU") {
?>

<!-- GURU -->
    <center>
      <p>
        <a href="index2.php"><button class="btnp info"> Home</button></a>
        <a href="pilih_subjek.php"><button class="btnp info">Kuiz</button></a>
        <a href="prestasi_topik.php"><button class="btnp info">Prestasi</button></a>
        <a href="import_daftar.php"><button class="btnp info">Import</button></a>
        <a href="logout.php"><button class="btnp info">Log Keluar</button></a>
      </p></br>
    </center>
<?php $pengguna="DASHBOARD GURU"; ?>
<?php
}else{
?>
<!-- PELAJAR -->
    <center></br>
      <a href="index2.php"><button class="btnp info">Home</button></a>
      <a href="kuiz_subjek.php"><button class="btnp info">Mula Kuiz</button></a>
      <a href="skor_individu.php"><button class="btnp info">Prestasi</button></a>
      <a href="logout.php"><button class="btnp info">Keluar</button></a>
    </p>
<?php $pengguna="DASHBOARD PELAJAR"; ?>
  </center>
<?php
}
?>