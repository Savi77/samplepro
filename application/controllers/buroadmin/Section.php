
<?php
error_reporting(0);
class Section extends CI_Controller
 {
	public function index()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('BuroAdmin/Section_model');
			$data['get_list_home'] = $this->Section_model->get_list_home();
            $data['sidebar']=array('menu' =>"setion");
			$this->load->view('BuroAdmin/section_view',$data);
		}
		else
		{
			redirect('BuroAdmin/Login');
		}
	}

	public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('BuroAdmin/Section_model');
			$data=$this->Section_model->deactivate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('BuroAdmin/Login');
		}
	}

	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('BuroAdmin/Section_model');
			$data=$this->Section_model->activate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('BuroAdmin/Login');
		}
	}
	
}

