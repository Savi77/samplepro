<?php

$date_create=date("Y-m-d H:i:s");

// $Insert_tbl_activity="INSERT INTO `tbl_activity` (`org_id`, `activity_title`, `status`, `delete_status`, `date_created`) VALUES
// ('$org_id', 'Task', 1, 0, '$date_create'),
// ('$org_id', 'Event', 1, 0, '$date_create'),
// ('$org_id', 'Phone Call', 1, 0, '$date_create'),
// ('$org_id', 'Email', 1, 0, '$date_create')";
// $this->db->query($Insert_tbl_activity);

$Insert_tbl_business="INSERT INTO `tbl_business` ( `org_id`, `business_name`, `status`, `delete_status`, `date_created`) VALUES
('$org_id','Telecommunications', 1, 0, '$date_create'),
('$org_id','Consumer  Products', 1, 0,'$date_create'),
('$org_id','Food & Beverages', 1, 0, '$date_create'),
('$org_id','Defence', 1, 0, '$date_create')";
$this->db->query($Insert_tbl_business);

$Insert_tbl_group="INSERT INTO `tbl_group` (`org_id`, `group_name`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'WholeSales', 1, 0, '$date_create'),
('$org_id', 'Retail', 1, 0, '$date_create'),
('$org_id', 'End User', 1, 0, '$date_create')";
$this->db->query($Insert_tbl_group);


$Insert_tbl_location="INSERT INTO `tbl_location` (`location`, `status`, `date_created`, `org_id`, `delete_status`) VALUES
('Pun Station', 1, '$date_create', '$org_id', 0)";
$this->db->query($Insert_tbl_location);

$tbl_expense_master="INSERT INTO `tbl_expense_master` (`org_id`, `expense_name`, `status`, `delete_status`) VALUES
('$org_id', 'Petrol Expense', 1, 0),
('$org_id', 'Hotel Expenses', 1, 0),
('$org_id', 'Lodging & Boarding', 1, 0)";
$this->db->query($tbl_expense_master);

$tbl_schedule_type="INSERT INTO `tbl_schedule_type` ( `org_id`, `title`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'Case', 1, 0, '$date_create'),
('$org_id', 'Own', 1, 0, '$date_create'),
('$org_id', 'Task', 1, 0, '$date_create')";
$this->db->query($tbl_schedule_type);


$tbl_schedule_type_name="INSERT INTO `tbl_schedule_type_name` (`org_id`, `type_name`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'Online Support', 1, 0, '$date_create'),
('$org_id', 'Onsite Visit', 1, 0, '$date_create'),
('$org_id', 'Tele call', 1, 0, '$date_create'),
('$org_id', 'E-Mail', 1, 0, '$date_create'),
('$org_id', 'Online Meeting', 1, 0, '$date_create'),
('$org_id', 'Office', 1, 0, '$date_create')";
$this->db->query($tbl_schedule_type_name);


$tbl_source="INSERT INTO `tbl_source` ( `org_id`, `source_title`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'Newspaper', 1, 0, '$date_create'),
('$org_id', 'Existing Customer', 1, 0, '$date_create'),
('$org_id', 'Friend', 1, 0, '$date_create'),
('$org_id', 'Social Media', 1, 0, '$date_create')";
$this->db->query($tbl_source);


$tbl_stage="INSERT INTO `tbl_stage` (`org_id`, `stage_title`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'New (untouched)', 1, 0, '$date_create'),
('$org_id', 'Contacted', 1, 0, '$date_create'),
('$org_id', 'Interested', 1, 0, '$date_create'),
('$org_id', 'Demo Completed', 1, 0, '$date_create'),
('$org_id', 'Under Review', 1, 0, '$date_create')";
$this->db->query($tbl_stage);

$tbl_target_type="INSERT INTO `tbl_target_type` ( `org_id`, `uom_id`, `target_type`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 1, 'CA Visit', 1, 0, '$date_create'),
('$org_id', 1, 'New Customer Enrollment', 1, 0, '$date_create'),
('$org_id', 3, 'Revenue Collection ', 1, 0, '$date_create'),
('$org_id', 1, 'Existing Customer Visit', 1, 0, '$date_create'),
('$org_id', 1, 'AMC Customers', 1, 0, '$date_create')";
$this->db->query($tbl_target_type);


$tbl_type="INSERT INTO `tbl_type` ( `title`, `status`, `date_created`, `org_id`, `delete_status`) VALUES
('Media', 1, '$date_create', '$org_id', 0),
('Investor', 1, '$date_create','$org_id', 0),
(' Customer', 1, '$date_create', '$org_id', 0),
('Prospect', 1, '$date_create', '$org_id', 0),
('Partner', 1, '$date_create', '$org_id', 0)";
$this->db->query($tbl_type);


$tbl_uom="INSERT INTO `tbl_uom` (`org_id`, `uom_type`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'Nos.', 1, 0, '$date_create'),
('$org_id', 'Count', 1, 0, '$date_create'),
('$org_id', 'Amount', 1, 0, '$date_create')";
$this->db->query($tbl_uom);

$tbl_credit_term="INSERT INTO `tbl_credit_term` (`org_id`, `credit_name`, `credit_days`, `delete_status`, `date_created`) VALUES
('$org_id', '30 Days', 30, 0, '$date_create')";
$this->db->query($tbl_credit_term);

$tbl_product_specification="INSERT INTO `tbl_product_specification` (`org_id`, `specification_name`, `specification_desc`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', 'Quantity', 'Quantity', 1, 0, '$date_create')";
$this->db->query($tbl_product_specification);

$tbl_hsn_code="INSERT INTO `tbl_hsn_code` (`org_id`, `hsn_code`, `hsn_desc`, `status`, `delete_status`, `date_created`) VALUES
('$org_id', '995422', '995422', 1, 0, '$date_create')";
$this->db->query($tbl_hsn_code);

$tbl_order_status="INSERT INTO `tbl_order_status` (`org_id`, `name`, `default_active`, `status`, `date_created`) VALUES
('$org_id', 'Booked', 1, 1, '$date_create'),
('$org_id', 'Processed', 0, 1, '$date_create'),
('$org_id', 'Shipped', 0, 1, '$date_create'),
('$org_id', 'Completed', 0, 1, '$date_create'),
('$org_id', 'Canceled', 0, 1, '$date_create'),
('$org_id', 'Return', 0, 2, '$date_create'),
('$org_id', 'On Hold', 0, 1, '$date_create')";
$this->db->query($tbl_order_status);





?>