  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
   <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>



<table class="table datatable-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th class="hidden">Site URL</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th class="hidden">Description</th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                          $count = 1;
                          foreach($code_list->result() as $row) { ?>
                          <tr>
                            <td ><?php echo $count ?></td>
                            <td ><?= $row->code ?></td>
                            <td class="hidden"></td>
                            <td><span class="label label-success">Download</span></td>
                            <td><?= date("d M Y", strtotime($row->date_created)) ?></td>
                            <td class="hidden"></td>
                          </tr>
                        <?php $count++; } ?>
                </tbody>
              </table>