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
			$data['user_permission']= $this->GetPermisstionMaster();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Source List';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/source_view',$data);
			$this->load->view('Admin/new_source_view',$data);
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
			$data['leadopp_id'] = $leadopp_id;
			$data['lead_data']=$this->Leads_model->lead_data($leadopp_id);
			$data['history_data']=$this->Leads_model->history_data($leadopp_id);
			$data['activity_data']=$this->Leads_model->activity_data($leadopp_id);
			$data['document_data']=$this->Leads_model->document_data($leadopp_id);
			$data['employee_list']=$this->Leads_model->employee_list();
			$data['product_list']=$this->Leads_model->product_list();
			$data['quotation_detail_list']=$this->Leads_model->quotation_detail_list($leadopp_id);
			$data['note_data']= $this->Leads_model->notes_list($leadopp_id);

		    $data['terms_for']=$this->Leads_model->terms_for();

			$data['getAllSection']=$this->Leads_model->getAllSection();
			
			$this->load->model('Admin/Dashboard_model');
			
			$data['organsation_array']=$this->Dashboard_model->get_organsation_array();

			//Last year Id 
			$quote_prefix = $data['organsation_array']->quote_prefix;
			$quote_suffix = $data['organsation_array']->quote_suffix;

			$data['last_po'] = $this->Dashboard_model->getLastRecord('tbl_lead_quotation', 'custom_id');
			
			if ($data['last_po']->last_id != 0) {
				$orderId  = $data['last_po']->last_id  + 1;
				$data['order_id'] = $orderId;
				$data['performaGui'] = $quote_prefix .  "/" . $quote_suffix    .  "/" . $orderId;
			} else {
				$quote_number = $data['organsation_array']->quote_number;
				$data['order_id'] = $quote_number;
				$data['performaGui'] = $quote_prefix .  "/" . $quote_suffix    .  "/" . $quote_number;
			}
			$data['sidebar']=array('menu' =>"lead_opp");
			$permission_array_lead=array('user_id'=>$_SESSION['id'],'module_id'=>2,'feature_id'=>9);
			$data['user_permission_lead']=$this->Dashboard_model->get_user_permission($permission_array_lead);
			
			$permission_array_opp=array('user_id'=>$_SESSION['id'],'module_id'=>2,'feature_id'=>10);
			$data['user_permission_opp']=$this->Dashboard_model->get_user_permission($permission_array_opp);
			//------------------------------------------
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Leads/leads_opportunity';
			$data['page_name_1'] = 'CRM';
			$data['page_name_2'] = 'Lead-Opportunity Details';
			$data['sidebar']=array('menu' =>"lead_opp");

			// $this->load->view('Admin/LeadViewDetails',$data);
			$this->load->view('Admin/NewLeadViewDetails',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function get_section()
	{
		if(isset($_SESSION['id']))
		{
			$section_id = $this->input->post('section_id');
			$this->load->model('Admin/Leads_model');
			$data['section_list'] = $this->Leads_model->get_section($section_id);	
			// echo $section_list[''];
			$this->load->view('Admin/get_section_view',$data);	

		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function addQutationStatus()
	{
		$this->load->model('Admin/Leads_model');
		$status = $_REQUEST['status'];
		$id = $_REQUEST['id'];
		$lead_id = $_REQUEST['lead_id'];
		$this->Leads_model->addQutationStatus($status, $id, $lead_id);
	}
	public function QuotationPdf()
	{
		if(isset($_SESSION['id']))
		{
			$quotation_id = $this->input->get('qid');
			$this->load->model('Admin/Leads_model');
			$this->Leads_model->QuotationPdf($quotation_id);			
		}
		else
		{
			redirect('admin/Login');
		}
    }

	public function get_terms_list()
	{
		if(isset($_SESSION['id']))
		{
			$termsfor = $this->input->post('termsfor');
			$this->load->model('Admin/Leads_model');
			$data['terms_list']=$this->Leads_model->get_terms_list($termsfor);	
			$this->load->view('Admin/get_terms_list_view',$data);	

		}
		else
		{
			redirect('admin/Login');
		}
    }
   
	public function PrintQuotation()
	{
		if(isset($_SESSION['id']))
		{
			$quotation_id = $this->input->get('qid');
			$this->load->model('Admin/Leads_model');
			// $this->Leads_model->QuotationPdf($quotation_id);	
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Leads_model');
			$data['sidebar']=array('menu' =>"lead_opp");
			$data['quotation_array']=$this->Leads_model->PrintQuotation($quotation_id);
			$data['quotation_product_array']=$this->Leads_model->quotation_product_array($quotation_id);
			$this->load->view('Admin/ViewQuotationInvoice',$data);		
		}
		else
		{
			redirect('admin/Login');
		}
    }


	public function ViewQuotation()
	{
		if(isset($_SESSION['id']))
		{
			$quotation_id = $this->input->get('qid');
			$this->load->model('Admin/Leads_model');
			// $this->Leads_model->QuotationPdf($quotation_id);	
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Leads_model');
			
			$data['sidebar']=array('menu' =>"lead_opp");
			$data['quotation_array'] = $this->Leads_model->PrintQuotation($quotation_id);
			$data['organisationData'] = $this->Leads_model->organisationData($_SESSION['org_id']);
			$data['quotation_product_array']=$this->Leads_model->quotation_product_array($quotation_id);
			// var_dump($data['quotation_product_array']);
			// exit;
			$data['org_array']=$this->Leads_model->get_org_array();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Leads/ViewDetails?leadopp_id='.$data['quotation_array']['leadopp_id'];
			$data['page_name_1'] = 'Lead-Opportunity Details';
			$data['page_name_2'] = 'View Quotation';
			$data['sidebar']=array('menu' =>"lead_opp");

			// $data['type'] = 's_link';
			// $data['page_name'] = '';
			// $data['sidebar']=array('menu' =>"lead_opp");

			$this->load->view('Admin/NewViewQuotationInvoice',$data);
			// $this->load->view('Admin/ViewQuotationInvoice',$data);	
		}
		else
		{
			redirect('admin/Login');
		}
    }

	public function SendQuotationMail()
	{
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Leads_model');
			$this->Leads_model->send_quotation_mail($formdata);			
		}
		else
		{
			redirect('admin/Login');
		}
    }

	public function ShareDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Leads_model');
			$this->Leads_model->ShareDetails($formdata);			
		}
		else
		{
			redirect('admin/Login');
		}
    }



	public function quotation_mail()
	{
		if(isset($_SESSION['id']))
		{
			$quotation_id = $this->input->post('quotation_id');
			$this->load->model('Admin/Leads_model');
			$this->Leads_model->quotation_mail($quotation_id);			
		}
		else
		{
			redirect('admin/Login');
		}
    }


	public function edit_quotation_details()
	{
		if(isset($_SESSION['id']))
		{
			$quotation_id = $this->input->post('quotation_id');
			$this->load->model('Admin/Leads_model');
			$data['product_list']=$this->Leads_model->product_list();
			$data['quotation_details']=$this->Leads_model->get_quotation_details($quotation_id);
			$data['getAllSection']=$this->Leads_model->getAllSection();
			$data['cust_details']=$this->Leads_model->get_cust_details($quotation_id);
			 $data['terms_for']=$this->Leads_model->terms_for();
			$data['quotation_product_details']=$this->Leads_model->get_quotation_product_details($quotation_id);	
			$this->load->view('Admin/edit_quotation_view',$data);		
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
			$this->load->model('Admin/Master_model');
			$data['lead_data']=$this->Leads_model->edit_lead($leadopp_id);
			$Type = $data['lead_data']->customer_type;

			if($Type=='Lead')
			{
				
			    $data['get_branch']=$this->Master_model->get_branch();
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
				$data['get_branch']=$this->Master_model->get_branch();
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

	public function AddQuotation()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->AddQuotation($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function UpldateQuotation()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			// print_r($data);
			$this->Leads_model->UpldateQuotation($data);
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


	public function get_product_details()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$productid = $this->input->post('productid');
			$this->Leads_model->get_product_details($productid);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function get_lead_details()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$lead_id = $this->input->post('lead_id');
			$this->Leads_model->get_lead_details($lead_id);
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
			$data['user_permission']= $this->GetPermisstionMaster();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Stage List';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/stage_view',$data);
			$this->load->view('Admin/new_stage_view',$data);
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
			$this->load->model('Admin/Master_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			
			$data['get_branch']=$this->Master_model->get_branch();
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
			// User Permission Functionality ------------

			// module_id = 2, feature id = 9 for Lead
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>2,'feature_id'=>9);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
			//------------------------------------------

			// echo json_encode($data['leads_opportunity']);
			$data['type'] = 's_link';
			$data['page_name'] = 'CRM';
			$data['sidebar']=array('menu' =>"lead_opp");
			// $this->load->view('Admin/leads_opportunity_view',$data);
			$this->load->view('Admin/new_leads_opportunity_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function add_leads_opportunity()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
			$this->load->model('Admin/Master_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			
			$data['get_branch']=$this->Master_model->get_branch();
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

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Leads/leads_opportunity';
			$data['page_name_1'] = 'CRM';
			$data['page_name_2'] = 'Add Lead / Opportunity';
			$data['sidebar']=array('menu' =>"lead_opp");
			$this->load->view('Admin/add_leads_opportunity_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function AddTask()
	{
		// echo "<pre>";
		// print_r($this->input->post());
		// die;
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
			$data['lead_data']=$this->Leads_model->lead_data($leadopp_id);
			$customerid=$data['convert_to_contact']->customer_id;
		    $data['edit_customerresult']=$this->Customer_model->edit_customer($customerid);
		    $data['editprimary_customer']=$this->Customer_model->primary_customer();
		    $res = $data['edit_customerresult']->result();
			$get_businessid = $res[0]->business_id;
			$data['selected_buss']=$this->Customer_model->mult_buss_list($get_businessid);
			// echo "<pre>";
			// print_r($data['lead_data']);
			// die;
		    $data['type_list1']=$this->Customer_model->type_list();
			$data['location_list']=$this->Customer_model->location_list();
			$data['business_list']=$this->Customer_model->business_list();
			$data['group_list']=$this->Customer_model->group_list();
			$data['country_list']=$this->Customer_model->country_list();
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
			$data['user_permission']= $this->GetPermisstionMaster(); 
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
	public function GetPermisstionMaster()
	{
		// User Permission Functionality ------------ 
		$this->load->model('Admin/Dashboard_model');
		$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
		return $this->Dashboard_model->get_user_permission($permission_array);
	}

	public function WelComeEmailSent()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Leads_model');
			$lead_main_id = trim($this->input->post('Main_lead_id'));
			$this->Leads_model->WelComeEmailSent($lead_main_id);
		} else {
			redirect('admin/Login');
		}
	}

	public function ExportLeadOpp()
	{
		$this->load->model('Admin/Leads_model');
		$this->Leads_model->ExportLeadOpp();
	}
	public function ImportLeadOpp()
	{
		$this->load->model('Admin/Leads_model');
		$this->Leads_model->ImportLeadOpp();		
	}

	public function Recent_Task_view_page()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Leads_model');
			$leadopp_id = $_GET['leadopp_id'];
			$data['recent_task_details'] = $this->Leads_model->Recent_Task_view_page($leadopp_id);
			$data1 = $this->db->select('*')->from('tbl_schedule')->where('ticket_no ',$leadopp_id)->get()->row();
			$data['leadopp_id'] = $leadopp_id;
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Leads/ViewDetails?leadopp_id='.$data1->leadopp_id;
			$data['page_name_1'] = 'Lead-Opportunity Details';
			$data['page_name_2'] = 'Recent Task View';
			$data['sidebar']=array('menu' =>"lead_opp");
			$this->load->view('Admin/Recent_Task_view_page',$data);
			;
		} 
		else 
		{
			redirect('admin/Login');
		}
	}
	
	public function show_history_details()
	{
		if(isset($_SESSION['id']))
		{
			$history_id=$_REQUEST['history_id'];
			$this->load->model('Admin/Leads_model');
			$data['history_data']=$this->Leads_model->show_history_details($history_id);
			$this->load->view('Admin/show_history_details',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function AddNote()
	{

		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->AddNote($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function edit_note_details()
	{
		
		if(isset($_SESSION['id']))
		{
			$note_id = $this->input->post('note_id');
			$this->load->model('Admin/Leads_model');
			$data['note_details']=$this->Leads_model->get_note_details($note_id);
			$this->load->view('Admin/edit_note_view',$data);		
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Edit_note()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$data = $this->input->post();
			$this->Leads_model->Edit_note($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function delete_note()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Leads_model');
			$note_id = $this->input->post('note_id');
			$this->Leads_model->delete_note($note_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}
}
