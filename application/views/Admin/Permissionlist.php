  

    <div class="col-md-12">  
     <?php
      $count3=count($feature_list);
      if($count3>0)
      { 
         // echo json_encode($feature_list);
          $i=1;
          foreach ($feature_list as $row)
           {
             $collapse="demo".$i;
             $privilege=$row['privilege'];
             $component_id=$row['component_id'];
         ?>
      <div class="col-md-4">
         <div class="panel panel-flat">
             <div class="panel-body" style="min-height: 130px;">
                <fieldset>
                    <legend class="text-semibold">
                        <i class="icon-make-group position-left"></i> <?= $row['component_title']; ?>
                        <a class="control-arrow" data-toggle="collapse" data-target="#<?=$collapse;?>">
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>
                    <div class="collapse" id="<?=$collapse;?>">
                        <div class="row">
                          <?php
                            $checkbox=1;
                            foreach ($privilege as  $row) 
                            {
                              $custom_id=$component_id.'/'.$row->privilege_id;
                            ?>
                             <div class="col-md-12">
                                 <div class="col-md-10 col-md-offset-1">                                                                             
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="feature_ids[]" class="styled" value="<?=$custom_id; ?>">
                                            <?= $row->privilege;  ?>                                           
                                        </label>
                                    </div>
                                 </div>    
                             </div>  
                            <?php
                              $checkbox++;
                              }
                            ?>
                        </div>
                    </div>
                </fieldset>
              </div>
           </div> 
        </div>
       <?php 
        $i++;} ?>
         <div class="col-md-12">
          <div class="text-center">
            <br/>
            <button type="submit" class="btn btn-primary btn-xlg">Submit <i class="icon-arrow-right14 position-right"></i></button>
            <span id="preview44"></span>
          </div>
          <br/><br/><br/>
          <span id="rsdata"></span>
        </div> 
        <?php } else{
       ?> 
       <div class="col-md-12">

      </div>
     <?php } ?>
   </div>  



