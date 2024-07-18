                                      

    <fieldset>
       <br/>
        <div class="row">
          <?php 
           
            foreach ($terms_list as  $res)
             {
                $cnt=911;
                $terms=explode("$^", $res->term_condition);
                for($i=1;$i<count($terms);$i++)
                {

           ?>
           <div class="removeclass1<?= $cnt; ?>">
            <div class="col-md-12"> 
                 <div class="col-md-11">
                    <div class="form-group">
                      <textarea class="form-control" name="terms[]" rows="1"><?= $terms[$i];?></textarea>
                    </div>
                  </div>    
                  <div class="col-md-1 nopadding">
                    <div class="form-group ">
                      <div class="input-group">
                        <div class="input-group-btn">
                          <button class="btn btn-danger" type="button" id="<?= $cnt;?>"  onclick="remove_terms_fields(this.id);"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                        </div>
                      </div>
                    </div>
                   </div>
              </div>
            </div>
            <?php  $cnt++;} } ?>
         </div>
    </fieldset>