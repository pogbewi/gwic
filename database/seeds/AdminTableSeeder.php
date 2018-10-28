<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Role;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::firstOrNew(['email' => 'admin@seasonofjubilee.com']);
        $admin->firstname = 'Gwic';
        $admin->lastname = 'Admin';
        $admin->email = 'admin@globalwealthinvestmentcompany.com';
        $admin->phone = '08098739429';
        $admin->gender = 'male';
        $admin->password = bcrypt('lifessecret');
        $admin->remember_token = str_random(10);
        //Populate dummy users
        $admin->save();
        $role = Role::where('name', 'admin')->first();
        //$admin->setRole($role);
        $admin->roles()->attach($role->id);
    }
}
