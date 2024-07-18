
<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    .ui-pnotify{
        position: absolute; 
        top:50%;
        left:50%;
        transform: translate(-50%);
    }

    #Terms-Conditions .flex-form-group .col-sm-11{
        flex: 0 0 90%;
        max-width: 90%;
    }
    #Terms-Conditions .flex-form-group .col-sm-1{
        flex: 0 0 10%;
        max-width: 10%;
    }
    
</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Task Type List (<?= COUNT($activity_type_list)?>)</h4>
                        <!-- <h4 class="green-text">(<?= COUNT($activity_type_list)?>)</h4> -->
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Activity-Type-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Task List (<?= COUNT($activity_list)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Activity-Type"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>

                        <a href="<?= base_url() ?>admin/Schedule_visit_type"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Business Segment (<?= COUNT($business_segment)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Business-Segment"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/businesslist"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Branch (<?= COUNT($branch)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#BranchPopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/branch_master"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Contact Type List (<?= COUNT($contact_type)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Contact-Type-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/typelist"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Credit Term (<?= COUNT($credit_term)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Credit-Term"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/CreditTerm'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Expenses (<?= COUNT($expense)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#ExpensePopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Expense"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Groups (<?= COUNT($group)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#GroupsPopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/grouplist"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Location (<?= COUNT($location)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#LocationPopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Master/locationlist'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Order Status List (<?= COUNT($order_status)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Order-Status-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Ecommerce/status"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Project Milestone</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Designation-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="#"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Source List (<?= COUNT($source_list)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Source-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Leads"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Stage List (<?= COUNT($stage_list)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Stage-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Leads/Stage"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Target Type List (<?= COUNT($target_type_list)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Target-Type-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Target/target_type"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Terms & Conditions (<?= COUNT($term_conditions)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Terms-Conditions"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/TermConditions">
                        <button type="button" class="commom-btn" style="width: 115px;display: flex;justify-content: space-between;"><span class="m-p-5">View</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Thoughts (<?= COUNT($thought)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#ThroughtsPopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Thoughts"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Target List (<?= COUNT($target_list)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#TargetPopup"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Target"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Archive Target List (<?= COUNT($archive_target)?>)</h4>
                    </div>
                    <div class="card-footer master-btn" style="justify-content:center;">
                        
                        <a href="<?= base_url() ?>admin/Target/archive_target"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Time Slot (<?= COUNT($timeslot)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addTimeGap"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/time_list"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Notify By (<?= COUNT($notifyby)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addNotifyBy"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/NotifyBy"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Frequency Type (<?= COUNT($freq_type)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addFreqtype"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/FrequencyType"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Frequency Wise Report (<?= COUNT($freq_wise_report)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addfreqreport"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Master/FrequencywiseReport'); ?>"><button type="button" class="commom-btn">
                            <span class="m-p-5">View</span>
                            <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Document Type (<?= COUNT($doc_type)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addDoctype"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/DocumentType"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Event Notify By (<?= COUNT($event_notify)?>)</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#addeventnotify"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Master/EventNotify'); ?>"><button type="button" class="commom-btn">
                            <span class="m-p-5">View</span>
                            <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="Activity-Type-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Task Type List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="form-horizontal" id="ScheduleForm1">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Task Type  <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="schedule_type" name="schedule_type" placeholder="Enter Task Type" maxlength="50" onkeyup="chk_activity_type_list()">
                                <small id="error_activity_type_list" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-right: 20px;">
                        <button type="submit" class="btn btn-primary" id="act_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="Activity-Type" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Task List </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="ScheduleForm2">

                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Task Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Enter Task Title" maxlength="50" onkeyup="chk_activity_list()">
                                <small id="error_activity_list" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0;">
                            <button type="submit" class="btn btn-primary" id="act_list_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Business-Segment" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Business Segment</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="BusinessForm">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Business Segment Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Business Segment Title" maxlength="50" autocomplete="off" onkeyup="chk_business_segment()">
                                <small id="error_business_segment" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 5px;padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="business_segment_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="bf_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="BranchPopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Branch</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="branchform">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Branch Name <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" maxlength="50" onkeyup="chk_branch()">
                                <small id="error_branch" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px;padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="branch_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="branch_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Contact-Type-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Contact Type List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TypeForm3">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Contact Type Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Contact Type Title" maxlength="50" onkeyup="chk_contact_type()">
                                <small id="error_contact_type" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-right: 10px;padding-bottom: 0;">
                            <button type="submit" class="btn btn-primary" id="contact_type_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="ctype_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Credit-Term" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Credit Term</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addCreditTerm">
                        <div class="form-group">
                            <label>Credit Name  <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="credit_name" id="credit_name" placeholder="Enter Credit Name" onkeyup="chk_credit_name()">
                            <small id="error_credit_name" style="color: #f00 !important;"></small>
                        </div>
                        <div class="form-group" data-autoclose="true">
                            <label>Credit Days  <sup style="color: red">*</sup></label>
                            <input type="tel" class="form-control" name="credit_days" placeholder="Enter Credit Days" id="credit_days" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" onkeyup="chk_credit_days()">
                            <small id="error_credit_days" style="color: #f00 !important;"></small>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="credit_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="credit_term_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="ExpensePopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Expenses</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addExpense">
                        <div class="form-group">
                            <label>Expense Name  <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="expense_name" id="expense_name" placeholder="Enter Expense Name" onkeyup="chk_expense()">
                            <small id="error_expense" style="color: #f00 !important;"></small>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="expense_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="expense_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="GroupsPopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Groups</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="GroupForm">
                        <div class="form-group">
                            <label class="control-label col-sm-12 p-0" for="email">Group Name <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter Group Name" maxlength="50" onkeyup="chk_group()">
                                <small id="error_group" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="group_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="group_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="LocationPopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Location</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="LocationForm">
                        <div class="form-group">
                            <label class="control-label col-sm-12 p-0" for="email">Location <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" maxlength="50" onkeyup="chk_location()">
                                <small id="error_location" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="location_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="group_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Order-Status-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Order Status List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="StatusForm">
                        <div class="form-group">
                            <label class="control-label col-sm-12 p-0" for="email">Order Status Name <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="status_name" name="status_name" placeholder="Enter Order Status Name" maxlength="15" onkeyup="chk_order_status()">
                                <small id="error_order_status" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="order_status_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="order_status_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Source-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Source List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TargetTypeForm">
                        <div class="form-group">
                            <label class="control-label col-sm-12 p-0" for="email">Source Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="source_title" name="source_title" placeholder="Enter Source Title" maxlength="50" onkeyup="chk_source_list()">
                                <small id="error_source_list" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="source_list_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="source_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Stage-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Stage List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TargetTypeForm1">
                        <div class="form-group">
                            <label class="control-label col-sm-12 p-0" for="email">Stage Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control" id="stage_title" name="stage_title" placeholder="Enter Stage Title" maxlength="50" onkeyup="chk_stage_list()">
                                <small id="error_stage_list" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="stage_list_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="stage_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Target-Type-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Target Type List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TargetTypeForm2">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Target Type <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="target_type" name="target_type" placeholder="Enter Target Type" maxlength="50" onkeyup="chk_target_type_list()">
                                <small id="error_target_type_list" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="form-group" id="prd_grp">
                            <label class="control-label col-sm-12" for="email">Select UOM <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select class="form-control" name="uom_type" id="uom_type_7" data-placeholder="Select UOM">
                                    <option value="">Select UOM</option>
                                    <?php
                                    foreach ($get_data->result() as $uom) {
                                    ?>
                                        <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="float-right" style="padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="target_type_list_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="stage_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="Terms-Conditions" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Terms & Conditions</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addTermsConditions">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Term For  <sup style="color: red">*</sup></label>
                                    <input type="text" name="term_for" id="term_for" class="form-control" placeholder="E.g. Tally" onkeyup="chk_term_condition()">
                                    <small id="error_term_for" style="color: #f00 !important;"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row flex-form-group" style="align-items:flex-start;">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label>Terms & Conditions <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="terms1" name="terms[]" placeholder="Enter Terms & Condition">
                                </div>
                            </div>
                            <div class="col-sm-1" style="padding-left: 0;padding-right: 0;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success addButton" id="attachSupport" style="margin-top:28px;"><i class="icon-add"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="moreSupportUpload"></div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="termcon_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="preview_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="ThroughtsPopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Thoughts</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addform2">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter Thought <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="thought" id="thought" rows="2" maxlength="500" placeholder="Enter Thought" onkeyup="chk_thought()"></textarea>
                                    <small id="error_thought" style="color: #f00 !important;"></small>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="thought_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="preview_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="TargetPopup" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Target List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="Target_Form123">

                        <div class="row">

                            <div class="d-flex col-12">
                                <div class="form-group col-6 p-0">
                                    <label class="control-label col-sm-6" for="Youtube">Target Period <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" data-placeholder="Select Target Period" name="target_period" id="target_period" onchange="mainInfo()">
                                            <option value="">Select Target Period</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Fortnightly">Fortnightly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Half Yearly">Half Yearly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="control-label col-sm-6" for="Youtube">Recurring Count </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="recurring_cnt" placeholder="Enter Recurring Count" name="recurring_cnt" value="1" onkeyup="mainInfo()">
                                    </div>
                                </div>
                            </div>

                            <div id="onchange_display" style="display: none">
                                <div class="d-flex col-12 row pl-4">
                                    <div class="form-group col-6 p-0">

                                        <label>Start Date <span style="color: red;">*</span></label> 
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                            </span>
                                            <!-- <input type="text" class="form-control pickadate-selectors rounded-right" id="start_date" name="start_date" onchange="startdate_result()" value="<?= date("d F Y") ?>"> -->
                                            <input type="text" class="form-control add-activity-selectors rounded-right" id="start_date" name="start_date" onchange="startdate_result()" value="<?= date('d F, Y'); ?>">

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>End Date <span style="color: red;">*</span></label></label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                            </span>
                                            <input type="text" class="form-control rounded-right" id="end_date" name="end_date" onchange="enddate_result()" readonly>
                                            <input type="text" style="display: none" class="form-control add-activity-selectors rounded-right" id="end_date1" name="end_date1" onchange="enddate_result()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6" >
                                <label class="control-label col-sm-12" for="Youtube">Target Type <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control select2" onchange="mainInfo1()" name="targettype_id" id="targettype_id" onchange="mainInfo1()" data-placeholder="Select Target Type">
                                        <option value="">Select Target Type</option>
                                        <?php
                                        foreach ($target_type->result() as $value2) { ?>
                                            <option value="<?= $value2->targettype_id ?>">
                                                <?= $value2->target_type ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="issuelistdetails">
                            <!-- <div id="issuelistdetails" style="display: none"> issue_schedule_list-->
                                <input class="form-control" type="hidden" id="name_values" name="name_values">
                                <input class="form-control" type="hidden" id="checked_index" name="checked_index">
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-12" id="issuelistdetailsshow" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right" style="padding-right:20px;">
                            <button type="submit" class="btn btn-primary" id="desktopbutton">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="preview_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addTimeGap" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Time Slot</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TimeForm">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-12 p-0" for="email">Time Slot <span style="color: red;">*</span></label>
                                    <div class="col-sm-12 p-0">
                                        <input type="text" class="form-control" id="time_slot" name="time_slot" placeholder="Enter Time Slot Ex. 00:15 In 24Hrs" onkeyup="chk_time_slot()" pattern="\d{2}:\d{2}">
                                        <small id="error_time_slot" style="color: #f00 !important;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" id="time_slot_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="time_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addNotifyBy" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Notify By</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="insertNotifyBy">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                    <div class="col-sm-12 ">
                                        <input type="text" class="form-control" id="notify_by" name="notify_by" placeholder="Enter Notify By Ex. Eamil,SMS,Whast's UP" onkeyup="chk_notify_by()">
                                        <small id="error_notify_by" style="color: #f00 !important;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right" style="padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="notify_by_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="time_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addFreqtype" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Frequency Type</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="insertFreq">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="email">Frequency Name <span style="color: red;">*</span></label>
                                    <div class="col-sm-12 ">
                                        <input type="text" class="form-control" id="freq_name" name="freq_name" placeholder="Enter Freqency Name" onkeyup="chk_freq_type()">
                                        <small id="error_freq_type" style="color: #f00 !important;"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="email">Frequency Set <sup style="color: red">*</sup></label>
                                    <div class="col-sm-12 ">
                                        <div class="d-flex align-items-center"> 
                                        <!-- <div class="d-flex align-items-center">  -->
                                            <!-- <input type="number" class="form-control mr-3" value="1" name = "freq_no"style="width: 65px;"/> -->
                                            <select name="freq_type" id="freq_type" data-placeholder="Select Frequency Type" onchange="chk_freq_type_name()">
                                                <option value="">Select Frequency Type</option>
                                                <option value="daily">Daily</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="yearly">Yearly</option>
                                            </select>
                                        </div>
                                        <small id = "error_freq_type_name" style="color: #f00 !important;"></small>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                        <div class="float-right" style="padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="freq_type_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="time_upload"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addfreqreport" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Frequency Wise Report</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <form class="form-horizontal" id="insertFreqwiseReport">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Frequency Type  <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <select name="freq" id="freq" data-placeholder="Select Frequency Type">
                                    <option value="">Select Frequency Type</option>
                                    <?php
                                        foreach ($freq_type as $value) 
                                        { ?>
                                            <option value="<?= $value->id ?>"><?= $value->frequency_name ?></option>
                                    <?php  
                                        } 
                                    ?>
                                </select>
                                <small id="error_freq_type" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Report Type  <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <select name="report" id="report" data-placeholder="Select Report Type">
                                    <option value="">Select Report Type</option>
                                    <option value="Product Lead">Product Lead</option>
                                    <option value="Monthly Lead">Monthly Lead</option>
                                    <option value="User Lead">User Lead</option>
                                    <option value="Sales Force Score">Sales Force Score</option>
                                    <option value="Sales Segment">Sales Segment</option>
                                    <option value="Sales Product">Sales Product</option>
                                    <option value="Time Slot">Time Slot</option>
                                    <option value="Resource Task">Resource Task</option>
                                    <option value="Task Mapping">Task Mapping</option>
                                    <option value="Target Overview">Target Overview</option>
                                    <option value="Task Today">Task Today</option>
                                </select>
                                <small id="error_report_type" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Starting Date  <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date_report" id="start_date_report" placeholder="Please Select Starting Date" autocomplete="off">
                                <small id="error_start_date_report" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Ending Date <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0">
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date_report" id="end_date_report" placeholder="Please Select Ending Date" autocomplete="off" onchange="checkvalidationdate()">
                            </div>
                            <small id="error_end_date_report" style="display:none;color: #f00 !important;">Ending date can not be less than start date</small>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 p-0" for="email">Schedule Time  <span style="color: red;">*</span></label>
                            <div class="col-sm-12 p-0 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" id="schedule_time" name="schedule_time" placeholder="Select Schedule Time"  autocomplete="off" readonly>
                                <span id="error_schedule_time" style="color:red; font-size: 12px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-right: 20px;">
                        <button type="submit" class="btn btn-primary" id="freqwise_report_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addDoctype" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Document Type</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="documentform">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Document Name <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="Enter Document Name" maxlength="50" onkeyup="chk_document()">
                                <small id="error_document" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px;padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="doc_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="branch_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addeventnotify" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Event Notify</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="event_notify_form">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Event Notify Name <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="event_notify_name" name="event_notify_name" placeholder="Enter Event Notify Name" maxlength="50" onkeyup="chk_event_notify()">
                                <small id="error_event_notify" style="color: #f00 !important;"></small>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px;padding-right: 10px;">
                            <button type="submit" class="btn btn-primary" id="event_notify_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="branch_preview"></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('Admin/includes/n-footer'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#ScheduleForm1').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    schedule_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Task Type'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#ScheduleForm1").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $("#preview").show();
                    $("#preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
                    );

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_schedule'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Activity-Type-List").modal('hide');
                                $("#successModalActivityTypeList").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master'); ?>";
                            // }, 1000);


                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });

        $(document).ready(function() {
            $('#ScheduleForm2').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    type_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Task Title'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#ScheduleForm2").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Schedule_visit_type/add_type'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Activity-Type").modal('hide');
                                $("#successModalActivityList").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Schedule_visit_type'); ?>";
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

        $(document).ready(function() {
            $('#BusinessForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    business_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Business Segment Title'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#BusinessForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $("#bf_preview").show();
                    $("#bf_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
                    );

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_business'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#bf_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Segment',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Business-Segment").modal('hide');
                                $("#successModalBusinesssegment").modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/businesslist'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });

        $(document).ready(function() {
            $('#branchform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    branch_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Branch Name'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#branchform").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $("#branch_preview").show();
                    $("#branch_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_branch'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#branch_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Order Status Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Business-Segment").modal('hide');
                                $("#successModalBranch").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/branch_master'); ?>";
                            // }, 1000);


                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });

        $(document).ready(function() {
            $('#TypeForm3').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Contact Type Title'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#TypeForm3").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#ctype_preview").show();
                    $("#ctype_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_type'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#ctype_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Contact-Type-List").modal('hide');
                                $("#successModalContactType").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/typelist'); ?>";
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

        $(document).ready(function() {
            $('#addCreditTerm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    credit_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Credit Name'
                            }
                        }
                    },
                    credit_days: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Credit Days'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#addCreditTerm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview_upload").show();
                    $("#preview_upload").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );

                    $.ajax({
                        url: "<?php echo base_url('admin/CreditTerm/AddCreditTerm'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview_upload").hide();
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Credit Term',
                                //     text: 'Added Successfully !!',
                                //     type: 'success'
                                // });
                                $("#Credit-Term").modal('hide');
                                $("#successModalCreditTerm").modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url(); ?>admin/CreditTerm";
                            // }, 1000);
                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');

                        }
                    });
                }
                return false;
            }));
        });

        $(document).ready(function() {
            $('#addExpense').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    expense_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Expense Name'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#addExpense").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#expense_preview").show();
                    $("#expense_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $.ajax({
                        url: "<?php echo base_url('admin/Expense/add_expense'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#expense_preview').hide();
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Expense',
                                //     text: 'Expense Added Successfully',
                                //     type: 'success'
                                // });
                                $("#ExpensePopup").modal('hide');
                                $("#successModalExpenses").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url(); ?>admin/Expense";
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

        $(document).ready(function() {
            $('#GroupForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    group_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Group Name'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#GroupForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#group_preview").show();
                    $("#group_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_group'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#group_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#GroupsPopup").modal('hide');
                                $("#successModalGroups").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/grouplist'); ?>";
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

        $(document).ready(function() {
            $('#LocationForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Location'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#LocationForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_location'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                // new PNotify({
                                //     title: 'Add Location',
                                //     text: 'Location Added Successfully',
                                //     type: 'success',
                                  
                                // });
                                $("#LocationPopup").modal('hide');
                                $("#successModalLocation").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/locationlist'); ?>";
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

        $(document).ready(function() {
            $('#StatusForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    status_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Order Status Name'
                            }
                        }
                    }
                }
            });
        });
        $(document).ready(function(e) {
            $("#StatusForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#order_status_preview").show();
                    $("#order_status_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $.ajax({
                        url: "<?php echo base_url('admin/Ecommerce/add_status'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#order_status_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Order Status Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Order-Status-List").modal('hide');
                                $("#successModalOrderStatus").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Ecommerce/status'); ?>";
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

        $(document).ready(function() {
            $('#TargetTypeForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    source_title: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Source Title'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#TargetTypeForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#source_preview").show();
                    $("#source_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/add_source'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#source_preview').hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Source-List").modal('hide');
                                $("#successModalSourceList").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Leads'); ?>";
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

        $(document).ready(function() {
            $('#TargetTypeForm1').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    stage_title: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Stage Title'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#TargetTypeForm1").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#stage_preview").show();
                    $("#stage_preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/add_stage'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#stage_preview").hide();
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Stage-List").modal('hide');
                                $("#successModalStageList").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Leads/Stage'); ?>";
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

        $(document).ready(function() {
            $('#TargetTypeForm2').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    target_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Target Type'
                            }
                        }
                    },
                    uom_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select UOM'
                            }
                        }
                    },
                }
            });
        });

        $(document).ready(function(e) {
            $("#TargetTypeForm2").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Target/add_targettype'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                // new PNotify({
                                //     title: 'Add Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Target-Type-List").modal('hide');
                                $("#successModalTargetTypeList").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Target/target_type'); ?>";
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

        var cheque_number = 1;
        $('#attachSupport').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag +=
                '<div class="form-group row"><div class="col-sm-11"><input type="text" class="form-control" id="terms' +
                cheque_number + '" name="terms[]" placeholder="Enter Terms & Condition"></div><div class="col-sm-1" style="padding-left: 0;padding-right: 0;" ><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
                cheque_number + ')"><i class=" icon-trash"></i></button></div></div>';
            $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
            cheque_number++;
        });

        function del_file(eleId) {
            var ele = document.getElementById("delete_file" + eleId);
            ele.parentNode.removeChild(ele);
        }

        $(document).ready(function() {
            termsvalidator = {
                    row: '.col-md-12',
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Term & Condition '
                        }
                    }
                },
                $('#addTermsConditions')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        'terms[]': termsvalidator,
                        term_for: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Terms for'
                                }
                            }
                        },
                    }
                })
                // Add button click handler
                .on('click', '.addButton', function() {})
                // Remove button click handler
                .on('click', '.removeButton', function() {});
        });

        $(document).ready(function(e) {
            $("#addTermsConditions").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview_upload").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $("#preview_upload").show();
                    $.ajax({
                        url: "<?php echo base_url('admin/TermConditions/Add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview_upload").hide();
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Term | Condition',
                                //     text: 'Added Successfully !!',
                                //     type: 'success'
                                // });
                                $("#Target-Type-List").modal('hide');
                                $("#successModalTermsandCondition").modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/TermConditions'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;
            }));
        });

        $(document).ready(function() {
            $('#addform2').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    thought: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Thought'
                            }
                        }
                    }
                }
            });
        });
        $(document).ready(function(e) {
            $("#addform2").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('admin/Thoughts/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Thought',
                                //     text: 'Thought Added Successfully',
                                //     type: 'success'
                                // });
                                $("#ThroughtsPopup").modal('hide');
                                $("#successModalThoughts").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Thoughts'); ?>";
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

        function mainInfo() {
            var startDate = document.getElementById("start_date").value;
            var recurring_cnt = document.getElementById("recurring_cnt").value;
            // alert(recurring_cnt);
            $('#onchange_display').show();
            $('#onchange_display').css("display", "contents");
            if (startDate != '') {
                var target_period = document.getElementById("target_period").value;
                var date = new Date(startDate);
                var newdate = new Date(date);
                if (target_period == 'Daily') {
                    if (recurring_cnt > 1) {
                        var add_days = recurring_cnt - 1;
                        // alert(add_days);  
                        newdate.setDate(newdate.getDate() + add_days);
                    } else {
                        // alert('else');
                        newdate.setDate(newdate.getDate() + 0);
                    }

                    // var add_days='0';
                } else if (target_period == 'Weekly') {
                    var cnt1 = recurring_cnt * 7 - 1;
                    // var add_days=cnt1-1; 
                    // alert(add_days);  
                    newdate.setDate(newdate.getDate() + cnt1);
                } else if (target_period == 'Fortnightly') {
                    var cnt1 = recurring_cnt * 15 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='15';
                } else if (target_period == 'Monthly') {
                    var cnt1 = recurring_cnt * 29 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Quarterly') {
                    var cnt1 = recurring_cnt * 90 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Half Yearly') {
                    var cnt1 = recurring_cnt * 182 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Yearly') {
                    var cnt1 = recurring_cnt * 365 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                }

                if (target_period == 'Daily') {
                    var endDate = document.getElementById("end_date").value;
                } else {
                    var endDate = document.getElementById("end_date1").value;
                }

                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];

                var dd = newdate.getDate();
                var mm = newdate.getMonth();
                var y = newdate.getFullYear();

                const d = mm;
                var full_month = monthNames[d];

                var someFormattedDate = dd + ' ' + full_month + ', ' + y;
                // alert(someFormattedDate);
                if (target_period == 'Daily') {
                    $('#end_date1').hide();
                    $('#end_date').show();
                    document.getElementById('end_date').value = someFormattedDate;
                } else {
                    $('#end_date').hide();
                    $('#end_date1').show();
                    document.getElementById('end_date1').value = someFormattedDate;
                }


                // alert(startDate);
                // return result;

                if ((Date.parse(startDate) == Date.parse(endDate))) {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();

                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').css('display','block');
                                // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);
                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;
                    } else {
                        $('#issuelistdetails').hide();
                    }
                    // alert();

                } 
                // else if ((Date.parse(startDate) > Date.parse(endDate))) {

                //     $('#desktopbutton').prop('disabled', true);
                //     // new PNotify({
                //     //     title: 'Event',
                //     //     text: 'End date should be greater than Start date',
                //     //     type: 'warning'
                //     // });
                //     $('#alertTragetlistdateModal').modal('show');


                // } 
                else {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();
                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                               // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;
                    } else {
                        $('#issuelistdetails').hide();
                    }
                }
            }
        }

        function mainInfo1() {
            
            var startDate = document.getElementById("start_date").value;

            // alert(startDate);
            $('#onchange_display').show();
            $('#onchange_display').css("display", "contents");
            if (startDate != '') {
                var target_period = document.getElementById("target_period").value;
                // alert(target_period);

                var date = new Date(startDate);
                var newdate = new Date(date);

                if (target_period == 'Daily') {
                    var endDate = document.getElementById("end_date").value;
                } else {
                    var endDate = document.getElementById("end_date1").value;
                }

                
                // return result;
                // alert(startDate);
                // alert(endDate);
                

                if ((Date.parse(startDate) == Date.parse(endDate))) {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();
                    
                    // alert(targettype_id);
                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        //alert(targettype_id);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            // dataType : "json",
                            // data : {"start_date" : start_date, "end_date" : end_date, 'targettype_id' : targettype_id},
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').show();
                                // $('#issuelistdetailsshow').css('display','block');
                                $('#issuelistdetailsshow').html(data);
                                // $('#issuelistdetails').html(data);
                            },
                            error: function() {
                                alert('data123');
                                alert('Error while request..');
                            }
                        });
                        return false;

                    } else {
                        $('#issuelistdetailsshow').hide();
                    }
                    // alert();

                } else if ((Date.parse(startDate) > Date.parse(endDate))) {

                    $('#desktopbutton').prop('disabled', true);
                    // new PNotify({
                    //     title: 'Event',
                    //     text: 'End date should be greater than Start date',
                    //     type: 'warning'
                    // });
                    $('#alertTragetlistdateModal').modal('show');

                    

                } 
                else 
                {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();
                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        console.log(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;
                    } else {
                        $('#issuelistdetailsshow').hide();
                    }
                }
            }
        }

        $(document).ready(function() {
            $('#Target_Form123').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    start_date: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Start Date'
                            }
                        }
                    },
                    end_date: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter End Date'
                            }
                        }
                    },

                    targettype_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Target Type'
                            }
                        }
                    },

                    recurring_cnt: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Recurring Count'
                            }
                        }
                    },

                    target_period: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Target Period'
                            }
                        }
                    },

                    emailid: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required.'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'The value is not a valid email address'
                            }
                        }
                    }
                }
            });
        });

        
        $(document).ready(function(e) {
            $("#Target_Form123").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                   
                } 
                else 
                {
                    var pos = [];
                    $(".day").each(function(i) {
                        if (this.checked) 
                        {
                            // alert("Checkbox at index " + i + " is checked.");
                            pos.push(i);
                        }
                    });

                    // $('#checked_index').val(pos);

                    // // alert(pos);
                    // var values = [];
                    // $('input[type=checkbox]:checked').each(function(index) {
                    //     var id = $(this).val();
                    //     values.push(id);
                    // });
                    // alert(values);
                    // var datastring='areaid='+values;
                    // $('#name_values').val(values);
                    // alert(datastring);
                    $.ajax({
                        url: "<?php echo base_url('admin/Target/add_target'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 0) {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Add Form',
                                    //     text: 'Please tick the checkbox / fill necessary value',
                                    //     type: 'warning'
                                    // });
                                    $("#checkboxModal").modal('show');
                                });
                            } else {

                                $(function() {
                                    // new PNotify({
                                    //     title: 'Add Form',
                                    //     text: 'Target added successfully',
                                    //     type: 'success'
                                    // });
                                    $("#TargetPopup").modal('hide');
                                    $("#successModalTargetList").modal('show');
                                });

                                // setTimeout(function() {
                                //     window.location =
                                //         "<?php echo base_url('admin/Target'); ?>";
                                // }, 1000);
                            }
                        },
                        error: function() {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });

        function startdate_result() {
            // alert();
            var startDate = document.getElementById("start_date").value;
            var recurring_cnt = document.getElementById("recurring_cnt").value;

            // alert(startDate);
            // $('#onchange_display').show();   
            if (startDate != '') {
                var target_period = document.getElementById("target_period").value;

                // alert(target_period);

                var date = new Date(startDate);
                var newdate = new Date(date);

                // alert(target_period);
                // if (target_period == 'Daily') {
                //     newdate.setDate(newdate.getDate() + 0);
                //     // var add_days='0';
                // } else if (target_period == 'Weekly') {
                //     newdate.setDate(newdate.getDate() + 7);
                //     var add_days = '7';
                //     // $('#end_date').prop('readonly',true);
                //     // $('#end_date').attr('readonly',true);
                //     // alert(add_days);
                // } else if (target_period == 'Fortnightly') {
                //     newdate.setDate(newdate.getDate() + 15);
                //     // var add_days='15';
                // } else if (target_period == 'Monthly') {
                //     newdate.setDate(newdate.getDate() + 30);
                //     // var add_days='31';
                // }



                if (target_period == 'Daily') 
                {
                    if (recurring_cnt > 1) {
                        var add_days = recurring_cnt - 1;
                        // alert(add_days);  
                        newdate.setDate(newdate.getDate() + add_days);
                    } else {
                        // alert('else');
                        newdate.setDate(newdate.getDate() + 0);
                    }

                    // var add_days='0';
                } else if (target_period == 'Weekly') {
                    var cnt1 = recurring_cnt * 7 - 1;
                    // var add_days=cnt1-1; 
                    // alert(add_days);  
                    newdate.setDate(newdate.getDate() + cnt1);
                } else if (target_period == 'Fortnightly') {
                    var cnt1 = recurring_cnt * 15 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='15';
                } else if (target_period == 'Monthly') {
                    var cnt1 = recurring_cnt * 29 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Quarterly') {
                    var cnt1 = recurring_cnt * 90 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Half Yearly') {
                    var cnt1 = recurring_cnt * 182 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                } else if (target_period == 'Yearly') {
                    var cnt1 = recurring_cnt * 365 - 1;
                    newdate.setDate(newdate.getDate() + cnt1);
                    // var add_days='31';
                }


                if (target_period == 'Daily') {
                    var endDate = document.getElementById("end_date").value;
                } else {
                    var endDate = document.getElementById("end_date1").value;
                }

                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];

                var dd = newdate.getDate();
                var mm = newdate.getMonth();
                var y = newdate.getFullYear();

                const d = mm;
                var full_month = monthNames[d];

                var someFormattedDate = dd + ' ' + full_month + ', ' + y;
                // alert(someFormattedDate);
                if (target_period == 'Daily') {
                    $('#end_date1').hide();
                    $('#end_date').show();
                    document.getElementById('end_date').value = someFormattedDate;
                } else {
                    $('#end_date').hide();
                    $('#end_date1').show();
                    document.getElementById('end_date1').value = someFormattedDate;
                }
                $('#end_date').prop('readonly',true);
                

                if ((Date.parse(startDate) == Date.parse(endDate))) {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();

                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;

                    }
                    // alert();

                } 
                // else if ((Date.parse(startDate) > Date.parse(endDate))) {

                //     $('#desktopbutton').prop('disabled', true);
                //     // new PNotify({
                //     //     title: 'Event',
                //     //     text: 'End date should be greater than Start date',
                //     //     type: 'warning'
                //     // });
                //     $('#alertTragetlistdateModal').modal('show');


                // } 
                else {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();
                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;
                    } else {
                        $('#issuelistdetails').hide();
                    }
                }
            }
        }

        function enddate_result() {
            // alert();
            var startDate = document.getElementById("start_date").value;
            var end_date = document.getElementById("end_date").value;

            // alert(startDate);
            // $('#onchange_display').show();   
            if (end_date != '') {
                var target_period = document.getElementById("target_period").value;

                // alert(target_period);

                var date = new Date(startDate);
                var newdate = new Date(date);

                // alert(target_period);
                // if (target_period=='Daily') 
                // {
                //      newdate.setDate(newdate.getDate() + 0);
                //     // var add_days='0';
                // }
                // else if (target_period=='Weekly') 
                // {
                //      newdate.setDate(newdate.getDate() + 7);
                //     var add_days='7';
                //     // $('#end_date').prop('readonly',true);
                //     // $('#end_date').attr('readonly',true);
                //     // alert(add_days);
                // }
                // else if (target_period=='Fortnightly') 
                // {
                //      newdate.setDate(newdate.getDate() + 15);
                //     // var add_days='15';
                // }
                // else if (target_period=='Monthly') 
                // {
                //      newdate.setDate(newdate.getDate() + 30);
                //     // var add_days='31';
                // }


                if (target_period == 'Daily') {
                    var endDate = document.getElementById("end_date").value;
                } else {
                    var endDate = document.getElementById("end_date1").value;
                }

                // const monthNames = ["January", "February", "March", "April", "May", "June",
                //   "July", "August", "September", "October", "November", "December"
                // ];

                // var dd = newdate.getDate();
                // var mm = newdate.getMonth();
                // var y = newdate.getFullYear();

                // const d = mm;
                // var full_month = monthNames[d];

                // var someFormattedDate = dd + ' ' + full_month + ' ' + y;
                // // alert(someFormattedDate);
                // if (target_period=='Daily')
                // {
                //     $('#end_date1').hide(); 
                //     $('#end_date').show();  
                //     document.getElementById('end_date').value = someFormattedDate; 
                // }
                // else
                // {
                //   $('#end_date').hide();
                //   $('#end_date1').show(); 
                //   document.getElementById('end_date1').value = someFormattedDate;
                // }




                // alert(startDate);
                // return result;

                if ((Date.parse(startDate) == Date.parse(endDate))) {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();

                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;

                    } else {
                        $('#issuelistdetails').hide();
                    }
                    // alert();

                } else if ((Date.parse(startDate) > Date.parse(endDate))) {

                    $('#desktopbutton').prop('disabled', true);
                    // new PNotify({
                    //     title: 'Event',
                    //     text: 'End date should be greater than Start date',
                    //     type: 'warning'
                    // });
                    $('#alertTragetlistdateModal').modal('show');


                } else {
                    $('#desktopbutton').prop('disabled', false);
                    start_date = $('#start_date').val();
                    // end_date = $('#end_date').val();
                    if (target_period == 'Daily') {
                        var end_date = document.getElementById("end_date").value;
                    } else {
                        var end_date = document.getElementById("end_date1").value;
                    }
                    targettype_id = $('#targettype_id').val();
                    if (end_date != '' && targettype_id != '') {
                        var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
                            targettype_id;
                        // alert(datastring);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                            cache: false,
                            data: datastring,
                            success: function(data) {
                                // alert(data);
                                // $('#issuelistdetails').show();
                                $('#issuelistdetailsshow').html(data);


                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                        return false;
                    } else {
                        $('#issuelistdetails').hide();
                    }
                }
            }
        }

        $(document).ready(function() {
            $('#TimeForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    time_slot: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Time Slot'
                            }
                        }
                    }
                }
            });
        });
        $(document).ready(function(e) {
            $("#TimeForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_time'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#addTimeGap").modal('hide');
                                $("#successModalTime").modal('show');
                                
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/time_list'); ?>";
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

        $(document).ready(function() {
            $('#insertNotifyBy').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    notify_by: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Notify By'
                            }
                        }
                    }
                }
            });
        });
        $(document).ready(function(e) {
            $("#insertNotifyBy").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/insertNotifyBy'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#addNotifyBy").modal('hide');
                                $("#successModalNotifyBy").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Master/NotifyBy'); ?>";
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
    </script>
    <script>
        
        $(document).ready(function() {
            $('#insertFreq').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    freq_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Frequency Name'
                            }
                        }
                    },
                    freq_no: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Frequency Number'
                            }
                        }
                    },
                    freq_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Frequency Type'
                            }
                        }
                    },
                }
            });
        });
        $(document).ready(function(e) {
            $("#insertFreq").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/insertFreq'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                $("#addFreqtype").modal('hide');
                                $("#successModalFreqType").modal('show');
                            });
                        },
                        error: function() {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });
    </script>

    <script>
        $('#start_date_report').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'start_date_report');
        });
        $('#end_date_report').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'end_date_report');
        });

        $(document).ready(function() {
                $('.clockpicker').clockpicker().find('input').change(function() {
                    console.log(this.value);
                });
            });

        $('#schedule_time').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'schedule_time');
        });
    </script>

    <script>

        $(document).ready(function() {
            $('#insertFreqwiseReport').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    freq: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Frequency Type'
                            }
                        }
                    },
                    report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Report Type'
                            }
                        }
                    },
                    start_date_report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Starting Date'
                            }
                        }
                    },
                    end_date_report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Ending Date'
                            }
                        }
                    },
                    schedule_time: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Schedule Time'
                            }
                        }
                    },
                }
            });
        });
        $(document).ready(function(e) {
            $("#insertFreqwiseReport").on('submit', (function(e) {
            //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/insertFreqwiseReport'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $(function() {
                                $("#addfreqreport").modal('hide');
                                $("#successModalFreqWiseReport").modal('show');
                            });
                        },
                        error: function() {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
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
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalActivityTypeList" tabindex="-1" aria-labelledby="successModalActivityTypeListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalActivityTypeListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalActivityList" tabindex="-1" aria-labelledby="successModalActivityListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalActivityListabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task List Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Schedule_visit_type'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalBusinesssegment" tabindex="-1" aria-labelledby="successModalBusinesssegmentLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalBusinesssegmentLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Business Segment Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/businesslist'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalBranch" tabindex="-1" aria-labelledby="successModalBusinesssegmentLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalBusinesssegmentLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Branch Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/branch_master'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalContactType" tabindex="-1" aria-labelledby="successModalContactTypeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalContactTypeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Contact Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/typelist'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalCreditTerm" tabindex="-1" aria-labelledby="successModalCreditTermLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalCreditTermLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Credit Term Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/CreditTerm'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalExpenses" tabindex="-1" aria-labelledby="successModalExpensesLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalExpensesLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Expense Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalGroups" tabindex="-1" aria-labelledby="successModalGroupsLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalGroupsLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Group Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/grouplist'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalLocation" tabindex="-1" aria-labelledby="successModalLocationLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLocationLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Location Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalOrderStatus" tabindex="-1" aria-labelledby="successModalOrderStatusLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalOrderStatusLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Order Status Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Ecommerce/status'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalSourceList" tabindex="-1" aria-labelledby="successModalSourceListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalSourceListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Source Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalStageList" tabindex="-1" aria-labelledby="successModalStageListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalStageListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Stage Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/Stage'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTargetTypeList" tabindex="-1" aria-labelledby="successModalTargetTypeListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTargetTypeListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Target Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target/target_type'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTermsandCondition" tabindex="-1" aria-labelledby="successModalTermsandConditionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTermsandConditionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Term & Condition Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalThoughts" tabindex="-1" aria-labelledby="successModalThoughtsLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalThoughtsLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Thought Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Thoughts'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTime" tabindex="-1" aria-labelledby="successModalTimeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTimeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Time Slot Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/time_list'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalNotifyBy" tabindex="-1" aria-labelledby="successModalNotifyByLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalNotifyByLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Notify By Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTargetList" tabindex="-1" aria-labelledby="successModalTargetListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTargetListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Target Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertTragetlistdateModal" tabindex="-1" aria-labelledby="alertTragetlistdateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertTragetlistdateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Event</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">End date should be greater than Start date</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkboxModal" tabindex="-1" aria-labelledby="checkboxModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="checkboxModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Please tick the checkbox or fill necessary value</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Target'); ?>"> -->
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                <!-- </a> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalFreqType" tabindex="-1" aria-labelledby="successModalFreqTypeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalFreqTypeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Frequency Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/FrequencyType'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalFreqWiseReport" tabindex="-1" aria-labelledby="successModalFreqWiseReportLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalFreqWiseReportLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Frequency Wise Report Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/FrequencywiseReport'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#targettype_id').select2({
        tags: true,
		dropdownParent: $("#TargetPopup")
   });
   $('#target_period').select2({
        tags: true,
		dropdownParent: $("#TargetPopup")
   });
   $('#uom_type_7').select2({
        tags: true,
		dropdownParent: $("#Target-Type-List")
   });
   $('#freq_type').select2({
        tags: true,
		dropdownParent: $("#addFreqtype")
   });
   $('#freq').select2({
        tags: true,
		dropdownParent: $("#addfreqreport")
   });
   $('#report').select2({
        tags: true,
		dropdownParent: $("#addfreqreport")
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


<script>
    function chk_activity_type_list() 
    {
        activity_type_list = $('#schedule_type').val();
        if (activity_type_list == '') 
        {
            $('#error_activity_type_list').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_activity_type_list'); ?>",
                dataType: "html",
                type: "POST",
                data: {activity_type_list: activity_type_list},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_activity_type_list').empty();
                        $('#error_activity_type_list').css('display','block');
                        $('#error_activity_type_list').html('Please add another activity type, this type is already created.');
                        $("#act_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_activity_type_list').hide();
                    }
                }
            });
        }
    }

    function chk_activity_list()
    {
        activity_list = $('#type_name').val();
        if (activity_list == '') 
        {
            $('#error_activity_type_list').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_activity_list'); ?>",
                dataType: "html",
                type: "POST",
                data: {activity_list: activity_list},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_activity_list').empty();
                        $('#error_activity_list').css('display','block');
                        $('#error_activity_list').html('Please add another activity , this activity is already created.');
                        $("#act_list_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_activity_list').hide();
                    }
                }
            });
        }   
    }

    function chk_business_segment()
    {
        business_segment = $('#business_name').val();
        if (business_segment == '') 
        {
            $('#error_business_segment').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_business_segment'); ?>",
                dataType: "html",
                type: "POST",
                data: {business_segment: business_segment},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_business_segment').empty();
                        $('#error_business_segment').css('display','block');
                        $('#error_business_segment').html('Please add another business name , this business name is already created.');
                        $("#business_segment_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_business_segment').hide();
                    }
                }
            });
        }
    }

    function chk_branch()
    {
        branch = $('#branch_name').val();
        if (branch == '') 
        {
            $('#error_branch').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_branch'); ?>",
                dataType: "html",
                type: "POST",
                data: {branch: branch},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_branch').empty();
                        $('#error_branch').css('display','block');
                        $('#error_branch').html('Please add another branch, this branch is already created.');
                        $("#branch_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_branch').hide();
                    }
                }
            });
        }
    }
    
    function chk_contact_type()
    {
        title = $('#title').val();
        if (title == '') 
        {
            $('#error_contact_type').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_contact_type'); ?>",
                dataType: "html",
                type: "POST",
                data: {title: title},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_contact_type').empty();
                        $('#error_contact_type').css('display','block');
                        $('#error_contact_type').html('Please add another contact type, this contact type is already created.');
                        $("#contact_type_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_contact_type').hide();
                    }
                }
            });
        }
    }
    
    function chk_credit_name()
    {
        credit_name = $('#credit_name').val();
        
        if (credit_name == '') 
        {
            $('#error_credit_name').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_name'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_name: credit_name},
                success: function(data) 
                {
                   
                    if (data == 1) 
                    {
                        $('#error_credit_name').empty();
                        $('#error_credit_name').css('display','block');
                        $('#error_credit_name').html('Please add another credit name, this credit name is already created.');
                        $("#credit_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_name').hide();
                    }
                }
            });
        }
    }
    
    function chk_credit_days()
    {
        credit_days = $('#credit_days').val();
        if (credit_days == '') 
        {
            $('#error_credit_days').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_days'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_days: credit_days},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_credit_days').empty();
                        $('#error_credit_days').css('display','block');
                        $('#error_credit_days').html('Please add another credit days, this credit days is already created.');
                        $("#credit_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_days').hide();
                    }
                }
            });
        }
    }

    function chk_expense()
    {
        expense_name = $('#expense_name').val();
        if (expense_name == '') 
        {
            $('#error_expense').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_expense'); ?>",
                dataType: "html",
                type: "POST",
                data: {expense_name: expense_name},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_expense').empty();
                        $('#error_expense').css('display','block');
                        $('#error_expense').html('Please add another expense, this expense is already created.');
                        $("#expense_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_expense').hide();
                    }
                }
            });
        }
    }

    function chk_group()
    {
        group_name = $('#group_name').val();
        if (group_name == '') 
        {
            $('#error_group').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_group'); ?>",
                dataType: "html",
                type: "POST",
                data: {group_name: group_name},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_group').empty();
                        $('#error_group').css('display','block');
                        $('#error_group').html('Please add another group, this group is already created.');
                        $("#group_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_group').hide();
                    }
                }
            });
        }
    }

    function chk_location()
    {
        location_name = $('#location').val();
        
        if (location_name == '') 
        {
            $('#error_location').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_location'); ?>",
                dataType: "html",
                type: "POST",
                data: {location_name: location_name},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_location').empty();
                        $('#error_location').css('display','block');
                        $('#error_location').html('Please add another location, this location is already created.');
                        $("#location_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_location').hide();
                    }
                }
            });
        }
    }
    
    function chk_order_status()
    {
        status_name = $('#status_name').val();
        
        if (status_name == '') 
        {
            $('#error_order_status').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_order_status'); ?>",
                dataType: "html",
                type: "POST",
                data: {status_name: status_name},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_order_status').empty();
                        $('#error_order_status').css('display','block');
                        $('#error_order_status').html('Please add another order status, this order status is already created.');
                        $("#order_status_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_order_status').hide();
                    }
                }
            });
        }
    }

    function chk_source_list()
    {
        source_title = $('#source_title').val();
        
        if (source_title == '') 
        {
            $('#error_source_list').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_source_list'); ?>",
                dataType: "html",
                type: "POST",
                data: {source_title: source_title},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_source_list').empty();
                        $('#error_source_list').css('display','block');
                        $('#error_source_list').html('Please add another source , this source is already created.');
                        $("#source_list_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_source_list').hide();
                    }
                }
            });
        }
    }

    function chk_stage_list()
    {
        stage_title = $('#stage_title').val();
        
        if (stage_title == '') 
        {
            $('#error_stage_list').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_stage_list'); ?>",
                dataType: "html",
                type: "POST",
                data: {stage_title: stage_title},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_stage_list').empty();
                        $('#error_stage_list').css('display','block');
                        $('#error_stage_list').html('Please add another stage , this stage is already created.');
                        $("#stage_list_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_stage_list').hide();
                    }
                }
            });
        }
    }

    function chk_target_type_list()
    {
        target_type = $('#target_type').val();
        
        if (target_type == '') 
        {
            $('#error_target_type_list').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_target_type_list'); ?>",
                dataType: "html",
                type: "POST",
                data: {target_type: target_type},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_target_type_list').empty();
                        $('#error_target_type_list').css('display','block');
                        $('#error_target_type_list').html('Please add another target type , this target type is already created.');
                        $("#target_type_list_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_target_type_list').hide();
                    }
                }
            });
        }
    }
    function chk_thought()
    {
        thought = $('#thought').val();
        
        if (thought == '') 
        {
            $('#error_thought').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_thought'); ?>",
                dataType: "html",
                type: "POST",
                data: {thought: thought},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_thought').empty();
                        $('#error_thought').css('display','block');
                        $('#error_thought').html('Please add another thought , this thought is already created.');
                        $("#thought_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_thought').hide();
                    }
                }
            });
        }
    }

    function chk_time_slot()
    {
        
        time_slot = $('#time_slot').val();
        
        if (time_slot == '') 
        {
            $('#error_time_slot').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_time_slot'); ?>",
                dataType: "html",
                type: "POST",
                data: {time_slot: time_slot},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_time_slot').empty();
                        $('#error_time_slot').css('display','block');
                        $('#error_time_slot').html('Please add another time slot , this time slot is already created.');
                        $("#time_slot_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_time_slot').hide();
                    }
                }
            });
        }
    }
    function chk_notify_by()
    {
        
        notify_by = $('#notify_by').val();
        
        if (notify_by == '') 
        {
            $('#error_notify_by').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_notify_by'); ?>",
                dataType: "html",
                type: "POST",
                data: {notify_by: notify_by},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_notify_by').empty();
                        $('#error_notify_by').css('display','block');
                        $('#error_notify_by').html('Please add another notify type , this notify type is already created.');
                        $("#notify_by_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_notify_by').hide();
                    }
                }
            });
        }
    }

    function chk_term_condition()
    {
        term_for = $('#term_for').val();
        
        if (term_for == '') 
        {
            $('#error_term_for').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_term_condition'); ?>",
                dataType: "html",
                type: "POST",
                data: {term_for: term_for},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_term_for').empty();
                        $('#error_term_for').css('display','block');
                        $('#error_term_for').html('Please add another term, this term is already created.');
                        $("#termcon_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_term_for').hide();
                    }
                }
            });
        }
    }
    function chk_freq_type()
    {
        freq_type = $('#freq_name').val();
        
        if (freq_type == '') 
        {
            $('#error_freq_type').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_freq_type'); ?>",
                dataType: "html",
                type: "POST",
                data: {freq_type: freq_type},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_freq_type').empty();
                        $('#error_freq_type').css('display','block');
                        $('#error_freq_type').html('Please add another frequency name , this frequency name is already created.');
                        $("#freq_type_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_freq_type').hide();
                    }
                }
            });
        }
    }

    function chk_freq_type_name()
    {
        freq_type_name = $('#freq_type').val();
        
        if (freq_type_name == '') 
        {
            $('#error_freq_type_name').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_freq_type_name'); ?>",
                dataType: "html",
                type: "POST",
                data: {freq_type_name: freq_type_name},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_freq_type_name').empty();
                        $('#error_freq_type_name').css('display','block');
                        $('#error_freq_type_name').html('Please select another frequency type , this frequency type is already created.');
                        $("#freq_type_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_freq_type_name').hide();
                    }
                }
            });
        }
    }

    function chk_document()
    {
        doc_name = $('#doc_name').val();
        
        if (doc_name == '') 
        {
            $('#error_document').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_document'); ?>",
                dataType: "html",
                type: "POST",
                data: {doc_name: doc_name},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_document').empty();
                        $('#error_document').css('display','block');
                        $('#error_document').html('Please Enter another document type , this document type is already created.');
                        $("#doc_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_document').hide();
                    }
                }
            });
        }
    } 
    function chk_event_notify()
    {
        event_notify_name = $('#event_notify_name').val();
        
        if (event_notify_name == '') 
        {
            $('#error_event_notify').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_event_notify'); ?>",
                dataType: "html",
                type: "POST",
                data: {event_notify_name: event_notify_name},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_event_notify').empty();
                        $('#error_event_notify').css('display','block');
                        $('#error_event_notify').html('Please Enter another event notify name , this event notify name is already created.');
                        $("#event_notify_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_document').hide();
                    }
                }
            });
        }
    } 
</script>

<script>

$(document).ready(function() {
    $('#documentform').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            doc_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Document Name'
                    }
                }
            }
        }
    });
});

$(document).ready(function(e) {
    $("#documentform").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
            //alert('invalid');
        } else {

            $("#branch_preview").show();
            $("#branch_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

            $.ajax({
                url: "<?php echo base_url('admin/Master/add_doc_type'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#branch_preview").hide();
                    $(function() {
                        // new PNotify({
                        //     title: 'Order Status Form',
                        //     text: 'Added  Successfully',
                        //     type: 'success'
                        // });
                        $("#addDoctype").modal('hide');
                        $("#successModalDocType").modal('show');
                    });

                    // setTimeout(function() {
                    //     window.location =
                    //         "<?php echo base_url('admin/Master/branch_master'); ?>";
                    // }, 1000);


                },
                error: function() {
                    // alert('fail');
                    $("#alertModal").modal('show');
                }
            });
        }
        return false;

    }));
});
</script>

<script>

$(document).ready(function() {
    $('#event_notify_form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            event_notify_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Event Notify Name'
                    }
                }
            }
        }
    });
});

$(document).ready(function(e) {
    $("#event_notify_form").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
            //alert('invalid');
        } else {

            $("#branch_preview").show();
            $("#branch_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

            $.ajax({
                url: "<?php echo base_url('admin/Master/add_event_notify'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#branch_preview").hide();
                    $(function() {
                        // new PNotify({
                        //     title: 'Order Status Form',
                        //     text: 'Added  Successfully',
                        //     type: 'success'
                        // });
                        $("#addeventnotify").modal('hide');
                        $("#successModalEventNotify").modal('show');
                    });

                    // setTimeout(function() {
                    //     window.location =
                    //         "<?php echo base_url('admin/Master/branch_master'); ?>";
                    // }, 1000);


                },
                error: function() {
                    // alert('fail');
                    $("#alertModal").modal('show');
                }
            });
        }
        return false;

    }));
});
</script>

<div class="modal fade" id="successModalDocType" tabindex="-1" aria-labelledby="successModalDocTypeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalDocTypeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Document Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/DocumentType'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalEventNotify" tabindex="-1" aria-labelledby="successModalEventNotifyLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalEventNotifyLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Event Notify Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/EventNotify'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date_report').val());
            var end_date = new Date($('#end_date_report').val());

            if (start_date > end_date) 
            {
                $('#error_end_date_report').css('display','block');
                $("#freqwise_report_sub_btn").attr('disabled', true);
            }
            else
            {
                
                $('#error_end_date_report').css('display','none');
                $("#freqwise_report_sub_btn").attr('disabled', false);
            }
        }
</script>


