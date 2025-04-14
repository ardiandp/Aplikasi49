<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/koneksi.php";
?>

<div class="row">
  <div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user"></i> Data Laporan Tahunan</h3>
      </div>


      <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr class="bg-aqua text-blak">
              <th>Tahun Laporan</th>
              <th>Jumlah Kasus </th>
              <th>Yang Diselesaikan</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $query = mysqli_query($db, "SELECT * FROM laporan WHERE tahun_laporan")
              or die('Ada kesalahan pada query detail: ' . mysqli_error($db));
            while ($data = mysqli_fetch_assoc($query)) { ?>
              <tr>
                <td width="50"><?php echo $data['tahun_laporan']; ?></td>
                <td width="50"><?php echo $data['jumlah_kasus']; ?></td>
                <td width="50"><?php echo $data['yang_diselesaikan']; ?></td>

              </tr>
            <?php } ?>

          </tbody>
        </table>
        <div class="text-right">
          <a href="./laporan/laporantahunan.php" class="btn btn-sm btn-info">Cetak <i class="fa fa-print"></i></a>
        </div>
      </div>
    </div>
  </div>

</div>

</div>