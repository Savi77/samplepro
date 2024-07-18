<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Schedule_customer_list extends REST_Controller 
{
  function __construct()
  {
    parent::__construct();
  }
  public function index_post()
  {
    $type = $this->input->post('type');
    $org_id = $this->input->post('org_id');

    if ($type == 'Opportunity' || $type == 'schedule') 
    {
        $Custype = 'P';
    } 
    else 
    {
        $Custype = 'T';
    }
    $customer_list = $this->db->query("SELECT customer_id, CONCAT(TRIM(`company_name`), ' - ', cust_type) AS company_name FROM `tbl_customer` WHERE  type='$Custype' and org_id='$org_id' and delete_status=0 ORDER BY company_name asc ")->result();
    
    if(!empty($customer_list))
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Schedule Customer List Fetched Successfully',
            'data' => $customer_list
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