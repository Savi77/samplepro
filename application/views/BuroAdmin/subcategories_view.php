
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('Admin/includes/header'); ?>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script> 
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }

    .dataTables_length > label > span:first-child
      {
        float: left;
        margin: -1px 9px;
        margin-left: -23px;
      }
      .btn-info 
      {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
      }

      button, select 
      {
          height: 31px !important;
      }

      .dataTables_length > label > span:first-child 
      {
          margin-top: 6px !important;
      }
  </style>
	<!-- /theme JS files -->

</head>

<body style="overflow-x: hidden;">
	<?php  $this->load->view('Admin/includes/admin_header'); ?>
    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Product Sub-Categories
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
      <!-- Main sidebar -->
              <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!--  -->
      <!-- Main content -->
			<div class="content-wrapper">
				<div class="row">
					<div class="row">
						<div class="col-md-12">
				<!-- Basic responsive configuration -->
						<div class="panel panel-flat" >
							<div class="panel-heading" style="background-color: #009FDF">
								<h5 class="panel-title" style="color:white">  Product Sub-Categories List</h5>
								<div class="heading-elements">
									<td> 
                          <!--  <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model" style="">
                              <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" 
                              title="Add Product" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                            </a> -->
                      </td>
			                	</div>
							</div>
							 <table id="example" class="display" cellspacing="0">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th class="hidden">Job Title</th>
									  <th>Status</th>
										<th class="text-center">Actions</th>
										<th class="hidden">DOB</th>
									</tr>
								</thead>
								<tbody>
										 <?php
                          $count = 1;
                           foreach($get_list->result() as $row) { ?>
											<tr>
												<td ><?php echo $count ?></td>
												<td><?= $row->submmenu ?></td>
												<td class="hidden"><?= $row->interest;?></td>
                       
                          <td><?php if($row->status==1){ ?>
                                   <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->submenu_id?>" onclick="deactive_category(this.id)"><span class="label label-success">Active</span></a>
                                 <?php } else {?>

                                 <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->submenu_id?>"   onclick="active_category(this.id)"><span class="label label-danger">Inactive</span></a>
                                  <?php } ?>
                          </td>


												<td class="text-center">
													 <ul class="icons-list">
                              <li><a data-toggle="modal" onclick="edit_interest(id)" id="<?= $row->submenu_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Interest" data-placement="bottom"></i></span></a></li>
                              <li><a onclick="del_interest(id)" id="<?= $row->submenu_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Interest" data-placement="bottom"></i></span></a></li>
                          </ul>
												</td>
												<td class="hidden">22 Jun 1972</td>
											</tr>
										<?php $count++; } ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
			</div>
		</div>

</div>
				<!-- /basic responsive configuration -->

               <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-info" style="background-color:#009FDF;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h6 class="modal-title"> Add Product Sub-Categories </h6>
                        </div>

                        <div class="modal-body">
                          <form class="form-horizontal" id="InterestForm">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Select Menu <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                     <select name="menu_id" class="form-control" >
                                        <option value="">Select Menu</option>
                                          <?php   
                                            foreach ($get_menu_list as $value) 
                                            {
                                          ?>
                                          <option value="<?= $value->id ?>"><?= $value->interest;?></option>
                                         <?php } ?> 
                                     </select>
                                </div>
                              </div>

            								  <div class="form-group">
            								    <label class="control-label col-sm-3" for="email">Sub-Categories Name <span style="color: red;">*</span></label>
            								    <div class="col-sm-9">
            								      <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Enter Submenu Name" maxlength="35">
            								    </div>
            								  </div>

            								  <div class="form-group"> 
            								    <div class="col-sm-offset-3 col-sm-9">
            								      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
            								    </div>
            								  </div>
        								  </form>
                       </div>

                </div>
              </div>
         </div>


            <div id="modal_default" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Edit Product Sub-Categories</h6>
                      </div>

                      <div class="modal-body">
                          <div id="complaint_model_data">

                          </div>
                     </div>

                    </div>
                  </div>
            </div>


<!--=======================================  Validation login  ==========================================-->
<script type="text/javascript">

   function deactive_category(id)
    {
       var datastring='id='+id;
          $.ajax({
          url: '<?php echo base_url('admin/Master_submenu/deactive') ?>',
          type: "POST",
          data:  datastring,
          success: function(data)
            {
              // alert(data); 
             new PNotify({
                       title: 'Deactivate Submenu',
                       text: 'Sub-Categories has been deactivated successfully',
                       type: 'success'
                      });
              setTimeout(function()
                     {
                         window.location="<?php echo base_url('admin/Master_submenu') ?>";
                     }, 1000);            
            },
          error: function()
          {

            alert('fail');

          }
       });
    }
   //---------------------------------------------------------------------------------------
   function active_category(id)
    {
       var datastring='id='+id;
      // alert(datastring);
          $.ajax({
          url: '<?php echo base_url('admin/Master_submenu/active') ?>',
          type: "POST",
          data:  datastring,
          success: function(data)
            {

              // alert(data);
                 new PNotify({
                             title: 'Activate Submenu',
                             text: 'Sub-Categories has been activated successfully',
                             type: 'success'
                    });
                setTimeout(function()
                   {
                       window.location="<?php echo base_url('admin/Master_submenu') ?>";
                   }, 1000);      
            },
          error: function()
          {
            alert('fail');
            }
       });
    }
</script>

<script type="text/javascript">
  
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'desc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="6">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                }
            } );
            
            for( var k=0; k < groupadmin.length; k++){
        // Code added for adding class to sibling elements as "group_<id>"  
                  $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                // Code added for adding Toggle functionality for each group
                    $("#"+groupadmin[k]).click(function(){
                        var gid = $(this).attr("id");
                         $(".group_"+gid).slideToggle(300);
                    });
                 
            }
        }
    } );
} );

</script>

<script type="text/javascript">
$(document).ready(function() {
$('#InterestForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {

             menu_id: {
                  validators: {
                      notEmpty: {
                          message: 'Select Menu'
                      }
              }
            },
            submenu: {
                  validators: {
                      notEmpty: {
                          message: 'Enter Submenu Name'
                      }
              }
            }
    }
});
});
</script>
    
<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#InterestForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Master_submenu/add');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);
                                             

                                                     $(function(){
                                                   new PNotify({
                                                                title: 'Add  Product Sub-Categories',
                                                                text: 'Added  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Master_submenu');?>";
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



<!--=======================================  delete Event  ==========================================-->

<script>
    function del_interest(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Product Sub-Categories?</p>',
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

            var datastring = 'userid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master_submenu/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
              	//alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Delete Product Sub-Categories',
                                        text: 'Deleted successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Master_submenu');?>";
                           }, 800);

                
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
</script>



<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_interest(id)
    {
      var datastring = 'interestid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Master_submenu/edit'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
            $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
