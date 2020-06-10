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
        $products = DB::table('products')->orderBy('id','ASC')->get();
        return view('index',compact('products'));

    }

    public function fetch(Request $request){

    $product = DB::table('products')->where('id',$request->id)->first();
 
    $output = '';
     $output .= '
      <h2>'.$product->product_name.'</h2>
      <p><label>Author By - '.$product->product_code.'</label></p>
      <p>'.substr($product->product_details, 0, 100).'</p>
      ';
      $if_previous_disble = '';
      $if_next_disble = '';
      $next_data = DB::table('products')->where('id','>',$request->id)->orderBy('id')->first();
      $previous_data = DB::table('products')->where('id','<',$request->id)->orderBy('id','desc')->first();
      if (!isset($next_data)) {
          $if_next_disble = 'disabled';
      }
      if (!isset($previous_data)) {
          $if_previous_disble = 'disabled';
      }
      $check_pre = $this->checkPrevious($previous_data); 
      $check_next = $this->checkNext($next_data); 
      $output.='
           <br/><br/>
        <div align="center">
         <button type="button" name="previous" id="'.$check_pre.'" '.$if_previous_disble.' class="btn btn-warning btn-sm previous">Previous</button>
         <button type="button" name="next" id="'.$check_next.'" '.$if_next_disble.' class="btn btn-warning btn-sm next">Next</button>
        </div>
        <br /><br />
      ';
     echo $output;

    }

    function checkPrevious($data){
        if (isset($data)) {
            return $data->id;
        }else{
            return '';
        }
    }

    function checkNext($data){
        if (isset($data)) {
            return $data->id;
        }else{
            return '';
        }
    }


   

    





    

}
