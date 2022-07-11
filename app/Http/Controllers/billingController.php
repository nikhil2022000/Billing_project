<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operators;
use App\Models\payment_units;
use App\Models\relation_number;
use App\Models\emp_users;
use App\Models\branch;
use App\Models\bill_categories;
use App\Models\master_data;
use DB;
use Response;
class billingController extends Controller
{
    public function category()
    {
      //dd('hhhh');
      $da = DB::table('category')->get();
    
        $data=json_decode(json_encode($da));
      //  echo"<pre>";print_r($data);
        return view('Billing_file.operators',['dat'=>$data]);
    }
   public function operators(Request $req)
    {
       // echo"<pre>";print_r($_POST);die;
        $data = new operators;
       $data->operator=$req->operator;
       $data->billing_cat=$req->billing_cat;
       $data->save();
       return redirect()->back()->with('message', 'Data successfully insert');
    }


    public function payment_units(Request $req){

        $data = new payment_units;
        $data->unit_name = $req->unit_name;
        $data->name=$req->name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function opt()
    {
      //dd('hhhh');
      $da = DB::table('operator')->get();
    
       $data=json_decode(json_encode($da));
        // echo"<pre>";print_r($data);
       return view('Billing_file.Relationship_number',['dat'=>$data]);
    }
    public function relation_no(Request $req){
        $data = new relation_number;
        $data->operator=$req->operator;
        $data->number=$req->number;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function emp(Request $req){
        $data = new emp_users;
        $data->empid=$req->empid;
        $data->name=$req->name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function branches(Request $req){
        $data = new branch;
        $data->branch_name=$req->branch_name;
        $data->state=$req->state;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function bill_categories(Request $req){
        $data = new bill_categories;
        $data->category_name=$req->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
    public function master_form(Request $req){
        // dd('ff');
        $data = new master_data;
        $data->sr_no=$req->sr_no;
        $data->number=$req->number;
        $data->assigned_to=$req->assigned_to;
        $data->service_type=$req->service_type;
        $data->relationship_no=$req->relationship_no;
        $data->payment_units=$req->payment_units;
        $data->payment_mode=$req->payment_mode;
        $data->plan_details=$req->plan_details;
        $data->operator=$req->operator;
        $data->bill_date=$req->bill_date;
        $data->billing_cycle_from=$req->billing_cycle_from;
        $data->billing_cycle_to=$req->billing_cycle_to;
        $data->grace_days=$req->grace_days;
        $data->due_date=$req->due_date;
        $data->billing_type=$req->billing_type;
        $data->email=$req->email;
        $data->mobile_no=$req->mobile_no;
        $data->security_deposit=$req->security_deposit;
        $data->custmoer_gst_no=$req->custmoer_gst_no;
        $data->biller_gst_number=$req->biller_gst_number;
        $data->state=$req->state;
        $data->branch_location=$req->branch_location;
        $data->monthly_cr_limit=$req->monthly_cr_limit;
        $data->get_billing_details_from=$req->get_billing_details_from;
        $data->save();
        return redirect()->back()->with('message', 'Data successfully insert');
    }
   
    public function show(){
        // dd('ss');
        $da = DB::table('master_data')->get();
        $data=json_decode(json_encode($da));
       //echo"<pre>";print_r($data);die;

       $opt = DB::table('operator')->get();
        $opreter=json_decode(json_encode($opt));
        //echo"<pre>";print_r($opreter);die;

      $units = DB::table('payment_units')->get();
      $pay=json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;

      $un = DB::table('relation_number')->get();
      $rel=json_decode(json_encode($un));
        // echo"<pre>";print_r($rel);die;

      $branch= DB::table('branches')->get();
      $brh=json_decode(json_encode($branch));
        // echo"<pre>";print_r($brh);die;

       return view('Billing_file.show_master_data',['dat'=>$data,'payment'=>$pay,'relation'=>$rel, 'branch'=>$brh,'opt'=>$opreter]);

    }
    public function popup($id){
        // dd($id);
        $da = DB::table('master_data')->where('id',$id )->get();
        $data=json_decode(json_encode($da));
       //echo"<pre>";print_r($data);die;
       $response['data'] = $data;
       $response['success'] = true;
       $response['messages'] = 'Succesfully loaded';
       return Response::json($response);
}

}