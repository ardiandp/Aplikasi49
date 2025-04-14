<div class="panel panel-default">
<div class="panel-heading">	
	<div class="row">
        <div class="col-md-7">
			<div class="alert alert-info" role="alert">
  				<i class="fa fa-edit"></i> Input Data Laporan
			</div>

			<div class="card">
			  	<div class="card-body">
			  		<!-- form tambah data Jadwal -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
			    		
					  	<div class="row">
					      		<div class="form-grou col-md-7">
									<label class="col-sm-5 col-sm-5 control-label">Id Laporan</label>
									<input type="text" class="form-control" name="id_laporan" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
								</div>


								 <div class="form-group col-md-7">
                                   <label class="col-sm-5 col-sm-5 control-label">Id_unit</label>
                                    <select class="form-control" name="id_unit" id="id_unit">
                                        <option> </option>
                                           <?php
                                            $query=mysqli_query($db, "SELECT * FROM unit");
                                             while($data=mysqli_fetch_array($query)){
                                              ?>
                                            <option value="<?php echo $data['id_unit']?>"><?php echo $data['id_unit']?> <?php echo $data['id_unit']?> </option>
                                                    <?php } ?>
                                            </select>
                                </div>
                                                                                                                             
					                  <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Jumlah Kasus</label>
                                    <input type="text" class="form-control" name="jumlah_kasus" autocomplete="off" required>
                                </div>

                              <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Yang Diselesaikan</label>
                                    <input type="text" class="form-control" name="yang_diselesaikan" autocomplete="off" required>
                                </div>  

                                  <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Putusan Sidang</label>
                                    <input type="text" class="form-control" name="putusan_sidang" autocomplete="off" required>
                                </div>   

                                 <div class="form-group col-md-7">
                                    <label class="col-sm-5 col-sm-5 control-label">Tahun Laporan</label>
                                    <input type="text" class="form-control" name="tahun_laporan" autocomplete="off" required>
                                </div>                                             	
                                                                
					  	<div class="my-md-4 pt-md-1 border-top"> </div>

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
    $id_laporan           = $_POST['id_laporan'];
    $id_unit         = $_POST['id_unit'];
	   $jumlah_kasus = $_POST['jumlah_kasus'];
    $yang_diselesaikan = $_POST['yang_diselesaikan'];
     $putusan_sidang = $_POST['putusan_sidang'];
      $tahun_laporan = $_POST['tahun_laporan'];

            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data siswa
            $insert = mysqli_query($db, "INSERT INTO `laporan`(`id_laporan`, `id_unit`, `jumlah_kasus`, `yang_diselesaikan`,  `putusan_sidang`,  `tahun_laporan`)
                                        VALUES('$id_laporan','$id_unit','$jumlah_kasus','$yang_diselesaikan', '$putusan_sidang', '$tahun_laporan')")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=tab";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=tab";
                    </script>
                <?php
            }   
        
    }

// tutup koneksi
mysqli_close($db);   
?>