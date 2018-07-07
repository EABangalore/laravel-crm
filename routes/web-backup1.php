<?php

Route::group(['middleware'=>'auth'],function(){
       

       Route::get('/', function () {

            $data = [];

            $newJobCount = \App\new_job::where('job_completed',0)->where('seen',0)->count();     

            $data['new_job'] = $newJobCount;

            $completedJob = \App\new_job::where('job_completed',1)->count(); 

            $data['completed_job'] = $completedJob;

            return view('dashboard',['data'=>$data]);  
        });




        Route::get('show_all_completed_jobs',function(){

             $allCompletedJobs = \App\new_job::where('job_completed',1)->paginate(5);

            return view('common_status',['data'=>$allCompletedJobs]);
             
        });


   Route::get('show_all_new_job','newJobController@showAllNewJob');


   Route::get('show_all_todays_new_job','newJobController@showAllTodaysNewJob');  



    Route::get('new_customer','newCustomerController@index');

    Route::get('customer-is-ready-for-quotation','newCustomerController@customerIsReadyForQuotation');  

     Route::get('new_job','newJobController@newJob');


      Route::post('edit_job/{id}',function($id){


           $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

           $data = \App\new_job::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }

        });


        Route::get('show_all_jobs',function(){

          $data = \App\new_job::where('job_completed',0)->orderBy('created_at')->paginate(5); 

          return view('show_all_jobs',['data'=>$data]);   

        });


     Route::post('create-newjob','newCustomerController@createNewCustomer');

     Route::post('original_job_post',function(Illuminate\Http\Request $request){


           $bool = \App\new_job::create($request->all());

           if($bool){

               return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
          
           }else{

              return redirect()->back()->with('error', 'Unable to save data due to some Error!');
           }

        });


        Route::get('all-notifications',function(){

          $data = \App\new_job::select('id','contact_name')->where('job_completed',0)->where('seen',0)->orderBy('created_at')->get();     
            $count = count($data);

            $data['count'] = $count;

            echo json_encode(array('count'=>$count,'data'=>$data));  
        });


        Route::get('show-customer/{id}',function($id){
           $id = (int) $id;

          \App\new_job::where('id', $id)->update(['seen'=>1]);   

           $data = \App\new_job::where('id',$id)->get();
           return view('show-customer',['data'=>$data]);

        });


        Route::get('generate-pdf',function(){

         $id = 1; //(int) $id;
         $data = \App\new_job::where('id',$id)->get();

          $pdf = PDF::loadView('show-customer', ['data'=>$data]);
          return $pdf->download('invoice.pdf'); 
        });


        Route::get('/generate_invoice/{id}','screenshot@index');


        // Route::get('advanced_search',function(){
           
        // }); 


        Route::get('sent_invoices',function(){

          $data = \DB::select('SELECT nj.*,nc.* FROM new_customer nc LEFT JOIN new_job nj on nc.id = nj.id WHERE nj.all_sent_invoice = 1');
          
           return view('all_sent_invoice',['data'=>$data]);

        });



   /**  -------------- for project expenses  --------------------------- **/
    Route::get('project_expenses','projectExpensesController@projectExpenses');
    Route::post('project_expenses_create','projectExpensesController@projectExpensesCreate');  

    Route::get('show_all_expenses','projectExpensesController@showAllExpenses');

   Route::post('previous_expenses_data','projectExpensesController@previousExpensesData');

   Route::post('populate_supplier','projectExpensesController@populateSupplier');
   /**  -------------- for project expenses  --------------------------- **/


        Route::get('hash',function(){
           
          echo $en = encodeToBase64(25);

          echo "<br/>";

           echo decodeToBase64($en);
        });

        Route::get('track-order',function(){
          return view('order_tracking');
        });

      Route::get('orderTrackingSearch',function(){

          $decodedId = decodeToBase64($_POST['order_id']);

          $password = $_POST['password'];



          return view('show-order-tracking.php',['data'=>$data]);
          //return view('order_tracking');
        });

   Route::get('pending_invoices',function(){

            $AllPendingInvoices = \App\new_job::where('all_sent_invoice',0)->paginate(10);

           return view('all_pending_invoice',['data'=>$AllPendingInvoices]);
        });
        //Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

});

Route::get('s',function(){
  dd(Auth::user()->role);
});



/** request from all_project_expenses_form **/

Route::post('get_customer_details',function(){

  $data = \App\new_customer::find($_POST['customer_id'])->toArray();

  echo json_encode(array('data'=>$data));    

});

/** request from all_project_expenses_form **/


/* from new_customer page */

  Route::post('get_team_name',function(){
    $tableName = $_POST['table_name'];

    $data = \DB::table($tableName)->get();

    echo json_encode(array('data'=>$data));
  });

/* from new_customer page */

/*from new_job page */

Route::post('get_contact_name',function(){
  $data = \App\new_customer::find($_POST['customer_id']);
  
  $data2 = \App\sent_quotation_data::where('customer_id',$_POST['customer_id'])->get();

  if(count($data2)){
      $array = $data2[0]->quotation_data;
      echo json_encode(array('data'=>$data,'table'=>$data2,'json'=>$array)); 
   }else{
     
     $array = [];    

     echo json_encode(array('data'=>$data,'table'=>$data2,'json'=>$array)); 
   }

  // echo json_encode(array('data'=>$data,'table'=>$data2,'json'=>$array));  
});

/*from new_job page */



/* quotation related functions
 *   all the functions
 */

Route::get('all_quotation','quotationController@allQuotation');  

Route::get('quotation','quotationController@index');

Route::post('quotation','quotationController@showCustomerById'); 

Route::post('save_quotation','quotationController@saveQuotation'); 

//Route::get('quotation','quotationController@allQuotation');

Route::get('sent_quotation','quotationController@sentQuotation');

Route::get('approved_quotation','quotationController@approvedQuotation');

Route::get('follow_up_quotation','quotationController@followUpQuotation'); 

Route::get('product_crud','quotationController@product_crud');

Route::post('product_crud','quotationController@Saveproduct');

Route::post('product_update','quotationController@editProduct');

Route::post('product_delete','quotationController@deleteProduct');

Route::get('ready_for_quotation','quotationController@readyForQuotation');

// for revised quotation

Route::get('revised_quotation','quotationController@revisedQuotation');

Route::post('update_revised_quotation','quotationController@updateRevisedQuotation');

Route::post('save_revised_quotation','quotationController@saveRevisedQuotation');

Route::post('save_revised_quotation_notify','quotationController@saveRevisedQuotationNotify'); 

/* ----------------------------------------------------------------  */  


/* form new job */
Route::get('encode_sent_id',function(){   

    $id = 12;//$_POST['customer_id'];  
    $idd = encodeToBase64($id);

    echo json_encode(array('encoded'=>$idd));   

});

/* form new job */


Route::post('get_all_related_job',function(){
  

$data = \App\new_job::where('customer_id',$_POST['customer_id'])->get();//find($_POST['customer_id']);
  
  echo json_encode(array('data'=>$data,'id'=>$_POST['customer_id']));

});


Route::get('customer_management/{id}',function($id){


  $data = \App\new_customer::find($id);


   $phoneArray = [];

   $emailArray = [];

   $customerNameArray = [];



//try{


  //if(count(json_decode(@$data->secondary_contact))){


    $secondary = (array) json_decode(@$data->secondary_contact);   

    //dd( (array) $secondary);  

    if(count($secondary)){

    
        foreach($secondary as $secondary1){ 



         foreach($secondary1 as $sec){


           //if(@count($secondary->secondary_contact)){
               // var_dump($secondary->secondary_contact[0]->phone);

                // $phone .= forPhoneNumber($secondary->secondary_contact[0]->phone);    

              $phone = $sec->phone;
              
              $email = $sec->email;


              $customer_name = $sec->customer_name;  

              $phoneArray[] =  [
                'phone' => $phone,
              ];


              $emailArray[] = [
                 'email' => $email,  
              ];


              $customerNameArray[] = [
                'customer_name' => $customer_name,
              ];
              
          // }

        }

      }

    }

      $phn = collect($phoneArray);
  

      $eml = collect($emailArray); 

      $cust = collect($customerNameArray);

      return view('customer_management',['data'=>$data,'phone'=>$phn,'email'=>$eml,'customer_name'=>$cust]);

  //}

  // }catch(Exception $e){


  //    return view('customer_management',['data'=>$data,'phone'=>[],'email'=>[],]);
  // }  
 

  //return view('customer_management',['data'=>$data,'phone'=>$phn,'email'=>$eml]);
});



Route::post('update_customer/{id}',function($id){ 
    
    $count1 = count($_POST['phone']);

    $count2 = count($_POST['email']);

    $count3 = count($_POST['contact_name']);

    $c = max($count1, $count2, $count3);  

     $jsonArray = [];
    

    for($i = 0; $i < $c; $i++){

      $phone = @(count($_POST['phone'][$i])) ? $_POST['phone'][$i] : '';

      $email = @(count($_POST['email'][$i])) ? $_POST['email'][$i] : '';

      $customer = @(count($_POST['contact_name'][$i])) ? $_POST['contact_name'][$i] : '';
   
        $jsonArray[] = [
           'phone' => $phone,
           'email' => $email,
           'customer_name' => $customer,  
        ];
    } 


   $secondaryContact = json_encode(array('secondary_contact'=>$jsonArray)); 


    $insertArray = [];

    $insertArray = [
        
        'combined_address' => $_POST['combined_address'],

        'product_name' => $_POST['product_name'],

        'product_description' => $_POST['product_description'],

        'secondary_contact' => $secondaryContact,

    ];


    $bool = \App\new_customer::where('id', $id)->update($insertArray);


    dd($bool);


    if($bool){

           return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
        
      }else{

           return redirect()->back()->with('error', 'Unable to save data due to some Error!');
      }  
  
  
});

Route::get('show_all_supplier',function(){
  $data = \App\new_customer::select('id','company_name','contact_name')->get();
  return view('show_all_supplier',['data'=>$data]);
});

/* call from show_all_supplier page */
  Route::post('all_supplied_product',function(){
     // $data = \App\project_expenses_data::where('customer_id',$_POST['customer_id'])->get();
  $customer_id = $_POST['customer_id'];
$data = \DB::select('SELECT customer_id, project_name, product_name, quantity,
       price, quantity * price as total 
FROM project_expenses_data  WHERE customer_id = "'.$customer_id.'"
UNION ALL
SELECT "", "", "", "", "", sum(quantity * price)
FROM project_expenses_data WHERE customer_id = "'.$customer_id.'"
');

     $dat = collect($data); 

     echo json_encode(array('data'=>$dat));  

  });
/* call from show_all_supplier page */

/* from show_all_customers */

 Route::get('show_all_customers','newCustomerController@showAllCustomers');

 Route::post('delete_customer','newCustomerController@deleteCustomer');

 Route::get('filter_customer','newCustomerController@filterCustomer');

 Route::get('all_customer_data','newCustomerController@allCustomerData');


/* from show_all_customers */


/* User Management*/

Route::get('user_management','user_management@index'); 

Route::post('user_edit','user_management@userEdit');

Route::post('user_delete','user_management@userDelete');

Route::post('user_role','user_management@userRole');  

/*---------------- User Management --------------------------------------*/

/* customer payment */

  Route::get('customer_payment','customer_payment@customerPayment');  

  Route::post('customer_payment','customer_payment@customerPaymentPost'); 

  Route::post('save_customer_payment_data','customer_payment@saveCustomerPaymentData');    

/* ----------------------------------customer payment ----------------------------------*/

/** -----------------------------------  Add supplier ----------------------------------- **/
  Route::get('create_supplier','add_supplier@index');
  Route::post('create_supplier','add_supplier@createSupplier');  
  Route::get('show_all_supplier_data','add_supplier@showAllSupplier');
  Route::get('show_all_supplier_edit/{id}','add_supplier@editSupplier');
  Route::post('show_all_supplier_update/{id}','add_supplier@updateSupplier');
  Route::get('show_all_supplier_delete/{id}','add_supplier@deleteSupplier');
  Route::post('add_supplier','add_supplier@addSupplier'); 
  Route::post('relate_supplier','add_supplier@relateSupplier');
  Route::post('repopulate_supplier','add_supplier@repopulateSupplier');
  Route::get('add_supplier','add_supplier@getAddSupplier'); 
  Route::post('get_supplier_data','add_supplier@getSupplierData');     
/** -----------------------------------  Add supplier ----------------------------------- **/

/** ---------------------------------- invoice related routes ----------------------------- **/
    Route::get('create_invoice','invoiceController@createInvoice');  // for performa invoice 
    Route::post('create_performa_invoice','invoiceController@createPerformaInvoice');
    Route::get('all_proforma_invoice','invoiceController@allProformaInvoice');
    Route::get('edit_performa_invoice/{id}','invoiceController@editPerformaInvoice');
    Route::post('update_performa/{id}','invoiceController@updatePerforma');
    Route::get('show_invoice_preview','invoiceController@showInvoicePreview'); 
    Route::post('send_invoice','invoiceController@SendInvoice');

/** ---------------------------------- invoice related routes ----------------------------- **/




/**  ---------------------------------------------- Sales Report --------------------------- **/
    Route::get('sales_report','salesReportController@salesReport');
/**  ---------------------------------------------- Sales Report --------------------------- **/







Route::get('t',function(){
   return view('t');
});

Route::get('z','invoiceController@z');
Route::get('zt','invoiceController@zt');  

Route::get('emailpdf/{id}','invoiceController@email');



Route::get('f',function(){
  $data = [];
  return view('general-email.new_customer_data',['data'=>$data]);    
});


/* all Landing Routes */

   Route::get('orders_landing','allLandingPages@ordersLanding');

   Route::get('invoice_landing','allLandingPages@invoiceLanding');

   Route::get('quotation_landing','allLandingPages@quotationLanding');

   //Route::get('customer_landing','allLandingPages@customerLanding');

   Route::get('sales_landing','allLandingPages@salesLanding');

   Route::get('customer_landing','allLandingPages@customerLanding');

   Route::get('supplier_landing','allLandingPages@supplierLanding');

   Route::get('expenses_landing','allLandingPages@expensesLanding');

/* all Landing Routes */


Auth::routes();  



