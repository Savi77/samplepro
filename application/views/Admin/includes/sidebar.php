<?php
	if ($this->session->user_type == 'SA') {
		$this->load->view('Admin/includes/AdminSidebar');
	} else {
		$this->load->view('Admin/includes/EmployeeSidebar');
	}
?>

