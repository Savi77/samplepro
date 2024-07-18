<?php
	$menu = $sidebar['menu'];
	$plan_id = $this->session->plan_id;
	$module_ids = $this->session->module_ids;
	$module_ids_array = explode(",", $module_ids);
?>
<div class="sidebar-section">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">Main Menu</div>
            <i class="icon-menu" title="Main"></i>
        </li>

        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Dashboard/view_dashboard" <?php if ($menu == 'dashboard') { ?> class="nav-link active" <?php   }else{ ?> class="nav-link" <?php } ?> > <img src="<?= base_url() ?>new-assets/assets/Images/home.png" alt="home"> <span> Dashboard </span> </a> 
        </li>
        <!-- <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/dashboard/CompanySetting" <?php if ($menu == 'ViewProfile') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/company-settings.svg"> <span>Company Settings</span> </a> 
        </li> -->
        <?php
            if ($menu == 'Profile Setting') 
            {
                $list_open = 'nav-item-open';
                $ul_list = 'style="display: block;"';
                $profile_setting_css = 'nav-link active';
            }
            elseif($menu == 'Configuration Setting')
            {
                $list_open = 'nav-item-open';
                $ul_list = 'style="display: block;"';
                $configuration_setting_css = 'nav-link active';
            }
            else
            {
                $list_open = '';
                $ul_list = 'style="display: none;"';
                $configuration_setting_css = 'nav-link';
                $profile_setting_css = '';
            }
        ?>
        <li class="nav-item nav-item-submenu <?= $list_open ?>"> <a href="#" class="<?= $configuration_setting_css ?> <?= $profile_setting_css ?>"> <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/company-settings.svg"> <span>Company Setting</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Navbars" <?= $ul_list ?> >
                <li class="nav-item"> 
                    <a href="<?= base_url() ?>admin/Dashboard/profile_setting" <?php if ($menu == 'Profile Setting') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> >Profile Setting</a> 
                </li>
                <li class="nav-item"> 
                    <a href="<?php echo base_url('admin/Dashboard/configuration_setting'); ?>" <?php if ($menu == 'Configuration Setting') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> >Configuration Setting</a>
                </li>
            </ul>
        </li>
        
        <!-- /page kits -->
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/dashboard/UserManagement" <?php if ($menu == 'UserManagement') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/usermanagement.svg"> <span>User Management</span></a>
        </li>
        <!-- /main -->

        <!-- Forms -->
        
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Master/View_master" <?php if ($menu == 'Master') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/Masters.svg"> <span>Masters</span></a> 
        </li>
        <li class="nav-item"> <a href="<?= base_url() ?>admin/ProductSpecification/Product" <?php if ($menu == 'ProductManagement') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/product-management.svg"> <span>Product Management</span></a> </li>
        <li class="nav-item"> <a href="#" class="nav-link"> <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/product-management.svg"> <span>Project Management</span></a> </li>
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Customer" <?php if ($menu == 'cust') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/contact_management.svg"> <span>Contact Management</span></a> 
        </li>
        <!-- /forms -->
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Leads/leads_opportunity" <?php if ($menu == 'lead_opp') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/crm.svg"> <span>CRM</span></a> 
        </li>
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Expense/UserExpense" <?php if ($menu == 'UserExpense') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/expences.svg"> <span>Expenses</span></a> 
        </li>
        <li class="nav-item"> <a href="<?= base_url() ?>admin/ScheduleManagement/GridList" <?php if ($menu == 'issue') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/activities.svg"> <span>Task</span></a> </li>
        <li class="nav-item"> <a href="<?= base_url() ?>admin/ScheduleManagement/view_trash_activities" <?php if ($menu == 'view_trash_activities') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/trash-activities-icon (2).svg"> <span>Trash Task</span></a> </li>
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Ecommerce" <?php if ($menu == 'Ecommerce') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/ecommerce-icon.svg"> <span>E-Commerce</span></a> 
        </li>
        <li class="nav-item"> <a href="<?= base_url() ?>admin/Tracking/view_tracking" <?php if ($menu == 'Tracking') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/tracking.svg"> <span>Tracking</span></a> </li>
        <!-- /components -->

        <!-- Layout -->

        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/ReportAdmin/Reports/ReportViewCard" <?php if ($menu == 'Reports') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/reports.svg"> <span>Reports</span></a> 
        </li>
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Utility" <?php if ($menu == 'Utility') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/utility-icon.png"> <span>Utility</span></a> 
        </li>
        <li class="nav-item"> 
            <a href="<?= base_url() ?>admin/Reminder" <?php if ($menu == 'Reminder') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> > <img src="<?= base_url() ?>new-assets/assets/Images/reminder.png" alt="reminder"> <span>Reminder</span></a> 
        </li>
        <?php
            if ($menu == 'BulkEmail') {
                $list_open = 'nav-item-open';
                $ul_list = 'style="display: block;"';
                $bulk_cl_css = 'nav-link active';
            }elseif($menu == 'Compose'){
                $list_open = 'nav-item-open';
                $ul_list = 'style="display: block;"';
                $com_cl_css = 'nav-link active';
            }else{
                $list_open = '';
                $ul_list = 'style="display: none;"';
                $com_cl_css = 'nav-link';
                $bulk_cl_css = '';
            }
        ?>
        <li class="nav-item nav-item-submenu <?= $list_open ?>"> <a href="#" class="<?= $com_cl_css ?> <?= $bulk_cl_css ?>"> <img class="dashboars-image-icon" src="<?= base_url() ?>new-assets/assets/Images/email.svg"> <span>Emails</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Navbars" <?= $ul_list ?> >
                <li class="nav-item"> 
                    <a href="<?= base_url() ?>admin/ReportAdmin/Reports/BulkEmail" <?php if ($menu == 'BulkEmail') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> >Bulk Email</a> 
                </li>
                <li class="nav-item"> 
                    <a href="<?php echo base_url('admin/ReportAdmin/Reports/mail_write?id=compose'); ?>" <?php if ($menu == 'Compose') { ?> class="nav-link active" <?php  }else{   ?> class="nav-link" <?php  } ?> >Compose</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> 
            <a href="#" class="nav-link"> <img class="copyright" src="<?= base_url() ?>new-assets/assets/Images/copyright.png"> <span cl;ass="back-text"><?= date('Y'); ?> Buro Force</span></a> 
        </li>

    </ul>
</div>