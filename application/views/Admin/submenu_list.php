

          <option value="">Select Submenu</option>
            <?php   
              foreach ($fetch_submenu as $value) 
              {
            ?>
            <option value="<?= $value->submenu_id ?>"><?= $value->submmenu;?></option>
           <?php } ?> 