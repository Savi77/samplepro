<!DOCTYPE html>
<html lang="en" class="layout-static">
<style>
    .highcharts-legend{
        display:none !important;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
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
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
    }
    
    #MyNotesTable tr{
        text-wrap: nowrap;
    }
    #notes .table-heights {
        height:300px !important;
        overflow-x: auto;
    }
    #MyNotesTable_wrapper {
        padding-top: 35px;
    }
    span.select2.select2-container.select2-container--default .select2-selection__rendered .select2-search .select2-search__field {
        width: 100% !important;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php
            if ($type == "s_link") {
                echo $page_name;
            } else if ($type == "d_link") {
                echo $page_name_2;
            } else {
                echo 'Buroforce';
            }
        ?>
    </title>
    <?php
        if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
            
        } else {
    ?>
        <link href="<?= base_url() ?>assets/drag/assets/css/styles.min.css" rel="stylesheet" type="text/css">
        <script src="<?= base_url() ?>assets/drag/global_assets/js/main/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/drag/global_assets/js/plugins/ui/dragula.min.js"></script>
        <script src="<?= base_url() ?>assets/drag/global_assets/js/demo_pages/extension_dnd.js"></script>
    <?php    } ?>

    
    
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/newstyle.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url() ?>new-assets/global_assets/css/icons/fontawesome/styles.min.css">
    <!-- Core JS files -->
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <!-- <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/visualization/d3/d3.min.js"></script> 
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>-->
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/picker_date.js"></script>

    <script src="<?= base_url() ?>new-assets/assets/js/app.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/notifications/bootbox.min.js"></script>
    <!-- /theme JS files -->
    <!-- /table theme JS files -->
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/datatables_sorting.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_input_groups.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/components_modals.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_multiselect.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/datatables_extension_buttons_flash.js"></script>
    <!-- <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script> -->
    <!-- <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/jqueryui_forms.js"></script> -->
    <!-- <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script> -->
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/globalize/globalize.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/effects.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/datatables_extension_select.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_layouts.js"></script>
    <!-- fafa icons-->


    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <!-- pnotify -->
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <!-- pnotify -->
    <!-- bootstrap-clockpicker -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>

    <!-- bootstrap-clockpicker -->

    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>

    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/editor_summernote.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">


    <!-- Chart JS -->
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/highcharts.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/highcharts-3d.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/cylinder.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/funnel3d.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/exporting.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/export-data.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/data.js"></script>
    <script src="<?= base_url()  ?>assets/admin/assets/js/highchart/drilldown.js"></script>

    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_select2.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>
</head>
<style>
    .highcharts-contextmenu .highcharts-menu li:last-child{
        display: none !important;
    }
    .navbar-nav-link>.badge{
        position: absolute;
        top: 4px;
        right: 9px;
    }
</style>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static">
        <div class="d-flex flex-1 d-lg-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile"> <i class="icon-paragraph-justify3"></i> </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button"> <i class="icon-transmission"></i> </button>
        </div>
        <div class="navbar-brand text-center text-lg-left"> <a href="<?= base_url() ?>" class="d-inline-block"> <img src="<?= base_url() ?>new-assets/global_assets/images/header-logo.png" class="d-none d-sm-block" alt=""> <img src="<?= base_url() ?>new-assets/global_assets/images/header-logo.png" class="d-sm-none" alt=""> </a> </div>
        <div class="navbar-collapse order-2 order-lg-1 collapse text-left show" id="navbar-mobile">
            <?php
            $this->db->select('org_cname,org_cdomain');
            $this->db->where("org_id", $this->session->org_id);
            $org_data = $this->db->get("tbl_organisation")->row();
            
            ?>
            <ul class="mb-0">
                <li><?= $org_data->org_cname; ?> </li>
                <li>( <?= $org_data->org_cdomain; ?> )</li>
            </ul>
        </div>
        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
            <?php
            $current_date = date('d');
            $current_month = date('m');
            $final_array_b = array();
            $query1 = $this->db->select('*')->from('tbl_admin_login')->where('DAY(dob)',$current_date)->where('MONTH(dob)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
            foreach($query1 as $row1)
            {
                $new_array=array(
                    'name'=>$row1->name, 
                    'dob'=>$row1->dob, 
                    'email'=>$row1->email,
                    'department'=>$row1->department,
                    'role_id'=>$row1->role_id
                );
                array_push($final_array_b,$new_array);    
            }
            // $query2 = $this->db->select('*')->from('tbl_customer')->where('DAY(dob)',$current_date)->where('MONTH(dob)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
            // foreach($query2 as $row2)
            // {
            //     $new_array1=array(
            //         'name'=>$row2->contact_person_name1, 
            //         'dob'=>$row2->dob, 
            //         'email'=>$row1->email, 
            //         'department'=>'',
            //         'role_id'=>''
            //     );
            //     array_push($final_array_b,$new_array1);    
            // }
            $bday = count($final_array_b);

            $final_array_m = array();
            $query3 = $this->db->select('*')->from('tbl_admin_login')->where('DAY(marriage_anniversary_date)',$current_date)->where('MONTH(marriage_anniversary_date)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
            foreach($query3 as $row3)
            {
                $new_array=array(
                    'name'=>$row3->name, 
                    'marriage_anniversary_date'=>$row3->marriage_anniversary_date, 
                    'email'=>$row3->email, 
                );
                array_push($final_array_m,$new_array);    
            }
            $query4 = $this->db->select('*')->from('tbl_customer')->where('DAY(marriage_anniversary)',$current_date)->where('MONTH(marriage_anniversary)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
            // foreach($query4 as $row4)
            // {
            //     $new_array1=array(
            //         'name'=>$row4->contact_person_name1, 
            //         'marriage_anniversary_date'=>$row4->marriage_anniversary, 
            //         'email'=>$row4->email, 
            //     );
            //     array_push($final_array_m,$new_array1);    
            // }
            $marriage = count($final_array_m);

            $query5 = $this->db->select('*')->from('tbl_customer')->where('DAY(company_anniversary)',$current_date)->where('MONTH(company_anniversary)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
            $company = count($query5);
            
            $count = $bday + $marriage + $company ;

            ?>
            
        <?php        
            $org_id = $this->session->org_id;
            $assign_to = $_SESSION['id'];
            if ($_SESSION['user_type'] == 'SA') 
            {
                $filter_data = " ";
            } 
            else 
            {
                $filter_data = " and assign_to='$assign_to'  ";
            }
            $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE org_id='$org_id'$filter_data and `status`='in_complete' ORDER BY query_id DESC");
            $issue = array();
            // echo "<pre>";
            // print_r($data);
            foreach ($data->result() as $value) 
            {
                $customer_id = $value->customer_id;
               
                $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();

                if(!empty($data1))
                {
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;
                }
                else
                {
                    $company_name = '';
                    $contact_person_name1 = '';
                    $phone_no = '';
                    $email = '';
                    $customer_id ='';
                }
                



                //================ added part for schedule ==================
                $query_id = $value->query_id;
                // echo "<br>";

                $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount = $data3->count;
                if ($schedulecount > 0) {
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();

                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $employee_name = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    // print_r($data5->name);
                    // die;
                    // $employee_name = $data5->name;

                    $check_assign = "Yes";
                } else {
                    $check_assign = "No";
                }

                //================ / addeed part for schedule ==================
                $arr = array(
                    'company_name' => $company_name,
                    'contact_person_name1' => $contact_person_name1,
                    'phone_no' => $phone_no,
                    'email' => $email,
                    'customer_id' => $customer_id,
                    'product_name' => $value->product_name,
                    'query_id' => $value->query_id,
                    'issue' => $value->issue,
                    'ticket_no' => $value->ticket_no,
                    'status' => $value->status,
                    'priority' => $value->priority,
                    'created_date' => $value->created_date,
                    'assign_date' => $assign_date,
                    'starttime' => $assign_starttime,
                    'endtime' => $assign_endtime,
                    'check_assign' => $check_assign,
                    'employee_name' => $employee_name
                );
                array_push($issue, $arr);
            }
            $reschedule_count = count($issue);
        ?>
        
            <li class="nav-item nav-item-dropdown-lg dropdown"> <a href="<?= base_url() ?>admin/ScheduleManagement/TrasnsferList" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown modal" title="Transferred Task" rel="tooltip"> <i class="fa fa-share-from-square"></i> <span class="badge badge-warning badge-pill ml-auto ml-lg-0 blinknumber" style="background-color:red;height: 20px;padding-top: 4px;width: auto;padding-inline: 4px 6px;top: 4px;right: 3px;"><?= $reschedule_count?></span> </a>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown"><a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true" style="font-size: 15px !important;"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a data-toggle="modal" data-target="#shortcut-add-activity" class="dropdown-item"><i class="icon-calendar2 position-left"></i>Add Task</a>
                    <a href="<?= base_url() ?>admin/Customer" class="dropdown-item"><i class="icon-users4 position-left"></i>Contact List</a>
                    <a href="<?= base_url() ?>admin/Users" class="dropdown-item"><i class="icon-user-tie position-left"></i>Users</a>
                </div>
            </li>
            
        </ul>
        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
            <li class="nav-item nav-item-dropdown-lg dropdown"> <a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown modal" title="Notification" rel="tooltip"> <i class="icon-bell2"></i> <span class="badge badge-warning badge-pill ml-auto ml-lg-0" style="background-color:red;height: 20px;padding-top: 4px;width: auto;padding-inline: 4px 6px;">0</span> </a>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown"> 
                <a href="<?= base_url() ?>admin/Dashboard/TodayEvent" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown modal" title="Today's Event" rel="tooltip"> 
                <i class="fa fa-cake-candles" style="font-size: large;"></i>
                <span class="badge badge-warning badge-pill ml-auto ml-lg-0 " style="background-color:red;height: 20px;padding-top: 4px;width: auto;padding-inline: 4px 6px;"><?=$count;?></span>
                </a>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100"> <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown"> <img src="<?= base_url() ?>new-assets/global_assets/images/avtara.jpg" class="rounded-pill mr-lg-2" height="34" alt=""> <span class="d-none d-lg-inline-block"><?= $this->session->name; ?></span> </a>
                <div class="dropdown-menu dropdown-menu-right"> <a href="<?= base_url('admin/dashboard/ViewMyProfile') ?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="<?= base_url('admin/Admin_authentication/logout') ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-section sidebar-user my-1">
                    <div class="sidebar-section-body">
                        <div class="media">
                            <div class="media-body">
                            </div>
                            <div class="ml-3 align-self-center">
                                <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex"> <svg class="dashboard" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg> </button>
                                <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none"> <i class="icon-cross2"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->

                <!-- Main navigation -->
                <?php $this->load->view('Admin/includes/n-sidebar'); ?>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
        </div>
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                <?php
                $account_period_aray = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$this->session->org_id)->where('status',1)->get()->row();
                // echo "<pre>";
                // print_r($account_period_array);
                $account_period_select = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$this->session->org_id)->order_by('period_id','DESC')->get()->result();
                if(!empty($account_period_select))
                {
                ?>
                <div class="col-md-4">
                <select name="menu_id" class="form-control" id="select_box" data-placeholder="Select Period" onclick="changestatus()" style="width:250px;">
                    <option value="">Select Period</option>
                    <?php
                    foreach ($account_period_select as $value) {
                    ?>
                        <option value="<?= $value->period_id ?>" <?= $rbt = ($account_period_aray->period_id == $value->period_id) ? 'selected' : '' ?> ><?= date('d F Y',strtotime($value->start_date)); ?> to <?= date('d F Y',strtotime($value->end_date)); ?></option>

                        <!-- <option value="<?=$value->period_id;?>"><?= $value->start_date; ?> - <?= $value->end_date; ?></option> -->
                    <?php } ?>
                </select>
                </div>
                
                <?php
                }
                ?>          
                </a>
                    <div class="page-title d-flex">
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                    <div class="images-header col-md-8" style="justify-content: end;">
                        <figure class="sub-header-icon"> <a href="<?= base_url() ?>admin/DocumentUpload/CreateDirectory"><img class="header-img calender" src="<?= base_url() ?>new-assets/assets/Images/documents-icon.svg">
                                <figcaption>Documents</figcaption>
                            </a> </figure>
                        <figure class="sub-header-icon"> <a href="<?= base_url() ?>admin/dashboard/viewcalendar"><img class="header-img documents" src="<?= base_url() ?>new-assets/assets/Images/calender-icon.svg">
                                <figcaption> Calender </figcaption>
                            </a> </figure>
                        <figure class="sub-header-icon"> <a type="button" class="notes" data-toggle="modal" data-target="#notes"><img class="header-img notes" src="<?= base_url() ?>new-assets/assets/Images/notes-icon.svg">
                                <figcaption> Notes </figcaption>
                            </a> </figure>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <?php if ($type == "s_link") {  ?>
                                <a href="<?= base_url() ?>admin/Dashboard/view_dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item active"><?= $page_name ?></span>
                            <?php   } else if ($type == "d_link") { ?>
                                <a href="<?= base_url() ?>admin/Dashboard/view_dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <a href="<?= base_url() ?><?= $page_name_link ?>" class="breadcrumb-item"> <?= $page_name_1 ?></a>
                                <span class="breadcrumb-item active"><?= $page_name_2 ?></span>
                            <?php   } else {  ?>
                                <a href="<?= base_url() ?>admin/Dashboard/view_dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <?php   }   ?>
                        </div>

                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

                </div>
            </div>
            <!-- /sidebar content -->

            <div id="notes" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">
                                Notes</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <form id="add_notes_form" method="post">
                                        <div class="form-group">
                                            <label><b>Add new note </b> <sup style="color: red">*</sup>
                                            </label>
                                            <textarea class="form-control" name="notes" rows="3"></textarea>
                                        </div>
                                        <div class="float-right" style="margin-bottom:40px;">
                                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive table-heights" style="border-style: solid; border-width: 1px; border-color: #ddd;">
                                    <table class="table table-striped" id="MyNotesTable">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $this->db->where("emp_id", $this->session->id);
                                            $this->db->order_by("note_id", 'DESC');
                                            $GetNotes = $this->db->get("tbl_notes")->result();
                                            $cnt = 1;
                                            foreach ($GetNotes as $row) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div>
                                                        <?= $cnt; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-wrap-col" style="width:350px;">
                                                        <?= $row->notes; ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td class="d-flex">
                                                        <a class="flex-icon cursor-pointer" onclick="edit_notes(id)" id="<?= $row->note_id ?>">
                                                            <i class="fa fa-edit"></i>

                                                        </a>
                                                        <a class="flex-icon cursor-pointer" onclick="del_notes(id)" id="<?= $row->note_id; ?>">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>

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
                                                                                <li>
                                                                                    <a onclick="edit_notes(id)" id="<?= $row->note_id ?>" style="color:#333333;">
                                                                                        <span class="status-mark position-left dot dot-green"></span> Edit Note  
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a onclick="del_notes(this)" data-id="<?= $row->note_id; ?>" id="<?= $row->note_id; ?>" style="color:#333333;">
                                                                                        <span class="status-mark position-left dot dot-red"></span> Delete Note  
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> 

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <!-- </td> -->
                                                </tr>
                                            <?php $cnt++;
                                            }   ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="EditNotes" class="modal fade show" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">Edit Notes</h6>
                            <button type="button" class="close" data-dismiss="modal" onclick="updateUI_edit_button_close()" id="edit_button_close">×</button>
                        </div>

                        <div class="modal-body">
                            <div id="EditNotesModel"></div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            $this->load->model('Admin/Customer_model');
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->order_by('company_name', 'ASC');
            $customer_list = $this->db->get('tbl_customer')->result();

            $this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->where('status', 1);
            $product_list = $this->db->get('tbl_product_service_list')->result();

            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('user_status', 1);
            $this->db->where('delete_status', 0);
            $this->db->where('user_type', 'E');
            $employee_list = $this->db->get('tbl_admin_login')->result();

            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->where('status', 1);
            $schedule_visit_list = $this->db->get('tbl_schedule_type_name')->result();

            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);
            $this->db->where('status',0);
            $this->db->order_by("notify_id", "asc");
            $getNotifyBy =  $this->db->get('tbl_notify_by')->result();

            $this->db->where('org_id',$this->session->org_id);
            $this->db->where('delete_status',0);
            $this->db->where('status',0);
            $this->db->order_by("time_slot", "asc");
            $getTimeSlot = $this->db->get('tbl_time_slot')->result();

            $this->db->select('id,name,email');
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('user_type', 'E');
            $this->db->where('user_status', 1);
            $getUserSysyemList = $this->db->get('tbl_admin_login')->result();
            ?>
            <?php
                $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
            ?>
            <div id="shortcut-add-activity" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">
                                Add Task</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" id="shortcut_schedule_addForm">
                                            <div class="row">
                                                <div class="form-group col-sm-12 d-flex">
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="customer_id" id="header_customer_type" data-placeholder="Select Company">
                                                            <option value="">Select Company</option>
                                                            <?php foreach ($customer_list as $value) { ?>
                                                                <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                                    (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                    
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Resource Name <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="employee_id" id="employee_id_type_header" onchange="getassignedissueChange12()" data-placeholder="Select Resource">
                                                            <option value="">Select Resource</option>
                                                            <?php
                                                            foreach ($employee_list as $value2) {
                                                                $all_emp_id = $value2->id;
                                                                if ($all_emp_id == $emp_id) {
                                                            ?>
                                                                    <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                    $user_sess_type = $this->session->user_type;
                                                    if ($this->session->user_type != "SA") {
                                                        $emp_id = $this->session->id;
                                                        $name_emp = $this->session->name;
                                                    } else {
                                                        $emp_id = '';
                                                    }
                                                ?>
                                                <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                                                <div class="form-group col-sm-12 d-flex">
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="product_id" id="product_id_type_header" data-placeholder="Select Product">
                                                            <option value="">Select Product</option>
                                                            <?php
                                                            foreach ($product_list as $value1) { ?>
                                                                <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                    <label class="control-label col-sm-2 m-auto" for="email">Comments</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control" rows="1" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12" id="issuelistdetails" style="display: none">
                                                    <label class="control-label col-sm-12 m-auto" for="Youtube">Assign issue list</label>
                                                    <div class="col-sm-12" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12 d-flex">
                                                    <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                            </span>
                                                            <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date_header" name="schedule_date" value="<?= date('d F, Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueChange12()" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="schedule_type_id" id="schedule_type_id_type_header" data-placeholder="Select Schedule Type">
                                                            <option value="">Select Schedule Type</option>
                                                            <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                                <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12 d-flex">
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" id="schedule_start_time_schedule_header" name="schedule_start_time" placeholder="Select Start Time"  autocomplete="off" readonly>
                                                        <span id="err3" style="color:red; font-size: 12px;"></span>
                                                    </div>
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" id="schedule_end_time_schedule_header" name="schedule_end_time" placeholder="Select End Time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off" readonly>
                                                        <span id="err4" style="color:red; font-size: 12px;"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12 d-flex">
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="priority_id" id="priority_id_fetch_header" data-placeholder="Select Priority">
                                                            <option value="">Select Priority</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Low">Low</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </div>
                                                    <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="status" id="status_fetch_heaader" data-placeholder="Select Status">
                                                            <option value="">Select Status</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Inprogress">In-progress</option>
                                                            <option value="Completed">Completed</option>
                                                        </select>
                                                    </div>
                                                    <!-- </div> -->
                                                </div>
                                                <div class="col-12 pl-3">
                                                    <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1" >
                                                    <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                                </div>
                                                <div class="reminderSetting col-sm-12" style="display: none;">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-12" for="email">User 
                                                                <span style="color: red;">*</span>
                                                            </label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" name="user_id[]" id="user_id_type_header" data-placeholder="Select User" multiple >
                                                                    <option value="">Select User</option>
                                                                    <?php foreach ($getUserSysyemList as $value1) {   ?>
                                                                        <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                                    <?php   }    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-12" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" name="reminder_before_time" id="reminder_before_time_type_header" data-placeholder="Select Reminder Before Time">
                                                                    <option value="">Select Reminder Before Time</option>
                                                                    <!-- <?php foreach ($getTimeSlot as $value) { ?>
                                                                        <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                                    <?php  } ?> -->
                                                                    <?php foreach ($getTimeSlot as $value) { ?>
                                                                        <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                                    <?php  } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                                                            <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_type_header" data-placeholder="Select Notify By">
                                                                    <option value="">Select Notify By</option> 
                                                                    <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                                                    <?php foreach ($getNotifyBy as $value) { ?>
                                                                        <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-12" for="email">Notes <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Notes" maxlength="500"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" name="recurring_set" id="recurring_set_type_header" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
                                                                    <option value="">Select Recurring</option>
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="recuuringData col-sm-12" style="display: none;clear:both">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label col-sm-12" for="email" style="padding-left:0;">Recurring Interval </label>
                                                        <div class="col-sm-12" style="padding-left:0;">
                                                            <select class="form-control" name="interval_type" id="interval_type_header" data-placeholder="Select Recurring Interval">
                                                                <!-- <option value="">Select Recurring Interval</option>
                                                                <option value="day">Day</option>
                                                                <option value="week">Week</option>
                                                                <option value="fortnightly">Fortnightly</option>
                                                                <option value="monthly">Monthly</option>
                                                                <option value="quaterly">Quaterly</option>
                                                                <option value="half-quarterly">Half Quarterly</option>
                                                                <option value="year">Year</option> -->
                                                                <?php
                                                                if(!empty($get_reminder_details->rem_recurring_interval_name))
                                                                {
                                                                    if($get_reminder_details->rem_recurring_interval_name == 'day')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day" selected=''>Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'week')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week" selected=''>Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'fortnightly')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly" selected=''>Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'monthly')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly" selected=''>Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'quaterly')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly" selected=''>Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'half-quarterly')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly" selected=''>Half Quarterly</option>
                                                                        <option value="year">Year</option>
                                                                <?php
                                                                    }
                                                                    else if($get_reminder_details->rem_recurring_interval_name == 'year')
                                                                    {
                                                                ?>
                                                                        <option value="">Select Recurring Interval</option>
                                                                        <option value="day">Day</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="fortnightly">Fortnightly</option>
                                                                        <option value="monthly">Monthly</option>
                                                                        <option value="quaterly">Quaterly</option>
                                                                        <option value="half-quarterly">Half Quarterly</option>
                                                                        <option value="year" selected=''>Year</option>
                                                                <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label col-sm-12" for="email" style="padding-right:0;">Recurring EOD</label>
                                                        <div class="col-sm-12" style="padding-right:0;">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                                </span>
                                                                <input type="text" class="form-control pickadate-selectors rounded-right" id="recurring_eod_header" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off" onchange="checkvalidationdate_header()">
                                                            </div>
                                                            <small id = 'error_recurring_eod' style="display:none; color: #f00 !important"> Recurring EOD can not be less than start date</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12" style="text-align:end;">
                                                    <button type="submit" class="btn btn-primary pull-right" id="task_sub_btn">
                                                        Submit<i class="icon-arrow-right14 position-right"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div id="preview"></div>
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

<script type="text/javascript">
    $('#employee_id_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#product_id_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#header_customer_type').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#schedule_type_id_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#user_id_type_header').select2({
        dropdownParent: $('#shortcut-add-activity'),
    });

    $('#reminder_before_time_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#reminder_notify_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#recurring_set_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#interval_type_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#priority_id_fetch_header').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#status_fetch_heaader').select2({
        dropdownParent: $('#shortcut-add-activity')
    });


    

    $('.select2-selection__rendered').hover(function () {
        $(this).removeAttr('title');
    });


    $("ul.select2-selection__rendered").hover(function(){
      $(this).find('li').removeAttr('title');
    });

    
    $(".select2-container--default").tooltip({
        title: function() {
            return $(this).prev().attr("title");
        },
        placement: "auto",
        //container: 'body'
    });

    

    

    function showDataRecurring(id) {
        if (id == 1) {
            $('.recuuringData').css('display','flex');
        } else {
            $('.recuuringData').css('display','none');
        }
    }
    $(document).on('change', '.checkboxchecked', function() {
        if (this.checked) {
            $('.reminderSetting').show();
        } else {
            $('.reminderSetting').hide();
            $('#user_id').val("");
            $('#reminder_before_time_type3').val("");
            $('#reminder_note').val('');
        }
    });

    $('#schedule_date_header').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_date');
    });

    $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

    // $('#schedule_start_time_schedule').change(function() {
    //     $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
    // });

    // $('#schedule_end_time_schedule').change(function() {
    //     $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
    // });

    
</script> 

<script>
    function checkvalidationdate_header()
        {
            var schedule_date = new Date($('#schedule_date_header').val());
            var recurring_eod = new Date($('#recurring_eod_header').val());
            
            if (schedule_date > recurring_eod) 
            {
                $('#error_recurring_eod').css('display','block');
                $("#task_sub_btn").attr('disabled', true);
            }
            else
            {
                $('#error_recurring_eod').css('display','none');
                $("#task_sub_btn").attr('disabled', false);
            }
        } 
</script>

<script>
    $(document).ready(function(){
    $('[rel="tooltip"]').tooltip();   
    });
</script>

<script>
    
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
     
    $(document).ready(function() {
        $("#select_box").select2();
    });
</script>


<script>
    function changestatus()
    {
        var selectElement = document.querySelector('#select_box');
        var output = selectElement.value;

        // var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/dashboard/changestatus'); ?>",
          cache: false,
          data: { "p_id": output },
          success: function(data) {
            if(data == 1)
            {

            }
            else
            {

            }
            setTimeout(function() {
                window.location.reload();
            });
            // $(function() {
            //   $("deactivateSucessModal").modal('show');
            // });
          },
          error: function() {
            // $("deleteErrorModal").modal('show');
            // alert('not ok');
          }
        });
    }
</script>

<script>
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
</script>

<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>


<script>

        $(document).ready(function () {
       
        $(document).click(function (e) {
            if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>

<script>
    // var rescheduleTable = $(document).ready(function(){
    $('#MyNotesTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        stateSave: true,
        columnDefs: [
            {
                targets: -1,
                visible: true,
            }
        ]
    } );
// });
</script>
