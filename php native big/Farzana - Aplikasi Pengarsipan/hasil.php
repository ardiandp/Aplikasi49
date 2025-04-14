<?php

include 'config/koneksi.php';
$nama_dokumen='Daftar Nilai Siswa SD Inpres Naibonat';
define('_MPDF_PATH','mpdf60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', '', 10.5, 'arial');
$mpdf->SetDisplayMode('fullpage');
ob_start();
?>
<style type="text/css">
    table{
        margin: auto;
    }
    td,th{
        padding: 5px;
        text-align: center;
        width: 150px;
    }
    h1{
        text-align: center;
    }
    th{
        background-color:#80ced6;
        padding: 10px;
        color: #fff 
    }
</style>
<?php
include"config/koneksi.php";
$nis =$_GET['nis'];
$query=mysqli_query($db, "SELECT * FROM siswa WHERE nis='$nis'");
?>

                                    <th><div align="center" class="style2"><strong>RAPOR DAN PROFIL PESERTA DIDIK</strong></div></th><br><br>


                                    <?php
                                    $query=mysqli_query($db, "SELECT siswa.*, kelas.* FROM siswa INNER JOIN kelas ON siswa.kdkelas=kelas.kdkelas WHERE nis='$nis'")
                                           or die('Ada kesalahan pada query siswa: '.mysqli_error($db));
                                     while ($data = mysqli_fetch_array($query))
                                    { 
                                    $nis         =$data['nis'];
                                    $nama        =$data['nama'];
                                    $namakelas       =$data['namakelas'];
                                    $tahun_ajaran    =$data['tahun_ajaran'];
                                    $semester    =$data['semester'];

                                    echo "<tr>
                                          <td>Nama Peserta Didik  : <b>$nama</b></td><br>
                                          <td>NIS                 : $nis </td><br>
                                           <td>Kelas              : $namakelas</td><br>
                                           <td>Tahun Angkatan     : $tahun_ajaran</td></td><br>
                                           <td>Nama Sekolah       : SMP ANGKASA</td> <br>
                                           <td>Alamat Sekolah     : Jln. Adisucipto, Penfui</td>
                                          </tr>"
                                          ;
                                    }
                                    echo"
                                    </table>";
                                    ?>
                                    <br><br>

                                      <b>A.Sikap</b>

                                      <table width="843" border="1">
                                          <tr style="font-weight: Bold;">
                                              <th colspan='3' class='p-3' style="border: 3px solid #2a2a2a;"><center>Deskripsi</center></th>
                                          </tr>
                                          <?php
                                          $query=mysqli_query($db,"SELECT * FROM siswa WHERE nis='$nis'")
                                          or die('Ada kesalahan pada query siswa: '.mysqli_error($db));
                                         while ($data = mysqli_fetch_array($query))
                                          echo"<tr>
                                              <td class='p-3' style='border: 3px solid #2a2a2a;'>$no 1</td>
                                              <td class='p-3' style='border: 3px solid #2a2a2a;'>Sikap Spiritual :</td>
                                              <td class='p-3' style='border: 3px solid #2a2a2a;'>Ananda $nama Sangat Taat Beribadah, Sangat berprilaku Syukur, Selalu Berdoa Sebelum Kegiatan, sangat bertoleransi Beragama</td>
                                            </tr>";
                                             echo"<tr>
                                             <td class='p-3' style='border: 3px solid #2a2a2a;'>$no 2</td>
                                               <td class='p-3' style='border: 3px solid #2a2a2a;'>Sikap Sosial :</td>
                                               <td class='p-3' style='border: 3px solid #2a2a2a;'>Ananda $nama Sangat Jujur, sangat Percaya Diri, sangat santun, sangat peduli dan tanggung jawab dan sangat disiplin</td>
                                             </tr>";
                                          ?>
                                      </table> 
                                      <br><br>

                                    <b>B. Nilai Pengetahuan dan Nilai Ketrampilan</b>
                                    <table width="843" border="1">
                                        <tr  style="font-weight: Bold;">
                                          <th class='p-3' style="border: 3px solid #2a2a2a;" rowspan="2">No</th>
                                          <th width="115" rowspan="2" scope="col">Mata Pelajaran </th>h>
                                          <th colspan="3" scope="col">Nilai Pengetahuan </th>
                                          <th colspan="4" scope="col">Nilai Ketrampilan </th>
                                        </tr>
                                        <tr  style="font-weight: Bold;">
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Nilai</td>
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Pred</td>
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Deskripsi</td>
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Nilai</td>
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Pred</td>
                                          <td class='p-3' style="border: 3px solid #2a2a2a;">Deskripsi</td>
                                        </tr>
                                    <?php
                                    $no=1;
                                    $query=mysqli_query($db,"SELECT nilai.*, siswa.*, matapelajaran.* FROM nilai INNER JOIN siswa ON nilai.nis=siswa.nis INNER JOIN matapelajaran ON nilai.kdmapel=matapelajaran.kdmapel WHERE siswa.nis='$nis'")
                                          or die('Ada kesalahan pada query nilai: '.mysqli_error($db));
                                    while($data =mysqli_fetch_array($query))
                                    {
                                    $kdnilai     =$data['kdnilai'];
                                    $nama        =$data['nama'];
                                    $namamapel   =$data['namamapel'];
                                    $semester    =$data['semester'];
                                    $kb          =$data['kb']; 
                                    $npeng      =$data['npeng'];
                                    $predikat    =$data['predikat'];
                                    $deskrip     =$data['deskrip'];
                                    $nketram    =$data['nketram'];
                                    $pred        =$data['pred'];
                                    $deskripsi   =$data['deskripsi'];
                                    
                                    echo"
                                    <tr>
                                        <td><div align='center'>$no</td></div>
                                          <td><div align='center'>$namamapel</td></div>
                                          <td><div align='center'>$npeng</td></div>
                                          <td><div align='center'>$predikat</td></div>
                                          <td><div align='center'>Ananda $nama $deskrip</td></div>
                                          <td><div align='center'>$nketram</td></div>
                                          <td><div align='center'>$pred</td></div>
                                          <td><div align='left'>Ananda $nama $deskripsi</td></div>

                                    </tr>";
                                    $no++;
                                    }
                                    echo"
                                    
                                </table>";  ?>
                                <br><br>
                                <b>C. Ekstrakurikuler</b>
                                <table width="732" border="1" align="left">
                                    <tr>
                                      <th width="337" scope="col">No</th>
                                      <th width="337" scope="col">Kegiatan Ekstrakurikuler </th>
                                      <th width="495" scope="col">Keterangan</th>
                                    </tr>
                                    <?php
                                    $no=1;
                                    $query=mysqli_query($db, "SELECT * FROM ekstra WHERE nis='$nis' ")
                                           or die('Ada kesalahan pada query ekstra: '.mysqli_error($db));
                                    while($data = mysqli_fetch_array($query))
                                    { 
                                    $id_ekstra   =$data['id_ekstra'];
                                    $nama_ekstra =$data['nama_ekstra'];
                                    $ket         =$data['ket'];
                                    echo"<tr>
                                        <td><div align='center'>$no</td></div>
                                          <td><div align='center'>$nama_ekstra</td></div>
                                          <td><div align='center'>$ket</td></div>
                                        </tr>";
                                        $no++;
                                    }
                                    echo"                  
                                </table>"; ?>
                                 <br><br>
                                 <b>D.Saran</b>
                                  <table class="" style="width: 100%;">
                                    <tr>
                                      <td class='p-3' style='border: 3px solid #2a2a2a;'>
                                      Ananda selama satu semester masih kurang dalam konsentrasi belajarnya, kurangi bicara ketika pembelajaran. Mohon ulangi terus pelajaran yang sudah ananda peroleh di sekolah ketika di rumah
                                        <br></td>
                                    </tr>
                                </table>
                                <br><br>
                                <b>E. Kondisi Kesehatan</b>
                                <table width="848" border="1">
                                    <tr>
                                      <th width="241" scope="col">No</th>
                                      <th width="241" scope="col">Aspek Fisik</th>
                                      <th width="284" scope="col">Keterangan</th>
                                    </tr>
                                    <?php
                                    $no=1;
                                     $query=mysqli_query($db, "SELECT * FROM kondisi_sehta WHERE nis='$nis' ")
                                             or die('Ada kesalahan pada query kondisi: '.mysqli_error($db));
                                    while($data =mysqli_fetch_array($query))
                                    {
                                    $id_sehat    =$data['id_sehat'];
                                    $fisik       =$data['fisik'];
                                    $ket        =$data['ket'];
                                    echo"
                                    <tr>
                                          <td><div align='center'>$no</td></div>
                                          <td><div align='center'>$fisik</td></div>
                                          <td><div align='center'>$ket</td></div>
                                        </tr>";
                                        $no++;
                                    }
                                    echo"
                                </table>"; ?>
                                 <br><br>
                                <b>F. Prestasi</b>
                                <table width="848" border="1">
                                    <tr>
                                      <th width="241" scope="col">No</th>
                                      <th width="241" scope="col">Jenis Prestasi</th>
                                      <th width="284" scope="col">Keterangan</th>
                                    </tr>
                                    <?php
                                    $no=1;
                                     $query=mysqli_query($db, "SELECT * FROM prestasi WHERE nis='$nis' ")
                                             or die('Ada kesalahan pada query prestasi: '.mysqli_error($db));
                                    while($data =mysqli_fetch_array($query))
                                    {
                                    $id_prestasi    =$data['id_prestasi'];
                                    $prestasi =$data['prestasi'];
                                    $ket        =$data['ket'];
                                    echo"
                                    <tr>
                                          <td><div align='center'>$no</td></div>
                                          <td><div align='center'>$prestasi</td></div>
                                          <td><div align='center'>$ket</td></div>
                                        </tr>";
                                        $no++;
                                    }
                                    echo"
                                </table>"; ?>
                                 <br><br>
                                <b>G. Ketidakhadiran</b>
                                <table width="848" border="1">
                                    <tr>
                                      <th width="241" scope="col">Sakit</th>
                                      <th width="284" scope="col">Izin</th>
                                      <th width="301" scope="col">Tanpa Keterangan </th>
                                    </tr>
                                    <?php
                                   
                                     $query=mysqli_query($db, "SELECT * FROM ketidakhadiran WHERE nis='$nis' ")
                                             or die('Ada kesalahan pada query ketidakhadiran: '.mysqli_error($db));
                                    while($data =mysqli_fetch_array($query))
                                    {
                                    $id_hadir    =$data['id_hadir'];
                                    $sakit       =$data['sakit'];
                                    $izin        =$data['izin'];
                                    $tnp_ket     =$data['tanpa_ket']; 
                                    echo"
                                    <tr>
                                        
                                          <td><div align='center'>$sakit</td></div>
                                          <td><div align='center'>$izin</td></div>
                                          <td><div align='center'>$tnp_ket</td></div>
                                        </tr>";
                                        
                                    }
                                    echo"
                                </table>"; ?>
 
                                    <br>
                                    <br />
                                    <table width="625" border="0">

                                <tr>
                                  <td width="207"><div align="center">Orang Tua / Wali </div></td>
                                  <td width="198">&nbsp;</td>
                                  <td width="206" colspan="2"><div align="center">Walikelas</div></td>
                                </tr>
                                <tr>
                                  <td rowspan="4">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td colspan="2" rowspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>(...........................................) </td>
                                  <td>&nbsp;</td>
                                  <td colspan="2">(.............................................) <br>
                                  NIP. ...................................</td>
                                  
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="4" scope="col">Mengetahui</td>
                                </tr>
                                <tr>
                                  <td colspan="4"><div align="center">Kepala Sekolah</div></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td rowspan="3">&nbsp;</td>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="37">&nbsp;</td>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="2">(........................) <br>
                                  NIP. ....................</td>
                                </tr>
                              </table>    
                              <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                              </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                              </table> 
     
     <?php
$mpdf->setFooter('{PAGENO}');
$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));

$mpdf->Output("$nama_dokumen.pdf" ,'I');

 


exit; 
?>