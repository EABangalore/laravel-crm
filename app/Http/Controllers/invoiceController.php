<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;       



class invoiceController extends Controller
{
   public function createInvoice(){

   	  $cus = request('customer_id');


   	  if($cus != ''){
         $id = (int) decodeToBase64($cus);
   	   }else{
   	   	 $id = 0;
   	   }

   	   $data = \App\new_customer::where('id',$id)->get();

   	   $data2 = \App\new_customer::select('id')->orderBy('id','desc')->first(); 

       $companies = \App\companies::all();

      // $data3 = \App\performa_invoice::where('customer_id',$id)->get();

       $lastId = $data2->id;  

       $const = 103;

       $finalId = ($const * $lastId) + 1;


       //dd($data);


   	  return view('invoice.create_invoice',['data'=>$data,'invoiceNumber'=>$finalId,'companies'=>$companies]);
   }

   public function createPerformaInvoice(Request $request){

      $data = \App\performa_invoice::where('customer_id',request('customer_id'))->get();

      $customerId = request('customer_id'); 

      //dd($customerId);

      if(count($data)){
          \App\performa_invoice::where('customer_id',request('customer_id'))->delete(); 
      }  
      
      $bool = \App\performa_invoice::create($request->all()); 

      //$bool = true;  

     if($bool){

           //return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');

          // return \URL::to('show_performa_table/'.request('customer_id'));

          return redirect('show_performa_table/'.encodeToBase64($customerId));       
  
      
       }else{

          return redirect()->back()->with('error', 'Unable to save data due to some Error!');
       }
   }


   public function allProformaInvoice(){

   	  $data = \App\performa_invoice::orderBy('id','desc')->paginate(300);

      return view('invoice.all_proforma_invoice',['data'=>$data]);
   }


   public function editPerformaInvoice($id){

        $data = \App\performa_invoice::find($id);

        $notSelectedompany = $data->hidden_not_selected_companyname;

        $notSelectedompany = explode(',',$notSelectedompany);

        $dispatched = $data->hidden_not_selected_dispatchedthrough;

        $dispatched  = explode(',',$dispatched);
    
        return view('invoice.edit_performa_invoice',['data'=>$data,'companyNotSelected'=>$notSelectedompany,'dispatchedNotSelected'=>$dispatched]);   

   }


   public function updatePerforma($id){

      $allData = request()->except(['_token']);
      
      $bool = \App\performa_invoice::where('id',$id)->update($allData);

      if($bool){

           return redirect('all_proforma_invoice')->with('message', 'Data Has Been Saved Successfully!');
      
       }else{

          return redirect('all_proforma_invoice')->with('error', 'Unable to save data due to some Error!');
       }

    
   }

   public function showInvoicePreview(){
   
      dd($previewPath); 

   }

 public function SendInvoice(){

      $id = request('customer_id');


      $filePath = request('file_path');

      
       $email = request('email');//'ejazanwar777@gmail.com';//$request->email;

       $data = ['name'=>'Ejaz Anwar','study'=>'eng'];


      $usableVariables = ['genfile'=>$filePath,'email'=>$email];


      $date = new \DateTime();

      $formatedDate = $date->format('d-m-Y');   



       /* code for multiple cc or bcc


      //  $emails = ['myoneemail@esomething.com', 'myother@esomething.com','myother2@esomething.com'];

      // Mail::send('emails.welcome', [], function($message) use ($emails)
      // {    
      //     $message->to($emails)->subject('This is test e-mail');    
      // });
      // var_dump( Mail:: failures());
      // exit;

       */



\Mail::send('email-invoice.invoice', ['data'=>$data], function ($message) use ($usableVariables) {
         
          $publicPath = public_path(); 

         $message->from('ejazanwar777@gmail.com', 'My Email');

         $message->to($usableVariables['email'])->subject('The subject');

           $message->attach($usableVariables['genfile']);   


      });    

      // if (\Mail::failures()) {
      //     // return response showing failed emails

      //     return redirect()->back()->with('error', 'Some Error Has Occured While Sending Mail!');
      //  }

      // otherwise everything is okay ... 


      \App\new_job::where('id', $id)->update(['invoice_sent'=>'classForInvoiceSent','title_for_invoice_sent'=>'Invoice is Already Been Sent','invoice_sent_time'=>$date,'all_sent_invoice'=>1]); 


      echo 'sent';

      // return redirect()->back()->with('message', 'Invoice Has Been Sent Successfully!');

   }

   public function z(){

       $data = [
        'foo' => 'bar'
      ];

      $mpdf = new \Mpdf\Mpdf();

      $mpdf->WriteHTML('<h1>Hello world!</h1>');
      $mpdf->Output();

      // $pdf = PDF::loadView('invoice_demo', $data);
      // return $pdf->stream('document.pdf');

      // $pdf->save('document.pdf');   
   }


  public function zt(){ 

      // $data = [
      //   'foo' => 'bar'
      // ];
      // $pdf = PDF::loadView('general-email.new_customer_data', $data);
      // return $pdf->stream('document.pdf');

      // $pdf->save('document.pdf');




      //return view('general-email.new_customer_data'); 


       //$data = ['name'=>'Ejaz Anwar','study'=>'eng'];


      $data = \App\new_customer::find(12)->toArray();


       $usableVariables = ['genfile'=>'ggs','email'=>'ejazanwar777@gmail.com'];


       \Mail::send('general-email.new_customer_data', ['data'=>$data], function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from('ejazanwar777@gmail.com', 'My Email');

         $message->to($usableVariables['email'])->subject('The subject');

           //$message->attach($usableVariables['genfile']);   


      }); 
   }



   public function email($id){

     $data = \App\new_job::where('id',$id)->get();

     //dd($data->toArray());  
       
       $data = $data->toArray();  

      //return view('show-customer',['data'=>$data]);

      $pdf = PDF::loadView('show-customer', ['data'=>$data]);

      return $pdf->stream('document.pdf');    

      $pdf->save('document.pdf');   

   }


   public function showPerformaTable($id){


    $id = decodeToBase64($id);



    try{


       $d = \DB::select('SELECT sqd.quotation_data,sqd.gst_percentage,sqd.customer_name,pi.*,cp.total_balance,cp.total_recieved_amount FROM sent_quotation_data sqd

          INNER JOIN performa_invoice pi on sqd.customer_id = pi.customer_id

          INNER JOIN customer_payment cp  on pi.customer_id = cp.customer_id

          WHERE sqd.customer_id = "'.$id.'" LIMIT 1'); 

            


                 $data = $d[0];


                // dd($data);


                    // $pdf = PDF::loadView('performa_preview.show_performa_table', ['data'=>$data]);

                    // return $pdf->stream('document.pdf');    


                 return view('performa_preview.show_performa_table',['data'=>$data]);


      }catch(\Exception $e){  
        echo "<center><h1>USER NOT FOUND!!</h1></center>";   
      } 
   }


   public function sendPreviewedInvoice($id){

       try{


        $id = decodeToBase64($id);//request('customer_id');



       // $d = \DB::select('SELECT sqd.quotation_data,sqd.customer_name,pi.* FROM sent_quotation_data sqd

       //    INNER JOIN performa_invoice pi on sqd.customer_id = pi.customer_id

       //    WHERE sqd.customer_id = 12 LIMIT 1');  


        $d = \DB::select('SELECT sqd.quotation_data,sqd.gst_percentage,sqd.customer_name,pi.*,cp.total_balance,cp.total_recieved_amount FROM sent_quotation_data sqd

          INNER JOIN performa_invoice pi on sqd.customer_id = pi.customer_id

          INNER JOIN customer_payment cp  on pi.customer_id = cp.customer_id

          WHERE sqd.customer_id = "'.$id.'" LIMIT 1');       


           $data = $d[0];



      $usableVariables = ['genfile'=>'ggs','email'=>'ejazanwar777@gmail.com'];


       \Mail::send('performa_preview.show_performa_general', ['data'=>$data], function ($message) use ($usableVariables) {
         
          //$publicPath = public_path(); 

         $message->from('ejazanwar777@gmail.com', 'My Email');

         $message->to($usableVariables['email'])->subject('The subject');

           //$message->attach($usableVariables['genfile']);   


        });


       //dd('invoice sent');  


      return redirect()->back()->with('message','Invoice Is Not Sent To Customer, It Is Sent To You Only!!!');  



      //return view('performa_preview.show_performa_table',['data'=>$data]);


      }catch(\Exception $e){  
        echo "<center><h1>USER NOT FOUND!!</h1></center>";   
      }     
   }

 public function sendPreviewedInvoiceToCustomer($id){

    try{


        $id = decodeToBase64($id);//request('customer_id');


       $d = \DB::select('SELECT sqd.quotation_data,sqd.gst_percentage,sqd.customer_name,pi.*,cp.total_balance,cp.total_recieved_amount,cp.email FROM sent_quotation_data sqd

          INNER JOIN performa_invoice pi on sqd.customer_id = pi.customer_id

          INNER JOIN customer_payment cp  on pi.customer_id = cp.customer_id

          WHERE sqd.customer_id = "'.$id.'" LIMIT 1');      


             $data = $d[0];


             //dd($data);



        $usableVariables = ['genfile'=>'ggs','email'=>['ejazanwar777@gmail.com',$data->email]];     


         \Mail::send('performa_preview.show_performa_general', ['data'=>$data], function ($message) use ($usableVariables) {
           
            //$publicPath = public_path(); 

           $message->from('ejazanwar777@gmail.com', 'My Email');

           $message->to($usableVariables['email'])->subject('The subject');

             //$message->attach($usableVariables['genfile']);   


          });


         \App\performa_invoice::where('customer_id',$id)->update(['status'=>'sent']);    


         //dd('invoice sent');   


         return redirect()->back()->with('message','Invoice Has Been Sent Successfully, Please Check Your Email !!!');       



        //return view('performa_preview.show_performa_table',['data'=>$data]);


        }catch(\Exception $e){  
          echo "<center><h1>You Have Not Created Performa Invoice, create It First</h1></center>";   
        }    

   } 



   public function filterInvoice(){

        if(trim(request('filter_data')) == 'all'){
           
           $data = \App\performa_invoice::paginate(300);

         }else{

           $data = \App\performa_invoice::where('status',request('filter_data'))->paginate(300);
         }
        
         return view('invoice.all_proforma_invoice',['data'=>$data]); 

   } 


    public function setPerformaStatus($id){      

           $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

        $data = \App\performa_invoice::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }
    }


    public function deletePerformaInvoice($id){

       $bool = \App\performa_invoice::find($id)->delete();  


        if($bool){

          return redirect()->back()->with('message','Invoice Has Been Deleted Successfully!!');    
        }else{

          return redirect()->back()->with('error','Unable To Delete Invoice!!!');  
        }
    }


  public function pendingPerformaInvoice(){
    

     $data = \App\performa_invoice::where('status','pending')->paginate(300);

     return view('invoice.all_proforma_invoice',['data'=>$data]);  

  }


  public function sentPerformaInvoice(){

     $data = \App\performa_invoice::where('status','sent')->paginate(300);

     return view('invoice.all_proforma_invoice',['data'=>$data]);    

  }


  public function followPerformaInvoice(){

     $data = \App\performa_invoice::where('status','follow')->paginate(300); 

     return view('invoice.all_proforma_invoice',['data'=>$data]);    

  }


  public function approvedPerformaInvoice(){

      $data = \App\performa_invoice::where('status','approved')->paginate(300); 

      return view('invoice.all_proforma_invoice',['data'=>$data]);  
  }


}
