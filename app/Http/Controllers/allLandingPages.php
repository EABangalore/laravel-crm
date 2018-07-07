<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class allLandingPages extends Controller
{
   
   public function ordersLanding(){



    $newOrder = \App\new_job::where('seen',0)->get()->count();

    $pendingOrder = \App\new_job::where('status','pending')->get()->count();

    $completedOrder = \App\new_job::where('status','completed')->get()->count();

    //$completedOrder = \App\new_job::where('status','completed')->get()->count();



    // $allTodaysJob = \DB::select('select * from `new_job` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())');   'allTodaysJob'=>$allTodaysJob

     //$allTodaysJob = count($allTodaysJob);

      return view('all_landing.orders_landing',['newOrder'=>$newOrder,'pendingOrder'=>$pendingOrder,'completedOrder'=>$completedOrder]);



   }


  public function quotationLanding(){

    $data = \App\sent_quotation_data::all()->count();

    $data2 = \App\sent_quotation_data::where('status','sent')->get();

    $data3 = count($data2);

    $appr = \App\sent_quotation_data::where('status','approved')->get()->count();

    $follow = \App\sent_quotation_data::where('status','followup')->get()->count(); 


   	  return view('all_landing.quotation_landing',['allQuotation123'=>$data,'allSentQuotation123'=>$data3,'approvedOrNot'=>$appr,'followUp'=>$follow]);  
   }


 public function invoiceLanding(){

  $approvedInvoice1234 = \App\performa_invoice::where('status','approved')->get()->count();

  $followInvoice1234 = \App\performa_invoice::where('status','follow')->get()->count(); 

  $sentInvoice1234 = \App\performa_invoice::where('status','sent')->get()->count(); 

  $pendingInvoice1234 = \App\performa_invoice::where('status','pending')->get()->count(); 

   $allInvoiceData1234 = \App\performa_invoice::all()->count();

   return view('all_landing.invoice_landing',['approvedInvoice1234'=>$approvedInvoice1234,'followInvoice1234'=>$followInvoice1234,'sentInvoice1234'=>$sentInvoice1234,'pendingInvoice1234'=>$pendingInvoice1234,'allInvoiceData1234'=>$allInvoiceData1234]);

   }

   public function customerLanding(){

     $allCustomer2345 = \App\new_customer::all()->count();

     $readyForQuotation2345 = \App\new_customer::where('priority','readyForQuotation')->get()->count();

     $holdFor2345 = \App\new_customer::where('priority','holdFor')->get()->count();

   	return view('all_landing.customer_landing',['allCustomer2345'=>$allCustomer2345,'readyForQuotation2345'=>$readyForQuotation2345,'holdFor2345'=>$holdFor2345]);

   }


   public function supplierLanding(){

      $all_suppliers = \App\all_suppliers::all()->count(); 

   	  return view('all_landing.supplier_landing',['all_suppliers2345'=>$all_suppliers]);

   }

   public function performaLanding(){

       $allPerforma = \App\performa_invoice::all()->count();

       $sentPerforma = \App\performa_invoice::where('status','sent')->count();

       $pendingPerforma = \App\performa_invoice::where('status','pending')->count();

       return view('all_landing.performa_landing',['allPerforma'=>$allPerforma,'sentPerforma'=>$sentPerforma,'pendingPerforma'=>$pendingPerforma]);     
   } 


   public function expensesLanding(){

      return view('all_landing.expenses_landing'); 
   }

}
