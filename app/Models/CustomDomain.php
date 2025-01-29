<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomDomain extends Model
{
    protected $fillable = ['user_id','portfolio_id','domain','is_verified'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
