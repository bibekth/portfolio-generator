<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['portfolio_id','name','email','message','is_read'];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
