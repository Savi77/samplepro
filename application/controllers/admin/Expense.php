
<?php
 error_reporting(0);
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
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Expenses';
			$data['sidebar']=array('menu' =>"Master");
			// $this->load->view('Admin/ExpenseView',$data);
			$this->load->view('Admin/NewExpenseView',$data);
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

	public function get_expenselist()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Expense_model');
			$data['sidebar']=array('menu' =>"Expense"); 
			$data['get_businessdata']=$this->Expense_model->get_expense_list();
			//$data['user_permission']= $this->GetPermisstionMaster();
			$this->load->view('Admin/ExpenseView',$data);
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

			// User Permission Functionality -------------------------------------------------------------------------
			// module_id = 1, feature id = 5 for expense management , Privilegeids for expense management= 1,2,3,4
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>5);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
			//--------------------------------------------------------------------------------------------------------
			$data['type'] = 's_link';
			$data['page_name'] = 'Expense';
			$data['sidebar']=array('menu' =>"UserExpense"); 
			if($user_type=='SA')
			{
            //   $this->load->view('Admin/AdminExpenseView',$data);
			  $this->load->view('Admin/NewAdminExpenseView',$data);
			}
			else
			{
				$this->load->view('Admin/NewEmployeeExpenseView',$data);	
			  	// $this->load->view('Admin/EmployeeExpenseView',$data);
			}
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function AjaxData()
	{
		$formdata = $this->input->post();
	    $this->Expense_model->AjaxData($formdata);
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
		// $json_data = array(
		// 	"from_date"  => $_SESSION['from_date'],   
		// 	"to_date"    => $_SESSION['to_date']
		// );
		// echo($json_data);  
	}

	public function AjaxData_default()
	{
		$this->Expense_model->AjaxData_default();

	}
		


	public function EmployeeAjaxData()
	{
	  // User Permission Functionality ------------
	  // module_id = 1, feature id = 5 for expense management , Privilegeids for expense management= 1,2,3,4
	  $permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>5);	  
      $this->Expense_model->EmployeeAjaxData($permission_array);
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

	public function deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['expenseid'];
			$this->load->model('Admin/Expense_model');
			$data=$this->Expense_model->deactivate2($id);
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
		    $id=$_REQUEST['expenseid'];
			$this->load->model('Admin/Expense_model');
			$data=$this->Expense_model->activate2($id);
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