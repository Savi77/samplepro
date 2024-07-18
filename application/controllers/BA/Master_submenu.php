<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_submenu extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_submenu_model');
			$data['get_list']=$this->Master_submenu_model->get_list();
			$data['sidebar']=array('menu' =>"m_sunmenu"); 
			$this->load->model('Admin/Product_model');
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$this->load->view('Admin/subcategories_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add()
	{
		if(isset($_SESSION['id']))
		{
			 $data = array(
					        'submmenu'=>$_REQUEST['submenu'],
					        'menu_id'=>$_REQUEST['menu_id'],
					        'status'=>1
					    );
			$this->load->model('Admin/Master_submenu_model');
			$data = $this->Master_submenu_model->add($data);

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


	public function delete()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Master_submenu_model');
			$data=$this->Master_submenu_model->delete($id);

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

	public function edit()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------			

		    $id=$_REQUEST['interestid'];
			$this->load->model('Admin/Master_submenu_model');
			$data['edit_intr']=$this->Master_submenu_model->edit($id);
			$this->load->model('Admin/Product_model');
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$this->load->view('Admin/edit_submenu',$data);
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
			 $menu_id=$_REQUEST['menu_id'];
			 $submmenu=$_REQUEST['submmenu'];
			 $id=$_REQUEST['id'];
			$this->load->model('Admin/Master_submenu_model');
			$data = $this->Master_submenu_model->update($submmenu,$id,$menu_id);
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


   public function active()
   {
       $id=$this->input->post('id');
       $this->load->model('Admin/Master_submenu_model');
	   $this->Master_submenu_model->active($id);
   }	

  public function deactive()
   {
       $id=$this->input->post('id');
       $this->load->model('Admin/Master_submenu_model');
	   $this->Master_submenu_model->deactive($id);
   }


	
}

