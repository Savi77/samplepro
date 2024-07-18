<div class="table-responsive">
    <table class="table table-striped" border="1">
        <thead>
            <tr>
                <th colspan="3" class="text-center"> Account Manager </th>
            </tr>
            <tr>
                <th class="text-center">Sr.No</th>
                <th class="text-center">Name</th>
            </tr>
        </thead>
        <tbody id="stageData">
            <?php
            $sr = 1;
            if(!empty($ManagerData))
            {  
                foreach ($ManagerData as $value) 
                { 
            ?>
                <tr>
                    <td class="text-center"><?= $sr; $sr++; ?></td>
                    <td class="text-center"><?= $value['name']; ?></td>
                </tr>
            <?php   
                }   
            }
            else
            {
            ?>
            <tr>
                <td colspan="3" class="text-center" style="color:red;"><b>No Data Found</b></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>