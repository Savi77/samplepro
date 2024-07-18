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
    return $this->db->get('tbl_categories')->result();
  }

   public function get_menu_list1()
  {
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
    return $this->db->get('tbl_sub_categories')->result();
  }

    public function get_submenu_list1()
  {
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
    $this->db->where('status',1);
    return $this->db->get('tbl_sub_categories')->result();
  }

   public function get_list()
  {
      // $this->db->select('*');    
      // $this->db->from('tbl_product_service_list');
      // $this->db->join('tbl_categories', 'tbl_product_service_list.menu_id = tbl_categories.id');
      // $this->db->join('tbl_sub_categories', 'tbl_product_service_list.submenu_id = tbl_sub_categories.submenu_id');
      // return $this->db->get();

      // $this->db->where('status','1');
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
            'date_created'=>$value->date_created
        );
        array_push($final_array, $prdsrv_array);
      }
      return $final_array;

  }

   // public function add($formdata,$image,$download_file)
   //  { 
   //        $cur_date=date("dmyHis");
   //        $product_name = TRIM($formdata['product_name']);
   //      //----------- image ---------------------
   //        $sepext = explode('.', strtolower($image));
   //        $extension = end($sepext);
   //        $store_file =$cur_date.".$extension";
   //        $move_file = FCPATH.'assets/admin/products/';
   //        $move_file1 = $move_file . basename($store_file);
   //      //-------------------------------------------
   //        $sepext1 = explode('.', strtolower($download_file));
   //        $extension1 = end($sepext1);
   //        $store_file1 =$cur_date.".$extension1";
   //        $move_file2 = FCPATH.'assets/admin/products/';
   //        $move_file3 = $move_file2 . basename($store_file1);
   //      //-------------------------------------------

   //        $data=array(
   //                    'menu_id'=>$formdata['menu_id'],
   //                    'submenu_id'=>$formdata['submenu_id'],
   //                    'product_name'=>$product_name,
   //                    'short_desc'=>$formdata['short_desc'],
   //                    'image'=>$store_file,
   //                    'youtube_url'=>$formdata['youtube_url'],
   //                    'download_file'=>$store_file1,
   //                    'status'=>1,
   //                    'inner_page_desc'=>$formdata['inner_page_desc'],
   //                    'date_created'=>date('Y-m-d H:i:s')
   //              );
   //        $res=$this->db->insert('tbl_product_service_list',$data);

   //        if($data)
   //        {
   //          move_uploaded_file($_FILES['image']['tmp_name'], $move_file1);
   //          move_uploaded_file($_FILES['download_file']['tmp_name'], $move_file3);
   //          echo 1;
   //        }
   //        else
   //        {
   //          echo 0;
   //        }
      
   //  }

   public function add_product_service($formdata,$upload_file,$fileup)
    {
      $date=date("Y-m-d H:i:s"); 
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

       // --------------------- Single product image ------------------------------
                  $cur_date1=date("dmyHis");
                  $sepext1 = explode('.', strtolower($fileup));
                  $extension1 = end($sepext1);
                  $store_file1 =$cur_date1.".$extension1";
                  $move_file1 = FCPATH.'assets/admin/product_service/single_product_image/';
                  $move_file11 = $move_file1 . basename($store_file1);
                  
          // --------------------- / Single product image ------------------------------  

        $data=array(
                      'menu_id'=>$formdata['menu_id'],
                      'submenu_id'=>$formdata['submenu_id'],
                      'prdsrv_name'=>$formdata['product_name'],
                      'prdsrv_type'=>$formdata['prd_srv_type'],
                      'image'=>$store_file1,
                      // 'prd_brand'=>$prd_brand,
                      // 'prd_specs'=>$formdata['prd_specs'],
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
       $this->db->where('prd_srv_id',$id);
       return $this->db->delete('tbl_product_service_list');
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
                          'price'=>$formdata['prd_srv_price'],
                          // 'prd_specs'=>$formdata['prd_specs'],
                          'prdsrv_uom'=>$formdata['uom_type'],
                          'prdsrv_description'=>$formdata['prd_srv_description']
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
                          'prdsrv_description'=>$formdata['prd_srv_description']
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
                        'prdsrv_description'=>$formdata['prd_srv_description']
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
                          'prdsrv_description'=>$formdata['prd_srv_description']
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
   


}

?>


