
<?php

     $count=count($UpdateRouteDetails)-1;
     $CustID=$customer['CustID'];
?> 						 
      <div class="row">
		    <div  class="panel panel-flat">
		   	   <form class="form-horizontal" id="editform" method="post" enctype="multipart/form-data">   
            <input type="hidden" name="CustID" value="<?=$CustID;?>" id="CustID">    
              <input type="hidden" name="count" value="<?=$count;?>" id="count">     
               <div class="form-group"  style="margin-top:10px;margin-left:5px;">
                   <label class="col-lg-2 control-label text-semibold">Enter Route Details :<sup style="color:red">*</sup></label>
                  <div class="col-md-1">
                   <button type="button" class="btn btn-success btn-icon addButton">
                      <i class=" icon-plus-circle2"></i>
                    </button>
                  </div>
                </div>
               
              <?php
              foreach ($UpdateRouteDetails as  $row)
               {
              ?> 
                 <div class="form-group shadow">
                     <div class="col-lg-12">
                      <div class="row">
                       <div class="col-md-12">                       
                            <div class="col-xs-3">
                                From  Location :<sup style="color:red">*</sup><input type="text" class="form-control" name="FromLocation[]" value="<?= $row->FromLocation; ?>">
                            </div>
                            <div class="col-xs-3">
                                 To  Location :<sup style="color:red">*</sup><input type="text" class="form-control" name="ToLocation[]"  value="<?= $row->ToLocation; ?>">
                            </div>
                            <div class="col-xs-3">
                               Basic Fare (Amount):<sup style="color:red">*</sup> <input  type="text" class="form-control" name="Amount[]"  value="<?= $row->Amount; ?>" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                            </div>

                            <div class="col-xs-2" style="display: none;">
                                 Vehicle <br/> Model :
                                 <select class="form-control" name="VehicleModel[]">
                                   <option value="">Select Model</option>
                                   <?php
                                    foreach ($VehicleModelArray as $key => $row2) 
                                    {
                                    ?>
                                    <option value="<?= $row2->VehicleModel; ?>"  <?php if($row2->VehicleModel==$row->VehicleModel){ echo "selected";} ?>  >
                                      <?= $row2->VehicleModel; ?>
                                    </option>
                                  <?php } ?>
                                 </select>
                            </div>
                            <div class="col-xs-1" style="display: none;">
                              Loading <br/>Cost : 
                              <input  type="text" class="form-control" name="LoadingCost[]"  value="<?= $row->LoadingCost; ?>" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                            </div>
                            <div class="col-xs-1" style="display: none;">
                              Union <br/>Cost :
                                 <input  type="text" class="form-control" name="UnionCost[]"  value="<?= $row->UnionCost; ?>" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                            </div>
                            <div class="col-xs-1" style="display: none;">
                               Extra Delivery Cost :
                                <input  type="text" class="form-control" name="DeliveryCost[]"  value="<?= $row->DeliveryCost; ?>" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                            </div>
                            <div class="col-xs-1" style="display: none;">
                                Detention Cost :
                                 <input  type="text" class="form-control" name="DetentionCost[]"  value="<?= $row->DetentionCost; ?>" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                            </div>

                            <div class="col-xs-1">
                               <button type="button" class="btn btn-danger btn-icon removeButton"  style="margin-top:20px;"><i class="icon-trash"></i></button>
                            </div>

                         </div> 
                       </div> 
                     </div>    
                </div>  
              <?php } ?>  

              <div class="form-group hide shadow" id="bookTemplate1">
               <div class="col-lg-12">  
                  <div class="row"> 
                    <div class="col-md-12">

                      <div class="col-xs-3">
                          From Location :<sup style="color:red">*</sup><input type="text" class="form-control" name="FromLocation[]" autocomplete="off">
                      </div>
                      <div class="col-xs-3">
                          To Location :<sup style="color:red">*</sup><input type="text" class="form-control" name="ToLocation[]"  autocomplete="off">
                      </div>
                      <div class="col-xs-3">
                        Basic Fare (Amount) : <sup style="color:red">*</sup><input  type="text" class="form-control" name="Amount[]" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                      </div>
                      <div class="col-xs-2"  style="display: none;">
                           Vehicle <br/>Model :
                           <select class="form-control" name="VehicleModel[]">
                             <option value="">Select Model</option>
                             <?php
                              foreach ($VehicleModelArray as $key => $row2) 
                              {
                              ?>
                              <option value="<?= $row2->VehicleModel; ?>">
                                <?= $row2->VehicleModel; ?>
                              </option>
                            <?php } ?>
                           </select>
                      </div>
                      <div class="col-xs-1"  style="display: none;">
                        Loading<br/> Cost : 
                        <input  type="text" class="form-control" name="LoadingCost[]"  maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                      </div>
                      <div class="col-xs-1"  style="display: none;">
                        Union <br/>Cost :
                           <input  type="text" class="form-control" name="UnionCost[]" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                      </div>
                      <div class="col-xs-1"  style="display: none;">
                         Extra Delivery Cost :
                          <input  type="text" class="form-control" name="DeliveryCost[]"  maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                      </div>
                      <div class="col-xs-1"  style="display: none;">
                          Detention Cost :
                           <input  type="text" class="form-control" name="DetentionCost[]" maxlength="10" autocomplete="off"   onkeypress="return isNumber(event)"  />
                      </div>
                      <div class="col-xs-1">
                         <button type="button" class="btn btn-danger btn-icon removeButton" style="margin-top: 20px;"><i class="icon-trash"></i></button>
                      </div>

                   </div>
                </div>
              </div>  
            </div>  
            <br/><br/>
             <div class="row"> 
              <div class="col-lg-12">  
                <div align="center">
                 <button  type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                </div>
                <div class="text-center">                  
                  <span id="preview3"></span>
                </div>
              </div> 
            </div> 
            <br/><br/>
          </form>
        </div>  
      </div>


<script>

$(document).ready(function() 
{
    var count =$("#count").val();
        FromLocationValidator = {
            row: '.col-xs-2',
            validators: {
                notEmpty: {
                    message: 'From Location is required'
                }
            }
        },
        ToLocationValidator = {
            row: '.col-xs-2',
            validators: {
                notEmpty: {
                    message: 'To Location is required'
                }
            }
        },
        AmountValidator = {
            row: '.col-xs-1',
            validators: {
                notEmpty: {
                    message: 'Basic Fare is required'
                }
            }
        },
      bookIndex = count;

    $('#editform')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                      'FromLocation[]': FromLocationValidator,     
                      'ToLocation[]': ToLocationValidator, 
                      'Amount[]': AmountValidator
                    }
        })
        // Add button click handler
        .on('click', '.addButton', function()
         {
         // alert();
            bookIndex++;
            var $template = $('#bookTemplate1'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-book-index', bookIndex)
                                .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="FromLocation[]"]').attr('name', 'FromLocation[' + bookIndex + ']').end()
                .find('[name="ToLocation[]"]').attr('name', 'ToLocation[' + bookIndex + ']').end()
                .find('[name="Amount[]"]').attr('name', 'Amount[' + bookIndex + ']').end()
                .find('[name="VehicleModel[]"]').attr('name', 'VehicleModel[' + bookIndex + ']').end()


                .find('[name="LoadingCost[]"]').attr('name', 'LoadingCost[' + bookIndex + ']').end()
                .find('[name="UnionCost[]"]').attr('name', 'UnionCost[' + bookIndex + ']').end()
                .find('[name="DeliveryCost[]"]').attr('name', 'DeliveryCost[' + bookIndex + ']').end()
                .find('[name="DetentionCost[]"]').attr('name', 'DetentionCost[' + bookIndex + ']').end();
              
                
            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
            $('#editform')
                    .bootstrapValidator('addField', 'FromLocation[' + bookIndex + ']', FromLocationValidator)
                    .bootstrapValidator('addField', 'ToLocation[' + bookIndex + ']', ToLocationValidator)
                    .bootstrapValidator('addField', 'Amount[' + bookIndex + ']', AmountValidator);
            })
        // Remove button click handler
        .on('click', '.removeButton', function() 
        {
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-book-index');
            $('#editform').bootstrapValidator('removeField', $row.find('[name="FromLocation[' + index + ']"]'));
            $row.remove();
        });
   });
</script>
 <script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#editform").on('submit',(function(e)
           {
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //  alert('invalid');
                }
              else
                   {

                       $("#preview3").html('<img src="<?= base_url() ?>assets/images/ajax-loader.gif" style="height:30px;width:30px;" />');
                     // alert();
                        $.ajax({
                              url: "<?php echo base_url('Customer/InsertRouteDetails');?>",
                              type: "POST",
                              data:  new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false,
                              success: function(data)
                                {
                                     $("#preview3").hide();
                                     // alert(data);
                                       new PNotify({
                                                    text: 'Route Details has been added successfully',
                                                    icon: 'glyphicon glyphicon-ok-circle',
                                                    addclass: 'bg-success'
                                                });
                                        setTimeout(function()
                                             {
                                                 window.location="<?php echo base_url('Customer')?>";
                                             }, 1500);
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