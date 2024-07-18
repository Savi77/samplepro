<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class GPS_Location_set extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
        $employee_id = $this->input->post('user_id');
        $imei = $this->input->post('IMEI');
        $posdate = $this->input->post('pos_date');
        $pos_time = $this->input->post('pos_time');
        $sig_str = $this->input->post('sig_str');
        $Batt_Str = $this->input->post('batt_str');
        $Latitude = $this->input->post('latitude');
        $Longitude = $this->input->post('longitude');
        $status = $this->input->post('status');
        $charge_status = $this->input->post('charge_status');
        $altitude = $this->input->post('altitude');
        $speed = $this->input->post('speed');
        $serverdate = date("Y-m-d");
        $servertime = date("H:i", strtotime("now"));

        $insert_query = $this->db->query("INSERT INTO `gpsdata`(`org_id`,`IMEI`, `emp_id`,`pos_date`, `pos_time`, `sig_str`, `batt_str`, `latitude`, `longitude`, `status`, `charge_status`, `altitude`, `speed`, `server_date`, `server_time`)
					                                          VALUES('$org_id','$imei','$employee_id','$posdate','$pos_time','$sig_str','$Batt_Str','$Latitude','$Longitude','$status','$charge_status','$altitude','$speed','$serverdate','$servertime')  ON DUPLICATE KEY UPDATE IMEI=IMEI,pos_date=pos_date,pos_time=pos_time");

        if($insert_query)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'GPS Location Added Sucessfully',
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                );
        }
		$this->response($responce, REST_Controller::HTTP_OK);
	}
}