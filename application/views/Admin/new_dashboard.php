<?php $this->load->view('Admin/includes/n-header'); ?>

<style>
    .card:hover {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(20, 27, 201, .05);
    }

    .card {
        height: 420px;
    }

    @media (max-width:575px) {
        .card {
            height: auto;
        }
        .chart-card{
            min-width: auto;
            height: auto;
        }
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 4px !important;
        height:4px;
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .5);
        box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        
    }
    .chart-card .highcharts-contextmenu .highcharts-menu .highcharts-menu-item{
        font-size: 12px !important;
    }
    .chart-card .highcharts-contextmenu .highcharts-menu .highcharts-menu-item:last-child{
        padding-bottom: 0px !important;
    }
    .chart-card .highcharts-contextmenu .highcharts-menu hr{
        margin-top: 2px !important;
        margin-bottom: 2px !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    table td{
        color: #000 !important;
   }
   .card-body {
        padding: 10px 20px 20px 20px!important;
    }
    
    #contactnoactivity table th,#targetreport table th,#availabletimeslots table tr{
        padding-left: 15px;
        padding-right:15px;
        text-wrap: nowrap;
    }
    #contactnoactivity table tr, #targetreport table tr,#availabletimeslots table tr{
        border-bottom: 1px solid #dddddd !important;
    }
    #contactnoactivity table td,#targetreport table td,#availabletimeslots table td{
        border-top: none !important;
        padding-left: 15px;
        padding-right:15px;
    }
    .text-wrap-col{
        display:block;
        width:200px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    #contactnoactivity table tr:last-child, #targetreport table tr:last-child,#availabletimeslots table tr:last-child{
        background-color: #fff !important;
        border-bottom: none !important;
    }
    .highcharts-credits{
        display: none !important;
    }

    
</style>

<?php
    $str = $preference['left'];
    $a = explode(",", $str);
    $str2 = $preference['right'];
    $a2 = explode(",", $str2);
?>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div class="row">
        <div class="col-lg-6" id="cards-target-left">
                    <div class="card dragCard" id="schedulesummarycard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                        <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                            <h6 class="card-title py-sm-4 card-headings">Task Summary</h6>
                            <i class="icon-stats-growth" aria-hidden="true"></i>
                        </div>

                        <div class="card-body">
                            <div class="container-23" style="overflow:scroll;max-height:315px;">

                                

                                <div class=" col-xl-6">
                                    <a onclick="OpenScheduleSummary(this.id)" id="Completed">
                                        <div class="progress">
                                            <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Completed']; ?></span>
                                            <div class="overlay"></div>
                                            <div class="left cr"></div>
                                            <div class="right cr"></div>
                                        </div>
                                        <div class="text-center activity_summary_completed"><b>Completed</b></div>
                                    </a>
                                </div>

                                <div class=" col-xl-6">
                                    <a onclick="OpenScheduleSummary(this.id)" id="Pending">
                                        <div class="progress">
                                            <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Pending']; ?></span>
                                            <div class="overlay"></div>
                                            <div class="left cr-1"></div>
                                            <div class="right cr-1"></div>
                                        </div>
                                        <div class="text-center activity_summary_pending"><b>Pending</b></div>
                                    </a>
                                </div>

                                <div class=" col-xl-12">
                                    <a onclick="OpenScheduleSummary(this.id)" id="All">
                                        <div class="progress">
                                            <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['All']; ?></span>
                                            <div class="overlay"></div>
                                            <div class="left"></div>
                                            <div class="right"></div>

                                        </div>
                                        <div class="text-center activity_summary_all"><b>All</b></div>
                                    </a>
                                </div>

                                <div class=" col-xl-6">
                                    <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">
                                        <div class="progress">
                                            <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Incompleted']; ?></span>
                                            <div class="overlay"></div>
                                            <div class="left cr-2"></div>
                                            <div class="right cr-2"></div>
                                        </div>
                                        <div class="text-center activity_summary_incompleted"><b>Incompleted</b></div>
                                    </a>
                                </div>

                                <div class=" col-xl-6">
                                    <a onclick="OpenScheduleSummary(this.id)" id="Inprogress">
                                        <div class="progress">
                                            <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Inprogress']; ?></span>
                                            <div class="overlay"></div>
                                            <div class="left" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                            <div class="right" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                        </div>
                                        <div class="text-center" style="color: #fd7a0a;"><b>Inprogress</b></div>
                                    </a>
                                </div>


                            </div>

                        </div>

                        <div class="bottom-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                            <span class="dot dot-blue"></span>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6" id="cards-target-right">
                <div class="card dragCard" id="Todaysactivitiescard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background ">
                    <?php
                    $total_count = $TodaysActivityCount[0]['total_count'];
                    if($total_count == '')
                    {
                        $total = 0;
                    }
                    else
                    {
                        $total = $TodaysActivityCount[0]['total_count'];
                    }
                    ?>
                        <h6 class="card-title py-sm-4 card-headings">Today's Task (<?= $total; ?>)</h6>
                        <i class="icon-stats-growth" aria-hidden="true"></i>
                    </div>

                    <div class="card-body">
                        <div class="row activity-text" style="overflow:auto;height:300px;">
                            <?php
                            $count = 1;
                            foreach ($TodaysActivityCount as $row) {
                                
                                if ($count % 2 == 0) {
                                    $bg_class = 'yellow-bg';
                                } else {
                                    $bg_class = 'skyblue-bg';
                                }
                            ?>
                                <div class="col-md-3 <?= $bg_class ?>">
                                    <p style="line-height:20px;margin-bottom:4px;"> <?= $row['type']; ?> </p>
                                    <p><?= $row['count']; ?></p>
                                </div>
                            <?php $count++;
                            }   ?>
                        </div>
                        <!-- <div class="col-md-12 activity-text d-none">
                            <div class="col-md-3 skyblue-bg">
                                <p>
                                    Online Support
                                </p>
                                <p>
                                    0
                                </p>
                            </div>
                            <div class="col-md-3 yellow-bg">
                                <p> Onsite Visit</p>
                                <p> 0</p>

                                </span>
                            </div>
                            <div class="col-md-3 skyblue-bg">
                                <p>
                                    Telecom Tele
                                </p>
                                <p>0</p>

                            </div>
                        </div>
                        <div class="col-md-12 activity-text d-none">
                            <div class="col-md-3 yellow-bg">
                                <p> Email</p>
                                <p>0</p>
                            </div>
                            <div class="col-md-3 skyblue-bg">
                                <p> Email</p>
                                <p>0</p>

                            </div>
                            <div class="col-md-3  yellow-bg">
                                <p> Online Meeting </p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="col-md-12 activity-text d-none">
                            <div class="col-md-3  skyblue-bg">
                                <p>
                                    Office
                                </p>
                                <p>
                                    0
                                </p>
                            </div>
                            <div class="col-md-3  yellow-bg">
                                <p>
                                    Follow Up
                                </p>
                                <p>
                                    0
                                </p>
                            </div>
                            <div class="col-md-3 skyblue-bg">
                                <p>
                                    Bright Pixel
                                </p>
                                <p>
                                    0
                                <p>
                            </div>
                        </div>
                        <div class="col-md-12 activity-text d-none">
                            <div class="col-md-3 yellow-bg ">
                                <p>
                                    Follow Up2
                                </p>
                                <p>
                                    0
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    &nbsp;
                                </p>
                                <p>
                                    &nbsp;
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    &nbsp;
                                </p>
                                <p>
                                    &nbsp;
                                </p>
                            </div>
                        </div> -->

                        <div class="bottom-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                            <span class="dot dot-blue"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" id="cards-target-left">
                <?php if ($preference['left'] != null) 
                {
                    for ($i = 0; $i < count($a); $i++) 
                    {
                        switch ($a[$i]) 
                        {
                            case "leadoppbymonthlycount":
                ?>
                                <div class="card dragCard" id="leadoppbymonthlycount" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Monthly Counts</h6>
                                        <!-- <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a> -->
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByMonthlyCounts'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbymonthlycount_card"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>
                            <!-- <?php
                            case "leadoppbyproductservice":
                            ?>
                                <div class="card dragCard" id="leadoppbyproductservice" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Product-Services</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyproductservice_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?> -->
                            <?php
                            case "leadoppbyproductservice":
                            ?>
                                <div class="card dragCard" id="leadoppbyproductservice" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Products-Services</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyproductservice_card"></div>
                                        <table id="mytable" style="display:block;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Leads</th>
                                                    <th>Opportunities</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                foreach ($Lead_Opportunity_by_Product as $row) 
                                                {
                                            ?>
                                                <tr>
                                                    <th><?= $row['product_name']; ?></th>
                                                    <td><?= $row['lead'];?></td>
                                                    <td><?= $row['opp'];?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>

                                <?php break; ?>
                            <?php
                            case "contactnoactivity":
                            ?>
                                <div class="card dragCard" id="contactnoactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Contact With No Task</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive table-heights">
                                            <!-- <table class="table chart-card" id="ContactsActivities">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Company Name</th>
                                                        <th>Last Activity Before</th>
                                                        <th>Activity</th>
                                                        <th>Employee</th>
                                                        <th>Status </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1;
                                                    foreach ($ContactsActivities as $row) { ?>
                                                        <tr>
                                                            <td><?= $count; ?></td>
                                                            <td><a title="View Contact Details" onclick="ViewDetails(id)" id="<?= $row['customer_id'] ?>"><b><?= $row['company_name'] ?></b></a></td>
                                                            <td><?= $row['last_activity_before'] ?> Days</td>
                                                            <td><?= $row['last_activity'] ?></td>
                                                            <td><?= $row['employee'] ?></td>
                                                            <td><?= ucwords($row['status']) ?></td>
                                                        </tr>
                                                    <?php $count++;
                                                    } ?>
                                                </tbody>
                                            </table> -->
                                            <table class="table table-striped" style="min-width:570px;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Company Name</th>
                                                        <th>Last Task Before</th>
                                                        <th>Task</th>
                                                        <!-- <th>Employee</th>
                                                        <th>Status </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1;
                                                    $final_array=array();
                                                    $org_id=$this->session->org_id;    
                                                    $start_date=date("Y-03-01");
                                                    $end_date=date("Y-m-d");
                                            
                                                     $query=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date' and `org_id` = '$org_id' GROUP BY customer_id ORDER BY created_date DESC LIMIT 10")->result(); 
                                                     
                                                     foreach ($query as  $row) 
                                                     {
                                                         $ids[]=$row->customer_id;
                                                     }
                                            
                                                    $this->db->select(' MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no'); 
                                                    $this->db->where('org_id',$org_id);
                                                    $this->db->where_not_in("customer_id",$ids);  
                                                    $this->db->group_by("customer_id");    
                                                    $this->db->order_by("MAX(`query_id`)","ASC"); 
                                                    $this->db->limit(10); 
                                                    $query_res=$this->db->get('tbl_user_query')->result();
                                            
                                                    foreach ($query_res as  $row) 
                                                    {  
                                                        $issue_id=$row->query_id;
                                                        $this->db->where('issue_id',$issue_id);  
                                                        $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
                                                        $Schedule=$this->db->get('tbl_schedule')->row();
                                            
                                                        if(!empty($Schedule->schedule_id))
                                                        {
                                                            $this->db->where('id',$Schedule->schedule_type_id);             
                                                            $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();
                                            
                                                            $this->db->select('company_name');
                                                            $this->db->where('customer_id',$row->customer_id);             
                                                            $company=$this->db->get('tbl_customer')->row();
                                            
                                                            $this->db->select('name');
                                                            $this->db->where('id',$Schedule->schedule_assign_to);             
                                                            $admin_login=$this->db->get('tbl_admin_login')->row();
                                            
                                                            $this->db->select('status');
                                                            $this->db->where('query_id',$issue_id);             
                                                            $user_query=$this->db->get('tbl_user_query')->row();
                                            
                                                            $ticket_no=$row->ticket_no;
                                                            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
                                                            if($target)
                                                            {
                                                                $total_bill=$target->adm_approved_price;
                                                            }
                                                            else
                                                            {
                                                                $total_bill="NA";
                                                            }
                                            
                                                            $date1=date_create($Schedule->assign_date);
                                                            $date2=date_create($start_date);
                                                            $diff=date_diff($date1,$date2);
                                                            $last_activity_before=$diff->format("%R%a");
                                            
                                            
                                                            $this->db->select('query_id');
                                                            $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                                                            $this->db->where($where_array3);
                                                            $activity=$this->db->get('tbl_user_query')->result();
                                                            $new_array=array(
                                                                                'customer_id'=>$row->customer_id, 
                                                                                'customer_id'=>$row->customer_id, 
                                                                                'schedule_id'=>$Schedule->schedule_id, 
                                                                                'company_name'=>$company->company_name,                           
                                                                                'employee'=>$admin_login->name,
                                                                                'status'=>$user_query->status, 
                                                                                'total_bill'=>$total_bill, 
                                                                                'total_activity'=>count($activity), 
                                                                                'last_activity'=>$schedule_type_name->type_name, 
                                                                                'last_activity_before'=>$last_activity_before,
                                                                                'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
                                                                            );
                                                            array_push($final_array,$new_array);    
                                                        }              
                                                    }
                                                    foreach ($final_array as $row) { ?>
                                                        <tr>
                                                            
                                                            <td><?= $count; ?></td>
                                                            <td style="width:200px;" class="text-wrap-col"><?= $row['company_name'] ?></td>
                                                            <td><?= $row['last_activity_before'] ?> Days</td>
                                                            <td style="width:150px;" class="text-wrap-col"><?= $row['last_activity'] ?></td>
                                                            <!-- <td><?= $row['employee'] ?></td>
                                                            <td><?= ucwords($row['status']) ?></td> -->
                                                        </tr>
                                                    <?php $count++;
                                                    } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td style="width:200px;" class="text-wrap-col"></td>
                                                        <td></td>
                                                        <td style="width:150px;" class="text-wrap-col"><a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybystagecard":
                            ?>

                                <div class="card dragCard" id="leadsopportunitybystagecard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities By Stage</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="container2"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "leadsopportunitybyowner":
                            ?>

                                <!-- <div class="card dragCard" id="leadsopportunitybyowner" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Owner</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                        <a><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="container3"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div> -->
                                <!-- /sales stats -->


                                <?php break; ?>

                            <?php
                            case "typewisecontact":
                            ?>

                                <div class="card dragCard" id="typewisecontact" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Type Wise Contacts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="typewisecontact_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "employeewiseactivity":
                            ?>

                                <div class="card dragCard" id="employeewiseactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Wise Task</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="employeewiseactivity_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "schedulesummarycard":
                            ?>

                                <!-- <div class="card dragCard" id="schedulesummarycard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Task Summary</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-body">
                                        <div class="container-23" style="overflow:scroll;max-height:300px;">

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="All">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['All']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left"></div>
                                                        <div class="right"></div>

                                                    </div>
                                                    <div class="text-center activity_summary_all"><b>All</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Completed">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Completed']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr"></div>
                                                        <div class="right cr"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_completed"><b>Completed</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Pending">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Pending']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-1"></div>
                                                        <div class="right cr-1"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_pending"><b>Pending</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Incompleted']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-2"></div>
                                                        <div class="right cr-2"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_incompleted"><b>Incompleted</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Inprogress">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Inprogress']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                                        <div class="right" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                                    </div>
                                                    <div class="text-center" style="color: #fd7a0a;"><b>Inprogress</b></div>
                                                </a>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="bottom-dots">
                                        <span class="dot dot-red"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-green"></span>
                                        <span class="dot dot-blue"></span>
                                    </div>
                                </div> -->

                                <?php break; ?>

                            <?php
                            case "contactsummary":
                            ?>
                                <div class="card dragCard" id="contactsummary" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Contact Summary</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="contactsummary1"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>

                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysalesperson":
                            ?>

                                <div class="card dragCard" id="leadsopportunitybysalesperson" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities by Sales Person</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="salespersonchart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "availabletimeslots":
                            ?>

                                <div class="card dragCard" id="availabletimeslots" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Available Time Slots</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body pl-0 pr-0">
                                        <div class="table-responsive table-heights">
                                            <table class="table table-striped" id="default_issue_table" style="min-width:570px;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    foreach ($AvailableTimeSlots as $row) {
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <?= $count; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:150px;" class="text-wrap-col">
                                                                <?= $row['name'] ?>
                                                                <!-- <a id="<?= $row['emp_id'] ?>"><b><?= $row['name'] ?></a> -->
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="180px;" class="text-wrap-col">
                                                                <?= $row['email'] ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="150px;">
                                                                <?= $row['mobile_no'] ?>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <!-- <tr>
                                                            <td><?= $count; ?></td>
                                                            <td>
                                                                <a title="<?= $row['name'] ?>" onclick="ViewDetails(id)" id="<?= $row['emp_id'] ?>"><b><?= $row['name'] ?></b></a>
                                                            </td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td><?= $row['mobile_no'] ?></td>
                                                        </tr> -->
                                                    <?php $count++;
                                                    } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>"><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "rescheduleactivity":
                            ?>

                                <!-- <div class="card dragCard" id="rescheduleactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Reschedule Activity</h6>
                                        <a><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="row chart-card">
                                        </div>


                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->

                                <?php break; ?>

                            <?php
                            case "employeerevenue":
                            ?>
                                <div class="card dragCard" id="employeerevenue" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Revenue</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="employeerevenue_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "Todaysactivitiescard":
                            ?>

                                <!-- <div class="card dragCard" id="Todaysactivitiescard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background ">
                                    <?php
                                    $total_count = $TodaysActivityCount[0]['total_count'];
                                    if($total_count == '')
                                    {
                                        $total = 0;
                                    }
                                    else
                                    {
                                        $total = $TodaysActivityCount[0]['total_count'];
                                    }
                                    ?>
                                        <h6 class="card-title py-sm-4 card-headings">Today's Task (<?= $total; ?>)</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-body">
                                        <div class="row activity-text" style="overflow-y:scroll;max-height:300px;">
                                            <?php
                                            $count = 1;
                                            foreach ($TodaysActivityCount as $row) {
                                                
                                                if ($count % 2 == 0) {
                                                    $bg_class = 'yellow-bg';
                                                } else {
                                                    $bg_class = 'skyblue-bg';
                                                }
                                            ?>
                                                <div class="col-md-3 <?= $bg_class ?>">
                                                    <p style="line-height:20px;margin-bottom:4px;"> <?= $row['type']; ?> </p>
                                                    <p><?= $row['count']; ?></p>
                                                </div>
                                            <?php $count++;
                                            }   ?>
                                        </div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <?php break; ?>

                            <?php
                            case "losalespersonsegmentwise":
                            ?>

                                <div class="card dragCard" id="losalespersonsegmentwise" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities by Sales Person - Segment wise</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="losalespersonsegmentwise_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "leadoppbyuserwisemonthlycount":
                            ?>
                                <div class="card dragCard" id="leadoppbyuserwisemonthlycount" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities - User Wise Monthly Counts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyuserwisemonthlycount_card"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "employeewiseactivitymapping":
                            ?>

                                <div class="card dragCard" id="employeewiseactivitymapping" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Wise Task Mapping</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="employeewiseactivitymapping_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysourcecard":
                            ?>
                                <!-- <div class="card dragCard" id="leadsopportunitybysourcecard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Source </h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="source_chart"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card dragCard" id="leadsopportunitybysourcecard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Source</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-card" id="source_chart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysegment":
                            ?>
                                <div class="card dragCard" id="leadsopportunitybysegment" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Segment</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-card" id="segmentcardchart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "targetreport":
                            ?>

                                <div class="card dragCard" id="targetreport" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings">Target Report</h6>
                                        <a><i class="icon-stats-growth" aria-hidden="true" style="cursor:auto;"></i></a>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table-heights">
                                            <table class="table table-striped" style="min-width:570px;">
                                                <thead>
                                                    <th>Sr No</th>
                                                    <th>Target Name</th>
                                                    <th class="text-center">Goal / Target</th>
                                                    <th class="text-center">Achieved</th>
                                                    <th class="text-center">Balance</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $counter = 1;
                                                    foreach ($TargetSummary as $value) {
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <div>
                                                                <?= $counter; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:150px;" class="text-wrap-col">
                                                                    <?= $value['target_type']; ?>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['TargetValue']; ?>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['TotalAchieveValue']; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['Balance']; ?>
                                                                </div>
                                                            </td>
                                                        </tr>



                                                        <!-- <tr>
                                                            <td style="width: 10%;">
                                                                <?= $counter; ?>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="content-group">
                                                                        <span class="text-semibold no-margin">
                                                                            <?= $value['target_type']; ?>
                                                                        </span>
                                                                        <span class="text-muted text-size-small"></span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="content-group">
                                                                        <h6 class="text-semibold no-margin">
                                                                            <?= $value['TargetValue']; ?>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="content-group">
                                                                        <h6 class="text-semibold no-margin">
                                                                            <?= $value['TotalAchieveValue']; ?>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="content-group">
                                                                        <h6 class="text-semibold no-margin">
                                                                            <?= $value['Balance']; ?>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr> -->
                                                    <?php $counter++;
                                                    } ?>
                                                     <!-- <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><a href=""><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "segmentwisecontact":
                            ?>
                                <div class="card dragCard" id="segmentwisecontact" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Segment Wise Contacts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="segmentwisecontact_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>
                    <?php   }
                    }
                } 
                // else 
                // { 
                ?>
                    

                <!-- <?php      ?> -->
            </div>
            <div class="col-lg-6" id="cards-target-right">
                <?php
                if ($preference['right'] != null) {
                    for ($j = 0; $j < count($a2); $j++) {
                        switch ($a2[$j]) {
                            case "leadoppbymonthlycount":
                ?>

                                <div class="card dragCard" id="leadoppbymonthlycount" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Monthly Counts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbymonthlycount_card"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>
                            <!-- <?php
                            case "leadoppbyproductservice":
                            ?>
                                <div class="card dragCard" id="leadoppbyproductservice" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Products-Services</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyproductservice_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?> -->
                            <?php
                            case "leadoppbyproductservice":
                            ?>
                                <div class="card dragCard" id="leadoppbyproductservice" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities by Products-Services</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyproductservice_card"></div>
                                        <table id="mytable" style="display:block;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Leads</th>
                                                    <th>Opportunities</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                foreach ($Lead_Opportunity_by_Product as $row) 
                                                {
                                            ?>
                                                <tr>
                                                    <th><?= $row['product_name']; ?></th>
                                                    <td><?= $row['lead'];?></td>
                                                    <td><?= $row['opp'];?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>

                                <?php break; ?>
                            <?php
                            case "contactnoactivity":
                            ?>
                                <div class="card dragCard" id="contactnoactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Contact With No Task</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-heights">
                                            <!-- <table class="table chart-card" id="ContactsActivities"> -->
                                            <table class="table table-striped" style="min-width:570px;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Company Name</th>
                                                        <th>Last Task Before</th>
                                                        <th>Task</th>
                                                        <!-- <th>Employee</th>
                                                        <th>Status </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1;
                                                    $final_array=array();
                                                    $org_id=$this->session->org_id;    
                                                    $start_date=date("Y-03-01");
                                                    $end_date=date("Y-m-d");
                                            
                                                     $query=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date' GROUP BY customer_id ORDER BY created_date DESC LIMIT 10")->result(); 
                                                     
                                                     foreach ($query as  $row) 
                                                     {
                                                         $ids[]=$row->customer_id;
                                                     }
                                            
                                                    $this->db->select(' MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no'); 
                                                    $this->db->where_not_in("customer_id",$ids);  
                                                    $this->db->group_by("customer_id");    
                                                    $this->db->order_by("MAX(`query_id`)","ASC"); 
                                                    $this->db->limit(10); 
                                                    $query_res=$this->db->get('tbl_user_query')->result();
                                            
                                                    foreach ($query_res as  $row) 
                                                    {  
                                                        $issue_id=$row->query_id;
                                                        $this->db->where('issue_id',$issue_id);  
                                                        $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
                                                        $Schedule=$this->db->get('tbl_schedule')->row();
                                            
                                                        if(!empty($Schedule->schedule_id))
                                                        {
                                                            $this->db->where('id',$Schedule->schedule_type_id);             
                                                            $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();
                                            
                                                            $this->db->select('company_name');
                                                            $this->db->where('customer_id',$row->customer_id);             
                                                            $company=$this->db->get('tbl_customer')->row();
                                            
                                                            $this->db->select('name');
                                                            $this->db->where('id',$Schedule->schedule_assign_to);             
                                                            $admin_login=$this->db->get('tbl_admin_login')->row();
                                            
                                                            $this->db->select('status');
                                                            $this->db->where('query_id',$issue_id);             
                                                            $user_query=$this->db->get('tbl_user_query')->row();
                                            
                                                            $ticket_no=$row->ticket_no;
                                                            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
                                                            if($target)
                                                            {
                                                                $total_bill=$target->adm_approved_price;
                                                            }
                                                            else
                                                            {
                                                                $total_bill="NA";
                                                            }
                                            
                                                            $date1=date_create($Schedule->assign_date);
                                                            $date2=date_create($start_date);
                                                            $diff=date_diff($date1,$date2);
                                                            $last_activity_before=$diff->format("%R%a");
                                            
                                            
                                                            $this->db->select('query_id');
                                                            $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                                                            $this->db->where($where_array3);
                                                            $activity=$this->db->get('tbl_user_query')->result();
                                                            $new_array=array(
                                                                                'customer_id'=>$row->customer_id, 
                                                                                'customer_id'=>$row->customer_id, 
                                                                                'schedule_id'=>$Schedule->schedule_id, 
                                                                                'company_name'=>$company->company_name,                           
                                                                                'employee'=>$admin_login->name,
                                                                                'status'=>$user_query->status, 
                                                                                'total_bill'=>$total_bill, 
                                                                                'total_activity'=>count($activity), 
                                                                                'last_activity'=>$schedule_type_name->type_name, 
                                                                                'last_activity_before'=>$last_activity_before,
                                                                                'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
                                                                            );
                                                            array_push($final_array,$new_array);    
                                                        }              
                                                    }
                                                    foreach ($final_array as $row) { ?>
                                                        <tr>
                                                            
                                                            <td><?= $count; ?></td>
                                                            <td style="width:200px;" class="text-wrap-col"><?= $row['company_name'] ?></td>
                                                            <td><?= $row['last_activity_before'] ?> Days</td>
                                                            <td style="width:150px;" class="text-wrap-col"><?= $row['last_activity'] ?></td>
                                                            <!-- <td><?= $row['employee'] ?></td>
                                                            <td><?= ucwords($row['status']) ?></td> -->
                                                        </tr>

                                                    <?php $count++;
                                                    } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td style="width:200px;" class="text-wrap-col"></td>
                                                        <td></td>
                                                        <td style="width:150px;" class="text-wrap-col"><a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybystagecard":
                            ?>

                                <div class="card dragCard" id="leadsopportunitybystagecard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities By Stage</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="container2"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "leadsopportunitybyowner":
                            ?>

                                <!-- <div class="card dragCard" id="leadsopportunitybyowner" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Owner</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="container3"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div> -->
                                <!-- /sales stats -->


                                <?php break; ?>

                            <?php
                            case "typewisecontact":
                            ?>

                                <div class="card dragCard" id="typewisecontact" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Type Wise Contacts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="typewisecontact_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "employeewiseactivity":
                            ?>

                                <div class="card dragCard" id="employeewiseactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Wise Task</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="employeewiseactivity_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "schedulesummarycard":
                            ?>

                                <!-- <div class="card dragCard" id="schedulesummarycard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Activity Summary</h6>
                                        <a><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="container-23">
                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="All">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['All']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left"></div>
                                                        <div class="right"></div>

                                                    </div>
                                                    <div class="text-center activity_summary_all"><b>All</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Completed">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Completed']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr"></div>
                                                        <div class="right cr"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_completed"><b>Completed</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Pending">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Pending']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-1"></div>
                                                        <div class="right cr-1"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_pending"><b>Pending</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Incompleted']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-2"></div>
                                                        <div class="right cr-2"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_incompleted"><b>Incompleted</b></div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="bottom-dots">
                                        <span class="dot dot-red"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-green"></span>
                                        <span class="dot dot-blue"></span>
                                    </div>
                                </div> -->
                                <!-- <div class="card dragCard" id="schedulesummarycard" onmouseup="carddragright(event); carddragleft(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Task Summary</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-body">
                                        <div class="container-23" style="overflow:scroll;max-height:300px;">

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="All">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['All']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left"></div>
                                                        <div class="right"></div>

                                                    </div>
                                                    <div class="text-center activity_summary_all"><b>All</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Completed">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Completed']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr"></div>
                                                        <div class="right cr"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_completed"><b>Completed</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Pending">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="70" data-speed="1500"><?= $ScheduleSummary['Pending']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-1"></div>
                                                        <div class="right cr-1"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_pending"><b>Pending</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Incompleted']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left cr-2"></div>
                                                        <div class="right cr-2"></div>
                                                    </div>
                                                    <div class="text-center activity_summary_incompleted"><b>Incompleted</b></div>
                                                </a>
                                            </div>

                                            <div class=" col-xl-6">
                                                <a onclick="OpenScheduleSummary(this.id)" id="Inprogress">
                                                    <div class="progress">
                                                        <span class="title timer" data-from="0" data-to="85" data-speed="1800"><?= $ScheduleSummary['Inprogress']; ?></span>
                                                        <div class="overlay"></div>
                                                        <div class="left" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                                        <div class="right" style="border: 10px solid #fd7a0a !important; border-radius: 100px 0px 0px 100px !important;border-right: 0 !important;transform-origin: right !important;"></div>
                                                    </div>
                                                    <div class="text-center" style="color: #fd7a0a;"><b>Inprogress</b></div>
                                                </a>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="bottom-dots">
                                        <span class="dot dot-red"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-green"></span>
                                        <span class="dot dot-blue"></span>
                                    </div>
                                </div> -->

                                <?php break; ?>

                            <?php
                            case "contactsummary":
                            ?>
                                <div class="card dragCard" id="contactsummary" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Contact Summary</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="contactsummary1"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>

                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysalesperson":
                            ?>

                                <div class="card dragCard" id="leadsopportunitybysalesperson" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities by Sales Person</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="salespersonchart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "availabletimeslots":
                            ?>

                                <div class="card dragCard" id="availabletimeslots" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Available Time Slots</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body pl-0 pr-0">
                                        <div class="table-responsive table-heights">
                                            <table class="table table-striped" id="default_issue_table" style="min-width:570px;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Resource</th>
                                                        <th>Email</th>
                                                        <th>Mobile No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    foreach ($AvailableTimeSlots as $row) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <?= $count; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:150px;" class="text-wrap-col">
                                                                <?= $row['name'] ?>
                                                                <!-- <a id="<?= $row['emp_id'] ?>"><b><?= $row['name'] ?></a> -->
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="180px;" class="text-wrap-col">
                                                                <?= $row['email'] ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="150px;">
                                                                <?= $row['mobile_no'] ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php $count++;
                                                    } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots'); ?>"><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>

                                <?php break; ?>

                            <?php
                            case "rescheduleactivity":
                            ?>

                                <!-- <div class="card dragCard" id="rescheduleactivity" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Reschedule Activity</h6>
                                        <a><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="row chart-card">
                                        </div>


                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->

                                <?php break; ?>

                            <?php
                            case "employeerevenue":
                            ?>
                                <div class="card dragCard" id="employeerevenue" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Revenue</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="employeerevenue_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "Todaysactivitiescard":
                            ?>

                                <!-- <div class="card dragCard" id="Todaysactivitiescard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background ">
                                        <h6 class="card-title py-sm-4 card-headings">Today's Task</h6>
                                        <i class="icon-stats-growth" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-body">
                                        <div class="row activity-text" style="overflow-y:scroll;max-height:300px;">
                                            <?php
                                            $count = 1;
                                            foreach ($TodaysActivityCount as $row) {
                                                if ($count % 2 == 0) {
                                                    $bg_class = 'yellow-bg';
                                                } else {
                                                    $bg_class = 'skyblue-bg';
                                                }
                                            ?>
                                                <div class="col-md-3 <?= $bg_class ?>">
                                                    <p> <?= $row['type']; ?> </p>
                                                    <p><?= $row['count']; ?></p>
                                                </div>
                                            <?php $count++;
                                            }   ?>
                                        </div>
                                        <div class="col-md-12 activity-text d-none">
                                            <div class="col-md-3 skyblue-bg">
                                                <p>
                                                    Online Support
                                                </p>
                                                <p>
                                                    0
                                                </p>
                                            </div>
                                            <div class="col-md-3 yellow-bg">
                                                <p> Onsite Visit</p>
                                                <p> 0</p>

                                                </span>
                                            </div>
                                            <div class="col-md-3 skyblue-bg">
                                                <p>
                                                    Telecom Tele
                                                </p>
                                                <p>0</p>

                                            </div>
                                        </div>
                                        <div class="col-md-12 activity-text d-none">
                                            <div class="col-md-3 yellow-bg">
                                                <p> Email</p>
                                                <p>0</p>
                                            </div>
                                            <div class="col-md-3 skyblue-bg">
                                                <p> Email</p>
                                                <p>0</p>

                                            </div>
                                            <div class="col-md-3  yellow-bg">
                                                <p> Online Meeting </p>
                                                <p>0</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 activity-text d-none">
                                            <div class="col-md-3  skyblue-bg">
                                                <p>
                                                    Office
                                                </p>
                                                <p>
                                                    0
                                                </p>
                                            </div>
                                            <div class="col-md-3  yellow-bg">
                                                <p>
                                                    Follow Up
                                                </p>
                                                <p>
                                                    0
                                                </p>
                                            </div>
                                            <div class="col-md-3 skyblue-bg">
                                                <p>
                                                    Bright Pixel
                                                </p>
                                                <p>
                                                    0
                                                <p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 activity-text d-none">
                                            <div class="col-md-3 yellow-bg ">
                                                <p>
                                                    Follow Up2
                                                </p>
                                                <p>
                                                    0
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    &nbsp;
                                                </p>
                                                <p>
                                                    &nbsp;
                                                </p>
                                            </div>

                                            <div class="col-md-3">
                                                <p>
                                                    &nbsp;
                                                </p>
                                                <p>
                                                    &nbsp;
                                                </p>
                                            </div>
                                        </div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <?php break; ?>

                            <?php
                            case "losalespersonsegmentwise":
                            ?>

                                <div class="card dragCard" id="losalespersonsegmentwise" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings black-text">Leads-Opportunities by Sales Person - Segment wise</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">

                                        <div class="chart-card" id="losalespersonsegmentwise_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                       
                                    </div>

                                </div>
                                <?php break; ?>

                            <?php
                            case "leadoppbyuserwisemonthlycount":
                            ?>
                                <div class="card dragCard" id="leadoppbyuserwisemonthlycount" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities - User Wise Monthly Counts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadoppbyuserwisemonthlycount_card"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "employeewiseactivitymapping":
                            ?>

                                <div class="card dragCard" id="employeewiseactivitymapping" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Resource Wise Task Mapping</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="employeewiseactivitymapping_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>

                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysourcecard":
                            ?>
                                <!-- <div class="card dragCard" id="leadsopportunitybysourcecard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Source</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="source_chart"></div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card dragCard" id="leadsopportunitybysourcecard" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Source</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-card" id="source_chart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "leadsopportunitybysegment":
                            ?>
                                <div class="card dragCard" id="leadsopportunitybysegment" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-red-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Segment</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-card" id="segmentcardchart"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "targetreport":
                            ?>

                                <div class="card dragCard" id="targetreport" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-skyblue-background">
                                        <h6 class="card-title py-sm-4 card-headings">Target Report</h6>
                                        <a><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-heights" >
                                            <table class="table table-striped" style="min-width:570px;">
                                                <thead>
                                                    <th>Sr No</th>
                                                    <th>Target Name</th>
                                                    <th class="text-center">Goal / Target</th>
                                                    <th class="text-center">Achieved</th>
                                                    <th class="text-center">Balance</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $counter = 1;
                                                    foreach ($TargetSummary as $value) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                <?= $counter; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:150px;" class="text-wrap-col">
                                                                    <?= $value['target_type']; ?>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['TargetValue']; ?>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['TotalAchieveValue']; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="width:100px;text-align:center;">
                                                                    <?= $value['Balance']; ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php $counter++;
                                                    } ?>
                                                    <!-- <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><a href=""><button class="btn btn-primary" style="float: right;clear: right;">View More</button></a></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; ?>

                            <?php
                            case "segmentwisecontact":
                            ?>
                                <div class="card dragCard" id="segmentwisecontact" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Segment Wise Contacts</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="segmentwisecontact_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>
                                
                                <?php
                                case "leadsopportunitybysalespersonproductwise":
                                ?>
                                <div class="card dragCard" id="leadsopportunitybysalespersonproductwise" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Leads-Opportunities By Sales Person - Product Wise</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonProduct'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadsopportunitybysalespersonproductwise_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>
                            
                                <?php
                                case "leadopportunitybyaccountwiserevenue":
                                ?>
                                <div class="card dragCard" id="leadopportunitybyaccountwiserevenue" onmouseup="carddragleft(event); carddragright(event);" draggable="true">
                                    <div class="card-header header-elements-sm-inline py-sm-0 card-green-background">
                                        <h6 class="card-title py-sm-4 card-headings">Account Wise Revenue</h6>
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountRevenue'); ?>"><i class="icon-stats-growth" aria-hidden="true"></i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="chart-card" id="leadopportunitybyaccountwiserevenue_card"></div>
                                        <div class="bottom-dots">
                                            <span class="dot dot-red"></span>
                                            <span class="dot dot-yellow"></span>
                                            <span class="dot dot-green"></span>
                                            <span class="dot dot-blue"></span>
                                        </div>
                                    </div>

                                </div>
                                <?php break; ?>
                    <?php   }
                    }
                }
                 
                // else { 
                    ?>
                    
                    
                <!-- <?php      ?> -->
            </div>
            
        </div>
    </div>
    
    <?php $this->load->view('Admin/includes/n-footer');    ?>

    
    <script>
        $('#ContactsActivities').DataTable();

        function OpenScheduleSummary(type) {
            window.location = "<?php echo base_url('admin/Customer/ScheduleReport') ?>?Type=" + type;
        }

        function OpenOrderSummary(type) {
            window.location = "<?php echo base_url('admin/Ecommerce/OrderReport') ?>?Type=" + type;
        }

        
        Highcharts.chart('container2', 
        {
            chart: {
                type: 'column'
            },

            title: {
                text: 'Leads-Opportunities By Stage'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            xAxis: {
                categories: [
                    <?php
                    foreach ($LeadsByStagesSummary as $stage) {
                    ?> 
                    '<?= $stage['stage_title']; ?>',
                    <?php } ?>
                ],
                // labels: {
                //     x: -10
                // }
            },

            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Amount'
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php
                    foreach($LeadscountByStagesSummary as $countlead)
                    {
                    ?>
                    <?= $countlead['StageCount']; ?>,
                    <?php } ?>
                ]
            }, {
                name: 'Opportunity',
                data: [
                    <?php
                    foreach($OpportunitycountByStagesSummary as $countopp)
                    {
                    ?>
                    <?= $countopp['StageCount']; ?>,
                    <?php } ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            align: 'center',
                            verticalAlign: 'bottom',
                            layout: 'horizontal'
                        },
                        yAxis: {
                            labels: {
                                // align: 'left',
                                x: 0,
                                y: -10
                            },
                            title: {
                                text: null
                            }
                        },
                        subtitle: {
                            text: null
                        },
                        credits: {
                            enabled: false
                        }
                    }
                }]
            }
        });
        Highcharts.chart('employeewiseactivity_card', 
        {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: ''
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($EmployeewiseActivities as  $row2) 
                    { 
                        $NewActivityArray = $row2['ActivityArray'];
                        for ($i = 0; $i < count($NewActivityArray); $i++) 
                        {
                            
                    ?>        
                    {
                        name: '<?= $row2['name']. '/' .$NewActivityArray[$i]['type_name'] ?>',
                        y:  <?= $NewActivityArray[$i]['type_count'] ?>, 
                    },
                    <?php } } ?>
                ]
            }],
            
        });
        Highcharts.chart('contactsummary1', 
        {
            chart: {
                type: 'column'
            },
            title: {
                text: 'All Contacts'
            },
            credits: {
                enabled: false,
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total Number Of Contacts'
                }
            },
            legend: {
                enabled: false
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.f}'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },
            series: [{

                name: "Browsers",
                colorByPoint: true,
                data: [{
                    name: "Total Contacts",
                    y: <?php print_r($total_count_contact['tcount']) ?>,
                    drilldown: "Total Contacts"
                }, {
                    name: "Primary Contacts",
                    y: <?php print_r($primary_count['pcount']) ?>,
                    drilldown: "Primary Contacts"
                }, {
                    name: "Secondary Contacts",
                    y: <?php print_r($secondary_count['scount']) ?>,
                    drilldown: "Secondary Contacts"
                }]
            }],

        });
        Highcharts.chart('salespersonchart', {
            chart: {
                type: 'column',
                // styledMode: true
            },

            title: {
                text: 'Leads-Opportunities By Sales Persons<br/><p style="font-size:12px;color:#FF5732;"></p>',
                // align: 'left'
            },

            // subtitle: {
            //     text: 'Source: ' +
            //         '<a href="https://www.worlddata.info/average-bodyheight.php"' +
            //         'target="_blank">WorldData</a>',
            //     align: 'left'
            // },

            xAxis: {
                categories: [
                    <?php
                    foreach ($LeadOppBySalesPerson as $Employee) {
                    ?>
                    '<?= $Employee['emp_name']; ?>',
                    <?php } ?>
                ]
            },

            yAxis: [{ 
                className: 'highcharts-color-0',
                title: {
                    text: 'Leads'
                }
            }, { 
                className: 'highcharts-color-1',
                opposite: true,
                title: {
                    text: 'Opportunities'
                }
            }],

            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php
                     foreach ($LeadOppBySalesPerson as $Employee) {
                        
                    ?>
                    <?= $Employee['lead'];?>,
                    <?php } ?>
                ],
                
            }, 
            {
                name: 'Opportunity',
                data: [
                    <?php
                     foreach ($LeadOppBySalesPerson as $Employee) {
                    ?>
                    <?= $Employee['opp'];?>,
                    <?php } ?>
                ],
                yAxis: 1
            }]
        });
        Highcharts.chart('employeerevenue_card', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Revenue'
            },
            
            xAxis: {
                type: 'category',
                labels: {
                    autoRotation: [-45, -90],
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Revenue: <b>{point.y:.1f}</b>'
            },
            series: [{
                name: 'Population',
                colors: [
                    '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                    '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
                    '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
                    '#03c69b',  '#00f194'
                ],
                colorByPoint: true,
                groupPadding: 0,
                data: [
                    <?php
                    foreach ($EmployeeRevenue as $er) {
                    ?> 
                    ['<?= $er['name']; ?>', <?= $er['revenue']?>],
                    <?php } ?>
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    inside: true,
                    verticalAlign: 'top',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
        Highcharts.chart('employeewiseactivitymapping_card', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Task Mapping'
            },
            credits: {
                enabled: false,
            },
            xAxis: {
                categories: [
                    <?php foreach ($EmployeewiseActivitiesMapping as  $row2) { ?> '<?= $row2['name']; ?>',

                    <?php } ?>

                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Ticket Issue',
                data: [
                    <?php foreach ($EmployeewiseActivitiesMapping as  $row2) { ?>
                        <?= $row2['total_issue']; ?>,

                    <?php } ?>

                ]
            }, {
                name: 'Task',
                data: [
                    <?php foreach ($EmployeewiseActivitiesMapping as  $row2) { ?>
                        <?= $row2['task_issue']; ?>,

                    <?php } ?>
                ]
            }, {
                name: 'Own',
                data: [
                    <?php foreach ($EmployeewiseActivitiesMapping as  $row2) { ?>
                        <?= $row2['own_issue']; ?>,

                    <?php } ?>
                ]
            }]
        });
        Highcharts.chart('typewisecontact_card', {
            chart: {
                animation: {
                    duration: 500
                },
                marginRight: 50
            },
            title: {
                text: 'Type Wise Contacts',
                // align: 'left'
            },
            subtitle: {
                useHTML: true,
                text: '',
                floating: true,
                align: 'right',
                verticalAlign: 'middle',
                y: -80,
                x: -100
            },

            legend: {
                enabled: false
            },
            xAxis: {
                // type: 'category',
                categories: [
                    <?php foreach ($TypewiseContact as $row) { ?>'<?= $row['title']; ?>',<?php } ?>
                    ]
            },
            yAxis: {
                opposite: true,
                tickPixelInterval: 150,
                title: {
                    text: null
                }
            },
            plotOptions: {
                series: {
                    animation: false,
                    groupPadding: 0,
                    pointPadding: 0.1,
                    borderWidth: 0,
                    colorByPoint: true,
                    // dataSorting: {
                    //     enabled: true,
                    //     matchByName: true
                    // },
                    type: 'bar',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                <?php
                // echo "<pre>";
                // print_r($TypewiseContact);
                ?>
                {
                    type: 'bar',
                    name: 'Total',
                    data: [
                        <?php foreach ($TypewiseContact as $row) { ?><?= $row['total']; ?>,<?php } ?>
                    ],
                },
                
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 550
                    },
                    chartOptions: {
                        xAxis: {
                            visible: true
                        },
                        subtitle: {
                            x: 0
                        },
                        plotOptions: {
                            series: {
                                dataLabels: [{
                                    enabled: true,
                                    y: 8
                                }, {
                                    enabled: true,
                                    format: '{point.name}',
                                    y: -8,
                                    style: {
                                        fontWeight: 'normal',
                                        opacity: 0.7
                                    }
                                }]
                            }
                        }
                    }
                }]
            }
        });
        Highcharts.chart('segmentcardchart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Leads-Opportunities By Segment <br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            xAxis: {
                categories: [
                    <?php foreach ($Lead_Opportunity_by_Segments as $Employee) { ?>'<?= $Employee['business_name']; ?>',<?php } ?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                },
                stackLabels: {
                    enabled: true
                }
            },
            // legend: {
            //     align: 'left',
            //     x: 70,
            //     verticalAlign: 'top',
            //     y: 70,
            //     floating: true,
            //     backgroundColor:
            //         Highcharts.defaultOptions.legend.backgroundColor || 'white',
            //     borderColor: '#CCC',
            //     borderWidth: 1,
            //     shadow: false
            // },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'Lead',
                data: [
                    <?php foreach ($Lead_by_Segments as $Employee_lead) { ?><?= $Employee_lead['total']; ?>,<?php } ?>
                ]
            }, {
                name: 'Opportunity',
                data: [
                    <?php foreach ($Opportunity_by_Segments as $Employee_opp) { ?><?= $Employee_opp['total']; ?>,<?php } ?>
                ]
            }]
        });
        Highcharts.chart('segmentwisecontact_card', {
            title: {
                text: 'Segment Wise Contacts <br/><p style="font-size:12px;color:#FF5732;"></p>',
            },
            
            colors: [
                '#4caefe',
                '#3fbdf3',
                '#35c3e8',
                '#2bc9dc',
                '#20cfe1',
                '#16d4e6',
                '#0dd9db',
                '#03dfd0',
                '#00e4c5',
                '#00e9ba',
                '#00eeaf',
                '#23e274'
            ],
            xAxis: {
                categories: [
                    <?php
                    foreach ($SegmentWiseContact as $Employee) {
                    ?>
                    '<?= $Employee['business_name']; ?>',
                    <?php } ?>
                ]
            },
            series: [{
                type: 'column',
                name: 'Total',
                borderRadius: 5,
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($SegmentWiseContact as $Employee) {
                    ?>
                    <?= $Employee['total']; ?>,
                    <?php } ?>
                ],
                showInLegend: false
            }]
        });
        Highcharts.chart('leadoppbymonthlycount_card', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Leads-Opportunities By Monthly Count'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [{
                        name: '<?= $LeadOppByMonthlyCounts[0][0]['customer_type']; ?>',
                        y: <?= $LeadOppByMonthlyCounts[0][0]['total']; ?>
                    },
                    {
                        name: '<?= $LeadOppByMonthlyCounts[1][0]['customer_type']; ?>',
                        y: <?= $LeadOppByMonthlyCounts[1][0]['total'] ?>
                    },
                ]
            }],
        });
        Highcharts.chart('leadoppbyuserwisemonthlycount_card', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Leads-Opportunities - User Wise Monthly Counts'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($LeadOppByUserwiseMonthlyCounts as $row) {
                    ?> {
                            name: '<?= $row['emp_name']; ?>',
                            y: <?= $row['total']; ?>
                        },
                    <?php } ?>
                ]
            }],
        });
        Highcharts.chart('leadsopportunitybysalespersonproductwise_card', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Leads-Opportunity By Sales Person - Product Wise <br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php 
                    foreach ($LeadOppBySalesPersonProducrwise as $Employee) {
                    ?> {
                            name: '<?= $Employee['emp_name'] . ' :-  ' . $Employee['prdsrv_name']; ?>',
                            y: <?= $Employee['total']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } ?>
                ]
            }],
        });
        Highcharts.chart('source_chart', {
            chart: {
                type: 'column'
            },

            title: {
                text: 'Leads-Opportunities By Source <br/><p style="font-size:12px;color:#FF5732;"></p>',
                
            },

            xAxis: {
                categories: [
                    <?php foreach ($LeadsBySourceSummary as  $Source) { ?> '<?= $Source['sourcetitle']; ?>',
                    <?php } ?>
                ]
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ''
                }
            },

            tooltip: {
                format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                    'Total: {point.stackTotal}'
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php foreach ($LeadcountountBySourceSummary as  $SourceLead) {?> <?= $SourceLead['sourcecount']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }, {
                name: 'Opportunity',
                data: [
                    <?php foreach ($OppCountBySourceSummary as  $SourceOpp) {?> <?= $SourceOpp['sourcecount']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }]
        });
        
        
        

    
        function carddragleft() {
            var leftcardelements = [];
            var childnodes = document.getElementById("cards-target-left").children;

            for (var i = 0; i < childnodes.length; i++) {
                $name = childnodes[i].id + ',';
                leftcardelements.push($name);
            }
            //console.log(leftcardelements);
            var myJSONText = JSON.stringify(leftcardelements);

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Dashboard/Savepreferenceleft'); ?>",
                cache: false,
                data: {
                    newArrayleft: myJSONText
                },

                success: function(data) {
                    $(function() {
                        // new PNotify({
                        //     title: 'Delete Note',
                        //     text: 'Deleted successfully',
                        //     type: 'success'
                        //});
                    });
                },
                error: function() {
                    // alert('Error while request..1');
                }
            });

        }

        function carddragright() {
            var leftcardelements = [];
            var childnodes = document.getElementById("cards-target-right").children;

            for (var i = 0; i < childnodes.length; i++) {
                $name = childnodes[i].id + ',';
                leftcardelements.push($name);
            }
            //console.log(leftcardelements);
            var myJSONText = JSON.stringify(leftcardelements);
            console.log(myJSONText);
            $.ajax({
                type: "post",

                url: "<?php echo base_url('admin/Dashboard/Savepreferenceright'); ?>",
                cache: false,
                data: {
                    newArrayright: myJSONText
                },

                success: function(data) {
                    $(function() {
                        // new PNotify({
                        //     title: 'Delete Note',
                        //     text: 'Deleted successfully',
                        //     type: 'success'
                        //});
                    });
                },
                error: function() {
                    // alert('Error while request..2');
                }
            });


        }
    </script>

    <script>
        Highcharts.chart('leadoppbyproductservice_card', {
            // data: {
            //     table: 'datatable'
            // },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Leads-Opportunities By Products-Services<br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            subtitle: {
                text:
                    ''
            },
            xAxis: {
                categories: [
                    <?php foreach ($Lead_Opportunity_by_Product as  $Source) { ?> '<?= $Source['product_name']; ?>',
                    <?php } ?>
                ]
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php foreach ($Lead_Opportunity_by_Product as  $Lead) {?> <?= $Lead['lead']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }, {
                name: 'Opportunity',
                data: [
                    <?php foreach ($Lead_Opportunity_by_Product as  $opp) {?> <?= $opp['opp']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }]
        });

        Highcharts.chart('leadopportunitybyaccountwiserevenue_card', 
        {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Account Wise Revenue <br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($AccountRevenue as $Employee) 
                    {
                        if(!empty($Employee['company_name'] || $Employee['revenue']))
                        {
                    ?>  {
                            name: '<?= $Employee['company_name']; ?>',
                            y: <?= $Employee['revenue']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php 
                        } 
                    }?>
                ]
            }],
        });
        
    </script>