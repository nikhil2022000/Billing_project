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
                                                    <th>Parent_ID</th>
                                                    <th>Number</th>
                                                    <th>Assigned_to</th>
                                                    <th>Relationship No</th>
                                                  
                                                    <th>Plan Details</th>
                                                   
                                                    <!-- <th>Montly Cr Limit</th> -->
                                                    <th>Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dat as $data)
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->number}}</td>
                                                    
                                                   
                                                    <?php
                                                    foreach($user as $users){
                                                        //$da[]=$opreter;
                                                 if($users->id == $data->assigned_to){
                                                    
                                                    ?>
                                                   <td>{{$users->name}}</td>
                                                    <?php
                                                 }
                                                        }?>
                                                    <td>{{$data->plan_details}}</td>
                                                    <td>{{$data->credit_limit}}</td>
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
            var bran=[];
            var loca=[];
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
                       $('#6').html(value.payment_units);
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
                       $('#20').html(value.relationship_no);
                       $('#21').html(value.mobile_no);
                       $('#22').html(value.dsl_id);
                       $('#23').html(value.security_deposit);
                       $('#24').html(value.registered_id);
                       $('#25').html(value.custmoer_gst_no);
                       $('#26').html(value.biller_gst_number);
                       bran.push(value.state); 
                       loca.push(value.branch_location); 

                    //    $('#27').html(value.state);
                    //    $('#28').html(value.branch_location);
                       $('#29').html(value.credit_limit);
                       $('#30').html(value.get_billing_details_from);  
               });    
               
               $.each(response['user'], function () {
						var key = Object.keys(this);
						var data = this;
                        // alert(id);
                       if(data.id.indexOf(id) != -1){
                        $('#3').html(data.name);
                       }
            });    
            $.each(response['opreter'], function () {
						var key = Object.keys(this);
						var da = this;
                        // alert(id);
                       if(da.id.indexOf(opt) != -1){
                        $('#13').html(da.operator);
                       }
            });    
            $.each(response['branch'], function () {
						var key = Object.keys(this);
						var branch = this;
                        // alert(id);
                       if(branch.id.indexOf(bran) != -1){
                        $('#27').html(branch.state);
                       }
                       if(branch.id.indexOf(loca) != -1){
                        $('#28').html(branch.branch_name);
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