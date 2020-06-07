<?php

namespace App\Http\Controllers;


use App\AjaxCrud;
use App\DynamicField;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){
        $products = DB::table('tbl_product')->get();
        return view('index',compact('products'));

    }

    public function fetchProduct(Request $request){

        $price = $request->price;
        
        $path = URL::to('/images');
        $products = DB::table('tbl_product')->where('product_price','<=',$price)->orderBy('product_id','DESC')->get();
        return response()->json([
            'products' => $products,
            'price' => $price,
            'path' => $path,
        ]);
       

    }


   

    





    

}
