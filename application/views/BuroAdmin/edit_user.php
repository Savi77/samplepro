	          
       
 <?php 
  foreach ($edit_user->result() as  $user) 
  {  
 ?>
    <div class="col-md-12">

       <!-- Toolbar -->
        <div class="navbar navbar-default navbar-xs navbar-component">
          <ul class="nav navbar-nav visible-xs-block">
            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
          </ul>

          <div class="navbar-collapse collapse" id="navbar-filter">
            <ul class="nav navbar-nav element-active-slate-400">
              <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> General</a></li>
              <!-- <li><a href="#schedule" data-toggle="tab"><i class="icon-calendar3 position-left"></i> Account</a></li> -->
              <!-- <li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Security</a></li> -->
            </ul>
          </div>
        </div>
        <!-- /toolbar -->

         <!-- User profile -->
        <div class="row">
          <div class="col-lg-9">
            <div class="tabbable">
              <div class="tab-content">
                <div class="tab-pane fade in active" id="activity">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel border-left-lg border-left-danger invoice-grid timeline-content">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                                   <div class="row">
                                      <div class="col-sm-6">
                                        <div class="thumbnail no-padding">
                                            <div class="thumb">
                                             <?php if(!empty($user->image_url)) { ?> 
                                              <img src="<?= $user->image_url ?>" alt="">
                                              <?php } else{?>
                                               <img src="<?= base_url() ?>assets/images/default.jpg" alt="">
                                               <?php }  ?>
                                              <div class="caption-overflow">
                                                <span>
                                                  <a href="<?= $user->image_url ?>" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox">
                                                  <i class="icon-plus2"></i>
                                                  </a>
                                                 </span>
                                              </div>
                                            </div>
                                              <div class="caption text-center">
                                                <h6 class="text-semibold no-margin"><?= $user->firstname." ".$user->lastname;?></h6>
                                              </div>
                                            </div>
                                      </div>
                                       <div class="col-sm-6">
                                           
                                            <ul class="media-list">
                                                <li class="media">
                                                <span class="text-muted text-size-small">Email</span>
                                                <div class="media-left">
                                                  <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class="icon-mail-read"></i></a>
                                                </div>
                                                <div class="media-body">
                                                  <h6><?= $user->email?></h6>
                                                </div>
                                                </li>
                                                <li class="media">
                                                <span class="text-muted text-size-small">Gender</span>
                                                <div class="media-left">
                                                  <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class=" icon-user"></i></a>
                                                </div>
                                                <div class="media-body">
                                                  <h6 style="text-transform: uppercase;"><?= $user->gender?></h6>
                                                </div>
                                                </li>
                                                <li class="media">
                                                <span class="text-muted text-size-small">Address</span>
                                                <div class="media-left">
                                                  <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class="icon-address-book2"></i></a>
                                                </div>
                                                <div class="media-body">
                                                  <h6><?php if(empty($user->address))
                                                            {
                                                             echo "Not Available";
                                                          }
                                                          else
                                                           { echo $user->address;
                                                           }
                                                  ?></h6>
                                                </div>
                                                </li>
                                                <li class="media">
                                                <span class="text-muted text-size-small">Register with</span>
                                                <div class="media-left">
                                                  <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class=" icon-database-diff"></i></a>
                                                </div>
                                                <div class="media-body">
                                                  <h6 style="text-transform: uppercase;"><b><?= $user->register_with?></b></h6>
                                                </div>
                                                 </li>
                                             </ul>
                                    </div>
                               </div>
                             </div>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                <!-- /schedule -->

<!--            <div class="tab-pane fade" id="schedule">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel border-left-lg border-left-danger invoice-grid timeline-content">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <ul class="list list-unstyled">
                                  <li>Account No. #: &nbsp;1234546489</li>
                                  <li>Issued on: <span class="text-semibold">2015/01/25</span></li>
                                </ul>
                              </div>
                            </div>
                          </div>

                          <div class="panel-footer">
                            <ul>
                              <li><span class="status-mark border-danger position-left"></span> Due: <span class="text-semibold">2015/02/25</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                <!-- /invoices -->
<!--                   <div class="tab-pane fade" id="settings">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel border-left-lg border-left-danger invoice-grid timeline-content">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                               <ul class="list list-unstyled">
                                 <li>Due Date : <span class="text-semibold">2015/01/25</span></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                <!-- /invoices -->
                </div>
                <!-- /messages -->
             </div>
           </div>
           <!-- /timeline -->
       </div>
      </div>
  </div>
  <!-- /user profile -->
  </div>
<?php } ?>	   

<script type="text/javascript">
    $(document).ready(function() 
      {
          $('#edit_categoryform').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                category_name: {
                        validators: {
                            notEmpty: {
                                message: 'The Category Name is required'
                            }
                        }
                    },
              category_image: {
                    validators: {
                    file: {
                             extension: 'jpg,png,jpeg',
                             maxSize: 2097152,   //2 mb  maxsize
                             message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
                     }
                  }
              },
                 category_desc: {
                    validators: {
                       notEmpty: {
                                message: 'The Category Description is required'
                            }
                      }
                   }
              }
          });
      });
</script>
 <script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#edit_categoryform").on('submit',(function(e)
           {
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
                }
              else
              {
                       $("#preview4").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                        $.ajax({
                              url: '<?php echo base_url('admin/Category/update') ?>',
                              type: "POST",
                              data:  new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false,
                              success: function(data)
                                {
                                    $("#preview3").hide();
                                   //alert(data);
	                                 new PNotify({
	                                               title: 'Update Category',
	                                               text: 'Category details updated successfully',
	                                               type: 'success'
	                                      });
	                                    setTimeout(function()
	                                     {
	                                         window.location="<?php echo base_url('admin/Category') ?>";
	                                     }, 1000);
                                },
                              error: function()
                              {
                                alert('fail');
                                }
                           });

              }
          return false;
          }));
      });
</script>