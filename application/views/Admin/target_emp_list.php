<div class="row">
    <label class="control-label col-sm-12 emp-title" for="Youtube">Resource List <span style="color: red;">*</span></label>
<?php
 if(!empty($emp_list->result()))
 {
 foreach ($emp_list->result() as $emp) { ?>
	
		<div class="col-md-1 form-group mt-2 text-left" >
		 	<input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" value="<?= $emp->id ?>">
		</div>
		<div class="col-md-5 form-group">
		 	<input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp->name ?>" readonly>
		 	
		</div>
		<div class="col-md-3 form-group">
		 	<input class="form-control class" type="text" id="taget_value" class="" name="taget_value[]" placeholder="Enter Target Value" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 44' maxlength="15">
		</div>
    <div class="col-md-3 form-group">
      <input class="form-control class" type="text" id="" class="" readonly="" name="" value="<?= $get_uom[0]->uom_type ?>">
      <input class="form-control class" type="hidden" id="uom_id" class="" readonly="" name="uom_id" value="<?= $get_uom[0]->uom_id ?>">
    </div>
	     <br>
<?php 
  } 
}
else
{
?>
<div class="col-md-12 form-group">
<p style="padding-left:10px; color: red;" id="no_resource">Please add resource / All resources are already assigned Target.</p></div>
<?php
}?>
</div>

<!--====================================== Get employee list ==========================-->
  
  <script>	

//   $(".day").click(function() {
   
// });

  $(function() {
                  $('.day').on('change', function() 
                  {
                    if (this.checked) 
                    {
           //          	 var items = document.getElementsByClassName('class');
   						  // for (var i = 0; i < items.length; i++)
       				// 		 alert(items[i].name);
                    	// $('#desktopbutton').prop('disabled', true);

                    } 
                    else 
                    {
                      // alert("unchecked");
                    }

                  });
              });

var textboxes = $('input[name="taget_value[]"]');
var index = textboxes.index( this );

textboxes.on('keypress', function() 
{
		// alert(rr);
		var index = textboxes.index( this );
		$('#desktopbutton').prop('disabled', false);
		// alert( this.value + ', ' + index );
});
</script>

<script>
        // Check if element with id "myElement" exists
        const elementExists = document.getElementById('no_resource') !== null;

        if (elementExists) 
        {
          $('#sub_btn').prop('disabled', true);
        } 
        else 
        {
        }
    </script>

<!--====================================== / Get employee list ==========================-->