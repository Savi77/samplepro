<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminauthentication extends CI_Model
 {
 	 function __construct()
	  {
	    parent::__construct(); // construct the Model class
	    $this->load->database();
	  }

    //---------------------------------------------------------------------------------
	 public function check_user($username,$password)
		{
			$res=$this->db->query(" SELECT count(id) as count FROM `tbl_admin_login` WHERE `email`='$username' and `Password`='$password' and user_type='BA' ")->row();
			
  	 		$count=$res->count;
  			if($count==1)
  			{
  				$res1=$this->db->query(" SELECT *  FROM `tbl_admin_login` WHERE `email`='$username' ")->row();
  			   	$user_array=array(
				  			   		'id'=>$res1->id,
				  			   		'admin_id'=>$res1->id,
				  			   		'name'=>$res1->name,
				  			   		'username'=>$res1->email,
				  			   		'user_type'=>$res1->user_type,
				  			   		'user_status'=>$res1->user_status,
				  			   		'schedule_view' => $res1->schedule_view,
				  			   		'update_permission' => $res1->update_permission
				  			   	);
  			   	// print_r($user_array);
  			   	$this->session->set_userdata($user_array);
  			   	echo 1;
  			}
  			else
  			{
		   	    echo 0;
  			}
	    }
}

