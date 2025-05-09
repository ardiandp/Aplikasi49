<?php 
if ($rows['proses']=='0'){ 
  $proses = '<i class="text-danger">Pending</i>'; 
}elseif ($rows['proses']=='4'){
  $proses = '<i class="text-success">Proses</i>'; 
}elseif ($rows['proses']=='2'){
  $proses = '<i class="text-info">Konfirmasi</i>'; 
}
?>
<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Detail Transaksi Penjualan</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url(); ?>administrator/penjualan'>Kembali</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='140px' scope='row'>Kode Pembelian</th>  <td><?php echo "$rows[kode_transaksi]"; ?></td></tr>
                    <tr><th scope='row'>Nama Reseller</th>                 <td><?php echo "$rows[nama_reseller]"; ?></td></tr>
                    <tr><th scope='row'>Waktu Transaksi</th>               <td><?php echo "$rows[waktu_transaksi]"; ?></td></tr>
                    <tr><th scope='row'>Status</th>                        <td><?php echo "$proses"; ?>
                    </td></tr>
                  </tbody>
                  </table>
                  <hr>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Jumlah Jual</th>
                        <th>Satuan</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
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
                          </tr>";
                      $no++;
                    }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='".$this->uri->segment(3)."'")->row_array();
                    echo "<tr class='success'>
                            <td colspan='6'><b>Total</b></td>
                            <td><b>Rp ".rupiah($total['total'])."</b></td>
                          </tr>";
                  ?>
                  </tbody>
                </table><br>
                <?php 
                    if ($rows['proses']=='0'){
                      echo "<a style='margin:0px 3px' class='btn btn-primary btn-sm' title='Proses Data' href='".base_url()."administrator/proses_penjualan/$rows[id_penjualan]/4' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Proses dan stok Penjual (Pembeli) akan otomatis bertambah sesuai dengan orderannya ini?')\"><span class='glyphicon glyphicon-star-empty'></span> Proses Pembelian</a>";
                    }elseif ($rows['proses']=='1'){
                      echo "<a style='margin:0px 3px' class='btn btn-default btn-sm' title='Data sudah diproses' href='#' onclick=\"return confirm('Maaf, Data ini sudah di proses,..')\"><span class='glyphicon glyphicon-star text-yellow'></span>  Proses Pembelian</a>";
                    }elseif ($rows['proses']=='2'){
                      echo "<a style='margin:0px 3px' class='btn btn-primary btn-sm' title='Konfirmasi Proses  Data' href='".base_url()."administrator/proses_penjualan/$rows[id_penjualan]/1' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Proses dan stok Penjual (Pembeli) akan otomatis bertambah sesuai dengan orderannya ini?')\"><span class='glyphicon glyphicon-star text-yellow'></span> Proses Pembelian</a>";
                    }
                  ?>
              </div>