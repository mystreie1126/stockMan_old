<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_pick_up extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'rd_pickup_orders';
    // protected $primaryKey = 'ie_order_id';

    public function item(){
      return $this->hasMany('App\Collect_orderItem','id_order','ie_order_id');
    }
}
