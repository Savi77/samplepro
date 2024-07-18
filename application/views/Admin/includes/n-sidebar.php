<?php
	if ($this->session->user_type == 'SA') {
		$this->load->view('Admin/includes/n-AdminSidebar');
	} else {
		$this->load->view('Admin/includes/n-EmployeeSidebar');
	}
?>

