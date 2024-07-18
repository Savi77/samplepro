<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller 
{
	public function index()
	{
		if(isset($this->session->id))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/Ecommerce_model');
			$data['order_list']=$this->Ecommerce_model->order_list();
			$data['sidebar']=array('menu' =>"order"); 

			// User Permission Functionality ------------
			// module_id = 3, feature id = 3 for Product Management 
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>3,'feature_id'=>12);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);

			$data['type'] = 's_link';
			$data['page_name'] = 'E-Commerce';
			$data['sidebar']=array('menu' =>"Ecommerce");

			// $this->load->view('Admin/order_list_view',$data);
			$this->load->view('Admin/new_order_list_view',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function OrderReport()
	{
		if(isset($this->session->id))
		{
			$type = $_REQUEST['Type'];
			// geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Ecommerce_model');
			$data['order_list']=$this->Ecommerce_model->OrderReport($type);
      		$data['sidebar']=array('menu' =>$type); 
			$this->load->view('Admin/OrderReportView',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function view_order()
	{
		if(isset($this->session->id))
		{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				

			$order_id = $_REQUEST['id'];
			$this->load->model('Admin/Ecommerce_model');
			$data['view_order']=$this->Ecommerce_model->view_order($order_id);
			// print_r($data['view_order']);
			$data['product_orderlist']=$this->Ecommerce_model->order_product_list($order_id);
			$data['product_orderhistory']=$this->Ecommerce_model->product_orderhistory($order_id);
			$data['order_status']=$this->Ecommerce_model->order_status($order_id);
			$data['sidebar']=array('menu' =>"order"); 
			// User Permission Functionality ------------
			// module_id = 3, feature id = 3 for Product Management 
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>3,'feature_id'=>12);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Ecommerce';
			$data['page_name_1'] = 'E-Commerce';
			$data['page_name_2'] = 'View Order';
			$data['sidebar']=array('menu' =>"Ecommerce");

			// $this->load->view('Admin/view_order_details',$data);
			$this->load->view('Admin/new_view_order_details',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}

	public function change_order_status()
	{
		if(isset($this->session->id))
		{
			$this->load->model('Admin/Ecommerce_model');
			$formdata = $this->input->post();
			$this->Ecommerce_model->change_order_status($formdata);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}


// -------------------------------------------- Order Status Master -----------------------------------


	public function status()
	{
		if(isset($_SESSION['id']))
		{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------	
			$this->load->model('Admin/Ecommerce_model');
			$data['sidebar']=array('menu' =>"status");
			$data['get_data']=$this->Ecommerce_model->get_data();
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Order Status';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/order_status_view',$data);
			$this->load->view('Admin/new_order_status_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_status()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Ecommerce_model');
			$data = $this->input->post();
			$this->Ecommerce_model->add_status($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_status()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Ecommerce_model');
			$status_id = $this->input->post('status_id');
			$this->Ecommerce_model->delete_status($status_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_status()
	{
		if(isset($_SESSION['id']))
		{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
			
			$this->load->model('Admin/Ecommerce_model');
			$status_id = $_REQUEST['status_id'];
			$data['editstatus']=$this->Ecommerce_model->edit_status($status_id);
			$this->load->view('Admin/edit_order_status',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_status()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Ecommerce_model');
			$data = $this->input->post();
			$this->Ecommerce_model->Edit_Add_status($data);
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
		    $id=$_REQUEST['status_id'];
			$this->load->model('Admin/Ecommerce_model');
			$data=$this->Ecommerce_model->deactivate($id);
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
		    $id=$_REQUEST['status_id'];
			$this->load->model('Admin/Ecommerce_model');
			$data=$this->Ecommerce_model->activate($id);
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







// -------------------------------------------- / Order Status Master -----------------------------------
}
