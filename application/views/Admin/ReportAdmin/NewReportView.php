<?php $this->load->view('Admin/includes/n-header');    ?>

<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div class="row">
            <!--<div class="col-lg-12">-->
            <!--<div id="pricingWrapper" class="row">-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                <div class="card stacked mt-5">
                    <div class="card-header reportscard pt-0">
                        <span class="card-price card-image"><i class="fa fa-line-chart report-icons"></i></span>
                        <h3 class="card-title mt-3 mb-1 black-text">CRM</h3>
                        <div class="report-hight">
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Source Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Segment Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Product Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Monthly Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByMonthlyCounts'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">User Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Sales Force Scores</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Stage Leads</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Sales Segment</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Sales Product</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonProduct'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Branch</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/branch'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                <div class="card stacked mt-5">
                    <div class="card-header reportscard pt-0">
                        <span class="card-price card-image"><i class="fa fa-users report-icons" aria-hidden="true"></i></span>
                        <h3 class="card-title mt-3 mb-1 black-text">Contact</h3>
                        <div class="report-hight">
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">All Contacts</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/AllContacts'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Segment Contacts</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Account Manager</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Account Revenue</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountRevenue'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Contact List</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Contact Types</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Contact With Task</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivities'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>

                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Inactive Contacts</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                <div class="card stacked mt-5">
                    <div class="card-header reportscard pt-0">
                        <span class="card-price card-image"><i class="fa fa-user-plus report-icons" aria-hidden="true"></i></span>
                        <h3 class="card-title mt-3 mb-1 black-text">Resource</h3>
                        <div class="report-hight">
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Time Slots</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Resource Target</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeTarget'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Resource Earnings</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Resource Tasks</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                            <div class="single-line-text row">
                                <label class="checkbox col-sm-10 text-left">Task Mapping</label>
                                <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping'); ?>" class="col-sm-2"><img class="tree-icons small" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('Admin/includes/n-footer');    ?>