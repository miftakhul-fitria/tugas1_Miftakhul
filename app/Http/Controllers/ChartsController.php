<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChartsController extends Controller
{
	public function index(){
		$title = 'Dashboard';
		$data = DB::table('t-pesanan')
       ->select(
        DB::raw('grand_total as grand_total'),
        DB::raw('count(*) as number'))
       ->groupBy('grand_total')
       ->get();
     $array[] = ['Created At', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->grand_total, $value->number];
     }
     // return view('chart',compact('title','grand_total', json_encode($array)));
     return view('chart', compact('title'))->with('grand_total', json_encode($array));
	}
}
