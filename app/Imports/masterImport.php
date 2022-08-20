<?php

namespace App\Imports;

use App\Models\master_data;
use App\Models\emp_users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use DB;
class masterImport extends DefaultValueBinder implements ToModel,WithHeadingRow,WithCustomValueBinder,WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

public function headingRow(): int
    {
        return 1;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        //  dd($row);
        $num =  master_data::where('number', '=', (float)$row['number'])->first();
        $name_con =  emp_users::where('name', '=', $row['assigned_to'])->first();
        
     if($num == '' || $num == NULL){
        // dd('dd');
        if($name_con){
        // dd('dd');

            $opt = DB::table('operator')->where('operator', '=',$row['operator'])->select('id')->get();
            $opre = json_decode(json_encode($opt));
            foreach ($opre as $opt) {
                $oprater_number= $opt;
            }
        //  echo"<pre>";print_r($oprater_number);die;

        $unit = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($unit));
        foreach($pay as $pay){
            if ($pay->unit_name == $row['payment_units']) {
                $units = $pay->id;
            }
        }
        // echo"<pre>";print_r($units);die;

        $emp = DB::table('emp_users')->where('name', '=',$row['assigned_to'])->select('id')->get();
        $users = json_decode(json_encode($emp));
        foreach ($users as $value) {
           $assigned =$value;
       }
        // echo"<pre>";print_r($assigned->id);die;
       $un = DB::table('relation_number')->where('number', '=',(float)$row['relationship_no'])->select('id')->get();
       $rel = json_decode(json_encode($un));
       foreach ($rel as $rels) {
           $relationship_number= $rels;
       }
        $branc = DB::table('branches')->get();
        $brh = json_decode(json_encode($branc));
        // echo"<pre>";print_r($brh);die;
        foreach($brh as $brh){
            if ($brh->branch_name == $row['branch_location']) {
                $branch = $brh->id;
            }
        }
        $da = DB::table('master_data')->latest("sr_no")->first();
        $sr_no = json_decode(json_encode($da));
        $mini = sprintf('%05d',0);
        if($sr_no == ''){
            $sk=1;
        }
        if($sr_no != ''){
            $count = $sr_no->sr_no +  $mini;
            $sk = $count + 1;
            // dd($sk);
        }
    //    dd($row['state']);
        $minicount = sprintf('%05d',$sk);
        
       $a = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['bill_date']);
       $bill_date = $a->format('Y-m-d');
       $b=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['billing_cycle_to']);
       $billing_cycle_to = $b->format('Y-m-d');
        $c=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['billing_cycle_from']);
        $billing_cycle_from = $c->format('Y-m-d');
       $d= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date']);
       $due_date = $d->format('Y-m-d');
        return new master_data([
           
            'sr_no'  => $minicount,
            'number'  => (float)$row['number'],
            'assigned_to'  => (string)$assigned->id,
            'operator_type'  => $row['operator_type'],
            'status'  => $row['status'],
            'payment_units'  => (string)$units,
            'payment_cycle'  => $row['payment_cycle'],
            'monthly_rental_amount'  => (float)$row['monthly_rental_amount'],
            'tds'  =>(float) $row['tds'],
            'gst'  => $row['gst'],
            'payment_mode'  => $row['payment_mode'],
            'plan_details'  => $row['plan_details'],
            'operator'  => (string)$oprater_number->id,
            'bill_date'  =>$bill_date,
            'billing_cycle_to'  =>$billing_cycle_to ,
            'billing_cycle_from'  => $billing_cycle_from ,
            'grace_days'  => $row['grace_days'],
            'due_date'  => $due_date,
            'bill_open_password'  => $row['bill_open_password'],
            'relationship_no'  => (string) $relationship_number->id,
            'mobile_no'  =>(float) $row['mobile_no'],
            'dsl_id'  =>(float) $row['dsl_id'],
            'security_deposit'  => (float)$row['security_deposit'],
            'registered_id'  => $row['registered_id'],
            'custmoer_gst_no'  => $row['custmoer_gst_no'],
            'biller_gst_number'  => $row['biller_gst_number'],
            'state'  =>$row['state'],
            'branch_location'  => (string)$branch,
            'credit_limit'  => (float)$row['credit_limit'],
            'get_billing_details_from'  => $row['get_billing_details_from'],
             
        ]);
    }
}
}
}

