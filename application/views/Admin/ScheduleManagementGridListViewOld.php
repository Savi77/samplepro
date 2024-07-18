

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Admin/includes/header'); ?>
  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script> 
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/tasks_grid.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/tasks_list.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
  <style type="text/css">
    thead
    {
      display: none !important;
    }
  </style>
</head>

<body class="sidebar-xs1">
  <!-- Main navbar -->
    <?php $this->load->view('Admin/includes/admin_header'); ?>
  <!-- /main navbar -->
  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
         <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Schedule List</span></h4>
      </div>
      <div class="heading-elements">
        <a href="#" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-task"></i></b> Create Schedule</a>
      </div>
    </div>
  </div>
  <!-- /page header -->
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
       <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!-- /main sidebar -->
      <!-- Main content -->
      <div class="content-wrapper">
        <div class="navbar navbar-default navbar-xs navbar-component">
          <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
          </ul>
          <div class="navbar-collapse collapse" id="navbar-filter">
            <div class="category-content" style="margin-bottom: -10px;padding: 10px;margin-top: 10px;">
            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#"><i class="icon-file-text2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
                    </div>
                    <div class="media-body" style="vertical-align: bottom;">
                      <h6 class="media-heading text-semibold"><a href="#" class="text-default">Issue List</a></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#"><i class="icon-file-play text-warning-400 icon-2x no-edge-top mt-5"></i></a>
                    </div>

                    <div class="media-body" style="vertical-align: bottom;">
                      <h6 class="media-heading text-semibold"><a href="#" class="text-default">Re-Schedule</a></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#"><i class="icon-file-xml text-info icon-2x no-edge-top mt-5"></i></a>
                    </div>
                    <div class="media-body" style="vertical-align: bottom;">
                      <h6 class="media-heading text-semibold"><a href="#" class="text-default">Completed Issue</a></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>

        <div id="target-content" class="clearfix">
        </div>
        <?php 
               $pending_cnt=count($issue_list_array);
               $quotient = (int)($pending_cnt/2);
        ?>
        <div class="panel panel-flat">
          <table class="table datatable-basic">          
            <tbody>
              <?php
              for($i=0;$i<$quotient;$i++)
              {
              ?>
              <tr>
                <td class="hidden"></td>
                <td class="hidden"><a href="#"></a></td>
                <td class="hidden"></td>
                <td  class="hidden"></td>
                <td style="width:100%;">
                  <div class="row">   
                    <?php 
                          $ticket_no_1=$issue_list_array[$i]['ticket_no'];
                          $issue_1=$issue_list_array[$i]['issue'];
                          $check_1=$issue_list_array[$i]['check'];
                          $company_name_1=$issue_list_array[$i]['company_name'];
                          $created_date_1=$issue_list_array[$i]['created_date'];

                          $priority=$issue_list_array[$i]['priority'];
                     ?>
                      <div class="col-md-6">
                        <div class="panel border-left-lg border-left-danger">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-md-6" align="left"><h6 class="no-margin-top">#<b style="color: #F44336;"><?= $ticket_no_1; ?></b></h6></div>
                                  <div class="col-md-6" align="left"><p class="no-margin-top"> <i class=" icon-reading"></i>&nbsp;: &nbsp;<?= $check_1; ?> </p></div>
                                </div>  
                                <div class="row">
                                  <div class="col-md-6" align="left">                                  
                                    <ul class="list list-unstyled">
                                      <li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_1; ?></li>
                                    </ul> 
                                  </div>
                                  <div class="col-md-6" >
                                     <ul class="list list-unstyled ">
                                      <li class="dropdown">
                                         <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                            <?= $priority;?>  
                                      </li>
                                    </ul> 
                                  </div>
                                </div> 

                                <ul class="list list-unstyled">
                                  <li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1; ?></li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12" align="left">
                                      <ul class="list list-unstyled">
                                        <li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1; ?></span></li>
                                      </ul>                                 
                                    </div>
                                 </div>
                              </div>
                            </div>
                          </div>


                          <div class="panel-footer">                            
                            <ul>
                                 <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_list_array[$i]['scheduledatetime'];?></span></li>
                            </ul>
                            <ul class="pull-right">
                              <li><?= $issue_list_array[$i]['status'];?></li> 
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li><a href="#"><i class="icon-attachment"></i> Upload Documents</a></li>
                                  <li><a href="#"><i class="icon-file-text2"></i> Remarks</a></li>
                                </ul>
                              </li>
                            </ul>   
                          </div>
                        </div>
                      </div>

                    <?php 

                      $record_cnt=$i*2+1;
                      if($record_cnt<$pending_cnt)
                      {
                        $ticket_no_2=$issue_list_array[$record_cnt]['ticket_no'];
                        $issue_2=$issue_list_array[$record_cnt]['issue'];       
                        $check_2=$issue_list_array[$record_cnt]['check'];
                        $company_name_2=$issue_list_array[$record_cnt]['company_name'];
                        $created_date_2=$issue_list_array[$record_cnt]['created_date'];

                     ?>
                      <div class="col-md-6">
                        <div class="panel border-left-lg border-left-success">
                          <div class="panel-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-md-6" align="left"><h6 class="no-margin-top">#<b style="color: #187b1c;"><?= $ticket_no_2; ?></b></h6></div>
                                <div class="col-md-6" align="right"><p class="no-margin-top"> <i class="icon-calendar22"></i>&nbsp;<?= $created_date_2; ?></p></div>
                              </div>                              
                              <ul class="list list-unstyled">
                                <li>Company Name : &nbsp;<?= $company_name_2; ?></li>
                              </ul>

                              <div class="row">
                                <div class="col-md-7" align="left">
                                  <ul class="list list-unstyled">
                                    <li>Schedule To: <span class="text-semibold"><?= $check_2; ?></span></li>
                                  </ul>                                 
                                </div>
                                <div class="col-md-5" align="right">
                                  <ul class="list list-unstyled text-right">
                                    <li class="dropdown">
                                       Priority: &nbsp; 
                                        <a href="#" class="label label-primary dropdown-toggle" data-toggle="dropdown">Normal <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                          <li><a href="#"><span class="status-mark position-left bg-danger"></span> Highest priority</a></li>
                                          <li><a href="#"><span class="status-mark position-left bg-info"></span> High priority</a></li>
                                          <li class="active"><a href="#"><span class="status-mark position-left bg-primary"></span> Normal priority</a></li>
                                          <li><a href="#"><span class="status-mark position-left bg-success"></span> Low priority</a></li>
                                        </ul>
                                    </li>
                                  </ul>                                  
                                </div>
                              </div>
                                <div class="row">
                                <div class="col-md-12" align="left">
                                  <ul class="list list-unstyled">
                                    <li>Issue : <span class="text-semibold"><?= $issue_2; ?></span></li>
                                  </ul>                                 
                                </div>
                               </div>
                            </div>
                          </div>
                          </div>

                          <div class="panel-footer">                            
                            <ul>
                                 <li>Schedule Time : <span class="text-semibold"><?= $issue_list_array[$record_cnt]['scheduledatetime'];?></span></li>
                            </ul>
                            <ul class="pull-right">
                              <li><?= $issue_list_array[$i]['status'];?></li> 
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li><a href="#"><i class="icon-attachment"></i> Upload Documents</a></li>
                                  <li><a href="#"><i class="icon-file-text2"></i> Remarks</a></li>
                                </ul>
                              </li>
                            </ul>   
                          </div>
                        </div>
                      </div>
                    <?php } ?>

                    </div>
                  </td>
                <td  class="hidden">22 Jun 1972</td>
              </tr>
            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
    <!-- Footer -->
      <?php $this->load->view('Admin/includes/AdminFooter.php'); ?>
    <!-- /footer -->

  </div>
  <!-- /page container -->

</body>
</html>
