 <div class="panel panel-default">
<div class="panel-heading"> 
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-info" role="alert">
                <i class="fa fa-edit"></i> Input Data Detail
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah data siswa -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                        
                        <div class="row">
                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Anggota Detail Laporan</dlabel>
                                    <input type="text" class="form-control" name="id_detail_laporan" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Anggota</label>
                                    <input type="text" class="form-control" name="id_anggota" autocomplete="off" required>
                                </div>

     
                                <div class="form-group col-md-9">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Laporan</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_laporan" autocomplete="off" required>
                                    </div>
                                </div>                                                                

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Terlapor</label>
                                    <input type="text" class="form-control" name="id_terlapor" autocomplete="">                  
                                </div> 

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tindak Pidana</label>
                                    <input type="text" class="form-control" name="tindak_pidana" autocomplete="">
                                </div>
                            </div>

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Pasal</label>
                                    <input type="text" class="form-control" name="pasal" autocomplete="">
                                </div>
                            </div> 

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Tersangka</label>
                                    <input type="text" class="form-control" name="nama_tersangka" autocomplete="">
                                </div>
                            </div>  

                            <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Penyidik</label>
                                    <input type="text" class="form-control" name="nama_penyidik" autocomplete="">
                                </div>
                            </div>                                                                          
                                                                                                            
                                                                                                             
                                                                                                              
                                                                
                        <div class="my-md-4 pt-md-1 border-top"> </div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=detail" class="btn btn-secondary btn-reset"> Batal </a>
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
    $id_detail_laporan          = $_POST['id_detail_laporan'];
    $id_anggota                 = $_POST['id_anggota'];
    $id_laporan                 = $_POST['id_laporan'];
    $id_terlapor                = $_POST['id_terlapor'];
    $tindak_pidana              = $_POST['tindak_pidana']; 
    $pasal                      = $_POST['pasal'];  
    $nama_tersangka             = $_POST['nama_tersangka'];
    $nama_penyidik              = $_POST['nama_penyidik'];  


            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data siswa
            $insert = mysqli_query($db, "INSERT INTO `detail`(`id_detail_laporan`, `id_anggota`, `id_laporan`, `id_terlapor`, `tindak_pidana`, `pasal`, `nama_tersangka`, `nama_penyidik`)
                                        VALUES('$id_detail_laporan','$id_anggota','$id_laporan','$id_terlapor','$tindak_pidana','$pasal', '$nama_tersangka', '$nama_penyidik' )")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=detail";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=detail";
                    </script>
                <?php
            }   
    }

// tutup koneksi
mysqli_close($db);   
?>