<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller 
{	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Leads_model');
			$data['sidebar']=array('menu' =>"source");
			$data['get_data']=$this->Leads_model->get_data();
			$this->load->view('Admin/source_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function ViewDetails()
	{
		if(isset($_SESSION['id']))
		{
			$leadopp_id = $this->input->get('leadopp_id');
			$this->load->model('Admin/Leads_model');
			$data['lead_data']=$this->Leads_model->lead_data($leadopp_id);
			$data['history_data']=$this->Leads_model->history_data($leadopp_id);
			$data['activity_data']=$this->Leads_model->activity_data($leadopp_id);
			$data['document_data']=$this->Leads_model->document_data($leadopp_id);
			$data['employee_list']=$this->Leads_model->employee_list();
			// echo json_encode($data['activity_data']);
			$this->load->view('Admin/LeadViewDetails',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function edit_lead()
	{
		if(isset($_SESSION['id']))
		{
			$leadopp_id = $_REQUEST['leadopp_id'];
			$this->load->model('Admin/Leads_model');
			$data['lead_data']=$this->Leads_model->edit_lead($leadopp_id);
			$Type=$data['lead_data']->customer_type;

			if($Type=='Lead')
			{
				$data['leads_opportunity']=$this->Leads_model->get_leads_opportunity();
				$data['array_company']=$this->Leads_model->company_list();
				$data['source_details']=$this->Leads_model->source_details();
				$data['stage_details']=$this->Leads_model->stage_details();
				$this->load->model('Admin/Customer_model');
				$data['array_customer']=$this->Customer_model->manage_customer();
				$data['type_list']=$this->Customer_model->type_list();
				$data['schedule_list']=$this->Customer_model->schedule_list();
				$data['location_list']=$this->Customer_model->location_list();
				$data['business_list']=$this->Customer_model->business_list();
				$data['group_list']=$this->Customer_model->group_list();
				$data['country_list']=$this->Customer_model->country_list();
				$data['product_list']=$this->Customer_model->product_list();
				$data['employee_list']=$this->Leads_model->employee_list();
				$this->load->view('Admin/EditLeadview',$data);
			}
			else
			{
				$data['leads_opportunity']=$this->Leads_model->get_leads_opportunity();
				$data['array_company']=$this->Leads_model->company_list();
				$data['source_details']=$this->Leads_model->source_details();
				$data['stage_details']=$this->Leads_model->stage_details();
				$this->load->model('Admin/Customer_model');
				$data['array_customer']=$this->Customer_model->manage_customer();
				$data['type_list']=$this->Customer_model->type_list();
				$data['schedule_list']=$this->Customer_model->schedule_list();
				$data['location_list']=$this->Customer_model->location_list();
				$data['business_list']=$this->Customer_model->business_list();
				$data['group_list']=$this->Customer_model->group_list();
				$data['country_list']=$this->Customer_model->country_list();
				$data['product_list']=$this->Customer_model->product_list();
				$data['employee_list']=$this->Leads_model->employee_list();
				$this->load->view('Admin/EditLeadview',$data);				
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function UpdateLead()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$leadopp_array = $this->input->post();
			$this->Leads_model->UpdateLead($leadopp_array);
		}
		else
		{
			redirect('admin/Login');
		}
	}


   public function show_activity_details()
	{
		if(isset($_SESSION['id']))
		{
			$schedule_id=$_REQUEST['schedule_id'];
			$this->load->model('Admin/Leads_model');
			$data['task_status']=$this->Leads_model->show_activity_details($schedule_id);
			$this->load->view('Admin/show_activity_details',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


   public function delete_document()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$document_id = $this->input->post('document_id');
			$this->Leads_model->delete_document($document_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function add_source()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->add_source($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function UploadDocument()
	{
		$attachment_lead_id=$_REQUEST['attachment_lead_id'];
		$this->load->model('Admin/Leads_model');
		$fileremark = $this->input->post('fileremark');
		$this->Leads_model->UploadDocument($attachment_lead_id,$fileremark);
	}	

	public function delete_source()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$id = $this->input->post('id');
			$this->Leads_model->delete_source($id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function edit_source()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
            $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$this->load->model('Admin/Leads_model');
			$id = $_REQUEST['id'];
			$data['editsorce_detail']=$this->Leads_model->edit_source($id);
			$this->load->view('Admin/edit_source_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Edit_Add_source()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->Edit_Add_source($data);
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
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->deactivate($id);
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
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->activate($id);
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


//=============== Stage section ========================================

	public function Stage()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Leads_model');
			$data['sidebar']=array('menu' =>"stage");
			$data['get_stagedata']=$this->Leads_model->get_stagedata();
			$this->load->view('Admin/stage_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_stage()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->add_stage($data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function delete_stage()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$id = $this->input->post('id');
			$this->Leads_model->delete_stage($id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_stage()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Leads_model');
			$id = $_REQUEST['id'];
			$data['editstage']=$this->Leads_model->edit_stage($id);
			$this->load->view('Admin/edit_stage_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_stage()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->Edit_Add_stage($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate1()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->deactivate1($id);
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

	public function activate1()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->activate1($id);
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
//========== Leads Opportunity ====================================
	public function leads_opportunity()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"lead_opp");
			$this->load->model('Admin/Leads_model');
			$data['leads_opportunity']=$this->Leads_model->get_leads_opportunity();
			$data['array_company']=$this->Leads_model->company_list();
			$data['source_details']=$this->Leads_model->source_details();
			$data['stage_details']=$this->Leads_model->stage_details();
			$this->load->model('Admin/Customer_model');
			$data['array_customer']=$this->Customer_model->manage_customer();
			$data['type_list']=$this->Customer_model->type_list();
			$data['schedule_list']=$this->Customer_model->schedule_list();
			$data['location_list']=$this->Customer_model->location_list();
			$data['business_list']=$this->Customer_model->business_list();
			$data['group_list']=$this->Customer_model->group_list();
			$data['country_list']=$this->Customer_model->country_list();
			$data['product_list']=$this->Customer_model->product_list();
			$data['employee_list']=$this->Leads_model->employee_list();
			$this->load->view('Admin/leads_opportunity_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function AddTask()
	{
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Leads_model');
			$this->Leads_model->AddTask($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function Transfer_Lead()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$leadopp_id = $this->input->post('db_lead_id');
			$emp_id = $this->input->post('emp_id');
			$this->Leads_model->Transfer_Lead($leadopp_id,$emp_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function del_leads()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$leadopp_id = $this->input->post('leadopp_id');
			$this->Leads_model->del_leads($leadopp_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function get_cust_detail()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$customer_id = $this->input->post('customerid');
			$this->Leads_model->get_cust_detail($customer_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function convert_to_contact()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$this->load->model('Admin/Customer_model');
			$leadopp_id = $this->input->post('leadopp_id');
			$data['convert_to_contact']=$this->Leads_model->convert_to_contact($leadopp_id);
			$customerid=$data['convert_to_contact']->customer_id;
		    $data['edit_customerresult']=$this->Customer_model->edit_customer($customerid);
		    $data['editprimary_customer']=$this->Customer_model->primary_customer();
		    $res = $data['edit_customerresult']->result();
			$get_businessid = $res[0]->business_id;
			$data['selected_buss']=$this->Customer_model->mult_buss_list($get_businessid);
		    $data['type_list1']=$this->Customer_model->type_list();
			$data['location_list1']=$this->Customer_model->location_list();
			$data['business_list1']=$this->Customer_model->business_list();
			$data['group_list1']=$this->Customer_model->group_list();
			$data['country_list1']=$this->Customer_model->country_list();
			$data['selected_state_list']=$this->Customer_model->selected_state_list($customerid);
			$this->load->view('Admin/convert_to_contact_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function InsertLead()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$leadopp_array = $this->input->post();
			$this->Leads_model->InsertLead($leadopp_array);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function InsertOpportunity()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$leadopp_array = $this->input->post();
			// print_r($leadopp_array);			
			$this->Leads_model->InsertOpportunity($leadopp_array);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function activity()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$data['sidebar']=array('menu' =>"activity");
			$this->load->model('Admin/Leads_model');
			$data['get_data']=$this->Leads_model->activity();
			$this->load->view('Admin/activity_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_activity()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->add_activity($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_activity()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$id = $this->input->post('id');
			$this->Leads_model->delete_activity($id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_activity()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Leads_model');
			$id = $_REQUEST['id'];
			$data['editactivity_detail']=$this->Leads_model->edit_activity($id);
			$this->load->view('Admin/edit_activity_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_activity()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->Edit_Add_activity($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate_activity()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->deactivate_activity($id);
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

	public function activate_activity()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('Admin/Leads_model');
			$data=$this->Leads_model->activate_activity($id);
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

}
