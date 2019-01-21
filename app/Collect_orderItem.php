<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect_orderItem extends Model
{
  protected $connection = 'mysql2';
  protected $table = 'ps_order_detail';
}
