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

    public function add(Request $request){

        DB::table('comments')
              ->insert([
                'comment_subject' =>$request->subject,
                'comment_text' => $request->comment
                  
                ]);

    }

    public function load(){

        $comment = DB::table('comments')->where('comment_status',0)->orderBy('comment_id','DESC')->first();
        $output='';
        if (isset($comment)) {
            $output .= '
             <div class="alert alert_default">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p><strong>'.$comment->comment_subject.'</strong>
               <small><em>'.$comment->comment_text.'</em></small>
              </p>
             </div>';
          DB::table('comments')->where('comment_id',$comment->comment_id)->update(['comment_status' => 1]);
        }
 

        
        echo $output;

    }


  


   

    





    

}
