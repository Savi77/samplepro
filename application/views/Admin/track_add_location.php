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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">

  <!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
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
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>
  <!-- /theme JS files -->


<style type="text/css">
  
      .daterange-single 
      {
        z-index: 100000;
      }

/*  Display datepicker on modal (popup)  */

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

</style>


  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }
      #DataTables_Table_0_filter
      {
        margin-left: 12px !important;
      }
      #DataTables_Table_0_info
      {
         margin-left: 12px !important;
      }

      #DataTables_Table_0_length
      {
          margin-right: 12px !important;
      }
      #DataTables_Table_0_paginate
      {
          margin-right: 12px !important;
      }
      .btn-info 
       {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
       }
     .nav-tabs.nav-tabs-bottom > li.active > a, .nav-tabs.nav-tabs-bottom > li.active > a:hover, .nav-tabs.nav-tabs-bottom > li.active > a:focus
       {
          border-bottom-width: 1px !important;
          border-color: transparent !important;
          border-bottom-color: #fcfcfc !important;
           background-color: rgba(0, 0, 0, 0.1) !important;

          color: white !important;
      }
     .nav-tabs.nav-tabs-bottom > li.active > a, .nav-tabs.nav-tabs-bottom > li.active 
      {
       background-color: rgba(0, 0, 0, 0.1) !important;
      }
    .nav-tabs > li > a 
     {
        margin-right: 0;
        color: #ddd !important;
     }
     .add_cust
     {
          color: #F45661;
          text-decoration: none;
      }
  </style>
</head>

<body style="overflow-x: hidden;">
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Add Location
        </h4>
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
              <div class="panel panel-flat">
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Location<i class="icon-menu7 position-right"></i></a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="right-icon-tab1">

                                <div class="row">
                                     <div class="col-md-6"> 
                                      <!-- <div class="col s12 m10 l10"> -->
                                            <!-- <div id="map_canvas" style="width:97%;height:500px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #F45661;"></div> -->
                                     <!-- </div> -->

                                            <!-- <div class="col-sm-12" id="align"> -->
                                               <input id="pac-input" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control"  type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;"/>
                                           <!-- </div> -->
                                           <!-- <div class="col-sm-6"> -->
                                              <div class="col-sm-12" id="googleMap" style="width:97%;height:500px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
                                              </div>
                                           <!-- </div> -->

                                     </div>

                                      <div class="col-md-6">  
                                          <div class="col-md-6 pull-right">
                                            <a href="<?php echo base_url('admin/Customer?customer=add') ?>" class="pull-right add_cust" style="margin-top: 69px;">Add Customer</a>
                                          </div>

                                          <form method="post" class="form-horizontal" id="defaultForm" style="margin-top: 15%; padding: 15px;">
                                             <div class="row">
                                                <input type="hidden" id="latitude" name="latitude" value="18.5204" />
                                                <input type="hidden"  id="longitude" name="longitude" value="73.8567" />
                                               
                                                
                                                <div class="col-md-12">   
                                                  <div class="form-group">
                                                      <label class="col-sm-2 control-label">Company Name <span style="color: red;">*</span></label>
                                                        <div class="col-sm-10" id="data_0"> 
                                                            <select class="select-search form-control" name="cust_id" id="cust_id">
                                                                 <span class="caret"></span>
                                                                  <option value="">Select Company</option>
                                                                    <?php   
                                                                      foreach ($customer_list as $value1) 
                                                                      {
                                                                    ?>
                                                                    <option value="<?= $value1->customer_id ?>"><?= $value1->company_name;?> (<?= $value1->contact_person_name1 ?> / <?= $value1->phone_no ?>)</option>
                                                                   <?php } ?> 
                                                            </select>
   
                                                        </div>
                                                  </div>
                                                </div>   
                                                <div class="col-md-12">   
                                                 <div class="form-group">
                                                      <label class="col-sm-2 control-label">Location <span style="color: red;">*</span></label>
                                                      <div class="col-sm-10" id="data_1"> 
                                                          <div class="input-group location">
                                                            <span class="input-group-addon" style="padding: 8px 16px;">
                                                              <i class="fa fa-map-marker" style="zoom:1.2"></i></span>
                                                              <textarea name="location" id="map_address" class="form-control"></textarea>
                                                             
                                                         </div>    
                                                      </div>
                                                  </div>
                                               </div>   
                                               <div class="col-md-12">   
                                                 <div class="form-group">
                                                      <label class="col-sm-2 control-label">City <span style="color: red;">*</span></label>
                                                      <div class="col-sm-10">
                                                          <div class="input-group date">
                                                              <span class="input-group-addon">
                                                                <i class="fa fa-building" style="zoom:1.2"></i></span>
                                                              <input type="text" name="city" id="city" class="form-control" readonly="">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>    
                                                  <br/>
                                                  <div class="form-group">
                                                      <div class="col-sm-12">
                                                          <button class="btn btn-primary pull-right" type="submit" style="padding: 6px 30px; margin-right: 10px;">Submit</button>
                                                           &nbsp;&nbsp; <span id="preview"></span>
                                                      </div>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <!--  <div class="col-sm-12" id="align">
                                                         <input id="pac-input" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control"  type="text" autocomplete="off" />
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <div class="col-sm-12" id="googleMap" style="height:200px;width:100%;">
                                                        </div>
                                                     </div> -->
                                                      <!-- <div class="col-sm-6">
                                                        <div class="form-group">
                                                          <label class="col-lg-2 control-label">Google Map Address :</label>
                                                             <div class="col-lg-10"> -->
                                                                <!-- <textarea name="map_address" id="map_address" class="form-control"></textarea> -->
                                                                <!-- <input type="hidden" class="form-control" id="latitude" name="latitude">
                                                                <input type="hidden" class="form-control" id="longitude" name="longitude"> -->
                                                            <!-- </div>
                                                        </div>

                                                      </div> -->
                                                  </div>
                                          </form>                         
                                         </div>
                                 </div>
                          </div>
                      </div>
                    </div>
                 </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!--========================================== Map load ===================================-->


<script type="text/javascript">
  
  function initialize()
   {
    // alert();
      var markers = [];
      var map = new google.maps.Map(document.getElementById('googleMap'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true
      });
      var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(18.5204, 73.8567),
      new google.maps.LatLng(18.6204, 73.9567));
      map.fitBounds(defaultBounds);
      // Create the search box and link it to the UI element.
      var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      var searchBox = new google.maps.places.SearchBox((input));
      google.maps.event.addListener(searchBox, 'places_changed', function ()
       {
          map.setZoom(15);
          var places = searchBox.getPlaces();
          if (places.length == 0) {
              return;
          }
          for (var i = 0, marker; marker = markers[i]; i++) {
              marker.setMap(null);
          }
          // For each place, get the icon, place name, and location.
          markers = [];
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0, place; place = places[i]; i++) {
              var image = {
                  url: place.icon,
                  size: new google.maps.Size(71, 71),
                  origin: new google.maps.Point(0, 0),
                  anchor: new google.maps.Point(17, 34),
                  scaledSize: new google.maps.Size(25, 25)
              };
              // Create a marker for each place.
              var marker = new google.maps.Marker({
                  map: map,
                  draggable: true,
                  title: place.name,
                  position: place.geometry.location
              });
              markers.push(marker);
              bounds.extend(place.geometry.location);
              google.maps.event.addListener(marker, 'click', function (event)
               {
                  // alert(event.latLng.lat());
                  document.getElementById("latitude").value = event.latLng.lat();
                  document.getElementById("longitude").value = event.latLng.lng();
                  get_city(event.latLng.lat(),event.latLng.lng());
                  var lat =event.latLng.lat();
                  var lng =event.latLng.lng();
                  var latlng = new google.maps.LatLng(lat, lng);
                  var geocoder = geocoder = new google.maps.Geocoder();
                  geocoder.geocode({ 'latLng': latlng }, function (results, status)
                   {
                      if (status == google.maps.GeocoderStatus.OK) {
                          if (results[1])
                          {
                              // alert(results[1].formatted_address);
                             // buildnm =results[1].formatted_address;
                              location_name =results[1].formatted_address;
                              document.getElementById("map_address").value = location_name;
                          }
                      }
                  });
              });
          }
          map.fitBounds(bounds);
      });
     // [END region_getplaces]
      // Bias the SearchBox results towards places that are within the bounds of the
      // current map's viewport.
      google.maps.event.addListener(map, 'bounds_changed', function () {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
      });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>



<!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU"></script> 
    <script type='text/javascript'>//<![CDATA[
        window.onload=function(){
          var map;
          function initialize()
           {
              var myLatlng = new google.maps.LatLng(18.5204, 73.8567);
              var myOptions = {
                  zoom: 12,
                  maxZoom:18,
                  center: myLatlng,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

              var marker = new google.maps.Marker({
                  draggable: true,
                  position: myLatlng,
                  map: map,
                  title: "Your location"
              });

              google.maps.event.addListener(marker, 'dragend', function (event) 
              {
                  document.getElementById("latitude").value = event.latLng.lat();
                  document.getElementById("longitude").value = event.latLng.lng();
                  get_city(event.latLng.lat(),event.latLng.lng());
                  infoWindow.open(map, marker);
              });
          }
          google.maps.event.addDomListener(window, "load", initialize());
        }//]]> 
    </script>  --> 
<script>
function get_city(lat,long)
{
   var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, long);
    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK)
                {
                    if (results[0]) {
                        var add= results[0].formatted_address ;
                        var  value=add.split(",");
                        // alert(add);
                        count=value.length;
                        country=value[count-1];
                        state=value[count-2];
                        city=value[count-3];
                        // alert(city);
                         // document.getElementById('country').value = country;
                         // document.getElementById('location').value = add;
                          document.getElementById('city').value = city;
                         $('#defaultForm').bootstrapValidator('revalidateField', 'city');
                    }
                    else 
                     {
                        alert("address not found");
                    }
            }
             else 
             {
                alert("Geocoder failed due to: " + status);
            }
        }
  );
}
</script>


   <script type="text/javascript">
    $(document).ready(function() 
    {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               location: {
                validators: { 
                      notEmpty: {
                                 message: 'Location is required'
                          }
                        }
                    },
               city: {
                validators: { 
                      notEmpty: {
                                 message: 'Please select location in map'
                          }
                        }
                    },
               client: {
                validators: { 
                      notEmpty: {
                                 message: 'Please enter  client '
                          }
                        }
                    },
              cust_id: {
                validators: { 
                      notEmpty: {
                                 message: 'Please select customer'
                          }
                        }
                    }


              }
          });
      });
  </script>

 <script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#defaultForm").on('submit',(function(e)
           {           
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
               }
              else
              {
                $("#preview").show();
                $("#preview").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $.ajax({
                          url: '<?php echo base_url('admin/Tracking/AddLocation') ?>',
                          type: "POST",
                          data:  $('#defaultForm').serialize(),
                          success: function(response)
                            {
                              // alert(response);
                              $("#preview").hide();
                              $(function(){
                                   new PNotify({
                                                title: 'Location Form',
                                                text: 'Location details has been added successfully',
                                                type: 'success'
                                               });
                                  });

                                    setTimeout(function()
                                   {
                                      window.location="<?php echo base_url('admin/Tracking/add_location');?>";
                                   }, 1000);


                            },
                          error: function()
                          {
                            alert('fail');
                          }
                  });               
              }
         // return false;
           e.preventDefault();
          }));
      });
</script>

<!-- =================================================================================== -->
</body>
</html>
