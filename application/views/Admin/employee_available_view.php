 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>


<select class="form-control soft_skill_list" id="employee1" multiple="multiple" name="employee[]" onchange="document.getElementById('err1').innerHTML=''" readonly="">
		<?php
		foreach ($available->result() as $value1)
        { ?>
                <option value="<?= $value1->id?>"><?=$value1->name?></option>;
         <?php } ?>
</select>           




<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
jQuery('#employee1').multiselect({
        enableFiltering: true,
        maxHeight:400,
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Please select employee', 
        numberDisplayed: 5, 
        selectAll: false, 
        onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = jQuery('#employee1 option:selected');
 
                if (selectedOptions.length >= 5) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = jQuery('#employee1 option').filter(function() {
                        return !jQuery(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });

                     new PNotify({
                                      title: 'Message',
                                      text: 'Please Select only 5 employee',
                                      type: 'warning'
                                     });
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#employee1 option').each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }});
            
            
     /*Add This to Block SHIFT Key*/       
var shiftClick = jQuery.Event("click");
shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });
</script>
<!-- ====================================================================================================================== -->