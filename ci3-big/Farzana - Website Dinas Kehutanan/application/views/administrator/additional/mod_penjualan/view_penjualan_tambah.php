            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah Transaksi Penjualan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  $attributes = array('class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('administrator/tambah_penjualan',$attributes); 
                  if ($rows['kode_transaksi']==''){
                    $kode_transaksi = 'TRX-'.date('YmdHis');
                  }else{
                    $kode_transaksi = $rows['kode_transaksi'];
                  }
                ?>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='140px' scope='row'>Kode penjualan</th>  <td><input type='text' class='form-control' value='<?php echo "$kode_transaksi"; ?>' name='a'></td></tr>
                    <tr><th scope='row'>Nama Penjual</th>                 <td><select class='form-control' name='b'>
                                                                                <option value='' selected></option>
                                                                                <?php 
                                                                                  foreach ($reseller as $r){
                                                                                    if ($r['id_reseller']==$rows['id_reseller']){
                                                                                      echo "<option value='$r[id_reseller]' selected>$r[nama_reseller]</option>";
                                                                                    }else{
                                                                                      echo "<option value='$r[id_reseller]'>$r[nama_reseller]</option>";
                                                                                    }
                                                                                  }
                                                                                ?>
                                                                               </select></td></tr>
                  </tbody>
                  </table>
                  <input class='btn btn-primary btn-sm' type="submit" name='submit1' value='Simpan Data'>
                  <?php if ($this->session->idp !=''){ ?>
                  <a class='btn btn-default btn-sm' href='<?php echo base_url(); ?>administrator/penjualan'>Selesai / Kembali</a>
                  <hr>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Nama Produk</th>
                        <th width='120px'>Harga Jual</th>
                        <th width='120px'>Diskon</th>
                        <th width='80px'>Jumlah</th>
                        <th width='80px'>Satuan</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php 
                        echo "<tr>
                                <td></td>
                                <input type='hidden' value='".$this->uri->segment(3)."' name='idpd'>
                                <td><select name='aa' class='combobox form-control' onchange=\"changeValue(this.value)\" autofocus>
                                                                      <option value='' selected> Cari Barang </option>";
                                                                      $jsArray = "var prdName = new Array();\n";    
                                                                      foreach ($barang as $r){
                                                                        if ($r['id_produk']==$row['id_produk']){
                                                                          echo "<option value='$r[id_produk]' selected>$r[nama_produk]</option>";
                                                                          $jsArray .= "prdName['" . $r['id_produk'] . "'] = {name:'" . addslashes($r['harga_reseller']) . "',desc:'".addslashes($r['satuan'])."'};\n";
                                                                        }else{
                                                                          echo "<option value='$r[id_produk]'>$r[nama_produk]</option>";
                                                                          $jsArray .= "prdName['" . $r['id_produk'] . "'] = {name:'" . addslashes($r['harga_reseller']) . "',desc:'".addslashes($r['satuan'])."'};\n";
                                                                        }
                                                                      }
                                                                   echo "</select></td>
                                <td><input class='form-control' type='number' name='bb' value='$row[harga_jual]' id='harga'> </td>
                                <td><input class='form-control' type='number' name='cc' value='$row[diskon]'></td>
                                <td><input class='form-control' type='number' name='dd' value='$row[jumlah]'></td>
                                <td><input class='form-control' type='text' name='ee' id='satuan' value='$row[satuan]' readonly='on'> </td>
                                <td></td>
                                <td><button type='submit' name='submit' class='btn btn-success  btn-xs'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/tambah_penjualan'><span class='glyphicon glyphicon-remove'></span></a>
                                </td>
                              </tr>";
                      ?>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $sub_total = ($row['harga_jual']*$row['jumlah'])-$row['diskon'];
                    echo "<tr><td>$no</td>
                              <td>$row[nama_produk]</td>
                              <td>Rp ".rupiah($row['harga_jual'])."</td>
                              <td>Rp ".rupiah($row['diskon'])."</td>
                              <td>$row[jumlah]</td>
                              <td>$row[satuan]</td>
                              <td>Rp ".rupiah($sub_total)."</td>
                              <td>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."administrator/tambah_penjualan/$row[id_penjualan_detail]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_penjualan_tambah_detail/$row[id_penjualan_detail]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </td>
                          </tr>";
                      $no++;
                    }

                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='".$this->session->idp."'")->row_array();
                    echo "<tr class='success'>
                            <td colspan='6'><b>Total</b></td>
                            <td><b>Rp ".rupiah($total['total'])."</b></td>
                          </tr>";
                  ?>
                  </tbody>
                </table>
                <?php } ?>
                </div>
                </div>
                </div>

              </div>
              

<script type="text/javascript">    
<?php echo $jsArray; ?>  
  function changeValue(id){  
    document.getElementById('harga').value = prdName[id].name;  
    document.getElementById('satuan').value = prdName[id].desc;  
  };  
</script> 