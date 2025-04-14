<div class="panel panel-default">
  <div class="panel-heading">
<!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                          <div class="row">
                        <div class="col-lg-12">
                            <div class="box1">
                                <header>
								  <div class="panel panel-success">
								   <div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star"></i>Input Data Prestasi </h3> 
								   </div>
                                </header>
                                <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									
									                           <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Id Prestasi</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="id_prestasi" maxlength="5" autocomplete="off" required>
                                            </div>
                                        </div>
                                        
                                       <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">NIS</label>
                                             <div class="col-md-2">
                                            <select class="form-control" name="nis" id="nis">
												<option> </option>
                                                <?php
                                                $query=mysqli_query($db, "SELECT * FROM siswa ORDER BY nis ASC");
                                                while($data=mysqli_fetch_array($query)){
                                                ?>
                                                  <option value="<?php echo $data['nis']?>"><?php echo $data['nis']?> <?php echo $data['nama']?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        </div>
										
										                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Kode Kelas</label>
                                             <div class="col-md-2">
                                            <select class="form-control" name="kdkelas" id="kdkelas">
											<option> </option>
                                                <?php
                                                $query=mysqli_query($db, "SELECT * FROM kelas ORDER BY kdkelas ASC");
                                                while($data=mysqli_fetch_array($query)){
                                                ?>
                                                    <option value="<?php echo $data['kdkelas']?>"><?php echo $data['kdkelas']?> <?php echo $data['namakelas']?> </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        </div>
										
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Prestasi</label>
                                             <div class="col-md-2">
											<input type="text"  name="prestasi" id="prestasi" class="form-control" />
										</div>
                                        </div>
										
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Keterangan</label>
                                            <div class="col-md-2">
                                                 <input type="autosize" id="ket" name="ket" class="form-control"/>
                                            </div>
                                        </div>
										
										<div class="my-md-4 pt-md-1 border-top"> </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=prestasi" class="btn btn-secondary btn-reset"> Batal </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--END PAGE CONTENT -->
                    </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>
</div>
</div>
</div>

<?php
//INSERT INTO `ekstra`(`id_ekstra`, `nama_ekstra`, `ket`) VALUES ([value-1],[value-2],[value-3])
  require_once "../config/koneksi.php";
  if (isset($_POST['simpan'])) {

$id_prestasi	 =$_POST['id_prestasi'];
$nis 		 =$_POST['nis'];
$kdkelas	 =$_POST['kdkelas'];
$prestasi =$_POST['prestasi'];
$ket  	 	 =$_POST['ket'];

$insert = mysqli_query($db, "INSERT INTO prestasi(`id_prestasi`, `nis`, `kdkelas`, `prestasi`, `ket`)
    VALUES('$id_prestasi','$nis','$kdkelas','$prestasi','$ket')")
  or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
  
  if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
    ?>
    <script type="text/javascript">
      alert("Data Berhasil disimpan");
      window.location.href= "?page=prestasi";
    </script>
    <?php
  }

  }
 
// tutup koneksi
mysqli_close($db);   
?>

