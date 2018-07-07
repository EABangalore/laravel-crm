<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_management extends Controller
{
    
    public function index(){

    	$data = \App\User::paginate(300);

     // dd($data);

    	return view('user_management.user_base',['data'=>$data]);   
    }

   public function userEdit(){

    	   $data = \App\User::where('id', request('user_id'))->update([request('column')=>request('data')]); 

          if($data){
                 echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
           }else{
                echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
          }
    }


    public function userDelete(){
      
         $bool = \App\User::find(request('user_id'))->delete(); 

	     if($bool){  
	        echo json_encode(array('error'=>0));
	      }else{
	        echo json_encode(array('error'=>1));  
	      }  

    }

    public function userRole(){
     

          $data = \App\User::where('id', request('user_id'))->update(['role'=>request('role')]); 

          if($data){
                 echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
           }else{
                echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
          }

    }

}
