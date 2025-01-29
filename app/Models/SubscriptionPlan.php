<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlan extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','rate','description'];

    public function users(){
        return $this->hasMany(User::class,'plan_id');
    }
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
