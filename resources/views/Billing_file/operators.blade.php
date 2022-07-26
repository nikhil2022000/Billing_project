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
											<div class="container form-sty">
													<p><b></b></p>
												</div>
											<form method="POST" action="{{url('oprate')	}}">
                               					 @csrf
												<!-- Field wrapper start -->
												<div class="field-wrapper">
															<select class="form-select" id="formSelect" name="operator" required>
															<option value="">Select</option>
															<option value="AIRTEL">AIRTEL</option>
															<option value="JIO">JIO</option>
															<option value="TATA">TATA</option>
															<option value="CONNECT">CONNECT</option>
															<option value="Vodafone">Vodafone</option>
															<option value="BSNL">BSNL</option>
															<option value="Katria_Net_Solutions">Katria Net Solutions</option>
															<option value="Five_Net">Five Net</option>
															<option value="Hotline">Hotline</option>
															<option value="Netway_Internet">Netway Internet</option>
															<option value="Hisar_Net">Hisar Net</option>
															<option value="Decibel">Decibel</option>
															<option value="I_Sparrow">I Sparrow</option>
															<option value="Fastnet_Internet">Fastnet Internet</option>
															<option value="CITY_BROADBAND">CITY BROADBAND</option>
															<option value="Skyrocket_Internet">Skyrocket Internet</option>
														</select>
													<div class="field-placeholder">Operator </div>
												</div>
												<!-- Field wrapper end -->

											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												
												<!-- Field wrapper start -->
												<div class="field-wrapper">
												
													<select class="form-select" id="formSelect" name="billing_cat">
													@foreach($dat as $data)
														
														<option value="{{$data->id}}">{{$data->category_name}}</option>
														@endforeach
													</select>
													
													<div class="field-placeholder">Billing Cat</div>
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
                                                <button type="submit" class="btn btn-primary" style="margin-left: 323px;">Submit</button>
												</div>
												<!-- Field wrapper end -->

											</div>
											
										</div>
</form>
									</div>
								</div>
								<!-- Card end -->
				<div class="card" style="padding: 13px;">
                    <!-- Card end -->
                    <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                                <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Plan Details</th>
                                                    <th>Assigned_to</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($oprates as $oprat)
												<tr>
													<td>{{$oprat->id}}</td>
													<td>{{$oprat->operator}}</td>
													<td>{{$oprat->billing_cat}}</td>
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