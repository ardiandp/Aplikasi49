<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <!-- Favicons -->
  <link href="assets/img/fotooo.jpg"  rel="icon">
  <link href="assets/img/fotooo.jpg" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
<head>
  
    <title>SATRESKRIM POLRESTA</title>
</head>
<body class="bg-gradient-success">
<?php include "config/koneksi.php";?>
   <!-- PAGE CONTENT -->
    <div class="container">
    <div class="text-center">
        <h1>SATRESKRIM POLRESTA</h1>
    </div>
    <div class="tab-content">
            <form action="save.php" class="form-signin" method="post">
              <div class="form-group">
                <p class="text-muted text-center btn-block btn btn-warning btn-rect">Masukkan Data Anda </p>
              </div>
              <div class="form-group">
                 <input type="text" placeholder="NIP" name="nip" id="nip" class="form-control" />
               </div>
               <div class="form-group">
                 <input type="text" placeholder="NIS" name="nis" id="nama_lengkap" class="form-control" />
               </div> 
                  </select>
                 </div>
               <div class="form-group">
                 <input type="text" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" class="form-control" />
               </div>
               <div class="form-group">
                <input type="text" placeholder="Username" name="username" id="username" class="form-control" />
              </div>
              <div class="form-group">
                <input type="password" placeholder="Password" name="password" id="password" class="form-control" />
              </div>
               <div class="form-group">
                      <select class="form-control" name="hak_akses" id="hak_akses">
                        <option hidden="Masuk Sebagai">Masuk Sebagai</option>
                        <option>admin</option>
                        <option>anggota</option>
                        <option>kasat</option>
                      </select>
                    </div>
                    <div class="form-group">
                 <input type="text" placeholder="Mengampu pelajaran" name="kdmapel" id="kdmapel" class="form-control" />
               </div>
                <button class="btn text-muted text-center btn-danger" type="submit" name="daftar" id="daftar">Daftar</button>
          </form>
        </div>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><button class="btn btn-info">Sudah Punya Akun ?? <a href="index.php">Silahkan Masuk</a></button></li> 
        </ul>
    </div>


</div>

 <!--END PAGE CONTENT -->     
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 100
    });
  </script>
</body>

</html>