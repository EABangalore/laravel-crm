<?php




Route::group(['middleware'=>'auth'],function(){



});



Route::get('/', function () {

    $data = [];

    $newJobCount = \App\new_job::where('job_completed',0)->where('seen',0)->count();     

    $data['new_job'] = $newJobCount;

    $completedJob = \App\new_job::where('job_completed',1)->count(); 

    // $AllPendingInvoices = \App\new_job::where('all_sent_invoice',0)->count();

    // $data['pending_invoices'] = $AllPendingInvoices;

    $data['completed_job'] = $completedJob;

    return view('dashboard',['data'=>$data]);  
});




Route::get('show_all_completed_jobs',function(){

     $allCompletedJobs = \App\new_job::where('job_completed',1)->paginate(5);

    return view('common_status',['data'=>$allCompletedJobs]);
     
});


Route::get('show_all_new_job',function(){

      // $allNewJob = \App\new_customer::where(\DB::raw(DATE('created_at')),'=', \DB::raw('CURRENT_TIMESTAMP'))->paginate();//->where('seen',0)->paginate(5);

        // $allNewJob = \App\new_customer::where(\DB::raw('DATE(created_at)'),'=', \DB::raw('CURRENT_TIMESTAMP'))->paginate();//->where('seen',0)->paginate(5);

      $allTodaysJob = \DB::select('select * from `new_job` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())');

      $collection = collect($allTodaysJob);

     // dd($collection);

      return view('show_all_todays_job',['data'=>$collection]); 

});



Route::get('new_customer',function(){
  
  return view('new_customer');  

});

Route::get('new_job',function(){

  $data = \App\new_customer::select('customer_name','email','id','contact_name')->get(); 
  
  return view('new_job',['data'=>$data]);     

});


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


Route::post('create-newjob',function(Illuminate\Http\Request $request){

	$email = implode(',',$_POST['email']);

	$phone = implode(',',$_POST['phone']);

	$count = count($_POST['zip']);

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

          'primary_name'=> @$_POST['primary_name'],

          'name' => @$_POST['name'],

		];    

	}




	foreach($addressesResult as $arr){

		\App\new_customer::create($arr);   // actually model is it is new_job


	}


    //return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');

     return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
 

});




Route::post('original_job_post',function(Illuminate\Http\Request $request){


   $bool = \App\new_job::create($request->all());

   if($bool){

       return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
  
   }else{

      return redirect()->back()->with('error', 'Unable to save data due to some Error!');
   }

});


Route::get('all-notifications',function(){

  $data = \App\new_job::select('id','name')->where('job_completed',0)->where('seen',0)->orderBy('created_at')->get();     
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


Route::get('/phantomjs',function(){   



  $basePath = base_path();

  $jsPath = $basePath.'\\public\\js\\phantom.js';

  $phantom = $basePath.'\\public\\phantomjs.exe';

  $url = $_REQUEST['print_url'];



  // echo "$phantom $jsPath https://stackoverflow.com/questions/20202407/how-to-execute-phantomjs-from-php stack.pdf";


  echo "$phantom $jsPath $url something2333.png";die;


  exec("$phantom $jsPath $url something2333.png",$output);



  echo json_encode(array('error'=>0,'success'=>1));


});



// Route::get('show_invoice/{id}',function($id){ 


//  //  $url = $_REQUEST['url'];

//  //  $url = URL::to('/').'/'.$url;  

//  //  dd($_REQUEST['id']);


//  //  dd($url);


//  // dd($_REQUEST['url']);


//   $id = (int) $id;//(int) $_REQUEST['id'];


//   $data = \App\new_job::where('id',$id)->get();


//   //dd($data);


//   // $basePath = base_path();

//   // $jsPath = $basePath.'\\public\\js\\phantom.js';

//   // $phantom = $basePath.'\\public\\phantomjs.exe';

//   // $url = $_REQUEST['print_url'];


//   // exec("$phantom $jsPath http://localhost/shopvox-replica/resources/views/invoice/invoice.blade.php  something.pdf",$output);



//   // echo json_encode(array('error'=>0,'success'=>1));

//   return view('invoice.invoice',['data'=>$data]);


// });


// Route::get('/generate_invoice',function(){  


//   $url = $_REQUEST['url'];

//   $id = $_REQUEST['id'];

//   $url = URL::to('/').'/'.$url.'&id='.$id;  

//   //dd($url);


//   $basePath = base_path();

//   $jsPath = $basePath.'\\public\\js\\phantom.js';

//   $phantom = $basePath.'\\public\\phantomjs.exe';

//  // $url = $_REQUEST['print_url'];


//   echo "$phantom $jsPath $url  newone.png";


//   exec("$phantom $jsPath $url  newone.png",$output);


//   dd($output);      



//   echo json_encode(array('error'=>0,'success'=>1));


// });


Route::get('/generate_invoice/{id}','screenshot@index');


// Route::get('advanced_search',function(){
   
// }); 


Route::get('sent_invoices',function(){

  $data = \DB::select('SELECT nj.*,nc.* FROM new_customer nc LEFT JOIN new_job nj on nc.id = nj.id WHERE nj.all_sent_invoice = 1');
  
   return view('all_sent_invoice',['data'=>$data]);

});


Route::get('project_expenses',function(){
  
 $data = \App\new_customer::select('customer_name','email','id','contact_name')->get(); 

  return view('all_project_expenses_form',['data'=>$data]);
});

Route::post('project_expenses_create',function(Illuminate\Http\Request $request){

  $category = new \App\project_expenses;

  $category->customer_id = $request->customer_id;

  

  $category->save();

  $customer_id = $request->customer_id;

  $count = count($request->product_name);

  $expensesArray = [];

  for($i=0;$i<$count;$i++){
    
      $expensesArray[] = [
         'customer_id'     =>    $customer_id,
         'product_name'    =>    $_POST['product_name'][$i],
         'quantity'        =>    $_POST['quantity'][$i],
         'price'           =>    $_POST['price'][$i],     
      ];  

   }

     foreach($expensesArray as $exp){

            $bool = \App\project_expenses_data::create($exp);

      }   

  if($bool){

       return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
  
   }else{

      return redirect()->back()->with('error', 'Unable to save data due to some Error!');
   }
});

Route::get('show_all_expenses',function(){

   $data = \DB::select('SELECT ped.* FROM project_expenses_data ped LEFT JOIN project_expenses pe ON ped.customer_id = pe.customer_id');

   return view('show_all_expenses',['data'=>$data]);
});


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
