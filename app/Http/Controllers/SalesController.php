<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
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

		// $sales_products = DB::table('ps_orders as X')
		// 	   ->select('X.id_order','X.date_add')
		// 	   ->where('X.date_add','>=',$date_from)
		// 	   ->get();



	    //return $sales_products;
    	return view('sales',compact('sales_products','condition'));
    }
}
