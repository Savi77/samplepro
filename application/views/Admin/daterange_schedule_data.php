 


  <?php 
    // var_dump($complete_issue_list);
    $complete_cnt=count($complete_issue_list);
  ?>
  <div class="panel11 panel-flat11">
    <table class="table datatable-basic" id="ajax_table" >          
      <tbody>
        <?php
        for($k=0;$k<$complete_cnt;$k++)
        {               
        ?>
        <tr>
          <td class="hidden"></td>
          <td class="hidden"><a href="#"></a></td>
          <td class="hidden"></td>
          <td  class="hidden"></td>
          <td style="width:100%;">
            <div class="row">   
              <?php                           
                    $ticket_no_1_complete=$complete_issue_list[$k]['ticket_no'];
                    $issue_1_complete=$complete_issue_list[$k]['issue'];
                    $check_1_complete=$complete_issue_list[$k]['check'];
                    $company_name_1_complete=$complete_issue_list[$k]['company_name'];
                    $created_date_1_complete=$complete_issue_list[$k]['schedule_date'];
                    $created_on11=$complete_issue_list[$k]['created_date'];
                    $priority_complete=$complete_issue_list[$k]['priority'];
                    $status_remark=$complete_issue_list[$k]['status_remark'];
                    $query_1_complete=$complete_issue_list[$k]['query_id'];
                    $product_name_filter=$complete_issue_list[$k]['product_name'];
                    $action_btn = $complete_issue_list[$k]['action_btn'];
               ?>
                          <div class="col-md-6">
                            <div class="panel"  style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
                              <div class="panel-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-6" align="left">
                                        <h6><a href="#">#<?= $ticket_no_1_complete; ?></a></h6>                                        
                                      </div>
                                      <div class="col-md-6" align="right">
                                        <h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_1_complete; ?></h6>                                        
                                      </div>                                      
                                    </div>  

                                    <div class="row">
                                      <div class="col-md-6" align="left">                                  
                                        <ul class="list list-unstyled">
                                          <li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_1_complete; ?><br/> <i style="font-size: 10px;">Created on <?= $created_on11 ?></i></li>
                                        </ul> 
                                      </div>
                                      <div class="col-md-6" align="right">
                                         <ul class="list list-unstyled ">
                                          <li class="dropdown">
                                             <i class=" icon-shrink3"></i>&nbsp;: &nbsp;
                                                  <?= $product_name_filter ?>
                                          </li>
                                        </ul> 
                                      </div>
                                    </div> 

                                    <div class="row">
                                      <div class="col-md-6" align="left">                                  
                                        <ul class="list list-unstyled">
                                          <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<?= $complete_issue_list[$k]['scheduledatetime'];?></li>
                                        </ul> 
                                      </div>
                                      <div class="col-md-6" align="right">
                                         <ul class="list list-unstyled ">
                                          <li class="dropdown">
                                             <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                                <?= $priority_complete;?>  
                                          </li>
                                        </ul> 
                                      </div>
                                    </div> 
                                    <ul class="list list-unstyled">
                                      <li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1_complete; ?></li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12" align="left">
                                          <ul class="list list-unstyled">
                                            <li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1_complete; ?></span></li>
                                          </ul>                                 
                                        </div>
                                     </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel-footer">                            
                                <ul>
                                   <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $complete_issue_list[$k]['scheduledatetime'];?></span></li>
                                </ul>
                                
                                <ul class="pull-right">
                                  <li class="dropdown">
                                    <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                    <?= $action_btn; ?>
                                  </li>
                                  <li>
                                    <ul class="list list-unstyled ">
                                      <li class="dropdown"><?= $status_remark ?></li>
                                    </ul> 
                                  </li>
                                  <li><a  id="<?= $ticket_no_1_complete ?>" onclick="remark_list_pending(this.id)"><i class="icon-eye"></i></a></li>
                                  <li <?= $DeleteClass; ?> ><a id="<?= $query_1_complete ?>" onclick="delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
                                </ul> 
                              </div>
                            </div>
                          </div>

              <?php 

                $record_cnt_complete=$k+1;
                if($record_cnt_complete<$complete_cnt)
                {
                  $ticket_no_2_complete=$complete_issue_list[$record_cnt_complete]['ticket_no'];
                  $issue_2_complete=$complete_issue_list[$record_cnt_complete]['issue'];       
                  $check_2_complete=$complete_issue_list[$record_cnt_complete]['check'];
                  $company_name_2_complete=$complete_issue_list[$record_cnt_complete]['company_name'];

                  $created_date_2_complete=$complete_issue_list[$record_cnt_complete]['schedule_date'];
                  $created_on211=$complete_issue_list[$record_cnt_complete]['created_date'];

                  $priority_2_complete=$complete_issue_list[$record_cnt_complete]['priority'];
                  $status_remark2=$complete_issue_list[$record_cnt_complete]['status_remark'];
                  $query_2_complete=$complete_issue_list[$record_cnt_complete]['query_id'];
                  $product_name_filter2=$complete_issue_list[$record_cnt_complete]['product_name'];
                  $action_btn_2 = $complete_issue_list[$record_cnt_complete]['action_btn'];
               ?>


                          <div class="col-md-6">
                            <div class="panel"  style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
                              <div class="panel-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-6" align="left">
                                        <h6><a href="#">#<?= $ticket_no_2_complete; ?></a></h6>                                        
                                      </div>
                                      <div class="col-md-6" align="right">
                                        <h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_2_complete; ?></h6>                                        
                                      </div>                                      
                                    </div>  

                                    <div class="row">
                                      <div class="col-md-6" align="left">                                  
                                        <ul class="list list-unstyled">
                                          <li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_2_complete; ?><br/> <i style="font-size: 10px;">Created on <?= $created_on211 ?></i></li>
                                        </ul> 
                                      </div>
                                      <div class="col-md-6" align="right">
                                         <ul class="list list-unstyled ">
                                          <li class="dropdown">
                                             <i class=" icon-shrink3"></i>&nbsp;: &nbsp;
                                                  <?= $product_name_filter2 ?>
                                          </li>
                                        </ul> 
                                      </div>
                                    </div> 

                                    <div class="row">
                                      <div class="col-md-6" align="left">                                  
                                        <ul class="list list-unstyled">
                                          <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<?= $complete_issue_list[$record_cnt_complete]['scheduledatetime'];?></li>
                                        </ul> 
                                      </div>
                                      <div class="col-md-6" align="right">
                                         <ul class="list list-unstyled ">
                                          <li class="dropdown">
                                             <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                                <?= $priority_2_complete;?>  
                                          </li>
                                        </ul> 
                                      </div>
                                    </div> 
                                    <ul class="list list-unstyled">
                                      <li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_2_complete; ?></li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12" align="left">
                                          <ul class="list list-unstyled">
                                            <li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_2_complete; ?></span></li>
                                          </ul>                                 
                                        </div>
                                     </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel-footer">                            
                                <ul>
                                   <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $complete_issue_list[$record_cnt_complete]['scheduledatetime'];?></span></li>
                                </ul>
                                <ul class="pull-right">
                                  <li class="dropdown">
                                    <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                    <?= $action_btn_2; ?>
                                  </li>
                                  <li>
                                    <!-- //$complete_issue_list[$record_cnt_complete]['status']; -->
                                    <li>
                                      <ul class="list list-unstyled ">
                                        <li class="dropdown"><?= $status_remark2 ?></li>
                                      </ul> 
                                    </li>
                                  </li> 
                                  <li><a  id="<?= $ticket_no_2_complete ?>" onclick="remark_list_pending(this.id)"><i class="icon-eye"></i></a></li>
                                  <li <?= $DeleteClass; ?> ><a id="<?= $query_2_complete ?>" onclick="delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
                                </ul> 

                              </div>
                            </div>
                          </div>

              <?php } ?>
              </div>
            </td>
          <td  class="hidden">22 Jun 1972</td>
        </tr>
      <?php
        $k=$record_cnt_complete; 
       } ?>
      </tbody>
    </table>
  </div>