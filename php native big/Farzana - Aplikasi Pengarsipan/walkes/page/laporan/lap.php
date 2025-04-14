<?php  
// panggil file database.php untuk koneksi ke database
require_once "config/koneksi.php";
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Siswa </h3> 
                        </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr class="bg-aqua text-blak">
                    <th>NIS</th>
                    <th>Nama Siswa </th>
                    <th>jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tahun Ajaran</th>
                    <th>No HP</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $query=mysqli_query($db, "SELECT * FROM siswa WHERE nis")
                    or die('Ada kesalahan pada query kelas: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                        <td width="50"><?php echo $data['nis']; ?></td>
                                        <td width="50"><?php echo $data['nama']; ?></td>
                                        <td width="50"><?php echo $data['jenis_kelamin']; ?></td>
                                        <td width="50"><?php echo $data['agama']; ?></td>
                                        <td width="50"><?php echo $data['tempatlahir']; ?></td>
                                        <td width="50"><?php echo $data['tanggallahir']; ?></td>
                                        <td width="50"><?php echo $data['alamat']; ?></td>
                                        <td width="50"><?php echo $data['tahun_ajaran']; ?></td>
                                        <td width="50"><?php echo $data['nohp']; ?></td>
                </tr>
            <?php } ?>

           </tbody>
          </table>
                <div class="text-right">
                  <a href="./laporan/laporan.php" class="btn btn-sm btn-info">Cetak  <i class="fa fa-print"></i></a>
                </div>
        </div>
          </div>
</div>

    </div>

</div>



