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
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- /theme JS files -->
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
  <!-- /theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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
</head>

<body style="overflow-x: hidden;">
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page container -->
  <div class="page-container">
    <div class="page-content">
        <?php  $this->load->view('Admin/includes/sidebar'); ?>
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
                    <i class="icon-clipboard6 position-left"></i>
                  <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> Dashboard <span class="text-semibold"></span></a> -
                  <a href="<?php echo base_url('admin/Master/view_master');?>"> Masters <span class="text-semibold"></span></a> -
                    Terms | Conditions
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
              <div class="panel panel-flat" >
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Terms | Conditions</h5>
                </div>

                <table class="table" id="example">
                  <thead>
                    <tr>
                      <th class="hidden">Name</th>
                      <th>Terms For</th>
                      <th>Terms Conditions</th>
                      <th>Status</th>
                      <th class="hidden"></th>
                      <th style="width:10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                          $count=1;
                          foreach ($listdata as $row) 
                          {
                            $terms=explode("$^", $row->term_condition);
                            $final_terms='<ul>';
                            for($i=1;$i<count($terms);$i++)
                            {
                              $final_terms=$final_terms.'<li>'.$terms[$i].'</li>';
                            }
                            $final_terms.='</ul>';
                          ?>
                            <tr>
                              <td class="hidden"></td>
                              <td><?= $row->term_for; ?></td>
                              <td><?= $final_terms; ?></td>
                              <td class="hidden"><?= $row->term_id; ?></td>
                              <td>
                              <?= $StatusClass; ?><?php if ($row->status == 1) { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->term_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                    <?php } else { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->term_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                    <?php } ?>
                              </td>
                              <td>
                                  <ul class="icons-list">
                                      <li><a data-toggle="modal" onclick="Edit(id)" id="<?= $row->term_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit" data-placement="bottom"></i></span></a></li>
                                      <li><a data-toggle="modal" onclick="Delete(id)" id="<?= $row->term_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete" data-placement="bottom"></i></span></a></li>
                                  </ul>
                              </td>
                            </tr>
                        <?php $count++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

    <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
               <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px" >
                  <i class=" icon-clipboard6" style="zoom:1.1; "></i>
                    &nbsp;Add Term | Condition
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
                                   <label>Term For : <sup style="color: red">*</sup></label>
                                   <input type="text" name="term_for" class="form-control" placeholder="E.g. Tally">
                                </div>
                              </div>          
                          </div>
                        </fieldset>
                        <fieldset>                          
                            <label>Terms | Conditions : <sup style="color: red">*</sup></label>
                           <div class="row">
                             <div class="col-md-12"> 
                                <div class="row"> 
                                <div class="col-md-12 nopadding">
                                  <div class="form-group">
                                    <div class="input-group">
                                     <textarea rows="1" name="terms[]"  class="form-control" ></textarea>
                                      <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                              </div>  
                              </div>
                              <div class="col-md-12"> 
                                <div id="education_fields"></div>  
                              </div>
                            </div>
                        </fieldset>
                       <br/>
                       <br/>
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

   <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info" style="background-color: #2196f3;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><i class="icon-clipboard6" style="zoom:1.1; "></i>
                    &nbsp; &nbsp;Edit Term | Condition</h6>
          </div>
          <div class="modal-body">
              <div id="complaint_model_data1">
              </div>
         </div>
        </div>
      </div>
  </div>

    <script type="text/javascript">
      var room = 112;
      function education_fields() 
      {
          room++;
          var objTo = document.getElementById('education_fields')
          var divtest = document.createElement("div");
          divtest.setAttribute("class", "form-group removeclass"+room);
          var rdiv = 'removeclass'+room;
          divtest.innerHTML = '<div class="row"> <div class="col-md-12 nopadding"><div class="form-group"><div class="input-group"> <textarea class="form-control" name="terms[]" rows="1"></textarea> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';        
          objTo.appendChild(divtest)
           
           $('#addform').bootstrapValidator('addField', 'terms[]');
        }

         function remove_education_fields(rid) 
         {
           $('.removeclass'+rid).remove();
         }
    </script>



<script type="text/javascript">
  
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 1 }
        ],
        "order": [[ 1, 'desc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="3">'+group+'</td></tr>'
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

<script>
    $(document).ready(function() {
            termsvalidator = {
                row: '.col-md-12',
                validators: {
                              notEmpty: {
                                  message: 'Term | Condition is required'
                              }
                }
            },
           $('#addform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'terms[]': termsvalidator,
                    term_for:{
                        validators: {
                            notEmpty: {
                                        message: 'Terms for is required'
                                    }
                              }
                       },  
                }
            })
            // Add button click handler
            .on('click', '.addButton', function()
             {
              })
            // Remove button click handler
            .on('click', '.removeButton', function() 
            {
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
              $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
              $("#preview_upload").show();      
              $.ajax({
                url: "<?php echo base_url('admin/TermConditions/Add'); ?>",
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
                                  title: 'Add Term | Condition',
                                  text: 'Added Successfully !!',
                                  type: 'success'
                                 });
                              });
                       setTimeout(function()
                         {
                             window.location="<?php echo base_url('admin/TermConditions');?>";
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
function Edit(term_id)
{
   var datastring = 'term_id='+term_id;
   $.ajax({
    type: "post",
    url: "<?php echo base_url('admin/TermConditions/Edit'); ?>",
    cache: false,    
    data: datastring,
    success: function(data)
    {    
      // alert(data);
       $('#modal_default1').modal('show');
       $('#complaint_model_data1').html(data);
     },
    error: function()
    {      
      alert('Error while request..');
    }
   });
}
</script>

<script>
function Delete(term_id)
{
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this Term Condition ?</p>',
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
        var datastring = 'term_id='+term_id;
       // alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/TermConditions/Delete'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            // alert(data);
            $(function(){
               new PNotify({
                            title: 'Delete Specification',
                            text: 'Deleted successfully !!',
                            type: 'success'
                           });
              });
                setTimeout(function()
               {
                  window.location="<?php echo base_url('admin/TermConditions');?>";
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


<script>
function activate($id)
{

  var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to activate this TermConditions?</p>',
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

  var datastring = 'termid='+$id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/TermConditions/activate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'Activate TermConditions',
                                  text: 'Activated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/TermConditions');?>";
                 }, 1000);
               
               },
              error: function()
              {      
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

<script>
function deactivate($id)
{

  var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to deactivate this TermsConditions?</p>',
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

  var datastring = 'termid='+$id;
        alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/TermConditions/deactivate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'deactivate TermConditions',
                                  text: 'deactivated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/TermConditions');?>";
                 }, 1000);
               
               },
              error: function()
              {      
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
