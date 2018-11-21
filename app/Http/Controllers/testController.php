<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testController extends Controller
{

	public $shops = [
		'kiosk' => 25,
		'mill' =>26,
		'Aahlone' => 27,
		'eyreSquare'=> 28,
		'arthusQuay'=>29,
		'gorey'=>30

	];
    /*  
	   SELECT a.product_id, 
       a.product_name, 
       a.product_reference,
       Sum(a.product_quantity),
       a.date_add
FROM   (SELECT ps_order_detail.id_order, 
               ps_order_detail.id_shop, 
               product_id, 
               product_name, 
               product_quantity, 
               product_reference, 
               ps_orders.date_add 
        FROM   `ps_order_detail` 
               JOIN ps_orders 
                 ON ps_order_detail.id_order = ps_orders.id_order 
        WHERE  ps_order_detail.id_shop = 25 and ps_orders.date_add > '2018-11-10') AS a 
GROUP  BY a.product_name 
ORDER  BY `a`.`product_id` ASC
    */

	public function test(){

		$date = '2018-11-10';

		$results = DB::table('ps_order_detail as X')
		       ->select('X.id_order','X.id_shop','X.product_id','X.product_reference',
		       	'X.product_name',DB::raw('sum(X.product_quantity) as quantity','X.product_id'),'ps_orders.date_add as Date')
		       ->groupBy('X.product_id')
		       ->join('ps_orders','X.id_order','=','ps_orders.id_order')
		       ->where('X.product_name','not like','%test%')
		       ->where('X.id_shop',$this->shops['kiosk'])
		       ->orderBy('X.product_reference')
		       ->get();
		

		
		return view('test')->with('results',$results);
		return $results;
	}



}
