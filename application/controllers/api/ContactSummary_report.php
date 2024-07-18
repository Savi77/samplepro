<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class ContactSummary_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $cust_type=$this->input->post('cust_type');

        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $cust_query2=$this->db->get("tbl_customer")->result();

        $new_array=array(
            'cust_type'=>'Total', 
            'count'=>count($cust_query2)
        );
        array_push($final_array, $new_array);

        if($cust_type=='')
        { 
            $type_array=array('primary','secondary');
        }
        else
        {
            $type_array=array($cust_type);
        }

        for($a=0;$a<count($type_array);$a++)
        {
            $type2=$type_array[$a];
            $where_array = array('org_id'=>$org_id);

            if($type2!='')
            {
                $this->db->where("cust_type",$type2);
            }

            $this->db->where($where_array); 
            $this->db->where('delete_status', 0);  
            $cust_query=$this->db->get("tbl_customer")->result();
            $new_array=array(
                                'cust_type'=>$type2, 
                                'count'=>count($cust_query)
                            );

            array_push($final_array, $new_array);
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Contact Summary Data Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}