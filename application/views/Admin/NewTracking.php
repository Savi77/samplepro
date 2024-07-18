<?php $this->load->view('Admin/includes/n-header'); ?>

<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="center-btn">
                        <a href="<?php echo base_url('admin/Tracking/LiveTracking');?>">
                            <i class="fa fa-address-book tracking-icon"></i></a>
                    </div>
                    <div class="card-footer">
                        <h4 class="p-10 center-text">Resource Live Tracking</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="center-btn">
                        <a href="<?php echo base_url('admin/Tracking');?>">
                            <i class="fa fa-vcard tracking-icon"></i></a>
                    </div>
                    <div class="card-footer">
                        <h4 class="p-10 center-text">Resource History</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="center-btn">
                        <a href="<?php echo base_url('admin/Tracking/employee_report');?>">
                            <i class="fa fa-map tracking-icon"></i></a>
                    </div>
                    <div class="card-footer">
                        <h4 class="p-10 center-text">Distance Report</h4>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-4">
                <div class="card">
                    <div class="center-btn">
                        <a href="<?php echo base_url('admin/Tracking/LiveEmployeeTracking');?>">
                            <i class="fa fa-user-plus tracking-icon"></i></a>
                    </div>
                    <div class="card-footer">
                        <h4 class="p-10 center-text">Resource Live Location</h4>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="center-btn">
                        <a href="<?php echo base_url('admin/Tracking/Tracking_Report');?>">
                            <i class="fa fa-users tracking-icon"></i></a>
                    </div>
                    <div class="card-footer">
                        <h4 class="p-10 center-text">Client Visit Report</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('Admin/includes/n-footer'); ?>