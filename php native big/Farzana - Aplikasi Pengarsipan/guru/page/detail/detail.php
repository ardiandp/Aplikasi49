<?php  
require_once "../config/koneksi.php";

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Detail Laporan </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=detail&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id detail Laporan</th>
                    <th>Id Anggota</th>
                    <th>Id Laporan</th>
                    <th>Id Terlapor</th>
                    <th>Tindak Pidana</th>
                    <th>Pasal</th>
                    <th>Nama Tersangka</th>
                    <th>Nama Penyidik</th>
                    <th>Tools</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM detail WHERE id_detail_laporan")
                    or die('Ada kesalahan pada query detail: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50" class="center"><?php echo $data['id_detail_laporan']; ?></td>
                                        <td width="80" class="center"><?php echo $data['id_anggota']; ?></td>
                                        <td width="50"><?php echo $data['id_laporan']; ?></td>
                                        <td width="50"><?php echo $data['id_terlapor']; ?></td>
                                        <td width="50"><?php echo $data['tindak_pidana']; ?></td>
                                        <td width="50"><?php echo $data['pasal']; ?></td>
                                        <td width="50"><?php echo $data['nama_tersangka']; ?></td>
                                        <td width="50"><?php echo $data['nama_penyidik']; ?></td>

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=detail&aksi=ubah&id_detail_laporan=<?php echo $data['id_detail_laporan']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=detail&aksi=hapus&id_detail_laporan=<?php echo $data['id_detail_laporan']; ?>" onclick="return confirm('Anda yakin ingin menghapus detail <?php echo $data['nama_tersangka']; ?>?');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php
                $no++;
            } ?>
           </tbody>
          </table>
        </div>
          </div>
</div>

    </div>

</div>



