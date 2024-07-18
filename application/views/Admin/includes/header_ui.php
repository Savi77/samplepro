<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Buro Force </title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/assets/img/fevicon icon.png" />
    <link href="<?= base_url() ?>assets/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>assets/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url() ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url() ?>assets/assets/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="<?= base_url() ?>assets/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/assets/css/structure.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/assets/plugins/highlight/styles/monokai-sublime.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top main-header">
        <header class="header navbar navbar-expand-sm">
            <div class="col-xl-2 col-lg-2 col-md-2">
                <ul class="navbar-item theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo header-logo">
                        <a href="index.html">
                            <img src="<?= base_url() ?>assets/assets/img/header-logo.png" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                <ul class="navbar-item flex-row ml-md-0 ml-auto search">
                    <li class="nav-item align-self-center search-animated">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <form class="form-inline search-full form-inline search" role="search">
                            <div class="search-bar">
                                <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <ul class="top-section-para">
                    <p> Good Evening Sameer Deokar</p>
            </div>
            </ul>

            <ul class="navbar-item flex-row ml-md-auto mobile-view">
                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                    <div class="">
                    </div>
                </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="#" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="<?= base_url() ?>assets/assets/img/avtara.png" alt="avatar"><span class="avatara-para">Sameer Deokar</span>
                    </a>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#" data-active="false" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="main-menu">
                                <span>Main Menu</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                    <li class="menu">
                        <a href="index.php" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    <li class="menu">
                        <a href="company-Settings.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/Company_setting_icon.png">
                                <span>Company Settings</span>
                            </div>
                            <div>
                            </div>
                        </a>
                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/user_management_icon.png">
                                <span>User Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>
                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/masters.png">
                                <span>Masters</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>

                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/product_management_icon.png">
                                <span>Product Managment</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/product_management_icon.png">
                                <span>Project Management</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/Contact_management_icon.png">
                                <span>Contact Management</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/CRM_icon.png">
                                <span>CRM</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>


                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/expences_icon.png">
                                <span>Expences</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>


                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/Activities_icon.png">
                                <span>Activities</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>
                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/trash-activities-icon.png">
                                <span>View Trash Activities</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>

                    <li class="menu">
                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/ecommerce-icon.png">
                                <span>Ecommerce</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"></svg>
                            </div>
                        </a>

                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/tracking-icon.png">
                                <span>Tracking</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/reports-icon.png">
                                <span>Reports</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/emails-icon.png">
                                <span>Emails</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
                            <li>
                                <a href="#"> Helpdesk </a>
                            </li>
                            <li>
                                <a href="#"> Contact Form </a>
                            </li>
                            <li>
                                <a href="#"> FAQ </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    </li>
                    <li class="menu">
                        <a href="#" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img class="side-icon" src="<?= base_url() ?>assets/assets/img/copyright.png">
                                <span class="buro-force">22 Buro Force </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row">
                    <div class="sub-header-container">
                        <div class="col-xl-6 col-lg-6 col-md-1 col-sm-1">
                            <header class="header navbar navbar-expand-sm">
                                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg class="dashboard" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></a>

                                <div class="page-header">
                                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a class="dashboard" href="javascript:void(0);">Dashboard</a></li>
                                            <!-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> -->
                                        </ol>
                                    </nav>
                                </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-11 col-sm-11">
                            <ul class="navbar-nav flex-row ml-auto info ">
                                <li class="nav-item more-dropdown">
                                    <div class="navbar-bottom">
                                        <h6 class="sub-header-text">Date:01 April,2021-31March,2022</h6>
                                    </div>
                                    <div class="images-header">
                                        <figure class="sub-header-icon">
                                            <a href="#"><img class="header-img calender" src="<?= base_url() ?>assets/assets/img/documents-icon.png"></a>
                                            <figcaption>
                                                Documents
                                            </figcaption>
                                        </figure>
                                        <figure class="sub-header-icon">
                                            <a href="#"><img class="header-img documents" src="<?= base_url() ?>assets/assets/img/calender-icon.png"></a>
                                            <figcaption>
                                                Calender
                                            </figcaption>
                                        </figure>
                                        <figure class="sub-header-icon">
                                            <a href="#"><img class="header-img notes" src="<?= base_url() ?>assets/assets/img/notes-icon.png"></a>
                                            <figcaption>
                                                Notes
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </header>
                    </div>