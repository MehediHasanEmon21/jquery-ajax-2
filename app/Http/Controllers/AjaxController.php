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
        
        $products = DB::table('products')->limit(4)->orderBy('id','DESC')->get();
        return view('index',compact('products'));

    }

    public function fetch(Request $request){

        

        $products = DB::table('products')->where('id','<',$request->last_id)->limit(4)->orderBy('id','DESC')->get();


            foreach ($products as $key => $product) {
              $id = $product->id;
            }
     
        

        $view = view("fetch",compact('products'))->render();
        return response()->json(['html'=>$view,'id' => $id, 'count' => $products->count()]);
        // return view('fetch',compact('products'));
              

    }




  


   

    





    

}
