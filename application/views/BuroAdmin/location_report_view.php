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

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


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
        margin: 5px 9px;
        margin-left: -15px;
      }
    .datatable-header > div:first-child, .datatable-footer > div:first-child 
    {
        margin-left: 9px !important;
        left: -13px !important;
    }

    input, button, select, textarea 
    {
        height: 30px !important;
    }
      .btn-info 
      {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
      }
      .nav-tabs > li > a 
     {
        margin-right: 0;
        color: #ddd !important;
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
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Location Report
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
            <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Location Report<i class="icon-menu7 position-right"></i></a></li>
                 
                  </ul>
                  <br>
                    <div class="ibox-content" style="background-color: white;">
                      <form method="post" class="form-horizontal" id="defaultForm">
                          <div class="row">
                            <!-- <div class="col-md-10 col-md-offset-1"> -->
                                 <div class="col-md-6">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Start Date<span style="color: red;">*</span></label>
                                          <div class="col-sm-10" id="data_1">
                                              <div class="input-group date">
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date">
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">End Date<span style="color: red;">*</span></label>
                                          <div class="col-sm-10" id="data_1">
                                              <div class="input-group date">
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date">
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div> 
                                   <div class="col-md-4">   
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Employee Name<span style="color: red;">*</span></label>
                                            <div class="col-sm-10" id="data_0"> 
                                                <select class="select-search form-control" name="emp_id" id="emp_id" onchange="btndisableremove()">
                                                 <span class="caret"></span>
                                                  <option value="">Employee Customer</option>
                                                    <?php   
                                                      foreach ($employeelist as $value1) 
                                                      {
                                                    ?>
                                                    <option value="<?= $value1->id ?>"><?= $value1->name;?></option>
                                                   <?php } ?> 
                                            </select>

                                            </div>
                                      </div>
                                   </div>   
                                  <div class="col-md-1">  
                                        <button class="btn btn-primary" type="submit" id="desktopbutton" style="padding: 6px 30px;">Submit</button>
                                             &nbsp;&nbsp; <span id="loader_gif"></span>
                                  </div>
                             <!-- </div>  -->
                         </div>     
                      </form>
                      <!-- <hr/> -->
                  </div>
                  <div id="range_data"></div>
                <!--  <div class="ibox-content">
                     <div class="table-responsive">
                        <table id="example1" class="table">
                            <thead>
                              <tr>
                                  <th>Sr. No.</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Address</th>
                              </tr>
                            </thead>
                            <tbody class="myTable">
                                  <tr>
                                  </tr>
                            </tbody>
                          </table>
                      </div>
                  </div>  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
 $("#start_date").on("dp.change", function (e) 
  {
    // alert();
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
     
    if (startDate!='') 
    {
         
           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
             PNotify.removeAll();    
            document.getElementById("desktopbutton").disabled = false;
          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {
            PNotify.removeAll();
              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });

          }
          else
          {
              PNotify.removeAll();
              document.getElementById("desktopbutton").disabled = false;
          }  
    }
  });

  $("#end_date").on("dp.change", function (e) 
  {
    // alert();
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
     
    if (startDate!='') 
    {
         
           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
              PNotify.removeAll();
            document.getElementById("desktopbutton").disabled = false;
          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {
              PNotify.removeAll();
              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });

          }
          else
          {
              PNotify.removeAll();
              document.getElementById("desktopbutton").disabled = false;
          }  
    }
  });

</script>
<!--========================== Date picker javascript ====================================-->
      <script type="text/javascript">
          $(function () 
          {
              $('#start_date').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
              $('#end_date').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
          });
      </script>
       <script type="text/javascript">
         $("#start_date").on("dp.change", function (e) 
        {
              $('#defaultForm').bootstrapValidator('revalidateField', 'start_date'); 
          });

        $("#end_date").on("dp.change", function (e) 
        {
              $('#defaultForm').bootstrapValidator('revalidateField', 'end_date'); 
          });
      </script>
       <script type="text/javascript">
        // $("#start_date").on("dp.change", function (e) 
        // {
        //       document.getElementById("desktopbutton").disabled = false;  
        // });
        //  $("#end_date").on("dp.change", function (e) 
        // {
        //       document.getElementById("desktopbutton").disabled = false;  
        // });
        function btndisableremove()
        {


            var startDate = document.getElementById("start_date").value;
            var endDate = document.getElementById("end_date").value;
             
            if (startDate!='') 
            {
                 
                   if ((Date.parse(startDate) == Date.parse(endDate))) 
                  {
                      PNotify.removeAll();
                      document.getElementById("desktopbutton").disabled = false;  
                  }
                  else if ((Date.parse(startDate) > Date.parse(endDate))) 
                  {
                       PNotify.removeAll();
                      $('#desktopbutton').prop('disabled', true);
                      new PNotify({
                                     title: 'Event',
                                     text: 'End date should be greater than Start date',
                                     type: 'warning'
                                  });

                  }
                  else
                  {
                      PNotify.removeAll();
                      document.getElementById("desktopbutton").disabled = false;  
                  }  
            }
            
        }
      </script>
<!--========================== / Date picker javascript ====================================-->
 <script type="text/javascript">
    $(document).ready(function() 
    {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               from_date: {
                validators: {
                      notEmpty: {
                                 message: 'Customer is required'
                     }
                        }
                    },
               start_date: {
                validators: {
                      notEmpty: {
                                 message: 'Start Date is required'
                     }
                        }
                    },

               end_date: {
                validators: {
                      notEmpty: {
                                 message: 'End Date is required'
                     }
                        }
                    },
                 emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Employee '
                        }
                    }
                }
            }
        });
    });
</script>

 <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU&sensor=false"></script>
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
                // alert();
                $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" alt="Uploading...." /> ');
                document.getElementById("desktopbutton").disabled = true;
                 $.ajax({
                          type: "POST",
                          url: '<?php echo base_url('admin/Tracking/daterange_location') ?>',
                          data: $('#defaultForm').serialize(),
                          success: function(data)
                          {
                              // alert(data);
                              document.getElementById("desktopbutton").disabled = false;
                              $("#loader_gif").hide();
                              // var jsonData = JSON.parse(data);
                              // // alert(jsonData.length);
                              // // alert(jsonData.time.length);
                              // // $("#range_data").html(data);
                              // $(".myTable tr").remove();
                              // var tr=[];
                              // var count = 1;


                              // function latlong(lat,lng)
                              // {
                              //       var location_name1 = '';
                              //       var latlng = new google.maps.LatLng(lat, lng);
                              //       var geocoder = new google.maps.Geocoder({ 'latLng': latlng });
                              //       // alert(geocoder.formatted_address;);
                              //       geocoder.geocode({ 'latLng': latlng }, function (results, status)
                              //       {
                              //           // return lat;
                              //           if (status == google.maps.GeocoderStatus.OK) 
                              //           {
                              //             // return 1;
                              //               if (results[1])
                              //               {
                              //                   var location_name;
                              //                   location_name = results[1].formatted_address;
                              //                   // return location_name;
                              //                   location_name1 = location_name1+'test';
                              //                   // return location_name1;
                              //                   // res = location_name;
                              //                   // alert(location_name);
                              //                   // location_name1 = location_name;
                              //               }
                              //           }
                              //       });
                              //       // alert(location_name);
                              //       return location_name1;
                              //       // alert(location_name);
                                    
                              // }
                              // // var location_name1='';
                              // for (var i = 0; i < jsonData.length; i++) 
                              // {
                              //       var loc_details = jsonData[i];
                              //       var latitude = loc_details.latitude;
                              //       // alert(latitude);
                              //       var longitude = loc_details.longitude;

                              //       var lat =latitude;
                              //       var lng =longitude;
                              //       // var ss=latlong(lat,lng);
                              //       var address1 = latlong(lat,lng);
                              //       alert(address1);



                              //       tr.push('<tr>');
                              //       tr.push("<td>" + count + "</td>");
                              //       tr.push("<td>" + loc_details.date + "</td>");
                              //       tr.push("<td>" + loc_details.time + "</td>");
                              //       tr.push("<td>" + address1 + "</td>");
                              //       // tr.push("<td " + loc_details.longitude + "</td>");
                              //       tr.push('</tr>');


                              //    count ++;            
                              // }
                              // $('table').append($(tr.join('')));   
                              $("#range_data").html(data);
                              $("#example1").DataTable({
                                  responsive:true
                              });
                              $("#preview").hide();
                              $("#all_data").hide();                             
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
