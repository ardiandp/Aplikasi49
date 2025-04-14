<?php
//koneksi ke database
$server   = "localhost";                // server database, default “localhost” atau “127.0.0.1”
$username = "root";                     // username database, default “root”
$password = "12345678";                         // password database, default kosong
$database = "n_siswa";             // memilih database yang akan digunakan
 
// koneksi database
$db = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$db) {
    // cek koneksi gagal, tampilkan pesan gagal
    die('Koneksi Database Gagal : '.mysqli_connect_error());
}
$no=1;
$query="SELECT * FROM laporan ORDER BY jumlah_kasus ASC";
$run=mysqli_query($db,$query);

// Koneksi library FPDF
require_once('fpdf/fpdf.php');
// Setting halaman PDF<img src="poltek.jpg" width="2537" height="2461" />
$pdf = new FPDF('L','mm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','',13);
$pdf->Cell(90,0,'',0,0,'C');
$pdf->Cell(90,5,'KEMENTRIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI',0,1,'C');
$pdf->SetFont('Arial','B',18);
$pdf->Cell(90,10,'',0,0,'C');
$pdf->Cell(90,10,'SMP ANGKASA',0,1,'C');
$pdf->SetFont('Arial','I',12);
$pdf->Cell(60,10,'',0,0,'C');
$pdf->Cell(40,10,'',0,0,'C');
$pdf->Cell(70,5,'Jln. Adisucipto, Penfui ',0,1,'C');
$pdf->Image('foto/foto.png', 30,6,25,25);
$pdf->Image('foto/foto.png', 235,6,25,25);
$pdf->Line(20,35,270,35);
$pdf->SetFont('Arial','U',13);
$pdf->Cell(90,30,'',0,0,'C');
$pdf->Cell(90,30,'LAPORAN DATA SISWA',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,10, 'NO', 1,0,'C');
$pdf->Cell(20,10,'Id Laporan',1,0,'C');
$pdf->Cell(50,10,'Id Unit',1,0,'C');
$pdf->Cell(30,10,'Jumlah Kasus',1,0,'C');
$pdf->Cell(35,10,'Yang Diselesaikan',1,0,'C');
$pdf->Cell(35,10,'Putusan Sidang',1,0,'C');
$pdf->Cell(35,10,'Tahun Laporan',1,1,'C');

while($data=mysqli_fetch_array($run))
{
        $id_laporan     =$data['id_laporan'];
        $id_unit    =$data['id_unit'];
        $jumlah_kasus  =$data['jumlah_kasus'];
        $yang_diselesaikan   =$data['yang_diselesaikan'];
        $putusan_sidang   =$data['putusan_sidang'];
        $tahun_laporan   =$data['tahun_laporan'];
        
        
        $pdf->Cell(10,10,$no,1,0,'');
        $pdf->Cell(20,10,$id_laporan,1,0,'');
        $pdf->Cell(50,10,$id_unit,1,0,'');
        $pdf->Cell(30,10,$jumlah_kasus,1,0,'');
        $pdf->Cell(35,10,$yang_diselesaikan,1,0,'');
        $pdf->Cell(35,10,$putusan_sidang,1,0,'');
        $pdf->Cell(35,10,$tahun_laporan,1,1,'');
  
 
 $no++;
}

    $pdf->ln(10);
              $tgl = date('d-m-Y');
$query2= mysqli_query($db,"select * from admin where hak_akses ='laporan'") or die('Ada kesalahan pada query: '.mysqli_error($db));
    while($data=mysqli_fetch_assoc($query2)){
        $guru = $data['nama_lengkap'];
        $pdf->Cell(50, 1, "Penfui, $tgl", 0, 0, 'C');
        $pdf->ln(5);
        $pdf->Cell(50, 1, "Kepala Sekolah", 0, 0, 'C');        
        $pdf->ln(15);
        $pdf->Cell(50, 1, $guru, 0, 0, 'C');

    }
$pdf->Output();

?>