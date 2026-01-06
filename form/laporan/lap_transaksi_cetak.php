<?php
ob_start();
session_start();
include "../../koneksi.php";
require "fpdf/fpdf.php";

// ================= AMBIL PERIODE =================
$tgl_awal  = $_POST['txtTgl_awal'];
$tgl_akhir = $_POST['txtTgl_akhir'];

// ================= PDF =================
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// ================= HEADER =================
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN TRANSAKSI LAUNDRY', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 7, "Periode : $tgl_awal s/d $tgl_akhir", 0, 1, 'C');
$pdf->Cell(0, 7, "Tanggal Cetak : " . date('d-m-Y'), 0, 1, 'C');
$pdf->Ln(5);

// ================= LEBAR KOLOM (WAJIB) =================
$w = [
    10, // No
    25, // Tanggal
    45, // Customer
    45, // Paket
    20, // Jenis
    15, // Qty
    25, // Harga
    30, // Subtotal
    25, // Cucian
    25  // Bayar
];

// ================= HEADER TABEL =================
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(220, 220, 220);

$header = [
    'No','Tanggal','Customer','Paket','Jenis',
    'Qty','Harga','Subtotal','Cucian','Bayar'
];

for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
}
$pdf->Ln();

// ================= DATA =================
$pdf->SetFont('Arial', '', 10);

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM vtransaksi_laundry
     WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
     ORDER BY tanggal ASC"
);

$no = 1;
$total_keseluruhan = 0;
$fill = false;

while ($row = mysqli_fetch_assoc($query)) {

    $pdf->SetFillColor($fill ? 245 : 255, $fill ? 245 : 255, $fill ? 245 : 255);

    $pdf->Cell($w[0], 8, $no++, 1, 0, 'C', true);
    $pdf->Cell($w[1], 8, $row['tanggal'], 1, 0, 'C', true);
    $pdf->Cell($w[2], 8, $row['nama_customer'], 1, 0, 'L', true);
    $pdf->Cell($w[3], 8, $row['nama_paket'], 1, 0, 'L', true);
    $pdf->Cell($w[4], 8, ucfirst($row['jenis']), 1, 0, 'C', true);
    $pdf->Cell($w[5], 8, $row['qty'], 1, 0, 'C', true);
    $pdf->Cell($w[6], 8, number_format($row['harga']), 1, 0, 'R', true);
    $pdf->Cell($w[7], 8, number_format($row['subtotal']), 1, 0, 'R', true);
    $pdf->Cell($w[8], 8, $row['status_cucian'], 1, 0, 'C', true);
    $pdf->Cell($w[9], 8, $row['status_bayar'], 1, 1, 'C', true);

    $total_keseluruhan += $row['subtotal'];
    $fill = !$fill;
}

// ================= TOTAL TRANSAKSI =================
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(220, 220, 220);

$totalLebar = array_sum($w);

$pdf->Cell($totalLebar - 55, 10, 'TOTAL TRANSAKSI', 1, 0, 'R', true);
$pdf->Cell(55, 10, number_format($total_keseluruhan), 1, 1, 'R', true);

// ================= FOOTER =================
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 8, 'Dicetak oleh : ' . ($_SESSION['username'] ?? 'Admin'), 0, 1, 'L');

ob_end_clean();
$pdf->Output();
