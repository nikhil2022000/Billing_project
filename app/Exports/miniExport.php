<?php

namespace App\Exports;

use App\Models\mini_master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class miniExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $type = DB::table('emp_users') ->get();
        $dat = json_decode(json_encode($type));

        $operator = DB::table('operator') ->get();
        $opt = json_decode(json_encode($operator));
        // dd($opt);
        $branches = DB::table('branches') ->get();
        $branch = json_decode(json_encode($branches));

        $units = DB::table('payment_units')->get();
        $pay = json_decode(json_encode($units));
        //echo"<pre>";print_r($pay);die;

        $un = DB::table('relation_number')->get();
        $rel = json_decode(json_encode($un));


        // dd('dd');
        $type = DB::table('master_data')
        ->leftJoin('number_details', 'master_data.sr_no', '=', 'number_details.sr_no')
        ->get();
        $master = json_decode(json_encode($type));
        foreach($master as $data){
            $sr_no = $data->sr_no;
            $number = $data->number;
            foreach($dat as $datt){
                if ($data->assigned_to == $datt->id){
                    $assigned = $datt->name;
                }
            }
            $operator_type = $data->operator_type;
            $status = $data->status;
            foreach($pay as $payss){
                if ($data->payment_units == $payss->id){
                    $units = $payss->unit_name;
                }
            }
            
            $payment_cycle = $data->payment_cycle;
            $monthly_rental_amount = $data->monthly_rental_amount;
            $tds = $data->tds;
            $gst = $data->gst;
            $payment_mode = $data->payment_mode;
            $plan_details = $data->plan_details;
            foreach($opt as $oprat){
                if ($data->operator == $oprat->id){
                    $operator = $oprat->operator;
                    //dd($operator);
                }
            }
            $bill_date = $data->bill_date;
            $billing_cycle_from = $data->billing_cycle_from;
            $billing_cycle_to = $data->billing_cycle_to;
            $grace_days = $data->grace_days;
            $due_date = $data->due_date;
            $bill_open_password = $data->bill_open_password;
            foreach($rel as $rels){
                if ( $data->relationship_no == $rels->id){
                    $relationship_no = $rels->number;
                    //dd($operator);
                }
            }
           
            $mobile_no = $data->mobile_no;
            $dsl_id = $data->dsl_id;
            $security_deposit = $data->security_deposit;
            $registered_id = $data->registered_id;
            $custmoer_gst_no = $data->custmoer_gst_no;
            $biller_gst_number = $data->biller_gst_number;
            $state = $data->state;
            foreach($branch as $branc){
            
                if ($data->branch_location == $branc->id){
                    $branch_location = $branc->branch_name;
                }
            }
            $credit_limit = $data->credit_limit;
            $get_billing_details_from = $data->get_billing_details_from;
           
         $data=array('sr_no'=>$sr_no,'number'=>$number,'assigned_to'=>$assigned,'operator_type'=>$operator_type,'status'=>$status,'payment_units'=>$units,'payment_cycle'=>$payment_cycle,'monthly_rental_amount'=>$monthly_rental_amount,'tds'=>$tds,'gst'=>$gst,'payment_mode'=>$payment_mode,'plan_details'=>$plan_details,'operator'=>$operator,'bill_date'=>$bill_date,'billing_cycle_from'=>$billing_cycle_from,'billing_cycle_to'=>$billing_cycle_to,'grace_days'=>$grace_days,'due_date'=>$due_date,'bill_open_password'=>$bill_open_password,'relationship_no'=>$relationship_no,'mobile_no'=>$mobile_no,'dsl_id'=>$dsl_id,'security_deposit'=>$security_deposit,'registered_id'=>$registered_id,'custmoer_gst_no'=>$custmoer_gst_no,'biller_gst_number'=>$biller_gst_number,'state'=>$state,'branch_location'=>$branch_location,'credit_limit'=>$credit_limit,'get_billing_details_from'=>$get_billing_details_from);
         $mast[]=$data;

        }
        return collect($mast);
    }
    public function headings(): array
    {
        return [
            'sr_no',
            'number',
            'assigned_to',
            'operator_type',
            'status',
            'payment_units',
            'payment_cycle',
            'monthly_rental_amount',
            'tds',
            'gst',
            'payment_mode',
            'plan_details',
            'operator',
            'bill_date',
            'billing_cycle_from',
            'billing_cycle_to',
            'grace_days',
            'due_date',
            'bill_open_password',
            'relationship_no',
            'mobile_no',
            'dsl_id',
            'security_deposit',
            'registered_id',
            'custmoer_gst_no',
            'biller_gst_number',
            'state',
            'branch_location',
            'credit_limit',
            'get_billing_details_from',
        ];
    }
}
