<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Images Slide</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_imagesslider',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_slide]'>
                    <tr><th width='120px' scope='row'>Judul</th>   <td><input class='form-control' value='".($rows_slider=="" ? '' : $rows_slider->judul)."' name='a1'></td></tr>
                    <tr><th width='120px' scope='row'>Sub-Judul</th>   <td><input class='form-control' value='".($rows_slider=="" ? '' : $rows_slider->subjudul)."' name='a2'></tr>
                    <tr><th width='120px' scope='row'>Deskripsi</th>   <td><textarea class='form-control' name='a3' style='height:100px'>".($rows_slider=="" ? '' : $rows_slider->subjudul)."</textarea></tr>
                    <tr><th width='120px' scope='row'>Video</th>   <td><input class='form-control' name='a4' value='".($rows_slider=="" ? '' : $rows_slider->video)."'></td></tr>
                    <tr><th scope='row'>Ganti Gambar</th>                    <td><input type='file' class='form-control' name='b'><hr style='margin:5px'>
                                                                                 <img class='img-thumbnail' style='height:80px' src='".base_url()."asset/foto_slide/$rows[gambar]'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
