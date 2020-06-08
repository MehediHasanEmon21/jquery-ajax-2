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

    public function update(Request $request){

       DB::table('employee')
                    ->where('id',$request->employee_id)
                    ->update([
                        'name' => $request->name,
                        'gender' => $request->gender,
                        'designation' => $request->designation,
                    ]);
    $employee = DB::table('employee')->where('id',1)->first();
    return response()->json($employee);
       

    }


   

    





    

}
