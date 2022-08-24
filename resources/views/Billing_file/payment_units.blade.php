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
                                        <select class="form-select" id="formSelect" name="unit_name" required>
											<option value="">Select</option>
											<option value="SD-1">SD-1</option>
											<option value="FAPL">FAPL</option>
											<option value="SD-3">SD-3</option>
											<option value="MA-2">MA-2</option>
											<option value="Eternity">Eternity</option>
											<option value="MA-4">MA-4</option>
											<option value="FCC">FCC</option>
											<option value="FCC Agchem">FCC Agchem</option>
											<option value="FPCL">FPCL</option>
											<option value="FPCL">Ventures</option>
										</select>
                                    <div class="field-placeholder">Unit Name </div>
                                </div>
                                <!-- Field wrapper end -->

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-left: 100px;">Submit</button>
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
                                                    <th>Unit_name</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($payment as $payment)
												<tr>
													<td>{{$payment->id}}</td>
													<td>{{$payment->unit_name}}</td>
												
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


