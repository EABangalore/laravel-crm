<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sent_quotation_data extends Model
{
    protected $table = 'sent_quotation_data';

    protected $guarded = [];     


	 public function services(){

        return $this->hasMany('App\new_customer','id','customer_id');      
	 }

}
