<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //création des roles utilisateurs fake


        $role = new Role();
        $role->role = 'admin';
        $role->save();

        $role = new Role();
        $role->role = 'staf';
        $role->save();

        $role = new Role();
        $role->role = 'customer';
        $role->save();

        DB::table('users')->insert([
            'name' => 'admin',
            'email'=> 'david.friquet@zohomail.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('BlackPearl2022%'),
            'job'=>'admin du site',
            'role_id' => '1',

        ]);

        DB::table('users')->insert([
            'name' => 'sebBangkok',
            'email'=> 'davidfriquet27@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('michelseb'),
            'job'=>'admin 2 du site',
            'role_id' => '1',

        ]);
    }
}
