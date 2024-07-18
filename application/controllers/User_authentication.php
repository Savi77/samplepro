<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller
{
    function __construct()
     {
  	  	parent::__construct();
  		  $this->load->library('facebook');		//load facebook library
     }

   //facebook authentication -------------------
    public function index() 
    {
  		  $userData = array();
    		if($this->facebook->is_authenticated())
    		{
  			      // Get user facebook profile details
        	    $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,picture');
              $userData['register_with'] = 'facebook';
              $userData['firstname'] = $userProfile['first_name'];
              $userData['lastname'] = $userProfile['last_name'];
              $userData['email'] = $userProfile['email'];
              
                  
              $userData = array(
                                  'session_firstname'=>$userProfile['first_name'],
                                  'session_lastname'=>$userProfile['last_name'],
                                  'session_email'=>$userProfile['email']
                                );
              $this->session->set_userdata($userData);
              redirect('CreateProfile');
    		}
    		else
  		   {
             $fbuser = '';
             $data['authUrl'] =  $this->facebook->login_url();
             $url=$data['authUrl'];
             redirect($url);
         }
    }

//---Google Authentication ------------------

      public function google_authentication()
      {
            include_once 'assets/libraries/Google/autoload.php';           
            $client_id = '126892173684-0cq90pcdk1qnvutiuhqi6fjk2drkda5u.apps.googleusercontent.com';
            $client_secret = 'v69Ju-tHl3B_5XTsMH1MLA1n'; 
            $redirect_uri = site_url('User_authentication/google_authentication');
            $client = new Google_Client();
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->addScope("email");
            $client->addScope("profile");
            $service = new Google_Service_Oauth2($client);
            if (isset($_GET['code'])) 
            {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
                header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                exit;
            }
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) 
            {
               $client->setAccessToken($_SESSION['access_token']);
            } 
            else 
            {
               $authUrl = $client->createAuthUrl();
            }
            if (isset($authUrl))
            {
              redirect($authUrl);
            } 
            else
             {
                  $user = $service->userinfo->get(); 
                  $userData = array(
                                      'session_firstname'=>$user->given_name,
                                      'session_lastname'=>$user->family_name,
                                      'session_email'=>$user->email
                                    );
                  $this->session->set_userdata($userData);
                  redirect('CreateProfile');
           }
      } 




}
