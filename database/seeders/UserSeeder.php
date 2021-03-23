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
        // making super-admin
        $user1 = new User;
        $user1->id = '1';
        $user1->name = 'Bright Containers';
        $user1->email = 'admin@brightcontainers.com';
        $user1->countryCode = '+91';
        $user1->mobile = '1234567890';
        $user1->password = Hash::make('123456789');
        $user1->address = '1st Floor,Tribhuvan, Station Rd,Nadiad - 387001';
        $user1->comp_logo = 'bright_containers.jpg';
        $user1->testimonial = 'We are writing this letter for excellent service of M/s Bright Containers, Nadiad has been associated with our organization to supply HDPE bottle for our products packing for more then one decade.';
        $user1->state_code = 'Gujarat - 24';
        $user1->is_company = '0';
        $user1->gst_number = '123456789321654';

        // Creating a General User
        $user2 = new User;
        $user2->id = '2';
        $user2->name = 'Jainam';
        $user2->email = 'shahjainamn@gmail.com';
        $user2->countryCode = '+91';
        $user2->mobile = '1234567890';
        $user2->password = Hash::make('123456789');
        $user2->address = '1st Floor,Tribhuvan, Station Rd,Nadiad - 387001';
        $user2->comp_logo = 'bright_containers.jpg';
        $user2->testimonial = 'We are writing this letter for excellent service of M/s Bright Containers, Nadiad has been associated with our organization to supply HDPE bottle for our products packing for more then one decade.';
        $user2->state_code = 'Gujarat - 24';
        $user2->is_company = '1';
        $user2->gst_number = '123456789321654';

        // Creating a General User
        $user3 = new User;
        $user3->id = '3';
        $user3->name = 'Harshil';
        $user3->email = 'harshil943@gmail.com';
        $user3->countryCode = '+91';
        $user3->mobile = '1234567890';
        $user3->password = Hash::make('123456789');
        $user3->address = '1st Floor,Tribhuvan, Station Rd,Nadiad - 387001';
        $user3->comp_logo = 'bright_containers.jpg';
        $user3->testimonial = 'We are writing this letter for excellent service of M/s Bright Containers, Nadiad has been associated with our organization to supply HDPE bottle for our products packing for more then one decade.';
        $user3->state_code = 'Gujarat - 24';
        $user3->is_company = '1';
        $user3->gst_number = '123456789321654';

        $user1->save();
        $user2->save();
        $user3->save();
    }
}
