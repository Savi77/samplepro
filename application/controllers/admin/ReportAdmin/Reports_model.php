

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model 
{

  public function __construct() 
  {
     parent::__construct();
  }

  public function GetSourceArray()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);		
    return $this->db->get('tbl_source')->result();
  }

  public function GetSegmentArray()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);        
    return $this->db->get('tbl_business')->result();
  }

  public function GetEmpArray()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);   
    $this->db->where('user_type','E');      
    return $this->db->get('tbl_admin_login')->result();
  }

  public function GetStageArray()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);        
    return $this->db->get('tbl_stage')->result();
  }


  public function GetProductArray()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);   
    return $this->db->get('tbl_product_service_list')->result();
  }

  public function GetStageArrayUsingIds($StageArray)
  {
    $this->db->where_in('stage_id',$StageArray);
    return $this->db->get('tbl_stage')->result();
  }

    public function LeadOppBySalesPerson()
    {
        $final_array=array();
        $org_id=$this->session->org_id;
        $start_date=date("Y-m-01");
        $end_date=date("Y-m-d");

        $this->db->where("user_status",1);
        $this->db->where("delete_status",0);
        $this->db->where("user_type","E");
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_admin_login")->result(); 

        foreach ($query_res as  $result) 
        {              
            $name=$result->name;
            $assign_to=$result->id;
           
            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();           
            $new_array=array(
                               'emp_name'=>$result->name, 
                               'emp_id'=>$assign_to, 
                               'total'=>count($leads_opportunity_total)
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }

    public function DateRangeLeadOppBySalesPerson($formdata)
    {
        $final_array=array();
        $org_id=$this->session->org_id;
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $EmpArray=$formdata['EmpArray'];
        $customer_type=$formdata['customer_type'];

        $this->db->where("user_status",1);
        $this->db->where("delete_status",0);
        $this->db->where("user_type","E");
        $this->db->where("org_id",$org_id);
        $this->db->where_in("id",$EmpArray);
        $query_res=$this->db->get("tbl_admin_login")->result(); 

        foreach ($query_res as  $result) 
        {              
            $name=$result->name;
            $assign_to=$result->id;
           
            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
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
        return $final_array;
    }

    public function FetchSalesPerson($formdata)
    {
        $this->db->select("name");
        $this->db->where("id",$formdata['emp_id']); 
        return $this->db->get("tbl_admin_login")->row();
    }


    public function ViewSalesPersonDetails($formdata)
    {
        $final_array=array();
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $emp_id=$formdata['emp_id'];

        $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'assign_to' => $emp_id);
        $this->db->where($where_array);      
        $query_res=$this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) 
        {  
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
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 

                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,

                                
                            );
            array_push($final_array,$new_array);                    
        }
        return $final_array;
    }

//-----------------------------------------------------------------------------------------------------------------

    public function LeadOppByStage()
    {
        $final_array=array();
        $org_id=$this->session->org_id;
        $start_date=date("Y-m-01");
        $end_date=date("Y-m-d");

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_stage")->result(); 

        foreach ($query_res as  $result) 
        {                        
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);

            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();           
            $new_array=array(
                               'stage_title'=>$result->stage_title, 
                               'stage_id'=>$result->stage_id, 
                               'total'=>count($leads_opportunity_total)
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }


    public function DateRangeLeadOppByStage($formdata)
    {
        $final_array=array();
        $org_id=$this->session->org_id;
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $StageArray=$formdata['StageArray'];
        $customer_type=$formdata['customer_type'];

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->where_in("stage_id",$StageArray);
        $query_res=$this->db->get("tbl_stage")->result(); 

        foreach ($query_res as  $result) 
        {                        
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);
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
        return $final_array;
    }


    public function FetchStageData($formdata)
    {
        $this->db->select("stage_title");
        $this->db->where("stage_id",$formdata['stage_id']); 
        return $this->db->get("tbl_stage")->row();
    }


    public function Lead_Opportunity_by_Stage_Details($formdata)
    {
        $final_array=array();
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $stage_id=$formdata['stage_id'];

        $where_array3 = array('stage' => $stage_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
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
            } 
            else
            {
                $quotation_amount="NA";
            }  
            $new_array=array(
                                'company'=>$row->company_name, 
                                'contactperson'=>$row->contact_person_name1, 
                                'mobile'=>$row->phone_no, 
                                'email'=>$row->email, 
                                'address'=>$row->address, 
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 
                                'quotation_amount'=>$quotation_amount, 
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }


//----------------------------------------------------------------------------------------------------------------    


    public function Lead_Opportunity_by_Source()
    {
        $final_array=array();
        $org_id=$this->session->org_id;    
        $start_date=date("Y-m-01");
        $end_date=date("Y-m-d");

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_source")->result();
        
        foreach ($query_res as  $result) 
        {              
            $source_id=$result->source_id;
            $where_array3 = array('source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();
            $total_final=count($leads_opportunity_total);
            
           // echo  $ratio=$no_of_close/$total_final*100;
            $new_array=array(
                               'source'=>$result->source_title, 
                               'source_id'=>$result->source_id, 
                               'total'=>$total_final
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }

    public function Daterange_LeadOppBySource($formdata)
    {
        $final_array=array();
        $org_id=$this->session->org_id;    
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $StageArray=$formdata['StageArray'];
        $sourceArray=$formdata['sourceArray'];
        $customer_type=$formdata['customer_type'];

        // print_r($sourceArray);
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->where_in("source_id",$sourceArray);
        $query_res=$this->db->get("tbl_source")->result();    

        foreach ($query_res as  $result) 
        {              
            $source_id=$result->source_id;
            $where_array2 = array('source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array2);
            $leads_res_total=$this->db->get("tbl_leads_opportunity")->result();

            if(count($StageArray)>0)
            {     
                    $countArray=array();
                    $stage_title_array=array();
                    $stage_id_array=array();
                    for($i=0;$i<count($StageArray);$i++)
                    {
                        $stage_id=$StageArray[$i];
                        $this->db->where("stage_id",$stage_id);
                        $stage_res=$this->db->get("tbl_stage")->row();
                        $where_array = array('source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'stage'=>$stage_id);
                        $this->db->where($where_array);

                        if($customer_type!='All')
                        {
                             $this->db->where("customer_type",$customer_type);
                        }

                        $leads_res=$this->db->get("tbl_leads_opportunity")->result();
                        array_push($stage_title_array, $stage_res->stage_title);
                        array_push($countArray, count($leads_res));
                        array_push($stage_id_array, $stage_res->stage_id);
                    }
                    $new_array=array(
                                       'source'=>$result->source_title, 
                                       'total'=>count($leads_res_total), 
                                       'source_id'=>$result->source_id, 
                                       'stage_id_array'=>$stage_id_array, 
                                       'stage_cnt_array'=>$countArray, 
                                       'stage_title_array'=>$stage_title_array, 
                                    );
                    array_push($final_array,$new_array);
            }
            else
            {
                $new_array=array(
                                   'source'=>$result->source_title, 
                                   'source_id'=>$result->source_id, 
                                   'total'=>count($leads_res_total)
                                );
                array_push($final_array,$new_array);
            }                 
        }
        return $final_array;
    }


    public function GetSourceData($formdata)
    {
        $this->db->select("source_title");
        $this->db->where("source_id",$formdata['source_id']); 
        return $this->db->get("tbl_source")->row();
    }

    public function GetSourceStageData($formdata)
    {
        $stage_id=$formdata['stage_id'];
        $explode=explode("|", $stage_id);
        $stage_id=$explode[0]; 
        $source_id=$explode[1];  

        $this->db->select("source_title");
        $this->db->where("source_id",$source_id); 
        $source_data=$this->db->get("tbl_source")->row();

        $this->db->select("stage_title");
        $this->db->where("stage_id",$stage_id); 
        $stage_data=$this->db->get("tbl_stage")->row();

        return array('source_title'=>$source_data->source_title,'stage_title'=>$stage_data->stage_title);

    }

    public function ViewSourceTotalDetails($formdata)
    {
        $final_array=array();  
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $source_id=$formdata['source_id'];

        $where_array = array('source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);  
        $query_res=$this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) 
        {  

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
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 

                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,

                                
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }
   

    public function ViewStageDetails($formdata)
    {
        $final_array=array();  
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $stage_id=$formdata['stage_id'];

        $explode=explode("|", $stage_id);
        $stage=$explode[0]; 
        $source_id=$explode[1];  
         

        $where_array = array('stage' => $stage,'source' => $source_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);  
        $query_res=$this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) 
        {  

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
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 

                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,

                                
                            );
            array_push($final_array,$new_array);                  
        }
        return $final_array;
    }
   
//----------------------------------------------------------------------------------------------------------

 public function Lead_Opportunity_by_Segments()
    {
        $final_array=array();
        $org_id=$this->session->org_id;    
        $start_date=date("Y-m-01");
        $end_date=date("Y-m-d");

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
            $result_count=$this->db->get('tbl_leads_opportunity')->result();
            $new_array=array(
                               'business_name'=>$result->business_name,
                               'business_id'=>$result->business_id, 
                               'total'=>count($result_count),
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
    }


 public function DaterangeLeadOppBySegments($formdata)
  {
        $final_array=array();
        $org_id=$this->session->org_id;    
        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $SegmentArray=$formdata['SegmentArray'];
        $customer_type=$formdata['customer_type'];

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->where_in("business_id",$SegmentArray);
        $query_res=$this->db->get("tbl_business")->result();
        
        foreach ($query_res as  $result) 
        {              
            $business_id=$result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
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
                               'total'=>count($result_count),
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;
  }

public function ViewBusinessDetails($formdata)
{
    $final_array=array();  
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));
    $business_id=$formdata['business_id'];

    $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
    $this->db->where($where_array);
    $this->db->where("find_in_set($business_id, business_id)");     
    $query_res=$this->db->get('tbl_leads_opportunity')->result();
    foreach ($query_res as  $row) 
    {  

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
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 

                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,

                                
                            );
            array_push($final_array,$new_array);               
    }
    return $final_array;
}

public function GetBusinessDetails($formdata)
{
    $this->db->select("business_name");
    $this->db->where("business_id",$formdata['business_id']); 
    return $this->db->get("tbl_business")->row();
}


//----------------------------------------------------------------------------------

public function Lead_Opportunity_by_Product()
{
    $final_array=array();
    $org_id=$this->session->org_id;    
    $start_date=date("Y-m-01");
    $end_date=date("Y-m-d");
    
    $this->db->where("status",1);
    $this->db->where("delete_status",0);
    $this->db->where("org_id",$org_id);
    $query_res=$this->db->get("tbl_product_service_list")->result();

    foreach ($query_res as  $row) 
    {              
        $product_id=$row->prd_srv_id;
        $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'product_id' => $product_id);
        $this->db->where($where_array);         
        $result_count=$this->db->get('tbl_leads_opportunity')->result();
        $new_array=array(
                           'product_name'=>$row->prdsrv_name, 
                           'product_id'=>$product_id,
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}


public function FetchProductData($formdata)
{
    $this->db->select("prdsrv_name");
    $this->db->where("prd_srv_id",$formdata['product_id']); 
    return $this->db->get("tbl_product_service_list")->row();
}


public function ViewProductDetails($formdata)
{
    $final_array=array();
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));
    $product_id=$formdata['product_id'];

    $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'product_id' => $product_id);
    $this->db->where($where_array);     

    // echo " SELECT * FROM `tbl_leads_opportunity` WHERE `product_id`='$product_id' "; 
    $query_res=$this->db->get('tbl_leads_opportunity')->result();
    foreach ($query_res as  $row) 
    {  

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
                                'leadopp_id'=>$row->lead_generate_id, 
                                'lead_id'=>$row->leadopp_id, 

                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)),  
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,

                                
                            );
            array_push($final_array,$new_array);             
    }
    return $final_array;
}

public function Lead_Opportunity_by_Product_graph()
{
    $final_array=array();
    $org_id=$this->session->org_id;    
    $start_date=date("Y-m-01");
    $end_date=date("Y-m-d");

    $this->db->where("status",1);
    $this->db->where("delete_status",0);
    $this->db->where("org_id",$org_id);
    $query_res=$this->db->get("tbl_product_service_list")->result();
    
    foreach ($query_res as  $row) 
    {              
        $product_id=$row->prd_srv_id;
        $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'product_id' => $product_id);
        $this->db->where($where_array);         
        $result_count=$this->db->get('tbl_leads_opportunity')->result();
        $new_array=array(
                           'name'=>$row->prdsrv_name, 
                           'OwnerCount'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}

 public function DaterangeLeadOppByProduct($formdata)
  {
        $final_array=array();
        $org_id=$this->session->org_id;    

        $start_date=date("Y-m-d",strtotime($formdata['start_date']));
        $end_date=date("Y-m-d",strtotime($formdata['end_date']));
        $ProductArray=$formdata['ProductArray'];
         $customer_type=$formdata['customer_type'];

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
         $this->db->where_in("prd_srv_id",$ProductArray);
        $query_res=$this->db->get("tbl_product_service_list")->result();
        
        foreach ($query_res as  $row) 
        {              
            $product_id=$row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,'product_id' => $product_id);
            $this->db->where($where_array);    

            if($customer_type!='All')
            {
                 $this->db->where("customer_type",$customer_type);
            }

            $result_count=$this->db->get('tbl_leads_opportunity')->result();
            $new_array=array(
                               'product_name'=>$row->prdsrv_name, 
                               'product_id'=>$product_id,
                               'total'=>count($result_count),
                            );
            array_push($final_array,$new_array);                   
        }
        return $final_array;

  }
//----------------------------------------------------------------------------------------------------


public function SegmentWiseContact()
{
    $final_array=array();
    $org_id=$this->session->org_id;       
    $this->db->where("status",1);
    $this->db->where("delete_status",0);
    $this->db->where("org_id",$org_id);
    $query_res=$this->db->get("tbl_business")->result();
    
    foreach ($query_res as  $result) 
    {              
        $business_id=$result->business_id; 
        $this->db->where("find_in_set($business_id, business_id)");           
        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'business_name'=>$result->business_name, 
                           'business_id'=>$result->business_id, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}

public function DateRangeSegmentWiseContact($formdata)
{
    $final_array=array();
    $org_id=$this->session->org_id;  
    $SegmentArray=$formdata['SegmentArray'];
    $cust_type=$formdata['cust_type'];
      
    $this->db->where("status",1);
    $this->db->where("delete_status",0);
    $this->db->where("org_id",$org_id);
    $this->db->where_in("business_id",$SegmentArray);
    $query_res=$this->db->get("tbl_business")->result();
    foreach ($query_res as  $result) 
    {              
        $business_id=$result->business_id;
        $this->db->where("find_in_set($business_id, business_id)");   
        if($Criteria!='All')
        {
          $this->db->where("cust_type",$cust_type); 
        }

        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'business_name'=>$result->business_name, 
                           'business_id'=>$result->business_id, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}


public function FetchSegmentWiseContact($formdata)
{
    $this->db->select("business_name");
    $this->db->where("business_id",$formdata['business_id']); 
    return $this->db->get("tbl_business")->row();
}


public function SegmentWiseContactDetails($formdata)
{
    $final_array=array();  
    $business_id=$formdata['business_id'];
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
    return $final_array;
}

//------------------------------------------------------------------------------------

public function AccountOwners()
{
    $final_array=array();
    $org_id=$this->session->org_id;    
    $start_date=date("Y-m-01");
    $end_date=date("Y-m-d");

    $this->db->where('org_id',$org_id);
    $this->db->where('delete_status',0);   
    // $this->db->where('user_type','E');      
    $query_res= $this->db->get('tbl_admin_login')->result();  
    foreach ($query_res as  $result) 
    {              
        $created_by=$result->id;
        $where_array = array('created_by'=>$created_by,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);             
        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'emp_name'=>$result->name, 
                           'emp_id'=>$result->id, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}

public function DateRangeAccountOwners($formdata)
{
    $final_array=array();
    $org_id=$this->session->org_id;  
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));

    $this->db->where('org_id',$org_id);
    $this->db->where('delete_status',0);   
    // $this->db->where('user_type','E');      
    $query_res= $this->db->get('tbl_admin_login')->result();  
    foreach ($query_res as  $result) 
    {              
        $created_by=$result->id;
        $where_array = array('created_by'=>$created_by,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);             
        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'emp_name'=>$result->name, 
                           'emp_id'=>$result->id, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}


public function FetchAccountOwnersData($formdata)
{
    $this->db->select("name");
    $this->db->where("id",$formdata['emp_id']); 
    return $this->db->get("tbl_admin_login")->row();
}

public function AccountOwnersDetails($formdata)
{
    $final_array=array();  
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));
    $created_by=$formdata['emp_id'];

    $where_array = array('created_by'=>$created_by,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
    $this->db->where($where_array);
    
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
    return $final_array;
}

//-------------------------------------------------------------------------------

public function LocationWiseContact()
{
    $final_array=array();
    $org_id=$this->session->org_id;    
    $start_date=date("Y-m-01");
    $end_date=date("Y-m-d");

    $this->db->where('org_id',$org_id);
    $this->db->where('delete_status',0);  
    $this->db->where('status',1);   
    $query_res= $this->db->get('tbl_location')->result();  
    
    foreach ($query_res as  $result) 
    {              
        $location_id=$result->location_id;
        $where_array = array('location_id'=>$location_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);             
        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'location_id'=>$result->location_id, 
                           'location'=>$result->location, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}


public function DateRangeLocationWiseContact($formdata)
{
    $final_array=array();
    $org_id=$this->session->org_id;  
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));


    $this->db->where('org_id',$org_id);
    $this->db->where('delete_status',0);  
    $this->db->where('status',1);   
    $query_res= $this->db->get('tbl_location')->result();  
    
    foreach ($query_res as  $result) 
    {              
        $location_id=$result->location_id;
        $where_array = array('location_id'=>$location_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);             
        $result_count=$this->db->get('tbl_customer')->result();
        $new_array=array(
                           'location_id'=>$result->location_id, 
                           'location'=>$result->location, 
                           'total'=>count($result_count),
                        );
        array_push($final_array,$new_array);                   
    }
    return $final_array;
}

public function LocationWiseContactDetails($formdata)
{
    $final_array=array();  
    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
    $end_date=date("Y-m-d",strtotime($formdata['end_date']));
    $location_id=$formdata['location_id'];

    $where_array = array('location_id'=>$location_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
    $this->db->where($where_array);
    
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
    return $final_array;
}

public function FetchLocationData($formdata)
{
    $this->db->select("location");
    $this->db->where("location_id",$formdata['location_id']); 
    return $this->db->get("tbl_location")->row();
}

//-----------------------------------------------------------------------------------------------------

        


 }