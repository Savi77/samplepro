<style type="text/css">
	.heightsize
	{
	    padding: 3px 20px !important;
	}
</style>
<div class="modal-header bg-info" style="background-color:#009FDF;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Remark details</h6>
</div>
<input type="hidden" name="bill_achieve_id" id="bill_achieve_id" value="<?= $bill_list['achieve_id'] ?>">
<div class="modal-body">
		<h3  style="margin-top: 0px; margin-bottom: 5px;">Issue</h3>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		      	<th>Employee Name</th>
		        <th>Status</th>
		        <th>Remark</th>
		        <th>Remark Date</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($remark_list as $remark) 
			{ ?>
				 <tr>
				 	<td><?= $remark['employee_name'] ?></td>
			        <td><?= $remark['status'] ?></td>
			        <td><?= $remark['remark'] ?></td>
			        <td><?= date("d M Y", strtotime($remark['created_date'])); ?></td>
			      </tr>
			<?php } ?> 
		    </tbody>
		  </table>
		  <br>
		  <?php $count = count($bill_list[0]); 

		  	if ($count>0) 
		  	{
		  ?>
		  <h3 style="margin-top: 3px;">Billing </h3>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <!-- <th>Status</th> -->
		        <th>#</th>
		        <th width="20%">Target Type</th>
		        <th width="10%">Amount</th>
		        <th width="25%">Approved Amount</th>
		        <th width="30%">Remark</th>
		        <th width="25%">Bill Date</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php $count = count($bill_list[0]); 
		    		$cnt=1;
	        		for($i=0;$i<$count;$i++)
	        		{ ?>
        				<tr>
        					<td class="heightsize"><?= $cnt ?></td>
		        			<td class="heightsize"><?= $bill_list[0][$i]['target_type'] ?></td>
		        			<td class="heightsize"><?= $bill_list[0][$i]['targettype_value'] ?></td>
		        			<td class="heightsize">
			        	<!-- <div class="row"> -->
			        		<input type="hidden" name="targettype_id" id="targettypeid_<?= $i ?>" value="<?= $bill_list[0][$i]['targettype_id'] ?>">
			        		
				        	<?php if (empty($bill_list[0][$i]['adm_approved_price'])) 
				        	{ 
				        		$btn_name="Update";
				        		$btn_color="info";
				        		$readonly="";
				        		$status="update";
				        		$title="Update price";
				        		$function_name="update_price";
				        	} 
				        	else
				        	{
				        		$btn_name="Activate";
				        		$btn_color="warning";
				        		$readonly="readonly";
				        		$status="activate";
				        		$title="Activate for update price";
				        		$function_name="activate_price";
				        	}	
				        	?>
				        		<div class="col-md-6">
						        	<div class="form-group" style="width: 95px; margin-bottom: 4px;">
						        		<input type="text" class="form-control" <?= $readonly ?> name="adm_approved_price" id="admapprovedprice_<?= $i ?>" value="<?= $bill_list[0][$i]['adm_approved_price'] ?>" maxlength="15">
						        	</div>
					        	</div>
				        		<div class="col-md-3 activateupdate_<?= $i ?>" style="margin-left: 20px; margin-top: 8px;">
					        		<a data-toggle="tooltip" title="<?= $title ?>" data-placement="bottom" onclick="<?= $function_name ?>(this.id)" id="<?= $i ?>"><span class="label label-<?= $btn_color ?>"><?= $btn_name ?></span></a>
					        	</div>
					        	<div class="col-md-3 afteractivateupdate_<?= $i ?>" style="margin-left: 20px; display:none; margin-top: 8px;">
					        		<a data-toggle="tooltip" title="Update price" data-placement="bottom" onclick="update_price(this.id)" id="<?= $i ?>"><span class="label label-info">Update</span></a>
					        	</div>
			        	</td>
			        	<td><?= $bill_list['billing_remark'] ?></td>
			        	<td><?php echo date("d M Y", strtotime($bill_list['date_created'])); ?></td>
	      				</tr>
		      		<?php $cnt++; } ?>
		    </tbody>
		  </table>
		  <?php } else { ?>
		  		<div align="center">
		  			<br>
		  			<span class="label bg-danger" style="line-height: 20px; font-size: 20px; text-transform: none; padding: 2px 75px 2px 85px;">Billing Not Yet Done.</span> 
		  		</div>

		  <?php } ?>
		
</div>


<!--========================= Update price by admin ===============================-->
<script>
    function update_price(value)
    {
    		// alert(value);
    			PNotify.removeAll();
    			var lastid = value.split("_").pop();
		    	var adm_approved_price = $('#admapprovedprice_'+lastid).val();
		    	var targettype_id = $('#targettypeid_'+lastid).val();
		    	var emp_set_price = $('#empsetprice_'+lastid).val();
		    	var id = $('#bill_achieve_id').val();


		        var notice = new PNotify({
		            title: 'Confirmation',
		            text: '<p>Are you sure you want to Update the value '+adm_approved_price+'</p>',
		            hide: false,
		            type: 'warning',
		            confirm: {
		                confirm: true,
		                buttons: [
		                    {
		                        text: 'Yes',
		                        addClass: 'btn-sm'
		                    },
		                    {
		                        text: 'No',
		                        addClass: 'btn-sm'
		                    }
		                ]
		            },
		            buttons: {
		                closer: false,
		                sticker: false
		            },
		            history: {
		                history: false
		            }
		        })

		         // On confirm
		        notice.get().on('pnotify.confirm', function()
		         {
		        		// var adm_approved_price = $('#adm_approved_price').val();
				        var datastring = 'achieve_id='+id+'&adm_approved_price='+adm_approved_price+'&targettype_id='+targettype_id;
				      	// alert(datastring);

				      	 $.ajax({
				        type: "post",
				        url: "<?php echo base_url('admin/Customer/update_price'); ?>",
				        cache: false,    
				        data: datastring,
				        success: function(data)
				        {    
				          // alert(data);
				            PNotify.removeAll();
				            // if (data==0)
				            // {
				                 new PNotify({
				                                title: 'Price Update',
				                                text: 'Price updated successfully',
				                                type: 'success'
				                               });

				                 $('#bill_value').val(data);
				            // }
				         },
				        error: function(){      
				         alert('Error while request..');
				        }
				       });

				      
		        })
		        // On cancel
		        notice.get().on('pnotify.cancel', function()
		         {
		            // alert('Oh ok. Chicken, I see.');
		        });
    }
    function activate_price(value)
    {
    			var lastid = value.split("_").pop();

    				var notice = new PNotify({
		            title: 'Confirmation',
		            text: '<p>Are you sure you want to activate for update value </p>',
		            hide: false,
		            type: 'warning',
		            confirm: {
		                confirm: true,
		                buttons: [
		                    {
		                        text: 'Yes',
		                        addClass: 'btn-sm'
		                    },
		                    {
		                        text: 'No',
		                        addClass: 'btn-sm'
		                    }
		                ]
		            },
		            buttons: {
		                closer: false,
		                sticker: false
		            },
		            history: {
		                history: false
		            }
		        })
		         // On confirm
		        notice.get().on('pnotify.confirm', function()
		         {
		         	document.getElementById("admapprovedprice_"+lastid).readOnly = false;
		         	$(".activateupdate_"+lastid).hide();
		         	$(".afteractivateupdate_"+lastid).show();
		         })
		        // On cancel
		        notice.get().on('pnotify.cancel', function()
		         {
		            // alert('Oh ok. Chicken, I see.');
		        });
    }
</script>
<!--========================= / Update price by admin ===============================-->