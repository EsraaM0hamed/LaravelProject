<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empolyee extends Model
{

    protected $table ="employee";
    public function Empolyee(){
        return $this->hasOne(User::class);
    }
    
}
