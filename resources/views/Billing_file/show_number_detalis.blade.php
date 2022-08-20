@extends('header_footer.main')
@section('main-container')

<style>
    .form-sty {
        background: antiquewhite;
        margin-top: 5px;
        margin-bottom: 7px;
    }
    .ff{
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

              
                <div class="card" style="padding: 13px;">
                    <!-- Card end -->
                    <div class="table-responsive">
                                            <table id="copy-print-csv" class="table custom-table">
                                                <div><a href="/mini_Export" class="btn btn-primary ff">Excel</a></div>
                                                <thead>
                                                <tr>
                                                
                                                    <th>Parent_ID</th>
                                                    <th>Plan Details</th>
                                                    <th>Assigned_to</th>
                                                    <th>Number</th>
                                                    <th>Branch</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($show as $data)
                                                    <tr>
                                                    <td>{{$data->sr_no}}</td>
                                                    <td>{{$data->plan_details}}</td>
                                                    <?php foreach($users as $emp){
                                                            //dd($emp);
                                                             if($emp->id == $data->assigned_to){
                                                ?>
                                                    <td>{{$emp->name}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                    <td>{{$data->number}}</td>
                                                    <?php foreach($branch as $branh){
                                                           // dd($branh);
                                                             if($branh->id == $data->branch_location){
                                                ?>
                                                    <td>{{$branh->branch_name}}</td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                                    <td>{{$data->status}}</td>
                                                    <td><button type="button" class="btn btn-primary edtbrnch" style="width: 59px; padding: 0px;" value="{{$data->id}}" >Edit</button></td>
                                                    
                                                    </tr>
                                                  
                                                @endforeach
                                                </tbody>
                                        </table>
                                        </div>
                </div>
                <!-- Place your content here -->
            </div>
        </div>
        <!-- Card end -->

        <!--Edit Modal 2-->
			
        <div class="modal fade" id="editmodaltwo" tabindex="-1" aria-labelledby="exampleModalLargeTitle" aria-hidden="true">
                <form action="{{url('updatemini')}}" method="post">
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
                                   <input type="number" name="sr_no" id="sr_no" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>Plan details</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="plan_details" id="b" >
                                </div>
							</div>
                            <div class="row" style="padding: 5px;">
								<div class="col-sm-3">
                                    <lable><b>Assigned_to</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss c" id="formSelect" name="assigned_to" >
											<option>Select</option>
											@foreach($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
											@endforeach
											
										</select>
                                </div>
                                <div class="col-sm-3">
                                    <lable><b>number</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" name="number" id="d" >
                                </div>
                               
							</div>
                            <div class="row" style="padding: 5px; background: #eff4f4;">
                            <div class="col-sm-3">
                                    <lable><b>Branch Location</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss e" id="formSelect" name="branch_location" >
											<option >Select</option>
											@foreach($branch as $bran)
											<option value="{{$bran->id}}">{{$bran->branch_name}}</option>
											@endforeach
										</select>
                                </div>
								<div class="col-sm-3">
                                    <lable><b>Status</b></lable>
                                </div>
                                <div class="col-sm-3">
                                <select class="ss f" id="formSelect" name="status" >
											<option >Select</option>
											<option value="Active">Active</option>
											<option value="Hold">Hold</option>
											<option value="suspended">suspended</option>
											<option value="surrendered">surrendered</option>
										</select>
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
    </div>
    <!-- Row end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
      $(document).ready(function () {
                   $(document).on('click','.edtbrnch',function(){
                var b_id = $(this).val();
        //  alert(b_id);
             $('#editmodaltwo').modal('show');
             $.ajax({
                     url: '/mini_popup/'+b_id,
                     headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        
                        var id = [];
                        var loca=[];
                        // alert(response['dataedit']);
                        // $('#editmodaltwo').modal('show');
                        $.each(response['dataedit'], function () {
						var key = Object.keys(this);
						var dataedit = this;
                        //alert(dataedit.sr_no);
                        $('#id').val(dataedit.id);
                        $('#sr_no').val(dataedit.sr_no);
                        $('#b').val(dataedit.plan_details);
                        id.push(dataedit.assigned_to); 
                        // $('#c').val(dataedit.assigned_to);
                        $('#d').val(dataedit.number);
                        $('.nnn').html(dataedit.number);
                        loca.push(dataedit.branch_location); 
                        // $('#e').val(dataedit.branch_location);
                        // $('#f').val(dataedit.status);
                        $('.f').find('option:nth-child(1)').attr('value',dataedit.status);
                        $('.f').find('option:nth-child(1)').html(dataedit.status);
                       
                    });
                   // alert(id);
                    $.each(response['user'], function () {
						var key = Object.keys(this);
						var data = this;
                    //alert(data.id);
                       if(id.indexOf(data.id) != -1){
                        $('.c').find('option:nth-child(1)').attr('value',data.id);
                        $('.c').find('option:nth-child(1)').html(data.name);
                       }
            });    
            $.each(response['branch'], function () {
						var key = Object.keys(this);
						var branch = this;
                        // alert(id);
                       if(loca.indexOf(branch.id) != -1){
                        // $('#e').val(branch.branch_name);
                        $('.e').find('option:nth-child(1)').attr('value',branch.id);
                        $('.e').find('option:nth-child(1)').html(branch.branch_name);
                       }
            });    

                    }
                 });
                 });
                 });
            
</script>
</div>
<!-- Content wrapper end -->
@endsection