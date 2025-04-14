<?php
    require_once "../config/koneksi.php";
    $id_detail_laporan = $_GET['id_detail_laporan'];
    $query  = mysqli_query($db, "select * from detail where id_detail_laporan='$id_detail_laporan'");
    $data = mysqli_fetch_assoc($query);
?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="alert alert-success" role="alert">
                <i class="fa fa-edit"></i> Ubah Data Detail
            </div>
        </div>
            <div class="panel-body">
                <div class="">
                    <div class="col-md-6">
                    <!-- form ubah data siswa -->
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row">

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Detail Laporan</label>
                                    <input class="form-control" name="id_detail_laporan" value="<?php echo $data['id_detail_laporan'];?>" readonly>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Anggota</label>
                                    <input class="form-control" name="id_anggota" value="<?php echo $data['id_anggota'];?>" readonly>
                                </div>

                                
                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm52 control-label">Id Laporan</label>
                                    <input class="form-control" name="id_laporan" value="<?php echo $data['id_laporan'];?>">
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Id Terlapor</label>
                                    <input class="form-control" name="id_terlapor" value="<?php echo $data['id_terlapor'];?>">
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tindak Pidana</label>
                                    <input class="form-control" name="tindak_pidana" value="<?php echo $data['tindak_pidana'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Pasal</label>
                                    <input class="form-control" name="pasal" value="<?php echo $data['pasal'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Tersangka</label>
                                    <input class="form-control" name="nama_tersangka" value="<?php echo $data['nama_tersangka'];?>">
                                </div>

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Nama Penyidik</label>
                                    <input class="form-control" name="nama_penyidik" value="<?php echo $data['nama_penyidik'];?>">
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
        $id_detail_laporan    = $_POST['id_detail_laporan'];
        $id_anggota           = $_POST['id_anggota'];
        $id_laporan           = $_POST['id_laporan'];
        $id_terlapor          = $_POST['id_terlapor'];
        $tindak_pidana        = $_POST['tindak_pidana'];
        $pasal                = $_POST['pasal']; 
        $nama_tersangka       = $_POST['nama_tersangka']; 
        $nama_penyidik        = $_POST['nama_penyidik'];    

            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE detail SET id_anggota        = '$id_anggota',
                                                              id_laporan        = '$id_laporan',
                                                              id_terlapor        = '$id_terlapor', 
                                                                tindak_pidana      = '$tindak_pidana',
                                                                pasal               = '$pasal',
                                                                nama_tersangka       = '$nama_tersangka',
                                                                  nama_penyidik      = '$nama_penyidik'
                                                        WHERE id_detail_laporan       = '$id_detail_laporan'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=detail";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

