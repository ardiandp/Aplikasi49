<?php
	require_once "config/koneksi.php";
	$id_unit	= $_GET['id_unit'];
	$query	= mysqli_query($db, "select * from unit where id_unit='$id_unit'");
	$data = mysqli_fetch_assoc($query);
?>

	<div class="panel panel-success">
		<div class="panel-heading">
			Ubah Data Unit
		</div>
			<div class="panel-body">
                <div class="">
                    <div class="col-md-6">
			  		<!-- form ubah data siswa -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
							<div class="row">

					      		<div class="form-group col-md-12">
									<label class="col-sm-2 col-sm-2 control-label">Id Unit</label>
									<div class="col-sm-3">
									<input class="form-control" name="id_unit" value="<?php echo $data['id_unit'];?>">
								</div>
								</div>
								

								<div class="form-group col-md-12">
									<label class="col-sm-2 col-sm-2 control-label">Nama Unit</label>
									<div class="col-sm-3">
									<input class="form-control" name="nama_unit"value="<?php echo $data['nama_unit'];?>">
								</div>
								</div>


								<div class="form-group col-md-12">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Anggota</label>
                                    <div class="col-sm-4">
                                    <input class="form-control" name="jumlah_anggota" value="<?php echo $data['jumlah_anggota'];?>">
                                </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 col-sm-2 control-label">Kasubnit</label>
                                    <div class="col-sm-4">
                                    <input class="form-control" name="kasubnit" value="<?php echo $data['kasubnit'];?>">
                                </div>
                                </div>
									

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
        $id_unit          	= $_POST['id_unit'];
        $nama_unit  = $_POST['nama_unit'];
        $jumlah_anggota   = $_POST['jumlah_anggota'];
        $kasubnit   = $_POST['kasubnit'];
		
            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE unit SET      nama_unit       	= '$nama_unit', 
															  jumlah_anggota    = '$jumlah_anggota',
															  kasubnit      	= '$kasubnit'
                                                              id_unit           = '$id_unit'
                                                              WHERE id_unit     = '$id_unit'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=unit";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

