<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta") ?>

  <title>MAK-CRM | Master User</title>

  <?php $this->load->view("includes/core-head") ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">

  <style>
    .scroll-detail-table-wrapper {
      overflow-y: scroll;
      max-height: 300px;
    }
  </style>


</head>

<body class="animsition site-navbar-small">
  <?php $this->load->view("includes/navbar") ?>

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">User</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
        <li class="breadcrumb-item active">User</li>
      </ol>
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-lg-1">
              <h5>&nbsp;</h5>
              <button type="button" class="btn btn-primary btn-sm" data-target="#modalTambahUser" data-toggle="modal">Tambah User</button>
            </div>
            <div class="form-group col-lg-1">
            </div>
            <div class="form-group col-lg-1"></div>
            <div class="form-group col-lg-3">
              <h5>Kolom Pengurutan</h5>
              <select class="form-control" onchange="change_kolom_pengurutan()" id="kolom_pengurutan">
                <?php for ($a = 0; $a < count($field); $a++) : ?>
                  <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group col-lg-1">
              <h5>Urutan</h5>
              <select class="form-control" id="urutan_kolom" onchange="change_arah_pengurutan()" id="urutan_kolom">
                <option value="ASC">A-Z</option>
                <option value="DESC">Z-A</option>
              </select>
            </div>
            <div class="form-group col-lg-3">
              <h5>Pencarian</h5>
              <input type="text" class="form-control" onclick="change_pencarian()" oninput="change_pencarian()" id="pencarian">
            </div>
            <div class="form-group col-lg-2">
              <h5>Kolom Pencarian</h5>
              <select class="form-control" onchange="change_pencarian_kolom()" id="pencarian_kolom">
                <option value="all">Semua</option>
                <?php for ($a = 0; $a < count($field); $a++) : ?>
                  <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>User Level</th>
                <th>Username</th>
                <th>Email</th>
                <th>No. Handphone</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="table_content_container">
            </tbody>
          </table>
          <nav class="d-flex justify-content-center">
            <ul class="pagination" id="pagination1">
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->

  <!-- Tambah User -->
  <div class="modal fade" id="modalTambahUser">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Tambah User</h4>
        </div>
        <form id="insert_form">
          <div class="modal-body">
            <div class="form-group">
              <label class="form-control-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Telepon</label>
              <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Jabatan</label>
              <br>
              <select onchange="create_change_access()" id="drop_access" class="form-control" name="role">
                <option>Pilih</option>
                <option value="Administrator">Administrator</option>
                <option value="Sales Engineer">Sales Engineer</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Area Sales Manager">Area Sales Manager</option>
                <option value="Sales Manager">Sales Manager</option>
              </select>
            </div>
            <div id="div_sales_engineer">
              <div class="form-group">
                <label class="form-control-label">Upline</label>
                <br>
                <select class="form-control" id="supervisor_list_container" name="supervisor">
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Provinsi</label>
                <br>
                <select onchange="sales_engineer_change_provinsi()" class="form-control" id="select_provinsi1">
                  <option>Pilih</option>
                  <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                    <option value="<?php echo $data_provinsi[$a]["id_pk_provinsi"]; ?>"><?php echo $data_provinsi[$a]["provinsi_nama"]; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Kabupaten</label>
                <br>
                <select onchange="sales_engineer_change_kabupaten()" class="form-control" name="kabupaten" id="select_kabupaten">
                </select>
              </div>
              <div class="form-group">
                <h5>Daftar Rumah Sakit</h5>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Rumah Sakit</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody id="table_rs">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="div_supervisor_asm">
              <div class="form-group">
                <label class="form-control-label">Upline</label>
                <br>
                <select class="form-control" id="supervisor_list_container_asm" name="supervisor_asm">
                </select>
              </div>
              <div id="drop_provinsi">
                <label class="form-control-label">Provinsi</label>
                <br>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_prov(this)" onchange="asm_change_provinsi()"> &nbsp; Checklist</th>
                        <th>Provinsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                        <tr>
                          <td><input type="checkbox" value="<?php echo $data_provinsi[$a]["id_pk_provinsi"]; ?>" name="asm_provinsi[]" onchange="asm_change_provinsi()"></td>
                          <td><?php echo $data_provinsi[$a]["provinsi_nama"]; ?></td>
                        </tr>
                      <?php endfor; ?>
                    </tbody>
                  </table>
                </div>
                <!-- <select onchange="asm_change_provinsi()" id="asm_provinsi" class="form-control">
                  <option>Pilih</option>
                  <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                    <option value="<?php echo $data_provinsi[$a]["id_pk_provinsi"]; ?>"><?php echo $data_provinsi[$a]["provinsi_nama"]; ?></option>
                  <?php endfor; ?>
                </select> -->
              </div>
              <div id="drop_kabupaten" class="form-group">
                <br>
                <label class="form-control-label">Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_kab(this)"> &nbsp; Checklist</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="asm_table_kabupaten">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" onclick="insert_row()" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalUpdateUser">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <form id="update_form">
          <div class="modal-body">
            <input type="hidden" class="form-control" name="id_user" id="edit_id_user">
            <div class="form-group">
              <label class="form-control-label">Username</label>
              <input type="text" class="form-control" name="username" id="edit_username" placeholder="username">
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="email" class="form-control" name="email" id="edit_email" placeholder="Email">
            </div>
            <div class="form-group">
              <label class="form-control-label">Telepon</label>
              <input type="text" class="form-control" name="telepon" id="edit_telepon" placeholder="Telepon">
            </div>
            <div class="form-group">
              <label class="form-control-label">Jabatan</label>
              <select class="form-control" name="role" id="edit_role" onchange="edit_change_access()">
                <option>Pilih</option>
                <option value="Administrator">Administrator</option>
                <option value="Sales Engineer">Sales Engineer</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Area Sales Manager">Area Sales Manager</option>
                <option value="Sales Manager">Sales Manager</option>
              </select>
            </div>
            <div id="edit_div_sales_engineer">
              <div class="form-group">
                <label class="form-control-label">Upline</label>
                <br>
                <select class="form-control" id="supervisor_list_container_edit" name="supervisor">
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Assigned Provinsi</label>
                <br>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_prov(this)" onchange="asm_change_provinsi()"> &nbsp; Checklist</th>
                        <th>Provinsi</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_provinsi">

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Unassigned Provinsi</label>
                <br>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Provinsi</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_provinsi_unassigned">

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Assigned Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_kab(this)"> &nbsp; Checklist</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_kabupaten">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Unassigned Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_kabupaten_unassigned">
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- <div class="form-group">
                <h5>Assigned Rumah Sakit</h5>

                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Rumah Sakit</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_rs">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <h5>Unassigned Rumah Sakit</h5>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Rumah Sakit</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody id="edit_se_table_rs_unassigned">
                    </tbody>
                  </table>
                </div>
              </div> -->
            </div>
            <div id="edit_div_asm">
              <div class="form-group">
                <label class="form-control-label">Upline</label>
                <br>
                <select class="form-control" id="supervisor_list_container_asm_edit" name="supervisor_asm">
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Assigned Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <!-- <th><input type="checkbox" onClick="toggle_kab(this)"> &nbsp; Checklist</th> -->
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="edit_asm_table_kabupaten">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Supervisee</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Supervisee</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="supervisee_list_container_asm_edit">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="edit_div_supervisor">
              <div class="form-group">
                <label class="form-control-label">Upline</label>
                <br>
                <select class="form-control" id="supervisor_list_container_asm_edit" name="supervisor_asm">
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Assigned Provinsi</label>
                <br>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_prov(this)" onchange="asm_change_provinsi()"> &nbsp; Checklist</th>
                        <th>Provinsi</th>
                      </tr>
                    </thead>
                    <tbody id="edit_asm_table_provinsi">

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Unassigned Provinsi</label>
                <br>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Provinsi</th>
                      </tr>
                    </thead>
                    <tbody id="edit_asm_table_provinsi_unassigned">

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Assigned Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onClick="toggle_kab(this)"> &nbsp; Checklist</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="edit_asm_table_kabupaten">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Unassigned Kabupaten</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="edit_asm_table_kabupaten_unassigned">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Supervisee</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Supervisee</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="supervisee_list_container_asm_edit">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="edit_div_sm">
              <div class="form-group">
                <label class="form-control-label">Supervisee</label>
                <div class="scroll-detail-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Supervisee</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="supervisee_list_container_sm_edit">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="update_row()">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalDeleteUser">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Confirmation Delete</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger btn-sm" id="delete_button" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("includes/footer") ?>
  <?php $this->load->view("includes/core-script") ?>
</body>

</html>

<script>
  var provinsi = <?php echo json_encode($data_provinsi); ?>;
  var option_provinsi = "";
  for (var a = 0; a < provinsi.length; a++) {
    option_provinsi += `
      <option value = "${provinsi[a]["id_pk_provinsi"]}">${provinsi[a]["provinsi_nama"]}</option>
    `;
  }

  $("#div_sales_engineer").hide();
  $("#div_supervisor_asm").hide();

  var supervisor_list = [];

  function create_change_access() {
    var jabatan = $("#drop_access").val();
    // if (jabatan == "Sales Engineer") {

    //   supervisor_list = load_supervisor(jabatan);
    //   var html = "<option value = 0 disabled>Pilih Supervisor</option>";
    //   for (var a = 0; a < supervisor_list.length; a++) {
    //     html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
    //   }
    //   $("#supervisor_list_container").html(html);

    //   $("#div_supervisor_asm").hide();
    //   $("#div_sales_engineer").show();
    // } else 
    if (jabatan == "Supervisor" || jabatan == "Sales Engineer") {

      supervisor_list = load_supervisor(jabatan);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm").html(html);

      $("#div_sales_engineer").hide();

      $("#div_supervisor_asm").show();
      $("#drop_provinsi").show();
      $("#drop_kabupaten").show();

    } else if (jabatan == "Area Sales Manager") {
      supervisor_list = load_supervisor(jabatan);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm").html(html);

      $("#div_sales_engineer").hide();

      $("#div_supervisor_asm").show();
      $("#drop_provinsi").hide();
      $("#drop_kabupaten").hide();
    } else {
      $("#div_sales_engineer").hide();
      $("#div_supervisor_asm").hide();
    }
  }

  function edit_change_access() {
    var jabatan = $("#edit_role").val();
    // if (jabatan == "Sales Engineer") {

    //   supervisor_list = load_supervisor(jabatan);
    //   var html = "<option value = 0 disabled>Pilih Supervisor</option>";
    //   for (var a = 0; a < supervisor_list.length; a++) {
    //     html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
    //   }
    //   $("#supervisor_list_container_edit").html(html);

    //   $("#edit_div_supervisor").hide();
    //   $("#edit_div_asm").hide();
    //   $("#edit_div_sales_engineer").show();
    //   $("#edit_div_sm").hide();
    // } else 
    if (jabatan == "Supervisor" || jabatan == "Sales Engineer") {

      supervisor_list = load_supervisor(jabatan);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm_edit").html(html);
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_supervisor").show();
      $("#edit_div_sm").hide();
      $("#edit_div_asm").hide();
    } else if (jabatan == "Area Sales Manager") {
      supervisor_list = load_supervisor(jabatan);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm_edit").html(html);
      $("#edit_div_supervisor").hide();
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_asm").show();
      $("#edit_div_sm").hide();

    } else {
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_sm").show();
      $("#edit_div_supervisor").hide();
      $("#edit_div_asm").hide();
    }
  }

  function sales_engineer_change_provinsi() {
    var id_provinsi = $("#select_provinsi1").val();
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/data_kabupaten/" + id_provinsi,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "<option value = 'none'>---- Pilih Kabupaten ----</option>";
        for (var a = 0; a < respond.length; a++) {
          html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
        }
        $("#select_kabupaten").html(html);
      }
    });
  }

  function sales_engineer_change_kabupaten() {
    var id_kabupaten = $("#select_kabupaten").val();
    if (id_kabupaten != "none") {
      respond = load_unselected_rs(content[active_row]["id_pk_user"], id_kabupaten);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" value="${respond[a]['id_pk_rs']}" name = "se_rs[]"></td>
            <td>${respond[a]['rs_nama']}</td>
            <td>${respond[a]['rs_kelas']}</td>
            <td>${respond[a]['rs_alamat']}</td>
            <td>${respond[a]['rs_kategori']}</td>
          </tr>`;
      }
      $("#table_rs").html(html);
    }
  }

  function toggle_kab(source) {
    checkboxes = document.getElementsByName('asm_kabupaten[]');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
    }
  }

  function toggle_prov(source) {
    checkboxes = document.getElementsByName('asm_provinsi[]');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
    }
  }

  function asm_change_provinsi() {
    var id = [];
    var values = $('input[name="asm_provinsi[]"]:checked').each(function() {
      id.push(this.value);
    });
    var html = "";
    for (var i = 0; i < id.length; i++) {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/user/data_kabupaten/" + id[i],
        type: "GET",
        dataType: "JSON",
        success: function(respond) {
          for (var a = 0; a < respond.length; a++) {
            html += `
              <tr>
                <td><input type="checkbox" value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
                <td>${respond[a]['kabupaten_nama']}</td>
              </tr>`;
          }
          $("#asm_table_kabupaten").html(html);
        }
      });
    }
  }

  function edit_sales_engineer_change_provinsi() {
    var id_provinsi = $("#edit_select_provinsi").val();
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/data_kabupaten/" + id_provinsi,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "<option value = 'none'>---- Pilih Kabupaten ----</option>";
        for (var a = 0; a < respond.length; a++) {
          html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
        }
        $("#edit_select_kabupaten").html(html);
      }
    });
  }

  function edit_sales_engineer_change_kabupaten() {
    var id_kabupaten = $("#edit_select_kabupaten").val();
    if (id_kabupaten != "none") {
      respond = load_unselected_rs(content[active_row]["id_pk_user"], id_kabupaten);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" value="${respond[a]['id_pk_rs']}" name = "se_rs[]"></td>
            <td>${respond[a]['rs_nama']}</td>
            <td>${respond[a]['rs_kelas']}</td>
            <td>${respond[a]['rs_alamat']}</td>
            <td>${respond[a]['rs_kategori']}</td>
          </tr>`;
      }
      $("#edit_se_table_rs_unassigned").html(html);
      $("#edit_se_table_rs").html("");
    }
  }


  function edit_asm_change_provinsi() {
    var id = [];
    var values = $('input[name="asm_provinsi[]"]:checked').each(function() {
      id.push(this.value);
    });
    var html = "";
    for (var i = 0; i < id.length; i++) {
      respond = load_unselected_kabupaten(content[active_row]["id_pk_user"], id[i]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
        <tr>
          <td><input type="checkbox" value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
          <td>${respond[a]['kabupaten_nama']}</td>
        </tr>`;
      }
      $("#edit_asm_table_kabupaten_unassigned").html(html);
      $("#edit_se_table_kabupaten_unassigned").html(html);
    }
  }

  function remove_supervisee(id_supervisee) {
    if (confirm("Apakah Anda yakin akan menghapus supervisee ini?")) {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/user/delete_supervisee/" + id_supervisee,
        type: "DELETE",
        dataType: "JSON",
        success: function(respond) {
          alert(respond["msg"]);
          if (respond["status"]) {
            $(`#row${id_supervisee}`).remove();
            reload_content(); /*untuk update current supervisornya*/
          }
        }
      });
    }
  }
</script>
<script>
  var base_url = "<?php echo base_url(); ?>";
  var kolom_pengurutan = "id_pk_user";
  var arah_kolom_pengurutan = "ASC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var ctrl = "user";
  var content = [];
  reload_table();

  function change_kolom_pengurutan() {
    var pengurutan = $("#kolom_pengurutan").val();
    kolom_pengurutan = pengurutan;
    reload_table();
  }

  function change_arah_pengurutan() {
    var urutan = $("#urutan_kolom").val();
    arah_kolom_pengurutan = urutan;
    reload_table();
  }

  function change_pencarian() {
    var pencarian = $("#pencarian").val();
    pencarian_phrase = pencarian;
    reload_table();
  }

  function change_pencarian_kolom() {
    var pencarian_kolom = $("#pencarian_kolom").val();
    kolom_pencarian = pencarian_kolom;
    reload_table();
  }

  function change_pagination(page) {
    current_page = page;
    reload_table();
  }

  function reload_table() {
    var url = `<?php echo base_url(); ?>ws/${ctrl}/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          var html_status = "";
          if (respond["data"][a]["user_status"].toLowerCase() == "aktif") {
            html_status = `<button type = "button" class = "btn btn-success btn-sm">${respond["data"][a]["user_status"].toUpperCase()}</button>`;
          } else if (respond["data"][a]["user_status"].toLowerCase() == "nonaktif" || respond["data"][a]["user_status"].toLowerCase() == "deleted") {
            html_status = `<button type = "button" class = "btn btn-danger btn-sm">${respond["data"][a]["user_status"].toUpperCase()}</button>`;
          }
          html += `
          <tr class = "user_row" id = "user_row${a}">
            <td>${respond["data"][a]["user_role"]}</td>
            <td>${respond["data"][a]["user_username"]}</td>
            <td>${respond["data"][a]["user_email"]}</td>
            <td>${respond["data"][a]["user_telepon"]}</td>
            <td>${html_status}</td>
            <td>
              <button type = "button" class = "btn btn-primary btn-sm" onclick = "load_edit(${a})" data-toggle="modal" data-target = "#modalUpdateUser"><i class = "icon md-edit"></i></button>
              <!-- Delete -->
              <button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})" data-toggle="modal" data-target = "#modalDeleteUser"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
          `;
        }
        $("#table_content_container").html(html);
        pagination(respond["page"]);
      }
    })

  }

  function pagination(page_rules) {
    html = "";
    if (page_rules["previous"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["before"]) + ')"><</a></li>';
    } else {
      html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
    }
    if (page_rules["first"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["first"]) + ')">' + (page_rules["first"]) + '</a></li>';
      html += '<li class="page-item"><a class="page-link">...</a></li>';
    }
    if (page_rules["before"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["before"]) + ')">' + page_rules["before"] + '</a></li>';
    }
    html += '<li class="page-item active"><a class="page-link" onclick = "change_pagination(' + (page_rules["current"]) + ')">' + page_rules["current"] + '</a></li>';
    if (page_rules["after"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["after"]) + ')">' + page_rules["after"] + '</a></li>';
    }
    if (page_rules["last"]) {
      html += '<li class="page-item"><a class="page-link">...</a></li>';
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["last"]) + ')">' + page_rules["last"] + '</a></li>';
    }
    if (page_rules["next"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["after"]) + ')">></a></li>';
    } else {
      html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
    }
    $(".pagination").html(html);
  }
</script>
<script>
  function insert_row() {
    var fd = new FormData($("#insert_form")[0]);
    $.ajax({
      url: `${base_url}ws/user/insert/`,
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        alert(respond["msg"]);
        if (respond["status"]) {
          $("#modalTambahUser").modal("hide");
          reload_table();
        }
      }
    });
  }

  function update_row() {
    var fd = new FormData($("#update_form")[0]);
    $.ajax({
      url: `${base_url}ws/user/update/`,
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        alert(respond["msg"]);
        if (respond["status"]) {
          $("#modalUpdateUser").modal("hide");
          reload_table();
        }
      }
    });
  }

  function delete_row(row) {
    var id_user = content[row]["id_pk_user"];
    $.ajax({
      url: `${base_url}ws/user/delete/${id_user}`,
      type: 'DELETE',
      dataType: "JSON",
      success: function(respond) {
        alert(respond["msg"]);
        if (respond["status"]) {
          $("#modalDeleteUser").modal("hide");
          reload_table();
        }
      }
    });
  }
  var active_row = 0;

  function load_delete(row) {
    $("#delete_button").attr("onclick", `delete_row(${row})`);
    $("#modalDeleteUser").modal("show");
  }

  function load_edit(row) {
    active_row = row;
    $("#edit_id_user").val(content[row]["id_pk_user"]);
    $("#edit_username").val(content[row]["user_username"]);
    $("#edit_email").val(content[row]["user_email"]);
    $("#edit_telepon").val(content[row]["user_telepon"]);
    $("#edit_role").val(content[row]["user_role"].trim());

    if (content[row]["user_role"].trim() == "Sales Engineer") {
      $("#edit_div_supervisor").hide();
      $("#edit_div_asm").hide();
      $("#edit_div_sales_engineer").show();
      $("#edit_div_sm").hide();

      supervisor_list = load_supervisor(content[row]["user_role"]);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_edit").html(html);

      $("#supervisor_list_container_edit").val(content[row]["user_supervisor"]);

      var respond = "";
      var html = "";
      var id_provinsi = 0;

      respond = load_selected_provinsi(content[row]["id_pk_user"]);
      html_prov = "";
      for (var a = 0; a < respond.length; a++) {
        html_prov += `
          <tr>
            <td><input type="checkbox" checked onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>
        `;
        $("#edit_se_provinsi").val(respond[a]["id_fk_provinsi"]);
      }
      $("#edit_se_table_provinsi").html(html_prov);
      respond = load_unselected_provinsi(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>`;
      }
      $("#edit_se_table_provinsi_unassigned").html(html);
      // $("#edit_se_table_rs_unassigned").html(html);


      respond = load_selected_kabupaten(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" checked value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
            <td>${respond[a]['kabupaten_nama']}</td>
          </tr>`;
      }

      $("#edit_se_table_kabupaten").html(html);

      id_provinsi = respond[0]["id_fk_provinsi"];

      respond = load_unselected_kabupaten(content[row]["id_pk_user"], id_provinsi);
      html = "";
      for (var b = 0; b < respond.length; b++) {
        html += `
          <tr>
            <td><input type="checkbox" value="${respond[b]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
            <td>${respond[b]['kabupaten_nama']}</td>
          </tr>`;
      }
      $("#edit_se_table_kabupaten_unassigned").html(html);


    } else if (content[row]["user_role"].trim() == "Area Sales Manager") {
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_asm").show();
      $("#edit_div_supervisor").hide();
      $("#edit_div_sm").hide();


      supervisor_list = load_supervisor(content[row]["user_role"]);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm_edit").html(html);
      $("#supervisor_list_container_asm_edit").val(content[row]["user_supervisor"]);

      var respond = "";
      var html = "";
      var id_provinsi = 0;

      respond = load_selected_kabupaten_asm(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <!-- <td><input type="checkbox" checked value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td> -->
            <td>${respond[a]['kabupaten_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_kabupaten").html(html);

      respond = load_selected_provinsi_asm(content[row]["id_pk_user"]);
      html_prov = "";
      for (var a = 0; a < respond.length; a++) {
        html_prov += `
          <tr>
            <td><input type="checkbox" checked onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>`;
      }

      $("#edit_asm_table_provinsi").html(html_prov);

      $("#edit_asm_provinsi").val(respond[0]["id_fk_provinsi"]);
      id_provinsi = respond[0]["id_fk_provinsi"];

      respond = load_unselected_kabupaten_asm(content[row]["id_pk_user"], id_provinsi);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
            <td>${respond[a]['kabupaten_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_kabupaten_unassigned").html(html);

      respond = load_unselected_provinsi_asm(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_provinsi_unassigned").html(html);

      respond = load_supervisee(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr id = "row${respond[a]["id_pk_user"]}">
            <td>${respond[a]['user_username']}</td>
            <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "remove_supervisee(${respond[a]["id_pk_user"]})"><i class = "icon md-delete"></i></button></td>
          </tr>`;
      }
      $("#supervisee_list_container_asm_edit").html(html);
    } else if (content[row]["user_role"].trim() == "Supervisor") {
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_supervisor").show();
      $("#edit_div_asm").hide();
      $("#edit_div_sm").hide();


      supervisor_list = load_supervisor(content[row]["user_role"]);
      var html = "<option value = 0 disabled>Pilih Supervisor</option>";
      for (var a = 0; a < supervisor_list.length; a++) {
        html += `<option value = "${supervisor_list[a]["id_pk_user"]}">${supervisor_list[a]["user_username"]} - ${supervisor_list[a]["user_role"]}</option>`;
      }
      $("#supervisor_list_container_asm_edit").html(html);
      $("#supervisor_list_container_asm_edit").val(content[row]["user_supervisor"]);

      var respond = "";
      var html = "";
      var id_provinsi = 0;

      respond = load_selected_kabupaten(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" checked value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
            <td>${respond[a]['kabupaten_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_kabupaten").html(html);

      respond = load_selected_provinsi(content[row]["id_pk_user"]);
      html_prov = "";
      for (var a = 0; a < respond.length; a++) {
        html_prov += `
          <tr>
            <td><input type="checkbox" checked onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>`;
      }

      $("#edit_asm_table_provinsi").html(html_prov);

      $("#edit_asm_provinsi").val(respond[0]["id_fk_provinsi"]);
      id_provinsi = respond[0]["id_fk_provinsi"];

      respond = load_unselected_kabupaten(content[row]["id_pk_user"], id_provinsi);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" value="${respond[a]['id_pk_kabupaten']}" name = "asm_kabupaten[]"></td>
            <td>${respond[a]['kabupaten_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_kabupaten_unassigned").html(html);

      respond = load_unselected_provinsi(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr>
            <td><input type="checkbox" onchange="edit_asm_change_provinsi()" value="${respond[a]['id_pk_provinsi']}" name = "asm_provinsi[]"></td>
            <td>${respond[a]['provinsi_nama']}</td>
          </tr>`;
      }
      $("#edit_asm_table_provinsi_unassigned").html(html);

      respond = load_supervisee(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr id = "row${respond[a]["id_pk_user"]}">
            <td>${respond[a]['user_username']}</td>
            <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "remove_supervisee(${respond[a]["id_pk_user"]})"><i class = "icon md-delete"></i></button></td>
          </tr>`;
      }
      $("#supervisee_list_container_asm_edit").html(html);
    } else {
      $("#edit_div_sales_engineer").hide();
      $("#edit_div_supervisor").hide();
      $("#edit_div_asm").hide();
      $("#edit_div_sm").show();

      respond = load_supervisee(content[row]["id_pk_user"]);
      html = "";
      for (var a = 0; a < respond.length; a++) {
        html += `
          <tr id = "row${respond[a]["id_pk_user"]}">
            <td>${respond[a]['user_username']}</td>
            <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "remove_supervisee(${respond[a]["id_pk_user"]})"><i class = "icon md-delete"></i></button></td>
          </tr>`;
      }
      $("#supervisee_list_container_sm_edit").html(html);
    }
  }

  function load_selected_rs(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_selected_rs/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_unselected_rs(id_user, id_kabupaten) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_unselected_rs/${id_user}/${id_kabupaten}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_selected_kabupaten(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_selected_kabupaten/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_selected_kabupaten_asm(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_selected_kabupaten_asm/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_selected_provinsi(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_selected_provinsi/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_selected_provinsi_asm(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_selected_provinsi_asm/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_unselected_kabupaten(id_user, id_provinsi) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_unselected_kabupaten/${id_user}/${id_provinsi}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_unselected_kabupaten_asm(id_user, id_provinsi) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_unselected_kabupaten_asm/${id_user}/${id_provinsi}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_unselected_provinsi(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_unselected_provinsi/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_unselected_provinsi_asm(id_user) {
    var response_return = "";
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/get_unselected_provinsi_asm/${id_user}`,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_kabupaten(id_provinsi) {
    var response_return = "";
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/data_kabupaten/" + id_provinsi,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        response_return = respond;
      }
    });
    return response_return;
  }

  function load_supervisor(jabatan) {
    var response_return = [];
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/get_supervisor_candidate/" + jabatan,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        if (respond["status"]) {
          response_return = respond["content"];
        }
      }
    });
    return response_return;
  }

  function load_supervisee(id_user) {
    var response_return = [];
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/get_supervisee/" + id_user,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(respond) {
        if (respond["status"]) {
          response_return = respond["content"];
        }
      }
    });
    return response_return;
  }

  function reload_content() {
    var url = `<?php echo base_url(); ?>ws/${ctrl}/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
      }
    });
  }
</script>