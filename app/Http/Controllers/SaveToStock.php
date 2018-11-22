<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DB;

class SaveToStock extends Controller
{
    public function index(){

    	$send_record = DB::table('sm_send')->select('id','send_quantity','id_product','id_shop')->get();



    	//$data = DB::table('sm_send')->where('id','=',1)->increment('id_product',10);
   		
   		foreach($send_record as $var){
   			echo $var->id;
   		}
    	// return $send_record;

    	// return 2;
    }
}
