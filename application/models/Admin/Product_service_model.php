<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_service_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

   public function get_product_service()
    {
      $this->db->where('status','1');
      $data = $this->db->get('tbl_product_service')->result();
      $final_array=array();
      foreach ($data as $value) 
      {
        $prd_brand = $value->prd_brand;
        $prd_specs = $value->prd_specs;
        $prdsrv_uom = $value->prdsrv_uom;

        $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

        $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();

        $uom = $this->db->query("SELECT uom_type FROM tbl_uom WHERE uom_id='$prdsrv_uom'")->row();

        $prdsrv_array=array
        (
            'prd_srv_id'=>$value->prd_srv_id,
            'prdsrv_name'=>$value->prdsrv_name,
            'prdsrv_type'=>$value->prdsrv_type,
            'price'=>$value->price,
            'image'=>$value->image,
            'brand_name'=>$brand_name->brand_name,
            'specs'=>$specs_name->specs,
            'prdsrv_uom'=>$uom->uom_type,
            'prdsrv_description'=>$value->prdsrv_description,
            'status'=>$value->status,
            'date_created'=>$value->date_created
        );
        array_push($final_array, $prdsrv_array);
      }
      return $final_array;
    }

   public function get_brand_name()
    {
      $this->db->select('brand_name, id');
      $this->db->where('status', 1);
      return $this->db->get('tbl_product_group')->result();
    }

   public function get_specs()
    {
      $this->db->select('specs, id');
      $this->db->where('status', 1);
      return $this->db->get('tbl_product_group')->result();
    }

   public function get_hsn_code()
    {
      $org_id=$this->session->org_id;
      $this->db->select('hsn_code, hsn_id');
      $this->db->where('org_id',$org_id);
      $this->db->where('status', 1);
      $this->db->where('delete_status',0);
      return $this->db->get('tbl_hsn_code')->result();
    }

   public function get_specification_array()
    {
      $org_id=$this->session->org_id;
      $this->db->select('specification_name, specification_id');
      $this->db->where('org_id',$org_id);
      $this->db->where('status', 1);
      $this->db->where('delete_status',0);
      return $this->db->get('tbl_product_specification')->result();
    }


   public function add_product_service($formdata,$upload_file,$fileup)
    {
      $date=date("Y-m-d H:i:s"); 
      if ($formdata['prd_srv_type']=='product')
      {
          $prd_brand = $formdata['prd_brand'];
          $prd_specs = $formdata['prd_specs'];
      }
      else
      {
          $prd_brand = '';
          $prd_specs = '';
      }

       // --------------------- Single product image ------------------------------
          $cur_date1=date("dmyHis");
          $sepext1 = explode('.', strtolower($fileup));
          $extension1 = end($sepext1);
          $store_file1 =$cur_date1.".$extension1";
          $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
          $move_file11 = $move_file1 . basename($store_file1);                  
          // --------------------- / Single product image ------------------------------  

        $data=array(
                      'prdsrv_name'=>$formdata['prd_srv_name'],
                      'prdsrv_type'=>$formdata['prd_srv_type'],
                      'image'=>$store_file1,
                      'prd_brand'=>$prd_brand,
                      'prd_specs'=>$prd_specs,
                      'price'=>$formdata['prd_srv_price'],
                      'prdsrv_uom'=>$formdata['uom_type'],
                      'prdsrv_description'=>$formdata['prd_srv_description'],
                      'date_created'=>$date
                );
        $res=$this->db->insert('tbl_product_service',$data);
        $last_id = $this->db->insert_id();

        if($res)
        {
             // --------------------- Single product image ------------------------------
              move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file11);
           // --------------------- / Single product image ------------------------------
          // --------------------- Multiple product image ------------------------------       
              $count = count($upload_file)-1;
              for ($i=0; $i < $count; $i++) 
              { 
                  $img=$upload_file[$i];
                  $cur_date=date("dmyHis");
                  $sepext = explode('.', strtolower($img));
                  $extension = end($sepext);
                  $store_file =$cur_date.$i.".$extension";
                  $move_file = FCPATH.'assets/admin/product_service/';
                  $move_file1 = $move_file . basename($store_file);
                  move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $move_file1);

                  $this->db->query("INSERT INTO `tbl_prdsrv_img`(`prd_srv_id`, `image`) VALUES ('$last_id','$store_file')");
               }
           // --------------------- / Multiple product image ------------------------------   
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function delete_prd_srv($id)
    {   
       $this->db->where('prd_srv_id',$id);
       return $this->db->delete('tbl_product_service');
    }

    public function edit_prd_srv($id) 
    {
      $where=array('prd_srv_id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_product_service')->result();
    }

    public function get_multiple_image($id) 
    {
      $where=array('prd_srv_id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_prdsrv_img')->result();
    }

    public function update($formdata,$upload_file,$fileup)
    {
      
      if(empty(array_filter($upload_file)))
      {

          if ($formdata['prd_srv_type']=='product')
          {
              $prd_brand = $formdata['prd_brand'];
              $prd_specs = $formdata['prd_specs'];
          }
          else
          {
              $prd_brand = '';
              $prd_specs = '';
          }

          if ($fileup!='') 
          {
              // --------------------- Single product image ------------------------------
                  $cur_date1=date("dmyHis");
                  $sepext1 = explode('.', strtolower($fileup));
                  $extension1 = end($sepext1);
                  $store_file1 =$cur_date1.".$extension1";
                  $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
                  $move_file11 = $move_file1 . basename($store_file1);
                  move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file11);
          // --------------------- / Single product image ------------------------------  

              $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
               $data=array(
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'image'=>$store_file1,
                          'prd_brand'=>$prd_brand,
                          'price'=>$formdata['prd_srv_price'],
                          'prd_specs'=>$prd_specs,
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description']
                    );
               $this->db->update('tbl_product_service', $data);


          }
          else
          {
            $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
               $data=array(
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'price'=>$formdata['prd_srv_price'],
                          'prd_brand'=>$prd_brand,
                          'prd_specs'=>$prd_specs,
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description']
                    );
               $this->db->update('tbl_product_service', $data);
          }

          
      }
      else
      {

          if ($formdata['prd_srv_type']=='product')
          {
              $prd_brand = $formdata['prd_brand'];
              $prd_specs = $formdata['prd_specs'];
          }
          else
          {
              $prd_brand = '';
              $prd_specs = '';
          }
          if ($fileup!='') 
          {
              // --------------------- Single product image ------------------------------
                  $cur_date1=date("dmyHis");
                  $sepext1 = explode('.', strtolower($fileup));
                  $extension1 = end($sepext1);
                  $store_file1 =$cur_date1.".$extension1";
                  $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
                  $move_file11 = $move_file1 . basename($store_file1);
                  move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file11);
          // --------------------- / Single product image ------------------------------  

              $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
               $data=array(
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'image'=>$store_file1,
                          'prd_brand'=>$prd_brand,
                          'price'=>$formdata['prd_srv_price'],
                          'prd_specs'=>$prd_specs,
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description']
                    );
               $this->db->update('tbl_product_service', $data);


          }
          else
          {
            $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
               $data=array(
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'price'=>$formdata['prd_srv_price'],
                          'prd_brand'=>$prd_brand,
                          'prd_specs'=>$prd_specs,
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description']
                    );
              $res = $this->db->update('tbl_product_service', $data);
          }
           // if($res)
           // {
                $prd_srv_id = $formdata['prd_srv_id'];
                // $this->db->where('about_id', $about_id);
                // $res=$this->db->delete('tbl_about_img');
                $count = count($upload_file)-1;
                for ($i=0; $i < $count; $i++) 
                { 
                      $img=$upload_file[$i];
                      $cur_date=date("dmyHis");
                      $sepext = explode('.', strtolower($img));
                      $extension = end($sepext);
                      $store_file =$cur_date.$i.".$extension";
                      $move_file = FCPATH.'assets/admin/product_service/';
                      $move_file1 = $move_file . basename($store_file);
                      move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $move_file1);

                      $this->db->query("INSERT INTO `tbl_prdsrv_img`(`prd_srv_id`, `image`) VALUES ('$prd_srv_id','$store_file')");
                 }
           // }
      }
    }
// -------------------------------------------------------------------------------
// ======================== Delete Image =======================================
    public function delete_file($img_id)
    {   
       $this->db->where('id',$img_id);
       return $this->db->delete('tbl_prdsrv_img');
    }

    public function after_delete($prd_srv_id)
    {   
          $where=array('prd_srv_id'=>$prd_srv_id);
          $this->db->where($where);
          $data = $this->db->get('tbl_prdsrv_img');
          if ($data) 
          {
            echo "
                              <div class='col-md-10'>";
                              foreach ($data->result() as $value2) 
                              { 

                                  echo"<div class='col-md-3'>
                                      <img src='../assets/admin/product_service/$value2->image' style='margin-bottom: 6px; height: 100px; width: 150px'>
                                      <br>
                                      <br>
                                      <div align='center'>
                                          <a onclick='del_pd_image(id)' id=". $value2->id ."><span class='label bg-danger' style='line-height: 20px;'><i class='glyphicon glyphicon-trash' style='font-size: 12px;' data-toggle='tooltip' title='Delete' data-placement='bottom'></i></span></a>
                                      </div>
                                  </div> ";
                                    } 
                              echo "  
                              </div>
                            ";
          }

    }

     public function get_image_count($prd_srv_id)
    {   
       $data = $this->db->query("SELECT id FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->result();
        echo $count = count($data);
    }

//--------------------------------------------------------------------------

//============================================ Product group master ========================================

    public function product_group()
    {
        $this->db->from('tbl_product_group');
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        return $this->db->get();
    }

    public function add_product_group($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'brand_name'=>$data['brand_name'],
                      'specs'=>$data['specs'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_product_group',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_product_group($pd_grp_id) 
    {
        $this->db->set('status',0);
        $this->db->where('id',$pd_grp_id);
        $this->db->update('tbl_product_group');

        // $this->db->where('id',$pd_grp_id);
        // $this->db->delete('tbl_product_group');
    }
  

    public function edit_product_group($pd_grp_id) 
    {
        $this->db->where('id',$pd_grp_id);
        return $this->db->get('tbl_product_group');
    }

    public function Edit_Add_product_group($data) 
    {
        $this->db->set('brand_name',$data['brand_name']);
        $this->db->set('specs',$data['specs']);
        $this->db->where('id',$data['pd_grp_id']);

        $data = $this->db->update('tbl_product_group');
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

}

?>


