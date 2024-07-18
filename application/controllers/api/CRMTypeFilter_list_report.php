<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class CRMTypeFilter_list_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $array = array("All"=>"All", "Lead"=>"Lead", "Opportunity"=>"Opportunity");
        foreach($array as $x => $x_value)
        {
        $new_array=array(
                            'name'=>$x, 
                            'value'=>$x_value
                        );

        array_push($final_array, $new_array);

        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'CRM Type Filter Llist Fetched Successfully',
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