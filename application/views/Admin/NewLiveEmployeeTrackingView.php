<?php $this->load->view('Admin/includes/n-header'); ?>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Resource Live Location</span></i>

            </div>

            <div class="row">
                <div id="googleMap" class="g-map"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>
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
                    // setTimeout(function() {
                    //     new PNotify({
                    //         title: 'Location',
                    //         text: 'Sorry ! employee live location not available',
                    //         type: 'warning'
                    //     });
                    // }, 100);
                    $('#emptrackingnotavailabe').modal('show');
                    $("#displaydata").show();
                    $("#preview").hide();
                    var MapPoints1 = data;

                } else {
                    $("#displaydata").show();
                    $("#preview").hide();
                    var MapPoints1 = data;
                }
            //     var locations = jQuery.parseJSON(MapPoints1);
            //     var MapPoints1 = data;
            //     var map = new google.maps.Map(document.getElementById('googleMap'), {
            //         zoom: 12,
            //         // center: new google.maps.LatLng(-33.92, 151.25),
            //         center: new google.maps.LatLng(22.803444, 86.179525),
            //         mapTypeId: google.maps.MapTypeId.ROADMAP
            //     });
            //     var marker, i;
            //     // var =;

            //     var mapmarker = ["pink-dot.png", "yellow-dot.png", "purple-dot.png", "red-dot.png", "green-dot.png", "red-dot.png", "purple-dot.png", "yellow-dot.png", "pink-dot.png"];

            //     for (i = 0; i < locations.length; i++) {
            //         var infowindow = new google.maps.InfoWindow();
            //         marker = new google.maps.Marker({
            //             position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
            //             map: map,
            //             icon: {
            //                 url: "http://maps.google.com/mapfiles/ms/icons/" + mapmarker[i]
            //             }


            //         });

            //         infowindow.setContent(locations[i].title_details);
            //         infowindow.open(map, marker);
            //     }

            // }
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
                    if (i == 0) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                            map: map,
                            label: {
                                // text: ''+labelIndex+'',
                                color: 'black',
                                fontSize: "10px"
                            },
                            icon: '<?= base_url() ?>assets/img/start.png',


                        });
                    } else if (i == end) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                            map: map,
                            label: {
                                // text: ''+labelIndex+'',
                                color: 'black',
                                fontSize: "12px"
                            },
                            icon: '<?= base_url() ?>assets/img/end.png'
                        });
                    } else {
                        if (status == 'gps') {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                                map: map,
                                label: {
                                    // text: ''+labelIndex+'',
                                    color: 'black',
                                    fontSize: "12px"
                                },
                                icon: '<?= base_url() ?>assets/img/gps.png'
                            });
                        } else if (status == 'network') {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                                map: map,
                                label: {
                                    // text: ''+labelIndex+'',
                                    color: 'black',
                                    fontSize: "12px"
                                },
                                icon: '<?= base_url() ?>assets/img/network.png'
                            });
                        } else //passive
                        {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i].address.lat, locations[i].address.lng),
                                map: map,
                                label: {
                                    // text: ''+labelIndex+'',
                                    color: 'black',
                                    fontSize: "12px"
                                },
                                icon: '<?= base_url() ?>assets/img/passive.png'
                            });
                        }
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
                var flightPath = new google.maps.Polyline({
                    map: map,
                    path: flightPlanCoordinates,
                    strokeColor: "#474345",
                    strokeOpacity: 1,
                    strokeWeight: 2.2
                });
            }
        });
    }
</script>

<div class="modal fade" id="emptrackingnotavailabe" tabindex="-1" aria-labelledby="emptrackingnotavailabeLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="emptrackingnotavailabeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Unfortunately, The tracking information for the selected resource on the specified date is unavailable at this time.</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking'); ?>">
                    <button type="button"  data-dismiss = "modal" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>