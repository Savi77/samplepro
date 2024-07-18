
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_model extends CI_Model 
{

	public function get_expense_list()
	 {
	    $this->db->where('status',1);
	    return $this->db->get('tbl_expense_master')->result();
	}
	public function add_expense($formdata)
	{
		$formdata['status']=1;
		$this->db->insert('tbl_expense_master',$formdata);	
		echo "1"; 	
	}

	public function edit_expense($expense_id)
	{
		$this->db->where("expense_id",$expense_id);
		return $this->db->get('tbl_expense_master')->result();
	}

	public function delete_expense($expense_id)
	{
		$formdata['status']=0;
		$this->db->where("expense_id",$expense_id);
		$this->db->update('tbl_expense_master',$formdata);	
		echo "1"; 	
	}

	public function update_expense($formdata)
	{
		$this->db->where("expense_id",$formdata['expense_id']);
		$this->db->update('tbl_expense_master',$formdata);	
	}
//----------------------------------------------------------------------------
	public function get_user_expense_list()
	{
	    // $this->db->where('status',1);
	    return $this->db->get('tbl_expense_details')->result();
	}

	public function EditUserExpense($ID)
	{
	    $this->db->where('ID',$ID);
	    return $this->db->get('tbl_expense_details')->result();
	}


	public function EditExpenseDetails($REFID)
	{
		 $UserID=$_SESSION['id'];
	   return $this->db->query("
							SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
							FROM `tbl_expense_details`
							INNER JOIN tbl_expense_master 
							ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
							INNER JOIN tbl_admin_login 
							ON tbl_expense_details.`UserID`=tbl_admin_login.id

							INNER JOIN tbl_employee_expense 
							ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID

							WHERE tbl_expense_details.REFID='$REFID' and tbl_expense_details.UserID='$UserID'

	    	             ")->result();
	}


	public function EditExpenseDetailsAdmin($REFID)
	{
		 $UserID=$_SESSION['id'];
	   return $this->db->query("
							SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
							FROM `tbl_expense_details`
							INNER JOIN tbl_expense_master 
							ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
							INNER JOIN tbl_admin_login 
							ON tbl_expense_details.`UserID`=tbl_admin_login.id

							INNER JOIN tbl_employee_expense 
							ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID

							WHERE tbl_expense_details.REFID='$REFID' 

	    	             ")->result();
	}


	public function Insert_user_expense($formdata)
	{

        $Expense=array(
                        'UserID'=>$this->session->id,
                        'ExpenseTitle'=>$formdata['ExpenseTitle'],
                        'DateCreated'=>date("Y-m-d H:i:s")
                      );

        $this->db->Insert("tbl_employee_expense",$Expense);
        $REFID = $this->db->insert_id();

		$ExpenseIDArray=$formdata['ExpenseID'];
		for($i=0;$i<count($ExpenseIDArray);$i++)
		{
			if(!empty($_FILES['Document']['name'][$i]))
			{
	          $image = $_FILES['Document']['name'][$i];
	          $cur_date=date("dmyHis");
	          $sepext = explode('.', strtolower($image));
	          $extension = end($sepext);
	          $store_file =$cur_date.'_'.$i.".$extension";
	          $move_file = FCPATH.'assets/admin/expensedocuments/';
	          $move_file1 = $move_file . basename($store_file);
	          move_uploaded_file($_FILES['Document']['tmp_name'][$i], $move_file1); 
	          chmod($move_file1, 0755); 
		    }
	        else
	         {
	          	$store_file='';
	          	$image ='';
	         }

      	    $InsertArray = array( 
		       						'REFID'=>$REFID,
									'UserID'=>$this->session->id,
									'ExpenseID'=>$formdata['ExpenseID'][$i],
									'Filename'=>$image,
									'Amount'=>$formdata['Amount'][$i],
									'SDate'=>date("Y-m-d",strtotime($formdata['SDate'][$i])),
									'EDate'=>date("Y-m-d",strtotime($formdata['EDate'][$i])),
									'Remark'=>$formdata['Remark'][$i],
									'Document'=>$store_file,
									'Status'=>'Pending',
									'DateCreated'=>date("Y-m-d H:i:s")
                             );
		       // print_r($InsertArray);
		     $this->db->Insert("tbl_expense_details",$InsertArray);  
		}
	}

	public function Update_User_Expense_multiple($formdata)
	{
		$REFID=$formdata['REFID'];
		$UserID=$formdata['UserID'];

		$this->db->where("REFID",$REFID);
        $ExpenseArray=array(
                        'ExpenseTitle'=>$formdata['ExpenseTitle']
                      );
        $this->db->update('tbl_employee_expense',$ExpenseArray);
        $this->db->where("REFID",$formdata['REFID']);
        $this->db->delete('tbl_expense_details');

		$ExpenseIDArray=$formdata['ExpenseID'];
		for($i=0;$i<count($ExpenseIDArray);$i++)
		{
			if(!empty($_FILES['Document']['name'][$i]))
			{
	          $image = $_FILES['Document']['name'][$i];
	          $cur_date=date("dmyHis");
	          $sepext = explode('.', strtolower($image));
	          $extension = end($sepext);
	          $store_file =$cur_date.'_'.$i.".$extension";
	          $move_file = FCPATH.'assets/admin/expensedocuments/';
	          $move_file1 = $move_file . basename($store_file);
	          move_uploaded_file($_FILES['Document']['tmp_name'][$i], $move_file1); 
	          chmod($move_file1, 0755); 
		    }
	        else
	        {        
	          	$store_file=$formdata['StoredFile'][$i];
	          	$image ='';
	        }
      	    $InsertArray = array( 
		       						'REFID'=>$REFID,
									'UserID'=>$UserID,
									'ExpenseID'=>$formdata['ExpenseID'][$i],
									'Amount'=>$formdata['Amount'][$i],
									'SDate'=>date("Y-m-d",strtotime($formdata['SDate'][$i])),
									'EDate'=>date("Y-m-d",strtotime($formdata['EDate'][$i])),
									'Remark'=>$formdata['Remark'][$i],
									'Document'=>$store_file,
									'Filename'=>$image,
									'Status'=>'Pending',
									'DateCreated'=>date("Y-m-d H:i:s")
                             );
		     $this->db->Insert("tbl_expense_details",$InsertArray);  
		}
	}

	public function Update_User_Expense_Status($formdata)
	{
		$ExpenseIDArray=$formdata['ID'];
		for($i=0;$i<count($ExpenseIDArray);$i++)
		{
      	    $UpdateArray = array( 
								  'Status'=>$formdata['Status'][$i],
								  'AdminApprovedAmount'=>$formdata['AdminApprovedAmount'][$i],
								  'AdminRemark'=>$formdata['AdminRemark'][$i],
                                );
      	    $this->db->where("ID",$formdata['ID'][$i]);
		    $this->db->Update("tbl_expense_details",$UpdateArray);  
		}
	}


   public function AjaxData()
    {
       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
       $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
          $where .=" and  tbl_admin_login.name '".$params['search']['value']."%' ";    
        }

        $sql = " 
				SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
				FROM `tbl_expense_details`
				INNER JOIN tbl_expense_master 
				ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
				INNER JOIN tbl_admin_login 
				ON tbl_expense_details.`UserID`=tbl_admin_login.id
				INNER JOIN tbl_employee_expense 
				ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID
 				Where  1

              ";   

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_admin_login.name ".'ASC'."  LIMIT ".$params['start'].",".$params['length']." ";
        $queryTot =$this->db->query($sqlTot)->result();
        $totalRecords =count($queryTot);
        $queryRecords =$this->db->query($sqlRec)->result();
        $i=1;
        foreach ($queryRecords as $row)
        {
        	$ID=$row->ID;
        	$Status=$row->Status;
        	if($Status=='Pending')
        	{
        	  $style='display:block';
        	  $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #e8ae00;border-color: #d4af09;">'.$Status.'</span>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';	
        	}

    	    $editbuttons='<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right" style="  margin: -150px 26px 10px 0px;" >
								<li><a onclick="EditExpense(id)"; id='.$ID.'><i class="icon-database-edit2"></i> Edit Expense</a></li>
								<li><a onclick="ApproveExpense(id)"; id='.$ID.'><i class="icon-checkmark-circle"></i> Approve Expense</a></li>
								<li><a onclick="RejectExpense(id)"; id='.$ID.'><i class="icon-cancel-circle2"></i> Reject Expense</a></li>
								<li><a onclick="OnHoldExpense(id)"; id='.$ID.'><i class="icon-cancel-circle2"></i> On Hold Expense</a></li>
							</ul>
						</li>
					</ul>';

            $action=' <a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 3%;">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
						</span>
				       </a>
				       &nbsp;
                       <a onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-primary pull-right"style="padding: 6px 6px 6px 6px;margin-right: 1%;">
							<i class="icon-clippy"  data-toggle="tooltip" title="Change Expense Status" data-placement="top"></i>
						</span>
				       </a>

				       	';
           $new=array(
	                       0=>$row->expense_name,
	                       1=>$row->name.$action,
	                       2=>$row->ExpenseTitle,
	                       3=>date("d M Y",strtotime($row->SDate)),
	                       4=>date("d M Y",strtotime($row->EDate)),
	                       5=>$row->Amount,
	                       6=>$row->Remark,
	                       7=>$Status,
	                       8=>$editbuttons,
                       // 9=>$actionbuttons
                    );
             $i++;
           array_push($data, $new);
        }

        $json_data = array(
		                    "draw"            => intval( $params['draw'] ),   
		                    "recordsTotal"    => intval( $totalRecords ),  
		                    "recordsFiltered" => intval($totalRecords),
		                    "data"            => $data   // total data array
                        );
         echo json_encode($json_data);  // send data as json format
    }


   public function AdminAjaxDataDateRange()
    {

		$from_date=$_SESSION['from_date'];
		$to_date=$_SESSION['to_date'];

       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
       $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
          $where .=" and  tbl_admin_login.name '".$params['search']['value']."%' ";    
        }

        $sql = " 
				SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
				FROM `tbl_expense_details`
				INNER JOIN tbl_expense_master 
				ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
				INNER JOIN tbl_admin_login 
				ON tbl_expense_details.`UserID`=tbl_admin_login.id
				INNER JOIN tbl_employee_expense 
				ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID
 				Where  tbl_expense_details.SDate>='$from_date' and tbl_expense_details.SDate<='$to_date'  

              ";   

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_admin_login.name ".'ASC'."  LIMIT ".$params['start'].",".$params['length']." ";
        $queryTot =$this->db->query($sqlTot)->result();
        $totalRecords =count($queryTot);
        $queryRecords =$this->db->query($sqlRec)->result();
        $i=1;
        foreach ($queryRecords as $row)
        {
        	$ID=$row->ID;
        	$Status=$row->Status;
        	if($Status=='Pending')
        	{
        	  $style='display:block';
        	  $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #e8ae00;border-color: #d4af09;">'.$Status.'</span>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	    $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';	
        	}

    	    $editbuttons='<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right" style="  margin: -150px 26px 10px 0px;" >
								<li><a onclick="EditExpense(id)"; id='.$ID.'><i class="icon-database-edit2"></i> Edit Expense</a></li>
								<li><a onclick="ApproveExpense(id)"; id='.$ID.'><i class="icon-checkmark-circle"></i> Approve Expense</a></li>
								<li><a onclick="RejectExpense(id)"; id='.$ID.'><i class="icon-cancel-circle2"></i> Reject Expense</a></li>
								<li><a onclick="OnHoldExpense(id)"; id='.$ID.'><i class="icon-cancel-circle2"></i> On Hold Expense</a></li>
							</ul>
						</li>
					</ul>';

            $action=' <a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 3%;">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
						</span>
				       </a>
				       &nbsp;
                       <a onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-primary pull-right"style="padding: 6px 6px 6px 6px;margin-right: 1%;">
							<i class="icon-clippy"  data-toggle="tooltip" title="Change Expense Status" data-placement="top"></i>
						</span>
				       </a>

				       	';
           $new=array(
	                       0=>$row->expense_name,
	                       1=>$row->name.$action,
	                       2=>$row->ExpenseTitle,
	                       3=>date("d M Y",strtotime($row->SDate)),
	                       4=>date("d M Y",strtotime($row->EDate)),
	                       5=>$row->Amount,
	                       6=>$row->Remark,
	                       7=>$Status,
	                       8=>$editbuttons,
                       // 9=>$actionbuttons
                    );
             $i++;
           array_push($data, $new);
        }

        $json_data = array(
		                    "draw"            => intval( $params['draw'] ),   
		                    "recordsTotal"    => intval( $totalRecords ),  
		                    "recordsFiltered" => intval($totalRecords),
		                    "data"            => $data   // total data array
                        );
         echo json_encode($json_data);  // send data as json format
    }


   public function EmployeeAjaxDataDateRange()
    {

		$from_date=$_SESSION['from_date'];
		$to_date=$_SESSION['to_date'];

       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
       $columns = array( 
                          0 =>'LRNo',
                          1 =>'TripsheetNo', 
                          2 => 'TripCost',
                          3 => 'DriverID',
                          4 => 'DriverMobile',
                          5 => 'VehicleNo',
                          6 => 'FromLocation',
                          7 => 'ToLocation'
                     );

        $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
    		$where .=" and ( tbl_expense_details.Amount LIKE '".$params['search']['value']."%' ";    
	    	$where .=" OR tbl_expense_details.SDate LIKE '%".$params['search']['value']."%' ) ";
        }

        $sql = " 
				SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
				FROM `tbl_expense_details`
				INNER JOIN tbl_expense_master 
				ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
				INNER JOIN tbl_admin_login 
				ON tbl_expense_details.`UserID`=tbl_admin_login.id
				INNER JOIN tbl_employee_expense 
				ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID
 				Where tbl_expense_details.UserID='$id' and tbl_expense_details.SDate>='$from_date' and tbl_expense_details.SDate<='$to_date'  
              "; 

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_admin_login.name ".'ASC'."  LIMIT ".$params['start'].",".$params['length']." ";
        $queryTot =$this->db->query($sqlTot)->result();
        $totalRecords =count($queryTot);
        $queryRecords =$this->db->query($sqlRec)->result();
        $i=1;
        foreach ($queryRecords as $row)
        {
        	$ID=$row->ID;
        	$Status=$row->Status;
        	if($Status=='Pending')
        	{
        	  $style='display:block';
        	  $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #e8ae00;border-color: #d4af09;">'.$Status.'</span>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';	
        	}

            $action=' <a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 7%;">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
						</span>
				       </a>	';
        	$editbuttons='<li style='.$style.'><a onclick="EditExpense(id)"; id='.$ID.'><b><i class="icon-compose" style="    color:#157ED5; margin-left: 15%;"></i> </b></a></li>';

            $new=array(
	                       0=>$row->expense_name,
	                       1=>$row->ExpenseTitle.$action,
	                       2=>date("d M Y",strtotime($row->SDate)),
	                       3=>date("d M Y",strtotime($row->EDate)),
	                       4=>$row->Amount,
	                       5=>$Status,
	                       6=>$row->Remark,
	                       7=>$editbuttons
                        );
             $i++;
           array_push($data, $new);
        }

        unset($_SESSION['from_date']);
        unset($_SESSION['to_date']);

        $json_data = array(
		                    "draw"            => intval( $params['draw'] ),   
		                    "recordsTotal"    => intval( $totalRecords ),  
		                    "recordsFiltered" => intval($totalRecords),
		                    "data"            => $data  
                        );
         echo json_encode($json_data);  
    }











   public function EmployeeAjaxData()
    {
       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
       $columns = array( 
                          0 =>'LRNo',
                          1 =>'TripsheetNo', 
                          2 => 'TripCost',
                          3 => 'DriverID',
                          4 => 'DriverMobile',
                          5 => 'VehicleNo',
                          6 => 'FromLocation',
                          7 => 'ToLocation'
                     );

        $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
    		$where .=" and ( tbl_expense_details.Amount LIKE '".$params['search']['value']."%' ";    
	    	$where .=" OR tbl_expense_details.SDate LIKE '%".$params['search']['value']."%' ) ";
        }

        $sql = " 
				SELECT tbl_expense_details.*,tbl_expense_master.expense_name,tbl_admin_login.name,tbl_employee_expense.ExpenseTitle 
				FROM `tbl_expense_details`
				INNER JOIN tbl_expense_master 
				ON tbl_expense_details.`ExpenseID`=tbl_expense_master.expense_id
				INNER JOIN tbl_admin_login 
				ON tbl_expense_details.`UserID`=tbl_admin_login.id
				INNER JOIN tbl_employee_expense 
				ON tbl_expense_details.`REFID`=tbl_employee_expense.REFID
 				 Where  tbl_expense_details.UserID='$id'

 				 -- tbl_expense_details.UserID='$id'
              "; 

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_admin_login.name ".'ASC'."  LIMIT ".$params['start'].",".$params['length']." ";
        $queryTot =$this->db->query($sqlTot)->result();
        $totalRecords =count($queryTot);
        $queryRecords =$this->db->query($sqlRec)->result();
        $i=1;
        foreach ($queryRecords as $row)
        {
        	$ID=$row->ID;
        	$Status=$row->Status;
        	if($Status=='Pending')
        	{
        	  $style='display:block;';
        	  $Status='<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #e8ae00;border-color: #d4af09;">'.$Status.'</span>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	  $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';	
        	}

            $action=' <a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 7%;">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
						</span>
				       </a>	';
        	$editbuttons='<li style='.$style.'><a onclick="EditExpense(id)"; id='.$ID.'><b><i class="icon-compose"  style="    color:#157ED5; margin-left: 15%;"></i> </b></a></li>';

            $new=array(
	                       0=>$row->expense_name,
	                       1=>$row->ExpenseTitle.$action,
	                       2=>date("d M Y",strtotime($row->SDate)),
	                       3=>date("d M Y",strtotime($row->EDate)),
	                       4=>$row->Amount,
	                       5=>$Status,
	                       6=>$row->Remark,
	                       7=>$editbuttons
                        );
             $i++;
           array_push($data, $new);
        }

        $json_data = array(
		                    "draw"            => intval( $params['draw'] ),   
		                    "recordsTotal"    => intval( $totalRecords ),  
		                    "recordsFiltered" => intval($totalRecords),
		                    "data"            => $data  
                        );
         echo json_encode($json_data);  
    }


	public function Update_User_Expense($formdata)
	{

	      $image = $_FILES['Document']['name'];
	      if(!empty($image))
	      {
		      $cur_date=date("dmyHis");
		      $sepext = explode('.', strtolower($image));
		      $extension = end($sepext);
		      $store_file =$cur_date.".$extension";
		      $move_file = FCPATH.'assets/admin/expensedocuments/';
		      $move_file1 = $move_file . basename($store_file);
		      move_uploaded_file($_FILES['Document']['tmp_name'], $move_file1); 
		      chmod($move_file1, 0755); 
	      	  $formdata['Document']=$store_file;
	      }

	      $formdata['SDate']=date("Y-m-d",strtotime($formdata['SDate']));
	      $formdata['EDate']=date("Y-m-d",strtotime($formdata['EDate']));
	      $ID=$formdata['ID'];
		  $this->db->where("ID",$ID);
		  $this->db->update('tbl_expense_details',$formdata);	

	}

	public function Update_Expense_Status($formdata)
	{
		// print_r($formdata);
	  $ID=$formdata['ID'];
	  $this->db->where("ID",$ID);
	  $this->db->update('tbl_expense_details',$formdata);	
	}





}