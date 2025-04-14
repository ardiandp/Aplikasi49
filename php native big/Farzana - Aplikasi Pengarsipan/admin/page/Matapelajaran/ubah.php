<?php
	require_once "config/koneksi.php";
	$kdmapel	= $_GET['kdmapel'];
	$query	= mysqli_query($db, "select * from matapelajaran where kdmapel='$kdmapel'");
	$data = mysqli_fetch_assoc($query);
?>

	<div class="panel panel-success">
		<div class="panel-heading">
			Ubah Data Matapelajaran
		</div>
			<div class="panel-body">
                <div class="">
                    <div class="col-md-7">
			  		<!-- form ubah data siswa -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
							<div class="row">

					      		<div class="form-group col-md-12">
									<label class="col-sm-2 col-sm-2 control-label">Kdamapel</label>
									<div class="col-sm-3">
									<input class="form-control" name="kdmapel" value="<?php echo $data['kdmapel'];?>" readonly>
								</div>
								</div>

								<div class="form-group col-md-5">
                                    <label class="col-sm-5 col-sm-5 control-label">Namampel</label>
                                    <div class="col-sm-7">
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
                            </div>
									

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
        $kdmapel          	= $_POST['kdmapel'];
        $namamapel  = $_POST['namamapel'];
		

            // perintah query untuk mengubah data pada tabel dosen
            $update = mysqli_query($db, "UPDATE Matapelajaran SET  namamapel  = '$namamapel' 
                                                              WHERE kdmapel     = '$kdmapel'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                 ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=Matapelajaran";
                </script>
                <?php
            }
    }

// tutup koneksi
mysqli_close($db);   
?>

