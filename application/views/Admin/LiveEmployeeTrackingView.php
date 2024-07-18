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
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
  <!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
  <!-- Theme JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
  <!-- /theme JS files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <style type="text/css">
    .daterange-single {
      z-index: 100000;
    }

    /*  Display datepicker on modal (popup)  */
    .modal {
      z-index: 20;
    }

    .modal-backdrop {
      z-index: 10;
    }

    ​
  </style>
  <style type="text/css">
    tr.group,
    tr.group:hover {
      background-color: rgb(103, 98, 98) !important;
      color: white !important;
      font-size: 14px !important;
      font-weight: 600 !important;
    }

    #DataTables_Table_0_filter {
      margin-left: 12px !important;
    }

    #DataTables_Table_0_info {
      margin-left: 12px !important;
    }

    #DataTables_Table_0_length {
      margin-right: 12px !important;
    }

    #DataTables_Table_0_paginate {
      margin-right: 12px !important;
    }

    .btn-info {
      color: #fff;
      background-color: rgba(236, 14, 39, 0.77) !important;
      border-color: rgba(236, 14, 39, 0.77) !important;
    }

    .nav-tabs.nav-tabs-bottom>li.active>a,
    .nav-tabs.nav-tabs-bottom>li.active>a:hover,
    .nav-tabs.nav-tabs-bottom>li.active>a:focus {
      border-bottom-width: 1px !important;
      border-color: transparent !important;
      border-bottom-color: #fcfcfc !important;
      background-color: rgba(0, 0, 0, 0.1) !important;

      color: white !important;
    }

    .nav-tabs.nav-tabs-bottom>li.active>a,
    .nav-tabs.nav-tabs-bottom>li.active {
      background-color: rgba(0, 0, 0, 0.1) !important;
    }

    .nav-tabs>li>a {
      margin-right: 0;
      color: #ddd !important;
    }
  </style>
</head>

<body style="overflow-x: hidden;">
  <?php $this->load->view('Admin/includes/admin_header'); ?>

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
                      <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>">
                        <span class="text-semibold">Dashboard</span>
                      </a> -
                      <a href="<?php echo base_url('admin/Tracking/view_tracking'); ?>">
                        <span class="text-semibold">Tracking</span>
                      </a> - Employee Live Location
                    </h4>
                  </div>
                </div>
              </div>
              <!-- /page header -->
              <!-- <div class="panel panel-flat" >
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab"><i class="icon-map position-right"></i>&nbsp;&nbsp;Employee Live Location</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="right-icon-tab1">
                             <div class="row">
                                <div class="col-md-9">
                                    <div id="googleMap" style="width:95%;height:500px; margin-left: 28px; margin-bottom: 6px; border: 2px solid #009FDF;">
                                    </div>
                               </div>
                               <div class="col-md-3">
                                <ul class="media-list">
                                  <?php
                                  $d = 0;
                                  $icons = array('pink-dot.png', 'yellow-dot.png', 'purple-dot.png', 'red-dot.png', 'green-dot.png', 'yellow-dot.png', 'pink-dot.png', 'red-dot.png');
                                  foreach ($EmployeeList as $res) {
                                  ?>
                                  <li class="media">
                                    <div class="media-left">
                                      <img src="http://maps.google.com/mapfiles/ms/icons/<?= $icons[$d]; ?>" class="img-circle img-xs" alt="">
                                    </div>
                                    <div class="media-body">
                                      <a href="#">
                                        <b><?= $res['title_details']; ?></b>
                                      </a>                                     
                                    </div>
                                  </li>
                                 <?php $d++;
                                  } ?> 
                                </ul>
                               </div>
                          </div>
                      </div>
                    </div>
                 </div>
                </div>
              </div> -->
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white"> Employee Live Location</h5>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div id="googleMap" style="width:95%;height:500px; margin-left: 28px; margin-bottom: 6px; border: 2px solid #009FDF;margin-top: 2%;">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <ul class="media-list">
                      <?php
                      $d = 0;
                      $icons = array('pink-dot.png', 'yellow-dot.png', 'purple-dot.png', 'red-dot.png', 'green-dot.png', 'yellow-dot.png', 'pink-dot.png', 'red-dot.png');
                      foreach ($EmployeeList as $res) {
                      ?>
                        <li class="media">
                          <div class="media-left">
                            <img src="http://maps.google.com/mapfiles/ms/icons/<?= $icons[$d]; ?>" class="img-circle img-xs" alt="">
                          </div>
                          <div class="media-body">
                            <a href="#">
                              <b><?= $res['title_details']; ?></b>
                            </a>
                          </div>
                        </li>
                      <?php $d++;
                      } ?>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->

    <script type="text/javascript">
      function myMap() {
        var mapProp = {
          center: new google.maps.LatLng(18.5204, 73.8567),
          zoom: 9,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU"></script>
    <script type="text/javascript">
      $(document).ready(function(e) {
        LiveTrackEmployee();
      });
    </script>

    <script type="text/javascript">
      function LiveTrackEmployee() {
        $.ajax({
          type: "POST",
          url: '<?php echo base_url('admin/tracking/LiveEmployeeTrackingData') ?>',
          data: $('#defaultForm').serialize(),
          success: function(data) {
            var locations = jQuery.parseJSON(data);
            var a = locations.length;
            if (a <= 0) {
              $("#preview").hide();
              $("#displaydata").hide();
              setTimeout(function() {
                new PNotify({
                  title: 'Location',
                  text: 'Sorry ! employee live location not available',
                  type: 'warning'
                });
              }, 100);
            } else {
              $("#displaydata").show();
              $("#preview").hide();
              var MapPoints1 = data;
            }
            var locations = jQuery.parseJSON(MapPoints1);
            var MapPoints1 = data;
            var map = new google.maps.Map(document.getElementById('googleMap'), {
              zoom: 12,
              // center: new google.maps.LatLng(-33.92, 151.25),
              center: new google.maps.LatLng(22.803444, 86.179525),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker, i;
            // var =;

            var mapmarker = ["pink-dot.png", "yellow-dot.png", "purple-dot.png", "red-dot.png", "green-dot.png", "red-dot.png", "purple-dot.png", "yellow-dot.png", "pink-dot.png"];

            for (i = 0; i < locations.length; i++) {
              var infowindow = new google.maps.InfoWindow();
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                map: map,
                icon: {
                  url: "http://maps.google.com/mapfiles/ms/icons/" + mapmarker[i]
                }


              });

              infowindow.setContent(locations[i].title_details);
              infowindow.open(map, marker);
            }

          }
        });
      }
    </script>
</body>

</html>