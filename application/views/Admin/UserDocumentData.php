<?php
    if(!empty($DocumentData))
    {
        // echo "<pre>";print_r($DocumentData);
?>
    <div class="col-md-12 table-responsive" style = "overflow-y:scroll;max-height:300px;padding-left:0px;">
        <table class="table table-striped" style="border:1px solid #dddddd;">
            <thead>
                <tr>
                    <th style="width:50px;text-wrap:nowrap;">Sr.No</th>
                    <th>Document Type</th>
                    <th>Document Name</th>
                    <th style="width:100px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $count = 1;
                foreach ($DocumentData as $res) {
                    $document = $res->name;
                    $file = $res->uploadfilename;
                    $extension = explode(".", $document);
                    $ext = $extension[1];
                    
            ?>
                <tr>
                    <td>
                        <div>
                            <?= $count;?>
                        </div>
                    </td> 
                    <td>
                        <div>
                            <?php 
                            $doc_type =$this->db->select('doc_name')->from('tbl_doc_type')->where('id',$res->doc_type_id)->get()->row()->doc_name;
                            echo $doc_type;
                            ?>
                        </div>
                    </td> 
                    <td>
                            <div style="width:250px;text-wrap:wrap;color: #333333;">
                                <a target="_blank" href="<?= base_url() ?>assets/admin/userDocument/<?= $document; ?>" style="color:black;">
                                   <b><?= $file;?></b>
                                </a>
                            </div>
                    </td> 
                    <td>
                        <div>
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
                                                    <a target="_blank" href="<?= base_url() ?>assets/admin/userDocument/<?= $document; ?>" style="color:#333333;">
                                                        <span class="status-mark position-left dot dot-blue"></span> View Document  
                                                    </a>
                                                </li>
                                                <li>
                                                <a onclick="Delete_document(this)" id="<?=$res->id ?>" data-id="<?= $res->id;?>" style="color:#333333;">
                                                    <span class="status-mark position-left dot dot-red"></span> Delete Document
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
            ?>
            </tbody>
        </table>
                <!-- <div class="col-lg-4 col-md-4 col-sm-6" style = "padding-left:0px;">
                    <div class="thumbnail" style="border: 1px solid #d2c7c7;padding: 10px;margin-bottom: 10px; width: max-content;">
                        <div class="thumb">
                            <div align="left" style="margin-bottom: 11px;">
                                <i class=" icon-file-text3" style="font-size: 28px;">
                                </i>
                            </div>
                        </div>
                        <div class="caption">
                            <div class="media-heading">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="pull-left no-margin">
                                            <span class="text-semibold" style="word-break:break-word;"><?= $file; ?></span>
                                            <br />
                                            <span class="text-muted" style="font-size: 12px;">
                                                <?= date("d F, Y H:ia", strtotime($res->date_created)); ?>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="icons-list pull-right">
                                            <li>
                                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/admin/contactmanagementdocuments/<?= $document; ?>">
                                                    <i class="icon-download" style="color:#4FAD57;font-size: 20px;"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div> -->    
    </div>
    <?php
    }
    else
    {
    ?>
        <p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:39%;">No Data Available</p>
    <?php
    }
    ?>

<script>

        $(document).ready(function () {

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

        

        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $('.panel-button').on('click', function (e) {
            $('.panel-button').not(this).popover('hide');
        });
});

            
</script>

<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>


    