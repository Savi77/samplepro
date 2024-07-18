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
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

   <style type="text/css">
    .nav-tabs.nav-tabs-bottom > li 
    {
        margin-bottom: -4px;
    }
   </style>
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

  <style type="text/css">
    

  </style>

<style type="text/css">
    
  .tree, .tree ul {
      margin:0;
      padding:0;
      list-style:none
  }
  .tree ul {
      margin-left:1em;
      position:relative
  }
  .tree ul ul {
      margin-left:.5em
  }
  .tree ul:before {
      content:"";
      display:block;
      width:0;
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      border-left:1px solid
  }
  .tree li {
      margin:0;
      padding:5px 1em;
      line-height:2em;
      color:#369;
      font-weight:700;
      position:relative
  }
  .tree ul li:before {
      content:"";
      display:block;
      width:10px;
      height:0;
      border-top:1px solid;
      margin-top:-1px;
      position:absolute;
      top:1em;
      left:0
  }
  .tree ul li:last-child:before {
      background:#fff;
      height:auto;
      top:1em;
      bottom:0
  }
  .indicator {
      margin-right:5px;
  }
  .tree li a {
      text-decoration: none;
      color:#369;
  }
  .tree li button, .tree li button:active, .tree li button:focus {
      text-decoration: none;
      color:#369;
      border:none;
      background:transparent;
      margin:0px 0px 0px 0px;
      padding:0px 0px 0px 0px;
      outline: 0;
  }

  .glyphicon
  {
      font-size: 25px !important;
      vertical-align: middle;
      top: -1px;
  }

  .treestructure
  {
    padding: 16px !important;
  }

</style>


</head>

<body style="overflow-x: hidden;">
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <?php
    // echo json_encode($user_permission);
    $AddClassP='style="display:block";';
    $UploadDocClass='style="display:contents";';
    $DownloadClass='style="display:block";';

    foreach ($user_permission as $priviledge) 
    {
        $priviledge_key=$priviledge->priviledge_key;
        $status=$priviledge->status;
        if ($priviledge_key=='CREATEDIR')
        {
            if($status==1)
            {
            $AddClassP=' style="display:block"; ';
            } 
            else
            {
            $AddClassP=' style="display:none"; ';   
            }
        }     

        if ($priviledge_key=='UPLOADDOC')
        {
            // echo 11;
            if($status==1)
            {
              $UploadDocClass=' style="display:contents"; ';
            } 
            else
            {
              $UploadDocClass=' style="display:none"; ';   
            }
        }   

        if ($priviledge_key=='DOWNLOAD')
        {
            if($status==1)
            {
              $DownloadClass='style="display:block"; ';
            } 
            else
            {
              $DownloadClass='style="display:none"; ';   
            }
        }
    }

  ?>
    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
          <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Document Management System</span></a> </h4>
      </div>

      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?> ><i class="icon-file-plus text-primary"></i><span>Add Folder</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
  <!-- Page container -->
  <div class="page-container">
    <div class="page-content">
        <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-flat" >
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#00619F;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">
                            <i class="icon-folder-plus2 position-left" style="zoom:1.4;"></i> Document Management System</a></li>
                        </ul>
                        <div class="tab-content">
                        <div class="container" style="margin-top:30px;">
                            <div class="row">

                            <?php 
                              $count=1;
                              foreach ($listdata as $row) 
                              {
                                $sub_array=$row['dir_subarray'];
                                $dir_id=$row['dir_id'];

                                // print_r($sub_array);
                              ?>
                              <div class="">
                                <div class="col-md-3 treestructure">
                                  <div class="row ">
                                    <ul class="tree2">
                                        <li> <?= $row['dir_name']; ?> &nbsp;&nbsp; <a  onclick="remark_list_pending(id)" id="<?= $dir_id; ?>" <?= $UploadDocClass; ?> ><i class="icon-stack-up"></i></a>&nbsp;&nbsp; <a  onclick="view_documents(id)" id="<?= $dir_id; ?>"><i class="icon-eye"></i></a>
                                            
                                                <ul>
                                                <?php for($d=0;$d<count($sub_array);$d++) {  $sdir_id=$sub_array[$d]->dir_id ?>
                                                  <li>&nbsp;&nbsp;<?= $sub_array[$d]->dir_name; ?>
                                                   &nbsp;&nbsp; <a  onclick="remark_list_pending(id)" id="<?= $sdir_id; ?>"  <?= $UploadDocClass; ?> ><i class="icon-stack-up"></i></a>&nbsp;&nbsp; <a  onclick="view_documents(id)" id="<?= $sdir_id; ?>"><i class="icon-eye"></i></a>
                                                      <ul>
                                                        
                                                      </ul>
                                                  </li>
                                                <?php } ?>
                                               </ul>
                                            <!-- </ul> -->
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>

                              <?php } ?>  

                            </div>
                        </div>
                        <br/> <br/> <br/> <br/>
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
                <i class="icon-folder-plus2" style="zoom:1.1; "></i>
                  &nbsp; Add Folder
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
                                 <label>Directory Type : <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="dir_type" onchange="show_dir(this.value)">
                                      <option value="">Select Directory Type</option>
                                      <option value="Main">Main / Parent Directory</option>
                                      <option value="Sub">Sub Directory</option>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>

                      <fieldset id="parent_dir" style="display: none;">
                        <div class="row" >
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Parent Directory : <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="dir_parentid">
                                      <option value="">Select Parent Directory</option>
                                          <?php 
                                            // $count=1;
                                            foreach ($MainDirectoryList as $row22) 
                                            {
                                            ?>
                                             <option value="<?= $row22->dir_id; ?>"><?= $row22->dir_name; ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>


                      <fieldset>
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Directory Name : <sup style="color: red">*</sup></label>
                                  <input type="text" class="form-control" name="dir_name"  id="dir_name" onkeyup="upper_case(value)">
                              </div>
                            </div>          
                        </div>
                      </fieldset>


                      <fieldset>
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Directory Access : <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="dir_access">
                                      <option value="">Select Directory Access</option>
                                      <option value="Secured">Secured</option>
                                      <option value="Opened">Opened</option>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>
                                          
                     <br/>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                    <span id="preview_upload"></span>
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
          <div class="modal-header bg-info" style="background-color:#00619F;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><i class="icon-sort-numeric-asc" style="zoom:1.1; "></i>
                    &nbsp; &nbsp;Edit Credit Term</h6>
          </div>
          <div class="modal-body">
              <div id="complaint_model_data">
              </div>
         </div>
        </div>
      </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="issue_details" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content"  id="bind_issue_data">

        </div>               
      </div>
    </div>
    <!--  -->

<!--  -->

     <div id="AddAttachmentmodal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="AddAttachmentmodalData">

         </div>
      </div>
    </div>



     <div id="ViewDirDocDatamodal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="ViewDirDocData">

         </div>
      </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->
<!--  -->

<script type="text/javascript"> 
  $.fn.extend({
      treed: function (o) {
        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';
        if (typeof o != 'undefined'){
          if (typeof o.openedClass != 'undefined'){
          openedClass = o.openedClass;
          }
          if (typeof o.closedClass != 'undefined'){
          closedClass = o.closedClass;
          }
        };
        
          //initialize each of the top levels
          var tree = $(this);
          tree.addClass("tree");
          tree.find('li').has("ul").each(function () {
              var branch = $(this); //li with children ul
              branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
              branch.addClass('branch');
              branch.on('click', function (e) {
                  if (this == e.target) {
                      var icon = $(this).children('i:first');
                      icon.toggleClass(openedClass + " " + closedClass);
                      $(this).children().children().toggle();
                  }
              })
              branch.children().children().toggle();
          });
          //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function(){
          $(this).on('click', function () {
              $(this).closest('li').click();
          });
        });
          //fire event to open branch if the li contains an anchor instead of text
          tree.find('.branch>a').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
          //fire event to open branch if the li contains a button instead of text
          tree.find('.branch>button').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
      }
  });
  //Initialization of treeviews
  $('#tree1').treed();
  $('.tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});
  $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

  $(document).ready(function()
  {
    $('#addform').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
               dir_name: {
                      validators: {
                          notEmpty: {
                              message: 'Name is required'
                          }
                  }
              },
               dir_access: {
                      validators: {
                          notEmpty: {
                              message: 'Select Directory Access'
                          }
                  }
              },
               dir_type: {
                      validators: {
                          notEmpty: {
                              message: 'Select Directory Type'
                          }
                  }
              },



          }
       });
  });

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
              $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
              $("#preview_upload").show();      
              $.ajax({
                url: "<?php echo base_url('admin/DocumentUpload/AddDirectory'); ?>",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                  {
                     $("#preview_upload").hide();  
                    // alert(data);
                     $(function(){
                       new PNotify({
                                  title: 'Add Directory',
                                  text: 'Added Successfully !!',
                                  type: 'success'
                                 });
                              });
                       setTimeout(function()
                         {
                             window.location="<?php echo base_url('admin/DocumentUpload/CreateDirectory');?>";
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

  function remark_list_pending(dir_id)
  {
    // $("#db_dir_id").val(id); 
    // $("#AddAttachmentmodal").modal({backdrop: 'static',keyboard: false});
    var datastring = 'dir_id='+dir_id;
    // alert(datastring);
     $.ajax({
      type: "post",
      url: "<?php echo base_url('admin/DocumentUpload/GetDirData'); ?>",
      cache: false,    
      data: datastring,
      success: function(data)
      {    
        // alert(data);        
           $('#AddAttachmentmodalData').html(data);
           $("#AddAttachmentmodal").modal({backdrop: 'static',keyboard: false});
           $("#db_dir_id").val(dir_id); 
       },
      error: function(){      
       alert('Error while request..');
      }
     });

  } 


  function view_documents(dir_id)
  {

    var datastring = 'dir_id='+dir_id;
    // alert(datastring);
    
     $.ajax({
      type: "post",
      url: "<?php echo base_url('admin/DocumentUpload/ViewDirDocData'); ?>",
      cache: false,    
      data: datastring,
      success: function(data)
      {    
        // alert(data);        
           $('#ViewDirDocData').html(data);
           $("#ViewDirDocDatamodal").modal({backdrop: 'static',keyboard: false});
           $("#db_view_dir_id").val(dir_id); 
       },
      error: function(){      
       alert('Error while request..');
      }
     });

  } 
  function show_dir(value)
  {
    if(value=='Main')
    {
      $("#parent_dir").hide();
    }
    else
    {
      $("#parent_dir").show();
    }
  }

  function upper_case(value)
  {
    var upper_case= value.toUpperCase();
    $("#dir_name").val(upper_case);
  }

  function DeleteCreditTerm(dir_id)
  {
      var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to delete this directory because all files in directory will be permanently ?</p>',
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

          var datastring = 'dir_id='+dir_id;
        // alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/DocumentUpload/DeleteDir'); ?>",
            cache: false,    
            data: datastring,
            success: function(data)
            {    
              // alert(data);
              $(function(){
                new PNotify({
                              title: 'Delete Directory',
                              text: 'Deleted successfully !!',
                              type: 'success'
                            });
                });

                  setTimeout(function()
                {
                    window.location="<?php echo base_url('admin/DocumentUpload/CreateDirectory');?>";
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
