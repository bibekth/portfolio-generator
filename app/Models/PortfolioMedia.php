<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioMedia extends Model
{
    protected $fillable = ['portfolio_id','file_name','file_path','file_type'];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
