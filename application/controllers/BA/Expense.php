
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller
 {
 	
  	public function __construct() 
     {
        parent::__construct();
        $this->load->model('Admin/Expense_model');
     }
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$data['sidebar']=array('menu' =>"Expense");
			$data['MasterArray']=$this->Expense_model->get_expense_list();	
			// print_r($data['MasterArray']);
			$this->load->view('Admin/ExpenseView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}
	public function add_expense()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->add_expense($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function edit_expense()
	{
		if(isset($_SESSION['id']))
		{
			$expense_id=$this->input->post('expense_id');
			$data['EditArray']=$this->Expense_model->edit_expense($expense_id);
			$this->load->view('Admin/EditExpenseView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function update_expense()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->update_expense($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function delete_expense()
	{
		if(isset($_SESSION['id']))
		{
			$expense_id=$this->input->post('expense_id');
			$data['EditArray']=$this->Expense_model->delete_expense($expense_id);
			$this->load->view('Admin/EditExpenseView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

//-----------------------------------------------------------------------

	public function UserExpense()
	{
		if(isset($_SESSION['id']))
		{
			$user_type=$_SESSION['user_type'];
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"UserExpense");
			$data['ExpenseMasterArray']=$this->Expense_model->get_expense_list();	

			if($user_type=='SA')
			{
              $this->load->view('Admin/AdminExpenseView',$data);
			}
			else
			{
			  $this->load->view('Admin/EmployeeExpenseView',$data);	
			}
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function AjaxData()
	{
	   $this->Expense_model->AjaxData();
	}

	public function SetSession()
	{
        unset($_SESSION['from_date']);
        unset($_SESSION['to_date']);
        
	    $formdata=$this->input->post();
	 	$start_date1 = str_replace(',', ' ', $formdata['start_date']);
   		$end_date1 = str_replace(',', ' ', $formdata['end_date']);
		$from_date = date("Y-m-d", strtotime($start_date1));
		$to_date = date("Y-m-d", strtotime($end_date1));
		$_SESSION['from_date']=$from_date;
		$_SESSION['to_date']=$to_date;
	}


	public function EmployeeAjaxData()
	{
	   $this->Expense_model->EmployeeAjaxData();
	}


	public function EmployeeAjaxDataDateRange()
	{
	   $this->Expense_model->EmployeeAjaxDataDateRange();
	}

	public function AdminAjaxDataDateRange()
	{
	   $this->Expense_model->AdminAjaxDataDateRange();
	}


	public function Add_user_expense()
	{
		if(isset($_SESSION['id']))
		{
			$expense_id=$this->input->post('expense_id');
			$data['EditArray']=$this->Expense_model->delete_expense($expense_id);
			$this->load->view('Admin/EditExpenseView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function Insert_user_expense()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->Insert_user_expense($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function EditExpenseDetails()
	{
		if(isset($_SESSION['id']))
		{
			$REFID=$this->input->post('REFID');
			$data['EditArray']=$this->Expense_model->EditExpenseDetails($REFID);

			$data['ExpenseMasterArray']=$this->Expense_model->get_expense_list();	
			$this->load->view('Admin/EditExpenseDetailsView',$data);
    	}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function EditExpenseDetailsAdmin()
	{
		if(isset($_SESSION['id']))
		{
			$REFID=$this->input->post('REFID');
			$data['EditArray']=$this->Expense_model->EditExpenseDetailsAdmin($REFID);
			$data['ExpenseMasterArray']=$this->Expense_model->get_expense_list();	
			$this->load->view('Admin/EditExpenseDetailsView',$data);
    	}
		else
		{
		   redirect('admin/Login');
		}
	}


	public function ExpenseChangeStatus()
	{
		if(isset($_SESSION['id']))
		{
			$REFID=$this->input->post('REFID');
			$data['EditArray']=$this->Expense_model->EditExpenseDetailsAdmin($REFID);
			$data['ExpenseMasterArray']=$this->Expense_model->get_expense_list();	
			$this->load->view('Admin/ExpenseChangeStatusView',$data);
    	}
		else
		{
		   redirect('admin/Login');
		}
	}



	public function EditUserExpense()
	{
		if(isset($_SESSION['id']))
		{
			$ID=$this->input->post('ID');
			$data['EditArray']=$this->Expense_model->EditUserExpense($ID);
			$data['ExpenseMasterArray']=$this->Expense_model->get_expense_list();	
			$this->load->view('Admin/EditUserExpenseView',$data);
    	}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function Update_User_Expense()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->Update_User_Expense($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function Update_User_Expense_multiple()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->Update_User_Expense_multiple($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function Update_User_Expense_Status()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			// print_r($formdata);
			$this->Expense_model->Update_User_Expense_Status($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}


	public function ChangeExpenseStatus()
	{
		if(isset($_SESSION['id']))
		{
			$ID=$this->input->post('ID');
			$data['StatusArray']=$this->Expense_model->EditUserExpense($ID);
			$this->load->view('Admin/ChangeExpenseStatusView',$data);
    	}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function Update_Expense_Status()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Expense_model->Update_Expense_Status($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}




}