<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Upload_documents_crm extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $image = $_FILES['pdf']['name'];
        $cur_date=date("dmyHis");
        $sepext = explode('.', strtolower($image));
        $extension = end($sepext);
        $store_file =$cur_date.' '.$extension;
        $move_file = FCPATH.'assets/admin/leaddocuments/';
        $move_file1 = $move_file . basename($store_file);
        move_uploaded_file($_FILES['pdf']['tmp_name'], $move_file1); 
        chmod($move_file1, 0755);                  
        $Details=array(
                        'leadopp_id'=>$this->input->post('leadopp_id'),
                        'name'=>$store_file,
                        'uploadfilename'=>$image,
                        'remark'=>$this->input->post('remark'),
                        'DateCreated'=>date("Y-m-d H:i:s")
                    );
        $upload = $this->db->Insert("tbl_lead_documents",$Details);

        if($upload)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'File Uploaded Successfully'
            );   
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Failed to upload'
            );   
        }
        
        // try
        // {
        //     move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
        //     $Details=array(
        //                     'leadopp_id'=>$this->input->post('leadopp_id'),
        //                     'name'=>$PdfName,
        //                     'uploadfilename'=>$uploadfilename,
        //                     'remark'=>$this->input->post('remark'),
        //                     'DateCreated'=>date("Y-m-d H:i:s")
        //                 );
        //     $this->db->Insert("tbl_lead_documents",$Details);
        //     $responce = array(
        //         'status'=>200,
        //         'msg' =>'File Uploaded Successfully'
        //         );   
            

        // }
        // catch(Exception $e)
        // {
        //     $responce = array(
        //         'status'=>500,
        //         'msg' =>'Failed to upload'
        //         );   
        // }
        $this->response($responce, REST_Controller::HTTP_OK); 
    }
}



// $image = $_FILES['uploadfile']['name'][$i];
//           $cur_date=date("dmyHis");
//           $sepext = explode('.', strtolower($image));
//           $extension = end($sepext);
//           $store_file =$cur_date.'_'.$i.".$extension";
//           $move_file = FCPATH.'assets/admin/leaddocuments/';
//           $move_file1 = $move_file . basename($store_file);
//           move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
//           chmod($move_file1, 0755);         