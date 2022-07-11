<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $da = DB::table('operator')->get();
        $data=json_decode(json_encode($da));
      //  echo"<pre>";print_r($data);

      $units = DB::table('payment_units')->get();
      $pay=json_decode(json_encode($units));

      $un = DB::table('relation_number')->get();
      $rel=json_decode(json_encode($un));

      $branch= DB::table('branches')->get();
      $brh=json_decode(json_encode($branch));

        return view('Billing_file.Dashboard',['dat'=>$data, 'payment'=>$pay,'relation'=>$rel, 'branch'=>$brh]);
    }
}
