<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       Schema::defaultStringLength(191);

        
       view()->composer('*', function($view){
           
        //$AllPendingInvoices = \App\new_job::where('all_sent_invoice',0)->count();

     $AllPendingInvoices = \App\performa_invoice::where('status','pending')->get()->count(); 

        $allOrder = \App\new_job::all()->count();

        $allTodaysJob = \DB::select('select count(*) as cnt from `new_job` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())');


       $allTodaysCustomers = \DB::select('select count(*) as cnt from `new_customer` WHERE DATE(created_at) = DATE(CURRENT_TIMESTAMP())');

        $allNotStartedJob = \App\new_customer::where('job_started',0)->count();

        $allProducts = \App\products::all()->count();

        $sentInvoice1234 = \App\performa_invoice::where('status','sent')->get()->count(); 


      $readyForQuotation9999 = \App\new_customer::where('priority','readyForQuotation')->get()->count();

           //dd($allTodaysJob[0]->cnt);

            $view->with('pending_invoice', $AllPendingInvoices)
            ->with('todays_all_job',$allTodaysJob[0]->cnt)
            ->with('not_started_job',$allNotStartedJob)
            ->with('all_order',$allOrder)
            ->with('allTodaysCustomers',$allTodaysCustomers[0]->cnt)
            ->with('allProductsCount',$allProducts)
            ->with('allSentInvoiceCount',$sentInvoice1234)
            ->with('readyForQuotation9999',$readyForQuotation9999);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
