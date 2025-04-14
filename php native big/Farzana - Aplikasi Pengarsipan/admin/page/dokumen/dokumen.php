<?php  
require_once "config/koneksi.php";

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Dokumen </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=dokumen&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>


                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr class="bg-aqua text-blak">
                    <th>NO</th>
                    <th>Id Dokumen</th>
                    <th>Id Unit</th>
                    <th>Nama Dokumen</th>
                     <th>Tahun Dokumen</th>
                    <th>Tools</th>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM dokumen  WHERE id_dokumen")
                    or die('Ada kesalahan pada query dokumen: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50"><?php echo $data['id_dokumen']; ?></td>
                                         <td width="50"><?php echo $data['id_unit']; ?></td>
                                        <td width="50"><?php echo $data['nama_dokumen']; ?></td>
                                        <td width="50"><?php echo $data['tahun_dokumen']; ?></td>
                                        

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=dokumen&aksi=ubah&id_dokumen=<?php echo $data['id_dokumen']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=dokumen&aksi=hapus&id_dokumen=<?php echo $data['id_dokumen']; ?>" onclick="return confirm('Anda yakin ingin menghapus dokumen <?php echo $data['nama_dokumen']; ?>?');"><i class="fa fa-trash"></i></a>
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

<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

