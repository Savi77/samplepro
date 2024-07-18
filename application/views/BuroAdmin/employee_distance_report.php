                        <div class="ibox-content">
                           <div class="table-responsive">
                              <table id="example1" class="table datatable-responsive-column-controlled">
                                  <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Date</th>
                                        <th class='hidden'>Mobile No.</th>
                                        <th class='hidden'>Mobile No.</th>
                                        <th class='hidden'>Mobile No.</th>
                                        <th>Distance (K.M.)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php
                                          $count=1;
                                           foreach ($date_report as $value2)
                                           {  ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?= date("d M, Y",strtotime($value2['Date']));  ?></td>
                                                <td class='hidden'><?= $value2['Date']; ?></td>
                                                <td class='hidden'><?= $value2['Date']; ?></td>
                                                <td class='hidden'><?= $value2['Date']; ?></td>
                                                <td><?= $value2['Distance'];?></td>
                                            </tr>
                                      <?php $count++; } ?> 
                                  </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" style="text-align:right">Total:</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>

                                </table>
                            </div>
                        </div>    