<head>
	<style>
		::-webkit-scrollbar {
			width: 10px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #888;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}

		.sidebar-content {
			position: relative;
			height: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex: 1;
			flex: 1;
			overflow-y: auto;
			-webkit-overflow-scrolling: touch;
		}

		.category-title.h5,
		.category-title.h6 {
			padding: 9px;
			border-bottom: 0;
		}

		.sidebar-default .navigation>li.active>a,
		.sidebar-default .navigation>a:hover,
		.sidebar-default .navigation>li.active>a:focus {
			background-color: #2196f3;
			color: #fff;
		}

		.custom-scrollbars * {
			-ms-overflow-style: -ms-autohiding-scrollbar;
			scrollbar-width: thin;
			scrollbar-color: #999 #eee;
		}

		.sidebar-default .navigation li>a {
			color: #ffffff;
		}

		.sidebar-default {
			color: #ffffff;
		}

		.sidebar-default .sidebar-content {
			background-color: #2196f3 !important;
			border-color: #ddd;
			-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			bottom: auto;
			margin-left: -21px;
			top: 64px;
			margin-top: -14px !important;

			position: fixed;
			width: 281px;
			padding-bottom: 90px;


		}

		.navigation>li>a {
			padding: 6px 20px;
			min-height: 35px;
			font-weight: 500;
		}

		.navbar-brand>img {
			margin-top: -1.8rem !important;
		}
	</style>
</head>
<?php
	$menu = $sidebar['menu'];
	$plan_id = $this->session->plan_id;
	$module_ids = $this->session->module_ids;
	$module_ids_array = explode(",", $module_ids);
?>

<div class="sidebar sidebar-main sidebar-default " style="z-index: 1;">
	<div class="sidebar-content">
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-title h6">
				<span>Main Menu</span>
				<ul class="icons-list">
					<li><a href="#" data-action="collapse"></a></li>
				</ul>
			</div>
			<div class="category-content no-padding">
				<ul style="background-color:#2196f3;" class="navigation navigation-main navigation-accordion">
					<li <?php if ($menu == 'dashboard') { ?> class="active" <?php   } ?>>
						<a href="<?php echo base_url('admin/dashboard/view_dashboard'); ?>"><i class="icon-home7"></i> <span>Dashboard</span>
						</a>
					</li>

					<li <?php if ($menu == 'calendar') { ?> class="active" <?php   } ?> style="display: none;">
						<a href="<?php echo base_url('admin/dashboard/viewcalendar'); ?>"><i class=" icon-calendar2"></i> <span>Calendar</span>
						</a>
					</li>

					<li <?php if ($menu == 'ViewProfile') { ?> class="active" <?php  } ?> class="dropdown">
						<a href="<?php echo base_url('admin/dashboard/CompanySetting'); ?>">
							<i class="icon-office position-left"></i> Company Settings
						</a>
					</li>

					<!-- <li>
							<a href="#"><i class="icon-cog52"></i> <span>Configuration</span></a>
							<ul style="background-color:#009FDF;" >
								<li <?php if ($menu == 'ViewProfile') { ?> class="active"<?php  } ?> class="dropdown" >
									<a href="<?php echo base_url('admin/dashboard/CompanySetting'); ?>">
										<i class="icon-office position-left"></i> Company Settings
									</a>
								</li>
							</ul>
						</li> -->
					<li <?php if ($menu == 'ViewProfile') { ?> class="active" <?php  } ?> class="dropdown">
						<a href="<?php echo base_url('admin/dashboard/UserManagement'); ?>">
							<i class="icon-office position-left"></i> User Management
						</a>
					</li>
					<!-- <li>
							<a href="<?php echo base_url('admin/dashboard/CompanySetting'); ?>"><i class="icon-users"></i> <span>User Management</span></a>
							<ul style="background-color:#2196f3;" >
								<li <?php if ($menu == 'DepDes') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master/department_designation'); ?>"><i class="icon-cogs"></i>Department / Designation</a>
								</li>
								<li <?php if ($menu == 'user') { ?> class="active"<?php  } ?> class="dropdown" >
									<a href="<?php echo base_url('admin/Users'); ?>">
										<i class="icon-people position-left"></i>Manage User
									</a>
								</li>
								<li <?php if ($menu == 'PermissionRole') { ?> class="active"<?php  } ?> class="dropdown" >
									<a href="<?php echo base_url('admin/UserPermission/PermissionRole'); ?>">
										<i class="icon-user-lock position-left"></i> Role Permission
									</a>
								</li>
								<li <?php if ($menu == 'ClonePermission') { ?> class="active"<?php  } ?> class="dropdown" >
									<a href="<?php echo base_url('admin/UserPermission/ClonePermission'); ?>">
										<i class="icon-copy4 position-left"></i> Assign Roles
									</a>
								</li>
								<li <?php if ($menu == 'UserPermission') { ?> class="active"<?php  } ?> class="dropdown" >
									<a href="<?php echo base_url('admin/UserPermission'); ?>">
										<i class="icon-user-lock position-left"></i> User Permission
									</a>
								</li>
								<li <?php if ($menu == 'shiftTiming') { ?> class="active"<?php  } ?> >
									<a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>"><i class="icon-sort-time-asc"></i>Shift</a>
								</li>
								
								<li <?php if ($menu == 'shift') { ?> class="active"<?php  } ?> >
									<a href="<?php echo base_url('admin/Tracking/shift'); ?>"><i class="icon-calendar52 position-left"></i>Assign Shift</a>
								</li>
							</ul>
						</li> -->

					<li>
						<a href="<?php echo base_url('admin/Master/View_master'); ?>"><i class=" icon-grid3"></i> <span>Masters</span></a>
					</li>

					<!-- <li>
							<a href="#"><i class=" icon-grid3"></i> <span>Masters</span></a>
							<ul style="background-color:#009FDF;" >
								<li <?php if ($menu == 'activity') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Leads/activity'); ?>"><i class="icon-statistics"></i>Activities</a>
								</li>
								<li <?php if ($menu == 'busslist') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master/businesslist'); ?>"><i class="icon-briefcase3"></i>Business Segment</a>
								</li>
								<li <?php if ($menu == 'grouplist') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master/grouplist'); ?>"><i class="icon-make-group"></i>Groups</a>
								</li>
								<li <?php if ($menu == 'loclist') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master/locationlist'); ?>"><i class="icon-location4"></i>Location</a>
								</li>
								<li <?php if ($menu == 'p_group') { ?> class="active"<?php  } ?> style="display:none">
									<a href="<?php echo base_url('admin/Product_service/product_group'); ?>"><i class="icon-make-group"></i><span>Product Group</span></a>
								</li>	

								<li <?php if ($menu == 'Expense') { ?> class="active"<?php } ?> >
									<a href="<?php echo base_url('admin/Expense'); ?>"><i class=" icon-coins"></i>Expense Master</a>
								</li>
								<li <?php if ($menu == 's_type') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master'); ?>"><i class="icon-calendar5"></i>Activity Type</a>
								</li>
								<li <?php if ($menu == 's_v_t') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Schedule_visit_type'); ?>"><i class="icon-statistics"></i>Activity</a>
								</li>	
								<li <?php if ($menu == 'source') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Leads'); ?>"><i class="icon-equalizer2"></i>Source</a>
								</li>	
								<li <?php if ($menu == 'stage') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Leads/Stage'); ?>"><i class="icon-lan2"></i>Stage</a>
								</li>
								<li <?php if ($menu == 't_type') { ?> class="active"<?php  } ?> style="display: block;">
									<a href="<?php echo base_url('admin/Target/target_type'); ?>"><i class="icon-target"></i>Target Type</a>
								</li>
								<li <?php if ($menu == 'typelist') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master/typelist'); ?>"><i class="icon-equalizer"></i>Contact Type</a>
								</li>	
								
								<li <?php if ($menu == 'TermsCondition') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/TermConditions'); ?>"><i class="icon-equalizer"></i>Term Conditions</a>
								</li>	

								<li <?php if ($menu == 'Thoughts') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Thoughts'); ?>"><i class="icon-file-text"></i>Thoughts</a>
								</li>
								<li <?php if ($menu == 'CreditTerms') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/CreditTerm'); ?>"><i class="  icon-sort-numeric-asc"></i>Credit Terms</a>
								</li>
								<li <?php if ($menu == 'status') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Ecommerce/status'); ?>"><i class="icon-cogs"></i>Order Status</a>
								</li>
								<li <?php if ($menu == 'target') { ?> class="active"<?php  } ?>   style="display: block;">
									<a href="<?php echo base_url('admin/Target'); ?>"><i class="icon-target"></i>Target</a>
								</li>
								<li <?php if ($menu == 'archive') { ?> class="active"<?php  } ?>  style="display: block;">
									<a href="<?php echo base_url('admin/Target/archive_target'); ?>"><i class="icon-target2"></i>Target Archive</a>
								</li>
								
							</ul>
						</li> -->


					<!-- Module 1 -->
					<?php if (in_array("1", $module_ids_array)) { ?>

						<li>
							<a href="<?php echo base_url('admin/ProductSpecification/Product'); ?>"><i class="icon-steering-wheel"></i> <span>Product Management</span></a>
						</li>

						<li>
							<a href="<?php echo base_url('admin/ProjectManagement'); ?>"><i class="icon-steering-wheel"></i> <span>Project Management</span></a>
						</li>

						<li <?php if ($menu == 'cust') { ?> class="active" <?php  } ?>>
							<a href="<?php echo base_url('admin/Customer'); ?>"><i class="icon-address-book2"></i>Contact Management</a>
						</li>
						<!-- <li>
							<a href="#"><i class="icon-steering-wheel"></i> <span>Product Management</span></a>
							<ul style="background-color:#2196f3;" >
								<li <?php if ($menu == 'ProductSpecification') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/ProductSpecification'); ?>"><i class=" icon-insert-template"></i>Product Specification</a>
								</li>
								<li <?php if ($menu == 'HSNCode') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/HSNCode'); ?>"><i class="icon-make-group"></i>HSN Code</a>
								</li>
								<li <?php if ($menu == 'uom') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/UOM'); ?>"><i class="icon-three-bars"></i>UOM</a>
								</li>
								<li <?php if ($menu == 'menu_m') { ?> class="active"<?php  } ?> >
									<a href="<?php echo base_url('admin/Master_product'); ?>"><i class="icon-podium  position-left" ></i><span>Product Categories</span></a>
								</li>
								<li <?php if ($menu == 'm_sunmenu') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Master_submenu'); ?>"><i class="icon-paw  position-left"></i><span>Product Sub-Categories</span></a>
								</li>
								<li <?php if ($menu == 's_product') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Product'); ?>"><i class="icon-safe position-left"></i><span>Manage Products</span></a>
								</li>
							</ul>
						</li> -->
						<!-- <li>
							<a href="#"><i class="icon-users4"></i> <span>Contact Management</span></a>
							<ul style="background-color:#2196f3;" >
								<li <?php if ($menu == 'cust') { ?> class="active"<?php  } ?>>
									<a href="<?php echo base_url('admin/Customer'); ?>"><i class="icon-address-book2"></i>Contact List</a>
								</li>
							</ul>
						</li> -->
						<li>
							<a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"><i class="icon-store2"></i> <span>CRM </span></a>
							<!-- <ul style="background-color:#009FDF;" >
								<li <?php if ($menu == 'lead_opp') { ?> class="active"<?php  } ?> style="">
									<a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"><i class=" icon-books"></i>Leads Opportunity</a>
								</li>
								
							</ul> -->
						</li>

						<li <?php if ($menu == 'UserExpense') { ?> class="active" <?php  } ?>>
							<a href="<?php echo base_url('admin/Expense/UserExpense'); ?>"><i class="icon-wallet"></i>Expenses</a>
						</li>

						<li <?php if ($menu == 'notification') { ?> class="active" <?php  } ?> style="display: none;">
							<a href="<?php echo base_url('admin/Notification'); ?>"><i class="icon-alert"></i> <span>Notification</span></a>
						</li>

					<?php } ?>

					<!-- Module 2 -->

					<?php if (in_array("2", $module_ids_array)) { ?>
						<li <?php if ($menu == 'issue') { ?> class="active" <?php  } ?>>
							<a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>"><i class="icon-task"></i>Activities
							</a>
						</li>
						<li <?php if ($menu == 'view_trash_activities') { ?> class="active" <?php  } ?>>
							<a href="<?php echo base_url('admin/ScheduleManagement/view_trash_activities'); ?>"><i class="icon-trash"></i>View Trash Activities
							</a>
						</li>
					<?php } ?>


					<li>
						<a href="<?php echo base_url('admin/Ecommerce'); ?>"><i class="icon-truck"></i>E-Commerce</a>


					</li>

					<!-- <?php if (in_array("3", $module_ids_array)) { ?>	
						<li>
							<a href="#"><i class="icon-price-tag"></i> <span>E-Commerce</span></a>
							<ul style="background-color:#2196f3;" >
								<li <?php if ($menu == 'order') { ?> class="active"<?php  } ?> >
									<a href="<?php echo base_url('admin/Ecommerce'); ?>"><i class="icon-truck"></i>Order</a>
								</li>

							</ul>
						</li>
				     <?php } ?> -->

					<?php if (in_array("4", $module_ids_array)) { ?>

						<li>
							<a href="<?php echo base_url('admin/Tracking/view_tracking'); ?>"><i class="icon-location3"></i> <span>Tracking</span></a>
						</li>

						<!-- <li>
								<a href="#"><i class="icon-location3"></i> <span> Tracking</span></a>
								<ul style="background-color:#2196f3;" >
									<li <?php if ($menu == 'LiveTracking') { ?> class="active"<?php  } ?>>
										<a href="<?php echo base_url('admin/Tracking/LiveTracking'); ?>"><i class="icon-location3"></i>Employee Schedule </a>
									</li>
									<li <?php if ($menu == 'track') { ?> class="active"<?php  } ?>>
										<a href="<?php echo base_url('admin/Tracking'); ?>"><i class="icon-map"></i>Employee History</a>
									</li>
									<li <?php if ($menu == 'emp_report') { ?> class="active"<?php  } ?> >
										<a href="<?php echo base_url('admin/Tracking/employee_report'); ?>"><i class="icon-bike"></i>Distance Report</a>
									</li>
									<li <?php if ($menu == 'loc_report') { ?> class="active"<?php  } ?>>
										<a href="<?php echo base_url('admin/Tracking/location_report'); ?>" style="display: none"><i class="icon-map"></i>Location Report</a>
									</li>
									<li <?php if ($menu == 'LiveEmployeeTracking') { ?> class="active"<?php  } ?>>
										<a href="<?php echo base_url('admin/Tracking/LiveEmployeeTracking'); ?>"><i class="icon-direction"></i>Live Tracking (Employee)</a>
									</li>
									<li <?php if ($menu == 'tr_rep') { ?> class="active"<?php  } ?>  >
										<a href="<?php echo base_url('admin/Tracking/Tracking_Report'); ?>"><i class="icon-location4"></i>Client Visit Report</a>
									</li>
								</ul>
							</li> -->
					<?php } ?>


					<!-- <li <?php if ($menu == 'Feedback') { ?> class="active"<?php  } ?>>
							<a href="<?php echo base_url('admin/Feedback'); ?>">
								<i class="icon-question4"></i>Customer Feedback
							</a>
						</li> -->

					<li>
						<a href="<?php echo base_url('admin/ReportAdmin/Reports/ReportViewCard'); ?>"><i class="icon-stats-growth"></i> <span>Reports</span></a>
						<!-- <ul style="background-color:#009FDF;" >
								<li>
									<a href="#"><i class=" icon-stats-dots "></i> CRM</a>
									<ul style="background-color:#009FDF;" >
										<li <?php if ($menu == 'bySource') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><i class=" icon-shrink3"></i>Lead|Opportunity by Source</a>
										</li>
										<li <?php if ($menu == 'bySegments') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments'); ?>"><i class=" icon-cube3"></i>Lead|Opportunity by Segments</a>
										</li>

										<li <?php if ($menu == 'byProduct') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><i class=" icon-lifebuoy"></i>Lead|Opportunity by Product</a>
										</li>

										<li <?php if ($menu == 'LeadOppByMonthlyCounts') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByMonthlyCounts'); ?>"><i class=" icon-calendar5"></i>Lead|Opportunity - Monthly Counts</a>
										</li>


										<li <?php if ($menu == 'LeadOppByUserwiseMonthlyCounts') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><i class=" icon-calendar"></i>Lead|Opportunity - Userwise Monthly Counts</a>
										</li>


										<li <?php if ($menu == 'bySalesPerson') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson'); ?>"><i class=" icon-user-tie"></i>Lead|Opportunity by Sales Person</a>
										</li>

										<li <?php if ($menu == 'LeadOppByStage') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage'); ?>"><i class="icon-hour-glass"></i>Lead|Opportunity by Stage</a>
										</li>

										<li <?php if ($menu == 'LeadOppBySalesPersonSegment') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment'); ?>"><i class="icon-stack-text"></i>Lead|Opportunity by Sales Person - Segment wise</a>
										</li>

										<li <?php if ($menu == 'LeadOppBySalesPersonProduct') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonProduct'); ?>"><i class="icon-shutter"></i>Lead|Opportunity by Sales Person - Product wise</a>
										</li>


									</ul>
								</li>
								
								<li>
									<a href="#"><i class="icon-users4"></i> Contacts</a>
									<ul style="background-color:#009FDF;" >
										<li <?php if ($menu == 'AllContacts') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AllContacts'); ?>"><i class="icon-vcard"></i>All Contacts</a>
										</li>
										<li <?php if ($menu == 'SegmentWiseContact') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact'); ?>"><i class="icon-vcard"></i>Segments wise Contacts</a>
										</li>

										<li <?php if ($menu == 'AccountOwnersold') { ?> class="active"<?php  } ?> style="display: none;">
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners'); ?>"><i class="icon-user-tie"></i>Account Owners Old</a>
										</li>

										<li <?php if ($menu == 'AssignAccountOwners') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AssignAccountOwners'); ?>"><i class="icon-user-tie"></i>Account Owners</a>
										</li>

										<li <?php if ($menu == 'AccountRevenue') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountRevenue'); ?>"><i class="icon-cash"></i>Account wise Revenue</a>
										</li>

										<li <?php if ($menu == 'ContactSummary') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary'); ?>"><i class="icon-magazine"></i>Contact Summary</a>
										</li>

										<li <?php if ($menu == 'TypewiseContact') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact'); ?>"><i class="  icon-toggle"></i>Type wise Contact</a>
										</li>

										<li <?php if ($menu == 'LocationWiseContact') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/LocationWiseContact'); ?>"><i class=" icon-map"></i>Location wise Contact</a>
										</li>
									
										<li <?php if ($menu == 'ContactsActivities') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivities'); ?>"><i class="  icon-file-presentation"></i>Contacts with Activities</a>
										</li>

										<li <?php if ($menu == 'ContactsWithNoActivities') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><i class="icon-file-zip"></i>Contacts with No Activities</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-address-book2"></i> Employeee</a>
									<ul style="background-color:#009FDF;" >
										<li <?php if ($menu == 'AvailableTimeSlots') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>"><i class="icon-watch"></i>Available Time Slots</a>
										</li>

										<li <?php if ($menu == 'EmployeeTarget') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeTarget'); ?>"><i class=" icon-target"></i>Employee - Target</a>
										</li>

										<li <?php if ($menu == 'EmployeeRevenue') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue'); ?>"><i class="icon-wallet"></i>Employee Revenue</a>
										</li>


										<li <?php if ($menu == 'EmployeewiseActivities') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities'); ?>"><i class="icon-archive"></i> Employee wise Activities</a>
										</li>

										<li <?php if ($menu == 'EmployeewiseActivitiesMapping') { ?> class="active"<?php  } ?>>
											<a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping'); ?>"><i class="icon-flip-vertical4"></i> Employee wise Activities Mapping</a>
										</li>
	
									</ul>
								</li>

							</ul> -->
					</li>
					
					<li>
						<a href="<?php echo base_url('admin/Reminder'); ?>"><i class="icon-bell3"></i> <span>Reminder</span></a>
					</li>

					<li>
						<a href="#"><i class="icon-inbox"></i> <span>Email</span></a>
						<ul style="background-color:#2196f3;">
							<li <?php if ($menu == 'BulkEmail') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail'); ?>"><i class="icon-inbox"></i>Bulk Email</a>
							</li>
							<li <?php if ($menu == 'compose') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('admin/ReportAdmin/Reports/mail_write?id=compose'); ?>"><i class="icon-inbox"></i>Compose</a>
							</li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div>