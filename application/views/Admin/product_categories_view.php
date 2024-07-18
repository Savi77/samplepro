<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('Admin/includes/header'); ?>
  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
  <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
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
  <!-- /theme JS files -->
</head>

<body style="overflow-x: hidden;">

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
          <a href="<?php echo base_url('admin/ProductSpecification/Product'); ?>"> <span class="text-semibold">Product Management</span></a> - Product Categories
        </h4>
      </div>

      <div class="heading-elements">
        <?php if ($this->session->user_type == 'SA') { ?>
          <div class="heading-btn-group">
            <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
          </div>
        <?php } else { ?>
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- /page header -->
              <!-- Basic responsive configuration -->
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white"> Product Categories</h5>
                  <div class="heading-elements">
                    <td>
                      <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                                <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Product" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                              </a> -->
                    </td>
                  </div>
                </div>

                <table class="table datatable-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th class="hidden">Job Title</th>
                      <th <?= $StatusClass; ?>>Status</th>
                      <th class="text-center">Actions</th>
                      <th class="hidden">DOB</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    foreach ($array_interest->result() as $row) { ?>
                      <tr>
                        <td><?php echo $count ?></td>
                        <td><?= $row->interest ?></td>
                        <td class="hidden">22 Jun 1972</td>
                        <td <?= $StatusClass; ?>><?php if ($row->status == 1) { ?>
                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                          <?php } else { ?>

                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                          <?php } ?>
                        </td>
                        <td class="text-center">
                          <ul class="icons-list" style="display: flex;">
                            <li <?= $EditClass; ?>><a data-toggle="modal" onclick="edit_interest(id)" id="<?= $row->id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Interest" data-placement="bottom"></i></span></a></li>
                            <li <?= $DeleteClass; ?>><a onclick="del_interest(id)" id="<?= $row->id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Interest" data-placement="bottom"></i></span></a></li>

                          </ul>
                        </td>
                        <td class="hidden">22 Jun 1972</td>
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
            <h6 class="modal-title"> Add Product Categories</h6>
          </div>

          <div class="modal-body">
            <form class="form-horizontal" id="InterestForm">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Product Name <span style="color: red;">*</span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="interest" name="interest" placeholder="Enter Product Name" maxlength="35">
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
            <h6 class="modal-title"><i class="icon-steering-wheel"></i>&nbsp;&nbsp;Edit Product Categories</h6>
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
        $('#InterestForm').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
            interest: {
              validators: {
                notEmpty: {
                  message: 'Please Enter Product Name'
                }
              }
            }
          }
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(e) {
        $("#InterestForm").on('submit', (function(e) {
          //e.preventDefault();
          if (e.isDefaultPrevented()) {
            //alert('invalid');
          } else {

            $.ajax({
              url: "<?php echo base_url('admin/Master_product/add_area_interest'); ?>",
              type: "POST",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                //alert(data);


                $(function() {
                  new PNotify({
                    title: 'Add  Product Categories',
                    text: 'Added  Successfully',
                    type: 'success'
                  });
                });

                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/Master_product'); ?>";
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
      function del_interest(id) {

        var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to delete this Product Categories?</p>',
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

          var datastring = 'userid=' + id;
          // alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master_product/delete_area_interest'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
              //alert(data);
              $(function() {
                new PNotify({
                  title: 'Delete Product Categories',
                  text: 'Deleted successfully',
                  type: 'success'
                });
              });

              setTimeout(function() {
                window.location = "<?php echo base_url('admin/Master_product'); ?>";
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



    <!--======================================= / Delete Event  ==========================================-->

    <script>
      function edit_interest(id) {
        var datastring = 'interestid=' + id;
        //alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Master_product/edit_area_interest'); ?>",
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
          text: '<p>Are you sure you want to Inactive this Product Categories?</p>',
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

          var datastring = 'userid=' + id;
          // alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master_product/deactivate'); ?>",
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
                window.location = "<?php echo base_url('admin/Master_product'); ?>";
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
          text: '<p>Are you sure you want to activate this Product Categories?</p>',
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

          var datastring = 'userid=' + id;
          // alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master_product/activate'); ?>",
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
                window.location = "<?php echo base_url('admin/Master_product'); ?>";
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