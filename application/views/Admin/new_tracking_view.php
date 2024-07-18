<?php $this->load->view('Admin/includes/n-header'); ?>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Tracking Report</span></i>

            </div>
            <!-- <div class="row"> -->
                <form method="post" class="form-horizontal " id="defaultForm">
                    <div class="row" style="padding:20px 20px 0 20px;">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Select Resource<span style="color: red;">*</span></label>
                                <select class="select form-control" name="emp_id" id="emp_id" onchange="btndisableremove()" data-placeholder="Select Resource">
                                    <span class="caret"></span>
                                    <option value="">Select Resource</option>
                                    <?php
                                    foreach ($employee_list as $value1) {
                                    ?>
                                        <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" value="<?= date('d F, Y');?>">
                            </div>
                        </div>

                        <div class="col-lg-6 mt-4 text-right">
                            <button type="submit" class="btn btn-primary" id="act_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>


<!-- 
                    <div class="col-lg-12 dflex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Select Employee<span style="color: red;">*</span></label>
                                <select class="select form-control" name="emp_id" id="emp_id" onchange="btndisableremove()" data-placeholder="Select Employee">
                                    <span class="caret"></span>
                                    <option value="">Select Employee</option>
                                    <?php
                                    foreach ($employee_list as $value1) {
                                    ?>
                                        <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date">
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-6 m-auto">
                            <button type="submit" class="btn btn-primary" id="desktopbutton">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div> -->
                    <!-- </div> -->
                </form>
            <!-- </div> -->

            <div class="row">
                <div id="googleMap" class="g-map"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>

<script>
    function mainInfo() {
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

    $(document).ready(function() {
        $("#emp_id").select2();
    });
    $("#start_date").on("dp.change", function(e) {
        $('#defaultForm').bootstrapValidator('revalidateField', 'start_date');
        document.getElementById("desktopbutton").disabled = false;
    });

    function btndisableremove() {
        document.getElementById("desktopbutton").disabled = false;
    }

    function myMap() {
      // alert();
      var mapProp = {
        center: new google.maps.LatLng(18.5204, 73.8567),
        zoom: 9,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }

    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Resource'
                        }
                    }
                },
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Date'
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
                // document.getElementById("desktopbutton").disabled = true;
                $("#preview").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('admin/tracking/Viewdata_admin') ?>',
                    data: $('#defaultForm').serialize(),
                    success: function(data) {
                        PNotify.removeAll();
                        // document.getElementById("desktopbutton").disabled = false;
                        // alert(data);
                        var locations = jQuery.parseJSON(data);
                        var a = locations.length;
                        if (a <= 0) {
                            $("#preview").hide();
                            $("#displaydata").hide();
                            // setTimeout(function() {
                            //     new PNotify({
                            //         title: 'Location',
                            //         text: 'Sorry ! employee tracking detail for the selected date is not available',
                            //         type: 'warning'
                            //     });
                            // }, 100);
                            $('#emptrackingnotavailabe').modal('show');
                            myMap();
                            $("#act_sub_btn").attr('disabled', false);
                        } else {
                            $("#displaydata").show();
                            $("#preview").hide();
                            var MapPoints1 = data;
                            $("#act_sub_btn").attr('disabled', false);
                        }
                        // var MapPoints1='[{"address":{"address":"09:56","lat":"27.910415","lng":"81.739977"},"title":"911441300715525"},{"address":{"address":"09:58","lat":"27.910415","lng":"81.739977"},"title":"911441300715525"},{"address":{"address":"10:00","lat":"27.910415","lng":"81.739977"},"title":"911441300715525"},{"address":{"address":"10:02","lat":"27.910468","lng":"81.740142"},"title":"911441300715525"},{"address":{"address":"10:04","lat":"27.910458","lng":"81.740193"},"title":"911441300715525"},{"address":{"address":"10:06","lat":"27.910515","lng":"81.741302"},"title":"911441300715525"},{"address":{"address":"10:08","lat":"27.90927","lng":"81.741487"},"title":"911441300715525"},{"address":{"address":"10:10","lat":"27.90724","lng":"81.741593"},"title":"911441300715525"},{"address":{"address":"10:12","lat":"27.905045","lng":"81.741647"},"title":"911441300715525"},{"address":{"address":"10:14","lat":"27.904298","lng":"81.743"},"title":"911441300715525"}]';
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
                // ------------------------
            }
            // return false;
            e.preventDefault();
        }));
    });
</script>
<script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU&callback=myMap"></script>

<div class="modal fade" id="emptrackingnotavailabe" tabindex="-1" aria-labelledby="emptrackingnotavailabeLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="emptrackingnotavailabeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Sorry ! Selected Resource Tracking Detail For The Selected Date is not available</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking'); ?>">
                    <button type="button"  data-dismiss = "modal" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>