<?php
require_once "../../../config/koneksi.php";
require_once __DIR__ . '/vendor/autoload.php';

$surat = $_POST['surat'];
$nopol = $_POST['nopol'];
$dasar = $_POST['dasar'];
$kepada = $_POST['kepada'];
$untuk = $_POST['untuk'];
$nama_penerima = $_POST['nama-penerima'];
$nrp_penerima = $_POST['nrp-penerima'];
$nama_kabag = $_POST['nama-kabag'];
$nrp_kabag = $_POST['nrp-kabag'];

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle($nopol);
$mpdf->WriteHTML('<div style="border-bottom: 3px solid black;width: 350px;"><h4 style="text-align: center;">KEPOLISIAN REPUBLIK INDONESIA<br>DAERAH KOTA KUPANG<br>RESORT KUPANG<br>JL. FRANS SEDA</h4></div>');
$mpdf->WriteHTML('<div style="text-align: center;margin-top: 50px;"><img src="../../../assets/img/Lambang_Polri.png" style="width: 100px;"></div>');
$mpdf->WriteHTML('<h4 style="text-align: center;">KEPOLISIAN NEGARA<br>REPUBLIK INDONESIA</h4>');
$mpdf->WriteHTML('<h3 style="text-align: center;border-bottom: 1px solid black;">SURAT PERINTAH ' . $surat . '</h3>');
$mpdf->WriteHTML('<p style="text-align: center;">No. Pol.: ' . $nopol . '</p>');
$mpdf->WriteHTML('<table border="0" style="width: 100%;margin-top: 20px;vertical-align: top;">
  <tbody>
    <tr>
      <th style="text-align: left;width: 150px;">Pertimbangan</th>
      <th>:</th>
      <td style="padding-bottom: 20px;">Bahwa untuk kepentingan penyidikan tindak pidana, maka perlu mengeluarkan surat perintah ini.</td>
    </tr>
    <tr>
      <th style="text-align: left;">Dasar</th>
      <th>:</th>
      <td style="padding-bottom: 20px;">' . $dasar . '</td>
    </tr>
    <tr>
      <th style="text-align: left;">Kepada</th>
      <th>:</th>
      <td style="padding-bottom: 20px;">' . $kepada . '</td>
    </tr>
    <tr>
      <th style="text-align: left;">Untuk</th>
      <th>:</th>
      <td style="padding-bottom: 20px;">' . $untuk . '</td>
    </tr>
    <tr>
      <th style="text-align: left;">Selesai</th>
      <th>:</th>
      <td style="padding-bottom: 20px;">...................</td>
    </tr>
  </tbody>
</table>');
$mpdf->WriteHTML('<table border="0" style="margin-left: auto;margin-top: 50px;">
  <tbody>
    <tr>
      <th style="text-align: left;width: 150px;">Dikeluarkan di</th>
      <td>:</td>
      <td>Kupang</td>
    </tr>
    <tr>
      <th style="text-align: left;">Pada Tanggal</th>
      <td>:</td>
      <td>' . date("d M Y") . '</td>
    </tr>
  </tbody>
</table>');
$mpdf->WriteHTML('<table border="0" style="width: 100%; margin-top: 50px">
  <tbody>
    <tr>
      <th style="text-align: center; width: 200px">Yang Menerima Perintah</th>
      <th style="width: 10px"></th>
      <th style="text-align: center;width: 200px">
        A.N KEPOLISIAN SEKTOR KUPANG<br />KABAG. OPS<br />KASUBANG RESKIM<br />Selaku Penyidik
      </th>
    </tr>
    <tr>
      <th colspan="3" style="height: 40px;"></th>
    </tr>
    <tr>
      <th colspan="3" style="height: 40px;"></th>
    </tr>
    <tr>
      <th style="text-align: center;">' . $nama_penerima . '<br>NRP. ' . $nrp_penerima . '</th>
      <th></th>
      <th style="text-align: center;">' . $nama_kabag . '<br>NRP. ' . $nrp_kabag . '</th>
    </tr>
  </tbody>
</table>
');
$mpdf->OutputHttpDownload($nopol . '.pdf');
header("Location: ../../../index.php?page=surat");
exit;
