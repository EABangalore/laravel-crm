<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerStatusController extends Controller
{
   
   public function sendCustomerStatus(){

   	  $data = \App\new_job::find(request('job_id'));

   	  $customer = \App\new_customer::find(request('customer_id'));


   	  if($customer->email != ''){

            $usableVariables = ['genfile'=>'ggs','email'=>$customer->email];     


		       \Mail::send('status_template.send_customer_status', ['data'=>$data], function ($message) use ($usableVariables) {
		         
		          //$publicPath = public_path(); 

		         $message->from('ejazanwar777@gmail.com', 'Enigma Brand Solutions Pvt Ltd');

		         $message->to($usableVariables['email'])->subject('The subject');


		           //$message->attach($usableVariables['genfile']);   


		      }); 



		    \App\new_job::find(request('job_id'))->update(['sent_status_date'=>\DB::raw('CURRENT_TIMESTAMP')]);



		return redirect()->back()->with('message', 'Email Has been Sent  Successfully!'); // success 
   	  }else{

   	   return redirect()->back()->with('error', 'Unable to send status due to some Error!'); // failure
   	  }

   }


   public function sendCustomerQuotation(){

   	      $quotationData = \App\sent_quotation_data::where('customer_id',request('customer_id'))->first();


           $usableVariables = ['from'=>'support@ebsprints.com','email'=>[$quotationData->email,'hemanth@ebsprints.com','hr@ebsprints.com']];


	     \Mail::send('status_template.send_customer_quotation', ['data'=>$quotationData], function ($message) use ($usableVariables) {
		         
		          //$publicPath = public_path(); 

		         $message->from($usableVariables['from'], 'Enigma Brand Solutions Pvt Ltd');

		         $message->to($usableVariables['email'])->subject('Quotation');


		           //$message->attach($usableVariables['genfile']);   


		 }); 


	    return redirect()->back()->with('message', "Quotation to $quotationData->customer_name  Has been Sent  Successfully!"); // success 
   }

}
