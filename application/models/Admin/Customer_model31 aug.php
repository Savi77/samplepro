<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

         //======= Customer add/ edit/ delete ========================== 

         public function incomplete_issue_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0); 
            $this->db->order_by('company_name','ASC'); 
            return $this->db->get('tbl_customer');
         }



         public function get_activity_issue_count()
         {
            $created_date=date('Y-m-d');            
            $this->db->where('DATE(created_date)', $created_date);
            $this->db->where('status','pending');  
            $this->db->where('org_id',$this->session->org_id);
            $todaycnt=$this->db->get('tbl_user_query')->result();

            $this->db->where('MONTH(created_date)', date('m'));
            $this->db->where('org_id',$this->session->org_id);
            $monthcnt=$this->db->get('tbl_user_query')->result();
        
            $this->db->where('status','pending');  
            $this->db->where('org_id',$this->session->org_id);
            $allcnt=$this->db->get('tbl_user_query')->result();

            return  array(
                           'todaycnt'=>count($todaycnt),
                           'monthcnt'=>count($monthcnt),
                           'allcnt'=>count($allcnt)
                        );

         }

         public function get_rechedule_issue_count()
         {
            $created_date=date('Y-m-d');            
            $this->db->where('DATE(created_date)', $created_date);
             $this->db->where('reschedule','reschedule');  
             $this->db->where('org_id',$this->session->org_id);
            $todaycnt=$this->db->get('tbl_schedule')->result();

            $this->db->where('MONTH(created_date)', date('m'));
             $this->db->where('reschedule','reschedule'); 
             $this->db->where('org_id',$this->session->org_id);
            $monthcnt=$this->db->get('tbl_schedule')->result();   

            $this->db->where('reschedule','reschedule');  
            $this->db->where('org_id',$this->session->org_id);
            $allcnt=$this->db->get('tbl_schedule')->result();
            return  array(
                           'todaycnt'=>count($todaycnt),
                           'monthcnt'=>count($monthcnt),
                           'allcnt'=>count($allcnt)
                        );
         }

         public function get_complete_issue_count()
         {
            $created_date=date('Y-m-d'); 
            $this->db->where('DATE(created_date)', $created_date);
            $this->db->where('status','completed');  
            $this->db->where('org_id',$this->session->org_id);
            $todaycnt=$this->db->get('tbl_user_query')->result();

            $this->db->where('MONTH(created_date)', date('m'));
            $this->db->where('org_id',$this->session->org_id);
            $monthcnt=$this->db->get('tbl_user_query')->result();

            $this->db->where('status','completed');  
            $this->db->where('org_id',$this->session->org_id);
            $allcnt=$this->db->get('tbl_user_query')->result();
            return  array(
                           'todaycnt'=>count($todaycnt),
                           'monthcnt'=>count($monthcnt),
                           'allcnt'=>count($allcnt)
                        );
         }


         public function manage_customer()
         {
          $this->db->where('org_id',$this->session->org_id);
          $this->db->where('delete_status',1); 
          $this->db->order_by('company_name','ASC'); 
          return $this->db->get('tbl_customer');
         }

         public function GetLeadDetails($leadopp_id)
         {
             $this->db->where("leadopp_id",$leadopp_id);
            return $this->db->get("tbl_leads_opportunity")->row();
         }

         public function credit_term()
         {
            $this->db->where('org_id',$this->session->org_id);
            return $this->db->get("tbl_credit_term")->result();
         }

         public function primary_customer()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0); 
            $this->db->where('parent_id',0); 
            $this->db->where('cust_type','primary'); 
            $this->db->order_by('company_name','ASC'); 
            return $this->db->get('tbl_customer');
         }

         public function type_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_type')->result();
         }
         public function schedule_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_schedule_type')->result();
         }
         public function location_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_location')->result();
         }
         public function business_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_business')->result();
         }
         public function group_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_group')->result();
         }
         public function country_list()
         {
           return $this->db->query("SELECT id,name FROM `countries`")->result();
         }

         public function schedule_visit_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_schedule_type_name')->result();
         }

        public function getstate($country_id)
        {
          $data=$this->db->query(" SELECT * FROM states WHERE country_id='$country_id'");
          echo "<option value=''>Select State</option>";
          foreach ($data->result() as  $value) 
          {
              echo "<option value='".$value->id."'>".$value->name."</option>";
          }
        }

        public function ImportContacts()
        {
            $org_id=$this->session->org_id;
            $created_by=$this->session->id;
            $created_date=date('Y-m-d H:i:s');
            $date=date('Y-m-d');

            if(isset($_FILES['excel']) && $_FILES['excel']['error']==0)
             {
                define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
                require_once ('assets/PHPExcel/Classes/PHPExcel.php');
                $tmpfname = $_FILES['excel']['tmp_name'];
                $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
                $excelObj = $excelReader->load($tmpfname);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();

                for ($row = 2; $row <= $lastRow; $row++)
                 {
                    $company_name=$worksheet->getCell('A'.$row)->getValue();
                    $contact_person_name1=$worksheet->getCell('B'.$row)->getValue();
                    $phone_no=$worksheet->getCell('C'.$row)->getValue();
                    $email=$worksheet->getCell('D'.$row)->getValue();
                    $address=$worksheet->getCell('E'.$row)->getValue();
                    $city=$worksheet->getCell('F'.$row)->getValue();

                    if(!empty($company_name))
                    {
                      $this->db->where('email',$email);
                      $query=$this->db->get('tbl_customer')->result();
                      if(count($query)<=0)
                      {
                         $this->db->query("
                                         INSERT INTO `tbl_customer`(`org_id`, `created_by`, `parent_id`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `android_id`, `imei`, `cust_type`, `leadopp_id`, `type`, `delete_status`, `created_date`)VALUES ('$org_id','$created_by',0,0,0,0,0,'$company_name','$contact_person_name1','','$phone_no','','','$email','$address','$city','','','buro@123','$date','','','','','primary','','P',0,'$created_date')

                         ");  
                      }                   
                    }
                 }
            }
        }



        public function ExportContacts()
        {
            $org_id=$this->session->org_id;
            define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
            require_once ('assets/PHPExcel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
            $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Customer List'); 
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:E2');

            $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Contact Name'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Contact Person'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Contact No.'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Email'); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Address'); 
            $objPHPExcel->getActiveSheet()->getStyle("A3:E3")->getFont()->setBold( true );

            $styleArray = array(
              'borders' => array(
                'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
                )
              )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A3:E3')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->applyFromArray($styleArray);

            $objPHPExcel->getActiveSheet()->getStyle('A3:E3')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'FFFD40')
                    )
                )
            );

            $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'F9AA74'),
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->getColumnDimension('A2')->setWidth(30);

            

            $rowCount=4;
            $this->db->where('org_id',$org_id);
            $data=$this->db->get('tbl_customer')->result();
            $finalarray=array();

            $cnt=1;
            foreach ($data as  $res) 
            {
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $res->company_name);
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $res->contact_person_name1);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $res->phone_no);
                $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $res->email);
                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $res->address);
                $rowCount++;
                $cnt++;
            }    

            $filename='Contacts.xlsx';
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=".$filename."");
            header("Content-Transfer-Encoding: binary ");
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            ob_end_clean(); 
            $objWriter->save('php://output');
            exit;
        }


        public function UploadScheduleDocument($query_id)
        {
            $this->db->select('schedule_id');
            $this->db->where('issue_id',$query_id);
            $schedule_data=$this->db->get('tbl_schedule')->row();

            $count=count($_FILES['Document']['name']);
           
            for($i=0;$i<$count;$i++)
            {
                if(!empty($_FILES['Document']['name'][$i]))
                  {
                        $image = $_FILES['Document']['name'][$i];
                        $cur_date=date("dmyHis");
                        $sepext = explode('.', strtolower($image));
                        $extension = end($sepext);
                        $store_file =$cur_date.'_'.$i.".$extension";
                        $move_file = FCPATH.'assets/admin/scheduledocuments/';
                        $move_file1 = $move_file . basename($store_file);
                        move_uploaded_file($_FILES['Document']['tmp_name'][$i], $move_file1); 
                        chmod($move_file1, 0755); 
                        $Array=array(
                                      'schedule_id'=>$schedule_data->schedule_id,
                                      'issue_id'=>$query_id,
                                      'upload_by'=>$_SESSION['id'],
                                      'uploadfilename'=>$store_file,
                                      'doc_name'=>$image,
                                      'date_created'=>date('Y-m-d H:i:s')
                                    );
                     $this->db->insert('tbl_schedule_document',$Array);
                }
            }
        }
         public function fetchschedule_type()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);    
            $this->db->where('status',1);
            return $this->db->get('tbl_schedule_type_name')->result();
         }

        public function ScheduleReport($type)
        {
            $assign_to=$_SESSION['id'];
            $org_id=$this->session->org_id;
            if($type=='All')
            {
              if($_SESSION['user_type']=='SA')
              {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' ORDER BY query_id DESC ");
              }
              else
              {
                 $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and assign_to='$assign_to' ORDER BY query_id DESC ");
                  
              }
            }
            else if($type=='Completed')
            {            

              if($_SESSION['user_type']=='SA')
              {
                 $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE  org_id='$org_id' and status='completed' ORDER BY query_id DESC ");
              }
              else
              {
                 $data = $this->db->query("  SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='completed' and assign_to='$assign_to'  ORDER BY query_id DESC ");
                  
              }

            }
            else if($type=='Pending')
            {
              if($_SESSION['user_type']=='SA')
              {
                  $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending'   ORDER BY query_id DESC ");
              }
              else
              {
                  $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending' and assign_to='$assign_to'  ORDER BY query_id DESC ");
              }
            }
            else if($type=='Incompleted')
            {

             if($_SESSION['user_type']=='SA')
              {
                 $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted'  ORDER BY query_id DESC  ");
              }
              else
              {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted'  and assign_to='$assign_to'  ORDER BY query_id DESC  ");
              }
            }

            
             $issue=array();
             foreach ($data->result() as $value)
             {
                $customer_id = $value->customer_id;
                $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $company_name = $data1->company_name;
                $contact_person_name1 = $data1->contact_person_name1;
                $phone_no = $data1->phone_no;
                $email = $data1->email;
                $customer_id = $data1->customer_id;
                $query_id=$value->query_id;
                $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount = $data3->count;
                if ($schedulecount>1)
                {
                   $highlight = "YES";
                }
                else
                {
                   $highlight = "NO";
                }
                if ($schedulecount>0) 
                {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
                }
                else
                {
                  $check_assign = "No";
                }

                $arr=array
                (
                    'company_name'=>$company_name,
                    'contact_person_name1'=>$contact_person_name1,
                    'phone_no'=>$phone_no,
                    'email'=>$email,
                    'customer_id'=>$customer_id,
                    'product_name'=>$value->product_name,
                    'query_id'=>$value->query_id,
                    'issue'=>$value->issue,
                    'ticket_no'=>$value->ticket_no,
                    'status'=>$value->status,
                    'priority'=>$value->priority,
                    'created_date'=>$value->created_date,
                    'assign_date'=>$assign_date,
                    'starttime'=>$assign_starttime,
                    'endtime'=>$assign_endtime,
                    'check_assign'=>$check_assign,
                    'highlight'=>$highlight,
                    'schedulecount'=>$schedulecount1,
                    'employee_name'=>$employee_name
                );
                array_push($issue, $arr);
             }
             return $issue;
        }

        public function Add_customer($formdata) 
        {
            $admin_id = $this->session->id;
            $dob2 = str_replace(',', ' ', $formdata['dob']);
            $dob1 = date("Y-m-d", strtotime($dob2));
            if ($formdata['company_aniversary']!='') 
            {
                $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
                $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
            }
            else 
            {
              $company_anniversary = '';
            }
            if ($formdata['marriage_aniversary']!='') 
            {
               $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
               $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
            }
            else
            {
              $marriage_anniversary = '';
            }
            $bussiness = $formdata['business'];
            $bussiness_id="";
            for ($i=0; $i < count($bussiness); $i++) 
            { 
               $bussiness_id=$bussiness_id.$bussiness[$i].",";
            }
            $buss_id1 = trim($bussiness_id, ',');
            if (empty($buss_id1))
            {
               $buss_id='0';
            }
            else
            {
               $buss_id=$buss_id1;
            }
            // ------------------ Primary / Secondary Account --------------------------------
            if ($formdata['custtype']=='primary') 
            {
                $ordanizer_name = TRIM($formdata['ordanizer_name']);
                $parentid = '0';
            }
            else
            {
                $parentid = $formdata['parentid'];
                $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
                $ordanizer_name = $parent_res->company_name;
            }

            // -------------------------------------------------------------------------------------------

            $date=date("Y-m-d H:i:s"); 
            $data1=array(
                          'created_by'=>$admin_id,
                          'parent_id'=>$parentid,
                          'type_id'=>$formdata['type'],
                          'business_id'=>$buss_id,
                          'location_id'=>$formdata['location'],

                          'pincode'=>$formdata['pincode'],
                          'pan_no'=>$formdata['pan_no'],
                          'tan_no'=>$formdata['tan_no'],
                          'registration_type'=>$formdata['registration_type'],
                          'gstin'=>$formdata['gstin'],
                          'credit_term'=>$formdata['credit_term'],
                          'address2'=>$formdata['address2'],
                          'address3'=>$formdata['address3'], 
                          'mailing_name'=>$formdata['mailing_name'], 
                          'contact_code'=>$formdata['contact_code'], 

                          'group_id'=>$formdata['group'],
                          'company_name'=>$ordanizer_name,
                          'contact_person_name1'=>$formdata['contact_person'],
                          'alternate_email'=>$formdata['alternate_email_id'],
                          'phone_no'=>$formdata['contact_number1'],
                          'alternate_number'=>$formdata['contact_number2'],
                          'landline_number'=>$formdata['landline_number'],
                          'email'=>$formdata['email_id'],
                          'address'=>$formdata['address'],
                          'city'=>$formdata['city'],
                          'state'=>$formdata['state'],
                          'country'=>$formdata['country'],
                          'password'=>$formdata['password'],
                          'dob'=>$dob1,
                          'company_anniversary'=>$company_anniversary,
                          'marriage_anniversary'=>$marriage_anniversary,
                          'android_id'=>'',
                          'cust_type'=>$formdata['custtype'],
                          'org_id'=>$this->session->org_id,
                          'created_date'=>$date
                        );

            // print_r($data1);

            $res=$this->db->insert('tbl_customer',$data1);
            if($res)
            {
              echo 1;
            }
            else
            {
              echo 0;
            }
          }


          public function delete_customer($customerid) 
          { 
              $this->db->set('delete_status',1);
              $this->db->where('customer_id',$customerid);
              return $this->db->update('tbl_customer');
          }

         public function edit_customer($customerid)
         {
            return $this->db->query("SELECT `customer_id`,`leadopp_id`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `parent_id`, `cust_type` FROM `tbl_customer` WHERE `customer_id`='$customerid'");
         }

         public function mult_buss_list($get_businessid) 
         {
                // echo "SELECT `business_id`, `business_name` FROM `tbl_business` WHERE business_id IN($get_businessid)";
                return $this->db->query("SELECT `business_id`, `business_name` FROM `tbl_business` WHERE business_id IN($get_businessid)");
                // print_r($data->result());
         }



       public function IssueAjaxUserData()
        {
           $org_id=$this->session->org_id;
           $user_type=$this->session->user_type;
           $employee_id=$this->session->id;
           $params = $columns = $totalRecords = $data = array();
           $params = $_REQUEST;
           $columns = array( 
                              0 =>'SRNo',
                              1 =>'Ticket No', 
                              2 => 'Status',
                              3 => 'Company Name',
                              4 => 'Product Name',
                              5 => 'Issue',
                              6 => 'Schedule Date',
                              7 => 'Schedule To',
                              8 => 'Priority',
                              9 => 'Assign DateTime',
                              10 => 'Assign DateTime',
                              11 => 'Action'
                            );
            $where = $sqlTot = $sqlRec = "";
      
            if( !empty($params['search']['value']) ) 
            {   
              $where .=" and  ticket_no like '".$params['search']['value']."%' ";    
            }

           if($user_type=='SA')
           {
              $sql = " 
                       SELECT * FROM `tbl_user_query` 
                       Where org_id='$org_id' 
                    ";    
           }
           else
           {
                $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where org_id='$org_id'  and assign_to='$employee_id'
                      "; 
           }

            $sqlTot .= $sql;
            $sqlRec .= $sql;
            if(isset($where) && $where != '') 
            {
              $sqlTot .= $where;
              $sqlRec .= $where;
            }
            $sqlRec .=" ORDER BY created_date ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
            
            $queryTot =$this->db->query($sqlTot)->result();
            $totalRecords =count($queryTot);
            $queryRecords =$this->db->query($sqlRec)->result();
            $i=1;

            foreach ($queryRecords as $value)
            {

              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                    $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount1 = $data_count->count;
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    $employee_name = $data5->name;
                    $check_assign = "Yes";
              }
              else
              {
                    $check_assign = "No";
              }

              $Status=$value->status;
              if($Status=='pending')
              {
                $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
              }
              else if($Status=='completed')
              {
                $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>'; 
              }
              else if($Status=='in_progress')
              {
                $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>'; 
              }
              else if($Status=='in_complete')
              {
                $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';  
              }

              $scheduledatetime=date("d F, Y",strtotime($value->created_date)).' '.date("h:ia",strtotime($assign_starttime)).' TO  '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }

              else if($schedulecount1!=0)
              {
                 $check='<a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a><br>'.$employee_name.'<br>';
              }
              else
              {
                $check='
                        <a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a><br>'.$employee_name.'<br>
                     ';
              }

              $priority=' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -100px 30px 15px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="'.$value->query_id.'">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="'.$value->query_id.'">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="'.$value->query_id.'">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">'.$value->priority.'</span>
               ';  

              $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';

              $upload_documents='<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="'.$value->query_id.'"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';

                  $new=array(
                                 0=>$i,
                                 1=>$value->ticket_no,
                                 2=>$Status,
                                 3=>$company_name,
                                 4=>$contact_person_name1,
                                 5=>$value->product_name,
                                 6=>$value->issue,
                                 7=>$scheduledatetime,
                                 8=>$check,
                                 9=>$priority,
                                 10=>date("d M Y", strtotime($value->created_date)),
                                 11=>$upload_documents,
                                 12=>$remark
                            );
                     $i++;
               array_push($data, $new);
            }

            $json_data = array(
                            "draw"            => intval( $params['draw'] ),   
                            "recordsTotal"    => intval( $totalRecords ),  
                            "recordsFiltered" => intval($totalRecords),
                            "data"            => $data   // total data array
                            );
             echo json_encode($json_data);  // send data as json format
        }


         public function get_daterange_data($formdata)
         {
            $start_date = str_replace(',', ' ', $formdata['start_date']);
            $end_date = str_replace(',', ' ', $formdata['end_date']);
            $from_date = date("Y-m-d", strtotime($start_date));
            $to_date = date("Y-m-d", strtotime($end_date));
            $this->db->where('created_date >=', $from_date);
            $this->db->where('created_date <=', $to_date);
            $this->db->where('org_id',$this->session->org_id);
           
             if(!empty($formdata['status']))
             {
               $this->db->where('status',$formdata['status']); 
             }

             $this->db->order_by('query_id','DESC');             
            // $this->db->limit(50); 
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;
              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));
              if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else if($schedulecount1!=0)
              {
                 $check='<a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a> '.$employee_name.'<br>';
              }
              else
              {
                $check='
                        <a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a>'.$employee_name.'<br>
                     ';
              }
              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
                 // $bg_color='info';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
                 // $bg_color='danger';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';  
              $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
              $upload_documents='<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="'.$value->query_id.'"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';
              //---------------------------------------------------------------                    
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date)),
                               'upload_documents'=>$upload_documents,
                               'remark'=>$remark
                          );
                 array_push($data, $new);
            }  
            return $data;
         }

        public function get_daterange_reschedule_data($formdata)
         {
            $start_date = str_replace(',', ' ', $formdata['start_date']);
            $end_date = str_replace(',', ' ', $formdata['end_date']);
            $from_date = date("Y-m-d", strtotime($start_date));
            $to_date = date("Y-m-d", strtotime($end_date));
            $this->db->where('created_date >=', $from_date);
            $this->db->where('created_date <=', $to_date);
            $this->db->where('status','in_complete'); 
            $this->db->where('org_id',$this->session->org_id);          
            $this->db->order_by('query_id','DESC');             
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;
                           
              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else
              {
                $check='
                         '.$employee_name.'&nbsp;
                        <a  data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)"  data-original-title="Click for assign task" id="'.$value->query_id.'"><span class="label label-success">Re-Schedule</span></a>
                       ';
              }

              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';                   
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date))
                          );
                 array_push($data, $new);
            }  
            return $data;
         }


         public function get_daterange_completed_data($formdata)
         {
            $start_date = str_replace(',', ' ', $formdata['start_date']);
            $end_date = str_replace(',', ' ', $formdata['end_date']);
            $from_date = date("Y-m-d", strtotime($start_date));
            $to_date = date("Y-m-d", strtotime($end_date));
            $this->db->where('created_date >=', $from_date);
            $this->db->where('created_date <=', $to_date);
            $this->db->where('status','completed'); 
            $this->db->where('org_id',$this->session->org_id);          
            $this->db->order_by('query_id','DESC');             
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;

              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else
              {
                $check=$employee_name;
              }

              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';                   
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date))
                          );
                 array_push($data, $new);
            }  
            return $data;
         }


         public function get_pending_issue_list()
         {           
            $created_date=date('Y-m-d');            
            $this->db->where('DATE(created_date)', $created_date);
            $this->db->where('org_id',$this->session->org_id);
            $this->db->order_by('query_id','DESC'); 
            $this->db->where('status','pending');              
            $this->db->limit(50); 
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;
              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));

              if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else if($schedulecount1!=0)
              {
                 $check='<a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a> '.$employee_name.'<br>';
              }
              else
              {
                $check='
                        <a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a> '.$employee_name.'<br>
                     ';
              }
              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
                 // $bg_color='info';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
                 // $bg_color='danger';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';  
                $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
                $upload_documents='<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="'.$value->query_id.'"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date)),
                               'upload_documents'=>$upload_documents,
                               'remark'=>$remark
                          );
                 array_push($data, $new);
            }  
            return $data;
         }


         public function get_reschedule_issue_list()
         {

            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('status','in_complete');            
            $this->db->order_by('query_id','DESC'); 
            // $this->db->limit(50); 
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;
                           
              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else
              {
                $check='
                         '.$employee_name.'&nbsp;
                        <a  data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)"  data-original-title="Click for assign task" id="'.$value->query_id.'"><span class="label label-success">Re-Schedule</span></a>
                       ';
              }

              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';                   
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date))
                          );
                 array_push($data, $new);
            }  
            return $data;
         }


         public function get_complete_issue_list()
         {
            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('status','completed');            
            $this->db->order_by('query_id','DESC'); 
            $this->db->limit(50); 
            $queryRecords=$this->db->get('tbl_user_query')->result();
            $data = array();
            $a=1;
            foreach ($queryRecords as $value)
            {
              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                  $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                  $schedulecount1 = $data_count->count;
                  $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                  $employee_id = $data4->schedule_assign_to;
                  $assign_date = $data4->assign_date;
                  $assign_starttime = $data4->assign_starttime;
                  $assign_endtime = $data4->assign_endtime;
                  $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                  $employee_name = $data5->name;
                  $check_assign = "Yes";
              }
              else
              {
                  $check_assign = "No";
              }

              $Status1=$value->status;
              // if($Status=='pending')
              // {
              //   $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
              // }
              // else if($Status=='completed')
              // {
              //   $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>'; 
              // }
              // else if($Status=='in_progress')
              // {
              //   $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>'; 
              // }
              // else if($Status=='in_complete')
              // {
              //   $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';  
              // } 

              $scheduledatetime=date("h:ia",strtotime($assign_starttime)).' To '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else
              {
                $check=$employee_name;
              }

              if($value->priority=='Normal')
              {
                $Normal='class="active"';
                $bg_color='info';
              }
              else
              {
                 $Normal='';
              }
              if($value->priority=='Low')
              {
                $Low='class="active"';
                $bg_color='danger';
              }
              else
              {
                 $Low='';
              }
              if($value->priority=='High')
              {
                $High='class="active"';
                $bg_color='success';
              }
              else
              {
                 $High='';
              }
              $priority='
                          <a href="#" class="label label-'.$bg_color.' dropdown-toggle" data-toggle="dropdown">
                             '.$value->priority.' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li '.$Normal.'>
                              <a onclick="priority_normal(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li '.$Low.'>
                               <a onclick="priority_low(this.id)" id="'.$value->query_id.'">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li '.$High.' >
                                <a onclick="priority_high(this.id)" id="'.$value->query_id.'" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';                   
                $new=array(
                               'ticket_no'=>$value->ticket_no,
                               'query_id'=>$value->query_id,
                               'status'=>ucwords($Status1),
                               'company_name'=>$company_name,
                               'contact_person_name1'=>$contact_person_name1,
                               'product_name'=>$value->product_name,
                               'issue'=>$value->issue,
                               'scheduledatetime'=>$scheduledatetime,
                               'check'=>$check,
                               'priority'=>$priority,
                               'created_date'=>date("d F, Y", strtotime($value->created_date))
                          );
                 array_push($data, $new);
            }  
            return $data;
         }

       public function IssueAjaxData()
        {
           $org_id=$this->session->org_id;
           $user_type=$this->session->user_type;
           $employee_id=$this->session->id;
           $params = $columns = $totalRecords = $data = array();
           $params = $_REQUEST;
           $columns = array( 
                              0 =>'SRNo',
                              1 =>'Ticket No', 
                              2 => 'Status',
                              3 => 'Company Name',
                              4 => 'Product Name',
                              5 => 'Issue',
                              6 => 'Schedule Date',
                              7 => 'Schedule To',
                              8 => 'Priority',
                              9 => 'Assign DateTime',
                              10 => 'Assign DateTime',
                              11 => 'Action'
                            );
            $where = $sqlTot = $sqlRec = "";
      
            if( !empty($params['search']['value']) ) 
            {   
              $where .=" and  ticket_no like '".$params['search']['value']."%' ";    
            }

           if($user_type=='SA')
           {
              $sql = " 
                       SELECT * FROM `tbl_user_query` 
                       Where org_id='$org_id' 
                    ";    
           }
           else
           {
                $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where org_id='$org_id'  and assign_to='$employee_id'
                      "; 
           }

            $sqlTot .= $sql;
            $sqlRec .= $sql;
            if(isset($where) && $where != '') 
            {
              $sqlTot .= $where;
              $sqlRec .= $where;
            }
            $sqlRec .=" ORDER BY created_date ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
            
            $queryTot =$this->db->query($sqlTot)->result();
            $totalRecords =count($queryTot);
            $queryRecords =$this->db->query($sqlRec)->result();
            $i=1;

            foreach ($queryRecords as $value)
            {

              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;
              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                    $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount1 = $data_count->count;
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    $employee_name = $data5->name;
                    $check_assign = "Yes";
              }
              else
              {
                    $check_assign = "No";
              }

              $Status=$value->status;
              if($Status=='pending')
              {
                $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
              }
              else if($Status=='completed')
              {
                $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>'; 
              }
              else if($Status=='in_progress')
              {
                $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>'; 
              }
              else if($Status=='in_complete')
              {
                $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';  
              }

              $scheduledatetime=date("d F, Y",strtotime($value->created_date)).' '.date("h:ia",strtotime($assign_starttime)).' TO  '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }

              else if($schedulecount1!=0)
              {
                 $check='<a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a><br>'.$employee_name.'<br>';
              }
              else
              {
                $check='
                        <a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="'.$value->query_id.'"><span class="label label-primary">'.$schedulecount1.'</span></a><br>'.$employee_name.'<br>
                     ';
              }

              $priority=' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -100px 30px 15px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="'.$value->query_id.'">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="'.$value->query_id.'">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="'.$value->query_id.'">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">'.$value->priority.'</span>
               ';  

              $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';

              $upload_documents='<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="'.$value->query_id.'"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';

                  $new=array(
                                 0=>$i,
                                 1=>$value->ticket_no,
                                 2=>$Status,
                                 3=>$company_name,
                                 4=>$contact_person_name1,
                                 5=>$value->product_name,
                                 6=>$value->issue,
                                 7=>$scheduledatetime,
                                 8=>$check,
                                 9=>$priority,
                                 10=>date("d M Y", strtotime($value->created_date)),
                                 11=>$upload_documents,
                                 12=>$remark
                            );
                     $i++;
               array_push($data, $new);
            }

            $json_data = array(
                            "draw"            => intval( $params['draw'] ),   
                            "recordsTotal"    => intval( $totalRecords ),  
                            "recordsFiltered" => intval($totalRecords),
                            "data"            => $data   // total data array
                            );
             echo json_encode($json_data);  // send data as json format
        }


       public function CompleteIssueAjaxData()
        {
           $user_type=$this->session->user_type;
           $employee_id=$this->session->id;
           $org_id=$this->session->org_id;

           $params = $columns = $totalRecords = $data = array();
           $params = $_REQUEST;
           $columns = array( 
                              0 =>'SRNo',
                              1 =>'Ticket No', 
                              2 => 'Status',
                              3 => 'Company Name',
                              4 => 'Product Name',
                              5 => 'Issue',
                              6 => 'Schedule Date',
                              7 => 'Schedule To',
                              8 => 'Priority',
                              9 => 'Assign DateTime',
                              10 => 'Assign DateTime',
                              11 => 'Action'
                            );
            $where = $sqlTot = $sqlRec = "";
       
            if( !empty($params['search']['value']) ) 
            {   
              $where .=" and  ticket_no like '".$params['search']['value']."%' ";    
            }

           if($user_type=='SA')
           {
               $sql = "   SELECT * FROM `tbl_user_query`  
                          Where`status`='completed' and org_id='$org_id'
                      ";    
           }
           else
           {
              $sql = " SELECT * FROM `tbl_user_query`  
                       Where  `status`='completed'  and org_id='$org_id' and   assign_to='$employee_id'
                     ";                         
           }

            $sqlTot .= $sql;
            $sqlRec .= $sql;
            if(isset($where) && $where != '') 
            {
              $sqlTot .= $where;
              $sqlRec .= $where;
            }
            $sqlRec .=" ORDER BY created_date ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
            
            $queryTot =$this->db->query($sqlTot)->result();
            $totalRecords =count($queryTot);
            $queryRecords =$this->db->query($sqlRec)->result();
            $i=1;


            foreach ($queryRecords as $value)
            {

              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;

              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                    $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount1 = $data_count->count;
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    $employee_name = $data5->name;
                    $check_assign = "Yes";
              }
              else
              {
                    $check_assign = "No";
              }

              $Status=$value->status;
              if($Status=='pending')
              {
                $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
              }
              else if($Status=='completed')
              {
                $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>'; 
              }
              else if($Status=='in_progress')
              {
                $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>'; 
              }
              else if($Status=='in_complete')
              {
                $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';  
              }

              $scheduledatetime=date("d F, Y",strtotime($value->created_date)).' '.date("h:ia",strtotime($assign_starttime)).' TO  '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }

              else
              {
                $check=$employee_name;
              }

              $priority=' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -150px 26px 10px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="'.$value->query_id.'">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="'.$value->query_id.'">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="'.$value->query_id.'">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">'.$value->priority.'</span>
               ';  

              $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
                  $new=array(
                                 0=>$i,
                                 1=>$value->ticket_no,
                                 2=>$company_name,
                                 3=>$contact_person_name1,
                                 4=>$value->product_name,
                                 5=>$value->issue,
                                 6=>date("d F, Y", strtotime($value->created_date)),
                                 7=>$scheduledatetime,
                                 8=>$priority,
                                 9=>$check,
                                 10=>$remark
                            );
                     $i++;
               array_push($data, $new);
            }
            $json_data = array(
                                "draw"            => intval( $params['draw'] ),   
                                "recordsTotal"    => intval( $totalRecords ),  
                                "recordsFiltered" => intval($totalRecords),
                                "data"            => $data  
                              );
            echo json_encode($json_data);  
        }



       public function RescheduleIssueAjaxData()
        {
           $user_type=$this->session->user_type;
           $employee_id=$this->session->id;
           $org_id=$this->session->org_id;

           $params = $columns = $totalRecords = $data = array();
           $params = $_REQUEST;
           $columns = array( 
                              0 =>'SRNo',
                              1 =>'Ticket No', 
                              2 => 'Status',
                              3 => 'Company Name',
                              4 => 'Product Name',
                              5 => 'Issue',
                              6 => 'Schedule Date',
                              7 => 'Schedule To',
                              8 => 'Priority',
                              9 => 'Assign DateTime',
                              10 => 'Assign DateTime',
                              11 => 'Action'
                            );
            $where = $sqlTot = $sqlRec = "";      
            if( !empty($params['search']['value']) ) 
            {   
              $where .=" and  ticket_no like '".$params['search']['value']."%' ";    
            }
            
           if($user_type=='SA')
           {
              $sql = " 
                        SELECT * FROM `tbl_user_query` 
                        Where `status`='in_complete' and org_id='$org_id' 
                     ";    
           }

           else
           {
                $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where  `status`='in_complete'  and org_id='$org_id' and   assign_to='$employee_id'
                      "; 
           }

            $sqlTot .= $sql;
            $sqlRec .= $sql;
            if(isset($where) && $where != '') 
            {
              $sqlTot .= $where;
              $sqlRec .= $where;
            }
            $sqlRec .=" ORDER BY created_date ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
            
            $queryTot =$this->db->query($sqlTot)->result();
            $totalRecords =count($queryTot);
            $queryRecords =$this->db->query($sqlRec)->result();
            $i=1;


            foreach ($queryRecords as $value)
            {

              $customer_id = $value->customer_id;
              $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
              $company_name = $data1->company_name;
              $contact_person_name1 = $data1->contact_person_name1;
              $phone_no = $data1->phone_no;
              $email = $data1->email;
              $customer_id = $data1->customer_id;
              $query_id=$value->query_id;

              $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
              $schedulecount = $data3->count;
              if ($schedulecount>1)
              {
                 $highlight = "YES";
              }
              else
              {
                 $highlight = "NO";
              }
              if ($schedulecount>0) 
              {
                    $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount1 = $data_count->count;
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    $employee_name = $data5->name;
                    $check_assign = "Yes";
              }
              else
              {
                    $check_assign = "No";
              }

              $Status=$value->status;
              if($Status=='pending')
              {
                $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
              }
              else if($Status=='completed')
              {
                $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>'; 
              }
              else if($Status=='in_progress')
              {
                $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>'; 
              }
              else if($Status=='in_complete')
              {
                $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';  
              }

              $scheduledatetime=date("d F, Y",strtotime($value->created_date)).' '.date("h:ia",strtotime($assign_starttime)).' TO  '.date("h:i a",strtotime($assign_endtime));

            if ($check_assign=='No') 
              {
                $check=' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="'.$value->query_id.'"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
              }
              else
              {
                $check='
                          <br>'.$employee_name.'<br>
                        <a  data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)"  data-original-title="Click for assign task" id="'.$value->query_id.'"><span class="label label-success">Re-Schedule</span></a>
                       ';
              }

              $priority=' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -150px 26px 10px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="'.$value->query_id.'">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="'.$value->query_id.'">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="'.$value->query_id.'">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">'.$value->priority.'</span>
               ';  

              $remark='<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="'.$value->ticket_no.'">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
                  $new=array(
                                 0=>$i,
                                 1=>$value->ticket_no,
                                 2=>$company_name,
                                 3=>$contact_person_name1,
                                 4=>$value->product_name,
                                 5=>$value->issue,
                                 6=>date("d F, Y", strtotime($value->created_date)),
                                 7=>$scheduledatetime,
                                 8=>$priority,
                                 9=>$check,
                                 10=>$remark,
                            );
                     $i++;
               array_push($data, $new);
            }

            $json_data = array(
                            "draw"            => intval( $params['draw'] ),   
                            "recordsTotal"    => intval( $totalRecords ),  
                            "recordsFiltered" => intval($totalRecords),
                            "data"            => $data   // total data array
                            );
             echo json_encode($json_data);  // send data as json format
        }







         // getting selected state list

         public function selected_state_list($customerid)
        {
              $data = $this->db->query("SELECT country FROM `tbl_customer` WHERE `customer_id`='$customerid'")->row();
              $country = $data->country;

              return $this->db->query(" SELECT id,name FROM states WHERE country_id='$country'")->result();
        }


        public function update_customer($formdata)
        {

                   $ordanizer_name = TRIM($formdata['ordanizer_name']);
                   $dob2 = str_replace(',', ' ', $formdata['dob']);
                   $dob1 = date("Y-m-d", strtotime($dob2));
                   if ($formdata['company_aniversary']!='') 
                   {
                      $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
                      $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
                   }
                  else 
                   {
                     $company_anniversary = '';
                   }

                 if ($formdata['marriage_aniversary']!='') 
                  {
                     $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
                     $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
                  }
                  else
                  {
                    $marriage_anniversary = '';
                  }

                  $bussiness = $formdata['business'];
                  $bussiness_id="";
                  for ($i=0; $i < count($bussiness); $i++) 
                  { 
                       $bussiness_id=$bussiness_id.$bussiness[$i].",";
                  }
                  $buss_id1 = trim($bussiness_id, ',');

                  if (empty($buss_id1))
                  {
                     $buss_id='0';
                  }
                  else
                  {
                     $buss_id=$buss_id1;
                  }
                  // -------------- Primary / Secondary Account --------------------------------
                  if ($formdata['custtype']=='primary') 
                  {
                      $ordanizer_name = TRIM($formdata['ordanizer_name']);
                      $parentid = '0';
                  }
                  else
                  {
                      $parentid = $formdata['parentid'];
                      $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
                      $ordanizer_name = $parent_res->company_name;
                  }

                  $this->db->where('customer_id', $formdata['customer_id']);     
                  $data1=array(
                                'parent_id'=>$parentid,
                                'type_id'=>$formdata['type'],
                                'business_id'=>$buss_id,
                                'location_id'=>$formdata['location'],
                                'group_id'=>$formdata['group'],
                                'company_name'=>$ordanizer_name,
                                'contact_person_name1'=>$formdata['contact_person'],
                                'alternate_email'=>$formdata['alternate_email_id'],
                                'phone_no'=>$formdata['contact_number1'],
                                'alternate_number'=>$formdata['contact_number2'],
                                'landline_number'=>$formdata['landline_number'],
                                'email'=>$formdata['email_id'],
                                'address'=>$formdata['address'],
                                'city'=>$formdata['city'],
                                'state'=>$formdata['state'],
                                'country'=>$formdata['country'],
                                'dob'=>$dob1,
                                'company_anniversary'=>$company_anniversary,
                                'marriage_anniversary'=>$marriage_anniversary,
                                'cust_type'=>$formdata['custtype']
                          );
                   $this->db->update('tbl_customer', $data1);
          }


        public function update_lead_customer($formdata)
        {
             $ordanizer_name = TRIM($formdata['ordanizer_name']);
             $dob2 = str_replace(',', ' ', $formdata['dob']);
             $dob1 = date("Y-m-d", strtotime($dob2));
             if ($formdata['company_aniversary']!='') 
             {
                $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
                $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
             }
            else 
             {
               $company_anniversary = '';
             }
            if ($formdata['marriage_aniversary']!='') 
            {
               $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
               $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
            }
            else
            {
              $marriage_anniversary = '';
            }
            $bussiness = $formdata['business'];
            $bussiness_id="";

            for ($i=0; $i < count($bussiness); $i++) 
            { 
              $bussiness_id=$bussiness_id.$bussiness[$i].",";
            }
            $buss_id1 = trim($bussiness_id, ',');

            if (empty($buss_id1))
            {
               $buss_id='0';
            }
            else
            {
               $buss_id=$buss_id1;
            }
            if ($formdata['custtype']=='primary') 
            {
                $ordanizer_name = TRIM($formdata['ordanizer_name']);
                $parentid = '0';
            }
            else
            {
                $parentid = $formdata['parentid'];
                $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
                $ordanizer_name = $parent_res->company_name;
            }

            $this->db->where('customer_id', $formdata['customer_id']);     
            $data1=array(
                          'parent_id'=>$parentid,
                          'type_id'=>$formdata['type'],
                          'business_id'=>$buss_id,
                          'location_id'=>$formdata['location'],
                          'group_id'=>$formdata['group'],
                          'company_name'=>$ordanizer_name,
                          'contact_person_name1'=>$formdata['contact_person'],
                          'alternate_email'=>$formdata['alternate_email_id'],
                          'phone_no'=>$formdata['contact_number1'],
                          'alternate_number'=>$formdata['contact_number2'],
                          'landline_number'=>$formdata['landline_number'],
                          'email'=>$formdata['email_id'],
                          'address'=>$formdata['address'],
                          'city'=>$formdata['city'],
                          'state'=>$formdata['state'],
                          'country'=>$formdata['country'],
                          'dob'=>$dob1,
                          'company_anniversary'=>$company_anniversary,
                          'marriage_anniversary'=>$marriage_anniversary,
                          'cust_type'=>$formdata['custtype']
                    );
             $this->db->update('tbl_customer', $data1);
             $this->db->where('leadopp_id', $formdata['leadopp_id']);     
             $UpdateArray=array('is_converted'=>1);                         
             $this->db->update('tbl_leads_opportunity', $UpdateArray);
             
          }


// =========== isuue list ===========================================================

         public function Issue()
         {
            // if($this->session->user_type=='SA')
            // {
                 $data = $this->db->query(" SELECT * FROM `tbl_user_query` ORDER BY query_id DESC ");
                 $issue=array();
                 foreach ($data->result() as $value)
                 {

                    $customer_id = $value->customer_id;
                    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;
                    //================ addeed part for schedule ==================
                     $query_id=$value->query_id;
                    // echo "<br>";

                    $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount = $data3->count;
                    if ($schedulecount>1)
                    {
                       $highlight = "YES";
                    }
                    else
                    {
                       $highlight = "NO";
                    }
                    if ($schedulecount>0) 
                    {
                          $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                          $schedulecount1 = $data_count->count;
                          $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();


                          $employee_id = $data4->schedule_assign_to;
                          $assign_date = $data4->assign_date;
                          $assign_starttime = $data4->assign_starttime;
                          $assign_endtime = $data4->assign_endtime;
                          $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                          $employee_name = $data5->name;
                          $check_assign = "Yes";
                    }
                    else
                    {
                          $check_assign = "No";
                    }

                    //================ / addeed part for schedule ==================

                    $arr=array
                    (
                      'company_name'=>$company_name,
                      'contact_person_name1'=>$contact_person_name1,
                      'phone_no'=>$phone_no,
                      'email'=>$email,
                      'customer_id'=>$customer_id,
                      'product_name'=>$value->product_name,
                      'query_id'=>$value->query_id,
                      'issue'=>$value->issue,
                      'ticket_no'=>$value->ticket_no,
                      'status'=>$value->status,
                      'priority'=>$value->priority,
                      'created_date'=>$value->created_date,
                      'assign_date'=>$assign_date,
                      'starttime'=>$assign_starttime,
                      'endtime'=>$assign_endtime,
                      'check_assign'=>$check_assign,
                      'highlight'=>$highlight,
                      'schedulecount'=>$schedulecount1,
                      'employee_name'=>$employee_name
                    );
                    array_push($issue, $arr);
                 }
                 return $issue;

         }
// ======================= Particular employee issue list =====================================
         public function emp_issue()
         {
                 $employee_id = $this->session->id;
                
                //================== get id from comma sepereted column ==============================

                $res = $this->db->query("SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($employee_id)")->row();
                $result = $res->assign_to;
                if (strpos($result, ',') !== false) 
                {
                    $data = $this->db->query("SELECT * FROM `tbl_user_query` where FIND_IN_SET($employee_id,assign_to) ORDER BY query_id DESC ");
                }
                else
                {
                    $data = $this->db->query("SELECT * FROM `tbl_user_query` where `assign_to` IN($employee_id) ORDER BY query_id DESC ");
                }

                $issue=array();
                foreach ($data->result() as $value)
                {
                  $customer_id = $value->customer_id;
                  $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                  $company_name = $data1->company_name;
                  $contact_person_name1 = $data1->contact_person_name1;
                  $phone_no = $data1->phone_no;
                  $email = $data1->email;
                  $customer_id = $data1->customer_id;


                  //================ addeed part for schedule ==================
                     $query_id=$value->query_id;
                    // echo "<br>";

                    $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount = $data3->count;
                    if ($schedulecount>0) 
                    {
                          $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

                         $employee_id = $data4->schedule_assign_to;
                         $assign_date = $data4->assign_date;
                         $assign_starttime = $data4->assign_starttime;
                         $assign_endtime = $data4->assign_endtime;
                          $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                          $employee_name = $data5->name;

                        $check_assign = "Yes";
                    }
                    else
                    {
                        $check_assign = "No";
                    }

                    //================ / addeed part for schedule ==================

                  $arr=array
                  (
                    'company_name'=>$company_name,
                    'contact_person_name1'=>$contact_person_name1,
                    'phone_no'=>$phone_no,
                    'email'=>$email,
                    'customer_id'=>$customer_id,
                    'product_name'=>$value->product_name,
                    'query_id'=>$value->query_id,
                    'issue'=>$value->issue,
                    'ticket_no'=>$value->ticket_no,
                    'status'=>$value->status,
                    'priority'=>$value->priority,
                    'created_date'=>$value->created_date,
                    'assign_date'=>$assign_date,
                      'starttime'=>$assign_starttime,
                      'endtime'=>$assign_endtime,
                      'check_assign'=>$check_assign,
                    'employee_name'=>$employee_name
                  );
                  array_push($issue, $arr);
                }
                return $issue;
          }
// ======================= / Particular employee issue list =====================================
         
         public function incomplete_issue()
         {
                $org_id=$this->session->org_id;
                $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and `status`='in_complete' ORDER BY query_id DESC");
                 $issue=array();
                 foreach ($data->result() as $value)
                 {
                    $customer_id = $value->customer_id;
                    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;

                   

                    //================ added part for schedule ==================
                     $query_id=$value->query_id;
                    // echo "<br>";

                    $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount = $data3->count;
                    if ($schedulecount>0) 
                    {
                          $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();

                         $employee_id = $data4->schedule_assign_to;
                         $assign_date = $data4->assign_date;
                         $assign_starttime = $data4->assign_starttime;
                         $assign_endtime = $data4->assign_endtime;
                          $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                          $employee_name = $data5->name;

                        $check_assign = "Yes";
                    }
                    else
                    {
                        $check_assign = "No";
                    }

                    //================ / addeed part for schedule ==================
                    $arr=array
                    (
                      'company_name'=>$company_name,
                      'contact_person_name1'=>$contact_person_name1,
                      'phone_no'=>$phone_no,
                      'email'=>$email,
                      'customer_id'=>$customer_id,
                      'product_name'=>$value->product_name,
                      'query_id'=>$value->query_id,
                      'issue'=>$value->issue,
                      'ticket_no'=>$value->ticket_no,
                      'status'=>$value->status,
                      'priority'=>$value->priority,
                      'created_date'=>$value->created_date,
                      'assign_date'=>$assign_date,
                      'starttime'=>$assign_starttime,
                      'endtime'=>$assign_endtime,
                      'check_assign'=>$check_assign,
                      'employee_name'=>$employee_name
                    );
                    array_push($issue, $arr);
                 }
                 return $issue;  
         }




         public function completed_issue()
         {
                $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `status`='completed' ORDER BY query_id DESC");
                 $issue=array();
                 foreach ($data->result() as $value)
                 {
                    $customer_id = $value->customer_id;
                    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;

                   

                    //================ addeed part for schedule ==================
                     $query_id=$value->query_id;
                    // echo "<br>";

                    $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount = $data3->count;
                    if ($schedulecount>0) 
                    {
                          // echo "SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1";
                          // echo "<br>";
                          $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();

                         $employee_id = $data4->schedule_assign_to;
                         $assign_date = $data4->assign_date;
                         $assign_starttime = $data4->assign_starttime;
                         $assign_endtime = $data4->assign_endtime;
                         // echo "";
                         $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                         $employee_name = $data5->name;

                        $check_assign = "Yes";
                    }
                    else
                    {
                        $check_assign = "No";
                    }

                    //================ / addeed part for schedule ==================

                    $arr=array
                    (
                      'company_name'=>$company_name,
                      'contact_person_name1'=>$contact_person_name1,
                      'phone_no'=>$phone_no,
                      'email'=>$email,
                      'customer_id'=>$customer_id,
                      'product_name'=>$value->product_name,
                      'query_id'=>$value->query_id,
                      'issue'=>$value->issue,
                      'ticket_no'=>$value->ticket_no,
                      'status'=>$value->status,
                      'priority'=>$value->priority,
                      'created_date'=>$value->created_date,
                      'assign_date'=>$assign_date,
                      'starttime'=>$assign_starttime,
                      'endtime'=>$assign_endtime,
                      'check_assign'=>$check_assign,
                      'employee_name'=>$employee_name
                    );
                    array_push($issue, $arr);
                 }
                 return $issue; 

         }

         public function customer_list()
         {
          $this->db->where('org_id',$this->session->org_id);
          $this->db->where('delete_status',1); 
          $this->db->order_by('company_name','ASC'); 
          return $this->db->get('tbl_customer')->result();

         }

         public function customer_list_task($customer_id)
         {
           $this->db->where('customer_id',$customer_id);
           return $this->db->get("tbl_customer")->result();
         }

          public function employee_list()
         {
          $this->db->where('org_id',$this->session->org_id);
          $this->db->where('user_status',1); 
          $this->db->where('delete_status',0); 
          $this->db->where('user_type','E'); 
          
          return $this->db->get('tbl_admin_login')->result();
         }

         public function employee_list_task($id)
         {
              if(!empty($id))
              {
                $this->db->where('id',$id);
              }
              else
              {
                $this->db->where('user_type','E');
              }
             return $this->db->get("tbl_admin_login")->result();
         }

         public function product_list()
         {
          $this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
          $this->db->where('org_id',$this->session->org_id);
          $this->db->where('delete_status',0);
          $this->db->where('status',1); 
          return $this->db->get('tbl_product_service_list')->result();
         }

         public function product_list_task($product_id)
         {
            $this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
            $this->db->where('prd_srv_id',$product_id);
            return $this->db->get("tbl_product_service_list")->result();
         }


         public function availability($start_date,$start_time,$end_time,$employee_id1)
         {
              $start_date1 = str_replace(',', ' ', $start_date);
              $date = date("Y-m-d", strtotime($start_date1));
              $not_available = $this->db->query("SELECT count(query_id) as count from schedule_assign_to where (`assign_date` = '$date' and `assign_endtime` <= '$end_time') and (`assign_date` = '$date' and `assign_starttime` >= '$start_time') AND status != 'completed'");
         }

         public function fetch_schedule_type_id($query_id)
         {
            $this->db->select('schedule_type_id');
            $this->db->where('issue_id',$query_id);
            return $this->db->get("tbl_schedule")->row();
         }

          public function assign_task()
         {
            return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' AND user_status='1'");
         }


// ================ asign task to customer ==================================================

      public function assign_to($query_id,$employee,$schedule_date,$start_time,$end_time,$schedule_type_id)
         {
              $org_id=$this->session->org_id;
              $schd_date1 = str_replace(',', ' ', $schedule_date);
              $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
              $s_time = $start_time;
              $e_time = $end_time;
              $emp_id = $employee;

               $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");

                $available_count = $available->num_rows();
                if ($available_count==0) 
                {
                   $created_by = $this->session->id;
                   $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
                   $android_id = $data2->android_id;
                   $name = $data2->name;
                   $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                   $ticket_no = $data3->ticket_no;
                   $customer_id = $data3->customer_id;
                   // $schedule_type_id=1;
                   //======================= inserting notification to table for record ===============
                    $notification_msg = "Allocated new task and ticket no.is ".$ticket_no;
                    $date=date("Y-m-d H:i:s");
                    $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");
                    $notification_id = $this->db->insert_id($res);

                    $reg_token = $android_id;
                    $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$ticket_no,'query_id'=>$query_id,'notification_id'=>$notification_id);
                      $target = $reg_token; 
                      $url = 'https://fcm.googleapis.com/fcm/send';
                      $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                      $fields = array();
                      $fields['data'] = $data;
                         if(is_array($target))
                      {
                        $fields['registration_ids'] = $target;
                      }
                      else
                      {
                        $fields['to'] = $target;
                      }
                      $headers = array(
                        'Content-Type:application/json',
                        'Authorization:key='.$server_key
                      );

                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL, $url);
                      curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                      curl_setopt($ch, CURLOPT_POST, true);
                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                      $result = curl_exec($ch);
                      if ($result === FALSE) 
                      {
                        die('FCM Send Error: ' . curl_error($ch));
                      }
                      else
                      {
                           $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                           $android_id = $data3->android_id;
                           $contact_person_name1 = $data2->contact_person_name1;
                           $notification_msg = "Your issue ".$ticket_no." is assign to ".$name;
                           $date=date("Y-m-d H:i:s");
                           $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                           $notification_id1 = $this->db->insert_id($res1);
                           $reg_token = $android_id;
                           $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
                            $target = $reg_token; 
                            $url = 'https://fcm.googleapis.com/fcm/send';
                            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                            $fields = array();
                            $fields['data'] = $data;
                            if(is_array($target))
                            {
                              $fields['registration_ids'] = $target;
                            }
                            else
                            {
                              $fields['to'] = $target;
                            }
                            $headers = array(
                              'Content-Type:application/json',
                              'Authorization:key='.$server_key
                            );

                             $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                            $result = curl_exec($ch);
                            if ($result === FALSE) 
                            {
                                die('FCM Send Error: ' . curl_error($ch));
                            }
                            else
                            {
                                $schd_date2 = str_replace(',', ' ', $schedule_date);
                                $notification_date = date("Y-m-d", strtotime($schd_date2));
                                $this->db->set('assign_to',$emp_id);
                                $this->db->set('status','pending');
                                $this->db->where('query_id',$query_id);
                                $this->db->update('tbl_user_query');
                                $schedule_ticketno = 'S_'.$ticket_no;
                                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`,`schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','Case','$date')");
                                echo 1;
                            }
                             curl_close($ch);
                      }
                      curl_close($ch);
                }
                else
                {
                    echo "2";
                }
               
         }


         public function assign_to_override($query_id,$employee,$schedule_date,$start_time,$end_time)
         {
                  $org_id=$this->session->org_id;
                  $created_by = $this->session->id;

                      // $emp_id="";
                      // for ($i=0; $i < count($employee); $i++) 
                      // { 
                      //      $emp_id=$emp_id.$employee[$i].",";
                      // }
                      // $employee_id = trim($emp_id, ',');


                      // for ($j=0; $j < count($employee); $j++) 
                      // { 
                             $emp_id=$employee;
                             $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
                             $android_id = $data2->android_id;
                             $name = $data2->name;

                             $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                             $ticket_no = $data3->ticket_no;
                             $customer_id = $data3->customer_id;
                             //======================= inserting notification to table for record ===============

                                      $notification_msg = "Allocated new task and ticket no.is ".$ticket_no;
                                      $date=date("Y-m-d H:i:s");
                                      
                                      $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

                                      $notification_id = $this->db->insert_id($res);
                                   
                             //======================= / inserting notification to table for record ===============

                              //======================= sending notification to employee regarding assign issue ===============
                              $reg_token = $android_id;
                              $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$ticket_no,'query_id'=>$query_id,'notification_id'=>$notification_id);
                                $target = $reg_token; 
                                $url = 'https://fcm.googleapis.com/fcm/send';
                                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                $fields = array();
                                $fields['data'] = $data;
                                   if(is_array($target))
                                {
                                  $fields['registration_ids'] = $target;
                                }
                                else
                                {
                                  $fields['to'] = $target;
                                }
                                $headers = array(
                                  'Content-Type:application/json',
                                  'Authorization:key='.$server_key
                                );

                                 $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                $result = curl_exec($ch);
                                if ($result === FALSE) 
                                {
                                  die('FCM Send Error: ' . curl_error($ch));

                                }
                                else
                                {
                                    //======================= sending notification to customer regarding assign issue ===============

                                     $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                     $android_id = $data3->android_id;
                                     $contact_person_name1 = $data2->contact_person_name1;

                                     // ----------------- Insertinf notification to table ---------------------------

                                     $notification_msg = "Your issue ".$ticket_no." is assign to ".$name;
                                          $date=date("Y-m-d H:i:s");
                                          
                                     $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                                      $notification_id1 = $this->db->insert_id($res1);

                                    // ----------------- Insertinf notification to table ---------------------------

                                    $reg_token = $android_id;
                                    $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
                                      $target = $reg_token; 
                                      $url = 'https://fcm.googleapis.com/fcm/send';
                                      $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                      $fields = array();
                                      $fields['data'] = $data;
                                      if(is_array($target))
                                      {
                                        $fields['registration_ids'] = $target;
                                      }
                                      else
                                      {
                                        $fields['to'] = $target;
                                      }
                                      $headers = array(
                                        'Content-Type:application/json',
                                        'Authorization:key='.$server_key
                                      );

                                       $ch = curl_init();
                                      curl_setopt($ch, CURLOPT_URL, $url);
                                      curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                      curl_setopt($ch, CURLOPT_POST, true);
                                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                      $result = curl_exec($ch);
                                      if ($result === FALSE) 
                                      {
                                          die('FCM Send Error: ' . curl_error($ch));
                                      }
                                      else
                                      {
                                          // $notification_date = date("Y-m-d", strtotime($schedule_date));
                                          $schd_date2 = str_replace(',', ' ', $schedule_date);
                                          $notification_date = date("Y-m-d", strtotime($schd_date2));
                                          $this->db->set('assign_to',$emp_id);
                                          $this->db->set('status','pending');
                                          $this->db->where('query_id',$query_id);
                                          $this->db->update('tbl_user_query');

                                          // $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                                          // $schedule_type_id = $type_res->schedule_type_id;
                                          $schedule_ticketno = 'S_'.$ticket_no;

                                        $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_ticketno','$notification_date','$start_time','$end_time','Case','$date')");
                                          echo 1;
                                      }
                                       curl_close($ch);

                                    //======================= / sending notification to customer regarding assign issue ===============
                                }
                                curl_close($ch);

         }


// ============================================== Reschedule ===================================================
          public function reschedule_assign_to($query_id,$employee,$schedule_date,$start_time,$end_time)
         {

              // $date = date("Y-m-d", strtotime($start_date));
               // $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
               $schd_date2 = str_replace(',', ' ', $schedule_date);
               $schedule_date1 = date("Y-m-d", strtotime($schd_date2));
               $s_time = $start_time;
               $e_time = $end_time;
               $emp_id = $employee;

             $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");

                $available_count = $available->num_rows();
                if ($available_count==0) 
                {

                      $created_by = $this->session->id;

                      // $emp_id="";
                      // for ($i=0; $i < count($employee); $i++) 
                      // { 
                      //      $emp_id=$emp_id.$employee[$i].",";
                      // }
                      // $employee_id = trim($emp_id, ',');


                      // for ($j=0; $j < count($employee); $j++) 
                      // { 
                             $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
                             $android_id = $data2->android_id;
                             $name = $data2->name;

                             $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                             $ticket_no = $data3->ticket_no;
                             $customer_id = $data3->customer_id;

                             //======================= inserting notification to table for record ===============

                                      $notification_msg = "Allocated new task and ticket no.is ".$ticket_no;
                                      $date=date("Y-m-d H:i:s");
                                      
                                      $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

                                      $notification_id = $this->db->insert_id($res);
                                   
                             //======================= / inserting notification to table for record ===============
                              //======================= sending notification to employee regarding assign issue ===============
                              $reg_token = $android_id;
                              $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$ticket_no,'query_id'=>$query_id,'notification_id'=>$notification_id);
                                $target = $reg_token; 
                                $url = 'https://fcm.googleapis.com/fcm/send';
                                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                $fields = array();
                                $fields['data'] = $data;
                                   if(is_array($target))
                                {
                                  $fields['registration_ids'] = $target;
                                }
                                else
                                {
                                  $fields['to'] = $target;
                                }
                                $headers = array(
                                  'Content-Type:application/json',
                                  'Authorization:key='.$server_key
                                );

                                 $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                $result = curl_exec($ch);
                                if ($result === FALSE) 
                                {
                                  die('FCM Send Error: ' . curl_error($ch));

                                }
                                else
                                {
                                    //======================= sending notification to customer regarding assign issue ===============

                                     $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                     $android_id = $data3->android_id;
                                     $contact_person_name1 = $data2->contact_person_name1;

                                     // ----------------- Insertinf notification to table ---------------------------

                                     $notification_msg = "Your issue ".$ticket_no." is assign to ".$name;
                                          $date=date("Y-m-d H:i:s");
                                          
                                     $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                                      $notification_id1 = $this->db->insert_id($res1);

                                    // ----------------- Insertinf notification to table ---------------------------

                                    $reg_token = $android_id;
                                    $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
                                      $target = $reg_token; 
                                      $url = 'https://fcm.googleapis.com/fcm/send';
                                      $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                      $fields = array();
                                      $fields['data'] = $data;
                                      if(is_array($target))
                                      {
                                        $fields['registration_ids'] = $target;
                                      }
                                      else
                                      {
                                        $fields['to'] = $target;
                                      }
                                      $headers = array(
                                        'Content-Type:application/json',
                                        'Authorization:key='.$server_key
                                      );

                                       $ch = curl_init();
                                      curl_setopt($ch, CURLOPT_URL, $url);
                                      curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                      curl_setopt($ch, CURLOPT_POST, true);
                                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                      $result = curl_exec($ch);
                                      if ($result === FALSE) 
                                      {
                                          die('FCM Send Error: ' . curl_error($ch));
                                      }
                                      else
                                      {
                                          $make_reschedule_prev = $this->db->query("SELECT schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                                          $reschedule_schedule_id = $make_reschedule_prev->schedule_id;  

                                          $this->db->set('reschedule',$reschedule);
                                          $this->db->where('schedule_id',$reschedule_schedule_id);
                                          $this->db->update('tbl_schedule');

                                          // $notification_date = date("Y-m-d", strtotime($schedule_date));
                                          $schd_date1 = str_replace(',', ' ', $schedule_date);
                                          $notification_date = date("Y-m-d", strtotime($schd_date1));

                                          $this->db->set('assign_to',$emp_id);
                                          $this->db->set('status','pending');
                                          $this->db->where('query_id',$query_id);
                                          $this->db->update('tbl_user_query');

                                          $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                                          $schedule_type_id = $type_res->schedule_type_id;
                                          $schedule_ticketno = 'S_'.$ticket_no;

                                        $this->db->query("INSERT INTO `tbl_schedule`(`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `reschedule`, `schedule_type`, `created_date`) VALUES ('$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','reschedule','Case','$date')");
                                          echo 1;
                                      }
                                       curl_close($ch);

                                    //======================= / sending notification to customer regarding assign issue ===============
                                }
                                curl_close($ch);

                       //======================= sending notification to employee regarding assign issue ===============
                        // }
                  //print_r($regid);
                }
                else
                {
                    echo "2";
                }
               
         }


         public function reschedule_assign_to_override($query_id,$employee,$schedule_date,$start_time,$end_time)
         {
                  $created_by = $this->session->id;
                   $org_id=$this->session->org_id;

                      // $emp_id="";
                      // for ($i=0; $i < count($employee); $i++) 
                      // { 
                      //      $emp_id=$emp_id.$employee[$i].",";
                      // }
                      // $employee_id = trim($emp_id, ',');


                      // for ($j=0; $j < count($employee); $j++) 
                      // { 
                             $emp_id=$employee;
                             $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
                             $android_id = $data2->android_id;
                             $name = $data2->name;

                             $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                             $ticket_no = $data3->ticket_no;
                             $customer_id = $data3->customer_id;
                             //======================= inserting notification to table for record ===============

                                      $notification_msg = "Allocated new task and ticket no.is ".$ticket_no;
                                      $date=date("Y-m-d H:i:s");
                                      
                                      $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

                                      $notification_id = $this->db->insert_id($res);
                                   
                             //======================= / inserting notification to table for record ===============

                              //======================= sending notification to employee regarding assign issue ===============
                              $reg_token = $android_id;
                              $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$ticket_no,'query_id'=>$query_id,'notification_id'=>$notification_id);
                                $target = $reg_token; 
                                $url = 'https://fcm.googleapis.com/fcm/send';
                                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                $fields = array();
                                $fields['data'] = $data;
                                   if(is_array($target))
                                {
                                  $fields['registration_ids'] = $target;
                                }
                                else
                                {
                                  $fields['to'] = $target;
                                }
                                $headers = array(
                                  'Content-Type:application/json',
                                  'Authorization:key='.$server_key
                                );

                                 $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                $result = curl_exec($ch);
                                if ($result === FALSE) 
                                {
                                  die('FCM Send Error: ' . curl_error($ch));

                                }
                                else
                                {
                                    //======================= sending notification to customer regarding assign issue ===============

                                     $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                     $android_id = $data3->android_id;
                                     $contact_person_name1 = $data2->contact_person_name1;

                                     // ----------------- Insertinf notification to table ---------------------------

                                     $notification_msg = "Your issue ".$ticket_no." is assign to ".$name;
                                          $date=date("Y-m-d H:i:s");
                                          
                                     $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                                      $notification_id1 = $this->db->insert_id($res1);

                                    // ----------------- Insertinf notification to table ---------------------------

                                    $reg_token = $android_id;
                                    $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
                                      $target = $reg_token; 
                                      $url = 'https://fcm.googleapis.com/fcm/send';
                                      $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                      $fields = array();
                                      $fields['data'] = $data;
                                      if(is_array($target))
                                      {
                                        $fields['registration_ids'] = $target;
                                      }
                                      else
                                      {
                                        $fields['to'] = $target;
                                      }
                                      $headers = array(
                                        'Content-Type:application/json',
                                        'Authorization:key='.$server_key
                                      );

                                       $ch = curl_init();
                                      curl_setopt($ch, CURLOPT_URL, $url);
                                      curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                      curl_setopt($ch, CURLOPT_POST, true);
                                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                      $result = curl_exec($ch);
                                      if ($result === FALSE) 
                                      {
                                          die('FCM Send Error: ' . curl_error($ch));
                                      }
                                      else
                                      {
                                          $make_reschedule_prev = $this->db->query("SELECT schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                                          $reschedule_schedule_id = $make_reschedule_prev->schedule_id;  
                                          
                                          $this->db->set('reschedule',$reschedule);
                                          $this->db->where('schedule_id',$reschedule_schedule_id);
                                          $this->db->update('tbl_schedule');

                                          // $notification_date = date("Y-m-d", strtotime($schedule_date));
                                          $schd_date1 = str_replace(',', ' ', $schedule_date);
                                          $notification_date = date("Y-m-d", strtotime($schd_date1));
                                          $this->db->set('assign_to',$emp_id);
                                          $this->db->set('status','pending');
                                          $this->db->where('query_id',$query_id);
                                          $this->db->update('tbl_user_query');


                                          $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                                          $schedule_type_id = $type_res->schedule_type_id;
                                          $schedule_ticketno = 'S_'.$ticket_no;

                                        $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `reschedule`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','reschedule','Case','$date')");

                                          echo 1;
                                      }
                                       curl_close($ch);

                                    //======================= / sending notification to customer regarding assign issue ===============
                                }
                                curl_close($ch);


               
         }


// ========================================== change status from employee side ==========================================
         public function change_status($query_id,$description,$status_update)
         {
            $org_id=$this->session->org_id;
            $employee_id = $this->session->id;
            $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
            $status = $data->status;
            $customer_id = $data->customer_id;
            $product_id = $data->product_id;
            $ticket_no = $data->ticket_no;
                //======================= sending notification to customer regarding assign issue ===============

                          $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                           $android_id = $data3->android_id;


                          $notification_date = date("Y-m-d H:i:s");
                              
                          $notification_msg = "Your issue ".$ticket_no." is ".$status_update;
                          $date=date("Y-m-d H:i:s");
                          
                          $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','$status_update','$date')");

                         $notification_id = $this->db->insert_id($res);

                          $reg_token = $android_id;
                          $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id);
                            $target = $reg_token; 
                            $url = 'https://fcm.googleapis.com/fcm/send';
                            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                            $fields = array();
                            $fields['data'] = $data;
                            if(is_array($target))
                            {
                              $fields['registration_ids'] = $target;
                            }
                            else
                            {
                              $fields['to'] = $target;
                            }
                            $headers = array(
                              'Content-Type:application/json',
                              'Authorization:key='.$server_key
                            );

                             $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                            $result = curl_exec($ch);
                            if ($result === FALSE) 
                            {
                                die('FCM Send Error: ' . curl_error($ch));
                            }
                            else
                            {
                                 $this->db->set('status',$status_update);
                                 $this->db->where('query_id',$query_id);      
                                 $this->db->update('tbl_user_query');

                                 $this->db->query("INSERT INTO `tbl_task_status`(`org_id`,`employee_id`, `customer_id`, `product_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$org_id','$employee_id','$customer_id','$product_id','$ticket_no','$description','$status_update','$date')");
                                // echo 1;
                            }
                             curl_close($ch);

                          //======================= / sending notification to customer regarding assign issue ===============
         }


// ======================== get issue list selected by employee ==================================

         public function getassignedissue($schedule_date,$employee_id)
         {
                    // $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
                    $schd_date1 = str_replace(',', ' ', $schedule_date);
                    $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

                    $data = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

                    $assign_issue_list=array();
                    foreach ($data->result() as $value) 
                    {
                        $issue_id=$value->issue_id;
                        $data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$issue_id'")->row();

                        $customer_id=$data1->customer_id;
                        $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                        $customer_id=$data2->customer_id;
                        $company_name=$data2->company_name;
                        $contact_person_name1=$data2->contact_person_name1;

                        $assign_starttime1 = date("h:i A", strtotime($value->assign_starttime));
                        $assign_endtime1 = date("h:i A", strtotime($value->assign_endtime));


                        $arr = array
                        (
                          'ticket_no'=>$data1->ticket_no,
                          'product_name'=>$data1->product_name,
                          'status'=>$data1->status,
                          'assign_starttime'=>$assign_starttime1,
                          'assign_endtime'=>$assign_endtime1,
                          'schedule_id'=>$value->schedule_id,
                          'schedule_ticket_no'=>$value->ticket_no,


                          'customer_id'=>$customer_id,
                          'company_name'=>$company_name,
                          'contact_person_name1'=>$contact_person_name1

                        );

                        array_push($assign_issue_list, $arr);
                    }
                   return $assign_issue_list;
                   // print_r($assign_issue_list);
         }

// ===================================  Add schedule by Super admin as well as employee =========================
     
        public function add_schedule($formdata)
        {
                $org_id=$this->session->org_id;
                $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
                $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

                $conv_date = date("Ymd", strtotime($schd_date1));

                $s_time = $formdata['schedule_start_time'];
                $e_time = $formdata['schedule_end_time'];
                $emp_id = $formdata['employee_id'];
                $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
                $available_count = $available->num_rows();

                if ($available_count==0) 
                {
                      $created_by = $this->session->id;
                      $date=date("Y-m-d H:i:s");
                      $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                      $max = strlen($string) - 1;
                      $token = '';
                      for ($i = 0; $i < 6; $i++) 
                      {
                        $token .= $string[mt_rand(0, $max)];
                      } 
                      $salt = $token;
                      $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
                      $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

                      $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' ")->row();                      
                      if ($result) 
                      {
                            $result1=$result->ticket_no;
                            $pre_date = explode('-', $result1);
                            $previous_date = $pre_date[1]; // from table last date
                            $ticket_no = $pre_date[2]; // from table last ticket no                        
                            $cur_date=date("Ymd"); // current date

                            if ($previous_date==$conv_date) 
                            {
                              $ticket_no++;
                              $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                              $final_ticket_num = $conv_date.'-'.$ticket_no1;
                              $schedule_ticket_num='S_'.$conv_date.'-'.$ticket_no1;
                            }
                            else
                            {
                              $final_ticket_num=$conv_date.'-'.'001';
                              $schedule_ticket_num='S_'.$conv_date.'-'.'001';
                            }
                      }
                      else
                      {
                        $cur_date=date("Ymd"); // current date
                        $final_ticket_num=$conv_date.'-'.'001';
                        $schedule_ticket_num='S_'.$conv_date.'-'.'001';
                      }
                      
                        // echo $cur_date=date("Ymd");
                          $customer_id = $formdata['customer_id'];
                          $product_id = $formdata['product_id'];

                          $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row(); 
                          $product_name = $pdr_name->prdsrv_name;

                          $query = $formdata['query'];
                          $employee_id = $emp_id;
                          $start_time = $formdata['schedule_start_time'];
                          $end_time = $formdata['schedule_end_time'];
                          $schedule_type_id = $formdata['schedule_type_id'];

                          $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','Normal')"); 
                          $insert_id = $this->db->insert_id();
                          if ($data) 
                          {
                               if($this->session->user_type!='SA') 
                                {
                                  $schedule_type = "Own";
                                }
                                else
                                {
                                  $schedule_type = "Task";
                                }

                                  $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");                         
                                  $schedule_insert_id = $this->db->insert_id();
                                  $TaskArray=array(
                                                     'employee_id'=>$emp_id,
                                                     'org_id'=>$this->session->org_id,
                                                     'customer_id'=>$customer_id,
                                                     'product_id'=>$product_id,
                                                     'query_id'=>$insert_id, 
                                                     'schedule_id'=>$schedule_insert_id,
                                                     'ticket_no'=>$final_ticket_num,
                                                     'remark'=>$query,
                                                     'status'=>'pending',
                                                     'created_date'=>date("Y-m-d H:i:s")
                                                     );
                                     $this->db->Insert("tbl_task_status",$TaskArray); 
                                   //======================= sending notification to employee regarding assign issue ===============

                                                $this->db->select("company_name");
                                                $this->db->where("customer_id",$customer_id);
                                     $CustData = $this->db->get("tbl_customer")->row();
                                                
                                                $this->db->where("query_id",$insert_id);
                                     $ScheduleData = $this->db->get("tbl_user_query")->row();

                                                $this->db->where("schedule_id",$schedule_insert_id);
                                     $QueryData = $this->db->get("tbl_schedule")->row();

                                     $sche_date=date("d M, Y",strtotime($schedule_date1));
                                     $sche_time=date("H:ia",strtotime($start_time)).' TO '.date("H:ia",strtotime($end_time));

                                                $this->db->select("name");
                                                $this->db->where("id",$QueryData->created_by);
                                     $EmpData = $this->db->get("tbl_admin_login")->row();

                                     $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id' ")->row();
                                     $android_id = $data2->android_id;
                                     $name = $data2->name;
                                     // $android_id = $data3->android_id;
                                     $notification_date = date("Y-m-d H:i:s");
                                     $notification_msg = "Allocated new task and ticket no.is ".$final_ticket_num;
                                     $date=date("Y-m-d H:i:s");
                                     $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','pending','$date')");
                                     $notification_id = $this->db->insert_id($res);
                                     $reg_token = $android_id;

                                      $data = array('server_notification'=>"employee_task_allocated",'message'=>' You have been allocated new task for '.$CustData->company_name.' assigned by '.$EmpData->name.' click here for more details','query_id'=>$insert_id,'notification_id'=>$notification_id,'ticket_no'=>$ScheduleData->ticket_no,'company_name'=>$CustData->company_name,'product'=>$ScheduleData->product_name,'assigned_by'=>$EmpData->name,'priority'=>$ScheduleData->priority,'remark'=>$ScheduleData->issue,'date'=>$sche_date,'time'=>$sche_time);
                                      $target = $reg_token; 
                                      $url = 'https://fcm.googleapis.com/fcm/send';
                                      $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                      $fields = array();
                                      $fields['data'] = $data;
                                      if(is_array($target))
                                      {
                                        $fields['registration_ids'] = $target;
                                      }
                                      else
                                      {
                                        $fields['to'] = $target;
                                      }
                                      $headers = array(
                                        'Content-Type:application/json',
                                        'Authorization:key='.$server_key
                                      );

                                      $ch = curl_init();
                                      curl_setopt($ch, CURLOPT_URL, $url);
                                      curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                      curl_setopt($ch, CURLOPT_POST, true);
                                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                      $result = curl_exec($ch);
                                      if ($result === FALSE) 
                                      {
                                          die('FCM Send Error: ' . curl_error($ch));
                                      }
                                      else
                                      {
                                          
                                           $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                           $android_id = $data3->android_id;
                                           $contact_person_name1 = $data2->contact_person_name1;
                                           // ----------------- Insertinf notification to table ---------------------------
                                           $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
                                                $date=date("Y-m-d H:i:s");
                                                
                                           $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                                           $notification_id1 = $this->db->insert_id($res1);
                                          // ----------------- Insertinf notification to table ---------------------------
                                            $reg_token = $android_id;
                                            $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$final_ticket_num.' is assign to '.$name,'query_id'=>$insert_id,'notification_id'=>$notification_id1,'date'=>$sche_date,'time'=>$sche_time);
                                            $target = $reg_token; 
                                            $url = 'https://fcm.googleapis.com/fcm/send';
                                            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                            $fields = array();
                                            $fields['data'] = $data;
                                            if(is_array($target))
                                            {
                                              $fields['registration_ids'] = $target;
                                            }
                                            else
                                            {
                                              $fields['to'] = $target;
                                            }
                                            $headers = array(
                                              'Content-Type:application/json',
                                              'Authorization:key='.$server_key
                                            );

                                            $ch = curl_init();
                                            curl_setopt($ch, CURLOPT_URL, $url);
                                            curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                            curl_setopt($ch, CURLOPT_POST, true);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                            $result = curl_exec($ch);
                                            if ($result === FALSE) 
                                            {
                                                die('FCM Send Error: ' . curl_error($ch));
                                            }
                                            else
                                            {
                                                $notification_date = date("Y-m-d", strtotime($schedule_date));
                                                $this->db->set('assign_to',$employee_id);
                                                $this->db->where('query_id',$insert_id);
                                                $this->db->update('tbl_user_query');
                                                echo 1;
                                            }
                                             curl_close($ch);
                                      }
                                       curl_close($ch);
                          }
                          else
                          {

                          }
                }
                else
                {
                    echo "2";
                }
   
        }


          public function add_schedule_overright($formdata)
          {    
                $org_id=$this->session->org_id;
                $created_by = $this->session->id;
                $date=date("Y-m-d H:i:s");
                $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $max = strlen($string) - 1;
                $token = '';
                for ($i = 0; $i < 6; $i++) 
                {
                  $token .= $string[mt_rand(0, $max)];
                } 
                $salt = $token;
                $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
                $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

                $result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
                if ($result) 
                {
                  $result1=$result->ticket_no;
                  $pre_date = explode('-', $result1);
                  $previous_date = $pre_date[0]; // from table last date
                  $ticket_no = $pre_date[1]; // from table last ticket no
                  $cur_date=date("Ymd"); // current date
                  if ($previous_date==$cur_date) 
                  {
                    $ticket_no++;
                    $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                    $final_ticket_num = $cur_date.'-'.$ticket_no1;
                    $schedule_ticket_num='S_'.$cur_date.'-'.$ticket_no1;
                  }
                  else
                  {
                    $final_ticket_num=$cur_date.'-'.'001';
                    $schedule_ticket_num='S_'.$cur_date.'-'.'001';
                  }
                }
                else
                {
                  $cur_date=date("Ymd"); // current date
                  $final_ticket_num=$cur_date.'-'.'001';
                  $schedule_ticket_num='S_'.$cur_date.'-'.'001';
                }
                
                  // echo $cur_date=date("Ymd");
                    $customer_id = $formdata['customer_id'];
                    $product_id = $formdata['product_id'];
                    $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row(); 
                    $product_name = $pdr_name->prdsrv_name;
                    $query = $formdata['query'];
                    $employee_id = $formdata['employee_id'];
                    $start_time = $formdata['schedule_start_time'];
                    $end_time = $formdata['schedule_end_time'];
                    $schedule_type_id = $formdata['schedule_type_id'];
                    $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','Normal')"); 
                    $insert_id = $this->db->insert_id();
                    if ($data) 
                    {
                         if($this->session->user_type!='SA') 
                          {
                            $schedule_type = "Own";
                          }
                          else
                          {
                            $schedule_type = "Task";
                          }
                         $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
                 
                          $schedule_insert_id = $this->db->insert_id();
                          $TaskArray=array(
                                             'employee_id'=>$employee_id,
                                             'customer_id'=>$customer_id,
                                              'org_id'=>$this->session->org_id,
                                             'product_id'=>$product_id,
                                             'query_id'=>$insert_id, 
                                             'schedule_id'=>$schedule_insert_id,
                                             'ticket_no'=>$final_ticket_num,
                                             'remark'=>$query,
                                             'status'=>'pending',
                                             'created_date'=>date("Y-m-d H:i:s")
                                             );
                          $this->db->Insert("tbl_task_status",$TaskArray);


                          $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                          $android_id = $data2->android_id;
                          $name = $data2->name;

                          $sche_date=date("d M, Y",strtotime($schedule_date1));
                          $sche_time=date("H:ia",strtotime($start_time)).' TO '.date("H:ia",strtotime($end_time));

                          $notification_date = date("Y-m-d H:i:s");
                          $notification_msg = "Allocated new task and ticket no.is ".$final_ticket_num;
                          $date=date("Y-m-d H:i:s");
                          $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','pending','$date')");
                          $notification_id = $this->db->insert_id($res);
                          $reg_token = $android_id;
                          $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$final_ticket_num,'query_id'=>$insert_id,'notification_id'=>$notification_id,'date'=>$sche_date,'time'=>$sche_time);
                          $target = $reg_token; 

                          $url = 'https://fcm.googleapis.com/fcm/send';
                          $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                          $fields = array();
                          $fields['data'] = $data;

                                if(is_array($target))
                        {
                          $fields['registration_ids'] = $target;
                        }
                        else
                        {
                          $fields['to'] = $target;
                        }
                        $headers = array(
                          'Content-Type:application/json',
                          'Authorization:key='.$server_key
                        );

                         $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                        $result = curl_exec($ch);
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        }
                        else
                        {
                             $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                             $android_id = $data3->android_id;
                             $contact_person_name1 = $data2->contact_person_name1;
                             // ----------------- Insertinf notification to table ---------------------------
                             $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
                                  $date=date("Y-m-d H:i:s");
                             $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                             $notification_id1 = $this->db->insert_id($res1);
                            // ----------------- Insertinf notification to table ---------------------------
                              $reg_token = $android_id;
                              $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$final_ticket_num.' is assign to '.$name,'query_id'=>$insert_id,'notification_id'=>$notification_id1,'date'=>$sche_date,'time'=>$sche_time);
                              $target = $reg_token; 
                              $url = 'https://fcm.googleapis.com/fcm/send';
                              $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                              $fields = array();
                              $fields['data'] = $data;
                              if(is_array($target))
                              {
                                $fields['registration_ids'] = $target;
                              }
                              else
                              {
                                $fields['to'] = $target;
                              }
                              $headers = array(
                                'Content-Type:application/json',
                                'Authorization:key='.$server_key
                              );
                              $ch = curl_init();
                              curl_setopt($ch, CURLOPT_URL, $url);
                              curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                              curl_setopt($ch, CURLOPT_POST, true);
                              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                              $result = curl_exec($ch);
                              if ($result === FALSE) 
                              {
                                  die('FCM Send Error: ' . curl_error($ch));
                              }
                              else
                              {
                                  $notification_date = date("Y-m-d", strtotime($schedule_date));
                                  $this->db->set('assign_to',$employee_id);
                                  $this->db->where('query_id',$insert_id);
                                  $this->db->update('tbl_user_query');
                                  echo 1;
                              }
                               curl_close($ch);                                    
                        }
                        curl_close($ch);                              
                        echo "1";
                    }
                    else
                    {

                    }
          }

// ===================================  priority changes =========================

         public function priority_normal($query_id) 
          { 
              $this->db->set('priority','Normal');
              $this->db->where('query_id',$query_id);
             return $this->db->update('tbl_user_query');
          }

           public function priority_low($query_id) 
          { 
              $this->db->set('priority','Low');
              $this->db->where('query_id',$query_id);
             return $this->db->update('tbl_user_query');
          }

           public function priority_high($query_id) 
          { 
              $this->db->set('priority','High');
              $this->db->where('query_id',$query_id);
             return $this->db->update('tbl_user_query');
          }

// ===================================  Remark List =========================
          public function remark_list($ticket_no) 
          { 
              $data2 = $this->db->query("SELECT count(taskstatus_id) as count FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no'")->row();
              $count = $data2->count;
              if ($count>0)
              {
                   $data = $this->db->query("SELECT * FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no'");
                   // echo "1";
                   $remark_array = array();
                    foreach ($data->result() as $value) 
                    {
                        $employee_id = $value->employee_id;
                        $data1 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                        $name = $data1->name;
                        $ticket_no = $value->ticket_no;
                        $remark = $value->remark;
                        $status = $value->status;
                        $created_date = $value->created_date;

                        $arr=array
                        (
                            'employee_name'=>$name,
                            'ticket_no'=>$ticket_no,
                            'remark'=>$remark,
                            'status'=>$status,
                            'created_date'=>$created_date

                        );
                        array_push($remark_array, $arr);
                    }
                    // print_r($remark_array);
                    return $remark_array;
              }
              else
              {
                echo "0";
              }             
          }

          public function doc_list($ticket_no) 
          { 
             $this->db->where('ticket_no',$ticket_no);
             $res=$this->db->get('tbl_user_query')->row();
             $issue_id=$res->query_id;
             $this->db->where('issue_id',$issue_id);
             return $this->db->get('tbl_schedule_document')->result();
          }

// ===================================  Billing List =========================
          public function bill_list($ticket_no) 
          { 
              $data2 = $this->db->query("SELECT count(achieve_id) as count FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no'")->row();
              $count = $data2->count;
              $billing=array();
              if ($count>0)
              {
                         $data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$ticket_no'")->row();

                          $achieve_id = $data1->achieve_id;
                          $billing['billing_remark'] = $data1->billing_remark;
                          $billing['billing_type'] = $data1->billing_type;
                          $billing['price'] = $data1->price;
                          $billing['date_created'] = $data1->date_created;
                          $billing['achieve_id'] = $data1->achieve_id;
                          $billing['adm_approved_price'] = $data1->adm_approved_price;

                          $employee_id = $data1->employee_id;
                          $data4 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                          $billing['employee_name'] = $data4->name;

                          $data2 = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
                          // print_r($data2->result());
                          $achieve_array=array();
                          foreach ($data2->result() as $value) 
                          {
                            $targettype_id = $value->targettype_id;
                            $data3 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
                            $arr = array
                            (
                                
                              'id'=>$value->id,
                              'target_type'=>$data3->target_type,
                              'targettype_id'=>$targettype_id,
                              'targettype_value'=>$value->targettype_value,
                              'adm_approved_price'=>$value->adm_approved_price
                            );
                            array_push($achieve_array, $arr);
                          }
                          array_push($billing, $achieve_array);
                          return $billing;
              }
              else
              {
                // echo "0";
              }             
          }


          public function target_bill_list($ticket_no) 
          { 
              $data2 = $this->db->query("SELECT count(achieve_id) as count FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no'")->row();
              $count = $data2->count;
              $billing=array();
              if ($count>0)
              {
                        $data1= $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$ticket_no' ")->row();

                         return  array
                            (
                              'achieve_id'=>$data1->achieve_id,
                              'billing_amount'=>$data1->billing_amount,
                              'billing_status'=>$data1->billing_status,
                              'billing_app_amount'=>$data1->billing_app_amount
                            );
              }
              else
              {
                // echo "0";
              }             
          }


// ===================================  Reschedule List =========================
          public function reschedule_list($query_id) 
          { 
              $data = $this->db->query("SELECT * FROM tbl_schedule WHERE `issue_id`='$query_id' ");
              $reschedule=array();
              $i=0;
             foreach ($data->result() as $value) 
              {
                  // echo $i;
                  $ticket = $this->db->query("SELECT ticket_no FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                  $ticket_no = $ticket->ticket_no;

                  $schedule_id = $value->schedule_id;
                  
                  $remark = $this->db->query("SELECT * FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no' AND `schedule_id`='$schedule_id' AND status='pending'")->row();
                  $remark_status = $remark->remark;
                  $prev_record = $this->db->query("select * from tbl_schedule where schedule_id = (select max(schedule_id) from tbl_schedule where schedule_id < $schedule_id AND issue_id='$query_id')")->row();
                  $prev_schedule = $prev_record->schedule_assign_to;
                  $data4 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$prev_schedule'")->row();


                  $schedule_assign_to = $value->schedule_assign_to;
                  $data3 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$schedule_assign_to'")->row();

                  if ($i==0)
                  {
                      // echo "if";
                      $name = $data3->name;
                      $reschedule_to='-';

                  }
                  else
                  {
                      // echo "else";
                      $name = $data4->name;
                      $reschedule_to=$data3->name;
                  }

                    $arr = array
                    (
                      'prev_name'=>$name,
                      'name'=>$reschedule_to,
                      'ticket_no'=>$ticket_no,
                      'assign_date'=>$value->assign_date,
                      'assign_starttime'=>$value->assign_starttime,
                      'assign_endtime'=>$value->assign_endtime,
                      'remark_status'=>$remark_status,
                      'issue_raise_date'=>$value->created_date
                    );
                    array_push($reschedule, $arr);
                    // echo "<br>";
                
              $i++; }
              // print_r($reschedule);
              // echo json_encode($reschedule);
              return $reschedule;

          }
// =================================== / Reschedule List =========================

// ===================================  Billing List =========================
          public function update_price($achieve_id,$adm_approved_price,$targettype_id) 
          { 
             $this->db->set('adm_approved_price', $adm_approved_price);
             $where=array('id'=>$achieve_id, 'targettype_id'=>$targettype_id);
             $this->db->where($where);
             $this->db->update('tbl_target_achieve_list');

             $this->db->set('billing_type', 'Billable');
             $where=array('achieve_id'=>$achieve_id);
             $this->db->where($where);
             $this->db->update('tbl_target_achieve');
             // if ($this->db->affected_rows()>0) 
             // {
             $data = $this->db->query("SELECT * FROM tbl_target_achieve_list WHERE `achieve_id`='$achieve_id' AND `targettype_id`='$targettype_id'")->row();
             echo $price = $data->adm_approved_price;
             // } 
          }



          public function update_price2($achieve_id,$billing_app_amount)
          { 
             $this->db->set('billing_status', 'Approved');
             $this->db->set('billing_app_amount', $billing_app_amount);
             $where=array('achieve_id'=>$achieve_id);
             if($billing_app_amount>0)
             {
               $this->db->where($where);
               $this->db->update('tbl_target_achieve');                   
             }       
          }

// =================================== / Billing List =========================




} 
