
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_model extends CI_Model 
{

	public function get_expense_list()
	 {
		$this->db->where('org_id',$this->session->org_id);
		$this->db->where('delete_status',0);
		$this->db->order_by('expense_id','desc');		
	    return $this->db->get('tbl_expense_master')->result();
	}
	public function add_expense($formdata)
	{
		$formdata['status']=1;
		$formdata['delete_status']=0;
		$formdata['org_id']=$this->session->org_id;
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
		$formdata['delete_status']=1;
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
	    $this->db->where('org_id',$this->session->org_id);
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
							ORDER BY tbl_expense_details.ID DESC

	    	             ")->result();
	}


	public function Insert_user_expense($formdata)
	{

        $Expense=array(
                        'UserID'=>$this->session->id,
                        'org_id'=>$this->session->org_id,
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
		       						'org_id'=>$this->session->org_id,
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

		// print_r($formdata);

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
		       						'org_id'=>$this->session->org_id,
									'UserID'=>$UserID,
									'ExpenseID'=>$formdata['ExpenseID'][$i],
									'Amount'=>$formdata['Amount'][$i],
									'SDate'=>date("Y-m-d",strtotime($formdata['SDate'][$i])),
									'EDate'=>date("Y-m-d",strtotime($formdata['EDate'][$i])),
									'Remark'=>$formdata['Remark'][$i],
									'Document'=>$store_file,
									'Filename'=>$image,
									'Status'=>$formdata['Status'][$i],
									'DateCreated'=>date("Y-m-d H:i:s")
                             );

      	    print_r($InsertArray);
		     $this->db->Insert("tbl_expense_details",$InsertArray);  
		}
	}

	public function Update_User_Expense_Status($formdata)
	{
		$ExpenseIDArray=$formdata['ID'];
		for($i=0;$i<count($ExpenseIDArray);$i++)
		{
			if($formdata['Status'][$i]=='Approved')
			{
	      	    $UpdateArray = array( 
									  'Status'=>$formdata['Status'][$i],
									  'approved_on'=>date('Y-m-d H:i:s'),
									  'approved_by'=>$this->session->id,
									  'AdminApprovedAmount'=>$formdata['AdminApprovedAmount'][$i],
									  'AdminRemark'=>$formdata['AdminRemark'][$i],
	                                );
			}
			else if($formdata['Status'][$i]=='Rejected')
			{
	      	    $UpdateArray = array( 
									  'Status'=>$formdata['Status'][$i],
									  'rejected_on'=>date('Y-m-d H:i:s'),
									  'rejected_by'=>$this->session->id,
									  'AdminApprovedAmount'=>$formdata['AdminApprovedAmount'][$i],
									  'AdminRemark'=>$formdata['AdminRemark'][$i],
	                                );
			}
			else
			{
      	      $UpdateArray = array( 
								  'Status'=>$formdata['Status'][$i],
								  'AdminApprovedAmount'=>$formdata['AdminApprovedAmount'][$i],
								  'AdminRemark'=>$formdata['AdminRemark'][$i],
                                );				
			}
      	    $this->db->where("ID",$formdata['ID'][$i]);
		    $this->db->Update("tbl_expense_details",$UpdateArray);  
		}
	}


   public function AjaxData($formdata)
    {
	   
       $org_id=$this->session->org_id;	 
       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
	   
	   $from_date_get=$_SESSION['from_date'];
	   $to_date_get=$_SESSION['to_date'];
	   if($from_date_get == '')
	   {
		   $from_date=date('Y-m-d');
	   }
	   else
	   {
		   $from_date = $from_date_get;
	   }
	   if($to_date_get == '')
	   {
		   $to_date = date('Y-m-d');
	   }
	   else
	   {
		   $to_date = $to_date_get;
	   }

	
       $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
          $where .=" and  tbl_admin_login.name LIKE'%".$params['search']['value']."%'";    
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
 				Where  
				 tbl_expense_details.SDate>='$from_date' and tbl_expense_details.EDate<='$to_date' and tbl_expense_details.org_id='$org_id'";   

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_expense_details.ID ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
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
        	  $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >Pending</button>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Approved</button>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">On Hold</button>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Rejected</button>';	
        	}

    	    $editbuttons='
			
				<div style="width:150px;">
					<ul class="pull-right dflex Padding-0 m-auto text-black">
						<li>  
							<div>
								<div class="panel-button">
									<a class="list-icons-item" title="Select Action" rel="tooltip">
										<i class="icon-menu9" style="cursor:pointer;"></i>
									</a>
								</div>
								
								<div class="my-popover-content" style="display:none">
									<ul>
										<li>
											<a onclick="EditExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-green"></span> Edit Expense  
											</a>
										</li>
										<li>
											<a onclick="ApproveExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-yellow"></span> Approve Expense  
											</a>
										</li>
										<li>
											<a onclick="RejectExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-red"></span> Reject Expense  
											</a>
										</li>
										<li>
											<a onclick="OnHoldExpense(id)"; id='.$ID. ' style="color:#333333;">
												<span class="status-mark position-left dot dot-blue"></span> On Hold Expense  
											</a>
										</li>
									</ul>
								</div>
							</div> 

						</li>
					</ul>
				</div>';

				// <div class="list-icons">
				// 	<div class="dropdown">
				// 		<a href="#" class="list-icons-item" data-toggle="dropdown">
				// 			<i class="icon-menu9"></i>
				// 		</a>

				// 		<div class="dropdown-menu dropdown-menu-right">
				// 			<a onclick="EditExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-database-edit2"></i>Edit Expence</a>
				// 			<a onclick="ApproveExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-checkmark-circle"></i>Approve Expence</a>
				// 			<a onclick="RejectExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-cancel-circle2"></i> Reject Expence</a>
				// 			<a onclick="OnHoldExpense(id)"; id='.$ID. ' class="dropdown-item"><i class="icon-cancel-circle2"></i>Onhold Expence</a>
				// 		</div>
				// 	</div>
				// </div>

		

            $action=' 
					<div style="display:flex;column-gap:30px;" >	
						<div style="display: flex;justify-content: center;align-items: center;">
							<a class"cursor-pointer" onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
							<span class="label pull-right exp-btn">
								<i class="icon-pencil5" title="Edit Expense" rel="tooltip" data-placement="top"></i>
							</span>
							</a>
							<a class"cursor-pointer" onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'"> 
							<span class="label pull-right exp-btn">
								<i class="icon-clippy" title="Change Expense Status" rel="tooltip" data-placement="top"></i>
							</span>
							</a>
						</div>
						<div class="text-wrap-col" style="width:165px;"><b>'.$row->name.'</b><br>'.$row->ExpenseTitle.'</div>
					</div>';
						
				// 	<ul class="pull-right dflex Padding-0 m-auto text-black">
				// 	<li>  
				// 		<div>
				// 			<div class="panel-button">
				// 				<a class="list-icons-item title="Select Action" rel="tooltip">
				// 					<i class="icon-user-tie" style="cursor:pointer;"></i>
				// 				</a>
				// 			</div>
							
				// 			<div class="my-popover-content" style="display:none">
				// 				<ul>
				// 					<li>
				// 						<a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'" style="color:#333333;">
				// 							<span class="status-mark position-left dot dot-green"></span> Edit Expence  
				// 						</a>
				// 					</li>
				// 					<li>
				// 						<a onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'" style="color:#333333;">
				// 							<span class="status-mark position-left dot dot-yellow"></span> Change Expense Status 
				// 						</a>
				// 					</li>
								
				// 				</ul>
				// 			</div>
				// 		</div> 

				// 	</li>
				// </ul>
			
					$Expense_name = '<div style="width: 250px;padding-left: 87px;" class="text-wrap-col">'.$row->expense_name.'</div>';
					$start_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->SDate)).'</div>';
					$end_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->EDate)).'</div>';
					$amount = '<div style="width: 150px;">'.$row->Amount.'</div>';
					$remark = '<div style="width: 150px;" class="text-wrap-col">'.$row->Remark.'</div>';
					$status = '<div style="width: 150px;">'.$Status.'</div>';
				
			
	
			;
           	$new=array(
				0=>$Expense_name,
				1=>$action,
				2=>$row->ExpenseTitle,
				3=>$start_date,
				4=>$end_date,
				5=>$amount,
				6=>$remark,
				7=>$status,
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
		// unset($_SESSION['from_date']);
        // unset($_SESSION['to_date']);
		echo json_encode($json_data);  // send data as json format
    }
    
	public function AjaxData_default()
    {
	   
       $org_id=$this->session->org_id;	 
       $user_type=$this->session->user_type;
       $id=$this->session->id;
       $params = $columns = $totalRecords = $data = array();
       $params = $_REQUEST;
	   
	//    r
	   if($from_date_get == '')
	   {
		   $from_date=date('Y-m-d');
	   }
	   else
	   {
		   $from_date = $from_date_get;
	   }
	   if($to_date_get == '')
	   {
		   $to_date = date('Y-m-d');
	   }
	   else
	   {
		   $to_date = $to_date_get;
	   }

	
       $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
          $where .=" and  tbl_admin_login.name LIKE'%".$params['search']['value']."%'";    
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
 				Where  
				 tbl_expense_details.SDate>='$from_date' and tbl_expense_details.EDate<='$to_date' and tbl_expense_details.org_id='$org_id'";   

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }
        $sqlRec .=" ORDER BY tbl_expense_details.ID ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";
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
        	  $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >Pending</button>';
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Approved</button>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">On Hold</button>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
        	    $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Rejected</button>';	
        	}

    	    $editbuttons='
			
				<div style="width:150px;">
					<ul class="pull-right dflex Padding-0 m-auto text-black">
						<li>  
							<div>
								<div class="panel-button">
									<a class="list-icons-item" title="Select Action" rel="tooltip">
										<i class="icon-menu9" style="cursor:pointer;"></i>
									</a>
								</div>
								
								<div class="my-popover-content" style="display:none">
									<ul>
										<li>
											<a onclick="EditExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-green"></span> Edit Expense  
											</a>
										</li>
										<li>
											<a onclick="ApproveExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-yellow"></span> Approve Expense  
											</a>
										</li>
										<li>
											<a onclick="RejectExpense(id)"; id='.$ID.' style="color:#333333;">
												<span class="status-mark position-left dot dot-red"></span> Reject Expense  
											</a>
										</li>
										<li>
											<a onclick="OnHoldExpense(id)"; id='.$ID. ' style="color:#333333;">
												<span class="status-mark position-left dot dot-blue"></span> On Hold Expense  
											</a>
										</li>
									</ul>
								</div>
							</div> 

						</li>
					</ul>
				</div>';

				// <div class="list-icons">
				// 	<div class="dropdown">
				// 		<a href="#" class="list-icons-item" data-toggle="dropdown">
				// 			<i class="icon-menu9"></i>
				// 		</a>

				// 		<div class="dropdown-menu dropdown-menu-right">
				// 			<a onclick="EditExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-database-edit2"></i>Edit Expence</a>
				// 			<a onclick="ApproveExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-checkmark-circle"></i>Approve Expence</a>
				// 			<a onclick="RejectExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-cancel-circle2"></i> Reject Expence</a>
				// 			<a onclick="OnHoldExpense(id)"; id='.$ID. ' class="dropdown-item"><i class="icon-cancel-circle2"></i>Onhold Expence</a>
				// 		</div>
				// 	</div>
				// </div>

		

            $action=' 
					<div style="display:flex;column-gap:30px;" >	
						<div style="display: flex;justify-content: center;align-items: center;">
							<a class"cursor-pointer" onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
							<span class="label pull-right exp-btn">
								<i class="icon-pencil5" title="Edit Expense" rel="tooltip" data-placement="top"></i>
							</span>
							</a>
							<a class"cursor-pointer" onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'"> 
							<span class="label pull-right exp-btn">
								<i class="icon-clippy" title="Change Expense Status" rel="tooltip" data-placement="top"></i>
							</span>
							</a>
						</div>
						<div class="text-wrap-col" style="width:165px;"><b>'.$row->name.'</b><br>'.$row->ExpenseTitle.'</div>
					</div>';
						
				// 	<ul class="pull-right dflex Padding-0 m-auto text-black">
				// 	<li>  
				// 		<div>
				// 			<div class="panel-button">
				// 				<a class="list-icons-item title="Select Action" rel="tooltip">
				// 					<i class="icon-user-tie" style="cursor:pointer;"></i>
				// 				</a>
				// 			</div>
							
				// 			<div class="my-popover-content" style="display:none">
				// 				<ul>
				// 					<li>
				// 						<a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'" style="color:#333333;">
				// 							<span class="status-mark position-left dot dot-green"></span> Edit Expence  
				// 						</a>
				// 					</li>
				// 					<li>
				// 						<a onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'" style="color:#333333;">
				// 							<span class="status-mark position-left dot dot-yellow"></span> Change Expense Status 
				// 						</a>
				// 					</li>
								
				// 				</ul>
				// 			</div>
				// 		</div> 

				// 	</li>
				// </ul>
			
					$Expense_name = '<div style="width: 250px;padding-left: 87px;" class="text-wrap-col">'.$row->expense_name.'</div>';
					$start_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->SDate)).'</div>';
					$end_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->EDate)).'</div>';
					$amount = '<div style="width: 150px;">'.$row->Amount.'</div>';
					$remark = '<div style="width: 150px;" class="text-wrap-col">'.$row->Remark.'</div>';
					$status = '<div style="width: 150px;">'.$Status.'</div>';
				
			
	
			;
           	$new=array(
				0=>$Expense_name,
				1=>$action,
				2=>$row->ExpenseTitle,
				3=>$start_date,
				4=>$end_date,
				5=>$amount,
				6=>$remark,
				7=>$status,
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
		// unset($_SESSION['from_date']);
        // unset($_SESSION['to_date']);
		echo json_encode($json_data);  // send data as json format
    }

   public function AdminAjaxDataDateRange()
	{
		$org_id=$this->session->org_id;
		$from_date_get=$_SESSION['from_date'];
		$to_date_get=$_SESSION['to_date'];
		// date("Y-m-d", strtotime($start_date1))
		// $from_date=date("Y-m-d");
		// $to_date=date("Y-m-d");
		if($from_date_get == '')
		{
			$from_date=date('Y-m-d');
		}
		else
		{
			$from_date = $_SESSION['from_date'];
		}
		if($to_date_get == '')
		{
			$to_date = date('Y-m-d');
		}
		else
		{
			$to_date = $_SESSION['to_date'];
		}
		
		$user_type=$this->session->user_type;
		$id=$this->session->id;
		$params = $columns = $totalRecords = $data = array();
		$params = $_REQUEST;
		$where = $sqlTot = $sqlRec = "";
		// check search value existfrom_date
		if( !empty($params['search']['value']) ) 
		{   
			$where .=" and  tbl_admin_login.name LIKE '%".$params['search']['value']."%' ";    
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
				Where tbl_expense_details.SDate>='$from_date' and tbl_expense_details.SDate<='$to_date' and tbl_expense_details.org_id='$org_id'";   

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
				$Status='<button type="button" class="red-btn">Pending</button>';
			}
			else if($Status=='Approved')
			{
				$style='display:none';
				$Status='<button type="button" class="green-btn">Approved</button>';	
			}
			else if($Status=='On Hold')
			{
				$style='display:none';
				$Status='<button type="button" class="green-btn">Onhold</button>';	
			}
			else if($Status=='Rejected')
			{
				$style='display:none';
				$Status='<button type="button" class="red-btn">Rejected</button>';	
			}

			$editbuttons='<div class="list-icons">
				<div class="dropdown">
					<a href="#" class="list-icons-item" data-toggle="dropdown">
						<i class="icon-menu9"></i>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a onclick="EditExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-database-edit2"></i>Edit Expence</a>
						<a onclick="ApproveExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-checkmark-circle"></i>Approve Expence1</a>
						<a onclick="RejectExpense(id)"; id='.$ID.' class="dropdown-item"><i class="icon-cancel-circle2"></i> Reject Expence</a>
						<a onclick="OnHoldExpense(id)"; id='.$ID. ' class="dropdown-item"><i class="icon-cancel-circle2"></i>Onhold Expence</a>
					</div>
				</div>
			</div>';

			$action=' <a class"cursor-pointer" onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label pull-right exp-btn">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense123" data-placement="top"></i>
						</span>
						</a>
						&nbsp;
						<a class"cursor-pointer" onclick="ExpenseChangeStatus(this.id)" id="'.$row->REFID.'"> 
						<span class="label pull-right exp-btn">
							<i class="icon-clippy"  data-toggle="tooltip" title="Change Expense Status123" data-placement="top"></i>
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
							"data"            => $data  // total data array
						);
			echo json_encode($json_data);  // send data as json format
	}


   public function EmployeeAjaxDataDateRange()
    {
	   $from_date_get=$_SESSION['from_date'];
	   $to_date_get=$_SESSION['to_date'];
	   
	   if($from_date_get == '')
	   {
		   $from_date=date('Y-m-d');
	   }
	   else
	   {
		   $from_date = $_SESSION['from_date'];
	   }
	   if($to_date_get == '')
	   {
		   $to_date = date('Y-m-d');
	   }
	   else
	   {
		   $to_date = $_SESSION['to_date'];
	   }
	//    $from_date=date('Y-m-d');
	//    $to_date=date('Y-m-d');
		
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
 				Where tbl_expense_details.UserID='$id' and tbl_expense_details.SDate>='$from_date' and tbl_expense_details.EDate<='$to_date'  
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
        	  $Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >Pending</button>';
			//   <span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">'.$Status.'</span>
        	}
        	else if($Status=='Approved')
        	{
        		$style='display:none';
				$Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >Approved</button>';
        	  $Status='<span class="label bg-success" style="line-height: 20px;">'.$Status.'</span>';	
        	}
        	else if($Status=='On Hold')
        	{
        		$style='display:none';
				$Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >On Hold</button>';
        	//   $Status='<span class="label bg-warning" style="line-height: 20px;background-color: #e8ae00;border-color: #d4af09;">'.$Status.'</span>';	
        	}
        	else if($Status=='Rejected')
        	{
        		$style='display:none';
				$Status='<button type="button" style="cursor:auto;width: 100px;background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;" >Rejected</button>';
        	//   $Status='<span class="label bg-danger" style="line-height: 20px;">'.$Status.'</span>';	
        	}

            $action=' 
					<div style="display:flex;column-gap:30px;" >	
						<div style="display: flex;justify-content: center;align-items: center;">
							<a class"cursor-pointer" onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
							<span class="label pull-right exp-btn">
								<i class="icon-pencil5" title="Edit Expense" rel="tooltip" data-placement="top"></i>
							</span>
						</div>
						<div class="text-wrap-col" style="width:190px;"><b>'.$row->name.'</b><br>'.$row->ExpenseTitle.'</div>
					</div>';
					
					//    <a onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
					//    <span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 7%;">
					// 	   <i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
					//    </span>
					//   </a>	

					   


        	$editbuttons='
					<div style="width:150px;">
						<ul class="pull-right dflex Padding-0 m-auto text-black">
							<li>  
								<div>
									<div class="panel-button">
										<a class="list-icons-item" title="Select Action" rel="tooltip">
											<i class="icon-menu9" style="cursor:pointer;"></i>
										</a>
									</div>
									
									<div class="my-popover-content" style="display:none">
										<ul>
											<li>
												<a onclick="EditExpense(id)"; id='.$ID.' style="color:#333333;">
													<span class="status-mark position-left dot dot-green"></span> Edit Expense  
												</a>
											</li>
										</ul>
									</div>
								</div> 

							</li>
						</ul>
					</div>';


					// <li style='.$style.'><a onclick="EditExpense(id)"; id='.$ID.'><b><i class="icon-compose" style="    color:#157ED5; margin-left: 15%;"></i> </b></a></li>


			$Expense_name = '<div style="width: 250px;padding-left: 58px " class="text-wrap-col">'.$row->expense_name.'</div>';
			$start_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->SDate)).'</div>';
			$end_date = '<div style="width: 150px;">'.date("d M Y",strtotime($row->EDate)).'</div>';
			$amount = '<div style="width: 150px;">'.$row->Amount.'</div>';
			$remark = '<div style="width: 150px;" class="text-wrap-col">'.$row->Remark.'</div>';
			$status = '<div style="width: 150px;">'.$Status.'</div>';


            // $new=array(
	        //                0=>$row->expense_name,
	        //                1=>$row->ExpenseTitle.$action,
	        //                2=>date("d M Y",strtotime($row->SDate)),
	        //                3=>date("d M Y",strtotime($row->EDate)),
	        //                4=>$row->Amount,
	        //                5=>$Status,
	        //                6=>$row->Remark,
	        //                7=>$editbuttons
            //             );


			$new=array(
				0=>$Expense_name,
				1=>$action,
				2=>$row->ExpenseTitle,
				3=>$start_date,
				4=>$end_date,
				5=>$amount,
				6=>$remark,
				7=>$status,
				8=>$editbuttons,
				// 9=>$actionbuttons
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

   public function EmployeeAjaxData($permission_array)
    {
		$this->load->model('Admin/Dashboard_model');		
		$user_permission=$this->Dashboard_model->get_user_permission($permission_array);
        $EditClass='style="display:block";';

      foreach ($user_permission as $priviledge) 
      {
         $priviledge_key=$priviledge->priviledge_key;
         $status=$priviledge->status;

         if ($priviledge_key=='EDIT')
         {
          // echo 11;
            if($status==1)
            {
              $EditClass=' style="display:block"; ';
            } 
            else
            {
               $EditClass=' style="display:none"; ';   
            }
         }   
     }


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

            $action=' <a '.$EditClass.' onclick="EditExpenseDetails(this.id)" id="'.$row->REFID.'"> 
						<span class="label bg-success pull-right"style="padding: 6px 6px 6px 6px;margin-right: 7%;">
							<i class="icon-pencil5"  data-toggle="tooltip" title="Edit Expense" data-placement="top"></i>
						</span>
				       </a>	';

					//    <div style="width:150px;">
					// 		<ul class="pull-right dflex Padding-0 m-auto text-black">
					// 			<li>  
					// 				<div>
					// 					<div class="panel-button">
					// 						<a class="list-icons-item" title="Select Action" rel="tooltip">
					// 							<i class="icon-menu9" style="cursor:pointer;"></i>
					// 						</a>
					// 					</div>
										
					// 					<div class="my-popover-content" style="display:none">
					// 						<ul>
					// 							<li>
					// 								<a onclick="EditExpense(id)"; id='.$ID.' style="color:#333333;">
					// 									<span class="status-mark position-left dot dot-green"></span> Edit Expense  
					// 								</a>
					// 							</li>
					// 							<li>
					// 								<a onclick="ApproveExpense(id)"; id='.$ID.' style="color:#333333;">
					// 									<span class="status-mark position-left dot dot-yellow"></span> Approve Expense  
					// 								</a>
					// 							</li>
					// 							<li>
					// 								<a onclick="RejectExpense(id)"; id='.$ID.' style="color:#333333;">
					// 									<span class="status-mark position-left dot dot-red"></span> Reject Expense  
					// 								</a>
					// 							</li>
					// 							<li>
					// 								<a onclick="OnHoldExpense(id)"; id='.$ID. ' style="color:#333333;">
					// 									<span class="status-mark position-left dot dot-blue"></span> On Hold Expense  
					// 								</a>
					// 							</li>
					// 						</ul>
					// 					</div>
					// 				</div> 

					// 			</li>
					// 		</ul>
					// 	</div>'






        	$editbuttons='<li style='.$style.'><a '.$EditClass.' onclick="EditExpense(id)"; id='.$ID.'><b><i class="icon-compose"  style="    color:#157ED5; margin-left: 15%;"></i> </b></a></li>';

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

	public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('expense_id',$id);
       $this->db->update('tbl_expense_master');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('expense_id',$id);
        $this->db->update('tbl_expense_master');
    }




}