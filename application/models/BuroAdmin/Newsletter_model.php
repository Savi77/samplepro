<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends CI_Model
 {
 	
 	 function __construct()
	  {
	    parent::__construct(); // construct the Model class
	    $this->load->database();
	  }

	//fetch_subscribed_user------------------------------------
		  public function fetch_subscribed_user()
		  {
		  	$country_code=$this->session->country_code;
		  	return $this->db->query(" SELECT * FROM `tbl_newsletter` WHERE country_code='$country_code'  ");
		  }
	// fetch_register_user -----------------------------------
		  public function fetch_register_user()
		  {
		  	$country_code=$this->session->country_code;
		  	return $this->db->query(" SELECT * FROM `tbl_newsletter` WHERE country_code='$country_code'   ");
		  }
	//--------------------------------------------------------

	   public function sendmail($content,$register)
		{
			$country_code=$this->session->country_code;
			  	if($registe==1)
			  	{
				  	$data=$this->db->query(" SELECT `email` FROM tbl_newsletter where  country_code='$country_code'
				  	 UNION  SELECT `email` FROM tbl_register where  country_code='$country_code'  ");
				  	foreach ($data->result() as $value)
				  	 {
				  	 	$receipent=$value->email;
				  	 	$red_url='u_email='.$receipent;
						$Subject = "WhyNotReferMe Newsletter";
			            $message_text ="$content";
			            $message_text .="If you are no longer interested, you can <a href='https://www.whynotreferme.com/index.php/admin/Newsletter/unsubscribe/?$red_url'> Unsubscribe </a> instantly.
				                         ";
						// Always set content-type when sending HTML email
					    $headers2 = "MIME-Version: 1.0" . "\r\n";
					    $headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					    $headers2 .= 'From: WhyNotReferMe<noreply@whynotreferme.com>' . "\r\n";
		                mail($receipent,$Subject,$message_text,$headers2);
				     }

	     	  	}
			  	else
			  	{
				  	$data2=$this->db->query(" SELECT * FROM `tbl_newsletter`   ");
				  	foreach ($data2->result() as $value)
				  	 {
				  	 	$receipent=$value->email;

				  	 	$red_url='u_email='.$receipent;
				  	 	
						// $encr_link=base64_encode($red_url);

						// $mail->AddAddress($receipent);   // IMP : This is static email id. we need to change it later
						// $mail->Subject = "Request for Referrer $retailername";
						// $Subject = "Request for Referrer $retailername";
						// $message_text ="$content";
						//       $message_text .="<a href='http://localhost/Refermici/index.php/admin/Newsletter/unsubscribe/?$red_url'>
						//                     <button style='color:white;background-color:#1A7BC0;cursor:pointer;'>Unsubscribe</button>
						//                     </a>";

						//           $mail->Body=$message_text;
						//      if($mail->send())
						//      {
						//      	echo "sent";
						//      }

			        	$Subject = "WhyNotReferMe Newsletter";
			            $message_text ="$content";
			             $message_text .="If you are no longer interested, you can <a href='https://www.whynotreferme.com/index.php/admin/Newsletter/unsubscribe/?$red_url'> Unsubscribe </a> instantly.
				                         ";
			            // $message_text .="<a href='https://www.whynotreferme.com/index.php/admin/Newsletter/unsubscribe/?$red_url'>
				           //               <button style='color:white;background-color:#1A7BC0;cursor:pointer;'>Unsubscribe</button>
				           //               </a>";
						// Always set content-type when sending HTML email
					    $headers2 = "MIME-Version: 1.0" . "\r\n";
					    $headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					    $headers2 .= 'From: WhyNotReferMe<noreply@whynotreferme.com>' . "\r\n";
		                mail($receipent,$Subject,$message_text,$headers2);
				     }
				     // 
			  	}
        }
	//--------------------------------------------------------
         public function unsubscribe($QUERY_STRING)
		  {
		  		$this->db->where('email',$QUERY_STRING);
	  		    $this->db->delete('tbl_newsletter');
		  }
	//--------------------------------------------------------

}  