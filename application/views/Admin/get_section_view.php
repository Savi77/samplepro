<div class="row">
    <?php   foreach ($section_list as  $res) {    ?>
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control" name="section_content" id="section_content" rows="3"><?= $res->section_content; ?></textarea>
            </div>
        </div>
    <?php   } ?>
</div>

<script>
    $(document).ready(function(){
        $('#section_content').summernote();
    });
</script>