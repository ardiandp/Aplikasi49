<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta") ?>
  <title>MAK-CRM | Prospek</title>
  <?php $this->load->view("includes/core-head") ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .scroll-produk-table-wrapper {
      overflow-y: scroll;
      height: 400px;
    }
  </style>
</head>

<body class="animsition site-navbar-small">
  <?php $this->load->view("includes/navbar") ?>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Prospek</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Prospek">Prospek</a></li>
        <li class="breadcrumb-item active">Tambah Prospek</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <div class="">
        <form method="post" action="<?php echo base_url(); ?>prospek/insert" id="formSubmit">
          <div class="">
            <div class="panel">
              <div class="panel-body">
                <div class="form-group">
                  <label class="form-control-label">ID Prospek</label>
                  <input type="text" class="form-control" name="kodeprospek" value="<?php echo $generated_id; ?>" readOnly>
                </div>
                <?php if ($this->session->user_role == "Sales Engineer") : ?>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label> <br /><a data-toggle="modal" data-target="#tambah_rs_modal"><strong>[+] Tambah Rumah Sakit</strong></a>
                    <select class="js-example-basic-single form-control" name="id_fk_rs" id="dataRumahSakit" onchange="showDetailRS()">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Rumah Sakit --</option>
                      <?php for ($a = 0; $a < count($datars); $a++) : ?>
                        <option value="<?php echo $datars[$a]["id_pk_rs"]; ?>"><?php echo $datars[$a]["rs_nama"]; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Detail Rumah Sakit</label>
                    <table class="table table-hover table-striped w-full border" id="detailRS">
                    </table>
                  </div>
                <?php endif; ?>
                <?php if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") : ?>
                  <div class="form-group">
                    <label class="form-control-label">Kabupaten</label>
                    <select class="js-example-basic-single form-control" name="kabupaten" onchange="showRumahSakit()" id="kabupaten">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Kabupaten --</option>
                      <?php for ($a = 0; $a < count($datakabupaten); $a++) : ?>
                        <option value="<?php echo $datakabupaten[$a]["id_pk_kabupaten"]; ?>"><?php echo $datakabupaten[$a]["kabupaten_nama"]; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label> <br /><a data-toggle="modal" data-target="#tambah_rs_modal"><strong>[+] Tambah Rumah Sakit</strong></a>
                    <select class="js-example-basic-single form-control" name="id_fk_rs" id="dataRumahSakit" onchange="showDetailRS()">

                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Detail Rumah Sakit</label>
                    <table class="table table-hover table-striped w-full border" id="detailRS">
                    </table>
                  </div>
                <?php endif; ?>
                <?php if ($this->session->user_role == "Sales Manager") : ?>
                  <div class="form-group">
                    <label class="form-control-label">Provinsi</label>
                    <select class="js-example-basic-single form-control" name="provinsi" onchange="showKabupaten()" id="provinsi">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Provinsi --</option>
                      <?php for ($a = 0; $a < count($dataprovinsi); $a++) : ?>
                        <option value="<?php echo $dataprovinsi[$a]["id_pk_provinsi"]; ?>"><?php echo $dataprovinsi[$a]["provinsi_nama"]; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Kabupaten</label>
                    <select class="js-example-basic-single form-control" name="kabupaten" onchange="showRumahSakit()" id="kabupaten">

                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label> <br /><a data-toggle="modal" data-target="#tambah_rs_modal"><strong>[+] Tambah Rumah Sakit</strong></a>
                    <select class="js-example-basic-single form-control" name="id_fk_rs" id="dataRumahSakit" onchange="showDetailRS()">

                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Detail Rumah Sakit</label>
                    <table class="table table-hover table-striped w-full border" id="detailRS">
                    </table>
                  </div>
                <?php endif; ?>
                <!-- <div class="form-group">
                  <label class="form-control-label">Prospek Principle</label>
                  <input type="text" class="form-control" name="prospek_principle" placeholder="Prospek Principle">
                </div> -->
                <div class="form-group">
                  <label class="form-control-label">Notes Kompetitor</label>
                  <textarea type="text" class="form-control" name="notes_kompetitor" placeholder="Notes Kompetitor"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Notes Prospek</label>
                  <textarea type="text" class="form-control" name="notes_prospek" placeholder="Notes Prospek"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Estimasi Pembelian</label>
                  <input class="form-control" type="date" name="estimasi_pembelian">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Funnel</label>
                  <select class="form-control" name="funnel" onchange="funnelProspek()" id="prospek">
                    <option selected disabled>------ Pilih Funnel ------</option>
                    <option value="Pindah TA">Pindah TA</option>
                    <option value="Done">Done</option>
                    <option value="Hot Prospek">Hot Prospek</option>
                    <option value="Lead">Lead</option>
                    <option value="Loss">Lose</option>
                    <option value="Prospek">Prospek</option>
                  </select>
                </div>
                <div class="form-group" id="funnelPercentage">

                </div>
                <div class="form-group" id="noEkatalog">

                </div>
                <div class="form-group" id="noteLoss">

                </div>
                <div class="form-group" id="noteSirup">

                </div>
                <div class="form-group" id="nomorPo">
                  <label class="form-control-label">Nomor PO</label>
                  <input class="form-control" type="text" name='nomorekatalog'>
                </div>
                <div class="form-group" id="nomorFaktur">
                  <label class="form-control-label">Nomor Faktur</label>
                  <input class="form-control" type="text" name='nomorfaktur'>
                </div>
                <div class="form-group" id="ratingGroup">
                  <label class="form-control-label">Rating</label>
                  <select class='form-control' style="width:100%;" name='rating' id="rating">
                    <option selected disabled>------ Pilih Rating ------</option>
                    <option value="0">[0] - Lose kompetitor</option>
                    <option value="0,05">[0,05] - Pindah anggaran</option>
                    <option value="0,1">[0,1] - Mapping</option>
                    <option value="0,2">[0,2] - Done SPH//Inhar</option>
                    <option value="0,3">[0,3] - Done detailing/presentasi/demo/FV</option>
                    <option value="0,4">[0,4] - Spesifikasi Produk & pagu angaran di ACC</option>
                    <option value="0,5">[0,5] - Proses Klik E Catalog/PL/Negosiasi Harga (Swasta)</option>
                    <option value="0,6">[0,6] - Sudah ada ID Paket/Sudah PO</option>
                    <option value="0,7">[0,7] - Proses kontrak/SPK/Sudah Pembayaran DP</option>
                    <option value="0,8">[0,8] - Barang sudah terkirim</option>
                    <option value="0,9">[0,9] - Barang sudah diterima</option>
                    <option value="1">[1] - Faktur/Pembayaran Lunas</option>
                  </select>
                </div>
                <div class="form-group" id="danaGroup">
                  <label class="form-control-label">Sumber Dana</label>
                  <select class='form-control' style="width:100%;" name='sumberdana' id="sumberdana">
                    <option selected disabled>------ Pilih Sumber Dana ------</option>
                    <option value="APBD">APBD</option>
                    <option value="DAK">DAK</option>
                    <option value="APBD-P">APBD-P</option>
                    <option value="APBN">APBN</option>
                    <option value="APBN-P">APBN-P</option>
                    <option value="Private">Private</option>
                    <option value="BLUD">BLUD</option>
                  </select>
                </div>
                <div class="form-group" id="principalGroup">
                  <label class="form-control-label">Principal</label>
                  <select class='form-control' style="width:100%;" name='prospek_principle' id="prospek_principle">
                    <option selected disabled>------ Pilih Principal ------</option>
                    <option value="MAK">MAK</option>
                    <option value="Wecare">Wecare</option>
                    <option value="Greenmedika / Alpinion">Greenmedika / Alpinion</option>
                    <option value="Greenmedika / Esaote">Greenmedika / Esaote</option>
                    <option value="KaWe">KaWe</option>
                    <option value="Physioled">Physioled</option>
                  </select>
                </div>
                <div class="form-group" id="jenisPengadaanGroup">
                  <label class="form-control-label">Jenis Pengadaan</label>
                  <select class='form-control' style="width:100%;" name='jenispengadaan' id="jenispengadaan">
                    <option selected disabled>------ Pilih Jenis Pengadaan ------</option>
                    <option value="E-katalog">E-katalog</option>
                    <option value="PL">PL</option>
                    <option value="Tender">Tender</option>
                  </select>
                </div>
                <label class="form-control-label">Detail Produk</label>
                <div class="table-responsive">
                  <table class="table table-hover table-striped w-full" id="table_content_container">
                    <thead>
                      <tr>
                        <th>Produk <strong><a href="<?php echo base_url(); ?>produk" target="_blank">Buka Produk</a></th>
                        <th>Harga</th>
                        <th>Diskon (%)</th>
                        <th>Quantity</th>
                        <th>Keterangan Produk</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="tambah_produk_button_container">
                        <td colspan=6>
                          <button type="button" class="btn btn-primary btn-sm col-lg-12" onclick="tambahRowProduk()">Tambah Produk</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="<?php echo base_url(); ?>prospek" class="btn btn-default">Cancel</a>
                <button type="button" onclick="submitForm()" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view("includes/footer") ?>
  <?php $this->load->view("includes/core-script") ?>
  <script src="<?php echo base_url(); ?>global/vendor/asrange/jquery-asRange.min.js"></script>
  <script src="<?php echo base_url(); ?>global/vendor/bootbox/bootbox.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
    var row = 0;
  </script>
  <script>
    var base_url = "<?php echo base_url(); ?>";

    function showRumahSakit() {
      var base_url = "<?php echo base_url(); ?>";
      var id_kabupaten = $("#kabupaten").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_rs/${id_kabupaten}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {

          var html = "";
          for (var a = 0; a < respond["data_rs"].length; a++) {
            html += `
                <option value = '${respond["data_rs"][a]["id_pk_rs"]}'>${respond["data_rs"][a]["rs_nama"]}</option>
              `;
          }
          $("#dataRumahSakit").html(html);
          showDetailRS();
        }
      });
    }

    function showDetailRS() {
      var base_url = "<?php echo base_url(); ?>";
      var id_rs = $("#dataRumahSakit").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_detail_rs/${id_rs}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {

          var html = "";
          for (var a = 0; a < respond["data_detail_rs"].length; a++) {
            html += `
              <tr>
                <td style = "width:25%">Kode RS</td>
                <td>${respond["data_detail_rs"][a]["rs_kode"]}</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>${respond["data_detail_rs"][a]["rs_kelas"]}</td>
              </tr>
              <tr>
                <td>Direktur</td>
                <td>${respond["data_detail_rs"][a]["rs_direktur"]}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>${respond["data_detail_rs"][a]["rs_alamat"]}, ${respond["data_detail_rs"][a]["rs_kode_pos"]}</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>${respond["data_detail_rs"][a]["rs_kategori"]}</td>
              </tr>
              <tr>
                <td>Telepon / Fax</td>
                <td>${respond["data_detail_rs"][a]["rs_telepon"]} / ${respond["data_detail_rs"][a]["rs_fax"]}</td>
              </tr>
              <tr>
                <td>Kabupaten</td>
                <td>${respond["data_detail_rs"][a]["nama_kabupaten"]}</td>
              </tr>
              <tr>
                <td>Jenis RS</td>
                <td>${respond["data_detail_rs"][a]["jenis_rs"]}</td>
              </tr>
              <tr>
                <td>Penyelenggara</td>
                <td>${respond["data_detail_rs"][a]["penyelenggara"]}</td>
              </tr>
              `;
          }
          $("#detailRS").html(html);
        }
      });
    }

    function showDetailEkat() {
      var base_url = "<?php echo base_url(); ?>";
      var id_ekat = $("#noEkat").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_detail_ekat/${id_ekat}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {

          var html = "";
          for (var a = 0; a < respond["data_detail_ekat"].length; a++) {
            html += `
              <tr>
                <td>Komoditas</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_komoditas"]}</td>
              </tr>
              <tr>
                <td>Ekatalog</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_nama_paket"]}</td>
              </tr>
              <tr>
                <td>Instansi</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_instansi"]}</td>
              </tr>
              <tr>
                <td>Satuan Kerja</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_satuan_kerja"]}</td>
              </tr>
              <tr>
                <td>NPWP Satuan Kerja</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_npwp_satuan_kerja"]}</td>
              </tr>
              <tr>
                <td>Alamat Satuan Kerja</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_alamat_satuan_kerja"]}</td>
              </tr>
              <tr>
                <td>Alamat Pengiriman</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_alamat_pengiriman"]}</td>
              </tr>
              <tr>
                <td>Tahun Anggaran</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_tahun_anggaran"]}</td>
              </tr>
              <tr>
                <td>Total Produk</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_total_produk"]}</td>
              </tr>
              <tr>
                <td>Total Harga</td>
                <td>Rp ${respond["data_detail_ekat"][a]["ekatalog_total_harga"]}</td>
              </tr>
              <tr>
                <td>Total Harga Online</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_total_harga_online"]}</td>
              </tr>
              <tr>
                <td>Status Paket / Posisi Paket</td>
                <td>${respond["data_detail_ekat"][a]["ekatalog_status_paket"]} / ${respond["data_detail_ekat"][a]["ekatalog_posisi_paket"]}</td>
              </tr>
              `;
          }
          $("#detailEkat").html(html);
        }
      });
    }

    function showDetailSirup() {
      var base_url = "<?php echo base_url(); ?>";
      var id_sirup = $("#noSirup").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_detail_sirup/${id_sirup}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {

          var html = "";
          for (var a = 0; a < respond["data_detail_sirup"].length; a++) {
            html += `
              <tr>
                <td>Paket SiRUP</td>
                <td>${respond["data_detail_sirup"][a]["sirup_paket"]}</td>
              </tr>
              <tr>
                <td>KLPD</td>
                <td>${respond["data_detail_sirup"][a]["sirup_klpd"]}</td>
              </tr>
              <tr>
                <td>Satuan Kerja</td>
                <td>${respond["data_detail_sirup"][a]["sirup_satuan_kerja"]}</td>
              </tr>
              <tr>
                <td>Tahun Anggaran</td>
                <td>${respond["data_detail_sirup"][a]["sirup_tahun_anggaran"]}</td>
              </tr>
              <tr>
                <td>Volume Pekerjaan</td>
                <td>${respond["data_detail_sirup"][a]["sirup_volume_pekerjaan"]}</td>
              </tr>
              <tr>
                <td>Uraian Pekerjaan</td>
                <td>${respond["data_detail_sirup"][a]["sirup_uraian_pekerjaan"]}</td>
              </tr>
              <tr>
                <td>Spesifikasi Pekerjaan</td>
                <td>${respond["data_detail_sirup"][a]["sirup_spesifikasi_pekerjaan"]}</td>
              </tr>
              <tr>
                <td>Produk dalam Negeri / Usaha Kecil / Pra Dipa</td>
                <td>${respond["data_detail_sirup"][a]["sirup_produk_dalam_negri"]} / ${respond["data_detail_sirup"][a]["sirup_usaha_kecil"]} / ${respond["data_detail_sirup"][a]["sirup_pra_dipa"]}</td>
              </tr>
              <tr>
                <td>Metode Pemilihan</td>
                <td>Rp ${respond["data_detail_sirup"][a]["sirup_metode_pemilihan"]}</td>
              </tr>
              <tr>
                <td>History Paket</td>
                <td>${respond["data_detail_sirup"][a]["sirup_histori_paket"]}</td>
              </tr>
              `;
          }
          $("#detailSirup").html(html);
        }
      });
    }

    function showKabupaten() {
      var id_provinsi = $("#provinsi").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_kabupaten/${id_provinsi}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          var html = "<option disabled selected>Silahkan Pilih Kabupaten</option>";
          for (var a = 0; a < respond["data_kabupaten"].length; a++) {
            html += `
                <option value = '${respond["data_kabupaten"][a]["id_pk_kabupaten"]}'>${respond["data_kabupaten"][a]["kabupaten_nama"]}</option>
              `;
          }
          $("#kabupaten").html(html);
        }
      });
    }

    // Previous dropdown sirup
    // <select class = 'js-example-basic-single form-control' style="width:100%;" name = 'no_sirup' id="noSirup" onchange="showDetailSirup()">
    //   <option selected disabled>------ Pilih SiRUP ------</option>
    //   <?php for ($i = 0; $i < count($datasirup); $i++) : ?>
    //     <option value = "<?php echo $datasirup[$i]["sirup_rup"]; ?>"><?php echo $datasirup[$i]["sirup_rup"]; ?></option>
    //   <?php endfor; ?>
    // </select>

    function funnelProspek() {
      var prospek = $("#prospek").val();
      var id_rs = $("#dataRumahSakit").val();
      $.ajax({
        url: `${base_url}ws/prospek/get_rs_kategori/${id_rs}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          if (prospek == "Prospek" && "<?php echo $this->session->user_role; ?>" == "Supervisor" && respond["data_rs_kategori"][0]["rs_kategori"] == "Pemerintah") {
            var html4 = "";
            var htmlpo = "";
            $("#noteSirup").show();
            $("#nomorPo").show();
            html4 += `
                <label class="form-control-label">No SiRUP</label>
                <div class="form-group">
                  <input type="text" class="form-control" name = 'no_sirup' id="noSirup" oninput="showDetailSirup()">
                </div>
                <label class="form-control-label">Detail SiRUP</label>
                <table class="table table-hover table-striped w-full border" id ="detailSirup">
                </table>
              `;
            htmlpo += `
                <label class="form-control-label">Nomor PO</label>
                <input class="form-control" type="text" name = 'nomorekatalog'>
            `;
            $("#funnelPercentage").html("");
            $("#noEkatalog").html("");
            $("#noteLoss").html("");
          } else if (prospek == "Done" && "<?php echo $this->session->user_role; ?>" == "Sales Manager" && respond["data_rs_kategori"][0]["rs_kategori"] == "Pemerintah") {
            var html2 = "";
            $("#noEkatalog").show();
            html2 += `
                <label class="form-control-label">No E Katalog</label>
                <select class = 'js-example-basic-single form-control' style="width:100%;" name = 'nomorekatalog' id="noEkat" onchange="showDetailEkat()">
                  <option selected disabled>------ Pilih Ekatalog ------</option>
                <?php for ($i = 0; $i < count($dataekat); $i++) : ?>
                  <option value = "<?php echo $dataekat[$i]["ekatalog_id_paket"]; ?>"><?php echo $dataekat[$i]["ekatalog_id_paket"]; ?></option>
                <?php endfor; ?>
                </select>
                <label class="form-control-label">Detail E Katalog</label>
                <table class="table table-hover table-striped w-full border" id ="detailEkat">
                </table>
              `;
            $("#nomorPo").html("");
            $("#funnelPercentage").html("");
            $("#noteLoss").html("");
            $("#noteSirup").html("");
          } else if (prospek == "Loss") {
            var html3 = "";
            var htmlpo = "";
            $("#noteLoss").show();
            $("#nomorPo").show();
            html3 += `
                <label class="form-control-label">Note</label>
                <textarea type="text" class="form-control" name="note_loss"></textarea>
              `;
            htmlpo += `
                <label class="form-control-label">Nomor PO</label>
                <input class="form-control" type="text" name = 'nomorekatalog'>
            `;
            $("#funnelPercentage").html("");
            $("#noEkatalog").html("");
            $("#noteSirup").html("");
          } else if (prospek == "Prospek") {
            var html1 = "";
            var htmlpo = "";
            $("#funnelPercentage").show();
            $("#nomorPo").show();
            html1 += `
                 <label class="form-control-label">Funnel</label>
                 <select class="form-control" name="funnel_percentage">
                   <option value = "25%">25%</option>
                   <option value = "50%">50%</option>
                   <option value = "75%">75%</option>
                 </select>
               `;
            htmlpo += `
                <label class="form-control-label">Nomor PO</label>
                <input class="form-control" type="text" name = 'nomorekatalog'>
            `;
            $("#noEkatalog").html("");
            $("#noteLoss").html("");
            $("#noteSirup").html("");
          } else {
            $("#funnelPercentage").html("");
            $("#noEkatalog").html("");
            $("#noteLoss").html("");
            $("#noteSirup").html("");
          }
          $("#nomorPo").html(htmlpo);
          $("#funnelPercentage").html(html1);
          $("#noEkatalog").html(html2);
          $("#noteLoss").html(html3);
          $("#noteSirup").html(html4);
          $('.js-example-basic-single').select2();
        }
      });
    }

    // Previous harga ekat di produk
    // <tr>
    //  <td style="border:none;">Harga Ekatalog</td>
    //  <td style="border:none; text-align:right;" id = "harga_produk_ekat${row}"></td>
    // </tr>

    function tambahRowProduk() {
      var html = `
              <tr id = "tambahRowProduk${row}">
                <td>
                  <input type ='hidden' name='data_produk[]' value='${row}'>
                  <select class = 'js-example-basic-single form-control' style="width:100%;" name = 'id_fk_produk${row}' id = 'nama_produk_insert${row}' onchange="showHarga(${row})">
                    <option selected disabled>------ Pilih Produk ------</option>
                  <?php for ($i = 0; $i < count($dataproduk); $i++) : ?>
                    <option value = "<?php echo $dataproduk[$i]["id_pk_produk"]; ?>"><?php echo $dataproduk[$i]["produk_nama"]; ?></option>
                  <?php endfor; ?>
                  </select>
                </td>
                <td>
                  <table>
                    <tr>
                      <td style="border:none;">Price List</td>
                      <td style="border:none; text-align:right;" id="harga_produk_insert${row}"></td>
                    </tr>
                  </table>
                <td><input type = 'number' min='0' max='100' class = 'form-control nf-input' name = 'detail_diskon${row}'></td>
                <td><input type = 'number' class = 'form-control nf-input' name = 'detail_quantity${row}' min="0"></td>
                <td>
                  <textarea class = 'form-control' name = 'detail_keterangan${row}' id ='keterangan_produk_insert${row}'></textarea>
                  <input type="hidden" name='detail_price${row}' id='detail_price${row}'>
                </td>
                <td>
                  <button type = 'button' class = 'btn btn-danger btn-sm' onclick = 'deleteProdukData(this)'><i class = 'icon md-delete'></i></button>
                </td>
              </tr>
            `;
      $("#tambah_produk_button_container").before(html);
      $('.js-example-basic-single').select2();
      init_nf();
      row++;
    }

    function deleteProdukData(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("table_content_container").deleteRow(i);
    }


    function showHarga(row) {
      var id_produk = $(`#nama_produk_insert${row}`).val();
      $.ajax({
        url: `${base_url}ws/prospek/get_price/${id_produk}`,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          $(`#harga_produk_insert${row}`).text("Rp. " + format_number(respond['data_price'][0]['produk_price_list']));
          document.getElementById(`detail_price${row}`).value = respond['data_price'][0]['produk_price_list'];
          // html += `
          //   <input type="hidden" name="detail_price${row}" value="${respond['data_price'][0]['produk_price_list']}">
          // `;
        }
      });
    }

    function submitForm() {
      nf_reformat_all();
      $("#formSubmit").submit();
    }
  </script>
  <?php
  $sql = "select count(id_pk_rs) as jmlh_rs from mstr_rs order by id_pk_rs DESC";
  $jmlh_rs = executeQuery($sql)->result_array()[0]["jmlh_rs"];
  ?>
  <div class="modal fade" id="tambah_rs_modal">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Tambah Rumah Sakit</h4>
        </div>
        <form id="createFormRs">
          <div class="modal-body">
            <input type="hidden" value="<?php echo md5("rs-" . $jmlh_rs) ?>" name="koderumahsakit">
            <input type="hidden" value="-" name="direktur">
            <div class="form-group">
              <label class="form-control-label">Nama Rumah Sakit</label>
              <input type="text" class="form-control" name="namarumahsakit" placeholder="Nama Rumah Sakit">
            </div>
            <div class="form-group">
              <label class="form-control-label">Kelas Rumah Sakit</label>
              <br>
              <select class="form-control" name="kelasrumahsakit">
                <option value="none" selected disabled hidden>-- Silahkan Pilih Kelas --</option>
                <option value="Belum Ditentukan">Belum Ditentukan</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Alamat</label>
              <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kategori</label>
              <br>
              <select class="form-control" name="kategori">
                <option value="none" selected disabled hidden>-- Silahkan Pilih Kategori --</option>
                <option value="Pemerintah">Pemerintah</option>
                <option value="Swasta">Swasta</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Provinsi</label>
              <select class="form-control" onchange="load_kabupaten_provinsi()" id="rs_provinsi">
                <option value="none" selected disabled hidden>-- Silahkan Pilih Provinsi --</option>
                <?php for ($a = 0; $a < count($dataprovinsi); $a++) : ?>
                  <option value="<?php echo $dataprovinsi[$a]["id_pk_provinsi"]; ?>"><?php echo $dataprovinsi[$a]["provinsi_nama"]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kabupaten</label>
              <select class="form-control" name="kabupaten" id="rs_kabupaten"></select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kode Pos</label>
              <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos">
            </div>
            <div class="form-group">
              <label class="form-control-label">Telepon</label>
              <input type="text" class="form-control" name="telepon" placeholder="Telepon">
            </div>
            <div class="form-group">
              <label class="form-control-label">Fax</label>
              <input type="text" class="form-control" name="fax" placeholder="Fax">
            </div>
            <div class="form-group">
              <label class="form-control-label">Jenis Rumah Sakit</label>
              <select class="form-control dropdown_jenis" name="jenisrumahsakit"></select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Penyelenggara</label>
              <select class="form-control dropdown_penyelenggara" name="penyelenggara" class=""></select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" onclick="create_row()" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function load_kabupaten_provinsi(edit = false) {
      var id_provinsi = "";
      if (edit) {
        id_provinsi = $("#edit_provinsi option:selected").val();
      } else {
        id_provinsi = $("#rs_provinsi option:selected").val();
      }
      $.ajax({
        url: "<?php echo base_url(); ?>ws/kabupaten/kabupaten_provinsi/" + id_provinsi,
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          var html = "";
          for (var a = 0; a < respond.length; a++) {
            html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
          }
          if (edit) {
            $("#edit_kabupaten").html(html);
          } else {
            $("#rs_kabupaten").html(html);
          }
        }
      });
    }

    function load_provinsi(edit = false) {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/provinsi/get_active_data",
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          var html = ``;
          for (var a = 0; a < respond["data"].length; a++) {
            html += `
            <option value = "${respond["data"][a]["id_pk_provinsi"]}">${respond["data"][a]["provinsi_nama"]}</option>
            `;
          }
          if (edit) {
            $("#edit_provinsi").html(html);
          } else {
            $("#rs_provinsi").html(html);
          }
        }
      })
    }
    load_jenis_rumah_sakit();

    function load_jenis_rumah_sakit() {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/rumah_sakit/get_jenis_rumah_sakit",
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          var html = "<option value = 0>Lain-lain</option>";
          for (var a = 0; a < respond["data"].length; a++) {
            html += `
            <option value = ${respond["data"][a]["id_pk_jenis_rs"]}>(${respond["data"][a]["jenis_rs_kode"]}) ${respond["data"][a]["jenis_rs_nama"]}</option>
            `;
          }
          $(".dropdown_jenis").html(html);
        }
      })
    }
    load_penyelenggara();

    function load_penyelenggara() {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/rumah_sakit/get_penyelenggara",
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          var html = "<option value = 0>Lain-lain</option>";
          for (var a = 0; a < respond["data"].length; a++) {
            html += `
            <option value = ${respond["data"][a]["id_pk_penyelenggara"]}>${respond["data"][a]["penyelenggara_nama"]}</option>
            `;
          }
          $(".dropdown_penyelenggara").html(html);
        }
      })
    }
    var create_rumah_sakit_form = $("#createFormRs").html();

    function create_row() {
      var fd = new FormData($("#createFormRs")[0]);
      $.ajax({
        url: "<?php echo base_url(); ?>ws/rumah_sakit/insert",
        type: "POST",
        dataType: "JSON",
        data: fd,
        contentType: false,
        processData: false,
        success: function(respond) {
          if (respond["status"]) {
            var id_rs = respond["insert_id"];
            alert("Rumah sakit baru telah terdaftar, silahkan muat ulang rumah sakit");
            $("#createFormRs").html(create_rumah_sakit_form);
            load_jenis_rumah_sakit();
            load_penyelenggara();
            $("#tambah_rs_modal").modal("hide");

            <?php if (strtolower($this->session->user_role) == "sales engineer") : ?>
              // $.ajax({
              //   url: "<?php echo base_url(); ?>ws/prospek/assign_rs_to_se",
              //   type: "POST",
              //   data: {
              //     "id_rs": id_rs
              //   },
              //   dataType: "JSON",
              //   async: false
              // });
              // var html = "";
              // $.ajax({
              //   url: "<?php echo base_url(); ?>ws/prospek/get_rs_list",
              //   type: "GET",
              //   dataType: "JSON",
              //   async: false,
              //   success: function(respond) {
              //     if (respond["status"]) {
              //       for (var a = 0; a < respond["data"].length; a++) {
              //         html += `<option value = '${respond["data"][a]["id_pk_rs"]}'>${respond["data"][a]["rs_nama"]}</option>`;
              //       }
              //       $("#dataRumahSakit").html(html);
              //     }
              //   }
              // });
            <?php endif; ?>
          }
        }
      });
    }
  </script>
</body>

</html>