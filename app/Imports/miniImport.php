<?php

namespace App\Imports;

use App\Models\mini_master;
use App\Models\emp_users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use DB;
class miniImport extends DefaultValueBinder implements ToModel,WithHeadingRow,WithCustomValueBinder,WithStartRow
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
        $exist =  mini_master::where('number', '=', (float)$row['number'])->first();
        $name =  emp_users::where('name', '=', $row['assigned_to'])->first();
        
     if($exist == '' || $exist == NULL){
        if($name){
        $emp = DB::table('emp_users')->where('name', '=',$row['assigned_to'])->select('id')->get();
         $users = json_decode(json_encode($emp));
       
         foreach ($users as $value) {
          
            $assign=$value;
            //dd($assign->id);
        }
        $branc = DB::table('branches')->where('branch_name', '=',$row['branch_location'])->select('id')->get();
        $brh = json_decode(json_encode($branc));
        // echo"<pre>";print_r($brh);die;
        foreach($brh as $location){
           $branch=$location;
        }
        //   dd($branch);
        return new mini_master([
            'sr_no'    => $row['sr_no'], 
            'assigned_to'    => $assign->id, 
            'number'    => (float)$row['number'], 
            'plan_details'    => $row['plan_details'], 
            'branch_location'    => (string)$branch->id, 
            'status'    => $row['status'], 
            'month'    => $_POST['month'], 
        ]);
    }
    }
     }
    }


