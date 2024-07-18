<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function index()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Dashboard_model');
            $data['profile_array'] = $this->Dashboard_model->get_profile_array();
            $data['emailsetting_array'] = $this->Dashboard_model->get_emailsetting_array();
            $data['web_logo'] = $this->Dashboard_model->web_logo();
            $data['sidebar']=array('menu' =>"ViewmyProfile"); 
			$this->load->view('BuroAdmin/buro_setting_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

    public function EmailConfiguartion()
    {
      if(isset($_SESSION['id']))
      {
          $this->load->model('BuroAdmin/Settings_model');
          $formdata=$this->input->post();
          $this->Settings_model->EmailConfiguartion($formdata);
      }
      else
      {
         redirect('admin/Login');
      }
    }

    public function UpdateProfile()
    {
        if(isset($_SESSION['id']))
        {
            $this->load->model('BuroAdmin/Settings_model');
            $formdata=$this->input->post();
            $this->Settings_model->UpdateProfile($formdata);
        }
        else
        {
        redirect('admin/Login');
        }

    }

    public function CheckPassword()
    {
        $this->load->model('BuroAdmin/Settings_model');
        $password=$this->input->post('current_password');
        echo $this->Settings_model->CheckPassword($password);
    }

    public function UpdatePassword()
    {
        if(isset($_SESSION['id']))
        {
            $this->load->model('BuroAdmin/Settings_model');
            $formdata=$this->input->post();
            $this->Settings_model->UpdatePassword($formdata);
        }
        else
        {
        redirect('admin/Login');
        }
    }

    public function UpdateLogo()
    {
        $this->load->model('BuroAdmin/Settings_model');
        $image_one = $_FILES['fileupone']['name'];
        $image_two = $_FILES['fileuptwo']['name'];
        $this->Settings_model->UpdateLogo($image_one,$image_two);
    }
}

?>