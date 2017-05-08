<?php

class DepreciationReport extends CI_Controller{

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        }         
        $this->load->library('Excel');
        $this->load->model('CalDep_model');
    }
    
    public function index() {
        
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        //XX Query month from tabledetail parameter = 101 for month dropdown
        $data['month'] = $this->Main_model->getMonth();

        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('report/depreciationReport/depreciationReport_index.php',$data);
        $this->load->view('report/depreciationReport/depreciationReport_js.php');
    }
    
    public function printReport() {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        //XXX Retrive user from session
        $user = $this->session->userdata("username");
        //XXX Parameter for file name
        $companyName = "";
        $categoryName = "";
        
        //XXX Parameter from Ajax
        $company = $this->input->post('company');
        $cate = $this->input->post('catetory');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        
        //XXX Query data from database
        $rs= $this->CalDep_model->getData($company,$cate,$month,$year);
        
        //XXX Get Company name 
        $this->db->select('cmplname');
        $this->db->from('COMPANY');
        $this->db->where('CMPCd',$company);
        $result = $this->db->get();
        $cmplname = $result->result_array();        
        foreach ($cmplname as $value) {
                $companyName = $value['cmplname'];
        }

        $colHeader = array( "ลำดับ","รายการ","จำนวน","วันเดือนปีที่ได้มา","สินทรัพย์ยกมาจากปีก่อน(ราคาทุน)",
                            "อัตราค่าเสื่อม","BVยกมา","จำนวนเดือนใช้สินทรัพย์จากปีก่อน","จำนวนเดือนใช้สินทรัพย์ปีปัจจุบัน","จำนวนเดือนใช้สินทรัพย์สิ้นสุดปีปัจจุบัน",
                            "ACC-DEPจากปีก่อน","DEPต่อเดือน","ACC-DEPปีปัจจุบัน","ACC-DEPสิ้นสุดปีปัจจุบัน","BVปีปัจจุบัน");
                
        
        

        // Set document properties
        $objPHPExcel->getProperties()   ->setCreator($user)
                                        ->setLastModifiedBy($user)
                                        ->setTitle("รายงานค่าสึกหรอค่าเสื่อมราคา")
                                        ->setSubject("รายงานค่าสึกหรอค่าเสื่อมราคา")
                                        ->setDescription("รายงานค่าสึกหรอค่าเสื่อมราคา")
                                        ->setKeywords("ค่าสึกหรอ ค่าเสื่อมราคา")
                                        ->setCategory("ค่าเสื่อมราคา");
        
        // Set font face, font size for column header
        $styleHeader = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 14,
                'name'  => 'Angsana New'
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('B1:B3')->applyFromArray($styleHeader);
        
       
        // Add Heaader of Report
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B1', $companyName)
                    ->setCellValue('B2', 'รอบระยะเวลาบัญชี ตั้งแต่ 1 มกราคม '.$year.' ถึงวันที่ 31 ธันวาคม '.$year)
                    ->setCellValue('B3', 'รายการที่ 7  ค่าสึกหรอและค่าเสื่อมราคาที่หักได้ตามพระราชกฤษฏีกาฯ');
        
        // Set font face, font size for column header
        $styleColHead = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 13,
                'name'  => 'Angsana New'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A5:Z5')->applyFromArray($styleColHead);
        
        // Add data in column header
        $rowNumber = 5;
        $column = 'A';
        foreach($colHeader as $head){
            $objPHPExcel->getActiveSheet()->getStyle('A5:Z5')->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->setCellValue($column.$rowNumber,$head);
            $column++;    
         }
         
         //Loop Result
        $totalRow = $rs->num_rows();
        $maxrow=$totalRow+5;
        $results = $rs->result();
        $row = 6;
        $no = 1;            
        foreach($results as $n){
            $categoryName = $n->tbddesc;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->draname);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->draamt);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n->depdat);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$row,$n->deplastcst,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('F'.$row,$n->dradeprt,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('G'.$row,$n->deplastbv,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('H'.$row,$n->deplastmnt,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('I'.$row,$n->depcurmnt,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('J'.$row,$n->depallmnt,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('K'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('K'.$row,$n->depaccdeplast,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('L'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('L'.$row,$n->depdeppermnt,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('M'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('M'.$row,$n->depaccdepcur,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('N'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('N'.$row,$n->depaccdepall,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $objPHPExcel->getActiveSheet()->getStyle('O'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('O'.$row,$n->depbvcur,PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $row++;
            $no++;
        }
        
        // Sum
        $endrow = $maxrow+1;
        $objPHPExcel->getActiveSheet()->getStyle('E'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$endrow,'=SUM(E6:E'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('G'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$endrow,'=SUM(G6:G'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('K'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$endrow,'=SUM(K6:K'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('L'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$endrow,'=SUM(L6:L'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('M'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$endrow,'=SUM(M6:M'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('N'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$endrow,'=SUM(N6:N'.$maxrow.')');
        $objPHPExcel->getActiveSheet()->getStyle('O'.$endrow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$endrow,'=SUM(O6:O'.$maxrow.')');
        
       //Set style for sum row
        $styleSum = array(
            'borders' => array(
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_DOUBLE
                )
            ),
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 13,
                'name'  => 'Angsana New'
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A'.$endrow.':O'.$endrow)->applyFromArray($styleSum);
        
        //Freeze pane
        $objPHPExcel->getActiveSheet()->freezePane('A6');
        
        //Set column width       
        $objPHPExcel->getActiveSheet()->getColumnDimension()->setAutoSize(false);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("5");
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("40");
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("7");
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("5");
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth("10");
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth("10");
        
        // Set font face, font size for sheet
        $styleFont = array(
            'font'  => array(
                'color' => array('rgb' => '000000'),
                'size'  => 13,
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
        $objPHPExcel->getActiveSheet()->getStyle('A5:O'.$maxrow)->applyFromArray($styleArray);

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle($categoryName);

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$company.'_'.$year.$month.'_'.$categoryName.'.xlsx"');
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
    }
    
}
 
?>
