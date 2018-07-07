<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class salesReportController extends Controller
{
   
   public function salesReport(){

   	  //$data = \App\customer_payment::orderBy('id','desc')->paginate(300);  


   	//  $data = \App\customer_payment::leftJoin('new_job','new_job.customer_id', '=', 'customer_payment.customer_id')
    // ->select('new_job.status,new_job.project_manager,new_job.po_number,new_job.shipping_date,new_job.install','customer_payment.*') 
    //     ->orderBy('customer_payment.id', 'DESC')
    //     ->paginate(10);



       $data = \DB::table('customer_payment') 
        ->join('new_job', 'customer_payment.customer_id', '=', 'new_job.customer_id')
        ->orderBy('customer_payment.id', 'desc')
        ->select('customer_payment.*','new_job.project_manager','new_job.status','new_job.po_number','new_job.shipping_date','new_job.install')
        ->paginate(300);  


   	   return view('sales_report.all_sales_report',['data'=>$data]);
   }

}
