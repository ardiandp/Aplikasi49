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
$query="SELECT * FROM detail ORDER BY id_detail_laporan ASC";
$run=mysqli_query($db,$query);

// Koneksi library FPDF
require_once('fpdf/fpdf.php');
// Setting halaman PDF<img src="poltek.jpg" width="2537" height="2461" />
$pdf = new FPDF('L','mm','LEGAL');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','',13);
$pdf->Cell(100,0,'',0,0,'C');
$pdf->Cell(110,5,'KEPOLISIAN NEGARA REPUBLIK INDONESIA DAERAH NTT',0,1,'C');
$pdf->SetFont('Arial','B',18);
$pdf->Cell(100,10,'',0,0,'C');
$pdf->Cell(100,10,'RESOR KOTA KUPANG KOTA',0,1,'C');
$pdf->SetFont('Arial','I',12);
$pdf->Cell(70,10,'',0,0,'C');
$pdf->Cell(50,10,'',0,0,'C');
$pdf->Cell(80,5,'Jln. Frans Seda Kota Kupang 85111 ',0,1,'C');
$pdf->Image('foto/gb.jpg', 40,6,25,25);
$pdf->Image('foto/gb.jpg', 280,6,25,25);
$pdf->Image('foto/gb2.jpg', 110, 60, 100, 100);
$pdf->Line(30,35,320,35);
$pdf->SetFont('Arial','U',13);
$pdf->Cell(100,30,'',0,0,'C');
$pdf->Cell(100,30,'LAPORAN DETAIL',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,10, 'NO', 1,0,'C');
$pdf->Cell(30,10,'ID DETAIL',1,0,'C');
$pdf->Cell(40,10,'ID ANGGOTA',1,0,'C');
$pdf->Cell(40,10,'ID LAPORAN',1,0,'C');
$pdf->Cell(40,10,'ID TERLAPOR',1,0,'C');
$pdf->Cell(40,10,'TINDAK PIDANA',1,0,'C');
$pdf->Cell(40,10,'PASAL',1,0,'C');
$pdf->Cell(40,10,'NAMA TERSANGKA',1,0,'C');
$pdf->Cell(40,10,'NAMA PENYIDIK',1,1,'C');
while($data=mysqli_fetch_array($run))
{
        $id_detail_laporan     =$data['id_detail_laporan'];
        $id_anggota   =$data['id_anggota'];
        $id_laporan  =$data['id_laporan'];
        $id_terlapor   =$data['id_terlapor'];
        $tindak_pidana  =$data['tindak_pidana'];
        $pasal  =$data['pasal'];
        $nama_tersangka  =$data['nama_tersangka'];
        $nama_penyidik  =$data['nama_penyidik'];
        
        $pdf->Cell(10,10,$no,1,0,'');
        $pdf->Cell(30,10,$id_detail_laporan,1,0,'');
        $pdf->Cell(40,10,$id_anggota,1,0,'');
        $pdf->Cell(40,10,$id_laporan,1,0,'');
        $pdf->Cell(40,10,$id_terlapor,1,0,'');
        $pdf->Cell(40,10,$tindak_pidana,1,0,'');
        $pdf->Cell(40,10,$pasal,1,0,'');
        $pdf->Cell(40,10,$nama_tersangka,1,0,'');
        $pdf->Cell(40,10,$nama_penyidik,1,1,'');
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