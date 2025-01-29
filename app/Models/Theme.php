<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['name','preview_image','layouts'];

    public function portfolio(){
        return $this->hasMany(Portfolio::class);
    }
}
