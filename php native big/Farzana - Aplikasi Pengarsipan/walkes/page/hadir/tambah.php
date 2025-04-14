<div class="panel panel-default">
  <div class="panel-heading">
<!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                          <div class="row">
                        <div class="col-lg-6">
                            <div class="box1">
                                <header>
								  <div class="panel panel-success">
								   <div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star"></i>Input Data Kehadiran </h3> 
								   </div>
                                </header>
                                <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									
                                       <div class="form-group col-lg-12">
                                            <label class="control-label col-md-2">Id Hadir</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="id_hadir" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                            </div>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            <label class="control-label col-md-2">NIS</label>
                                             <div class="col-md-3">
                                            <select class="form-control" name="nis" id="nis">
												<option> </option>
                                                <?php
                                                $query=mysqli_query($db, "SELECT * FROM siswa");
                                                while($data=mysqli_fetch_array($query)){
                                                ?>
                                                  <option value="<?php echo $data['nis']?>"><?php echo $data['nis']?> <?php echo $data['nama']?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            <label class="control-label col-md-2">Kode Kelas</label>
                                             <div class="col-md-3">
                                            <select class="form-control" name="kdkelas" id="kdkelas">
											<option> </option>
                                                <?php
                                                $query=mysqli_query($db, "SELECT * FROM kelas");
                                                while($data=mysqli_fetch_array($query)){
                                                ?>
                                                    <option value="<?php echo $data['kdkelas']?>"><?php echo $data['kdkelas']?> <?php echo $data['namakelas']?> </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        </div>
										
                                        <div class="form-group col-lg-12">
                                            <label class="control-label col-lg-2">Sakit</label>
                                            <div class="col-lg-3">
                                                <input type="number" id="sakit" name="sakit" class="form-control" />
                                            </div>
                                        </div>
										
                                        <div class="form-group col-lg-12">
                                            <label class="control-label col-lg-2">Izin</label>
                                            <div class="col-lg-3">
                                                <input type="number" id="izin" name="izin" class="form-control" />
                                            </div>
                                        </div>
										
                                        <div class="form-group col-lg-12">
                                            <label class="control-label col-lg-2">Tanpa Keterangan</label>
                                            <div class="col-lg-3">
                                                <input type="number" id="tanpa_ket" name="tanpa_ket" class="form-control" />
                                            </div>
                                        </div>
										
                                        <div class="my-md-4 pt-md-1 border-top"> </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=hadir" class="btn btn-secondary btn-reset"> Batal </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
						<!--END PAGE CONTENT -->
                    </div>
            </div>
</div>
</div>
</div>

<?php
//INSERT INTO `ketidakhadiran`(`id_hadir`, `id_siswa`, `id_kelas`, `sakit`, `izin`, `tnp_ket`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
  require_once "../config/koneksi.php";
  if (isset($_POST['simpan'])) {

$id_hadir	 =$_POST['id_hadir'];
$nis 		 =$_POST['nis'];
$kdkelas	 =$_POST['kdkelas'];
$sakit       =$_POST['sakit'];
$izin  		 =$_POST['izin'];
$tanpa_ket  	 =$_POST['tanpa_ket'];

$insert = mysqli_query($db, "INSERT INTO `ketidakhadiran`(`id_hadir`, `nis`, `kdkelas`, `sakit`, `izin`, `tanpa_ket`)
    VALUES('$id_hadir','$nis','$kdkelas','$sakit','$izin','$tanpa_ket')")
  or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
  
  if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
    ?>
    <script type="text/javascript">
      alert("Data Berhasil disimpan");
      window.location.href= "?page=hadir";
    </script>
    <?php
  }

  }
 
// tutup koneksi
mysqli_close($db);   
?>
