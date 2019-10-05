<?php
    
    include("includes/db.php");
    include("PHPExcel/Classes/PHPExcel.php");
   
    $sql = "select * from volunteers";
    $query = mysqli_query($con, $sql);



    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()
            ->setCreator("user")
            ->setLastModifiedBy("user")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

    // Set the active Excel worksheet to sheet 0
    $objPHPExcel->setActiveSheetIndex(0);

    // Initialise the Excel row number
    $rowCount = 0;

    // Sheet cells
    $cell_definition = array(
        'A' => 'Slika',
        'B' => 'Ime',
        'C' => 'Email',
        'D'=>'Telefon',
        'E'=>'Drzava',
        'F' =>'Grad',
        'G' =>'Adresa',
        'H' =>'Status'
     
        
    );

    
    foreach ($cell_definition as $column => $value) {
        $objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);
         $objPHPExcel->getActiveSheet()->getRowDimension($rowCount)->setRowHeight(100);
        $objPHPExcel->getActiveSheet()->setCellValue("{$column}1", $value);
    }
    
    $rowCount=2;

    
    while ($reportdetails  = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
          $objPHPExcel->getActiveSheet()->getRowDimension($rowCount)->setRowHeight(55);
          
                  
          $a = "../customer/customer_images/".$reportdetails['customer_image'];

        if (file_exists($a)) {
                        $objDrawing = new PHPExcel_Worksheet_Drawing();
                        $objDrawing->setName('Customer Signature');
                        $objDrawing->setDescription('Customer Signature');
                        //Path to signature .jpg file
                        $signature = $a;
                        $objDrawing->setPath($signature);
                        $objDrawing->setOffsetX();                     //setOffsetX works properly
                        $objDrawing->setOffsetY(10);                     //setOffsetY works properly
                        $objDrawing->setCoordinates('A'.$rowCount);             //set image to cell
                        $objDrawing->setWidth(50);
                        $objDrawing->setHeight(50);                     //signature height
                        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save
        } else {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, "Image not found");
        }
          
              
    
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $reportdetails['customer_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $reportdetails['customer_email']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $reportdetails['customer_contact']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $reportdetails['customer_country']);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $reportdetails['customer_city']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $reportdetails['customer_address']);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $reportdetails['customer_status']);

        
        $rowCount++;
    }
//kreiranje fajla
    
    $rand = rand(1234, 9898);
    $presentDate = date('YmdHis');
    $fileName = "report_" . $rand . "_" . $presentDate . ".xlsx";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$fileName.'"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');

    die();
