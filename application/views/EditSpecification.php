					  
<?php

foreach ($EditData as  $row)
 {
	$id=$row->id;
   ?>
	  <div class="row">
			<!-- 2 columns form -->
			<form class="form-horizontal"  id="defaultForm1" method="post">
				<div class="panel panel-flat" style="margin-bottom: 0px;margin-left: 10px;margin-right: 10px;">
					<div class="panel-body">
						<div class="row">
						 <input type="hidden" value="<?php echo $id?>" id="id" name="id">
 							<div class="col-md-12">
	                                 <fieldset>
										<div class="col-md-12">
										  <div class="col-md-12">
											<div class="form-group">
												<label class="col-lg-4 control-label"> Specification Name:</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" value="<?php echo $row->spec_name?>" name="spec_name" id="spec_name" placeholder="Enter Specification Name">
												</div>
											</div>
										  </div>	
										</div>	
										  <div class="col-md-12 ">
										    <div class="col-md-12 ">
												<div class="text-right">
													<button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>	
										</div>											
									</fieldset>
									</div>
								</div>
								<div class="text-left" id="preview2"></div>
					    </div>
					<div class="text-left" id="showedit"></div>
				</div>
			</form>
			<!-- /2 columns form -->
		</div>
<?php }?>
 <script type="text/javascript">
	$(document).ready(function() {
	    $('#defaultForm1').bootstrapValidator({
	        message: 'This value is not valid',
            fields: {
	            spec_name: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Specification  Name is required and can\'t be empty'
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
	     $("#defaultForm1").on('submit',(function(e)
	         {
	         	//alert();
	           //e.preventDefault();
	           if (e.isDefaultPrevented())
	            {
	               // alert('invalid');
	              }
	            else
	                 {
	                      $.ajax({
	                       url: "<?php echo base_url('Specification/UpdateData');?>",
	                        type: "POST",
	                        data:  new FormData(this),
	                        contentType: false,
	                        cache: false,
	                        processData:false,
	                        success: function(data)
	                          {

                                   new PNotify({
								            text: 'Specification Details Updated Successfully',
											icon: 'glyphicon glyphicon-ok-circle',
								            addclass: 'bg-success'
								        });

										setTimeout(function()
                                         {
                                            window.location="<?php echo base_url('Specification');?>";

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