<?php
	require_once "config/koneksi.php";
	$id_laporan	= $_GET['id_laporan'];
	$query	= mysqli_query($db, "select * from laporan where id_laporan='$id_laporan'");
	$data = mysqli_fetch_assoc($query);
?>

	<div class="panel panel-success">
		<div class="panel-heading">
			<div class="alert alert-success" role="alert">
                <i class="fa fa-edit"></i> Ubah Data Laporan
            </div>
		</div>
			<div class="panel-body">
                <div class="">
                    <div class="col-md-7">
			  		<!-- form ubah data siswa -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
							<div class="row">

					      		<div class="form-group col-md-7">
									<label class="col-sm-5 col-sm-5 control-label">Id Laporan</label>
									<input class="form-control" name="id_laporan" value="<?php echo $data['id_laporan'];?>" readonly>
								</div>

								<div class="form-group col-md-7">
									<label class="col-sm-2 col-sm-2 control-label">Id Unit</label>
									<input class="form-control" name="id_unit"value="<?php echo $data['id_unit'];?>" readonly>
								</div>

								<div class="form-group col-md-7">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Kasus</label>
                                    <input class="form-control" name="jumlah_kasus" value="<?php echo $data['jumlah_kasus'];?>">
                                </div>

								<div class="form-group col-md-7">
                                    <label class="col-sm-2 col-sm-2 control-label">Yang Diselesaikan</label>
                                    <input class="form-control" name="yang_diselesaikan" value="<?php echo $data['yang_diselesaikan'];?>">
                                </div>
                             </div>  

                              <div class="form-group col-md-7">
                                    <label class="col-sm-2 col-sm-2 control-label">Putusan Sidang</label>
                                    <input class="form-control" name="putusan_sidang" value="<?php echo $data['putusan_sidang'];?>">
                                </div> 

                             <div class="form-group col-md-7">
                                    <label class="col-sm-2 col-sm-2 control-label">Tahun Laporan</label>
                                    <input class="form-control" name="tahun_laporan" value="<?php echo $data['tahun_laporan'];?>">
                                </div> 

						<div class="form-group col-md-12 right">
			                <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=tab" class="btn btn-secondary btn-reset"> Batal </a>
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
        $id_laporan   = $_POST['id_laporan'];
        $id_unit        = $_POST['id_unit'];
        $jumlah_kasus       = $_POST['jumlah_kasus'];
        $yang_diselesaikan      = $_POST['yang_diselesaikan'];
        $putusan_sidang       = $_POST['putusan_sidang'];
        $tahun_laporan       = $_POST['tahun_laporan'];
		
            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE laporan SET    id_unit          = '$id_unit',
															  jumlah_kasus      = '$jumlah_kasus', 
															  yang_diselesaikan = '$yang_diselesaikan',
                                                              putusan_sidang    = '$putusan_sidang',
                                                              tahun_laporan     = '$tahun_laporan'
                                                        WHERE id_laporan        = '$id_laporan'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=tab";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

