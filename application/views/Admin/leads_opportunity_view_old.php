
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Admin/includes/header'); ?>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>
    <style type="text/css">
      .pickadate 
      {
        z-index: 100000;
      }
      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​
    </style>
    <style type="text/css">
      .multiselect-container>li>a>label.checkbox 
      {
          margin: -6px 12px;
      }
      .multiselect-container 
      {
        min-width: 275px;
        max-height: 250px;
        overflow-y: auto;
      }
     .btn-group > .btn:first-child
      {
          margin-left: 0;
          width: 375px !important;
      }
     .help-block
      {
        color: #F44336 !important;
      }      
   </style>
</head>

<body style="overflow-x: hidden;">
	<?php  $this->load->view('Admin/includes/admin_header'); ?>
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Leads Opportunity
        </h4>
      </div>
     <div class="heading-elements">
        <div class="heading-btn-group">
         	<a data-toggle="modal" data-target="#leadopp_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
	<div class="page-container">
		<div class="page-content">
      <?php  $this->load->view('Admin/includes/sidebar'); ?>
			<div class="content-wrapper">
				<div class="row">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat" >
							<div class="panel-heading table_header">
								<h5 class="panel-title" style="color:white">Leads Opportunity List</h5>
							</div>
							<table class="table datatable-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>ID No.</th>
										<th>Owner</th>
										<th>Type</th>
										<th>Tag</th>
										<th>Company Name</th>
										<th>Contact Person</th>
                    <th>Contact No.</th>
										<th>Email</th>
                    <th>Interested In</th>
                    <th>Source</th>
                    <th>Stage</th>
                    <th>Remarks</th>										
									</tr>
								</thead>
								<tbody>
										 <?php
                          $count = 1;
                          foreach($leads_opportunity as $row) 
                          {
                            //$taskparameter='leadopp_id='.$row['leadopp_id'].'&GenerateID='.$row['leadopp_id'].'&tasktype='.$row['customer_type'];
                           ?>
											    <tr>
    												<td><?php echo $count ?></td>
    												<td>
                              <a href="<?= base_url('admin/Leads/ViewDetails')?>?leadopp_id=<?=$row['leadopp_id']?>">
                                 <div style="font-weight: 600;width: 120px;color:#394950;"><?= $row['lead_generate_id'] ?></div>
                              </a>
                            </td>
    												<td><?= $row['emp_name'] ?></td>
    												<td><?= $row['customer_type'] ?></td>
    												<td><?= $row['tag'] ?></td>
                            <td><?= $row['company_name'] ?></td>
                            <td><?= $row['contact_person_name1'] ?></td>                      
                            <td><?= $row['phone_no'] ?></td>                       
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['prdsrv_name'] ?></td>
                            <td><?= $row['source_title'] ?></td>
                            <td><?= $row['stage_title'] ?></td>
                            <td><?= $row['remarks'] ?></td>
											</tr>
										<?php $count++; } ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
			</div>
		</div>
</div>


       <div id="leadopp_model" class="modal fade">
          <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
                   <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                      <h5 class="modal-title" style="margin-top: -4px" >
                      <i class="icon-stack-plus" style="zoom:1.1; "></i>
                        &nbsp; &nbsp;Add Leads | Opportunity
                      </h5>
                  </div>
                 <div class="modal-body" style="padding: 2px;">
                    <div class="panel-body">
                      <div class="tabbable tab-content-bordered">
                        <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                          <li class="active"><a href="#bordered-justified-tab1" data-toggle="tab"><b>Leads</b></a></li>
                          <li><a href="#bordered-justified-tab2" data-toggle="tab"><b>Opportunity</b></a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane has-padding active" id="bordered-justified-tab1">                          
                              <form id="LeadForm" method="post">
                                <input type="hidden" name="leadopp_type" value="Lead">
                                <div class="panel panel-flat">
                                  <div class="panel-body">

                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Company Name  : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" name="org_name_lead"  placeholder="Enter Company name" maxlength="50" autocomplete="off"> 
                                            </div>
                                          </div>     
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Source :  <sup style="color: red">*</sup></label>
                                                  <select name="source" id="source" class="form-control" >
                                                    <option value="">Select Source</option>
                                                      <?php   
                                                        foreach ($source_details as $value) 
                                                        {
                                                      ?>
                                                      <option value="<?= $value->source_id ?>"><?= $value->source_title;?></option>
                                                     <?php } ?> 
                                                 </select>
                                            </div>
                                          </div>
                                      </div>
                                    </fieldset>

                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Contact Person : </label>
                                                 <input type="text" class="form-control"  name="contact_person" placeholder="Enter contact person name" maxlength="50"  autocomplete="off">
                                            </div>
                                          </div>   
                                         <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Stage :  <sup style="color: red">*</sup></label>
                                                <select name="stage" class="form-control" >
                                                  <option value="">Select Stage</option>
                                                    <?php   
                                                      foreach ($stage_details as $value) 
                                                      {
                                                    ?>
                                                    <option value="<?= $value->stage_id ?>"><?= $value->stage_title;?></option>
                                                   <?php } ?> 
                                               </select>
                                            </div>
                                          </div> 
  
                                      </div>
                                    </fieldset>

                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Contact Number :  <sup style="color: red">*</sup></label>
                                                 <input type="text" class="form-control"  name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off" maxlength="10">
                                            </div>
                                          </div> 

                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Interested In :  <sup style="color: red">*</sup></label>
                                                <select name="product_id" class="form-control" >
                                                  <option value="">Select Interest</option>
                                                    <?php   
                                                      foreach ($product_list as $res) 
                                                      {
                                                    ?>
                                                    <option value="<?= $res->product_id ?>"><?= $res->product_name;?></option>
                                                   <?php } ?> 
                                               </select>
                                             </div>
                                          </div> 
                                      </div>
                                    </fieldset>

                                    <fieldset>
                                      <div class="row">  
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Address : </label>
                                                 <textarea class="form-control" name="address" placeholder="Enter address" rows="1" ></textarea>
                                            </div>
                                          </div>
                                           <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Account Manager :  <sup style="color: red">*</sup></label>
                                                <select name="emp_id"  class="form-control" >
                                                  <?php if($this->session->user_type=='SA'){?>
                                                  <option value="">Select Account Manager</option>
                                                  <?php  } ?>
                                                    <?php   
                                                      foreach ($employee_list as $emp) 
                                                      {
                                                    ?>
                                                    <option value="<?= $emp->id;?>"><?= $emp->name;?></option>
                                                   <?php } ?> 
                                               </select>
                                             </div>
                                          </div>
                                        </div>
                                    </fieldset>  

                                    <fieldset>
                                        <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Email ID : </label>
                                                <input type="text" class="form-control" name="email_id" placeholder="Enter email" maxlength="35"  autocomplete="off">
                                            </div>
                                          </div>
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Expected Revenue : </label>
                                                <input type="text" class="form-control"  name="project_business_value" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'  autocomplete="off">
                                            </div>
                                          </div> 
                                       </div>
                                    </fieldset>
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Business Segment : </label>
                                                  <select name="business[]" id="business_lead" multiple class="form-control" >
                                                    <span class="caret"></span>
                                                    <?php   
                                                      foreach ($business_list as $value1) 
                                                      {
                                                    ?>
                                                    <option value="<?= $value1->business_id ?>"><?= $value1->business_name;?></option>
                                                   <?php } ?> 
                                                 </select>
                                            </div>
                                          </div> 
                                           <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Expected Closure Date : </label>
                                                  <input type="text" class="form-control" id="closure_date" name="closure_date" placeholder="Expected Closure Date" autocomplete="off">
                                            </div>
                                          </div> 
                                      </div>
                                    </fieldset>   
                                    <fieldset>
                                        <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Tag : </label>
                                                <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40"  autocomplete="off">
                                            </div>
                                          </div>
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Remark : </label>
                                               <textarea class="form-control"  id="remarkslead"   name="remarks" placeholder="Enter Remark" rows="2"  maxlength="500" ></textarea>  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="font-size:13px; ">Max: 500 character</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="col-md-10">
                                                             <p class="pull-right" style="font-size:13px;">Char Left:</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                              <div id="charNum" style="font-size:13px; color:gray;">500</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div> 
                                       </div>
                                    </fieldset>
                                   <br/>
                                  <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Add Lead <i class="icon-arrow-right14 position-right"></i></button>
                                    <span id="preview1"></span>
                                </div>  
                              </div>
                            </div>
                          </form>
                          </div>

                          <div class="tab-pane has-padding" id="bordered-justified-tab2">
                            <form id="OpportunityForm" method="post">
                               <input type="hidden" name="leadopp_type" value="Opportunity">
                               <input type="hidden" name="company_name" id="opp_company_name" >
                               <input type="hidden" class="form-control" id="location_id" name="location_id" maxlength="35">
                               <input type="hidden" class="form-control" id="business_id" name="business_id" maxlength="35">
                               <input type="hidden" class="form-control" id="group_id" name="group_id" placeholder="Enter business" maxlength="35">
                                <div class="panel panel-flat">
                                  <div class="panel-body">
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Company Name  : <sup style="color: red">*</sup></label>
                                                 <select  name="company_id" id="company_id" class="select-search  form-control" onchange="get_cust_detail(this.value)">
                                                  <option value="">Select company</option>
                                                    <?php   
                                                      foreach ($array_company as $company) 
                                                      {
                                                    ?>
                                                      <option value="<?= $company->customer_id ?>"><?= $company->company_name;?> (<?= $company->contact_person_name1 ?> / <?= $company->phone_no ?>)</option>
                                                   <?php } ?> 
                                               </select>        
                                               <span id="company_id_error" style="color: red;display:none;">Please Select Company Name</span>                                    
                                            </div>
                                          </div>  
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Source :  <sup style="color: red">*</sup></label>
                                                  <select name="source" id="source_opp"  class="form-control"  onchange="$('#source_error').hide();">
                                                    <option value="">Select Source</option>
                                                      <?php   
                                                        foreach ($source_details as $value) 
                                                        {
                                                      ?>
                                                      <option value="<?= $value->source_id ?>"><?= $value->source_title;?></option>
                                                     <?php } ?> 
                                                 </select>
                                                 <span id="source_error" style="color: red;display:none;">Please Select Source</span>                                    
                                            </div>
                                          </div>
                                      </div>
                                    </fieldset>
                                    <fieldset>
                                      <div class="row">
                                         <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Contact Person : </label>
                                                 <input type="text" class="form-control" id="contact_person2"  name="contact_person" placeholder="Contact person name" maxlength="50"  autocomplete="off"  readonly="">
                                            </div>
                                          </div>   
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Stage :  <sup style="color: red">*</sup></label>
                                                <select name="stage" id="stage_opp" class="form-control"  onchange="$('#stage_error').hide();">
                                                  <option value="">Select Stage</option>
                                                    <?php   
                                                      foreach ($stage_details as $value) 
                                                      {
                                                    ?>
                                                    <option value="<?= $value->stage_id ?>"><?= $value->stage_title;?></option>
                                                   <?php } ?> 
                                               </select>
                                               <span id="stage_error" style="color: red;display:none;">Please Select Stage</span>                                    
                                            </div>
                                          </div>
                                      </div>
                                    </fieldset>
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Contact Number :  <sup style="color: red">*</sup></label>
                                                 <input type="text" class="form-control" id="contact_number2"  name="contact_number1" placeholder="Contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">
                                            </div>
                                          </div>   
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Interested In :  <sup style="color: red">*</sup></label>
                                                <select name="product_id" id="opp_product_id" class="form-control"  onchange="$('#opp_product_id_error').hide();">
                                                  <option value="">Select Interest</option>
                                                    <?php   
                                                      foreach ($product_list as $res) 
                                                      {
                                                    ?>
                                                    <option value="<?= $res->product_id ?>"><?= $res->product_name;?></option>
                                                   <?php } ?> 
                                               </select>
                                               <span id="opp_product_id_error" style="color: red;display:none;">Please Select Interest</span>                                                                                  
                                             </div>
                                          </div>   
                                       </div>
                                    </fieldset> 
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Address : </label>
                                                 <textarea class="form-control"  id="address2"  name="address" placeholder="Enter address" rows="1"  readonly=""></textarea>
                                            </div>
                                          </div> 
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label> Account Manager  :  <sup style="color: red">*</sup></label>
                                                <select name="emp_id" id="opp_emp_id" class="form-control"  onchange="$('#opp_emp_id_error').hide();">
                                                  <?php if($this->session->user_type=='SA'){?>
                                                  <option value="">Select Account Manager</option>
                                                  <?php  } ?>
                                                    <?php   
                                                      foreach ($employee_list as $emp) 
                                                      {
                                                    ?>
                                                    <option value="<?= $emp->id;?>"><?= $emp->name;?></option>
                                                   <?php } ?> 
                                               </select>
                                               <span id="opp_emp_id_error" style="color: red;display:none;">Please Select Account Manager </span>                                                                                  
                                             </div>
                                          </div>
                                      </div>
                                    </fieldset>
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Email ID : </label>
                                                <input type="text" class="form-control" name="email_id" id="email_id2"  placeholder="Email" maxlength="35"  autocomplete="off"  readonly="">
                                            </div>
                                          </div>  
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Expected Revenue : </label>
                                                <input type="text" class="form-control"  name="project_business_value" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'  autocomplete="off">
                                            </div>
                                          </div>  
                                       </div>
                                    </fieldset>    
                                    <fieldset>
                                      <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Business Segment : </label>
                                                 <input type="text" class="form-control" id="business_opp" name="business1" placeholder="Business" readonly="">
                                            </div>
                                          </div>
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Expected Closure Date : </label>
                                                  <input type="text" class="form-control" id="closure_date1" name="closure_date" placeholder="Select Closure Date" maxlength="50">
                                            </div>
                                          </div> 
                                      </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Tag : </label>
                                                <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40"  autocomplete="off">
                                            </div>
                                          </div>
                                          <div class="col-md-6"> 
                                            <div class="form-group">
                                               <label>Remark : </label>
                                               <textarea class="form-control" id="remarksopp" name="remarks" placeholder="Enter Remark" rows="2" maxlength="500"></textarea>  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="font-size:13px; ">Max: 500 character</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="col-md-10">
                                                             <p class="pull-right" style="font-size:13px;">Char Left:</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                              <div id="charNum2" style="font-size:13px; color:gray;">500</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                          
                                            </div>
                                          </div> 
                                       </div>
                                    </fieldset>                                   
                                   <br/>
                                  <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Add Opportunity <i class="icon-arrow-right14 position-right"></i></button>
                                    <span id="preview2"></span>
                                </div>  
                              </div>
                            </div>
                          </form>                            
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
        </div>
   </div>

     <div id="modal_default" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Convert To Contact</h6>
            </div>
            <div class="modal-body">
                <div id="complaint_model_data">
                </div>
           </div>
          </div>
        </div>
     </div>

     <div id="Transfer_Lead" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Transfer Lead Opportunity</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" id="TransferLeadForm">
                      <input type="hidden" name="db_lead_id" id="db_lead_id" >
                         <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-3" for="Youtube">Employee Name :  <sup style="color: red">*</sup></label>
                                   <div class="col-sm-9">
                                      <select class="select-search form-control" name="emp_id" id="emp_id">
                                         <span class="caret"></span>
                                          <option value="">Select Employee</option>
                                            <?php   
                                              foreach ($employee_list as $value1) 
                                              {
                                            ?>
                                            <option value="<?= $value1->id ?>"><?= $value1->name;?></option>
                                           <?php } ?> 
                                      </select>
                                  </div>
                            </div>
                         </div>
                          <br/>
                          <div class="text-right">
                            <button type="submit" class="btn btn-primary">Transfer Lead <i class="icon-arrow-right14 position-right"></i></button>
                            <span id="preview31"></span>
                        </div> 
                    </form>  
                </div>
             </div>
          </div>
        </div>
     </div>


     <div id="AddAttachmentmodal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Transfer Lead Opportunity</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" id="TransferLeadForm">
                      <input type="hidden" name="attachment_lead_id" id="attachment_lead_id" >
                         <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-3" for="Youtube">Employee Name :  <sup style="color: red">*</sup></label>
                                   <div class="col-sm-9">
                                      <select class="select-search form-control" name="emp_id" id="emp_id">
                                         <span class="caret"></span>
                                          <option value="">Select Employee</option>
                                            <?php   
                                              foreach ($employee_list as $value1) 
                                              {
                                            ?>
                                            <option value="<?= $value1->id ?>"><?= $value1->name;?></option>
                                           <?php } ?> 
                                      </select>
                                  </div>
                            </div>
                         </div>
                          <br/>
                          <div class="text-right">
                            <button type="submit" class="btn btn-primary">Transfer Lead <i class="icon-arrow-right14 position-right"></i></button>
                            <span id="preview31"></span>
                        </div> 
                    </form>  
                </div>
             </div>
          </div>
        </div>
     </div>



     <div id="googlemapmodal2" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content" style="margin-top: 4rem;">
            <div class="modal-header bg-info" style="background-color:#00619F;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Search Google Address</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                    <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control"  type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;"/>
                     <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
                    </div>
                </div>
              </div>
          </div>
        </div>
     </div>

     <script type="text/javascript">
      $("#remarkslead").keyup(function()
      {
            el = $(this);
            if(el.val().length >= 500)
            {
                el.val( el.val().substr(0, 500) );
                $("#charNum").text(0);
            }
             else 
            {
                $("#charNum").text(500-el.val().length);
            }
      });
    </script>

     <script type="text/javascript">
      $("#remarksopp").keyup(function()
      {
            el = $(this);
            if(el.val().length >= 500)
            {
                el.val( el.val().substr(0, 500) );
                $("#charNum2").text(0);
            }
             else 
            {
                $("#charNum2").text(500-el.val().length);
            }
      });
    </script>

    <script type="text/javascript">
      function Transfer_Lead(lead_id) 
      {
        $("#db_lead_id").val(lead_id); 
        $("#Transfer_Lead").modal('show');        
      }
      function AddAttachment(lead_id) 
      {
        $("#attachment_lead_id").val(lead_id); 
        $("#AddAttachmentmodal").modal('show');        
      }

      $(document).ready(function()
      {
          $('#TransferLeadForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                       emp_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Employee Name'
                                }
                           }
                      }                  
                }
            });
      });

      $(document).ready(function()
      {
          $('#LeadForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                       org_name_lead: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Company Name'
                                }
                        }
                      },
                      contact_number1: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Enter Contact Number'
                                  }
                          }
                      },
                      source: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Source'
                                  }
                          }
                      },
                      product_id: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Interest'
                                  }
                          }
                      },
                      emp_id: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Account Manager '
                                  }
                          }
                      },
                      stage: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Stage'
                                  }
                          }
                      }                  
                }
            });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function (e)
       {
          $("#LeadForm").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  //alert('invalid');
                }
                else
                {

                  $("#preview1").show();
                  $("#preview1").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                  $.ajax({
                            url: "<?php echo base_url('admin/Leads/InsertLead');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                // alert(data);
                                  $("#preview1").hide();
                                  new PNotify({
                                              title: 'Add Leads',
                                              text: 'Leads Added  Successfully',
                                              type: 'success'
                                             });

                                 setTimeout(function()
                                   {
                                       window.location="<?php echo base_url('admin/Leads/leads_opportunity');?>";
                                   }, 1000);      

                              },
                            error: function() 
                            {
                               $(function(){
                                             new PNotify({
                                                          title: 'Leads / Opportunity Add',
                                                          text: 'Failed to load page',
                                                          type: 'warning'
                                                         });
                                            });
                                }           
                      });
                }
                return false;
            
            }));
        });
    </script>


    <script type="text/javascript">
      $(document).ready(function (e)
       {
          $("#TransferLeadForm").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  // alert('invalid');
                }
                else
                {

                  $("#preview31").show();
                  $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                  $.ajax({
                            url: "<?php echo base_url('admin/Leads/Transfer_Lead');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                              // alert(data);
                                  $("#preview31").hide();
                                  new PNotify({
                                              title: 'Transfer Leads',
                                              text: 'Leads Transfered  Successfully',
                                              type: 'success'
                                             });

                                 setTimeout(function()
                                   {
                                       window.location="<?php echo base_url('admin/Leads/leads_opportunity');?>";
                                   }, 1000); 
                                   return false;     

                              },
                            error: function() 
                            {
                               $(function(){
                                       new PNotify({
                                                    title: 'Leads Transfer',
                                                    text: 'Failed to load page',
                                                    type: 'warning'
                                                   });
                                      });
                                }           
                      });
                }
                return false;
            
            }));
        });
    </script>

    <script type="text/javascript">
     $(document).ready(function (e)
           {
             $("#OpportunityForm").on('submit',(function(e)
                 {  
                     //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {

                      var company_id=$("#company_id").val();
                      var source_opp=$("#source_opp").val();
                      var stage_opp=$("#stage_opp").val();
                      var opp_product_id=$("#opp_product_id").val();
                      var opp_emp_id=$("#opp_emp_id").val();                  

                      if(company_id=='')
                      {
                        $("#company_id_error").show();
                      }
                      else if(source_opp=='')
                      {
                        $("#source_error").show();
                      } 
                      else if(stage_opp=='')
                      {
                        $("#stage_error").show();
                      }
                      else if(opp_product_id=='')
                      {
                        $("#opp_product_id_error").show();
                      }
                      else if(opp_emp_id=='')
                      {
                        $("#opp_emp_id_error").show();
                      }
                     else
                      {
                        $("#preview2").show();
                        $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                         $.ajax({
                                    url: "<?php echo base_url('admin/Leads/InsertOpportunity');?>",
                                    type: "POST",
                                    data:  new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    success: function(data)
                                      {
                                         $("#preview2").hide();
                                              new PNotify({
                                                          title: 'Add Opportunity',
                                                          text: 'Opportunity Added  Successfully',
                                                          type: 'success'
                                                         });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('admin/Leads/leads_opportunity');?>";
                                               }, 1000);      
                                        },
                                      error: function() 
                                      {
                                         $(function(){
                                                       new PNotify({
                                                                    title: 'Leads / Opportunity Add',
                                                                    text: 'Failed to load page',
                                                                    type: 'warning'
                                                                   });
                                                      });
                                          }           
                                });                    
                       }                          
                    }
                    return false;
                }));
            });
    </script>

    <script type="text/javascript">

      function get_cust_detail(value) 
      {
        // alert(value);
            var datastring = 'customerid='+value;
            // alert(datastring);
            $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Leads/get_cust_detail'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                  // alert(data);
                  var obj = JSON.parse(data);
                  $('#opp_company_name').val(obj[0].company_name);
                  $('#contact_person2').val(obj[0].contact_person_name1);
                  $('#address2').val(obj[0].address);
                  $('#contact_number2').val(obj[0].phone_no);
                  $('#email_id2').val(obj[0].email);
                  $('#location_opp').val(obj[0].location);
                  $('#city1').val(obj[0].city);
                  // alert(obj[0].business_name);
                  $('#business_opp').val(obj[0].business_name);
                  $('#group_opp').val(obj[0].group_name);
                  $('#location_id').val(obj[0].location_id);
                  $('#business_id').val(obj[0].business_id);
                  $('#group_id').val(obj[0].group_id);    
                  $('#company_id_error').hide();
               },
              error: function(){      
               alert('Error while request..');
              }
             });    
      }
    </script>

    <script type="text/javascript">

     /*   $("#closure_date").on("dp.change", function (e) 
        {
            $('#LeadForm').bootstrapValidator('revalidateField', 'closure_date'); 
        });

        $("#closure_date1").on("dp.change", function (e) 
        {
            $('#OpportunityForm').bootstrapValidator('revalidateField', 'closure_date'); 
        });
        */
    </script>

    <script type="text/javascript">
      $(function () 
      {
          $('#closure_date').datetimepicker({format: 'DD MMMM, YYYY', useCurrent: true});
          $('#closure_date1').datetimepicker({format: 'DD MMMM, YYYY', useCurrent: true});
      });
    </script>

    <script type="text/javascript">

        function open_google_map2()
        {
          $("#googlemapmodal2").modal('show');
           initialize2();
        }

       function initialize2()
           {
            // alert();
              var markers = [];
              var map = new google.maps.Map(document.getElementById('googleMap2'), {
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  disableDefaultUI: true
              });
              var defaultBounds = new google.maps.LatLngBounds(
              new google.maps.LatLng(18.5204, 73.8567),
              new google.maps.LatLng(18.6204, 73.9567));
              map.fitBounds(defaultBounds);
              // Create the search box and link it to the UI element.
              var input = /** @type {HTMLInputElement} */(
              document.getElementById('pac-input2'));
              map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
              var searchBox = new google.maps.places.SearchBox((input));
              google.maps.event.addListener(searchBox, 'places_changed', function ()
               {
                  map.setZoom(15);
                  var places = searchBox.getPlaces();
                  if (places.length == 0) {
                      return;
                  }
                  for (var i = 0, marker; marker = markers[i]; i++) {
                      marker.setMap(null);
                  }
                  // For each place, get the icon, place name, and location.
                  markers = [];
                  var bounds = new google.maps.LatLngBounds();
                  for (var i = 0, place; place = places[i]; i++) {
                      var image = {
                          url: place.icon,
                          size: new google.maps.Size(71, 71),
                          origin: new google.maps.Point(0, 0),
                          anchor: new google.maps.Point(17, 34),
                          scaledSize: new google.maps.Size(25, 25)
                      };
                      // Create a marker for each place.
                      var marker = new google.maps.Marker({
                          map: map,
                          draggable: true,
                          title: place.name,
                          position: place.geometry.location
                      });
                      markers.push(marker);
                      bounds.extend(place.geometry.location);
                      google.maps.event.addListener(marker, 'click', function (event)
                       {
                          get_city2(event.latLng.lat(),event.latLng.lng());
                          var lat =event.latLng.lat();
                          var lng =event.latLng.lng();
                          var latlng = new google.maps.LatLng(lat, lng);
                          var geocoder = geocoder = new google.maps.Geocoder();
                          geocoder.geocode({ 'latLng': latlng }, function (results, status)
                           {
                              if (status == google.maps.GeocoderStatus.OK) {
                                  if (results[1])
                                  {
                                      location_name =results[1].formatted_address;
                                      document.getElementById("address3").value = location_name;
                                      $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                      $("#googlemapmodal2").modal('hide');
                                  }
                              }
                          });
                      });
                  }
                  map.fitBounds(bounds);
              });
             // [END region_getplaces]
              // Bias the SearchBox results towards places that are within the bounds of the
              // current map's viewport.
              google.maps.event.addListener(map, 'bounds_changed', function () {
                  var bounds = map.getBounds();
                  searchBox.setBounds(bounds);
              });
          }



      function get_city2(lat,long)
      {
          var geocoder;
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(lat, long);
          geocoder.geocode(
              {'latLng': latlng}, 
              function(results, status) {
                  if (status == google.maps.GeocoderStatus.OK)
                      {
                          if (results[0]) {
                              var add= results[0].formatted_address ;
                              var  value=add.split(",");
                              // alert(add);
                              count=value.length;
                              country=value[count-1];
                              state=value[count-2];
                              city=value[count-3];
                              if(value[count-3]=null)
                              {
                                city='';
                              }
                              // alert(city);
                              document.getElementById('city2').value = city;
                              $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                          }
                          else 
                          {
                              alert("address not found");
                          }
                  }
                   else 
                   {
                      alert("Geocoder failed due to: " + status);
                  }
              }
        );
      }


    </script>


    <script>
        function convert_to_contact(id)
        {
          var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to convert to contact this Leads ?</p>',
                hide: false,
                type: 'success',
                confirm: {
                    confirm: true,
                    buttons: [
                        {
                            text: 'Convert',
                            addClass: 'btn-sm'
                        },
                        {
                            text: 'No',
                            addClass: 'btn-sm'
                        }
                    ]
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: false
                }
            })

             // On confirm
           notice.get().on('pnotify.confirm', function()
             {

                  var datastring = 'leadopp_id='+id;
                        // alert(datastring);
                         $.ajax({
                                type: "post",
                                url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
                                cache: false,    
                                data: datastring,
                                success: function(data)
                                {    
                                  // alert(data);
                                  $('#modal_default').modal('show');
                                  $('#complaint_model_data').html(data);
                               },
                              error: function()
                              {      
                               alert('Error while request..');
                              }
                         });
                  })
            // On cancel
            notice.get().on('pnotify.cancel', function()
             {
                // alert('Oh ok. Chicken, I see.');
            });

        }
    </script>


<script>
    function del_leads(id)
    {

      var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Leads opportunity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

         // On confirm
       notice.get().on('pnotify.confirm', function()
         {
            var datastring = 'leadopp_id='+id;
            //alert(datastring);
             $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Leads/del_leads'); ?>",
                    cache: false,    
                    data: datastring,
                    success: function(data)
                    {    
                      //alert(data);
                             new PNotify({
                                          title: 'Delete Lead | Opportunity',
                                          text: 'Deleted Successfully',
                                          type: 'success'
                                         });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Leads/leads_opportunity');?>";
                           }, 1000);
                     },
                    error: function()
                    {      
                     alert('Error while request..');
                    }
               });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<script>
  function edit_customer(id)
  {
      var datastring = 'customerid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/edit_customer'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          // alert(data);
            $('#modal_default').modal('show');
            $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });
  }
</script>

<script type="text/javascript">
jQuery('#business_lead').multiselect({
        enableFiltering: true,
        maxHeight:170,
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Select business segment', 
        numberDisplayed: 10, 
        selectAll: false, 
        onChange: function(option, checked)
         {
            var selectedOptions = jQuery('#business_lead option:selected');
             if (selectedOptions.length >= 10) 
            {
                // Disable all other checkboxes.
                var nonSelectedOptions = jQuery('#business_lead option').filter(function() 
                {
                    return !jQuery(this).is(':selected');
                });
                 nonSelectedOptions.each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', true);
                    input.parent('li').addClass('disabled');
                });
                 new PNotify({
                                  title: 'Message',
                                  text: 'Please Select only 10 business segment',
                                  type: 'warning'
                                 });
            }
            else 
            {
                // Enable all checkboxes.
                jQuery('#business option').each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
            }
        }});
      var shiftClick = jQuery.Event("click");
      shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) 
    {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });
</script>


</body>
</html>
