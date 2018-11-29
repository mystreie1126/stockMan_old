<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Send_stock;
use App\Shop;
use App\Stock;
use DB;

class SendController extends Controller
{   



    public function save(Request $request){

     foreach($request['qty'] as $qty){
      if((!isset($qty) || trim($qty) === '')){
        return '<h1>Input Value Can not be Null!</h1>';
      }
     }

      
     $send_id = [];

     for($i = 0; $i < count($request['id_product']); $i++){

       $sendstock = new Send_stock;
       $sendstock->send_quantity = $request['qty'][$i];
       $sendstock->id_product = $request['id_product'][$i];
       $sendstock->id_shop =$request['id_shop'][$i];

       if($sendstock->save()){
        array_push($send_id,$sendstock->id);
       }

     }
       

      if(count($send_id) > 0){

        $results = DB::table('sm_send')->select('sm_send.id as mm','sm_send.id_product','sm_send.id_shop','ps_shop.name as shopname','sm_send.send_quantity','ps_product_lang.name','ps_product.reference')->groupBy('sm_send.id_product')
           ->join('ps_product_lang','sm_send.id_product','=','ps_product_lang.id_product')
           ->join('ps_product','ps_product.id_product','=','sm_send.id_product')
           ->join('ps_shop','sm_send.id_shop','=','ps_shop.id_shop')
           ->whereIn('sm_send.id',$send_id)


           ->get();
        //return $results;
        return view('print',compact('results'));
      }


    }



    public function updateQty(Request $request){

      for($i = 0; $i < count($request['id_product']); $i++){
         Stock::where('id_shop',$request['id_shop'][0])
         ->where('id_product',$request['id_product'][$i])
         ->increment('quantity',$request['qty'][$i]);
         
      }

    

      return redirect('/success');
    }






}
