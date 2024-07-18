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
  </style>


</head>

<body style="overflow-x: hidden;" onload="event_detail()">

<?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Location Details
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
              <div class="panel panel-flat" >
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Location Details<i class="icon-menu7 position-right"></i></a></li>
                        </ul>
                        <div class="tab-content" style="padding: 11px;">
                          <div class="tab-pane active" id="right-icon-tab1">

                                <div class="row">
                                     <div class="col-md-6"> 
                                          <div class="panel panel-info" >
                                              <div class="panel-heading" style="background-color:#636363; border: #636363">
                                                Locations
                                              </div>
                                                <div class="panel-body" style="padding: 0px 0px;">
                                                   <div id="map" style="width:100%;height:450px;"></div>
                                                </div>
                                            </div>
                                     </div>
                                      <div class="col-md-6">  
                                           <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead >
                                                    <tr style="background-color: #ececec;">
                                                        <th style="text-align: center;">Sr. No.</th>
                                                        <th style="text-align: center;">Client</th>
                                                        <th style="text-align: center;">Location</th>
                                                        <th style="text-align: center;">Delete</th>
                                                    </tr>
                                                    </thead>
                                                        <tbody> 
                                                           <?php
                                                          $i=1;
                                                          foreach ($viewlocation as $location) 
                                                            {
                                                           ?> 
                                                            <tr class="gradeA">
                                                                <td style="text-align: center;"><?=  $i; ?></td>
                                                                <td><?=  $location['company_name']; ?></td>
                                                                <td><?=  $location['location']; ?></td>
                                                                <td style="text-align: center;">
                                                                   <a class="btn btn-danger btn-circle" type="button" onclick="delete_location(this.id)" id="<?= $location['selected_areaid']?>" title="Delete Location">
                                                                      <i class="fa fa-trash"></i>
                                                                   </a>
                                                                </td>
                                                            </tr> 
                                                            <?php $i++;} ?>  
                                                        </tbody>
                                                    </table>
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
</div>

<!--========================================== Map load ===================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU"></script>
  <script>
      function myMap() 
      {
      var mapProp= {
          center:new google.maps.LatLng(18.5204,73.8567),
          zoom:10,
      };
      var map=new google.maps.Map(document.getElementById("map"),mapProp);
          }
      google.maps.event.addDomListener(window, 'load', initialize);

  </script>


<script type="text/javascript">

function event_detail()
{
   // alert('call');
        $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Tracking/get_location_detail'); ?>",
        success: function(data)
        {
         var locations = jQuery.parseJSON(data);
          var MapPoints1=data;
                              // var MapPoints1='[{"address":{"status":"DCB Bank","lat":"18.477219509208552","lng":"73.89519506378178"},"title":"DCB Bank"}]';

                              var MY_MAPTYPE_ID = 'custom_style';                            
                              var locations = jQuery.parseJSON(MapPoints1);
                              window.map = new google.maps.Map(document.getElementById('map'), {
                                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                                  scrollwheel: true
                              });
                          
                              var infowindow = new google.maps.InfoWindow();
                              var flightPlanCoordinates = [];
                              var bounds = new google.maps.LatLngBounds();
                             
                              var labelIndex = 1;
                              // var markerindex=1;
                              for (i = 0; i < locations.length; i++)
                               {
                                  var end=locations.length-1;
                                  var status=locations[i].address.status;

                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                                        map: map,
                                        label: ''+labelIndex+''
                                    });


                                  flightPlanCoordinates.push(marker.getPosition());
                                  bounds.extend(marker.position);
                                  google.maps.event.addListener(marker, 'click', (function (marker, i)
                                   {
                                      return function ()
                                       {
                                            //--------------------------------------------------------- 
                                                var lat =locations[i].address.lat;
                                                var lng = locations[i].address.lng;

                                                // alert(lat);
                                                 // alert(lng);


                                                var latlng = new google.maps.LatLng(lat, lng);
                                                var geocoder = geocoder = new google.maps.Geocoder();
                                                geocoder.geocode({ 'latLng': latlng }, function (results, status) 
                                                {
                                                    if (status == google.maps.GeocoderStatus.OK) 
                                                    {
                                                        if (results[1])
                                                         {
                                                            infowindow.setContent("<b>Location: </b>"+"<br/><p style='max-width:200px !important;'>"+locations[i]['title']+"</p>");
                                                            infowindow.open(map, marker);
                                                          }
                                                    }
                                                });
                                          }
                                      })(marker, i));
                                   labelIndex++;
                                  }
                                  map.fitBounds(bounds);
                                  map.setZoom(5);
                                  var flightPath = new google.maps.Polyline({
                                      map: map,
                                      path: flightPlanCoordinates,
                                      strokeColor: "#474345",
                                      strokeOpacity: 1,
                                      strokeWeight: 2.2
                                  });  




         },

        error: function(){      
         alert('Error while request..');
        }
       });
}

</script>

<script type="text/javascript">
  
      // Confirm
 function delete_location(del_id)
 {
        // alert(del_id);
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this location?</p>',
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
          
              var datastring='del_id='+del_id;
                // alert(datastring);
              $.ajax({
              url: '<?php echo base_url('admin/Tracking/DeleteLocation') ?>',
              type: "POST",
              data:  datastring,
              success: function(data)
                {
                 // alert(data); 
                       new PNotify({
                                   title: 'Delete Location',
                                   text: 'Location has been deleted successfully',
                                   type: 'success'
                          });
                    setTimeout(function()
                           {
                               window.location="<?php echo base_url('admin/Tracking/ViewLocation') ?>";
                           }, 1500);

                },
              error: function()
              {
               // alert('fail');
                  
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

<!-- =================================================================================== -->
</body>
</html>
