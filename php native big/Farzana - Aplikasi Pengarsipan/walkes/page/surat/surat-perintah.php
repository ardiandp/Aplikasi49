<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/koneksi.php";
?>

<div class="row">
  <div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-paperclip"></i> Surat Perintah</h3>
      </div>
    </div>
  </div>
  <div class="col-md-6" style="padding: 0 50px;">
    <h3>Buat Surat Perintah</h3>
    <form action="page/surat/pdf.php" method="post">
      <div class="form-group">
        <div class="d-flex justify-content-between" style="justify-content: space-between;display: flex;">
          <label for="surat" style="white-space: nowrap;margin-top: 10px;">Surat Perintah <span class="text-danger">*</span></label>
          <input type="text" name="surat" class="form-control" style="margin-left: 10px;" id="surat" minlength="5" required>
        </div>
      </div>
      <div class="form-group">
        <label for="nopol">No. Pol. <span class="text-danger">*</span></label>
        <input type="text" name="nopol" class="form-control" id="nopol" minlength="5" required>
        <small class="form-text text-muted">Nomor Surat Perintah Penyidikan</small>
      </div>
      <div class="form-group">
        <label for="dasar">Dasar <span class="text-danger">*</span></label>
        <textarea class="form-control" name="dasar" id="dasar" rows="3" minlength="7"></textarea>
        <small class="form-text text-muted">Dasar berisi pasal-pasal yang di pertimbangkan untuk kepentingan penyidikan.</small>
      </div>
      <div class="form-group">
        <label for="kepada">Kepada <span class="text-danger">*</span></label>
        <textarea class="form-control" name="kepada" id="textarea-1" rows="3" minlength="7"></textarea>
        <small class="form-text text-muted">Kepada ditujukan untuk penyidik/penyidik pembantu.</small>
      </div>
      <div class="form-group">
        <label for="untuk">Untuk <span class="text-danger">*</span></label>
        <textarea class="form-control" name="untuk" id="textarea-2" rows="3" minlength="7"></textarea>
        <small class="form-text text-muted">Untuk berisi tindakan yang dilakukan dalam proses penyidikan.</small>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nama-penerima">Nama penerima <span class="text-danger">*</span></label>
            <input type="text" name="nama-penerima" class="form-control" id="nama-penerima" minlength="5" required>
          </div>
          <div class="form-group">
            <label for="nrp-penerima">NRP <span class="text-danger">*</span></label>
            <input type="text" name="nrp-penerima" class="form-control" id="nrp-penerima" minlength="8" required>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nama-kabag">Nama KABAG. Ops KASUBAG. RESKRIM <span class="text-danger">*</span></label>
            <input type="text" name="nama-kabag" class="form-control" id="nama-kabag" minlength="5" required>
          </div>
          <div class="form-group">
            <label for="nrp-kabag">NRP <span class="text-danger">*</span></label>
            <input type="text" name="nrp-kabag" class="form-control" id="nrp-kabag" minlength="8" required>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

</div>
