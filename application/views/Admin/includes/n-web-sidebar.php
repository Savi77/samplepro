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