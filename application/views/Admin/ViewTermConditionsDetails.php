<?php
foreach ($view_data as $row) 
{
?>
<div class="panel panel-flat">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Term For</label>
                    <input type="text" name="term_for" id="term_for123" class="form-control" placeholder="E.g. Tally" value="<?= $row->term_for ?>" style="max-width: 550px;width: 100%;" readonly>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="row col-12">
                <div class="col-sm-6">
                    <label>Terms & Conditions</label>
                </div>
                <!-- <div class="col-sm-6 text-right p-0">
                    <div class="form-group">
                        <button type="button" class="btn btn-success addButton" id="EditAttachSupport"><i class="icon-add"></i></button>
                    </div>
                </div> -->
            </div>

            <!-- <div id="moreEditSupportUpload" class="col-12"></div> -->

            <div class="col-md-12 mt-2">
                <?php
                    $cc = 43;
                    $terms = explode("$^", $row->term_condition);
                    for ($i = 1; $i < count($terms); $i++) 
                    {
                ?>
                    <dl id="delete_file<?= $cc ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" id="terms<?= $cc ?>" name="terms[]" placeholder="Enter Terms & Condition" rows="2" readonly><?= $terms[$i]; ?></textarea>
                            </div>
                        </div>
                    </dl>
                <?php $cc++;
                } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>