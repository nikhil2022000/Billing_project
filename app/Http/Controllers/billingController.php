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
use DB;
use Illuminate\Http\Request;
use Response;

class billingController extends Controller
{
    public function category()
    {
        //dd('hhhh');
        $da = DB::table('category')->get();

        $data = json_decode(json_encode($da));
        //  echo"<pre>";print_r($data);
        return view('Billing_file.operators', ['dat' => $data]);
    }
    public function operators(Request $req)
    {
        // echo"<pre>";print_r($_POST);die;
        $data = new operators;
        $data->operator = $req->operator;
        $data->billing_cat = $req->billing_cat;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }

    public function payment_units(Request $req)
    {

        $data = new payment_units;
        $data->unit_name = $req->unit_name;
        $data->name = $req->name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function opt()
    {
        //dd('hhhh');
        $da = DB::table('operator')->get();

        $data = json_decode(json_encode($da));
        // echo"<pre>";print_r($data);
        return view('Billing_file.Relationship_number', ['dat' => $data]);
    }
    public function relation_no(Request $req)
    {
        $data = new relation_number;
        $data->operator = $req->operator;
        $data->number = $req->number;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function emp(Request $req)
    {
        $data = new emp_users;
        $data->empid = $req->empid;
        $data->name = $req->name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function branches(Request $req)
    {
        $data = new branch;
        $data->branch_name = $req->branch_name;
        $data->state = $req->state;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function bill_categories(Request $req)
    {
        $data = new bill_categories;
        $data->category_name = $req->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function master_form(Request $req)
    {
        // echo"<pre>";print_r($req->branch_location); die;
        $d = $req->sr_no[0];
        // echo"<pre>";print_r($d); die;
        foreach ($req->number as $key => $dat) {
            //echo"<pre>";print_r($req->branch_location); die;
            $data = new mini_master;
            $data->number = $dat;
            $data->sr_no = $d;
            $data->operator = $req->operator_type[$key];
            $data->assigned_to = $req->assigned_to[$key];
            $data->branch_location = $req->branch_location[$key];
            $data->status = $req->status[$key];
            $data->save();
        }

        foreach ($req->sr_no as $key => $dat) {
          //  echo"<pre>";print_r($data); die;
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
           
        }
        return redirect()->back()->with('message', 'Data successfully insert');
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

        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));
        // echo"<pre>";print_r($rel);die;

        $branch = DB::table('branches')->get();
        $brh = json_decode(json_encode($branch));
        // echo"<pre>";print_r($brh);die;

        return view('Billing_file.show_master_data', ['dat' => $data, 'payment' => $pay, 'relation' => $rel, 'branch' => $brh, 'opt' => $opreter]);

    }
    public function popup($id)
    {
        // dd($id);
        $da = DB::table('master_data')->where('id', $id)->get();
        $data = json_decode(json_encode($da));
        //echo"<pre>";print_r($data);die;
        $response['data'] = $data;
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

        return view('Billing_file.mini_master_data', ['id' => $data, 'opt' => $opreter, 'branch' => $brh]);
    }

    public function mini_insert(Request $req)
    {
        // dd('gg');
        $data = new number_details;
        $data->sr_no = $req->sr_no;
        $data->operator = $req->operator;
        $data->assigned_to = $req->assigned_to;
        $data->number = $req->number;
        $data->plan_details = $req->plan_details;
        $data->branch_locaiton = $req->branch_locaiton;
        $data->status = $req->status;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }

    public function append_data()
    {
        // dd('lkjsadf');
        $datasend = "<div class='row gutters'>
        <div class='container form-sty'>
									<p><b>Number detalis</b></p>
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

							</div>
              ";
        $response['data'] = $datasend;
        $response['success'] = true;
        $response['messages'] = 'Succesfully loaded';
        return Response::json($response);

    }

// public function mini_int(){
//   dd('')
// }
}
