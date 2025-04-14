<?php  
require_once "../config/koneksi.php";

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Laporan </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=terlapor&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Terlapor</th>
                    <th>Nama Terlapor</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat</th>
                    <th>Tanggal Lahir</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th>Tools</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM terlapor WHERE id_terlapor")
                    or die('Ada kesalahan pada query terlapor: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50" class="center"><?php echo $data['id_terlapor']; ?></td>
                                        <td width="80" class="center"><?php echo $data['nama_terlapor']; ?></td>
                                        <td width="50"><?php echo $data['jenis_kelamin']; ?></td>
                                        <td width="50"><?php echo $data['tempat']; ?></td>
                                        <td width="50"><?php echo $data['tanggal_lahir']; ?></td>
                                        <td width="50"><?php echo $data['usia']; ?></td>
                                        <td width="50"><?php echo $data['alamat']; ?></td>
                                        <td width="50"><?php echo $data['pekerjaan']; ?></td>
                                        <td width="50"><?php echo $data['agama']; ?></td>
                                

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=terlapor&aksi=ubah&id_terlapor=<?php echo $data['id_terlapor']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=terlapor&aksi=hapus&id_terlapor=<?php echo $data['id_terlapor']; ?>" onclick="return confirm('Anda yakin ingin menghapus terlapor <?php echo $data['nama_terlapor']; ?>?');"><i class="fa fa-trash"></i></a>
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



