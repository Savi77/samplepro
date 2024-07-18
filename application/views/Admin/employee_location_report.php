<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<div class="ibox-content">
   <div class="table-responsive">
      <table id="example" class="display" cellspacing="0">
          <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Date</th>
                <th class='hidden'>Mobile No.</th>
                <th>Time</th>
                <th class='hidden'>Mobile No.</th>
                <th>Address</th>
            </tr>
          </thead>
          <tbody>
               <?php
                  $count=1;
                   foreach ($loc_report as $value2)
                   {  ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= date("d M, Y",strtotime($value2['date']));  ?></td>
                        <td class='hidden'><?= $value2['Date']; ?></td>
                        <td><?= $value2['time']; ?></td>
                        <td class='hidden'><?= $value2['Date']; ?></td>
                        <td><?= $value2['address']; ?></td>
                    </tr>
              <?php $count++; } ?> 
          </tbody>
        </table>
    </div>
</div>    


<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 1 }
        ],
        "order": [[ 1, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="7">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                }
            } );
            
            for( var k=0; k < groupadmin.length; k++){
        // Code added for adding class to sibling elements as "group_<id>"  
                  $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                // Code added for adding Toggle functionality for each group
                    $("#"+groupadmin[k]).click(function(){
                        var gid = $(this).attr("id");
                         $(".group_"+gid).slideToggle(300);
                    });
                 
            }
        }
    } );
} );



</script>