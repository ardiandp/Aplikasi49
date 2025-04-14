<?php
include"../config/koneksi.php";
$id_prestasi =$_GET['id_prestasi'];
$query=mysqli_query($db, "SELECT * FROM `prestasi` WHERE id_prestasi='$id_prestasi'");
?>

	<div class="panel panel-default">
		<div class="panel-heading">	
			<div id="content">
                <div class="inner">
                          <div class="row">
                        <div class="col-lg-12">
                            <div class="box1">
                                <header>
                                    <div class="alert alert-info" role="alert">
										<i class="fa fa-star"></i> Ubah Data Prestasi
									</div>
                                </header>
                                <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									<?php
									while($data=mysqli_fetch_array($query))
								{
								?>
                                        <input type="hidden" name="id_prestasi" id="id_prestasi" value="<?php echo $data['id_prestasi'];?>" class="form-control" />

                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Prestasi</label>

                                             <div class="col-md-2">
                                            <input type="text" class="form-control" id="prestasi" name="prestasi" value="<?php echo $data['prestasi'];?>"/>
                                        </div>
                                        </div>
                                       <div class="form-group col-md-12">
                                            <label class="control-label col-lg-2">Keterangan</label>

                                            <div class="col-lg-2">
                                                 <input type="autosize" id="kete" name="ket" value="<?php echo $data['ket'];?>" class="form-control"/>
                                            </div>
                                        </div>

                                       <div class="my-md-4 pt-md-1 border-top"> </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=prestasi" class="btn btn-secondary btn-reset"> Batal </a>
                                        </div>
                                           </div>
										<?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
						<!--END PAGE CONTENT -->
                    </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

<?php
// panggil file koneksi.php untuk koneksi ke database
require_once "../config/koneksi.php";
if (isset($_POST['simpan'])) {
	
$id_prestasi     =$_POST['id_prestasi'];
$prestasi  =$_POST['prestasi'];
$ket        =$_POST['ket'];

//UPDATE `ekstra` SET `id_ekstra`=[value-1],`nama_ekstra`=[value-2],`ket`=[value-3] WHERE 1
$update=mysqli_query($db, "UPDATE `prestasi` SET `prestasi`='$prestasi',`ket`='$ket' WHERE `id_prestasi`='$id_prestasi'") or die (mysql_error($db));

                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
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