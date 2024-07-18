<?php $this->load->view('Admin/includes/master_header'); ?>
<?php $this->load->view('Admin/includes/admin_header'); ?>
<?php
// echo json_encode($user_permission);
$AddClassP = 'style="display:block";';
$EditClass = 'style="display:block";';
$DeleteClass = 'style="display:block";';
$StatusClass = 'style="display:block";';

foreach ($user_permission as $priviledge) {
  $priviledge_key = $priviledge->priviledge_key;
  $status = $priviledge->status;
  if ($priviledge_key == 'ADD') {
    if ($status == 1) {
      $AddClassP = ' style="display:block"; ';
    } else {
      $AddClassP = ' style="display:none"; ';
    }
  }

  if ($priviledge_key == 'EDIT') {
    // echo 11;
    if ($status == 1) {
      $EditClass = ' style="display:block"; ';
    } else {
      $EditClass = ' style="display:none"; ';
    }
  }

  if ($priviledge_key == 'DELETE') {
    if ($status == 1) {
      $DeleteClass = 'style="display:block"; ';
    } else {
      $DeleteClass = 'style="display:none"; ';
    }
  }

  if ($priviledge_key == 'ACTIVE') {
    if ($status == 1) {
      $StatusClass = 'style="display:block"; ';
    } else {
      $StatusClass = 'style="display:none"; ';
    }
  }
}

?>



<!-- Page container -->
<div class="page-container">
  <!-- Page content -->
  <div class="page-content">
    <!-- Main sidebar -->
    <?php $this->load->view('Admin/includes/sidebar'); ?>
    <!--  -->
    <!-- Main content -->
    <div class="content-wrapper">
      <div class="row">
        <div class="row">
          <div class="col-md-12">
          <?php $this->load->view('Admin/includes/panel'); ?>
            <!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4>
        <i class="icon-arrow-left52 position-left"></i>
        <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
        <a href="<?php echo base_url('admin/Master/view_master'); ?>"> <span class="text-semibold">Masters</span></a> - Order Status List
      </h4>
    </div>

    <div class="heading-elements">
      <div class="heading-btn-group">
        <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
      </div>
    </div>
  </div>
</div>
<!-- /page header -->
            <!-- Basic responsive configuration -->
            <div class="panel panel-flat">
              <div class="panel-heading table_header">
                <h5 class="panel-title" style="color:white">Order Status</h5>
                <div class="heading-elements">
                  <td>
                    <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                        <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Client" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                      </a> -->
                  </td>
                </div>
              </div>

              <table class="table datatable-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Status Name</th>
                    <th class="hidden">Site URL</th>
                    <th class="hidden">Description</th>
                    <th <?= $StatusClass; ?>>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 1;
                  foreach ($get_data->result() as $row) {
                    $default_status = $row->default_active;
                    if ($default_status == 1) {
                      $default = "(Default)";
                    } else {
                      $default = "";
                    }
                  ?>
                    <tr>
                      <td><?php echo $count ?></td>
                      <td><?= $row->name ?> <?= $default ?></td>
                      <td class="hidden"></td>
                      <td class="hidden"></td>
                      <td <?= $StatusClass; ?>><?php if ($row->status == 1) { ?>
                          <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->order_status_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                        <?php } else if ($row->status == 0) { ?>

                          <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->order_status_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                        <ul class="icons-list" style="display: flex;">
                          <li <?= $EditClass; ?>><a data-toggle="modal" onclick="edit_status(id)" id="<?= $row->order_status_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Order Status" data-placement="bottom"></i></span></a></li>
                          <li <?= $DeleteClass; ?>><a onclick="del_status(id)" id="<?= $row->order_status_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Order Status" data-placement="bottom"></i></span></a></li>
                        </ul>
                      </td>
                    </tr>
                  <?php $count++;
                  } ?>
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
          <h6 class="modal-title"> Add Order Status</h6>
        </div>

        <div class="modal-body">
          <form class="form-horizontal" id="StatusForm">


            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Status Name <span style="color: red;">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="status_name" name="status_name" placeholder="Enter Order Status" maxlength="15">
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


  <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Edit Order Status</h6>
        </div>

        <div class="modal-body">
          <div id="complaint_model_data1">

          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- Footer -->
  <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
  <!-- /footer -->
  <!--=======================================  Validation login  ==========================================-->

  <script type="text/javascript">
    $(document).ready(function() {
      $('#StatusForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
          status_name: {
            validators: {
              notEmpty: {
                message: 'Please Enter Status Name'
              }
            }
          }
        }
      });
    });
  </script>

  <!--======================================= / Validation login  ==========================================-->



  <script type="text/javascript">
    $(document).ready(function(e) {
      $("#StatusForm").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          //alert('invalid');
        } else {

          $.ajax({
            url: "<?php echo base_url('admin/Ecommerce/add_status'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {

              $(function() {
                new PNotify({
                  title: 'Order Status Form',
                  text: 'Added  Successfully',
                  type: 'success'
                });
              });

              setTimeout(function() {
                window.location = "<?php echo base_url('admin/Ecommerce/status'); ?>";
              }, 1000);


            },
            error: function() {
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
    function del_status(id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this Order Status?</p>',
        hide: false,
        type: 'warning',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {

        var datastring = 'status_id=' + id;
        //alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Ecommerce/delete_status'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            //alert(data);
            $(function() {
              new PNotify({
                title: 'Order Status Delete Form',
                text: 'Deleted successfully',
                type: 'success'
              });
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/Ecommerce/status'); ?>";
            }, 1000);


          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
        // alert('Oh ok. Chicken, I see.');
      });

    }
  </script>


  <script type="text/javascript">
    var url = "<?php echo base_url(); ?>";

    function delete(id) {
      var r = confirm("Do you want to delete this?")
      if (r == true)
        window.location = url + "user/deleteuser/" + id;
      else
        return false;
    }
  </script>


  <!--======================================= / Delete Event  ==========================================-->

  <script>
    function edit_status(id) {
      var datastring = 'status_id=' + id;
      //alert(datastring);
      $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Ecommerce/edit_status'); ?>",
        cache: false,
        data: datastring,
        success: function(data) {
          //alert(data);
          $('#modal_default1').modal('show');
          $('#complaint_model_data1').html(data);

        },
        error: function() {
          alert('Error while request..');
        }
      });

    }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('input[placeholder]').placeholderLabel();
    })
    $(document).ready(function() {
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();
  </script>



  <!--======================================= Activate & deactivate  ==========================================-->

  <script>
    function deactivate(id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to Inactive this Order Status?</p>',
        hide: false,
        type: 'warning',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {

        var datastring = 'status_id=' + id;
        // alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Ecommerce/deactivate'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            // alert(data);
            $(function() {
              new PNotify({
                title: 'Confirmation Form',
                text: 'Inactive successfully',
                type: 'success'
              });
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/Ecommerce/status'); ?>";
            }, 800);


          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
        // alert('Oh ok. Chicken, I see.');
      });

    }
  </script>

  <script>
    function activate(id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to activate this Order Status?</p>',
        hide: false,
        type: 'warning',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {

        var datastring = 'status_id=' + id;
        // alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Ecommerce/activate'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            //alert(data);
            $(function() {
              new PNotify({
                title: 'Confirmation Form',
                text: 'Activated successfully',
                type: 'success'
              });
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/Ecommerce/status'); ?>";
            }, 800);


          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
        // alert('Oh ok. Chicken, I see.');
      });

    }
  </script>
  <!--======================================= / Activate & Deactivate ==========================================-->

  </body>

  </html>