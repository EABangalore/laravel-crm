<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newJobController extends Controller
{
   

   public function showAllNewJob(){

   	     $allCompletedJobs = \App\new_job::where('seen',0)->paginate(5); 



         return view('common_status',['data'=>$allCompletedJobs,'pagination'=>'yes']);
   }


   public function newJobPost(Request $request){


          $bool = \App\new_job::create($request->all());

           if($bool){

               return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
          
           }else{

              return redirect()->back()->with('error', 'Unable to save data due to some Error!');
           }
   }


    // protected function paginate($items,$perPage,$request)
    // {

    //     $page = Input::get('page', 1); // Get the current page or default to 1

    //     $offset = ($page * $perPage) - $perPage;

    //     return new LengthAwarePaginator(
    //         array_slice($items, $offset, $perPage, true),
    //         count($items), $perPage, $page,
    //         ['path' => $request->url(), 'query' => $request->query()]
    //     );
    // }


   public function showAllTodaysNewJob(){

      $allTodaysJob = \DB::select(\DB::raw('select * from `new_job` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())'));

      $collection = collect($allTodaysJob);


      // $allTodaysJob = \DB::raw('select * from `new_job` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())')->get();

      // $allTodaysJob = $this->paginate($allTodaysJob,10,$request);


      // dd($allTodaysJob);






      //return view('show_all_todays_job',['data'=>$collection]); 

      return view('common_status',['data'=>$collection,'pagination'=>'no']); 
   }


   public function newJob(){

   	      $data = \App\new_customer::select('company_name','email','id','contact_name')->orderBy('id','desc')->get();

           $data2 = \App\new_job::select('id')->orderBy('id','desc')->first(); 

           $data3 = \App\all_suppliers::select('id','supplier_name','contact_number')->get();

           $lastId = $data2->id;  

           $const = 103;

           $finalId = ($const * $lastId) + 1; 
          
          return view('new_job',['data'=>$data,'orderNumber'=>$finalId,'allSuppliers'=>$data3]);
   }


   public function editJob($id){ 

   	       $coulmnName = $_POST['table_name'];

           $id = (int) $id;

           $textData = $_POST['data'];

           $data = \App\new_job::where('id', $id)->update([$coulmnName=>$textData]); 

          if($data){
                     echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
              }else{
                   echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
              }
    }


    public function showAllJobs(){

    	 $data = \App\new_job::orderBy('id','desc')->paginate(300); 

       return view('common_status',['data'=>$data,'pagination'=>'yes']);  
    }


    public function showAllCompletedJobs(){


        $allCompletedJobs = \App\new_job::where('status','completed')->paginate(5);

        return view('common_status',['data'=>$allCompletedJobs,'pagination'=>'yes']);
    }

    public function allPendingJobs(){

       $allPendingJobs = \App\new_job::where('status','pending')->paginate(5);

        return view('common_status',['data'=>$allPendingJobs,'pagination'=>'yes']);
    }


    public function deleteJob(){
 

       $bool = \App\new_job::find(request('row_id'))->delete();


       if($bool){

                echo json_encode(array('error'=>0,'message'=>'Your Edit Has Been Saved','success'=>'success'));
       }else{
              echo json_encode(array('error'=>1,'message'=>'Unable to Edit Your Data!','success'=>'warning'));
       }
    }



  public function filterJobs(){

      $total = \App\new_job::all()->count();

      if(trim(request('filter_data')) == 'all'){
         
         $data = \App\new_job::paginate(300);

         $thisCount = count($data);

       }else{

         $data = \App\new_job::where('status',request('filter_data'))->paginate(300);

         $thisCount = count($data);

       }
      
       return view('common_status',['data'=>$data,'pagination'=>'yes','totalRecord'=>$total,'recordCount'=>$thisCount]); 


    }



}
