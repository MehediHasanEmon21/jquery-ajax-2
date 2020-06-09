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
        return view('index');

    }

    public function fetch(Request $request){

    $employees = DB::table('tbl_employee')->get();
    return response()->json($employees);
       

    }


   

    





    

}
