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

                <div class="card">
                    
                    <form method="POST" action="{{url('mini_insert')}}">
                        @csrf
                        <div class="card-body">

                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="container form-sty">
                                    <p><b>Add Number to Exisiting Billable ID</b></p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="sr_no">
                                    <option value=" ">select</option>
                                        @foreach($id as $srno)
											<option value="{{$srno->sr_no}}">{{$srno->sr_no}}</option>
											@endforeach
                                        </select>
                                        <div class="field-placeholder">Sr.No (Unique ID)</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="status">
                                            <option value="">Select</option>
                                            <option value="Active">Active</option>
                                            <option value="Hold">Hold</option>
                                            <option value="suspended">suspended</option>
                                            <option value="surrendered">surrendered</option>
                                        </select>
                                        <div class="field-placeholder">Status</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                    </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="assigned_to" required>
											<option value="">Select</option>
											@foreach($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
											@endforeach
										</select>
                                        <div class="field-placeholder">Assigned to</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                        <input type="number" class="form-control" placeholder=" Enter Number " name="number">
                                        <div class="field-placeholder">Number</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter Plan Details " name="plan_details">
                                        <div class="field-placeholder">Plan Details</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                        <select class="form-select" id="formSelect" name="branch_location">
                                            <option value="">Select</option>
                                            @foreach($branch as $bran)
											<option value="{{$bran->id}}">{{$bran->branch_name}}</option>
											@endforeach
                                        </select>
                                        <div class="field-placeholder">Branch/Location</div>
                                    </div>
                                    <!-- Field wrapper end -->s
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper end -->

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 170px;">Submit</button>
                                    </div>
                                    <!-- Field wrapper end -->

                                </div>
                               
                            </div>

                        </div>

                    </form>
                </div>
               
                <!-- Place your content here -->
            </div>
        </div>
        <!-- Card end -->
        <div class="row gutters">
            <div class="col-xl-12">
                <!-- Card start -->

                <div class="card">
                    
                    <form method="POST" action="{{url('mini_insert')}}">
                        @csrf
                        <div class="card-body">

                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <!-- Field wrapper end -->
                                    <div class="field-wrapper">
                                    <input type="file" class="form-control"  name="file">
                                        <div class="field-placeholder">Import Number Details</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 170px;">Submit</button>
                                    </div>
                                    <!-- Field wrapper end -->

                                </div>
                               
                            </div>

                        </div>

                    </form>
                </div>
               
                <!-- Place your content here -->
            </div>
        </div>


    </div>
    <!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection