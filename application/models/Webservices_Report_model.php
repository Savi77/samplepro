
<?php 

error_reporting(0);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservices_Report_model extends CI_Model
 {

        function __construct()
         {
            parent::__construct(); 
         }


        public function PermissionArray()
        {
            $this->db->where("component_status",1);
            $query=$this->db->get("tbl_feature_list")->result();
            $data=[];  
            foreach ($query as $row)
            {
                $component_id=$row->component_id;
                $this->db->where("find_in_set($component_id, component_ids)");
                $result = $this->db->get('tbl_modules')->row();

                $data[]=['component_id'=>$row->component_id,'component_title'=>$row->component_title,'Privilegeids'=>$row->Privilegeids,'module_id'=>$result->module_id];  
            }
            echo json_encode($data);
        }


      public function UserPermission()
      {
        $this->db->select("priviledge_id,priviledge_key,status");
        $where_array=array('user_id'=>$_REQUEST['user_id'],'module_id'=>$_REQUEST['module_id'],'feature_id'=>$_REQUEST['feature_id'],);
        $this->db->where($where_array);
        $data =$this->db->get("tbl_module_permission")->result();    
        echo json_encode($data);
      }


        public function GetEmpList()
        {
            $org_id=$_REQUEST['org_id'];
            $this->db->select("id,name");
            $this->db->where("user_status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $this->db->where("user_type",'E');
            $final_array=$this->db->get("tbl_admin_login")->result();
            $PushArray = ['id'=>"default", 'name'=>"Select All"];
            array_unshift($final_array, $PushArray);
            echo json_encode($final_array);

        }

        public function GetTargetType()
        {
            $org_id=$_REQUEST['org_id'];
            $this->db->select("target_type,targettype_id");
            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $this->db->order_by("target_type",'ASC');
            $final_array=$this->db->get("tbl_target_type")->result();
            // $PushArray = ['id'=>"default", 'name'=>"Select All"];
            // array_unshift($final_array, $PushArray);
            echo json_encode($final_array);

        }

        public function Lead_Opportunity_by_Source()
        {
             $final_array=array();
             $org_id=$_REQUEST['org_id'];
             $emp_id=$_REQUEST['emp_id'];
             $source=$_REQUEST['source'];
             $customer_type=$_REQUEST['customer_type'];

             $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
             $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            if($source!='default')
             {
                $this->db->where("source_id",$source);
             }
            $query_res=$this->db->get("tbl_source")->result();
            foreach ($query_res as  $result) 
            {         
                $source_id=$result->source_id;
                //--------------------------------------------------------------------------------------------------------------
                $where_total = array('source' => $source_id, 'assign_to' => $emp_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_total);

                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }                
                $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();
                $total_final=count($leads_opportunity_total);

                //--------------------------------------------------------------------------------------------------------------
               
                $where_array2 = array('source' => $source_id, 'assign_to' => $emp_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array2);
                if($stage!='default')
                 {
                    $this->db->where("stage",$stage);
                 }
                $leads_opportunity_close=$this->db->get("tbl_leads_opportunity")->result();
                $no_of_close=count($leads_opportunity_close);

                //---------------------------------------------------------------------------------------------------------------
               
                if($no_of_close==0)
                {
                    $ratio=0;
                }
                else
                {
                    $ratio=$no_of_close*100/$total_final;
                }

                $ratio=$no_of_close*100/$total_final;
                $TotalRevenue=0;
                foreach ($leads_opportunity_total as $row) 
                {
                   $TotalRevenue=$TotalRevenue+$row->project_business_value;
                }
                
                if($total_final==0)
                {
                    $avg_revenue=0;
                }
                else
                 {
                   $avg_revenue=$TotalRevenue/$total_final;
                   $avg_revenue=number_format((float)$avg_revenue, 2, '.', ''); 
                 }   

                 if(is_nan($ratio))
                 {
                    $ratio=0;
                 }
                
                $new_array=array(
                                   'source'=>$result->source_title, 
                                   'source_id'=>$result->source_id, 
                                   'total'=>$total_final, 
                                   'no_of_close'=>$no_of_close, 
                                   'ratio'=>$ratio, 
                                   'total_revenue'=>$TotalRevenue, 
                                   'avg_revenue'=>$avg_revenue,
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);

            // print_r($final_array);
        }



        public function Lead_Opportunity_by_Source_Details()
        {
            $final_array=array();
            $source_id=$_REQUEST['source_id'];
            $assign_to=$_REQUEST['emp_id'];
            $customer_type=$_REQUEST['customer_type'];

            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));

            $where_array3 = array('assign_to' => $assign_to,'source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3); 
            if($customer_type!='All')
             {
                $this->db->where("customer_type",$customer_type);
             }  
            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();

                 $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,  

                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,

                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_Segment()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];
            $business_id=$_REQUEST['business_id'];

            if($business_id!='default')
            {
               $this->db->where("business_id",$business_id);
            }
            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_business")->result();

            foreach ($query_res as  $result) 
            {              
                $business_id=$result->business_id;  
                $where_array = array('assign_to' => $emp_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array); 
                $this->db->where("find_in_set($business_id, business_id)");     
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }                   
                $result_count=$this->db->get('tbl_leads_opportunity')->result();
                $new_array=array(
                                   'business_name'=>$result->business_name, 
                                   'business_id'=>$result->business_id,
                                   'count'=>count($result_count)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

        public function Lead_Opportunity_by_Segments_Details()
        {
            $final_array=array();
            $business_id=$_REQUEST['business_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];

            $where_array3 = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);  
            $this->db->where("find_in_set($business_id, business_id)"); 

            if($customer_type!='All')
             {
                $this->db->where("customer_type",$customer_type);
             }  
             
            if($emp_id!='default')
             {
                $this->db->where("assign_to",$emp_id);
             }                  
            $query_res=$this->db->get('tbl_leads_opportunity')->result();

            foreach ($query_res as  $row) 
            { 
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();
                $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,  
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,

                                );
                array_push($final_array,$new_array);            
            }
            echo json_encode($final_array);
        }
        

      public function Lead_Opportunity_by_Product()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];
            $product_id=$_REQUEST['product_id'];

            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);

            if($product_id!='default')
            {
               $this->db->where("prd_srv_id",$product_id);
            }
            $query_res=$this->db->get("tbl_product_service_list")->result();
            foreach ($query_res as  $row) 
            {              
                $product_id=$row->prd_srv_id;
                $where_array = array('assign_to' => $emp_id,'product_id' => $product_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array);         
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }                    
                $result_count=$this->db->get('tbl_leads_opportunity')->result();
                $new_array=array(
                                   'product_name'=>$row->prdsrv_name, 
                                   'product_id'=>$product_id,
                                   'count'=>count($result_count),
                                );
                array_push($final_array,$new_array);                   
            }
             echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_Product_Details()
        {
            $final_array=array();
            $product_id=$_REQUEST['product_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];

            $where_array3 = array('product_id' => $product_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);  

            if($customer_type!='All')
             {
                $this->db->where("customer_type",$customer_type);
             }     
            if($emp_id!='default')
             {
                $this->db->where("assign_to",$emp_id);
             }  

            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();

                 $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,

                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,

                                );
                array_push($final_array,$new_array);                     
            }
            echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_SalesPerson()
        {
             $final_array=array();
             $org_id=$_REQUEST['org_id'];
             $emp_id=$_REQUEST['emp_id'];
             $stage=$_REQUEST['stage'];
             $customer_type=$_REQUEST['customer_type'];

             $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
             $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));

            $this->db->where("user_status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);

            if($emp_id!='default')
             {
                $this->db->where("id",$emp_id);
             }
            $query_res=$this->db->get("tbl_admin_login")->result();
            
            foreach ($query_res as  $result) 
            {              
                $name=$result->name;
                $assign_to=$result->id;
               
                $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                if($stage!='default')
                 {
                    $this->db->where("stage",$stage);
                 }
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 } 
                $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();
                $new_array=array(
                                   'emp_name'=>$result->name, 
                                   'emp_id'=>$assign_to, 
                                   'total'=>count($leads_opportunity_total)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_Sales_Details()
        {
            $final_array=array();
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
             $customer_type=$_REQUEST['customer_type'];

            $where_array3 = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);  

            if($emp_id!='default')
            {
                $this->db->where('assign_to',$emp_id);   
            }
            if($customer_type!='All')
             {
                $this->db->where("customer_type",$customer_type);
             } 
            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();



                 $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,

                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_Stage()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $stage=$_REQUEST['stage'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];

            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            if($stage!='default')
             {
                $this->db->where("stage_id",$stage);
             }
            $query_res=$this->db->get("tbl_stage")->result();

            foreach ($query_res as  $result) 
            {                          
                $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array3);

                if($emp_id!='default')
                 {
                    $this->db->where("assign_to",$emp_id);
                 }
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }                 
                $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();               
                $new_array=array(
                                   'stage_title'=>$result->stage_title, 
                                   'stage_id'=>$result->stage_id, 
                                   'total'=>count($leads_opportunity_total)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }


        public function Lead_Opportunity_by_Stage_Details()
        {
            $final_array=array();
            $emp_id=$_REQUEST['emp_id'];
            $stage_id=$_REQUEST['stage_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            

            if($emp_id!='default')
            {
                $this->db->where('assign_to',$emp_id);   
            }
            $where_array3 = array('stage' => $stage_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);       

            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("quotation_id");      
                $this->db->where("leadopp_id",$row->leadopp_id); 
                $this->db->order_by("quotation_id","DESC");           
                $quotation=$this->db->get('tbl_lead_quotation')->row(); 

                if(!empty($quotation->quotation_id))
                {
                    $quotation_id=$quotation->quotation_id;
                    $quotation_res=$this->db->query("  SELECT sum(`total`) as amount FROM `tbl_quotation_details` WHERE `quotation_id`='$quotation_id'  ")->row();                      
                    $quotation_amount=$quotation_res->amount;

                    if(empty($quotation_amount))
                    {
                        $quotation_amount="NA";
                    }
                } 
                else
                {
                    $quotation_amount="NA";
                }  

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();


                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                 $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'quotation_amount'=>$quotation_amount, 
                                     'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,
                                );
                array_push($final_array,$new_array); 
            }
            echo json_encode($final_array);
        }


        public function LocationWiseContacts()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $location_id=$_REQUEST['location_id'];
            $customer_type=$_REQUEST['customer_type'];

            if($location_id!='default')
            {
                $this->db->where('location_id',$location_id);   
            }

            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_location")->result();

            foreach ($query_res as  $result) 
            {                          
                $where_array3 = array('location_id' => $result->location_id);
                $this->db->where($where_array3);
               
                if($customer_type!='total')
                {
                    $this->db->where('cust_type',$customer_type);   
                }

                $cust_query=$this->db->get("tbl_customer")->result();               
                $new_array=array(
                                   'location'=>$result->location, 
                                   'location_id'=>$result->location_id, 
                                   'total'=>count($cust_query)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

        public function LocationWiseContactsDetails()
        {
            $final_array=array();  
            $location_id=$_REQUEST['location_id'];
             $customer_type=$_REQUEST['customer_type'];
            $where_array = array('location_id'=>$location_id);
            $this->db->where($where_array);  
            if($customer_type!='total')
            {
                $this->db->where('cust_type',$customer_type);   
            }
             
            $query_res=$this->db->get('tbl_customer')->result();

            foreach ($query_res as  $row) 
            {  
                 $new_array=array(
                                    'company_name'=>$row->company_name, 
                                    'address'=>$row->address, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'contact_person_name1'=>$row->contact_person_name1, 
                                    'city'=>$row->city, 
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

//---------------------------------------------------------------

        public function SegmentWiseContacts()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            // $customer_type=$_REQUEST['customer_type'];
            $business_id=$_REQUEST['business_id'];
            if($business_id!='default')
            {  
                $this->db->where("find_in_set($business_id, business_id)");
            }

            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_business")->result();

            foreach ($query_res as  $result) 
            {                          
                $business_id=$result->business_id;
                $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array);  
                $this->db->where("find_in_set($business_id, business_id)"); 
                $cust_query=$this->db->get("tbl_customer")->result();               
                $new_array=array(
                                'business_name'=>$result->business_name, 
                                'business_id'=>$result->business_id, 
                                'total'=>count($cust_query)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }


        public function SegmentWiseContactsDetails()
        {
            $final_array=array();  
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $business_id=$_REQUEST['business_id'];

            $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array);    
            $this->db->where("find_in_set($business_id, business_id)"); 
            $query_res=$this->db->get('tbl_customer')->result();
            foreach ($query_res as  $row) 
            {  
                 $new_array=array(
                                    'company_name'=>$row->company_name, 
                                    'address'=>$row->address, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'contact_person_name1'=>$row->contact_person_name1, 
                                    'city'=>$row->city, 
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

//------------------------------------------------------------------------

        public function TypeWiseContacts()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            // $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            // $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $type_id=$_REQUEST['type_id'];
            $customer_type=$_REQUEST['customer_type'];
            if($type_id!='default')
            {
               $this->db->where("type_id",$type_id);
            }
            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_type")->result();
            foreach ($query_res as  $result) 
            {                          
                $type_id=$result->type_id;
                if($customer_type!='total')
                {
                   $this->db->where("cust_type",$customer_type);
                }
                $where_array = array('type_id'=>$type_id);
                $this->db->where($where_array);   
                $cust_query=$this->db->get("tbl_customer")->result();               
                $new_array=array(
                                'title'=>$result->title, 
                                'type_id'=>$result->type_id, 
                                'total'=>count($cust_query)
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

        public function TypeWiseContactsDetails()
        {
            $final_array=array();  
            // $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            // $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $type_id=$_REQUEST['type_id'];
            $org_id=$_REQUEST['org_id'];
            $customer_type=$_REQUEST['customer_type'];
            $where_array = array('type_id'=>$type_id,'org_id'=>$org_id);
            $this->db->where($where_array);    

            if($customer_type!='total')
            {
               $this->db->where("cust_type",$customer_type);
            }
            $query_res=$this->db->get('tbl_customer')->result();
            foreach ($query_res as  $row) 
            {  
                 $new_array=array(
                                    'company_name'=>$row->company_name, 
                                    'address'=>$row->address, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'contact_person_name1'=>$row->contact_person_name1, 
                                    'city'=>$row->city, 
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }

        //----------------------------------------------------------------------

        public function EmployeeAvailableTimeSlots()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            // $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $start_time=date("H:i:s",strtotime($_REQUEST['start_time']));
            $end_time=date("H:i:s",strtotime($_REQUEST['end_time']));
            $emp_id=$_REQUEST['emp_id'];

            if($emp_id!='default')
            {
               $explode=explode(",", $emp_id); 
               $this->db->where_in("id",$explode);
            }

            $this->db->select("id,name,email,mobile_no");
            $this->db->where("user_status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $this->db->where("user_type",'E');
            $query_res=$this->db->get("tbl_admin_login")->result();

            foreach ($query_res as  $result) 
            {                          
                $schedule_assign_to=$result->id;
                $where_array = array('schedule_assign_to'=>$schedule_assign_to,'assign_date' => $start_date,'assign_starttime>=' => $start_time,'assign_endtime<=' => $end_time);
                $this->db->where($where_array);   
                $schedule_query=$this->db->get("tbl_schedule")->result();

                if(count($schedule_query)<=0)
                {
                    $new_array=array(
                                        'name'=>$result->name, 
                                        'emp_id'=>$result->id, 
                                        'email'=>$result->email, 
                                        'mobile_no'=>$result->mobile_no, 
                                    );
                    array_push($final_array,$new_array); 
                }                  
            }
            echo json_encode($final_array);
        }

   //-----------------------------------------------------------------------------------

    public function EmployeeTargetListold()
    {
        $finalArray=array();
        $org_id=$_REQUEST['org_id'];
        $emp_id = $_REQUEST['emp_id'];
        $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
        $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
        $target_type = $_REQUEST['target_type'];  

        if($target_type!='default')
        {
           $this->db->where("targettype_id",$target_type);
        }
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->order_by("target_type",'ASC');
        $Target=$this->db->get("tbl_target_type")->result();

           foreach ($Target as  $res) 
           {  
                $targettype_id=$res->targettype_id;

                if($emp_id!='default')
                {
                   $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and DATE(date_created)>='$start_date' and   DATE(date_created)<='$end_date' and employee_id IN($emp_id) ")->result();
                }
                else
                {
                   $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and DATE(date_created)>='$start_date' and   DATE(date_created)<='$end_date' ")->result();  
                }

                if(count($TargetValue)>0)
                {
                     $Totalvalue=0;           
                     foreach ($TargetValue as  $val) 
                     {
                        $Totalvalue=$Totalvalue+$val->target_value;
                     }

                    if($emp_id!='default')
                    {
                       $AchieveValue=$this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and   employee_id IN($emp_id)  ")->result();
                    }
                    else
                   {
                      $AchieveValue=$this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id'  ")->result();
                   }


                    if(count($AchieveValue)>0)
                     {
                         $TotalAchieveValue=0;           
                         foreach ($AchieveValue as  $achieve) 
                         {
                            $TotalAchieveValue=$TotalAchieveValue+$achieve->targettype_value;
                         }        
                         $Balance=$Totalvalue-$TotalAchieveValue;

                         $this->db->select("name");
                         $this->db->where("id",$TargetValue[0]->employee_id);
                         $EmpDetails=$this->db->get("tbl_admin_login")->row();

                         $NewArray=array(
                                           'TargetName'=>$res->target_type,
                                           'targettype_id'=>$res->targettype_id,
                                           'TargetAmount'=>$Totalvalue,
                                           'target_period'=>$TargetValue[0]->target_period,
                                           'TargetAchieved'=>$TotalAchieveValue,
                                           'TargetBalance'=>$Balance,
                                           'TargetDAR'=>0,
                                           'emp_name'=>$EmpDetails->name,                                       
                                           'TargetSdate'=>$start_date,
                                           'TargetEdate'=>$end_date,
                                        );
                         array_push($finalArray, $NewArray);                        
                     }
                 }
            }
           echo json_encode($finalArray);
    }



    public function EmployeeTargetList()
    {
        $finalArray=array();
        $org_id=$_REQUEST['org_id'];
        $emp_id = $_REQUEST['emp_id'];
        $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
        $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
        $target_type = $_REQUEST['target_type'];  

        if($target_type!='default')
        {
           $this->db->where("targettype_id",$target_type);
        }
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->order_by("target_type",'ASC');
        $Target=$this->db->get("tbl_target_type")->result();

           foreach ($Target as  $res) 
           {  
                $targettype_id=$res->targettype_id;

                if($emp_id!='default')
                {
                    // $emp_id=substr($emp_id, 0,-1);

                    $emp_id1=substr($emp_id,0,-1);

                   $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and start_date>='$start_date' and   start_date<='$end_date' and employee_id  IN($emp_id1)  ")->result();
                }
                else
                {
                   $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and   start_date<='$end_date'  ")->result();  
                }

                if(count($TargetValue)>0)
                {

                     $Totalvalue=0;           
                     foreach ($TargetValue as  $val) 
                     {
                        $employee_id=$val->employee_id;
                        $Totalvalue=$Totalvalue+$val->target_value;
                        $tr_auto_id=$val->tr_auto_id;

                        $AchieveValue=$this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and   employee_id='$employee_id' and tr_auto_id='$tr_auto_id'  ")->result();

                        // echo count($AchieveValue);

                          if(count($AchieveValue)>0)
                             {

                                 $TotalAchieveValue=0;           
                                 foreach ($AchieveValue as  $achieve) 
                                 {
                                    $TotalAchieveValue=$TotalAchieveValue+$achieve->targettype_value;
                                 }        
                                 $Balance=$Totalvalue-$TotalAchieveValue;

                                 $this->db->select("name");
                                 $this->db->where("id",$employee_id);
                                 $EmpDetails=$this->db->get("tbl_admin_login")->row();

                                 $NewArray=array(
                                                   'TargetName'=>$res->target_type,
                                                   'employee_id'=>$employee_id,
                                                   'targettype_id'=>$res->targettype_id,
                                                   'TargetAmount'=>$Totalvalue,
                                                   'target_period'=>$val->target_period,
                                                   'TargetAchieved'=>$TotalAchieveValue,
                                                   'TargetBalance'=>$Balance,
                                                   'TargetDAR'=>0,
                                                   'emp_name'=>$EmpDetails->name,                                       
                                                   'TargetSdate'=>$start_date,
                                                   'TargetEdate'=>$end_date,
                                                );
                                 array_push($finalArray, $NewArray);

                             }
                     }
                 }
            }
           echo json_encode($finalArray);
    }

    //---------------------------------------------------------------

        public function LeadOppMonthlyCount()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $emp_id=$_REQUEST['emp_id'];
            $type=$_REQUEST['type'];

            if($emp_id!='default')
            {
               $this->db->where("assign_to",$emp_id);
            }

            if($type=='default')
            {
               $type_array=array('Lead','Opportunity');
            }
            else
            {
                $type_array=array($type);
            } 
       
            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) 
            {
                $month=$dt->format("m");
                $year=$dt->format("Y");

                for($a=0;$a<count($type_array);$a++)
                {
                    $customer_type=$type_array[$a];
                    $where_array3 = array('org_id' => $org_id,'customer_type' => $customer_type,'MONTH(created_date)' => $month,'YEAR(created_date)' => $year);                
                    $this->db->where($where_array3);       
                    $query_res=$this->db->get('tbl_leads_opportunity')->result();

                    $pass_date=$year.'-'.$month.'-01';
                    $month_name=date("F",strtotime($pass_date));
                    $new_array=array(
                                       'customer_type'=>$customer_type, 
                                       'month'=>$month, 
                                       'month_name'=>$month_name,
                                       'year'=>$year, 
                                       'pass_date'=>$year.'-'.$month.'-01', 
                                       'total'=>count($query_res),
                                    );

                    if(!empty($new_array))
                    {
                        array_push($final_array,$new_array);
                    }  
                }
            }  

            echo json_encode($final_array);
        }


        public function LeadOppMonthlyCountDetails()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $pass_date=$_REQUEST['pass_date'];
            $emp_id=$_REQUEST['emp_id'];
            $customer_type=$_REQUEST['type'];

            $month=date("m",strtotime($pass_date));
            $year=date("Y",strtotime($pass_date));

            $where_array3 = array('org_id' => $org_id,'MONTH(created_date)' => $month,'YEAR(created_date)' => $year);
            $this->db->where($where_array3);  
            
            if($emp_id!='default')
            {
               $this->db->where("assign_to",$emp_id);
            }

            if($customer_type!='default')
            {
               $this->db->where("customer_type",$customer_type);
            }


            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();

                $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'quotation_amount'=>$quotation_amount, 
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,
                                );
                array_push($final_array,$new_array);                      
            }
            echo json_encode($final_array);
        }

       //----------------------------------------------------------------

        public function ContactSummary()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $cust_type=$_REQUEST['cust_type'];

            if($cust_type=='total')
            { 
               $type_array=array('total','primary','secondary');
            }
            else
            {
                $type_array=array($cust_type);
            }

            for($a=0;$a<count($type_array);$a++)
            {
                $type2=$type_array[$a];
                $where_array = array('org_id'=>$org_id);

                if($type2!='total')
                {
                   $this->db->where("cust_type",$type2);
                }

                $this->db->where($where_array);   
                $cust_query=$this->db->get("tbl_customer")->result();
                $new_array=array(
                                   'cust_type'=>$type2, 
                                   'count'=>count($cust_query)
                                );

                array_push($final_array, $new_array);
            }
            echo json_encode($final_array);
        }

        public function ContactSummaryDetails()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $cust_type=$_REQUEST['cust_type'];

            $where_array = array('org_id'=>$org_id);
            $this->db->where($where_array);   

            if($cust_type!='total')
            {
               $this->db->where("cust_type",$cust_type);
            }
            $query_res=$this->db->get('tbl_customer')->result();
            foreach ($query_res as  $row) 
            {  
                 $new_array=array(
                                    'company_name'=>$row->company_name, 
                                    'address'=>$row->address, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'contact_person_name1'=>$row->contact_person_name1, 
                                    'city'=>$row->city, 
                                );
                array_push($final_array,$new_array);                   
            }
            echo json_encode($final_array);
        }
       //----------------------------------------------------------------


        public function ContactFilter()
        {
            $final_array=array();
            $array = array("All Contact"=>"total", "Primary Contact"=>"primary", "Secondary Contact"=>"secondary");
            foreach($array as $x => $x_value)
             {
                $new_array=array(
                                   'name'=>$x, 
                                   'value'=>$x_value
                                );

                array_push($final_array, $new_array);

              }
            echo json_encode($final_array);
        }

        //---------------------------------------------------------

    
      public function LeadOppSalesPersonProductwise()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $emp_id=$_REQUEST['emp_id'];
            $product_id1=$_REQUEST['product_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
             $customer_type=$_REQUEST['customer_type'];

            if($product_id1!='default')
            {
               $this->db->where('prd_srv_id',$product_id1);   
            }

            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_product_service_list")->result();
            
            foreach ($query_res as  $row) 
            {              
                $product_id=$row->prd_srv_id;
                $where_array = array('product_id' => $product_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array);   

                if($emp_id!='default')
                {
                    $this->db->where('assign_to',$emp_id);   
                }
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 } 
                $result_count=$this->db->get('tbl_leads_opportunity')->result();
                $new_array=array(
                                   'product_name'=>$row->prdsrv_name, 
                                   'product_id'=>$product_id,
                                   'count'=>count($result_count),
                                );
                array_push($final_array,$new_array);                   
            }
             echo json_encode($final_array);
        }

        public function LeadOppSalesPersonProductwiseDetails()
        {
            $final_array=array();
            $product_id=$_REQUEST['product_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];

            $where_array3 = array('product_id' => $product_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);  

            if($emp_id!='default')
            {
                $this->db->where('assign_to',$emp_id);   
            }
            if($customer_type!='All')
             {
                $this->db->where("customer_type",$customer_type);
             } 
            $query_res=$this->db->get('tbl_leads_opportunity')->result();

            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();

                $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,                                     
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'quotation_amount'=>$quotation_amount, 
                                    'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,
                                );
                array_push($final_array,$new_array);   
                  
            }
            echo json_encode($final_array);
        }

      //------------------------------------------------------------
  
      public function LeadOppSalesPersonSegment()
        {
            $final_array=array();
            $org_id=$_REQUEST['org_id'];
            $emp_id=$_REQUEST['emp_id'];
            $business_id=$_REQUEST['business_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));   
            $customer_type=$_REQUEST['customer_type'];

            
            if($business_id!='default')
            {
                $this->db->where("find_in_set($business_id, business_id)");
            }
            $this->db->where("status",1);
            $this->db->where("delete_status",0);
            $this->db->where("org_id",$org_id);
            $query_res=$this->db->get("tbl_business")->result();
            
            foreach ($query_res as  $row) 
            {              
                $business_id=$row->business_id;
                $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
                $this->db->where($where_array);   
                $this->db->where("find_in_set($business_id, business_id)"); 

                if($emp_id!='default')
                {
                  $this->db->where('assign_to',$emp_id);   
                }

                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }   

                $result_count=$this->db->get('tbl_leads_opportunity')->result();
                $new_array=array(
                                'business_name'=>$row->business_name, 
                                'business_id'=>$row->business_id, 
                                'total'=>count($result_count)
                                );
                array_push($final_array,$new_array);                 
            }
             echo json_encode($final_array);
        }

        public function LeadOppSalesPersonSegmentDetails()
        {
            $final_array=array();
            $business_id=$_REQUEST['business_id'];
            $emp_id=$_REQUEST['emp_id'];
            $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
            $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
            $customer_type=$_REQUEST['customer_type'];

            $this->db->where("find_in_set($business_id, business_id)"); 
            $where_array3 = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);  

            if($emp_id!='default')
            {
                $this->db->where('assign_to',$emp_id);   
            }
                if($customer_type!='All')
                 {
                    $this->db->where("customer_type",$customer_type);
                 }  
            $query_res=$this->db->get('tbl_leads_opportunity')->result();
            foreach ($query_res as  $row) 
            {  
                $this->db->select("name");
                $this->db->where("id",$row->assign_to); 
                $admin_data=$this->db->get("tbl_admin_login")->row();

                $this->db->select("prdsrv_name");
                $this->db->where("prd_srv_id",$row->product_id); 
                $product_data=$this->db->get("tbl_product_service_list")->row();

                $this->db->select("stage_title");
                $this->db->where("stage_id",$row->stage); 
                $stage_data=$this->db->get("tbl_stage")->row();

                $this->db->select("source_title");
                $this->db->where("source_id",$row->source); 
                $source_data=$this->db->get("tbl_source")->row();
                 $new_array=array(
                                    'company'=>$row->company_name, 
                                    'contactperson'=>$row->contact_person_name1, 
                                    'mobile'=>$row->phone_no, 
                                    'email'=>$row->email, 
                                    'address'=>$row->address, 
                                    'leadopp_id'=>$row->leadopp_id, 
                                    'lead_generate_id'=>$row->lead_generate_id,  
                                    'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                    'project_business_value'=>$row->project_business_value,
                                    'assign_to'=>$admin_data->name, 
                                    'prdsrv_name'=>$product_data->prdsrv_name,
                                    'quotation_amount'=>$quotation_amount, 
                                     'stage'=>$stage_data->stage_title,
                                    'source'=>$source_data->source_title,
                                );
                array_push($final_array,$new_array);                
            }
            echo json_encode($final_array);
        }

        //------------------------------------------------------------


  }  