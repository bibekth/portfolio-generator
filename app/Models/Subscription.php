<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id','plan_id','status','expires_at'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function subscription_history(){
        return $this->hasMany(SubscriptionHistory::class);
    }
}
