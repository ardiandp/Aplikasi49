<?php
  include"config/koneksi.php";
 ?>

 <!doctype html>
 <html>
 <head>
 <title> </title>
 <script type="text/javascript" src="../chartjs/chat.js"></script>
 <head>
 <body>
 	<div class="box-header">

                          <?php
                  if(@$_SESSION['admin']) {
                    $userlogin=@$_SESSION['admin'];

                   }
                 $query =mysqli_query($db, "SELECT * FROM admin WHERE id='$userlogin'") or die(mysqli_error($db));
                $cek   =mysqli_fetch_array($query);
                ?>

 	<h1><marquee behavior="alternate"> "Selamat Datang <?php echo $cek['nama_lengkap'];?>" </h1></marquee>
 	<center><img src="foto/bab.jpg" width="1000" height="490">
 	</div>
 </body>
 </html> 