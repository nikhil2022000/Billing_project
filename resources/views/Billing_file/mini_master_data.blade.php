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
                    
                    <form method="POST" action="{{url('mini_insert')}}">
                        @csrf
                        <div class="card-body">

                            <!-- Row start -->
                            <div class="row gutters">
                                                            @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="container form-sty">
                                    <p><b>Add Number to Exisiting Billable ID</b></p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="sr_no">
                                    <option value=" ">select</option>
                                        @foreach($id as $srno)
											<option value="{{$srno->sr_no}}">{{$srno->sr_no}}</option>
											@endforeach
                                        </select>
                                        <div class="field-placeholder">Sr.No (Unique ID)</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="status">
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
                                    <select class="form-select" id="formSelect" name="assigned_to" required>
											<option value="">Select</option>
											@foreach($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
											@endforeach
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
                                        <input type="number" class="form-control" placeholder=" Enter Number " name="number">
                                        <div class="field-placeholder">Number</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <input type="text" class="form-control" placeholder=" Enter Plan Details " name="plan_details">
                                        <div class="field-placeholder">Plan Details</div>
                                    </div>
                                    <!-- Field wrapper end -->
                                </div>
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
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper end -->

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 170px;">Submit</button>
                                    </div>
                                    <!-- Field wrapper end -->

                                </div>
                               
                            </div>

                        </div>

                    </form>
                </div>
               
                <!-- Place your content here -->
            </div>
        </div>
        <!-- Card end -->
        <div class="row gutters">
            <div class="col-xl-12">
                <!-- Card start -->

                <div class="card">
                    
                    <form id="import_data" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <!-- Row start -->
                            <div class="row gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper end -->
                                    <div class="field-wrapper">
                                    <input type="file" class="form-control"  name="files" required>
                                        <div class="field-placeholder">Import Number Details</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <!-- Field wrapper end -->
                                    <div class="field-wrapper">
                                    <input type="month" class="form-control"  name="month" required>
                                        <div class="field-placeholder">Month</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 170px;">Submit</button>
                                    </div>
                                    <!-- Field wrapper end -->

                                </div>
                               
                            </div>

                        </div>

                    </form>
                </div>
               
                <!-- Place your content here -->
            </div>
        </div>
        <!-- //////////////////////////////////////model//////////////// -->
        <div class="modal fade" id="editmodaltwo" tabindex="-1" aria-labelledby="exampleModalLargeTitle" aria-hidden="true">
              
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLargeTitle">Employe Name not inserted in table</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
						<div class="modal-body">
                           
							<div class="row" style="padding: 5px; background: #eff4f4;">
                           
								<!-- <div class="col-sm-6">
                                    <lable><b>Name:</b></lable>
                                </div> -->
                                <div class="col-sm-6" id="na">
                                <lable><b></b></lable>
                                </div>
							</div>
                            
                           
						</div>
						<div class="modal-footer d-flex">
							<div> 
								<a  href="javascript:void(0);" class="btn btn-light relode_back"  data-bs-toggle="modal" data-bs-target="#presentmodal" data-bs-dismiss="modal"><i class="feather feather-arrow-left me-1"></i>Back</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- End Edit Modal  -->

    </div>
    <!-- Row end -->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#import_data').submit(function(e) {
    //    alert('hii');return false;
       e.preventDefault();
       var formData = new FormData(this);
      
              //alert (this);
              $.ajax({
                    url: "/import", 
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',  
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // consol.log(data);
                        if(response['data'] == ''){
							window.location.reload();
        
						}else{
                        $.each(response['data'], function () {
                        var key = Object.keys(this);
						var dataedit = this;
                        //alert(  dataedit[2]);
                        $('#editmodaltwo').modal('show');
                        $('#na').append('<li>' +dataedit[2] + '</li>');
              });

                    }
                    $('.relode_back').click(function(){
				        window.location.reload();
			            });
                    }
              });
              });
             
        
<!-- Content wrapper end -->
</script>
@endsection