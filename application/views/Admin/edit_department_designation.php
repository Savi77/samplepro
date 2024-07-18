<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<form class="form-horizontal" id="EditData" method="post">
     <input type="hidden" class="form-control" id="dep_id" name="dep_id" value="<?php echo $edit_dep->dep_id; ?>" placeholder="Enter Company Name">
     <input type="hidden" class="form-control" id="deg_id" name="deg_id" value="<?= $edit_deg->deg_id; ?>" placeholder="Enter Company Name">

     <div class="form-group row">
          <label class="control-label col-sm-3" for="email">Department Name <span style="color: red;">*</span></label>
          <div class="col-sm-9">
               <input type="text" class="form-control" id="department_name" name="department_name" value="<?= $edit_dep->department_name; ?>" placeholder="Enter Department Name" maxlength="50">
          </div>
     </div>
     <div class="form-group row">
          <label class="control-label col-sm-3" for="email">Designation Name <span style="color: red;">*</span></label>
          <div class="col-sm-9">
               <input type="text" class="form-control" id="designation_name" name="designation_name" value="<?= $edit_deg->designation_name; ?>" placeholder="Enter Designation Name" maxlength="50">
          </div>
     </div>
     <div class="form-group row">
          <div class="col-sm-12" style="text-align:right;">
               <button type="submit" class="btn btn-primary pull-right">Update <i class="icon-arrow-right14 position-right"></i></button>
          </div>
     </div>
</form>
<script type="text/javascript">
     $(document).ready(function() {
          $('#EditData').bootstrapValidator({
               message: 'This value is not valid',
               fields: {
                    designation_name: {
                         validators: {
                              notEmpty: {
                                   message: 'Please Enter Designation Name'
                              }
                         }
                    },
                    department_name: {
                         validators: {
                              notEmpty: {
                                   message: 'Please Enter Department Name'
                              }
                         }
                    }
               }
          });
     });
</script>
<script type="text/javascript">
     $(document).ready(function(e) {

          $("#EditData").on('submit', (function(e) {
               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    //alert('invalid');
                    return false;
               } else {

                    // alert('test');  
                    
                    $.ajax({
                         url: "<?php echo base_url('admin/Master/Edit_DepartmentDesignation'); ?>",
                         type: "POST",
                         data: new FormData(this),
                         contentType: false,
                         cache: false,
                         processData: false,
                         success: function(data) {
                              // PNotify.removeAll()
                              // alert(data);

                              $(function() {
                                   // new PNotify({
                                   //      title: 'Edit Form',
                                   //      text: 'Updated  Successfully',
                                   //      type: 'success'
                                   // });
                                   $("#UpdatesuccessModal").modal('show');

                              });

                              // setTimeout(function() {
                              //      window.location = "<?php echo base_url('admin/Master/department_designation'); ?>";
                              // }, 300);


                         },
                         error: function() {
                              $("#updateErrorModal").modal('show');
                         }
                    });
               }
               return false;

          }));
     });
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Department-Designation Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/department_designation'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/department_designation'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

