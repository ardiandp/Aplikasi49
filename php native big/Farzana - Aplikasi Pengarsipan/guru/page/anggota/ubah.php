<?php
    require_once "../config/koneksi.php";
    $id_anggota = $_GET['id_anggota'];
    $query  = mysqli_query($db, "select * from anggota where id_anggota='$id_anggota'");
    $data = mysqli_fetch_assoc($query);
?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="alert alert-success" role="alert">
                <i class="fa fa-edit"></i> Ubah Data Anggota
            </div>
        </div>
            <div class="panel-body">
                <div class="">
                    <div class="col-md-6">
                    <!-- form ubah data siswa -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row">

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Anggota</label>
                                    <input class="form-control" name="id_anggota" value="<?php echo $data['id_anggota'];?>" readonly>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Anggota</label>
                                    <input class="form-control" name="nama_anggota" value="<?php echo $data['nama_anggota'];?>" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-5 col-sm-5 control-label">Jenis Kelamin</label>
                                <?php
                                if ($jenis_kelamin='Laki-laki') { ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="L" checked required>
                                        <label class="custom-control-label" for="customControlValidation2">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-7">
                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="P" required>
                                        <label class="custom-control-label" for="customControlValidation3">Perempuan</label>
                                    </div>
                                 <?php
                                } else { ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="L" required>
                                        <label class="custom-control-label" for="customControlValidation2">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="P" checked required>
                                        <label class="custom-control-label" for="customControlValidation3">Perempuan</label>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>  
                            

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm52 control-label">Alamat</label>
                                    <input class="form-control" name="alamat" value="<?php echo $data['alamat'];?>">
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">No Hp</label>
                                    <input class="form-control" name="nohp" value="<?php echo $data['nohp'];?>">
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Jabatan</label>
                                    <input class="form-control" name="jabatan" value="<?php echo $data['jabatan'];?>">
                                </div>

                        <div class="my-md-4 pt-md-1 border-top"> </div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=anggota" class="btn btn-secondary btn-reset"> Batal </a>
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
        $id_anggota             = $_POST['id_anggota'];
        $nama_anggota           = $_POST['nama_anggota'];
        $jenis_kelamin           = $_POST['jenis_kelamin'];
        $alamat                 = $_POST['alamat'];
        $nohp                = $_POST['nohp'];
        $jabatan        = $_POST['jabatan'];    

            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE anggota SET nama_anggota        = '$nama_anggota',
                                                              jenis_kelamin = '$jenis_kelamin',
                                                              alamat        = '$alamat', 
                                                              nohp          = '$nohp',
                                                              jabatan       = '$jabatan'
                                                        WHERE id_anggota            = '$id_anggota'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=anggota";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

