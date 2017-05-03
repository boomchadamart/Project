<?php
  session_start();
  include 'connection.php';
  require_once 'Classes/PHPExcel.php';

  // Create new PHPExcel object
  $objPHPExcel = new PHPExcel();
  //XXX Retrive user from session
  // $user = $this->session->userdata("username");
  //XXX Parameter for file name
  $companyName = "";
  $categoryName = "";

  //XXX Parameter from Ajax
  // $equipment_id = $_POST['equipment_id'];
  // $equipment_date = $_POST['equipment_date'];
  // $param_endesc = $_POST['param_endesc'];
  // $equipment_num = $_POST['equipment_num'];
  // $statuss_th = $_POST['statuss_th'];
  // $statuss_detail = $_POST['statuss_detail'];
  // $computer_OS = $_POST['computer_OS'];
  // $computer_updateOS = $_POST['computer_updateOS'];
  // $room_num = $_POST['room_num'];
  //
  // echo   $equipment_id." ".$equipment_date

  //XXX Query data from database
  // $rs= $this->CalDep_model->getData($company,$cate,$month,$year);

  $sql = 'SELECT equipment.equipment_id AS "equipment_id",
                    equipment.equipment_date,
                    type.param_endesc,
                    equipment.equipment_num,
                    equipment.equipment_brand,
                    servers.servers_ipAddress,
                    servers.servers_conservator,
                    equipment.equipment_year,
                    room.room_num
              FROM equipment
              left JOIN servers ON equipment.equipment_id =servers.equipment_id
              JOIN parameterdetail type ON type.param_code = equipment.equipment_type AND type.param_no = 100
              JOIN room ON room.room_id = equipment.room_id
              where param_no =100 and param_code=2 order by param_code';
  $result = $conn->query($sql);

  //XXX Get Company name
  // $this->db->select('cmplname');
  // $this->db->from('COMPANY');
  // $this->db->where('CMPCd',$company);
  // $result = $this->db->get();
  // $cmplname = $result->result_array();
  // foreach ($cmplname as $value) {
  //         $companyName = $value['cmplname'];
  // }



  // // Set document properties
  // $objPHPExcel->getProperties()   ->setCreator($user)
  //                                 ->setLastModifiedBy($user)
  //                                 ->setTitle("รายงานค่าสึกหรอค่าเสื่อมราคา")
  //                                 ->setSubject("รายงานค่าสึกหรอค่าเสื่อมราคา")
  //                                 ->setDescription("รายงานค่าสึกหรอค่าเสื่อมราคา")
  //                                 ->setKeywords("ค่าสึกหรอ ค่าเสื่อมราคา")
  //                                 ->setCategory("ค่าเสื่อมราคา");

  // Set font face, font size for column header
  $styleHeader = array(
      'font'  => array(
          'bold'  => true,
          'color' => array('rgb' => '000000'),
          'size'  => 15,
          'name'  => 'Angsana New'
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
      )
  );
  $objPHPExcel->getActiveSheet()->getStyle('A1:I6')->applyFromArray($styleHeader);

  // Add Heaader of Report
  $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
  $objPHPExcel->getActiveSheet()->setCellValue('A1','รายงาน Client/Server Management ');
  $objPHPExcel->getActiveSheet()->mergeCells('A2:I2');
  $objPHPExcel->getActiveSheet()->setCellValue('A2','ข้อมูล Server');
  $objPHPExcel->getActiveSheet()->setCellValue('G3','วันที่ออกรายงาน:');
  $objPHPExcel->getActiveSheet()->setCellValue('A4','จากวันที่:');
  $objPHPExcel->getActiveSheet()->setCellValue('C4','ถึง:');
  $objPHPExcel->getActiveSheet()->setCellValue('A5','หมวดหมู่:');
  $objPHPExcel->getActiveSheet()->setCellValue('C5','ห้อง:');


  // Set font face, font size for column header
  $styleColHead = array(
      'font'  => array(
          'bold'  => true,
          'color' => array('rgb' => '000000'),
          'size'  => 14,
          'name'  => 'Angsana New'
      ),
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
  );
  $objPHPExcel->getActiveSheet()->getStyle('A5:Z5')->applyFromArray($styleColHead);

  // Add data in column header
  $colHeader = array( "ลำดับ","วันที่รับเข้ามา","หมวดหมู่อุปกรณ์","หมายเลขอุปกรณ์","ยี่ห้อ-รุ่น",
                      "IP address","ผู้ดูแล","ปีงบประมาณ","ใช้ประจำที่");
  $rowNumber = 7;
  $column = 'A';
  foreach($colHeader as $head){
      $objPHPExcel->getActiveSheet()->getStyle('A7:Z7')->getAlignment()->setWrapText(true);
      $objPHPExcel->getActiveSheet()->setCellValue($column.$rowNumber,$head);
      $column++;
   }

   //Loop Result

  $row = 8;
  $no = 1;
  while ($n = $result->fetch_array()) {
    // $categoryName = $n->tbddesc;
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n['equipment_date']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n['param_endesc']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n['equipment_num']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n['equipment_brand']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$n['servers_ipAddress']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$n['servers_conservator']);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$n['equipment_year']);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$n['room_num']);
    $row++;
    $no++;
  }
  $maxrow = $row;

  //Freeze pane
  $objPHPExcel->getActiveSheet()->freezePane('A8');

  //Set column width
  $objPHPExcel->getActiveSheet()->getColumnDimension()->setAutoSize(false);

  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("7");
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("11.5");
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("12.63");
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("18");
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("14.13");
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("18.25");
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth("13.5");
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth("11.5");
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth("10.25");


  // Set font face, font size for sheet
  $styleFont = array(
      'font'  => array(
          'color' => array('rgb' => '000000'),
          'size'  => 14,
          'name'  => 'Angsana New'
      )
  );

  $objPHPExcel->getActiveSheet()->getStyle('A1:Z99')->applyFromArray($styleFont);
  //Cell Style
  $styleArray = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );
  $objPHPExcel->getActiveSheet()->getStyle('A7:I'.$maxrow)->applyFromArray($styleArray);

  // Rename worksheet
  $objPHPExcel->getActiveSheet()->setTitle('server');
 //
 //  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
 //  $objPHPExcel->setActiveSheetIndex(0);


  // Redirect output to a client’s web browser (Excel2007)
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="รายงานserver.xlsx"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');

  // If you're serving to IE over SSL, then the following may be needed
  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header ('Pragma: public'); // HTTP/1.0

  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  $objWriter->save('php://output');
  exit;
?>
