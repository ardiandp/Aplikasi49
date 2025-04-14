<?php  
// panggil file database.php untuk koneksi ke database
require_once "config/koneksi.php";
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data unit </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=unit&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr class="bg-aqua text-blak">
                    <th>NO</th>
                    <th>Id unit</th>
                    <th>Nama unit</th>
                    <th>Jumlah Anggota</th>
                    <th>Kasubnit</th>
                    <th>Tools</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM unit WHERE id_unit")
                    or die('Ada kesalahan pada query unit: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50"><?php echo $data['id_unit']; ?></td>
                                        <td width="50"><?php echo $data['nama_unit']; ?></td>
                                        <td width="150"><?php echo $data['jumlah_anggota']; ?></td>
                                        <td width="150"><?php echo $data['kasubnit']; ?></td>

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=unit&aksi=ubah&id_unit=<?php echo $data['id_unit']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=unit&aksi=hapus&id_unit=<?php echo $data['id_unit']; ?>" onclick="return confirm('Anda yakin ingin menghapus unit <?php echo $data['nama_unit']; ?>?');"><i class="fa fa-trash"></i></a>
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



