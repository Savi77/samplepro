<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

   public function get_data()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->or_where('org_id',0);
        $this->db->from('tbl_schedule_type');
        $this->db->order_by("schedule_id", "desc");
        return $this->db->get();

        // $final_array = array();
        // $this->db->where('delete_status',0);
        // $this->db->where('org_id',$this->session->org_id);
        // $this->db->from('tbl_schedule_type');
        // $this->db->order_by("schedule_id", "desc");
        // $data = $this->db->get()->result();

        // $this->db->where('delete_status',0);
        // $this->db->where('org_id',1);
        // $this->db->where('title','Case');
        // $this->db->or_where('title','Task');
        // $this->db->or_where('title','Own');
        // $this->db->from('tbl_schedule_type');
        // $this->db->order_by("schedule_id", "desc");
        // $data1 = $this->db->get()->result();

        // $array1 = array(
        //     'schedule_id' => $data->schedule_id,
        //     'org_id' => $data->org_id,
        //     'title' => $data->title,
        //     'status' => $data->status,
        //     'delete_status' => $data->delete_status,
        //     'date_created' => $data->date_created,
        // );
        // array_push($final_array,$array1);

        // $array2 = array(
        //     'schedule_id' => $data1->schedule_id,
        //     'org_id' => $data1->org_id,
        //     'title' => $data1->title,
        //     'status' => $data1->status,
        //     'delete_status' => $data1->delete_status,
        //     'date_created' => $data1->date_created,
        // );
        // array_push($final_array,$array2);
        // echo "<pre>";
        // print_r($array2);
        // die;
        // return $data;
    }

    public function add_schedule($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'title'=>$data['schedule_type'],
                      'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                    );
        $res=$this->db->insert('tbl_schedule_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function delete_schedule($scheduletid) 
    {
        $this->db->where('schedule_id',$scheduletid);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_schedule_type');
    }
  
    public function edit_master($scheduleid) 
    {
        $this->db->where('schedule_id',$scheduleid);
        return $this->db->get('tbl_schedule_type');
    }

    public function edit_type($id) 
    {
        $this->db->where('id',$id);
        return $this->db->get('tbl_gallery_type');
    }


    public function Edit_Add_schedule($data) 
    {
        $this->db->set('title',$data['schedule_type']);
        $this->db->where('schedule_id',$data['schedule_id']);
        $data = $this->db->update('tbl_schedule_type');
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

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('schedule_id',$id);
       $this->db->update('tbl_schedule_type');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('schedule_id',$id);
        $this->db->update('tbl_schedule_type');
    }

    // ==============Branch Section ==================================

    public function get_branch()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_branch');
        // $this->db->order_by("name", "asc");
        $this->db->order_by("branch_id", "desc");
        return $this->db->get();
    }

    public function get_branch_report()
    {
       return $this->db->query("SELECT count(tbl_leads_opportunity.leadopp_id) AS bcount, tbl_branch.branch_id, tbl_branch.name AS bname, SUM(tbl_leads_opportunity.project_business_value) AS brevenuesum FROM tbl_leads_opportunity INNER JOIN tbl_branch ON tbl_leads_opportunity.branch_id = tbl_branch.branch_id where tbl_leads_opportunity.org_id = ".$this->session->org_id." AND tbl_leads_opportunity.branch_id = tbl_branch.branch_id GROUP BY tbl_leads_opportunity.branch_id");
    }

    public function get_branch_report_filter($formdata)
    {
        $customer_type = $formdata['customer_type'];
        
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {
                return $this->db->query("SELECT count(tbl_leads_opportunity.leadopp_id) AS bcount, tbl_branch.branch_id, tbl_branch.name AS bname, SUM(tbl_leads_opportunity.project_business_value) AS brevenuesum,  tbl_leads_opportunity.customer_type AS customer_type FROM tbl_leads_opportunity INNER JOIN tbl_branch ON tbl_leads_opportunity.branch_id = tbl_branch.branch_id where tbl_leads_opportunity.org_id = ".$this->session->org_id." AND tbl_leads_opportunity.branch_id = tbl_branch.branch_id GROUP BY tbl_leads_opportunity.branch_id");
            }
            else
            {
                return $this->db->query("SELECT count(tbl_leads_opportunity.leadopp_id) AS bcount, tbl_branch.branch_id, tbl_branch.name AS bname, SUM(tbl_leads_opportunity.project_business_value) AS brevenuesum, tbl_leads_opportunity.customer_type AS customer_type FROM tbl_leads_opportunity INNER JOIN tbl_branch ON tbl_leads_opportunity.branch_id = tbl_branch.branch_id where tbl_leads_opportunity.org_id = ".$this->session->org_id." AND tbl_leads_opportunity.branch_id = tbl_branch.branch_id AND tbl_leads_opportunity.customer_type = '" .$customer_type. "' GROUP BY tbl_leads_opportunity.branch_id");
            }
        }
        else
        {
            return $this->db->query("SELECT count(tbl_leads_opportunity.leadopp_id) AS bcount, tbl_branch.branch_id, tbl_branch.name AS bname, SUM(tbl_leads_opportunity.project_business_value) AS brevenuesum,  tbl_leads_opportunity.customer_type AS customer_type FROM tbl_leads_opportunity INNER JOIN tbl_branch ON tbl_leads_opportunity.branch_id = tbl_branch.branch_id where tbl_leads_opportunity.org_id = ".$this->session->org_id." AND tbl_leads_opportunity.branch_id = tbl_branch.branch_id GROUP BY tbl_leads_opportunity.branch_id");
        }
    }

    public function add_branch_data($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      
                       'org_id'=>$this->session->org_id,
                       'name'=>$data['branch_name'],
                       'date_created'=>$date
                );

        $res=$this->db->insert('tbl_branch',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function deactivate_branch($id)
    {   
       $this->db->set('status',0);
       $this->db->where('branch_id',$id);
       $this->db->update('tbl_branch');
    }

    public function activate_branch($id)
    {   
       $this->db->set('status',1);
       $this->db->where('branch_id',$id);
       $this->db->update('tbl_branch');
    }

    public function edit_branch($id) 
    {
        $this->db->where('branch_id',$id);
        return $this->db->get('tbl_branch');
    }

    public function Edit_Add_Branch($data) 
    {

        $this->db->set('name',$data['branch_name']);
        $this->db->where('branch_id',$data['branch_id']);

        $data = $this->db->update('tbl_branch');
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

    public function delete_branch($id) 
    {
        $this->db->where('branch_id',$id);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_branch');
    }
  
    // ============== group section ===================================

     public function get_groupdata()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_group');
        $this->db->order_by("group_id", "desc");
        return $this->db->get();
    }

    public function add_group($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'group_name'=>$data['group_name'],
                       'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_group',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_group($grouptid) 
    {
        $this->db->where('group_id',$grouptid);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_group');
    }
  

    public function edit_mastergroup($grouptid) 
    {
        $this->db->where('group_id',$grouptid);
        return $this->db->get('tbl_group');
    }

    public function Edit_Add_group($data) 
    {

        $this->db->set('group_name',$data['group_name']);
        $this->db->where('group_id',$data['group_id']);

        $data = $this->db->update('tbl_group');
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
       $this->db->where('group_id',$id);
       $this->db->update('tbl_group');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('group_id',$id);
        $this->db->update('tbl_group');
    }

    // ============== business section ===================================

     public function get_businessdata()
     {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_business');
        // $this->db->order_by("business_name", "asc");
        $this->db->order_by("business_id","desc");
        return $this->db->get();
     }

    public function add_business($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
            'business_name'=>$data['business_name'],
            'org_id'=>$this->session->org_id,
            'date_created'=>$date
        );

        $res=$this->db->insert('tbl_business',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_business($businessid) 
    {
        $this->db->set('delete_status',1);
        $this->db->where('business_id',$businessid);
        $this->db->update('tbl_business');
    }
  

    public function edit_masterbusiness($businessid) 
    {
        $this->db->where('business_id',$businessid);
        return $this->db->get('tbl_business');
    }

    public function Edit_Add_business($data) 
    {

        $this->db->set('business_name',$data['business_name']);
        $this->db->where('business_id',$data['business_id']);
        $data = $this->db->update('tbl_business');
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

    public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('business_id',$id);
       $this->db->update('tbl_business');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('business_id',$id);
        $this->db->update('tbl_business');
    }


    // =============================================================

        // ============== Type section ===================================

     public function get_typedata()
    {
         $this->db->where('delete_status',0);
         $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_type');
        $this->db->order_by("type_id", "desc");
        return $this->db->get();
    }

    public function add_type($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'title'=>$data['title'],
                       'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_type($typeid) 
    {
        $this->db->where('type_id',$typeid);
        $this->db->set('delete_status',1);
        $this->db->delete('tbl_type');
    }
  

    public function edit_mastertype($typeid) 
    {
        $this->db->where('type_id',$typeid);
        return $this->db->get('tbl_type');
    }

    public function Edit_Add_type($data) 
    {

        $this->db->set('title',$data['title']);
        $this->db->where('type_id',$data['type_id']);

        $data = $this->db->update('tbl_type');
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

    public function deactivate3($id)
    {   
       $this->db->set('status',0);
       $this->db->where('type_id',$id);
       $this->db->update('tbl_type');
    }

    public function activate3($id)
    {   
        $this->db->set('status',1);
        $this->db->where('type_id',$id);
        $this->db->update('tbl_type');
    }


    // =============================================================




          // ============== Locarion section ===================================

     public function get_locationdata()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_location');
        $this->db->order_by("location_id", "desc");
        return $this->db->get();
    }

    public function add_location($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'location'=>$data['location'],
                      'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_location',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_location($locationid) 
    {
        $this->db->where('location_id',$locationid);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_location');
    }
  

    public function edit_masterlocation($locationid) 
    {
        $this->db->where('location_id',$locationid);
        return $this->db->get('tbl_location');
    }

    public function Edit_Add_location($data) 
    {

        $this->db->set('location',$data['location']);
        $this->db->where('location_id',$data['location_id']);

        $data = $this->db->update('tbl_location');
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

    public function deactivate4($id)
    {   
       $this->db->set('status',0);
       $this->db->where('location_id',$id);
       $this->db->update('tbl_location');
    }

    public function activate4($id)
    {   
        $this->db->set('status',1);
        $this->db->where('location_id',$id);
        $this->db->update('tbl_location');
    }

    public function insert_department($dep_name)
    {
        $org_id  = $this->session->org_id;
        $data = array(
            'org_id' => $org_id,
            'department_name' => $dep_name,
            'delete_status' => 0
        );
        $this->db->insert('tbl_department', $data);
        return $insert_id = $this->db->insert_id();
    }
    public function insert_designation($designation)
    {
        $this->db->insert_batch('tbl_designation',$designation);
    }
    public function get_depdegData()
    {
        $org_id  = $this->session->org_id;
        return $this->db->query('SELECT * FROM `tbl_designation` join tbl_department ON tbl_department.dep_id = tbl_designation.department_id WHERE tbl_designation.delete_status = 0 and tbl_designation.org_id = '.$org_id.' ORDER BY deg_id DESC')->result();
    }
    public function edit_department($dep_id)
    {
        $this->db->where('dep_id',$dep_id);
        return $this->db->get('tbl_department')->row();
    }
    public function edit_designation($deg_id)
    {
        $this->db->where('deg_id',$deg_id);
        return $this->db->get('tbl_designation')->row();
    }
    public function update_dep($id,$dep_name)
    {
        $this->db->where('dep_id',$id);
        $this->db->set('department_name',$dep_name);
        $this->db->update('tbl_department');
    }
    public function update_deg($id,$deg_name)
    {
        $this->db->where('deg_id',$id);
        $this->db->set('designation_name',$deg_name);
        $this->db->update('tbl_designation');
    }
    public function deleteDepartmentDesignation($dep_id,$deg_id)
    {
        $this->db->where('dep_id',$dep_id);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_department');

        $this->db->where('deg_id',$deg_id);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_designation');
    }

    // Time 
    public function add_time($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
            'org_id'=> $this->session->org_id,
            'time_slot' => $data['time_slot'],
            'created_date' => $date
        );

        $res=$this->db->insert('tbl_time_slot',$data1);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function get_timeslot_data()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        $this->db->order_by("time_id", "desc");
        return $this->db->get('tbl_time_slot')->result();
    }

    public function time_slot_deactivate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('time_id',$id);
        $this->db->update('tbl_time_slot');
    }
 
    public function time_slot_activate($id)
    {   
        $this->db->set('status',0);
        $this->db->where('time_id',$id);
        $this->db->update('tbl_time_slot');
    }
    public function edit_time_slot($id)
    {
        $this->db->where('time_id',$id);
        return $this->db->get('tbl_time_slot');
    }

    public function updateTimeSlot($time_slot_id,$time_slot)
    {
        $this->db->set('time_slot',$time_slot);
        $this->db->where('time_id',$time_slot_id);
        if($this->db->update('tbl_time_slot'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function deleteTimeSlot($time_slot_id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('time_id',$time_slot_id);
        if($this->db->update('tbl_time_slot'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    // Notify By
    public function get_notifyby_data()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        $this->db->order_by("notify_id", "desc");
        return $this->db->get('tbl_notify_by')->result();
    }

    public function insertNotifyBy($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
            'org_id'=> $this->session->org_id,
            'notify_by' => $data['notify_by'],
            'created_date' => $date
        );

        $res=$this->db->insert('tbl_notify_by',$data1);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    public function edit_notify_by($notify_id)
    {
        $this->db->where('notify_id',$notify_id);
        return $this->db->get('tbl_notify_by');
    }
    public function updateNotifyBy($notify_id,$edit_notify_by)
    {
        $this->db->set('notify_by',$edit_notify_by);
        $this->db->where('notify_id',$notify_id);
        if($this->db->update('tbl_notify_by'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
    public function notify_by_deactivate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('notify_id',$id);
        $this->db->update('tbl_notify_by');
    }
 
    public function notify_by_activate($id)
    {   
        $this->db->set('status',0);
        $this->db->where('notify_id',$id);
        $this->db->update('tbl_notify_by');
    }
    public function delete_notify_by($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('notify_id',$id);
        $this->db->update('tbl_notify_by');
    }

    public function chk_activity_type_list($activity_type_list)
    {
        $org_id = $this->session->org_id;
        if($activity_type_list == 'Task')
        {
            return 1;
        }
        else if($activity_type_list == 'Own')
        {
            return 1;
        }
        else if($activity_type_list == 'Case')
        {
            return 1;
        }
        else
        {
            $this->db->where('title',$activity_type_list);
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$org_id);
            $data = $this->db->get("tbl_schedule_type")->result();
            if (count($data) >= 1) 
            {
                return 1;
            }
            else 
            {
                return 0;
            }
        }
        
    }

    public function chk_activity_type_list_edit($activity_type_list,$activity_type_list_id)
    {
        $org_id = $this->session->org_id;
        if($activity_type_list == 'Task')
        {
            return 1;
        }
        else if($activity_type_list == 'Own')
        {
            return 1;
        }
        else if($activity_type_list == 'Case')
        {
            return 1;
        }
        else
        {
            $this->db->where('title',$activity_type_list);
            // $this->db->where('schedule_id !=',$activity_type_list_id);
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$org_id);
            $data = $this->db->get("tbl_schedule_type")->result();
            
            if (count($data) >= 1) 
            {
                $this->db->where('title',$activity_type_list);
                $this->db->where('schedule_id',$activity_type_list_id);
                $this->db->where('delete_status',0);
                $this->db->where('org_id',$org_id);
                $data1 = $this->db->get("tbl_schedule_type")->result();
                if (count($data1) >= 1) 
                {
                    return 0;
                }
                else
                {
                    return 1;
                }  
            }
            else 
            {
                return 0;
            }
        }
    }

    public function chk_activity_list($activity_list)
    {
        $org_id = $this->session->org_id;
        $this->db->where('type_name',$activity_list);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_schedule_type_name")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    }

    public function chk_activity_list_edit($activity_list,$activity_list_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('type_name',$activity_list);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_schedule_type_name")->result();
        
        if (count($data) >= 1) 
        {
            $this->db->where('type_name',$activity_list);
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$org_id);
            $this->db->where('id',$activity_list_id);
            $data1 = $this->db->get("tbl_schedule_type_name")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            }  
        }
        else 
        {
            return 0;
        }
    }
    
    public function chk_business_segment($business_segment)
    {
        $org_id = $this->session->org_id;
        $this->db->where('business_name',$business_segment);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_business")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    }

    public function chk_business_segment_edit($business_segment,$business_segment_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('business_name',$business_segment);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_business")->result();
        if (count($data) >= 1) 
        {
            $this->db->where('business_name',$business_segment);
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$org_id);
            $this->db->where('business_id',$business_segment_id);
            $data1 = $this->db->get("tbl_business")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        }
    }

    public function chk_branch($branch)
    {
        $org_id = $this->session->org_id;
        $this->db->where('name',$branch);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_branch")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    }

    public function chk_branch_edit($branch,$branch_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('name',$branch);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$org_id);
        $data = $this->db->get("tbl_branch")->result();
        if (count($data) >= 1) 
        {
            $this->db->where('name',$branch);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $this->db->where('branch_id',$branch_id);
            $data1 = $this->db->get("tbl_branch")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        }
    }

    public function chk_contact_type($title)
    {
        $org_id = $this->session->org_id;
        $this->db->where('title',$title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_type")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    public function chk_contact_type_edit($title,$title_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('title',$title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_type")->result();
        if (count($data) >= 1) 
        {
            $this->db->where('title',$title);
            $this->db->where('type_id',$title_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_type")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_credit_name($credit_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('credit_name',$credit_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_credit_term")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_credit_days($credit_days)
    {
        $org_id = $this->session->org_id;
        $this->db->where('credit_days',$credit_days);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_credit_term")->result();
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_credit_name_edit($credit_name,$credit_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('credit_name',$credit_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_credit_term")->result();
        if (count($data) >= 1) 
        {
            $this->db->where('credit_name',$credit_name);
            $this->db->where('credit_id',$credit_id);
            $this->db->where('org_id',$org_id);
            $data1 = $this->db->get("tbl_credit_term")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_credit_days_edit($credit_days,$credit_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('credit_days',$credit_days);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_credit_term")->result();
        if (count($data) >= 1) 
        {
            $this->db->where('credit_days',$credit_days);
            $this->db->where('credit_id',$credit_id);
            $this->db->where('org_id',$org_id);
            $data1 = $this->db->get("tbl_credit_term")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_expense($expense_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('expense_name',$expense_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_expense_master")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_expense_edit($expense_name,$expense_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('expense_name',$expense_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_expense_master")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('expense_name',$expense_name);
            $this->db->where('expense_id',$expense_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_expense_master")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_group($group_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('group_name',$group_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_group")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    
    public function chk_group_edit($group_name,$group_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('group_name',$group_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_group")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('group_name',$group_name);
            $this->db->where('group_id',$group_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_group")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_location($location_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('location',$location_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_location")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    
    public function chk_location_edit($location_name,$location_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('location',$location_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_location")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('location',$location_name);
            $this->db->where('location_id',$location_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_location")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    
    public function chk_order_status($status_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('status_name',$status_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_order_status")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    
    public function chk_order_status_edit($status_name,$status_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('status_name',$status_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_order_status")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('status_name',$status_name);
            $this->db->where('order_status_id',$status_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_order_status")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_source_list($source_title)
    {
        $org_id = $this->session->org_id;
        $this->db->where('source_title',$source_title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_source")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_source_list_edit($source_title,$source_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('source_title',$source_title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_source")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('source_title',$source_title);
            $this->db->where('source_id',$source_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_source")->result();
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_stage_list($stage_title)
    {
        $org_id = $this->session->org_id;
        $this->db->where('stage_title',$stage_title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_stage")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_stage_list_edit($stage_title,$stage_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('stage_title',$stage_title);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_stage")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('stage_title',$stage_title);
            $this->db->where('stage_id',$stage_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_stage")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_target_type_list($target_type)
    {
        $org_id = $this->session->org_id;
        $this->db->where('target_type',$target_type);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_target_type")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_target_type_list_edit($target_type,$target_type_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('target_type',$target_type);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_target_type")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('target_type',$target_type);
            $this->db->where('targettype_id',$target_type_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_target_type")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_thought($thought)
    {
        $org_id = $this->session->org_id;
        $this->db->where('thought',$thought);
        $this->db->where('org_id',$org_id);
        // $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_thoughts")->result();
    
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_thoughts_edit($thought,$thought_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('thought',$thought);
        $this->db->where('org_id',$org_id);
        // $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_thoughts")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('thought',$thought);
            $this->db->where('thought_id',$thought_id);
            $this->db->where('org_id',$org_id);
            // $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_thoughts")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_time_slot($time_slot)
    {
        $org_id = $this->session->org_id;
        $this->db->where('time_slot',$time_slot);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_time_slot")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_time_slot_edit($time_slot,$time_slot_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('time_slot',$time_slot);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_time_slot")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('time_slot',$time_slot);
            $this->db->where('time_id',$time_slot_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_time_slot")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_notify_by($notify_by)
    {
        $org_id = $this->session->org_id;
        $this->db->where('notify_by',$notify_by);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_notify_by")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_notify_by_edit($notify_by,$notify_by_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('notify_by',$notify_by);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_notify_by")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('notify_by',$notify_by);
            $this->db->where('notify_id',$notify_by_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_notify_by")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_term_condition($term_for)
    {
        $org_id = $this->session->org_id;
        $this->db->where('term_for',$term_for);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_terms_condition")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function chk_term_condition_edit($term_for,$term_for_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('term_for',$term_for);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_terms_condition")->result();
    
        if (count($data) >= 1) 
        {
            $this->db->where('term_for',$term_for);
            $this->db->where('term_id',$term_for_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_terms_condition")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    public function insertFreq($data)
    {
        $date=date("Y-m-d H:i:s"); 
        
        $data1=array(
            'org_id'=> $this->session->org_id,
            'frequency_name' => $data['freq_name'],
            'frequency_type' => $data['freq_type'],
            'status' => 0,
            'delete_status' => 0,
            'created_date' => $date
        );

        $res=$this->db->insert('tbl_frequency_type',$data1);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function get_freq_type_data()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_frequency_type');
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }
    public function chk_freq_type($freq_type)
    {
        $org_id = $this->session->org_id;
        $this->db->where('frequency_name',$freq_type);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_frequency_type")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    public function chk_freq_type_name($freq_type_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('frequency_type',$freq_type_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_frequency_type")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    public function chk_freq_type_edit($freq_type,$freq_type_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('frequency_name',$freq_type);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_frequency_type")->result();
        
        if (count($data) >= 1) 
        {
            $this->db->where('frequency_name',$freq_type);
            $this->db->where('id',$freq_type_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_frequency_type")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    public function chk_freq_type_name_edit($freq_type_name,$freq_type_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('frequency_type',$freq_type_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_frequency_type")->result();
        
        if (count($data) >= 1) 
        {
            $this->db->where('frequency_type',$freq_type_name);
            $this->db->where('id',$freq_type_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_frequency_type")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    public function edit_frequency_type($freq_id)
    {
        $this->db->where('id',$freq_id);
        return $this->db->get('tbl_frequency_type');
    }
    public function updateFreqType($freq_id,$edit_freq_name,$edit_freq_no,$edit_freq_type)
    {
        $frequency = $edit_freq_no.' '.$edit_freq_type;
        $this->db->set('frequency_name',$edit_freq_name);
        $this->db->set('frequency_number',$edit_freq_no);
        $this->db->set('frequency_type',$edit_freq_type);
        $this->db->set('frequency',$frequency);
        $this->db->where('id',$freq_id);
        if($this->db->update('tbl_frequency_type'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
    public function delete_freq_type($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_frequency_type');
    }

    public function freq_type_deactivate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_frequency_type');
    }

    public function freq_type_activate($id)
    {   
        $this->db->set('status',0);
        $this->db->where('id',$id);
        $this->db->update('tbl_frequency_type');
    }

    public function insertFreqwiseReport($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $frequency_name = $this->db->select('*')->from('tbl_frequency_type')->where('id',$data['freq'])->get()->row();
        
        $data1=array(
            'org_id'=> $this->session->org_id,
            'frquency_id' => $data['freq'],
            'frequency_name' => $frequency_name->frequency_name,
            'report_type' => $data['report'],
            'start_date' => date("Y-m-d", strtotime(str_replace(',', '', $data['start_date_report']))),
            'end_date' => date("Y-m-d", strtotime(str_replace(',', '', $data['end_date_report']))),
            'schedule_time' => $data['schedule_time'],
            'status' => 0,
            'delete_status' => 0,
            'created_date' => $date
        );
        $res=$this->db->insert('tbl_frequency_wise_report_type',$data1);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function get_freq_wise_report()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_frequency_wise_report_type');
        $this->db->order_by("report_type_id", "desc");
        return $this->db->get()->result();
    }

    public function edit_frequency_wise_report($report_id)
    {
        
        $this->db->where('report_type_id',$report_id);
        return $this->db->get('tbl_frequency_wise_report_type');
    }

    public function updateFreqwisereportType($report_id,$freq,$report,$start_date,$end_date,$schedule_time)
    {
        $frequency_name = $this->db->select('*')->from('tbl_frequency_type')->where('id',$freq)->get()->row();
        
        $this->db->set('frquency_id',$freq);
        $this->db->set('report_type',$report);
        $this->db->set('start_date',date("Y-m-d", strtotime(str_replace(',', '', $start_date))));
        $this->db->set('end_date',date("Y-m-d", strtotime(str_replace(',', '', $end_date))));
        $this->db->set('schedule_time',$schedule_time);
        $this->db->set('frequency_name',$frequency_name->frequency_name);
        $this->db->where('report_type_id',$report_id);
        if($this->db->update('tbl_frequency_wise_report_type'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
    public function delete_freq_wise_report($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('report_type_id',$id);
        $this->db->update('tbl_frequency_wise_report_type');
    }

    public function freq_wise_report_deactivate($id)
    {
        $this->db->set('status',1);
        $this->db->where('report_type_id',$id);
        $this->db->update('tbl_frequency_wise_report_type');
    }

    public function freq_wise_report_activate($id)
    {
        $this->db->set('status',0);
        $this->db->where('report_type_id',$id);
        $this->db->update('tbl_frequency_wise_report_type');
    }

    public function add_doc_type_data($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      
                       'org_id'=>$this->session->org_id,
                       'doc_name'=>$data['doc_name'],
                       'status'=>0,
                       'delete_status'=>0,
                       'created_date'=>$date
                );

        $res=$this->db->insert('tbl_doc_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }
    public function get_doc_type_report()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_doc_type');
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }
    public function chk_document($doc_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('doc_name',$doc_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_doc_type")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }
    public function edit_doc_type_data($doc_id)
    {
        $this->db->where('id',$doc_id);
        return $this->db->get('tbl_doc_type');
    }

    public function chk_doc_type_edit($doc_name,$doc_name_id)
    {
        $org_id = $this->session->org_id;
        $this->db->where('doc_name',$doc_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_doc_type")->result();
        
        if (count($data) >= 1) 
        {
            $this->db->where('doc_name',$doc_name);
            $this->db->where('id',$doc_name_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_doc_type")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    public function updateDocType($doc_id,$doc_name)
    {
        $this->db->set('doc_name',$doc_name);
        $this->db->where('id',$doc_id);
        if($this->db->update('tbl_doc_type'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
    public function delete_doc_type($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_doc_type');
    }

    public function doc_type_deactivate($id)
    {
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_doc_type');
    }
    public function doc_type_activate($id)
    {
        $this->db->set('status',0);
        $this->db->where('id',$id);
        $this->db->update('tbl_doc_type');
    }

    public function add_event_notify_data($data)
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      
                       'org_id'=>$this->session->org_id,
                       'event_notify_name'=>$data['event_notify_name'],
                       'status'=>0,
                       'delete_status'=>0,
                       'created_date'=>$date
                );

        $res=$this->db->insert('tbl_event_notify',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function get_event_notify_report()
    {
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_event_notify');
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function chk_event_notify($event_notify_name)
    {
        $org_id = $this->session->org_id;
        $this->db->where('event_notify_name',$event_notify_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_event_notify")->result();
        
        if (count($data) >= 1) 
        {
            return 1;
        }
        else 
        {
            return 0;
        } 
    }

    public function edit_event_notify($event_notify_id)
    {
        $this->db->where('id',$event_notify_id);
        return $this->db->get('tbl_event_notify');
    }

    public function chk_event_notify_edit($event_notify_name,$event_notify_id)
    {
        
        $org_id = $this->session->org_id;
        $this->db->where('event_notify_name',$event_notify_name);
        $this->db->where('org_id',$org_id);
        $this->db->where('delete_status',0);
        $data = $this->db->get("tbl_event_notify")->result();
        
        if (count($data) >= 1) 
        {
            $this->db->where('event_notify_name',$event_notify_name);
            $this->db->where('id',$event_notify_id);
            $this->db->where('org_id',$org_id);
            $this->db->where('delete_status',0);
            $data1 = $this->db->get("tbl_event_notify")->result();
            
            if (count($data1) >= 1) 
            {
                return 0;
            }
            else 
            {
                return 1;
            } 
        }
        else 
        {
            return 0;
        } 
    }
    public function updateEventNotify($event_notify,$event_notify_name)
    {
        $this->db->set('event_notify_name',$event_notify_name);
        $this->db->where('id',$event_notify);
        if($this->db->update('tbl_event_notify'))
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function delete_event_notify($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_event_notify');
    }

    public function event_notify_deactivate($id)
    {
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_event_notify');
    }

    public function event_notify_activate($id)
    {
        $this->db->set('status',0);
        $this->db->where('id',$id);
        $this->db->update('tbl_event_notify');
    }
}

?>


