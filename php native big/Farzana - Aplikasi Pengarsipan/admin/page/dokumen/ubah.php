<?php
	require_once "config/koneksi.php";
	$id_dokumen	= $_GET['id_dokumen'];
	$query	= mysqli_query($db, "select * from dokumen where id_dokumen='$id_dokumen'");
	$data = mysqli_fetch_assoc($query);
?>

	<div class="panel panel-success">
		<div class="panel-heading">
			Ubah Data Dokumen
		</div>
			<div class="panel-body">
                <div class="">
                    <div class="col-md-6">
			  		<!-- form ubah data guru -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
							<div class="row">

					      		<div class="form-group col-md-7">
									<label>Id Dokumen</label>
									<input class="form-control" name="id_dokumen" value="<?php echo $data['id_dokumen'];?>" readonly>
								</div>

								<div class="form-group col-md-7">
									<label>Id Unit</label>
									<input class="form-control" name="id_unit" value="<?php echo $data['id_unit'];?>">
								</div>

								<div class="form-group col-md-7">
									<label>Nama Dokumen</label>
									<input class="form-control" name="nama_dokumen" value="<?php echo $data['nama_dokumen'];?>">
								</div>

									<div class="form-group col-md-13">
                                    <label class="col-sm-7 col-sm-7 control-label">Tahun _dokumen</label>
                                    <div class="col-sm-12">
                                    <input class="form-control" name="tahun_dokumen" value="<?php echo $data['tahun_dokumen'];?>">
                                </div>
                                </div>

						<div class="form-group col-md-12 right">
			                <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=dokumen" class="btn btn-secondary btn-reset"> Batal </a>
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
        $id_dokumen          = $_POST['id_dokumen'];
         $id_unit          = $_POST['id_unit'];
        $nama_dokumen         	= $_POST['nama_dokumen'];
        $tahun_dokumen          = $_POST['tahun_dokumen'];

      
 // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE dokumen SET id_unit        = '$id_unit',
            												nama_dokumen        = '$nama_dokumen',
                                                            tahun_dokumen       = '$tahun_dokumen'
                                                        WHERE id_dokumen         = '$id_dokumen'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=dokumen";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

