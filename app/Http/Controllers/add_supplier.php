<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class add_supplier extends Controller
{
   
   public function index(){
    
      return view('add_supplier.create_supplier');

   }   


   // public function createSupplier(Request $request){

   // 	  $data = \App\all_suppliers::create($request->all());

   // 	  $supplier_id = $data->id;

   // 	  \App\add_supplier::create([]);

   // }

   public function showAllSupplier(){

   	 $data = \App\all_suppliers::orderBy('id','desc')->paginate(300);

   	 return view('add_supplier.crud_show_all_supplier',['data'=>$data]);

   }


   public function editSupplier($id){

      $data = \App\all_suppliers::find($id);

   	   return view('add_supplier.edit_supplier',['data'=>$data]);
   }

   public function deleteSupplier($id){

       $bool = \App\all_suppliers::find($id)->delete();   


       	   if($bool){

	             return redirect('show_all_supplier_data')->with('message', 'Data Has Been Saved Successfully!');
	          
	        }else{

	          return redirect('show_all_supplier_data')->with('error', 'Unable to save data due to some Error!');
	        } 	   
   }

   public function updateSupplier(Request $request,$id){

   	  $data = request()->except(['_token']);

      $bool = \App\all_suppliers::where('id', $id)->update($data); 	

	      if($bool){

	             return redirect('show_all_supplier_data')->with('message', 'Data Has Been Saved Successfully!');
	          
	        }else{

	          return redirect('show_all_supplier_data')->with('error', 'Unable to save data due to some Error!');
	        }  
   } 


  public function relateSupplier(Request $request){


   // dd($request);

    try{
	 
	   $bool = \App\supplier_details::create(['customer_id'=>request('customer_id'),'supplier_id'=>request('supplier_id'),'from_date'=>request('from_date'),'to_date'=>request('to_date')]);      

         //dd($bool); 

	      if($bool){

	             return redirect()->back()->with('message', 'Data Has Been Saved Successfully!');
	          
	        }else{

	          return redirect()->back()->with('error', 'Unable to save data due to some Error!');
	        }

       }catch(\Illuminate\Database\QueryException $e){

          return redirect()->back()->with('error', 'The Supplier is Already Been Added to the Project!');

       }
	}


   public function addSupplier(Request $request){

      $bool = \App\all_suppliers::create($request->all());

      if($bool){
         
          echo json_encode(array('error'=>0));

      }else{
         echo json_encode(array('error'=>1)); 
      }

   }


   public function repopulateSupplier(){
      
      $data = \App\all_suppliers::select('id','supplier_name','contact_number')->orderBy('id','desc')->get();

      echo json_encode(array('data'=>$data)); 

   }


   public function getAddSupplier(){  

      $data = \App\new_customer::select('company_name','email','id','contact_name')->get(); 

      $allSupplier = \App\all_suppliers::orderBy('id','desc')->get();

       return view('add-supplier',['data'=>$data,'allSuppliers'=>$allSupplier]);
   }


   public function getSupplierData(){

     $data = \App\all_suppliers::find(request('supplier_id'));

     echo json_encode(array('data'=>$data));

   }


   public function supplierForAproject(){
   
     // $data = \DB::select('SELECT ass.*,nc.id as customer_id,nc.company_name,nc.contact_name FROM supplier_details sd

     //        LEFT JOIN new_customer nc on sd.customer_id  = nc.id

     //        LEFT join all_suppliers ass on sd.supplier_id = ass.id');



        $data = \DB::table('supplier_details') 
        ->join('new_customer', 'supplier_details.customer_id', '=', 'new_customer.id')
        ->join('all_suppliers','supplier_details.supplier_id','=','all_suppliers.id')
        ->join('new_job','supplier_details.customer_id','=','new_job.customer_id')
        //->orderBy('customer_payment.id', 'desc')
        ->select('all_suppliers.*','supplier_details.from_date','supplier_details.to_date','new_customer.id as customer_id','new_customer.company_name','new_customer.contact_name','new_job.project_name')
        ->paginate(300);  

       // dd($data);  


      //$data = collect($data);


      return view('project_supplier_related',['data'=>$data]);  



   }



}
