<?php $this->load->view('Admin/includes/master_header'); ?>
<?php $this->load->view('Admin/includes/admin_header'); ?>
  <?php
      // echo json_encode($user_permission);
      $AddClassP='style="display:block";';
      $EditClass='style="display:block";';
      $DeleteClass='style="display:block";';
      $StatusClass='style="display:block";';

      foreach ($user_permission as $priviledge) 
      {
          $priviledge_key=$priviledge->priviledge_key;
          $status=$priviledge->status;
          if ($priviledge_key=='ADD')
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

          if ($priviledge_key=='EDIT')
          {
          // echo 11;
              if($status==1)
              {
              $EditClass=' style="display:block"; ';
              } 
              else
              {
              $EditClass=' style="display:none"; ';   
              }
          }   

          if ($priviledge_key=='DELETE')
          {
              if($status==1)
              {
              $DeleteClass='style="display:block"; ';
              } 
              else
              {
              $DeleteClass='style="display:none"; ';   
              }
          }
          
          if ($priviledge_key=='ACTIVE')
          {
              if($status==1)
              {
              $StatusClass='style="display:block"; ';
              } 
              else
              {
              $StatusClass='style="display:none"; ';   
              }
          }
      }

  ?>

   



 

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
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Dashboard</span></a> -
         <a href="<?php echo base_url('admin/Master/view_master');?>"> <span class="text-semibold">Masters</span></a> - Target Type List
        </h4>
      </div>

     <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP;?> ><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
        <!-- Basic responsive configuration -->
              <div class="panel panel-flat" >
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Target Type</h5>
                  <div class="heading-elements">
                    <td> 
                      <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                          <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Client" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                        </a> -->
                    </td>
                  </div>
                </div>

                <table class="table datatable-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Target Type</th>
                      <th>UOM Type</th>
                      <th class="hidden">Description</th>
                      <th <?= $StatusClass;?> >Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                            $count = 1;
                            foreach($target_type->result() as $row) { ?>
                            <tr>
                              <td><?php echo $count ?></td>
                              <td><?= $row->target_type ?></td>
                              <td><?= $row->uom_type ?></td>
                              <td class="hidden"></td>
                              <td <?= $StatusClass;?> ><?php if($row->status==1){ ?>
                                    <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->targettype_id?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                  <?php } else if($row->status==0) {?>

                                  <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->targettype_id?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                    <?php } ?>
                              </td>
                              <td class="text-center">
                                <ul class="icons-list" style="display: flex;">
                                    <li <?= $EditClass;?> ><a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->targettype_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Target Type" data-placement="bottom"></i></span></a></li>

                                    <li <?= $DeleteClass;?> ><a onclick="del_client(id)" id="<?= $row->targettype_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Target Type" data-placement="bottom"></i></span></a></li>
                                    
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
        <!-- /basic responsive configuration -->

              <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"> Add Target Type</h6>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" id="TargetTypeForm">
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Target Type <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="target_type" name="target_type" placeholder="Enter Target Type" maxlength="50">
                                    </div>
                                  </div>
                                  <div class="form-group" id="prd_grp">
                                    <label class="control-label col-sm-3" for="email">Select UOM <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                      <select class="select-search form-control" name="uom_type" id="uom_type">
                                            <option value="">Select UOM</option>
                                             <?php   
                                                foreach ($get_data->result() as $uom) 
                                                {
                                              ?>
                                                <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                                             <?php } ?> 
                                        </select>
                                    </div>
                                  </div>

                                  <div class="form-group"> 
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                    </div>
                                  </div>
                              </form>
                           </div>
                    </div>
                  </div>
             </div>


             <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"><i class="icon-grid3" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Edit Target Type</h6>
                            </div>

                            <div class="modal-body">
                                <div id="complaint_model_data1">

                                </div>
                           </div>

                          </div>
                        </div>
                   </div>


<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#TargetTypeForm').bootstrapValidator({
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
            url: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter URL'
                        }
                }
            },

            fileup: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Image for Home Page'
                        }
                }
            },

            fileup1: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Image for Landing Page'
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
</script>
    
<!--======================================= / Validation login  ==========================================-->



<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#TargetTypeForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Target/add_targettype');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {

                                                     $(function(){
                                                   new PNotify({
                                                                title: 'Add Form',
                                                                text: 'Added  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Target/target_type');?>";
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



<!--=======================================  delete Event  ==========================================-->

<script>
    function del_client(id)
    {

      var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Target Type?</p>',
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

      var datastring = 'targettypeid='+id;
            //alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Target/delete_targettype'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                            $(function(){
                                                 new PNotify({
                                                              title: 'Delete Form',
                                                              text: 'Deleted successfully',
                                                              type: 'success'
                                                             });
                                                });

                                                  setTimeout(function()
                                                 {
                                                    window.location="<?php echo base_url('admin/Target/target_type');?>";
                                                 }, 1000);

                
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


<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"user/deleteuser/"+id;
        else
          return false;
        } 
</script>


<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_client(id)
    {
      var datastring = 'targettypeid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Target/edit_targettype'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default1').modal('show');
           $('#complaint_model_data1').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Target Type?</p>',
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

            var datastring = 'targettypeid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Target/deactivate1'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Target/target_type');?>";
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
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Target Type?</p>',
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

            var datastring = 'targettypeid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Target/activate1'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Target/target_type');?>";
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


<!--======================================= / Activate & Deactivate ==========================================-->


</body>
</html>
