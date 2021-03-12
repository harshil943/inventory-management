<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // makeing super-admin
        $user = new User;

        $user->name = 'Harshil';
        $user->email = 'admin@admin.com';
        $user->countryCode = '+91';
        $user->mobile = '9428248383';
        $user->password = Hash::make('123456789');
        $user->address = 'hhh';
       

        $user->save();
    }
}
