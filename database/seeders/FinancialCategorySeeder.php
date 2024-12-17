<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FinancialCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('financial_categories')->delete();
        $data = [
            [
                'title'=>'Financial Report',
                'slug'=>\Str::slug('financial report')
            ],
            [
                'title'=>'Annual Report',
                'slug'=>\Str::slug('annual report')
            ],
            [
                'title'=>'AGM Minutes',
                'slug'=>\Str::slug('agm minutes'),
            ],
            [
                'title'=>'Interest Rates',
                'slug'=>\Str::slug('interest rates'),
            ],
            [
                'title'=>'Standard Tariff Charges',
                'slug'=>\Str::slug('standard tariff charges'),
            ],
            [
                'title'=>'Uncollected Dividends',
                'slug'=>\Str::slug('uncollected dividends'),
            ]
            
            ];
        \App\Models\FinancialCategory::insert($data);
    }
}
