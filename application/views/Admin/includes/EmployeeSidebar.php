
<?php
	$menu=$sidebar['menu']; 
	$plan_id=$this->session->plan_id;
	$module_ids=$this->session->module_ids;
	$module_ids_array=explode(",", $module_ids);
	
	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',30);
	$permissionMail = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',2);
	$permissionProduct = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',1);
	$permissionContact = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',2);
	$this->db->where('feature_id',9);
	$permissionLead = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',8);
	$permissionTarget = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',5);
	$permissionExpense = $this->db->get("tbl_module_permission")->result();
	
	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',3);
	$permissionActivity = $this->db->get("tbl_module_permission")->result();
	
	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',3);
	$this->db->where('feature_id',12);
	$permissionOrder = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',28);
	$permissionContactsReport = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',1);
	$this->db->where('feature_id',29);
	$permissionEmployeeReport = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',2);
	$this->db->where('feature_id',33);
	$permissionCRMReport = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id',$_SESSION['id']);
	$this->db->where('module_id',4);
	$this->db->where('feature_id',31);
	$permissionTracking = $this->db->get("tbl_module_permission")->result();
	
	$ClassKey='style="display:block";';
	$ViewClassMail='style="display:block";';
	$ViewClassProduct='style="display:block";';
	$ViewClassContact='style="display:block";';
	$ViewClassCRM='display:block';
	$ViewClassLead='display:block';
	$ViewClassTarget='display:block';
	$ViewClassExpense='style="display:block";';
	$ViewClassActivity='style="display:block";';
	$ViewTrashActivityClass='style="display:block";';
	$ViewClassOrder='style="display:block";';
	$ViewClassContactsReport='display:block';
	$ViewClassEmployeeReport='display:block';
	$ViewClassCRMReport='display:block';
	$ViewClassReport='display:block';
	$ViewClassTracking='style="display:block";';

	foreach ($permissionMail as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassMail=' style="display:block"; ';
			} 
			else
			{
				$ViewClassMail=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionProduct as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassProduct=' style="display:block"; ';
			} 
			else
			{
				$ViewClassProduct=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionContact as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassContact=' style="display:block"; ';
			} 
			else
			{
				$ViewClassContact=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionLead as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassLead='display:block';
			} 
			else
			{
				$ViewClassLead='display:none';   
			}
		} 
	}
	foreach ($permissionTarget as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassTarget='display:block';
			} 
			else
			{
				$ViewClassTarget='display:none';   
			}
		} 
	}
	if ($ViewClassLead == 'display:block' || $ViewClassTarget == 'display:block') {
		$ViewClassCRM = 'display:block';
	}else {
		$ViewClassCRM='display:none';
	}
	
	foreach ($permissionExpense as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassExpense=' style="display:block"; ';
			} 
			else
			{
				$ViewClassExpense=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionActivity as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassActivity=' style="display:block"; ';
			} 
			else
			{
				$ViewClassActivity=' style="display:none"; ';   
			}
		} 

		if ($priviledge_key=='VIEWTRASHACTIVITIES')
		{
			if($status==1)
			{
				$ViewTrashActivityClass=' style="display:block"; ';
			} 
			else
			{
				$ViewTrashActivityClass=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionOrder as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassOrder=' style="display:block"; ';
			} 
			else
			{
				$ViewClassOrder=' style="display:none"; ';   
			}
		} 
	}
	foreach ($permissionContactsReport as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassContactsReport='display:block';
			} 
			else
			{
				$ViewClassContactsReport='display:none';   
			}
		} 
	}
	foreach ($permissionEmployeeReport as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassEmployeeReport='display:block';
			} 
			else
			{
				$ViewClassEmployeeReport='display:none';   
			}
		} 
	}
	foreach ($permissionCRMReport as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassCRMReport='display:block';
			} 
			else
			{
				$ViewClassCRMReport='display:none';   
			}
		} 
	}
	if ($ViewClassContactsReport == 'display:block' || $ViewClassCRMReport == 'display:block' || $ViewClassEmployeeReport == 'display:block') {
		$ViewClassReport='display:block';
	}else {
		$ViewClassReport='display:none';
	}
	foreach ($permissionTracking as $priviledgeDoc) 
	{
		$priviledge_key=$priviledgeDoc->priviledge_key;
		$status=$priviledgeDoc->status;
		if ($priviledge_key=='SHOWHIDE')
		{
			if($status==1)
			{
				$ViewClassTracking=' style="display:block"; ';
			} 
			else
			{
				$ViewClassTracking=' style="display:none"; ';   
			}
		} 
	}
?>
		
	<div class="sidebar sidebar-main sidebar-default" style="z-index: 1;">
		<div class="sidebar-content">
			<div class="sidebar-category sidebar-category-visible">
				<div class="category-title h6">
					<span>Main navigation</span>
					<ul class="icons-list">
						<li><a href="#" data-action="collapse"></a></li>
					</ul>
				</div>
				<div class="category-content no-padding">
					<ul class="navigation navigation-main navigation-accordion">


						<li <?php if($menu=='dashboard'){?> class="active"<?php   }?> >
							<a href="<?php echo base_url('admin/dashboard/view_dashboard');?>"><i class="icon-home7"></i> <span>Dashboard</span>
							</a>
						</li>
						<?php if (in_array("1", $module_ids_array)) { ?>
							<!-- Master Table hidden from the user permission by the setting for tbl_feature_list table for 0/1 <li>
									<a href="#"><i class=" icon-grid3"></i> <span>Master Tables</span></a>
								<ul>
									<li <?php if($menu=='activity'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Leads/activity');?>"><i class="icon-statistics"></i>Activities</a>
									</li>
									<li <?php if($menu=='busslist'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master/businesslist');?>"><i class="icon-briefcase3"></i>Business Segment</a>
									</li>
									<li <?php if($menu=='grouplist'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master/grouplist');?>"><i class="icon-make-group"></i>Group</a>
									</li>
									<li <?php if($menu=='loclist'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master/locationlist');?>"><i class="icon-location4"></i>Location</a>
									</li>
									<li <?php if($menu=='p_group'){?> class="active"<?php  }?> style="display:none">
										<a href="<?php echo base_url('admin/Product_service/product_group');?>"><i class="icon-make-group"></i><span>Product Group</span></a>
									</li>	

									<li <?php if($menu=='Expense'){?> class="active"<?php }?> >
										<a href="<?php echo base_url('admin/Expense');?>"><i class=" icon-coins"></i>Expense Master</a>
									</li>
									<li <?php if($menu=='s_type'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master');?>"><i class="icon-calendar5"></i>Schedule Type</a>
									</li>
									<li <?php if($menu=='s_v_t'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Schedule_visit_type');?>"><i class="icon-calendar5"></i>Schedule Type(visit)</a>
									</li>	
									<li <?php if($menu=='source'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Leads');?>"><i class="icon-equalizer2"></i>Source</a>
									</li>	
									<li <?php if($menu=='stage'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Leads/Stage');?>"><i class="icon-lan2"></i>Stage</a>
									</li>
									<li <?php if($menu=='t_type'){?> class="active"<?php  }?> style="display: block;">
										<a href="<?php echo base_url('admin/Target/target_type');?>"><i class="icon-target"></i>Target Type</a>
									</li>
									<li <?php if($menu=='typelist'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master/typelist');?>"><i class="icon-equalizer"></i>Type</a>
									</li>	
									<li <?php if($menu=='uom'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/UOM');?>"><i class="icon-three-bars"></i>UOM</a>
									</li>
									<li <?php if($menu=='Thoughts'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Thoughts');?>"><i class="icon-file-text"></i>Thoughts</a>
									</li>
									<li <?php if($menu=='CreditTerms'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/CreditTerm');?>"><i class="  icon-sort-numeric-asc"></i>Credit Terms</a>
									</li>
									<li <?php if($menu=='ProductSpecification'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/ProductSpecification');?>"><i class=" icon-insert-template"></i>Product Specification</a>
									</li>
									<li <?php if($menu=='HSNCode'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/HSNCode');?>"><i class="icon-make-group"></i>HSN Code</a>
									</li>
									<li <?php if($menu=='status'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Ecommerce/status');?>"><i class="icon-cogs"></i>Order Status</a>
									</li>
									
								</ul>
							</li> -->
							<li <?= $ViewClassMail; ?> >
								<a href="#"><i class="icon-inbox"></i> <span>Email</span></a>
								<ul>
									<li <?php if($menu=='BulkEmail'){?> class="active"<?php  }?> >
										<a href="<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail');?>"><i class="icon-inbox"></i>Bulk Email</a>
									</li>
									<li <?php if($menu=='compose'){?> class="active"<?php  }?> >
										<a href="<?php echo base_url('admin/ReportAdmin/Reports/mail_write?id=compose');?>"><i class="icon-inbox"></i>Compose</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!-- Module 1 -->
					   
						<?php if (in_array("1", $module_ids_array)) { ?>		

							<li <?= $ViewClassProduct; ?> >
								<a href="#"><i class="icon-steering-wheel"></i> <span>Product Management</span></a>
								<ul>
									<li <?php if($menu=='menu_m'){?> class="active"<?php  }?> >
										<a href="<?php echo base_url('admin/Master_product');?>"><i class="icon-podium  position-left" ></i><span>Product Categories</span></a>
									</li>
									<li <?php if($menu=='m_sunmenu'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Master_submenu');?>"><i class="icon-paw  position-left"></i><span>Product Sub-Categories</span></a>
									</li>
									<li <?php if($menu=='s_product'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Product');?>"><i class="icon-safe position-left"></i><span>Manage Products</span></a>
									</li>
								</ul>
							</li>
							<li <?= $ViewClassContact; ?> >
								<a href="#"><i class="icon-users4"></i> <span>Contact Management</span></a>
								<ul>
									<li <?php if($menu=='cust'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Customer');?>"><i class="icon-address-book2"></i>Contact List</a>
									</li>
								</ul>
							</li>
							<li style="<?= $ViewClassCRM; ?>" >
								<a href="#"><i class="icon-store2"></i> <span>CRM </span></a>
								<ul>
									<li <?php if($menu=='lead_opp'){?> class="active"<?php  }?> style="<?= $ViewClassLead; ?>">
										<a href="<?php echo base_url('admin/Leads/leads_opportunity');?>"><i class=" icon-books"></i>Leads Opportunity</a>
									</li>
									<li <?php if($menu=='target'){?> class="active"<?php  }?>   style="<?= $ViewClassTarget?>" >
										<a href="<?php echo base_url('admin/Target');?>"><i class="icon-target"></i>Target</a>
									</li>
									<li <?php if($menu=='archive'){?> class="active"<?php  }?>  style="<?= $ViewClassTarget; ?>" >
										<a href="<?php echo base_url('admin/Target/archive_target');?>"><i class="icon-target2"></i>Target Archive</a>
									</li>
								</ul>
							</li>

							<li <?php if($menu=='UserExpense'){?> class="active"<?php  }?> <?= $ViewClassExpense; ?>>
								<a href="<?php echo base_url('admin/Expense/UserExpense');?>"><i class="icon-wallet"></i>Expenses</a>
							</li>

							<li <?php if($menu=='notification'){?> class="active"<?php  }?> style="display: none;">
								<a href="<?php echo base_url('admin/Notification');?>"><i class="icon-alert"></i> <span>Notification</span></a>
							</li>

						<?php } ?>		

			    		<!-- Module 2 -->

					<?php if (in_array("2", $module_ids_array)) { ?>	
						<li <?php if($menu=='issue'){?> class="active"<?php  }?> <?= $ViewClassActivity; ?> >
							<a href="<?php echo base_url('admin/ScheduleManagement/GridList');?>"><i class="icon-question4"></i>Activities</a>
						</li>
						<li <?php if($menu=='view_trash_activities'){?> class="active"<?php  }?> <?= $ViewTrashActivityClass; ?> >
							<a href="<?php echo base_url('admin/ScheduleManagement/view_trash_activities');?>"><i class="icon-trash"></i>View Trash Activities
							</a>
						</li>
					<?php } ?>	

					 <?php if (in_array("3", $module_ids_array)) { ?>	
						<li <?= $ViewClassOrder; ?> >
							<a href="#"><i class="icon-price-tag"></i> <span>E-Commerce</span></a>
							<ul>
								<li <?php if($menu=='order'){?> class="active"<?php  }?> >
									<a href="<?php echo base_url('admin/Ecommerce');?>"><i class="icon-truck"></i>Order</a>
								</li>
							</ul>
						</li>
				     <?php } ?>
				     
				      <?php if (in_array("4", $module_ids_array)) { ?>	
							<li <?= $ViewClassTracking; ?> >
								<a href="#"><i class="icon-map4"></i> <span> Tracking</span></a>
								<ul>
									<li <?php if($menu=='LiveTracking'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Tracking/LiveTracking');?>"><i class="icon-location3"></i>Employee Schedule </a>
									</li>
									<li <?php if($menu=='track'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Tracking');?>"><i class="icon-map"></i>Employee History</a>
									</li>
									<li <?php if($menu=='emp_report'){?> class="active"<?php  }?> >
										<a href="<?php echo base_url('admin/Tracking/employee_report');?>"><i class="icon-bike"></i>Distance Report</a>
									</li>
									<li <?php if($menu=='loc_report'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Tracking/location_report');?>" style="display: none"><i class="icon-map"></i>Location Report</a>
									</li>
									<li <?php if($menu=='LiveEmployeeTracking'){?> class="active"<?php  }?>>
										<a href="<?php echo base_url('admin/Tracking/LiveEmployeeTracking');?>"><i class="icon-direction"></i>Live Tracking (Employee)</a>
									</li>
									<li <?php if($menu=='tr_rep'){?> class="active"<?php  }?>  >
										<a href="<?php echo base_url('admin/Tracking/Tracking_Report');?>"><i class="icon-location4"></i>Client Visit Report</a>
									</li>
								</ul>
							</li>
						 <?php } ?>
						 <li style="<?= $ViewClassReport?>" >
							<a href="#"><i class="icon-stats-growth"></i> <span>Reports</span></a>
							<ul>
							<?php if (in_array("2", $module_ids_array)) { ?>	
								<li style="<?= $ViewClassCRMReport; ?>" >
									<a href="#"><i class=" icon-stats-dots "></i> CRM</a>
									<ul>
										<li <?php if($menu=='bySource'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource');?>"><i class=" icon-shrink3"></i>Lead|Opportunity by Source</a>
										</li>
										<li <?php if($menu=='bySegments'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments');?>"><i class=" icon-cube3"></i>Lead|Opportunity by Segments</a>
										</li>

										<li <?php if($menu=='byProduct'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct');?>"><i class=" icon-lifebuoy"></i>Lead|Opportunity by Product</a>
										</li>

										<li <?php if($menu=='LeadOppByMonthlyCounts'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByMonthlyCounts');?>"><i class=" icon-calendar5"></i>Lead|Opportunity - Monthly Counts</a>
										</li>


										<li <?php if($menu=='LeadOppByMonthlyCounts'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts');?>"><i class=" icon-calendar"></i>Lead|Opportunity - Userwise Monthly Counts</a>
										</li>


										<li <?php if($menu=='bySalesPerson'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson');?>"><i class=" icon-user-tie"></i>Lead|Opportunity by Sales Person</a>
										</li>

										<li <?php if($menu=='LeadOppByStage'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage');?>"><i class="icon-hour-glass"></i>Lead|Opportunity by Stage</a>
										</li>

										<li <?php if($menu=='LeadOppBySalesPersonSegment'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment');?>"><i class="icon-stack-text"></i>Lead|Opportunity by Sales Person - Segment wise</a>
										</li>

										<li <?php if($menu=='LeadOppBySalesPersonProduct'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonProduct');?>"><i class="icon-shutter"></i>Lead|Opportunity by Sales Person - Product wise</a>
										</li>


									</ul>
								</li>
							<?php }?>
							<?php if (in_array("1", $module_ids_array)) { ?>	
								<li style="<?= $ViewClassContactsReport; ?>" >
									<a href="#"><i class="icon-users4"></i> Contacts</a>
									<ul>
										<li <?php if($menu=='SegmentWiseContact'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact');?>"><i class="icon-vcard"></i>Segments wise Contacts</a>
										</li>

										<li <?php if($menu=='AccountOwnersold'){?> class="active"<?php  }?> style="display: none;">
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners');?>"><i class="icon-user-tie"></i>Account Owners Old</a>
										</li>

										<li <?php if($menu=='AssignAccountOwners'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AssignAccountOwners');?>"><i class="icon-user-tie"></i>Account Owners</a>
										</li>

										<li <?php if($menu=='AccountRevenue'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountRevenue');?>"><i class="icon-cash"></i>Account wise Revenue</a>
										</li>

										<li <?php if($menu=='ContactSummary'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary');?>"><i class="icon-magazine"></i>Contact Summary</a>
										</li>

										<li <?php if($menu=='TypewiseContact'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact');?>"><i class="  icon-toggle"></i>Type wise Contact</a>
										</li>

										<li <?php if($menu=='LocationWiseContact'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LocationWiseContact');?>"><i class=" icon-map"></i>Location wise Contact</a>
										</li>
									
										<li <?php if($menu=='ContactsActivities'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivities');?>"><i class="  icon-file-presentation"></i>Contacts with Activities</a>
										</li>

										<li <?php if($menu=='ContactsActivities'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities');?>"><i class="icon-file-zip"></i>Contacts with No Activities</a>
										</li>
									</ul>
								</li>
								<li style="<?= $ViewClassEmployeeReport; ?>" >
									<a href="#"><i class="icon-address-book2"></i> Employeee</a>
									<ul>
										<li <?php if($menu=='AvailableTimeSlots'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots');?>"><i class="icon-watch"></i>Available Time Slots</a>
										</li>

										<li <?php if($menu=='EmployeeTarget'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeTarget');?>"><i class=" icon-target"></i>Employee - Target</a>
										</li>

										<li <?php if($menu=='EmployeeRevenue'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue');?>"><i class="icon-wallet"></i>Employee Revenue</a>
										</li>


										<li <?php if($menu=='EmployeewiseActivities'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities');?>"><i class="icon-archive"></i> Employee wise Activities</a>
										</li>

										<li <?php if($menu=='EmployeewiseActivitiesMapping'){?> class="active"<?php  }?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping');?>"><i class="icon-flip-vertical4"></i> Employee wise Activities Mapping</a>
										</li>
	
									</ul>
								</li>
							<?php }?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
			