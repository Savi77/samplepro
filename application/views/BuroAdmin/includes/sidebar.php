<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

	.navigation>li ul li a {
		padding-left: 20px !important;
	}
</style>

<?php
$menu = $sidebar['menu'];
?>

<div class="sidebar sidebar-main sidebar-default">
	<div class="sidebar-content">
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-title h6">
				<span>Main navigation</span>
				<ul class="icons-list">
					<li><a href="#" data-action="collapse"></a></li>
				</ul>
			</div>
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<li <?php if ($menu == 'dashboard') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/dashboard/view_dashboard'); ?>"><i class="icon-home7"></i> <span>Dashboard</span></a></li>
					<li <?php if ($menu == 'Set_Trial_Days') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('Home/SetTrialDays'); ?>"><i class="fa fa-cog"></i> <span>Set Trial Days</span></a></li>
					<li>
						<a href="#"><i class="icon-task"></i> <span>Buroforce Website</span></a>
						<ul>
							<li <?php if ($menu == 'LoginDetails') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/LoginDetails'); ?>"><i class="icon-lock"></i> <span>Login Screen Details</span></a></li>
							<li <?php if ($menu == 'client') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Client'); ?>"><i class="icon-users4"></i> <span>Client</span></a></li>
							<li <?php if ($menu == 'contactus') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/ContactUs'); ?>"><i class="icon-phone"></i> <span>Contact</span></a></li>
							<li <?php if ($menu == 'contact_detail') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/ContactUs/ContactDetail'); ?>"><i class="icon-phone"></i> <span>Contact Us</span></a></li>
							<li <?php if ($menu == 'faq') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Faq'); ?>"><i class="icon-question3"></i> <span>FAQ</span></a></li>
							<li <?php if ($menu == 'Case_Studies') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Case_Studies'); ?>"><i class="icon-mirror"></i> <span>Case Studies</span></a></li>
							<li <?php if ($menu == 'Creative_Features') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Creative_Features'); ?>"><i class="icon-mirror"></i> <span>Creative Features</span></a></li>
							<li <?php if ($menu == 'Service_Feature') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Service_Feature'); ?>"><i class="icon-briefcase"></i> <span>Service Features</span></a></li>
							<li <?php if ($menu == 'AboutUs') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/AboutUs'); ?>"><i class="icon-image3"></i> <span>About Us</span></a></li>
							<!-- <li <?php if ($menu == 'm_feature') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Many_feature'); ?>"><i class="icon-briefcase"></i> <span>Many Features</span></a></li> -->
							<li <?php if ($menu == 'slider') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Slider'); ?>"><i class="icon-image3"></i> <span>Slider</span></a></li>
							<li <?php if ($menu == 'playstorelink') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Link'); ?>"><i class="icon-store"></i> <span>Play Store Link</span></a></li>
							<li <?php if ($menu == 's_features') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Feature'); ?>"><i class="icon-briefcase"></i> <span>Why Chooes Us</span></a></li>
							<li <?php if ($menu == 'testimonial') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Testimonial'); ?>"><i class="icon-collaboration"></i> <span>Testimonial</span></a></li>
							<li <?php if ($menu == 'subcription') { ?> class="active" <?php  } ?>><a href="<?php echo base_url('BA/Subcription'); ?>"><i class="icon-collaboration"></i> <span>Subcription List</span></a></li>
							<li <?php if ($menu == 'setion') { ?> class="active" <?php  } ?> ><a href="<?php echo base_url('BA/Section'); ?>"><i class="icon-collaboration"></i> <span>Section</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-book"></i> <span>Policies</span></a>
						<ul>
							<li <?php if ($menu == 'Privacy_Policy') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Policies'); ?>"><i class="icon-paste3"></i>Privacy Policy</a>
							</li>
							<li <?php if ($menu == 'Terms_of_Service') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Policies/Terms_of_Service'); ?>"><i class="icon-paste3"></i>Terms Of Service</a>
							</li>
							<li <?php if ($menu == 'Refund_Cancellation_Policy') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Policies/Refund_Cancellation_Policy'); ?>"><i class="icon-paste3"></i>Refund & Cancellation Policy</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-home2"></i> <span>Master Table</span></a>
						<ul>
							<li <?php if ($menu == 'Privilege') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Privilege'); ?>"><i class="icon-paste3"></i>Privilege</a>
							</li>
							<li <?php if ($menu == 'FeatureList') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/FeatureList'); ?>"><i class="icon-make-group"></i>Feature List</a>
							</li>
							<li <?php if ($menu == 'Module') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Module'); ?>"><i class="icon-store2"></i>Module</a>
							</li>
							<li <?php if ($menu == 'PlanMaster') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/PlanMaster'); ?>"><i class="icon-grid5"></i>Plan Master</a>
							</li>
							<li <?php if ($menu == 'TimeZoneMaster') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/TimeZoneMaster'); ?>"><i class="icon-sort-time-asc"></i>TimeZone</a>
							</li>
							<li <?php if ($menu == 'Currency') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/Currency'); ?>"><i class="icon-coins"></i>Currency</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-users4"></i> <span>Customer List</span></a>
						<ul>
							<li <?php if ($menu == 'SubscribedCustomer') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/BuroCustomer/SubscribedCustomer'); ?>"><i class="icon-user-check"></i>Subscribed Customer</a>
							</li>
							<li <?php if ($menu == 'TrialCustomer') { ?> class="active" <?php  } ?>>
								<a href="<?php echo base_url('BA/BuroCustomer/TrialCustomer'); ?>"><i class="icon-users2"></i>Trial Customer</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>