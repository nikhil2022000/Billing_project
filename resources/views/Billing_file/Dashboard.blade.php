@extends('header_footer.main')
@section('main-container')
<?php 
echo'<pre>'; print_r($relation); die;
?>
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
				<form method="POST" action="{{url('master_form')}}">
                                @csrf
						<div class="card-body">

							<!-- Row start -->
							<div class="row gutters">
							
								<div class="container form-sty">
									<p><b>Basic Details</b></p>
								</div>

								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Sr.No " name="sr_no">
										<div class="field-placeholder">Sr.No (Unique ID)</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="number" class="form-control" id="inputEmail"
											placeholder="Enter your Number" name="number">
										<div class="field-placeholder">Number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="assigned_to">
											<option value="uni">Select</option>
											<option value="">Select</option>
											<option value="">Select</option>
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
										<input type="text" class="form-control" placeholder="Enter Service Type"
											name="service_type">
										<div class="field-placeholder">Service Type</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="relationship_no">
											<option value="uni">Select</option>
											@foreach($relation as $rel)
											<option value="{{$rel->id}}">{{$rel->number}}</option>
											@endforeach
										</select>
										<div class="field-placeholder">Relationship No</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="payment_units">
											<option value="uni">Select</option>
											@foreach($payment as $units)
											<option value="{{$units->id}}">{{$units->unit_name}}</option>
											@endforeach
										</select>
										<div class="field-placeholder">Payment Units</div>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="payment_mode">
											<option value="uni">Select</option>
											<option value="">Select</option>
											<option value="">Select</option>
										</select>
										<div class="field-placeholder">Payment Mode</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputEmail"
											placeholder="EnterPlan Details" name="plan_details">
										<div class="field-placeholder">Plan Details</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="operator">
											<option value="">Select</option>
											@foreach($dat as $opt)
											<option value="{{$opt->id}}">{{$opt->operator}}</option>
											@endforeach
										</select>
										<div class="field-placeholder">Operator</div>
									</div>
									<!-- Field wrapper end -->

								</div>


							</div>

							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Billing Details</b></p>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" placeholder="Bill Date"
											name="bill_date">
										<div class="field-placeholder">Bill Date</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputPwd"
											placeholder="Enter Billing Cycle to" name="billing_cycle_to">
										<div class="field-placeholder">Billing Cycle to</div>
									</div>
									

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">								
										<!-- Field wrapper start -->
										<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail"
											placeholder="Enter Billing Cycle from" name="billing_cycle_from">
										<div class="field-placeholder">Billing Cycle from</div>
									</div>
									<!-- Field wrapper end -->
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Type Something"
											name="grace_days">
										<div class="field-placeholder">Grace Days</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail" name="due_date">
										<div class="field-placeholder">Due Date</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Billing Type" name="billing_type">
										<div class="field-placeholder">Billing Type</div>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>
							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Other Details</b></p>
								</div>


								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="email" class="form-control" id="inputEmail"
											placeholder="Enter your Email" name="email">
										<div class="field-placeholder">Registerd Email ID</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="number" class="form-control" id="inputPwd"
											placeholder="Enter Mobile No" name="mobile_no">
										<div class="field-placeholder">Registered Mobile No</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder=" Enter Security Deposit"
											name="security_deposit">
										<div class="field-placeholder">Security Deposit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Customer GST No"
											name="custmoer_gst_no">
										<div class="field-placeholder">Customer GST No</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputEmail"
											placeholder="Enter Biller GST Number" name="biller_gst_number">
										<div class="field-placeholder">Biller GST Number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
											<select class="form-select" id="formSelect" name="state">
											<option value="uni">Select</option>
											@foreach($branch as $bran)
											<option value="{{$bran->id}}">{{$bran->state}}</option>
											@endforeach
										</select>
										<div class="field-placeholder">State</div>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>
							<div class="row gutters">

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
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Montly Cr Limit" name="monthly_cr_limit">
										<div class="field-placeholder">Montly Cr Limit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Get Bill Details ?" name="get_billing_details_from">
										<div class="field-placeholder">Get Bill Details From ?</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
									<button type="submit" class="btn btn-primary">Submit</button>
									</div>
									<!-- Field wrapper end -->

								</div>
								
							</div>
						</div>
					</form>
					<!-- Card end -->
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