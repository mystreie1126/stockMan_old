<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Order_pick_up;
use DB;
class SalesController extends Controller
{
     public function showSelling(Request $request){



      $date_from = date('Y-m-d',strtotime($request->dateStart)).' '.$request->timeStart;
      $date_to   = date('Y-m-d',strtotime($request->dateEnd)).' '.$request->timeEnd;

    	$shop_id = $request->shop_id;
    	$shop_name = Shop::where('id_shop',$shop_id)->pluck('name')[0];
    	$condition = [
    		'start_date' => $date_from,
    		'end_date' => $date_to,
    		'shop_id' => $shop_id,
    		'shop_name'=>$shop_name
    	];



    	$sales_products = DB::table('ps_order_detail as X')
		       ->select('X.id_order','X.id_shop','X.product_id','X.product_reference',
		       	'X.product_name',DB::raw('sum(X.product_quantity) as quantity','X.product_id'),'ps_orders.date_add as Date')
		       ->groupBy('X.product_id')
		       ->join('ps_orders','X.id_order','=','ps_orders.id_order')
		       ->where('X.product_name','not like','%test%')
		       ->where('X.id_shop',$shop_id)
		       ->where('ps_orders.date_add','>=',$date_from)
		       ->where('ps_orders.date_add','<=',$date_to)
		       ->orderBy('X.product_reference','desc')
		       ->get();


        $collect = DB::connection('mysql2')
            ->table('ps_order_detail as b')
            ->select('b.id_order','b.product_id','b.product_name','b.product_reference',
                  DB::raw('sum(b.product_quantity) as qty'))
             ->groupBy('b.product_id')
            ->join('rd_pickup_orders as a','a.ie_order_id','b.id_order')
            ->where('a.pos_shop_id',$shop_id)
   		       ->where('a.created_at','>=',$date_from)
   		       ->where('a.created_at','<=',$date_to)
            ->get();

      //return $collect;
    	return view('sales',compact('sales_products','condition','collect'));
    }
}
