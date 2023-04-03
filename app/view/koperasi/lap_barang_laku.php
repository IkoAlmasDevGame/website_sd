<?php

include "../../database/migrations/dbKoperasi.php";
require('../../../bootstrap/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Laporan Koperasi',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0896XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Hx xxxxxx',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'email : iko.mania@xxxxx.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,0.7,'Laporan Data Penjualan Koperasi',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan Penjualan pada : ".$_GET['tanggal'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2.1, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'harga barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah beli', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'laba', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Total harga ', 1, 1, 'C');

$no=1;
$tanggal=$_GET['tanggal'];
$query=mysqli_query($conKoperasi,"select * from t_pembelian where tanggal=" . $tanggal);
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(2.5, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(2.1, 0.8, $lihat['kode_barang'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['nama_barang'],1, 0, 'L');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($lihat['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah_beli'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($lihat['laba'])." ,-",1, 0, 'C');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($lihat['total_harga'])." ,-", 1, 1,'C');	
	
	$no++;
}
$q=mysqli_query($conKoperasi,"select sum(total_harga) as total from t_pembelian where tanggal=".$tanggal);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=mysqli_fetch_array($q)){
	$pdf->Cell(18.6, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}
$qu=mysqli_query($conKoperasi,"select sum(laba) as total_laba from t_pembelian where tanggal=".$tanggal);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($tl=mysqli_fetch_array($qu)){
	$pdf->Cell(4, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
}
$pdf->Output("laporan_buku.pdf","I");

?>

