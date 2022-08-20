@extends('header_footer.main')
@section('main-container')

<style>
    .form-sty {
        background: antiquewhite;
        margin-top: 5px;
        margin-bottom: 7px;
    }
.btstyle{
    width: 82px;
    padding: 0px;
    height: 43px;
}
.ss{
    width: 157px;
    padding: 2px;
}

</style>


<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12">
                <!-- Card start -->

              
                <div class="card" style="padding: 13px;">
                    <!-- Card end -->
                    <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                               
                                                <thead>
                                                <tr>
                                                
                                                    <th>Parent_ID</th>
                                                    <th>Plan Details</th>
                                                    <th>Assigned_to</th>
                                                    <th>Number</th>
                                                    <th>Branch</th>
                                                    <th>Status</th>
                                                    <th>operator_type</th>
                                                    <th>payment_units</th>
                                                    <th>payment_cycle</th>
                                                    <th>monthly_rental_amount</th>
                                                    <th>tds</th>
                                                    <th>gst</th>
                                                    <th>payment_mode</th>
                                                    <th>operator</th>
                                                    <th>bill_date</th>
                                                    <th>billing_cycle_from</th>
                                                    <th>billing_cycle_to</th>
                                                    <th>grace_days</th>
                                                    <th>due_date</th>
                                                    <th>bill_open_password</th>
                                                    <th>relationship_no</th>
                                                    <th>mobile_no</th>
                                                    <th>dsl_id</th>
                                                    <th>security_deposit</th>
                                                    <th>registered_id</th>
                                                    <th>custmoer_gst_no</th>
                                                    <th>biller_gst_number</th>
                                                    <th>credit_limit</th>
                                                    <th>get_billing_details_from</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($show as $data)
                                                  <!-- <?php //($data); ?> -->
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->plan_details}}</td>
                                                    <?php foreach($user as $emp){
                                                            // dd($emp);
                                                             if($emp->id == $data->assigned_to){
                                                ?>
                                                    <td>{{$emp->name}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                    <td>{{$data->number}}</td>
                                                    <?php foreach($branch as $branh){
                                                           // dd($branh);
                                                             if($branh->id == $data->branch_location){
                                                ?>
                                                    <td>{{$branh->branch_name}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                    <td>{{$data->status}}</td>
                                                    <?php foreach($master_details as $master){
                                                       // dd($master);
                                                        if($master->sr_no == $data->sr_no){
                                                        ?>
                                                        <td>{{$master->operator_type}}</td>
                                                        <?php foreach($pay as $payment){
                                                            // dd($opt);
                                                             if($payment->id == $master->payment_units){
                                                ?>
                                                    <td>{{$payment->unit_name}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                        <td>{{$master->payment_cycle}}</td>
                                                        <td>{{$master->monthly_rental_amount}}</td>
                                                        <td>{{$master->tds}}</td>
                                                        <td>{{$master->gst}}</td>
                                                        <td>{{$master->payment_mode}}</td>
                                                        <?php foreach($opt as $operat){
                                                            // dd($opt);
                                                             if($operat->id == $master->operator){
                                                ?>
                                                    <td>{{$operat->operator}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                        <td>{{$master->bill_date}}</td>
                                                        <td>{{$master->billing_cycle_from}}</td>
                                                        <td>{{$master->billing_cycle_to}}</td>
                                                        <td>{{$master->grace_days}}</td>
                                                        <td>{{$master->due_date}}</td>
                                                        <td>{{$master->bill_open_password}}</td>
                                                        <?php foreach($rel as $reltion){
                                                            // dd($opt);
                                                             if($reltion->id == $master->relationship_no){
                                                ?>
                                                    <td>{{$reltion->number}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                        <td>{{$master->mobile_no}}</td>
                                                        <td>{{$master->dsl_id}}</td>
                                                        <td>{{$master->security_deposit}}</td>
                                                        <td>{{$master->registered_id}}</td>
                                                        <td>{{$master->custmoer_gst_no}}</td>
                                                        <td>{{$master->biller_gst_number}}</td>
                                                        <td>{{$master->credit_limit}}</td>
                                                        <td>{{$master->get_billing_details_from}}</td>
                                                        <?php 
                                                    }
                                                 }
                                                            ?>
                                                
                                                    
                                                    </tr>
                                                  
                                                @endforeach
                                                </tbody>
                                        </table>
                                        </div>
                </div>
                <!-- Place your content here -->
            </div>
        </div>
        <!-- Card end -->
</div>
<!-- Content wrapper end -->
@endsection