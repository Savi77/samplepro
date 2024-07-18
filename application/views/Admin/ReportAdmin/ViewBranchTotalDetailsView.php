<style>
   table td {
		color: #000 !important;
	}

	.table-striped tbody tr:nth-of-type(odd) {
		background-color: rgba(0, 0, 0, .05) !important;
	}

	#ajax_table th:first-child {
		width: 100px !important;
		text-wrap: nowrap !important;
	}

	#ajax_table th {
		text-wrap: nowrap !important;
	}

	/* table td:nth-child(2) div a:hover {
		color: #605959 !important;
	} */
	#ajax_table td:nth-child(2) div{
      color: #000 !important;
      font-weight:600
    }
</style>

<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
	<h6 class="card-title py-sm-4 card-headings">Branch For <?= $formdata['name']; ?></h6>
	<button type="button" class="close" data-dismiss="modal">×</button>
</div>
  <!-- <div class="modal-header ">
      
      <h6 class="modal-title">Leads / Opportunities by Source :  <?= $GetSourceData->source_title; ?></h6>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div> -->
  <div class="modal-body p-0">
      <form class="form-horizontal">
        <table  class="table table-striped" id="ajax_table">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Lead-Opportunity ID</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
            
                
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($viewtotal->result() as $row) 
                  {                   
                ?>
                <tr>
                      <td>
                        <div>
                        <?= $count; ?>
                        </div>
                     </td>
                        <td>
                           <div style="width:150px;">
                           <?= $row->leadopp_id ?>
                           </div>
                        </td>
                        <td>
                           <div style="width:200px;" class="text-wrap-col">
                           <?= $row->company_name ?>
                           </div>
                        </td>
                        <td>
                           <div style="width:200px;" class="text-wrap-col">
                           <?= $row->contact_person_name1 ?>
                           </div>
                        </td>
                        <td>
                           <div style="width:150px;">
                           <?= $row->phone_no ?>
                           </div>
                        </td>
                        <td>
                           <div style="width:200px;" class="text-wrap-col">
                           <?= $row->email ?>
                           </div>
                        </td>
                        <td>
                           <div style="width:200px;" class="text-wrap-col">
                           <?= $row->address ?>
                           </div>
                        </td>
                        
                </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>
      </form>
  </div>

