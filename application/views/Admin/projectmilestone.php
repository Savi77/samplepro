
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
              <!-- panel -->
            <?php $this->load->view('Admin/includes/panel'); ?>
            <!-- panel end -->
              <!-- Page header -->
              <div class="page-header">
                <div class="page-header-content">
                  <div class="page-title">
                    <h4>
                      <i class="icon-arrow-left52 position-left"></i>
                    <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Dashboard</span></a> -
                    <a href="<?php echo base_url('admin/Master/view_master');?>"> <span class="text-semibold">Masters</span></a>
                     - Project Milestone
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
                <h5 class="panel-title" style="color:white">Branch</h5>
              </div>

              <table class="table datatable-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th <?= $StatusClass;?> >Status</th>
                    <th class="">Action</th>
                  </tr>
                </thead>
                <tbody>
                     <!-- <?php
                          $count = 1;
                          foreach($get_branch->result() as $row) { ?>
                          <tr>
                            <td ><?php echo $count ?></td>
                            <td ><?= $row->name ?></td>
                            <td class="hidden"></td>
                            <td class="hidden"></td>
                            <td <?= $StatusClass;?> ><?php if($row->status==1){ ?>
                                   <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->branch_id?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                 <?php } else {?>

                                 <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->branch_id?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                  <?php } ?>
                            </td>
                            <td class="text-center">
                               <ul class="icons-list" style="display: flex;">
                                  <li <?= $EditClass;?> ><a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->branch_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit schedule" data-placement="bottom"></i></span></a></li>

                                  <li <?= $DeleteClass;?> ><a onclick="del_client(id)" id="<?= $row->branch_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete schedule" data-placement="bottom"></i></span></a></li>
                                  
                              </ul>
                            </td>
                          </tr>
                        <?php $count++; } ?> -->
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
          <h6 class="modal-title"> <i class="icon-briefcase3" style="zoom:1.1; "></i>
						&nbsp; &nbsp;Add Branch</h6>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="branchname">
            <div class="panel panel-flat">
              <div class="panel-body">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Name <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" maxlength="50" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary pull-right">Submit <i
											class="icon-arrow-right14 position-right"></i>&nbsp;<span id="preview"></span></button>
                  </div>
                </div>
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
                      <h6 class="modal-title"><i class="icon-task"></i>&nbsp;&nbsp;&nbsp;Edit Branch</h6>
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
$('#branchname').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               branch_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Branch Name'
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
             $("#branchname").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {

                       $("#preview").show();
                       $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                             
                          $.ajax({
                             url: "<?php echo base_url('admin/Master/add_branch');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                $("#preview").hide();
                                 $(function(){
                                  new PNotify({
                                                title: 'Branch Form',
                                                text: 'Added  Successfully',
                                                type: 'success'
                                               });
                                  });

                                   setTimeout(function()
                                     {
                                         window.location="<?php echo base_url('admin/Master/branch_master');?>";
                                     }, 1000);

                                    
                                },
                              error: function() 
                              {
                                alert('fail branch');
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
            text: '<p>Are you sure you want to delete this Activity Type?</p>',
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

      var datastring = 'branchid='+id;
            //alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master/DeleteBranch'); ?>",
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
                                                    window.location="<?php echo base_url('admin/Master/branch_master');?>";
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
      var datastring = 'branchid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Master/edit_branch'); ?>",
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
            text: '<p>Are you sure you want to Inactive this Activity Type?</p>',
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

            var datastring = 'branchid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master/deactivate_branch'); ?>",
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
                              window.location="<?php echo base_url('admin/Master/branch_master');?>";
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
            text: '<p>Are you sure you want to activate this Activity Type?</p>',
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

            var datastring = 'branchid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master/activate_branch'); ?>",
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
                              window.location="<?php echo base_url('admin/Master/branch_master');?>";
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
