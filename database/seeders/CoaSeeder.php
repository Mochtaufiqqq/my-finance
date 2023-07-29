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
            'code' => '401',
            'coa_name' => 'Gaji MPR',
            
        ]);

        \App\Models\ChartOfAccount::create([
            'category_id' => '2',
            'code' => '402',
            'coa_name' => 'Bensin Anak',
            
        ]);
        
        \App\Models\ChartOfAccount::create([
            'category_id' => '3',
            'code' => '403',
            'coa_name' => 'Gaji Programmer',
            
        ]);
    }
}
