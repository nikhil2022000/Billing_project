@extends('header_footer.main')
@section('main-container')

<style> .ff{
       position: absolute;
    left: 292px;
    height: 31px;
    text-align: center;
    background-color: white;
    color: black;
    padding: 6px;
    width: 64px;
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
               
                    <!-- Card start -->
                    <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table id="copy-print-csv" class="table custom-table">
                                        <div> <a href="/master_Export" class="btn btn-primary ff">Export</a></div>
                                                <thead>
                                                
                                                    <tr>
                                                        <th>Billable Id</th>
                                                        <th>Number</th>
                                                        <th>Assigned_to</th>
                                                        <th>Relationship No</th>                                          
                                                        <th>Plan Details</th>
                                                        <th>Details</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dat as $data)
                                                 <?php   //dd($data);?>
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->number}}</td>
                                                    <?php
                                                    foreach($user as $users){
                                                       // dd($users);
                                                 if($users->id == $data->assigned_to){
                                                    
                                                    ?>
                                                   <td>{{$users->name}}</td>
                                                    <?php
                                                 }
                                                }
                                                ?>
                                                <?php
                                                    foreach($relation as $relat){
                                                       // dd($users);
                                                 if($relat->id == $data->relationship_no){
                                                    
                                                    ?>
                                                  <td>{{$relat->number}}</td>
                                                    <?php
                                                 }
                                                }
                                                ?>
                                                    
                                                    <td>{{$data->plan_details}}</td>
                                                    <td><button type="button" class="btn btn-primary edtbrnch" style="width: 59px; padding: 0px;" value="{{$data->id}}" >Details</button></td>
                                                    <td><button type="button" class="btn btn-primary edtings" style="width: 59px; padding: 0px;" value="{{$data->id}}" >Edit</button></td>
                                                    
                                                    </tr>
                                                  
                                                 @endforeach
                                                </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card end -->
                                		<!--Edit Modal -->
			
                        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLargeTitle" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title mo" id="exampleModalLargeTitle"></h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						                </div>
						<div class="modal-body">
							<div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Sr.No:</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="1"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Number</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="2"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Assigned_to</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="3"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Operator Type</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="4"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Status</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="5"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Payment Units</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="6"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Payment Cycle</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="7"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Monthly Rental Amount</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="8"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>TDS</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="9"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>GST</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="10"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Payment Mode</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="11"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Plan Details</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="12"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Operator</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="13"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Bill Date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="14"></lable>
                                </div>
                                
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Billing Cycle From</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="15"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Billing Cycle To</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="16"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Grace_days</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="17"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Due_date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="18"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Bill Open Password</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="19"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Relationship_no</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="20"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Mobile_no</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="21"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Dsl_id</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="22"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                                    <div class="col-sm-3">
                                        <lable><b>Security_deposit</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="23"></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>Registered_id</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="24"></lable>
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                                    <div class="col-sm-3">
                                        <lable><b>custmoer_gst_no</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="25"></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>biller_gst_number</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="26"></lable>
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                                    <div class="col-sm-3">
                                        <lable><b>state</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="27"></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>branch_location</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="28"></lable>
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                                    <div class="col-sm-3">
                                        <lable><b>credit_limit</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="29"></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>get_billing_details_from ?</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                        <lable id="30"></lable>
                                    </div>
                               
							</div>
						</div>
						<div class="modal-footer d-flex">
							<div> 
								<a  href="javascript:void(0);" class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#presentmodal" data-bs-dismiss="modal"><i class="feather feather-arrow-left me-1"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Edit Modal  -->
            	<!--Edit Modal 2-->
			
                <div class="modal fade" id="editmodaltwo" tabindex="-1" aria-labelledby="exampleModalLargeTitle" aria-hidden="true">
                <form action="{{url('editting')}}" method="post">
                    @csrf
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title nnn" id="exampleModalLargeTitle"></h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						                </div>
						<div class="modal-body">
                           
							<div class="row" style="padding: 5px; background: #eff4f4;">
                            <input type="number" name="id" id="id" style="display:none;">
								<div class="col-sm-3">
                                    <lable><b>Sr.No:</b></lable>
                                </div>
                                <div class="col-sm-3">
                                   <input type="number" name="sr_no" id="a" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Number</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="number" name="number" id="b" >
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Assigned_to</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss c" id="formSelect" name="assigned_to" >
											<option value="">Select</option>
											@foreach($user as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
											@endforeach
											
										</select>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Operator Type</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss d" id="formSelect" name="operator_type" >
											<option value="">Select</option>
											<option value="Postpaid">Postpaid</option>
											<option value="prepaid">prepaid</option>
										</select>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Status</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss e" id="formSelect" name="status" >
											<option value="">Select</option>
											<option value="Active">Active</option>
											<option value="Hold">Hold</option>
											<option value="suspended">suspended</option>
											<option value="surrendered">surrendered</option>
										</select>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Payment Units</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss f" id="formSelect" name="payment_units" >
											<option value="">Select</option>
											@foreach($payment as $pay)
											<option value="{{$pay->id}}">{{$pay->unit_name}}</option>
											@endforeach
										</select>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Payment Cycle</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss g" id="formSelect" name="payment_cycle" >
											<option value="">Select</option>
											<option value="Monthly">Monthly</option>
											<option value="2month">2month</option>
											<option value="Quarterly">Quarterly</option>
											<option value="Annual">Annual</option>
										</select>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Monthly Rental Amount</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="monthly_rental_amount" id="h" >
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>TDS</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="tds" id="i" >
                                </div>
								<div class="col-sm-3">
                                    <lable><b>GST</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="gst" id="j" >
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Payment Mode</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="payment_mode" id="k" >
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Plan Details</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="plan_details" id="l" >
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Operator</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss m" id="formSelect" name="operator" >
											<option >Select</option>
											@foreach($opt as $opts)
											<option value="{{$opts->id}}">{{$opts->operator}}</option>
											@endforeach
										</select>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Bill Date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="bill_date" id="n" >
                                </div>
                                
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Billing Cycle From</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="billing_cycle_from" id="o" >
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Billing Cycle To</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="billing_cycle_to" id="p" >
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Grace_days</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="grace_days" id="q" >
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Due_date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="due_date" id="r" >
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Bill Open Password</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="bill_open_password" id="s" >
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Relationship_no</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss t" id="formSelect" name="relationship_no" >
											<option >Select</option>
											@foreach($relation as $relation)
											<option value="{{$relation->id}}">{{$relation->number}}</option>
											@endforeach
										</select>
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Mobile_no</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="mobile_no" id="u" >
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Dsl_id</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="dsl_id" id="v" >
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                                    <div class="col-sm-3">
                                        <lable><b>Security_deposit</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="security_deposit" id="w" >
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>Registered_id</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="registered_id" id="x" >
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                                    <div class="col-sm-3">
                                        <lable><b>custmoer_gst_no</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="custmoer_gst_no" id="y" >
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>biller_gst_number</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="biller_gst_number" id="z" >
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                                    <div class="col-sm-3">
                                        <lable><b>state</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="state" id="aa" >
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>branch_location</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="ss bb" id="formSelect" name="branch_location" >
											<option value="">Select</option>
											@foreach($branch as $bran)
											<option value="{{$bran->id}}">{{$bran->branch_name}}</option>
											@endforeach
										</select>
                                    </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                                    <div class="col-sm-3">
                                        <lable><b>credit_limit</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="credit_limit" id="cc" >
                                    </div>
                                    <div class="col-sm-3">
                                        <lable><b>get_billing_details_from ?</b></lable>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="get_billing_details_from" id="ee" >
                                    </div>
                               
							</div>
						</div>
						<div class="modal-footer d-flex">
							<div> 
								<a  href="javascript:void(0);" class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#presentmodal" data-bs-dismiss="modal"><i class="feather feather-arrow-left me-1"></i>Back</a>
							</div>
                            <div> 
                            <button type="submit" class="btn btn-primary btstyle" style="width: 59px; padding: 0px;">submit</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			<!-- End Edit Modal  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
        $(document).ready(function () {
            $(document).on('click','.edtbrnch',function(){
                var b_id = $(this).val();
            // alert(b_id);
               $('#editmodal').modal('show');

                 $.ajax({
                        type: "GET",
                        url: "/popup/"+b_id,
                        success: function(response){
            //    alert(response['user']);
            var id = [];
            var opt=[];
            var pay=[];
            var loca=[];
            var relatio=[];
            
               $.each(response['data'], function () {
						var key = Object.keys(this);
						var value = this;
                    //    alert(value.number);
                       $('#1').html(value.sr_no);
                       $('#2').html(value.number);
                       $('.mo').html(value.number);
                       id.push(value.assigned_to); 
                    //    $('#3').html(value.assigned_to);
                       $('#4').html(value.operator_type);
                       $('#5').html(value.status);
                    //    $('#6').html(value.payment_units);
                       pay.push(value.payment_units); 
                       $('#7').html(value.payment_cycle);
                       $('#8').html(value.monthly_rental_amount);
                       $('#9').html(value.tds);
                       $('#10').html(value.gst);
                       $('#11').html(value.payment_mode);
                       $('#12').html(value.plan_details);
                       opt.push(value.operator); 
                    //    $('#13').html(value.operator);
                       $('#14').html(value.bill_date);
                       $('#15').html(value.billing_cycle_from);
                       $('#16').html(value.billing_cycle_to);
                       $('#17').html(value.grace_days);
                       $('#18').html(value.due_date);
                       $('#19').html(value.bill_open_password);
                    //    $('#20').html(value.relationship_no);
                       relatio.push(value.relationship_no); 

                       $('#21').html(value.mobile_no);
                       $('#22').html(value.dsl_id);
                       $('#23').html(value.security_deposit);
                       $('#24').html(value.registered_id);
                       $('#25').html(value.custmoer_gst_no);
                       $('#26').html(value.biller_gst_number);
                       loca.push(value.branch_location); 
                      $('#27').html(value.state);
                    //    $('#28').html(value.branch_location);
                       $('#29').html(value.credit_limit);
                       $('#30').html(value.get_billing_details_from);  
               });    
               
               $.each(response['user'], function () {
						var key = Object.keys(this);
						var data = this;
                        // alert(id);
                       if(id == data.id){
                        $('#3').html(data.name);
                       }
            });    
            $.each(response['opreter'], function () {
						var key = Object.keys(this);
						var da = this;
                        // alert(id);
                       if(opt == da.id){
                        $('#13').html(da.operator);
                       }
            });    
            $.each(response['branch'], function () {
						var key = Object.keys(this);
						var branch = this;
                        // alert(id);
                       if(loca == branch.id) {
                        $('#28').html(branch.branch_name);
                       }
            });  
            $.each(response['relation'], function () {
						var key = Object.keys(this);
						var relat = this;
                        // alert(id);
                       if(relatio == relat.id){
                        // $('#bb').val(branch.branch_name);
                        $('#20').html(relat.number);
                       }
            });    
            $.each(response['payment_unit'], function () {
						var key = Object.keys(this);
						var payment = this;
                        // alert(pay);
                       if(pay == payment.id ){
                        $('#6').html(payment.unit_name);
                        
                       }
            });    
  
            
                        
                        }
            
                });
            });
            $(document).on('click','.edtings',function(){
                var b_id = $(this).val();
            // alert(b_id);
             $('#editmodaltwo').modal('show');
             $.ajax({
                    url: "/edit_popup/"+b_id,
                    type: "POST",
                    headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                    success: function (response) {
                        var id = [];
                        var opt=[];
                        var unit=[];
                        var loca=[];
                        var relatio=[];
                        $.each(response['dataedit'], function () {
						var key = Object.keys(this);
						var dataedit = this;
                        // alert(value.sr_no);
                        $('#id').val(dataedit.id);
                        $('#a').val(dataedit.sr_no);
                        $('#b').val(dataedit.number);
                       $('.nnn').html(dataedit.number);
                       id.push(dataedit.assigned_to); 
                    //    $('#c').val(dataedit.assigned_to);
                       
                    //    $('#d').val(dataedit.operator_type);
                       $('.d').find('option:nth-child(1)').attr('value',dataedit.operator_type);
                        $('.d').find('option:nth-child(1)').html(dataedit.operator_type);
                    //    $('#e').val(dataedit.status);
                       $('.e').find('option:nth-child(1)').attr('value',dataedit.status);
                        $('.e').find('option:nth-child(1)').html(dataedit.status);
                       $('#f').val(dataedit.payment_units);
                       unit.push(dataedit.payment_units); 
                        $('.g').find('option:nth-child(1)').attr('value',dataedit.payment_cycle);
                        $('.g').find('option:nth-child(1)').html(dataedit.payment_cycle);
                    //    $('#g').val(dataedit.payment_cycle);
                       $('#h').val(dataedit.monthly_rental_amount);
                       $('#i').val(dataedit.tds);
                       $('#j').val(dataedit.gst);
                       $('#k').val(dataedit.payment_mode);
                       $('#l').val(dataedit.plan_details);
                       opt.push(dataedit.operator);  
                    //    $('#m').val(dataedit.operator);
                       $('#n').val(dataedit.bill_date);
                       $('#o').val(dataedit.billing_cycle_from);
                       $('#p').val(dataedit.billing_cycle_to);
                       $('#q').val(dataedit.grace_days);
                       $('#r').val(dataedit.due_date);
                       $('#s').val(dataedit.bill_open_password);
                    //    $('#t').val(dataedit.relationship_no);
                       relatio.push(dataedit.relationship_no); 
                       $('#u').val(dataedit.mobile_no);
                       $('#v').val(dataedit.dsl_id);
                       $('#w').val(dataedit.security_deposit);
                       $('#x').val(dataedit.registered_id);
                       $('#y').val(dataedit.custmoer_gst_no);
                       $('#z').val(dataedit.biller_gst_number);
                      $('#aa').val(dataedit.state);
                      loca.push(dataedit.branch_location); 
                    //    $('#bb').val(dataedit.branch_location);
                       $('#cc').val(dataedit.credit_limit);
                       $('#ee').val(dataedit.get_billing_details_from);  
                       

                 });
                 $.each(response['user'], function () {
						var key = Object.keys(this);
						var data = this;
                        // alert(id);
                       if(id.indexOf(data.id) != -1){
                        // $('.c').val(data.name);
                        $('.c').find('option:nth-child(1)').attr('value',data.id);
                        $('.c').find('option:nth-child(1)').html(data.name);


                       }
            });    
            $.each(response['opreter'], function () {
						var key = Object.keys(this);
						var da = this;
                        // alert(id);
                       if(opt.indexOf(da.id) != -1){
                        // $('#m').val(da.operator);
                        $('.m').find('option:nth-child(1)').attr('value',da.id);
                        $('.m').find('option:nth-child(1)').html(da.operator);
                        
                       }
            });    
            $.each(response['branch'], function () {
						var key = Object.keys(this);
						var branch = this;
                        // alert(id);
                       if(loca.indexOf(branch.id) != -1){
                        // $('#bb').val(branch.branch_name);
                        $('.bb').find('option:nth-child(1)').attr('value',branch.id);
                        $('.bb').find('option:nth-child(1)').html(branch.branch_name);
                       }
            });    
            $.each(response['relation'], function () {
						var key = Object.keys(this);
						var relat = this;
                        // alert(id);
                       if(relatio.indexOf(relat.id) != -1){
                        // $('#bb').val(branch.branch_name);
                        $('.t').find('option:nth-child(1)').attr('value',relat.id);
                        $('.t').find('option:nth-child(1)').html(relat.number);
                       }
            });    
            $.each(response['payment_unit'], function () {
						var key = Object.keys(this);
						var payment_unit = this;
                        // alert(id);
                       if(unit.indexOf(payment_unit.id) != -1){
                        // $('#bb').val(branch.branch_name);
                        $('.f').find('option:nth-child(1)').attr('value',payment_unit.id);
                        $('.f').find('option:nth-child(1)').html(payment_unit.unit_name);
                       }
            });    

                    }
                 });
             });
         });

</script>

                
            </div>
        </div>
    </div>
</div>
@endsection