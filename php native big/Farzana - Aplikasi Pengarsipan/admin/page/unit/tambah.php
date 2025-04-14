<div class="panel panel-default">
<div class="panel-heading"> 
    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-info" role="alert">
                <i class="fa fa-edit"></i> Input Data unit
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah data unit-->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                        
                        <div class="row">
                                <div class="form-group col-md-7">
                                    <label>id unit</label>
                                    <input type="text" class="form-control" name="id_unit" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Unit</label>
                                    <input type="text" class="form-control" name="nama_unit" autocomplete="off" required>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Jumlah Anggota</label>
                                    <input type="text" class="form-control" name="jumlah_anggota" autocomplete="off" required>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Kasubnit</label>
                                    <input type="text" class="form-control" name="kasubnit" autocomplete="off" required>
                                </div>

                            
                        <div class="my-md-4 pt-md-1 border-top"> </div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=unit" class="btn btn-secondary btn-reset"> Batal </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
// panggil file koneksi.php untuk koneksi ke database
require_once "config/koneksi.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $id_unit           = $_POST['id_unit'];
    $nama_unit         = $_POST['nama_unit'];
    $jumlah_anggota = $_POST['jumlah_anggota'];
    $kasubnit = $_POST['kasubnit'];
    //Set path folder tempat menyimpan filenya
   

 

            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data Kelas
            $insert = mysqli_query($db, "INSERT INTO `unit`(`id_unit`, `nama_unit`, `jumlah_anggota`, `kasubnit` )
                                        VALUES('$id_unit','$nama_unit','$jumlah_anggota', '$kasubnit' )")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=unit";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=unit";
                    </script>
                <?php
            }   
        
    }

// tutup koneksi
mysqli_close($db);   
?>