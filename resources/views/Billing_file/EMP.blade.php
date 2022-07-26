@extends('header_footer.main')
@section('main-container')

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12">
                <!-- Card start -->
                <div class="card">
                    <div class="card-body mt-4">

                        <!-- Row start -->
                        <div class="row gutters">
                             @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <form method="POST" action="{{url('emp_user')}}">
                                @csrf
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter EmpID " name="empid">
                                    <div class="field-placeholder">EmpID </div>
                                </div>
                                <!-- Field wrapper end -->

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter Name" name="name">
                                    <div class="field-placeholder">Name</div>
                                </div>
                                <!-- Field wrapper end -->

                            </div>

                        </div>
                        <!-- Row end -->
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-left: 306px;">Submit</button>
                                </div>
                                <!-- Field wrapper end -->

                            </div>

                        </div>
                        </form>
                    </div>
                </div>
                <!-- Card end -->
                <div class="card" style="padding: 13px;">
                <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                                <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>EMP_id</th>
                                                    <th>Name</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($users as $emp)
												<tr>
													<td>{{$emp->id}}</td>
													<td>{{$emp->empid}}</td>
													<td>{{$emp->name}}</td>
												</tr>
                                                  
                                                @endforeach
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>




            </div>
        </div>
    </div>
</div>
@endsection@extends('header_footer.main')
@section('main-container')

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12">
                <!-- Card start -->
                <div class="card">
                    <div class="card-body mt-4">

                        <!-- Row start -->
                        <div class="row gutters">
                             @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <form method="POST" action="{{url('emp_user')}}">
                                @csrf
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter EmpID " name="empid">
                                    <div class="field-placeholder">EmpID </div>
                                </div>
                                <!-- Field wrapper end -->

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter Name" name="name">
                                    <div class="field-placeholder">Name</div>
                                </div>
                                <!-- Field wrapper end -->

                            </div>

                        </div>
                        <!-- Row end -->
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-left: 306px;">Submit</button>
                                </div>
                                <!-- Field wrapper end -->

                            </div>

                        </div>
                        </form>
                    </div>
                </div>
                <!-- Card end -->
                <div class="card" style="padding: 13px;">
                <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                                <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>EMP_id</th>
                                                    <th>Name</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($users as $emp)
												<tr>
													<td>{{$emp->id}}</td>
													<td>{{$emp->empid}}</td>
													<td>{{$emp->name}}</td>
												</tr>
                                                  
                                                @endforeach
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>




            </div>
        </div>
    </div>
</div>
@endsection