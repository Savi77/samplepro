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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
    <!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->

<!--====================== Tab active color and bottom style ====================================-->
   <style type="text/css">
    .nav-tabs.nav-tabs-bottom > li 
    {
        margin-bottom: -4px;
    }
   </style>
<!--====================== / Tab active color and bottom style ====================================-->
<!--============================ Date picker adjustment ================================ -->
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
        margin-left: 20px !important;
        left: 0px !important;
    }
    .dataTables_length 
    {
        margin-right: 11px !important;
    }
    input, button, select, textarea 
    {
        height: auto !important;
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
     table.dataTable thead th, table.dataTable thead td 
     {
        padding: 10px 6px;
        border-bottom: 1px solid #111;
    }
  </style>
  <!--============================ Date picker adjustment ================================ -->

<!--============================ previous date hide datepicker color changes================================ -->
  <style type="text/css">
  .ui-datepicker table td.ui-state-disabled span 
  {
    color: #2d2d2d;
  }
  .ui-datepicker table td.ui-datepicker-today .ui-state-highlight 
  {
    background-color: #2196F3;
    color: #252424;
  }
   .testing 
  {
    z-index: 100000;
  }
  .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
    font-size: 12px;
    color: #333232;
        margin-left: 5px;
    }

    .ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span
     {
        display: none !important;
     }

     .ui-datepicker table td.ui-datepicker-current-day .ui-state-active 
     {
        background-color: #26A69A;
        color: #333;
    }

</style>
<!--============================ / previous date hide datepicker color changes================================ -->
  <style type="text/css">
  
  .daterange-single 
  {
    z-index: 2000;
  }

/*  Display datepicker on modal (popup)  */

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

</style>


</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Thought
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
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
      <!--  -->
      <!-- Main content -->
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
        <!-- Basic responsive configuration -->
              <div class="panel panel-flat" >
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#00619F;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab"><i class="icon-file-text position-right" style="zoom:1.4;"></i> &nbsp; &nbsp;Thought List</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="right-icon-tab1">
                                <!-- <div class="row"> -->
                                      <table class="table datatable-responsive">
                                          <thead>
                                            <tr>
                                                  <th>#</th>
                                                  <th>Thought</th>
                                                  <th class="hidden"></th>
                                                  <th class="hidden">Title</th>
                                                  <th class="hidden">Title</th>
                                                  <th class="hidden">Status</th>
                                                  <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                               <?php
                                                 //print_r($get_list->result());
                                                 $count = 1;
                                                 foreach($get_list as $row) { ?>
                                                <tr>
                                                  <td><?php echo $count ?></td>                               
                                                  <td><?= $row->thought ?></td>
                                                  <td class="hidden">><?= $row->thought_id ?></td>
                                                  <td class="hidden"><?= $row->thought_id ?></td>
                                                  <td class="hidden"><?= $row->thought_id ?></td>
                                                   <td class="hidden"><?= $row->thought_id ?></td>
                                                  <td style="width: 10%;">
                                                     <ul class="icons-list">
                                                        <li><a  onclick="edit(id)" id="<?= $row->thought_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Thought" data-placement="bottom"></i></span></a></li>
                                                        <li><a onclick="del_thought(id)" id="<?= $row->thought_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Thought" data-placement="bottom"></i></span></a></li>
                                                      </ul>
                                                  </td>
                                                </tr>
                                              <?php $count++; } ?>
                                          </tbody>
                                        </table>
                                 <!-- </div> -->
                          </div>
                      </div>
                    </div>
                 </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

    <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
               <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px" >
                  <i class="icon-file-text" style="zoom:1.1; "></i>
                    &nbsp; &nbsp;Add New Thought
                  </h5>
                </div>
                <div class="modal-body">
                  <form id="addform" method="post">
                    <div class="panel panel-flat">
                      <div class="panel-body">
                        <fieldset>
                         <div class="row">
                           <div class="col-md-12"> 
                              <div class="form-group">
                                <label>Enter Thought :</label>
                                 <textarea class="form-control" name="thought" rows="2" maxlength="500"></textarea>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                       <br/>
                      <div class="text-center">
                      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                      <span id="preview"></span>
                    </div>  
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

   <!--  -->

   <div id="modal_default" class="modal fade">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
               <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px" >
                  <i class="icon-file-text" style="zoom:1.1; "></i>
                    &nbsp; &nbsp;Edit  Thought
                  </h5>
                </div>
          <div class="modal-body">
            <div id="complaint_model_data">
            </div>
         </div>
        </div>
      </div>
  </div>

<script type="text/javascript">
 $(document).ready(function()
  {
    $('#addform').bootstrapValidator({
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
</script>

<script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#addform").on('submit',(function(e)
           {  
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {
                  $.ajax({
                     url: "<?php echo base_url('admin/Thoughts/add'); ?>",
                     type: "POST",
                     data:  new FormData(this),
                     contentType: false,
                     cache: false,
                     processData:false,
                     success: function(data)
                      {
                         // alert(data);
                         $(function(){
                           new PNotify({
                                        title: 'Add Thought',
                                        text: 'Shift Added Successfully',
                                        type: 'success'
                                       });
                          });

                           setTimeout(function()
                             {
                                 window.location="<?php echo base_url('admin/Thoughts');?>";
                             }, 1000);

                      },
                      error: function() 
                      {
                        alert('fail');
                      }           
                   });
              }
              return false;
          }));
      });
</script>

<script>
    function edit(thought_id)
    {
      $(window).scrollTop(0);
      var datastring = 'thought_id='+thought_id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Thoughts/edit'); ?>",
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
    }
</script>

<script>
    function del_thought(thought_id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Thought ?</p>',
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
            var datastring = 'thought_id='+thought_id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Thoughts/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                  $(function()
                  {
                     new PNotify({
                                  title: 'Delete Thoughts',
                                  text: 'Deleted successfully',
                                  type: 'success'
                                 });
                    });

                     setTimeout(function()
                     {
                        window.location="<?php echo base_url('admin/Thoughts');?>";
                     }, 800);               
               },
                  error: function(){      
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

</body>
</html>
