
<?php $this->load->view('Admin/includes/n-header');    ?>
<style>
    fieldset.form-filedset {
        margin: 0;
    }
    .role-text {
        margin-top: 0%;
    }
    #preLoadForm{
        padding: 20px;
    }
    .card-body{
        padding-bottom: 20px !important;
    }
</style>
<div class="content">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">User Permission</span>
                <a data-toggle="modal" data-target="#user-permission" class="btn btn-link btn-float has-text"><i class="icon-copy4 text-primary"><span class="left-padding">Copy Permission</span></i></a>
            </div>
            <div class="card-body padding-30">                
                <form method="post" id="addform">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Select Resource <span class="text-danger">*</span> </label>
                            <select data-placeholder="Select Resource" class="form-control select-search" data-fouc name="employee_id" id="employee_id" >
                                <option value="">Select Resource</option>
                                <?php foreach ($array_users->result() as $row3) { ?>
                                    <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group m-auto " style="text-align: right;">                    
                            <button class="fetch-modal" type="submit"> <span class="text-white" >Fetch Module</span> <i class="icon-arrow-right14 position-right text-white"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="preLoadForm">
                <fieldset class="form-filedset email min-height-200" style="margin-bottom:30px;">
                    <legend class="field bulk-email">Role Permission</legend>
                    <table class="table" style="border: 2px solid #bb9c9c8c;">
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($feature_list as $row) {
                                $collapse = "demo" . $i;
                                $privilege = $row['privilege'];
                                $component_id = $row['component_id'];
                            ?>
                                <tr>
                                    <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                        <b><?= $row['component_title']; ?></b>
                                    </td>
                                    <td style="width: 78%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <?php
                                                $checkbox = 1;

                                                foreach ($privilege as  $row) {
                                                    $custom_id = $component_id . '/' . $row->privilege_id;
                                                ?>
                                                    <div class="col-md-2">
                                                        <div class="checkbox">
                                                            <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                <input style="height:16px;align-self:start;" type="checkbox" name="feature_ids[]" class="styled col-2" value="<?= $custom_id; ?>">
                                                                <span class="role-text"><?= $row->privilege;  ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php
                                                    $checkbox++;
                                                }
                                                ?>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            <?php
                                $i++;
                            } ?>

                        </tbody>
                    </table>
                </fieldset>
                <fieldset class="form-filedset email min-height-200">
                    <legend class="field bulk-email">Role Wise Report Permission</legend>
                    <table class="table" style="border: 2px solid #bb9c9c8c;">
                        <tbody>
                        <?php
                                for($j=0;$j<COUNT($report_list);$j++) 
                                {
                                    $frequency_id = $report_list[$j]->frquency_id;
                                    $get_report = $this->db->select('*')->from('tbl_frequency_wise_report_type')->where('frquency_id',$frequency_id)->get()->result();
                                ?>
                                    <tr>
                                        <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                            <b><?=  $report_list[$j]->frequency_name;?></b>
                                        </td>
                                        <td style="width: 78%;">
                                            <div class="form-group">
                                                <div class="row">
                                                    <?php
                                                    $checkbox = 1;

                                                    foreach ($get_report as $value) { 
                                                        $report_id = $value->frquency_id . '/' . $value->report_type_id;

                                                    ?>
                                                        <div class="col-md-2">
                                                            <div class="checkbox">
                                                                <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                    <input style="height:16px;align-self:start;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>">
                                                                    <span class="role-text"><?= $value->report_type  ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $checkbox++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                            <?php
                                $i++;
                            } ?>

                        </tbody>
                    </table>
                </fieldset>
            </div>
            <form method="post" id="permissionform">
                <!-- <input type="hidden" name="emp_id" id="emp_id"> -->
                <div class="col-md-12" id="resultdata"></div>
            </form>
            <div class="col-md-12" id="rsdata"></div>
    </div>
</div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>

<!--popup-->
<div id="user-permission" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Copy Permission</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="CopyPermission" action="<?php echo base_url('admin/UserPermission/CopyPermission'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role  <sup style="color: red">*</sup></label>
                                <div class="">
                                    <select name="role_id" id="role_id" class="select2 select2-hidden-accessible" data-placeholder="Select Role">
                                        <option value="">Select Role</option>
                                        <?php foreach ($role_list as $value) { ?>
                                        <option value="<?= $value['role_id']; ?>"><?= $value['role_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Resource  <sup style="color: red">*</sup></label>
                                <div class="">
                                    <select class="select2 select2-hidden-accessible" name="copy_employee_id" id="copy_employee_id" data-placeholder="Select Resource">
                                    <option value="">Select Resource</option>
                                    <?php
                                    foreach ($array_users->result() as $row3) {
                                    ?>
                                        <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <fieldset1>
                        <div class="col-md-12 text-right" style="padding-right: 0;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="submitBtn">Copy Permission
                                    <i class="icon-copy3 position-right"></i>
                                </button>
                                <span id="preview12"></span>
                            </div>
                        </div>
                    </fieldset1>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#addform').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        employee_id: {
          validators: {
            notEmpty: {
              message: 'Please Select Employee'
            }
          }
        },
      }
    });
  });
  $(document).ready(function(e) {
    $("#addform").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } 
      else 
      {
        $("#emp_id").val();
        var emp_id = $("#employee_id").val();
        $("#preview12").show();
        $("#preview12").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/UserPermission/GetUserPermission'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview12").hide();
            $('#preLoadForm').hide();
            $("#resultdata").html(data);
          },
          error: function() {
            alert('fail');
          }
        });
      }
      return false;
    }));
  });

  $('#CopyPermission').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
          role_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Role'
                    }
                }
            },
            copy_employee_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Employee'
                    }
                }
            },
        }
    });
    // CopyPermission
  $(document).ready(function(e) {
    $("#CopyPermission").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } else {

        $("#preview44").show();
        $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/UserPermission/CopyPermission'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview44").hide();
            
            $(function() {
            //   new PNotify({
            //     title: 'Copy Permission',
            //     text: 'Copy Permission Set Successfully',
            //     type: 'success'
            //   });
                $('#user-permission').modal('hide');
                $('#successModaluserpermission').modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/UserPermission'); ?>";
            // }, 2000);
          },
          error: function() {
            $("#alertModal").modal('show');
          }
        });

      }
      return false;
    }));
  });
</script>
<script>
  $("#role_id").select2({
      dropdownParent: $("#user-permission")
  });
  $("#copy_employee_id").select2({
      dropdownParent: $("#user-permission")
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
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModaluserpermission" tabindex="-1" aria-labelledby="successModaluserpermissionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModaluserpermissionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Resource Permission Copied Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Resource Permission Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission'); ?>">
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
                <a href="<?php echo base_url('admin/UserPermission'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
    $("#permissionform").on('submit', (function(e) {
        
      //e.preventDefault();
      if (e.isDefaultPrevented()) 
      {
        //alert('invalid');
      } 
      else 
      {
      
        $("#preview12").show();
        $("#preview12").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        $.ajax({
          url: "<?php echo base_url('admin/UserPermission/UpdateUserPermission'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) 
          {
            $("#UpdatesuccessModal").modal('show');
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

<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>