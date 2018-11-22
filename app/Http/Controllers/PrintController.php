<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PrintController extends Controller
{
    public function showprint(){


       $results = DB::table('sm_send')
                 ->select('sm_send.id_product','sm_send.send_quantity','sm_send.id_shop',
                  'b.reference','a.name','c.name as shopName','sm_send.id')
                 ->join('ps_product_lang as a','sm_send.id_product','=','a.id_product')
                 ->join('ps_product as b','sm_send.id_product','=','b.id_product')
                 ->join('ps_shop as c','sm_send.id_shop','=','c.id_shop')
                
                 ->groupBy('sm_send.id_product')
                 // ->limit(count($request['id_product']))
                  ->orderBy('sm_send.id','desc')
                  ->get();

        return view('print',compact('results',$results));
    }
}
