<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\CoaCategory::create([
            'name' => 'Meal Expense',
            
        ]);

        \App\Models\CoaCategory::create([
            'name' => 'Transport Expense',
            
        ]);
        \App\Models\CoaCategory::create([
            'name' => 'Family Expense',
            
        ]);

        $this->call(CoaSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
