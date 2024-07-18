<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/Product_model');
			$data['get_list']=$this->Product_model->get_list();
			$data['get_data']=$this->Product_model->get_data();
			// echo json_encode($data['get_list']->result());
			// print_r($data['get_list']);
			$data['sidebar']=array('menu' =>"s_product"); 
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$data['get_submenu_list']=$this->Product_model->get_submenu_list1();
			// print_r($data['get_menu_list']);
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			$this->load->model('Admin/Product_service_model');
			$data['specs']=$this->Product_service_model->get_specs();
			$data['hsn_code_array']=$this->Product_service_model->get_hsn_code();
			$data['specification_array']=$this->Product_service_model->get_specification_array();

			// User Permission Functionality ------------
			// module_id = 1, feature id = 2 for Product Management , Privilegeids for Product Management= 1,2,3,4
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>2);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
			//------------------------------------------


			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ProductSpecification/Product';
			$data['page_name_1'] = 'Product Management';
			$data['page_name_2'] = 'Manage Product';
			$data['sidebar']=array('menu' =>"ProductManagement");

			// $data['type'] = 's_link';
			// $data['page_name'] = 'Product';
			// $data['sidebar']=array('menu' =>"ProductManagement");
			$this->load->view('Admin/new_product_service_new_view',$data);
			// $this->load->view('Admin/product_service_new_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function index2()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Product_model');
			$data['get_list']=$this->Product_model->get_list();
			$data['get_data']=$this->Product_model->get_data();
			// echo json_encode($data['get_list']->result());
			// print_r($data['get_list']);
			$data['sidebar']=array('menu' =>"s_product"); 
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$data['get_submenu_list']=$this->Product_model->get_submenu_list1();
			// print_r($data['get_menu_list']);
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			$this->load->model('Admin/Product_service_model');
			$data['specs']=$this->Product_service_model->get_specs();
			$data['hsn_code_array']=$this->Product_service_model->get_hsn_code();
			$data['specification_array']=$this->Product_service_model->get_specification_array();

			$this->load->view('Admin/product_service_view',$data);

		}
		else
		{
			redirect('admin/Login');
		}
	}








	public function fetch_submenu()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$menu_id =$this->input->post('menu_id');
			$this->load->model('Admin/Product_model');
			$data['fetch_submenu']=$this->Product_model->fetch_submenu($menu_id);
			$this->load->view('Admin/submenu_list',$data);

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
			$this->load->model('Admin/Product_model');
			$this->Product_model->add_product_service($formdata,$upload_file,$fileup);
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
		    $id=$_REQUEST['uprdsrvid'];
			$this->load->model('Admin/Product_model');
			$data=$this->Product_model->delete($id);
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

	public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['uprdsrvid'];
			$this->load->model('Admin/Product_model');
			$data=$this->Product_model->deactivate($id);
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
		    $id=$_REQUEST['uprdsrvid'];
			$this->load->model('Admin/Product_model');
			$data=$this->Product_model->activate($id);
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
			$this->load->model('Admin/Product_model');
			$data['edit_intr']=$this->Product_model->edit($id);
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$data['get_submenu_list']=$this->Product_model->get_edit_submenu_list($id);	
			$this->load->view('Admin/edit_product1',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function edit_prdsrv()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['prd_srv_id'];
			$this->load->model('Admin/Product_service_model');
			// --------------- Get product details ---------------------
			// $data['edit_prd_srv']=$this->Product_service_model->edit_prd_srv($id);
			$data['multiple_image']=$this->Product_service_model->get_multiple_image($id);
			// print_r($data['multiple_image']);
			$data['brand_name']=$this->Product_service_model->get_brand_name();
			$data['specs']=$this->Product_service_model->get_specs();
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			// --------------- / Get product details ---------------------
			// --------------- Cetegory and subcategory ---------------------
			$this->load->model('Admin/Product_model');
			$data['edit_prd_srv']=$this->Product_model->edit($id);
			$data['get_menu_list']=$this->Product_model->get_menu_list1();
			$data['get_submenu_list']=$this->Product_model->get_edit_submenu_list($id);	
			// --------------- / Cetegory and subcategory ---------------------
			$this->load->model('Admin/Product_service_model');
			$data['specs']=$this->Product_service_model->get_specs();
			$data['hsn_code_array']=$this->Product_service_model->get_hsn_code();
			$data['specification_array']=$this->Product_service_model->get_specification_array();
			
			$this->load->view('Admin/new_edit_product_service',$data);
			// $this->load->view('Admin/edit_product_service',$data);
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
			// $image=$_FILES['image']['name'];
			// $download_file=$_FILES['download_file']['name'];
			// $formdata =$this->input->post();
			// $this->load->model('Admin/Product_model');
			// $this->Product_model->update($formdata,$image,$download_file);

			$fileup=$_FILES['fileup']['name'];
			$upload_file=$_FILES['upload_file']['name'];
			// print_r($upload_file);
			$formdata =$this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/Product_model');
			$this->Product_model->update($formdata,$upload_file,$fileup);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Update_header()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('Admin/Product_model');
			$this->Product_model->Update_header($formdata);
  	    }
		else
		{
			redirect('admin/Login');
		}
	}

		public function profile_file()
		{
			if(isset($_SESSION['id']))
			{
				$upload_file=$_FILES['upload_file']['name'];
				$formdata =$this->input->post();
				$this->load->model('Admin/Product_model');
				$this->Product_model->profile_file($upload_file,$formdata);
			}
			else
			{
				redirect('admin/Login');
			}
			
		}
		public function ImportProductService()
		{
			$this->load->model('Admin/Product_model');
			$this->Product_model->ImportProductService();
		}
	
		public function ExportProductService()
		{
			$this->load->model('Admin/Product_model');
			$this->Product_model->ExportProductService();
		}

		public function gethsndescription()
		{
			$formdata =$this->input->post();
			$this->load->model('Admin/Product_model');
			$result = $this->Product_model->get_hsn_description($formdata);
            echo $result;
		}
}

