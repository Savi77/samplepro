<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/jqueryui_forms.js"></script>

<style>
    .role-text {
        margin-top: 0%;
    }
</style>

<div class="table-responsive" style="padding:12px">
  <input type="hidden" name="emp_id" id="emp_id" value="<?= $emp_id;?>">
  <fieldset class="form-filedset email min-height-200" style="margin-bottom:30px;">
    <legend class="field bulk-email">Role Permission</legend>
    <table class="table" style="border: 2px solid #bb9c9c8c;">
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
                                                <input style="height:16px;align-self:start;" type="checkbox" name="feature_ids[]" class="styled col-2" value="<?=$custom_id; ?>"  <?= $checkbox; ?>>
                                                <?= $row['privilege'];  ?>                                           
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
                                          $check = $this->db->select('*')->from('tbl_userwise_role_report')->where('user_id',$emp_id)->where('report_id', $value->report_type_id)->where('frequency_id',$value->frquency_id)->where('status',0)->get()->result();
                                          if(!empty($check))
                                          {
                                          ?>
                                          <div class="col-md-2">
                                              <div class="checkbox">
                                                  <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                      <input style="height:16px;align-self:start;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>" checked>
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
                                                          <input style="height:16px;align-self:start;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>">
                                                          <span class="role-text"><?= $value->report_type  ?></span>
                                                      </label>
                                                  </div>
                                              </div>
                                          <?php
                                          }
                                          ?>
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
<div class="col-md-12">
  <div class="text-right">
      <br/>
      <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
      <span id="preview44"></span>
  </div>  
  <input type="hidden" name="action_for" value="<?= count($module_list);?>">
  <br/> <br/> <br/>
</div> 

