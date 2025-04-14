<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SATRESKRIM POLRES</title>

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
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body>
  <?php
session_start();
include"config/koneksi.php";
?>

   <!-- PAGE CONTENT --> 
     <div id="login-page">
      <div class="container">
      <form class="form-login" action="" method="post" name="login" id="login" onsubmit="return validationlogin(this);" onfocus="validationlogin();">
        <h2 class="form-login-heading">SATRESKRIM POLRES</h2>
        <br>
        <div class="card-header bg-transparent border-bottom-0 pb-0 text-center">
          <img src="assets/img/fotooo.jpg" width="140px" class="img-circle">
        </div>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <br>
          <button class="btn btn-theme btn-block" type="submit" value="Masuk" name="login2"><i class="fa fa-lock"></i> Masuk</button>
          <hr>
          <div class="text-center">
          <ul class="list-inline">
              <li><button class="btn btn-success">Belum Punya Akun ?? <a href="daftar.php">Klik disini</a></button></li> 
          </ul>
       </div>
        </div>
        
      </form>

    </div>

             <?php
          $username   =@$_POST['username'];
          $password   =@$_POST['password'];
          $login      =@$_POST['login2'];
          if ($login) {
            if ($username=="" || $password=="") {
              ?><script type="text/javascript">alert("Username dan Password Tidak Boleh Kosong !!!"); </script><?php
            }else{
              $query =mysqli_query($db, "SELECT * FROM `admin` WHERE username='$username' AND password='$password'") or die(mysqli_error($db));
              $data   =mysqli_fetch_array($query);
              $cek =mysqli_num_rows($query);

              if ($cek >= 1) {
                if ($data['hak_akses']== "admin") {
                  @$_SESSION['admin']=$data['id'];
                  header("location:admin/index.php");

                }else if ($data['hak_akses']== "anggota") {
                  @$_SESSION['anggota']=$data['id'];
                  header("location:guru/index.php");
                  
                }else if ($data['hak_akses']== "kasat") {
                    $_SESSION['kasat']=$data['id']; 
                  header("location:walkes/index.php");
                               
                }else if ($data['hak_akses']=="siswa"){
          $query             = "SELECT * FROM siswa WHERE nis='$username' and nis='$password'";
          $run               = mysqli_query($db, $query);
          if(mysqli_num_rows($run)==1){
          $_SESSION['siswa']=$username;
          header("location:siswa/bio/biosws.php?page=view&nis=$username");
          }
        }

            }else{
              echo"<script>window.alert('Maaf Anda Gagal Login!!!')
              window.location='index.php'</script>";
            }
          }
          }
          ?>
        </div>
          
        </div>
    </form>
    </div>
   <!-- <div class="text-center">
        <ul class="list-inline">
            <li><button class="btn btn-success">Belum Punya Akun ?? <a href="register.php">Klik disini</a></button></li> 
        </ul>
    </div>-->


</div>

      <!--END PAGE CONTENT -->     
          
      <!-- PAGE LEVEL SCRIPTS -->
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
