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
      }

  ?>
  
  <!-- /page header -->
  <!-- Page container -->
  <div class="page-container">
    <div class="page-content">
        <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
            <?php $this->load->view('Admin/includes/panel'); ?>
            <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Dashboard</span></a> - 
         <a href="<?php echo base_url('admin/Master/view_master');?>"> <span class="text-semibold">Masters</span></a>
          - Credit Term
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP;?> ><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
              <div class="panel panel-flat" >
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Credit Term</h5>
                </div>

                <table class="table datatable-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Credit Name</th>
                      <th>Credit Days</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                          $count=1;
                          foreach ($listdata as $row) 
                          {
                          ?>
                            <tr>
                              <td><?php echo $count ?></td>
                              <td class="hidden"></td>
                              <td><?= $row->credit_name; ?></td>
                              <td><?= $row->credit_days; ?></td>
                              <td <?= $StatusClass; ?>><?php if ($row->status == 1) { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->credit_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                    <?php } else { ?>
                                  <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->credit_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                    <?php } ?>
                              </td>
                              <td>
                                  <ul class="icons-list" style="display: flex;">
                                      <li <?= $EditClass;?> ><a data-toggle="modal" onclick="EditCreditTerm(id)" id="<?= $row->credit_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit" data-placement="bottom"></i></span></a></li>
                                      <li <?= $DeleteClass;?> ><a data-toggle="modal" onclick="DeleteCreditTerm(id)" id="<?= $row->credit_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete" data-placement="bottom"></i></span></a></li>
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
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
             <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="margin-top: -4px" >
                <i class="icon-sort-numeric-asc" style="zoom:1.1; "></i>
                  &nbsp;Add Credit Term
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
                                 <label>Credit Name : <sup style="color: red">*</sup></label>
                                  <input type="text" class="form-control" name="credit_name">
                              </div>
                            </div>          
                        </div>
                      </fieldset>
                      <fieldset>
                       <div class="row">
                         <div class="col-md-12"> 
                            <div class="form-group clockpicker"  data-autoclose="true">
                              <label>Credit Days :  <sup style="color: red">*</sup></label>
                               <input type="text" class="form-control" name="credit_days" id="credit_days" autocomplete="off"   onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">
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

   <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info" style="background-color:#009FDF;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><i class="icon-sort-numeric-asc" style="zoom:1.1; "></i>
                    &nbsp; &nbsp;Edit Credit Term</h6>
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
               credit_name: {
                      validators: {
                          notEmpty: {
                              message: 'Credit Name Required'
                          }
                  }
              },
               credit_days: {
                      validators: {
                          notEmpty: {
                              message: 'Credit Days Required'
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
              $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
              $("#preview_upload").show();      
              $.ajax({
                url: "<?php echo base_url('admin/CreditTerm/AddCreditTerm'); ?>",
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
                                  title: 'Add Credit Term',
                                  text: 'Added Successfully !!',
                                  type: 'success'
                                 });
                              });
                       setTimeout(function()
                         {
                             window.location="<?php echo base_url('admin/CreditTerm');?>";
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
function EditCreditTerm(credit_id)
{
   var datastring = 'credit_id='+credit_id;
   $.ajax({
    type: "post",
    url: "<?php echo base_url('admin/CreditTerm/EditCreditTerm'); ?>",
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
function DeleteCreditTerm(credit_id)
{
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this term ?</p>',
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

        var datastring = 'credit_id='+credit_id;
       // alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/DeleteCreditTerm'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            // alert(data);
            $(function(){
               new PNotify({
                            title: 'Delete Credit Term',
                            text: 'Deleted successfully !!',
                            type: 'success'
                           });
              });

                setTimeout(function()
               {
                  window.location="<?php echo base_url('admin/CreditTerm');?>";
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
        text: '<p>Are you sure you want to activate this Credit Term?</p>',
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

  var datastring = 'creditid='+$id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/activate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'Activate Credit Term',
                                  text: 'Activated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/CreditTerm');?>";
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
        text: '<p>Are you sure you want to deactivate this Credit Term?</p>',
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

  var datastring = 'creditid='+$id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/deactivate'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'deactivate Credit Term',
                                  text: 'deactivated successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/CreditTerm');?>";
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
