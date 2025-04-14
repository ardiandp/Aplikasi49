<?php  
require_once "../config/koneksi.php";

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Anggota </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=anggota&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Nomor Handphone</th>
                    <th>Jabatan</th>
                    <th>Tools</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota")
                    or die('Ada kesalahan pada query anggota: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50" class="center"><?php echo $data['id_anggota']; ?></td>
                                        <td width="80" class="center"><?php echo $data['nama_anggota']; ?></td>
                                        <td width="50"><?php echo $data['jenis_kelamin']; ?></td>
                                        <td width="50"><?php echo $data['alamat']; ?></td>
                                        <td width="50"><?php echo $data['nohp']; ?></td>
                                        <td width="50"><?php echo $data['jabatan']; ?></td>

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=anggota&aksi=ubah&id_anggota=<?php echo $data['id_anggota']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=anggota&aksi=hapus&id_anggota=<?php echo $data['id_anggota']; ?>" onclick="return confirm('Anda yakin ingin menghapus anggota <?php echo $data['nama_anggota']; ?>?');"><i class="fa fa-trash"></i></a>
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



