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
                <div class="card">
                    <div class="card-body">
                        <form id='monthly_data'>
                        @csrf
                        <div class="row gutters">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <!-- Field wrapper end -->
                                    <div class="field-wrapper">
									<input type="month" class="form-control mon"  name="month" required>
                                        <div class="field-placeholder">Month</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                    <!-- Field wrapper start -->
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary sub" style="margin-left: 70px; width: 202px">Submit</button>
                                    </div>
                                    <!-- Field wrapper end -->

                                </div>
                               
                            </div>
                            </form>
                        </div>
                        </div>
                    <!-- Card start -->
                    <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table id="copy-print-csv" class="table custom-table table_id">
                                                <thead>
                                                
                                                    <tr>
                                                        <th>Billable Id</th>
                                                        <th>Relationship_number</th>
                                                        <th>operator</th>
                                                        <th>Operator Type</th>
                                                        <th>No OF Connection</th>                                          
                                                        <th>Payment Unit</th>
                                                        <th>Monthly Rental</th>
                                                        <th>Usages</th>
                                                        <th>GST</th>
                                                        <th>TDS</th>
                                                        <th>Invoice Number</th>
                                                        <th>Billing Date</th>
                                                        <th>Due Date</th>
                                                        <th>Hardcopy Invoice</th>
                                                        <th>Check</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 
                                                </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Card start -->

			
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
$('#monthly_data').submit(function(e) {
    //    alert('hii');return false;
       e.preventDefault();
       var formData = new FormData(this);
      
            //   alert (this);
              $.ajax({
                    url: "/monthly_table_data", 
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',  
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:                      //reinitialize Datatables
				function () {
				    $('#copy-print-csv').dataTable().fnClearTable();
					$('#copy-print-csv').dataTable().fnDestroy();
					//$('#table_id tbody tr').remove();
				},
                    success: function (response) {
						var uq_id= [];
						
						// console.log(response['monthly_data']);
                       if(response['data']){
						   
						   $.each(response['monthly_data'], function () {
							   var monthly_save = this;
							   uq_id.push(monthly_save.billable_id);
						   });
						   
                        $.each(response['data'], function () {
						var key = Object.keys(this);
						var val = this;
                       
                        $.each(response['project'], function () {
						var key = Object.keys(this);
						var uniq_id = this;
                        if(uniq_id.sr_no.indexOf(val.sr_no) != -1){
                           var number_count = uniq_id.sum;
                            //console.log(number_count);
                           var amount= val.monthly_rental_amount*number_count;
                           
                         $.each(response['monthly_data'], function () {
                            var key = Object.keys(this);
						    var monthly_save = this;
							
								// console.log('monthlyData'+monthly_save.billable_id);
                            if(monthly_save.billable_id == val.sr_no){
                               var base_url = window.location.origin;
                               var img = base_url+('/billing_img/')+monthly_save.hardcopy_invoice;
                                // alert(img);
                            // var img = `"<img src="/storage/upload/'${monthly_save.hardcopy_invoice}"`;
                            //  alert(img);         
                               
                                $("#copy-print-csv tbody").append("<tr><td>" + monthly_save.billable_id + "</td><td>" + monthly_save.relationship_no + "</td><td>" + monthly_save.operator + "</td><td>" + monthly_save.operator_type + "</td><td>" +  monthly_save.number_of_connection+ "</td><td>" + monthly_save.payment_unit + "</td><td>" + monthly_save.monthly_rental + "</td><td>" + monthly_save.usages + "</td><td>" + monthly_save.gst + "</td><td>" + monthly_save.tds + "</td><td>" + monthly_save.invoice_number + "</td><td>" + monthly_save.bill_date + "</td><td>" + monthly_save.due_date + "</td><td>  <a href="+img+" target='_blank'>View</a></td><td><input type='checkbox' class ='checkbox' checked disabled></td><td><button class='btn btn-primary' style='padding:2px;background-color:blue;'>varified</button></td></tr>");
                            }
								
							
                        }); 
                           
                        
                            if(uq_id.indexOf(val.sr_no) > -1){
								
							}else{
							$("#copy-print-csv tbody").append("<tr><td>" + val.sr_no + "</td><td>" + val.relation_no + "</td><td>" + val.operator + "</td><td>" + val.operator_type + "</td><td>" +  number_count+ "</td><td>" + val.payment_units + "</td><td>" + amount + "</td><form id='enter_data'><td><input type='text' style='width: 78px;' name='usages'></td><td><input type='text' style='width: 78px;' name='gst'></td><td><input type='text' style='width: 78px;' name='tds'></td><td><input type='text' style='width: 78px;' name='invoice_number'></td><td><input type='date' style='width: 78px;' name='billing_date'></td><td> <input type='date' style='width: 78px;' name='due_date'></td><td><input type='file' style='width: 78px;' name='hardcopy_invoice' class='fils'></td><td><input type='checkbox' class ='checkbox'></td></form><td><button class='btn btn-primary buttons'  style='padding:2px;background-color: #f44336;'>Unvarified</button></td></tr>");
							}
                        } 
                    }); 
                      
                       });
                    }
                
					   $(function(){
	$('#copy-print-csv').DataTable( {
		"lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
		dom: 'Bfrtip',
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5',
			'print'
		],
	});
});
$('#copy-print-csv tbody tr td input[type="checkbox"]').click(function() {

var ids = $(this).closest('tr').find('td').eq(0).text();
var relation_no = $(this).closest('tr').find('td').eq(1).text();
var operator = $(this).closest('tr').find('td').eq(2).text();
var operator_type = $(this).closest('tr').find('td').eq(3).text();
var number_count = $(this).closest('tr').find('td').eq(4).text();
var payment_units = $(this).closest('tr').find('td').eq(5).text();
var amount = $(this).closest('tr').find('td').eq(6).text();
var usages = $(this).closest('tr').find("td:eq(7) input[type='text']"). val();
var gst = $(this).closest('tr').find("td:eq(8) input[type='text']"). val();
var tds = $(this).closest('tr').find("td:eq(9) input[type='text']"). val();
var invoice_number = $(this).closest('tr').find("td:eq(10) input[type='text']"). val();
var billing_date = $(this).closest('tr').find("td:eq(11) input[type='date']"). val();
var due_date = $(this).closest('tr').find("td:eq(12) input[type='date']"). val();
var hardcopy_invoice = $(this).closest('tr').find('td').eq(13).children('.fils')[0].files;
var month = $('.mon').val();
var checkbox = $(this).closest('tr').find("td:eq(14) input[type='checkbox']"). val();
 
var form_data = new FormData();

 form_data.append('file', hardcopy_invoice[0]);
 form_data.append('sr_no', ids);
 form_data.append('relation_no', relation_no);
 form_data.append('operator', operator);
 form_data.append('operator_type', operator_type);
 form_data.append('number_count', number_count);
 form_data.append('payment_units', payment_units);
 form_data.append('amount', amount);
 form_data.append('usages', usages);
 form_data.append('gst', gst);
 form_data.append('tds', tds);
 form_data.append('invoice_number', invoice_number);
 form_data.append('billing_date', billing_date);
 form_data.append('due_date', due_date);
 form_data.append('month', month);
 form_data.append('checkbox', checkbox);

//    var fl = files[0];


//  if($(this).prop("checked")){
//   var  dateMIne =[];
//   var datehtml = [];
//    var fil = [];
//     $(this).parents('tr').find('td').each(function(){
//         if($(this).find('input').length ){
//          var  usages = $(this).find('input').val();
//          var file = $('#fils')[0].files[0];
     
      
//         //  console.log(file);
//          dateMIne.push(usages);
//          fil.push(file);
//         }else{
//          var   form_data = $(this).html();
//          datehtml.push(form_data);

//         }

//     });

$.ajax({
    url: "/monthlya_data_save",
    type: 'POST',
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').content="{{ csrf_token()}}"
        }, 
        data:form_data,
        contentType: false,
        dataType: "json",
        processData: false,
       
        
    success: function (response) {
        if(response['data'] != ''){
            alert('Data insert successfully');
//             if($(this).prop("checked")){
//             $(this).parents('tr').find('td').each(function(){
//             if($(this).find('button').length ){
//             $(this).find('button').html('varified').css('background-color','blue')
//         }
//     });
// }

        }else{
            alert('Somthing Went Wrong');
        }

    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('Somthing Went Wrong');
        
}
   
});




});
          
                        
                    
                    }
					

              });
			  

              });

	
             
        

</script>

                
            </div>
        </div>
    </div>
</div>
@endsection

