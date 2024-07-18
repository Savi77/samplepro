<?php $this->load->view('Admin/includes/n-header');    ?>
<?php
    // echo json_encode($user_permission);
    $AddClassP = 'style="display:block";';
    $UploadDocClass = 'style="display:contents";';
    $DownloadClass = 'style="display:block";';

    foreach ($user_permission as $priviledge) {
      $priviledge_key = $priviledge->priviledge_key;
      $status = $priviledge->status;
      if ($priviledge_key == 'CREATEDIR') {
        if ($status == 1) {
          $AddClassP = ' style="display:block"; ';
        } else {
          $AddClassP = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'UPLOADDOC') {
        // echo 11;
        if ($status == 1) {
          $UploadDocClass = ' style="display:contents"; ';
        } else {
          $UploadDocClass = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'DOWNLOAD') {
        if ($status == 1) {
          $DownloadClass = 'style="display:block"; ';
        } else {
          $DownloadClass = 'style="display:none"; ';
        }
      }
    }

?>
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">

        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Document Manangement System</span>
                <a data-toggle="modal" data-target="#AddUser" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">ADD</span></i></a>
            </div>
            <div class="p-3">
                <div class="card m-0">
                    <div class="row mt-2">
                        <?php
                            $count = 1;
                            foreach ($listdata as $row) {
                                $sub_array = $row['dir_subarray'];
                                $dir_id = $row['dir_id'];
                        ?>
                            <div class="col-sm-12">
                                <div class="col-md-3 treestructure-doc">
                                    <div class="row pl-2">
                                        <ul class="tree2-doc">
                                            <li style="cursor: pointer;"> <?= $row['dir_name']; ?> &nbsp;&nbsp; <a onclick="remark_list_pending(id)" id="<?= $dir_id; ?>" <?= $UploadDocClass; ?>><i class="icon-stack-up"></i></a>&nbsp;&nbsp; <a onclick="view_documents(id)" id="<?= $dir_id; ?>"><i class="icon-eye"></i></a>
                                                <ul>
                                                    <?php for ($d = 0; $d < count($sub_array); $d++) {
                                                        $sdir_id = $sub_array[$d]->dir_id ?>
                                                        <li style="cursor: pointer;">&nbsp;&nbsp;<?= $sub_array[$d]->dir_name; ?>
                                                            &nbsp;&nbsp; <a onclick="remark_list_pending(id)" id="<?= $sdir_id; ?>" <?= $UploadDocClass; ?>><i class="icon-stack-up"></i></a>&nbsp;&nbsp; <a onclick="view_documents(id)" id="<?= $sdir_id; ?>"><i class="icon-eye"></i></a>
                                                            <ul>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-line" ></div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('Admin/includes/n-footer');    ?>

    <div id="AddUser" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        &nbsp;Add Folder</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addform" method="post">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Directory Type : <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="dir_type" onchange="show_dir(this.value)" id="dir_type" data-placeholder="Select Directory Type">
                                                    <option value="">Select Directory Type</option>
                                                    <option value="Main">Main / Parent Directory</option>
                                                    <option value="Sub">Sub Directory</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="parent_dir" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Parent Directory : <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="dir_parentid" id="dir_parentid" data-placeholder="Select Parent Directory">
                                                    <option value="">Select Parent Directory</option>
                                                    <?php
                                                    // $count=1;
                                                    foreach ($MainDirectoryList as $row22) {
                                                    ?>
                                                        <option value="<?= $row22->dir_id; ?>"><?= $row22->dir_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Directory Name : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" name="dir_name" id="dir_name" onkeyup="upper_case(value)"placeholder="Enter Directory Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Directory Access : <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="dir_access" id="dir_access" data-placeholder="Select Directory Access">
                                                    <option value="">Select Directory Access</option>
                                                    <option value="Secured">Secured</option>
                                                    <option value="Opened">Opened</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                    <span id="preview_upload"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  -->

    <div id="modal_default" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#00619F;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"><i class="icon-sort-numeric-asc" style="zoom:1.1; "></i>
                        &nbsp; &nbsp;Edit Credit Term</h6>
                </div>
                <div class="modal-body">
                    <div id="complaint_model_data">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="issue_details" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="bind_issue_data">

            </div>
        </div>
    </div>
    <!--  -->

    <!--  -->

    <div id="AddAttachmentmodal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="AddAttachmentmodalData">

            </div>
        </div>
    </div>



    <div id="ViewDirDocDatamodal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="ViewDirDocData">

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.fn.extend({
            treed: function(o) {
                var openedClass = 'fa-minus-sign';
                var closedClass = 'fa-plus-sign';
                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                };

                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree-doc");
                tree.find('li').has("ul").each(function() {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator-doc fa " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function(e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
                //fire event from the dynamically added icon
                tree.find('.branch .indicator-doc').each(function() {
                    $(this).on('click', function() {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains an anchor instead of text
                tree.find('.branch>a').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                //fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        //Initialization of treeviews
        $('#tree1').treed();
        $('.tree2-doc').treed({
            openedClass: 'fa fa-folder-open',
            closedClass: 'fa fa-folder'
        });
        $('#tree3').treed({
            openedClass: 'fa-chevron-right',
            closedClass: 'fa-chevron-down'
        });

        $(document).ready(function() {
            $('#addform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    dir_name: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    },
                    dir_access: {
                        validators: {
                            notEmpty: {
                                message: 'Select Directory Access'
                            }
                        }
                    },
                    dir_type: {
                        validators: {
                            notEmpty: {
                                message: 'Select Directory Type'
                            }
                        }
                    },



                }
            });
        });

        $(document).ready(function(e) {
            $("#addform").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#preview_upload").show();
                    $.ajax({
                        url: "<?php echo base_url('admin/DocumentUpload/AddDirectory'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview_upload").hide();
                            // alert(data);
                            $(function() {
                                new PNotify({
                                    title: 'Add Directory',
                                    text: 'Added Successfully !!',
                                    type: 'success'
                                });
                            });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>";
                            }, 1000);
                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;
            }));
        });

        function remark_list_pending(dir_id) {
            // $("#db_dir_id").val(id); 
            // $("#AddAttachmentmodal").modal({backdrop: 'static',keyboard: false});
            var datastring = 'dir_id=' + dir_id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/DocumentUpload/GetDirData'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);        
                    $('#AddAttachmentmodalData').html(data);
                    $("#AddAttachmentmodal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#db_dir_id").val(dir_id);
                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }


        function view_documents(dir_id) {

            var datastring = 'dir_id=' + dir_id;
            // alert(datastring);

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/DocumentUpload/ViewDirDocData'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);        
                    $('#ViewDirDocData').html(data);
                    $("#ViewDirDocDatamodal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#db_view_dir_id").val(dir_id);
                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }

        function show_dir(value) {
            if (value == 'Main') {
                $("#parent_dir").hide();
            } else {
                $("#parent_dir").show();
            }
        }

        function upper_case(value) {
            var upper_case = value.toUpperCase();
            $("#dir_name").val(upper_case);
        }

        function DeleteCreditTerm(dir_id) {
            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this directory because all files in directory will be permanently ?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
                            text: 'Yes',
                            addClass: 'btn-sm'
                        },
                        {
                            text: 'No',
                            addClass: 'btn-sm'
                        }
                    ]
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: false
                }
            })

            // On confirm
            notice.get().on('pnotify.confirm', function() {

                var datastring = 'dir_id=' + dir_id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/DocumentUpload/DeleteDir'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Delete Directory',
                                text: 'Deleted successfully !!',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>";
                        }, 800);
                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            })
            // On cancel
            notice.get().on('pnotify.cancel', function() {
                // alert('Oh ok. Chicken, I see.');
            });
        }
    </script>

<script>
    $('#dir_type').select2({
        dropdownParent: $('#AddUser')
    });
    $('#dir_access').select2({
        dropdownParent: $('#AddUser')
    });
    $('#dir_parentid').select2({
        dropdownParent: $('#AddUser')
    });

</script>
<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>