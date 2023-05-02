<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'PHPExcel/');
require_once('PHPExcel.php');
require_once('PHPExcel/IOFactory.php');

session_start();

$fnom = "";

if (isset($_SESSION['sod'])){
	
	    $tty = date("Y_m_d_H_i_s");

$fnom = "InvSpc_DATA_REPORT_".$tty;

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Steve Firsake")
							 ->setLastModifiedBy("Steve Firsake")
							 ->setTitle("Invasive Species Report")
							 ->setSubject("Invasive Species Data Summary")
							 ->setDescription("Summary from the Invasive Species system for to this time")
							 ->setKeywords("INVASIVE SPECIES")
							 ->setCategory("Reports");


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'INVASIVE SPECIES DATA COLLECTION SUMMARY');			
$objPHPExcel->setActiveSheetIndex(0)->mergeCells("A1:M1");
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A2:M2")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A2:M2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0)->getStyle("A2:M2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("F")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("G")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("H")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("I")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("J")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("K")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("L")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension("M")->setAutoSize(true);
$objPHPExcel->setActiveSheetIndex(0)->getRowDimension("1")->setRowHeight(30);
$objPHPExcel->setActiveSheetIndex(0)->getRowDimension("2")->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFfde691');
$objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFebf7ac');

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);



//$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);
//$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
           

$graphq = parse_ini_file('/etc/cgi_bin.ini');
		$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
		if (!$connection) {
                               		die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                             	  }
				
			
		$sqlw = "SELECT * FROM fielddata ORDER BY fttym DESC";
		$rsltw = mysqli_prepare($connection, $sqlw);
    mysqli_stmt_execute($rsltw);
    mysqli_stmt_bind_result($rsltw, $ftname, $ftiar, $ftgar, $ftcc, $fthab, $ftabd, $ftown, $ftara, $ftsettle, $ftcom, $ftlat, $ftlon, $fttym, $foutid);
		
$objPHPExcel->setActiveSheetIndex(0)

            ->setCellValue('A2', 'Species')
            ->setCellValue('B2', 'Infected Area')
            ->setCellValue('C2', 'Gross Area')
            ->setCellValue('D2', 'Canopy Closure')
            ->setCellValue('E2', 'Habitat')
            ->setCellValue('F2', 'Abudance')
			->setCellValue('G2', 'Ownership')
			->setCellValue('H2', 'Area Accesibility')
		->setCellValue('I2','Settlement')
			->setCellValue('J2', 'Location Description')
            ->setCellValue('K2', 'Latitude')
            ->setCellValue('L2', 'Longitude')
			->setCellValue('M2', 'Time')
			->setCellValue('N2', 'Field Agent ID');
 
 $xx = 2;

    while($row = mysqli_stmt_fetch($rsltw) ){
              
          $xx = $xx + 1;			  
		
		    
			/*$ftname = $row['ftname'];
			$ftiar = $row['ftiar'];
			$ftgar = $row['ftgar'];
			$ftcc = $row['ftcc'];
			$fthab = $row['fthab'];
			$ftabd = $row['ftabd'];
			$ftown = $row['ftown'];
			$ftara = $row['ftara'];
			$ftcom = $row['ftcom'];
			$ftlat = $row['ftlon'];
			$ftlon = $row['ftlat'];
			$fttym = $row['fttym'];
			$foutid = $row['foutid'];*/
			
			
			   
			   
			   $objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$xx, $ftname)
							->setCellValue('B'.$xx, $ftiar)
							->setCellValue('C'.$xx, $ftgar)
							->setCellValue('D'.$xx, $ftcc)
							->setCellValue('E'.$xx, $fthab)
							->setCellValue('F'.$xx, $ftabd)
							->setCellValue('G'.$xx, $ftown)
							->setCellValue('H'.$xx, $ftara)
							->setCellValue('I'.$xx, $ftsettle)
							->setCellValue('J'.$xx, $ftcom)
							->setCellValue('K'.$xx, $ftlat)
							->setCellValue('L'.$xx, $ftlon)
							->setCellValue('M'.$xx, $fttym)
							->setCellValue('N'.$xx, $foutid);
			   
	}
 
 mysqli_stmt_close($rsltw);
 mysqli_close($connection);
 
 
	$objPHPExcel->getActiveSheet()->getStyle('A1:N'.$xx)->applyFromArray($styleArray);		
    $objPHPExcel->getActiveSheet()->setTitle('Invasive Species Data');
	

	


}

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fnom.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Wed, 24 Aug 2019 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$objWriter->save('php://output');
exit;
