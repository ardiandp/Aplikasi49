<?php  
// panggil file database.php untuk koneksi ke database
require_once "../config/koneksi.php";
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Laporan</h3> 
                        </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <thead>
                <tr class="bg-aqua text-blak">
                    <th>Id Detail Laporan</th>
                    <th>Id Anggota </th>
                    <th>Id Laporan</th>
                    <th>Id Terlapor</th>
                    <th>Tindak Pidana</th>
                    <th>Pasal</th>
                    <th>Nama Tersangka</th>
                    <th>Nama Penyidik</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $query=mysqli_query($db, "SELECT * FROM detail WHERE id_laporan")
                    or die('Ada kesalahan pada query detail: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                        <td width="50"><?php echo $data['id_detail_laporan']; ?></td>
                                        <td width="50"><?php echo $data['id_anggota']; ?></td>
                                        <td width="50"><?php echo $data['id_laporan']; ?></td>
                                        <td width="50"><?php echo $data['id_terlapor']; ?></td>
                                        <td width="50"><?php echo $data['tindak_pidana']; ?></td>
                                        <td width="50"><?php echo $data['pasal']; ?></td>
                                        <td width="50"><?php echo $data['nama_tersangka']; ?></td>
                                        <td width="50"><?php echo $data['nama_penyidik']; ?></td>
                </tr>
            <?php } ?>

           </tbody>
          </table>
                <div class="text-right">
                  <a href="./laporan/laporandetail.php" class="btn btn-sm btn-info">Cetak <i class="fa fa-print"></i></a>
                </div>
        </div>
          </div>
</div>

    </div>

</div>
