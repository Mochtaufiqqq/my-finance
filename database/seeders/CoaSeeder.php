<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ChartOfAccount::create([
            'category_id' => '1',
            'code' => '001',
            'coa_name' => 'Gaji MPR',
            
        ]);

        \App\Models\ChartOfAccount::create([
            'category_id' => '2',
            'code' => '002',
            'coa_name' => 'Bensin Anak',
            
        ]);
        \App\Models\ChartOfAccount::create([
            'category_id' => '3',
            'code' => '003',
            'coa_name' => 'Gaji Programmer',
            
        ]);
    }
}
