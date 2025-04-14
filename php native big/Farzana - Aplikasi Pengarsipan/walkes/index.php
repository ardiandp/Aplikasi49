<?php
session_start();
require_once "../config/koneksi.php";

if ($_SESSION['kasat']) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>SATRESKRIM POLRESTA</title>

    <!-- Favicons -->
    <link href="../assets/img/fotooo.jpg" rel="icon">
    <link href="../assets/img/fotooo.jpg" rel="apple-touch-icon">


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
    <script src="assets/ckeditor/ckeditor.js"></script>

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  </head>

  <body>
    <section id="container">
      <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><b>SATRESKRIM<span>POLRESTA</span></b></a>
        <!--logo end-->

        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <div style="color: white;padding: 9px 5px 3px 5px;float: right;font-size: 15px;"> &nbsp; <li><?php echo date('l, d-m-Y'); ?> &nbsp;<a class="logout btn btn-info" href="../index.php">Logout</a>
          </ul>
        </div>
      </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="foto/foto.jpg" class="img-circle" width="80"></a></p>


            <?php
            if (@$_SESSION['kasat']) {
              $userlogin = @$_SESSION['kasat'];
            }
            $query = mysqli_query($db, "SELECT * FROM admin WHERE id='$userlogin'") or die(mysqli_error($db));
            $cek   = mysqli_fetch_array($query);
            ?>

            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-edit"></i>
                <span>LAPORAN</span>
              </a>
              <ul class="sub">
                <li><a href="?page=laporan"><i class="fa fa-book"></i>Laporan Penanganan</a></li>
                <li><a href="?page=laporandetail"><i class="fa fa-book"></i>Laporan Detail</a></li>
                <li><a href="?page=laporantahunan"><i class="fa fa-book"></i>Laporan Tahunan</a></li>
                <li><a href="?page=surat"><i class="fa fa-book"></i>Surat</a></li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

              <?php
              $page = isset($_GET['page']) ? $_GET['page'] : "";
              $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";

              if (empty($_GET["page"])) {
                include "page/beranda/beranda.php";
              } elseif ($page == "beranda") {
                if ($aksi == "") {
                  include "page/beranda/beranda.php";
                }
              } elseif ($page == "laporan") {
                if ($aksi == "") {
                  include "page/laporan/laporanpenanganan.php";
                }
              } elseif ($page == "laporandetail") {
                if ($aksi == "") {
                  include "page/laporandetail/lapdetail.php";
                }
              } elseif ($page == "laporantahunan") {
                if ($aksi == "") {
                  include "page/laporantahunan/laptahunan.php";
                }
              } elseif ($page == "surat") {
                if ($aksi == "") {
                  include "page/surat/surat-perintah.php";
                }
              } elseif ($page == "ekstra") {
                if ($aksi == "") {
                  include "page/ekstra/ekstra.php";
                } elseif ($aksi == "tambah") {
                  include "page/ekstra/tambah.php";
                } elseif ($aksi == "ubah") {
                  include "page/ekstra/ubah.php";
                } elseif ($aksi == "hapus") {
                  include "page/ekstra/hapus.php";
                }
              } elseif ($page == "hadir") {
                if ($aksi == "") {
                  include "page/hadir/hadir.php";
                } elseif ($aksi == "tambah") {
                  include "page/hadir/tambah.php";
                } elseif ($aksi == "ubah") {
                  include "page/hadir/ubah.php";
                } elseif ($aksi == "hapus") {
                  include "page/hadir/hapus.php";
                }
              } elseif ($page == "kondisi") {
                if ($aksi == "") {
                  include "page/kondisi/kondisi.php";
                } elseif ($aksi == "tambah") {
                  include "page/kondisi/tambah.php";
                } elseif ($aksi == "ubah") {
                  include "page/kondisi/ubah.php";
                } elseif ($aksi == "hapus") {
                  include "page/kondisi/hapus.php";
                }
              } elseif ($page == "prestasi") {
                if ($aksi == "") {
                  include "page/prestasi/prestasi.php";
                } elseif ($aksi == "tambah") {
                  include "page/prestasi/tambah.php";
                } elseif ($aksi == "ubah") {
                  include "page/prestasi/ubah.php";
                } elseif ($aksi == "hapus") {
                  include "page/prestasi/hapus.php";
                }
              }
              ?>

            </div>
          </div>
        </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
        <div class="text-center">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <p>
              2022 &copy; <strong><a href="">SATRESKRIM POLRESTA</a></strong>.
            </p>
            <div class="credits">
              <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
              <a href=""></a>
            </div>
            <a href="index.php" class="go-top">
              <i class="fa fa-angle-up"></i>
            </a>
          </div>
        </div>
      </footer>
    <?php
  } else {
    echo "<script>window.alert('Maaf Anda Harus Login Dulu !!!')
    window.location='../index.php'</script>";
  }
    ?>

    <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>

    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="lib/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="lib/gritter-conf.js"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script>
      CKEDITOR.replace('textarea-1');
      CKEDITOR.replace('textarea-2');
    </script>
    <script type="text/javascript">
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });
    </script>

    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>
    <script src="lib/zabuto_calendar.js"></script>

    <script type="application/javascript">
      $(document).ready(function() {
        $("#date-popover").popover({
          html: true,
          trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
          $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
          action: function() {
            return myDateFunction(this.id, false);
          },
          action_nav: function() {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [{
              type: "text",
              label: "Special event",
              badge: "00"
            },
            {
              type: "block",
              label: "Regular event",
            }
          ]
        });
      });

      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }
    </script>
  </body>

  </html>