<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customer_payment extends Controller
{
    
    public function customerPayment(){

    	return view('customer-payment.customer_payment');
    }


   public function customerPaymentPost(){
        
      $id = decodeToBase64(request('customer_id'));

      $data = \App\sent_quotation_data::where('customer_id',$id)->get()->take(1);     

      if(count($data) == 0){


        $base = \URL::to('/quotation');


        return redirect()->back()->with('error','Please Send Quotation First <a href="'.$base.'"> Send Quotation Here</a>');

      	  //$data = [];
           
           $data = [

               	'customer_id'=>'',
               	'customer_name'=>'',
               	'company_name'=>'',
               	'email'=>'',
               	'phone'=>'',
                'generated_table'=>'',
               ] ;

          $data = collect($data);  

          //dd($data);
       }

       $data2 = \App\all_cashiers::all();

       $customerPayment = \App\customer_payment::where('customer_id',$id)->orderBy('id','desc')->get();

      //dd($data); 

      return view('customer-payment.customer_posted_payment')
        ->with('data',$data)
        ->with('data2',$data2)
        ->with('data3',$customerPayment);  
      ;
   }

   public function saveCustomerPaymentData(Request $request){


      $cnt = \App\customer_payment::where('customer_id',request('customer_id'))->count();

      if($cnt > 0){
       
          \App\customer_payment::where('customer_id',request('customer_id'))->update($request->except(['_token','balance_sheet_to_be_sent']));         

      }else{

         \App\customer_payment::create($request->except(['balance_sheet_to_be_sent']));    
      }


       $usableVariables = ['from'=>'support@ebsprints.com','email'=>['hemanth@ebsprints.com','hr@ebsprints.com']];


       $balanceSheet = request('balance_sheet_to_be_sent');


       \Mail::send('payment_template.payment',['paymentTable'=>$balanceSheet],function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from($usableVariables['from'], 'Enigma Brand Solutions Pvt Ltd.');  

         $message->to($usableVariables['email'])->subject('Payment Acknowledgement');

         // $message->setBody('<strong>Quotation For Customer:</strong><span style="color:red;">'.$usableVariables["customer_id"].'</span>'.$usableVariables['table'], 'text/html');   


           //$message->attach($usableVariables['genfile']);   


      });  


     // echo json_encode(array('all'=>$request->all(),'bool'=>$bool));


      echo json_encode(array('message'=>'Customer Payment Has Been Saved Successfully','success'=>'success'));
   }
}
