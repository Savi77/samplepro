
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Case_studies_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_list()
    {
        return $this->db->get('tbl_case_studies')->result();
    }


    public function add($formdata, $imageone , $imagetwo)
    {

        $cur_date_one = date("dmyHis");
        $sepext_one = explode('.', strtolower($imageone));
        $extension_one = end($sepext_one);
        $store_file_one = $cur_date_one . ".$extension_one";
        $move_file_one = FCPATH . 'assets/admin/assets/images/Case_Studies/';
        $move_file_1 = $move_file_one . basename($store_file_one);

        $cur_date_two = date("dmyHis");
        $sepext_two = explode('.', strtolower($imageone));
        $extension_two = end($sepext_two);
        $store_file_two = $cur_date_two . ".$extension_two";
        $move_file_two = FCPATH . 'assets/admin/assets/images/Case_Studies/';
        $move_file_2 = $move_file_two . basename($store_file_two);

        $created_date=date('Y-m-d H:i:s');
        if ($formdata['case_date']!='') 
        {
            $case_date1 = str_replace(',', ' ', $formdata['case_date']);
            $case_date = date("Y-m-d", strtotime($case_date1));
        }
        else 
        {
            $case_date = '';
        }

        $data = array(
            'image_one' => $store_file_one,
            'image_two' => $store_file_two,
            'case_studies_name' => $formdata['case_studies_name'],
            'competitor_analysis' => $formdata['competitor_analysis'],
            'core_development' => $formdata['core_development'],
            'define_your_choices' => $formdata['define_your_choices'],
            'client' => $formdata['client'],
            'category' => $formdata['category'],
            'case_date' => $case_date,
            'facebook_link' => $formdata['facebook_link'],
            'twitter_link' => $formdata['twitter_link'],
            'pinterest_Link' => $formdata['pinterest_Link'],
            'instagram_link' => $formdata['instagram_link'],
            'live_link' => $formdata['live_link'],
            'status' => 1 ,
            'date_created' => $created_date
        );
        $res = $this->db->insert('tbl_case_studies', $data);
        if ($res) {
            move_uploaded_file($_FILES['fileupone']['tmp_name'], $move_file_1);
            move_uploaded_file($_FILES['fileuptwo']['tmp_name'], $move_file_2);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function edit($case_studies_id)
    {
        $where = array('case_studies_id' => $case_studies_id);
        $this->db->where($where);
        return  $this->db->get('tbl_case_studies');
    }

    public function delete($case_studies_id)
    {
        $this->db->where('case_studies_id', $case_studies_id);
        return $this->db->delete('tbl_case_studies');
    }

    public function update($formdata, $image_one , $image_two)
    {
        if ($formdata['case_date']!='') 
        {
            $case_date1 = str_replace(',', ' ', $formdata['case_date']);
            $case_date = date("Y-m-d", strtotime($case_date1));
        }
        else 
        {
            $case_date = '';
        }

        if ($image_one != '' && $image_two != '' ) {
            $cur_date_one = date("dmyHis");
            $sepext_one = explode('.', strtolower($image_one));
            $extension_one = end($sepext_one);
            $store_file_one = $cur_date_one . ".$extension_one";
            $move_file_one = FCPATH . 'assets/admin/assets/images/Case_Studies/';
            $move_file_1 = $move_file_one . basename($image_one);

            $cur_date_two = date("dmyHis");
            $sepext_two = explode('.', strtolower($image_two));
            $extension_two = end($sepext_two);
            $store_file_two = $cur_date_two . ".$extension_two";
            $move_file_two = FCPATH . 'assets/admin/assets/images/Case_Studies/';
            $move_file_2 = $move_file_two . basename($image_two);

            $data = array(
                'image_one' => $image_one,
                'image_two' => $image_two,
                'case_studies_name' => $formdata['case_studies_name'],
                'competitor_analysis' => $formdata['competitor_analysis'],
                'core_development' => $formdata['core_development'],
                'define_your_choices' => $formdata['define_your_choices'],
                'client' => $formdata['client'],
                'category' => $formdata['category'],
                'case_date' => $case_date,
                'facebook_link' => $formdata['facebook_link'],
                'twitter_link' => $formdata['twitter_link'],
                'pinterest_Link' => $formdata['pinterest_Link'],
                'instagram_link' => $formdata['instagram_link'],
                'live_link' => $formdata['live_link'],
                'status' => 1 ,
            );
            $this->db->where('case_studies_id',$formdata['case_studies_id']);
            $res = $this->db->update('tbl_case_studies', $data);
            if ($res) {
                move_uploaded_file($_FILES['fileupone']['tmp_name'], $move_file_1);
                move_uploaded_file($_FILES['fileuptwo']['tmp_name'], $move_file_2);
                echo 1;
            } else {
                echo 0;
            }
        }
        if ($image_one != '') {
            $cur_date = date("dmyHis");
            $sepext = explode('.', strtolower($image_one));
            $extension = end($sepext);
            $store_file = $cur_date . ".$extension";
            $move_file = FCPATH . 'assets/admin/assets/images/Case_Studies/';
            $move_file1 = $move_file . basename($image_one);
            $this->db->where('case_studies_id', $formdata['work_id']);

            $data = array(
                'image_one' => $image_one,
                'case_studies_name' => $formdata['case_studies_name'],
                'competitor_analysis' => $formdata['competitor_analysis'],
                'core_development' => $formdata['core_development'],
                'define_your_choices' => $formdata['define_your_choices'],
                'client' => $formdata['client'],
                'category' => $formdata['category'],
                'case_date' => $case_date,
                'facebook_link' => $formdata['facebook_link'],
                'twitter_link' => $formdata['twitter_link'],
                'pinterest_Link' => $formdata['pinterest_Link'],
                'instagram_link' => $formdata['instagram_link'],
                'live_link' => $formdata['live_link'],
                'status' => 1 ,
            );
            $this->db->where('case_studies_id',$formdata['case_studies_id']);
            $res = $this->db->update('tbl_case_studies', $data);
            if ($res) {
                move_uploaded_file($_FILES['fileupone']['tmp_name'], $move_file1);
                echo 1;
            } else {
                echo 0;
            }
        }else if ($image_two != '') {
            $cur_date = date("dmyHis");
            $sepext = explode('.', strtolower($image_two));
            $extension = end($sepext);
            $store_file = $cur_date . ".$extension";
            $move_file = FCPATH . 'assets/admin/assets/images/Case_Studies/';
            $move_file1 = $move_file . basename($image_two);
            
            $data = array(
                'image_two' => $image_two,
                'case_studies_name' => $formdata['case_studies_name'],
                'competitor_analysis' => $formdata['competitor_analysis'],
                'core_development' => $formdata['core_development'],
                'define_your_choices' => $formdata['define_your_choices'],
                'client' => $formdata['client'],
                'category' => $formdata['category'],
                'case_date' => $case_date,
                'facebook_link' => $formdata['facebook_link'],
                'twitter_link' => $formdata['twitter_link'],
                'pinterest_Link' => $formdata['pinterest_Link'],
                'instagram_link' => $formdata['instagram_link'],
                'live_link' => $formdata['live_link'],
                'status' => 1 ,
            );
            $this->db->where('case_studies_id',$formdata['case_studies_id']);
            $res = $this->db->update('tbl_case_studies', $data);
            if ($res) {
                move_uploaded_file($_FILES['fileuptwo']['tmp_name'], $move_file1);
                echo 1;
            } else {
                echo 0;
            }

        } else {
            $data = array(
                'case_studies_name' => $formdata['case_studies_name'],
                'competitor_analysis' => $formdata['competitor_analysis'],
                'core_development' => $formdata['core_development'],
                'define_your_choices' => $formdata['define_your_choices'],
                'client' => $formdata['client'],
                'category' => $formdata['category'],
                'case_date' => $case_date,
                'facebook_link' => $formdata['facebook_link'],
                'twitter_link' => $formdata['twitter_link'],
                'pinterest_Link' => $formdata['pinterest_Link'],
                'instagram_link' => $formdata['instagram_link'],
                'live_link' => $formdata['live_link'],
                'status' => 1 ,
            );
            $this->db->where('case_studies_id',$formdata['case_studies_id']);
            $res = $this->db->update('tbl_case_studies', $data);
            if ($res) {
                echo 1;
            } else {
                echo 0;
            }
            
        }
    }

    //----------------------------------------------------------

    public function deactivate1($case_studies_id)
    {
        $this->db->set('status', 0);
        $this->db->where('case_studies_id', $case_studies_id);
        $this->db->update('tbl_case_studies');
    }

    public function activate1($case_studies_id)
    {
        $this->db->set('status', 1);
        $this->db->where('case_studies_id', $case_studies_id);
        $this->db->update('tbl_case_studies');
    }
}

?>


