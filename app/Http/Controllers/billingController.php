<?php

namespace App\Http\Controllers;

use App\Models\bill_categories;
use App\Models\branch;
use App\Models\emp_users;
use App\Models\master_data;
use App\Models\mini_master;
use App\Models\operators;
use App\Models\payment_units;
use App\Models\relation_number;
use App\Models\monthlly_data;
use App\Imports\masterImport;
use App\Imports\miniImport;
use App\Imports\empImport;
use App\Exports\miniExport;
use App\Exports\masterExport;
use DB;
use Excel;
use Illuminate\Http\Request;
use Response;
use File;

class billingController extends Controller
{
    public function category()
    {
        //dd('hhhh');
        $da = DB::table('category')->get();

        $data = json_decode(json_encode($da));
        //  echo"<pre>";print_r($data);
        $oprater = DB::table('operator')->get();
        $oprat = json_decode(json_encode($oprater));

        return view('Billing_file.operators', ['dat' => $data,'oprates' => $oprat]);
    }
    /////////////////////////////////////////////////////////////////////operators/////////////////////////////////////////
    public function operators(Request $req)
    {
        // echo"<pre>";print_r($_POST);die;
       $exists =  operators::where('operator', '=', $req->operator)->exists();
if(!$exists){
        $data = new operators;
        $data->operator = $req->operator;
        $data->billing_cat = $req->billing_cat;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');

    }
}
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function units(Request $req)
    {
        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;
        return view('Billing_file.payment_units', ['payment' => $pay]);
    }
    //////////////////////////////////////////////////////////////////payment units//////////////////////////////////////////
    public function payment_units(Request $req)
    {
        $exists =  payment_units::where('unit_name', '=', $req->unit_name)->exists();
        if(!$exists){
        $data = new payment_units;
        $data->unit_name = $req->unit_name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');
    }
}
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function opt()
    {
        //dd('hhhh');
        $da = DB::table('operator')->get();

        $data = json_decode(json_encode($da));
        // echo"<pre>";print_r($data);
        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));

        return view('Billing_file.Relationship_number', ['dat' => $data ,'relation'=>$rel]);
    }
    //////////////////////////////////////////////////////////////relation_number///////////////////////////
    public function relation_no(Request $req)
    {
        $exists =  relation_number::where('number', '=', $req->number)->exists();
        if(!$exists){
        $data = new relation_number;
        $data->operator = $req->operator;
        $data->number = $req->number;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');

    }
}
    //////////////////////////////////////////////////////////////////////////////////
    public function emp_user(Request $req)
    {
        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));
        return view('Billing_file.EMP', ['users' => $users]);
    }
    /////////////////////////////////////////////////////////////////////////////////EMP import/////////////////////////////////////////////////
    public function emp_import(Request $req){
        //   echo"<pre>";print_r($_FILES);die;
        Excel::import(new empImport, $req->file('filedata'));
        return redirect()->back();
    }
    ///////////////////////////////////////////////////////////////////////////////users/////////////////////////
    public function emp(Request $req)
    {
        $exists =  emp_users::where('empid', '=', $req->empid)->exists();
        if(!$exists){
        $data = new emp_users;
        $data->empid = $req->empid;
        $data->name = $req->name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');
    }
}
    ///////////////////////////////////////////////////////////////////////////////////////
    public function show_branches(Request $req)
    {
        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        return view('Billing_file.Branches', ['branch' => $brh]);
    }
    /////////////////////////////////////////////////////////////branches/////////////////////////////////////////
    public function branches(Request $req)
    {
        $exists =  branch::where('branch_name', '=', $req->branch_name)->exists();
        if(!$exists){
        $data = new branch;
        $data->branch_name = $req->branch_name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');

    }
}
    ///////////////////////////////////////////////////////////////////////////////
    public function show_catg(Request $req)
    {
        $da = DB::table('category')->get();
        $data = json_decode(json_encode($da));
        //  echo"<pre>";print_r($data);

        return view('Billing_file.billing_categories', ['dat' => $data]);
    }

   /////////////////////////////////////////////////////////////////////////////////////////Bill categories/////////////////////////////////////////////////// 
    public function bill_categories(Request $req)
    {
       // dd('dd');
       $exists =  bill_categories::where('category_name', '=', $req->category_name)->exists();
       if(!$exists){
        $data = new bill_categories;
        $data->category_name = $req->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Data Already inserted');
    }
}
    ////////////////////////////////////////////////////////////////////////////////////////categories end///////////////////
    public function master_Export(Request $req){
        //  echo"<pre>";print_r('jj');die;

       return Excel::download(new masterExport,'Master_Number.xlsx');
      
    }
    public function master_import(Request $req){

        $data = new master_data;
        $data->month = $req->month;
// dd($req->month);
        $rows = Excel::toArray([],$req->file('file'));
        $datas = $rows[0];
        // /dd($datas);
        foreach($datas as $data){
        $exists =  emp_users::where('name', '=', $data[2])->exists();
        //dd(!$exists);
        if(!$exists){
            $duplicat[] = $data;
            unset($duplicat[0]);
            // dd($duplicat);
            }    
        }
        Excel::import(new masterImport, $req->file('file'));

        $response['data'] = $duplicat;
        $response['success'] = true;
        $response['messages'] = 'Succesfully loaded';
        return Response::json($response);

    }
    public function master_form(Request $req)
    {

       // echo"<pre>";print_r($data); die;
        $d = $req->sr_no[0];
        // echo"<pre>";print_r($d); die;
        foreach ($req->number as $key => $dat) {
            //echo"<pre>";print_r($req->branch_location); die;
            $exists =  master_data::where('number', '=', $dat)->exists();
            if (!$exists){
        }else{
            $data = new mini_master;
            $data->number = $dat;
            $data->sr_no = $d;
            $data->plan_details = $req->plan_details[$key];
            $data->assigned_to = $req->assigned_to[$key];
            $data->branch_location = $req->branch_location[$key];
            $data->status = $req->status[$key];
            $data->save();
        }
    }
        foreach ($req->sr_no as $key => $dat) {
            //  echo"<pre>";print_r($data); die;
            $existing =  master_data::where('number', '=',$req->number[$key])->exists();
            if (!$existing){
                $data = new master_data;
                ////////////////////////basic details/////////
                $data->sr_no = $dat;
                $data->number = $req->number[$key];
                $data->assigned_to = $req->assigned_to[$key];
                $data->operator_type = $req->operator_type[$key];
                $data->branch_location = $req->branch_location[$key];
                $data->operator = $req->operator[$key];
                $data->status = $req->status[$key];
                $data->plan_details = $req->plan_details[$key];
                ///////////////////////////payment details////////////////////////////
                $data->payment_units = $req->payment_units[$key];
                $data->payment_cycle = $req->payment_cycle[$key];
                $data->monthly_rental_amount = $req->monthly_rental_amount[$key];
                $data->tds = $req->tds[$key];
                $data->gst = $req->gst[$key];
                $data->credit_limit = $req->credit_limit[$key];
                $data->security_deposit = $req->security_deposit[$key];
                $data->payment_mode = $req->payment_mode[$key];
                /////////////////////////////////////billing//////////////////
                $data->bill_date = $req->bill_date[$key];
                $data->billing_cycle_to = $req->billing_cycle_to[$key];
                $data->billing_cycle_from = $req->billing_cycle_from[$key];
                $data->grace_days = $req->grace_days[$key];
                $data->due_date = $req->due_date[$key];
                ////////////////////////////////////////////////////////other///////////
                $data->relationship_no = $req->relationship_no[$key];
                $data->mobile_no = $req->mobile_no[$key];
                $data->dsl_id = $req->dsl_id[$key];
                $data->custmoer_gst_no = $req->custmoer_gst_no[$key];
                $data->biller_gst_number = $req->biller_gst_number[$key];
                $data->state = $req->state[$key];
                $data->bill_open_password = $req->bill_open_password[$key];
                $data->registered_id = $req->registered_id[$key];
                $data->get_billing_details_from = $req->get_billing_details_from[$key];
                $data->save();
                return redirect()->back()->with('message', 'Data successfully insert');
              
        }else{
            return redirect()->back()->with('message', 'Number already inserted');

        }
    }
       
    }

    public function show()
    {
        // dd('ss');
        $da = DB::table('master_data')->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($data);die;

        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));
        //echo"<pre>";print_r($opreter);die;

        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;

        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));

        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));
        // echo"<pre>";print_r($rel);die;

        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        // echo"<pre>";print_r($brh);die;

        return view('Billing_file.show_master_data', ['dat' => $data, 'user' => $users,'payment' => $pay, 'relation' => $rel, 'branch' => $brh, 'opt' => $opreter]);

    }
    public function popup($id)
    {
        // dd($id);
        $da = DB::table('master_data')->where('id', $id)->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($data);die;
        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));
        // echo"<pre>";print_r($users);die;
        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));
        // echo"<pre>";print_r($opreter);die;
        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        // echo"<pre>";print_r($brh);die;
        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;

        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));
        // echo"<pre>";print_r($rel);die;


        $response['data'] = $data;
        $response['user'] = $users;
        $response['opreter'] = $opreter;
        $response['branch'] = $brh;
        $response['payment_unit'] = $pay;
        $response['relation'] = $rel;
        $response['success'] = true;
        $response['messages'] = 'Succesfully loaded';
        return Response::json($response);
    }

    public function show_details()
    {
        $da = DB::table('master_data')->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($da);die;
        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));

        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        //  echo"<pre>";print_r($brh);die;
        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));

        $data_show = DB::table('number_details')->get();
        $show = json_decode(json_encode($data_show));
        // echo"<pre>";print_r($show);die;


        return view('Billing_file.show_number_detalis', ['master_details' => $data, 'opt' => $opreter, 'branch' => $brh,'users' => $users, 'show' => $show]);
    }
    public function full_details()
    {
        // dd('dd');
        $da = DB::table('master_data')->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($da);die;
        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));

        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        //  echo"<pre>";print_r($brh);die;
        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));

        $data_show = DB::table('number_details')->get();
        $show = json_decode(json_encode($data_show));
        // echo"<pre>";print_r($show);die;
        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;
      
        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));
        // echo"<pre>";print_r($rel);die;

        return view('Billing_file.full_details_number', ['master_details' => $data, 'opt' => $opreter, 'branch' => $brh,'user' => $users, 'show' => $show, 'pay'=>$pay,'rel'=>$rel]);
    }
    public function mini_export(Request $req){
        
        //  echo"<pre>";print_r('jj');die;

       return Excel::download(new miniExport,'Number_Details.xlsx');
      
    }
    public function mini_import(Request $req){
    //    echo'<pre>'; print_r($_FILES); die;
        $data = new mini_master;
         $data->month = $req->month;

        $rows = Excel::toArray([],$req->file('files'));
        $datas = $rows[0];
        //dd($datas);
         foreach($datas as $data){
        // dd($data);

           $exists =  emp_users::where('name', '=', $data[2])->exists();
           $branc =   branch::where('branch_name', '=', $data[27])->exists();
        //    dd(!$branc);
        //    if(!$branc){
        //     // dd($data);
        //     $duplicat[] = $data;
        //     unset($duplicat[0]);
        //     }
        //     dd($duplicat);  
           if(!$exists){
            $duplicat[] = $data;
            unset($duplicat[0]);
            
            }    
         }
         //dd($duplicat);
        Excel::import(new miniImport, $req->file('files'));

        $response['data'] = $duplicat;
        $response['success'] = true;
        $response['messages'] = 'Succesfully loaded';
        return Response::json($response);
       
    }
    public function mini_master()
    {
        $da = DB::table('master_data')->select('sr_no')->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($da);die;
        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));

        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        //  echo"<pre>";print_r($brh);die;
        $emp = DB::table('emp_users')->get();
        $users = json_decode(json_encode($emp));

        $data_show = DB::table('number_details')->get();
        $show = json_decode(json_encode($data_show));
        // echo"<pre>";print_r($show);die;


        return view('Billing_file.mini_master_data', ['id' => $data, 'opt' => $opreter, 'branch' => $brh,'users' => $users, 'show' => $show]);
    }
    public function mini_insert(Request $req)
    {
        // echo"<pre>";print_r($_POST);die;
        // dd('gg');
        $exists =  mini_master::where('number', '=', $req->number)->exists();
        if (!$exists){
            $data = new mini_master;
            $data->sr_no = $req->sr_no;
            // $data->operator = $req->operator;
            $data->assigned_to = $req->assigned_to;
            $data->number = $req->number;
            $data->plan_details = $req->plan_details;
            $data->branch_location = $req->branch_location;
            $data->status = $req->status;
            $data->save();
            return redirect()->back()->with('message', 'Data successfully insert');
    }else{
        return redirect()->back()->with('message', 'Number already inserted');
    }
}

    public function append_data()
    {
        // dd('lkjsadf');
        $datasend = "
        <div class='add'>
        <div class='row gutters'>
                 <div class='container form-sty'>
									<p><b>Add Numbers to Exisiting Billable ID </b></p>
								</div>
                  <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>
									<!-- Field wrapper start -->
									<div class='field-wrapper'>
										<input type='number' class='form-control' placeholder='Number' name='number[]' required>
										<div class='field-placeholder'>Number</div>
									</div>
									<!-- Field wrapper end -->

								</div>
                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>
                <!-- Field wrapper start -->
                <div class='field-wrapper'>
                <select class='form-select' id='formSelect' name='status[]' required>
                <option value=''>Select</option>
                <option value='Active'>Active</option>
                <option value='Hold'>Hold</option>
                <option value='suspended'>suspended</option>
                <option value='surrendered'>surrendered</option>
            </select>
                  <div class='field-placeholder'>Status</div>
                </div>
                <!-- Field wrapper end -->

              </div>
                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>
                  <div class='field-wrapper'>
                  <input type='text' class='form-control' id='inputPwd'
											placeholder='Enter Assigned To' name='assigned_to[]' required>
										<div class='field-placeholder'>Assigned To</div>
                  </div>
                </div>
              </div>
                            <div class='row gutters'>
								<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>

									<!-- Field wrapper start -->
									<div class='field-wrapper'>
										<input type='text' class='form-control' placeholder='Enter Operator Type'
											name='operator_type[]' required>
										<div class='field-placeholder'>Operator Type</div>
									</div>
									<!-- Field wrapper end -->

								</div>
								<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>

									<!-- Field wrapper start -->
									<div class='field-wrapper'>
									<input type='text' class='form-control' placeholder='Enter Branch/Locaiton'
											name='branch_location[]' required>
										<div class='field-placeholder'>Branch/Locaiton</div>
									</div>
									<!-- Field wrapper end -->

								</div>
                                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12'>
                                    <div class='row gutters'>
                                        <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                            <!-- Field wrapper start -->
                                            <div class='field-wrapper' align='right'>
                                            <a class='btn btn-primary' href='#' role='button' 
                                            id='append_hide'>-</a>
                                            <a class='btn btn-primary' href='#' role='button' 
                                            id='append_input'>+</a>
                                                </div>
                                        </div>
                                    </div>
                                    
										

								</div>

							</div>
				</div>
              ";
        $response['data'] = $datasend;
        $response['success'] = true;
        $response['messages'] = 'Succesfully loaded';
        return Response::json($response);

    }
////////////////////////////////////////////////////////////////////////////////////Edit--popup//////////////////////////////////////////////////
public function edit_popup($id)
{
//   dd('ksadfsadflsadfasdf');
  $da = DB::table('master_data')->where('id', $id)->get();
  $show = json_decode(json_encode($da));
//   echo"<pre>";print_r($da);die;
  $emp = DB::table('emp_users')->get();
  $users = json_decode(json_encode($emp));
  // echo"<pre>";print_r($users);die;
  $opt = DB::table('operator')->get();
  $opreter = json_decode(json_encode($opt));
  // echo"<pre>";print_r($opreter);die;
  $branch = DB::table('branches')->get();
  $brh = json_decode(json_encode($branch));
  // echo"<pre>";print_r($brh);die;
  $units = DB::table('payment_units')->get();
  $pay = json_decode(json_encode($units));
  //echo"<pre>";print_r($pay);die;

  $un = DB::table('relation_number')->get();
  $rel = json_decode(json_encode($un));
  // echo"<pre>";print_r($rel);die;

  $response['dataedit'] = $show;
  $response['user'] = $users;
  $response['opreter'] = $opreter;
  $response['branch'] = $brh;
  $response['payment_unit'] = $pay;
  $response['relation'] = $rel;
  $response['success'] = true;
  $response['messages'] = 'Succesfully loaded';
  return Response::json($response);
}

public function editting (Request $req)
    {
        //   dd($req->id);
        $data= master_data::find($req->id);
        $data->sr_no =  $req->sr_no;
        $data->number = $req->number;
        $data->assigned_to = $req->assigned_to;
        $data->operator_type = $req->operator_type;
        $data->branch_location = $req->branch_location;
        $data->operator = $req->operator;
        $data->status = $req->status;
        $data->plan_details = $req->plan_details;
        ///////////////////////////payment details////////////////////////////
        $data->payment_units = $req->payment_units;
        $data->payment_cycle = $req->payment_cycle;
        $data->monthly_rental_amount = $req->monthly_rental_amount;
        $data->tds = $req->tds;
        $data->gst = $req->gst;
        $data->credit_limit = $req->credit_limit;
        $data->security_deposit = $req->security_deposit;
        $data->payment_mode = $req->payment_mode;
        /////////////////////////////////////billing//////////////////
        $data->bill_date = $req->bill_date;
        $data->billing_cycle_to = $req->billing_cycle_to;
        $data->billing_cycle_from = $req->billing_cycle_from;
        $data->grace_days = $req->grace_days;
        $data->due_date = $req->due_date;
        ////////////////////////////////////////////////////////other///////////
        $data->relationship_no = $req->relationship_no;
        $data->mobile_no = $req->mobile_no;
        $data->dsl_id = $req->dsl_id;
        $data->custmoer_gst_no = $req->custmoer_gst_no;
        $data->biller_gst_number = $req->biller_gst_number;
        $data->state = $req->state;
        $data->bill_open_password = $req->bill_open_password;
        $data->registered_id = $req->registered_id;
        $data->get_billing_details_from = $req->get_billing_details_from;
        $data->save();
        return redirect()->back();
    }

    public function minipopup($id)
{
    // dd('dddd');
    $da = DB::table('number_details')->where('id', $id)->get();
  $show = json_decode(json_encode($da));
   // dd($show);
   $emp = DB::table('emp_users')->get();
   $users = json_decode(json_encode($emp));
   // echo"<pre>";print_r($users);die;
   $branch = DB::table('branches')->get();
   $brh = json_decode(json_encode($branch));
   // echo"<pre>";print_r($brh);die;

  $response['dataedit'] = $show;
  $response['user'] = $users;
  $response['branch'] = $brh;
  $response['success'] = true;
  $response['messages'] = 'Succesfully loaded';
  return Response::json($response);
}

public function updatemini(Request $req){
    $data= mini_master::find($req->id);
    $data->sr_no =  $req->sr_no;
    $data->plan_details = $req->plan_details;
    $data->assigned_to = $req->assigned_to;
    $data->number = $req->number;
    $data->branch_location = $req->branch_location;
    $data->status = $req->status;
    $data->save();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////Summary table/////////////////////////

public function monthly_table_data(Request $req){

   
   
   
        $monthly_data = DB::table('monthly_billing_data')->where('month',$req->month)->get();
    //     $response['monthly_data'] = $monthly_data;
    //     $response['success'] = true;
    //     $response['messages'] = 'Succesfully loaded';
    //     return Response::json($response);

   
        $projects = DB::table('number_details')
                ->where('month',$req->month)
                ->select('sr_no', DB::raw('count(*) as sum'))
                ->groupBy('sr_no')
                ->get();
    //   echo'<pre>'; print_r($projects); die;
        $details= DB::table('number_details')->where('month',$req->month)->get();
        $master= DB::table('master_data')->get();
        $masters = json_decode(json_encode($master));
        $opt = DB::table('operator')->get();
        $opreter = json_decode(json_encode($opt));
        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        $relat = DB::table('relation_number')->get();
        $relation = json_decode(json_encode($relat));

        foreach($masters as $data){
            $sr_no = $data->sr_no;
            $operator_type = $data->operator_type;
            foreach($opreter as $opte){
                if($opte->id == $data->operator ){
                    $operator =$opte->operator ;
                    // dd($payment_units);
                }
               
            }
            foreach($relation as $rel){
                if($rel->id == $data->relationship_no ){
                    $rel_number =$rel->number;
                    // dd($payment_units);
                }
               
            }
            foreach($pay as $payment){
                if($payment->id == $data->payment_units ){
                    $payment_units = $payment->unit_name;
                    //  dd($payment_units);
                }
               
            }
            $monthly_rental_amount = $data->monthly_rental_amount;
    
            $master_details =array('sr_no'=>$sr_no,'operator_type'=>$operator_type,'relation_no'=>$rel_number,'operator'=>$operator,'payment_units'=>$payment_units,'monthly_rental_amount'=>$monthly_rental_amount,);
            $arr_master[]=$master_details;
    }
    $response['data'] = $arr_master;
    $response['project'] = $projects;
    $response['monthly_data'] = $monthly_data;
    $response['success'] = true;
    $response['messages'] = 'Succesfully loaded';
    return Response::json($response);
    
    }
// }
   
public function monthlya_data_save(Request $req){
        //    echo'<pre>'; print_r($_POST); 
        // //    echo'<pre>'; print_r($_FILES); die;
        //  dd($_FILES); 
        $exists =  monthlly_data::where('billable_id', '=', $req->sr_no)->exists();  
    if(!$exists){    
    $data = new monthlly_data;
    $data->billable_id = $req->sr_no;
    $data->relationship_no = $req->relation_no;
    $data->operator =  $req->operator;
    $data->operator_type =$req->operator_type;
    $data->number_of_connection = $req->number_count;
    $data->payment_unit = $req->payment_units;
    $data->monthly_rental = $req->amount;
    $data->usages = $req->usages;
    $data->gst = $req->gst;
    $data->tds =$req->tds;
    $data->invoice_number =  $req->invoice_number;
    $data->bill_date = $req->billing_date;
    $data->due_date = $req->due_date;
    $data->month = $req->month;
    $data->checkbox = $req->checkbox;
    $filename =  $req->file('file')->getClientOriginalName();
    $req->file('file')->move(public_path('billing_img'), $filename);
    $data->hardcopy_invoice = $filename;
    $data->save();
    $response['success'] = true;
    $response['messages'] = 'Succesfully loaded';
    return Response::json($response);
    }
    return redirect()->back(); 
}

public function master_sample(){
    $filePath = public_path("/billing_img/master_sample.xlsx");
    $headers = ['Content-Type: application/xlsx'];
    $fileName = time().'.xlsx';
    	return response()->download($filePath, $fileName, $headers);
}

public function number_details_sample(){
    $filePath = public_path("/billing_img/number_details.xlsx");
    $headers = ['Content-Type: application/xlsx'];
    $fileName = time().'.xlsx';
    	return response()->download($filePath, $fileName, $headers);
}

public function user_sample(){
    $filePath = public_path("/billing_img/user_sample.xlsx");
    $headers = ['Content-Type: application/xlsx'];
    $fileName = time().'.xlsx';
    	return response()->download($filePath, $fileName, $headers);
}
}