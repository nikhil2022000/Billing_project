@extends('header_footer.main')
@section('main-container')

<style>
    .form-sty {
        background: antiquewhite;
        margin-top: 5px;
        margin-bottom: 7px;
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($show as $data)
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->plan_details}}</td>
                                                    <?php foreach($users as $emp){
                                                            //dd($emp);
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
    <!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection