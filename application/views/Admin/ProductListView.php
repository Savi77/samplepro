<!DOCTYPE html>
<html lang="en">
<head>
  <?php
$this->load->view('Admin/includes/header');
?>
 <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  <!-- Core JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <!-- Theme JS files -->
  
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/tasks_list.js"></script>

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_extension_fixed_columns.js"></script>
  <!-- /theme JS files -->

  <style type="text/css">
    


  </style>

  <!-- /theme JS files -->
</head>

<body class="sidebar-xs">

  <!-- Main navbar -->
    <?php
$this->load->view('Admin/includes/admin_header');
?>
 <!-- /main navbar -->

  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
         <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Schedule List</span></h4>
      </div>
      <div class="heading-elements">
        <a href="#" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-task"></i></b> Create Schedule</a>
      </div>
    </div>
  </div>
  <!-- /page header -->


  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main sidebar -->
       <?php
$this->load->view('Admin/includes/sidebar');
?>
     <!-- /main sidebar -->


      <!-- Secondary sidebar -->
      <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content">
         <!-- Action buttons -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>Action buttons</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row">
                <div class="col-xs-6">
                  <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-git-branch"></i> <span>Branch</span></button>
                  <button class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-mail-read"></i> <span>Messages</span></button>
                </div>
                
                <div class="col-xs-6">
                  <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Statistics</span></button>
                  <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Users</span></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /action buttons -->
        </div>
      </div>
      <!-- /secondary sidebar -->

      <!-- Main content -->
      <div class="content-wrapper">
        <div class="panel panel-white">

          <table class="table datatable-fixed-left" width="100%">
            <thead>
              <tr>
                <th>#</th>
               </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="card card-body">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                      <div class="mr-lg-3 mb-3 mb-lg-0">
                        <a href="../../../../global_assets/images/demo/products/2.jpeg" data-popup="lightbox">
                          <img src="../../../../global_assets/images/demo/products/2.jpeg" width="96" alt="">
                        </a>
                      </div>

                      <div class="media-body">
                        <h6 class="media-title font-weight-semibold">
                          <a href="#">Mystery Air Long Sleeve T Shirt</a>
                        </h6>

                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                          <li class="list-inline-item"><a href="#" class="text-muted">Fashion</a></li>
                          <li class="list-inline-item"><a href="#" class="text-muted">Long sleeve shirts</a></li>
                        </ul>

                        <p class="mb-3">Conveying or northward offending admitting perfectly my. Colonel gravity get thought fat smiling add but. Wonder twenty hunted and put income set desire expect. Am cottage calling my is mistake cousins talking up. Interested especially do impression he unpleasant excellence...</p>

                        <ul class="list-inline list-inline-dotted mb-0">
                          <li class="list-inline-item">All items from <a href="#">Burton</a></li>
                          <li class="list-inline-item">Add to <a href="#">wishlist</a></li>
                        </ul>
                      </div>

                      <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                        <h3 class="mb-0 font-weight-semibold">$25.99</h3>

                        <div>
                          <i class="icon-star-full2 font-size-base text-warning-300"></i>
                          <i class="icon-star-full2 font-size-base text-warning-300"></i>
                          <i class="icon-star-full2 font-size-base text-warning-300"></i>
                          <i class="icon-star-full2 font-size-base text-warning-300"></i>
                          <i class="icon-star-half font-size-base text-warning-300"></i>
                        </div>

                        <div class="text-muted">34 reviews</div>

                        <button type="button" class="btn bg-teal-400 mt-3"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                      </div>
                    </div>
                    </div>
                </td>
              </tr>

            </tbody>
          </table>






        </div>
        <!-- /task manager table -->
     </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->

    <!-- Footer -->
      <?php
            $this->load->view('Admin/includes/AdminFooter.php');
      ?>
   <!-- /footer -->

  </div>
  <!-- /page container -->

</body>
</html>