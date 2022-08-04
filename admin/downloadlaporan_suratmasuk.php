<?php
include '../koneksi/koneksi.php';
session_start();
include "login/ceksession.php";
include "../assets/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("")
                         ->setLastModifiedBy("");

// Mengambil data dari tabel
                $bulan=$_POST['bulan'];
                $tahun=$_POST['tahun'];
                $sql1  		= "SELECT * FROM tb_suratmasuk where MONTH(tanggalmasuk_suratmasuk)='$bulan' AND YEAR(tanggalmasuk_suratmasuk) = '$tahun'";                       
                $query1  	= mysqli_query($db, $sql1);

                            if ($bulan == '01') {
                              $bulan = "JANUARI";
                            } elseif ($bulan == '02') {
                              $bulan = "FEBRUARI";
                            } elseif ($bulan == '03') {
                              $bulan = "MARET";
                            } elseif ($bulan == '04') {
                              $bulan = "APRIL";
                            } elseif ($bulan == '05') {
                              $bulan = "MEI";
                            } elseif ($bulan == '06') {
                              $bulan = "JUNI";
                            } elseif ($bulan == '07') {
                              $bulan = "JULI";
                            } elseif ($bulan == '08') {
                              $bulan = "AGUSTUS";
                            } elseif ($bulan == '09') {
                              $bulan = "SEPTEMBER";
                            } elseif ($bulan == '10') {
                              $bulan = "OKTOBER";
                            } elseif ($bulan == '11') {
                              $bulan = "NOVEMBER";
                            } elseif ($bulan == '12') {
                              $bulan = "DESEMBER";
                            }
                $nama_file = 'Surat Masuk-'.$bulan.'-'.$tahun;

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A2:H2');
$excelku->getActiveSheet()->getStyle('A2:H2')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A2:H2')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('A2:H2')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->setCellValue('A2', "PEMERINTAH KABUPATEN ACEH TENGAH");
$excelku->getActiveSheet()->mergeCells('A3:H3');
$excelku->getActiveSheet()->getStyle('A3:H3')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A3:H3')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->setCellValue('A3', "KECAMATAN PEGASING");
$excelku->getActiveSheet()->mergeCells('A4:H4');
$excelku->getActiveSheet()->getStyle('A4:H4')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A4:H4')->getFont()->setSize(10);

$excelku->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->setCellValue('A4', "Jl. Takengon-Isaq KM 8 Kampung Simpang Kelaping, Kode Pos : 24561 ");
$excelku->getActiveSheet()->mergeCells('A6:H6');
$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT MASUK BULAN $bulan TAHUN $tahun");
$excelku->getActiveSheet()->getStyle('A6:H6')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A6:H6')->getFont()->setSize(12);

$excelku->getActiveSheet()->getStyle('A6:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$excelku->getActiveSheet()->mergeCells('A8:A9');
$excelku->getActiveSheet()->setCellValue('A8', "NO");
$excelku->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->mergeCells('B8:B9');
$excelku->getActiveSheet()->setCellValue('B8', "NO URUT");
$excelku->getActiveSheet()->getStyle('B8:B97')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->mergeCells('C8:F8');
$excelku->getActiveSheet()->setCellValue('C8', "SURAT MASUK");
$excelku->getActiveSheet()->getStyle('C8:F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->getStyle('C8:F8')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$excelku->getActiveSheet()->mergeCells('G8:G9');
$excelku->getActiveSheet()->setCellValue('G8', "TANGGAL MASUK");
$excelku->getActiveSheet()->getStyle('G8:G9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->mergeCells('H8:H9');
$excelku->getActiveSheet()->setCellValue('H8', "KODE SURAT");
$excelku->getActiveSheet()->getStyle('H8:H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
$excelku->getActiveSheet()->getStyle('A8:I9')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
 $SI->setCellValue('C9', "ALAMAT PENGIRIM");
 $SI->setCellValue('D9', "NOMOR SURAT");
 $SI->setCellValue('E9', "TANGGAL SURAT");
 $SI->setCellValue('F9', "PERIHAL");



//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
		  'color'   => array('argb' => 'FFEEEEEE')),
		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
		  'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
    ));
    
    $excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
    $excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
    $excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);
    $excelku->getActiveSheet()->getPageSetup()->setFitToWidth(1);
    $excelku->getActiveSheet()->getPageSetup()->setFitToHeight(0);


$baris  = 10; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($data = $query1->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$data['nomorurut_suratmasuk']); 
  $SI->setCellValue("C".$baris,$data['pengirim']); 
  $SI->setCellValue("D".$baris,$data['nomor_suratmasuk']); 
  $SI->setCellValue("E".$baris,$data['tanggalsurat_suratmasuk']); 
  $SI->setCellValue("F".$baris,$data['perihal_suratmasuk']); 
  $SI->setCellValue("G".$baris,$data['tanggalmasuk_suratmasuk']); 
  $SI->setCellValue("H".$baris,$data['kode_suratmasuk']); 

  $baris++; //looping untuk barisnya
  
  // Set lebar kolom

    $excelku->getActiveSheet()->getColumnDimension('A')->setWidth(8.14);
    $excelku->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    $excelku->getActiveSheet()->getColumnDimension('C')->setWidth(29);
    $excelku->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excelku->getActiveSheet()->getColumnDimension('E')->setWidth(16);
    $excelku->getActiveSheet()->getColumnDimension('F')->setWidth(39);
    $excelku->getActiveSheet()->getColumnDimension('G')->setWidth(28);
    $excelku->getActiveSheet()->getColumnDimension('H')->setWidth(18);
    $excelku->getActiveSheet()->getColumnDimension('I')->setWidth(21);
   
    $excelku->getActiveSheet()->getStyle('A10:I'.$baris.'')->getFont()->setName('Calibri');
    $excelku->getActiveSheet()->getStyle('A10:I'.$baris.'')->getFont()->setSize(11);
    $excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(-1); 
    $excelku->getActiveSheet()->getStyle('C10:C'.$baris.'')->getAlignment()->setWrapText(true); // wraptext
    $excelku->getActiveSheet()->getStyle('F10:F'.$baris.'')->getAlignment()->setWrapText(true);
    $excelku->getActiveSheet()->getStyle('A10:B'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('D10:E'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('G10:I'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A10:I'.$baris.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A10:I'.$baris.'')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    
    
   
}

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nama_file.'".xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>