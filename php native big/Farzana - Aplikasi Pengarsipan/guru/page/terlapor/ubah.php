<?php
    require_once "../config/koneksi.php";
    $id_terlapor = $_GET['id_terlapor'];
    $query  = mysqli_query($db, "select * from terlapor where id_terlapor='$id_terlapor'");
    $data = mysqli_fetch_assoc($query);
?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="alert alert-success" role="alert">
                <i class="fa fa-edit"></i> Ubah Data Terlapor
            </div>
        </div>
            <div class="panel-body">
                <div class="">
                    <div class="col-md-6">
                    <!-- form ubah data siswa -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row">

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Terlapor</label>
                                    <input class="form-control" name="id_terlapor" value="<?php echo $data['id_terlapor'];?>" readonly>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Terlapor</label>
                                    <input class="form-control" name="nama_terlapor" value="<?php echo $data['nama_terlapor'];?>" readonly>
                                </div>

                                
                               </div>

                                    <div class="form-group col-md-6">
                                    <label>Jenis Kelamin</label>
                                        <div class="radio">
                                            <label>
                                                <input class="uniform" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L"/> Laki-laki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input class="uniform" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P"/> Perempuan
                                            </label>
                                        </div>
                                </div>
                    

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tempat</label>
                                    <input class="form-control" name="tempat" value="<?php echo $data['tempat'];?>">
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tanggal Lahir</label>
                                    <input class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Usia</label>
                                    <input class="form-control" name="usia" value="<?php echo $data['usia'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Alamat</label>
                                    <input class="form-control" name="alamat" value="<?php echo $data['alamat'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Pekerjaan</label>
                                    <input class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Agama</label>
                                    <input class="form-control" name="agama" value="<?php echo $data['agama'];?>">
                                </div>

                        <div class="my-md-4 pt-md-1 border-top"> </div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=terlapor" class="btn btn-secondary btn-reset"> Batal </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
// panggil file koneksi.php untuk koneksi ke database
  require_once "../config/koneksi.php";

// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
 
        // ambil data hasil submit dari form
        $id_terlapor        = $_POST['id_terlapor'];
        $nama_terlapor      = $_POST['nama_terlapor'];
        $jenis_kelamin      = $_POST['jenis_kelamin'];
        $tempat             = $_POST['tempat'];
        $tanggal_lahir      = $_POST['tanggal_lahir'];
        $usia               = $_POST['usia']; 
        $alamat             = $_POST['alamat']; 
        $pekerjaan          = $_POST['pekerjaan'];
        $agama              = $_POST['agama'];  

            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE terlapor SET nama_terlapor        = '$nama_terlapor',
                                                              jenis_kelamin       = '$jenis_kelamin',
                                                              tempat              = '$tempat', 
                                                              tanggal_lahir       = '$tanggal_lahir',
                                                              usia                = '$usia',
                                                              alamat              = '$alamat',
                                                              pekerjaan           = '$pekerjaan',
                                                              agama               = '$agama'
                                                        WHERE id_terlapor         = '$id_terlapor'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=terlapor";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

