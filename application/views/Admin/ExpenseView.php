

<?php $this->load->view('Admin/includes/master_header'); ?>
<?php $this->load->view('Admin/includes/admin_header'); ?>
  
  <?php
    // echo json_encode($user_permission);
    $AddClassP='style="display:block";';
    $EditClass='style="display:block";';
    $DeleteClass='style="display:block";';
    $StatusClass='style="display:block";';

    // foreach ($user_permission as $priviledge) 
    // {
    //     $priviledge_key=$priviledge->priviledge_key;
    //     $status=$priviledge->status;
    //     if ($priviledge_key=='ADD')
    //     {
    //         if($status==1)
    //         {
    //         $AddClassP=' style="display:block"; ';
    //         } 
    //         else
    //         {
    //         $AddClassP=' style="display:none"; ';   
    //         }
    //     }     

    //     if ($priviledge_key=='EDIT')
    //     {
    //     // echo 11;
    //         if($status==1)
    //         {
    //         $EditClass=' style="display:block"; ';
    //         } 
    //         else
    //         {
    //         $EditClass=' style="display:none"; ';   
    //         }
    //     }   

    //     if ($priviledge_key=='DELETE')
    //     {
    //         if($status==1)
    //         {
    //         $DeleteClass='style="display:block"; ';
    //         } 
    //         else
    //         {
    //         $DeleteClass='style="display:none"; ';   
    //         }
    //     }
        
    //     if ($priviledge_key=='ACTIVE')
    //     {
    //         if($status==1)
    //         {
    //         $StatusClass='style="display:block"; ';
    //         } 
    //         else
    //         {
    //         $StatusClass='style="display:none"; ';   
    //         }
    //     }
    // }
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
         <a href="<?php echo base_url('admin/Master/view_master');?>"> <span class="text-semibold">Masters</span></a> - Expense
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP;?> >
            <i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
        <!-- Basic responsive configuration -->
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Expense List</h5>
                </div>

                <table class="table datatable-responsive">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th> Expense Name</th>
                        <th>Status</th>
                        <th> Action</th>     
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                          $count=1;
                          foreach ($MasterArray as $row) 
                          {
                          ?>
                            <tr>
                              <td><?php echo $count ?></td>
                              <td><?= $row->expense_name; ?></td>
                              
                                <td <?= $StatusClass; ?>><?php if ($row->status == 1) { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->expense_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                    <?php } else { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->expense_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                    <?php } ?>
                                </td>
                              
                                      <td>
                                <ul class="icons-list" style="display: flex;">
                                      <li <?= $EditClass; ?> ><a data-toggle="modal" onclick="edit_expense(id)" id="<?= $row->expense_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Expense" data-placement="bottom"></i></span></a></li>
                                      <li <?= $DeleteClass; ?> ><a data-toggle="modal" onclick="delete_expense(id)" id="<?= $row->expense_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Expense" data-placement="bottom"></i></span></a></li>
                                  </ul>
                              </td>
                              <td  class="hidden"></td>
                             
                              
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
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
            <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title" style="margin-top: -4px" >
            <i class="icon-coins" style="zoom:1.1; "></i>
              &nbsp;Add New Expense
            </h5>
          </div>
            <div class="modal-body">
              <form id="addform" method="post"  enctype="multipart/form-data">
                <div class="panel panel-flat">
                  <div class="panel-body">
                    <fieldset>
                      <div class="row">
                          <div class="col-md-12"> 
                            <div class="form-group">
                               <label>Expense Name : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="expense_name">
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

<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info" style="background-color:#009FDF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Edit Expense</h6>
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
    <script type="text/javascript">
     $(document).ready(function()
      {
        $('#addform').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                       expense_name: {
                              validators: {
                                  notEmpty: {
                                      message: 'Expense Name Required'
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
                    url: "<?php echo base_url('admin/Expense/add_expense'); ?>",
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
                                        title: 'Add Expense',
                                        text: 'Expense Added Successfully',
                                        type: 'success'
                                       });
                          });

                           setTimeout(function()
                             {
                                 window.location="<?php echo base_url('admin/Expense');?>";
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
  function edit_expense(expense_id)
    {
        $(window).scrollTop(0);
        var datastring ='expense_id='+expense_id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Expense/edit_expense'); ?>",
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
function delete_expense(expense_id)
{

  var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this expense?</p>',
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

  var datastring = 'expense_id='+expense_id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Expense/delete_expense'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'Delete Expense',
                                  text: 'Deleted successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/Expense');?>";
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
function activate($id)
{

  var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to activate this expense?</p>',
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

  var datastring = 'expenseid='+$id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Expense/activate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'Activate Expense',
                                  text: 'Activated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/Expense');?>";
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
        text: '<p>Are you sure you want to deactivate this expense?</p>',
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

  var datastring = 'expenseid='+$id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Expense/deactivate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'deactivate Expense',
                                  text: 'deactivated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/Expense');?>";
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
