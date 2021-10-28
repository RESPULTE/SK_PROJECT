<style>
p{
  margin-bottom: -20px;
}
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
<center><p>
<a href="index2.php"><button class="btn info">Home</button></a>
<a href="subjek_senarai.php"><button class="btn info">Senarai Subjek</button></a>
<a href="guru_senarai.php"><button class="btn info">Senarai Guru</button></a>
<a href="pelajar_senarai.php"><button class="btn info">Senarai Pelajar</button></a>
<a href="Laporan_statistik.php"><button class="btn info">Statistik</button></a>
<a href="Logout.php"><button class="btn info">Log Keluar</button></a>
</p></br>
<?php $pengguna="DASHBOARD ADMIN"; ?>
<?php
} elseif ($_SESSION['level']=="GURU") {
?>

<!-- GURU -->
<center><p>
<a href="index2.php"><button class="btn info"> Home</button></a>
<a href="pilih_subjek.php"><button class="btn info">Kuiz</button></a>
<a href="prestasi_topik.php"><button class="btn info">Prestasi</button></a>
<a href="import_daftar.php"><button class="btn info">Import</button></a>
<a href="logout.php"><button class="btn info">Log Keluar</button></a>
</p></br>
<?php $pengguna="DASHBOARD GURU"; ?>
</center>
<?php
}else{
?>

<!-- PELAJAR -->
<center></br>
<a href="index2.php"><button class="btn info">Home</button></a>
<a href="kuiz_subjek.php"><button class="btn info">Mula Kuiz</button></a>
<a href="skor_individu.php"><button class="btn info">Prestasi</button></a>
<a href="logout.php"><button class="btn info">Keluar</button></a>
</p>
<?php $pengguna="DASHBOARD PELAJAR"; ?>
</center>
<?php
}
?>