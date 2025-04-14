<?php
//koneksi ke database
$server   = "localhost";                // server database, default “localhost” atau “127.0.0.1”
$username = "root";                     // username database, default “root”
$password = "";                         // password database, default kosong
$database = "arsipan";             // memilih database yang akan digunakan
 
// koneksi database
$db = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$db) {
    // cek koneksi gagal, tampilkan pesan gagal
    die('Koneksi Database Gagal : '.mysqli_connect_error());
}
$no=1;
$query="SELECT * FROM laporan ORDER BY tahun_laporan ASC";
$run=mysqli_query($db,$query);

// Koneksi library FPDF
require_once('fpdf/fpdf.php');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','',13);
$pdf->Cell(90,0,'',0,0,'C');
$pdf->Cell(90,5,'KEPOLISIAN NEGARA REPUBLIK INDONESIA DAERAH NTT',0,1,'C');
$pdf->SetFont('Arial','B',18);
$pdf->Cell(90,10,'',0,0,'C');
$pdf->Cell(90,10,'RESOR KOTA KUPANG KOTA',0,1,'C');
$pdf->SetFont('Arial','I',12);
$pdf->Cell(60,10,'',0,0,'C');
$pdf->Cell(40,10,'',0,0,'C');
$pdf->Cell(70,5,'Jln. Frans Seda Kota Kupang 85111 ',0,1,'C');
$pdf->Image('foto/gb.jpg', 30,6,25,25);
$pdf->Image('foto/gb.jpg', 235,6,25,25);
$pdf->Image('foto/gb2.jpg', 98, 40, 90, 90);
$pdf->Line(20,35,270,35);
$pdf->SetFont('Arial','U',13);
$pdf->Cell(90,30,'',0,0,'C');
$pdf->Cell(90,30,'LAPORAN TAHUNAN',0,1,'C');
$pdf->Cell(60,30,'',0,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,10, 'NO', 1,0,'C');
$pdf->Cell(40,10,'TAHUN LAPORAN',1,0,'C');
$pdf->Cell(40,10,'JUMLAH KASUS',1,0,'C');
$pdf->Cell(50,10,'YANG DISELESAIKAN',1,1,'C');

while($data=mysqli_fetch_array($run))
{
        $tahun_laporan    =$data['tahun_laporan'];
        $jumlah_kasus   =$data['jumlah_kasus'];
        $yang_diselesaikan  =$data['yang_diselesaikan'];
        $pdf->Cell(60,30,'',0,0,'C');

        $pdf->Cell(10,10,$no,1,0,'');
        $pdf->Cell(40,10,$tahun_laporan,1,0,'');
        $pdf->Cell(40,10,$jumlah_kasus,1,0,'');
        $pdf->Cell(50,10,$yang_diselesaikan,1,1,'');
    $no++;
    }
    $pdf->ln(10);
              $tgl = date('d-m-Y');
$query2= mysqli_query($db,"SELECT * FROM `admin` WHERE hak_akses ='kasat'") or die('Ada kesalahan pada query: '.mysqli_error($db));
    while($data=mysqli_fetch_assoc($query2)){
        $kasat = $data['nama_lengkap'];
      

    }
$pdf->Output();

?>
    