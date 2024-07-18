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
                        <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
                        <a href="<?php echo base_url('admin/Tracking/view_tracking'); ?>"> <span class="text-semibold">Tracking</span></a>
                         - Tracking Report
                      </h4>
                    </div>
                  </div>
                </div>
                <!-- /page header -->
              <!-- Basic responsive configuration -->
              <!-- <div class="panel panel-flat">
                <div class="panel-body" style="padding:0px;">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                      <li class="active" style="font-size: 18px;">
                        <a href="#right-icon-tab1" data-toggle="tab">
                          <i class="icon-map position-right"></i>&nbsp;&nbsp;Employee Schedule Tracking
                        </a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="right-icon-tab1">

                      </div>
                    </div>
                  </div>
                </div>
              </div>  -->

              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Employee Schedule Tracking</h5>
                </div>
                <div class="panel-heading" style="padding-bottom: 0px;">
                  <form method="post" class="form-horizontal" id="defaultForm">
                    <div class="form-group col-md-10 col-md-offset-1">
                      <label class="control-label col-sm-2" for="email">Select Employee <span style="color: red;">*</span></label>
                      <div class="col-sm-4">
                        <select class="select" name="emp_id" id="emp_id" onchange="btndisableremove()">
                          <span class="caret"></span>
                          <option value="">Select Employee</option>
                          <?php
                          foreach ($employee_list as $value1) {
                          ?>
                            <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <label class="control-label col-sm-1" for="Youtube">Date <span style="color: red;">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Please select date" autocomplete="off">
                      </div>
                      <div class="col-sm-1 ">
                        <button class="btn btn-primary" type="submit" id="desktopbutton" style="padding: 6px 30px;">Submit</button>
                        &nbsp;&nbsp; <span id="preview"></span>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="row">
                  <div class="col-sm-12" id="displaydata" style="display:none;">
                    <fielsdset>
                      <div class="checkbox-inline">
                        <label for="inlineCheckbox1"> LEGENDS : </label>
                      </div>
                      <div class="checkbox-inline">
                        <img src="<?= base_url() ?>assets/img/passive.png" style="height:24px;width:24px;" />
                        <label for="inlineCheckbox5"> CLIENT LOCATION</label>
                      </div>
                      <div class="checkbox-inline">
                        <img src="<?= base_url() ?>assets/img/pin1.png" style="height:24px;width:24px;" />
                        <label for="inlineCheckbox5"> EMPLOYEE CURRENT LOCATION</label>
                      </div>
                      </fieldset>
                  </div>
                  <br><br><br>
                  <div class="row">
                    <!-- <div class="col s12 m10 l10"> -->
                    <div id="googleMap" style="width:95%;height:500px; margin-left: 28px; margin-bottom: 6px; border: 2px solid #009FDF;"></div>
                    <!-- </div> -->
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
    <!--========================== Date picker javascript ====================================-->

    <script type="text/javascript">
      $(function() {
        $('#start_date').datetimepicker({
          format: 'DD MMMM, YYYY',
          maxDate: 'now',
          useCurrent: true
        });
      });
    </script>
    <script type="text/javascript">
      $("#start_date").on("dp.change", function(e) {
        $('#defaultForm').bootstrapValidator('revalidateField', 'start_date');
        document.getElementById("desktopbutton").disabled = false;
      });

      function btndisableremove() {
        document.getElementById("desktopbutton").disabled = false;
      }
    </script>
    <!--========================== / Date picker javascript ====================================-->
    <!--============================== date comparision ================================-->
    <script type="text/javascript">
      function mainInfo() {
        // alert();
        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;

        if ((Date.parse(startDate) == Date.parse(endDate))) {

          $('#desktopbutton').prop('disabled', false);
          // alert();

        } else if ((Date.parse(startDate) > Date.parse(endDate))) {

          $('#desktopbutton').prop('disabled', true);
          new PNotify({
            title: 'Event',
            text: 'End date should be greater than Start date',
            type: 'warning'
          });

        } else {
          $('#desktopbutton').prop('disabled', false);
        }
      }
   
      function mainInfo1() {
        // alert();
        var startTime = document.getElementById("event_start_time").value;
        // alert(startTime);
        var endTime = document.getElementById("event_end_time").value;
        // alert(endTime);

        if (startTime >= endTime) {

          $('#desktopbutton').prop('disabled', true);
          new PNotify({
            title: 'Event',
            text: 'End time should be greater than Start time',
            type: 'warning'
          });

        } else {
          $('#desktopbutton').prop('disabled', false);
        }
      }
    </script>

    <script type="text/javascript">
      $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
      });
    </script>
    <!--====================================== / date comparision ==========================-->

    <!--========================================== Map load ===================================-->
    <script type="text/javascript">
      function myMap() {
        // alert();
        var mapProp = {
          center: new google.maps.LatLng(18.5204, 73.8567),
          zoom: 9,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
      }
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBFb0-DHDTGye9UA7ThexAj2bQxt7E_rQ&callback=myMap"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU&callback=myMap"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
            emp_id: {
              validators: {
                notEmpty: {
                  message: 'Please select employee'
                }
              }
            },
            start_date: {
              validators: {
                notEmpty: {
                  message: 'Please select date'
                }
              }
            },
            imei: {
              validators: {
                notEmpty: {
                  message: 'Please select IMEI '
                }
              }
            }
          }
        });
      });
      $(document).ready(function(e) {
        $("#defaultForm").on('submit', (function(e) {
          //e.preventDefault();
          if (e.isDefaultPrevented()) {
            //alert('invalid');
          } else {
            $("#preview").show();
            document.getElementById("desktopbutton").disabled = true;
            $("#preview").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
            $.ajax({
              type: "POST",
              url: '<?php echo base_url('admin/Tracking/LiveTrackingSchedule') ?>',
              data: $('#defaultForm').serialize(),
              success: function(data) {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
                // alert(data);
                var locations = jQuery.parseJSON(data);
                var a = locations.length;
                if (a <= 0) {
                  $("#preview").hide();
                  $("#displaydata").hide();
                  setTimeout(function() {
                    new PNotify({
                      title: 'Location',
                      text: 'Sorry ! employee tracking detail for the selected date is not available',
                      type: 'warning'
                    });
                  }, 100);
                  myMap();
                } else {
                  $("#displaydata").show();
                  $("#preview").hide();
                  var MapPoints1 = data;
                }
                // alert(MapPoints1);

                var MY_MAPTYPE_ID = 'custom_style';
                var locations = jQuery.parseJSON(MapPoints1);
                window.map = new google.maps.Map(document.getElementById('googleMap'), {
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  scrollwheel: true
                });

                var infowindow = new google.maps.InfoWindow();
                var flightPlanCoordinates = [];
                var bounds = new google.maps.LatLngBounds();
                var labelIndex = 1;
                for (i = 0; i < locations.length; i++) {
                  var end = locations.length - 1;
                  var status = locations[i].address.status;
                  // alert(status);

                  if (status == 'emp') {
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                      map: map,
                      label: {
                        // text: ''+labelIndex+'',
                        color: 'black',
                        fontSize: "10px"
                      },
                      icon: '<?= base_url() ?>assets/img/pin1.png',

                    });
                  } else {
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                      map: map,
                      label: {
                        // text: ''+labelIndex+'',
                        color: 'black',
                        fontSize: "10px"
                      },
                      icon: '<?= base_url() ?>assets/img/passive.png',

                    });
                  }

                  flightPlanCoordinates.push(marker.getPosition());
                  bounds.extend(marker.position);
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      //--------------------------------------------------------- 
                      var lat = locations[i].address.lat;
                      var lng = locations[i].address.lng;
                      var latlng = new google.maps.LatLng(lat, lng);
                      var geocoder = geocoder = new google.maps.Geocoder();
                      geocoder.geocode({
                        'latLng': latlng
                      }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                          if (results[1]) {
                            infowindow.setContent("<b>Location: </b>" + results[1].formatted_address + "<br/>" + locations[i]['title']);
                            infowindow.open(map, marker);
                          }
                        }
                      });
                    }
                  })(marker, i));
                  labelIndex++;
                }
                map.fitBounds(bounds);
                map.setZoom(9);


                // var flightPath = new google.maps.Polyline({
                //     map: map,
                //     path: flightPlanCoordinates,
                //     strokeColor: "#474345",
                //     strokeOpacity: 1,
                //     strokeWeight: 2.2
                // });  
              }
            });
            // ------------------------
          }
          // return false;
          e.preventDefault();
        }));
      });
    </script>
</body>

</html>