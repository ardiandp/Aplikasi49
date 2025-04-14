 <div class="panel panel-default">
<div class="panel-heading">	
	<div class="row">
        <div class="col-md-6">
			<div class="alert alert-info" role="alert">
  				<i class="fa fa-edit"></i> Input Data Anggota
			</div>

			<div class="card">
			  	<div class="card-body">
			  		<!-- form tambah data siswa -->
			    	<form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
			    		
					  	<div class="row">
					      		<div class="form-group col-md-7">
									<label class="col-sm-5 col-sm-5 control-label">Id Anggota</dlabel>
									<input type="text" class="form-control" name="id_anggota" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
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
									<label class="col-sm-5 col-sm-5 control-label">Nama Anggota</label>
									<input type="text" class="form-control" name="nama_anggota" autocomplete="off" required>
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
					
     
								<div class="form-group col-md-9">
									<label class="col-sm-5 col-sm-5 control-label">Alamat</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" name="alamat" autocomplete="off" required>
									</div>
								</div>                                                                

								<div class="form-group col-md-7">
									<label class="col-sm-5 col-sm-5 control-label">Nomor Handphone</label>
									<input type="text" class="form-control" name="nohp" autocomplete="">                  
								</div> 

								<div class="form-group col-md-7">
									<label class="col-sm-5 col-sm-5 control-label">Jabatan</label>
									<input type="text" class="form-control" name="jabatan" autocomplete="">
								</div>
							</div>                                                                          
                                                                
					  	<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 right">
			                <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=anggota" class="btn btn-secondary btn-reset"> Batal </a>
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
    $id_anggota           = $_POST['id_anggota'];
      $id_unit           = $_POST['id_unit'];
	$nama_anggota	      = $_POST['nama_anggota'];
	$jenis_kelamin        = $_POST['jenis_kelamin'];
    $alamat               = $_POST['alamat'];
    $nohp 		          = $_POST['nohp'];	
    $jabatan 		      = $_POST['jabatan'];	


            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel data siswa
            $insert = mysqli_query($db, "INSERT INTO `Anggota`(`id_anggota`,`id_unit`, `nama_anggota`, `jenis_kelamin`, `alamat`, `nohp`, `jabatan`)
                                        VALUES('$id_anggota', '$id_unit','$nama_anggota','$jenis_kelamin','$alamat','$nohp','$jabatan')")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=anggota";
                </script>
                <?php
                }
                else
                {
                ?> 
                    <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href="?page=anggota";
                    </script>
                <?php
            }   
    }

// tutup koneksi
mysqli_close($db);   
?>