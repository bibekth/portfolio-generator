<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SubscriptionPlan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['User','Admin'];
        foreach($roles as $role){
            Role::create(['name'=>$role]);
        }

        $plans = ['free'=>'0','standard'=>'10','premium'=>'18'];
        $i = 1;
        foreach($plans as $index => $plan){
            SubscriptionPlan::create(['name'=>$index, 'rate'=>$plan]);
            User::create([
                'name' => 'Test User ' . $plan,
                'email' => 'test'.$plan.'@portfolio.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1, 'plan_id'=>$i,
            ]);
            $i++;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2, 'plan_id'=>3
        ]);
    }
}
