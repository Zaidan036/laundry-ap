<?php
ob_start();

include "../../koneksi.php";
require "fpdf/fpdf.php";

// ================= TOTAL PAKET =================
$qTotal = mysqli_query($koneksi, "SELECT COUNT(*) AS total_paket FROM paket");
$dataTotal = mysqli_fetch_assoc($qTotal);
$totalPaket = $dataTotal['total_paket'] ?? 0;

// ================= TANGGAL CETAK =================
$tanggalCetak = date('d-m-Y');

// ================= PDF =================
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// ================= JUDUL =================
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'LAPORAN DATA PAKET',0,1,'C');

// ================= TANGGAL CETAK =================
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,6,'Tanggal Cetak : '.$tanggalCetak,0,1,'C');

$pdf->Ln(5);

// ================= HEADER TABEL =================
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(35,8,'Kode Paket',1,0,'C');
$pdf->Cell(55,8,'Nama Paket',1,0,'C');
$pdf->Cell(40,8,'Jenis',1,0,'C');
$pdf->Cell(50,8,'Harga',1,1,'C');

// ================= DATA TABEL =================
$pdf->SetFont('Arial','',10);
$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM paket");

while($row = mysqli_fetch_assoc($data)){
    $pdf->Cell(10,8,$no++,1,0,'C');
    $pdf->Cell(35,8,$row['kode_paket'],1);
    $pdf->Cell(55,8,$row['nama_paket'],1);
    $pdf->Cell(40,8,ucfirst($row['jenis']),1);
    $pdf->Cell(50,8,'Rp '.number_format($row['harga'],0,',','.'),1,1,'R');
}

// ================= TOTAL PAKET =================
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140,8,'TOTAL PAKET',1,0,'R');
$pdf->Cell(50,8,$totalPaket,1,1,'C');

// ================= TANDA TANGAN =================
$pdf->Ln(15);

$pdf->Cell(120,6,'',0);
$pdf->Cell(60,6,'Mengetahui,',0,1,'C');

$pdf->Ln(15);

$pdf->Cell(120,6,'',0);
$pdf->Cell(60,6,'Admin',0,1,'C');

// ================= OUTPUT =================
$pdf->Output();
ob_end_flush();
