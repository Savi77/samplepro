<?php $this->load->view('Admin/includes/n-header');    ?>

<style>
    table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }

    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 250px !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    
    #MyManageTable_wrapper button.dt-button.buttons-columnVisibility:first-child{
        display: none;
    }
    .dot-light-blue{
        background-color: #00BCD4;
    }
    .datatable-header {
        padding-top: 0 !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    #MyManageTable tr{
        text-wrap: nowrap;
    }
</style>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Manage Resource</span>
                <a onclick="open_user_view(this.id)" id="<?= count($array_users); ?>" data-toggle="modal" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <input type="hidden" name="no_of_user" id="no_of_user" value="<?= $plan_subscription->no_of_user; ?>">
            <input type="hidden" name="no_of_user_exist" id="no_of_user_exist" value="<?= count($array_users); ?>">
            <br>
            <!-- datatable-button-flash-basic  -->
            <table class="table table-striped" id="MyManageTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Resource Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Nationality</th>
                        <th>Address</th>
                        <th>Pan Card No.</th>
                        <th>Aadhar Card No.</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>Joining Date</th>
                        <th>Date Of Birth</th>
                        <th>Marriage Anniversary Date</th>
                        <th>Uploaded File</th>
                        <?php if ($this->session->user_type == "SA") { ?>
                            <th>Status</th>
                            <th>Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($array_users as $row) 
                    {
                        if (!empty($row['profile_img'])) {
                            $file = base_url() . 'assets/admin/assets/images/users/' . $row['profile_img'];
                        } else {
                            $file = base_url() . 'assets/admin/assets/images/testimonial/dummy.png';
                        }

                        if($row['role_id'] == 0)
                        {
                            $role = '';
                        }
                        else
                        {
                            $role = $this->db->select('role_name')->from('tbl_role')->where('role_id',$row['role_id'])->get()->row()->role_name;
                        }

                        $doc = $this->db->select('*')->from('tbl_user_documents')->where('user_id',$row['id'])->get()->result();
                        if(!empty($doc))
                        {
                            $doc_count = COUNT($doc);
                        }
                        else
                        {
                            $doc_count = 0;
                        }

                        if($row['joining_date'] == '30 November, -0001' || $row['joining_date'] == '30 November, 0001' || $row['joining_date'] == '01 January, 1970')
                        {
                            $joining_date = '';
                        }
                        else
                        {
                            $joining_date = $row['joining_date'];
                        }

                        if($row['dob_date'] == '30 November, -0001' || $row['dob_date'] == '30 November, 0001' || $row['dob_date'] == '01 January, 1970')
                        {
                            $dob_date = '';
                        }
                        else
                        {
                            $dob_date = $row['dob_date'];
                        }

                        if($row['marriage_anniversary_date'] == '30 November, -0001' || $row['marriage_anniversary_date'] == '30 November, 0001' || $row['marriage_anniversary_date'] == '01 January, 1970')
                        {
                            $marriage_anniversary_date = '';
                        }
                        else
                        {
                            $marriage_anniversary_date = $row['marriage_anniversary_date'];
                        }
                       
                    ?>
                        <tr>
                            <td><?= $count; ?></td>

                            <td>
                                <div class="table-avatar" style="display:flex;">
                                    <a href="<?= $file; ?>" target="_blank" class="user-avatar"><img alt="" src="<?= $file; ?>"></a>
                                    <div id="name" class="text-wrap-col" style="width:250px;display:flex;align-items:center;">
                                    <a data-toggle="modal" data-placement="bottom" onclick="edit_user(id)" id="<?= $row['id'] ?>"><?= $row['name'] ?></a><br>
                                        <!-- <span class="text-wrap-col" style="width:250px;"><?= $row['department_name'] . ' / ' . $row['designation_name'] ?></span> -->
                                    </div>
                                </div>
                            </td>


                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['email'] ?>
                                </div>
                                
                            </td>
                            <td>
                                <div style="width:150px;">
                                    <?= $row['mobile_no'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= $role ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['department_name'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['designation_name'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['nationality'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['address'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['pan_no'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['aadhar_no'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['gender'] ?>
                                </div>
                                
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $row['blood_group'] ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $joining_date; ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $dob_date ?>
                                </div>
                                
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $marriage_anniversary_date ?>
                                </div>
                                
                            </td>

                            <td>
                                <div style="display: flex;justify-content: flex-start;width:150px;">
                                    <a data-toggle="modal" data-placement="bottom" onclick="document_count(id)" id="<?= $row['id'] ?>">
                                        <button rel="tooltip" title="View Uploads" type="button" class="green-btn activity-btn-text" style="margin-left:5px;"><?= $doc_count;?></button>
                                    </a>
                               </div>
                                
                            </td>
                            
                            <?php if ($this->session->user_type == "SA") {  ?>
                                <td>
                                    <div style="width:150px;">
                                        <?php if ($row['user_status'] == 1) { ?>
                                            <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" onclick="cancel_verification(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>">Active</button>
                                        <?php } else { ?>
                                            <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" onclick="confirm_verification(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>">Closed</button>
                                        <?php } ?>
                                    </div>
                                    
                                </td>

                                <!-- <td class="text-center" style="padding: 12px 7px; width: 146px;">
                                    <div class="row">
                                        <?php if ($row['update_permission'] == '1') { ?>
                                            <a class="cursor-pointer" onclick="cancel_approval(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" data-popup="tooltip" title="Disable Customer Editing" data-placement="bottom" data-original-title="Disable Customer Editing">
                                                <i class="cancel_approval icon-hyperlink"></i>
                                            </a>
                                        <?php   } else {  ?>
                                            <a class="cursor-pointer" onclick="update_approval(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Enable customer editing" title="Enable Customer Editing">
                                                <i class="update_approval icon-hyperlink"></i>
                                            </a>
                                        <?php   }   ?>

                                        <a class="cursor-pointer" onclick="edit_user(id)" id="<?= $row['id'] ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Edit User" title="Edit User">
                                            <i class="edit-user edit-user fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <?php if ($row['schedule_view'] == '1') { ?>
                                            <a class="cursor-pointer" onclick="cancel_login_permission(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Disable Schedule View" title="Disable Schedule View">
                                                <i class="cancel_permission icon-user-check" aria-hidden="true"></i>
                                            </a>
                                        <?php   } else {  ?>
                                            <a class="cursor-pointer" onclick="update_login_permission(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Enable Schedule View" title="Enable Schedule View">
                                                <i class="update_permission icon-user-lock" aria-hidden="true"></i>
                                            </a>
                                        <?php   }   ?>

                                    </div>
                                </td> -->

                                <td>
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

                                                            <!-- <?php if ($row['update_permission'] == '1') { ?>
                                                                <li>
                                                                    <a onclick="cancel_approval(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-blue"></span> Disable Customer Editing  
                                                                    </a>
                                                                </li>
                                                            <?php   } else {  ?>
                                                                <li>
                                                                    <a onclick="update_approval(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-red"></span> Enable Customer Editing  
                                                                    </a>
                                                                </li>
                                                            <?php   }   ?> -->
                                                                <li>
                                                                    <a  onclick="edit_user(id)" id="<?= $row['id'] ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-green"></span> Edit Resource 
                                                                    </a>
                                                                </li>
                                                            <!-- <?php if ($row['schedule_view'] == '1') { ?>
                                                                <li>
                                                                    <a  onclick="cancel_login_permission(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-light-blue"></span> Disable Schedule View
                                                                    </a>
                                                                </li>
                                                            <?php   } else {  ?>
                                                                <li>
                                                                    <a onclick="update_login_permission(this)" data-id="<?= $row['id'] ?>" id="<?= $row['id'] ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-yellow"></span> Enable Schedule View
                                                                    </a>
                                                                </li>
                                                            <?php   }   ?> -->
                                                        </ul>
                                                    </div>
                                                </div> 

                                            </li>
                                        </ul>
                                    </div>
                                </td>



                            <?php } ?>
                           

                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $this->load->view('Admin/includes/n-footer');    ?>

<!--popup-->
<div id="User-view" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Add Resource</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="UserForm" enctype="multipart/form-data" method="post">
                <fieldset class="form-filedset email min-height-200">
                    <legend class="field bulk-email">Basic Info</legend>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" maxlength="50">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department </label>
                                <div class="media no-margin-top  m-0">
                                    <select name="user_department" id="user_department" class="form-control select2" data-placeholder="Select Department">
                                        <option value="">Select Department</option>
                                        <?php foreach ($department as $value) { ?>
                                            <option value=" <?= $value->dep_id; ?>"><?= $value->department_name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation </label>
                                <div class="media no-margin-top  m-0">
                                    <select name="user_designation" id="user_designation" class="form-control select2" data-placeholder="Select Designation">
                                        <option value="">Select Designation</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nationality </label>
                                <div class="media no-margin-top  m-0">
                                    <select class="form-control select2" name="nationality" id="nationality1" data-placeholder="Select Nationality">
                                        <option value="">Select Nationality</option>
                                        <?php foreach ($country_list as $value5) { ?>
                                            <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address </label>
                                <div class="media no-margin-top  m-0">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender </label>
                                <div class="media no-margin-top  m-0">
                                    <select name="gender" id="gender1" class="form-control select2" data-placeholder="Select Gender">
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Blood Group </label>
                                <div class="media no-margin-top  m-0">
                                    <select name="blood_group" id="blood_group1" class="form-control select2" data-placeholder="Select Blood Group">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O+">O+</option>
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O-">O-</option>
                                    </select>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pan Card </label>
                                <div class="media no-margin-top  m-0">
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder="Enter Pan Card Number" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Aadhar Card </label>
                                <div class="media no-margin-top  m-0">
                                    <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" placeholder="Enter Aadhar Card Number" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <div class="shbtn" id="show_hide_password_user" style="display: flex;">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off" style="border-right: 0px;" value="<?= $value->Password ?>">
                                    <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                        <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Profile </label>
                                <div class="media no-margin-top  m-0">
                                    <div class="media-left">
                                        <a href="#"><img src="<?= base_url()?>/assets/admin/assets/images/placeholder.jpg" class="img-size-cmp img-rounded" alt="" id="home_img"></a>
                                    </div>
                                    <div class="media-body ml-2">
                                        <label class="custom-file">
                                            <input type="file" class="custom-file-input" id="imgInp" name="fileup">
                                            <span class="custom-file-label">Choose file</span>
                                        </label>

                                        <p id="error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be
                                            JPG, JPEG, PNG or GIF.
                                        </p>
                                        <p id="error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 1MB.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email min-height-200">
                    <legend class="field bulk-email">Contact Details</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile No. <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alternative Mobile No. </label>
                                <input type="text" class="form-control" id="altr_mobile_no" name="altr_mobile_no" placeholder="Enter Alternative Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email Id <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Id" maxlength="50" onkeyup="checkmail()">
                                <small id="mail_error" style="color:red;" maxlength="40"> </small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Alternative Email Id </label>
                                <input type="text" class="form-control" id="altr_email" name="altr_email" placeholder="Enter Alternative Email Id" maxlength="50" onkeyup="checkmail()">
                                <small id="mail_error" style="color:red;" maxlength="40"> </small>
                            </div>
                        </div>
                    </div>
                </fieldset>
                    
                <fieldset class="form-filedset email ">
                    <legend class="field bulk-email">Dates</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Joining Date </label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate-selectors rounded-right" placeholder="Select Joining Date" name="joining_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Birth </label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" name="dob_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Marriage Anniversary </label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" name="marriage_anniversary_date">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email min-height-200">
                    <legend class="field bulk-email">Document</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Document Type </label>                                                    
                                        <select class="form-control addSelect" name="doc_type[]" id='doc_type_0' data-placeholder="Select Document Type" onchange="toggleFileRequirement()">
                                            <option value="">Select Document Type</option>
                                            <?php
                                            foreach ($doc_type as  $row2) {
                                            ?>
                                                <option value="<?= $row2->id; ?>">
                                                    <?= $row2->doc_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Upload File </label>
                                        <input type="file" class="form-control" id="file" name="uploadfile[]" style="padding:4px !important" onchange="toggleFileRequirement()">
                                        <small for="file" id="file-label" style="color:#f00 !important"></small>
                                    </div>
                                    <div class="col-md-2">
                                        <lable></lable>
                                        <button class="btn btn-success mt-4" type="button" onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="education_fields">
                    </div>
                </fieldset>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_submit"> Submit<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleFileRequirement() {
        const dropdown = document.getElementById('doc_type_0');
        const fileInput = document.getElementById('file');
        const fileLabel = document.getElementById('file-label');
        if (dropdown.value == '') 
        {
            fileInput.removeAttribute('required');
            fileLabel.textContent = 'file';
        }
        else 
        {
            fileInput.setAttribute('required', 'required');
            // fileLabel.textContent = 'Please Select File';
            $('#file-label').css('display','block');
            $('#file-label').html('Please Select File');
            $('#btn_submit').prop('disabled', true);
        } 

        if(fileInput.value != '')
        {
            $('#file-label').css('display','none');
            $('#btn_submit').prop('disabled', false);   
        }
    }
</script>

<script type="text/javascript">
    // $('#user_department').select2({
    //     placeholder: 'Select Department',
    //     dropdownParent: $("#User-view")
    // });

    // $('#user_designation').select2({
    //     placeholder: 'Select Designation',
    //     dropdownParent: $("#User-view")
    // });

    // $('#user_type_io').select2({
    //     dropdownParent: $('#User-view')
    // });

    // $('#nationality1').select2({
    //     placeholder: 'Select Nationality',
    //     dropdownParent: $("#User-view")
    // });
    // $('#gender1').select2({
    //     placeholder: 'Select Gender',
    //     dropdownParent: $("#User-view")
    // });
    // $('#blood_group1').select2({
    //     placeholder: 'Select Blood Group',
    //     dropdownParent: $("#User-view")
    // });

</script>

<script type="text/javascript">
    var room = 0;

    function education_fields() 
    {    
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "w-100 form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-md-12"><div class="form-group"><div class="row"><div class="col-md-5"><lable></lable><select class="form-control addSelect" name="doc_type[]" id="doc_type_'+ room +'" data-placeholder="Select Document Type" onchange="toggleFileRequirement_add()"><option value="">Select Document Type</option><?php foreach ($doc_type as  $row2) {?><option value="<?= $row2->id; ?>"><?= $row2->doc_name; ?></option><?php } ?></select></div><div class="col-md-5"><lable></lable><input type="file" id="file_add" class="form-control" name="uploadfile['+ room +']" style="padding:4px !important" onchange="toggleFileRequirement_add()"><small for="file" id="file-label_add" style="color:#f00 !important"></small></div><div class="col-md-2"><lable></lable><button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span></button></div></div></div></div>';
        objTo.appendChild(divtest)

        $('.addSelect').select2({
                dropdownParent: $("#User-view")
            });
        
        $('#add_new_form').bootstrapValidator('addField', 'productid[]');
        $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
    }

    function toggleFileRequirement_add()
    {
        const dropdown = document.getElementById('doc_type_'+ room +'');
        const fileInput = document.getElementById('file_add');
        const fileLabel = document.getElementById('file-label_add');
        if (dropdown.value == '') 
        {
            fileInput.removeAttribute('required');
            fileLabel.textContent = 'file';
        }
        else 
        {
            fileInput.setAttribute('required', 'required');
            // fileLabel.textContent = 'Please Select File';
            $('#file-label_add').css('display','block');
            $('#file-label_add').html('Please Select File');
            $('#btn_submit').prop('disabled', true);
        } 

        if(fileInput.value != '')
        {
            $('#file-label_add').css('display','none');
            $('#btn_submit').prop('disabled', false);   
        }
    }


    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

<script>

    $('body').on('shown.bs.modal', '#User-view', function() {
        $(this).find('.select2,.addSelect').each(function() {
            $(this).select2({ dropdownParent: $('#User-view') });
        });
    });
            
    $('#User-view').on('scroll', function (event) {
        $(this).find(".select2,.addSelect").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
    });
</script>

<script>
    function document_count(id) {
        var datastring = 'user_id=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Users/user_document_details'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#get_document_details').modal('show');
                $('#document_details_model_data').html(data);

            },
            error: function() {
                // alert('Error while request..');
                $('#get_document_details').modal('show');
                $('#document_details_model_data').html(data);
                // $('#account_manager_model_data').html(data);
                // $('#errorwhilerequestModal').modal('show');
            }
        });
    }
</script>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Resource</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" >&times;</button>
            </div>

            <div class="modal-body">
                <div id="user_model_data1"></div>
            </div>

        </div>
    </div>
</div>

<div id="get_document_details" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Uploaded Document</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="document_details_model_data">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#user_table').DataTable();
    // Cancel verification -------------------------------
    // function cancel_verification(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to un-verify this User?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                 text: 'Yes',
    //                 addClass: 'btn-sm'
    //             }, {
    //                 text: 'No',
    //                 addClass: 'btn-sm'
    //             }]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'user_id=' + id;
    //         // alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Users/cancel_user'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Confirmation Form',
    //                         text: 'User confirmation cancel successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Users'); ?>";
    //                 }, 1000);

    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });

    //     })

    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }

    // function confirm_verification(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to verify this User?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                 text: 'Yes',
    //                 addClass: 'btn-sm'
    //             }, {
    //                 text: 'No',
    //                 addClass: 'btn-sm'
    //             }]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'user_id=' + id;
    //         // alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Users/confirm_user'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Confirmation Form',
    //                         text: 'User Confirm successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Users'); ?>";
    //                 }, 1000);

    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });

    //     })

    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }

    // function cancel_approval(id) {

        // var notice = new PNotify({
        //     title: 'Confirmation',
        //     text: '<p>Do you want to disable the employee from editing customers detail?</p>',
        //     hide: false,
        //     type: 'warning',
        //     confirm: {
        //         confirm: true,
        //         buttons: [{
        //             text: 'Yes',
        //             addClass: 'btn-sm'
        //         }, {
        //             text: 'No',
        //             addClass: 'btn-sm'
        //         }]
        //     },
        //     buttons: {
        //         closer: false,
        //         sticker: false
        //     },
        //     history: {
        //         history: false
        //     }
        // })

        // // On confirm
        // notice.get().on('pnotify.confirm', function() {

        //     var datastring = 'user_id=' + id;
        //     // alert(datastring);
        //     $.ajax({
        //         type: "post",
        //         url: "<?php echo base_url('admin/Users/cancel_approval'); ?>",
        //         cache: false,
        //         data: datastring,
        //         success: function(data) {
        //             //alert(data);
        //             $(function() {
        //                 new PNotify({
        //                     title: 'Confirmation',
        //                     text: 'confirmation cancel successfully',
        //                     type: 'success'
        //                 });
        //             });

        //             setTimeout(function() {
        //                 window.location = "<?php echo base_url('admin/Users'); ?>";
        //             }, 1000);

        //         },
        //         error: function() {
        //             alert('Error while request..');
        //         }
        //     });

        // })

        // // On cancel
        // notice.get().on('pnotify.cancel', function() {
        //     // alert('Oh ok. Chicken, I see.');
        // });
    // }


    // function update_approval(id) {

        // var notice = new PNotify({
        //     title: 'Confirmation',
        //     text: '<p>This will enable the employee from editing the customers detail. Do you really want to continue?</p>',
        //     hide: false,
        //     type: 'warning',
        //     confirm: {
        //         confirm: true,
        //         buttons: [{
        //             text: 'Yes',
        //             addClass: 'btn-sm'
        //         }, {
        //             text: 'No',
        //             addClass: 'btn-sm'
        //         }]
        //     },
        //     buttons: {
        //         closer: false,
        //         sticker: false
        //     },
        //     history: {
        //         history: false
        //     }
        // })

        // // On confirm
        // notice.get().on('pnotify.confirm', function() {

        //     var datastring = 'user_id=' + id;
        //     // alert(datastring);
        //     $.ajax({
        //         type: "post",
        //         url: "<?php echo base_url('admin/Users/update_approval'); ?>",
        //         cache: false,
        //         data: datastring,
        //         success: function(data) {
        //             //alert(data);
        //             $(function() {
        //                 new PNotify({
        //                     title: 'Confirmation',
        //                     text: 'confirmation approved successfully',
        //                     type: 'success'
        //                 });
        //             });

        //             setTimeout(function() {
        //                 window.location = "<?php echo base_url('admin/Users'); ?>";
        //             }, 1000);

        //         },
        //         error: function() {
        //             alert('Error while request..');
        //         }
        //     });

        // })

        // // On cancel
        // notice.get().on('pnotify.cancel', function() {
        //     // alert('Oh ok. Chicken, I see.');
        // });

    // }

    function edit_user(id) {
        var datastring = 'usr_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Users/edit_user'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#modal_default1').modal('show');
                $('#user_model_data1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
    function updateUI_edit_button_close()
    {
        // $('#modal_default1').modal('hide');
        // $(".popover-body").css('display','block');
        location.reload();
        // $('#edit_button_close').attr('data-dismiss', 'modal');
    }


    // function cancel_login_permission(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Do you want to disable the employee from schedule view permission?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                 text: 'Yes',
    //                 addClass: 'btn-sm'
    //             }, {
    //                 text: 'No',
    //                 addClass: 'btn-sm'
    //             }]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'user_id=' + id;
    //         // alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Users/cancel_login_permission'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Confirmation',
    //                         text: 'confirmation cancel successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Users'); ?>";
    //                 }, 1000);

    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });

    //     })

    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }

    // function update_login_permission(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>This will enable the employee to view all the schedule list. Do you really want to continue?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                 text: 'Yes',
    //                 addClass: 'btn-sm'
    //             }, {
    //                 text: 'No',
    //                 addClass: 'btn-sm'
    //             }]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'user_id=' + id;
    //         // alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Users/update_login_permission'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 // alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Confirmation Form',
    //                         text: 'confirmation approved successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Users'); ?>";
    //                 }, 1000);

    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });

    //     })

    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }

    $(document).ready(function() {
        $("#show_hide_password_user a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password_user input').attr("type") == "text") {
                $('#show_hide_password_user input').attr('type', 'password');
                $('#show_hide_password_user i').addClass("icon-eye-blocked");
                $('#show_hide_password_user i').removeClass("icon-eye");
            } else if ($('#show_hide_password_user input').attr("type") == "password") {
                $('#show_hide_password_user input').attr('type', 'text');
                $('#show_hide_password_user i').removeClass("icon-eye-blocked");
                $('#show_hide_password_user i').addClass("icon-eye");
            }
        });
    });

    function chk_emp_code() {
        emp_code = $('#emp_id').val();
        if (emp_code == '') {
            $('#error_emp_code').empty();
            // $('#error_emp_code').html('Employee Id is required');
            $('#emp_id').focus();
        } else {
            $.ajax({
                url: "<?php echo base_url('admin/Users/chk_emp_code_add'); ?>",
                dataType: "html",
                type: "POST",
                data: {
                    emp_code: emp_code
                },
                success: function(data) {
                    // alert(data);
                    if (data == 1) {
                        $('#error_emp_code').empty();
                        $('#error_emp_code').css('display','block');
                        $('#error_emp_code').html(
                            'Please add another employee code this code assign to a user.');
                        $('#emp_id').focus();
                    } else {
                        // alert("Hii");
                        $('#error_emp_code').hide();
                    }
                }
            });
        }
    }
 

   
    function checkmail() {
        // var mobileno=$("#mobileno").val();
        var x = $("#email").val();

        var datastring = 'email_id=' + x;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Users/check_existmail_add'); ?>",
            cache: false,
            data: datastring,
            success: function (data) {
                // console.log(data);
                // alert(data);
                if (data == 1) {
                    $('#sign-in-button').prop('disabled', true);
                    $("#mail_error").html('Email is already exist');
                } else {
                    $('#sign-in-button').prop('disabled', false);
                    $("#mail_error").html('');
                }
            }
        });
    }
    $(document).ready(function() {
        $('#UserForm')
            // .find('[name="gender"]')
            // .multiselect()
            // .end()
            // .find('[name="module_ids"]')
            // .multiselect({
            //     // Re-validate the multiselect field when it is changed
            //     onChange: function(element, checked) {
            //         $('#UserForm').bootstrapValidator('revalidateField', 'module_ids');
            //     }
            // })
            // .end()
            .bootstrapValidator({
                // Exclude only disabled fields
                // The invisible fields set by Bootstrap Multiselect must be validated
                excluded: ':disabled',
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Email ID.'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    // gender: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'The gender is required'
                    //         }
                    //     }
                    // },
                    'module_ids2[]': {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Modules'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Full Name'
                            }
                        }
                    },
                    fname: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter First Name'
                            }
                        }
                    },
                    lname: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Last Name'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Password'
                            }
                        }
                    },

                    mobile_no: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Mobile Number'
                            }
                        }
                    },
                    emp_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Emp Id'
                            }
                        }
                    }
                }
            });
    });
    $(document).ready(function(e) {
        $("#UserForm").on('submit', (function(e) {
            if (e.isDefaultPrevented()) {

            } 
            else 
            {
                $.ajax({
                    url: "<?php echo base_url('admin/Users/Add_user'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(function() {
                            // new PNotify({
                            //     title: 'Add User',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $("#User-view").modal('hide');
                            $("#successModalManageUser").modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location =
                        //         "<?php echo base_url('admin/Users'); ?>";
                        // }, 1000);

                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }    
            return false;

        }));
    });

    $('#user_department').change(function() {
        getDesignation($('#user_department').val());
    });

    function getDesignation(country_id) {

        var datastring = 'country_id=' + country_id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/dashboard/getDesignation'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {

                $('#user_designation').html(data);
            },
            error: function() {
                // alert('Error while request..');
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#home_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
    var a = 0;
    //binds to onchange event of your input field
    $('#imgInp').bind('change', function() {

        var ext = $('#imgInp').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('#error1').slideDown("slow");
            $('#error2').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#error2').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error2').slideUp("slow");
            }
            $('#error1').slideUp("slow");

        }
    });
    function open_user_view(count) {
        
        var no_of_user = Number($("#no_of_user").val());
        var no_of_user_exist = Number($("#no_of_user_exist").val());
        
        if (no_of_user_exist <= no_of_user) 
        {
            $(function () {
                // new PNotify({
                //     title: 'User Restriction',
                //     text: 'Maximum No. of user has reached. Please ugrade plan or contact buroforce admin',
                //     type: 'warning',
                //     delay: 700
                // });
                $('#User-view').modal('show');


            });
        } 
        else 
        {
            $('#RestrictModal').modal('show');
            
        }
    }
</script>

<script>
    function cancel_verification (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deactivateconfirmationModal').modal('show');
    };
    function confirm_verification (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#activateconfirmationModal').modal('show');
    };
</script>

<script>
$(document).ready(function(e) 
{
  $("#deactivateForm").on('submit', (function(e) 
  {
    // alert("Hii");

    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/cancel_user'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("deactivateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#activateForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/confirm_user'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("activateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function cancel_approval (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#cancelconfirmationid').val(element.getAttribute("data-id"));
        $('#cancelconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_cancel_button_close()
    {
        $(".popover-body").css('display','block');
        $('#cancel_button_close').attr('data-dismiss', 'modal');
    }
    function update_approval (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#cancelconfirmationid').val(element.getAttribute("data-id"));
        $('#updateapprovalconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_update_button_close()
    {
        $(".popover-body").css('display','block');
        $('#update_button_close').attr('data-dismiss', 'modal');
    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#cancelconfirmationForm").on('submit', (function(e) 
  {
    // alert("Hii");

    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#cancelconfirmationid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/cancel_approval'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("cancelSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#updateapprovalForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#cancelconfirmationid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/update_approval'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("updateapprovalSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function cancel_login_permission (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#cancelloginpermissionid').val(element.getAttribute("data-id"));
        $('#cancelloginpermissionconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_cancel_login_permission (element) 
    {
        $(".popover-body").css('display','block');
        $('#cancel_login_permission_button').attr('data-dismiss', 'modal');
    };

    function update_login_permission (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#cancelloginpermissionid').val(element.getAttribute("data-id"));
        $('#updateloginpermissionModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_update_login_permission (element) 
    {
        $(".popover-body").css('display','block');
        $('#update_login_permission_button').attr('data-dismiss', 'modal');
    };
</script>

<script>
$(document).ready(function(e) 
{
  $("#cancelloginpermissionForm").on('submit', (function(e) 
  {
    // alert("Hii");

    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#cancelloginpermissionid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/cancel_login_permission'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("cancelloginpermissionSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#updateloginpermissionForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#cancelloginpermissionid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/update_login_permission'); ?>",
          cache: false,
          data: { "user_id": datastring },
          success: function(data) {
            $(function() {
              $("updateloginpermissionSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>


<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalManageUser" tabindex="-1" aria-labelledby="successModalManageUserLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalManageUserLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Resource Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="RestrictModal" tabindex="-1" aria-labelledby="RestrictModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="RestrictModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>User Restriction!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">The maximum number of resources has been reached. Please upgrade your plan or contact the Buroforce admin.</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateconfirmationModal" tabindex="-1" aria-labelledby="deactivateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deactivateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Resource?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deactivateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateconfirmationModal" tabindex="-1" aria-labelledby="activateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="activateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Resource?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="activateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Resource Inactived successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Resource Actived successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="cancelconfirmationModal" tabindex="-1" aria-labelledby="cancelconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="cancelconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Would you like to revoke the resource's permission to edit customer details?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="cancelconfirmationForm">
                        <input type="hidden" id="cancelconfirmationid" name="cancelconfirmationid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_cancel_button_close()" id="cancel_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateapprovalconfirmationModal" tabindex="-1" aria-labelledby="updateapprovalconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateapprovalconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">This will enable the resource from editing the contact detail. Do you really want to continue?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="updateapprovalForm">
                        <input type="hidden" id="cancelconfirmationid" name="cancelconfirmationid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_update_button_close()" id="update_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Confirmation cancel successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateapprovalSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Confirmation approved successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="cancelloginpermissionconfirmationModal" tabindex="-1" aria-labelledby="cancelloginpermissionconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="cancelloginpermissionconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Would you like to disable the employee's ability to see tasks?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="cancelloginpermissionForm">
                        <input type="hidden" id="cancelloginpermissionid" name="cancelloginpermissionid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_cancel_login_permission()" id="cancel_login_permission_button" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateloginpermissionModal" tabindex="-1" aria-labelledby="updateloginpermissionModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateloginpermissionModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">This will enable the resource to view all the task list. Do you really want to continue?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="updateloginpermissionForm">
                        <input type="hidden" id="cancelloginpermissionid" name="cancelloginpermissionid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" onclick="updateUI_update_login_permission()" id="update_login_permission_button" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelloginpermissionSucessModal" tabindex="-1" aria-labelledby="cancelloginpermissionSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="cancelloginpermissionSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Confirmation cancel successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateloginpermissionSucessModal" tabindex="-1" aria-labelledby="updateloginpermissionSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="updateloginpermissionSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Confirmation approved successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyManageTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        // order: [[1, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        
        "drawCallback": function() {
                popoverOptions = {
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.my-popover-content').html();
                },
                placement: 'bottom',
                container: 'body',
                html: true,
                sanitize: false,
                // selector: '[data-toggle="popover"]',
            };
            $('.panel-button').popover(popoverOptions);

            $('.panel-button').click(function (e) {
                e.stopPropagation();
            });
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
            });
        }
        
        // stateSave: true,
        // columnDefs: [
        //     {
        //         targets: -1,
        //         visible: true,
        //     }
        // ]
    } );
    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        rescheduleTable.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = rescheduleTable.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            rescheduleTable.column(i).visible(columnVisibility[i]);
        }
    }

    
});
</script>
<script>

        $(document).ready(function () {
       
        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $(document).click(function (e) {
            if ($(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>

<script type="text/javascript">
    var room = 0;

    function education_fields_edit() 
    {    
        room++;
        var objTo = document.getElementById('education_fields_edit')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "w-100 form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-md-12"><div class="form-group"><div class="row"><div class="col-md-5"><lable></lable><select class="form-control addSelect" name="edit_doc_type[]" id="edit_doc_type_"'+ room +' data-placeholder="Select Document Type"><option value="">Select Document Type</option><?php foreach ($doc_type as  $row2) {?><option value="<?= $row2->id; ?>"><?= $row2->doc_name; ?></option><?php } ?></select></div><div class="col-md-5"><lable></lable><input type="file" class="form-control" name="uploadfile['+ room +']" style="padding:4px !important"></div><div class="col-md-2"><lable></lable><button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span></button></div></div></div></div>';
        objTo.appendChild(divtest)

        $('.addSelect').select2({
                dropdownParent: $("#modal_default1")
            });

        $('#add_new_form').bootstrapValidator('addField', 'productid[]');
        $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

<script>
     $('body').on('shown.bs.modal', '#modal_default1', function() {
        $(this).find('.addSelect').each(function() {
            $(this).select2({ dropdownParent: $('#modal_default1') });
        });
    });
</script>


<script>
    function Delete_document (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#document_id').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $('#get_document_details').modal('hide');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_document_button_close()
    {
        $(".popover-body").css('display','block');
        $('#delete_document_button_close').attr('data-dismiss', 'modal');
    }
</script>
<script>
$(document).ready(function(e) 
{
  $("#deleteForm1").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        e.preventDefault();
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#document_id").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Users/delete_document'); ?>",
          cache: false,
          data: { "document_id": datastring },
          success: function(data) 
          {
            $(function() 
            {
                $('#deleteconfirmationModal').modal('hide');
                $("#deleteSucessModal").modal('show');
            });
          },
          error: function() {
            // alert('Error while request..');
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this document?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteForm1">
                        <input type="hidden" id="document_id" name="document_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_document_button_close()" id="delete_document_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
