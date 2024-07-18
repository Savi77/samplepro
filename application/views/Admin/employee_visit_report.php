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
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <style type="text/css">
        tr.group, tr.group:hover 
        {
            background-color: rgb(103, 98, 98) !important;
            color: white !important;
            font-size: 14px !important;
            font-weight: 600 !important;
        }

      .dataTables_length > label > span:first-child
        {
          float: left;
          margin: 5px 9px;
          margin-left: -15px;
        }
      .datatable-header > div:first-child, .datatable-footer > div:first-child 
      {
          margin-left: 9px !important;
          left: -13px !important;
      }
      input, button, select, textarea 
      {
          height: 30px !important;
      }
        .btn-info 
        {
            color: #fff;
            background-color: rgba(236, 14, 39, 0.77) !important;
            border-color: rgba(236, 14, 39, 0.77) !important;
        }
        .nav-tabs > li > a 
       {
          margin-right: 0;
          color: #ddd !important;
       }
    </style>


</head>

<body style="overflow-x: hidden;">
<?php  $this->load->view('Admin/includes/admin_header'); ?>
 
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
      <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!--  -->
      <!-- Main content -->
      <div class="content-wrapper">
        <div class="row">

          <div class="row">
          <div class="col-md-12">
          <?php $this->load->view('Admin/includes/panel'); ?>
            <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold"></span>Dashboard</a> -
         <a href="<?php echo base_url('admin/Tracking/view_tracking');?>"> <span class="text-semibold"></span>Tracking</a> -
           Client Visit Report
        </h4>
      </div>
    </div>
  </div>
  <!-- /page header -->
            <!-- <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab"><i class="icon-location4 position-left"></i> Client Visit Report</a></li>
                 
                  </ul>
                  <br>
                    <div class="ibox-content" style="background-color: white;">
                      <form method="post" class="form-horizontal" id="defaultForm">
                          <div class="row">
                            <div class="col-md-12">
                                 <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Select Employee <span style="color: red;">*</span></label>
                                        <div class="col-sm-8" >
                                           <div class="form-group"> 
                                            <select class="select" name="emp_id" id="emp_id">
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
                                  </div>  
                                 <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Select Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-7" id="data_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control" name="form_date" id="form_date" placeholder="Please select date" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                  </div>   
                                  <div class="col-md-1">  
                                        <button class="btn btn-primary" type="submit" id="mybtn" style="padding: 6px 30px;">Submit</button>
                                             &nbsp;&nbsp; <span id="preview"></span>
                                  </div>
                                </div>  
                         </div>     
                      </form>
                      

                  </div>
                <div id='range_data'></div>
              </div>
              </div>
           </div> -->

          <div class="panel panel-flat">
            <div class="panel-heading table_header">
              <h5 class="panel-title" style="color:white"> Client Visit Report</h5>
            </div>
            <div class="panel-heading">
              <form method="post" class="form-horizontal" id="defaultForm">
                <div class="row">
                  <div class="col-md-12">
                        <div class="col-md-5">
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Select Employee <span style="color: red;">*</span></label>
                              <div class="col-sm-8" >
                                  <div class="form-group"> 
                                  <select class="select" name="emp_id" id="emp_id">
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
                        </div>  
                        <div class="col-md-5">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Select Date <span style="color: red;">*</span></label>
                              <div class="col-sm-7" id="data_1">
                                  <div class="input-group date">
                                      <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                      <input type="text" class="form-control" name="form_date" id="form_date" placeholder="Please select date" autocomplete="off">
                                  </div>
                              </div>
                          </div>
                        </div>   
                        <div class="col-md-1">  
                              <button class="btn btn-primary" type="submit" id="mybtn" style="padding: 6px 30px;">Submit</button>
                                    &nbsp;&nbsp; <span id="preview"></span>
                        </div>
                      </div>  
                </div>     
              </form>
            </div>
            <div id='range_data'></div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
<!-- /footer -->
<!--========================== Date picker javascript ====================================-->
<script type="text/javascript">
          $(function () 
          {
              $('#form_date').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
          });
      </script>
      <script type="text/javascript">
        $("#form_date").on("dp.change", function (e) 
        {

              $('#defaultForm').bootstrapValidator('revalidateField', 'form_date'); 
              document.getElementById("mybtn").disabled = false;  
        });
      </script>
<!--========================== / Date picker javascript ====================================-->

<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               form_date: {
                validators: {
                      notEmpty: {
                                 message: 'Date is required'
                     }
                        }
                    },
                 emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select employee '
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
       $("#defaultForm").on('submit',(function(e)
           {           
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
               }
              else
              {
                 $("#preview").show();
                 $("#preview").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                 
                 $.ajax({
                          type: "POST",
                          url: '<?php echo base_url('admin/Tracking/FetchClientReport') ?>',
                          data: $('#defaultForm').serialize(),
                          success: function(data)
                          {
                            // alert(data);
                              $("#range_data").html(data);
                              $("#preview").hide();
                              document.getElementById("mybtn").disabled = false; 
                               $('#example2').DataTable();
                                 
                         }
                     });
                  // ------------------------
              }
         // return false;
           e.preventDefault();
          }));
      });
</script>


<!--======================================= / Activate & Deactivate ==========================================-->



<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 1 }
        ],
        "order": [[ 1, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="7">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                }
            } );
            
            for( var k=0; k < groupadmin.length; k++){
        // Code added for adding class to sibling elements as "group_<id>"  
                  $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                // Code added for adding Toggle functionality for each group
                    $("#"+groupadmin[k]).click(function(){
                        var gid = $(this).attr("id");
                         $(".group_"+gid).slideToggle(300);
                    });
                 
            }
        }
    } );
} );



</script>

</body>
</html>
