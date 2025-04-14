<?php
    require_once "../config/koneksi.php";
?>
		<!--PAGE CONTENT -->

		<div id='content'>
            <div class='inner'>
                <div class='row'>
                        <div class='col-lg-12'>
                            <div class='box1'>
                                <header>
                                  <div class="panel panel-success">
									<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star"></i> Data Ekstrakurikuler</h3> 
									</div>
                                </header>
				
                <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div id='collapseOne' class='accordion-body collapse in body'>
                        </div>
                        <div class='panel-body'>
                         <a href="?page=ekstra&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                            <div class='table-responsive'>
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
											<th><div align='center'>NO</th></div>
                                            <th><div align='center'>NIS</th></div>
                                            <th><div align='center'>Nama Siswa</th></div>
                                            <th><div align='center'>Kelas</th></div>
                                            <th><div align='center'>Kegiatan Ekstrakurikuler</th></div>
                                            <th><div align='center'>Keterangan</th></div>
                                            <th><div align='center'>Action</th></div>
                                        </tr>
						              
                                    </thead>
                                    <tbody>
                                        <?php
										$no=1;
					
                                    $query=mysqli_query($db, "SELECT ekstra.id_ekstra, siswa.nis, siswa.nama,kelas.kdkelas,kelas.namakelas,ekstra.nama_ekstra,ekstra.ket FROM ekstra JOIN siswa ON ekstra.nis=siswa.nis JOIN kelas ON ekstra.kdkelas=kelas.kdkelas WHERE id_ekstra")
                                        or die('Ada kesalahan pada query ekstra: '.mysqli_error($db));
									while ($data = mysqli_fetch_assoc($query))
                                    {
                                    $id_ekstra =$data['id_ekstra'];
                                    $nis=$data['nis'];
                                    $nama=$data['nama'];
                                    $kelas=$data['namakelas'];    
                                    $nama_ekstra= $data['nama_ekstra'];
                                    $ket= $data['ket'];
                                    
                                    echo"<tr>
											<td>$no</td>
                                          <td>$nis</td>
                                          <td>$nama</td>
                                          <td>$kelas</td>
                                          <td>$nama_ekstra</td>
                                          <td>$ket</td>
                                          <td><div align='center'><a href='?page=ekstra&aksi=ubah&id_ekstra=$data[id_ekstra]'><button class='btn btn-primary'> 
										  <i class='fa fa-edit'></i></button></a> <a href='?page=ekstra&aksi=hapus&id_ekstra=$data[id_ekstra]'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
										  </td></div>
                                        </tr>"; ?>

                                    <?php 
                                    $no++;
									} ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
                        <!--END PAGE CONTENT -->
                    </div>
    
 <?php   
// tutup koneksi
mysqli_close($db);   
?>

  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>