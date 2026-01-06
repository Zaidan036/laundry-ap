<?php
ob_start();

include "../../koneksi.php";
require "fpdf/fpdf.php";

// Total customer
$qTotal = mysqli_query($koneksi, "SELECT COUNT(*) AS total_customer FROM tbl_customer");
$dataTotal = mysqli_fetch_assoc($qTotal);
$totalCustomer = $dataTotal['total_customer'] ?? 0;

// Tanggal cetak
$tanggalCetak = date('d-m-Y');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'LAPORAN DATA CUSTOMER',0,1,'C');

// Tanggal cetak
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,6,'Tanggal Cetak : '.$tanggalCetak,0,1,'C');

$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'No',1);
$pdf->Cell(30,8,'Kode',1);
$pdf->Cell(50,8,'Nama',1);
$pdf->Cell(60,8,'Alamat',1);
$pdf->Cell(40,8,'Telp',1);
$pdf->Ln();

// Data tabel
$pdf->SetFont('Arial','',10);
$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM tbl_customer");

while($row = mysqli_fetch_assoc($data)){
    $pdf->Cell(10,8,$no++,1);
    $pdf->Cell(30,8,$row['kode'],1);
    $pdf->Cell(50,8,$row['nama'],1);
    $pdf->Cell(60,8,$row['alamat'],1);
    $pdf->Cell(40,8,$row['telp'],1);
    $pdf->Ln();
}

// Total customer
$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,8,'TOTAL CUSTOMER',1);
$pdf->Cell(40,8,$totalCustomer,1);

// Spasi tanda tangan
$pdf->Ln(15);

// Tanda tangan
$pdf->Cell(130,6,'',0);
$pdf->Cell(60,6,'Mengetahui,',0,1,'C');

$pdf->Ln(15);

$pdf->Cell(130,6,'',0);
$pdf->Cell(60,6,'Admin',0,1,'C');

$pdf->Output();
ob_end_flush();
