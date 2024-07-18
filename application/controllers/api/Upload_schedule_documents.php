<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Upload_schedule_documents extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
	{
		$random=rand(11,125700);

        $schedule_id = $this->input->post('schedule_id');
        $issue_id = $this->input->post('issue_id');
        $upload_by = $this->input->post('upload_by');

        $PdfUploadFolder = 'assets/admin/scheduledocuments/';
        $ServerURL = base_url().$PdfUploadFolder;
        $PdfName = $_FILES['pdf']['name'];  
        $PdfInfo = pathinfo($_FILES['pdf']['name']);
        $PdfFileExtension = $PdfInfo['extension'];  
        $PdfFileURL = $ServerURL . date('YmdHis').$random. '.' . $PdfFileExtension;
        $PdfFileFinalPath = $PdfUploadFolder . date('YmdHis').$random. '.'. $PdfFileExtension;
        $uploadfilename=date('YmdHis').$random. '.' . $PdfFileExtension;

        try
        {
            move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
            $Details=array(
                            'schedule_id'=>$schedule_id,
                            'issue_id'=>$issue_id,
                            'upload_by'=>$upload_by,
                            'doc_name'=>$PdfName,
                            'uploadfilename'=>$uploadfilename,
                            'date_created'=>date("Y-m-d H:i:s")
                        );
            $added = $this->db->Insert("tbl_schedule_document",$Details);

            if($added)
            {
                $responce = array(
                    'status'=>200,
                    'msg' =>'File Uploaded Succesfully'
                );
            }
            else
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>'Failed to upload file'
                );
            }
        }
        catch(Exception $e)
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Failed to upload file'
            );
        }
        $this->response($responce, REST_Controller::HTTP_OK); 
	}
}