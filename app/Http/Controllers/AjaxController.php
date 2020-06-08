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
        $employees = DB::table('tbl_employee')->get();
        return view('index',compact('employees'));

    }

    public function fetch(Request $request){

    $employee = DB::table('tbl_employee')->where('id',$request->id)->first();
    return response()->json($employee);
       

    }


   

    





    

}
