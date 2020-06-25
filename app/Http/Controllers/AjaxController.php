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
        
        // $products = DB::table('products')->limit()->orderBy('id','DESC')->get();
        // $url  = URL::to('/');
        // dd($url);
        return view('index');

    }

    public function fetch(Request $request){

        
        // $url 
        $term = $request->term;

        $products = DB::table('products')->where('product_name','LIKE', '%'.$term.'%')->orderBy('product_name','ASC')->get();

        $output = array();
         if($products->count() > 0)
         {
          foreach($products as $row)
          {
           $temp_array = array();
           $temp_array['value'] = $row->product_name;
           $temp_array['id'] = $row->id;
           $temp_array['label'] = '<img src="'.URL::to('/').'/'.$row->image_one.'" width="70" />&nbsp;&nbsp;&nbsp;'.$row->product_name.'';
           $output[] = $temp_array;
          }
         }
         else
         {
          $output['value'] = '';
          $output['label'] = 'No Record Found';
         }

         echo json_encode($output);
              

    }




  


   

    





    

}
