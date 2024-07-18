
<?php

	 if($this->session->user_type=='SA') 
		{
			$u_type = "Super Admin";
			$SA_hidden ="display:none";
			$hidden = "";
		}
	  else
	  {
		if($this->session->schedule_view=='1') 
		{
			$u_type = "Employee";
			$hidden_master = "display:none";
			$hidden = "display:none";
		}
		else
		{
			$u_type = "Employee";
			$hidden = "display:none";
		}
	 }
 ?>
		
	<div class="sidebar sidebar-main sidebar-default" style="z-index: 0;">
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

						<li <?php if($menu=='dashboard'){?> class="active"<?php   }?> ><a href="<?php echo base_url('admin/dashboard/view_dashboard');?>"><i class="icon-home7"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#"><i class="icon-home2"></i> <span>Master Tables</span></a>
							<ul>
								<li <?php if($menu=='activity'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Leads/activity');?>"><i class="icon-statistics"></i>Activities</a>
								</li>
								<li <?php if($menu=='busslist'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Master/businesslist');?>"><i class="icon-briefcase"></i>Business Segment</a>
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
								<li <?php if($menu=='shiftTiming'){?> class="active"<?php  }?> >
									<a href="<?php echo base_url('admin/Tracking/MasterShift');?>"><i class="icon-sort-time-asc"></i>Shift</a>
								</li>
								<li <?php if($menu=='Expense'){?> class="active"<?php }?> >
									<a href="<?php echo base_url('admin/Expense');?>"><i class=" icon-coins"></i>Expense Master</a>
								</li>
								<li <?php if($menu=='shift'){?> class="active"<?php  }?> >
									<a href="<?php echo base_url('admin/Tracking/shift');?>"><i class="icon-sort-time-asc"></i>Assign Shift</a>
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
								<li <?php if($menu=='t_type'){?> class="active"<?php  }?> style="display: none;">
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

							</ul>
						</li>

						<li>
							<a href="#"><i class="icon-reading"></i> <span>Product Management</span></a>
							<ul>
								<li <?php if($menu=='menu_m'){?> class="active"<?php  }?> >
									<a href="<?php echo base_url('admin/Master_product');?>"><i class="fa fa-tree" aria-hidden="true"></i><span>Product Categories</span></a>
								</li>
								<li <?php if($menu=='m_sunmenu'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Master_submenu');?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i><span>Product Sub-Categories</span></a>
								</li>
								<li <?php if($menu=='s_product'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Product');?>"><i class="fa fa-life-ring" aria-hidden="true"></i><span>Manage Products</span></a>
								</li>
							</ul>
						</li>

					   	<li>
							<a href="#"><i class="icon-mobile"></i> <span>Mobile</span></a>
							<ul>
								<li <?php if($menu=='cust'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Customer');?>"><i class="icon-users"></i>Contact List</a>
								</li>
								<li <?php if($menu=='issue'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Customer/Issue');?>"><i class="icon-question4"></i>Issues</a>
								</li>
								<li <?php if($menu=='lead_opp'){?> class="active"<?php  }?> style="">
									<a href="<?php echo base_url('admin/Leads/leads_opportunity');?>"><i class="icon-stack"></i>Leads Opportunity</a>
								</li>

								<li <?php if($menu=='UserExpense'){?> class="active"<?php  }?> style="">
									<a href="<?php echo base_url('admin/Expense/UserExpense');?>"><i class="icon-coins"></i>Expenses</a>
								</li>

								<li <?php if($menu=='notification'){?> class="active"<?php  }?> style="display: none;"><a href="<?php echo base_url('admin/Notification');?>"><i class="icon-alert"></i> <span>Notification</span></a></li>

								<li <?php if($menu=='partner1'){?> class="active"<?php  }?>  style="display: none;">
									<a href="<?php echo base_url('admin/Partner');?>"><i class="icon-users"></i>Partner</a>
								</li>

								<li <?php if($menu=='user'){?> class="active"<?php  }?> class="dropdown" style="<?= $hidden ?>">
									<a href="<?php echo base_url('admin/Users');?>">
										<i class="icon-user position-left"></i> User
									</a>
								</li>

								<li <?php if($menu=='UserPermission'){?> class="active"<?php  }?> class="dropdown"  style="display: none;">
									<a href="<?php echo base_url('admin/UserPermission');?>">
										<i class="icon-user-check position-left"></i> User Permission
									</a>
								</li>

								<li <?php if($menu=='target'){?> class="active"<?php  }?>   style="display: none;">
									<a href="<?php echo base_url('admin/Target');?>"><i class="icon-target"></i>Target</a>
								</li>
								<li <?php if($menu=='archive'){?> class="active"<?php  }?>  style="display: none;">
									<a href="<?php echo base_url('admin/Target/archive_target');?>"><i class="icon-target2"></i>Target Archive</a>
								</li>
							</ul>
						</li>

						<li style="display: none;">
							<a href="#"><i class="icon-price-tag"></i> <span>E-Commerce</span></a>
							<ul>
								<li <?php if($menu=='order'){?> class="active"<?php  }?> style="<?= $hidden ?>">
									<a href="<?php echo base_url('admin/Ecommerce');?>"><i class="icon-truck"></i>Order</a>
								</li>
								<li <?php if($menu=='status'){?> class="active"<?php  }?> style="<?= $hidden ?>">
									<a href="<?php echo base_url('admin/Ecommerce/status');?>"><i class="icon-cogs"></i>Order Status</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-map4"></i> <span> Tracking</span></a>
							<ul>
								<li <?php if($menu=='add_loc'){?> class="active"<?php  }?> style="display:none;">
									<a href="<?php echo base_url('admin/Tracking/add_location');?>"><i class="icon-add-to-list"></i>Add Location</a>
								</li>
								<li <?php if($menu=='LiveTracking'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Tracking/LiveTracking');?>"><i class="icon-location3"></i>Employee Schedule </a>
								</li>
								<li <?php if($menu=='track'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Tracking');?>"><i class="icon-map"></i>Employee History</a>
								</li>
								<li <?php if($menu=='emp_report'){?> class="active"<?php  }?> style="<?= $hidden ?>">
									<a href="<?php echo base_url('admin/Tracking/employee_report');?>"><i class="icon-bike"></i>Distance Report</a>
								</li>
								<li <?php if($menu=='loc_report'){?> class="active"<?php  }?> style="<?= $hidden ?>">
									<a href="<?php echo base_url('admin/Tracking/location_report');?>" style="display: none"><i class="icon-map"></i>Location Report</a>
								</li>

								<li <?php if($menu=='LiveEmployeeTracking'){?> class="active"<?php  }?>>
									<a href="<?php echo base_url('admin/Tracking/LiveEmployeeTracking');?>"><i class="icon-direction"></i>Live Tracking (Employee)</a>
								</li>

								<li <?php if($menu=='tr_rep'){?> class="active"<?php  }?> style="display:none;">
									<a href="<?php echo base_url('admin/Tracking/Tracking_Report');?>"><i class="icon-compass4"></i>Client Visit Report</a>
								</li>
								<li <?php if($menu=='view_loc'){?> class="active"<?php  }?>  style="display:none;">
									<a href="<?php echo base_url('admin/Tracking/ViewLocation');?>"><i class="icon-eye"></i>View Location</a>
								</li>

							</ul>
						</li>


					</ul>
				</div>
			</div>
		</div>
	</div>
			