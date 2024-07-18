<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_layouts.js"></script>
<style>
    #modal_default1 fieldset.form-filedset {
        margin: 0;
    }
    .role-text {
        margin-top: 0%;
    }
</style>
<form method="post" id="EditRoelPermissionForm" action="<?php echo base_url('admin/UserPermission/EditRolePermission'); ?>">
    <input type="hidden" name="role_id" id="role_id" value="<?= $role_data->role_id; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Role <sup style="color: red">*</sup></label>
                <div class="">
                    <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role" value="<?= $role_data->role_name; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Role Description <sup style="color: red">*</sup></label>
                <div class="">
                    <input name="role_description" id="role_description" class="form-control" rows="3" placeholder="Enter Role Description" value="<?= $role_data->role_description; ?>">
                </div>
            </div>
        </div>
    </div>
    <fieldset class="form-filedset email min-height-200" style="margin-bottom:30px;">
        <legend class="field bulk-email">Role Permission</legend>
        <div class="table-responsive" style="border: 2px solid #bb9c9c8c;">
            <table class="table">
            <tbody>
                <?php
                    $i=1;
                    foreach ($feature_list as $row)
                        {
                        $collapse="demo".$i;
                        $privilege=$row['privilege'];
                        $component_id=$row['component_id'];
                    ?>
                            <tr>
                            <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;"><b><?= $row['component_title']; ?></b></td>
                            <td style="width: 78%;">   
                                <div class="form-group">
                                    <div class="row">
                                    <?php
                                        $checkbox=1;
                                        foreach ($privilege as  $row) 
                                        {
                                        $custom_id=$component_id.'/'.$row['privilege_id'];
                                        $checkbox=$row['checkbox'];
                                        ?>
                                        <div class="col-md-2">
                                            <div class="checkbox">
                                                <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                    <input type="checkbox" style="height:16px;align-self:start;" name="feature_ids[]" class="styled col-2" value="<?=$custom_id; ?>"  <?= $checkbox; ?>>
                                                    <span class="role-text" ><?= $row['privilege'];  ?></span>
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
                    $i++;} ?>

                </tbody>
            </table>
        </div>
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

                        // foreach ($edit_report_list as $row)
                        // {
                        //     $get_report_id = $row->frequency_id . '/' . $row->report_id;
                        
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
                                            $check = $this->db->select('*')->from('tbl_role_permisssion_report')->where('role_id',$role_data->role_id)->where('report_id', $value->report_type_id)->where('frequency_id',$value->frquency_id)->where('status',0)->get()->result();
                                            if(!empty($check))
                                            {
                                            ?>
                                            <div class="col-md-2">
                                                <div class="checkbox">
                                                    <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                        <input style="height:16px;align-self;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>" checked>
                                                        <span class="role-text"><?= $value->report_type  ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                            <input style="height:16px;align-self;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>">
                                                            <span class="role-text"><?= $value->report_type  ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- <div class="col-md-2">
                                                <div class="checkbox">
                                                    <label class="row" style="display:flex;align-items:start;">
                                                        <input style="height:16px;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>" $check>
                                                        <span class="col-10 role-text"><?= $value->report_type  ?></span>
                                                    </label>
                                                </div>
                                            </div> -->
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
                }  ?>

            </tbody>
        </table>
    </fieldset>
    <div class="text-right">
        <br/>
        <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
        <!-- <span id="preview44"></span> -->
    </div>  
</form>

<script>
   $('#EditRoelPermissionForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                role: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Role'
                        }
                    }
                },
                role_description: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Role Description'
                        }
                    }
                },
            }
        });
$(document).ready(function(e) {
    $("#EditRoelPermissionForm").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
            //alert('invalid');
        } else {
            $("#preview44").show();
            $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
            $('#submitBtn').prop('disabled', true);
            $.ajax({
                url: "<?php echo base_url('admin/UserPermission/EditRolePermission'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#preview44").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $(function() {
                        // new PNotify({
                        //     title: 'Assign Module Permission',
                        //     text: 'Permission Set Successfully',
                        //     type: 'success'
                        // });
                        $("#UpdatesuccessModal").modal('show');
                    });

                    // setTimeout(function() {
                    //     window.location = "<?php echo base_url('admin/UserPermission/PermissionRole'); ?>";
                    // }, 2000);
                },
                error: function() {
                    // alert('fail');
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Role & Permission Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission/PermissionRole'); ?>">
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
                <a href="<?php echo base_url('admin/UserPermission/PermissionRole'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

