<style>
    table td{
        color: #000 !important;
    }
    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px;
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
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    #all_activity_filter_table_wrapper {
        margin-top: 0;
    }
    #all_activity_filter_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #all_activity_filter_table th{
        text-wrap:nowrap !important;
    }
    .table th {
        font-weight: 400;
    }
    #default_issue_table th{
        text-wrap:nowrap;
    }
    .table th {
        font-weight: 500;
    }
</style>

<div class="row">
    <div class="col-md-12" >
        <div class="panel panel-flat">
            <table class="table table-striped" id="all_activity_filter_table">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Type</th>
                        <th>Company Name</th>
                        <th>Contact Person</th>
                        <th>Contact Number</th>
                        <th>Alternate Number</th>
                        <th>Landline Number</th>
                        <th>Email</th>
                        <th>Alternate Email</th>
                        <th>Country </th>
                        <th>State </th>
                        <th>City </th>
                        <th>Address</th>
                        <th>Google Address</th>
                        <th>Pincode</th>
                        <th>GST No.</th>
                        <th>Pan No.</th>
                        <th>Tan No.</th>
                        <th>Date of Birth</th>
                        <th>Company Anniversary</th>
                        <th>Marriage Anniversary</th>
                        <th>Type</th>
                        <th>Group</th>
                        <th>Location</th>
                        <th>Credit Term </th>
                        <th>Account Manager </th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    foreach ($SegmentWiseContact as $row) {
                        if ($row->cust_type == 'primary') {
                            $cust_type = '<button style="background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;cursor:auto;" >Primary</button>';
                        } else {
                            $cust_type = '<button style="background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;cursor:auto;" >Secondary</button>';
                        }

                        if ($row->dob == '') {
                            $dob = '';
                        } else {
                            $dob = date('d F Y', strtotime($row->dob));
                        }

                        if ($row->company_anniversary == '') {
                            $CompanyAnniversary = '';
                        } else {
                            $CompanyAnniversary = date('d F Y', strtotime($row->company_anniversary));
                        }

                        if ($row->marriage_anniversary == '') {
                            $MarriageAnniversary = '';
                        } else {
                            $MarriageAnniversary = date('d F Y', strtotime($row->marriage_anniversary));
                        }

                    ?>
                        <tr>
                            <td><?= $count;?></td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                <?= $cust_type; ?>
                                </div>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <div class="text-wrap-col" style="width:200px;"><a href="#" style="font-weight:600;color:#000;cursor: auto;"><?= ucwords($row->company_name); ?></a></div>
                                        <div class="text-muted font-size-sm">
                                            Created On : <?= date("d M Y", strtotime($row->created_date)) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                <?= $row->contact_person_name1; ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                <?= $row->phone_no; ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                <?= $row->alternate_number; ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                <?= $row->landline_number; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                <?= $row->email; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                <?= $row->alternate_email; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                <?= $row->c_name; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->s_name; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                <?= $row->city; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;"><?= $row->address; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;"><?= $row->address2; ?></div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= $row->pincode; ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= $gstin; ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= $pan_no; ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= $tan_no; ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;"><?= $dob; ?></div>
                            </td>
                            <td>
                                <div style="width:150px;"><?= $CompanyAnniversary; ?></div>
                            </td>
                            <td>
                                <div style="width:150px;"><?= $MarriageAnniversary; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->title; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->group_name; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->location; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->credit_name; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->a_name; ?></div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;"><?= $row->notes; ?></div>
                            </td>
                        </tr>

                    <?php $count++;   }   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>