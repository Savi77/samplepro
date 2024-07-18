<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Feature extends CI_Controller
{


  public function index()
  {
    if (isset($this->session->id)) {
      // Geofence Notification ---------------------------
      $this->load->model('BuroAdmin/Dashboard_model');
      $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
      //------------------------------------------------
      $this->load->model('BuroAdmin/Feature_model');
      $data['array_sfeature'] = $this->Feature_model->manage_feature();
      $data['get_data'] = $this->Feature_model->get_data();
      $data['sidebar'] = array('menu' => "s_features");
      $this->load->view('BuroAdmin/super_feature_view', $data);
    } else {
      redirect('BuroAdminLogin');
    }
  }

  public function add()
  {
    if (isset($this->session->id)) {
      $this->load->model('BuroAdmin/Feature_model');
      $formdata = $this->input->post();
      $fileup = $_FILES['fileup']['name'];
      $this->Feature_model->add($formdata, $fileup);
    } else {
      redirect('BuroAdminLogin');
    }
  }

  public function delete_feature()
  {
    if (isset($this->session->id)) {
      $this->load->model('BuroAdmin/Feature_model');
      $featureid = $this->input->post('featureid');
      $data = $this->Feature_model->delete_feature($featureid);
      if ($data) {
        echo "1";
      } else {
        echo "0";
      }
    } else {
      redirect('BuroAdminLogin');
    }
  }


  public function edit_feature()
  {
    // geofence Notification ---------------------------
    $this->load->model('BuroAdmin/Dashboard_model');
    $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
    //------------------------------------------------

    $this->load->model('BuroAdmin/Feature_model');
    $featureid = $this->input->post('featureid');
    $data['edit_feature'] = $this->Feature_model->edit_feature($featureid);
    $this->load->view('BuroAdmin/edit_feature_view', $data);
  }

  public function Edit_Add_feature()
  {
    if (isset($this->session->id)) {
      $this->load->model('BuroAdmin/Feature_model');
      $formdata = $this->input->post();
      $fileup = $_FILES['fileup']['name'];
      $this->Feature_model->Edit_Add_feature($formdata, $fileup);
    } else {
      redirect('BuroAdminLogin');
    }
  }


  public function deactivate()
  {
    if (isset($this->session->id)) {
      $id = $_REQUEST['featureid'];
      $this->load->model('BuroAdmin/Feature_model');
      $data = $this->Feature_model->deactivate($id);
      if ($data) {
        echo "1";
      } else {
        echo "0";
      }
    } else {
      redirect('BuroAdminLogin');
    }
  }

  public function activate()
  {
    if (isset($this->session->id)) {
      $id = $_REQUEST['featureid'];
      $this->load->model('BuroAdmin/Feature_model');
      $data = $this->Feature_model->activate($id);
      if ($data) {
        echo "1";
      } else {
        echo "0";
      }
    } else {
      redirect('BuroAdminLogin');
    }
  }

  public function Update_header()
  {
    if (isset($this->session->id)) {
      $image = $_FILES['fileupFeature']['name'];
      $formdata = $this->input->post();
      $this->load->model('BuroAdmin/Feature_model');
      $this->Feature_model->Update_header($formdata,$image);
    } else {
      redirect('BuroAdminLogin');
    }
  }
}
