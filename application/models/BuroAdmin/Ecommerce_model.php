<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }
// ------------------------------------------- Display List of orders ----------------------------
         public function order_list()
         {
            $data = $this->db->query("SELECT * FROM `tbl_order` ORDER BY order_id DESC")->result();
            $order_array=array();
            foreach ($data as $value) 
            {
                $customer_id = $value->customer_id;
                $order_by_id = $value->order_by_id;
                $order_status_id = $value->order_status_id;
                if ($value->order_by=='Customer')
                {
                    $cust_name = $this->db->query("SELECT company_name FROM `tbl_customer` WHERE `customer_id`='$order_by_id'")->row();
                    $orderby_name = $cust_name->company_name;
                    $customer_name = $cust_name->company_name;
                }
                else
                {
                     $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$order_by_id'")->row();
                     $orderby_name = $emp_name->name;
                     $cust_name1 = $this->db->query("SELECT company_name FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                     $customer_name = $cust_name1->company_name;
                }

                 $status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();
                 $array = array
                 (
                    'order_id'=>$value->order_id,
                    'invoice_no'=>$value->invoice_no,
                    'total'=>$value->total,
                    'status'=>$status->name,
                    'order_by'=>$orderby_name,
                    'customer_name'=>$customer_name,
                    'order_date'=>$value->created_date
                 );

                 array_push($order_array, $array);
            }
            return $order_array;
         }


         public function OrderReport($type)
         {

            if($type=='Booked')
            {
              $data = $this->db->query("SELECT * FROM `tbl_order` WHERE order_status_id='3'  ORDER BY order_id DESC ")->result();
            }
            else if($type=='Processed')
            {
              $data = $this->db->query("SELECT * FROM `tbl_order` WHERE order_status_id='4'   ORDER BY order_id DESC")->result();
            }
            else if($type=='Shipped')
            {
              $data = $this->db->query("SELECT * FROM `tbl_order`  WHERE order_status_id='5'  ORDER BY order_id DESC")->result();
            }
            else if($type=='Completed')
            {
              $data = $this->db->query("SELECT * FROM `tbl_order`  WHERE order_status_id='6'  ORDER BY order_id DESC")->result();
            }
            else if($type=='Canceled')
            {
              $data = $this->db->query("SELECT * FROM `tbl_order`  WHERE order_status_id='7'  ORDER BY order_id DESC")->result();
            }
            
            $order_array=array();
            foreach ($data as $value) 
            {
                $customer_id = $value->customer_id;
                $order_by_id = $value->order_by_id;
                $order_status_id = $value->order_status_id;

                if ($value->order_by=='Customer')
                {
                    $cust_name = $this->db->query("SELECT company_name FROM `tbl_customer` WHERE `customer_id`='$order_by_id'")->row();
                    $orderby_name = $cust_name->company_name;
                    $customer_name = $cust_name->company_name;
                }
                else
                {
                     $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$order_by_id'")->row();
                     $orderby_name = $emp_name->name;
                     $cust_name1 = $this->db->query("SELECT company_name FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                     $customer_name = $cust_name1->company_name;
                }

                 $status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();
                 $array = array
                 (
                    'order_id'=>$value->order_id,
                    'invoice_no'=>$value->invoice_no,
                    'total'=>$value->total,
                    'status'=>$status->name,
                    'order_by'=>$orderby_name,
                    'customer_name'=>$customer_name,
                    'order_date'=>$value->created_date
                 );

                 array_push($order_array, $array);
            }
            return $order_array;
         }












         public function view_order($order_id)
         {
            $data = $this->db->query("SELECT * FROM `tbl_order` WHERE order_id='$order_id'")->result();
            $order_array=array();
            foreach ($data as $value) 
            {
                $customer_id = $value->customer_id;
                $order_by_id = $value->order_by_id;
                $order_status_id = $value->order_status_id;

                if ($value->order_by=='Customer')
                {
                    $cust_name = $this->db->query("SELECT company_name, email, phone_no, address, city, state, country FROM `tbl_customer` WHERE `customer_id`='$order_by_id'")->row();
                    $orderby_name = $cust_name->company_name;
                    $customer_name = $cust_name->company_name;
                    $email = $cust_name->email;
                    $phone_no = $cust_name->phone_no;
                    $address = $cust_name->address;
                    $city = $cust_name->city;
                    $state = $cust_name->state;
                    $country = $cust_name->country;
                }
                else
                {
                     $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$order_by_id'")->row();
                     $orderby_name = $emp_name->name;
                     $cust_name1 = $this->db->query("SELECT company_name, email, phone_no, address, city, state, country FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                     $customer_name = $cust_name1->company_name;
                     $email = $cust_name1->email;
                     $phone_no = $cust_name1->phone_no;
                     $address = $cust_name1->address;
                     $city = $cust_name1->city;
                     $state = $cust_name1->state;
                     $country = $cust_name1->country;
                }

                 $status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();

                 $array = array
                 (
                    'order_id'=>$value->order_id,
                    'invoice_no'=>$value->invoice_no,
                    'total'=>$value->total,
                    'status'=>$status->name,
                    'order_by'=>$orderby_name,
                    'customer_name'=>$customer_name,
                    'email'=>$email,
                    'phone_no'=>$phone_no,
                    'address'=>$address,
                    'city'=>$city,
                    'state'=>$state,
                    'country'=>$country,
                    'order_date'=>$value->created_date
                 );

                 array_push($order_array, $array);
            }
            // print_r($order_array);
            return $order_array;
         }
// -----------------------------------------------------------------------------------------
// ---------------------------- particular order product list -------------------

         public function order_product_list($order_id)
         {
            $data = $this->db->query("SELECT * FROM `tbl_order_product` WHERE order_id='$order_id'")->result();
            $orderproduct_array=array();
            $total_all='';
            foreach ($data as $value) 
            {
                $product_id = $value->product_id;
                $product_name = $value->product_name;

                 $product_uom = $this->db->query("SELECT prdsrv_uom FROM `tbl_product_service_list` WHERE `prd_srv_id`='$product_id'")->row();
                 $uomid = $product_uom->prdsrv_uom;
                 $uom = $this->db->query("SELECT uom_type FROM `tbl_uom` WHERE `uom_id`='$uomid'")->row();
                 $total = $value->price*$value->quantity;
                 $total1 = $total.'.00';
                 $total_all=$total_all+$total1.'.00';
                 $array = array
                 (
                    'product_name'=>$product_name,
                    'prdsrv_uom'=>$uom->uom_type,
                    'price'=>$value->price,
                    'total'=>$total1,
                    'sub_total'=>$total_all,
                    'quantity'=>$value->quantity
                 );

                 array_push($orderproduct_array, $array);
            }
            return $orderproduct_array;
         }
// ---------------------------------------------------------------------------
// ------------------------------- particular order history --------------------------------
         public function product_orderhistory($order_id)
         {
            $data = $this->db->query("SELECT * FROM `tbl_order_history` WHERE order_id='$order_id' ORDER BY order_history_id DESC")->result();
            $orderstatus_array=array();
            foreach ($data as $value) 
            {
                $order_status_id = $value->order_status_id;
                $product_name = $value->product_name;

                 $order_status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();
                 $status = $order_status->name;

                 $array = array
                 (
                    'status'=>$status,
                    'notify'=>$value->notify,
                    'date_added'=>$value->date_added,
                    'comment'=>$value->comment
                 );

                 array_push($orderstatus_array, $array);
            }
            return $orderstatus_array;
         }

// ------------------------------- Order Status List --------------------------------

         public function order_status($order_id)
         {
            return $this->db->query("SELECT order_status_id, name FROM `tbl_order_status` WHERE  status='1' ")->result();
         }

// ------------------------------- Change Order Status --------------------------------
         public function change_order_status($formdata)
         {
            $date=date("Y-m-d H:i:s");
            $notify = $formdata['notify'];
            if (isset($notify)) 
            {
                        $order_id = $formdata['ord_id'];
                        $comment = $formdata['comment'];
                        if ($comment!='')
                        {
                                 $order_status_id= $formdata['order_status_id'];
                                 $order_status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();
                                 $status = $order_status->name;

                                $custid = $this->db->query("SELECT customer_id FROM `tbl_order` WHERE `order_id`='$order_id'")->row();
                                $customer_id = $custid->customer_id;
                                $cust_androidid = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                $reg_token = $cust_androidid->android_id;
                                // $reg_token = $android_id;
                                $data = array('server_notification'=>"order_notification",'message'=>$comment,'order_status'=>$status,'order_message'=>'Your order has been $status');
                                $target = $reg_token; 
                                $url = 'https://fcm.googleapis.com/fcm/send';
                                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                $fields = array();
                                $fields['data'] = $data;
                                if(is_array($target))
                                {
                                  $fields['registration_ids'] = $target;
                                }
                                else
                                {
                                  $fields['to'] = $target;
                                }
                                $headers = array(
                                  'Content-Type:application/json',
                                  'Authorization:key='.$server_key
                                );

                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                                $result = curl_exec($ch);
                                if ($result === FALSE) 
                                {
                                    die('FCM Send Error: ' . curl_error($ch));
                                }
                                else
                                {
                                    $notify_cust = 1;
                                     $array3 = array
                                                    (

                                                      'order_id' => $formdata['ord_id'],
                                                      'order_status_id' => $formdata['order_status_id'],
                                                      'notify' => $notify_cust,
                                                      'comment' => $formdata['comment'],
                                                      'date_added' => $date
                                                    );
                                            $this->db->insert('tbl_order_history',$array3);

                                            $this->db->set('order_status_id',$formdata['order_status_id']);
                                            $this->db->where('order_id',$formdata['ord_id']);
                                            $this->db->update("tbl_order");
                                }
                                curl_close($ch);
                        }
                        else
                        {
                          echo 2;
                        }

            }
            else
            {
                $notify_cust = 0;
               $array3 = array
                              (

                                'order_id' => $formdata['ord_id'],
                                'order_status_id' => $formdata['order_status_id'],
                                'notify' => $notify_cust,
                                'comment' => $formdata['comment'],
                                'date_added' => $date
                              );
                      $this->db->insert('tbl_order_history',$array3);

                      $this->db->set('order_status_id',$formdata['order_status_id']);
                      $this->db->where('order_id',$formdata['ord_id']);
                      $this->db->update("tbl_order");
            }
           
         }
// --------------------------------------------------- Order status -----------------------------

    public function get_data()
    {
      // $where=array();
      $this->db->where('status!=','2');
      return $this->db->get('tbl_order_status');
    }

    public function add_status($data) 
    {
      $date=date("Y-m-d H:i:s");
      $data1=array(
                      'name'=>$data['status_name'],
                      'date_created'=>$date
                  );

      $res=$this->db->insert('tbl_order_status',$data1);
      if($res)
      {
        echo 1;
      }
      else
      {
         echo 0;
      }
    }

    public function delete_status($status_id) 
    {
        $this->db->set('status',2);
        $this->db->where('order_status_id',$status_id);
        $this->db->update('tbl_order_status');
    }

    public function edit_status($status_id) 
    {
        $this->db->where('order_status_id',$status_id);
        return $this->db->get('tbl_order_status');
    }

    public function Edit_Add_status($data,$image) 
    {

        $this->db->set('name',$data['status_name']);
        $this->db->where('order_status_id',$data['order_status_id']);
        $data = $this->db->update('tbl_order_status');
        $data1 = $this->db->affected_rows($data) > 0;
        if($data1)
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function deactivate($id)
    {   
       $this->db->set('status',0);
       $this->db->where('order_status_id',$id);
       return $this->db->update('tbl_order_status');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('order_status_id',$id);
        return $this->db->update('tbl_order_status');
    }
// -----------------------------------------------------------------------------------------
} 
