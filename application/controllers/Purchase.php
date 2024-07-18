<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Purchase extends DX_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!is_login_app()) {
			return redirect('site');
		}
	}


	function index()
	{

		$this->load->library('pagination');
		$per_page = PER_PAGE_PAGINATION_ADMIN;

		if ($this->uri->segment(4)) {
			$page = ($this->uri->segment(4));
		} else {
			$page = 1;
		}

		$where_like = array();

		if ($this->input->get()) {
			$client_name                = trim($this->input->get('client_name'));
			$data['client_name']      = $client_name;
			$client_email               = trim($this->input->get('client_email'));
			$data['client_email']     = $client_email;
			$phn_num               = trim($this->input->get('phn_num'));
			$data['phn_num']     = $phn_num;

			if (strlen($client_name) > 0) {
				$where_like = array_merge($where_like, array("client_name" => $client_name));
			}
			if (strlen($client_email) > 0) {
				$where_like = array_merge($where_like, array("email" => $client_email));
			}
			if (strlen($phn_num) > 0) {
				$where_like = array_merge($where_like, array("phone_number" => $phn_num));
			}
		}



		$joinArray = array(
			array("klc_vendor", "klc_vendor.vendor_id=klc_porder.order_client", "left")

		);
		$data['result'] =   $this->main_model->get_All_Data_By_Query_pagination('klc_porder', ['klc_porder.company_id' => $this->session->userdata('front_userid')], $per_page, $statment = '*', $joinArray, $order_by = array('order_id', 'desc'), $where_like, ($page - 1) * $per_page);

		$data['count_all']  = $data['result']['count_all'];
		pagination_default('purchase/index',  $data['result']['count_all'], $per_page);
		$data['purchase_orders'] = $data['result']['result'];

		$data["pagination_links"] = $this->pagination->create_links();
		//$userId = $this->session->userdata('front_userid');
		//$data['user'] = $this->main_model->get_All_Data_By_Query('klc_client',[]  );
		$this->load->view('purchase/index',  $data);
	}

	function add($value = '')
	{

		$data = array();


		$joinArray = array(
			array('klc_user_company', 'klc_user_company.user_id = klc_front_user.user_id', 'left')
		);
		$company = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' =>  $this->session->userdata('front_userid')], $limit = '1', $statment = '*', $joinArray);


		if (isset($company['active_session']) && $company['active_session'] > 0) {

			$data = array();
			$data['user_id'] = $this->session->userdata('front_userid');


			$data['vendors'] = $this->main_model->get_All_Data_By_Query('klc_vendor', ['company_id' => $data['user_id']], $limit = "0", $statment = "	vendor_id ,vendor_name");
			$data['products'] = $this->main_model->get_All_Data_By_Query('klc_product', ['company_id' => $data['user_id']], $limit = "0", $statment = "	product_id ,product_name");

			$financial_detail  =   $this->main_model->get_Row_Data_By_Query('klc_financial_year', ['financial_year_id' => $company['active_session']]);

			$middleSession = $financial_detail['short_year'];

			//Last year Id 
			$pre = $company['so_pre'];

			$data['last_po'] = $this->main_model->getLastRecord('klc_porder', 'po_custom_id', $company['active_session']);

			if ($data['last_po']) {
				$orderId  = $data['last_po']->last_id  + 1;
				$data['performaGui'] = "PO/" . $middleSession    .  "/" . $orderId;
				$data['order_id'] = $orderId;
			} else {
				$orderId  = $company['so_number'];
				$data['performaGui'] = "PO/" . $middleSession    .  "/" . $orderId;
				$data['order_id'] = $orderId;
			}

			$this->load->view('purchase/add',  $data);
		} else {
			set_alert('danger', 'Please Active Financial Year First ');
			return redirect('purchase');
		}
	}


	function update($porderId)
	{
		$data = array();
		$data['user_id'] = $this->session->userdata('front_userid');

		$data['order_id'] = 1;
		$data['vendors'] = $this->main_model->get_All_Data_By_Query('klc_vendor', ['company_id' => $data['user_id']], $limit = "0", $statment = "	vendor_id ,vendor_name");
		$data['products'] = $this->main_model->get_All_Data_By_Query('klc_product', ['company_id' => $data['user_id']], $limit = "0", $statment = "	product_id ,product_name");

		$data['last_po'] = $this->main_model->get_last_record('klc_porder', 'order_id');

		if ($data['last_po']) {
			$data['order_id'] = $data['last_po']->last_id  + 1;
		}
		$joinAddressArray = array(
			array("klc_address", "klc_address.address_id=klc_porder.address_id", "left"),
			array("inv_country", "inv_country.country_id=klc_address.address_country", "left"),
			array("inv_state", "inv_state.state_id=klc_address.address_state", "left"),
			array("inv_city", "inv_city.city_id=klc_address.address_city", "left"),
		);
		$data['order'] =   $this->main_model->get_Row_Data_By_Query('klc_porder', ['order_id' => $porderId] , $limit = "0", $statment = "*", $joinAddressArray);
		
		$join_item_product = array(
			array("klc_product", "klc_product.product_id=klc_porder_item.order_item_product", "left"),
			array("klc_gst_rate_detail", "klc_product.product_id=klc_gst_rate_detail.product_id", "left"),
		);
		$data['order_items'] =   $this->main_model->get_All_Data_By_Query('klc_porder_item', ['order_item_parent' => $porderId], $limit = "0", $statment = "*", $join_item_product);

		if (count($data['order']) == 0) {
			set_alert('danger', 'No direct script access allowed');
			return redirect('purchase');
		}
		$joinArray = array(
			array('klc_user_company', 'klc_user_company.user_id = klc_front_user.user_id', 'left'),
			array("inv_country", "inv_country.country_id=klc_user_company.country", "left"),
			array("inv_state", "inv_state.state_id=klc_user_company.state", "left"),
			array("inv_city", "inv_city.city_id=klc_user_company.city", "left"),
		);
		$data['company'] = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $this->session->userdata('front_userid')], $limit = '1', $statment = '*', $joinArray);

		
		$data['clientdetails'] =   $this->main_model->get_Row_Data_By_Query('klc_vendor', ['vendor_id' => $data['order']['order_client']], $limit = "1", $statment = '*');

		$this->load->view('purchase/update',  $data);
	}


	public function ajax_add_purchase_order()
	{
		$response = array();
		$errors  = array();
		$salesPerson	= $this->session->userdata('front_userid');
		$company = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $this->session->userdata('front_userid')]);

		if ($this->input->post('clientId') > 0) {
			$clientId 		= trim($this->input->post('clientId'));
		} else {
			$clientId = 0;
		}


		$validproduct = 0;
		$productcheck = array();
		$productcheck  		= $this->input->post('productId');
		$prdCountcheck = count($productcheck);

		for ($i = 0; $i <  $prdCountcheck; $i++) {
			$productcheckId  		= $productcheck[$i];
			if (isset($productcheckId) && $productcheckId > 0) {
				$validproduct = 1;
			}
		}

		$status = 1;

		if ($clientId != 0 && $validproduct == 1) {

			$date_create 	= trim($this->input->post('date_create'));
			//$fromMYSQL = '2007-10-17 21:46:59';
			$date_create = caldate_to_dbdate($date_create);

			$vendor_quote_date1 	= trim($this->input->post('vendor_quote_date'));
			$vendorQuoteDate = caldate_to_dbdate($vendor_quote_date1);

			$data   = array(
				'company_id'    => trim($this->input->post('companyId')),
				'po_custom_id'    => trim($this->input->post('customPOId')),
				'session_id'    => $company['active_session'],
				'po_challan_id'    => trim($this->input->post('gui')),
				'address_id'    => trim($this->input->post('SelectedAddressValue')),
				'purchase_user'    => $salesPerson,
				'order_client'    => $clientId,
				'vendor_quote_number' => trim($this->input->post('vendor_quote_number')),
				'vendor_quote_date' => $vendorQuoteDate,
				'grros_total'    => trim($this->input->post('grosstotal')),
				'round_sign'    => trim($this->input->post('sign')),
				'round_amount'    => trim($this->input->post('roundfinalTotal')),
				'grand_total'    => trim($this->input->post('finalOrderPrice')),
				'order_word'    => trim($this->input->post('inword')),
				'total_withgst'    => trim($this->input->post('totalwithgst')),
				'total_gst'    => trim($this->input->post('totalgst')),
				'order_placed_on'    => $date_create,
				'order_status'    => trim($this->input->post('taxrate')),
				'note'    => trim($this->input->post('note')),
			);
			//Save Order Table 

			$orderId = $this->main_model->insert_data_get_last_id('klc_porder', $data);


			//=======  Notification ===================
			/*$type 			= 2; 
			$notitle 		= "Purchase Order #" .  $gui;
			$notification 	=  "A New Purchase Order has been placed with Order #" .  $gui . "." ;
			
			$this->model->addNotification( $notitle ,  $notification , $type  );*/
			// ======= End of Notification ================ 
			//Cart Array 
			//Products 
			$qty = array();
			$itemdesc = array();
			$unitprice = array();
			$productDiscount = array();
			$rowtotalx = array();
			$vatinput = array();
			$vatAmountinput = array();
			$rowtotal = array();


			$product  		= $this->input->post('productId');
			$qty  			= $this->input->post('qty');
			$unitprice  	= $this->input->post('unitprice');
			$productDiscount   	= $this->input->post('lessdiscount');
			$rowtotalx  		= $this->input->post('rowtotalx');
			$vatinput  		= $this->input->post('vatinput');
			$vatAmountinput  = $this->input->post('vatAmountinput');
			$rowtotal  		= $this->input->post('rowtotal');



			$prdCount = count($product);

			for ($i = 0; $i <  $prdCount; $i++) {

				$productId  		= $product[$i];
				$qtyId 				= $qty[$i];

				$unitpriceId  		= $unitprice[$i];
				$productDiscountId  = $productDiscount[$i];
				$rowtotalexId  		= $rowtotalx[$i];
				$vatinputId  		= $vatinput[$i];
				$vatAmountinputId  	= $vatAmountinput[$i];
				$rowtotale  		= $rowtotal[$i];
				$data   = array(
					'order_item_parent'    => $orderId,
					'order_item_product'    => $productId,
					'qty'    => $qtyId,

					'unit_price'    => $unitpriceId,
					'less_discount'    => $productDiscountId,
					'taxable_amount'    => $rowtotalexId,
					'gst_val'    => $vatinputId,
					'gst_amount'    => $vatAmountinputId,
					'total'    => $rowtotale
				);

				if (isset($productId) && $productId > 0) {

					$this->main_model->insert_data_get_last_id('klc_porder_item', $data);
				}
			}

			$response['status'] = 1;
			$response['orderId'] = $orderId;
			$response['msg'] = "Purchase Order Successfully Added In System";
		} else {
			if ($clientId == 0) {
				$response['status'] 	= 0;
				$errors['client'] 	= "Please Select A Vendor First";
				$response['errors'] = $errors;
			}
			if ($validproduct == 0) {
				$response['status'] 	= 0;
				$errors['prdCheck'] 	= "Please Select At Least One Product";
				$response['errors'] = $errors;
			}
		}


		echo json_encode($response);
	}


	function ajax_update_purchase_order()
	{

		$response = array();
		$errors  = array();
		$salesPerson	= $this->session->userdata('front_userid');
		if ($this->input->post('clientId') > 0) {
			$clientId 		= trim($this->input->post('clientId'));
		} else {
			$clientId = 0;
		}


		$validproduct = 0;
		$productcheck = array();
		$productcheck  		= $this->input->post('productId');
		$prdCountcheck = count($productcheck);

		for ($i = 0; $i <  $prdCountcheck; $i++) {
			$productcheckId  		= $productcheck[$i];
			if (isset($productcheckId) && $productcheckId > 0) {
				$validproduct = 1;
			}
		}

		$status = 1;

		if ($clientId != 0 && $validproduct == 1) {

			$date_create 	= trim($this->input->post('date_create'));
			$orderId 	= trim($this->input->post('order_id'));
			//$fromMYSQL = '2007-10-17 21:46:59';
			$date_create = caldate_to_dbdate($date_create);

			$vendor_quote_date1 	= trim($this->input->post('vendor_quote_date'));
			$vendorQuoteDate = caldate_to_dbdate($vendor_quote_date1);

			$update_data   = array(
				'company_id'    => trim($this->input->post('companyId')),
				'po_custom_id'    => trim($this->input->post('customPOId')),
				'po_challan_id'    => trim($this->input->post('gui')),
				'purchase_user'    => $salesPerson,
				'order_client'    => $clientId,
				'grros_total'    => trim($this->input->post('grosstotal')),
				'vendor_quote_number'    => trim($this->input->post('vendor_quote_number')),
				'vendor_quote_date'    => $vendorQuoteDate,
				'round_sign'    => trim($this->input->post('sign')),
				'round_amount'    => trim($this->input->post('roundfinalTotal')),
				'grand_total'    => trim($this->input->post('finalOrderPrice')),
				'order_word'    => trim($this->input->post('inword')),
				'total_withgst'    => trim($this->input->post('totalwithgst')),
				'total_gst'    => trim($this->input->post('totalgst')),
				'order_placed_on'    => $date_create,
				'order_status'    => 1,
				'note'    => trim($this->input->post('note')),
			);

			//update Order Table 
			$this->main_model->update_data('klc_porder', $update_data, ['order_id' => $orderId]);
			//delete data
			$this->main_model->delete_data('klc_porder_item', ['order_item_parent' => $orderId]);

			//Products 
			$qty = array();
			$itemdesc = array();
			$unitprice = array();
			$productDiscount = array();
			$rowtotalx = array();
			$vatinput = array();
			$vatAmountinput = array();
			$rowtotal = array();


			$product  		= $this->input->post('productId');
			$qty  			= $this->input->post('qty');
			$unitprice  	= $this->input->post('unitprice');
			$productDiscount   	= $this->input->post('lessdiscount');
			$rowtotalx  		= $this->input->post('rowtotalx');
			$vatinput  		= $this->input->post('vatinput');
			$vatAmountinput  = $this->input->post('vatAmountinput');
			$rowtotal  		= $this->input->post('rowtotal');

			$prdCount = count($product);

			for ($i = 0; $i <  $prdCount; $i++) {

				$productId  		= $product[$i];
				$qtyId 				= $qty[$i];

				$unitpriceId  		= $unitprice[$i];
				$productDiscountId  = $productDiscount[$i];
				$rowtotalexId  		= $rowtotalx[$i];
				$vatinputId  		= $vatinput[$i];
				$vatAmountinputId  	= $vatAmountinput[$i];
				$rowtotale  		= $rowtotal[$i];
				$data   = array(
					'order_item_parent'    => $orderId,
					'order_item_product'    => $productId,
					'qty'    => $qtyId,

					'unit_price'    => $unitpriceId,
					'less_discount'    => $productDiscountId,
					'taxable_amount'    => $rowtotalexId,
					'gst_val'    => $vatinputId,
					'gst_amount'    => $vatAmountinputId,
					'total'    => $rowtotale
				);



				if (isset($productId) && $productId > 0) {

					$this->main_model->insert_data_get_last_id('klc_porder_item', $data);
				}
			}

			$response['status'] = 1;
			$response['msg'] = "Purchase Order Successfully update In System";
		} else {
			if ($clientId == 0) {
				$response['status'] 	= 0;
				$errors['client'] 	= "Please Select A Vendor First";
				$response['errors'] = $errors;
			}
			if ($validproduct == 0) {
				$response['status'] 	= 0;
				$errors['prdCheck'] 	= "Please Select At Least One Product";
				$response['errors'] = $errors;
			}
		}


		echo json_encode($response);
	}


	public function ajax_add_invoice()
	{

		$response = array();
		$errors  = array();
		$salesPerson	= $this->session->userdata('front_userid');
		if ($this->input->post('clientId') > 0) {
			$clientId 		= trim($this->input->post('clientId'));
		} else {
			$clientId = 0;
		}


		$validproduct  = 0;
		$productcheck  = array();
		$productcheck  = $this->input->post('productId');
		$prdCountcheck = count($productcheck);

		for ($i = 0; $i <  $prdCountcheck; $i++) {
			$productcheckId  =  $productcheck[$i];
			if (isset($productcheckId) && $productcheckId > 0) {
				$validproduct = 1;
			}
		}

		$status = 1;

		if ($clientId != 0 && $validproduct == 1) {

			$date_create 	= trim($this->input->post('date_create'));
			//$fromMYSQL = '2007-10-17 21:46:59';
			$date_create = caldate_to_dbdate($date_create);

			$data   = array(
				'company_id'    => trim($this->input->post('companyId')),
				'poi_custom_id'    => trim($this->input->post('customPOId')),
				'poi_challan_id'    => trim($this->input->post('gui')),
				'purchase_user'    => $salesPerson,
				'order_client'    => $clientId,
				'grros_total'    => trim($this->input->post('grosstotal')),
				'round_sign'    => trim($this->input->post('sign')),
				'round_amount'    => trim($this->input->post('roundfinalTotal')),
				'grand_total'    => trim($this->input->post('finalOrderPrice')),
				'order_word'    => trim($this->input->post('inword')),
				'total_withgst'    => trim($this->input->post('totalwithgst')),
				'total_gst'    => trim($this->input->post('totalgst')),
				'order_placed_on'    => $date_create,
				'order_status'    => 1,
				'note'    => trim($this->input->post('note')),
			);
			//Save Order Table 

			$orderId = $this->main_model->insert_data_get_last_id('klc_purchase_invoice', $data);

			//Products 
			$qty = array();
			$itemdesc = array();
			$unitprice = array();
			$productDiscount = array();
			$rowtotalx = array();
			$vatinput = array();
			$vatAmountinput = array();
			$rowtotal = array();


			$product  		= $this->input->post('productId');
			$qty  			= $this->input->post('qty');
			$unitprice  	= $this->input->post('unitprice');
			$productDiscount   	= $this->input->post('lessdiscount');
			$rowtotalx  		= $this->input->post('rowtotalx');
			$vatinput  		= $this->input->post('vatinput');
			$vatAmountinput  = $this->input->post('vatAmountinput');
			$rowtotal  		= $this->input->post('rowtotal');


			$prdCount = count($product);

			for ($i = 0; $i <  $prdCount; $i++) {

				$productId  		= $product[$i];
				$qtyId 				= $qty[$i];

				$unitpriceId  		= $unitprice[$i];
				$productDiscountId  = $productDiscount[$i];
				$rowtotalexId  		= $rowtotalx[$i];
				$vatinputId  		= $vatinput[$i];
				$vatAmountinputId  	= $vatAmountinput[$i];
				$rowtotale  		= $rowtotal[$i];
				$data   = array(
					'order_item_parent'    => $orderId,
					'order_item_product'    => $productId,
					'qty'    => $qtyId,

					'unit_price'    => $unitpriceId,
					'less_discount'    => $productDiscountId,
					'taxable_amount'    => $rowtotalexId,
					'gst_val'    => $vatinputId,
					'gst_amount'    => $vatAmountinputId,
					'total'    => $rowtotale
				);

				if (isset($productId) && $productId > 0) {

					$this->main_model->insert_data_get_last_id('klc_purchase_invoice_item', $data);
				}
			}

			$response['status'] = 1;
			$response['msg'] = "Purchase Invoice Successfully Generated In System";
		} else {
			if ($clientId == 0) {
				$response['status'] 	= 0;
				$errors['client'] 	= "Please Select A Vendor First";
				$response['errors'] = $errors;
			}
			if ($validproduct == 0) {
				$response['status'] 	= 0;
				$errors['prdCheck'] 	= "Please Select At Least One Product";
				$response['errors'] = $errors;
			}
		}
		echo json_encode($response);
	}



	public function print_invoice($porderId)
	{

		$data = array();
		$data['user_id'] = $this->session->userdata('front_userid');
		$data['po_id'] = $porderId;
		//Get Company Data
		$userId = $this->session->userdata('front_userid');
		$joinArray = array(
			array('klc_user_company', 'klc_user_company.user_id = klc_front_user.user_id', 'left'),
			array("inv_country", "inv_country.country_id=klc_user_company.country", "left"),
			array("inv_state", "inv_state.state_id=klc_user_company.state", "left"),
			array("inv_city", "inv_city.city_id=klc_user_company.city", "left"),
		);

		$company = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $userId], $limit = '1', $statment = '*', $joinArray);

		$data['company'] = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $userId], $limit = '1', $statment = '*', $joinArray);




		$data['order_id'] = 1;
		$data['vendors'] = $this->main_model->get_All_Data_By_Query('klc_vendor', ['company_id' => $data['user_id']], $limit = "0", $statment = "	vendor_id ,vendor_name");
		$data['products'] = $this->main_model->get_All_Data_By_Query('klc_product', ['company_id' => $data['user_id']], $limit = "0", $statment = "	product_id ,product_name");

		$data['last_po'] = $this->main_model->get_last_record('klc_porder', 'order_id');

		if ($data['last_po']) {
			$data['order_id'] = $data['last_po']->last_id  + 1;
		}

		$joinAddressArray = array(
			array("klc_address", "klc_address.address_id=klc_porder.address_id", "left"),
			array("inv_country", "inv_country.country_id=klc_address.address_country", "left"),
			array("inv_state", "inv_state.state_id=klc_address.address_state", "left"),
			array("inv_city", "inv_city.city_id=klc_address.address_city", "left"),
		);
		$data['order'] =   $this->main_model->get_Row_Data_By_Query('klc_porder', ['order_id' => $porderId] , $limit = "0", $statment = "*", $joinAddressArray);

		$join_item_product = array(
			array("klc_product", "klc_product.product_id=klc_porder_item.order_item_product", "left"),
			array("klc_gst_rate_detail", "klc_product.product_id=klc_gst_rate_detail.product_id", "left"),
		);
		$data['order_items'] =   $this->main_model->get_All_Data_By_Query('klc_porder_item', ['order_item_parent' => $porderId], $limit = "0", $statment = "*", $join_item_product);

		if (count($data['order']) == 0) {
			set_alert('danger', 'No direct script access allowed');
			return redirect('purchase');
		}


		
		$data['clientdetails'] =   $this->main_model->get_Row_Data_By_Query('klc_vendor', ['vendor_id' => $data['order']['order_client']], $limit = "1", $statment = '*');
		
		$this->load->view('purchase/print_invoice', $data);

		// $themeArray = array( 1 => 'print' ,  2 => 'second');
		// $themeArray = array(1 => 'print');

		// foreach ($themeArray as  $key => $themeactive) {
			// $this->load->view('purchase/' . $themeactive,  $data);

			// if( $company['invoice_temp'] == $key ) 
			// {
			// 	$this->load->view('purchase/' .$themeactive ,  $data);    
			// }
		// }
	}



	function Download()
	{
		error_reporting(0);
		$user_id = $this->session->userdata('front_userid');
		$porderId = $_GET['id'];
		$userId = $this->session->userdata('front_userid');
		$joinArray = array(
			array('klc_user_company', 'klc_user_company.user_id = klc_front_user.user_id', 'left'),
			array("inv_country", "inv_country.country_id=klc_user_company.country", "left"),
			array("inv_state", "inv_state.state_id=klc_user_company.state", "left"),
			array("inv_city", "inv_city.city_id=klc_user_company.city", "left"),
		);

		$company = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $userId], $limit = '1', $statment = '*', $joinArray);

		$company = $this->main_model->get_Row_Data_By_Query('klc_front_user', ['klc_front_user.user_id' => $userId], $limit = '1', $statment = '*', $joinArray);




		$order_id = 1;
		$vendors = $this->main_model->get_All_Data_By_Query('klc_vendor', ['company_id' => $user_id], $limit = "0", $statment = "	vendor_id ,vendor_name");
		$products = $this->main_model->get_All_Data_By_Query('klc_product', ['company_id' => $user_id], $limit = "0", $statment = "	product_id ,product_name");

		$last_po = $this->main_model->get_last_record('klc_porder', 'order_id');

		if ($last_po) {
			$order_id = $last_po->last_id  + 1;
		}

		$joinAddressArray = array(
			array("klc_address", "klc_address.address_id=klc_porder.address_id", "left"),
			array("inv_country", "inv_country.country_id=klc_address.address_country", "left"),
			array("inv_state", "inv_state.state_id=klc_address.address_state", "left"),
			array("inv_city", "inv_city.city_id=klc_address.address_city", "left"),
		);
		$order =   $this->main_model->get_Row_Data_By_Query('klc_porder', ['order_id' => $porderId] , $limit = "0", $statment = "*", $joinAddressArray);

		$join_item_product = array(
			array("klc_product", "klc_product.product_id=klc_porder_item.order_item_product", "left"),
			array("klc_gst_rate_detail", "klc_product.product_id=klc_gst_rate_detail.product_id", "left"),
		);
		$order_items =   $this->main_model->get_All_Data_By_Query('klc_porder_item', ['order_item_parent' => $porderId], $limit = "0", $statment = "*", $join_item_product);

		$joinArray = array(
			array("klc_address", "klc_address.address_user_id=klc_vendor.vendor_id", "left"),
			array("inv_country", "inv_country.country_id=klc_address.address_country", "left"),
			array("inv_state", "inv_state.state_id=klc_address.address_state", "left"),
			array("inv_city", "inv_city.city_id=klc_address.address_city", "left"),
		);
		$clientdetails =   $this->main_model->get_Row_Data_By_Query('klc_vendor', ['vendor_id' => $order['order_client']], $limit = "1", $statment = '*', $joinArray);


		if (isset($company['trade_name'])) {
			$com_state_id = $company['state'];
		} else {
			$com_state_id = 1;
		}

		if ($order['state_id']) {
			$client_state_id = $order['state_id'];
			$client_gst_category = $order['party_category'];
		} else {
			$client_state_id = 1;
			$client_gst_category = '';
		}
		include("app-assets/mpdf/mpdf.php");
		$logoFile = $company['company_logo'];
		if (file_exists($logoFile)) {
			$imgpath = base_url() . '/' . $company['company_logo'];
			$fielTag = '<img style="vertical-align: top" src="' . $imgpath . '" width="60" /><br/>';
		} else {
			$fielTag = "";
		}
		$html = '
		<html>
		<head>
		<style>
		body {font-family: sans-serif;
		font-size: 10pt;
		}
		p { margin: 0pt; }
		table.items  {
		border: 1px solid #F5F5F5;
		}
		td { vertical-align: top; }
		.items td {
		border-left: 0.1mm solid #F5F5F5;
		border-right: 0.1mm solid #F5F5F5;
		}
		table thead td { 
			background: #2196F3;
			text-align: center;
			border: 0.1mm solid #F5F5F5;
			font-variant: small-caps;
		}
		.items th{background-color: #2196f3;color:white}
		.items td. {
		background-color: #2196F3;
		}
		.seventee {
			width: 65%;
		}
		.left {
			float: left;
		}
		.fourty {
			width: 30%;
		}
		.right {
			float: right;
		}
		#purchase_ordr {
			display: inline-block;
			width: 100%;
			padding: 10px 20px;
			box-sizing: border-box;
		}
		#purchase_ordr1 {
			display: inline-block;
			width: 100%;
			padding-top: 15px;
			box-sizing: border-box;
		}
		.tbln th{background-color: #2196f3;color:white}
		tbl table{ width:100%; margin:auto;} 
		.tbl thead {color:#fff;}
		.tbl th{background-color: #2196f3;
		color: #fff;
		font-size: 14px;
		padding: 4px 8px;}
		.tbl tr{ text-align:center;}
		.tbl td {
			padding: 5px 6px;
			font-size: 14px;
		}
		.full {
			width: 100%;
		}
		.border {
			border: 1px solid #98A4B8 !important;
		}
		h3 {
			font-size: 13px;
		}
		img {
			width: 120px;
		}
		</style>
		</head>
		<body>

		<!--mpdf
		<htmlpageheader name="myheader">
		<table width="100%">
		<tr>             
			<td width="40%" align="left">
				' . $fielTag . '
			</td>              
			<td width="95%" align="right" style="color:#00629B; font-size:18px"><span style="font-weight: bold; font-size: 14pt;">' . $company['trade_name'] . '</span><br/>' . $company['address1'] . '<br/>' . $company['address2'] . ' ' . $company['city_name'] . '-' . $company['pincode'] . '<br> Phone :- ' . $company['user_phone_num'] . '<br> Website :' . $company['website'] . '<br> State  :' . $company['state_name'] . '</td>
		</tr>
		</table>
		</htmlpageheader>

		<htmlpagefooter name="myfooter">
		<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
		Page {PAGENO} of {nb}
		</div>
		</htmlpagefooter>
		<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
		<sethtmlpagefooter name="myfooter" value="on" />
		mpdf-->

		<table>
		<tr>
		<td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>
			<td width="10%">
				<h4 style="margin-top:0px;letter-spacing: 1px;font-size:20px;text-align:center;">Purchase Order</h4> 
			</td>
			<td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>

		</tr>
		</table>

		<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
		<td width="45%" style="border: 0mm solid #888888; "><span style="font-size: 10pt; color: #555555; font-family: sans;"> <b>Bill To :</b></span><br />';
		$html .= '' . $clientdetails['vendor_name'] . '<br>';
		$html .= ' 
				' . $order['address_line1'] . ',' . $order['address_line2'] . ', ' . $order['city_name'] . ', ' . $order['state_name'] . ' ' . $order['country_name'] . '<br>
				Pincode   : ' . $order['address_postal'] . '  <br> 
				Contact Person  : ' . $order['contact_person'] . ' <br>';
				if ($clientdetails['email']) {
					$html .= 'Email ID : ' . $clientdetails['email'] . '  <br>';
				}
				if ($order['gst_number']) {
					$html .= 'GST Number : ' . $order['gst_number'] . '  <br>';
				}
				if ($order['pan_num']) {
					$html .= 'Pan Number : ' . $order['pan_num'] . '  <br>';
				}
				$html .= 'Phone Number : ' . $order['phone_number'] . ' ';
		$html .= '</td>
		<td width="20%">&nbsp;</td>
		<td>
			<table class="bpmTopic" style="font-size:12px; margin-left:4%;text-align: right !important;"><thead></thead><tbody>
				<tr><td><b>Purchase Order Details</b></td></tr>
				<tr>
					<td>PO No : </td>
					<td><b>' . $order['po_challan_id'] . '</b></td>
				</tr>
				<tr>
					<td>PO Date : </td>
					<td><b>' . date("d M, Y", strtotime($order['order_placed_on'])) . '</b></td>
				</tr>
			</tbody>
			</table>
		</td>

		</tr>
		</table>

		<br />

		<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
			<thead style="background-color:#00629B;">
				<tr>
					<th>S.N.</th>
					<th>Item Name </th>
					<th>HSN/SAC <br> Code </th>
					<th>Qty</th>
					<th>UOM</th>
					<th>Unit Price</th>
					<th>Less Disc</th>
					<th>Taxable Amount</th>
					<th>Tax Rate</th>
					<th>Total</th>
				</tr>
			</thead>
		<tbody>';
		$i = 1;
		$taxableAmount = 0;
		$totalAmount = 0;
		foreach ($order_items as $key => $order_item) {

			$taxableAmount = (float) $taxableAmount  + (float) $order_item['taxable_amount'];
			$totalAmount 	= (float) $totalAmount  + (float) $order_item['total'];
			$uom  =   $this->main_model->get_Row_Data_By_Query('klc_option', ['option_id' => $order_item['uom']]);
			$html .= '
				<tr>
				<td> ' . $i . ' </td>
				<td>
					<strong class="prddesc">' . $order_item['product_name'] . '</strong> 
				</td>
				<td>
					<strong >';
			if ($order_item['product_type'] == 1) {
				$html .= $order_item['hsn/sac_code'];
			} else {
				$html .= $order_item['hsn/sac_code'];
			}
			$html .= '</strong>
				</td>
				<td><strong >' . $order_item['qty'] . '</strong>   </td>
				<td>
					<strong >';
			$this->db->where('id', $order_item['unit']);
			$queryUnit = $this->db->get('klc_unit')->result_array();

			if (isset($queryUnit[0]['unitcode'])) {
				$html .= $queryUnit[0]['unitcode'];
			}
			$html .= '</strong>
				</td>
				<td><strong >' . $order_item['unit_price'] . '</strong>   </td>
				<td><strong >' . $order_item['less_discount'] . '</strong>   </td>
				<td><strong >' . $order_item['taxable_amount'] . '</strong>   </td>
				<td><strong > ' . $order_item['gst_val'] . ' % </strong>   </td>
				<td><strong >' . $order_item['total'] . '</strong>   </td>
				</tr> ';
			$i = $i + 1;
		}
		$html .= '<tfoot>
					<tr style=" color:#000; background:#F5F5F5; margin:10px 0px;">
						<td colspan="6"></td>
							
							<td ><strong>Total</strong></td>
							
							<td><strong > ' . $taxableAmount . ' </strong></td>
								
						
							<td></td>
							<td><strong > ' . $totalAmount . '  </strong></td>
						</tr>
				</tfoot>
		</table>
		<div id="purchase_ordr1">							
			<div class="seventee left table-responsive">';
		if ($order['total_gst'] > 0) {
			$html .= '<table class="full tbln tableborder " width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">';
			if ($client_gst_category == 'SEZ') {
				$html .= '<thead class="bfColor">
							<tr>
								<th>Taxable <br>Amount</th>
								<th>HSN/SAC <br>Code</th>
								<th>IGST % </th>
								<th>IGST <br>Amount </th>
							</tr>
						</thead>';
			} else if ($client_state_id != $com_state_id) {
				$html .= '<thead class="bfColor">
							<tr>
								<th>Taxable <br>Amount</th>
								<th>HSN/SAC <br>Code</th>
								<th>IGST % </th>
								<th>IGST <br>Amount </th>
							</tr>
						</thead>';
			} else {
				$html .= '<thead class="bfColor">
							<tr>
								<th>Taxable Amount</th>
								<th>HSN/SAC <br> Code</th>
								<th>CGST  % </th>
								<th>CGST Amount </th>
								<th>SGST  % </th>
								<th>SGST Amount </th>
							</tr>
						</thead>';
			}
			$html .= '<tbody>';
			$gstFullTotal = 0.00;
			$gstHalfTotal = 0.00;
			$taxableAmTotal =  0.00;

			foreach ($order_items as $key => $order_item) {
				(float)$gstFullTotal = (float)$gstFullTotal  + (float)$order_item['gst_amount'];

				(float)$gstHalfTotal = (float)$gstHalfTotal + (float)$order_item['gst_amount'] / 2;
				(float)$taxableAmTotal = (float)$taxableAmTotal  + (float)$order_item['taxable_amount'];
				if ($client_gst_category == 'SEZ') {
					$html .= '<tr>
										<td>  ' . $order_item['taxable_amount'] . ' </td>
										<td> ';
					if ($order_item['product_type'] == 1) {
						$html .= $order_item['hsn/sac_code'];
					} else {
						$html .= $order_item['hsn/sac_code'];
					}
					$html .= '</td>
										<td> ' . $order_item['gst_val'] / 2 . '%  </td>
										<td>';
					$date  = $order_item['gst_amount'] / 2.00;

					$html .= number_format($date, 2);
					$html .= '</td> </tr>';
				} else if ($client_state_id != $com_state_id) {

					$html .= '<tr>
										<td>  ' . $order_item['taxable_amount'] . ' </td>
										<td> ';
					if ($order_item['product_type'] == 1) {
						$html .= $order_item['hsn/sac_code'];
					} else {
						$html .= $order_item['hsn/sac_code'];
					}
					$html .= '</td>
										<td> ' . $order_item['gst_val'] / 2 . '%  </td>
										<td>';
					$date  = $order_item['gst_amount'] / 2.00;

					$html .= number_format($date, 2);
					$html .= '</td>
									</tr>';
				} else {
					$html .= '<tr>
								<td>  ' . $order_item['taxable_amount'] . ' </td>
								<td> ';
					if ($order_item['product_type'] == 1) {
						$html .= $order_item['hsn/sac_code'];
					} else {
						$html .= $order_item['hsn/sac_code'];
					}
					$html .= '</td>
								<td> ' . $order_item['gst_val'] / 2 . '%  </td>
								<td>';
					$date  = $order_item['gst_amount'] / 2.00;

					$html .= number_format($date, 2);
					$html .= '</td>
								<td> ' . $order_item['gst_val'] / 2 . '%  </td>
								
								<td> ';
					$date  = $order_item['gst_amount'] / 2.00;

					$html .= number_format($date, 2);
					$html .= '</td>
							</tr>';
				}
			}
			$html .= '</tbody>';
			if ($client_gst_category == 'SEZ') {
				$html .= '<tfoot>
						<tr style="color: #000;background: #F5F5F5;margin: 10px 0px;">
								<td > ' . number_format($order['grros_total'], 2) . '   </td>
								<td colspan="2"></td>
								<td><strong > ' . number_format($gstFullTotal, 2) . '  </strong></td>
							</tr>
						</tfoot>';
			} elseif ($client_state_id != $com_state_id) {
				$html .= '<tfoot>
						<tr style="color: #000;background: #F5F5F5; margin:10px 0px;">
							<td > ' . number_format($order['grros_total'], 2) . '  </td>
							<td colspan="2"></td>
							<td><strong > ' . number_format($gstFullTotal, 2) . ' </strong></td>
						</tr>
					</tfoot>';
			} else {
				$html .= '<tfoot>
						<tr style="color: #000;background: #F5F5F5; margin:10px 0px;">
							<td ><strong > ' . number_format($order['grros_total'], 2) . ' </strong> </td>
							<td colspan="2"></td>
							<td><strong > ' . number_format($gstHalfTotal, 2) . ' </strong></td>
							<td><strong > </strong></td>
							<td><strong > ' . number_format($gstHalfTotal, 2) . ' </strong></td>
						</tr>
					</tfoot>';
			}
			$html .= '</table>';
		}
		$html .= '</div>

			<div class="fourty right">
				
				<table  class="full tbl border">
			
					<tr>
						<td style="text-align:right;"> <strong > Taxable Amount </strong></td>
						<td></td>
						<td style="text-align:right;"> <strong > ' . $order['grros_total'] . '</strong></td>
					</tr> ';
		if ($order['total_gst'] > 0) {
			if ($client_gst_category == 'SEZ') {
				$html .= '<tr>
						<td style="text-align:right;"> <strong >IGST </strong></td>
						<td></td>
						<td style="text-align:right;"> <strong > ' . $order['total_gst'] . ' </strong> </td>
					</tr>';
			} elseif ($client_state_id != $com_state_id) {
				$html .= '<tr>
						<td style="text-align:right;"> <strong >IGST </strong></td>
						<td></td>
						<td style="text-align:right;"> <strong > ' . $order['total_gst'] . ' </strong> </td>
					</tr> ';
			} else {
				$html .= '<tr>
						<td style="text-align:right;"> <strong >SGST </strong></td>
						<td></td>
						<td style="text-align:right;"> <strong > ' . number_format($order['total_gst'] / 2, 2) . ' </strong> </td>
					</tr> 	
					<tr>
						<td style="text-align:right;"><strong > CGST </strong> </td>
						<td></td>
						<td style="text-align:right;"><strong > ' . number_format($order['total_gst'] / 2, 2) . ' </strong> </td>
					</tr> ';
			}
		}

		$html .= '<tr>
						<td style="text-align:right;"> <strong >Total </strong> </td>
						<td></td>
						<td style="text-align:right;"><strong > ' . $order['total_withgst'] . '  </strong> </td>
					</tr>

					<tr>
						<td style="text-align:right;"><strong > Round ( +/- ) </strong>  </td>
						<td></td>
						<td style="text-align:right;"> <strong > ';
		if ($order['round_sign'] == 1) {
			$html .= "+";
		} else {
			$html .= "-";
		}
		$html .= '' . $order['round_amount'] . ' </strong></td>
					</tr>
					<tr>
						<td style="text-align:right;"> <strong >Final Amount </strong>  </td>
						<td></td>
						<td style="text-align:right;"> <strong > ' . $order['grand_total'] . ' </strong> </td>
					</tr>
					
				</table>
					
			</div>
		</div>';

		$html .= '<br/><h5>Terms and Conditions :</h5>';
		if (isset($company['so_term'])) {
			$html .= '<p style="font-size:11px">' . $company['so_term'] . '</p>';
		} else {
			$html .= '<p style="font-size:11px">Goods once sold will not be taken back or exchanged.<p>
						<p style="font-size:11px">Payment due in 7 days from invoice date.</p>';
		}
		$html .= '<div id="purchase_ordr" style="padding: 0;">
				<div class="seventee left align-left" style="text-align:left;">
				<ul class="lista" style="list-style:none;">';
		if (isset($company['account_holder_name']) && strlen($company['account_holder_name']) > 0) {
			$html .= '<li style="font-size:11px" >Account  Name : ' . $company['account_holder_name'] . ' </li>';
		}
		if (isset($company['bank_ac_number']) && strlen($company['bank_ac_number']) > 0) {
			$html .= '<li style="font-size:11px" >Account Number : ' . $company['bank_ac_number'] . ' </li>';
		}
		if (isset($company['bank_name']) && strlen($company['bank_name']) > 0) {
			$html .= '<li style="font-size:11px" >Bank : ' . $company['bank_name'] . '(' . $company['bank_ifsc_code'] . ') </li>';
		}
		if (isset($company['bank_branch']) && strlen($company['bank_branch']) > 0) {
			$html .= '<li style="font-size:11px" >Branch/Address : ' . $company['bank_branch'] . ' </li>';
		}

		$html .= '</ul></div>
					</div>
					<div id="purchase_ordr">				
						<div class="fourty left">
							<br><br><br><br><br>
							<h3 style="margin-left: -18px;margin-top: 10%;"> <strong>Party Signature</strong> </h3>
						</div>

						<div class="seventee right align-right" style="text-align:right; margin:10px;">
							
						<h3><strong>For ';
		if (isset($company['trade_name'])) {
			$html .= $company['trade_name'];
		}
		$html .= '</strong></h3>';

		$company_sign = $company['company_sign'];
		if (file_exists($company_sign)) {
			$sign12 = base_url() . $company['company_sign'];
			$html .= '<img class="sign img " src="' . $sign12 . '" style=""  alt="logo">';
		}
		$html .= '<h3 class=""> <strong>Authorised Signatory</strong> <h3>
						</div>
					</div>
					</div>
			</body>
		</html>';

		$mpdf = new mPDF('c', 'A4', '', '', 10, 10, 30, 16, 8, 8);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
		$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
		$mpdf->defaultheaderfontsize = 12;  /* in pts */
		$mpdf->defaultheaderfontstyle = B;  /* blank, B, I, or BI */
		$mpdf->defaultheaderline = 1;   /* 1 to include line below header/above footer */
		$mpdf->defaultfooterfontsize = 12;  /* in pts */
		$mpdf->defaultfooterfontstyle = B;  /* blank, B, I, or BI */
		$mpdf->defaultfooterline = 1;   /* 1 to include line below header/above footer */
		$mpdf->SetProtection(array('print'));
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$stylesheet = file_get_contents('assets/mpdf/mpdfstyletables.css');
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML($html);
		// $mpdf->Output();
		$mpdf->Output("Purchase_Order_$porderId.pdf", 'I');
	}
}
