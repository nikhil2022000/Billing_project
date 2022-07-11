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
                            <form method="POST" action="{{url('pay_units')}}">
                                @csrf
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter Unit Name "
                                        name="unit_name">
                                    <div class="field-placeholder">Unit Name </div>
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
                                        style="margin-left: 323px;">Submit</button>
                                </div>
                                <!-- Field wrapper end -->

                            </div>

                        </div>
</form>
                    </div>
                </div>
                <!-- Card end -->





            </div>
        </div>
    </div>
</div>
@endsection


