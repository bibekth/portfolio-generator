<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioSection extends Model
{
    protected $fillable = [
        'portfolio_id','title','type','context','position'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
