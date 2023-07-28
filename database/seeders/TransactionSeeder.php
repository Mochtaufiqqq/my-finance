<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Transaction::create([
            'coa_id' => '1',
            'desc' => 'Gaji wakil dpr',
            'transaction_type' => 'income',
            'debit' => '100000'
            
        ]);

        \App\Models\Transaction::create([
            'coa_id' => '2',
            'desc' => 'Gaji wakil mpr',
            'transaction_type' => 'expense',
            'credit' => '200000'
            
        ]);
    }
}
