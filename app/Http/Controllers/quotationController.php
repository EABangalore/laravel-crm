<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class quotationController extends Controller
{


  public function allQuotation(){
    
     //  $data = \App\sent_quotation_data::orderBy('id','desc')->paginate(100);

  	  // // $data = \DB::select('SELECT nc.*,sqd.* FROM new_customer nc INNER JOIN sent_quotation_data sqd on nc.id = sqd.customer_id');
     //    $i = 0;
  	  // foreach($data as $dat){
        
     //      $totalPrice = json_decode($dat->quotation_data); 
          
     //     // dd($totalPrice->gst[0]->Amount);

     //      $total = @$totalPrice->gst[0]->Amount;  

     //      $data[$i]['net_price'] = $total;

     //      $i++;

  	  // } 


       $data = \DB::table('sent_quotation_data') 
        ->join('customer_payment', 'customer_payment.customer_id', '=', 'sent_quotation_data.customer_id')
        ->orderBy('sent_quotation_data.id', 'desc')
        ->select('sent_quotation_data.*','customer_payment.total_amount','customer_payment.total_balance','customer_payment.total_recieved_amount')
        ->paginate(300);  

       // dd($data);   

  	  //dd($data);  


      return view('quotation.all_quotation',['data'=>$data]);  

  }
  
  public function index(){

   	   $data = \App\products::orderBy('id','desc')->get();


       return view('quotation',['data'=>$data]);   
   }


   public function showCustomerById(Request $request){  // post method 

   	   $customerId = $_POST['customer_id'];

   	   $id = decodeToBase64($customerId);
       
       $data = \App\new_customer::find($id);

       $data['customer_hash_id'] = $customerId;    


       if($request->ajax()){

       	    $count = count($data);

             if($count){

                echo json_encode(array('data'=>$data,'count'=>$count,'ejaz'=>'say hi'));   

             }else{
               
                echo json_encode(array('data'=>$data,'count'=>$count));
             }
          
        }else{
          
            return view('quotation',['data'=>$data]);  
        }
      
   }

   public function sentQuotation(){


      $data = \App\sent_quotation_data::where('status','sent')->paginate(300);  

      return view('quotation.common_quotation',['data'=>$data]);

   }

   public function approvedQuotation(){

       $data = \App\sent_quotation_data::where('status','approved')->paginate(300);  

       return view('quotation.common_quotation',['data'=>$data]);  

   }

   public function followUpQuotation(){
   
       $data = \App\sent_quotation_data::where('status','followup')->paginate(300);  

       return view('quotation.common_quotation',['data'=>$data]); 

   }


   private function sendQuotationGenerated($quotationTable,$customerId,$emailId){

     $customerId = encodeToBase64(request('customer_id'));    


      $usableVariables = ['table'=>$quotationTable,'from'=>'support@ebsprints.com','customer_id'=>$customerId,'email'=>[$emailId,'hemanth@ebsprints.com','hr@ebsprints.com']];     


       \Mail::send([],[],function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from($usableVariables['from'], 'Enigma Brand Solutions Pvt Ltd.');  

         $message->to($usableVariables['email'])->subject('The subject');

         $message->setBody('<strong>Quotation For Customer:</strong><span style="color:red;">'.$usableVariables["customer_id"].'</span>'.$usableVariables['table'], 'text/html');   


           //$message->attach($usableVariables['genfile']);   


      }); 

   }


 private function sendQuotationGeneratedToUsOnly($quotationTable,$customerId){

     $customerId = encodeToBase64(request('customer_id'));    


      $usableVariables = ['table'=>$quotationTable,'from'=>'support@ebsprints.com','customer_id'=>$customerId,'email'=>['hemanth@ebsprints.com','hr@ebsprints.com']];


       \Mail::send([],[],function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from($usableVariables['from'], 'Enigma Brand Solutions Pvt Ltd.');  

         $message->to($usableVariables['email'])->subject('The subject');

         $message->setBody('<strong>Quotation For Customer:</strong><span style="color:red;">'.$usableVariables["customer_id"].'</span>'.$usableVariables['table'], 'text/html');   


           //$message->attach($usableVariables['genfile']);   


      }); 

   }

   // public function saveQuotation(Request $request){


   // 	     \App\sent_quotation_data::create(['generated_table' => request('generated_table'),'customer_id'=>request('customer_id'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address')]); 

   //       $this->sendQuotationGenerated(request('generated_table'),request('customer_id'));    

   // 	     echo json_encode(array('error'=>1,'message'=>'Data has been saved successfully','status'=>'success'));
   // }


   public function product_crud(){

   	  $data = \App\products::orderBy('id','desc')->paginate(300);

      return view('product_crud_show_all',['data'=>$data]);  
   }


   public function editProduct(){

      $bool = \App\products::where('id', request('product_id'))->update(['product_name'=>request('product_name'),'price'=>request('price'),'project_description'=>request('project_description')]); 

       if($bool){

       	  echo json_encode(array('error'=>0));
       }else{
       	  echo json_encode(array('error'=>1));
       }
   }


   public function Saveproduct(Request $request){
      $bool = \App\products::create($request->all());

      if($bool){
      	echo json_encode(array('error'=>0));
      }else{
      	echo json_encode(array('error'=>1));  
      } 
   }

   public function deleteProduct(){

      $bool = \App\products::find(request('product_id'))->delete(); 
      
       if($bool){
      	echo json_encode(array('error'=>0));
      }else{
      	echo json_encode(array('error'=>1));  
      }  	   
   }


  // revised quotation related code  ------

   public function revisedQuotation(){

       $data = \App\products::orderBy('id','desc')->get();
       return view('quotation.revised_quotation',['data'=>$data]);   
   }


  public function updateRevisedQuotation(Request $request){  // post method 

       $customerId = $_POST['customer_id'];

       $id = decodeToBase64($customerId);
       
       $data = \App\new_customer::find($id);

       $data['customer_hash_id'] = $customerId;  


      $quotationData = \App\sent_quotation_data::where('customer_id',$id)->get(); 
      $data['quotationTable'] = @$quotationData[0]->generated_table; 


       if($request->ajax()){

            $count = count($data);

             if($count){

                echo json_encode(array('data'=>$data,'count'=>$count,'ejaz'=>'say hi'));   

             }else{
               
                echo json_encode(array('data'=>$data,'count'=>$count));
             }
          
        }else{
          
            return view('quotation',['data'=>$data]);  
        }
      
   }


  public function saveRevisedQuotation(Request $request){ 


  $count = \App\sent_quotation_data::where('customer_id',request('customer_id'))->count();

    if($count > 0){

       \App\sent_quotation_data::where('customer_id',request('customer_id'))->update(['generated_table' => request('generated_table'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address'),'gst_percentage'=>request('gst_percentage')]); 

     }else{
      
             \App\sent_quotation_data::create(['customer_id' => request('customer_id'),'generated_table' => request('generated_table'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address'),'gst_percentage'=>request('gst_percentage')]);   

      }  


         $this->sendQuotationGeneratedToUsOnly(request('generated_table'),request('customer_id'));    

         echo json_encode(array('error'=>0,'message'=>'Data has been saved successfully','status'=>'success'));     

   }


  public function saveRevisedQuotationNotify(){
      
        $data = \App\sent_quotation_data::where('customer_id',request('customer_id'))->first();

       // echo json_encode(array('ss'=>$data));

      // if($data->generated_table != ''){

      //        \App\sent_quotation_data::where('customer_id',request('customer_id'))->update(['generated_table' => request('generated_table'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address')]); 
      //   }else{

      //      \App\sent_quotation_data::create(['generated_table' => request('generated_table'),'customer_id'=>request('customer_id'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address')]);

      //      echo json_encode(array('dat'=>'save'));
      //   }


        if(count($data)){
          
         //\App\sent_quotation_data::where('customer_id',request('customer_id'))->delete();


          $savedData = \App\sent_quotation_data::where('customer_id',request('customer_id'))->update(['generated_table' => request('generated_table'),'customer_id'=>request('customer_id'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address')]);    

          if($savedData){
               
                $this->sendQuotationGenerated(request('generated_table'),request('customer_id'),$data->email);

                echo json_encode(array('error'=>0,'message'=>'Your Quotation has Been Saved!!!'));
            }else{
              echo json_encode(array('error'=>0,'message'=>'Your Quotation has Been Saved!!!'));
            }

         }else{

              \App\sent_quotation_data::create(['generated_table' => request('generated_table'),'customer_id'=>request('customer_id'),'quotation_data'=>json_encode(request('quotation_data')),'customer_name'=>request('customer_name'),'company_name'=>request('company_name'),'email'=>request('email'),'phone'=>request('phone'),'product_name'=>request('product_name'),'product_description'=>request('product_description'),'address'=>request('address')]);  
           

           $this->sendQuotationGenerated(request('generated_table'),request('customer_id'),$data->email);

               echo json_encode(array('error'=>0,'message'=>'Your Quotation has Been Saved!!!'));
         }



         //sendQuotationGenerated(table,customerId,customer_email);

        // echo json_encode(array('error'=>1,'message'=>'Data has been saved successfully','status'=>'success'));     
  }


 public function readyForQuotation(){

    $data = \App\new_customer::where('priority','readyForQuotation')->orderBy('id','desc')->paginate(300);
    
       return view('quotation.ready_for_quotation',['data'=>$data]);

  }


  // edit quotation


  public function editQuotation($id){ 

           $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

           $data = \App\sent_quotation_data::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }
    }



   public function filterQuotations(){

      $total = \App\sent_quotation_data::all()->count();

      if(trim(request('filter_data')) == 'all'){
         
         $data = \App\sent_quotation_data::orderBy('id','desc')->paginate(300);

         $thisCount = count($data);

       }else{

         $data = \App\sent_quotation_data::where('status',request('filter_data'))->orderBy('id','desc')->paginate(300);

         $thisCount = count($data);   

       }
      
       return view('quotation.common_quotation',['data'=>$data,'pagination'=>'yes','totalRecord'=>$total,'recordCount'=>$thisCount]); 


    }


   public function deleteQuotation(){   
 

       $bool = \App\sent_quotation_data::find(request('row_id'))->delete(); 


       if($bool){

                echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
       }else{
              echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
       }
    }

}
