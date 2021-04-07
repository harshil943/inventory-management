<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpenseDetails;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index)
        {
            DB::table('expense_details')->insert([
                'expense_details' => $faker->name,
                'quantity' => $faker->numberBetween(5,20),
                'cost_per_quantity' => $faker->numberBetween(100,200),
                'created_at' => $faker->dateTimeBetween('-6 months','+1 month')
            ]);
        }
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ConsigneeSeeder::class);
        $this->call(BrightSeeder::class);
        $this->call(roleManagement::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ChallanSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(MapOrderChallanSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
