<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Leads_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $employee_id = $this->input->post('employee_id');
        $org_id = $this->input->post('org_id');

		$this->db->from('tbl_leads_opportunity');
		$this->db->where("assign_to", $employee_id);
		$this->db->where("org_id", $org_id);
		$this->db->order_by("leadopp_id", "DESC");
		$data = $this->db->get();
		$final_array = array();
       
		foreach ($data->result() as $value) 
        {
            
			$employee_id = $value->created_by;
			$this->db->select('id, name');
			$this->db->where('id', $employee_id);
			$emp_data = $this->db->get('tbl_admin_login')->row();
            
            if(!empty($emp_data))
            {
                $emp_name = $emp_data->name;
            }
            else
            {
                $emp_name = '';
            }
			

			$business_id = $value->business_id;
            
    
            if(!empty($business_id))
            {
                $string = rtrim($business_id,',');
                $businessname="";
                $business=$this->db->query(" SELECT `business_name` FROM `tbl_business` WHERE `business_id` IN($string) ")->result();   
                foreach ($business as  $bres)
                {
                    $businessname=$businessname.' , '.$bres->business_name;
                    
                }
                $businessname=substr($businessname,3);
            }
            else
            {
                $businessname="";
            } 

            // if($business_id == 0)
            // {
            //     $businessname = '';
            // }
            // else
            // {
            //     $this->db->select('business_id, business_name');
            //     $this->db->where('business_id', $business_id);
            //     $business_data = $this->db->get('tbl_business')->row();
            //     $businessname = $business_data->business_name;
            // }
			
			$group_id = $value->group_id;
            if($group_id == 0)
            {
                $group_name = '';
            }
            else
            {
                $this->db->select('group_id, group_name');
                $this->db->where('group_id', $group_id);
                $group_data = $this->db->get('tbl_group')->row();
                $group_name = $group_data->group_name;
            }
			
			$source = $value->source;
            if($source == 0)
            {
                $source_title = '';
            }
            else
            {
                $this->db->select('source_id, source_title');
                $this->db->where('source_id', $source);
                $source_data = $this->db->get('tbl_source')->row();
                $source_title = $source_data->source_title;
            }

			$stage = $value->stage;
            if($stage == 0)
            {
                $stage_title = '';
            }
            else
            {
                $this->db->select('stage_id, stage_title');
                $this->db->where('stage_id', $stage);
                $stage_data = $this->db->get('tbl_stage')->row();
                $stage_title = $stage_data->stage_title;
            }
			

			$this->db->where('prd_srv_id', $value->product_id);
			$product = $this->db->get('tbl_product_service_list')->row();
            if(!empty($product))
            {
                $prdsrv_name = $product->prdsrv_name;
            }
            else
            {
                $prdsrv_name = '';
            }
           


			if ($value->closure_date == '1970-01-01' || $value->closure_date == '0000-00-00') {
				$closure_date = "NA";
			} else {
				$closure_date = date("d M Y", strtotime($value->closure_date));
			}


			$result_array = array(
				'emp_name' => $emp_name,
				'company_name' => $value->company_name,
				'company_id' => $value->company_id,
				'business_value' => $value->project_business_value,
				'stage_id' => $value->stage,
				'source_id' => $value->source,
				'business_id' => $value->business_id,
				'product_id' => $value->product_id,
				'product_name' => $prdsrv_name,
				'group_id' => $value->group_id,
				'leadopp_id' => $value->leadopp_id,
				'lead_generate_id' => $value->lead_generate_id,
				'contact_person_name1' => $value->contact_person_name1,
				'phone_no' => $value->phone_no,
				'email' => $value->email,
				'address' => $value->address,
				'city' => $value->city,
				'business_name' => $businessname,
				'location' => $value->location,
				'group_name' => $group_name,
				'stage_title' => $stage_title,
				'source_title' => $source_title,
				'closure_date' => $closure_date,
				'remarks' => $value->remarks,
				'is_converted' => $value->is_converted,
				'customer_type' => $value->customer_type
			);
			array_push($final_array, $result_array);
		}
        // echo "<pre>";
        // print_r($final_array);
        // die;
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Leads-Opportunities List Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                'data' => ''
                );
		}
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}