<?php

namespace App\Http\Controllers;


use App\AjaxCrud;
use App\DynamicField;
use App\ProductFilter;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){


        
        $data['products'] = DB::table('product_filter')->get();
        $data['product_ram'] = DB::table('product_filter')->select('product_ram')->groupBy('product_ram')->get();
        $data['product_brand'] = DB::table('product_filter')->select('product_brand')->groupBy('product_brand')->get();
        $data['product_storage'] = DB::table('product_filter')->select('product_storage')->groupBy('product_storage')->get();
        $data['min_price'] = DB::table('product_filter')->min('product_price');
        $data['max_price'] = DB::table('product_filter')->max('product_price');
     
        return view('index',$data);

    }

    public function fetch(Request $request){

      


       
       $products = ProductFilter::where(function($query) use ($request){

       

        if(isset($request->minimum_price) && isset($request->maximum_price)){

          if (isset($request->brand)) {

            
             $query->whereIn('product_brand',$request->brand);
             $query->where('product_price','>=',$request->minimum_price);
             $query->where('product_price','<=',$request->maximum_price);
          

            
          }

          if (isset($request->ram)) {

            
             $query->whereIn('product_ram',$request->ram);
             $query->where('product_price','>=',$request->minimum_price);
             $query->where('product_price','<=',$request->maximum_price);
          

            
          }

          if (isset($request->storage)) {

            
             $query->whereIn('product_storage',$request->storage);
             $query->where('product_price','>=',$request->minimum_price);
             $query->where('product_price','<=',$request->maximum_price);
          

            
          }


          $query->where('product_price','>=',$request->minimum_price);
          $query->where('product_price','<=',$request->maximum_price);
        }

      })->get();

       $output = '';

       if (count($products) > 0) {
         foreach($products as $row)
        {
          $output .= '
          <div class="col-sm-4 col-lg-3 col-md-3">
            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
              <img src="/filter/img/'. $row->product_image .'" alt="" class="img-responsive" >
              <p align="center"><strong><a href="#">'. $row->product_name .'</a></strong></p>
              <h4 style="text-align:center;" class="text-danger" >'. $row->product_price.'</h4>
              <p>Camera : '. $row->product_camera.' MP<br />
              Brand : '. $row->product_brand .' <br />
              RAM : '. $row->product_ram .' GB<br />
              Storage : '. $row->product_storage .' GB </p>
            </div>

          </div>
          ';
        }
       }else{
          $output = '<h3>No Data Found</h3>';
       }

       echo $output;
       

        

        

       





       
    }




  


   

    





    

}
