<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    protected $fillable = ['user_id','title','slug','theme_id','settings','is_published'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
    
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function theme(){
        return $this->belongsTo(Theme::class,'theme_id');
    }

    public function portfolio_section(){
        return $this->hasMany(PortfolioSection::class);
    }

    public function portfolio_media(){
        return $this->hasMany(PortfolioMedia::class);
    }

    public function custom_domain(){
        return $this->hasOne(CustomDomain::class);
    }

    public function contact_message(){
        return $this->hasOne(ContactMessage::class);
    }

    public function blog_posts(){
        return $this->hasMany(BlogPost::class);
    }
}
