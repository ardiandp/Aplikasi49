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
$query="SELECT * FROM guru ORDER BY nama ASC";
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
$pdf->Cell(90,30,'LAPORAN DATA GURU',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,10, 'NO', 1,0,'C');
$pdf->Cell(50,10,'NIP',1,0,'C');
$pdf->Cell(65,10,'NAMA',1,0,'C');
$pdf->Cell(35,10,'JENIS KELAMIN',1,0,'C');
$pdf->Cell(35,10,'ALAMAT',1,0,'C');
$pdf->Cell(46,10,'NOHP',1,1,'');

while($data=mysqli_fetch_array($run))
{
        $nip     =$data['nip'];
        $nama    =$data['nama'];
        $jenis_kelamin   =$data['jenis_kelamin'];
        $agama  =$data['agama'];
        $jabatan  =$data['jabatan'];
        $golongan  =$data['golongan'];
        $alamat  =$data['alamat'];
        $nohp      =$data['nohp'];
        
        $pdf->Cell(10,10,$no,1,0,'');
        $pdf->Cell(50,10,$nip,1,0,'');
        $pdf->Cell(65,10,$nama,1,0,'');
        $pdf->Cell(35,10,$jenis_kelamin,1,0,'');
        $pdf->Cell(35,10,$alamat,1,0,'');
        $pdf->Cell(46,10,$nohp,1,1,'');
 
 $no++;
}

    $pdf->ln(10);
              $tgl = date('d-m-Y');
$query2= mysqli_query($db,"select * from admin where hak_akses ='guru'") or die('Ada kesalahan pada query: '.mysqli_error($db));
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