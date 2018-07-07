<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_expenses extends Model
{
    protected $table = 'project_expenses';

    protected $guarded = [];

    public function showAllExp()
    {
        return $this->hasMany('App\project_expenses_data','customer_id','customer_id');   
    }
}
