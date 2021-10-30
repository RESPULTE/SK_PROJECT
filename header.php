<style type="text/css">
.popheader11{
  border-style: solid;
  border-color: brown;
  background-color: lightyellow;
  color: darkorange;
  z-index: 10;
  text-align: center;
  position: absolute;
  left: 50%;
  transform: translate(-50%, 0%);
  top: 100px;
  width: 50%;
}

</style>

<?php include 'sambung.php'; ?>
  <html>
    <head>
      <title><?php echo $nama_sistem;?></title>
    </head>

    <body>
    <!-- parent div -->
      <div style="position: relative;">
        <!-- image -->
        <center>
           <img src="school.jpg" width="80%" height="400"  style="border: 8px solid darkred; border-radius: 5px; z-index: -10; "> 
        </center>
        <!-- child div -->
         <div class="popheader11">
          <FONT SIZE="+3" COLOR="orange" font face="Arial"><?php echo $nama_sistem; ?></FONT>
            <br>
          <FONT SIZE="+1" COLOR="blue" font face="Arial"><?php echo $motto1;?></FONT>
        </div>   
      </div>

    </body>
  <?php include 'utility.php'; ?>
  </html>