<div class="panel panel-default">
<div class="panel-heading"> 
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-info" role="alert">
                <i class="fa fa-edit"></i> Input Data Matapelajaran
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah data matapelajaran -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                        
                        <div class="row">
                                <div class="form-group col-md-7">
                                    <label>Kdmapel</label>
                                    <input type="text" class="form-control" name="kdmapel" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                </div>

                                    
                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Namampel</label>
                                    <select class="form-control" name="namamapel" autocomplete="off" required>
                                        <option value=""></option>
                                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                                        <option value="Matematika">Matematika</option>
                                        <option value="Ilmu Pengetahuan Alama">Ilmu Pengetahuan Alam</option>
                                        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                                        <option value="Penjaskes">Penjaskes</option>
                                        <option value="Seni Budaya">Seni Budaya</option>
                                        <option value="Ipa Fisika">Ipa Fisika</option>
                                        <option value="Keterampilan">Keterampilan</option>
                                        <option value="Agama Khatolik">Agama Khatolik</option>
                                        <option value="Agama Kristen Protestan">Agama Kristen Protestan</option>
                                        <option value="Agama Islam">Agama Islam</option>
                                    </select>
                                </div>                                                                               
                                                                  
                        <div class="my-md-4 pt-md-1 border-top"> </div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=Matapelajaran" class="btn btn-secondary btn-reset"> Batal </a>
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
    $kdmapel           = $_POST['kdmapel'];
    $namamapel         = $_POST['namamapel'];

            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data Kelas
            $insert = mysqli_query($db, "INSERT INTO `matapelajaran`(`kdmapel`, `namamapel`)
                                        VALUES('$kdmapel','$namamapel')")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=Matapelajaran";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=Matapelajaran";
                    </script>
                <?php
            }   
    }

// tutup koneksi
mysqli_close($db);   
?>