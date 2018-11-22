<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
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
			    	'send_quantity' =>$request->input('send_quantity')[$x],
			    	'id_product'=>$request['id_product'][$x],
			    	'id_shop'=>$request['id_shop'][$x],
			    	'created_at'=>date(date("Y-m-d",time()))
			    ]);


           DB::table('ps_stock_available')
            ->where('id_product','=',$request['id_product'][$x])
            ->where('id_shop','=',$request['id_shop'][0])
            ->increment('quantity',$request->input('send_quantity')[$x]);

          
			}

		// $results = DB::table('sm_send')
		// 		   ->select('sm_send.send_quantity','sm_send.id_shop','sm_send.id_product')
		// 		   ->join('ps_product_lang as a','a.id_product','=','sm_send.id_product')
		// 		   ->where('sm_send.id_shop','=',1)
		// 		   // ->groupBy('sm_send.id_product')
		// 		   ->get();
		// $results = DB::table('ps_product_lang as a')
  //                  ->select('a.id_product','a.name','sm_send.send_quantity','sm_send.id_shop','sm_send.id_product as sq','ps_product.reference','ps_shop.name as shopName')
  //                  ->groupBy('a.id_product')
  //                  ->join('sm_send','sm_send.id_product','=','a.id_product')
  //                  ->join('ps_product','sm_send.id_product','=','ps_product.id_product')
  //                  ->join('ps_shop','ps_shop.id_shop','=','sm_send.id_shop')
  //                  ->orderBy('ps_product.reference')

		//       ->get();

    // $results = DB::table('ps_stock_available as a')
    //               ->select('a.id_product','a.id_shop','b.name','ps_product.reference','sm_send.send_quantity','a.id_stock_available')
    //               ->join('ps_product_lang as b','a.id_product','=','b.id_product')
    //               ->join('ps_product','a.id_product','=','ps_product.id_product')
    //               ->join('sm_send','a.id_product','=','sm_send.id_product')
    //               ->where('a.id_shop',$request['id_shop'][0])
    //               ->groupBy('a.id_product')

                  

       // $results = DB::table('sm_send')
       //           ->select('sm_send.id_product','sm_send.send_quantity','sm_send.id_shop',
       //            'b.reference','a.name','c.name as shopName','sm_send.id')
       //           ->join('ps_product_lang as a','sm_send.id_product','=','a.id_product')
       //           ->join('ps_product as b','sm_send.id_product','=','b.id_product')
       //           ->join('ps_shop as c','sm_send.id_shop','=','c.id_shop')
       //           ->where('sm_send.id_shop',$request['id_shop'][0])
       //           ->groupBy('sm_send.id_product')
       //           ->limit(count($request['id_product']))
       //            ->orderBy('sm_send.id','desc')
       //            ->get();
      // return $results;
      
    	return view('success');














    }
}
