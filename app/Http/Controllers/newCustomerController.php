<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class newCustomerController extends Controller
{
   

  public function index(){

      $products = \App\products::all();
          
      return view('new_customer',['data'=>$products]);

   }

  public function readyForQuotation(){

      $data = \App\new_customer::where('priority','readyForQuotation')->orderBy('id','desc')->paginate(300);

      return view('all_customer_data',['data'=>$data,'pagination'=>1]);

  }


  public function holdForQuotation(){

      $data = \App\new_customer::where('priority','holdFor')->orderBy('id','desc')->paginate(300);

      return view('all_customer_data',['data'=>$data,'pagination'=>1]);

  }


  public function showAllTodayCustomer(){

          $showAllTodayCustomer = \DB::select(\DB::raw('select * from `new_customer` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())'));

          $collection = collect($showAllTodayCustomer);


        return view('all_customer_data',['data'=>$collection,'pagination'=>0]);


  }


  private function sendEmailForNewRegistration($data = []){ 
 

       $usableVariables = ['genfile'=>'ggs','email'=>'ejazanwar777@gmail.com'];


       \Mail::send('general-email.new_customer_data', ['data'=>$data], function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from('ejazanwar777@gmail.com', 'My Email');

         $message->to($usableVariables['email'])->subject('The subject');


           //$message->attach($usableVariables['genfile']);   


      }); 

  }

  public function createNewCustomer(Request $request){   // post new customer
      
        


         $email = implode(',',$_POST['email']); 

          $phone = implode(',',$_POST['phone']);

          $count = count($_POST['zip']);

          //dd(implode(',',$_POST['product_name']));

          //dd($count);  

          $addressesResult = [];


          for($i = 0; $i < $count; $i++){
               

            $addressesResult[] = [
                  
                  'addresstype'=> @$_POST['addresstype'][$i],
                     
                  'attention_to'=> @$_POST['attention_to'][$i],

                  'street'=> @$_POST['street'][$i],

                  'another_street'=> @$_POST['another_street'][$i],

                  'city'=> @$_POST['city'][$i],

                  'state'=> @$_POST['state'][$i],

                  'zip'=> @$_POST['zip'][$i],

                  'country'=> @$_POST['country'][$i],

                  'ext' => @$_POST['ext'][$i],

                  'phone_group' => @$_POST['phone_group'][$i],

                  'email'=> @$email,

                  'phone'=> @$phone,

                  //'primary_name'=> @$_POST['primary_name'],
                  'lead' => @$_POST['lead'],

                  'priority' => @$_POST['priority'],

                  'company_name' => @$_POST['company_name'],

                  'contact_name' => @$_POST['contact_name'],

                 // 'name' => @$_POST['name'],

                  'refrer_name' => @$_POST['refrer_name'],

                 'product_name' => implode(',',$_POST['product_name']),//$_POST['product_name'],

                  'product_description' => $_POST['product_description'],

                'hold_from' => ($_POST['hold_from'] != '') ? $_POST['hold_from'] : NULL,//@trim($_POST['hold_from']),

                  'hold_to' => ($_POST['hold_to'] != '') ? $_POST['hold_to'] : NULL,//@trim($_POST['hold_to']),   

                  //'project_name' => $_POST['project_name'],  

            ];    

          }



          foreach($addressesResult as $arr){

           $res = \App\new_customer::create($arr);   // actually model is it is new_job


          }
         
         $addressesResult[0]['id'] = $res->id;

         //dd($addressesResult[0]);

         $this->sendEmailForNewRegistration($addressesResult[0]);

        return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
        
  }


  public function customerIsReadyForQuotation(Request $request){

      if ($request->has('uul')) {
          
           $customerId = decodeToBase64($request->input('uul'));  


           //dd($request->input('uul'));

           //dd(Carbon::now());

           // $bool = \App\new_customer::where('id',$customerId)->update(['priority'=>'readyForQuotation']);


           // $customer = \App\new_customer::find($customerId);
           // $customer->priority = 'readyForQuotation';
           // $customer->save(); 

           \App\new_customer::find($customerId)->update(['priority' => 'readyForQuotation']);


           //\App\new_customer::find($customerId)->touch();  

            return view('thankyou.thankyou');

      }else{
         return redirect()->back();
      }

  }


  public function  showAllCustomers(){
    
     $data = \App\new_customer::paginate(300); 

     return view('show_all_customers',['data'=>$data]);  
  }


  public function deleteCustomer(){

       $id = $_POST['customer_id'];

      $bool = \App\new_customer::find($id)->delete();

     if($bool){  
        echo json_encode(array('error'=>0));
      }else{
        echo json_encode(array('error'=>1));  
      } 
  }

  public function filterCustomer(){

      if(trim(request('filter_data')) == 'all'){
         
         $data = \App\new_customer::paginate(300);

       }else{

         $data = \App\new_customer::where('priority',request('filter_data'))->orderBy('id','desc')->paginate(300);
       }
      
       return view('show_all_customers',['data'=>$data]); 
  } 

  public function allCustomerData(){

    $data = \App\new_customer::orderBy('id','desc')->paginate(300);

    return view('all_customer_data',['data'=>$data,'pagination'=>1]);
  }


    public function holdFromDate(Request $request){

      $data = $request->except(['row_id']);
       
      $bool = \App\new_customer::find(request('row_id'))->update($data);

      if($bool){
           echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
      }else{
         echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
      }
    }


    public function editJob($id){ 

           $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

           $data = \App\new_customer::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){   
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }
    }


    public function editCustomer($id){
       
          $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

           $data = \App\new_customer::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }

    }


    public function customerFilterAll(){

      if(trim(request('filter_data')) == 'all'){
         
         $data = \App\new_customer::paginate(300);

       }else{

         $data = \App\new_customer::where('priority',request('filter_data'))->paginate(300);
       }
      
       return view('all_customer_data',['data'=>$data,'pagination'=>1]);   

    }

}
