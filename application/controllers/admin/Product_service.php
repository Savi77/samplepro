<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_service extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Product_service_model');
			$data['sidebar']=array('menu' =>"p_s"); 
			$data['product_service']=$this->Product_service_model->get_product_service();
			$data['brand_name']=$this->Product_service_model->get_brand_name();
			$data['specs']=$this->Product_service_model->get_specs();
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			$this->load->view('Admin/product_service_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function add_product_service()
	{
		if(isset($_SESSION['id']))
		{
			$fileup=$_FILES['fileup']['name'];
			$upload_file=$_FILES['upload_file']['name'];
			$formdata =$this->input->post();
			// print_r($formdata);
			// print_r($upload_file);
			$this->load->model('Admin/Product_service_model');
			$this->Product_service_model->add_product_service($formdata,$upload_file,$fileup);
  	    }
		else
		{
			redirect('admin/Login');
		}
	}

	public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Product_service_model');
			$data=$this->Product_service_model->deactivate1($id);
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
			redirect('admin/Login');
		}
	}

	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Product_service_model');
			$data=$this->Product_service_model->activate1($id);
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
			redirect('admin/Login');
		}
	}

	public function edit_prd_srv()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

		    $id=$_REQUEST['prd_srv_id'];
			$this->load->model('Admin/Product_service_model');
			$data['edit_prd_srv']=$this->Product_service_model->edit_prd_srv($id);
			$data['multiple_image']=$this->Product_service_model->get_multiple_image($id);
			// print_r($data['multiple_image']);
			$data['brand_name']=$this->Product_service_model->get_brand_name();
			$data['specs']=$this->Product_service_model->get_specs();
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			$this->load->view('Admin/edit_product_service',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function delete_prd_srv()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Product_service_model');
			$data=$this->Product_service_model->delete_prd_srv($id);
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
			redirect('admin/Login');
		}
	}


	public function update()
	{
		if(isset($_SESSION['id']))
		{
			$fileup=$_FILES['fileup']['name'];
			$upload_file=$_FILES['upload_file']['name'];
			// print_r($upload_file);
			$formdata =$this->input->post();
			$this->load->model('Admin/Product_service_model');
			$this->Product_service_model->update($formdata,$upload_file,$fileup);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_file()
	{
		if(isset($_SESSION['id']))
		{
		    $img_id=$_REQUEST['img_id'];
			$this->load->model('Admin/Product_service_model');
			$data=$this->Product_service_model->delete_file($img_id);
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
			redirect('admin/Login');
		}
	}

	public function after_delete()
	{
		if(isset($_SESSION['id']))
		{
		    $prd_srv_id=$_REQUEST['prd_srv_id'];
			$this->load->model('Admin/Product_service_model');
			$this->Product_service_model->after_delete($prd_srv_id);
			
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function get_image_count()
	{
		if(isset($_SESSION['id']))
		{
		    $prd_srv_id=$_REQUEST['prd_srv_id'];
			$this->load->model('Admin/Product_service_model');
			$this->Product_service_model->get_image_count($prd_srv_id);
			
		}
		else
		{
			redirect('admin/Login');
		}
	}

//============================================ Product group master ========================================

	public function product_group()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Product_service_model');
			$data['sidebar']=array('menu' =>"p_group"); 
			$data['product_group']=$this->Product_service_model->product_group();
			$this->load->view('Admin/product_group_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function add_product_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Product_service_model');
			$data = $this->input->post();
			$this->Product_service_model->add_product_group($data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function delete_product_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Product_service_model');
			$pd_grp_id = $this->input->post('pd_grp_id');
			$this->Product_service_model->delete_product_group($pd_grp_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_product_group()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Product_service_model');
			$pd_grp_id = $_REQUEST['pd_grp_id'];
			$data['edit_product_group']=$this->Product_service_model->edit_product_group($pd_grp_id);
			$this->load->view('Admin/edit_product_group',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_product_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Product_service_model');
			$data = $this->input->post();
			$this->Product_service_model->Edit_Add_product_group($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	
}

