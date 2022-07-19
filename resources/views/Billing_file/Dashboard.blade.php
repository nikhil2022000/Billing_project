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
					<form method="POST" action="{{url('master_form'),('mini_int')}}">
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
										<input type="text" class="form-control" placeholder="Sr.No " name="sr_no[]"
											value="{{$mini}}" readonly>
										<div class="field-placeholder">Sr.No (Unique ID)</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="number" class="form-control" id="inputEmail"
											placeholder="Enter your Number" name="number[]" required>
										<div class="field-placeholder">Number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="assigned_to[]" required>
											<option value="uni">Select</option>
											<option value="sahil">sahil</option>
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
											name="operator_type[]" required>
										<div class="field-placeholder">Operator Type</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Branch/Locaiton"
											name="branch_location[]" required>
										<div class="field-placeholder">Branch/Locaiton</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="operator[]" required>
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
										<select class="form-select" id="formSelect" name="status[]" required>
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
										<input type="text" class="form-control" id="inputEmail"
											placeholder="Enter Plan Details" name="plan_details[]" required>
										<div class="field-placeholder">Plan Details</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<a class="btn btn-primary" href="#" role="button" style="margin-left: 204px;"
											id='append_input'>+</a>
									</div>
									<!-- Field wrapper end -->

								</div>
							</div>
							<div id='append_div'>
							</div>

							<div class="row gutters">
								<div class="container form-sty">
									<p><b>Payment Details</b></p>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Payment Unit"
											name="payment_units[]" required>
										<div class="field-placeholder">Payment Unit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputPwd"
											placeholder="Enter Payment Cycle" name="payment_cycle[]" required>
										<div class="field-placeholder">Payment Cycle</div>
									</div>


								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail"
											placeholder="Enter Monthly Rental Amount" name="monthly_rental_amount[]"
											required>
										<div class="field-placeholder">Monthly Rental Amount</div>
									</div>
									<!-- Field wrapper end -->
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter TDS %" name="tds[]"
											required>
										<div class="field-placeholder">TDS %</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter GST %" name="gst[]"
											required>
										<div class="field-placeholder">GST %</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Credit Limit"
											name="credit_limit[]" required>
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
											name="security_deposit[]" required>
										<div class="field-placeholder">Security Deposit</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder="Enter Payment Mode"
											name="payment_mode[]" required>
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
											name="bill_date[]" required>
										<div class="field-placeholder">Bill Date</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputPwd"
											placeholder="Enter Billing Cycle to" name="billing_cycle_to[]" required>
										<div class="field-placeholder">Billing Cycle to</div>
									</div>


									</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail"
											placeholder="Enter Billing Cycle from" name="billing_cycle_from[]" required>
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
											name="grace_days[]" required>
										<div class="field-placeholder">Grace Days fro Due Date</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="date" class="form-control" id="inputEmail" name="due_date[]"
											required>
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
											placeholder="Enter your Email" name="relationship_no[]" required>
										<div class="field-placeholder">Relationship number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="number" class="form-control" id="inputPwd"
											placeholder="Enter Mobile No" name="mobile_no[]" required>
										<div class="field-placeholder">Registered Mobile</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" placeholder=" Enter Security Deposit"
											name="dsl_id[]" required>
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
											name="custmoer_gst_no[]" required>
										<div class="field-placeholder">Customer GST No</div>
									</div>
									<!-- Field wrapper end -->
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputEmail"
											placeholder="Enter Biller GST Number" name="biller_gst_number[]" required>
										<div class="field-placeholder">Biller GST No.</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<select class="form-select" id="formSelect" name="state[]" required>
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
											placeholder="Enter Bill Open Password" name="bill_open_password[]" required>
										<div class="field-placeholder">Bill Open Password</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Registered ID" name="registered_id[]" required>
										<div class="field-placeholder">Registered ID</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

									<!-- Field wrapper start -->
									<div class="field-wrapper">
										<input type="text" class="form-control" id="inputPwd"
											placeholder="Enter Get Bill Details ?" name="get_billing_details_from[]"
											required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$(document).on('click', '#append_input', function () {
			$(this).hide();
			// alert('ff');
			$.ajax({
				type: "GET",
				url: "/append_data",
				success: function (response) {
					// alert(response['data']);
					$('#append_div').append(response['data']);

				}

			});
		});
		
		$(document).on('click','#append_hide',function(){
			let row_item = $(this).parent().parent().parent().parent().parent().parent();
			$(row_item).remove();
			$('#append_input').show();
		});
	});
</script>
@endsection