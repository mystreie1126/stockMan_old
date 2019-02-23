<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class HomeController extends Controller
{

    public function index(){
      return view('index');
    }

    public function replishment(){
    	$shops = Shop::all();
    	return view('selling_by_date')->with('shops',$shops);
    }
}
