 <div class="panel panel-default">
<div class="panel-heading"> 
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-info" role="alert">
                <i class="fa fa-edit"></i> Input Data Terlapor
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah data siswa -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                        
                        <div class="row">
                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Terlapor</dlabel>
                                    <input type="text" class="form-control" name="id_terlapor" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Terlapor</label>
                                    <input type="text" class="form-control" name="nama_terlapor" autocomplete="off" required>
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
                                    <input type="text" class="form-control" name="tempat" autocomplete="">                  
                                </div> 

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" autocomplete="">
                                </div>
                            </div>

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Usia</label>
                                    <input type="text" class="form-control" name="usia" autocomplete="">
                                </div>
                            </div> 

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" autocomplete="">
                                </div>
                            </div>  

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" autocomplete="">
                                </div>
                            </div>  

                             <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Agama</label>
                                    <input type="text" class="form-control" name="agama" autocomplete="">
                                </div>
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
    $id_terlapor          = $_POST['id_terlapor'];
    $nama_terlapor                 = $_POST['nama_terlapor'];
    $jenis_kelamin                 = $_POST['jenis_kelamin'];
    $tempat                = $_POST['tempat'];
    $tanggal_lahir              = $_POST['tanggal_lahir']; 
    $usia                      = $_POST['usia'];  
    $alamat             = $_POST['alamat'];
    $pekerjaan              = $_POST['pekerjaan'];  
      $agama              = $_POST['agama'];


            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data siswa
            $insert = mysqli_query($db, "INSERT INTO `terlapor`(`id_terlapor`, `nama_terlapor`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `usia`, `alamat`, `pekerjaan`, `agama` )
                                        VALUES('$id_terlapor','$nama_terlapor','$jenis_kelamin','$tempat','$tanggal_lahir','$usia', '$alamat', '$pekerjaan','$agama')")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=terlapor";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=terlapor";
                    </script>
                <?php
            }   
    }

// tutup koneksi
mysqli_close($db);   
?>