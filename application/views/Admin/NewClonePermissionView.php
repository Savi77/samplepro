<?php $this->load->view('Admin/includes/n-header');    ?>

<div class="content">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <h6 class="card-title py-sm-4 card-headings">Assign Role</h6>

            </div>
            <div class="card-body padding-30">
                <form method="post" id="CopyPermission" action="<?php echo base_url('admin/UserPermission/CopyPermission_assign_role'); ?>">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Role <span class="text-danger">*</span> </label>
                            <select data-placeholder="Select Role" class="form-control select-search" data-fouc name="role_id" id="role_id" >
                                <option value="">Select Role</option>
                                <?php foreach ($role_list as $value) { ?>
                                    <option value="<?= $value['role_id']; ?>"><?= $value['role_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Resource <span class="text-danger">*</span> </label>
                            <select data-placeholder="Select Resource" class="form-control select-search" data-fouc name="employee_id[]" id="employee_id" multiple>
                                <?php foreach ($array_users->result() as $row3) { ?>
                                    <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 update-details">
                        <button class="update" type="submit" style="background: #1e6196; border: 1px solid #1e6196;width:auto;color:#fff;"> <span class="text-white">Assign Roles</span> <i class="icon-arrow-right14 position-right"></i>
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#CopyPermission').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        'employee_id[]': {
          validators: {
            notEmpty: {
              message: 'Please Select Employee'
            }
          }
        },
        role_id: {
          validators: {
            notEmpty: {
              message: 'Please Select Role'
            }
          }
        },
      }
    });
  });

  $(document).ready(function(e) {
    $("#CopyPermission").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } else {

        $("#preview44").show();
        $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/UserPermission/CopyPermission_assign_role'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview44").hide();
            
            $(function() {
              // new PNotify({
              //   title: 'Assign Roles',
              //   text: 'Assign Roles Set Successfully',
              //   type: 'success'
              // });
              $("#successModalAsignRole").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/UserPermission/ClonePermission'); ?>";
            // }, 2000);
          },
          error: function() {
            // alert('fail');
            $("#alertModal").modal('show');
          }
        });

      }
      return false;
    }));
  }); 
</script>

<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission/ClonePermission'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalAsignRole" tabindex="-1" aria-labelledby="successModalAsignRoleLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalAsignRoleLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Role Assigned Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission/ClonePermission'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>