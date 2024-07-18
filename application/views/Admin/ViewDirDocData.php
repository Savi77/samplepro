<style>
	.popover .arrow{
        display: none !important;
    }
   .popover-body{
        width: 200px !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>
   <?php
    // echo json_encode($user_permission);
    $DownloadClass = 'style="display:block";';

    foreach ($user_permission as $priviledge) {
      $priviledge_key = $priviledge->priviledge_key;
      $status = $priviledge->status;
      if ($priviledge_key == 'DOWNLOAD') {
        if ($status == 1) {
          $DownloadClass = 'style="display:block"; ';
        } else {
          $DownloadClass = 'style="display:none"; ';
        }
      }
    }

    ?>
    <?php
      $string = '';
      for ($dd = 0; $dd < count($GetDirData); $dd++) {
        $string = $string . '/' . $GetDirData[$dd];
      } 
    ?>
    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
      <h6 class="card-title py-sm-4 card-headings">
          &nbsp;View Document - <?= implode(' / ',$GetDirData) ?></h6>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
   <div class="modal-body pl-0 pr-0">
     <div class="col-sm-12">
       <!-- <div class="panel panel-flat" style="border: 1px solid #ddd; padding: 0px 20px;"> -->
         <div class="panel-body" style="padding: 0px;">
           <form class="form-horizontal" id="addattachform" enctype='multipart/form-data'>
             <input type="hidden" name="db_dir_id" id="db_dir_id">
             <div class="">
               <!-- <div class="page-header page-header-default">
                 <div class="page-header-content">
                   <div class="page-title" style="padding: 10px 30px 5px 5px;">
                     <h5>
                       <i class=" icon-folder2 position-left"></i>
                       <span class="text-semibold">Directory</span>
                     </h5>
                   </div>
                 </div>

                 <div class="breadcrumb-line breadcrumb-line-popup">
                   <ul class="breadcrumb">
                     <?php
                        $string = '';
                        for ($dd = 0; $dd < count($GetDirData); $dd++) {
                          $string = $string . '/' . $GetDirData[$dd];
                        } 
                      ?>
                     <li><a class="text-black" href="#"><b><?= implode(' / ',$GetDirData) ?></b></a></li>
                   </ul>
                 </div>
               </div> -->

               <?php $path = substr($string, 1); ?>

               <input type="hidden" name="path" id="path" value="<?= $path ?>">



               <div class="col-md-12 d-none">
                 <?php
                  foreach ($GetDirDocData as $res) {
                    $document = $res->uploadfilename;
                    $file = $res->doc_name;
                    $remark = $res->remark;
                    $extension = explode(".", $document);
                    $ext = $extension[1];

                    $fin_path = base_url() . 'assets/Documents/' . $path . '/' . $file;

                  ?>
                   <div class="col-lg-4 col-sm-4">
                     <div class="thumbnail" style="    border: 1px solid #d2c7c7;">
                       <div class="thumb">
                         <div class="col-md-6">
                           <div align="left" style="margin-left: 10px;margin-top: 10px;">
                             <i class=" icon-file-text3" style="font-size: 28px;">
                             </i>
                           </div>
                         </div>
                         <div class="col-md-6">
                           <div align="right">
                             <span class="text-semibold"><?= $remark; ?></span>

                           </div>
                         </div>
                       </div>
                       <div class="caption">
                         <div class="media-heading">
                           <div class="row">
                             <div class="col-md-8">
                               <h6 class="pull-left no-margin">
                                 <span class="text-semibold"><?= $document; ?></span>
                                 <br />
                                 <span class="text-muted" style="font-size: 12px;">
                                   <?= date("d F, Y H:ia", strtotime($res->date_created)); ?>
                                 </span>
                               </h6>
                             </div>
                             <div class="col-md-4">
                               <ul class="icons-list pull-right">
                                 <li <?= $DownloadClass; ?>>
                                   <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= $fin_path; ?>">
                                     <i class="icon-download" style="color:#4FAD57;font-size: 20px;"></i>
                                   </a>
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>

                       </div>

                     </div>
                   </div>
                 <?php  } ?>
               </div>
               
                <!-- <div class="row">
                  <?php
                    foreach ($GetDirDocData as $res) {
                      $document = $res->uploadfilename;
                      $file = $res->doc_name;
                      $remark = $res->remark;
                      $extension = explode(".", $document);
                      $ext = $extension[1];

                      $fin_path = base_url() . 'assets/Documents/' . $path . '/' . $file;
                    ?>
                      <div class="col-lg-4 col-sm-4 demo-file">
                          <div class="demo-file-thumbnail">
                              <div class="thumb">
                                  <div class="col-md-12 d-flex">
                                    <div align="left"> <i class=" icon-file-text3"> </i> </div>
                                    <p class="pl-2" ><?= $document; ?></p>
                                  </div>
                              </div>
                              <div class="caption">
                                  <div class="media-heading">
                                      <div class="row">
                                          <div class="col-md-8">
                                              <h6 class="pull-left no-margin"> <span class="text-muted"><?= $remark; ?></span> <br>
                                                  <span class="text-muted"> <?= date("d F, Y H:ia", strtotime($res->date_created)); ?> </span>
                                              </h6>
                                          </div>
                                          <div class="col-md-4">
                                              <ul class="icons-list pull-right demo-icon">
                                                  <li>
                                                      <a target="_blank" data-popup="tooltip" title="Download File" data-placement="bottom" data-original-title="Download File" href="<?= $fin_path ?>">
                                                          <i class="icon-download"></i>
                                                      </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php   }   ?>
                </div> -->

                <div class="table-responsive">
                    <table class="table table-striped" style="border:1px solid #dddddd">
                        <thead>
                            <tr>
                                <th style="width:50px;">Sr.No</th>
                                <th>Document Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($GetDirDocData))
                            {
                            $count = 1;
                            foreach ($GetDirDocData as $res) {
                              $document = $res->uploadfilename;
                              $file = $res->doc_name;
                              $remark = $res->remark;
                              $extension = explode(".", $document);
                              $ext = $extension[1];
        
                              $fin_path = base_url() . 'assets/Documents/' . $path . '/' . $file;
                                
                        ?>
                            <tr>
                                <td>
                                    <div>
                                        <?= $count;?>
                                    </div>
                                </td> 
                                <td>
                                    <a rel="tooltip" title="View Document" href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file; ?>">
                                    <div style="width:500px;text-wrap:wrap;color:#333333;">
                                        <b><?= $document; ?></b>
                                    </div>
                                    </a>
                                </td> 
                                <td>
                                    <div style="width:150px;">
                                        <ul class="pull-right dflex Padding-0 m-auto text-black">
                                            <li>  
                                                <div>
                                                    <div class="panel-button">
                                                        <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                            <i class="icon-menu9" style="cursor:pointer;"></i>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="my-popover-content" style="display:none">
                                                        <ul>
                                                            <li>
                                                                <a href="<?= $fin_path ?>" style="color:#333333;">
                                                                    <span class="status-mark position-left dot dot-blue"></span> View File 
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> 

                                            </li>
                                        </ul>
                                    </div>
                                </td> 
                            </tr>
                        <?php 
                        $count++;
                        } 
                        }
                        else
                        {?>
                        <tr>
                            <td style="background-color: #fff;" colspan="9"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
             </div>
           </form>
         </div>
       <!-- </div> -->
     </div>
   </div>

   <script>
     $(document).ready(function() {
       brandvalidator = {
           row: '.col-xs-6',
           validators: {
             notEmpty: {
               message: 'Attachment is required'
             },
             file: {
               extension: 'pdf,doc,docx,jpg,jpeg,png,bmp,xsl,xlsx',
               // type: 'application/pdf,application/msword',
               maxSize: 2048 * 1024,
               message: 'Supported format - pdf, doc, docx, jpg, jpeg, png, bmp, xls, xlsx'
             }

           }
         },
         remarkValidator = {
           row: '.col-xs-5',
           validators: {
             notEmpty: {
               message: 'Remark is required'
             }
           }
         },
         bookIndex = 0;

       $('#addattachform')
         .bootstrapValidator({
           framework: 'bootstrap',
           icon: {
             valid: 'glyphicon glyphicon-ok',
             invalid: 'glyphicon glyphicon-remove',
             validating: 'glyphicon glyphicon-refresh'
           },
           fields: {
             'uploadfile[]': brandvalidator,
             'fileremark[]': remarkValidator,
           }
         })
         // Add button click handler
         .on('click', '.addButton', function() {
           bookIndex++;
           var $template = $('#bookTemplate'),
             $clone = $template
             .clone()
             .removeClass('hide')
             .removeAttr('id')
             .attr('data-book-index', bookIndex)
             .insertBefore($template);

           // Update the name attributes
           $clone
             .find('[name="uploadfile[]"]').attr('name', 'uploadfile[' + bookIndex + ']').end()
             .find('[name="fileremark[]"]').attr('name', 'fileremark[' + bookIndex + ']').end();

           $('#addattachform')
             .bootstrapValidator('addField', 'uploadfile[' + bookIndex + ']', brandvalidator)
             .bootstrapValidator('addField', 'fileremark[' + bookIndex + ']', remarkValidator);
         })
         // Remove button click handler
         .on('click', '.removeButton', function() {
           var $row = $(this).parents('.form-group'),
             index = $row.attr('data-book-index');
           // Remove element containing the fields
           $row.remove();
         });
     });
   </script>

   <script type="text/javascript">
     $(document).ready(function(e) {
       $("#addattachform").on('submit', (function(e) {
         //e.preventDefault();
         if (e.isDefaultPrevented()) {
           //alert('invalid');
         } else {
           $("#preview222").show();
           $("#preview222").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
           $.ajax({
             type: "POST",
             url: "<?php echo base_url('admin/DocumentUpload/UploadDocument'); ?>",
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData: false,
             success: function(data) {
               // alert(data);
               $("#preview222").hide();
               new PNotify({
                 title: 'Upload Document',
                 text: 'Document Uploaded Successfully',
                 type: 'success'
               });
               setTimeout(function() {
                 window.location = "";

                 window.location = "<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>";
               }, 500);
             },
             error: function() {
               alert('fail');
             }
           });
         }
         return false;
       }));
     });
   </script>


<script>
    $(document).ready(function () 
    {
          var rescheduleTable = $('#Recent-Task');
          var quotationTable = $('#Quotation');
          var documentTable = $('#view-details-document')
            
          popoverOptions = {
          content: function () {
              // Get the content from the hidden sibling.
              return $(this).siblings('.my-popover-content').html();
          },
          placement: 'bottom',
          container: 'body',
          html: true,
          sanitize: false,
          // selector: '[data-toggle="popover"]',
      };
      $('.panel-button').popover(popoverOptions);

      $('.panel-button').click(function (e) {
          e.stopPropagation();
      });
      // alert($("a").attr("data-dt-idx"));
      if ('.paginate_button.current') 
      {
          
          
          $(".panel-button").click(function()
          {
              var currentPage_default = 1;
              quotationTable.on('page.dt', function() {
                  var currentPage = quotationTable.page.info().page + 1;
                  
              if(currentPage_default != currentPage)
              {
                  if (($('.popover-body').css('display','block'))) 
                  {
                      $('.popover-body').css('display','none');
                      // var currentPage_default = currentPage;
                  }
              }
              
          });
              });

          
              $(".panel-button").click(function()
          {
              var currentPage_default = 1;
              documentTable.on('page.dt', function() {
                  var currentPage = documentTable.page.info().page + 1;
                  
              if(currentPage_default != currentPage)
              {
                  if (($('.popover-body').css('display','block'))) 
                  {
                      $('.popover-body').css('display','none');
                      // var currentPage_default = currentPage;
                  }
              }
              
          });
              });

              $(".panel-button").click(function()
          {
              var currentPage_default = 1;
              rescheduleTable.on('page.dt', function() {
                  var currentPage = rescheduleTable.page.info().page + 1;
                  
              if(currentPage_default != currentPage)
              {
                  if (($('.popover-body').css('display','block'))) 
                  {
                      $('.popover-body').css('display','none');
                      // var currentPage_default = currentPage;
                  }
              }
              
          });
              });
          
      }
      $('.panel-button').on('click', function (e) {
          $('.panel-button').not(this).popover('hide');
      });

      $(document).click(function (e) {
          if ($(e.target).is('.close')) {
              $('.panel-button').popover('hide');
          }
      });

    });
</script>
