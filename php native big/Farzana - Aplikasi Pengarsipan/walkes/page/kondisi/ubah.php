<?php
include"../config/koneksi.php";
$id_sehat =$_GET['id_sehat'];
$query=mysqli_query($db, "SELECT * FROM `kondisi_sehta` WHERE id_sehat='$id_sehat'");
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
										<i class="fa fa-star"></i> Ubah Data Kondisi Sehat
									</div>
                                </header>
                                 <div class="card">
                                <div class="card-body">
                                <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
									<?php
									while($data=mysqli_fetch_array($query))
								{
								?>
                                        <input type="hidden" name="id_sehat" id="id_sehat" value="<?php echo $data['id_sehat'];?>" class="form-control" />
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">Aspek Fisik</label>

                                             <div class="col-md-2">
                                            <select class="form-control" id="fisik" name="fisik" value="<?php echo $data['ket'];?>">
                                                <option value="<?php echo $data['fisik'];?>"><?php echo $data['fisik'];?></option>
                                                <option>Pendengaran</option>
                                                <option>Penglihatan</option>
                                                <option>Gigi</option>
                                            </select>
                                        </div>
                                        </div>
                                       <div class="form-group col-md-12">
                                            <label class="control-label col-lg-2">Keterangan</label>

                                            <div class="col-lg-2">
                                                 <input type="autosize" id="ket" name="ket" value="<?php echo $data['ket'];?>" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 right">
                                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                                            <a href="?page=kondisi" class="btn btn-secondary btn-reset"> Batal </a>
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
	
$id_sehat	 =$_POST['id_sehat'];
$fisik       =$_POST['fisik'];
$kett 		 =$_POST['ket'];

//UPDATE `ekstra` SET `id_ekstra`=[value-1],`nama_ekstra`=[value-2],`ket`=[value-3] WHERE 1
$update=mysqli_query($db, "UPDATE `kondisi_sehta` SET `fisik`='$fisik',`ket`='$kett' WHERE `id_sehat`='$id_sehat'") or die (mysql_error($db));

                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil disimpan");
                    window.location.href= "?page=kondisi";
                </script>
                <?php

				}
}
// tutup koneksi
mysqli_close($db);   
?>