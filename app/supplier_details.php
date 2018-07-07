<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier_details extends Model
{
   
   protected $table = 'supplier_details';

   protected $guarded = [];



   public function allSupplierData(){

   	   return $this->belongsTo('App\all_suppliers','supplier_id','id');  
   }



}
