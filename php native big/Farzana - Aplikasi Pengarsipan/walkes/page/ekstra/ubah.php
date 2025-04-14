<?php
include"../config/koneksi.php";
$id_ekstra =$_GET['id_ekstra'];
$query=mysqli_query($db, "SELECT * FROM `ekstra` WHERE id_ekstra='$id_ekstra'");
?>

	<div class="panel panel-default">
		<div class="panel-heading">	
			<div id="content">
                <div class="inner">
                          <div class="row">
                        <div class="col-lg-12">
                                <header>
                                    <div class="alert alert-info" role="alert">
										<i class="fa fa-star"></i> Ubah Data Ekstrakurikuler
									</div>
                                </header>
                               <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									<?php
									while($data=mysqli_fetch_array($query))
								{
								?>
                                        <input type="hidden" name="id_ekstra" id="id_ekstra" value="<?php echo $data['id_ekstra'];?>" class="form-control" />
                                        <div class="form-group">
                                            <label class="control-label col-md-1">Kegiatan Ekstrakurikuler</label>

                                             <div class="col-md-2">
                                            <select class="form-control" id="nama_ekstra" name="nama_ekstra" value="<?php echo $data['nama_ekstra'];?>">
                                                <option>Pramuka</option>
                                                <option>Paskibra</option>
                                                <option>Seni Musik</option>
                                                <option>Bola Volly</option>
                                                <option>Bola Basket</option>
                                                <option>Mading</option>
                                            </select>
                                        </div>
                                        </div>
                                       <div class="form-group col-md-12">
                                            <label class="control-label col-lg-1">Keterangan</label>

                                            <div class="col-lg-2">
                                                 <input type="autosize" id="ket" name="ket" value="<?php echo $data['ket'];?>" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="my-md-4 pt-md-1 border-top"> </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=ekstra" class="btn btn-secondary btn-reset"> Batal </a>
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
	
$id_ekstra	 =$_POST['id_ekstra'];
$nama_ekstra =$_POST['nama_ekstra'];
$ket 		 =$_POST['ket'];

//UPDATE `ekstra` SET `id_ekstra`=[value-1],`nama_ekstra`=[value-2],`ket`=[value-3] WHERE 1
$update=mysqli_query($db, "UPDATE `ekstra` SET `nama_ekstra`='$nama_ekstra',`ket`='$ket' WHERE `id_ekstra`='$id_ekstra'") or die (mysql_error($db));

                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=ekstra";
                </script>
                <?php

				}
}
// tutup koneksi
mysqli_close($db);   
?>