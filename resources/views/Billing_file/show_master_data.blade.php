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
               
                    <!-- Card start -->
                    <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                                <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Number</th>
                                                    <th>Assigned_to</th>
                                                    <th>Relationship No</th>
                                                  
                                                    <th>Plan Details</th>
                                                   
                                                    <th>Montly Cr Limit</th>
                                                    <th>Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dat as $data)
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->number}}</td>
                                                    <td>{{$data->assigned_to}}</td>
                                                   
                                                    <?php
                                                    foreach($relation as $rel){
                                                        //$da[]=$opreter;
                                                 if($data->relationship_no == $rel->id){
                                                    
                                                    ?>
                                                    <td>{{$rel->number}}</td>
                                                    <?php
                                                 }
                                                        }?>
                                                    <td>{{$data->plan_details}}</td>
                                                    <td>{{$data->monthly_cr_limit}}</td>
                                                    <td><button type="button" class="btn btn-primary edtbrnch" style="width: 59px; padding: 0px;" value="{{$data->id}}" >Details</button></td>
                                                    
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
                                    <lable><b>Service Type</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="24"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Relationship No</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="4"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Payment Units</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="5"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Payment Mode</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="6"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Plan Details</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="7"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Operator</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="8"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Bill Date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="9"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Billing Cycle to</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="10"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Billing Cycle from</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="11"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Grace Days</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="12"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Due Date</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="13"></lable>
                                </div>
                                
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Registerd Email ID</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="15"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Registered Mobile No</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="16"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Security Deposit</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="17"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Customer GST No</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="18"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Biller GST Number</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="19"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>State</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="20"></lable>
                                </div>
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
								<div class="col-sm-3">
                                    <lable><b>Branch/Location</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="21"></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Billing Type</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="14"></lable>
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px;">
                            <div class="col-sm-3">
                                    <lable><b>Montly Cr Limit</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="22"></lable>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Get Bill Details From ?</b></lable>
                                </div>
                                <div class="col-sm-3">
                                    <lable id="23"></lable>
                                </div>
                               
							</div>
						</div>
						<div class="modal-footer d-flex">
							<div> 
								<a  href="javascript:void(0);" class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#presentmodal" data-bs-dismiss="modal"><i class="feather feather-arrow-left me-1"></i>Back</a>
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
               //alert(response['data']);
               $.each(response['data'], function () {
						var key = Object.keys(this);
						var value = this;
                       //alert(value.number);
                       $('#1').html(value.sr_no);
                       $('#2').html(value.number);
                       $('.mo').html(value.number);
                       $('#3').html(value.assigned_to);
                       $('#4').html(value.relationship_no);
                       $('#5').html(value.payment_units);
                       $('#6').html(value.payment_mode);
                       $('#7').html(value.plan_details);
                       $('#8').html(value.operator);
                       $('#9').html(value.bill_date);
                       $('#10').html(value.billing_cycle_to);
                       $('#11').html(value.billing_cycle_from);
                       $('#12').html(value.grace_days);
                       $('#13').html(value.due_date);
                       $('#14').html(value.billing_type);
                       $('#15').html(value.email);
                       $('#16').html(value.mobile_no);
                       $('#17').html(value.security_deposit);
                       $('#18').html(value.custmoer_gst_no);
                       $('#19').html(value.biller_gst_number);
                       $('#20').html(value.state);
                       $('#21').html(value.branch_location);
                       $('#22').html(value.monthly_cr_limit);
                       $('#23').html(value.get_billing_details_from);
                       $('#24').html(value.service_type);
                      
                      
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