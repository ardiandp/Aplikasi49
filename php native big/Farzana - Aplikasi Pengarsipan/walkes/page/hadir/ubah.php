<?php
include"../config/koneksi.php";
$id_hadir =$_GET['id_hadir'];
$query=mysqli_query($db, "SELECT * FROM `ketidakhadiran` WHERE id_hadir='$id_hadir'");
?>

	<div class="panel panel-default">
		<div class="panel-heading">	
			<div id="content">
                <div class="inner">
                          <div class="row">
                        <div class="col-lg-7">
                            <div class="box1">
                                <header>
                                    <div class="alert alert-info" role="alert">
										<i class="fa fa-star"></i> Ubah Data Ketidakhadiran
									</div>
                                </header>
                                <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									<?php
									while($data=mysqli_fetch_array($query))
								{
								?>
                                         <input type="hidden" name="id_hadir" id="id_hadir" value="<?php echo $data['id_hadir'];?>" class="form-control" />
										 
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-lg-2">Sakit</label>
                                            <div class="col-lg-2">
                                                <input type="number" id="sakit" name="sakit" value="<?php echo $data['sakit'];?>" class="form-control" />
                                            </div>
                                        </div>
										
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-lg-2">Izin</label>
                                            <div class="col-lg-2">
                                                <input type="number" id="izin" name="izin" value="<?php echo $data['izin'];?>" class="form-control" />
                                            </div>
                                        </div>
										
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-lg-2">Tanpa Keterangan</label>
                                            <div class="col-lg-2">
                                                <input type="number" id="tanpa_ket" name="tanpa_ket" value="<?php echo $data['tanpa_ket'];?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="my-md-4 pt-md-1 border-top"> </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=hadir" class="btn btn-secondary btn-reset"> Batal </a>
                                        </div>
										<?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
						<!--END PAGE CONTENT -->
                    </div>
        
		
		<?php
// panggil file koneksi.php untuk koneksi ke database
require_once "../config/koneksi.php";
if (isset($_POST['simpan'])) {
	
$id_hadir	 =$_POST['id_hadir'];
$sakit       =$_POST['sakit'];
$izin  		 =$_POST['izin'];
$tanpa_ket  	 =$_POST['tanpa_ket'];

//UPDATE `ketidakhadiran` SET `id_hadir`=[value-1],`id_siswa`=[value-2],`id_kelas`=[value-3],`sakit`=[value-4],`izin`=[value-5],`tnp_ket`=[value-6] WHERE 1
$update=mysqli_query($db, "UPDATE `ketidakhadiran` SET `sakit`='$sakit',`izin`='$izin',`tanpa_ket`='$tanpa_ket' WHERE id_hadir='$id_hadir'") or die (mysql_error($db));

                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
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