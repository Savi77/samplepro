
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

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>

  

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <!-- /theme JS files -->
  

  <style type="text/css">
    
    tr.group,
    tr.group:hover 
    {
        background-color: #ddd !important;
        cursor:pointer; 
    }

  </style>

</head>

<body>
 <?php  $this->load->view('Admin/includes/admin_header'); ?>

  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
              <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!--  -->

      <!-- Main content -->
      <div class="content-wrapper" style="padding: 20px 30px">

        <!-- Hover rows -->
        <div class="panel panel-info">
          <div class="panel-heading">
            <h5 class="panel-title">Candidate</h5>
          </div>
          <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Interest</th>
                  <th>Email</th>
                  <th class="text-center">Actions</th>
                </tr>
                  </thead>
                  <tbody>
                       <?php
                               $count = 1;
                               foreach($array_stud->result() as $row) { 
                                  $img_url=$row->resume ;
                                   $add_minus=$row->id ;

                                ?>
                      <tr>
                          <td><?php echo $count ?></td>
                  <td><?= $row->first_name ?> <?= $row->last_name ?></td>
                  <td><div onclick="change_plus(id)" id="<?php $row->id ?>"><a style="color: #353535;">
                          <span class="label bg-default plus_button" style="line-height: 20px;">
                              <i class=" icon-plus-circle2" style="font-size: 18px; color: #969595;">
                              </i>
                          </span>
                          <?= $row->subject ?>
                      </a></div>
                      <a onclick="change_minus(id)" id="<?php $row->id ?>" style="display: none; color: #353535;">
                        <span class="label bg-default minus_button" style="line-height: 20px; display: none" id="">
                            <i class=" icon-minus-circle2" style="font-size: 18px; color: #969595;">
                            </i>
                        </span>
                        <?= $row->subject ?>
                      </a>
                  </td>
                  <td><?= $row->areaofinterest ?></td>
                  <td><?= $row->email ?></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a onclick="del(id)" id="<?= $row->id ?>"><i class=" icon-trash"></i> delete</a></li>
                          <?php if ($img_url) 
                                            { ?>
                                              <li><a href="<?= base_url() ?>assets/images/employee/<?= $row->resume ?>"><i class=" icon-file-download"></i> Download</a></li>
                                         <?php } else { ?>
                              <li><a onclick="empty_file()"><i class=" icon-file-download"></i> Download</a></li>
                          <?php } ?>
                        </ul>
                      </li>
                    </ul>
                  </td>
                      </tr> 
                        <?php $count++; } ?>
                  </tbody>
              </table>
        </div>
        <!-- /hover rows -->


      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

<!--======================= plus and minus button ============================-->
  <script type="text/javascript">
    
    function change_plus(id)
      {
        // alert(id);
         $(id).hide();
         $(id).show();
      }

      function change_minus(id)
      {
        // alert(id);
         $(id).show();
         $(id).hide();
      }

  </script>

<!--======================= /plus and minus button ============================-->

<!--=======================================  delete Event  ==========================================-->

<script type="text/javascript">

function empty_file()
{
   $(function(){
             new PNotify({
                          title: 'Confirmation',
                          text: 'File does not exist',
                          type: 'warning'
                         });
            });
}


</script>


<script>
    function del(id)
    {
       var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this candidate ?</p>',
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

            var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>This will permanently delete the candidate profile from the disk. <br> Are you sure you want to continue ?</p>',
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
              url: "<?php echo base_url('admin/Candidate/delete_candidate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                            $(function(){
                                                 new PNotify({
                                                              title: 'Delete Form',
                                                              text: 'Deleted successfully',
                                                              type: 'success'
                                                             });
                                                });

                                                  setTimeout(function()
                                                 {
                                                    window.location="<?php echo base_url('admin/Candidate');?>";
                                                 }, 1000);

                
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


        })

        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });
    }
</script>


<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"user/deleteuser/"+id;
        else
          return false;
        } 
</script>


<!--======================================= / Delete Event  ==========================================-->
<script type="text/javascript">
  
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="5">'+group+'</td></tr>'
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
    <!-- Footer -->
    <div class="footer text-muted">
      &copy; 2017. <a href="#">iLEAF Information Technology</a> 
    </div>
    <!-- /footer -->

  </div>
  <!-- /page container -->


</body>
</html>
