<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyRegistrationModel extends CI_Model 
{

  public function __construct() 
    {
      parent::__construct();

      $this->load->dbforge();
    }

    public function InsertDataCompany($formdata)
    {
        require("Database/xmlapi.php"); // Cpanel API 
        $org_access_url=substr($formdata['org_cname'],0,5);
        $this->db->where('org_access_url',$org_access_url);
        $res=$this->db->get('tbl_organisation')->result();
        $rescount=count($res);

        if($rescount>0)
        {
           echo 0;
        }
        else
        {

            $db_prefix="";
            $StartLettersCopmany=trim($org_access_url);
            $databasename=$db_prefix."BURO_".$StartLettersCopmany;
            $InsertArray=array( 
                                'org_cname'=>$formdata['org_cname'],
                                'org_database'=>$databasename,
                                'plan_id'=>$formdata['plan_id'],                             
                                'org_access_url'=>$org_access_url,
                                'org_cdomain'=>$formdata['org_cdomain'],
                                'org_fname'=>$formdata['org_fname'],
                                'org_lname'=>$formdata['org_lname'],
                                'org_email'=>$formdata['org_email'],
                                'org_contact'=>$formdata['org_contact'],
                                'org_address'=>$formdata['org_address'],
                                'org_country'=>$formdata['org_country'],
                                'org_state'=>$formdata['org_state'],
                                'org_city'=>$formdata['org_city'],
                                'org_postcode'=>$formdata['org_postcode'],
                                'date_created'=>date("Y-m-d H:i:s")
                             );
            $this->db->Insert('tbl_organisation',$InsertArray);
            $org_id = $this->db->insert_id();

            $cipher = "aes-128-gcm";
            if (in_array($cipher, openssl_get_cipher_methods()))
            {
                $ivlen = openssl_cipher_iv_length($cipher);
                $iv = openssl_random_pseudo_bytes($ivlen);
                $cpaneluser_encrypt ="";
                $cpanelpassword_encrypt ="";
                $cpanelhost_encrypt ="";
                $cpanelusr= openssl_decrypt($cpaneluser_encrypt, $cipher, $key, $options=0, $iv, $tag);
                $cpanelpass= openssl_decrypt($cpanelpassword_encrypt, $cipher, $key, $options=0, $iv, $tag);
                $cpanel_host=openssl_decrypt($cpanelhost_encrypt, $cipher, $key, $options=0, $iv, $tag);
            } 

            $cpanelusr = '';
            $cpanelpass = '';
            $xmlapi2 = new xmlapi('');

            $xmlapi2->set_port( 2083 );
            $xmlapi2->password_auth($cpanelusr,$cpanelpass);
            $xmlapi2->set_debug(0); //output actions in the error log 1 for true and 0 false 

            //the actual $databasename and $databaseuser will contain the cpanel prefix for a particular account. Ex: prefix_dbname and prefix_dbuser
            // $databasename = '';
            $databaseuser = $this->db->username; //be careful this can only have a maximum of 7 characters
            $databasepass = $this->db->password;

             $createdb = $xmlapi2->api1_query($cpanelusr, "Mysql", "adddb", array($databasename)); //creates the database
            // $usr = $xmlapi2->api1_query($cpanelusr, "Mysql", "adduser", array($databaseuser, $databasepass)); //creates the user
             $addusr = $xmlapi2->api1_query($cpanelusr, "Mysql", "adduserdb", array("".$databasename."", "".$databaseuser."", 'all')); //gives all privileges to the newly created user on the new db
     

            // sql to create table -----------------------------------------------
              $filename = 'Database/UploadDb.sql';
              $mysql_host = $this->db->hostname;
              $mysql_username =$this->db->username;
              $mysql_password = $this->db->password;
              $mysql_database = $databasename;

              // Connect to MySQL server
              $con = @new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);
              // Check connection
              if ($con->connect_errno) 
              {
                echo "Failed to connect to MySQL: " . $con->connect_errno;
                echo "<br/>Error: " . $con->connect_error;
              }
             
              $templine = '';
              $lines = file($filename);
              foreach ($lines as $line)
               {
                  if (substr($line, 0, 2) == '--' || $line == '')
                  continue;
                  $templine .= $line;
                  if (substr(trim($line), -1, 1) == ';') 
                  {
                    $con->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $con->error() . '<br /><br />');
                    $templine = '';
                  }
               }

               $org_fullname=$formdata['org_fname'].' '.$formdata['org_lname'];
               $org_email=$formdata['org_email'];
               $org_contact=$formdata['org_contact'];
               $password=$formdata['password'];
               $plan_id=$formdata['plan_id'];
               $timestamp=date("Y-m-d H:i:s");
               $admin_login_insert="INSERT INTO `tbl_admin_login` (`id`, `name`, `Password`, `email`, `mobile_no`, `profile_img`, `user_type`, `user_status`, `forgot_pass`, `android_id`, `imei`, `update_permission`, `schedule_view`, `timestamp`) 
                                                    VALUES(1, '$org_fullname', '$password', '$org_email', '$org_contact', '', 'SA', 1, '', '', '', 0, 0, '$timestamp') ";
               $con->query($admin_login_insert);
               $subscription_start_date=date("Y-m-d");
               $subscription_end_date=date("Y-m-d");
               $subscription_insert="INSERT INTO `tbl_plan_subscription`(`org_id`, `plan_id`, `module_ids`, `subscription_start_date`, `subscription_end_date`, `status`, `created_date`) 
                                                                 VALUES('$org_id', '$plan_id', '', '$subscription_start_date', '$subscription_end_date', 1,'$timestamp') ";
               $con->query($subscription_insert);
               echo 1;
               $con->close($con);
        }


    }







}
