<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->model('Home_model');
		$data['client_list']=$this->Home_model->client_list();
		$data['testimonial_list']=$this->Home_model->testimonial_list();
		$data['sfeature_list']=$this->Home_model->sfeature_list();
		$data['work_list']=$this->Home_model->work_list();
		$data['manyfeature_list']=$this->Home_model->manyfeature_list();
		$data['slider_list']=$this->Home_model->slider_list();
		$data['faq_list'] = $this->Home_model->faq_list();
		$data['play_store']=$this->Home_model->play_store();
		$data['creative_feature_list']=$this->Home_model->creative_feature_list();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		// ================ Get Section ===================
		$this->load->model('Admin/Testimonial_modal');
		$data['get_data_testimonial']=$this->Testimonial_modal->get_data();
		$this->load->model('Admin/Feature_model');
		$data['get_data_sfeature']=$this->Feature_model->get_data();
		$this->load->model('Admin/How_we_work_model');
		$data['get_data_work']=$this->How_we_work_model->get_data();
		$this->load->model('Admin/Many_feature_model');
		$data['get_data_mfeature']=$this->Many_feature_model->get_data();
		$this->load->model('Admin/Faq_model');
		$data['get_data_faq']=$this->Faq_model->get_data();
		$this->load->model('Admin/Link_model');
		$data['get_data_playstore']=$this->Link_model->get_data();
		$data['plan_list']=$this->Home_model->plan_list();	
		$data['get_creative_feature_title']=$this->Home_model->get_creative_feature_title();	
		$data['get_service_feature_title']=$this->Home_model->get_service_feature_title();	
		$data['whychooseus_title'] = $this->Home_model->whychooseus_title();	
		$data['subcription_title'] = $this->Home_model->subcription_title();	
		// ================ Get Section Hide/Show ===================
		$data['get_slider'] = $this->Home_model->get_slider();
		$data['get_it_services'] = $this->Home_model->get_it_services();
		$data['get_creative_features'] = $this->Home_model->get_creative_features();
		$data['get_pricing_plan'] = $this->Home_model->get_pricing_plan();
		$data['get_whychooseus_section'] = $this->Home_model->get_whychooseus_section();
     	$data['get_faq'] = $this->Home_model->get_faq();
		$data['get_testimonial'] = $this->Home_model->get_testimonial();
		$data['get_client'] = $this->Home_model->get_client();
		$data['get_newsletter'] = $this->Home_model->get_newsletter();
		$this->load->view('welcome_message',$data);
	}
	
// ===========Add contact Details===============================
   public function insert_contact_details()
	{
		// echo "123";
		$formdata=$this->input->post();
		$this->load->model('Home_model');
		$this->Home_model->insert_contact_details($formdata);
    }	

	public function Contact()
	{
		$this->load->model('Home_model');
		$data['type'] = 'contact';
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$this->load->view('contact',$data);
	}

	public function insert_email_subcription()
	{
		$email = $this->input->post('email_subcription');
		$this->load->model('Home_model');
		$this->Home_model->insert_email_subcription($email);
	}

	public function Privacy_Policy()
	{
		$this->load->model('Home_model');
		$data['getPoliciesData']=$this->Home_model->getPolicies();	
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		// $this->load->view('Privacy_Policy_View',$data);
		$this->load->view('Privacy');
	}

	public function Terms_Service()
	{
		$this->load->model('Home_model');
		$data['getPoliciesData']=$this->Home_model->getPolicies();	
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$this->load->view('Terms_Service_View',$data);
	}

	public function Refund_Cancellation()
	{
		$this->load->model('Home_model');
		$data['getPoliciesData']=$this->Home_model->getPolicies();	
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$this->load->view('Refund_Cancellation_View',$data);
	}

	public function Case_Studies()
	{
		$this->load->model('Home_model');
		$CaseStudiesId = $_GET['id'];
		$data['Case_Studies_Data'] = $this->Home_model->getCaseStudiesData($CaseStudiesId);	
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$this->load->view('case_studies',$data);
	}
	public function FaqList()
	{
		$this->load->model('Home_model');
		$this->load->model('Admin/Faq_model');
		$data['getFaqList']=$this->Home_model->FaqList();	
		$data['get_data_faq']=$this->Faq_model->get_data();
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$this->load->view('faq_list_view',$data);
	}
	public function ServiceDetail()
	{
		$this->load->model('Home_model');
		$id = $_GET['id'];
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['getServiceDetail'] = $this->Home_model->ServiceDetail($id);	
		// var_dump($data['getServiceDetail']);
		// exit;
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		$this->load->view('service_detail_view',$data);
	}
	public function AboutUs()
	{
		$this->load->model('Home_model');
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$data['About_details'] = $this->Home_model->About_Details_Data();
		
		$this->load->view('aboutus_detail_view',$data);
	}

	public function SetTrialDays()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Policies_Model');
			$data['Privacy_Policy_Data']=$this->Policies_Model->PrivacyPolicyData();
			$data['sidebar']=array('menu' =>"Set_Trial_Days"); 
			$this->load->view('set_trialdays_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
		
	}
	public function InsertTrialDays()
	{
		$data=$this->input->post();
		$formdata = $data['setTrial'];
		$this->load->model('Home_model');
		$result = $this->Home_model->insert_trail_days($formdata);
        
		if(!empty($result))
		{
			echo "<script>alert('Sucesssfully Updates Trail Days')</script>";
			redirect('Home/SetTrialDays');

		}
		else
		{
			echo "<script>alert('Something Went Wrong')</script>";
			redirect('Home/SetTrialDays');

		}

	}
}
