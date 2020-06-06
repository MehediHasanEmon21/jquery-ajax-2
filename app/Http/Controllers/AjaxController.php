<?php

namespace App\Http\Controllers;


use App\AjaxCrud;
use App\DynamicField;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){
        $countries = DB::table('tbl_employee')->get();
        return view('index',compact('countries'));

    }

    public function delete(Request $request){

        $ids = $request->id;
        foreach ($ids as $id) {
            DB::table('tbl_employee')->where('id',$id)->delete();
        }
       

    }


   

    





    

}
