<?php  
require_once "config/koneksi.php";

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Matapelajaran </h3> 
                        </div>

                        <div class="panel-body">
                         <!-- tombol tambah data -->
                           <a href="?page=Matapelajaran&aksi=tambah" class="btn btn-info" style="margin-top: 5px; ">Tambah Data<i class="fa fa-arrow-circle-right"></i></a>
                       </div>

                        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr class="bg-aqua text-blak">
                    <th>NO</th>
                    <th>Kdmapel</th>
                    <th>Namamapel</th>
                    <th>Tools</th>
            </thead>

            <tbody>
            <?php
                $no =1;
                $query=mysqli_query($db, "SELECT * FROM matapelajaran  WHERE kdmapel")
                    or die('Ada kesalahan pada query matapelajaran: '.mysqli_error($db));
                                    while ($data = mysqli_fetch_assoc($query))

                                    { ?>
                                     <tr>
                                      <td width="10" class="center"><?php echo $no; ?></td>
                                        <td width="50"><?php echo $data['kdmapel']; ?></td>
                                        <td width="50"><?php echo $data['namamapel']; ?></td>

                    <td width="50" class="center">
                       <a title="Ubah" class="btn btn-info" href="?page=Matapelajaran&aksi=ubah&kdmapel=<?php echo $data['kdmapel']; ?>"><i class="fa fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-danger" href="?page=Matapelajaran&aksi=hapus&kdmapel=<?php echo $data['kdmapel']; ?>" onclick="return confirm('Anda yakin ingin menghapus matapelajaran <?php echo $data['namamapel']; ?>?');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
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

