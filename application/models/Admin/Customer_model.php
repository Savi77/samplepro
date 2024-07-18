<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //echo 'Hello World2';
    }


    public function AjaxData($permission_array,$activety_array,$mail_array)
    {
        $org_id = $this->session->org_id;
        $user_type = $this->session->user_type;
        $id = $this->session->id;

        // $params = $columns = $totalRecords = $data = array();
        $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        // echo "<pre>";
        // print_r($params);
        // die;

        $where = $sqlTot = $sqlRec = "";
        
        $this->db->select("priviledge_id,priviledge_key,status");
        $where_array = array('user_id' => $permission_array['user_id'], 'module_id' => $permission_array['module_id'], 'feature_id' => $permission_array['feature_id'],);
        $this->db->where($where_array);
        $user_permission = $this->db->get("tbl_module_permission")->result();
        $EditClass = 'style="display:block";';
        $DeleteClass = 'style="display:block";';

        foreach ($user_permission as $priviledge) {
            $priviledge_key = $priviledge->priviledge_key;
            $status = $priviledge->status;
            if ($priviledge_key == 'EDIT') {
                if ($status == 1) {
                    $EditClass = ' style="display:block"; ';
                } else {
                    $EditClass = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'DELETE') {
                // echo 11;
                if ($status == 1) {
                    $DeleteClass = ' style="display:block"; ';
                } else {
                    $DeleteClass = ' style="display:none"; ';
                }
            }
        }

        $this->db->select("priviledge_id,priviledge_key,status");
        $where_array = array('user_id' => $activety_array['user_id'], 'module_id' => $activety_array['module_id'], 'feature_id' => $activety_array['feature_id'],'priviledge_id' => 1);
        $this->db->where($where_array);
        $user_permission1 = $this->db->get("tbl_module_permission")->result();
        $ActivetyClass = 'style="display:block";';

        foreach ($user_permission1 as $priviledge1) {
            $priviledge_key = $priviledge1->priviledge_key;
            $status = $priviledge1->status;
            if ($priviledge_key == 'ADD') {
                if ($status == 1) {
                    $ActivetyClass = ' style="display:block"; ';
                } else {
                    $ActivetyClass = ' style="display:none"; ';
                }
            }
        }

        $this->db->select("priviledge_id,priviledge_key,status");
        $where_array = array('user_id' => $mail_array['user_id'], 'module_id' => $mail_array['module_id'], 'feature_id' => $mail_array['feature_id'],'priviledge_id' => 25);
        $this->db->where($where_array);
        $user_permission2 = $this->db->get("tbl_module_permission")->result();
        $emailClass = 'style="display:block";';

        foreach ($user_permission2 as $priviledge2) {
            $priviledge_key = $priviledge2->priviledge_key;
            $status = $priviledge2->status;
            if ($priviledge_key == 'COMPOSE') {
                if ($status == 1) {
                    $emailClass = ' style="display:block"; ';
                } else {
                    $emailClass = ' style="display:none"; ';
                }
            }
        }

        // check search value exist
        if (!empty($params['search']['value'])) {
            $where .= " and company_name like  '" . $params['search']['value'] . "%' ";
            $where .= " or mailing_name like '" . $params['search']['value'] . "%' ";
            $where .= " or contact_person_name1 like '" . $params['search']['value'] . "%' ";
            $where .= " or address like  '" . $params['search']['value'] . "%' ";
            $where .= " or cust_type  like '" . $params['search']['value'] . "%' ";
            $where .= " or email  like '" . $params['search']['value'] . "%' ";
            $where .= " or phone_no  like '" . $params['search']['value'] . "%' ";
        }

        $sql = " SELECT * FROM `tbl_customer` Where  org_id='$org_id' AND delete_status = 0 ";

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if (isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        $sqlRec .= " ORDER BY customer_id " . 'DESC' . "  LIMIT " . $params['start'] . "," . $params['length'] . " ";

        
        
        $queryTot = $this->db->query($sqlTot)->result();
        $totalRecords = count($queryTot);
        $queryRecords = $this->db->query($sqlRec)->result();
        
        $i = 1;
        foreach ($queryRecords as $row) {

            if($row->delete_status == 0 ){
                if($row->account_manager == '' || $row->account_manager == 0){
                    $styleAccount = 'color: red ;font-size: 20px';
                }else {
                    $styleAccount = 'color: gold ;font-size: 20px';
                }
                $actionbuttons = '<td class="text-center">
                                    <div class="d-flex">
                                        <input type="checkbox" class="form-check-input-styled cursor-pointer mt-1 checkboxdata" name="updateFiled[]"  value="'.$row->customer_id.'" onclick="addValue('.$row->customer_id.')">
                                        
                                        <a rel="tooltip" title="Assigned Account Manager" class="cursor-pointer ml-2" onclick="get_account_manger('.$row->customer_id.')" ><i class="icon-user-tie" style="'.$styleAccount.'font-size: 20px;position: relative;" ></i>
                                        </a>
                                        </a>
                                    </div>
                                </td>';

                if ($row->cust_type == 'primary') {
                    $cust_type = '<span class="label bg-primary">Primary</span>';
                } else {
                    $cust_type = '<span class="label bg-info">Secondary</span>';
                }

                $com_name = ucwords($row->company_name);
                // $company_name = '<div class="media" style="width:200px;">
                //                     <div width: 200px; class="media-body align-self-center text-wrap-col" data-toggle="tooltip" data-placement="top" title="' . ucwords($row->company_name) . '">
                //                     <a style="color:#000;cursor: auto;"> ' . substr("$com_name",0,22) . '</a>
                //                     <div class="text-muted font-size-sm text-wrap-col" style="width: 200px;">
                //                         Created On : ' . date("d M, Y", strtotime($row->created_date)) . '
                //                     </div>
                //                     </div>
                //                 </div>';
                $company_name = '<div class="media" style="width:200px;">
                                    <div width: 200px; class="media-body align-self-center text-wrap-col" data-toggle="tooltip" data-placement="top" title="' . ucwords($row->company_name) . '">
                                    <a style="color:#333333;" ' . $EditClass . ' href="'.base_url().'admin/Customer/edit_customer/' . $row->customer_id . '" id="' . $row->customer_id . '" >' . substr("$com_name",0,22) . '</a>
                                    </div>
                                </div>';
                $contact_person_name = '<div style="width: 200px;" class="text-wrap-col">'.$row->contact_person_name1.'</div>';

                $this->db->where_in('location_id',$row->location_id);
                $locationData = $this->db->get('tbl_location')->row();

                $this->db->where_in('group_id',$row->group_id);
                $groupData = $this->db->get('tbl_group')->row();

                $businessName = "";

                // $bId = $row->business_id;

                if(!empty($bId))
                {
                    $bId = $row->business_id;
                }
                else
                {
                    $bId = 0;
                }
            
                $categoryArray = $this->db->query('SELECT * FROM `tbl_business` WHERE business_id IN ('.$bId.') AND status = 1 AND delete_status = 0')->result();
                $last_id = count($categoryArray) - 1;

                for ($i=0; $i < count($categoryArray); $i++) { 
                    $businessName .= $categoryArray[$i]->business_name;
                    if ($last_id == $i) {
                        $businessName .= " ";
                    }else {
                        $businessName .= " , ";
                    }
                }

                $landlineNumber = '<div style="width: 150px;">'.$row->landline_number.'</div>';

                $refreence_name = '<div style="width: 150px;" class="text-wrap-col">'.$row->reference_name.'</div>';

                $doc_details = $this->db->query('SELECT * FROM `tbl_reference_document` WHERE customer_id = '.$row->customer_id.'')->result();
                if(!empty($doc_details))
                {
                    $doc_count = count($doc_details);
                }
                else
                {
                    $doc_count = 0;   
                }

                $contact_type = $this->db->select('contact_code_id')->from('tbl_organisation')->where('org_id', $this->session->org_id)->get()->row()->contact_code_id;
                


                // $Action = '<div style="display: flex;justify-content: flex-start;">
                //                 <a data-toggle="modal" rel="tooltip" title="Uploaded File Count" data-placement="bottom" onclick="document_count('.$row->customer_id.')">
                //                     <button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">'.$doc_count.'</button>
                //                 </a>
                //            </div>';

                // <span class="tooltipText" style=" width: 90px;background-color: black;color: #fff;text-align: center;border-radius: 3px;position: absolute;z-index: 1070;top: 20px;left: 22px;font-size: 12px;margin: 0.3125rem;font-family: Roboto;padding: 10px 4px;text-align: center;">Select Action</span>


                $Action = '<div style="width:150px;">
                                <ul class="pull-right dflex Padding-0 m-auto text-black">
                                    <li>  
                                        <div>
                                            <div class="panel-button">
                                                <a class="list-icons-item">
                                                    <i class="icon-menu9" style="cursor:pointer;" title="Select Action" rel="tooltip">
                                                    </i>
                                                </a>
                                            </div>
                                            
                                            <div class="my-popover-content" style="display:none">
                                                <ul>
                                                    <li ' . $EditClass . '>
                                                        
                                                        <a style="color:#333333;" href="'.base_url().'admin/Customer/edit_customer/' . $row->customer_id . '" id="' . $row->customer_id . '" >
                                                            <span class="status-mark position-left dot dot-green"></span> Edit Contact 
                                                        </a>
                                                    </li>
                                                    <li ' . $DeleteClass . '>
                                                        <a onclick="DeleteList(this)" data-id="' . $row->customer_id . '" id="' . $row->customer_id . '" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-red"></span> Delete Contact 
                                                        </a>
                                                    </li>
                                                    <li ' . $ActivetyClass . '>
                                                        <a  onclick="add_activity(id)" id="' . $row->customer_id . '" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-blue"></span> Add Task
                                                        </a>
                                                    </li>
                                                    <li ' . $ActivetyClass . ' >
                                                        <a onclick="add_reminder(id)" id="' . $row->customer_id . '" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-yellow"></span> Add Reminder  
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a  style="color:#333333;" ' . $emailClass . ' href="'.base_url('admin/ReportAdmin/Reports/mail_write_contact?id=compose&email=').$row->email.'" id="' . $row->customer_id . '" >
                                                            <span class="status-mark position-left dot dot-light-blue"></span> Sent Email 
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> 

                                    </li>
                                </ul>

                           </div>';


                if(!empty($contact_type))
                {
                    if($contact_type == 1)
                    {
                        if(!empty($row->contact_code))
                        {
                            $contact = '<div style="width: 150px;">'.$row->contact_code.'</div>';
                        }
                        else
                        {
                            $contact = '<div style="width: 150px;"></div>';
                        }
                    }
                    else
                    {
                        if(!empty($row->auto_contact_code))
                        {
                            $contact = '<div style="width: 150px;">'.$row->auto_contact_code.'</div>';
                        }
                        else
                        {
                            $contact = '<div style="width: 150px;"></div>';
                        }
                    }
                }           

                // if(!empty($row->contact_code))
                // {
                //     $contact1 = '<div style="width: 150px;">'.$row->contact_code.'</div>';
                // }
                // else
                // {
                //     $contact1 = '<div style="width: 150px;"></div>';
                // }

                // if(!empty($row->auto_contact_code))
                // {
                //     $contact2 = '<div style="width: 150px;">'.$row->auto_contact_code.'</div>';
                // }
                // else
                // {
                //     $contact2 = '<div style="width: 150px;"></div>';
                // }

                $email = '<div style="width: 200px;" class="text-wrap-col">'.$row->email.'</div>';

                $phone_no = '<div style="width: 150px;">'.$row->phone_no.'</div>';

                $group = '<div style="width: 150px;">'.$groupData->group_name.'</div>';

                $location = '<div style="width: 150px;" class="text-wrap-col">'.$locationData->location.'</div>';

                $upload_doc = '<div style="display: flex;justify-content: flex-start;width:150px;">
                                    <a data-toggle="modal" data-placement="bottom" onclick="document_count('.$row->customer_id.')">
                                        <button rel="tooltip" title="View Uploads" type="button" class="green-btn activity-btn-text" style="margin-left:5px;">'.$doc_count.'</button>
                                    </a>
                               </div>';

                               

// $a = count($queryRecords);

                $new = array(
                    0 => $actionbuttons,
                    1 => $company_name,
                    2 => $contact,
                    // 3 => $contact2,
                    3 => $contact_person_name,
                    4 => $email,
                    5 => $phone_no,
                    6 => $landlineNumber,
                    7 => $group,
                    8 => $location,
                    // 10 => $businessName,
                    // 11 => $refreence_name,
                    9 => $upload_doc,
                    10 => $Action
                    
                );
                $i++;
                array_push($data, $new);
            }
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }

    function get_account_manger($id){
        $this->db->where('customer_id', $id);
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $data = $this->db->get('tbl_customer')->row();

        $am = $data->account_manager;

        $am_data = $this->db->query('SELECT * FROM `tbl_admin_login` WHERE id in ('.$am.')')->result_array();
        return $am_data;
    }

    public function incomplete_issue_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->order_by('company_name', 'ASC');
        return $this->db->get('tbl_customer');
    }



    public function get_activity_issue_count()
    {
        $created_date = date('Y-m-d');
        $this->db->where('DATE(created_date)', $created_date);
        $this->db->where('status', 'pending');
        $this->db->where('org_id', $this->session->org_id);
        $todaycnt = $this->db->get('tbl_user_query')->result();

        $this->db->where('MONTH(created_date)', date('m'));
        $this->db->where('org_id', $this->session->org_id);
        $monthcnt = $this->db->get('tbl_user_query')->result();

        $this->db->where('status', 'pending');
        $this->db->where('org_id', $this->session->org_id);
        $allcnt = $this->db->get('tbl_user_query')->result();

        return  array(
            'todaycnt' => count($todaycnt),
            'monthcnt' => count($monthcnt),
            'allcnt' => count($allcnt)
        );
    }

    public function get_rechedule_issue_count()
    {
        $created_date = date('Y-m-d');
        $this->db->where('DATE(created_date)', $created_date);
        $this->db->where('reschedule', 'reschedule');
        $this->db->where('org_id', $this->session->org_id);
        $todaycnt = $this->db->get('tbl_schedule')->result();

        $this->db->where('MONTH(created_date)', date('m'));
        $this->db->where('reschedule', 'reschedule');
        $this->db->where('org_id', $this->session->org_id);
        $monthcnt = $this->db->get('tbl_schedule')->result();

        $this->db->where('reschedule', 'reschedule');
        $this->db->where('org_id', $this->session->org_id);
        $allcnt = $this->db->get('tbl_schedule')->result();
        return  array(
            'todaycnt' => count($todaycnt),
            'monthcnt' => count($monthcnt),
            'allcnt' => count($allcnt)
        );
    }

    public function get_complete_issue_count()
    {
        $created_date = date('Y-m-d');
        $this->db->where('DATE(created_date)', $created_date);
        $this->db->where('status', 'completed');
        $this->db->where('org_id', $this->session->org_id);
        $todaycnt = $this->db->get('tbl_user_query')->result();

        $this->db->where('MONTH(created_date)', date('m'));
        $this->db->where('org_id', $this->session->org_id);
        $monthcnt = $this->db->get('tbl_user_query')->result();

        $this->db->where('status', 'completed');
        $this->db->where('org_id', $this->session->org_id);
        $allcnt = $this->db->get('tbl_user_query')->result();
        return  array(
            'todaycnt' => count($todaycnt),
            'monthcnt' => count($monthcnt),
            'allcnt' => count($allcnt)
        );
    }


    public function manage_customer()
    {
        $this->db->select('tbl_customer.*,countries.name as c_name,states.name as s_name,tbl_type.title,tbl_group.group_name,tbl_location.location,tbl_credit_term.credit_name,tbl_admin_login.name as a_name');
        
        $this->db->where('tbl_customer.org_id', $this->session->org_id);
        $this->db->where('tbl_customer.delete_status', 0);
        $this->db->join('countries','countries.id = tbl_customer.country','left');
        $this->db->join('states','states.id = tbl_customer.state','left');
        $this->db->join('tbl_type','tbl_type.type_id = tbl_customer.type_id','left');
        $this->db->join('tbl_group','tbl_group.group_id = tbl_customer.group_id','left');
        $this->db->join('tbl_location','tbl_location.location_id = tbl_customer.location_id','left');
        $this->db->join('tbl_credit_term','tbl_credit_term.credit_id = tbl_customer.credit_term','left');
        $this->db->join('tbl_admin_login','tbl_admin_login.id = tbl_customer.assign_to','left');
        $this->db->order_by('company_name', 'ASC');
        return $this->db->get('tbl_customer');
    }

    public function GetLeadDetails($leadopp_id)
    {
        $this->db->where("leadopp_id", $leadopp_id);
        return $this->db->get("tbl_leads_opportunity")->row();
    }

    public function credit_term()
    {
        $this->db->where('org_id', $this->session->org_id);
        return $this->db->get("tbl_credit_term")->result();
    }

    public function account_manager()
    {
        $this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        $this->db->where('org_id', $this->session->org_id);
        return $this->db->get("tbl_admin_login")->result();
    }

    public function primary_customer()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('parent_id', 0);
        $this->db->where('cust_type', 'primary');
        $this->db->order_by('company_name', 'ASC');
        return $this->db->get('tbl_customer');
    }

    public function type_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_type')->result();
    }
    public function schedule_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_schedule_type')->result();
    }
    public function location_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_location')->result();
    }
    public function business_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_business')->result();
    }
    public function group_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_group')->result();
    }
    public function country_list()
    {
        return $this->db->query("SELECT id,name FROM `countries`")->result();
    }
    public function state_list()
    {
        return $this->db->query("SELECT id,name FROM `states`")->result();
    }

    public function schedule_visit_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_schedule_type_name')->result();
    }

    public function getstate($country_id)
    {
        $data = $this->db->query(" SELECT * FROM states WHERE country_id='$country_id'");
        echo "<option value=''>Select State</option>";
        foreach ($data->result() as  $value) {
            echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
        }
    }

    public function ImportContacts()
    {
        $org_id = $this->session->org_id;
        $created_by = $this->session->id;
        $created_date = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        

        if (isset($_FILES['excel']) && $_FILES['excel']['error'] == 0) 
        {
            
            define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
            require_once('assets/PHPExcel/Classes/PHPExcel.php');
            $tmpfname = $_FILES['excel']['tmp_name'];
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $worksheet = $excelObj->getSheet(0);
            $lastRow = $worksheet->getHighestRow();
            
            for ($row = 3; $row <= $lastRow; $row++) {
                $company_name = $worksheet->getCell('A' . $row)->getValue();
                $mailing_name = $worksheet->getCell('B' . $row)->getValue();
               
                
                $contact_person_name1 = $worksheet->getCell('D' . $row)->getValue();
                $phone_no = $worksheet->getCell('F' . $row)->getValue();
                $alternate_number = $worksheet->getCell('G' . $row)->getValue();
                $landline_number = $worksheet->getCell('H' . $row)->getValue();

                $email = $worksheet->getCell('I' . $row)->getValue();
                $alternate_email = $worksheet->getCell('J' . $row)->getValue();
                $address = $worksheet->getCell('K' . $row)->getValue();
                $city = $worksheet->getCell('L' . $row)->getValue();

                if (!empty($company_name)) {
                   
                    $this->db->where('email', $email);
                    $query = $this->db->get('tbl_customer')->result();

                    $this->db->where('phone_no', $phone_no);
                    $query33 = $this->db->get('tbl_customer')->result();
                    
                    if (count($query) <= 0) 
                    {
                        
                        // if (count($query33) <= 0) {
                            
                            $states_data = $worksheet->getCell('M' . $row)->getValue(); //States
                            $this->db->like('name', $states_data);
                            // $this->db->where('org_id',$this->session->org_id);
                            $states_res = $this->db->get('states')->result();

                            if (count($states_res) > 0) {
                                $state = $states_res[0]->id;
                            } else {
                                $state = 22;
                            }

                            //-----------------------------------------------------------

                            $tbl_admin_login_data = $worksheet->getCell('E' . $row)->getValue(); //tbl_admin_login
                            $this->db->like('name', $tbl_admin_login_data);
                            $this->db->where('org_id', $this->session->org_id);

                            $tbl_admin_login_res = $this->db->get('tbl_admin_login')->result();

                            if (count($tbl_admin_login_res) > 0) {
                                $assign_to = $tbl_admin_login_res[0]->id;
                            } else {
                                $assign_to = 0;
                            }


                            $type_id_data = $worksheet->getCell('P' . $row)->getValue(); //tbl_type
                            $this->db->like('title', $type_id_data);
                            $this->db->where('org_id', $this->session->org_id);
                            $tbl_type_res = $this->db->get('tbl_type')->result();

                            if (count($tbl_type_res) > 0) {
                                $type_id = $tbl_type_res[0]->type_id;
                            } else {
                                $type_insert_array = array(
                                    'title' => $type_id_data,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s'),
                                    'org_id' => $org_id,
                                    'delete_status' => 0,
                                );

                                if (!empty($type_id_data)) {
                                    $this->db->insert('tbl_type', $type_insert_array);
                                    $type_id = $this->db->insert_id();
                                } else {
                                    $type_id = '';
                                }
                            }

                            //-----------------------------------------------------------

                            $business_id_data = $worksheet->getCell('Q' . $row)->getValue(); //tbl_business
                            $this->db->like('business_name', $business_id_data);
                            $this->db->where('org_id', $this->session->org_id);
                            $tbl_business_res = $this->db->get('tbl_business')->result();
                            if (count($tbl_business_res) > 0) {
                                $business_id = $tbl_business_res[0]->business_id;
                            } else {
                                $tbl_business_insert = array(
                                    'business_name' => $business_id_data,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s'),
                                    'org_id' => $org_id,
                                    'delete_status' => 0,
                                );

                                if (!empty($business_id_data)) {
                                    $this->db->insert('tbl_business', $tbl_business_insert);
                                    $business_id = $this->db->insert_id();
                                } else {
                                    $business_id = '';
                                }
                            }

                            //-----------------------------------------------------------

                            $location_id_data = $worksheet->getCell('R' . $row)->getValue(); //tbl_location
                            $this->db->like('location', $location_id_data);
                            $this->db->where('org_id', $this->session->org_id);
                            $tbl_location_res = $this->db->get('tbl_location')->result();
                            if (count($tbl_location_res) > 0) {
                                $location_id = $tbl_location_res[0]->location_id;
                            } else {
                                $tbl_location_insert = array(
                                    'location ' => $location_id_data,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s'),
                                    'org_id' => $org_id,
                                    'delete_status' => 0,
                                );


                                if (!empty($location_id_data)) {
                                    $this->db->insert('tbl_location', $tbl_location_insert);
                                    $location_id = $this->db->insert_id();
                                } else {
                                    $location_id = '';
                                }
                            }

                            //-----------------------------------------------------------

                            $tbl_group_data = $worksheet->getCell('S' . $row)->getValue(); //tbl_group
                            $this->db->like('group_name', $tbl_group_data);
                            $this->db->where('org_id', $this->session->org_id);
                            $tbl_group_res = $this->db->get('tbl_group')->result();

                            if (count($tbl_group_res) > 0) {
                                $group_id = $tbl_group_res[0]->group_id;
                            } else {
                                $tbl_group_insert = array(
                                    'group_name ' => $tbl_group_data,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s'),
                                    'org_id' => $org_id,
                                    'delete_status' => 0,
                                );


                                if (!empty($tbl_group_data)) {
                                    $this->db->insert('tbl_group', $tbl_group_insert);
                                    $group_id = $this->db->insert_id();
                                } else {
                                    $group_id = '';
                                }
                            }

                            //-----------------------------------------------------------

                            $tbl_credit_term_data = $worksheet->getCell('T' . $row)->getValue(); //tbl_credit_term
                            $this->db->like('credit_days', $tbl_credit_term_data);
                            $this->db->where('org_id', $this->session->org_id);
                            $tbl_credit_term_res = $this->db->get('tbl_credit_term')->result();

                            if (count($tbl_credit_term_res) > 0) {
                                $credit_term = $tbl_credit_term_res[0]->credit_id;
                            } else {
                                $tbl_credit_term_insert = array(
                                    'credit_name ' => $tbl_credit_term_data . ' Days',
                                    'credit_days' => $tbl_credit_term_data,
                                    // 'status'=>1,
                                    'date_created' => date('Y-m-d H:i:s'),
                                    'org_id' => $org_id,
                                    'delete_status' => 0,
                                );


                                if (!empty($tbl_credit_term_data)) {
                                    $this->db->insert('tbl_credit_term', $tbl_credit_term_insert);
                                    $credit_term = $this->db->insert_id();
                                } else {
                                    $credit_term = '';
                                }
                            }

                            //------------------------------------------------------------- 

                            $company_anniversary_data = $worksheet->getCell('V' . $row)->getValue();
                            $company_anniversary = '';
                            $marriage_anniversary = '';
                            if (!empty($company_anniversary_data)) {
                                $company_anniversary = date("Y-m-d", strtotime($company_anniversary_data));
                            }

                            $marriage_anniversary_data = $worksheet->getCell('W' . $row)->getValue();

                            if (!empty($marriage_anniversary_data)) {
                                $marriage_anniversary = date("Y-m-d", strtotime($marriage_anniversary_data));
                            }

                            $contact_code = $worksheet->getCell('C' . $row)->getValue();

                            $country_data = $worksheet->getCell('N' . $row)->getValue();
                            $this->db->like('name', $country_data);
                            // $this->db->where('org_id',$this->session->org_id);
                            $country_res = $this->db->get('countries')->result();

                            if (count($country_res) > 0) {
                                $country = $country_res[0]->id;
                            } else {
                                $country = 101;
                            }

                            $pincode = $worksheet->getCell('O' . $row)->getValue();

                            $dob_data = $worksheet->getCell('U' . $row)->getValue();
                            if (!empty($dob_data)) {
                                $dob = date("Y-m-d", strtotime($dob_data));
                            }
                            else
                            {
                               $dob = ''; 
                            }

                            $notes = $worksheet->getCell('X' . $row)->getValue();

                            $password = $worksheet->getCell('Y' . $row)->getValue();

                            $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
                            if($check_code2->auto_contact_code != '')
                            {
                                $code2 = $check_code2->auto_contact_code; 
                                $contact_code2 = (int)$code2 + 1;
                            }
                            else
                            {
                                $contact_code2 = '1000000';
                            }
                            
                            //------------------------------------------------------- 
                           
                            $insert_array = array(
                                'org_id' => $org_id,
                                'created_by' => $created_by,
                                'parent_id' => 0,
                                'type_id' => trim($type_id),
                                'business_id' => trim($business_id),
                                'location_id' => trim($location_id),
                                'group_id' => trim($group_id),
                                'company_name' => trim($company_name),
                                'mailing_name' =>trim($mailing_name),
                                'contact_person_name1' => trim($contact_person_name1),
                                'alternate_email' => trim($alternate_email),
                                'phone_no' => trim($phone_no),
                                'alternate_number' => trim($alternate_number),
                                'landline_number' => trim($landline_number),
                                'email' => trim($email),
                                'credit_term' => trim($credit_term),
                                'address' => trim($address),
                                'city' => trim($city),
                                'state' => trim($state),
                                'country' => trim($country),
                                'password' => trim($password),
                                'dob' => trim($dob),
                                'company_anniversary' => trim($company_anniversary),
                                'marriage_anniversary' => trim($marriage_anniversary),
                                'android_id' => '',
                                'imei' => '',
                                'cust_type' => 'Primary',
                                'leadopp_id' => '',
                                'type' => 'P',
                                'delete_status' => 0,
                                'created_date' => $created_date,
                                'assign_to' => $assign_to,
                                'account_manager' => $assign_to,
                                'pincode' =>trim($pincode),
                                'notes' => trim($notes),
                                'contact_code' => trim($contact_code),
                                'auto_contact_code' => $contact_code2
                            );

                            

                            $res = $this->db->insert('tbl_customer', $insert_array);
                            if ($res) 
                            {
                                $get_customer_id = $this->db->select('customer_id')->from('tbl_customer')->where($insert_array)->get()->row()->customer_id;
                                $data2 = array(
                                    'custom_id' => $get_customer_id,
                                    'org_id' => $this->session->org_id,
                                    'Password' => trim($password),
                                    'email' => trim($email),
                                    'mobile_no' => trim($phone_no),
                                    'user_type' => 'C',
                                    'user_status' => 1,
                                    'name' => trim($company_name),
                                    'user_type_io' => 'NULL',
                                    'profile_img' => '',
                                    'department' => 0,
                                    'designation' => 0,
                                    'emp_id' => 'NULL',
                                    'joining_date' => ''
                                );
                                $res2 = $this->db->insert('tbl_admin_login', $data2);
                            } 
                            // echo json_encode($insert_array);
                        // }
                        // $this->db->query("
                        //    INSERT INTO `tbl_customer`(`org_id`, `created_by`, `parent_id`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `android_id`, `imei`, `cust_type`, `leadopp_id`, `type`, `delete_status`, `created_date`)VALUES ('$org_id','$created_by',0,0,0,0,0,'$company_name','$contact_person_name1','','$phone_no','','','$email','$address','$city','','','buro@123','$date','','','','','primary','','P',0,'$created_date')");  

                    }
                    else
                    {
                        echo 2;
                    }
                }
            }
        }
    }



    public function ExportContacts()
    {
        $org_id = $this->session->org_id;
        define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        require_once('assets/PHPExcel/Classes/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Customer List');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:E2');

        $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Contact Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Contact Person');
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Account Manager');
        $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Phone No');
        $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Alternate Number');


        $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Landline Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Alternate email');
        $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Address');
        $objPHPExcel->getActiveSheet()->SetCellValue('J3', 'City');


        $objPHPExcel->getActiveSheet()->SetCellValue('K3', 'State');
        $objPHPExcel->getActiveSheet()->SetCellValue('L3', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Business');
        $objPHPExcel->getActiveSheet()->SetCellValue('N3', 'Location');
        $objPHPExcel->getActiveSheet()->SetCellValue('O3', 'Group');


        $objPHPExcel->getActiveSheet()->SetCellValue('P3', 'Credit Term');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'Company Anniversary');
        $objPHPExcel->getActiveSheet()->SetCellValue('R3', 'Marriage Anniversary');
        $objPHPExcel->getActiveSheet()->SetCellValue('S3', 'Date Of Birth');
        $objPHPExcel->getActiveSheet()->SetCellValue('T3', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('U3', 'Pincode');
        $objPHPExcel->getActiveSheet()->SetCellValue('V3', 'Mailing Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('W3', 'Notes');







        $objPHPExcel->getActiveSheet()->getStyle("A3:W3")->getFont()->setBold(true);
        
        // $objPHPExcel->getActiveSheet()->getStyle('D4')->getNumberFormat()->setFormatCode('####');
        // $objPHPExcel->getActiveSheet()->getStyle('D4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A3:W3')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A2:W2')->applyFromArray($styleArray);

        $objPHPExcel->getActiveSheet()->getStyle('A3:W3')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'c6d9f1')
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A2:W2')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'c6d9f1'),
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getColumnDimension('A2')->setWidth(30);
        $rowCount = 4;
        $this->db->where('org_id', $org_id);
        $data = $this->db->get('tbl_customer')->result();
        $finalarray = array();
        $cnt = 1;
        foreach ($data as  $res) {
            $account_manager = $res->account_manager;
            $acc_name = '';
            $type_name = '';
            $buss_name = '';
            $loc_name = '';
            $cr_name = '';
            $group_name = '';

            $company_anniversary = '';
            $marriage_anniversary = '';

            if ($account_manager > 0) {
                $this->db->where('id', $account_manager);
                $emp_data = $this->db->get('tbl_admin_login')->row();
                $acc_name = $emp_data->name;
            }

            if (!empty($res->company_anniversary) && $res->company_anniversary != '1970-01-01') {
                $company_anniversary = date("d/m/Y", strtotime($res->company_anniversary));
            }

            if (!empty($res->marriage_anniversary) && $res->marriage_anniversary != '1970-01-01') {
                $marriage_anniversary = date("d/m/Y", strtotime($res->marriage_anniversary));
            }

            if (!empty($res->dob) && $res->dob != '1970-01-01') {
                $dob = date("d/m/Y", strtotime($res->dob));
            }

            if (!empty($res->pincode) && $res->pincode = '') {
                $pincode = $res->pincode;
            }
            else
            {
                $pincode = '';
            }
            if (!empty($res->mailing_name) && $res->mailing_name = '') {
                $mailing_name = $res->mailing_name;
            }
            else
            {
                $mailing_name = '';
            }

            if (!empty($res->notes) && $res->notes = '') {
                $notes = $res->notes;
            }
            else
            {
                $notes = '';
            }

            $this->db->where('type_id', $res->type_id);
            $tbl_type_data = $this->db->get('tbl_type')->row();
            $type_name = $tbl_type_data->title;

            $this->db->where('business_id', $res->business_id);
            $tbl_business_data = $this->db->get('tbl_business')->row();
            $buss_name = $tbl_business_data->business_name;

            $this->db->where('location_id', $res->location_id);
            $tbl_location_data = $this->db->get('tbl_location')->row();
            $loc_name = $tbl_location_data->location;

            $this->db->where('credit_id', $res->credit_id);
            $tbl_location_data = $this->db->get('tbl_credit_term')->row();
            $cr_name = $tbl_location_data->credit_name;

            $this->db->where('group_id', $res->group_id);
            $tbl_location_data = $this->db->get('tbl_group')->row();
            $group_name = $tbl_location_data->group_name;

            $this->db->where('id', $res->country);
            $country_data = $this->db->get('countries')->row();
            $countryname = $country_data->name;

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $res->company_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $res->contact_person_name1);

            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $acc_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $res->phone_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $res->alternate_number);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $res->landline_number);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $res->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $res->alternate_email);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $res->address);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $res->city);

            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $state_name);

            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $type_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $buss_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $loc_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $group_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $cr_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $company_anniversary);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $marriage_anniversary);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $dob);
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $countryname);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $pincode);
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $mailing_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $notes);

            $rowCount++;
            $cnt++;
        }

        $filename = 'Contacts.xlsx';
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $filename . "");
        header("Content-Transfer-Encoding: binary ");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }


    public function UploadScheduleDocument($query_id)
    {
        $this->db->select('schedule_id');
        $this->db->where('issue_id', $query_id);
        $schedule_data = $this->db->get('tbl_schedule')->row();

        $count = count($_FILES['Document']['name']);

        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['Document']['name'][$i])) {
                $image = $_FILES['Document']['name'][$i];
                $cur_date = date("dmyHis");
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file = $cur_date . '_' . $i . ".$extension";
                $move_file = FCPATH . 'assets/admin/scheduledocuments/';
                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['Document']['tmp_name'][$i], $move_file1);
                chmod($move_file1, 0755);
                $Array = array(
                    'schedule_id' => $schedule_data->schedule_id,
                    'issue_id' => $query_id,
                    'upload_by' => $_SESSION['id'],
                    'uploadfilename' => $store_file,
                    'doc_name' => $image,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_schedule_document', $Array);
            }
        }
    }

    public function UploadSchedulePhoto($query_id)
    {
        $this->db->select('schedule_id');
        $this->db->where('issue_id', $query_id);
        $schedule_data = $this->db->get('tbl_schedule')->row();

        $count = count($_FILES['PhotoUpload']['name']);

        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['PhotoUpload']['name'][$i])) {
                $image = $_FILES['PhotoUpload']['name'][$i];
                $cur_date = date("dmyHis");
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file = $cur_date . '_' . $i . ".$extension";
                $move_file = FCPATH . 'assets/admin/scheduledocuments/';
                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['PhotoUpload']['tmp_name'][$i], $move_file1);
                chmod($move_file1, 0755);
                $Array = array(
                    'schedule_id' => $schedule_data->schedule_id,
                    'issue_id' => $query_id,
                    'upload_by' => $_SESSION['id'],
                    'uploadfilename' => $store_file,
                    'doc_name' => $image,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_schedule_document', $Array);
            }
        }
    }

    public function fetchschedule_type()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_schedule_type_name')->result();
    }

    public function ScheduleReport($type,$startdate,$enddate)
    {
        $assign_to = $_SESSION['id'];
        $org_id = $this->session->org_id;
        if ($type == 'All') 
        {
            if ($_SESSION['user_type'] == 'SA') 
            {
                // $data = $this->db->query(" SELECT * FROM `tbl_user_querys`  WHERE org_id='$org_id' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE  status = 'completed' and org_id='$org_id' or status = 'in_complete' and org_id='$org_id' or status = 'pending'and org_id='$org_id' or status = 'in_progress' and org_id='$org_id' ORDER BY query_id DESC ");
            } 
            else 
            {
                // $data = $this->db->query(" SELECT * FROM `tbl_user_querys` WHERE org_id='$org_id' and assign_to='$assign_to' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
                $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE status = 'completed' and org_id='$org_id' and assign_to='$assign_to'or status = 'in_complete' and org_id='$org_id' and assign_to='$assign_to' or status = 'pending' and org_id='$org_id' and assign_to='$assign_to' or status = 'in_progress' and org_id='$org_id' and assign_to='$assign_to' ORDER BY query_id DESC ");

            }
        } 
        else if ($type == 'Completed') 
        {

            if ($_SESSION['user_type'] == 'SA') 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE  org_id='$org_id' and status='completed' ORDER BY query_id DESC ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE  org_id='$org_id' and status='completed' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
            } 
            else 
            {
                $data = $this->db->query("  SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='completed' and assign_to='$assign_to' ORDER BY query_id DESC ");
                // $data = $this->db->query("  SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='completed' and assign_to='$assign_to'  AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
            }
        } 
        else if ($type == 'Pending') 
        {
            if ($_SESSION['user_type'] == 'SA') 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending' ORDER BY query_id DESC ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
            } 
            else 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending' and assign_to='$assign_to' ORDER BY query_id DESC ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='pending' and assign_to='$assign_to'  AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC ");
            }
        } 
        else if ($type == 'Incompleted') 
        {

            if ($_SESSION['user_type'] == 'SA') 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='in_complete' ORDER BY query_id DESC  ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC  ");
            } 
            else 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='in_complete'  and assign_to='$assign_to' ORDER BY query_id DESC  ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted'  and assign_to='$assign_to' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC  ");
            }
        }

        else if ($type == 'Inprogress') 
        {

            if ($_SESSION['user_type'] == 'SA') 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='in_progress' ORDER BY query_id DESC  ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC  ");
            } 
            else 
            {
                $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='in_progress'  and assign_to='$assign_to' ORDER BY query_id DESC  ");
                // $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='incompleted'  and assign_to='$assign_to' AND `assign_date` >= '$startdate' and `assign_date` <= '$enddate' ORDER BY query_id DESC  ");
            }
        }
        
        // echo "<pre>";
        // print_r($data->result());

        $issue = array();
        foreach ($data->result() as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $arr = array(
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'phone_no' => $phone_no,
                'email' => $email,
                'customer_id' => $customer_id,
                'product_name' => $value->product_name,
                'query_id' => $value->query_id,
                'issue' => $value->issue,
                'ticket_no' => $value->ticket_no,
                'status' => $value->status,
                'priority' => $value->priority,
                'created_date' => $value->created_date,
                'assign_date' => $assign_date,
                'starttime' => $assign_starttime,
                'endtime' => $assign_endtime,
                'check_assign' => $check_assign,
                'highlight' => $highlight,
                'schedulecount' => $schedulecount1,
                'employee_name' => $employee_name
            );
            array_push($issue, $arr);
        }
        return $issue;
    }

    public function Add_customer($formdata)
    {
        $admin_id = $this->session->id;
        $dob2 = str_replace(',', ' ', $formdata['dob']);
        $dob1 = date("Y-m-d", strtotime($dob2));
        if ($formdata['company_aniversary'] != '') {
            $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
            $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
        } else {
            $company_anniversary = '';
        }
        if ($formdata['marriage_aniversary'] != '') {
            $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
            $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
        } else {
            $marriage_anniversary = '';
        }
        $bussiness = $formdata['business'];
        $bussiness_id = "";
        for ($i = 0; $i < count($bussiness); $i++) {
            $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1)) {
            $buss_id = '0';
        } else {
            $buss_id = $buss_id1;
        }
        //Account Manager
        $account_manager = $formdata['account_manager'];
        $account_manager_id = "";
        for ($i = 0; $i < count($account_manager); $i++) {
            $account_manager_id = $account_manager_id . $account_manager[$i] . ",";
        }
        $account_id1 = trim($account_manager_id, ',');
        if (empty($account_id1)) {
            $account_id1 = '';
        } else {
            $account_id1 = $account_id1;
        }
        // ------------------ Primary / Secondary Account --------------------------------
        if ($formdata['custtype'] == 'primary') 
        {
            $ordanizer_name = TRIM($formdata['ordanizer_name']);

            $parentid = '0';
        } 
        
        else 
        {
            $parentid = $formdata['parentid'];
            $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
            $ordanizer_name = $parent_res->company_name;
        }
        

        // -------------------------------------------------------------------------------------------

        if(!empty($formdata['reference']))
        {
            $reference_id = $formdata['reference'];
            $reference_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$reference_id'")->row();
            $reference_name = $reference_res->company_name;
        }
        else
        {
            $reference_id = $formdata['reference'];
            $reference_name = '';
        }
        
        if(!empty($formdata['contact_code']))
        {
            $contact_code1 = $formdata['contact_code'];
        }
        else
        {
            $contact_code1 = '';
        }

        $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
        if($check_code2->auto_contact_code != '')
        {
            $code2 = $check_code2->auto_contact_code; 
            $contact_code2 = (int)$code2 + 1;
        }
        else
        {
            $contact_code2 = '1000000';
        }
        if($formdata['password'] == '')
        {
            $password = 'buro123';
        }
        else
        {
            $password = $formdata['password'];
        }
        $date = date("Y-m-d H:i:s");
        if ($formdata['address2'] == '') {
            $data1 = array(
                'created_by' => $admin_id,
                'parent_id' => $parentid,
                'type_id' => $formdata['type'],
                'business_id' => $buss_id,
                'location_id' => $formdata['location'],
    
                'pincode' => $formdata['pincode'],
                'pan_no' => $formdata['pan_no'],
                'tan_no' => $formdata['tan_no'],
                'registration_type' => $formdata['registration_type'],
                'gstin' => $formdata['gstin'],
                'credit_term' => $formdata['credit_term'],
                'address2' => $formdata['address2'],
                'mailing_name' => $formdata['mailing_name'],
                // 'contact_code' => $formdata['contact_code'],
                'contact_code' => $contact_code1,
                'auto_contact_code' => $contact_code2,
                'group_id' => $formdata['group'],
                'company_name' => $ordanizer_name,
                'contact_person_name1' => $formdata['contact_person'],
                'alternate_email' => $formdata['alternate_email_id'],
                'phone_no' => $formdata['contact_number1'],
                'alternate_number' => $formdata['contact_number2'],
                'landline_number' => $formdata['landline_number'],
                'email' => $formdata['email_id'],
                'address' => $formdata['address'],
                'city' => $formdata['city'],
                'state' => $formdata['state'],
                'country' => $formdata['country'],
                'password' => $password,
                'account_manager' => $account_id1,
                'notes' => $formdata['notes'],
                'dob' => $dob1,
                'company_anniversary' => $company_anniversary,
                'marriage_anniversary' => $marriage_anniversary,
                'android_id' => '',
                'cust_type' => $formdata['custtype'],
                'org_id' => $this->session->org_id,
                'created_date' => $date,
                'reference_id' => $reference_id,
                'reference_name' => $reference_name
            );    
        }else{
            $data1 = array(
                'created_by' => $admin_id,
                'parent_id' => $parentid,
                'type_id' => $formdata['type'],
                'business_id' => $buss_id,
                'location_id' => $formdata['location'],
    
                'pincode' => $formdata['pincode'],
                'pan_no' => $formdata['pan_no'],
                'tan_no' => $formdata['tan_no'],
                'registration_type' => $formdata['registration_type'],
                'gstin' => $formdata['gstin'],
                'credit_term' => $formdata['credit_term'],
                'address2' => $formdata['address2'],
                'mailing_name' => $formdata['mailing_name'],
                // 'contact_code' => $formdata['contact_code'],
                'contact_code' => $contact_code1,
                'auto_contact_code' => $contact_code2,
                'group_id' => $formdata['group'],
                'company_name' => $ordanizer_name,
                'contact_person_name1' => $formdata['contact_person'],
                'alternate_email' => $formdata['alternate_email_id'],
                'phone_no' => $formdata['contact_number1'],
                'alternate_number' => $formdata['contact_number2'],
                'landline_number' => $formdata['landline_number'],
                'email' => $formdata['email_id'],
                'address' => $formdata['address'],
                'g_lat' => $formdata['g_lat'],
                'g_long' => $formdata['g_long'],
                'city' => $formdata['city'],
                'state' => $formdata['state'],
                'country' => $formdata['country'],
                'password' => $password,
                'account_manager' => $account_id1,
                'notes' => $formdata['notes'],
                'dob' => $dob1,
                'company_anniversary' => $company_anniversary,
                'marriage_anniversary' => $marriage_anniversary,
                'android_id' => '',
                'cust_type' => $formdata['custtype'],
                'org_id' => $this->session->org_id,
                'created_date' => $date,
                'reference_id' => $reference_id,
                'reference_name' => $reference_name
            );
        }
        
        $res = $this->db->insert('tbl_customer', $data1);
        if ($res) 
        {
            $get_customer_id = $this->db->select('customer_id')->from('tbl_customer')->where($data1)->get()->row()->customer_id;
            $data2 = array(
                'custom_id' => $get_customer_id,
                'org_id' => $this->session->org_id,
                'Password' => $password,
                'email' => $formdata['email_id'],
                'mobile_no' => $formdata['contact_number1'],
                'user_type' => 'C',
                'user_status' => 1,
                'name' => $ordanizer_name,
                'user_type_io' => 'NULL',
                'profile_img' => '',
                'department' => 0,
                'designation' => 0,
                'emp_id' => 'NULL',
                'joining_date' => '',
                'dob' => $dob1,
                'marriage_anniversary_date' => $marriage_anniversary
            );
            $res2 = $this->db->insert('tbl_admin_login', $data2);
            
            if(!empty($_FILES['document']['name']))
            {
                $count = count($_FILES['document']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['document']['name'][$i])) {
                        $image = $_FILES['document']['name'][$i];
                        $cur_date = date("dmyHis");
                        $sepext = explode('.', strtolower($image));
                        $extension = end($sepext);
                        $store_file = $cur_date . '_' . $i . ".$extension";
                        $move_file = FCPATH . 'assets/admin/contactmanagementdocuments/';
                        $move_file1 = $move_file . basename($store_file);
                        move_uploaded_file($_FILES['document']['tmp_name'][$i], $move_file1);
                        chmod($move_file1, 0755);
                        $Array = array(
                            'customer_id' => $get_customer_id,
                            'upload_by' => $_SESSION['id'],
                            'uploadfilename' => $store_file,
                            'doc_name' => $image,
                            'date_created' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl_reference_document', $Array);
                    }
                }
            }
            else
            {

            }
            
            echo 1;
        } 
        else 
        {
            echo 0;
        }
    }


    public function delete_customer($customerid)
    {
        $this->db->set('delete_status', 1);
        $this->db->where('customer_id', $customerid);
		return $this->db->update('tbl_customer');
    }

    public function edit_customer($customerid)
    {
        return $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customerid'");
    }

    public function mult_buss_list($get_businessid)
    {
        
        // echo "SELECT `business_id`, `business_name` FROM `tbl_business` WHERE business_id IN($get_businessid)";
        return $this->db->query("SELECT `business_id`, `business_name` FROM `tbl_business` WHERE business_id IN($get_businessid)");
        // print_r($data->result());
    }



    public function IssueAjaxUserData()
    {
        $org_id = $this->session->org_id;
        $user_type = $this->session->user_type;
        $employee_id = $this->session->id;
        $params = $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        $columns = array(
            0 => 'SRNo',
            1 => 'Ticket No',
            2 => 'Status',
            3 => 'Company Name',
            4 => 'Product Name',
            5 => 'Issue',
            6 => 'Schedule Date',
            7 => 'Schedule To',
            8 => 'Priority',
            9 => 'Assign DateTime',
            10 => 'Assign DateTime',
            11 => 'Action'
        );
        $where = $sqlTot = $sqlRec = "";

        if (!empty($params['search']['value'])) {
            $where .= " and  ticket_no like '" . $params['search']['value'] . "%' ";
        }

        if ($user_type == 'SA') {
            $sql = " 
                       SELECT * FROM `tbl_user_query` 
                       Where org_id='$org_id' 
                    ";
        } else {
            $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where org_id='$org_id'  and assign_to='$employee_id'
                      ";
        }

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if (isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        $sqlRec .= " ORDER BY created_date " . 'DESC' . "  LIMIT " . $params['start'] . "," . $params['length'] . " ";

        $queryTot = $this->db->query($sqlTot)->result();
        $totalRecords = count($queryTot);
        $queryRecords = $this->db->query($sqlRec)->result();
        $i = 1;

        foreach ($queryRecords as $value) {

            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status = $value->status;
            if ($Status == 'pending') {
                $Status = '<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">' . $Status . '</span>';
            } else if ($Status == 'completed') {
                $Status = '<span class="label bg-success" style="line-height: 20px;">' . $Status . '</span>';
            } else if ($Status == 'in_progress') {
                $Status = '<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>';
            } else if ($Status == 'in_complete') {
                $Status = '<span class="label bg-danger" style="line-height: 20px;">' . $Status . '</span>';
            }

            $scheduledatetime = date("d F, Y", strtotime($value->created_date)) . ' ' . date("h:ia", strtotime($assign_starttime)) . ' TO  ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '<a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>' . $employee_name . '<br>';
            } else {
                $check = '
                        <a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>' . $employee_name . '<br>
                     ';
            }

            $priority =  ' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -100px 30px 15px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="' . $value->query_id . '">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="' . $value->query_id . '">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="' . $value->query_id . '">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">' . $value->priority . '</span>
               ';

            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';

            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';

            $new = array(
                0 => $i,
                1 => $value->ticket_no,
                2 => $Status,
                3 => $company_name,
                4 => $contact_person_name1,
                5 => $value->product_name,
                6 => $value->issue,
                7 => $scheduledatetime,
                8 => $check,
                9 => $priority,
                10 => date("d M Y", strtotime($value->created_date)),
                11 => $upload_documents,
                12 => $remark
            );
            $i++;
            array_push($data, $new);
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }


    public function get_daterange_data($formdata)
    {
        $start_date = str_replace(',', ' ', $formdata['start_date']);
        $end_date = str_replace(',', ' ', $formdata['end_date']);
        $from_date = date("Y-m-d", strtotime($start_date));
        $to_date = date("Y-m-d", strtotime($end_date));
        $this->db->where('assign_date >=', $from_date);
        $this->db->where('assign_date <=', $to_date);
        $this->db->where('status != ', 'in_complete');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        if (!empty($formdata['status'])) {
            $this->db->where('status', $formdata['status']);
        }
        $employeeId = $formdata['employee_list'];
        
        if (!empty($employeeId)) {
            $this->db->where_in('assign_to', $employeeId);
        }

        $this->db->order_by('query_id', 'DESC');
        // $this->db->limit(50); 
        $queryRecords = $this->db->get('tbl_user_query')->result();
        // echo $this->db->last_query();
        // var_dump($queryRecords);
        // exit;
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;
            $scheduledatetime = date("h:i a", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));
            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = ' <div class="text-wrap-col" style="width:150px;">' . $employee_name .'</div><a data-toggle="modal" rel="tooltip" title="Reschedule Count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:10px;">' . $schedulecount1 . '</button></a><br>';
            } else {
                $check = ' <div class="text-wrap-col" style="width:150px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:10px;">' . $schedulecount1 . '</button></a><br> ';
            }
            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
                // $bg_color='info';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
                // $bg_color='danger';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            // $priority = '
            //               <a href="#" class="label dropdown-toggle text-black" data-toggle="dropdown" title="Add Priority" data-placement="bottom">
            //                  ' . $value->priority . ' <span class="caret"></span>
            //               </a>
            //               <ul class="dropdown-menu dropdown-menu-right">
                            
            //                 <li ' . $Normal . '>
            //                   <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left dot dot-red"></span> Normal
            //                   </a>
            //                 </li>
            //                 <li ' . $Low . '>
            //                    <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left dot dot-yellow"></span> Low
            //                    </a>
            //                 </li>
            //                 <li ' . $High . ' >
            //                     <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
            //                       <span class="status-mark position-left dot dot-blue"></span> High
            //                     </a>
            //                 </li>
            //               </ul>
            //          ';
            $priority = '
                        
                            <ul>
                                
                                <li ' . $Normal . '>
                                <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-red"></span> Normal
                                </a>
                                </li>
                                <li ' . $Low . '>
                                <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-yellow"></span> Low
                                </a>
                                </li>
                                <li ' . $High . ' >
                                    <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                    <span class="status-mark position-left dot dot-blue"></span> High
                                    </a>
                                </li>
                            </ul>
                     ';



                if ($value->status == 'pending') {
                    $pending = 'class="active"';
                    $bg_color = 'info';
                } else {
                    $pending = '';
                }
                if ($value->status == 'completed') {
                    $completed = 'class="active"';
                    $bg_color = 'success';
                } else {
                    $completed = '';
                }
                if ($value->status == 'in_progress') {
                    $in_progress = 'class="active"';
                    $bg_color = 'danger';
                } else {
                    $in_progress = '';
                }
                // $status_remark = '
                //                 <a href="#" class="label label-info dropdown-toggle blue-bg " data-toggle="dropdown" title="Status Update" data-placement="bottom" aria-expanded="false">
                //                     <span class="caret">' . $value->status . '</span>
                //                 </a>
                //                 <ul class="dropdown-menu dropdown-menu-right">
                                
                //                     <li ' . $pending . '>
                //                         <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                //                             <span class="status-mark position-left dot dot-red"></span> &nbsp;&nbsp;Pending
                //                         </a>
                //                     </li>
                //                     <li ' . $in_progress . ' >
                //                         <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                //                             <span class="status-mark position-left dot dot-yellow"></span> &nbsp;&nbsp;In-progress
                //                         </a>
                //                     </li>
                //                     <li ' . $completed . '>
                //                         <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                //                             <span class="status-mark position-left dot dot-blue"></span> &nbsp;&nbsp;Completed
                //                         </a>
                //                     </li>
                //                 </ul> ';
                $status_remark = '
                                <ul>
                                
                                    <li ' . $pending . '>
                                        <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                                            <span class="status-mark position-left dot dot-red"></span> &nbsp;&nbsp;Pending
                                        </a>
                                    </li>
                                    <li ' . $in_progress . ' >
                                        <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                                            <span class="status-mark position-left dot dot-yellow"></span> &nbsp;&nbsp;In-progress
                                        </a>
                                    </li>
                                    <li ' . $completed . '>
                                        <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                                            <span class="status-mark position-left dot dot-blue"></span> &nbsp;&nbsp;Completed
                                        </a>
                                    </li>
                                </ul> ';

            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';
            $viewUrl = base_url('admin/ScheduleManagement/Task_view_page?task_id='. $value->query_id .'');

            $action_btn = '
                    <ul>
                        <li>
                            <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                <span class="status-mark position-left dot dot-green"></span> &nbsp;&nbsp;Re-Schedule 
                            </a>
                        </li>
                        <li>
                            <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                <span class="status-mark position-left dot dot-yellow"></span> &nbsp;&nbsp;Transfer Task
                            </a>
                        </li>
                        
                        <li>
                            <a href="'.$viewUrl.'" style="color:#333333;">
                                <span class="status-mark position-left dot dot-blue"></span> &nbsp;&nbsp;View Task
                            </a>
                        </li>
                        <li>
                            <a onclick="openAddBookDialog(this)" id="' . $value->query_id . '" data-id="' . $value->query_id . '">
                                <span class="status-mark position-left dot dot-red"></span> &nbsp;&nbsp;Delete Task
                            </a>
                        </li>
                    </ul>
            ';
            //---------------------------------------------------------------                    
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'created_date' => date("d F, Y", strtotime($value->created_date)),
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'upload_documents' => $upload_documents,
                'remark' => $remark,
                'status_remark' => $status_remark,
                'action_btn' => $action_btn,
                'value_priority' => $value->priority,
                'value_status' => $value->status
            );
            array_push($data, $new);
        }
        
        return $data;
    }

    public function get_daterange_delete_data($formdata)
    {
        $start_date = str_replace(',', ' ', $formdata['start_date']);
        $end_date = str_replace(',', ' ', $formdata['end_date']);
        $from_date = date("Y-m-d", strtotime($start_date));
        $to_date = date("Y-m-d", strtotime($end_date));
        $this->db->where('assign_date >=', $from_date);
        $this->db->where('assign_date <=', $to_date);
        $this->db->where('status != ', 'in_complete');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 1);
        if (!empty($formdata['status'])) {
            $this->db->where('status', $formdata['status']);
        }
        $employeeId = $formdata['employee_list'];

        if (!empty($formdata['employee_list'])) {
            $this->db->where_in('assign_to', $employeeId);
        }

        $this->db->order_by('query_id', 'DESC');
        // $this->db->limit(50); 
        $queryRecords = $this->db->get('tbl_user_query')->result();
        // echo $this->db->last_query();
        // var_dump($queryRecords);
        // exit;
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;
            $scheduledatetime = date("h:ia", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));
            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '
                <div class="text-wrap-col" style="width:200px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a> <br>';
            } else {
                $check = '
                <div class="text-wrap-col" style="width:200px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>
                ';
            }
            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
                // $bg_color='info';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
                // $bg_color='danger';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            $priority = '
                          <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
                             ' . $value->priority . '</span>
                          </a>
                     ';

                if ($value->status == 'pending') {
                    $pending = 'class="active"';
                    $bg_color = 'info';
                } else {
                    $pending = '';
                }
                if ($value->status == 'completed') {
                    $completed = 'class="active"';
                    $bg_color = 'success';
                } else {
                    $completed = '';
                }
                if ($value->status == 'in_progress') {
                    $in_progress = 'class="active"';
                    $bg_color = 'danger';
                } else {
                    $in_progress = '';
                }
                $status_remark = '
                                <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
                                    ' . $value->status . '</span>
                                </a>
                ';
            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';
            $action_btn = '
                    <a href="#" class="label label-info dropdown-toggle" data-toggle="dropdown" style="color: white;">
                        Select Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                <span class="status-mark position-left dot dot-red"></span> RE-SCHEDULE 
                            </a>
                        </li>
                        <li>
                            <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                <span class="status-mark position-left dot dot-yellow"></span> TRANSFER SCHEDULE
                            </a>
                        </li>
                    </ul>
            ';
            //---------------------------------------------------------------                    
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'created_date' => date("d F, Y", strtotime($value->created_date)),
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'upload_documents' => $upload_documents,
                'remark' => $remark,
                'status_remark' => $status_remark,
                'action_btn' => $action_btn,
                'value_status' => $value->status,
                'value_priority' => $value->priority


            );
            array_push($data, $new);
        }
        return $data;
    }

    public function ResheduleActivityData($id)
    {
        // echo "<pre>";
		// 	print_r($id);
		// 	die;
        $this->db->select('tbl_user_query.*,tbl_schedule.schedule_type_id');
        $this->db->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id');
        $this->db->where('query_id',$id);
        return $this->db->get('tbl_user_query')->row();
    }

    public function ResheduleActivitySubmit($formdata)
    {
        $org_id = $_SESSION['org_id'];
        $schedule_date_1 = str_replace(',', ' ', $formdata['schedule_date']);
        $schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
        $s_time = $formdata['schedule_start_time'];
        $e_time = $formdata['schedule_end_time'];
        $query_id = $formdata['edit_id'];
        $employee_id = $formdata['assign_to'];
        $ticket_no = $formdata['ticket_no'];
        $remark = $formdata['query'];
        $customer_id = $formdata['customer_id'];
        $product_id = $formdata['product_id'];
        $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row();
        $product_name = $pdr_name->prdsrv_name;
    
        $get_schedule_type_id = $formdata['schedule_type_id'];

        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

        $available_count = $available->num_rows();
        
        if ($available_count == 0) {
            $date = date("Y-m-d H:i:s");
            $schedule_result = $this->db->query("SELECT schedule_type,ticket_no,schedule_id,schedule_type_id FROM tbl_schedule WHERE issue_id='$query_id' ORDER BY schedule_id DESC limit 1")->row();

            $schedule_type = $schedule_result->schedule_type;
            $schedule_ticket_num = $schedule_result->ticket_no;
            $schedule_id = $schedule_result->schedule_id;
            $schedule_type_id = $schedule_result->schedule_type_id;

            $reschedule = "reschedule";
            $this->db->set('reschedule', $reschedule);
            $this->db->set('schedule_type_id', $get_schedule_type_id);
            $this->db->where('schedule_id', $schedule_id);
            $this->db->update('tbl_schedule');

            $ticket_reschedule = $this->db->query("SELECT ticket_no FROM tbl_user_query WHERE query_id='$query_id'")->row();
            $final_ticket_num = $ticket_reschedule->ticket_no;

            $data = $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$employee_id','$query_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$s_time','$e_time','$schedule_type','$date')");

            $insert_id = $this->db->insert_id();
            if ($data) {
                $this->db->query("INSERT INTO `tbl_task_status`(`org_id`,`employee_id`, `customer_id`, `product_id`,`query_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$org_id','$employee_id','$customer_id','$product_id','$query_id','$schedule_id','$ticket_no','$remark','reschedule','$date')");

                $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                $name = $emp_name->name;

                //======================= sending notification to customer regarding assign issue ===============

                $data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $android_id = $data3->android_id;
                // $contact_person_name1 = $data2->contact_person_name1;

                // ----------------- Insertinf notification to table ---------------------------

                $notification_msg = "Your issue " . $final_ticket_num . " is Schedule to " . $formdata['schedule_date'] . "by " . $name;
                $date = date("Y-m-d H:i:s");

                $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$employee_id','$customer_id','Issue Re-Schedule','$notification_msg','pending','$date')");

                $notification_id1 = $this->db->insert_id($res1);

                // ----------------- Insertinf notification to table ---------------------------

                $reg_token = $android_id;

                $data = array('server_notification' => "customer_query_status_updated", 'message' => 'Your issue ' . $final_ticket_num . ' is Schedule to ' . $formdata['schedule_date'] . 'by ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);

                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {
                    $notification_date = date("Y-m-d", strtotime($schedule_date1));
                    $pending = "pending";
                    $this->db->set('status', $pending);
                    $this->db->set('assign_to', $employee_id);
                    // $this->db->set('status', $pending);
                    $this->db->where('query_id', $query_id);
                    $this->db->update('tbl_user_query');
                    // echo 1;
                }
                curl_close($ch);
                if ($formdata['addReminder'] == 1) 
                {
                    $recurring_eod1 = str_replace(',', ' ', $formdata['recurring_eod']);
                    $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
                    $eod_date = date("Ymd", strtotime($recurringEOD));

                    $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
                    $conv_date = date("Ymd", strtotime($schd_date1));

                    $rem_notify_by = $formdata['reminder_notify_by'];
                    $rem_notify_by_id = "";
                    for ($i = 0; $i < count($rem_notify_by); $i++) 
                    {
                        $rem_notify_by_id = $rem_notify_by_id . $rem_notify_by[$i] . ","; 
                    }
                    $rem_notify_by_id1 = trim($rem_notify_by_id, ',');
                    if (empty($rem_notify_by_id1)) 
                    {
                        $rem_notify_by_id1 = '';
                    } 
                    else 
                    {
                        $rem_notify_by_id1 = $rem_notify_by_id1;
                    }

                    $reminder_title = $schedule_ticket_num.' - '.$product_name;

                    $check_title = $this->db->select('*')->from('tbl_reminder')->where('reminder_title', $reminder_title)->get()->row();
                    
                    if(!empty($check_title))
                    {
                        if($formdata['recurring_set'] == 1)
                        {
                            $data1 = array(
                                'org_id'=>$this->session->org_id,
                                'time_zone' => $this->session->org_timezone,
                                'recd_id' => $insert_id,
                                'module_name'=> 'Activity',
                                'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                'user_id' => implode(',',$formdata['user_id']),
                                'reminder_date' => $conv_date,
                                'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                'reminder_before_time' => $formdata['reminder_before_time'],
                                'notify_id' => $rem_notify_by_id1,
                                'reminder_note' => $formdata['reminder_note'],
                                'recurring_set' => $formdata['recurring_set'],
                                'interval_type' => $formdata['interval_type'],
                                'recurring_eod' => $eod_date,
                            );
                            $this->db->where('reminder_title',$reminder_title);
                            $this->db->set($data1);
                            $this->db->update('tbl_reminder');

                            $reminderID = $check_title->reminder_id; 
 
                            $this->db->where('reminder_id', $reminderID);
                            $this->db-> delete('tbl_reminder_recurring');                       
        
                            $recurringDatesListArray = array();
                            $recurringDatesArray = $this->getRecurringDateString($formdata['interval_type'],$conv_date,$recurringEOD);
                            
                            $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($formdata['reminder_time'])))));
                            $b = new DateTime(date('H:i:s',strtotime($formdata['reminder_before_time'])));
                            $interval = $a->diff($b);
                            $timeDiff = $interval->format("%H:%i:%s%s");
        
                            for ($i=0; $i < count($recurringDatesArray); $i++) { 
                                $rec_data = array(
                                    'time_zone' => $this->session->org_timezone,
                                    'notify_id' => $rem_notify_by_id1,
                                    'reminder_id' => $reminderID,
                                    'recurring_rem_date' => $conv_date,
                                    'recurring_rem_time' => date('H:i',strtotime($formdata['reminder_time'])),
                                    'recurring_date' => $recurringDatesArray[$i],
                                    'recurring_time' => $timeDiff,
                                    'recurring_mail_sent' => 0,
                                    'recurring_user_id' => implode(',',$formdata['user_id']),
                                );
                                array_push($recurringDatesListArray,$rec_data);
                            }
                            
                            $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
                            if($res)
                            {
                                echo 1;
                            }
                            else
                            {
                                echo 0;
                            }
                        }
                        else
                        {
                            $data1 = array(
                                'org_id'=>$this->session->org_id,
                                'time_zone' => $this->session->org_timezone,
                                'recd_id' => $insert_id,
                                'module_name'=> 'Activity',
                                'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                'user_id' => implode(',',$formdata['user_id']),
                                'reminder_date' => $conv_date,
                                'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                'reminder_before_time' => $formdata['reminder_before_time'],
                                'reminder_note' => $formdata['reminder_note'],
                                'recurring_set' => $formdata['recurring_set']
                            );
                            $res = $this->db->insert('tbl_reminder',$data1);
                            if($res){
                                echo 1;
                            }else{
                                echo 0;
                            }
                        }
                    }

                    else
                    {
                        if($formdata['recurring_set'] == 1)
                        {
                            $data1 = array(
                                'org_id'=>$this->session->org_id,
                                'time_zone' => $this->session->org_timezone,
                                'recd_id' => $insert_id,
                                'module_name'=> 'Activity',
                                'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                'user_id' => implode(',',$formdata['user_id']),
                                'reminder_date' => $conv_date,
                                'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                'reminder_before_time' => $formdata['reminder_before_time'],
                                'notify_id' => $rem_notify_by_id1,
                                'reminder_note' => $formdata['reminder_note'],
                                'recurring_set' => $formdata['recurring_set'],
                                'interval_type' => $formdata['interval_type'],
                                'recurring_eod' => $eod_date,
                            );
                            $this->db->insert('tbl_reminder',$data1);
                            $reminderID = $this->db->insert_id(); 
        
                            $recurringDatesListArray = array();
                            $recurringDatesArray = $this->getRecurringDateString($formdata['interval_type'],$conv_date,$recurringEOD);
                            
                            $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($formdata['reminder_time'])))));
                            $b = new DateTime(date('H:i:s',strtotime($formdata['reminder_before_time'])));
                            $interval = $a->diff($b);
                            $timeDiff = $interval->format("%H:%i:%s%s");
        
                            for ($i=0; $i < count($recurringDatesArray); $i++) { 
                                $rec_data = array(
                                    'time_zone' => $this->session->org_timezone,
                                    'notify_id' => $rem_notify_by_id1,
                                    'reminder_id' => $reminderID,
                                    'recurring_rem_date' => $conv_date,
                                    'recurring_rem_time' => date('H:i',strtotime($formdata['reminder_time'])),
                                    'recurring_date' => $recurringDatesArray[$i],
                                    'recurring_time' => $timeDiff,
                                    'recurring_mail_sent' => 0,
                                    'recurring_user_id' => implode(',',$formdata['user_id']),
                                );
                                array_push($recurringDatesListArray,$rec_data);
                            }
                            $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
                            if($res)
                            {
                                echo 1;
                            }
                            else
                            {
                                echo 0;
                            }
                        }
                        else
                        {
                            $data1 = array(
                                'org_id'=>$this->session->org_id,
                                'time_zone' => $this->session->org_timezone,
                                'recd_id' => $insert_id,
                                'module_name'=> 'Activity',
                                'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                'user_id' => implode(',',$formdata['user_id']),
                                'reminder_date' => $conv_date,
                                'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                'reminder_before_time' => $formdata['reminder_before_time'],
                                'reminder_note' => $formdata['reminder_note'],
                                'recurring_set' => $formdata['recurring_set']
                            );
                            $res = $this->db->insert('tbl_reminder',$data1);
                            if($res){
                                echo 1;
                            }else{
                                echo 0;
                            }
                        }
                    }
                }
                else
                {
                    echo 1;
                }
               
            } else {
                // $response["error"] = TRUE;
                // $response["error_msg"] = "Failed to submit";
                echo 0;
            }
        } else {
            // $response["error"] = TRUE;
            // $response["error_msg"] = "overlapping";
            // echo json_encode($response);
            echo 2;
        }
    }

    public function get_daterange_reschedule_data($formdata)
    {
        $start_date = str_replace(',', ' ', $formdata['start_date']);
        $end_date = str_replace(',', ' ', $formdata['end_date']);
        $from_date = date("Y-m-d", strtotime($start_date));
        $to_date = date("Y-m-d", strtotime($end_date));
        $this->db->where('created_date >=', $from_date);
        $this->db->where('created_date <=', $to_date);
        $this->db->where('status', 'in_complete');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('query_id', 'DESC');
        $queryRecords = $this->db->get('tbl_user_query')->result();
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;

            $scheduledatetime = date("h:ia", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a rel="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else {
                $check = '
                    ' . $employee_name . '&nbsp;
                    <a rel="tooltip"  data-placement="bottom"   onclick="assign_to(this.id)" title="Click for assign task" id="' . $value->query_id . '"><span class="label label-success">Re-Schedule</span></a>
                ';
            }

            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            // $priority = '
            //               <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
            //                  ' . $value->priority . ' <span class="caret"></span>
            //               </a>
            //               <ul class="dropdown-menu dropdown-menu-right">
                            
            //                 <li ' . $Normal . '>
            //                   <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left bg-danger"></span> Normal
            //                   </a>
            //                 </li>
            //                 <li ' . $Low . '>
            //                    <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left bg-info"></span> Low
            //                    </a>
            //                 </li>
            //                 <li ' . $High . ' >
            //                     <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
            //                       <span class="status-mark position-left bg-primary"></span> High
            //                     </a>
            //                 </li>
            //               </ul>
            //          ';
            $priority = '
                          <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip">
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $Normal . '>
                              <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li ' . $Low . '>
                               <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li ' . $High . ' >
                                <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'created_date' => date("d F, Y", strtotime($value->created_date)),
                'value_priority' => $value->priority
            );
            array_push($data, $new);
        }
        return $data;
    }


    public function get_daterange_completed_data($formdata)
    {
        $start_date = str_replace(',', ' ', $formdata['start_date']);
        $end_date = str_replace(',', ' ', $formdata['end_date']);
        $from_date = date("Y-m-d", strtotime($start_date));
        $to_date = date("Y-m-d", strtotime($end_date));
        $this->db->where('created_date >=', $from_date);
        $this->db->where('created_date <=', $to_date);
        $this->db->where('status', 'completed');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('query_id', 'DESC');
        $queryRecords = $this->db->get('tbl_user_query')->result();
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;

            $scheduledatetime = date("h:ia", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else {
                $check = $employee_name;
            }

            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            // $priority = '
            //               <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
            //                  ' . $value->priority . ' <span class="caret"></span>
            //               </a>
            //               <ul class="dropdown-menu dropdown-menu-right">
                            
            //                 <li ' . $Normal . '>
            //                   <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left bg-danger"></span> Normal
            //                   </a>
            //                 </li>
            //                 <li ' . $Low . '>
            //                    <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left bg-info"></span> Low
            //                    </a>
            //                 </li>
            //                 <li ' . $High . ' >
            //                     <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
            //                       <span class="status-mark position-left bg-primary"></span> High
            //                     </a>
            //                 </li>
            //               </ul>
            //          ';
            $priority = '
                          <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip">
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $Normal . '>
                              <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li ' . $Low . '>
                               <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li ' . $High . ' >
                                <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'created_date' => date("d F, Y", strtotime($value->created_date)),
                'value_priority' => $value->priority
            );
            array_push($data, $new);
        }
        return $data;
    }


    public function get_pending_issue_list()
    {
        $created_date = date('Y-m-d');
      
        if ($_SESSION['user_type'] == 'A' || $_SESSION['user_type'] == 'SA') {
            $this->db->select('tbl_user_query.*');
            $this->db->where('DATE(assign_date)', $created_date);
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->order_by('query_id', 'DESC');
            $this->db->where('status != ', 'in_complete');
            $queryRecords = $this->db->get('tbl_user_query')->result();
        }
        else 
        {
            $this->db->select('tbl_user_query.*');
            $this->db->join('tbl_schedule','tbl_user_query.query_id = tbl_schedule.issue_id');
            $this->db->where('tbl_schedule.schedule_assign_to', $_SESSION['id']);
            $this->db->where('DATE(tbl_user_query.assign_date)', $created_date);
            $this->db->where('tbl_user_query.org_id', $this->session->org_id);
            $this->db->where('tbl_user_query.delete_status', 0);
            $this->db->where('tbl_user_query.status != ', 'in_complete');
            $this->db->group_by('issue_id');
            $this->db->order_by('query_id', 'DESC');
            $queryRecords = $this->db->get('tbl_user_query')->result();
        }
        // echo "<pre>";
        // print_r($queryRecords);
        // exit;
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;
            $scheduledatetime = date("h:i a", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '<div class="text-wrap-col" style="width:150px;">' . $employee_name . '</div>&nbsp;<a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><span class="label label-primary"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></span></a> <br>';
            } else {
                $check = '
                <div class="text-wrap-col" style="width:150px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>
                ';
            }
            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
                // $bg_color='info';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
                // $bg_color='danger';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            $priority = '
                          <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip">
                            <span class="caret text-black">' . $value->priority . '</span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $Normal . '>
                              <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left dot dot-red"></span> Normal
                              </a>
                            </li>
                            <li ' . $Low . '>
                               <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left dot dot-yellow"></span> Low
                               </a>
                            </li>
                            <li ' . $High . ' >
                                <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                  <span class="status-mark position-left dot dot-blue"></span> High
                                </a>
                            </li>
                          </ul>
                     ';
            if ($value->status == 'pending') {
                $pending = 'class="active"';
                $bg_color = 'info';
                $name = 'Pending';
            } else {
                $pending = '';
            }
            if ($value->status == 'completed') {
                $completed = 'class="active"';
                $bg_color = 'success';
                $name = 'completed';
            } else {
                $completed = '';
            }
            if ($value->status == 'in_progress') {
                $in_progress = 'class="active"';
                $bg_color = 'danger';
                $name = 'In Progress';
            } else {
                $in_progress = '';
            }

            if ($value->status == 'in_complete') {
                $in_complete = 'class="active"';
                $bg_color = 'success';
                $name = 'Transfer Schedule';
            } else {
                $in_complete = '';
            }

            $status_remark = '
                            <a href="#" class="label label-info dropdown-toggle blue-bg" data-toggle="dropdown" title="Status Update" rel="tooltip" aria-expanded="false" style="top: 0px;position: absolute;right: 18px;top: 0px; color: #fff !important;">
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $pending . '>
                                <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-red"></span> Pending
                                </a>
                            </li>
                            <li ' . $in_progress . ' >
                                <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                                    <span class="status-mark position-left dot dot-yellow"></span> In-progress
                                </a>
                            </li>
                            <li ' . $completed . '>
                                <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-blue"></span> Completed
                                </a>
                            </li>
                        </ul> ';
            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
            ';
            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
            ';

            
            $action_btn = '
                        <a href="#" class="label label-info dropdown-toggle blue-bg" data-toggle="dropdown" style="color: white;" aria-expanded="false">
                            Select Action <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-red"></span> RE-SCHEDULE 
                                </a>
                            </li>
                            <li>
                                <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-yellow"></span> TRANSFER Task
                                </a>
                            </li>
                        </ul>
            ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'created_date' => date("d M, Y", strtotime($value->created_date)),
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'upload_documents' => $upload_documents,
                'remark' => $remark,
                'status_remark' => $status_remark,
                'action_btn' => $action_btn,
                'value_priority' => $value->priority,
                'value_status' => $value->status
            );
            array_push($data, $new);
        }
        
        return $data;
    }

    public function get_deleted_list()
    {
        $created_date = date('Y-m-d');
        
        if ($_SESSION['user_type'] == 'A' || $_SESSION['user_type'] == 'SA') {
            $this->db->where('DATE(assign_date)', $created_date);
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 1);
            $this->db->order_by('query_id', 'DESC');
            $this->db->where('status != ', 'in_complete');
            $this->db->limit(50);
            $queryRecords = $this->db->get('tbl_user_query')->result();
        }else {
            $this->db->select('tbl_user_query.*');
            $this->db->join('tbl_schedule','tbl_user_query.query_id = tbl_schedule.issue_id');
            $this->db->where('tbl_schedule.created_by', $_SESSION['id']);
            $this->db->where('DATE(tbl_user_query.assign_date)', $created_date);
            $this->db->where('tbl_user_query.org_id', $this->session->org_id);
            $this->db->where('tbl_user_query.delete_status', 1);
            $this->db->where('tbl_user_query.status != ', 'in_complete');
            $this->db->order_by('query_id', 'DESC');
            $this->db->limit(50);
            $queryRecords = $this->db->get('tbl_user_query')->result();
        }
        // echo $this->db->last_query();
        // exit;
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;
            $scheduledatetime = date("h:i a", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '<div class="text-wrap-col" style="width:200px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>';
            } else {
                $check = '
                <div class="text-wrap-col" style="width:200px;">' . $employee_name . '</div><a data-toggle="modal"  rel="tooltip" title="Reschedule Count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>
                ';
            }
            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
                // $bg_color='info';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
                // $bg_color='danger';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            $priority = '<a href="#" class="label label-info dropdown-toggle    blue-bg" data-toggle="dropdown" title="Add Priority" rel="tooltip" aria-expanded="false" >
            ' . $value->priority . ' <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                
                <li ' . $Normal . '>
                    <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                        <span class="status-mark position-left dot dot-red"></span> Pending
                    </a>
                </li>
                <li ' . $Low . ' >
                    <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                        <span class="status-mark position-left dot dot-yellow"></span> In-progress
                    </a>
                </li>
                <li ' . $High . '>
                    <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                        <span class="status-mark position-left dot dot-blue"></span> Completed
                    </a>
                </li>
            </ul> ';
            if ($value->status == 'pending') {
                $pending = 'class="active"';
                $bg_color = 'info';
                $name = 'Pending';
            } else {
                $pending = '';
            }
            if ($value->status == 'completed') {
                $completed = 'class="active"';
                $bg_color = 'success';
                $name = 'completed';
            } else {
                $completed = '';
            }
            if ($value->status == 'in_progress') {
                $in_progress = 'class="active"';
                $bg_color = 'danger';
                $name = 'In Progress';
            } else {
                $in_progress = '';
            }

            if ($value->status == 'in_complete') {
                $in_complete = 'class="active"';
                $bg_color = 'success';
                $name = 'Transfer Schedule';
            } else {
                $in_complete = '';
            }

            $status_remark = '
                            <a href="#" class="label label-info dropdown-toggle blue-bg" data-toggle="dropdown" aria-expanded="false">
                            ' . $name . '  <span class="caret"></span>
                            </a>';
            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
            ';
            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
            ';

            
            $action_btn = '
                        <a href="#" class="label label-info dropdown-toggle blue-bg" data-toggle="dropdown" style="color: white;" aria-expanded="false">
                            Select Action <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-red"></span> RE-SCHEDULE 
                                </a>
                            </li>
                            <li>
                                <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-yellow"></span> TRANSFER SCHEDULE
                                </a>
                            </li>
                        </ul>
            ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'created_date' => date("d M, Y", strtotime($value->created_date)),
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'upload_documents' => $upload_documents,
                'remark' => $remark,
                'status_remark' => $status_remark,
                'action_btn' => $action_btn,
                'value_priority' => $value->priority,
                'value_status' => $value->status
            );
            array_push($data, $new);
        }
        return $data;
    }

    public function delete_activity($id)
    {
        $this->db->set('delete_status',1);
        $this->db->where('query_id',$id);
        $this->db->update('tbl_user_query');
    }
    public function restore_activity($id)
    {
        $this->db->set('delete_status',0);
        $this->db->where('query_id',$id);
        $this->db->update('tbl_user_query');
    }
    public function permanent_delete_activity($id)
    {
        $this->db->where('query_id',$id);
        $this->db->delete('tbl_user_query');
    }
    public function get_reschedule_issue_list()
    {
        $assign_to = $_SESSION['id'];
        if ($_SESSION['user_type'] == 'SA') 
        {
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('status', 'in_complete');
            $this->db->order_by('query_id', 'DESC');
            $queryRecords = $this->db->get('tbl_user_query')->result();
        } 
        else 
        {
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('assign_to',$assign_to);
            $this->db->where('status', 'in_complete');
            $this->db->order_by('query_id', 'DESC');
            $queryRecords = $this->db->get('tbl_user_query')->result();
        }

        // $this->db->where('org_id', $this->session->org_id);
        // $this->db->where('status', 'in_complete');
        // $this->db->order_by('query_id', 'DESC');
        // $queryRecords = $this->db->get('tbl_user_query')->result();
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            //$get_priority = $value->priority;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'" )->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;

            $scheduledatetime = date("h:i a", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') 
            {
                $check = ' <a  data-toggle="modal" rel="tooltip" title="Click for schedule task"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '" ><button class="red-btn">Not-SHD</button></a>';
            } 
            else 
            {
                $check = '<div class="text-wrap-col" style="width:150px;">' . $employee_name . '</div>&nbsp; <a class="ml-2" data-toggle="modal" rel="tooltip" title="Click for assign task"  data-placement="bottom" onclick="assign_to(this.id)"  id="' . $value->query_id . '"><button class="green-btn pl-2 pr-2">Re-SHD</button></a>';
            }

            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            // $priority = '
            //               <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" data-placement="bottom">
            //                  ' . $value->priority . ' <span class="caret"></span>
            //               </a>
            //               <ul class="dropdown-menu dropdown-menu-right">
                            
            //                 <li ' . $Normal . '>
            //                   <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left dot dot-red"></span> Normal
            //                   </a>
            //                 </li>
            //                 <li ' . $Low . '>
            //                    <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
            //                      <span class="status-mark position-left dot dot-yellow"></span> Low
            //                    </a>
            //                 </li>
            //                 <li ' . $High . ' >
            //                     <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
            //                       <span class="status-mark position-left dot dot-blue"></span> High
            //                     </a>
            //                 </li>
            //               </ul>
            //          ';
            $priority = '
            <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip" style="position: absolute;right: 62px;top: 0px; color: #fff !important;">
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              
              <li ' . $Normal . '>
                <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                   <span class="status-mark position-left dot dot-red"></span> Normal
                </a>
              </li>
              <li ' . $Low . '>
                 <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                   <span class="status-mark position-left dot dot-yellow"></span> Low
                 </a>
              </li>
              <li ' . $High . ' >
                  <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                    <span class="status-mark position-left dot dot-blue"></span> High
                  </a>
              </li>
            </ul>
       ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'created_date' => date("d M Y", strtotime($value->created_date)),
                'value_priority' => $value->priority
            );
            array_push($data, $new);
        }
        
        return $data;
    }


    public function get_complete_issue_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('status', 'completed');
        $this->db->order_by('query_id', 'DESC');

        // $this->db->limit(50); 

        $queryRecords = $this->db->get('tbl_user_query')->result();
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;

            $scheduledatetime = date("h:i a", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else {
                $check = $employee_name;
            }

            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            // $priority = '
            //                   <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" >
            //                      ' . $value->priority . ' <span class="caret"></span>
            //                   </a>
            //                   <ul class="dropdown-menu dropdown-menu-right">
                                
            //                     <li ' . $Normal . '>
            //                       <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
            //                          <span class="status-mark position-left bg-danger"></span> Normal
            //                       </a>
            //                     </li>
            //                     <li ' . $Low . '>
            //                        <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
            //                          <span class="status-mark position-left bg-info"></span> Low
            //                        </a>
            //                     </li>
            //                     <li ' . $High . ' >
            //                         <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
            //                           <span class="status-mark position-left bg-primary"></span> High
            //                         </a>
            //                     </li>
            //                   </ul>
            //              ';
            $priority = '
                              <a href="#" class=" abc label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip" style="position: absolute;right: 14px;top: 0px; color: #fff !important;">
                                 <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                
                                <li ' . $Normal . '>
                                  <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                     <span class="status-mark position-left bg-danger"></span> Normal
                                  </a>
                                </li>
                                <li ' . $Low . '>
                                   <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                     <span class="status-mark position-left bg-info"></span> Low
                                   </a>
                                </li>
                                <li ' . $High . ' >
                                    <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                      <span class="status-mark position-left bg-primary"></span> High
                                    </a>
                                </li>
                              </ul>
                         ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'created_date' => date("d M, Y", strtotime($value->created_date)),
                'value_priority' => $value->priority,
                'value_status' => $value_status,
                'get_priority' => $get_priority
            );
            array_push($data, $new);
        }
        return $data;
    }




    public function IssueAjaxData()
    {
        $org_id = $this->session->org_id;
        $user_type = $this->session->user_type;
        $employee_id = $this->session->id;
        $params = $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        $columns = array(
            0 => 'SRNo',
            1 => 'Ticket No',
            2 => 'Status',
            3 => 'Company Name',
            4 => 'Product Name',
            5 => 'Issue',
            6 => 'Schedule Date',
            7 => 'Schedule To',
            8 => 'Priority',
            9 => 'Assign DateTime',
            10 => 'Assign DateTime',
            11 => 'Action'
        );
        $where = $sqlTot = $sqlRec = "";

        if (!empty($params['search']['value'])) {
            $where .= " and  ticket_no like '" . $params['search']['value'] . "%' ";
        }

        if ($user_type == 'SA') {
            $sql = " 
                       SELECT * FROM `tbl_user_query` 
                       Where org_id='$org_id' 
                    ";
        } else {
            $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where org_id='$org_id'  and assign_to='$employee_id'
                      ";
        }

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if (isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        $sqlRec .= " ORDER BY created_date " . 'DESC' . "  LIMIT " . $params['start'] . "," . $params['length'] . " ";

        $queryTot = $this->db->query($sqlTot)->result();
        $totalRecords = count($queryTot);
        $queryRecords = $this->db->query($sqlRec)->result();
        $i = 1;

        foreach ($queryRecords as $value) {

            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status = $value->status;
            if ($Status == 'pending') {
                $Status = '<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">' . $Status . '</span>';
            } else if ($Status == 'completed') {
                $Status = '<span class="label bg-success" style="line-height: 20px;">' . $Status . '</span>';
            } else if ($Status == 'in_progress') {
                $Status = '<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>';
            } else if ($Status == 'in_complete') {
                $Status = '<span class="label bg-danger" style="line-height: 20px;">' . $Status . '</span>';
            }

            $scheduledatetime = date("d F, Y", strtotime($value->created_date)) . ' ' . date("h:ia", strtotime($assign_starttime)) . ' TO  ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '<a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>' . $employee_name . '<br>';
            } else {
                $check = '
                ' . $employee_name . '<a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>
                ';
            }

            $priority = ' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -100px 30px 15px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="' . $value->query_id . '">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="' . $value->query_id . '">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="' . $value->query_id . '">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">' . $value->priority . '</span>
               ';

            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';

            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
                                  ';

            $new = array(
                0 => $i,
                1 => $value->ticket_no,
                2 => $Status,
                3 => $company_name,
                4 => $contact_person_name1,
                5 => $value->product_name,
                6 => $value->issue,
                7 => $scheduledatetime,
                8 => $check,
                9 => $priority,
                10 => date("d M Y", strtotime($value->created_date)),
                11 => $upload_documents,
                12 => $remark
            );
            $i++;
            array_push($data, $new);
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }


    public function CompleteIssueAjaxData()
    {
        $user_type = $this->session->user_type;
        $employee_id = $this->session->id;
        $org_id = $this->session->org_id;

        $params = $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        $columns = array(
            0 => 'SRNo',
            1 => 'Ticket No',
            2 => 'Status',
            3 => 'Company Name',
            4 => 'Product Name',
            5 => 'Issue',
            6 => 'Schedule Date',
            7 => 'Schedule To',
            8 => 'Priority',
            9 => 'Assign DateTime',
            10 => 'Assign DateTime',
            11 => 'Action'
        );
        $where = $sqlTot = $sqlRec = "";

        if (!empty($params['search']['value'])) {
            $where .= " and  ticket_no like '" . $params['search']['value'] . "%' ";
        }

        if ($user_type == 'SA') {
            $sql = "   SELECT * FROM `tbl_user_query`  
                          Where`status`='completed' and org_id='$org_id'
                      ";
        } else {
            $sql = " SELECT * FROM `tbl_user_query`  
                       Where  `status`='completed'  and org_id='$org_id' and   assign_to='$employee_id'
                     ";
        }

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if (isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        $sqlRec .= " ORDER BY created_date " . 'DESC' . "  LIMIT " . $params['start'] . "," . $params['length'] . " ";

        $queryTot = $this->db->query($sqlTot)->result();
        $totalRecords = count($queryTot);
        $queryRecords = $this->db->query($sqlRec)->result();
        $i = 1;


        foreach ($queryRecords as $value) {

            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status = $value->status;
            if ($Status == 'pending') {
                $Status = '<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">' . $Status . '</span>';
            } else if ($Status == 'completed') {
                $Status = '<span class="label bg-success" style="line-height: 20px;">' . $Status . '</span>';
            } else if ($Status == 'in_progress') {
                $Status = '<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>';
            } else if ($Status == 'in_complete') {
                $Status = '<span class="label bg-danger" style="line-height: 20px;">' . $Status . '</span>';
            }

            $scheduledatetime = date("d F, Y", strtotime($value->created_date)) . ' ' . date("h:ia", strtotime($assign_starttime)) . ' TO  ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else {
                $check = $employee_name;
            }

            $priority = ' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -150px 26px 10px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="' . $value->query_id . '">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="' . $value->query_id . '">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="' . $value->query_id . '">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">' . $value->priority . '</span>
               ';

            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
            $new = array(
                0 => $i,
                1 => $value->ticket_no,
                2 => $company_name,
                3 => $contact_person_name1,
                4 => $value->product_name,
                5 => $value->issue,
                6 => date("d F, Y", strtotime($value->created_date)),
                7 => $scheduledatetime,
                8 => $priority,
                9 => $check,
                10 => $remark
            );
            $i++;
            array_push($data, $new);
        }
        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data
        );
        echo json_encode($json_data);
    }



    public function RescheduleIssueAjaxData()
    {
        $user_type = $this->session->user_type;
        $employee_id = $this->session->id;
        $org_id = $this->session->org_id;

        $params = $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        $columns = array(
            0 => 'SRNo',
            1 => 'Ticket No',
            2 => 'Status',
            3 => 'Company Name',
            4 => 'Product Name',
            5 => 'Issue',
            6 => 'Schedule Date',
            7 => 'Schedule To',
            8 => 'Priority',
            9 => 'Assign DateTime',
            10 => 'Assign DateTime',
            11 => 'Action'
        );
        $where = $sqlTot = $sqlRec = "";
        if (!empty($params['search']['value'])) {
            $where .= " and  ticket_no like '" . $params['search']['value'] . "%' ";
        }

        if ($user_type == 'SA') {
            $sql = " 
                        SELECT * FROM `tbl_user_query` 
                        Where `status`='in_complete' and org_id='$org_id' 
                     ";
        } else {
            $sql = " 
                          SELECT * FROM `tbl_user_query` 
                          Where  `status`='in_complete'  and org_id='$org_id' and   assign_to='$employee_id'
                      ";
        }

        $sqlTot .= $sql;
        $sqlRec .= $sql;
        if (isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        $sqlRec .= " ORDER BY created_date " . 'DESC' . "  LIMIT " . $params['start'] . "," . $params['length'] . " ";

        $queryTot = $this->db->query($sqlTot)->result();
        $totalRecords = count($queryTot);
        $queryRecords = $this->db->query($sqlRec)->result();
        $i = 1;


        foreach ($queryRecords as $value) {

            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status = $value->status;
            if ($Status == 'pending') {
                $Status = '<span class="label bg-info" style="line-height: 20px;background-color: #007ad4;border-color: #007ad4;">' . $Status . '</span>';
            } else if ($Status == 'completed') {
                $Status = '<span class="label bg-success" style="line-height: 20px;">' . $Status . '</span>';
            } else if ($Status == 'in_progress') {
                $Status = '<span class="label bg-warning" style="line-height: 20px;background-color: #FF9800;border-color: #FF9800;">In Progress</span>';
            } else if ($Status == 'in_complete') {
                $Status = '<span class="label bg-danger" style="line-height: 20px;">' . $Status . '</span>';
            }

            $scheduledatetime = date("d F, Y", strtotime($value->created_date)) . ' ' . date("h:ia", strtotime($assign_starttime)) . ' TO  ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a rel="tooltip"  data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else {
                $check = '
                          <br>' . $employee_name . '<br>
                        <a  rel="tooltip"  data-placement="bottom" onclick="assign_to(this.id)"  title="Click for assign task" id="' . $value->query_id . '"><span class="label label-success">Re-Schedule</span></a>
                       ';
            }

            $priority = ' 

                 <ul class="icons-list" style="margin-left: 10px; margin: 0px;">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9" style="margin-left:8px; top:0px"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="margin: -150px 26px 10px 0px;">
                      <li><a onclick="priority_normal(this.id)" id="' . $value->query_id . '">Normal</a></li>
                      <li><a onclick="priority_low(this.id)" id="' . $value->query_id . '">Low</a></li>
                      <li><a onclick="priority_high(this.id)" id="' . $value->query_id . '">High</a></li>
                    </ul>
                  </li>
                </ul>
                <span class="label bg-info" style="line-height: 20px;">' . $value->priority . '</span>
               ';

            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
                        ';
            $new = array(
                0 => $i,
                1 => $value->ticket_no,
                2 => $company_name,
                3 => $contact_person_name1,
                4 => $value->product_name,
                5 => $value->issue,
                6 => date("d F, Y", strtotime($value->created_date)),
                7 => $scheduledatetime,
                8 => $priority,
                9 => $check,
                10 => $remark,
            );
            $i++;
            array_push($data, $new);
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }







    // getting selected state list

    public function selected_state_list($customerid)
    {
        $data = $this->db->query("SELECT country FROM `tbl_customer` WHERE `customer_id`='$customerid'")->row();
        $country = $data->country;

        return $this->db->query(" SELECT id,name FROM states WHERE country_id='$country'")->result();
    }


    public function update_customer($formdata)
    {
        
        $dob2 = str_replace(',', ' ', $formdata['dob']);
        $dob1 = date("Y-m-d", strtotime($dob2));
        if ($formdata['company_aniversary'] != '') {
            $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
            $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
        } else {
            $company_anniversary = '';
        }
        if ($formdata['marriage_aniversary'] != '') {
            $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
            $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
        } else {
            $marriage_anniversary = '';
        }
        $bussiness = $formdata['business'];
        $bussiness_id = "";
        for ($i = 0; $i < count($bussiness); $i++) {
            $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1)) {
            $buss_id = '0';
        } else {
            $buss_id = $buss_id1;
        }
        // ------------------ Primary / Secondary Account --------------------------------
        if ($formdata['custtype'] == 'primary') {
            $ordanizer_name = TRIM($formdata['ordanizer_name']);
            $parentid = '0';
        } else {
            $parentid = $formdata['parentid'];
            $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
            $ordanizer_name = $parent_res->company_name;
        }

        // -------------------------------------------------------------------------------------------
        $refer = $formdata['reference'];
        if($refer != '' || $refer != 0)
        {
            $reference_name = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$refer'")->row()->company_name;
        }
        else
        {
            $reference_name =  '';
        }

        $date = date("Y-m-d H:i:s");
        $data1 = array(
            'parent_id' => $parentid,
            'type_id' => $formdata['type'],
            'business_id' => $buss_id,
            'location_id' => $formdata['location'],

            'pincode' => $formdata['pincode'],
            'pan_no' => $formdata['pan_no'],
            'tan_no' => $formdata['tan_no'],
            'registration_type' => $formdata['registration_type'],
            'gstin' => $formdata['gstin'],
            'credit_term' => $formdata['credit_term'],
            'address2' => $formdata['address2'],
            'address3' => $formdata['address3'],
            'g_lat' => $formdata['g_lat'],
            'g_long' => $formdata['g_long'],
            'mailing_name' => $formdata['mailing_name'],
            'contact_code' => $formdata['contact_code'],
            'group_id' => $formdata['group'],
            'company_name' => $ordanizer_name,
            'contact_person_name1' => $formdata['contact_person'],
            'alternate_email' => $formdata['alternate_email_id'],
            'phone_no' => $formdata['contact_number1'],
            'alternate_number' => $formdata['contact_number2'],
            'landline_number' => $formdata['landline_number'],
            'email' => $formdata['email_id'],
            'address' => $formdata['address'],
            'city' => $formdata['city'],
            'state' => $formdata['state'],
            'country' => $formdata['country'],
            'password' => $formdata['password'],
            'account_manager' => implode(",", $formdata['account_manager']),
            'reference_id' => $formdata['reference'],
            'reference_name' => $reference_name,
            'notes' => $formdata['notes'],
            'dob' => $dob1,
            'company_anniversary' => $company_anniversary,
            'marriage_anniversary' => $marriage_anniversary,
            'android_id' => '',
            'cust_type' => $formdata['custtype'],
            'org_id' => $this->session->org_id,
            'updated_on' => $date
        );
        
        $this->db->where('customer_id', $formdata['customer_id']);
        $this->db->update('tbl_customer', $data1);
        
        $data2 = array('Password'=> $formdata['password']);
        $this->db->where('custom_id',$formdata['customer_id']);
        $this->db->update('tbl_admin_login',$data2);
    }


    public function update_lead_customer($formdata)
    {
        // $ordanizer_name = TRIM($formdata['ordanizer_name']);
        // $dob2 = str_replace(',', ' ', $formdata['dob']);
        // $dob1 = date("Y-m-d", strtotime($dob2));
        // if ($formdata['company_aniversary'] != '') {
        //     $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
        //     $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
        // } else {
        //     $company_anniversary = '';
        // }
        // if ($formdata['marriage_aniversary'] != '') {
        //     $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
        //     $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
        // } else {
        //     $marriage_anniversary = '';
        // }
        // $bussiness = $formdata['business'];
        // $bussiness_id = "";

        // for ($i = 0; $i < count($bussiness); $i++) {
        //     $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        // }
        // $buss_id1 = trim($bussiness_id, ',');

        // if (empty($buss_id1)) {
        //     $buss_id = '0';
        // } else {
        //     $buss_id = $buss_id1;
        // }
        // if ($formdata['custtype'] == 'primary') {
        //     $ordanizer_name = TRIM($formdata['ordanizer_name']);
        //     $parentid = '0';
        // } else {
        //     $parentid = $formdata['parentid'];
        //     $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
        //     $ordanizer_name = $parent_res->company_name;
        // }

        // $this->db->where('customer_id', $formdata['customer_id']);
        // $data1 = array(
        //     'parent_id' => $parentid,
        //     'type_id' => $formdata['type'],
        //     'business_id' => $buss_id,
        //     'location_id' => $formdata['location'],
        //     'group_id' => $formdata['group'],
        //     'company_name' => $ordanizer_name,
        //     'contact_person_name1' => $formdata['contact_person'],
        //     'alternate_email' => $formdata['alternate_email_id'],
        //     'phone_no' => $formdata['contact_number1'],
        //     'alternate_number' => $formdata['contact_number2'],
        //     'landline_number' => $formdata['landline_number'],
        //     'email' => $formdata['email_id'],
        //     'address' => $formdata['address'],
        //     'city' => $formdata['city'],
        //     'state' => $formdata['state'],
        //     'country' => $formdata['country'],
        //     'dob' => $dob1,
        //     'company_anniversary' => $company_anniversary,
        //     'marriage_anniversary' => $marriage_anniversary,
        //     'cust_type' => $formdata['custtype']
        // );
        // $this->db->update('tbl_customer', $data1);
        // $this->db->where('leadopp_id', $formdata['leadopp_id']);
        // $UpdateArray = array('is_converted' => 1);
        // $this->db->update('tbl_leads_opportunity', $UpdateArray);

        $admin_id = $this->session->id;
        $dob2 = str_replace(',', ' ', $formdata['dob']);
        $dob1 = date("Y-m-d", strtotime($dob2));
        if ($formdata['company_aniversary'] != '') {
            $company_aniversary1 = str_replace(',', ' ', $formdata['company_aniversary']);
            $company_anniversary = date("Y-m-d", strtotime($company_aniversary1));
        } else {
            $company_anniversary = '';
        }
        if ($formdata['marriage_aniversary'] != '') {
            $marriage_aniversary1 = str_replace(',', ' ', $formdata['marriage_aniversary']);
            $marriage_anniversary = date("Y-m-d", strtotime($marriage_aniversary1));
        } else {
            $marriage_anniversary = '';
        }
        $bussiness = $formdata['business'];
        $bussiness_id = "";
        for ($i = 0; $i < count($bussiness); $i++) {
            $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1)) {
            $buss_id = '0';
        } else {
            $buss_id = $buss_id1;
        }
        //Account Manager
        $account_manager = $formdata['account_manager'];
        $account_manager_id = "";
        for ($i = 0; $i < count($account_manager); $i++) {
            $account_manager_id = $account_manager_id . $account_manager[$i] . ",";
        }
        $account_id1 = trim($account_manager_id, ',');
        if (empty($account_id1)) {
            $account_id1 = '';
        } else {
            $account_id1 = $account_id1;
        }
        // ------------------ Primary / Secondary Account --------------------------------
        if ($formdata['custtype'] == 'primary') 
        {
            $ordanizer_name = TRIM($formdata['ordanizer_name']);
            $parentid = '0';
        } else {
            $parentid = $formdata['parentid'];
            $parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
            $ordanizer_name = $parent_res->company_name;
        }

        // -------------------------------------------------------------------------------------------

        if(!empty($formdata['reference']))
        {
            $reference_id = $formdata['reference'];
            $reference_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$reference_id'")->row();
            $reference_name = $reference_res->company_name;
        }
        else
        {
            $reference_id = $formdata['reference'];
            $reference_name = '';
        }
        
        if(!empty($formdata['contact_code']))
        {
            $contact_code1 = $formdata['contact_code'];
        }
        else
        {
            $contact_code1 = '';
        }

        $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
        if($check_code2->auto_contact_code != '')
        {
            $code2 = $check_code2->auto_contact_code; 
            $contact_code2 = (int)$code2 + 1;
        }
        else
        {
            $contact_code2 = '1000000';
        }

        $date = date("Y-m-d H:i:s");
        if ($formdata['address2'] == '') {
            $data1 = array(
                'created_by' => $admin_id,
                'parent_id' => $parentid,
                'type_id' => $formdata['type'],
                'business_id' => $buss_id,
                'location_id' => $formdata['location'],
    
                'pincode' => $formdata['pincode'],
                'pan_no' => $formdata['pan_no'],
                'tan_no' => $formdata['tan_no'],
                'registration_type' => $formdata['registration_type'],
                'gstin' => $formdata['gstin'],
                'credit_term' => $formdata['credit_term'],
                'address2' => $formdata['address2'],
                'mailing_name' => $formdata['mailing_name'],
                // 'contact_code' => $formdata['contact_code'],
                'contact_code' => $contact_code1,
                'auto_contact_code' => $contact_code2,
                'group_id' => $formdata['group'],
                'company_name' => $ordanizer_name,
                'contact_person_name1' => $formdata['contact_person'],
                'alternate_email' => $formdata['alternate_email_id'],
                'phone_no' => $formdata['contact_number1'],
                'alternate_number' => $formdata['contact_number2'],
                'landline_number' => $formdata['landline_number'],
                'email' => $formdata['email_id'],
                'address' => $formdata['address'],
                'city' => $formdata['city'],
                'state' => $formdata['state'],
                'country' => $formdata['country'],
                'password' => $formdata['password'],
                'account_manager' => $account_id1,
                'notes' => $formdata['notes'],
                'dob' => $dob1,
                'company_anniversary' => $company_anniversary,
                'marriage_anniversary' => $marriage_anniversary,
                'android_id' => '',
                'cust_type' => $formdata['custtype'],
                'org_id' => $this->session->org_id,
                'created_date' => $date,
                'reference_id' => $reference_id,
                'reference_name' => $reference_name
            );    
        }else{
            $data1 = array(
                'created_by' => $admin_id,
                'parent_id' => $parentid,
                'type_id' => $formdata['type'],
                'business_id' => $buss_id,
                'location_id' => $formdata['location'],
    
                'pincode' => $formdata['pincode'],
                'pan_no' => $formdata['pan_no'],
                'tan_no' => $formdata['tan_no'],
                'registration_type' => $formdata['registration_type'],
                'gstin' => $formdata['gstin'],
                'credit_term' => $formdata['credit_term'],
                'address2' => $formdata['address2'],
                'mailing_name' => $formdata['mailing_name'],
                // 'contact_code' => $formdata['contact_code'],
                'contact_code' => $contact_code1,
                'auto_contact_code' => $contact_code2,
                'group_id' => $formdata['group'],
                'company_name' => $ordanizer_name,
                'contact_person_name1' => $formdata['contact_person'],
                'alternate_email' => $formdata['alternate_email_id'],
                'phone_no' => $formdata['contact_number1'],
                'alternate_number' => $formdata['contact_number2'],
                'landline_number' => $formdata['landline_number'],
                'email' => $formdata['email_id'],
                'address' => $formdata['address'],
                'g_lat' => $formdata['g_lat'],
                'g_long' => $formdata['g_long'],
                'city' => $formdata['city'],
                'state' => $formdata['state'],
                'country' => $formdata['country'],
                'password' => $formdata['password'],
                'account_manager' => $account_id1,
                'notes' => $formdata['notes'],
                'dob' => $dob1,
                'company_anniversary' => $company_anniversary,
                'marriage_anniversary' => $marriage_anniversary,
                'android_id' => '',
                'cust_type' => $formdata['custtype'],
                'org_id' => $this->session->org_id,
                'created_date' => $date,
                'reference_id' => $reference_id,
                'reference_name' => $reference_name
            );
        }
        
        $res = $this->db->insert('tbl_customer', $data1);
        if ($res) 
        {
            $get_customer_id = $this->db->select('customer_id')->from('tbl_customer')->where($data1)->get()->row()->customer_id;
            $data2 = array(
                'custom_id' => $get_customer_id,
                'org_id' => $this->session->org_id,
                'Password' => $formdata['password'],
                'email' => $formdata['email_id'],
                'mobile_no' => $formdata['contact_number1'],
                'user_type' => 'C',
                'user_status' => 1,
                'name' => $ordanizer_name,
                'user_type_io' => 'NULL',
                'profile_img' => '',
                'department' => 0,
                'designation' => 0,
                'emp_id' => 'NULL',
                'joining_date' => ''
            );
            $res2 = $this->db->insert('tbl_admin_login', $data2);
            
            if(!empty($_FILES['document']['name']))
            {
                $count = count($_FILES['document']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['document']['name'][$i])) {
                        $image = $_FILES['document']['name'][$i];
                        $cur_date = date("dmyHis");
                        $sepext = explode('.', strtolower($image));
                        $extension = end($sepext);
                        $store_file = $cur_date . '_' . $i . ".$extension";
                        $move_file = FCPATH . 'assets/admin/contactmanagementdocuments/';
                        $move_file1 = $move_file . basename($store_file);
                        move_uploaded_file($_FILES['document']['tmp_name'][$i], $move_file1);
                        chmod($move_file1, 0755);
                        $Array = array(
                            'customer_id' => $get_customer_id,
                            'upload_by' => $_SESSION['id'],
                            'uploadfilename' => $store_file,
                            'doc_name' => $image,
                            'date_created' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl_reference_document', $Array);
                    }
                }
            }
            else
            {

            }
            
            $UpdateArray = array('is_converted' => 1);
            $this->db->update('tbl_leads_opportunity', $UpdateArray);
        } 
        else 
        {
            
        }
    }


    // =========== isuue list ===========================================================

    public function Issue()
    {
        // if($this->session->user_type=='SA')
        // {
        $data = $this->db->query(" SELECT * FROM `tbl_user_query` ORDER BY query_id DESC ");
        $issue = array();
        foreach ($data->result() as $value) {

            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            //================ addeed part for schedule ==================
            $query_id = $value->query_id;
            // echo "<br>";

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();


                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            //================ / addeed part for schedule ==================

            $arr = array(
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'phone_no' => $phone_no,
                'email' => $email,
                'customer_id' => $customer_id,
                'product_name' => $value->product_name,
                'query_id' => $value->query_id,
                'issue' => $value->issue,
                'ticket_no' => $value->ticket_no,
                'status' => $value->status,
                'priority' => $value->priority,
                'created_date' => $value->created_date,
                'assign_date' => $assign_date,
                'starttime' => $assign_starttime,
                'endtime' => $assign_endtime,
                'check_assign' => $check_assign,
                'highlight' => $highlight,
                'schedulecount' => $schedulecount1,
                'employee_name' => $employee_name
            );
            array_push($issue, $arr);
        }
        return $issue;
    }
    // ======================= Particular employee issue list =====================================
    public function emp_issue()
    {
        $employee_id = $this->session->id;

        //================== get id from comma sepereted column ==============================

        $res = $this->db->query("SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($employee_id)")->row();
        $result = $res->assign_to;
        if (strpos($result, ',') !== false) {
            $data = $this->db->query("SELECT * FROM `tbl_user_query` where FIND_IN_SET($employee_id,assign_to) ORDER BY query_id DESC ");
        } else {
            $data = $this->db->query("SELECT * FROM `tbl_user_query` where `assign_to` IN($employee_id) ORDER BY query_id DESC ");
        }

        $issue = array();
        foreach ($data->result() as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;


            //================ addeed part for schedule ==================
            $query_id = $value->query_id;
            // echo "<br>";

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 0) {
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;

                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            //================ / addeed part for schedule ==================

            $arr = array(
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'phone_no' => $phone_no,
                'email' => $email,
                'customer_id' => $customer_id,
                'product_name' => $value->product_name,
                'query_id' => $value->query_id,
                'issue' => $value->issue,
                'ticket_no' => $value->ticket_no,
                'status' => $value->status,
                'priority' => $value->priority,
                'created_date' => $value->created_date,
                'assign_date' => $assign_date,
                'starttime' => $assign_starttime,
                'endtime' => $assign_endtime,
                'check_assign' => $check_assign,
                'employee_name' => $employee_name
            );
            array_push($issue, $arr);
        }
        return $issue;
    }
    // ======================= / Particular employee issue list =====================================

    public function incomplete_issue()
    {
        $org_id = $this->session->org_id;
        $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and `status`='in_complete' ORDER BY query_id DESC");
        $issue = array();
        foreach ($data->result() as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;



            //================ added part for schedule ==================
            $query_id = $value->query_id;
            // echo "<br>";

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 0) {
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();

                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;

                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            //================ / addeed part for schedule ==================
            $arr = array(
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'phone_no' => $phone_no,
                'email' => $email,
                'customer_id' => $customer_id,
                'product_name' => $value->product_name,
                'query_id' => $value->query_id,
                'issue' => $value->issue,
                'ticket_no' => $value->ticket_no,
                'status' => $value->status,
                'priority' => $value->priority,
                'created_date' => $value->created_date,
                'assign_date' => $assign_date,
                'starttime' => $assign_starttime,
                'endtime' => $assign_endtime,
                'check_assign' => $check_assign,
                'employee_name' => $employee_name
            );
            array_push($issue, $arr);
        }
        return $issue;
    }




    public function completed_issue()
    {
        $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `status`='completed' ORDER BY query_id DESC");
        $issue = array();
        foreach ($data->result() as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;



            //================ addeed part for schedule ==================
            $query_id = $value->query_id;
            // echo "<br>";

            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 0) {
                // echo "SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1";
                // echo "<br>";
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();

                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                // echo "";
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;

                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            //================ / addeed part for schedule ==================

            $arr = array(
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'phone_no' => $phone_no,
                'email' => $email,
                'customer_id' => $customer_id,
                'product_name' => $value->product_name,
                'query_id' => $value->query_id,
                'issue' => $value->issue,
                'ticket_no' => $value->ticket_no,
                'status' => $value->status,
                'priority' => $value->priority,
                'created_date' => $value->created_date,
                'assign_date' => $assign_date,
                'starttime' => $assign_starttime,
                'endtime' => $assign_endtime,
                'check_assign' => $check_assign,
                'employee_name' => $employee_name
            );
            array_push($issue, $arr);
        }
        return $issue;
    }

    public function customer_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->order_by('company_name', 'ASC');
        return $this->db->get('tbl_customer')->result();
    }

    public function customer_list_task($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        return $this->db->get("tbl_customer")->result();
    }

    public function employee_list()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('user_status', 1);
        $this->db->where('delete_status', 0);
        // $this->db->where('user_type', 'E');

        return $this->db->get('tbl_admin_login')->result();
    }

    public function employee_list_task($id)
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('user_type', 'E');
        }
        return $this->db->get("tbl_admin_login")->result();
    }

    public function product_list()
    {
        $this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_product_service_list')->result();
    }

    public function product_list_task($product_id)
    {
        $this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
        $this->db->where('prd_srv_id', $product_id);
        return $this->db->get("tbl_product_service_list")->result();
    }


    public function availability($start_date, $start_time, $end_time, $employee_id1)
    {
        $start_date1 = str_replace(',', ' ', $start_date);
        $date = date("Y-m-d", strtotime($start_date1));
        $not_available = $this->db->query("SELECT count(query_id) as count from schedule_assign_to where (`assign_date` = '$date' and `assign_endtime` <= '$end_time') and (`assign_date` = '$date' and `assign_starttime` >= '$start_time') AND status != 'completed'");
    }

    public function fetch_schedule_type_id($query_id)
    {
        $this->db->select('schedule_type_id,issue_id');
        $this->db->where('issue_id', $query_id);
        return $this->db->get("tbl_schedule")->row();
    }

    public function assign_task()
    {
        $org_id = $this->session->org_id;
        return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' AND user_status='1' AND `org_id`=$org_id");
    }


    // ================ asign task to customer ==================================================

    public function assign_to($query_id, $employee, $schedule_date, $start_time, $end_time, $schedule_type_id)
    {
        $org_id = $this->session->org_id;
        // $schd_date1 = str_replace(',', ' ', $schedule_date);
        // $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $schedule_date1 = $schedule_date;
        $s_time = $start_time;
        $e_time = $end_time;
        $emp_id = $employee;

        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");

        $available_count = $available->num_rows();
       
        if ($available_count == 0) {
            $created_by = $this->session->id;
            $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
            $android_id = $data2->android_id;
            $name = $data2->name;
            $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
            $ticket_no = $data3->ticket_no;
            $customer_id = $data3->customer_id;
            // $schedule_type_id=1;
            //======================= inserting notification to table for record ===============
            $notification_msg = "Allocated new task and ticket no.is " . $ticket_no;
            $date = date("Y-m-d H:i:s");
            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");
            $notification_id = $this->db->insert_id($res);

            $reg_token = $android_id;
            $data = array('server_notification' => "employee_task_allocated", 'message' => 'Allocated new task and ticket no.is ' . $ticket_no, 'query_id' => $query_id, 'notification_id' => $notification_id);
            $target = $reg_token;
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
            $fields = array();
            $fields['data'] = $data;
            if (is_array($target)) {
                $fields['registration_ids'] = $target;
            } else {
                $fields['to'] = $target;
            }
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            } else {
                $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $android_id = $data3->android_id;
                $contact_person_name1 = $data2->contact_person_name1;
                $notification_msg = "Your issue " . $ticket_no . " is assign to " . $name;
                $date = date("Y-m-d H:i:s");
                $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                $notification_id1 = $this->db->insert_id($res1);
                $reg_token = $android_id;
                $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $ticket_no . ' is assign to ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {
                    // $schd_date2 = str_replace(',', ' ', $schedule_date);
                    // $notification_date = date("Y-m-d", strtotime($schd_date2));
                    $notification_date = $schedule_date;
                    $this->db->set('assign_to', $emp_id);
                    $this->db->set('status', 'pending');
                    $this->db->where('query_id', $query_id);
                    $this->db->update('tbl_user_query');
                    $schedule_ticketno = 'S_' . $ticket_no;
                    $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`,`schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','Case','$date')");
                    echo 1;
                }
                curl_close($ch);
            }
            curl_close($ch);
        } else {
            echo "2";
        }
    }


    public function assign_to_override($query_id, $employee, $schedule_date, $start_time, $end_time)
    {
        $org_id = $this->session->org_id;
        $created_by = $this->session->id;

        // $emp_id="";
        // for ($i=0; $i < count($employee); $i++) 
        // { 
        //      $emp_id=$emp_id.$employee[$i].",";
        // }
        // $employee_id = trim($emp_id, ',');


        // for ($j=0; $j < count($employee); $j++) 
        // { 
        $emp_id = $employee;
        $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
        $android_id = $data2->android_id;
        $name = $data2->name;

        $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
        $ticket_no = $data3->ticket_no;
        $customer_id = $data3->customer_id;
        //======================= inserting notification to table for record ===============

        $notification_msg = "Allocated new task and ticket no.is " . $ticket_no;
        $date = date("Y-m-d H:i:s");

        $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

        $notification_id = $this->db->insert_id($res);

        //======================= / inserting notification to table for record ===============

        //======================= sending notification to employee regarding assign issue ===============
        $reg_token = $android_id;
        $data = array('server_notification' => "employee_task_allocated", 'message' => 'Allocated new task and ticket no.is ' . $ticket_no, 'query_id' => $query_id, 'notification_id' => $notification_id);
        $target = $reg_token;
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
        $fields = array();
        $fields['data'] = $data;
        if (is_array($target)) {
            $fields['registration_ids'] = $target;
        } else {
            $fields['to'] = $target;
        }
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $server_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        } else {
            //======================= sending notification to customer regarding assign issue ===============

            $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $android_id = $data3->android_id;
            $contact_person_name1 = $data2->contact_person_name1;

            // ----------------- Insertinf notification to table ---------------------------

            $notification_msg = "Your issue " . $ticket_no . " is assign to " . $name;
            $date = date("Y-m-d H:i:s");

            $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

            $notification_id1 = $this->db->insert_id($res1);

            // ----------------- Insertinf notification to table ---------------------------

            $reg_token = $android_id;
            $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $ticket_no . ' is assign to ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);
            $target = $reg_token;
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
            $fields = array();
            $fields['data'] = $data;
            if (is_array($target)) {
                $fields['registration_ids'] = $target;
            } else {
                $fields['to'] = $target;
            }
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            } else {
                // $notification_date = date("Y-m-d", strtotime($schedule_date));
                $schd_date2 = str_replace(',', ' ', $schedule_date);
                $notification_date = date("Y-m-d", strtotime($schd_date2));
                $this->db->set('assign_to', $emp_id);
                $this->db->set('status', 'pending');
                $this->db->where('query_id', $query_id);
                $this->db->update('tbl_user_query');

                // $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                // $schedule_type_id = $type_res->schedule_type_id;
                $schedule_ticketno = 'S_' . $ticket_no;

                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_ticketno','$notification_date','$start_time','$end_time','Case','$date')");
                echo 1;
            }
            curl_close($ch);

            //======================= / sending notification to customer regarding assign issue ===============
        }
        curl_close($ch);
    }


    // ============================================== Reschedule ===================================================
    public function reschedule_assign_to($query_id, $employee, $schedule_date, $start_time, $end_time)
    {

        // $date = date("Y-m-d", strtotime($start_date));
        // $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
        $schd_date2 = str_replace(',', ' ', $schedule_date);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date2));
        $s_time = $start_time;
        $e_time = $end_time;
        $emp_id = $employee;

        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");

        $available_count = $available->num_rows();
        if ($available_count == 0) {

            $created_by = $this->session->id;

            // $emp_id="";
            // for ($i=0; $i < count($employee); $i++) 
            // { 
            //      $emp_id=$emp_id.$employee[$i].",";
            // }
            // $employee_id = trim($emp_id, ',');


            // for ($j=0; $j < count($employee); $j++) 
            // { 
            $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
            $android_id = $data2->android_id;
            $name = $data2->name;

            $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
            $ticket_no = $data3->ticket_no;
            $customer_id = $data3->customer_id;

            //======================= inserting notification to table for record ===============

            $notification_msg = "Allocated new task and ticket no.is " . $ticket_no;
            $date = date("Y-m-d H:i:s");

            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

            $notification_id = $this->db->insert_id($res);

            //======================= / inserting notification to table for record ===============
            //======================= sending notification to employee regarding assign issue ===============
            $reg_token = $android_id;
            $data = array('server_notification' => "employee_task_allocated", 'message' => 'Allocated new task and ticket no.is ' . $ticket_no, 'query_id' => $query_id, 'notification_id' => $notification_id);
            $target = $reg_token;
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
            $fields = array();
            $fields['data'] = $data;
            if (is_array($target)) {
                $fields['registration_ids'] = $target;
            } else {
                $fields['to'] = $target;
            }
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            } else {
                //======================= sending notification to customer regarding assign issue ===============

                $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $android_id = $data3->android_id;
                $contact_person_name1 = $data2->contact_person_name1;

                // ----------------- Insertinf notification to table ---------------------------

                $notification_msg = "Your issue " . $ticket_no . " is assign to " . $name;
                $date = date("Y-m-d H:i:s");

                $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                $notification_id1 = $this->db->insert_id($res1);

                // ----------------- Insertinf notification to table ---------------------------

                $reg_token = $android_id;
                $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $ticket_no . ' is assign to ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {
                    $make_reschedule_prev = $this->db->query("SELECT schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                    $reschedule_schedule_id = $make_reschedule_prev->schedule_id;

                    $this->db->set('reschedule', $reschedule);
                    $this->db->where('schedule_id', $reschedule_schedule_id);
                    $this->db->update('tbl_schedule');

                    // $notification_date = date("Y-m-d", strtotime($schedule_date));
                    $schd_date1 = str_replace(',', ' ', $schedule_date);
                    $notification_date = date("Y-m-d", strtotime($schd_date1));

                    $this->db->set('assign_to', $emp_id);
                    $this->db->set('status', 'pending');
                    $this->db->where('query_id', $query_id);
                    $this->db->update('tbl_user_query');

                    $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                    $schedule_type_id = $type_res->schedule_type_id;
                    $schedule_ticketno = 'S_' . $ticket_no;

                    $this->db->query("INSERT INTO `tbl_schedule`(`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `reschedule`, `schedule_type`, `created_date`) VALUES ('$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','reschedule','Case','$date')");
                    echo 1;
                }
                curl_close($ch);

                //======================= / sending notification to customer regarding assign issue ===============
            }
            curl_close($ch);

            //======================= sending notification to employee regarding assign issue ===============
            // }
            //print_r($regid);
        } else {
            echo "2";
        }
    }


    public function reschedule_assign_to_override($query_id, $employee, $schedule_date, $start_time, $end_time)
    {
        $created_by = $this->session->id;
        $org_id = $this->session->org_id;

        // $emp_id="";
        // for ($i=0; $i < count($employee); $i++) 
        // { 
        //      $emp_id=$emp_id.$employee[$i].",";
        // }
        // $employee_id = trim($emp_id, ',');


        // for ($j=0; $j < count($employee); $j++) 
        // { 
        $emp_id = $employee;
        $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
        $android_id = $data2->android_id;
        $name = $data2->name;

        $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
        $ticket_no = $data3->ticket_no;
        $customer_id = $data3->customer_id;
        //======================= inserting notification to table for record ===============

        $notification_msg = "Allocated new task and ticket no.is " . $ticket_no;
        $date = date("Y-m-d H:i:s");

        $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

        $notification_id = $this->db->insert_id($res);

        //======================= / inserting notification to table for record ===============

        //======================= sending notification to employee regarding assign issue ===============
        $reg_token = $android_id;
        $data = array('server_notification' => "employee_task_allocated", 'message' => 'Allocated new task and ticket no.is ' . $ticket_no, 'query_id' => $query_id, 'notification_id' => $notification_id);
        $target = $reg_token;
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
        $fields = array();
        $fields['data'] = $data;
        if (is_array($target)) {
            $fields['registration_ids'] = $target;
        } else {
            $fields['to'] = $target;
        }
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $server_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        } else {
            //======================= sending notification to customer regarding assign issue ===============

            $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $android_id = $data3->android_id;
            $contact_person_name1 = $data2->contact_person_name1;

            // ----------------- Insertinf notification to table ---------------------------

            $notification_msg = "Your issue " . $ticket_no . " is assign to " . $name;
            $date = date("Y-m-d H:i:s");

            $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

            $notification_id1 = $this->db->insert_id($res1);

            // ----------------- Insertinf notification to table ---------------------------

            $reg_token = $android_id;
            $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $ticket_no . ' is assign to ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);
            $target = $reg_token;
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
            $fields = array();
            $fields['data'] = $data;
            if (is_array($target)) {
                $fields['registration_ids'] = $target;
            } else {
                $fields['to'] = $target;
            }
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            } else {
                $make_reschedule_prev = $this->db->query("SELECT schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                $reschedule_schedule_id = $make_reschedule_prev->schedule_id;

                $this->db->set('reschedule', $reschedule);
                $this->db->where('schedule_id', $reschedule_schedule_id);
                $this->db->update('tbl_schedule');

                // $notification_date = date("Y-m-d", strtotime($schedule_date));
                $schd_date1 = str_replace(',', ' ', $schedule_date);
                $notification_date = date("Y-m-d", strtotime($schd_date1));
                $this->db->set('assign_to', $emp_id);
                $this->db->set('status', 'pending');
                $this->db->where('query_id', $query_id);
                $this->db->update('tbl_user_query');


                $type_res = $this->db->query("SELECT schedule_type_id FROM tbl_schedule WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                $schedule_type_id = $type_res->schedule_type_id;
                $schedule_ticketno = 'S_' . $ticket_no;

                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `reschedule`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$query_id','$emp_id','$schedule_type_id','$schedule_ticketno','$notification_date','$start_time','$end_time','reschedule','Case','$date')");

                echo 1;
            }
            curl_close($ch);

            //======================= / sending notification to customer regarding assign issue ===============
        }
        curl_close($ch);
    }


    // ========================================== change status from employee side ==========================================
    public function change_status($query_id, $description, $status_update)
    {
        $org_id = $this->session->org_id;
        $employee_id = $this->session->id;
        $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
        $status = $data->status;
        $customer_id = $data->customer_id;
        $product_id = $data->product_id;
        $ticket_no = $data->ticket_no;
        //======================= sending notification to customer regarding assign issue ===============

        $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
        $android_id = $data3->android_id;


        $notification_date = date("Y-m-d H:i:s");

        $notification_msg = "Your issue " . $ticket_no . " is " . $status_update;
        $date = date("Y-m-d H:i:s");

        $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','$status_update','$date')");

        $notification_id = $this->db->insert_id($res);

        $reg_token = $android_id;
        $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $ticket_no . ' is assign to ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id);
        $target = $reg_token;
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
        $fields = array();
        $fields['data'] = $data;
        if (is_array($target)) {
            $fields['registration_ids'] = $target;
        } else {
            $fields['to'] = $target;
        }
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $server_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        } else {
            $this->db->set('status', $status_update);
            $this->db->where('query_id', $query_id);
            $this->db->update('tbl_user_query');

            $this->db->query("INSERT INTO `tbl_task_status`(`org_id`,`employee_id`, `customer_id`, `product_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$org_id','$employee_id','$customer_id','$product_id','$ticket_no','$description','$status_update','$date')");
            // echo 1;
        }
        curl_close($ch);

        //======================= / sending notification to customer regarding assign issue ===============
    }


    // ======================== get issue list selected by employee ==================================

    public function getassignedissue($schedule_date, $employee_id)
    {
        // $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
        $schd_date1 = str_replace(',', ' ', $schedule_date);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

        $data = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

        $assign_issue_list = array();
        foreach ($data->result() as $value) {
            $issue_id = $value->issue_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$issue_id'")->row();

            $customer_id = $data1->customer_id;
            $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $customer_id = $data2->customer_id;
            $company_name = $data2->company_name;
            $contact_person_name1 = $data2->contact_person_name1;

            $assign_starttime1 = date("h:i A", strtotime($value->assign_starttime));
            $assign_endtime1 = date("h:i A", strtotime($value->assign_endtime));


            $arr = array(
                'ticket_no' => $data1->ticket_no,
                'product_name' => $data1->product_name,
                'status' => $data1->status,
                'assign_starttime' => $assign_starttime1,
                'assign_endtime' => $assign_endtime1,
                'schedule_id' => $value->schedule_id,
                'schedule_ticket_no' => $value->ticket_no,


                'customer_id' => $customer_id,
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1

            );

            array_push($assign_issue_list, $arr);
        }
        return $assign_issue_list;
        // print_r($assign_issue_list);
    }

    // ===================================  Add schedule by Super admin as well as employee =========================

    public function add_schedule($formdata)
    {
        
        $org_id = $this->session->org_id;
        $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $conv_date = date("Ymd", strtotime($schd_date1));

        $p_type = $formdata['priority_type'];
        $s_time = $formdata['schedule_start_time'];
        $e_time = $formdata['schedule_end_time'];
        $emp_id = $formdata['employee_id'];
        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
        $available_count = $available->num_rows();

        if ($available_count == 0) {
            $created_by = $this->session->id;
            $date = date("Y-m-d H:i:s");
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($string) - 1;
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $string[mt_rand(0, $max)];
            }
            $salt = $token;
            $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
            $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

            $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' order by schedule_id desc ")->row();
            if (!empty($result->ticket_no)) {
                $explode = explode('S_', $result->ticket_no);
                $string = $explode[1];
                $db1_date = explode('-', $string);
                $previous_date = $db1_date[0];
                $ticket_no = $db1_date[1];
                // $cur_date=date("Ymd");
                if ($previous_date == $conv_date) {
                    $ticket_no++;
                    $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                    $final_ticket_num = $conv_date . '-' . $ticket_no1;
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . $ticket_no1;
                } else {
                    $final_ticket_num = $conv_date . '-' . '001';
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
                }
            } else {
                // $cur_date=date("Ymd"); 
                $final_ticket_num = $conv_date . '-' . '001';
                $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            }

            $customer_id = $formdata['customer_id'];
            $product_id = $formdata['product_id'];
            $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row();
            $product_name = $pdr_name->prdsrv_name;
            $query = $formdata['query'];
            $employee_id = $emp_id;
            $start_time = $formdata['schedule_start_time'];
            $end_time = $formdata['schedule_end_time'];
            $schedule_type_id = $formdata['schedule_type_id'];
            $status = $formdata['status'];
            $priority = $formdata['priority_id'];

            $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`status`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$status','$priority','$schedule_date1')");
            $insert_id = $this->db->insert_id();
            if ($data) {
                if ($this->session->user_type != 'SA') {
                    $schedule_type = "Own";
                } else {
                    $schedule_type = "Task";
                }

                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
                $schedule_insert_id = $this->db->insert_id();
                $TaskArray = array(
                    'employee_id' => $emp_id,
                    'org_id' => $this->session->org_id,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'query_id' => $insert_id,
                    'schedule_id' => $schedule_insert_id,
                    'ticket_no' => $final_ticket_num,
                    'remark' => $query,
                    'status' => $status,
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->db->Insert("tbl_task_status", $TaskArray);
                //======================= sending notification to employee regarding assign issue ===============

                $this->db->select("company_name");
                $this->db->where("customer_id", $customer_id);
                $CustData = $this->db->get("tbl_customer")->row();

                $this->db->where("query_id", $insert_id);
                $ScheduleData = $this->db->get("tbl_user_query")->row();

                $this->db->where("schedule_id", $schedule_insert_id);
                $QueryData = $this->db->get("tbl_schedule")->row();

                $sche_date = date("d M Y", strtotime($schedule_date1));
                $sche_time = date("H:ia", strtotime($start_time)) . ' TO ' . date("H:ia", strtotime($end_time));

                $this->db->select("name");
                $this->db->where("id", $QueryData->created_by);
                $EmpData = $this->db->get("tbl_admin_login")->row();

                $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id' ")->row();
                $android_id = $data2->android_id;
                $name = $data2->name;
                // $android_id = $data3->android_id;
                $notification_date = date("Y-m-d H:i:s");
                $notification_msg = "Allocated new task and ticket no.is " . $final_ticket_num;
                $date = date("Y-m-d H:i:s");
                $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','$status','$date')");
                $notification_id = $this->db->insert_id($res);
                $reg_token = $android_id;

                $data = array('server_notification' => "employee_task_allocated", 'message' => ' You have been allocated new task for ' . $CustData->company_name . ' assigned by ' . $EmpData->name . ' click here for more details', 'query_id' => $insert_id, 'notification_id' => $notification_id, 'ticket_no' => $ScheduleData->ticket_no, 'company_name' => $CustData->company_name, 'product' => $ScheduleData->product_name, 'assigned_by' => $EmpData->name, 'priority' => $ScheduleData->priority, 'remark' => $ScheduleData->issue, 'date' => $sche_date, 'time' => $sche_time);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {

                    $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $android_id = $data3->android_id;
                    $contact_person_name1 = $data2->contact_person_name1;
                    // ----------------- Insertinf notification to table ---------------------------
                    $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                    $date = date("Y-m-d H:i:s");

                    $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','$status','$date')");
                    $notification_id1 = $this->db->insert_id($res1);
                    // ----------------- Insertinf notification to table ---------------------------
                    $reg_token = $android_id;
                    $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1, 'date' => $sche_date, 'time' => $sche_time);
                    $target = $reg_token;
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                    $fields = array();
                    $fields['data'] = $data;
                    if (is_array($target)) {
                        $fields['registration_ids'] = $target;
                    } else {
                        $fields['to'] = $target;
                    }
                    $headers = array(
                        'Content-Type:application/json',
                        'Authorization:key=' . $server_key
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                    $result = curl_exec($ch);
                    if ($result === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    } else {
                        $notification_date = date("Y-m-d", strtotime($schedule_date1));
                        $this->db->set('assign_to', $employee_id);
                        $this->db->where('query_id', $insert_id);
                        $this->db->update('tbl_user_query');
                        echo 1;
                    }
                    curl_close($ch);
                }
                curl_close($ch);
            } 
            else {
            }

            if ($formdata['addReminder'] == 1) {
                $recurring_eod1 = str_replace(',', ' ', $formdata['recurring_eod']);
                $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
                $eod_date = date("Ymd", strtotime($recurringEOD));

                $rem_notify_by = $formdata['reminder_notify_by'];
                $rem_notify_by_id = "";
                for ($i = 0; $i < count($rem_notify_by); $i++) 
                {
                    $rem_notify_by_id = $rem_notify_by_id . $rem_notify_by[$i] . ","; 
                }
                $rem_notify_by_id1 = trim($rem_notify_by_id, ',');
                if (empty($rem_notify_by_id1)) 
                {
                    $rem_notify_by_id1 = '';
                } 
                else 
                {
                    $rem_notify_by_id1 = $rem_notify_by_id1;
                }
                
            
                if($formdata['recurring_set'] == 1){
                    $data1 = array(
                        'org_id'=>$this->session->org_id,
                        'time_zone' => $this->session->org_timezone,
                        'recd_id' => $insert_id,
                        'module_name'=> 'Activity',
                        'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                        'user_id' => implode(',',$formdata['user_id']),
                        'reminder_date' => $conv_date,
                        'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                        'reminder_before_time' => $formdata['reminder_before_time'],
                        'notify_id' => $rem_notify_by_id1,
                        'reminder_note' => $formdata['reminder_note'],
                        'recurring_set' => $formdata['recurring_set'],
                        'interval_type' => $formdata['interval_type'],
                        'recurring_eod' => $eod_date,
                    );
                    
                    $this->db->insert('tbl_reminder',$data1);
                    
                    $reminderID = $this->db->insert_id(); 

                    $recurringDatesListArray = array();
                    $recurringDatesArray = $this->getRecurringDateString($formdata['interval_type'],$conv_date,$recurringEOD);
                    
                    $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($formdata['reminder_time'])))));
                    $b = new DateTime(date('H:i:s',strtotime($formdata['reminder_before_time'])));
                    $interval = $a->diff($b);
                    $timeDiff = $interval->format("%H:%i:%s%s");

                    for ($i=0; $i < count($recurringDatesArray); $i++) { 
                        $rec_data = array(
                            'time_zone' => $this->session->org_timezone,
                            'notify_id' => $rem_notify_by_id1,
                            'reminder_id' => $reminderID,
                            'recurring_rem_date' => $conv_date,
                            'recurring_rem_time' => date('H:i',strtotime($formdata['reminder_time'])),
                            'recurring_date' => $recurringDatesArray[$i],
                            'recurring_time' => $timeDiff,
                            'recurring_mail_sent' => 0,
                            'recurring_user_id' => implode(',',$formdata['user_id']),
                        );
                        array_push($recurringDatesListArray,$rec_data);
                    }
                    $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
                   
                    if($res)
                    {
                        echo 1;
                    }
                    else
                    {
                        echo 0;
                    }
                }else{
                    $data1 = array(
                        'org_id'=>$this->session->org_id,
                        'time_zone' => $this->session->org_timezone,
                        'recd_id' => $insert_id,
                        'module_name'=> 'Activity',
                        'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                        'user_id' => implode(',',$formdata['user_id']),
                        'reminder_date' => $conv_date,
                        'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                        'reminder_before_time' => $formdata['reminder_before_time'],
                        'reminder_note' => $formdata['reminder_note'],
                        'recurring_set' => $formdata['recurring_set'],
                        'notify_id' => $rem_notify_by_id1,
                    );
                    $res = $this->db->insert('tbl_reminder',$data1);
                    if($res){
                        echo 1;
                    }else{
                        echo 0;
                    }
                }
            }
            
        } 
        else {
           
            echo "2";
        }
    }

    function getRecurringDateString($frequency, $start_date, $end_date = null) {
		$dt = new DateTime(str_replace("-", "/", $start_date));
		$dtUntil = new DateTime(str_replace("-", "/", $end_date ? $end_date : date("m-d-Y")));
		
		$modifiers = [
			"day" => "+1 day",
			"week" => "+1 week",
			"fortnightly" => "+2 weeks",
			"monthly" => "+1 month",
			"quaterly" => "+3 month",
			"half-quarterly" => "+6 month",
			"year" => "+12 month",
		];
		$modifier = $modifiers[$frequency];
		$dt->modify($modifier);
		$dates[] = date('Y-m-d',strtotime($start_date));
		while($dt <= $dtUntil) {
			$dates[] = $dt->format("Y-m-d");
			$dt->modify($modifier);
		}
        return $dates;
		// return implode(',',$dates);
	}

    public function add_schedule_overright($formdata)
    {
        
        $org_id = $this->session->org_id;
        $created_by = $this->session->id;
        $date = date("Y-m-d H:i:s");
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $max = strlen($string) - 1;
        $token = '';
        for ($i = 0; $i < 6; $i++) {
            $token .= $string[mt_rand(0, $max)];
        }
        $salt = $token;
        $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $conv_date = date("Ymd", strtotime($schd_date1));


        $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' order by schedule_id desc ")->row();
        if (!empty($result->ticket_no)) {
            $explode = explode('S_', $result->ticket_no);
            $string = $explode[1];
            $db1_date = explode('-', $string);
            $previous_date = $db1_date[0];
            $ticket_no = $db1_date[1];
            // $cur_date=date("Ymd");
            if ($previous_date == $conv_date) {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                $final_ticket_num = $conv_date . '-' . $ticket_no1;
                $schedule_ticket_num = 'S_' . $conv_date . '-' . $ticket_no1;
            } else {
                $final_ticket_num = $conv_date . '-' . '001';
                $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            }
        } else {
            // $cur_date=date("Ymd"); 
            $final_ticket_num = $conv_date . '-' . '001';
            $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
        }


        // echo $cur_date=date("Ymd");
        $customer_id = $formdata['customer_id'];
        $product_id = $formdata['product_id'];
        $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row();
        $product_name = $pdr_name->prdsrv_name;
        $query = $formdata['query'];
        $employee_id = $formdata['employee_id'];
        $start_time = $formdata['schedule_start_time'];
        $end_time = $formdata['schedule_end_time'];
        $schedule_type_id = $formdata['schedule_type_id'];
        $status = $formdata['status'];
        $priority = $formdata['priority_id'];
        $assign_date = date('Y-m-d');
        $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`status`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$status','$priority','$assign_date')");
        $insert_id = $this->db->insert_id();
        if ($data) {
            if ($this->session->user_type != 'SA') {
                $schedule_type = "Own";
            } else {
                $schedule_type = "Task";
            }
            $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

            $schedule_insert_id = $this->db->insert_id();
            $TaskArray = array(
                'employee_id' => $employee_id,
                'customer_id' => $customer_id,
                'org_id' => $this->session->org_id,
                'product_id' => $product_id,
                'query_id' => $insert_id,
                'schedule_id' => $schedule_insert_id,
                'ticket_no' => $final_ticket_num,
                'remark' => $query,
                'status' => $status,
                'created_date' => date("Y-m-d H:i:s")
            );
            $this->db->Insert("tbl_task_status", $TaskArray);


            $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
            $android_id = $data2->android_id;
            $name = $data2->name;

            $sche_date = date("d M Y", strtotime($schedule_date1));
            $sche_time = date("H:ia", strtotime($start_time)) . ' TO ' . date("H:ia", strtotime($end_time));

            $notification_date = date("Y-m-d H:i:s");
            $notification_msg = "Allocated new task and ticket no.is " . $final_ticket_num;
            $date = date("Y-m-d H:i:s");
            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','$status','$date')");
            $notification_id = $this->db->insert_id($res);
            $reg_token = $android_id;
            $data = array('server_notification' => "employee_task_allocated", 'message' => 'Allocated new task and ticket no.is ' . $final_ticket_num, 'query_id' => $insert_id, 'notification_id' => $notification_id, 'date' => $sche_date, 'time' => $sche_time);
            $target = $reg_token;

            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
            $fields = array();
            $fields['data'] = $data;

            if (is_array($target)) {
                $fields['registration_ids'] = $target;
            } else {
                $fields['to'] = $target;
            }
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            } else {
                $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $android_id = $data3->android_id;
                $contact_person_name1 = $data2->contact_person_name1;
                // ----------------- Insertinf notification to table ---------------------------
                $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                $date = date("Y-m-d H:i:s");
                $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','$status','$date')");
                $notification_id1 = $this->db->insert_id($res1);
                // ----------------- Insertinf notification to table ---------------------------
                $reg_token = $android_id;
                $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1, 'date' => $sche_date, 'time' => $sche_time);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {
                    $notification_date = date("Y-m-d", strtotime($schedule_date1));
                    $this->db->set('assign_to', $employee_id);
                    $this->db->where('query_id', $insert_id);
                    $this->db->update('tbl_user_query');
                    echo 1;
                }
                curl_close($ch);
            }
            curl_close($ch);
            echo "1";
        } else {
        }
    }

    // ===================================  priority changes =========================

    public function priority_normal($query_id)
    {
        $this->db->set('priority', 'Normal');
        $this->db->where('query_id', $query_id);
        return $this->db->update('tbl_user_query');
    }

    public function priority_low($query_id)
    {
        $this->db->set('priority', 'Low');
        $this->db->where('query_id', $query_id);
        return $this->db->update('tbl_user_query');
    }

    public function priority_high($query_id)
    {
        $this->db->set('priority', 'High');
        $this->db->where('query_id', $query_id);
        return $this->db->update('tbl_user_query');
    }

    public function update_status_schedule($query_id,$type)
    {
        $this->db->set('status', $type);
        $this->db->where('query_id', $query_id);
        $this->db->update('tbl_user_query');

        $this->db->select('assign_to,customer_id,product_id,query_id,assign_to,ticket_no');
        $this->db->where('query_id', $query_id);
        $user_data = $this->db->get('tbl_user_query')->row();

        $this->db->select('schedule_id');
        $this->db->where('issue_id', $user_data->query_id);
        $schedule_data = $this->db->get('tbl_schedule')->row();

        $TaskArray = array(
            'employee_id' => $user_data->assign_to,
            'org_id' => $this->session->org_id,
            'customer_id' => $user_data->customer_id,
            'product_id' => $user_data->product_id,
            'query_id' => $user_data->query_id,
            'schedule_id' => $schedule_data->schedule_id,
            'ticket_no' => $user_data->ticket_no,
            'remark' => '',
            'status' => $type,
            'created_date' => date("Y-m-d H:i:s")
        );
        $this->db->Insert("tbl_task_status", $TaskArray);
    }

    // ===================================  Remark List =========================
    public function remark_list($ticket_no)
    {
        $data2 = $this->db->query("SELECT count(taskstatus_id) as count FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no'")->row();

        $count = $data2->count;
        if ($count > 0) {
            $dataticket = $this->db->query("SELECT query_id FROM `tbl_user_query`  WHERE `ticket_no`='$ticket_no' ")->row();

            $data = $this->db->query("SELECT * FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no'");
            // echo "1";
            $remark_array = array();
            foreach ($data->result() as $value) {
                $employee_id = $value->employee_id;
                $data1 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                $name = $data1->name;
                $ticket_no = $value->ticket_no;
                $remark = $value->remark;
                $status = $value->status;
                $created_date = $value->created_date;

                $arr = array(
                    'employee_name' => $name,
                    'query_id' => $dataticket->query_id,
                    'ticket_no' => $ticket_no,
                    'remark' => $remark,
                    'status' => $status,
                    'created_date' => $created_date

                );
                array_push($remark_array, $arr);
            }
            // print_r($remark_array);
            return $remark_array;
        } else {
            // echo "0";
        }
    }

    public function doc_list($ticket_no)
    {
        $this->db->where('ticket_no', $ticket_no);
        $res = $this->db->get('tbl_user_query')->row();
        $issue_id = $res->query_id;
        $this->db->where('issue_id', $issue_id);
        return $this->db->get('tbl_schedule_document')->result();
    }

    // ===================================  Billing List =========================
    public function bill_list($ticket_no)
    {
        $data2 = $this->db->query("SELECT count(achieve_id) as count FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no'")->row();
        $count = $data2->count;
        $billing = array();
        if ($count > 0) {
            $data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$ticket_no'")->row();

            $achieve_id = $data1->achieve_id;
            $billing['billing_remark'] = $data1->billing_remark;
            $billing['billing_type'] = $data1->billing_type;
            $billing['price'] = $data1->price;
            $billing['date_created'] = $data1->date_created;
            $billing['achieve_id'] = $data1->achieve_id;
            $billing['adm_approved_price'] = $data1->adm_approved_price;

            $employee_id = $data1->employee_id;
            $data4 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
            $billing['employee_name'] = $data4->name;

            $data2 = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
            // print_r($data2->result());
            $achieve_array = array();
            foreach ($data2->result() as $value) {
                $targettype_id = $value->targettype_id;
                $data3 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
                $arr = array(

                    'id' => $value->id,
                    'target_type' => $data3->target_type,
                    'targettype_id' => $targettype_id,
                    'targettype_value' => $value->targettype_value,
                    'adm_approved_price' => $value->adm_approved_price
                );
                array_push($achieve_array, $arr);
            }
            array_push($billing, $achieve_array);
            return $billing;
        } else {
            // echo "0";
        }
    }


    public function target_bill_list($ticket_no)
    {
        $data2 = $this->db->query("SELECT count(achieve_id) as count FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no'")->row();
        $count = $data2->count;
        $billing = array();
        if ($count > 0) {
            $data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$ticket_no' ")->row();

            return  array(
                'achieve_id' => $data1->achieve_id,
                'billing_amount' => $data1->billing_amount,
                'billing_status' => $data1->billing_status,
                'billing_app_amount' => $data1->billing_app_amount
            );
        } else {
            // echo "0";
        }
    }


    // ===================================  Reschedule List =========================
    public function reschedule_list($query_id)
    {
        $data = $this->db->query("SELECT * FROM tbl_schedule WHERE `issue_id`='$query_id' ");
        $reschedule = array();
        $i = 0;
        foreach ($data->result() as $value) {
            // echo $i;
            $ticket = $this->db->query("SELECT ticket_no FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
            $ticket_no = $ticket->ticket_no;

            $schedule_id = $value->schedule_id;

            $remark = $this->db->query("SELECT * FROM `tbl_task_status` WHERE `ticket_no`='$ticket_no' AND `schedule_id`='$schedule_id' AND status='pending'")->row();
            $remark_status = $remark->remark;
            $prev_record = $this->db->query("select * from tbl_schedule where schedule_id = (select max(schedule_id) from tbl_schedule where schedule_id < $schedule_id AND issue_id='$query_id')")->row();
            $prev_schedule = $prev_record->schedule_assign_to;
            $data4 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$prev_schedule'")->row();


            $schedule_assign_to = $value->schedule_assign_to;
            $data3 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$schedule_assign_to'")->row();

            if ($i == 0) {
                // echo "if";
                $name = $data3->name;
                $reschedule_to = '-';
            } else {
                // echo "else";
                $name = $data4->name;
                $reschedule_to = $data3->name;
            }

            $arr = array(
                'prev_name' => $name,
                'name' => $reschedule_to,
                'ticket_no' => $ticket_no,
                'assign_date' => $value->assign_date,
                'assign_starttime' => $value->assign_starttime,
                'assign_endtime' => $value->assign_endtime,
                'remark_status' => $remark_status,
                'issue_raise_date' => $value->created_date
            );
            array_push($reschedule, $arr);
            // echo "<br>";

            $i++;
        }
        // print_r($reschedule);
        // echo json_encode($reschedule);
        return $reschedule;
    }
    // =================================== / Reschedule List =========================

    // ===================================  Billing List =========================
    public function update_price($achieve_id, $adm_approved_price, $targettype_id)
    {
        $this->db->set('adm_approved_price', $adm_approved_price);
        $where = array('id' => $achieve_id, 'targettype_id' => $targettype_id);
        $this->db->where($where);
        $this->db->update('tbl_target_achieve_list');

        $this->db->set('billing_type', 'Billable');
        $where = array('achieve_id' => $achieve_id);
        $this->db->where($where);
        $this->db->update('tbl_target_achieve');
        // if ($this->db->affected_rows()>0) 
        // {
        $data = $this->db->query("SELECT * FROM tbl_target_achieve_list WHERE `achieve_id`='$achieve_id' AND `targettype_id`='$targettype_id'")->row();
        echo $price = $data->adm_approved_price;
        // } 
    }



    public function update_price2($achieve_id, $billing_app_amount)
    {
        $this->db->set('billing_status', 'Approved');
        $this->db->set('billing_app_amount', $billing_app_amount);
        $where = array('achieve_id' => $achieve_id);
        if ($billing_app_amount > 0) {
            $this->db->where($where);
            $this->db->update('tbl_target_achieve');
        }
    }

    // =================================== / Billing List =========================

    public function view_activities_model($project_id, $task_id)
    {
        $created_date = date('Y-m-d');
      
        if ($_SESSION['user_type'] == 'A' || $_SESSION['user_type'] == 'SA') {

            $this->db->where('product_id', $project_id);
            $this->db->where('activity_id', $task_id);

            $this->db->where('DATE(assign_date)', $created_date);
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->order_by('query_id', 'DESC');
            $this->db->limit(50);
            $queryRecords = $this->db->get('tbl_user_query')->result();
            // print_r($queryRecords);
            // exit;
        }
        else 
        {
            $this->db->select('tbl_user_query.*');
            $this->db->join('tbl_schedule','tbl_user_query.query_id = tbl_schedule.issue_id');

             $this->db->where('product_id', $project_id);
             $this->db->where('activity_id', $task_id);

            $this->db->where('tbl_schedule.created_by', $_SESSION['id']);
            $this->db->where('DATE(tbl_user_query.assign_date)', $created_date);
            $this->db->where('tbl_user_query.org_id', $this->session->org_id);
            $this->db->where('tbl_user_query.delete_status', 0);
            $this->db->where('tbl_user_query.status != ', 'in_complete');
            $this->db->order_by('query_id', 'DESC');
            $this->db->limit(50);
            $queryRecords = $this->db->get('tbl_user_query')->result();
            // print_r($queryRecords);
            // exit;
        }
        // echo $this->db->last_query();
        // exit;
        $data = array();
        $a = 1;
        foreach ($queryRecords as $value) {
            $customer_id = $value->customer_id;
            $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            $company_name = $data1->company_name;
            $contact_person_name1 = $data1->contact_person_name1;
            $phone_no = $data1->phone_no;
            $email = $data1->email;
            $customer_id = $data1->customer_id;
            $query_id = $value->query_id;
            $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount = $data3->count;
            if ($schedulecount > 1) {
                $highlight = "YES";
            } else {
                $highlight = "NO";
            }
            if ($schedulecount > 0) {
                $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount1 = $data_count->count;
                $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                $employee_id = $data4->schedule_assign_to;
                $assign_date = $data4->assign_date;
                $assign_starttime = $data4->assign_starttime;
                $assign_endtime = $data4->assign_endtime;
                $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                $employee_name = $data5->name;
                $check_assign = "Yes";
            } else {
                $check_assign = "No";
            }

            $Status1 = $value->status;
            $scheduledatetime = date("h:ia", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

            if ($check_assign == 'No') {
                $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
            } else if ($schedulecount1 != 0) {
                $check = '<a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a> ' . $employee_name . '<br>';
            } else {
                $check = '
                ' . $employee_name . '<a data-toggle="modal"  rel="tooltip" title="Re-Schedule count" data-placement="bottom" id="' . $value->query_id . '"><button type="button" class="green-btn activity-btn-text" style="margin-left:5px;">' . $schedulecount1 . '</button></a><br>
                ';
            }
            if ($value->priority == 'Normal') {
                $Normal = 'class="active"';
                $bg_color = 'info';
            } else {
                $Normal = '';
                // $bg_color='info';
            }
            if ($value->priority == 'Low') {
                $Low = 'class="active"';
                $bg_color = 'danger';
            } else {
                $Low = '';
                // $bg_color='danger';
            }
            if ($value->priority == 'High') {
                $High = 'class="active"';
                $bg_color = 'success';
            } else {
                $High = '';
            }
            $priority = '
                          <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Add Priority" rel="tooltip">
                             ' . $value->priority . ' <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $Normal . '>
                              <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-danger"></span> Normal
                              </a>
                            </li>
                            <li ' . $Low . '>
                               <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                 <span class="status-mark position-left bg-info"></span> Low
                               </a>
                            </li>
                            <li ' . $High . ' >
                                <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                  <span class="status-mark position-left bg-primary"></span> High
                                </a>
                            </li>
                          </ul>
                     ';
            if ($value->status == 'pending') {
                $pending = 'class="active"';
                $bg_color = 'info';
                $name = 'Pending';
            } else {
                $pending = '';
            }
            if ($value->status == 'completed') {
                $completed = 'class="active"';
                $bg_color = 'success';
                $name = 'completed';
            } else {
                $completed = '';
            }
            if ($value->status == 'in_progress') {
                $in_progress = 'class="active"';
                $bg_color = 'danger';
                $name = 'In Progress';
            } else {
                $in_progress = '';
            }

            if ($value->status == 'in_complete') {
                $in_complete = 'class="active"';
                $bg_color = 'success';
                $name = 'Transfer Schedule';
            } else {
                $in_complete = '';
            }

            $status_remark = '
                            <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown" title="Status Update" rel="tooltip">
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                            
                            <li ' . $pending . '>
                                <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                                    <span class="status-mark position-left bg-info"></span> Pending
                                </a>
                            </li>
                            <li ' . $in_progress . ' >
                                <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                                    <span class="status-mark position-left bg-danger"></span> In-progress
                                </a>
                            </li>
                            <li ' . $completed . '>
                                <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                                    <span class="status-mark position-left bg-success"></span> Completed
                                </a>
                            </li>
                        </ul> ';
            $remark = '<ul class="icons-list">
                            <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                            <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                        </ul>
            ';
            $upload_documents = '<ul class="icons-list">
                                  <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                  <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                  </ul>
            ';

            
            $action_btn = '
                        <a href="#" class="label label-info dropdown-toggle" data-toggle="dropdown" style="color: white;">
                            Select Action <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-red"></span> Re-schedule 
                                </a>
                            </li>
                            <li>
                                <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                    <span class="status-mark position-left dot dot-yellow"></span> Transfer Task
                                </a>
                            </li>
                        </ul>
            ';
            $new = array(
                'ticket_no' => $value->ticket_no,
                'query_id' => $value->query_id,
                'status' => ucwords($Status1),
                'company_name' => $company_name,
                'contact_person_name1' => $contact_person_name1,
                'product_name' => $value->product_name,
                'issue' => $value->issue,
                'scheduledatetime' => $scheduledatetime,
                'check' => $check,
                'priority' => $priority,
                'created_date' => date("d M, Y", strtotime($value->created_date)),
                'schedule_date' => date("d M Y", strtotime($assign_date)),
                'upload_documents' => $upload_documents,
                'remark' => $remark,
                'status_remark' => $status_remark,
                'action_btn' => $action_btn,
                'type'=> $value->type,
                'value_status' => $value->status
            );
            array_push($data, $new);
        }
        return $data;
    }

    public function UploadScheduleDocumentContact($customer_id)
    {
        $this->db->select('schedule_id');
        $this->db->where('issue_id', $query_id);
        $schedule_data = $this->db->get('tbl_schedule')->row();

        $count = count($_FILES['Document']['name']);

        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['Document']['name'][$i])) {
                $image = $_FILES['Document']['name'][$i];
                $cur_date = date("dmyHis");
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file = $cur_date . '_' . $i . ".$extension";
                $move_file = FCPATH . 'assets/admin/scheduledocuments/';
                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['Document']['tmp_name'][$i], $move_file1);
                chmod($move_file1, 0755);
                $Array = array(
                    'schedule_id' => $schedule_data->schedule_id,
                    'issue_id' => $query_id,
                    'upload_by' => $_SESSION['id'],
                    'uploadfilename' => $store_file,
                    'doc_name' => $image,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_schedule_document', $Array);
            }
        }
    }

    public function document_details($id)
    {
        $doc_details = $this->db->query('SELECT * FROM `tbl_reference_document` WHERE customer_id = '.$id.'')->result();
        return $doc_details;
    }

    public function Get_task_details($task_id)
    {
        $org_id = $this->session->org_id;
        $data = $this->db->query('SELECT * FROM `tbl_user_query` WHERE org_id = '.$org_id.' AND query_id = '.$task_id.'')->row();
        $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$task_id'")->row();

        $assign_starttime = date("h:ia", strtotime($data4->assign_starttime));
        $assign_endtime = date("h:ia", strtotime($data4->assign_endtime));
        $assign_date = $data4->assign_date;
        $status = $data->status;
        $schedule_type = $this->db->query("SELECT `type_name` FROM `tbl_schedule_type_name` WHERE `id`='$data4->schedule_type_id'")->row()->type_name;

        $company_name = $this->db->query("SELECT `company_name` FROM `tbl_customer` WHERE `customer_id`='$data->customer_id'")->row()->company_name;

        $contact_person_name = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$data->assign_to'")->row()->name;

        $data3 = $this->db->query("SELECT * FROM `tbl_reminder` WHERE `recd_id`= $task_id ")->row();
    
        if(!empty($data3))
        {
            $interval = $data3->interval_type;
            $recurring_eod = $data3->recurring_eod;
            $reminder_note = $data3->reminder_note;
            $reminder_before_time = $data3->reminder_before_time;
            $users_ids = $data3->user_id;
            $users_id = explode(',', $users_ids);
            
            $list = '';
            $lastIndex = count($users_id) - 1;
            foreach ($users_id as $index => $value) 
            {
                $user_names = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$value'")->row()->name;
                $list .= $user_names;
                if ($index != $lastIndex) 
                {
                    $list .= ', ';
                }
            }
            $users_name = $list;
            $contact_person_name = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$data->assign_to'")->row()->name;

            $notify_by = explode(",", $data3->notify_id);
            $notify_val = array();
            if(!empty($notify_by))
            {
                foreach($notify_by as $n)
                {
                    $notify_by_name_id = $this->db->query("SELECT `notify_by` FROM `tbl_notify_by` WHERE`notify_id`= $n ")->row()->notify_by; 
                    array_push($notify_val,$notify_by_name_id);               
                }
            
                $notify_by_name = implode(",", $notify_val);
            }
            
        }
        else
        {
            $interval = '';
            $recurring_eod = '';
            $reminder_note = '';
            $reminder_before_time = '';
            $users_name = '';
            $notify_by_name = '';
        }

        $data3 = $this->db->query("SELECT * FROM `tbl_reminder` WHERE `recd_id`= $task_id ")->row();

       
        $new = array(
            'ticket_no' => $data->ticket_no,
            'query' => $task_id,
            'status' => ucwords($status),
            'company_name' => $company_name,
            'contact_person_name' => $contact_person_name,
            'product_name' => $data->product_name,
            'issue' => $data->issue,
            'start_time' => $assign_starttime,
            'end_time' => $assign_endtime,
            'priority' => $data->priority,
            'schedule_date' => date("d M Y", strtotime($assign_date)),
            'schedule_type' => $schedule_type,
            'interval' => $interval,
            'recurring_eod' => date("d M Y", strtotime($recurring_eod)),
            'reminder_note' => $reminder_note,
            'reminder_before_time' => $reminder_before_time,
            'users_ids' => $users_name,
            'notify_by_name' => $notify_by_name
        );
        
        return $new;
    }
    public function edit_task($id)
    {
        // $this->db->select('tbl_user_query.*,tbl_schedule.schedule_type_id');
        $this->db->select('tbl_user_query.*,tbl_schedule.schedule_type_id');
        $this->db->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id');
        $this->db->where('query_id',$id);
        return $this->db->get('tbl_user_query');
    }

    public function Edit_Schedule_Task($formdata)
    {
        $org_id = $this->session->org_id;
        $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $conv_date = date("Ymd", strtotime($schd_date1));

        $p_type = $formdata['priority_type'];
        $s_time = $formdata['schedule_start_time'];
        $e_time = $formdata['schedule_end_time'];
        $emp_id = $formdata['employee_id'];
        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
        $available_count = $available->num_rows();

        if ($available_count == 0) {
            $created_by = $this->session->id;
            $date = date("Y-m-d H:i:s");
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($string) - 1;
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $string[mt_rand(0, $max)];
            }
            $salt = $token;
            $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
            $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

            // $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' order by schedule_id desc ")->row();
            // if (!empty($result->ticket_no)) 
            // {
            //     $explode = explode('S_', $result->ticket_no);
            //     $string = $explode[1];
            //     $db1_date = explode('-', $string);
            //     $previous_date = $db1_date[0];
            //     $ticket_no = $db1_date[1];
            //     // $cur_date=date("Ymd");
            //     if ($previous_date == $conv_date) {
            //         $ticket_no++;
            //         $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
            //         $final_ticket_num = $conv_date . '-' . $ticket_no1;
            //         $schedule_ticket_num = 'S_' . $conv_date . '-' . $ticket_no1;
            //     } else {
            //         $final_ticket_num = $conv_date . '-' . '001';
            //         $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            //     }
            // } else {
            //     // $cur_date=date("Ymd"); 
            //     $final_ticket_num = $conv_date . '-' . '001';
            //     $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            // }

            $customer_id = $formdata['customer_id'];
            $product_id = $formdata['product_id'];
            $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row();
            $product_name = $pdr_name->prdsrv_name;
            $query = $formdata['query'];
            $employee_id = $emp_id;
            $start_time = $formdata['schedule_start_time'];
            $end_time = $formdata['schedule_end_time'];
            $schedule_type_id = $formdata['schedule_type_id'];
            $status = $formdata['status'];
            $priority = $formdata['priority_id'];
            $query_id = $formdata['query_id'];
            $ticket_id = $this->db->query("SELECT ticket_no FROM `tbl_user_query` WHERE query_id='$query_id'")->row();
            $final_ticket_num = $ticket_id->ticket_no;
            // echo "<pre>";
            // print_r($formdata);
            // die;
            // $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`status`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$status','$priority','$schedule_date1')");
            // $insert_id = $this->db->insert_id();
            $data = $this->db->query("UPDATE tbl_user_query SET org_id=$org_id ,customer_id=$customer_id, product_id=$product_id, ticket_no=$final_ticket_num, product_name=$product_name, issue=$query, assign_to=$employee_id, status=$status, priority=$priority, assign_date=$schedule_date1 WHERE query_id=$query_id");
            if ($data) 
            {
                if ($this->session->user_type != 'SA') 
                {
                    $schedule_type = "Own";
                } 
                else 
                {
                    $schedule_type = "Task";
                }

                // $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
                // $schedule_insert_id = $this->db->insert_id();
                $this->db->query("UPDATE tbl_schedule SET org_id=$org_id ,created_by=$created_by, schedule_assign_to=$employee_id, schedule_type_id=$schedule_type_id, ticket_no=$schedule_ticket_num, assign_date=$schedule_date1, assign_starttime=$start_time, assign_endtime=$end_time, schedule_type=$schedule_type, created_date=$date WHERE issue_id=$query_id");
                $schedule_insert_id = $this->db->select('schedule_id')->from('tbl_schedule')->where('issue_id',$query_id)->get()->row()->schedule_id;
                $TaskArray = array(
                    'employee_id' => $emp_id,
                    'org_id' => $this->session->org_id,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'query_id' => $query_id,
                    'schedule_id' => $schedule_insert_id,
                    'ticket_no' => $final_ticket_num,
                    'remark' => $query,
                    'status' => $status,
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->db->query("UPDATE tbl_task_status SET $TaskArray WHERE query_id = $query_id");
                // $this->db->Insert("tbl_task_status", $TaskArray);
                //======================= sending notification to employee regarding assign issue ===============

                $this->db->select("company_name");
                $this->db->where("customer_id", $customer_id);
                $CustData = $this->db->get("tbl_customer")->row();

                $this->db->where("query_id", $insert_id);
                $ScheduleData = $this->db->get("tbl_user_query")->row();

                $this->db->where("schedule_id", $schedule_insert_id);
                $QueryData = $this->db->get("tbl_schedule")->row();

                $sche_date = date("d M Y", strtotime($schedule_date1));
                $sche_time = date("H:ia", strtotime($start_time)) . ' TO ' . date("H:ia", strtotime($end_time));

                $this->db->select("name");
                $this->db->where("id", $QueryData->created_by);
                $EmpData = $this->db->get("tbl_admin_login")->row();

                $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id' ")->row();
                $android_id = $data2->android_id;
                $name = $data2->name;
                // $android_id = $data3->android_id;
                $notification_date = date("Y-m-d H:i:s");
                $notification_msg = "Allocated new task and ticket no.is " . $final_ticket_num;
                $date = date("Y-m-d H:i:s");
                $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','$status','$date')");
                $notification_id = $this->db->insert_id($res);
                $reg_token = $android_id;

                $data = array('server_notification' => "employee_task_allocated", 'message' => ' You have been allocated new task for ' . $CustData->company_name . ' assigned by ' . $EmpData->name . ' click here for more details', 'query_id' => $insert_id, 'notification_id' => $notification_id, 'ticket_no' => $ScheduleData->ticket_no, 'company_name' => $CustData->company_name, 'product' => $ScheduleData->product_name, 'assigned_by' => $EmpData->name, 'priority' => $ScheduleData->priority, 'remark' => $ScheduleData->issue, 'date' => $sche_date, 'time' => $sche_time);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {

                    $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $android_id = $data3->android_id;
                    $contact_person_name1 = $data2->contact_person_name1;
                    // ----------------- Insertinf notification to table ---------------------------
                    $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                    $date = date("Y-m-d H:i:s");

                    $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','$status','$date')");
                    $notification_id1 = $this->db->insert_id($res1);
                    // ----------------- Insertinf notification to table ---------------------------
                    $reg_token = $android_id;
                    $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1, 'date' => $sche_date, 'time' => $sche_time);
                    $target = $reg_token;
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                    $fields = array();
                    $fields['data'] = $data;
                    if (is_array($target)) {
                        $fields['registration_ids'] = $target;
                    } else {
                        $fields['to'] = $target;
                    }
                    $headers = array(
                        'Content-Type:application/json',
                        'Authorization:key=' . $server_key
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                    $result = curl_exec($ch);
                    if ($result === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    } else {
                        $notification_date = date("Y-m-d", strtotime($schedule_date1));
                        $this->db->set('assign_to', $employee_id);
                        $this->db->where('query_id', $insert_id);
                        $this->db->update('tbl_user_query');
                        echo 1;
                    }
                    curl_close($ch);
                }
                curl_close($ch);
            } else {
            }
            if ($formdata['addReminder'] == 1) {
                $recurring_eod1 = str_replace(',', ' ', $formdata['recurring_eod']);
                $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
                $eod_date = date("Ymd", strtotime($recurringEOD));
                if($formdata['recurring_set'] == 1){
                    $data1 = array(
                        'org_id'=>$this->session->org_id,
                        'time_zone' => $this->session->org_timezone,
                        'recd_id' => $insert_id,
                        'module_name'=> 'Activity',
                        'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                        'user_id' => implode(',',$formdata['user_id']),
                        'reminder_date' => $conv_date,
                        'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                        'reminder_before_time' => $formdata['reminder_before_time'],
                        'notify_id' => $formdata['reminder_notify_by'],
                        'reminder_note' => $formdata['reminder_note'],
                        'recurring_set' => $formdata['recurring_set'],
                        'interval_type' => $formdata['interval_type'],
                        'recurring_eod' => $eod_date,
                    );
                    $this->db->insert('tbl_reminder',$data1);
                    $reminderID = $this->db->insert_id(); 

                    $recurringDatesListArray = array();
                    $recurringDatesArray = $this->getRecurringDateString($formdata['interval_type'],$conv_date,$recurringEOD);
                    
                    $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($formdata['reminder_time'])))));
                    $b = new DateTime(date('H:i:s',strtotime($formdata['reminder_before_time'])));
                    $interval = $a->diff($b);
                    $timeDiff = $interval->format("%H:%i:%s%s");

                    for ($i=0; $i < count($recurringDatesArray); $i++) { 
                        $rec_data = array(
                            'time_zone' => $this->session->org_timezone,
                            'notify_id' => $formdata['reminder_notify_by'],
                            'reminder_id' => $reminderID,
                            'recurring_rem_date' => $conv_date,
                            'recurring_rem_time' => date('H:i',strtotime($formdata['reminder_time'])),
                            'recurring_date' => $recurringDatesArray[$i],
                            'recurring_time' => $timeDiff,
                            'recurring_mail_sent' => 0,
                            'recurring_user_id' => implode(',',$formdata['user_id']),
                        );
                        array_push($recurringDatesListArray,$rec_data);
                    }
                    $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
                    if($res)
                    {
                        echo 1;
                    }
                    else
                    {
                        echo 0;
                    }
                }else{
                    $data1 = array(
                        'org_id'=>$this->session->org_id,
                        'time_zone' => $this->session->org_timezone,
                        'recd_id' => $insert_id,
                        'module_name'=> 'Activity',
                        'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                        'user_id' => implode(',',$formdata['user_id']),
                        'reminder_date' => $conv_date,
                        'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                        'reminder_before_time' => $formdata['reminder_before_time'],
                        'reminder_note' => $formdata['reminder_note'],
                        'recurring_set' => $formdata['recurring_set']
                    );
                    $res = $this->db->insert('tbl_reminder',$data1);
                    if($res){
                        echo 1;
                    }else{
                        echo 0;
                    }
                }
            }
            
        } else {
            echo "2";
        }
    }

    // public function cust_details($query_id)
    // {
    //     $this->db->select('tbl_customer.*');
    //     $this->db->join('tbl_user_query','tbl_customer.customer_id = tbl_user_query.customer_id');
    //     $this->db->where('tbl_user_query.query_id',$id);
    //     return $this->db->get('tbl_customer')->row();

    //     // $this->db->select('tbl_customer.*');
    //     // $this->db->join('tbl_customer','tbl_schedule.issue_id = tbl_user_query.query_id');
    //     // $this->db->where('query_id',$id);
    //     // return $this->db->get('tbl_user_query')->row();
        
    //     // $this->db->where('org_id', $this->session->org_id);
    //     // $this->db->where('delete_status', 0);
    //     // $this->db->order_by('company_name', 'ASC');
    //     // return $this->db->get('tbl_customer')->result();
    // }

    public function Get_customer_details($cust_id)
    {
        // $this->db->where('org_id', $this->session->org_id);
        // $this->db->where('delete_status', 0);
        $this->db->where('customer_id', $cust_id);
        return $this->db->get('tbl_customer')->row();
    }
}
