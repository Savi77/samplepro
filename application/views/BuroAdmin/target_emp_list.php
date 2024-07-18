<?php foreach ($emp_list->result() as $emp) 
{ 
	?>
	<div class="row">
		<div class="col-md-1 form-group" align="left">
		 	<input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" value="<?= $emp->id ?>" onclick="myFunction(this)">
		</div>
		<div class="col-md-4 form-group">
		 	<input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp->name ?>" readonly>
		 	
		</div>
		<div class="col-md-2 form-group">
		 	<input class="form-control class" type="text" id="taget_value" class="" name="taget_value[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 44' maxlength="15">
		</div>
    <div class="col-md-2 form-group">
      <input class="form-control class" type="text" id="" class="" readonly="" name="" value="<?= $get_uom[0]->uom_type ?>">
      <input class="form-control class" type="hidden" id="uom_id" class="" readonly="" name="uom_id" value="<?= $get_uom[0]->uom_id ?>">
    </div>
	     <br>
    </div>
<?php } ?>

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

<!--====================================== / Get employee list ==========================-->