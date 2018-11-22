<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SendController extends Controller
{
    public function save(Request $request){

    	$this->validate($request,[
    		'send_quantity.*'=>'required'
    	]);


    	foreach($request['send_quantity'] as $quantity){
    		if($quantity < 0){
    			return '<h1>the sending quantity must be bigger than 0!</h1>';
    		}	
    	}

    	for ($x = 0; $x < count($request['id_product']); $x++) {
			    DB::table('sm_send')->insert([
			    	'send_quantity' =>$request['send_quantity'][$x],
			    	'id_product'=>$request['id_product'][$x],
			    	'id_shop'=>$request['id_shop'][$x],
			    	'created_at'=>date(date("Y-m-d",time()))
			    ]);
			}

		// $results = DB::table('sm_send')
		// 		   ->select('sm_send.send_quantity','sm_send.id_shop','sm_send.id_product')
		// 		   ->join('ps_product_lang as a','a.id_product','=','sm_send.id_product')
		// 		   ->where('sm_send.id_shop','=',1)
		// 		   // ->groupBy('sm_send.id_product')
		// 		   ->get();
		$results = DB::table('ps_product_lang as a')
                   ->select('a.id_product','a.name','sm_send.send_quantity','sm_send.id_shop','sm_send.id_product as sq','ps_product.reference','ps_shop.name as shopName')
                   ->groupBy('a.id_product')
                   ->join('sm_send','sm_send.id_product','=','a.id_product')
                   ->join('ps_product','sm_send.id_product','=','ps_product.id_product')
                   ->join('ps_shop','ps_shop.id_shop','=','sm_send.id_shop')
                   ->orderBy('ps_product.reference')

		      ->get();


          foreach($results as $result){
            DB::table('ps_stock_available')
            ->where('id_product','=',$result->id_product)
            ->where('id_shop','=',$result->id_shop)
            ->increment('quantity',$result->send_quantity);
          }

      

    	return view('print',compact('results',$results));














    }
}
