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
					<form method="POST" action="{{url('master_form')}}">
						@csrf
						<div class="card-body">

							<!-- Row start -->
							<div class="row gutters">

								<div class="container form-sty">
									<p><b>Basic Details</b></p>
								</div>

								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
											<?php
											$vk=count($master) + 1;

											$mini = sprintf('%05d', $vk);
											?>
								<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Sr.No " name="sr_no" value="{{$mini}}" readonly>
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
										<input type="text" class="form-control" placeholder="Enter Operator Type"
											name="operator_type">
										<div class="field-placeholder">Operator Type</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
									<input type="text" class="form-control" placeholder="Enter Branch/Locaiton"
											name="branch_location">
										<div class="field-placeholder">Branch/Locaiton</div>
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
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="status">
											<option value="uni">Select</option>
											<option value="">Select</option>
											<option value="">Select</option>
										</select>
										<div class="field-placeholder">Status</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputEmail"
											placeholder="Enter Plan Details" name="plan_details">
										<div class="field-placeholder">Plan Details</div>
									</div>
									<!-- Field wrapper end -->

								</div>



							</div>
							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Paymet Details</b></p>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Payment Unit"
											name="payment_units">
										<div class="field-placeholder">Payment Unit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputPwd"
											placeholder="Enter Payment Cycle" name="payment_cycle">
										<div class="field-placeholder">Payment Cycle</div>
									</div>


								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail"
											placeholder="Enter Monthly Rental Amount" name="monthly_rental_amount">
										<div class="field-placeholder">Monthly Rental Amount</div>
									</div>
									<!-- Field wrapper end -->
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter TDS %"
											name="tds">
										<div class="field-placeholder">TDS %</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter GST %"
											name="gst">
										<div class="field-placeholder">GST %</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Credit Limit"
											name="credit_limit">
										<div class="field-placeholder">Credit Limit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>		
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Security Deposit"
											name="security_deposit">
										<div class="field-placeholder">Security Deposit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Payment Mode"
											name="payment_mode">
										<div class="field-placeholder">Payment Mode</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								
							</div>
							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Billing Cycle Details</b></p>
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
										<div class="field-placeholder">Grace Days fro Due Date</div>
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
							</div>
							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Other Details</b></p>
								</div>


								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="email" class="form-control" id="inputEmail"
											placeholder="Enter your Email" name="relationship_no">
										<div class="field-placeholder">Relationship number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="number" class="form-control" id="inputPwd"
											placeholder="Enter Mobile No" name="mobile_no">
										<div class="field-placeholder">Registered Mobile</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder=" Enter Security Deposit"
											name="dsl_id">
										<div class="field-placeholder">DSL ID</div>
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
										<div class="field-placeholder">Biller GST No.</div>
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
									<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Bill Open Password" name="bill_open_password">
										<div class="field-placeholder">Bill Open Password</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Registered ID" name="registered_id">
										<div class="field-placeholder">Registered ID</div>
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