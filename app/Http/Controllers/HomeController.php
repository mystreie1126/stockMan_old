<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class HomeController extends Controller
{
    public function index(){
    	$shops = Shop::all();
    	return view('index')->with('shops',$shops);
    }
}
