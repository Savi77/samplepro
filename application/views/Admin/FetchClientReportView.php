  <style>
     table td{
    color: #000 !important;
   }
   /* table td:nth-child(1) a div:hover{
    color: #605959 !important;
   } */
   
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        width: 150px !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
   
    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    /* #example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3),#example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1){
        display: none;
    } */
    #example1 th:first-child{
        width:100px;
    }
    #example1 th{
        text-wrap: nowrap;
    }
  </style>
  <table id="example2" class="table table-striped" >
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Company Name</th>
        <th>Location</th>
        <th>From</th>
        <th>To</th>
        <th>Interval</th>
      </tr>
    </thead>
    <tbody>
         <?php
              $i=1;
              foreach ($ClientReport as $res)  { ?>
              <tr class="gradeA">
                    <td>
                      <div>
                      <?=  $i; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;" class="text-wrap-col">
                      <?=  $res['company_name']; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;" class="text-wrap-col">
                      <?=   $res['address']; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?=  $res['from']; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?=   $res['to']; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?=   $res['interval']; ?>
                      </div>
                    </td>
              </tr>
        <?php $i++; } ?>
    </tbody>
  </table>
