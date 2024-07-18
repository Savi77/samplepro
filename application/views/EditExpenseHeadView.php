	

<?php

foreach ($EditData as  $row)
 {

   ?> 
	  <div class="row">
		<!-- 2 columns form -->
		<form id="EditForm" method="post">
  		  <input type="hidden" class="form-control" name="head_id"  value="<?= $row->head_id  ?>">
			<div class="panel panel-flat">
				<div class="panel-body">
					<fieldset>
                         <div class="row">
					       <div class="col-md-6">	
								<div class="form-group">
									<label>Expense Head :</label>
									<input type="text" class="form-control" maxlength="60" name="head_title" id="head_title" placeholder="Enter Expense Head " value="<?= $row->head_title;?>" >
								</div>
							</div>
							 <div class="col-md-6">	
								<div class="form-group">
									<label>Expense Description :</label>
									<textarea class="form-control" name="head_desc" rows="1"  placeholder="Enter Description"><?= $row->head_desc  ?></textarea>
								</div>
							  </div>
						</div>
					</fieldset>
					<br/>
			    	<br/>
				    <div class="text-center">
					<button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
					<span id="preview2"></span>
				</div>	
			</div>
		</div>
	</form>
	<!-- /2 columns form -->
</div>

<?php } ?>


 <script type="text/javascript">
	$(document).ready(function() {
	    $('#EditForm').bootstrapValidator({
	        message: 'This value is not valid',
	        fields: {
	            head_title: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Expense Title required'
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
	     $("#EditForm").on('submit',(function(e)
	         {
	           //e.preventDefault();
	           if (e.isDefaultPrevented())
	            {
	              //  alert('invalid');
	              }
	            else
	                 {
                       $("#preview2").html('<img src="<?= base_url() ?>assets/images/ajax-loader.gif" style="height:30px;width:30px;" />');
	                 	 // alert();
	                      $.ajax({
			                        url: "<?php echo base_url('ExpenseHead/UpdateData');?>",
			                        type: "POST",
			                        data:  new FormData(this),
			                        contentType: false,
			                        cache: false,
			                        processData:false,
			                        success: function(data)
			                          {
		                                 $("#preview2").hide();
		                                   new PNotify({
										            text: 'Expense Head Updated Successfully',
													icon: 'glyphicon glyphicon-ok-circle',
										            addclass: 'bg-success'
										        });
												setTimeout(function()
		                                         {
		                                             window.location="<?php echo base_url('ExpenseHead')?>";
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
