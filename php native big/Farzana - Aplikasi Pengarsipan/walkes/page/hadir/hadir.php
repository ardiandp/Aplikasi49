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
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Data Ketidakhadiran</h3>
									</div>
                                </header>
				
                <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div id='collapseOne' class='accordion-body collapse in body'>
                        </div>
                        <div class='panel-body'>
                         <a href="?page=hadir&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                            <div class='table-responsive'>
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
											
                                                <th><div align='center'>Nama Siswa</th></div>
                                                <th><div align='center'>Kelas</th></div>
                                                <th><div align='center'>Sakit</th></div>
                                                <th><div align='center'>Izin</th></div>
                                                <th><div align='center'>Tanpa Keterangan</th></div>
                                                <th><div align='center'>Action</th></div>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <?php
																				
                                   $query=mysqli_query($db, "SELECT ketidakhadiran.*,siswa.*,kelas.* FROM ketidakhadiran INNER JOIN siswa ON ketidakhadiran.nis=siswa.nis INNER JOIN kelas ON ketidakhadiran.kdkelas=kelas.kdkelas WHERE id_hadir")
                                        or die('Ada kesalahan pada query hadir: '.mysqli_error($db));
									while ($data = mysqli_fetch_assoc($query))
                                    {
                                    
                                    $id_hadir =$data['id_hadir'];   
                                    $nama= $data['nama'];
                                    $kelas= $data['namakelas'];
                                    $sakit= $data['sakit'];
                                    $izin= $data['izin'];
                                    $ket= $data['tanpa_ket'];
                                    
                                    echo"<tr>
									
                                          <td>$nama</td>
                                          <td><div align='center'>$kelas</td></div>
                                          <td><div align='center'>$sakit</td></div>
                                          <td><div align='center'>$izin</td></div>
                                          <td><div align='center'>$ket</td></div>
                                         <td><div align='center'><a href='?page=hadir&aksi=ubah&id_hadir=$data[id_hadir]'><button class='btn btn-primary'> 
										  <i class='fa fa-edit'></i></button></a> <a href='?page=hadir&aksi=hapus&id_hadir=$data[id_hadir]'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
										  </td></div>
                                        </tr>"; ?>

                                    <?php } ?>
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