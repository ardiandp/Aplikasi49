            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">History Pembayaran Reward</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Penjual</th>
                        <th>Keterangan Reward</th>
                        <th>Waktu Pencairan</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_reseller]</td>
                              <td>$row[reward]</td>
                              <td>$row[waktu_pencairan]</td>
                              <td><center>
                              <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_history_reward/$row[id_pencairan_reward]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>