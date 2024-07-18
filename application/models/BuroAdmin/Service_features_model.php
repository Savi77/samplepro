
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service_features_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_list()
    {
        return $this->db->get('tbl_service_feature')->result();
    }

    public function get_data()
    {
        $where = array('section' => 'service_features');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }

    public function Update_header($formdata)
    {
        $where = array('section' => 'service_features');
        $this->db->where($where);
        $data = array(
            'title' => $formdata['title'],
            'description' => $formdata['description']
        );
        $this->db->update('tbl_section_header', $data);
    }

    public function add($formdata, $image)
    {
        
        $cur_date = date("dmyHis");

        $sepext = explode('.', strtolower($image));
        $extension = end($sepext);
        $store_file = $cur_date . ".$extension";
        $move_file = FCPATH . 'assets/admin/assets/images/service_features/';
        $move_file1 = $move_file . basename($store_file);

        $config['upload_path'] = 'assets/admin/assets/images/service_features/';
		$config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        $image_one_name = '';
        $image_one_file = "image_one";
		if (!empty($_FILES[$image_one_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_one_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_one_name = $dataCheque['file_name'];
			}
		} 

        $image_two_name = '';
        $image_two_file = "image_two";
		if (!empty($_FILES[$image_two_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_two_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_two_name = $dataCheque['file_name'];
			}
		} 

        $image_three_name = '';
        $image_three_file = "image_three";
		if (!empty($_FILES[$image_three_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_three_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_three_name = $dataCheque['file_name'];
			}
		} 

        $image_four_name = '';
        $image_four_file = "image_four";
		if (!empty($_FILES[$image_four_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_four_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_four_name = $dataCheque['file_name'];
			}
		} 

        $image_five_name = '';
        $image_five_file = "image_five";
		if (!empty($_FILES[$image_five_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_five_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_five_name = $dataCheque['file_name'];
			}
		} 

        $image_six_name = '';
        $image_six_file = "image_six";
		if (!empty($_FILES[$image_six_file])) {
			$data = array();
			if (!$this->upload->do_upload($image_six_file)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataCheque = $this->upload->data();
				$image_six_name = $dataCheque['file_name'];
			}
		} 
       
        $data = array(
            'image_one' => $image_one_name,
            'image_two' => $image_two_name,
            'image_three' => $image_three_name,
            'image_four' => $image_four_name,
            'image_five' => $image_five_name,
            'image_six' => $image_six_name,

            'tilte_one' => $formdata['tilte_one'],
            'tilte_two' => $formdata['tilte_two'],
            'tilte_three' => $formdata['tilte_three'],
            'tilte_four' => $formdata['tilte_four'],
            'title_five' => $formdata['title_five'],
            'title_six' => $formdata['title_six'],

            'detail_content_one' => $formdata['detail_content_one'],
            'detail_content_two' => $formdata['detail_content_two'],
            'detail_content_three' => $formdata['detail_content_three'],
            'detail_content_four' => $formdata['detail_content_four'],
            'detail_content_five' => $formdata['detail_content_five'],
            'detail_content_six' => $formdata['detail_content_six'],

            'title' => $formdata['title'],
            'description' => $formdata['title_description'],
            'image' => $store_file,
        );

        $res = $this->db->insert('tbl_service_feature', $data);
        if ($data) {
            move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        return  $this->db->get('tbl_service_feature');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_service_feature');
    }

    public function update($formdata, $image)
    {
        /* if ($image == '') {
            $data = array(
                'title' => $formdata['title'],
                'description' => $formdata['title_description'],

                'tilte_one' => $formdata['tilte_one'],
                'tilte_two' => $formdata['tilte_two'],
                'tilte_three' => $formdata['tilte_three'],
                'tilte_four' => $formdata['tilte_four'],
                'title_five' => $formdata['title_five'],
                'title_six' => $formdata['title_six'],

                'detail_content_one' => $formdata['detail_content_one'],
                'detail_content_two' => $formdata['detail_content_two'],
                'detail_content_three' => $formdata['detail_content_three'],
                'detail_content_four' => $formdata['detail_content_four'],
                'detail_content_five' => $formdata['detail_content_five'],
                'detail_content_six' => $formdata['detail_content_six'],
            );
            $this->db->where('id', $formdata['work_id']);
            $this->db->update('tbl_service_feature', $data);
            return 1;
        } else { */
            $config['upload_path'] = 'assets/admin/assets/images/service_features/';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            $fileup_name = '';
            $fileup_file = "fileup";
            if (!empty($_FILES[$fileup_file])) {
                $data = array();
                if (!$this->upload->do_upload($fileup_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $fileup_name = $dataCheque['file_name'];
                }
            } 
            if ($fileup_name != '') {
                $this->db->set('image',$fileup_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $image_one_name = '';
            $image_one_file = "image_one";
            if (!empty($_FILES[$image_one_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_one_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_one_name = $dataCheque['file_name'];
                }
            } 

            if ($image_one_name != '') {
                $this->db->set('image_one',$image_one_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $image_two_name = '';
            $image_two_file = "image_two";
            if (!empty($_FILES[$image_two_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_two_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_two_name = $dataCheque['file_name'];
                }
            } 
            if ($image_two_name != '') {
                $this->db->set('image_two',$image_two_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }
            
            $image_three_name = '';
            $image_three_file = "image_three";
            if (!empty($_FILES[$image_three_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_three_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_three_name = $dataCheque['file_name'];
                }
            } 
            if ($image_three_name != '') {
                $this->db->set('image_three',$image_three_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $image_four_name = '';
            $image_four_file = "image_four";
            if (!empty($_FILES[$image_four_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_four_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_four_name = $dataCheque['file_name'];
                }
            } 
            if ($image_four_name != '') {
                $this->db->set('image_four',$image_four_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $image_five_name = '';
            $image_five_file = "image_five";
            if (!empty($_FILES[$image_five_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_five_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_five_name = $dataCheque['file_name'];
                }
            } 
            if ($image_five_name != '') {
                $this->db->set('image_five',$image_five_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $image_six_name = '';
            $image_six_file = "image_six";
            if (!empty($_FILES[$image_six_file])) {
                $data = array();
                if (!$this->upload->do_upload($image_six_file)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $dataCheque = $this->upload->data();
                    $image_six_name = $dataCheque['file_name'];
                }
            } 
            if ($image_six_name != '') {
                $this->db->set('image_six',$image_six_name);
                $this->db->where('id', $formdata['work_id']);
                $this->db->update('tbl_service_feature');    
            }

            $data = array(
                'title' => $formdata['title'],
                'description' => $formdata['title_description'],

                'tilte_one' => $formdata['tilte_one'],
                'tilte_two' => $formdata['tilte_two'],
                'tilte_three' => $formdata['tilte_three'],
                'tilte_four' => $formdata['tilte_four'],
                'title_five' => $formdata['title_five'],
                'title_six' => $formdata['title_six'],

                'detail_content_one' => $formdata['detail_content_one'],
                'detail_content_two' => $formdata['detail_content_two'],
                'detail_content_three' => $formdata['detail_content_three'],
                'detail_content_four' => $formdata['detail_content_four'],
                'detail_content_five' => $formdata['detail_content_five'],
                'detail_content_six' => $formdata['detail_content_six'],
            );
            $this->db->where('id', $formdata['work_id']);
            $this->db->update('tbl_service_feature', $data);
            // move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
            return 1;
        // }
    }

    //----------------------------------------------------------

    public function deactivate1($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('tbl_service_feature');
    }

    public function activate1($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('tbl_service_feature');
    }
}

?>


