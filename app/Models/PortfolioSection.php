<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSection extends Model
{
    protected $fillable = [
        'portfolio_id','title','type','context','position'
    ];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
