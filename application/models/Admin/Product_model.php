<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model 
{

  public function __construct() 
  {
        parent::__construct();
        //echo 'Hello World2';
  }
  public function get_menu_list()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);
    $this->db->where('status',1);
    return $this->db->get('tbl_categories')->result();
  }

   public function get_menu_list1()
   {
     $this->db->where('org_id',$this->session->org_id);
     $this->db->where('delete_status',0);
     $this->db->where('status',1);
     return $this->db->get('tbl_categories')->result();
   }

  public function get_data()
    {
      $where=array('section'=>'offering');
      $this->db->where($where);
      return $this->db->get('tbl_section_header')->result();
    }

    public function Update_header($formdata)
     {
        $where=array('section'=>'offering');
        $this->db->where($where);
        $data=array(
                    'title'=>$formdata['title'],
                    'description'=>$formdata['description']
                  );
        $this->db->update('tbl_section_header', $data);
     }

    public function get_submenu_list()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);
    $this->db->where('status',1);    
    return $this->db->get('tbl_sub_categories')->result();
  }

    public function get_submenu_list1()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->where('delete_status',0);
    $this->db->where('status',1);
    return $this->db->get('tbl_sub_categories')->result();
  }

  public function get_edit_submenu_list($product_id)
  {
      $this->db->where('prd_srv_id',$product_id); 
      $this->db->select('menu_id'); 
      $data=$this->db->get('tbl_product_service_list')->result();
      $menu_id=$data[0]->menu_id;
      $this->db->where('menu_id',$menu_id); 
      return $this->db->get('tbl_sub_categories')->result();
  }

  public function fetch_submenu($menu_id)
  {
    $this->db->where('menu_id',$menu_id);
    $this->db->where('delete_status',0);
    $this->db->where('status',1);
    return $this->db->get('tbl_sub_categories')->result();
  }

   public function get_list()
   {
      $this->db->where('org_id',$this->session->org_id);
      $this->db->where('delete_status',0);     
      $this->db->order_by('prd_srv_id','DESC'); 
      $data = $this->db->get('tbl_product_service_list')->result();
      
      $final_array=array();
      foreach ($data as $value) 
      {
        $prd_brand = $value->prd_brand;
        $prd_specs = $value->prd_specs;
        $prdsrv_uom = $value->prdsrv_uom;
        $menu_id = $value->menu_id;
        $submenu_id = $value->submenu_id;
        $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();
        $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();
        $uom = $this->db->query("SELECT uom_type FROM tbl_uom WHERE uom_id='$prdsrv_uom'")->row();
        $category = $this->db->query("SELECT interest FROM tbl_categories WHERE id='$menu_id'")->row();
        $sub_category = $this->db->query("SELECT submmenu FROM tbl_sub_categories WHERE submenu_id='$submenu_id'")->row();

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
            'category'=>$category->interest,
            'subcategory'=>$sub_category->submmenu,
            'date_created'=>$value->date_created,
            'product_code' =>$value->product_code
        );
        array_push($final_array, $prdsrv_array);
      }
     
      return $final_array;

  }



   public function add_product_service($formdata,$upload_file,$fileup)
    {
        $date=date("Y-m-d H:i:s"); 
        $cur_date1=date("dmyHis");
        $sepext1 = explode('.', strtolower($fileup));
        $extension1 = end($sepext1);
        $store_file1 =$cur_date1.".$extension1";
        $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
        $move_file11 = $move_file1 . basename($store_file1);
        
        $data=array(
                      'org_id'=>$this->session->org_id,
                      'menu_id'=>$formdata['menu_id'],
                      'submenu_id'=>$formdata['submenu_id'],
                      'prdsrv_name'=>$formdata['product_name'],
                      'printing_name'=>$formdata['printing_name'],
                      'product_code'=>$formdata['product_code'],
                      'specification_id'=>$formdata['specification_id'],
                      'gst_applicable'=>$formdata['gst_applicable'],
                      'hsn_code'=>$formdata['hsn_code'],
                      'hsn_desc'=>$formdata['hsn_desc'],
                      'taxability'=>$formdata['taxability'],
                      'sgst_tax'=>$formdata['sgst_tax'],
                      'cgst_tax'=>$formdata['cgst_tax'],
                      'igst_tax'=>$formdata['igst_tax'],
                      'cess'=>$formdata['cess'],
                      'prdsrv_type'=>$formdata['prd_srv_type'],
                      'image'=>$store_file1,                      
                      'price'=>$formdata['prd_srv_price'],
                      'prdsrv_uom'=>$formdata['uom_type'],
                      'prdsrv_description'=>$formdata['prd_srv_description'],
                      'date_created'=>$date
                );
        // print_r($data);
        $res=$this->db->insert('tbl_product_service_list',$data);
        $last_id = $this->db->insert_id();
        if($res)
        {
              move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file11);
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
              echo 1;
        }
        else
        {
           echo 0;
        }
    }



    // public function edit($id) 
    // {
    //   $where=array('prd_srv_id'=>$id);
    //   $this->db->where($where);
    //   return  $this->db->get('tbl_product_service_list');
    // }

     public function edit($id) 
    {
      $where=array('prd_srv_id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_product_service_list')->result();
    }

    public function delete($id)
    {   
      
       $this->db->set('delete_status',1);
       $this->db->where('prd_srv_id',$id);
       return $this->db->update('tbl_product_service_list');
    }

    public function deactivate($id)
    {   
        $this->db->set('status',0);
       $this->db->where('prd_srv_id',$id);
       return $this->db->update('tbl_product_service_list');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
       $this->db->where('prd_srv_id',$id);
       return $this->db->update('tbl_product_service_list');
    }

    // public function update($formdata,$image,$download_file)
    // {
    //   $product_name = TRIM($formdata['prdsrv_name']);
    //   if(empty($image))
    //   {
    //     if(empty($download_file))
    //     {
    //         $this->db->where('prd_srv_id', $formdata['edit_id']);     
    //         $data=array(
    //                       'menu_id'=>$formdata['menu_id'],
    //                       'submenu_id'=>$formdata['submenu_id'],
    //                       'prdsrv_name'=>$product_name,
    //                       'short_desc'=>$formdata['short_desc'],
    //                       'youtube_url'=>$formdata['youtube_url'],
    //                       'inner_page_desc'=>$formdata['inner_page_desc']
    //                 );
    //          $this->db->update('tbl_product_service_list', $data);
    //     }
    //     else
    //     {
    //          $cur_date=date("dmyHis");
    //         //-------------------------------------------
    //           $sepext1 = explode('.', strtolower($download_file));
    //           $extension1 = end($sepext1);
    //           $store_file1 =$cur_date.".$extension1";
    //           $move_file2 = FCPATH.'assets/admin/products/';
    //           $move_file3 = $move_file2 . basename($store_file1);
    //         //-------------------------------------------

    //         $this->db->where('product_id', $formdata['edit_id']);     
    //         $data=array(
    //                       'menu_id'=>$formdata['menu_id'],
    //                       'submenu_id'=>$formdata['submenu_id'],
    //                       'product_name'=>$product_name,
    //                       'short_desc'=>$formdata['short_desc'],
    //                       'youtube_url'=>$formdata['youtube_url'],
    //                       'download_file'=>$store_file1,
    //                       'inner_page_desc'=>$formdata['inner_page_desc']
    //                 );
    //        $res=$this->db->update('tbl_product_service_list', $data);
    //        if($res)
    //          {
    //             move_uploaded_file($_FILES['download_file']['tmp_name'], $move_file3);
    //          }
    //     }
    //   }
    //   //image and download file
    //   else
    //     {
    //       if(empty($download_file))
    //       {
    //           $cur_date=date("dmyHis");
    //           $sepext = explode('.', strtolower($image));
    //           $extension = end($sepext);
    //           $store_file =$cur_date.".$extension";
    //           $move_file = FCPATH.'assets/admin/products/';
    //           $move_file1 = $move_file . basename($store_file);

    //           $this->db->where('product_id', $formdata['edit_id']);
    //            $data=array(
    //                         'menu_id'=>$formdata['menu_id'],
    //                         'submenu_id'=>$formdata['submenu_id'],
    //                         'product_name'=>$product_name,
    //                         'short_desc'=>$formdata['short_desc'],
    //                         'youtube_url'=>$formdata['youtube_url'],
    //                         'long_desc'=>$formdata['long_desc'],
    //                         'image'=>$store_file
    //                     );

    //            $res=$this->db->update('tbl_product_service_list', $data);
    //            if($res)
    //            {
    //               move_uploaded_file($_FILES['image']['tmp_name'], $move_file1);
    //            }
    //       }
    //       else
    //       {
    //           $cur_date=date("dmyHis");
    //           $sepext = explode('.', strtolower($image));
    //           $extension = end($sepext);
    //           $store_file =$cur_date.".$extension";
    //           $move_file = FCPATH.'assets/admin/products/';
    //           $move_file1 = $move_file . basename($store_file);

    //          //--------------------------------------------------
    //           $sepext1 = explode('.', strtolower($download_file));
    //           $extension1 = end($sepext1);
    //           $store_file1 =$cur_date.".$extension1";
    //           $move_file2 = FCPATH.'assets/admin/products/';
    //           $move_file3 = $move_file2 . basename($store_file1);
    //         //-------------------------------------------
    //          $this->db->where('product_id', $formdata['edit_id']);
    //            $data=array(
    //                         'menu_id'=>$formdata['menu_id'],
    //                         'submenu_id'=>$formdata['submenu_id'],
    //                         'product_name'=>$product_name,
    //                         'short_desc'=>$formdata['short_desc'],
    //                         'youtube_url'=>$formdata['youtube_url'],
    //                         'download_file'=>$store_file1,
    //                         'long_desc'=>$formdata['long_desc'],
    //                         'image'=>$store_file
    //                     );

    //            $res=$this->db->update('tbl_product_service_list', $data);
    //            if($res)
    //            {
    //               move_uploaded_file($_FILES['image']['tmp_name'], $move_file1);
    //               move_uploaded_file($_FILES['download_file']['tmp_name'], $move_file3);
    //            }
    //          }
    //     }
    // }

    public function update($formdata,$upload_file,$fileup)
    {
      if(empty(array_filter($upload_file)))
      {

          // if ($formdata['prd_srv_type']=='product')
          // {
          //     $prd_brand = $formdata['prd_brand'];
          //     $prd_specs = $formdata['prd_specs'];
          // }
          // else
          // {
          //     $prd_brand = '';
          //     $prd_specs = '';
          // }

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
                          'menu_id'=>$formdata['menu_id'],
                          'submenu_id'=>$formdata['submenu_id'],
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'image'=>$store_file1,
                          // 'prd_brand'=>$prd_brand,

                          'sgst_tax'=>$formdata['sgst_tax'],
                          'cgst_tax'=>$formdata['cgst_tax'],
                          'igst_tax'=>$formdata['igst_tax'],

                          'price'=>$formdata['prd_srv_price'],
                          // 'prd_specs'=>$formdata['prd_specs'],
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description'],
                          'printing_name'=>$formdata['printing_name'],
                          'product_code'=>$formdata['product_code'],
                          'specification_id'=>$formdata['specification_id'],
                          'gst_applicable'=>$formdata['gst_applicable'],
                          'hsn_code'=>$formdata['hsn_code'],
                          'hsn_desc'=>$formdata['hsn_desc'],
                          'taxability'=>$formdata['taxability'],
                    );
               $this->db->update('tbl_product_service_list', $data);


          }
          else
          {
               $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
               $data=array(
                          'menu_id'=>$formdata['menu_id'],
                          'submenu_id'=>$formdata['submenu_id'],
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'price'=>$formdata['prd_srv_price'],

                          'sgst_tax'=>$formdata['sgst_tax'],
                          'cgst_tax'=>$formdata['cgst_tax'],
                          'igst_tax'=>$formdata['igst_tax'],
                          
                          // 'prd_brand'=>$prd_brand,
                          // 'prd_specs'=>$formdata['prd_specs'],
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description'],
                          'printing_name'=>$formdata['printing_name'],
                          'product_code'=>$formdata['product_code'],
                          'specification_id'=>$formdata['specification_id'],
                          'gst_applicable'=>$formdata['gst_applicable'],
                          'hsn_code'=>$formdata['hsn_code'],
                          'hsn_desc'=>$formdata['hsn_desc'],
                          'taxability'=>$formdata['taxability'],
                    );
               $this->db->update('tbl_product_service_list', $data);
          }

          
      }
      else
      {
          // $cur_date=date("dmyHis");
          // $sepext = explode('.', strtolower($upload_file));
          // $extension = end($sepext);
          // $store_file =$cur_date.".$extension";
          // $move_file = FCPATH.'assets/admin/product_service/';
          // $move_file1 = $move_file . basename($store_file);

          // if ($formdata['prd_srv_type']=='product')
          // {
          //     $prd_brand = $formdata['prd_brand'];
          //     $prd_specs = $formdata['prd_specs'];
          // }
          // else
          // {
          //     $prd_brand = '';
          //     $prd_specs = '';
          // }
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
                        'menu_id'=>$formdata['menu_id'],
                        'submenu_id'=>$formdata['submenu_id'],
                        'prdsrv_name'=>$formdata['prd_srv_name'],
                        'prdsrv_type'=>$formdata['prd_srv_type'],
                        'image'=>$store_file1,
                        // 'prd_brand'=>$prd_brand,
                        'price'=>$formdata['prd_srv_price'],
                        // 'prd_specs'=>$formdata['prd_specs'],
                        'prdsrv_uom'=>$formdata['uom_type'],
                        'prdsrv_description'=>$formdata['prd_srv_description'],
                        'printing_name'=>$formdata['printing_name'],
                        'product_code'=>$formdata['product_code'],
                        'specification_id'=>$formdata['specification_id'],
                        'gst_applicable'=>$formdata['gst_applicable'],
                        'hsn_code'=>$formdata['hsn_code'],
                        'hsn_desc'=>$formdata['hsn_desc'],
                        'taxability'=>$formdata['taxability'],
                  );
              $this->db->update('tbl_product_service_list', $data);


          }
          else
          {
              $this->db->where('prd_srv_id', $formdata['prd_srv_id']);     
              $data=array(
                          'menu_id'=>$formdata['menu_id'],
                          'submenu_id'=>$formdata['submenu_id'],
                          'prdsrv_name'=>$formdata['prd_srv_name'],
                          'prdsrv_type'=>$formdata['prd_srv_type'],
                          'price'=>$formdata['prd_srv_price'],
                          // 'prd_brand'=>$prd_brand,
                          // 'prd_specs'=>$formdata['prd_specs'],
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description'],
                          'printing_name'=>$formdata['printing_name'],
                          'product_code'=>$formdata['product_code'],
                          'specification_id'=>$formdata['specification_id'],
                          'gst_applicable'=>$formdata['gst_applicable'],
                          'hsn_code'=>$formdata['hsn_code'],
                          'hsn_desc'=>$formdata['hsn_desc'],
                          'taxability'=>$formdata['taxability'],
                    );
              $res = $this->db->update('tbl_product_service_list', $data);
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

    public function profile_file($upload_file,$formdata)
    {
        $prd_id=$formdata['prd_id'];

          for ($i=0; $i < count($upload_file)-1; $i++) 
              { 
                   $title=$formdata['title'][$i];
                  
                     $img=$upload_file[$i];

                    $cur_date=date("dmyHis");
                    $sepext = explode('.', strtolower($img));
                    $extension = end($sepext);
                    $store_file =$cur_date.$i.".$extension";
                    $move_file = FCPATH.'assets/admin/products/product_file/';
                    $move_file1 = $move_file . basename($store_file);
                    // move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $move_file1);

                    $res = $this->db->query("INSERT INTO `tbl_profile_file`(`product_id`, `title`, `file`, `file_type`) VALUES ('$prd_id','$title','$store_file','product')");
                    if($res)
                   {
                     move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $move_file1);
                   }

                    // $img=$img.$store_file." ,";
               }
        


    }
   
    public function ImportProductService()
    {
        $org_id=$this->session->org_id;
        $created_by=$this->session->id;
        $created_date=date('Y-m-d H:i:s');
        // $date=date('Y-m-d');

        if(isset($_FILES['product_excel']) && $_FILES['product_excel']['error']==0)
        {
            define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
            require_once ('assets/PHPExcel/Classes/PHPExcel.php');
            $tmpfname = $_FILES['product_excel']['tmp_name'];
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $worksheet = $excelObj->getSheet(0);
            $lastRow = $worksheet->getHighestRow();
            
            for ($row = 3; $row <= $lastRow; $row++)
             {

                  $prd_ser_type=$worksheet->getCell('A'.$row)->getValue();
                  $prd_name=$worksheet->getCell('B'.$row)->getValue();
                  $printing_name=$worksheet->getCell('C'.$row)->getValue();
                  $prd_code=$worksheet->getCell('D'.$row)->getValue();
                  $prd_price=$worksheet->getCell('E'.$row)->getValue();

                  $hsn_desc_data=$worksheet->getCell('F'.$row)->getValue();
                  $igst_rate=$worksheet->getCell('G'.$row)->getValue(); 
                  $cgst_rate=$worksheet->getCell('H'.$row)->getValue();
                  $sgst_rate=$worksheet->getCell('I'.$row)->getValue();
                  
                  $cess=$worksheet->getCell('J'.$row)->getValue();
                  $prd_desc=$worksheet->getCell('K'.$row)->getValue(); 
                  $gst_applicable=$worksheet->getCell('L'.$row)->getValue();
                  $taxability=$worksheet->getCell('M'.$row)->getValue();
                  $single_image=$worksheet->getCell('N'.$row)->getValue();

                  // $sepext1 = explode('.', strtolower($single_image));
                  // $extension1 = end($sepext1);
                  // $cur_date1=date("dmyHis");
                  // $store_file1 =$cur_date1.".$extension1";
                  // $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
                  // $move_file11 = $move_file1 . basename($store_file1);
                  
                if(!empty($prd_ser_type))
                {
                  
                    $category_data = $worksheet->getCell('O' . $row)->getValue(); //Category 
                    $this->db->like('interest', $category_data);
                    $this->db->where('org_id',$this->session->org_id);
                    $Category_res = $this->db->get('tbl_categories')->result();
                    if (count($Category_res) > 0) {
                      $category_id = $Category_res[0]->id;
                    } else {
                      $category_array = array(
                        'interest' => $category_data,
                        'status' => 1,
                        'timestamp' => date('Y-m-d H:i:s'),
                        'org_id' => $org_id,
                        'delete_status' => 0,
                      );

                      if (!empty($category_data)) {
                        $this->db->insert('tbl_categories', $category_array);
                        $category_id = $this->db->insert_id();
                      } else {
                        $category_id = '';
                      }
                    }

                    //-----------------------------------------------------------

                    $Sub_Category_data = $worksheet->getCell('P' . $row)->getValue(); //Sub-Category
                    $this->db->like('submmenu', $Sub_Category_data);
                    $this->db->where('org_id', $this->session->org_id);
                    $Sub_Category = $this->db->get('tbl_sub_categories')->result();

                    if (count($Sub_Category) > 0) {
                      $sub_categories_id = $Sub_Category[0]->submenu_id;
                    } else {
                      $sub_category_array = array(
                        'submmenu' => $Sub_Category_data,
                        'menu_id' => $category_id,
                        'status' => 1,
                        'org_id' => $org_id,
                        'delete_status' => 0,
                      );

                      if (!empty($Sub_Category_data)) {
                        $this->db->insert('tbl_sub_categories', $sub_category_array);
                        $sub_categories_id = $this->db->insert_id();
                      } else {
                        $sub_categories_id = '';
                      }
                    }


                    $uom_data = $worksheet->getCell('Q' . $row)->getValue(); //UOM
                    $this->db->like('uom_type', $uom_data);
                    $this->db->where('org_id', $this->session->org_id);
                    $uom_res = $this->db->get('tbl_uom')->result();

                    if (count($uom_res) > 0) {
                      $uom_id = $uom_res[0]->uom_id;
                    } else {
                      $uom_array = array(
                        'uom_type' => $uom_data,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s'),
                        'org_id' => $org_id,
                        'delete_status' => 0,
                      );

                      if (!empty($uom_data)) {
                        $this->db->insert('tbl_uom', $uom_array);
                        $uom_id = $this->db->insert_id();
                      } else {
                        $uom_id = '';
                      }
                    }

                    $hsn_data = $worksheet->getCell('R' . $row)->getValue(); //UOM
                    $this->db->like('hsn_code', $hsn_data);
                    $this->db->where('org_id', $this->session->org_id);
                    $hsncode_res = $this->db->get('tbl_hsn_code')->result();

                    if (count($hsncode_res) > 0) {
                      $hsn_id = $hsncode_res[0]->hsn_id;
                    } else {
                      $hsn_array = array(
                        'hsn_code' => $hsn_data,
                        'hsn_desc' => $hsn_data,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s'),
                        'org_id' => $org_id,
                        'delete_status' => 0,
                      );

                      if (!empty($hsn_data)) {
                        $this->db->insert('tbl_hsn_code', $hsn_array);
                        $hsn_id = $this->db->insert_id();
                      } else {
                        $hsn_id = '';
                      }
                    }

                    $Product_Specification_data = $worksheet->getCell('S' . $row)->getValue(); //Product Specification
                    $this->db->like('specification_name', $Product_Specification_data);
                    $this->db->where('org_id', $this->session->org_id);
                    $Product_Specification_res = $this->db->get('tbl_product_specification')->result();

                    if (count($Product_Specification_res) > 0) {
                      $specification_id = $Product_Specification_res[0]->specification_id;
                    } else {
                      $specification_array = array(
                        'specification_name' => $Product_Specification_data,
                        'specification_desc' => $Product_Specification_data,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s'),
                        'org_id' => $org_id,
                        'delete_status' => 0,
                      );

                      if (!empty($Product_Specification_data)) {
                        $this->db->insert('tbl_product_specification', $specification_array);
                        $specification_id = $this->db->insert_id();
                      } else {
                        $specification_id = '';
                      }
                    }

                    if ($hsn_desc_data == '') {
                      $hsnDesc = '-';
                    }else {
                      $hsnDesc = $hsn_desc_data;
                    }
                    //-----------------------------------------------------------
                    $insert_array = array(
                      'org_id' => $org_id,
                      'date_created' => $created_by,
                      'menu_id'=>$category_id,
                      'submenu_id'=>$sub_categories_id,
                      'prdsrv_name'=>$prd_name,
                      'printing_name'=>$printing_name,
                      'product_code'=>$prd_code,
                      'specification_id'=>$specification_id,
                      'gst_applicable'=>$gst_applicable,
                      'hsn_code'=>$hsn_id,
                      'hsn_desc'=>$hsnDesc,
                      'taxability'=>$taxability,
                      'sgst_tax'=>$sgst_rate,
                      'cgst_tax'=>$cgst_rate,
                      'igst_tax'=>$igst_rate,
                      'cess'=>$cess,
                      'prdsrv_type'=>$prd_ser_type,
                      'image'=>$single_image,                      
                      'price'=>$prd_price,
                      'prdsrv_uom'=>$uom_id,
                      'prdsrv_description'=>$prd_desc,
                      'delete_status'=>0,
                      'status' => 1
                    );
                    $res = $this->db->insert('tbl_product_service_list', $insert_array); 
                    
                    // $last_id = $this->db->insert_id();
                    // move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file11);
                    // $count = count($upload_file)-1;
                    // for ($i=0; $i < $count; $i++) 
                    // { 
                    //   $img=$upload_file[$i];
                    //   $cur_date=date("dmyHis");
                    //   $sepext = explode('.', strtolower($img));
                    //   $extension = end($sepext);
                    //   $store_file =$cur_date.$i.".$extension";
                    //   $move_file = FCPATH.'assets/admin/product_service/';
                    //   $move_file1 = $move_file . basename($store_file);
                    //   move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $move_file1);

                    //   $this->db->query("INSERT INTO `tbl_prdsrv_img`(`prd_srv_id`, `image`) VALUES ('$last_id','$store_file')");
                    // }           
                }
             }
        }
    }
    public function ExportProductService()
    {
        $org_id=$this->session->org_id;
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        require_once ('assets/PHPExcel/Classes/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Product-Service List'); 
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:E2');

        $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Product-Service Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Product Name'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Printing Name'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Product Code'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Product Price'); 

        $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'HSN Description'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'IGST Rate'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'CGST Rate'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'SGST Rate'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('J3', 'Cess');


        $objPHPExcel->getActiveSheet()->SetCellValue('K3', 'Product Description'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('L3', 'GST Applicable'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Taxability'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('N3', 'Category'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('O3', 'Sub-Category');

        $objPHPExcel->getActiveSheet()->SetCellValue('P3', 'UOM'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'HSN/SAC Code'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R3', 'Product Specification');


        $objPHPExcel->getActiveSheet()->getStyle("A3:R3")->getFont()->setBold( true );

        // $styleArray = array(
        //   'borders' => array(
        //     'allborders' => array(
        //       'style' => PHPExcel_Style_Border::BORDER_THIN
        //     )
        //   )
        // );
        $styleArray = array(
        'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => '000000'),
            'size'  => 12,
            'name'  => 'Arial'
        ));
        $objPHPExcel->getActiveSheet()->getStyle('A3:R3')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A2:R2')->applyFromArray($styleArray);

        $objPHPExcel->getActiveSheet()->getStyle('A3:R3')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'c6d9f1'),
                    'bold'  => true,
                    'size'  => 14,
                    'name'  => 'Arial',
                )
            )
        );

        

        $objPHPExcel->getActiveSheet()->getStyle('A2:R2')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'F9AA74'),
                    'bold'  => true,
                    'size'  => 12,
                    'name'  => 'Arial',
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getColumnDimension('A2')->setWidth(30); 
        
        $rowCount=4;
        $this->db->where('org_id',$org_id);
        $data=$this->db->get('tbl_product_service_list')->result();
        $finalarray=array();
        $cnt=1;
        foreach ($data as  $res) 
        {
            $category_name='';
            $sub_category_name='';
            $uom_name='';
            $hsn_sac_name='';
            $prd_specs_name='';

            $this->db->where('id',$res->menu_id);
            $category_data=$this->db->get('tbl_categories')->row();
            $category_name=$category_data->interest;

            $this->db->where('submenu_id',$res->submenu_id);
            $sub_category_data=$this->db->get('tbl_sub_categories')->row();
            $sub_category_name=$sub_category_data->submmenu;

            $this->db->where('hsn_id',$res->hsn_code);
            $tbl_hsn_code_data=$this->db->get('tbl_hsn_code')->row();
            $hsn_sac_name=$tbl_hsn_code_data->hsn_code;

            $this->db->where('uom_id',$res->prdsrv_uom);
            $uom_data=$this->db->get('tbl_uom')->row();
            $uom_name=$uom_data->uom_type;

            $this->db->where('specification_id',$res->prd_specs);
            $tbl_product_specification_data=$this->db->get('tbl_product_specification')->row();
            $prd_specs_name=$tbl_product_specification_data->specification_name;

            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $res->prdsrv_type);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $res->prdsrv_name);
           
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $res->printing_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $res->product_code);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $res->price);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $res->hsn_desc);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $res->igst_tax);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $res->cgst_tax);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $res->sgst_tax);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $res->cess);

            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $res->prdsrv_description);

            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $res->gst_applicable);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $res->taxability);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $category_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $sub_category_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $uom_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $hsn_sac_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $prd_specs_name);
            $rowCount++;
            $cnt++;
        }   
        

        $filename='Product/Service.xlsx';
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=".$filename."");
        header("Content-Transfer-Encoding: binary ");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean(); 
        $objWriter->save('php://output');
        exit;
    }

    public function get_hsn_description($formdata)
    {
      $hsn_code = $formdata['hsn_code_id'];
      $org_id=$this->session->org_id;
      $hsn_desc = $this->db->select('hsn_desc')->from('tbl_hsn_code')->where('hsn_id',$hsn_code)->where('org_id',$org_id)->get()->row()->hsn_desc;
      return $hsn_desc;
    }

}
