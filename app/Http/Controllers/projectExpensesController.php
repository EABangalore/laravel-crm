<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectExpensesController extends Controller
{
   
   public function projectExpenses(){

      $data = \App\new_customer::select('company_name','email','id','contact_name')->orderBy('id','desc')->get();      

          return view('all_project_expenses_form',['data'=>$data]);
   }


   public function projectExpensesCreate(Request $request){ // post method
       
          // $category = new \App\project_expenses;

          // $category->customer_id = $request->customer_id;

          

          // $category->save();

   	      //dd($request->count);

          //dd($request);


   	      // if($request->count == null){

   	      // 	    return redirect()->back()->with('message', 'No changes Have Been Made!');
   	      //  }



          $customer_id = $request->customer_id;

          \App\project_expenses_data::where('customer_id',$customer_id)->delete();  

          $count = count($request->product_name);

          $expensesArray = [];

          for($i=0;$i<$count;$i++){

            if( $_POST['product_name'][$i] != '' && $_POST['quantity'][$i] != '' && $_POST['price'][$i] !=''){
            
              $expensesArray[] = [
                 'customer_id'     =>    $customer_id,
                 'product_name'    =>    $_POST['product_name'][$i],
                 'quantity'        =>    $_POST['quantity'][$i],
                 'price'           =>    $_POST['price'][$i],     
              ];  

             }     

           }        

          // dd($expensesArray);    

             foreach($expensesArray as $exp){

                    $bool = \App\project_expenses_data::create($exp);

              }   

          if($bool){

               return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
          
           }else{

              return redirect()->back()->with('error', 'Unable to save data due to some Error!');
           }

   }


   public function showAllExpenses(){

   	   $data = \DB::select('SELECT ped.* FROM project_expenses_data ped LEFT JOIN project_expenses pe ON ped.customer_id = pe.customer_id');



       //dd($data);

       return view('show_all_expenses',['data'=>$data]);
   }


   public function previousExpensesData(){

   	   $data = \App\project_expenses_data::where('customer_id',request('customer_id'))->get();

   	   echo json_encode(array('previousExpenses'=>$data,'count'=>count($data)));
   }


   public function populateSupplier(){
      
      $data = \App\all_suppliers::find(request('supplier_id'));

      echo json_encode(array('data'=>$data));  

   }

}
